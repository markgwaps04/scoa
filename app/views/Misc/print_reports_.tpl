{include "`$root`public\included_template\global_functions.tpl"}

{* from server *}

{assign fs_class $fs}
{assign org $org_details[0]}
{assign checklist $checklist_class}



{assign cash_received $checklist->getFsAttributes($org.RCode,"cash_received")}

<html>


<head>

    <link href="{$css}bootstrap.min.css" rel="stylesheet">
    <link href="{$css}scoa.css" rel="stylesheet">
    <link href="{$css}scoa_default.css" rel="stylesheet">

    <link href="{$css}plugins/spreadsheet/jquery-confirm.css" rel="stylesheet">


    <style>


        @media print {
            thead {
                display: table-header-group;
            }
        }

        body {

            background: unset;

        }


        #title p {

            line-height: 13px;
            font-family: auto;
            font-size: 20px;
            color: #3d3d3d;
            font-weight: bold;
            text-align: center;

        }

        table.fields thead , table.fields thead , table.fields tfoot {

            font-family: Serif;
            color: black;
            font-weight: bold;

        }

        table.fields thead , table.fields thead , table.fields tfoot:not(.skip) {

            font-size: 20px;

        }


        table.fields thead th:first-child, tfoot th:first-child {

            text-align: center;
            padding-bottom: 20px !important;
            padding-top: 20px !important;

        }




        #signature h3 {

            font-family: Serif;
            font-size: 13px;
            color: #3d3d3d;
            font-weight: bold;

        }

        table {

            padding: 20px;

        }

        table#_content , table.fields{

            margin-top: 29px;

        }


        table#_content tfoot {



        }

        table td {

            font-size: 15px;
            color: black;
            text-align: center;

        }

        address hr {

            margin-top: 0px;
            color: black !important;
            background: black !important;
            height: 2.0px;
            margin-bottom: 3px;


        }

        address {
            position: relative;
            width: 266px;
            text-align: center;
        }


        address span {


            color: black;
            font-weight: bold;

        }




        address .sign img {

            position: absolute;
            top: -20px;
            left: 39%;
            max-width: 100px !important;
            right: 39%;

        }

        .field_state {

            text-align: left;

        }

        .fs_section {

            page-break-before: always;

        }

    </style>

</head>


<body>



{capture signatures}

    <br>
    <br>

    <div class="ibox-content p-xl no-borders" style="padding-left: 15%;">

        <div class="row field_state">

            <div class="col-sm-5">

                <h4>Prepared by :</h4>

            </div>


        </div>

        {* @param $position @param integerTypePosition *}

        {function set_user}

            {assign details $fs->getUserByPosition($integerTypePosition)}

            {if $details}


                <div class="row">

                    <div class="col-sm-5">

                        <div class="field_state">{$state}</div>

                        <address style="padding-left: 10%;padding-top: 5%;">


                            {if $details.sign_svgbase64 and $details.sign_svgbase64 != "image/jsignature;base30,"}


                                {if $details.FS_state}


                                    <span class="sign">

                                           <img src="data:{$details.sign_svgbase64}">

                                       </span>


                                {/if}


                            {/if}


                            {call user_fullname param=$details assign="user_name" assign=user_name}

                            <span>{$user_name|default:"User"|upper}</span>

                            <hr style="margin-top: 0px;color: black">

                            <span>Org/Dept {$position|capitalize}</span>


                        </address>

                    </div>


                </div>

                <br>


            {/if}


        {/function}


        {call set_user position="Treasurer" integerTypePosition=1 }

        {call set_user position="Auditor" integerTypePosition=2 }

        {call set_user position="Governor " integerTypePosition=4 }

        {call set_user position="President " integerTypePosition=3 }

        {call set_user position="Chairperson " integerTypePosition=5 state="<h4>Approved by :</h4>" }


    </div>


{/capture}




{function getEnded}

    {assign batch $checklist->getBatchDetails()}

    {assign deadline $batch.deadline}

    {if $deadline}

        For The Semester Ended {$deadline|date_format:"%B %d, %Y"}

    {else}

        For This Semester Starting From {$batch.date_time|date_format:"%B %d, %Y"}

    {/if}


