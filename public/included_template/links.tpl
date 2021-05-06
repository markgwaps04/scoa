{extends "`$root`public\included_template\user\user_index_feed_structure.tpl"}






{function FS}


    {assign batchDetails $checklist_class->getBatchDetails()}


    {capture message}

        {if not $batchDetails.isDeadlineSet}


            <div class="alert semi-primary-background alert-dismissable">

                {*<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>*}

                <i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;

                Hi

                <a class="alert-link" href="#">
                    {call user_fullname param=$_currentUser}
                </a>

                as of now the scoa staff is not setted the deadline for this batch you can't
                approved the organization requirements this time.

            </div>


        {/if}


        {if $batchDetails.isDeadlineSet}



            {assign __FS $checklist_class->FS($org.RCode) }


            {if $__FS->is_valid_to_sign()}


                <div class="alert alert-warning semi-color alert-dismissable">
                    {*<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>*}

                    <i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;

                    <a class="alert-link" href="#">
                        {call user_fullname param=$user->current_user()}
                    </a>

                    Your approval as a position of Governor is required to submit this requirement

                </div>


            {/if}




            {assign FS_users  $__FS->getAlreadySignUsers()}


            <div class="alert semi-primary-background alert-dismissable">

                {*<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>*}

                <a class="alert-link">
                    <i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;
                </a>

                As a required of every organization we need an approval of other members to validate
                this requirement.



                {if $FS_users|count}

                    Users who approved this requirement

                    <div class="m-t-md">


                        <div class="user-friends inline">



                            {foreach $FS_users as $user => $every_user }


                                {assign _user "`$every_user.Firstname` `$every_user.Lastname`"}

                                <a href="javascript:void 0">
                                    <img alt="image" data-toggle="tooltip" data-placement="auto" title="" class="img-circle profile" src="{$profile}{$every_user.profile}" data-original-title="{$_user}">
                                </a>


                            {/foreach}



                        </div>

                    </div>

                {/if}




            </div>




        {/if}

    {/capture}





    {if $smarty.capture.message|trim}

        <div class="ibox informations float-e-margins no-padding border-bottom">
            <div class="ibox-title">

                <h5>

                    <a href="javascript:void 0">

                        <i class="fa fa-info-circle"></i>

                        Information

                    </a>

                </h5>


                <div class="ibox-tools">

                    <a class="collapse-link">
                        <i class="fa fa-chevron-down"></i>
                    </a>

                </div>


            </div>

            <div class="ibox-content" style="display: none">

                {$smarty.capture.message}

            </div>
        </div>


    {/if}




{/function}






{function FS_main_button_set}


    {assign __FS $checklist_class->FS($org.RCode) }


    <div class="modal-footer">


        <div class="col-sm-5 no-padding m-l-sm">
App
            <div class="alert pull-left no-padding">


                <a class="alert-link">
                    <i class="fa fa-check" style="font-size: 15px"></i>
                </a>

                Auto save

            </div>

        </div>


        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>


        {*<form class="inline" method="post">*}


        {*<input type="hidden" name="url" value="{$org.url}">*}


        {if $__FS->is_valid_to_sign()}

            <button type="submit" name="method" value="member_approved"  class="btn btn-primary post-button ladda-button" data-style="zoom-in" id="FS_submit">

                <i class="fa fa-check"></i>

                Approved

            </button>



        {/if}



        {if not $__FS->is_valid_to_sign()}


            <button type="submit" name="method" value="member_decline" class="btn btn-warning post-button  ladda-button" data-style="zoom-in" id="FS_submit">

                <i class="fa fa-times-circle"></i>

                Decline

            </button>

        {/if}


        {*</form>*}



    </div>



{/function}











{* @param id @param title @param body *}



