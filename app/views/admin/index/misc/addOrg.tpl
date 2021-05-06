{extends "../../../../../public/included_template/admin/structures/admin_structure.tpl"}


{block title} SCOA | CLUB {/block}

{assign currentChecklist $checklist_class->getBatchDetails()}




{block script}

    <script src="/SCOA/public/js/scoa/scoa_partial.js"></script>

    <script src="/SCOA/public/js/LAB.js"></script>

    <script>

     const request = Number("{$request}" || 0);

     {literal}

        (function () {

            const path = "/SCOA/public/js/";

            const script = [
                "plugins/breeze/lodash.js",
                "scoa/scoa_reminders.js",
                "plugins/validate/jquery.validate.min.js",
                "plugins/_typehead/typehead.js",
                "plugins/bootstrap-tagsinput/bootstrap-tagsinput.js",
                "scoa/scoa-create-org-by-admin.js",
            ];

            $LAB
                .setOptions({AlwaysPreserveOrder:true})
                .script(script.toNestedArray(path))
                .wait(function(){

                    scoa.showHiddens();
                    scoa.removeLoadings();

                    const reminders = window.reminders({
                       "set" : "remindByAdmin",
                       "by" : "allStaff"
                    },false,3);


                });

        })();

     {/literal}

    </script>


{/block}






{block head append}

    <link href="{$css}plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <style>

        .ProfileCard-details {

            width: 300px;

        }
        .ProfileCard {
            background: #ffffff;
        }
        .ProfileCard-avatar.profile {
            position: absolute;
        }

        img.mention {

            width : 25px;
            height: 25px;

        }

        .profile-x {
            width: 42px;
            height: 42px;
        }



    </style>

{/block}




{function errors}


    {if $request eq "1"}

        <div class="alert alert-warning" style="background-color: #fdfdfde0">
            <i class="fa fa-exclamation-triangle animated wobble" style="font-size: 15px"></i>&nbsp;
            <a class="alert-link" href="#">Invalid Request.</a> The parameters sent is Invalid.
        </div>

    {/if}


{/function}



