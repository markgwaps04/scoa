



var FS = {

    get tab_header() { return jQuery("fs_tabs") },

    get cash_flow_base_id() {

        return jQuery("._cash_flow")
            .get()
            .map(element => jQuery(element).attr("id"))
            .filter(Boolean);
    },




    isLengthValid : function(value,length = 0)
    {

        return !(value.length < length || value === null);

    },


    cash_report : function(data)
    {


        function filter(currentVal){


            if(!FS.isLengthValid(currentVal,3)) return;


            return {

                "from" : currentVal[0],
                "to" : currentVal[1],
                "amount" : currentVal[2]

            }

        }

        return data
            .map(filter)
            .filter(Boolean);

    },



    cash_received : function(data)
    {

        function filter(currentVal){


            if(!FS.isLengthValid(currentVal,2)) return;

            return {

                "title" : currentVal[0],
                "amount" : currentVal[1]

            }

        }

        return data.map(filter);

    },


    cash_flow : function(dataSet,tableSettings)
    {

        const parent = this;


        /**
         * Change source
         * of checklist flow id
         */

        const cash_disbursement_activity_field = 0;

        const activity = 0;

        const amount = 1;



        var isValidLength = FS.isLengthValid(dataSet,2);

        if(!isValidLength) return;


        const call = {

            /**
             * check if a activity name is exist false if not
             * @returns {boolean}
             */

            isExist : function(settings,activityName) {


                /**
                 * checks if all elements in an array pass a test
                 * If no false occur returns true , false if not
                 *
                 * @return bool
                 *
                 * **/


                function existState(set) {

                    if(typeof set === "object")
                    {

                        if(set.hasOwnProperty("id"))

                            set = set.id;

                        if(set.hasOwnProperty("name"))

                            set = set.name;

                    }


                    var _set = (set+"")
                        .toLowerCase()
                        .replace(/\s/gm,"");

                    var _activity = (activityName+"")
                        .toLowerCase()
                        .replace(/\s/gm,"");


                    return _set != _activity;


                }


                return settings.every(existState)




            },

            main : function() {



                const root = this;

                /**
                 *  get target elements that has dropdown
                 *  to assign source of data
                 *
                 */


                FS
                    .cash_flow_base_id
                    .forEach(function(id) {



                        /**
                         *  get column source of other table (cash disbursement)
                         *
                         * @param number id of generated identity of a table
                         * @param number columnIndex
                         * @return Object
                         * **/


                        var settings = tableSettings
                            .getColumnSource(id,cash_disbursement_activity_field);


                        var activityName = (dataSet[activity]+"");


                        var is_valid = activityName.trim()
                            && root.isExist(settings,activityName);



                        if(!is_valid) return;



                        /** add a value to the settings **/

                        tableSettings
                            .base[id]
                            .columns[cash_disbursement_activity_field]
                            .source
                            .push({

                                id : (activityName+"")
                                    .replace(/\s/gm,"")
                                    .toLowerCase(),

                                name : activityName

                            })


                        return;


                    })

            }

        }

        call.main();

        return {

            id : dataSet[activity]
                .replace(/\s/gm,"")
                .toLowerCase(),

            name : dataSet[activity],

            amount : dataSet[amount]


        }


    },




    cash_disbursement : function(data)
    {

        function filter(currentVal){


            if(!FS.isLengthValid(currentVal,4)) return;

            return {

                "activityId" : currentVal[0]
                    .replace(/\s/gm,"")
                    .toLowerCase(),
                "date" : currentVal[1],
                "particular" : currentVal[2],
                "amount" : currentVal[3],

            }

        }

        return data.map(filter);

    },


    cash_statement : function(data)
    {

        function filter(currentVal){


            if(!FS.isLengthValid(currentVal,3)) return;

            return {

                "activityId" : currentVal[0]
                    .replace(/\s/gm,"")
                    .toLowerCase(),
                "title" : currentVal[1],
                "amount" : currentVal[2],

            }

        }

        return data.map(filter);

    }




}



