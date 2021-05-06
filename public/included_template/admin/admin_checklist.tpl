


{assign currentChecklist $checklist_class->getBatchDetails()}




{assign aop $checklist_class->getTypeObject("AOP")}


{assign mam $checklist_class->getTypeObject("MAM")}


{assign cbl $checklist_class->getTypeObject("CBL")}


{assign fs $checklist_class->getTypeObject("FS")}


{assign de $checklist_class->getTypeObject("DE")}






{block head append}


    <link href="{$css}plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="{$css}plugins/clockpicker/clockpicker.css" rel="stylesheet">


{/block}


{block script append}


    <!-- Data picker -->
    <script src="{$js}plugins/datapicker/bootstrap-datepicker.js"></script>

    <script src="{$js}plugins/clockpicker/clockpicker.js"></script>

    <script src="{$public}/js/scoa/admin_checklist.js?{$pin}"></script>


{/block}








{function structure}


    <div class="panel panel-default no-borders">

        <div class="panel-heading no-borders background-white no-padding">

            <div class="panel-title no-borders">

                {$title}

            </div>


        </div>


        <div id="{$id}" class="panel-collapse collapse" aria-expanded="true" style="">

            <div class="panel-body p-lg">

                {$body}

            </div>


        </div>

    </div>



{/function}








{capture action}



    <div class="vote-item checklist m-b-lg">

        <div class="row">

            <div class="col-md-3">

                <div class="vote-info no-margin-left">

                    <div class="form-group" id="date">

                        <label class="font-normal">Deadline</label>

                        <div class="input-group date">

                            <span class="input-group-addon">
                                <i class="hover-text-success fa fa-calendar"></i>
                            </span>


                            <input type="text" readonly name="date" class="form-control bg-unset" value="{$currentChecklist.deadline|date_format:'%A, %b %e, %Y'|default:'Not set'}">

                        </div>

                    </div>

                </div>

            </div>


            <div class="col-md-3">

                <div class="vote-info no-margin-left">



                    <div class="form-group" id="data_1">

                        <label class="font-normal">Time</label>

                        <div class="input-group clockpicker" data-autoclose="true">

                            <span class="input-group-addon">
                                <i class="fa fa-clock-o hover-text-success"></i>
                            </span>

                            <input type="text" name="time" readonly class="form-control bg-unset" value="{$currentChecklist.deadline|date_format:'H:m'|default:'00:00'}">

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <button class="btn btn-sm btn-primary valign-n-1" type="submit">Save</button>

            </div>

            <div class="col-md-12">

                <p> <span class="text-success"><i class="fa fa-info-circle"></i></span> Should have atleast one renewable organization</p>


                {assign isDeadlineSet $checklist_class->getBatchDetails()}


                {if not $isDeadlineSet.isDeadlineSet}

                    <p> <span class="text-warning"><i class="fa fa-info-circle"></i></span>
                        Deadline of current batch not set
                    </p>

                {/if}



                {if not $checklist_class->isDeadline()}

                    <p> <span class="text-warning"><i class="fa fa-info-circle"></i></span>
                        Time out
                    </p>

                {/if}








            </div>


        </div>


    </div>



{/capture}





{* @param title @param source  *}

{function header}


    <div class="col-md-11">


        <div class="vote-actions">

            {if $source->approved_list() and (!$source->unsubmit_list() and !$source->pending() )}

                <a href="#" class="vote-icon-success">
                    <i class="fa fa-check-circle"> </i>
                </a>

            {else}

                <a href="#" class="vote-icon-error">
                    <i class="fa fa-times-circle"> </i>
                </a>

            {/if}


        </div>

        <a href="#" class="vote-title text-success-important" >{$title}</a>

        <div class="vote-info">
            <i class="fa fa-check-circle completed"></i> <a href="javascript: void 0">
                {$source->approved_list()|count}  Completed
            </a>
            <i class="fa fa-clock-o pending"></i> <a href="javascript: void 0">
                {$source->pending()|count} Pending
            </a>

            <i class="fa fa-times-circle unsubmit"></i> <a href="javascript: void 0">
                {$source->unsubmit_list()|count} unsubmit
            </a>

        </div>


    </div>



{/function}








{* @param Array source @param int startingID *}