{function tabs_structure}

    <div id="{$id}" class="tab-pane {$state}" style="width: 100%" >

        <div class="ibox" scoa-table-base-parent>
            <div class="ibox-title">

                <h5>{$title}</h5>

                <div class="ibox-tools">


                    <button class="btn btn-primary" type="button" data-toggle="tooltip" data-placement="bottom" data-original-title="Add row" scoa-button-add-row>
                        <i class="fa fa-plus"></i>
                    </button>

                    <button class="btn btn-default " data-toggle="tooltip" data-placement="bottom" data-original-title="redo"  type="button" scoa-button-redo>
                        <i class="fa fa-repeat"></i>
                    </button>

                    <button class="btn btn-default" type="button" data-toggle="tooltip" data-placement="bottom" data-original-title="undo" scoa-button-undo>
                        <i class="fa fa-undo"></i>
                    </button>

                    <button class="btn btn-outline btn-info" data-toggle="tooltip" data-placement="bottom" data-original-title="order toggle (asc,desc)"  type="button" scoa-button-order-by>
                        <i class="fa fa-sort-amount-asc"></i>
                    </button>

                    <button class="btn btn-outline btn-primary" data-toggle="tooltip" data-placement="bottom" data-original-title="download csv"  type="button" scoa-button-download>
                        <i class="fa fa-download"></i>
                    </button>

                    <button onclick="printJS('{$public}organization/print_reports/{$org.RCode}')" class="btn btn-outline btn-primary" data-toggle="tooltip" data-placement="bottom" data-original-title="download pdf"  type="button">
                        <i class="fa fa-file-pdf-o"></i>
                    </button>

                    <button class="fullscreen-link btn-outline btn btn-info" data-toggle="tooltip" data-placement="bottom" data-original-title="Full screen">
                        <i class="fa fa-expand"></i>
                    </button>


                </div>

            </div>

            <div class="ibox-content">

                {$body}

            </div>


        </div>

    </div>

{/function}







<script>



    {block innerscript append}


    {literal}




    //initialize post_box action

    jQuery.scoa._reset = function()
    {


        try{


            let scoa = jQuery.scoa;

            scoa.post_box._call("post_box *");

            scoa.file_input._call('#scoa-file-browser',"../feeds/upload");

            let create_post = scoa.create_post;

            create_post.uri = "../feeds/post_request";
            create_post.org_uri = {/literal}"{$user_club.url}"{literal};
            create_post._call('.post-button','.scoa-textarea');

            scoa.feed._call("feeds:last-of-type","{/literal}{$public}/feeds/users_post","{$user_club.url}"{literal});

            jQuery._scoa(
                {

                    postOptions : { Ajax_parameter : {url : {/literal}"{$user_club.url}"{literal}},


                    }
                });


        }catch(err)
        {

            console.log(err);

            swal("Reloading...", "authentication request failed please wait while reprocessing your request", "error");

            //window.location.reload();

        }

        return true;


    }();



    {/literal}



    {/block}

</script>



