{/function}

<center>

    <table style="width: 100%" id="fs_body_print">

        <thead>

        <tr>
            <th>


                <img src="{$public}/files/default_image/scoa_header.png" id="image" style="display: none">

               <center>

                   <canvas id="header" style="padding-bottom: 40px"></canvas>

               </center>


            </th>
        </tr>

        </thead>

        <tbody>

        <tr>

            <td>

                <div id="cash_collection_report" class="fs_section">


                    <div id="title">

                        <p>{$org.name|default:"Unspecified Organization"|upper}</p>
                        <p>CASH COLLECTION REPORT</p>
                        <p>{call getEnded}</p>

                    </div>


                    <center>

                        <table id="_content" class="fields">


                        </table>

                    </center>



                    {$smarty.capture.signatures}


                </div>



                <p style="page-break-after: always">&nbsp;</p>



                <div id="cash_received" class="fs_section" >

                    <br>

                    <div id="title">

                        <p>{$org.name|default:"Unspecified Organization"|upper}</p>
                        <p>STATEMENT OF CASH RECEIVED</p>
                        <p>{call getEnded}</p>

                    </div>


                    <center>

                        <table id="_content" class="fields"></table>

                    </center>



                    {$smarty.capture.signatures}


                </div>

                <p style="page-break-after: always">&nbsp;</p>


                <div id="cash_flows" class="fs_section" >

                    <div id="title">

                        <p>{$org.name|default:"Unspecified Organization"|upper}</p>
                        <p>STATEMENT OF CASH FLOWS</p>
                        <p id="endedOf">{call getEnded}</p>

                    </div>


                    <center>

                        <table id="_content" class="fields"></table>

                    </center>



                    {$smarty.capture.signatures}


                </div>

                <p style="page-break-after: always">&nbsp;</p>

                <disbursement_section></disbursement_section>

                <statement_disbursement_section></statement_disbursement_section>


            </td>

        </tr>

        </tbody>

    </table>

</center>






<script type="text/html" id="template">

    <div id="cash_flows" class="fs_section" >

        <div id="title">

            <p>{$org.name|default:"Unspecified Organization"|upper}</p>
            {literal} {details} {/literal}

        </div>


        <center>

            <table id="_content" class="fields">

              {literal}  {content} {/literal}

            </table>

        </center>



        {$smarty.capture.signatures}


    </div>

    <p style="page-break-after: always">&nbsp;</p>


</script>




<script src="{$js}jquery-3.1.1.min.js"></script>

<script src="{$js}bootstrap.min.js"></script>

<script src="{$js}plugins/printThis/printThis.js"></script>

<script src="{$js}plugins/jexcel/numeral.min.js"></script>

<script src="{$js}plugins/spreadsheet/jquery-confirm.js"></script>

<script src="{$js}scoa.js" crossorigin="anonymous"></script>

<script src="{$js}plugins/breeze/lodash.js?pin={$pin}" crossorigin="anonymous"></script>

<script src="{$js}/scoa/scoa_print_reports.js?pin={$pin}" crossorigin="anonymous"></script>