{function tabs }



    <ul class="nav nav-tabs">

        <li class="active">
            <a data-toggle="tab" href="#tab-{counter start=$startingID}">
                <i class="fa fa-clock-o text-success"></i> Pending
            </a>
        </li>

        <li class="">
            <a data-toggle="tab" href="#tab-{counter}">
                <i class="fa fa-check text-cadet-blue"></i>  Approved
            </a>
        </li>

        <li class="">
            <a data-toggle="tab" href="#tab-{counter}">
                <i class="fa fa-times-circle text-light-red"></i>  Un submit
            </a>
        </li>

    </ul>





    {*<div class="tab-content">*}


        {*<div id="tab-{counter start=$startingID}" class="tab-pane active">*}
            {*<div class="full-height-scroll">*}
                {*<div class="table-responsive">*}
                    {*<table class="table table-striped table-hover">*}

                        {*<tbody class="text-primary">*}

                        {*{foreach $source->pending() as $every => $pending}*}

                            {*<tr>*}

                                {*<td class="client-avatar">*}
                                    {*<img alt="image" class="cover" src="{$public}/files/cover/{$pending.org_info.cover|default:'default/1.png'}">*}
                                {*</td>*}

                                {*<td>*}
                                    {*<a href="../scoa_organization/feeds/{$pending.r_code}" class="client-link text-success-important">*}

                                        {*Society of Information Technology Students*}

                                    {*</a>*}
                                {*</td>*}


                                {*<td>{$pending.PDT|date_format:"%A, %B %e, %Y"}</td>*}


                                {*<td>Request id : <b>{$pending.feedsId}</b></td>*}


                                {*<td class="client-status">*}

                                    {*<a href="{$public}/scoa_checklist/view/{$pending.org_info.url}" class="btn btn-primary btn-sm scoa-body-overlay">*}

                                        {*View Info*}
                                    {*</a>*}


                                {*</td>*}


                            {*</tr>*}


                            {*{foreachelse}*}


                            {*<tr>*}

                                {*<td>*}

                                    {*<h3 class="text-center full-width clear-left">No pending request</h3>*}

                                {*</td>*}

                            {*</tr>*}



                        {*{/foreach}*}



                        {*</tbody>*}
                    {*</table>*}
                {*</div>*}
            {*</div>*}
        {*</div>*}



        {*<div id="tab-{counter}" class="tab-pane">*}
            {*<div class="full-height-scroll">*}
                {*<div class="table-responsive">*}
                    {*<table class="table table-striped table-hover">*}
                        {*<tbody>*}

                        {*{foreach $source->approved_list() as $every => $pending}*}


                            {*<tr>*}

                                {*<td class="client-avatar">*}
                                    {*<img alt="image" class="cover" src="{$public}/files/cover/{$pending.org_info.cover|default:'default/1.png'}">*}
                                {*</td>*}

                                {*<td>*}
                                    {*<a href="../scoa_organization/feeds/{$pending.r_code}" class="client-link text-success-important">*}

                                        {*{$pending.org_info.name|truncate:45:"..."}*}

                                    {*</a>*}
                                {*</td>*}


                                {*<td>{$pending.PDT|date_format:"%A, %B %e, %Y"}</td>*}

                                {*<td> <a class="active"><i class="fa fa-check-circle"></i> &nbsp; Approved</a></td>*}


                                {*<td class="client-status">*}

                                    {*<a href="" class="btn btn-primary btn-sm scoa-body-overlay">*}

                                        {*View Info*}

                                    {*</a>*}

                                {*</td>*}

                            {*</tr>*}


                            {*{foreachelse}*}


                            {*<tr>*}

                                {*<td>*}

                                    {*<h3 class="text-center full-width clear-left">No display</h3>*}

                                {*</td>*}

                            {*</tr>*}



                        {*{/foreach}*}

                        {*</tbody>*}
                    {*</table>*}
                {*</div>*}
            {*</div>*}
        {*</div>*}



        {*<div id="tab-{counter}" class="tab-pane">*}
            {*<div class="full-height-scroll">*}
                {*<div class="table-responsive">*}
                    {*<table class="table table-striped table-hover">*}
                        {*<tbody>*}

                        {*{foreach $source->unsubmit_list() as $every => $unsubmit}*}



                            {*<tr>*}

                                {*<td class="client-avatar">*}
                                    {*<img alt="image" class="cover" src="{$public}/files/cover/{$unsubmit.cover|default:'default/1.png'}">*}
                                {*</td>*}

                                {*<td>*}
                                    {*<a href="../scoa_organization/feeds/{$unsubmit.r_code}" class="client-link text-success-important">*}

                                        {*{$unsubmit.name|truncate:45:"..."}*}

                                    {*</a>*}
                                {*</td>*}




                                {*<td> <a class="active">{$unsubmit.member_code}</td>*}




                            {*</tr>*}


                            {*{foreachelse}*}


                            {*<tr>*}

                                {*<td>*}

                                    {*<h3 class="text-center full-width clear-left">No clubs found</h3>*}

                                {*</td>*}

                            {*</tr>*}


                        {*{/foreach}*}


                        {*</tbody>*}
                    {*</table>*}
                {*</div>*}
            {*</div>*}
        {*</div>*}



    {*</div>*}



