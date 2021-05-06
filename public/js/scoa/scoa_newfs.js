

(function(w,d,__,$_){


    var fs = function() {


        let countNotif = 0;


        var call = {

            saveAll : function() {

                const report = this.collection_flow()

            },

            save : function(data) {


                if(!window.scoa_token)
                {

                    $.confirm({
                        title: 'Encountered an error!',
                        content: 'Token not specified ',
                        type: 'red',
                        typeAnimated: true,
                    });

                    return;

                }


                __.confirm({
                    content: function () {
                        var self = this;

                        return __.ajax({
                            url: '/SCOA/public/organization/submitFS',
                            method: 'post',
                            data : Object.assign(data,{url : window.scoa_token})
                        }).done(function (response) {

                            self.close(true);

                        }).fail(function(){
                            self.setContent('Something went wrong.');
                        });

                    }
                });

            },


            filterUnImportant : function(init,data,limit,skip) {

                const unformatted = init.serialize();

                const filter = function(current) {

                    var count = 2;

                    const cells = current
                        .column.filter(e => e.css)
                        .slice(0,limit)


                    if(!cells.length) return true;

                    for(var index in cells) {

                        const classes = cells
                            .filter(e => e.css)
                            .map(e => e.cssVal)
                            .filter(Boolean);


                        /** check css **/

                        const isValid = classes.filter( function(css) {

                            const css_keys = Object.keys(css);

                            const check_css = function(_class) {


                                if(_class === "background" && css[_class] === "#FFFFFF") return false

                                const check_valid = _class == "text-align" || _class == "color";

                                if(check_valid) return false;

                                return css[_class];

                            }

                            return css_keys.filter(check_css).length

                        })

                        if(isValid.length)
                        {

                            dhtmlx.message({
                                type: "warning",
                                text: `<i class='fa fa-info-circle'></i> Styled cell(s) found`+
                                `<p><small>The row # ${current.index} is mark as not important</small></p>`,
                                expire : count * 5000
                            })


                            count += 2;

                            return false;

                        }


                    }

                    return true;

                }


                return data.filter(filter)


            },

            rows : function(init,skip) {

                const arr_skip = skip instanceof Array ? skip : Array.of(skip)

                return init._grid._currentData.filter(function(value) {

                    if(typeof value !== "object" || arr_skip.indexOf(Number(value.id)) > -1)

                        return false;

                    const _value = Object
                        .keys(value)
                        .filter(Number)
                        .map(e => value[e])

                    /** check row if has value @array **/

                    const isValidRow = Object
                        .values(_value)
                        .filter((e,index) => typeof e === "string" && index <= 24)
                        .filter(Boolean)


                    if(isValidRow.length)

                        return true;


                    return false;

                });


            },

            defaultTools : function(init,target,type,custom_toolbar_callbacks) {

                const root = this;

                init.contextMenu.data.add({
                    icon: "fa fa-rouble",
                    value: "Sum",
                    id: "scoa-sum"
                });


                init.contextMenu.data.add({
                    icon: "fa fa-magic",
                    value: "Format",
                    id: "scoa-format"
                });




                init.contextMenu.data.add({
                    icon: "fa fa-arrows-h",
                    value: "Gap",
                    id: "scoa-gap"
                });


                init.toolbar.data.add({
                    type: "menuItem",
                    icon: "fa fa-calendar",
                    tooltip : "Calendar",
                    id: "scoa-datepicker",
                });


                init.toolbar.data.add({
                    type: "menuItem",
                    id: "scoa_save",
                    icon: "fa fa-save",
                },0);

                init.toolbar.data.add({
                    icon: "fa fa-file-pdf-o",
                    id: "scoa_pdf",
                    tooltip : "View as pdf file"
                });


                init.toolbar.data.events.on("click",function (evt) {


                    if(typeof custom_toolbar_callbacks === "function")

                        custom_toolbar_callbacks(evt);


                    const selectedCells = init.selection.getSelectedCell();

                    switch (true) {

                       case evt === "scoa-datepicker":

                           __.confirm({
                               title: 'Celendar',
                               content: ["<div id='scoa_calendar' class='center'>","<div>"].join("\n"),
                               buttons: {
                                   formSubmit: {
                                       text: 'Submit',
                                       btnClass: 'btn-blue',
                                       action: function () {

                                          const val =  __("#scoa_calendar")
                                              .datepicker("getFormattedDate");

                                          if(!val) return;

                                           init.eachCell(function (cell) {

                                               init.setValue(cell,val);

                                           }, selectedCells);


                                       }
                                   },

                               },
                               onContentReady: function () {
                                   // bind to events
                                   var jc = this;
                                   this.$content.find('form').on('submit', function (e) {
                                       // if the user submits the form by pressing enter in the field.
                                       e.preventDefault();
                                       jc.$$formSubmit.trigger('click'); // reference the button and click it
                                   });
                               },

                               onOpen: function () {

                                   __("#scoa_calendar").datepicker();

                               },

                           });

                           break;

                        case evt === "scoa_save":

                            root.save(type.format_to_save_db);

                            break;


                        case evt === "scoa_pdf" :

                           window.printing =  $.dialog({
                               icon: 'fa fa-spinner fa-spin',
                               title: 'Setting data!',
                               content: 'Sit back, we are processing your request!',
                               closeIconClass : "hidden",
                               closeIcon : null,
                               buttons : {}
                            });



                            __("body").after([
                                `<iframe onload=" window.printing.close(true);" class="fs_print_container" style="display: hidden" src='/SCOA/public/organization/print_reports/${window.scoa_token}'>`,
                                "</iframe>"
                            ].join("\n"))


                            break;


                   }




                })

                init.contextMenu.data.events.on("click",function(evt){

                    if(typeof custom_toolbar_callbacks === "function")

                        custom_toolbar_callbacks(evt);


                    const selectedCells = init.selection.getSelectedCell();

                    switch (true) {


                        case evt === "scoa-sum":

                            const total = function(total,current) {

                                return (numeral(total)._value || 0) + (numeral(current)._value || 0);

                            }



                            /** get the unique cells **/

                            var _cell = [];

                            init.eachCell(function (cell) {

                               _cell.push(cell);

                            }, selectedCells);

                            const arrayOfUniqueSelectedCells = _.uniq(_cell);

                            let values = init.getValue(arrayOfUniqueSelectedCells.join(","));

                            values = Array.isArray(values)
                                ? values
                                : [values];

                            const sum = numeral(values.reduce(total)).format("0,0.00");

                            __(".dhx_edit_line_input").val("SUM : " + sum);



                        break;


                        case evt === "scoa-format" :

                            init.eachCell(function (cell, value) {

                               const numeric = numeral(value)._value;

                               if(numeric === null) return;

                               init.setValue(cell,numeral(value).format("0,0"));

                            }, selectedCells);

                            break;

                        case evt === "scoa-gap" :

                            const beginWidth = prompt("Enter begin value");

                            const gap = prompt("Enter gap value");

                            if(isNaN(gap) || isNaN(gap)) return;

                            let currentGap = Number(beginWidth);

                            init.eachCell(function (cell) {

                                init.setValue(cell,currentGap);

                                currentGap = currentGap + Number(gap);

                            }, selectedCells);

                            break;


                    }




                })


                return this;

            },

            events : function(init,default_cell,after_change_callback,before_change_callback) {

                const root= this;

                const before_change_action = function(col_id) {

                    var isUpdated = true;

                    if(typeof before_change_callback === "function")
                    {
                        if(!before_change_callback(col_id))

                            return false;
                    }

                    init.eachCell(function (cell, value) {

                        if(default_cell.indexOf(cell) > -1)

                            isUpdated = false;

                    }, init.selection.getSelectedCell());



                    return isUpdated;

                };

                init.events.on("beforeEditStart",before_change_action);
                init.events.on("beforeStyleChange",before_change_action);
                init.events.on("BeforeRowAdd",before_change_action);
                init.events.on("BeforeRowDelete",before_change_action);
                init.events.on("BeforeColumnAdd",before_change_action);

                if(typeof  after_change_callback !== "function") return;

                init.events.on("AfterRowDelete",after_change_callback);
                init.events.on("AfterRowAdd",after_change_callback);
                init.events.on("AfterColumnDelete",after_change_callback);

                return this;

            },

            collection_report : function (dataLoaded) {


                const parent =  this;

                const spreadsheet = this.spreadsheet("collection_report_fs_table");

                const call = {

                    default_data_set : {

                        "data": [
                            {"cell":"A1","css":"scoa_header_style","value":"From"},
                            {"cell":"B1","css":"scoa_header_style","value":"To"},
                            {"cell":"C1","css":"scoa_header_style","value":"Amount"}],

                        "styles":
                            {"scoa_header_style":{"background":"#039BE5 !important","color":"#FFFFFF !important","font-weight":"bold !important","text-align":"center !important"}}

                    },

                    fix_headers : function () {

                        spreadsheet.setStyle("A1,B1,C1",this.default_data_set.styles.scoa_header_style);

                        spreadsheet.setValue("A1","From");
                        spreadsheet.setValue("B1","To");
                        spreadsheet.setValue("C1","Amount");

                        return this;

                    },

                    data : function() {

                        const root =this

                        const targetData = dataLoaded.cash_collection_report_format || "[]";
                        const cash =  JSON.parse(targetData) || root.default_data_set

                        spreadsheet.parse(cash);

                        root.fix_headers();

                        return this;

                    },

                    get format_to_save_db() {

                        countNotif = 0;

                        const root = this;

                        const unformat = spreadsheet
                            ._getCells()
                            .filter((e,index) => e.column.length && index !== 0)

                        /** skip default header **/

                       const value =  parent
                            .filterUnImportant(spreadsheet,unformat,3)

                        // console.log(spreadsheet.serialize());
                        // console.log(value);

                        const format = function (value) {

                            const _val = Object.values(value.column);

                            const result = {

                                to : _val[1].value,
                                from : _val[0].value,
                                amount : numeral(_val[2].value)._value,
                            }


                            const hasValue = Object
                                .values(result)
                                .join("")
                                .trim();

                            if(!hasValue) return;

                            result["row"] = value.index;
                            result["amount"] = result.amount || 0;

                            return result;

                        }


                        var formatted =  value
                            .filter(e => e.column.length >= 3)
                            .map(format)
                            .filter(Boolean)

                        formatted = root.filterInvalidReceipt(formatted);

                        const _unformat = JSON.stringify(unformat.map(e => ({
                            index : e.index,
                            column : e.column.slice(0,3),
                        })));



                        const output =  {

                            type : "cash_collection_report",
                            data : {

                                cash_collection_report : JSON.stringify(formatted),
                                cash_collection_report_format : JSON.stringify(spreadsheet.serialize()),
                                print_format_report : _unformat
                            },


                        }



                        return output;

                    },

                    filterInvalidReceipt(formatedResult) {

                        const splitInto = function(string)
                        {
                            const bysplit = string.split("#");
                            return bysplit.map(e => (e+"").replace(/\s/gm,""))

                        }


                        const description = function(string) {

                            const [referenceId,name] = splitInto(string);

                            const check =  {

                                isValid : !!(referenceId || "")
                                    .replace(/\s/gm,"")
                                    .length,

                                hasInvalidName : !!(name || "")
                                    .replace(/\s/gm,"")
                                    .length,


                                hasMultipleType : splitInto(string).length > 2,
                                reference : referenceId,
                                name : name || ""


                            };


                            check.isValid = (!check.hasMultipleType) && check.isValid;

                            return check;


                        }


                        const from = function(row) {

                            const info = description(row.from);


                            if(!info.isValid) {

                                countNotif+=5000;

                                dhtmlx.message({
                                    type: "error",
                                    text: `<i class='fa fa-info-circle'></i> Invalid reference found at 'from' field`+
                                    `<p><small>The row # ${row.row} is mark as not important, check if a field has multiple types or has a value.</small></p>`,
                                    expire : countNotif
                                });

                                return false;

                            }

                            return true;


                        }


                        const to = function(row) {

                            const info = description(row.from);


                            if(info.hasMultipleType) {

                                countNotif+=5000;

                                dhtmlx.message({
                                    type: "error",
                                    text: `<i class='fa fa-info-circle'></i> Invalid reference found at 'to' field`+
                                    `<p><small>The row # ${row.row} is mark as not important, check if a field has multiple types or has a value.</small></p>`,
                                    expire : countNotif
                                });

                                return false;

                            }

                            return true;


                        }


                        const format = function(row) {

                            row["details"] = {

                                from : description(row.from),
                                to : description(row.to)

                            }

                            return row;

                        }


                        return formatedResult
                            .filter(from)
                            .filter(to)
                            .map(format);


                    },

                    setUp : function() {

                        const root = this;

                        /** for this tab only **/

                        spreadsheet.toolbar.data.add({
                            icon: "fa fa-check",
                            id: "scoa-generate",
                            tooltip : "Auto generate"
                        });


                        parent.defaultTools(spreadsheet,"#collection_report_fs_table",root,function(evt){

                           if(evt === "scoa-generate")
                           {

                               $.confirm({
                                   content: function(){

                                       var self = this;

                                       return $.ajax({
                                           url: "/SCOA/public/organization/getUnformattedData",
                                           method: 'post',
                                           data : {url : window.scoa_token}
                                       }).done(function (response) {


                                           if(!response.replace(/\s/gm,"")) return;

                                           const json = JSON.parse(response);

                                           if(!Object.keys(json).length) {


                                               $.confirm({
                                                   title: 'No data found',
                                                   content : "",
                                                   type: 'red',
                                                   typeAnimated: true,
                                               });

                                               self.close(true);

                                               throw new Error(response);

                                               return;

                                           }

                                           self.close(true);


                                           /** get disbursements **/

                                          let disbursements = JSON.parse(json.note_disbursement || []) || [];

                                          /** split and get reference identifier **/

                                          disbursements = disbursements.map(function(e){

                                            if(!e.hasOwnProperty("reference")) return;

                                            const reference = e.reference.split("#") || [];

                                             if(reference.length > 2) {

                                                 dhtmlx.message({
                                                     type: "error",
                                                     text: `<i class='fa fa-info-circle'></i> Invalid type`+
                                                     `<p><small>The row # ${e.row} has multiple type</small></p>`,
                                                     expire : 5000
                                                 })

                                                 return;
                                             }


                                             e["referenceId"] = reference[0];
                                             e["referenceBy"] = reference[1];

                                             return e;

                                          }).filter(Boolean);





                                          /** group by reference **/




                                          disbursements = _.groupBy(disbursements,"referenceId");

                                          /** sort by referenceBy and populate new format data **/

                                          var row = 1;

                                          disbursements = Object.keys(disbursements).map(function (e) {

                                              if(!e.replace(/\s/gm,"").length) return;

                                              row+=1;

                                              const values = _.sortBy(disbursements[e],"referenceBy");

                                              let total = _.sumBy(values,function(current){

                                                  return numeral(current.amount)._value;

                                              })


                                              total = numeral(total).format("0,0.00");

                                              if(values.length > 1) {

                                                  const min = values[0],
                                                      max = values[1];

                                                  const minRefer = min.referenceBy || "";
                                                  const maxRefer = max.referenceBy || "";

                                                  if(!minRefer.length) return;

                                                  const _from = minRefer
                                                      .replace(/\s/gm,"")
                                                      .length ? "#" + (min.referenceBy+"") : "";

                                                  const _to = maxRefer
                                                      .replace(/\s/gm,"")
                                                      .length ? "#" + (max.referenceBy+"") : "";

                                                  const from = e + "" + _from;
                                                  const to = e + "" + _to;

                                                  return [

                                                      {"cell":"A"+row,"css":"","value":from},
                                                      {"cell":"B"+row,"css":"","value":to},
                                                      {"cell":"C"+row,"css":"","value":total}

                                                  ]


                                              }


                                              const _from = (values[0].referenceBy || []).length
                                                  ? "#" + (values[0].referenceBy+"").trim()
                                                  : "";


                                              const from = e+" " + _from

                                              return [

                                                  {"cell":"A"+row,"css":"","value":from},
                                                  {"cell":"B"+row,"css":"","value":""},
                                                  {"cell":"C"+row,"css":"","value":total}

                                              ]


                                          })


                                          /** merge each cells **/


                                          disbursements = disbursements.reduce((e,e1) => _.union(e,e1))

                                           /** parse data **/

                                           const parse = {

                                               "data": disbursements,

                                               "styles":
                                                   {"scoa_header_style":{"background":"#039BE5 !important","color":"#FFFFFF !important","font-weight":"bold !important","text-align":"center !important"}}

                                           }


                                           spreadsheet.parse(parse);

                                           root.fix_headers();

                                       }).fail(function(){
                                           self.setContentAppend('<div>Something wen\' wrong</div>');
                                       })


                                   }
                               });

                           }

                        });

                        this.data()

                        parent.events(spreadsheet,["A1","B1","C1","A1:Y1"],function(){

                            root.fix_headers();

                        })

                        this.fix_headers()





                    },




                }


                call.setUp();

                return this;

            },

            confirm_dialog : function(obj) {

                const params = Object.assign({
                    title : '',
                    onContentReady: function () {
                        // bind to events
                        var jc = this;
                        this.$content.find('form').on('submit', function (e) {
                            // if the user submits the form by pressing enter in the field.
                            e.preventDefault();
                            jc.$$formSubmit.trigger('click'); // reference the button and click it
                        });
                    },


                },obj)

                __.confirm(params);

            },

            collection_received : function (dataLoaded) {

                const parent =  this;

                const spreadsheet = this.spreadsheet("collection_received_fs_table");

                const call = {

                    default_data_set : {

                        "data": [
                            {"cell":"A1","css":"scoa_header_style","value":"Title"},
                            {"cell":"B1","css":"scoa_header_style","value":"Amount"}],

                        "styles":
                            {"scoa_header_style":{"background":"#039BE5","color":"#FFFFFF","font-weight":"bold","text-align":"center"}}

                    },

                    fix_headers : function () {

                        spreadsheet.setStyle("A1,B1",this.default_data_set.styles.scoa_header_style);

                        spreadsheet.setValue("A1","Title");
                        spreadsheet.setValue("B1","Amount");

                        return this;

                    },

                    data : function() {

                        const root = this

                        const targetData = dataLoaded.cash_received_format || "[]";

                        const cash =  JSON.parse(targetData) || root.default_data_set

                        spreadsheet.parse(cash);

                        root.fix_headers();

                        return this;

                    },



                    get format_to_save_db() {

                        countNotif = 0;

                        const unformat = spreadsheet
                            ._getCells()
                            .filter((e,index) => e.column.length && index !== 0)


                        /** skip default header **/

                        const value =  parent
                            .filterUnImportant(spreadsheet,unformat,2)

                        // console.log(spreadsheet.serialize());
                        // console.log(value);

                        const format = function (value) {

                            const _val = Object.values(value.column);

                            const result = {

                                title : _val[0].value,
                                amount : numeral(_val[1].value)._value

                            }


                            const hasValue = Object
                                .values(result)
                                .join("")
                                .trim();

                            if(!hasValue) return;

                            result["row"] = value.index;
                            result["amount"] = result.amount || 0;

                            return result;

                        }


                        const formatted =  value
                            .filter(e => e.column.length >= 2)
                            .map(format)
                            .filter(Boolean)


                        const _unformat = JSON.stringify(unformat.map(e => ({
                            index : e.index,
                            column : e.column.slice(0,2),
                        })));



                        const output =  {

                            type : "cash_received",
                            data : {

                                cash_received : JSON.stringify(formatted),
                                cash_received_format : JSON.stringify(spreadsheet.serialize()),
                                print_format_received : _unformat
                            },


                        }



                        return output;

                    },


                    setUp : function() {

                        const root = this;

                        parent.defaultTools(spreadsheet,"#collection_received_fs_table",root);


                        this.data()

                        parent.events(spreadsheet,["A1","B1","A1:Y1"],function(){

                            root.fix_headers();

                        })

                        this.fix_headers()


                    }



                }


                call.setUp();

                return this;

            },

            collection_flow : function (dataLoaded) {

                const parent =  this;

                const spreadsheet = this.spreadsheet("collection_flow_fs_table");

                const call = {

                    default_data_set : {

                        "data": [
                            {"cell":"A1","css":"scoa_header_style","value":"Activity nam"},
                            {"cell":"B1","css":"scoa_header_style","value":"Amount"}],

                        "styles":
                            {"scoa_header_style":{"background":"#039BE5","color":"#FFFFFF","font-weight":"bold","text-align":"center"}}

                    },

                    fix_headers : function () {

                        spreadsheet.setStyle("A1,B1",this.default_data_set.styles.scoa_header_style);

                        spreadsheet.setValue("A1","Activity name");
                        spreadsheet.setValue("B1","Amount");

                        return this;

                    },

                    data : function() {

                        const root =this

                        const targetData = dataLoaded.cash_flows_format || "[]";

                        const cash =  JSON.parse(targetData) || root.default_data_set

                        spreadsheet.parse(cash);

                        root.fix_headers();


                        return this;

                    },


                    get format_to_save_db() {

                        countNotif = 0;

                        const unformat = spreadsheet
                            ._getCells()
                            .filter((e,index) => e.column.length && index !== 0)


                        /** skip default header **/

                        const value =  parent
                            .filterUnImportant(spreadsheet,unformat,2)

                        // console.log(spreadsheet.serialize());
                        // console.log(value);

                        const format = function (value) {

                            const _val = Object.values(value.column);

                            const result = {

                                name : _val[0].value,
                                amount : numeral(_val[1].value)._value

                            }


                            const hasValue = Object
                                .values(result)
                                .join("")
                                .trim();

                            if(!hasValue) return;

                            result["row"] = value.index;
                            result["amount"] = result.amount || 0;

                            return result;

                        }


                        const formatted =  value
                            .filter(e => e.column.length >= 2)
                            .map(format)
                            .filter(Boolean)


                        const _unformat = JSON.stringify(unformat.map(e => ({
                            index : e.index,
                            column : e.column.slice(0,2),
                        })));



                        const output =  {

                            type : "cash_flows",
                            data : {

                                cash_flows : JSON.stringify(formatted),
                                cash_flows_format : JSON.stringify(spreadsheet.serialize()),
                                print_format_flow : _unformat
                            },


                        }


                        return output;

                    },


                    setUp : function() {

                        const root = this;

                        parent.defaultTools(spreadsheet,"#collection_flow_fs_table",root);


                        this.data()

                        parent.events(spreadsheet,["A1","B1","A1:Y1"],function(){

                            root.fix_headers();

                        })

                        this.fix_headers()


                    }



                }


                call.setUp()

                return this;

            },

            note_disbursement : function (dataLoaded) {


                const parent =  this;

                const spreadsheet = this.spreadsheet("note_disbursement");

                const call = {

                    default_data_set : {

                        "data": [
                            {"cell":"A1","css":"scoa_header_style","value":"Activity name"},
                            {"cell":"B1","css":"scoa_header_style","value":"Date"},
                            {"cell":"C1","css":"scoa_header_style","value":"Reference Number (OR/AR/TS)"},
                            {"cell":"D1","css":"scoa_header_style","value":"Particular"},
                            {"cell":"E1","css":"scoa_header_style","value":"Type"},
                            {"cell":"F1","css":"scoa_header_style","value":"Amount"},
                            ],

                        "styles":
                            {"scoa_header_style":{"background":"#039BE5","color":"#FFFFFF","font-weight":"bold","text-align":"center"}}

                    },

                    fix_headers : function () {

                        spreadsheet.setStyle("A1,B1,C1,D1,E1,F1,G1",this.default_data_set.styles.scoa_header_style);

                        spreadsheet.setValue("A1","Activity name");
                        spreadsheet.setValue("B1","Date");
                        spreadsheet.setValue("C1","Reference Number (OR/AR/TS)");
                        spreadsheet.setValue("D1","Particular");
                        spreadsheet.setValue("E1","Type");
                        spreadsheet.setValue("F1","Amount");

                        return this;

                    },

                    data : function() {

                        const root =this

                        const targetData = dataLoaded.note_disbursement_format || "[]";

                        const cash =  JSON.parse(targetData) || root.default_data_set

                        spreadsheet.parse(cash);

                        root.fix_headers();

                        return this;

                    },

                    get format_to_save_db() {

                        countNotif = 0;

                        const unformat = spreadsheet
                            ._getCells()
                            .filter((e,index) => e.column.length && index !== 0)


                        /** skip default header **/

                        const value =  parent
                            .filterUnImportant(spreadsheet,unformat,6)

                        // console.log(spreadsheet.serialize());
                        // console.log(value);

                        const format = function (value) {

                            const _val = Object.values(value.column);

                            const name = _val[0].value.split(",")

                            if(!name.length >= 2)
                            {

                                dhtmlx.message({
                                    type: "warning",
                                    text: `<i class='fa fa-info-circle'></i> Invalid id found`+
                                    `<p><small>The row # ${value.index} is mark as not important</small></p>`,
                                    expire : count * 5000
                                })

                                return;

                            }


                            const result = {

                                activityId : name[0],
                                date : _val[1].value,
                                reference : _val[2].value,
                                particular : _val[3].value,
                                type : _val[4].value,
                                amount : numeral(_val[5].value)._value || 0,
                                activityIndex : name[1]

                            }


                            const hasValue = Object
                                .values(result)
                                .join("")
                                .trim();

                            if(!hasValue) return;

                            result["row"] = value.index;
                            result["amount"] = result.amount || 0;

                            return result;

                        }


                        const formatted =  value
                            .filter(e => e.column.length >= 6)
                            .map(format)
                            .filter(Boolean)


                        const _unformat = JSON.stringify(unformat.map(e => ({
                            index : e.index,
                            column : e.column.slice(0,6),
                        })));



                        const output =  {

                            type : "note_disbursement",
                            data : {

                                note_disbursement : JSON.stringify(formatted),
                                note_disbursement_format : JSON.stringify(spreadsheet.serialize()),
                                print_format_disbursement : _unformat
                            },


                        }


                        return output;

                    },

                    setUp : function() {

                        const root = this;

                        parent.defaultTools(spreadsheet,"#note_disbursement",root,function(id){

                            const column_desc = spreadsheet.selection._focusedCell;

                            const check = function(type) {

                                const value = spreadsheet.getValue(column_desc.cell);

                                if(value)
                                {
                                    const splitted = value.split("#");

                                    const has = splitted[0]
                                        .toLowerCase()
                                        .trim() == type.toLowerCase();

                                    if(splitted.length >= 2)
                                    {

                                        dhtmlx.message({
                                            type: "error",
                                            text: `<i class='fa fa-info-circle'></i> Invalid type`+
                                            `<p><small>The row # ${column_desc.row} has multiple type, It is possible to add more multiple type custom or not but it will be consider as not important and hidden in some places</small></p>`,
                                            expire : 5000
                                        })

                                        return;

                                    }


                                }


                                spreadsheet.setValue(column_desc.cell,type.toUpperCase()+"# "+value);

                            }



                            switch (true) {

                                case id === "scoa-tr":

                                    check("TR");

                                    break;

                                case id === "scoa-or":

                                    check("OR");

                                    break;

                                case id === "scoa-ar":

                                    check("AR");

                                    break;


                                case id === "scoa-si":

                                    check("SI");

                                    break;


                                case id === "scoa-ts":

                                    check("TS");

                                    break;


                                case id === "scoa-ci":

                                    check("CI");

                                    break;



                            }

                        });

                        this.data()

                        const  onbefore = function(id) {

                            const column_desc = spreadsheet.selection._focusedCell;

                            switch (true) {

                                case column_desc.col == 7 :

                                    return false;

                                    break;

                            }

                            return true;

                        }



                        parent.events(spreadsheet,["A1","B1","C1","D1","E1","F1","G1","A1:Y1"],function(){

                            root.fix_headers();

                        },onbefore);







                        spreadsheet.events.on("AfterEditStart", function (evt,tas) {

                            const column_desc = spreadsheet.selection._focusedCell;

                            if(__("#scoa_type_id").length) return;

                            switch (true) {

                                case column_desc.col == 5 :

                                    parent.confirm_dialog({
                                        content: [
                                            "<p>Choose type</p>",
                                            '<select class="form-control" id="scoa_type_id">',
                                            '<option>Fare</option>' ,
                                            '<option>Tshirts/Singlet</option>' ,
                                            '<option>Materials</option>',
                                            '<option>Assorted Groceries</option>',
                                            '<option>Costumes</option>',
                                            '<option>Make-up Artist</option>',
                                            '<option>Car Rental Fee</option>',
                                            '<option>Lights and Sounds</option>',
                                            '<option>Tarpaulin</option>',
                                            '<option>Print/Photocopy</option>',
                                            '<option>Food</option>',
                                            '<option>Other</option>',
                                            '</select>',
                                            "<div>"
                                        ].join("\n"),

                                        buttons: {
                                            formSubmit: {
                                                text: 'Submit',
                                                btnClass: 'btn-blue',
                                                action: function () {

                                                    const val =  __("#scoa_type_id").val()

                                                    spreadsheet.setValue(column_desc.cell,val)

                                                }
                                            },

                                        },

                                    });

                                    return false;

                                    break;


                                case column_desc.col == 1 :


                                    $.confirm({
                                        content: function(){

                                            var self = this;

                                            return $.ajax({
                                                url: "/SCOA/public/organization/getCashFlow",
                                                method: 'post',
                                                data : {url : window.scoa_token}
                                            }).done(function (response) {


                                                self.close(true);

                                                if(!response.replace(/\s/gm,"")) return;


                                                const json = JSON.parse(response);

                                                if(!json.length)
                                                {

                                                    $.confirm({
                                                        title: 'No data to display',
                                                        content: 'Add activity\'s on cash flow tab first, it is possible to add directly a custom activity\'s name on disbursement tab but the data will be added will not be counted and consider as not important.',
                                                        type: 'orange',
                                                        typeAnimated: true,
                                                    });

                                                    self.close(true);

                                                    return;

                                                }

                                                self.close(true);

                                                const template = json
                                                    .map(function(e){

                                                        if(!e.name.replace(/\s/gm,""))

                                                            return;

                                                        return "<option>"+(e.name+","+e.row).trim()+"</option>"

                                                    }).filter(Boolean).join("")


                                                parent.confirm_dialog({
                                                    content: [
                                                        "<p>Choose type</p>",
                                                        "<p>Invalid's id is consider as not important,make sure that all activity's is exist on cash flow tab</p>",
                                                        '<select class="form-control" id="scoa_type_id">',
                                                        template,
                                                        '</select>',
                                                        "<div>"
                                                    ].join("\n"),

                                                    buttons: {
                                                        formSubmit: {
                                                            text: 'Submit',
                                                            btnClass: 'btn-blue',
                                                            action: function () {
                                                                const val =  __("#scoa_type_id").val()
                                                                spreadsheet.setValue(column_desc.cell,val)
                                                            }
                                                        },

                                                    },

                                                });

                                            }).fail(function(){
                                                self.setContentAppend('<div>Something wen\' wrong</div>');
                                            })


                                        }
                                    });

                                    return false;

                                    break;


                            }



                        })

                        spreadsheet.events.on("AfterFocusSet",function(evt){

                            const column_desc = spreadsheet.selection._focusedCell;

                            switch (true) {

                                case column_desc.col == 3 :


                                    spreadsheet.contextMenu.data.remove("scoa-reference-type");

                                    spreadsheet.contextMenu.data.add({
                                        icon: "fa fa-check-circle",
                                        value: "Reference type",
                                        id: "scoa-reference-type",
                                        childs: [
                                            {
                                                id: "scoa-tr",
                                                value: "TR"
                                            },
                                            {
                                                id: "scoa-or",
                                                value: "OR"
                                            },
                                            {
                                                id: "scoa-ar",
                                                value: "AR"
                                            },

                                            {
                                                id: "scoa-si",
                                                value: "SI"
                                            },

                                            {
                                                id: "scoa-ts",
                                                value: "TS"
                                            },

                                            {
                                                id: "scoa-ci",
                                                value: "CI"
                                            }

                                        ]
                                    });


                                    break;


                                default :

                                    spreadsheet.contextMenu.data.remove("scoa-reference-type");

                                    break;


                            }

                        })



                       this.fix_headers()

                    }



                }


               call.setUp();

                return this;

            },

            spreadsheet : function(id) {

                return  new dhx.Spreadsheet(id, {

                    toolbarBlocks: ["undo", "colors", "decoration", "align", "lock", "clear", "rows", "columns"],
                    menu: true

                });

            },

            main : function () {

                const child_root = this;

                const load = $.dialog({
                    icon: 'fa fa-spinner fa-spin',
                    title: 'Setting data!',
                    content: 'Sit back, we are processing your request!',
                    closeIconClass : "hidden",
                    closeIcon : null,
                    buttons : {},
                    onContentReady : function() {

                        const _this = this;

                        const response = function(data) {

                            _this.close();

                            data = data.replace(/\s/gm,"");
                            data = data._toJSON();

                            child_root
                                .collection_report(data)
                                .collection_received(data)
                                .collection_flow(data)
                                .note_disbursement(data);


                            /** error spreadsheet **/

                            child_root.spreadsheet("error_spreadsheet");

                            if(!Object.keys(data).length) {

                                $.dialog({
                                    title: "No data found",
                                    content : "",
                                    type: 'orange',
                                    typeAnimated: true,
                                });

                            }


                        };

                        __.post("/SCOA/public/organization/getUnformattedData", {url : window.scoa_token},response)


                    }

                });

            },

        };

        call.main();

    }


    __(document).ready(fs);


})(window,document,jQuery,jQuery.fn);