jQuery(document).ready(function()
{


    const refresh_cash_disbursement_table = () => {

        return;

        const
            cash_flow = jQuery(".cash-flows"),
            activity = 0;

        const result =  $
            .fn
            ._scoa
            .defaults[cash_flow.attr("id")]
            .table
            .data
            .map(set => set[activity])
            .filter(Boolean);



        FS
            .cash_flow_base_id
            .forEach(function(id)
            {

               $
                   .fn
                   .jexcel
                   .defaults[id]
                   .columns[activity]
                   .source = result
                   .map(function (set,index,obj) {

                     return new Object({

                           id : (set+"")
                               .replace(/\s/gm,"")
                               .toLowerCase(),

                           name : set

                       });


                   });

            })


    }


    const errorTemplate = [

        '<div class="alert alert-warning animated fadeIn semi-color">',
        ' <i class="fa fa-info-circle medium"></i>&nbsp;',
        '<a class="alert-link" href="#">{errorTitle}</a>',
        '{errorBody}',
        '</div>'

    ].join("\n");


    function state(evt,response)
    {

        console.log(response.result);


        const success = 2, error = 1,
            numberFormat = numeral(response.result)._value;


        switch (numberFormat != null && numberFormat === 2)
        {

            case true:

                jQuery("[error-placement]").addClass("display-none");

                break;

            default:

                if(typeof response.result !== "number")
                {

                    jQuery("[error-placement]")
                        .removeClass("display-none")
                        .addClass("display-none")
                        .html(errorTemplate.setTokens({errorTitle : "Internal Error" , errorBody: response.result }))

                }


                break;

        }


    }


    function actions(requestData)
    {


        var displayNormalError = () => {

            jQuery("[error-placement]")
                .removeClass("display-none")
                .html(errorTemplate.setTokens({

                    errorTitle : "Unexpected error occured.",
                    errorBody : "no data has been save at this moment."


                }))

        }



        jQuery(".checklist-fs")
            .on("error",() => displayNormalError())
            .on("success",state)
            .trigger("update",requestData)


    }




    jQuery(".report").on("after_change  comment_changed",function(evt,jexcel)
    {

        console.log(jexcel.data);

        var formattedData = FS.cash_report(jexcel.data),
            requestData = {
                xml : jexcel.xmlFormatted,
                data : JSON.stringify(formattedData),
                type : "cash_collection_report"
            }

        actions(requestData);


    });



    jQuery(".received").on("after_change  comment_changed",function(evt,jexcel)
    {


        var formattedData = FS.cash_received(jexcel.data),
            requestData = {
                xml : jexcel.xmlFormatted,
                data : JSON.stringify(formattedData),
                type : "cash_received"
            }

        actions(requestData);


    });


    jQuery(".cash-flows").on(
        "after_change " +
        "rowInserted " +
        "delete_row " +
        "adding_column " +
        "ondeletecolumn " +
        "comment_changed " +
        "when_change"
        ,function(evt,jexcel) {



        var result = jexcel.data.map(set => FS.cash_flow(set,jexcel.tableInfo))
            .filter(Boolean);


        var requestData = {
                xml : jexcel.xmlFormatted,
                data : JSON.stringify(result),
                type : "cash_flows"
            }



        actions(requestData);


    })





    /** trigger when page is ready **/

    jQuery(".cash-flows").on("when_load ",function (evt,data) {


        jQuery(".cash-flows")
            .trigger("after_change",data);


        /** refresh dropdown source **/

        refresh_cash_disbursement_table();

        data.tableInfo.refreshTable();


    });


    /** get partial results **/

    if(jQuery(".cash-flows").length)
    {

        jQuery(".cash-flows").trigger("when_load", $.fn
        ._scoa
        .defaults[jQuery(".cash-flows")
        .attr("id")]
        .table)


    }



    jQuery(".cash-disbursement").on("after_change comment_changed",function(evt,jexcel)
    {


        var requestData = {
            xml : jexcel.xmlFormatted,
            data : JSON.stringify(FS.cash_disbursement(jexcel.data)),
            type : "note_disbursement"
        }

        actions(requestData);

        /** refresh dropdown source **/

        refresh_cash_disbursement_table();

        jexcel.tableInfo.refreshTable();


    });





    jQuery(".cash-statement").on("after_change comment_changed",function(evt,jexcel)
    {


        var requestData = {
            xml : jexcel.xmlFormatted,
            data : JSON.stringify(FS.cash_statement(jexcel.data)),
            type : "cash_statement"
        }


        actions(requestData);


        /** refresh dropdown source **/

        refresh_cash_disbursement_table();

        jexcel.tableInfo.refreshTable();


    });

});