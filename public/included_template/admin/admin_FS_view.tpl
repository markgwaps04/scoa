





{* parent template inbox_view.tpl *}


{* see templete inbox_view.tpl *}

{assign info $info}





<link rel="stylesheet" href="{$css}plugins/jexcel/jquery.jexcel.css" type="text/css" />

<script src="{$js}plugins/jexcel/jquery.jexcel.js?{$pin}"></script>

<script src="{$js}plugins/jexcel/jquery.jdropdown.js"></script>

<script src="{$js}plugins/jexcel/jquery.jcalendar.js"></script>

<link rel="stylesheet" href="{$css}plugins/jexcel/jquery.jdropdown.css" type="text/css" />

<link rel="stylesheet" href="{$css}plugins/jexcel/jquery.jcalendar.css" type="text/css" />

<script src="{$js}plugins/jexcel/excel-formula.min.js"></script>





<div class="tabs-container">


    <ul class="nav nav-tabs">

        <li class="active"><a data-toggle="tab" href="#admin_fs_view_1">Collection Report</a></li>
        <li class=""><a data-toggle="tab" href="#admin_fs_view_2">Cash Received</a></li>
        <li class=""><a data-toggle="tab" href="#admin_fs_view_3">Cash Flows</a></li>
        <li class=""><a data-toggle="tab" href="#admin_fs_view_4">Notes</a></li>
        <li class=""><a data-toggle="tab" href="#admin_fs_view_5">Statements</a></li>

    </ul>



    <div class="tab-content scoa-tabs">

        <div error-placement></div>


        <div id="admin_fs_view_1" class="tab-pane active">

            <div class="panel-body">

                <div class="full-height-scroll full-width-scroll white-bg border-left">

                    <table scoa-table data-options='
                allowDeleteColumn:false,
                allowDeleteRow:false,
                columnSorting:false,
                rowDrag:false,
                editable:false,
                allowInsertRow:false,
                allowInsertColumn:false,
                colWidths: [216,216,230],
                csvFileName: scoa_{$pin},
                isColumnFixed : true,{literal}
                nestedHeaders:[{"title" : "Receipt" ,"colspan" : 2}{/literal}]' class="report">
                        <thead>

                        <tr>

                            <th>
                                <b>From</b>
                            </th>

                            <th>
                                <b>To</b>
                            </th>

                            <th data-options="numeric: true">
                                <b>Amount</b>
                            </th>
                        </tr>

                        </thead>

                        <thbody>

                            <tr>
                                <td data-options="readOnly:true">Cge lang</td>
                                <td data-options="readOnly:true">Cge lang</td>
                                <td data-options="readOnly:true">Cge lang</td>
                            </tr>

                            {assign cash_report $checklist_class->getFsAttributes($info.r_code,"cash_collection_report")}

                            {$cash_report->getXML()}

                        </thbody>


                    </table>

                </div>

            </div>

        </div>


        <div id="admin_fs_view_2" class="tab-pane">
            <div class="panel-body">

                <div class="full-height-scroll full-width-scroll white-bg border-left">

                    <table scoa-table data-options='
                allowDeleteColumn:false,
                allowDeleteRow:false,
                columnSorting:false,
                rowDrag:false,
                editable:false,
                allowInsertRow:false,
                allowInsertColumn:false,
                colWidths: [335,335],
                csvFileName:scoa_{$pin}' class="received checklist-fs">

                        <thead>


                        <tr>

                            <th><b>Title</b></th>

                            <th data-options="numeric: true"><b>Amount</b></th>

                        </tr>


                        </thead>

                        <thbody>


                            {assign cash_received $checklist_class->getFsAttributes($info.r_code,"cash_received")}

                            {$cash_received->getXML()}


                        </thbody>

                    </table>


                </div>

            </div>
        </div>


        <div id="admin_fs_view_3" class="tab-pane">
            <div class="panel-body">

                <div class="full-height-scroll full-width-scroll white-bg border-left">

                    <table scoa-table data-options='
                allowDeleteColumn:false,
                allowDeleteRow:false,
                columnSorting:false,
                rowDrag:false,
                editable:false,
                allowInsertRow:false,
                allowInsertColumn:false,
                colWidths: [330,330],
                csvFileName: scoa_{$pin},
                isColumnFixed : true' class="cash-flows checklist-fs">

                        <thead>

                        <tr>

                            <th>
                                <b>Activity name</b>
                            </th>

                            <th data-options="numeric: true">
                                <b>Amount</b>
                            </th>

                        </tr>

                        </thead>


                        <thbody>


                            {assign cash_flow $checklist_class->getFsAttributes($info.r_code,"cash_flows")}


                            {$cash_flow->getXML()}


                        </thbody>

                    </table>


                </div>

            </div>
        </div>




        <div id="admin_fs_view_4" class="tab-pane">
            <div class="panel-body">

                <table scoa-table data-options='
                allowDeleteColumn:false,
                allowDeleteRow:false,
                columnSorting:false,
                rowDrag:false,
                editable:false,
                allowInsertRow:false,
                allowInsertColumn:false,
                colWidths: [170,170,170,170],
                csvFileName: scoa_{$pin},
                isColumnFixed : true' class="cash-disbursement checklist-fs _cash_flow">

                    <thead>

                    <tr>


                        {assign cash_flow $checklist_class->getFsAttributes($info.r_code,"cash_flows")}

                        {assign source $cash_flow->getData() }

                        <th data-options='type : dropdown , source: {$source}'><b>Activity</b></th>
                        <th data-options="type : calendar"><b>Date</b></th>
                        <th><b>Particular</b><p>(OR/AR/TS)</p></th>
                        <th data-options="numeric: true"><b>Amount</b></th>

                    </tr>

                    </thead>


                    <thbody>


                        {assign cash_disbursement $checklist_class->getFsAttributes($info.r_code,"note_disbursement")}


                        {$cash_disbursement->getXML()}


                    </thbody>


                </table>

            </div>
        </div>



        <div id="admin_fs_view_5" class="tab-pane">
            <div class="panel-body">

                <table scoa-table data-options='
                allowDeleteColumn:false,
                allowDeleteRow:false,
                columnSorting:false,
                rowDrag:false,
                editable:false,
                allowInsertRow:false,
                allowInsertColumn:false,
                colWidths: [220,220,220],
                csvFileName: scoa_{$pin},
                isColumnFixed : true' class="cash-statement checklist-fs _cash_flow">

                    <thead>

                    <tr>

                        {assign cash_flow $checklist_class->getFsAttributes($info.r_code,"cash_flows")}

                        {assign source $cash_flow->getData() }

                        <th data-options='type : dropdown , source: {$source}'>
                            <b>Activity</b>
                        </th>

                        <th data-options="type : text">
                            <b>Total Amount of</b>
                        </th>

                        <th data-options="numeric:true">
                            <b>Amount</b>
                        </th>


                    </tr>

                    </thead>

                    <thbody>

                        {assign cash_disbursement $checklist_class->getFsAttributes($info.r_code,"cash_statement")}

                        {$cash_disbursement->getXML()}

                    </thbody>

                </table>

            </div>

        </div>


    </div>


</div>


<script>

    $(document).ready(function () {

        window._setFS("{$info.r_code}");

    });


</script>