{function loading}

    <div class="wrapper wrapper-content load loadingBy">

        <div class="row">

            <div class="col-lg-8">

                <div class="ibox">

                    <div class="ibox-title">
                        <strong><i class="fa fa-pencil-square"></i>&nbsp Add new Org/Dept </strong>
                    </div>

                    <div class="ibox-content ">
                        <div class="row">

                            <div class="col-sm-6 b-r">
                            {assign isDeadlineSet $checklist_class->getBatchDetails()}

                                    <span class="animated-background">

                                        {if not $isDeadlineSet.isDeadlineSet}

                                            <span class="text-warning"><i class="fa fa-info-circle"></i></span>
                                            Deadline of current batch not set

                                        {elseif not $checklist_class->isDeadline()}

                                            The batch is already time out

                                        {else}


                                            Batch for {$currentChecklist.date_time|date_format:'%A, %b %e, %Y'} to
                                            {$currentChecklist.deadline|date_format:'%A, %b %e, %Y'}



                                        {/if}

                                    </span>

                                    <br>

                                    <p>
                                        <a href="/SCOA/public/scoa_checklist" class="animated-background" target="_blank">Go to checklist config.</a>
                                    </p>


                                    <div class="form-group">

                                        <label class="animated-background">Name of the club</label>
                                        <p class="animated-background">SCOA SCOA SCOA SCOA</p>
                                        <p class="animated-background">SCOA SCOA</p>
                                    </div>

                                    <div class="form-group">
                                        <label class="animated-background">Details</label>
                                        <p class="animated-background">SCOA SCOA SCOA SCOA</p>
                                        <p class="animated-background">SCOA SCOA</p>
                                    </div>

                                    <br>

                                    <div class="form-group">

                                        <span class="btn m-t-n-xs animated-background" type="submit" id="disableLoad">
                                            <strong>Submit</strong></span>

                                    </div>
                                </div>

                            <div class="col-sm-6">

                            <strong class="m-t-none m-b animated-background">Members SCOA</strong>

                                    <div class="form-group">


                                        <strong class=" animated-background">Select users to SCOA SCOA
                                        </strong>

                                        <span class=" animated-background">
                                            Select users to SCOA SCOA SCOA
                                        </span>

                                        <p class="animated-background">SCOA SCOA SCOA SCOA</p>
                                        <p class="animated-background">SCOA SCOA</p>


                                    </div>

                                    <div class="form-group">


                                        <strong class=" animated-background">Select users to SCOA SCOA
                                        </strong>

                                        <span class=" animated-background">
                                            Select users to SCOA SCOA SCOA
                                        </span>

                                        <p class="animated-background">SCOA SCOA SCOA SCOA</p>
                                        <p class="animated-background">SCOA SCOA</p>


                                    </div>

                                </div>


                        </div>
                    </div>
                </div>


            </div>


            <div class="col-lg-4">

                <div class="ibox-content" id="reminders">

                        <div class="feed-activity-list load">

                            <div class="feed-element">
                                <div>
                                    <small class="pull-right text-navy animated-background">SCOA</small>
                                    <small class="animated-background">Student’s Commission on Audit</small>
                                    <p class="animated-background">
                                        Student’s
                                        Commission on Audit SCOA SCOA
                                        SCOA
                                    </p>
                                    <small class="animated-background">SCOA
                                        SCOA SCOA SCOA SCOA SCOA SCOA
                                    </small>
                                </div>
                            </div>

                            <div class="feed-element">
                                <div>
                                    <small class="pull-right text-navy animated-background">SCOA</small>
                                    <small class="animated-background">Student’s Commission on Audit</small>
                                    <p class="animated-background">
                                        Student’s
                                        Commission on Audit SCOA SCOA
                                        SCOA
                                    </p>
                                    <small class="animated-background">SCOA
                                        SCOA SCOA SCOA SCOA SCOA SCOA
                                    </small>
                                </div>
                            </div>

                            <div class="feed-element">
                                <div>
                                    <small class="pull-right text-navy animated-background">SCOA</small>
                                    <small class="animated-background">Student’s Commission on Audit</small>
                                    <p class="animated-background">
                                        Student’s
                                        Commission on Audit SCOA SCOA
                                        SCOA
                                    </p>
                                    <small class="animated-background">SCOA
                                        SCOA SCOA SCOA SCOA SCOA SCOA
                                    </small>
                                </div>
                            </div>


                            <div class="feed-element">
                                <div>
                                    <small class="pull-right text-navy animated-background">SCOA</small>
                                    <small class="animated-background">Student’s Commission on Audit</small>
                                    <p class="animated-background">
                                        Student’s
                                        Commission on Audit SCOA SCOA
                                        SCOA
                                    </p>
                                    <small class="animated-background">SCOA
                                        SCOA SCOA SCOA SCOA SCOA SCOA
                                    </small>
                                </div>
                            </div>

                            <div class="feed-element">
                                <div>
                                    <small class="pull-right text-navy animated-background">SCOA</small>
                                    <small class="animated-background">Student’s Commission on Audit</small>
                                    <p class="animated-background">
                                        Student’s
                                        Commission on Audit SCOA SCOA
                                        SCOA
                                    </p>
                                    <small class="animated-background">SCOA
                                        SCOA SCOA SCOA SCOA SCOA SCOA
                                    </small>
                                </div>
                            </div>

                        </div>
                    </div>

            </div>

        </div>

    </div>

{/function}



{function header}


    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">

            <h2>Create new club</h2>

            <ol class="breadcrumb">
                <li>
                    <a href="{$public}/staff">Home</a>
                </li>
                <li>
                    <a href="javascript:void 0">Organization/Departments</a>
                </li>

                <li class="active">
                    <strong>Add Club</strong>
                </li>
            </ol>
        </div>


    </div>


{/function}