<script>

    window.scoa_token = `{$org.url}`;
    window.member_code = `{$org.member_code}`;


    $(document).ready(function() {

        window.reports(window.scoa_token);

        /** check css **/


        const isNotImportant = function(_col) {


            /** check if all fields is empty **/

            const not_emptys = _col.filter(e => e.value);

            if(!not_emptys.length) return true;

            /** @end **/

            const filter = function(cell) {

                if(!cell.hasOwnProperty("cssVal") || cell.css === "")

                    return false;


                const check_css = function(_class) {

                    if(_class === "background" && cell.cssVal[_class] === "#FFFFFF") return false

                    const check_valid = _class == "text-align" || _class == "color";

                    if(check_valid) return false;

                    return cell.cssVal[_class];

                }

                return Object
                    .keys(cell.cssVal)
                    .filter(check_css)
                    .length;

            }


            return _col
                .filter(filter)
                .length;


        }


        const toStyle = function(style) {

            return Object.keys(style)
                .map(e => e+":"+(style[e]))
                .join(";")

        }




        /** header **/

        let img = document.getElementById("image");

        let canvas = document.getElementById("header");

        canvas.width = 700;
        canvas.height = 150;

        let ctx = canvas.getContext('2d');


        ctx.drawImage(img,0.3,0.5,canvas.width,canvas.height);
        img.src = canvas.toDataURL();

        /** @end header **/


        /** data parsing **/

        const uri = {

            url : window.scoa_token,
            member_code : window.member_code

        };



        {literal}

        const cash_report = function(data) {

            if(scoa.isEmpty(data))

                throw new Error("cash report no data specified");

            const json = data._toJSON();

            if(!json.hasOwnProperty("print_format_report")) return;

            const cash_report = JSON.parse(json.print_format_report);

            const tdStyles = {
                "padding":"1px 60px 10px 1px"
            }

            const _tdStyles = Object.keys(tdStyles)
                .map(e => e+":"+(tdStyles[e]));


            var template = '',
                total = 0.00;


            template = [

                "<thead>",
                `<th  style='${_tdStyles}'>Collection Receipt Number</th>`,
                `<th style='${_tdStyles}'>Amount</th>` ,
                "</thead>"

            ].join(" ")


            template += "<tbody>";


            for(let row in cash_report)
            {

                template +="<tr>";

                if(!cash_report[row].hasOwnProperty("column") || cash_report[row].length === 3)

                    throw new Error("Some of row has no columns or invalid data");

                const col = cash_report[row]["column"];

                const FROM = 0 , TO = 1, AMOUNT = 2;

                const checkImportance = !isNotImportant(col);

                const defaultFromTo = (checkImportance ? 0 : null);

                const _from = col[FROM].cssVal || {};

                const _to = col[TO].cssVal || {};



                /** from and to fields **/

                template+= [

                    `<td style='${_tdStyles}'>`,

                    `<span style='${toStyle(_from)}'>`,

                    checkImportance ? "From OR#" : "",

                    col[FROM].value || defaultFromTo,

                    `</span>`,,

                    `<span style='${toStyle(_to)}'>`,

                    checkImportance ? "to OR#" : "",

                    col[TO].value || defaultFromTo,

                    "<span>",

                    "</td>"


                ].join(" ")


                const amount = numeral(col[AMOUNT].value);

                const localscopeStyle = Object.assign({},tdStyles);

                const _amountStyle = Object.assign(localscopeStyle,col[AMOUNT].cssVal || {},false) ;


                template+= [

                    `<td style='${toStyle(_amountStyle)}'>`,

                    (amount._value ? amount.format("0,0.00") : (col[AMOUNT].value || "") ) ,

                    "</td>"

                ].join(" ");


                total += amount._value || 0;



            }


            template += "</tbody>";

            const formattedTotal = numeral(total).format("0,0.00");

            template += [

                "<tfoot>",
                "<tr>",
                `<th  style='${_tdStyles}'>Total Amount of Collection Receipt</th>`,
                `<th style='${_tdStyles}'>${formattedTotal}</th>` ,
                "</tr>",
                "</tfoot>"

            ].join(" ")

            $("#cash_collection_report #_content").html(template);


        }


        const cash_received = function(data) {

            const json = JSON.parse(data);

            if(!json.hasOwnProperty("print_format_received")) return;

            const cash_received = JSON.parse(json.print_format_received);

            const tdStyles = {
                "padding":"1px 60px 10px 60px"
            }

            var template = '',
                total = 0.00;

            template += "<tbody>";

            for(let row in cash_received)
            {

                template +="<tr>";

                if(!cash_received[row].hasOwnProperty("column") || cash_received[row].length === 2)

                    throw new Error("Some of row has no columns or invalid data");

                const col = cash_received[row]["column"];

                const TITLE = 0 , AMOUNT = 1;

                var localscopeStyle = Object.assign({},tdStyles);

                const _Title_styles = Object.assign(localscopeStyle,col[TITLE].cssVal || {},false) ;

                localscopeStyle = Object.assign({},tdStyles);

                const _Amount_styles = Object.assign(localscopeStyle,col[AMOUNT].cssVal || {},false);

                const _amount = numeral(col[AMOUNT].value);

                const checkImportance = !isNotImportant(col);

                total += _amount._value || 0;


                /** body **/

                template+= [

                    `<td style='${toStyle(_Title_styles)}'>`,
                    col[TITLE].value,
                    `</td>`,
                    `<td style='${toStyle(_Amount_styles)}'>`,
                    checkImportance ? (_amount._value ? _amount.format("0,0.00") : col[AMOUNT].value ) : col[AMOUNT].value  ,
                    `</td>`

                    ].join(" ");

            }

            template += "</tbody>"

            const formattedTotal = numeral(total).format("0,0.00");

            localscopeStyle = Object.assign({},tdStyles);

            const _Total_styles = Object.assign(localscopeStyle,{"font-weight":"bold"},false);

            template += [

                "<tfoot class='skip'>",
                "<tr>",
                `<th  style='${toStyle(_Total_styles)}'>Total Amount of Cash Received </th>`,
                `<th style='${toStyle(_Total_styles)}'>${formattedTotal}</th>` ,
                "</tr>",
                "</tfoot>"

            ].join(" ")


            $("#cash_received #_content").html(template);

            return formattedTotal;

        }


        const cash_flows = function(data,total_received) {

            const json = JSON.parse(data);

            if(!json.hasOwnProperty("print_format_flow")) return;

            const cash_flows = JSON.parse(json.print_format_flow);

            const tdStyles = {
                "padding":"1px 20px 10px 20px"
            }

            const _tdStyles = Object.keys(tdStyles).map(e => e+":"+(tdStyles[e]));

            var template = '',
                total = 0.00;

            template = [

                "<thead>",
                `<th  style='padding: 0px 137px 0px 26px;text-align:left'>Total Cash Received</th>`,
                `<th  style='${_tdStyles}'></th>`,
                `<th style='${_tdStyles}'>P ${total_received}</th>` ,
                "</thead>"

            ].join(" ")

            template += "<tbody>";



            template += [
                "<tr><td style='padding-top: 15px'></td></tr>",
                "<tr>",
                `<td style="padding: 0px 137px 0px 26px;text-align:left">Cash Disbursement:</td>`,
                `<td style="${_tdStyles}"></td>`,
                `<td style="${_tdStyles}"></td>`,
                "</tr>"

            ].join(" ");


            var obj_to_return = [];

            for(let row in cash_flows)
            {


                template +="<tr>";

                if(!cash_flows[row].hasOwnProperty("column") || cash_flows[row].length === 2)

                    throw new Error("Some of row has no columns or invalid data");

                const col = cash_flows[row]["column"];

                const ACTIVITY = 0 , AMOUNT = 1;

                const checkImportance = !isNotImportant(col);


                const styling = function(cssVal,_default) {

                    const localscopeStyle = Object.assign({},_default || tdStyles);

                    return Object.assign(Object.assign({},_default || tdStyles),cssVal)

                }

                const _activity = styling(col[ACTIVITY].cssVal,{

                    padding : "0px 137px 0px 26px",
                    "text-align": "left",

                })


                const amount_val = numeral(col[AMOUNT].value);

                const _amount =  styling(col[AMOUNT].cssVal) || {};


                const count = numeral(row)
                    .add(1)
                    ._value;


                obj_to_return.push({
                    index : cash_flows[row].index ,
                    note : "NOTE "+ count,
                    name : col[ACTIVITY].value,
                    isImportant : checkImportance
                });


                template+= [

                    `<td style='${toStyle(_activity)}'>`,

                    checkImportance ? `Activity ${count}: ${col[ACTIVITY].value}` : col[ACTIVITY].value,

                    "</td>",

                    `<td style="${_tdStyles}">`,

                    checkImportance ? `NOTE ${count}` : "",

                    "</td>",

                    `<td style="${toStyle(_amount)}">`,
                    checkImportance ? (amount_val ? amount_val.format("0,0.00") : col[AMOUNT].value ) : col[AMOUNT].value,
                    `</td>`


                ].join(" ")

                template +="</tr>";

                total+= amount_val._value || 0

            }

            template+="<tbody>";

            /** footer **/

            var total_format = Math.abs(
                numeral(total_received)
                .subtract(total)
                ._value
            )

            total_format = numeral(total_format).format("0,0.00");

            template += [

                "<tfoot>",
                "<tr>",
                `<th  style='padding: 0px 137px 0px 26px;text-align: left'>Ending Cash Balance </th>`,
                `<th style='${toStyle(_tdStyles)}'></th>` ,
                `<th style='${toStyle(_tdStyles)}'>P  ${total_format}</th>` ,
                "</tr>",
                "</tfoot>"

            ].join(" ")

            $("#cash_flows #_content").html(template);

            return obj_to_return;

        }


        const _disbursements = function(data,flow,callback) {


            const json = JSON.parse(data);

            if(!json.hasOwnProperty("print_format_disbursement")) return;

            const disbursement = JSON.parse(json.print_format_disbursement) || [];


            const filter_valid = disbursement.map(function(row) {

                if(!row.column.length >= 6) return;

                const activityId = row.column[0];

                if(!activityId.value.trim()) return;

                const split = activityId.value.split(",");

                if(split.length != 2) return

                if(!(split[1]+"".trim())) return;

                row["activityIdentifier"] = split[1];

                return row;

            }).filter(Boolean);

            const grouped_data = _.groupBy(filter_valid,"activityIdentifier");


            /** identify every activity and get full details */

            const every_activity = flow.forEach(function(activity,index) {

                /** get disbursement **/

                const disbursement = grouped_data[activity.index] || [];


                if(typeof callback === "function") {

                    callback(disbursement,index,activity)

                }


            })



        }


        const note_disbursement = function(data,flow) {


            _disbursements(data,flow,function(disbursement,index,activity){


                const inlineStyle = {
                    "padding":"1px 20px 10px 20px"
                }


                var total = 0;

                var template = $("#template").html();

                template = template.setTokens(
                    {
                        details : [
                            "<p>NOTES ON CASH DISBURSESMENT</p>",
                            "<p>(Note "+(index+1)+")</p>"
                        ].join(""),
                    })


                var temp = "<thead>";

                temp+="<tr>";
                temp+=`<th colspan='4' style='text-align: left;padding":"1px 20px 10px 20px; font-size: 16px;'>Activity ${(index+1)}:  ${activity.name} </th>`;
                temp+="</tr>";



                temp += "<tr>";

                temp+= `<td style="padding:1px 25px 10px 25px;font-weight: bold"> Date  </td>`

                temp+= `<td style="padding:1px 25px 10px 25px;font-weight: bold"> Particular  </td>`

                temp+= `<td style="padding:1px 25px 10px 25px;font-weight: bold"> Reference Number (OR/AR/TS)  </td>`

                temp+= `<td style="padding:1px 25px 10px 25px;font-weight: bold"> Amount  </td>`

                temp += "</tr>";

                temp+="</thead>"

                temp+="<tbody>";



                disbursement.forEach(function (row) {


                    try {

                        const cell = row.column;

                        const amount = numeral(cell[5].value)._value || "";

                        temp+="<tr>";

                        temp+=`<td style="${toStyle(inlineStyle)}">${cell[1].value}</td>`;

                        temp+=`<td style="${toStyle(inlineStyle)}">${cell[3].value}</td>`;

                        temp+=`<td style="${toStyle(inlineStyle)}">${cell[2].value}</td>`;

                        temp+=`<td style="${toStyle(inlineStyle)}">${amount}</td>`;

                        temp+=`</tr>`;

                        total+= amount;

                    }catch(err){}





                })

                temp+="</tbody>";

                temp+="<tfoot>";


                temp+="<tr>";

                temp+="<td colspan='3' style='text-align: left;'><br><br><i>TOTAL EXPENSE INCURRED</i></td>"

                temp+=`<td><br></br>P ${numeral(total).format("0,0.00")}</td>`

                temp+="</tr>";

                temp+="</tfoot>";

                template = template.setTokens({"content" : temp})

                $("disbursement_section").append(template);



            })

        }

        const statement_disbursement = function(data,flow) {

            _disbursements(data,flow,function(disbursement,index,activity){


                if(!activity.isImportant) return;

                const byType = disbursement.map(function(row) {

                    if(!(row.column.length >= 6)) return;

                    return {type : row.column[4].value , amount : row.column[5].value}

                });


                if(!byType.length) return;


                var groupByType = _.groupBy(byType,"type");


                groupByType = Object.keys(groupByType).map(e => {

                    const total = _.sumBy(groupByType[e],function(curr){

                        return numeral(curr.amount)._value;

                    });

                   return {type : e , amount : total || 0}

                })


                groupByType = _.orderBy(groupByType, ['type'],['asc']);


                var total = 0;

                var template = $("#template").html();

                const ended = $("#endedOf").text()

                template = template.setTokens(
                    {
                        details : [
                            "<p>STATEMENT OF CASH DISBURSESMENT</p>",
                            "<p>"+ended+"</p>"
                        ].join(""),
                    })


                var temp = [

                    "<thead><tr>",
                    "<th {attr} style='{style}'> Activity {activity} </th>",
                    "<th {attr} style='{style}'></th>",
                    "</tr>",


                    "<tr>",
                    "<th {attr} style='{style1}'> DISBURSEMENTS:  </th>",
                    "<th {attr} style='{style1}'></th>",
                    "</tr>",
                    "</thead>",

                    "<tbody>{content}</tbody>",


                    "<tfoot>",
                    "<tr>",
                    `<td style="text-align: left;" ><br></br><i>Total Disbursement </i></td>`,
                    `<td style="text-align: left;padding:1px 10px 5px 134px;width:50%" ><br></br>P {total}</td>`,
                    "</tr>",
                    "</tfoot>"

                ].join("");


                var content = "",
                    totalOf = 0;

                groupByType.forEach(function(e) {


                    content += [

                        "<tr>",
                        "<td style='{style1}'>{type}</td>",
                        "<td style='{style2}'>{amount}</td>",
                        "</tr>"

                    ].join("");

                    content = content.setTokens({
                        type : e.type,
                        amount :numeral(e.amount).format("0,0.00") ,
                        style1: "padding:1px 100px 5px 20px ;text-align:left",
                        style2: "padding:1px 10px 5px 134px;",
                    })

                    totalOf += numeral(e.amount)._value || 0;

                })


               temp = temp.setTokens({content : content})


                temp = temp.setTokens({

                    activity : (index+1)+": "+ activity.name ,

                    attr : "colspan='2'",

                    total : numeral(totalOf).format("0,0.00"),

                    style : toStyle({
                        "text-align" : "left",
                        "padding" : "1px 0px 10px 0px",
                        "font-size" : "16px"
                    }),


                    style1 : toStyle({
                        "text-align" : "left",
                        "padding" : "1px 0px 5px 0px",
                        "font-size" : "16px"
                    }),

                })



                template = template.setTokens({
                    content : temp
                })




                $("statement_disbursement_section").append(template);

            });

        }


        {/literal}

        const pathURL = location
            .pathname
            .split("/");

        pathURL.pop();
        pathURL.pop();

        const sourceURL =  pathURL.join("/")+"/getUnformattedData";

        $.post(sourceURL,uri,function(data) {

            cash_report(data);

            const total_received = cash_received(data);

            const flow_identity = cash_flows(data,total_received);

            note_disbursement(data,flow_identity);

            statement_disbursement(data,flow_identity)

            window.print();

        });


        /** @end of data parsing **/




        window._print = function() {

            $("#fs_body_print")
                .printThis({
                    pageTitle: "<h1>Hello</h1>",
                    printContainer: true,
                    importCSS: true,
                    importStyle: true,
                    canvas: true,
                    removeScripts: false,
                    header: "<center><img src='" + canvas.toDataURL() + "'></center>",
                    loadCSS: [

                        "{$css}scoa.css",
                        "{$css}scoa_default.css"

                    ]

                });


        }



        //window._print();




    });







</script>

</body>

</html>