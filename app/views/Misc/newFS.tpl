
{include "`$root`public\included_template\global_functions.tpl" scope="global"}


{assign org $user_club}


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


{/capture}


{capture fs_contents}


    <div class="tabs-container">
        <ul class="nav nav-tabs">

            <li class="active">
                <a data-toggle="tab" href="#tab-3" aria-expanded="true">
                    <b>Collection Report</b>
                </a>
            </li>

            <li class="">
                <a data-toggle="tab" href="#tab-4" aria-expanded="false">
                    <b>Cash Received</b>
                </a>
            </li>

            <li class="">
                <a data-toggle="tab" href="#tab-5" aria-expanded="false">
                    <b>Cash Flows</b>
                </a>
            </li>

            <li class="">
                <a data-toggle="tab" href="#tab-6" aria-expanded="false">
                    <b>Notes of Cash Disbursement</b>
                </a>
            </li>



        </ul>
        <div class="tab-content">

            <div id="tab-3" class="tab-pane active">

                <div class="panel-body">

                    <div id="collection_report_fs_table"></div>

                </div>

            </div>


            <div id="tab-4" class="tab-pane">
                <div class="panel-body">

                    <div id="collection_received_fs_table"></div>

                </div>
            </div>

            <div id="tab-5" class="tab-pane">
                <div class="panel-body">

                    <div id="collection_flow_fs_table"></div>

                </div>
            </div>


            <div id="tab-6" class="tab-pane">
                <div class="panel-body">

                    <div id="note_disbursement"></div>

                </div>
            </div>

            <div id="error_spreadsheet" class="hidden" onload="$(this).remove()"></div>

        </div>
    </div>


{/capture}





<link href="{$css}plugins/spreadsheet/material_message.css" rel="stylesheet"></link>

<link href="{$css}plugins/datapicker/datepicker3.css" rel="stylesheet">



<div class="row">


    <div class="col-lg-12">



    </div>



    <div class="col-lg-12 hidden" id="fs_main_container">


        {$smarty.capture.message}


        {if $batchDetails.isDeadlineSet}


            {assign __FS $checklist_class->FS($org.RCode) }

            {assign validSign $__FS->is_valid_to_sign()}



            {if $validSign eq "1"}


                <div class="alert alert-dark" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->

                    <i class="fa fa-angle-left" style="font-size: 19px;vertical-align: bottom"></i>&nbsp;
                    <a class="alert-link" href="javascript:void 0" id="back_to_feeds">Back to feeds</a>

                    <div class="pull-right">

                        <i class="fa fa-times-circle text-info" style="font-size: 14px;"></i>&nbsp;
                        <a class="alert-link text-info" href="javascript:void 0" method="member_decline" id="FS_submit">Decline</a>

                    </div>

                </div>


            {/if}



            {if $validSign neq "1"}


                <div class="alert alert-dark" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->

                    <i class="fa fa-angle-left" style="font-size: 19px;vertical-align: bottom"></i>&nbsp;
                    <a class="alert-link" href="javascript:void 0" id="back_to_feeds">Back to feeds</a>

                    <div class="pull-right">

                        <i class="fa fa-check text-navy" style="font-size: 14px;"></i>&nbsp;
                        <a class="alert-link text-navy" href="javascript:void 0" id="FS_submit" method="member_approved">Approved</a>

                    </div>

                </div>



            {/if}





        {/if}



        {$smarty.capture.fs_contents}


    </div>



</div>



<script src="{$js}plugins/spreadsheet/spreadsheet.js?pin={$pin}&math=true" crossorigin="anonymous"></script>

<script src="{$js}scoa/scoa_newfs.js?{$pin}" crossorigin="anonymous"></script>

<script src="{$js}plugins/datapicker/bootstrap-datepicker.js"></script>

<script src="{$js}plugins/spreadsheet/dhtmlxmessage.js?pin={$pin}&math=true" crossorigin="anonymous"></script>

<script src="{$js}plugins/canvasJs/canvasjs.min.js"></script>

<script src="{$js}plugins/breeze/lodash.js?pin={$pin}" crossorigin="anonymous"></script>


<script>


    $("#fs_main_container").ready(function () {



        $("#fs_main_container").toggleClass("hidden");

        $("#spreadsheet_container").removeClass("sk-loading");




        $("#back_to_feeds").click(function() {

            $("#fs_content_wrapper").remove();

            $("#parent_wrapper").toggleClass("hidden");

        })

    });


</script>