{block body}

    {call header}

    {call loading}

    <div class="wrapper wrapper-content hiddenBy">

        <div class="row">


            <div class="col-lg-8">

                {call errors}

                <div class="ibox">
                    <div class="ibox-title">
                        <strong><i class="fa fa-pencil-square"></i>&nbsp Add new Org/Dept </strong>
                    </div>
                    <div class="ibox-content">
                        <div class="row">

                            <form role="form" method="post" class="user_org">

                                <div class="col-sm-6 b-r">


                                    {assign isDeadlineSet $checklist_class->getBatchDetails()}

                                    <p>

                                    {if not $isDeadlineSet.isDeadlineSet}

                                        <span class="text-warning"><i class="fa fa-info-circle"></i></span>
                                            Deadline of current batch not set

                                    {elseif not $checklist_class->isDeadline()}

                                        The batch is already time out

                                    {else}


                                            Batch for {$currentChecklist.date_time|date_format:'%A, %b %e, %Y'} to
                                            {$currentChecklist.deadline|date_format:'%A, %b %e, %Y'}



                                    {/if}

                                    </p>

                                    <p>
                                        <a href="/SCOA/public/scoa_checklist" target="_blank">Go to checklist config.</a>
                                    </p>


                                    <div class="form-group">

                                        <label>Name of the club</label>
                                        <input type="text" name="name" id="name" placeholder="e.g. must unique" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Details</label>
                                        <textarea name="details" style="min-height: 155px" placeholder="e.g. what organization or department you creating for (Optional)" class="form-control"></textarea>
                                    </div>



                                    <br>

                                    <div class="form-group">

                                        <button class="btn btn-sm btn-primary m-t-n-xs" type="submit" id="disableLoad">
                                            <strong>Submit</strong></button>

                                    </div>
                            </div>

                                <div class="col-sm-6">

                                <strong class="m-t-none m-b">Members</strong>

                                <div class="form-group">


                                    <span class="help-block">

                                        Select users to add as a members of the group or inform
                                        them about the newly created group (max 4)

                                    </span>

                                    <p class="user-friends">

                                    <input name="users" type="text" class="form-control tagsinput">

                                    </p>

                                </div>

                                <div class="form-group">


                                    <span class="help-block">

                                        If a user is not registered of the site you can inform
                                        her by adding her phone number above. (ex. 912345678)

                                    </span>

                                        <p class="user-friends">

                                            <input name="numbers" type="text" class="form-control" id="phone_number" >

                                        </p>

                                </div>

                                </div>

                            </form>


                        </div>
                    </div>
                </div>


            </div>

            <div class="col-lg-4">

                <div class="ibox-content" id="reminders">

                    <div class="feed-activity-list load">

                        <div class="feed-element">
                            <div>
                                <small class="pull-right text-navy animated-background">SCOA</small>
                                <small class="animated-background">Student’s Commission on Audit</small>
                                <p class="animated-background">
                                    Student’s
                                    Commission on Audit SCOA SCOA
                                    SCOA
                                </p>
                                <small class="animated-background">SCOA
                                    SCOA SCOA SCOA SCOA SCOA SCOA
                                </small>
                            </div>
                        </div>

                        <div class="feed-element">
                            <div>
                                <small class="pull-right text-navy animated-background">SCOA</small>
                                <small class="animated-background">Student’s Commission on Audit</small>
                                <p class="animated-background">
                                    Student’s
                                    Commission on Audit SCOA SCOA
                                    SCOA
                                </p>
                                <small class="animated-background">SCOA
                                    SCOA SCOA SCOA SCOA SCOA SCOA
                                </small>
                            </div>
                        </div>

                        <div class="feed-element">
                            <div>
                                <small class="pull-right text-navy animated-background">SCOA</small>
                                <small class="animated-background">Student’s Commission on Audit</small>
                                <p class="animated-background">
                                    Student’s
                                    Commission on Audit SCOA SCOA
                                    SCOA
                                </p>
                                <small class="animated-background">SCOA
                                    SCOA SCOA SCOA SCOA SCOA SCOA
                                </small>
                            </div>
                        </div>


                        <div class="feed-element">
                            <div>
                                <small class="pull-right text-navy animated-background">SCOA</small>
                                <small class="animated-background">Student’s Commission on Audit</small>
                                <p class="animated-background">
                                    Student’s
                                    Commission on Audit SCOA SCOA
                                    SCOA
                                </p>
                                <small class="animated-background">SCOA
                                    SCOA SCOA SCOA SCOA SCOA SCOA
                                </small>
                            </div>
                        </div>

                        <div class="feed-element">
                            <div>
                                <small class="pull-right text-navy animated-background">SCOA</small>
                                <small class="animated-background">Student’s Commission on Audit</small>
                                <p class="animated-background">
                                    Student’s
                                    Commission on Audit SCOA SCOA
                                    SCOA
                                </p>
                                <small class="animated-background">SCOA
                                    SCOA SCOA SCOA SCOA SCOA SCOA
                                </small>
                            </div>
                        </div>

                    </div>
                </div>

            </div>


        </div>

    </div>

{/block}

