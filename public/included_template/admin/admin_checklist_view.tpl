
{extends "`$root`public\included_template\admin\structures\admin_structure.tpl"}


{block title} SCOA | CHECKLIST {/block}


{block upper_head}


    <link href="{$css}ckin.min.css?{$pin}" media="all" rel="stylesheet" type="text/css" />

    <link href="{$css}plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">

    <link href="{$css}plugins/footable/footable.core.css" rel="stylesheet">

    <style>

        .file-thumb-progress.kv-hidden
        {
            top: 34px !important;
        }
        .scoa-textarea
        {
            min-height: 22px !important;
        }
    </style>


{/block}






{block script}

    <script src="{$js}plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

    <script src="{$js}ckin.min.js?{$pin}" type="text/javascript"></script>

    <script src="{$js}plugins/footable/footable.all.min.js"></script>

    <script>

        jQuery._scoa();

        jQuery('table').footable();

        scoa_video_init();

    </script>


{/block}



{block body}



    <div class="row wrapper border-bottom white-bg page-heading ">


        <div class="col-sm-8">
            <h2>{$_organization.name}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{$public}/scoa_admin">Home</a>
                </li>
                <li>
                    <a href="{$public}/scoa_checklist">Checklist</a>
                </li>
                <li class="active">
                    <strong>View</strong>
                </li>
            </ol>
        </div>



    </div>



    {assign pending $checklist_class->arrayOf_pending_submission($orgURL)}



    {if $pending}



        <div class="wrapper wrapper-content">


            <div class="row">

                <div class="ibox informations float-e-margins no-padding border-bottom">
                    <div class="ibox-title">

                        <h5>

                            <a href="javascript:void 0">

                                <i class="fa fa-info-circle"></i>

                                Pending Request

                            </a>

                        </h5>


                        <div class="ibox-tools">

                            <a class="collapse-link">
                                <i class="fa fa-chevron-down"></i>
                            </a>

                        </div>


                    </div>

                    <div class="ibox-content" style="display: none">


                        <div class="wrapper wrapper-content no-padding-bottom">

                            {foreach $pending as $every => $request}


                                <div class="row">


                                    <div class="col-lg-12">
                                        <div class="mail-box-header">
                                            <div class="pull-right tooltip-demo">

                                                <a  class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Un approved">
                                                    <i class="fa fa-download"></i> Download All
                                                </a>


                                            </div>


                                            <h2>

                                                {call checklist_name type=$request.checklistType}

                                            </h2>


                                            <div class="mail-tools tooltip-demo m-t-md">


                                                <h3>
                                    <span class="font-normal">Sent by :
                                        <a href="#">

                                            {call user_fullname param=$request|default:'User'}

                                        </a>
                                    </span>
                                                </h3>

                                                <h5>
                                    <span class="pull-right font-normal">
                                        {$request.PDT|date_format:'h:m:s a d M Y'|upper}
                                    </span>

                                                    <span class="font-normal">position: </span>

                                                    {call is_position_valid param=$request.membership.position|default:'Any position'}

                                                </h5>

                                                <h5>
                                                    <span class="font-normal">Batch id: </span> {$request.checklist_id}
                                                </h5>

                                            </div>
                                        </div>
                                        <div class="mail-box">


                                            {if $feeds.submissionBody}


                                                <div class="mail-body">

                                                    {$feeds.submissionBody|trim}

                                                </div>


                                            {/if}


                                            {assign feeds $request}

                                            {assign skip true}

                                            {assign skipLoadFile true}

                                            {include "`$root`public\included_template\misc\\feeds_contents_plugin.tpl" scope="parent"}




                                            <div class="mail-attachment">


                                                {$smarty.capture.file_body}


                                            </div>

                                            {if $request.post_details.count >= 2}

                                                <div class="mail-body font-bold">

                                                    <i class="fa fa-warning text-danger"></i>
                                                    &nbsp;
                                                    Has duplicate entry

                                                </div>

                                            {/if}



                                            <div class="mail-body text-right tooltip-demo">


                                                <form method="post" class="form-inline">


                                                    <div class="col-sm-9 no-padding m-b-md no-padding" style="width:80%">

                                                        <textarea id="input2" name="body" class="scoa-textarea" placeholder="Write something..." style=""></textarea>

                                                    </div>

                                                    <button type="submit" class="btn btn-sm btn-white scoa-body-overlay" name="type" value="approved" >
                                                        <i class="fa fa-check"></i> Approved
                                                    </button>

                                                    <button type="submit" class="btn btn-sm btn-warning scoa-body-overlay" name="type" value="unapproved">
                                                        <i class="fa fa-times"></i> Decline
                                                    </button>

                                                    <input type="hidden" name="post_url" value="{$request.path}">

                                                </form>




                                            </div>


                                            <div class="clearfix"></div>


                                        </div>
                                    </div>


                                </div>

                            {/foreach}




                        </div>


                    </div>


                </div>

            </div>


        </div>





    {/if}



    <div class="wrapper wrapper-content ecommerce">


        {include "`$root`public\included_template\admin\admin_checklist_populate_all.tpl"}


    </div>


{/block}





{block inner_script append}

    {if checklist_state_request eq 1}

        swal("Error","cant accept your request at this moment","error");


    {elseif checklist_state_request eq 2}

        swal("Success","the request has been approved","success");

    {/if}

{/block}