{/function}









{capture aop }




    <div class="vote-item checklist no-borders">

        <div class="row">


            {call header title='Annual Operating Plan (Secure a copy from SCOA)' source=$aop}

            <div class="col-md-1">

                <a data-toggle="collapse" data-parent="#accordion" href="#scoa1" aria-expanded="true"  class="btn btn-white btn-circle btn-lg edit" type="button"  for="201">
                    <i class="valign-middle fa fa-edit active"></i>
                </a>

            </div>



        </div>


    </div>



{/capture}



{capture aop_body}


    {call tabs source=$aop startingID=0}


{/capture}











{capture mam }



    <div class="vote-item checklist no-borders">

        <div class="row">


            {call header title="Minutes from the Activity's meeting" source=$mam}


            <div class="col-md-1">

                <a data-toggle="collapse" data-parent="#accordion" href="#scoa2" aria-expanded="true"  class="btn btn-white btn-circle btn-lg edit" type="button"  for="201">
                    <i class="valign-middle fa fa-edit active"></i>
                </a>

            </div>

        </div>


    </div>



{/capture}



{capture mam_body}

    {call tabs source=$mam startingID=5}

{/capture}


















{capture cbl }


    <div class="vote-item checklist no-borders">

        <div class="row">


            {call header title="CBL" source=$cbl}


            <div class="col-md-1">


                <a data-toggle="collapse" data-parent="#accordion" href="#scoa3" aria-expanded="true"  class="btn btn-white btn-circle btn-lg edit" type="button"  for="201">
                    <i class="valign-middle fa fa-edit active"></i>
                </a>

            </div>

        </div>


    </div>



{/capture}



{capture cbl_body}

    {call tabs source=$cbl startingID=10}

{/capture}
















{capture fs }



    <div class="vote-item checklist no-borders">

        <div class="row">


            {call header title="Financial Statements" source=$fs}


            <div class="col-md-1">


                <a data-toggle="collapse" data-parent="#accordion" href="#scoa4" aria-expanded="true"  class="btn btn-white btn-circle btn-lg edit" type="button"  for="201">
                    <i class="valign-middle fa fa-edit active"></i>
                </a>

            </div>

        </div>


    </div>



{/capture}



{capture fs_body}

    {call tabs source=$fs startingID=15}

{/capture}













{capture de }



    <div class="vote-item checklist no-borders">

        <div class="row">


            {call header title="Documentary Evidence" source=$de}


            <div class="col-md-1">


                <a data-toggle="collapse" data-parent="#accordion" href="#scoa5" aria-expanded="true"  class="btn btn-white btn-circle btn-lg edit" type="button"  for="201">
                    <i class="valign-middle fa fa-edit active"></i>
                </a>

            </div>

        </div>


    </div>



{/capture}



{capture de_body}

    {call tabs source=$de startingID=20}

{/capture}




{block body}


    <div class="row wrapper border-bottom white-bg page-heading ">


        <div class="col-sm-4">
            <h2>Checklist</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{$public}/scoa_admin">Home</a>
                </li>
                <li class="active">
                    <strong>checklist</strong>
                </li>
            </ol>
        </div>


        <div class="col-sm-4 pull-right">
            <div class="title-action">
                <a href="javascript: void 0" class="btn btn-warning btn-sm" id="renew">Renew</a>
            </div>
        </div>

    </div>



    <div class="wrapper wrapper-content no-padding">

       <div class="ibox-content checklist-body scoa-transparent no-padding">

           <div class="panel-body no-borders">

               <div class="panel-group no-borders sk-loading" id="accordion">


                   <form method="post">


                       {$smarty.capture.action}


                   </form>


                   {call structure title=$smarty.capture.aop  body=$smarty.capture.aop_body id='scoa1'}


                   {call structure title=$smarty.capture.mam  body=$smarty.capture.mam_body id='scoa2'}


                   {call structure title=$smarty.capture.cbl  body=$smarty.capture.cbl_body id='scoa3'}


                   {call structure title=$smarty.capture.fs  body=$smarty.capture.fs_body id='scoa4'}


                   {call structure title=$smarty.capture.de  body=$smarty.capture.de_body id='scoa5'}



               </div>
           </div>


           <div class="sk-spinner sk-spinner-double-bounce">
               <div class="sk-double-bounce1"></div>
               <div class="sk-double-bounce2"></div>
           </div>


       </div>



    </div>



{/block}






    {block inner_script append}


        {if $updateBatch_request eq 1}

            swal("Error","An error occur when processing your request","error");

        {elseif $updateBatch_request eq 2}

            swal("Success","The batch has been updated","success");


        {elseif $updateBatch_request eq 3}

            swal("No changes","","warning");


        {/if}


    {/block}