{block content}


    {assign org $user_club}



    {if $request == "1"}

        <div class="alert alert-warning semi-color alert-dismissable hide-slowly">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>

            <i class="fa fa-warning" style="font-size: 15px"></i>&nbsp;

            <a class="alert-link">Error occured</a>

            We cant verify the request you sent

        </div>


    {/if}

    <div class="modal inmodal animated" id="FSModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">




        <script src="{$js}plugins/jexcel/jquery.jexcel.js?{$pin}"></script>

        <script src="{$js}plugins/jexcel/jquery.jdropdown.js"></script>

        <script src="{$js}plugins/jexcel/jquery.jcalendar.js"></script>

        <script src="{$js}plugins/jexcel/numeral.min.js"></script>

        <script src="{$js}plugins/jexcel/formula-parser.min.js"></script>

        <link rel="stylesheet" href="{$css}plugins/jexcel/jquery.jdropdown.css" type="text/css" />

        <link rel="stylesheet" href="{$css}plugins/jexcel/jquery.jcalendar.css" type="text/css" />

        <script src="{$js}plugins/jexcel/excel-formula.min.js"></script>

        <link href="{$css}plugins/toolbar/jquery.toolbar.css" rel="stylesheet">

        <script src="{$js}plugins/toolbar/jquery.toolbar.js"></script>


        <div class="modal-dialog modal-lg-1">


            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Financial Statements</h4>

                </div>


                <div class="modal-body">

                    <div class="display-none" error-placement></div>



                    {call FS}




                    <div class="fh-breadcrumb">

                        <div class="fh-column">

                            <div class="full-height-scroll">

                                <ul class="list-group elements-list">

                                    <li class="list-group-item active">
                                        <a data-toggle="tab" href="#scoaTab1">
                                            Collection Report
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a data-toggle="tab" href="#scoaTab2">
                                            Cash  Received
                                        </a>
                                    </li>

                                    <li class="list-group-item">

                                        <a data-toggle="tab" href="#scoaTab3">
                                            Cash Flows
                                        </a>


                                    </li>



                                    <li class="list-group-item">

                                        <a data-toggle="tab" href="#scoaTab4">
                                            Notes of Cash Disbursement
                                        </a>


                                    </li>



                                    <li class="list-group-item">

                                        <a data-toggle="tab" href="#scoaTab5">
                                            Statement of Cash Disbursement
                                        </a>


                                    </li>




                                </ul>

                            </div>
                        </div>


                        <div class="full-height ">

                            <div class="full-height-scroll scroll-overflow-x full-width-scroll white-bg border-left" >

                                <div class="element-detail-box no-padding">

                                    <div class="tab-content  height width-max-100percent" >




                                        {capture report}



                                            <table scoa-table data-options='
                                                    colWidths: [216,216,230],
                                                    csvFileName: scoa_{$pin},
                                                    isColumnFixed : true,
                                                    toolbar : true,
                                                    {literal}

                                                    striped : [{"row" : 2, "background" : "#cdbe3c24"}],
                                                    nestedHeaders:[
                                                    {"title" : "Receipt" ,"colspan" : 2}
                                                    {/literal}
                                                    ]' class="report checklist-fs">
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




                                                    {assign cash_report $checklist_class->getFsAttributes($org.RCode,"cash_collection_report")}


                                                    {$cash_report->getXML()}


                                                </thbody>


                                            </table>



                                        {/capture}


                                        {call tabs_structure id="scoaTab1" state="active" title="Cash Collection Report" body=$smarty.capture.report}





                                        {capture received}


                                            <table scoa-table data-options='
                                                    colWidths: [335,335],
                                                    toolbar : true,
                                                    {literal}

                                                    striped : [{"row" : 2, "background" : "#cdbe3c24"}],

                                                    {/literal}
                                                    csvFileName:scoa_{$pin}' class="received checklist-fs">

                                                <thead>


                                                <tr>

                                                    <th>
                                                        <b>Title</b>
                                                    </th>

                                                    <th data-options="numeric: true">

                                                        <b>Amount</b>

                                                    </th>

                                                </tr>

                                                </thead>

                                                <thbody>


                                                    {assign cash_received $checklist_class->getFsAttributes($org.RCode,"cash_received")}


                                                    {$cash_received->getXML()}


                                                </thbody>

                                            </table>

                                        {/capture}



                                        {call tabs_structure id="scoaTab2" title="Cash Received" body=$smarty.capture.received}






                                        {capture cash_flow}


                                            <table scoa-table data-options='
                                            colWidths: [330,330],
                                            csvFileName: scoa_{$pin},
                                            isColumnFixed : true,
                                            toolbar : true,
                                            {literal}
                                            striped : [{"row" : 2, "background" : "#cdbe3c24"}]
                                            {/literal}
                                            ' class="cash-flows checklist-fs">

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


                                                    {assign cash_flow $checklist_class->getFsAttributes($org.RCode,"cash_flows")}


                                                    {$cash_flow->getXML()}


                                                </thbody>




                                            </table>


                                        {/capture}


                                        {call tabs_structure id="scoaTab3" title="Cash Flow" body=$smarty.capture.cash_flow}



                                        {capture cash_disbursement}



                                            <table scoa-table data-options='
                                            colWidths: [170,170,170,170,170,170],
                                            csvFileName: scoa_{$pin},
                                            isColumnFixed : true,
                                            toolbar : true,
                                            {literal}
                                            striped : [{"row" : 2, "background" : "#cdbe3c24"}]
                                            {/literal}
                                            ' class="cash-disbursement checklist-fs _cash_flow">

                                                <thead>

                                                <tr>

                                                    {assign cash_flow $checklist_class->getFsAttributes($org.RCode,"cash_flows")}

                                                    {assign source $cash_flow->getData() }


                                                    <th data-options='type : dropdown , source: {$source}'>
                                                        <b>Activity</b>
                                                    </th>

                                                    <th data-options="type : calendar">
                                                        <b>Date</b>
                                                    </th>

                                                    <th>
                                                        <b>Reference Number </b>
                                                        <p>(OR/AR/TS)</p>
                                                    </th>

                                                    <th>
                                                        <b>Particular</b>
                                                    </th>

                                                    <th data-options='type : dropdown , source: ["Fare"]'>
                                                        <b>Type</b>
                                                    </th>

                                                    <th data-options="numeric: true">
                                                        <b>Amount</b>
                                                    </th>

                                                </tr>

                                                </thead>


                                                <thbody>


                                                    {assign cash_disbursement $checklist_class->getFsAttributes($org.RCode,"note_disbursement")}


                                                    {$cash_disbursement->getXML()}


                                                </thbody>





                                            </table>


                                        {/capture}


                                        {call tabs_structure id="scoaTab4" title="Note of Cash Disbursement" body=$smarty.capture.cash_disbursement}








                                        {*{capture cash_disbursement_statement}*}



                                        {*<table scoa-table data-options='*}
                                        {*colWidths: [220,220,220],*}
                                        {*csvFileName: scoa_{$pin},*}
                                        {*isColumnFixed : true,*}
                                        {*toolbar : true,*}
                                        {*{literal}*}
                                        {*striped : [{"row" : 2, "background" : "#cdbe3c24"}]*}
                                        {*{/literal}*}
                                        {*' class="cash-statement checklist-fs _cash_flow">*}

                                        {*<thead>*}

                                        {*<tr>*}

                                        {*{assign cash_flow $checklist_class->getFsAttributes($org.RCode,"cash_flows")}*}


                                        {*{assign source $cash_flow->getData() }*}


                                        {*<th data-options='type : dropdown , source: {$source}'>*}

                                        {*<b>Activity</b>*}
                                        {*</th>*}

                                        {*<th data-options="type : text">*}
                                        {*<b>Total Amount of</b>*}
                                        {*</th>*}

                                        {*<th data-options="numeric:true">*}
                                        {*<b>Amount</b>*}
                                        {*</th>*}


                                        {*</tr>*}

                                        {*</thead>*}


                                        {*<thbody>*}


                                        {*{assign cash_disbursement $checklist_class->getFsAttributes($org.RCode,"cash_statement")}*}


                                        {*{$cash_disbursement->getXML()}*}


                                        {*</thbody>*}





                                        {*</table>*}


                                        {*{/capture}*}


                                        {*{call tabs_structure id="scoaTab5" title="Statement of Cash Disbusement " body=$smarty.capture.cash_disbursement_statement}*}




                                    </div>

                                </div>

                            </div>

                        </div>


                    </div>





                </div>

                {call FS_main_button_set}

                <script>



                </script>

            </div>



        </div>



    </div>


    {include "`$root`public\included_template\misc\content_feeds.tpl"}


{/block}


