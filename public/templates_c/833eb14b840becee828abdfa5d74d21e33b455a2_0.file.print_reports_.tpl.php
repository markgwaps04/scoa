<?php
/* Smarty version 3.1.33, created on 2019-05-13 11:36:41
  from 'C:\laragon\www\SCOA\app\views\Misc\print_reports_.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd8e64929c0c7_33372815',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '833eb14b840becee828abdfa5d74d21e33b455a2' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\app\\views\\Misc\\print_reports_.tpl',
      1 => 1556594158,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd8e64929c0c7_33372815 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'set_user' => 
  array (
    'compiled_filepath' => 'C:\\laragon\\www\\SCOA\\public\\templates_c\\833eb14b840becee828abdfa5d74d21e33b455a2_0.file.print_reports_.tpl.php',
    'uid' => '833eb14b840becee828abdfa5d74d21e33b455a2',
    'call_name' => 'smarty_template_function_set_user_15721553045cd8e648b582a1_28908417',
  ),
  'getEnded' => 
  array (
    'compiled_filepath' => 'C:\\laragon\\www\\SCOA\\public\\templates_c\\833eb14b840becee828abdfa5d74d21e33b455a2_0.file.print_reports_.tpl.php',
    'uid' => '833eb14b840becee828abdfa5d74d21e33b455a2',
    'call_name' => 'smarty_template_function_getEnded_15721553045cd8e648b582a1_28908417',
  ),
));
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\global_functions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


<?php $_smarty_tpl->_assignInScope('fs_class', $_smarty_tpl->tpl_vars['fs']->value);
$_smarty_tpl->_assignInScope('org', $_smarty_tpl->tpl_vars['org_details']->value[0]);
$_smarty_tpl->_assignInScope('checklist', $_smarty_tpl->tpl_vars['checklist_class']->value);?>



<?php $_smarty_tpl->_assignInScope('cash_received', $_smarty_tpl->tpl_vars['checklist']->value->getFsAttributes($_smarty_tpl->tpl_vars['org']->value['RCode'],"cash_received"));?>

<html>


<head>

    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
scoa.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
scoa_default.css" rel="stylesheet">

    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/spreadsheet/jquery-confirm.css" rel="stylesheet">


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



<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'signatures', null, null);?>

    <br>
    <br>

    <div class="ibox-content p-xl no-borders" style="padding-left: 15%;">

        <div class="row field_state">

            <div class="col-sm-5">

                <h4>Prepared by :</h4>

            </div>


        </div>

        
        


        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'set_user', array('position'=>"Treasurer",'integerTypePosition'=>1), true);?>


        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'set_user', array('position'=>"Auditor",'integerTypePosition'=>2), true);?>


        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'set_user', array('position'=>"Governor ",'integerTypePosition'=>4), true);?>


        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'set_user', array('position'=>"President ",'integerTypePosition'=>3), true);?>


        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'set_user', array('position'=>"Chairperson ",'integerTypePosition'=>5,'state'=>"<h4>Approved by :</h4>"), true);?>



    </div>


<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>






<center>

    <table style="width: 100%" id="fs_body_print">

        <thead>

        <tr>
            <th>


                <img src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/default_image/scoa_header.png" id="image" style="display: none">

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

                        <p><?php echo mb_strtoupper((($tmp = @$_smarty_tpl->tpl_vars['org']->value['name'])===null||$tmp==='' ? "Unspecified Organization" : $tmp), 'UTF-8');?>
</p>
                        <p>CASH COLLECTION REPORT</p>
                        <p><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'getEnded', array(), true);?>
</p>

                    </div>


                    <center>

                        <table id="_content" class="fields">


                        </table>

                    </center>



                    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'signatures');?>



                </div>



                <p style="page-break-after: always">&nbsp;</p>



                <div id="cash_received" class="fs_section" >

                    <br>

                    <div id="title">

                        <p><?php echo mb_strtoupper((($tmp = @$_smarty_tpl->tpl_vars['org']->value['name'])===null||$tmp==='' ? "Unspecified Organization" : $tmp), 'UTF-8');?>
</p>
                        <p>STATEMENT OF CASH RECEIVED</p>
                        <p><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'getEnded', array(), true);?>
</p>

                    </div>


                    <center>

                        <table id="_content" class="fields"></table>

                    </center>



                    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'signatures');?>



                </div>

                <p style="page-break-after: always">&nbsp;</p>


                <div id="cash_flows" class="fs_section" >

                    <div id="title">

                        <p><?php echo mb_strtoupper((($tmp = @$_smarty_tpl->tpl_vars['org']->value['name'])===null||$tmp==='' ? "Unspecified Organization" : $tmp), 'UTF-8');?>
</p>
                        <p>STATEMENT OF CASH FLOWS</p>
                        <p id="endedOf"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'getEnded', array(), true);?>
</p>

                    </div>


                    <center>

                        <table id="_content" class="fields"></table>

                    </center>



                    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'signatures');?>



                </div>

                <p style="page-break-after: always">&nbsp;</p>

                <disbursement_section></disbursement_section>

                <statement_disbursement_section></statement_disbursement_section>


            </td>

        </tr>

        </tbody>

    </table>

</center>






<?php echo '<script'; ?>
 type="text/html" id="template">

    <div id="cash_flows" class="fs_section" >

        <div id="title">

            <p><?php echo mb_strtoupper((($tmp = @$_smarty_tpl->tpl_vars['org']->value['name'])===null||$tmp==='' ? "Unspecified Organization" : $tmp), 'UTF-8');?>
</p>
             {details} 

        </div>


        <center>

            <table id="_content" class="fields">

                {content} 

            </table>

        </center>



        <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'signatures');?>



    </div>

    <p style="page-break-after: always">&nbsp;</p>


<?php echo '</script'; ?>
>




<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
jquery-3.1.1.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
bootstrap.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/printThis/printThis.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/jexcel/numeral.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/spreadsheet/jquery-confirm.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
scoa.js" crossorigin="anonymous"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/breeze/lodash.js?pin=<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" crossorigin="anonymous"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
/scoa/scoa_print_reports.js?pin=<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" crossorigin="anonymous"><?php echo '</script'; ?>
>



<?php echo '<script'; ?>
>

    window.scoa_token = `<?php echo $_smarty_tpl->tpl_vars['org']->value['url'];?>
`;
    window.member_code = `<?php echo $_smarty_tpl->tpl_vars['org']->value['member_code'];?>
`;


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

                        "<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
scoa.css",
                        "<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
scoa_default.css"

                    ]

                });


        }



        //window._print();




    });







<?php echo '</script'; ?>
>

</body>

</html><?php }
/* smarty_template_function_set_user_15721553045cd8e648b582a1_28908417 */
if (!function_exists('smarty_template_function_set_user_15721553045cd8e648b582a1_28908417')) {
function smarty_template_function_set_user_15721553045cd8e648b582a1_28908417(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
?>


            <?php $_smarty_tpl->_assignInScope('details', $_smarty_tpl->tpl_vars['fs']->value->getUserByPosition($_smarty_tpl->tpl_vars['integerTypePosition']->value));?>

            <?php if ($_smarty_tpl->tpl_vars['details']->value) {?>


                <div class="row">

                    <div class="col-sm-5">

                        <div class="field_state"><?php echo $_smarty_tpl->tpl_vars['state']->value;?>
</div>

                        <address style="padding-left: 10%;padding-top: 5%;">


                            <?php if ($_smarty_tpl->tpl_vars['details']->value['sign_svgbase64'] && $_smarty_tpl->tpl_vars['details']->value['sign_svgbase64'] != "image/jsignature;base30,") {?>


                                <?php if ($_smarty_tpl->tpl_vars['details']->value['FS_state']) {?>


                                    <span class="sign">

                                           <img src="data:<?php echo $_smarty_tpl->tpl_vars['details']->value['sign_svgbase64'];?>
">

                                       </span>


                                <?php }?>


                            <?php }?>


                            <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>$_smarty_tpl->tpl_vars['details']->value), true);
$_smarty_tpl->assign('user_name', ob_get_clean());?>


                            <span><?php echo mb_strtoupper((($tmp = @$_smarty_tpl->tpl_vars['user_name']->value)===null||$tmp==='' ? "User" : $tmp), 'UTF-8');?>
</span>

                            <hr style="margin-top: 0px;color: black">

                            <span>Org/Dept <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['position']->value);?>
</span>


                        </address>

                    </div>


                </div>

                <br>


            <?php }?>


        <?php
}}
/*/ smarty_template_function_set_user_15721553045cd8e648b582a1_28908417 */
/* smarty_template_function_getEnded_15721553045cd8e648b582a1_28908417 */
if (!function_exists('smarty_template_function_getEnded_15721553045cd8e648b582a1_28908417')) {
function smarty_template_function_getEnded_15721553045cd8e648b582a1_28908417(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>


    <?php $_smarty_tpl->_assignInScope('batch', $_smarty_tpl->tpl_vars['checklist']->value->getBatchDetails());?>

    <?php $_smarty_tpl->_assignInScope('deadline', $_smarty_tpl->tpl_vars['batch']->value['deadline']);?>

    <?php if ($_smarty_tpl->tpl_vars['deadline']->value) {?>

        For The Semester Ended <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['deadline']->value,"%B %d, %Y");?>


    <?php } else { ?>

        For This Semester Starting From <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['batch']->value['date_time'],"%B %d, %Y");?>


    <?php }?>


<?php
}}
/*/ smarty_template_function_getEnded_15721553045cd8e648b582a1_28908417 */
}
