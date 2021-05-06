{extends "`$root`public\included_template\admin\structures\admin_structure.tpl"}


{assign org $user_org[0]}





{block title} SCOA | INFO {/block}



{block head append}

    <link href="{$css}/component.css" rel="stylesheet">

    <link href="{$css}plugins/jquery.guillotine.css" media="all" rel="stylesheet" type="text/css" />

    <link href="{$css}plugins/steps/jquery.steps.css" rel="stylesheet">

    <link href="{$css}plugins/dropzone/basic.css" rel="stylesheet">
    <link href="{$css}plugins/dropzone/dropzone.css" rel="stylesheet">

    <link href="{$css}plugins/cropper/cropper.min.css" rel="stylesheet">

    <script src="{$js}modernizr.custom.js"></script>

    <style>

        .twitter-typeahead {
            width: 100%;
        }


    </style>

{/block}




{capture loading_members}

    <tr class="load">
        <td class="project-status">
            <span class="label label-default animated-background">SCOA</span>
        </td>
        <td class="project-title">

            <a href="javascript:void 0" class="animated-background">
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA
            </a>

            <br>

            <small class="animated-background">
                SCOA SCOA SCOA SCOA SCOA
            </small>

        </td>

    </tr>
    <tr class="load">
        <td class="project-status">
            <span class="label label-default animated-background">SCOA</span>
        </td>
        <td class="project-title">

            <a href="javascript:void 0" class="animated-background">
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA
            </a>

            <br>

            <small class="animated-background">
                SCOA SCOA SCOA SCOA SCOA
            </small>

        </td>

    </tr>
    <tr class="load">
        <td class="project-status">
            <span class="label label-default animated-background">SCOA</span>
        </td>
        <td class="project-title">

            <a href="javascript:void 0" class="animated-background">
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA
            </a>

            <br>

            <small class="animated-background">
                SCOA SCOA SCOA SCOA SCOA
            </small>

        </td>

    </tr>
    <tr class="load">
        <td class="project-status">
            <span class="label label-default animated-background">SCOA</span>
        </td>
        <td class="project-title">

            <a href="javascript:void 0" class="animated-background">
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA
            </a>

            <br>

            <small class="animated-background">
                SCOA SCOA SCOA SCOA SCOA
            </small>

        </td>

    </tr>

{/capture}


{function image_cropper}

    {strip}

        <div class="modal inmodal fade" id="modal_cropper" tabindex="-1" role="dialog" aria-hidden="true"
             style="display:
            none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    
                    <div class="modal-body">


                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="image-crop">
                                        <img>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Preview image</h4>
                                    <div class="img-preview img-preview-sm"></div>
                                    <div class="btn-group">
                                        <button class="btn btn-white" id="zoomIn" type="button">Zoom In</button>
                                        <button class="btn btn-white" id="zoomOut" type="button">Zoom Out</button>
                                        <button class="btn btn-white" id="rotateLeft" type="button">Rotate Left</button>
                                        <button class="btn btn-white" id="rotateRight" type="button">Rotate Right</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    {/strip}

{/function}



{block body}


    <div id="header_info"></div>

    {block head append}

        <style>

            .wizard .content {
                min-height: 100px;
            }

            .wizard .content > .body {
                width: 100%;
                height: auto;
                padding: 15px;
                position: relative;
            }

        </style>

    {/block}



    {capture requirements}

        <div class="col-sm-12">

            <div class="ibox float-e-margins" id="ibox1">
                <div class="ibox-title">
                    <h5>Requirements</h5>
                </div>
                <div class="ibox-content sk-loading scoa-requirements">

                    <div class="sk-spinner sk-spinner-double-bounce">
                        <div class="sk-double-bounce1"></div>
                        <div class="sk-double-bounce2"></div>
                    </div>


                    <ul class="sortable-list connectList agile-list ui-sortable" id="todo">
                        <li class="warning-element" id="task1">

                            <div class="checkbox checkbox-primary no-padding">

                                <div class="row no-padding">

                                    <div class="col-sm-1">
                                        <input id="positions" class="scoa hide" required name="agreement" disabled type="checkbox">&nbsp;
                                    </div>
                                    <div class="col-sm-10">

                                        <a href="javascript: void 0">5 members including the Treasurer, Auditor, Organization President, Department Governor and Adviser.</a>

                                    </div>

                                </div>

                            </div>

                        </li>
                        <li class="warning-element" id="task2">

                            <div class="checkbox checkbox-primary no-padding">

                                <div class="row no-padding">

                                    <div class="col-sm-1">
                                        <input id="members" class="scoa hide" required name="agreement" disabled type="checkbox">&nbsp;
                                    </div>
                                    <div class="col-sm-10">

                                        <a href="javascript: void 0">Complete members requirements.</a>

                                    </div>

                                </div>

                            </div>

                        </li>
                        <li class="warning-element" id="task3">

                            <div class="checkbox checkbox-primary no-padding">

                                <div class="row no-padding">

                                    <div class="col-sm-1">
                                        <input id="cover" class="scoa hide" required name="agreement" disabled type="checkbox">&nbsp;
                                    </div>
                                    <div class="col-sm-10">

                                        <a href="javascript: void 0">Cover photo of organization</a>

                                    </div>

                                </div>

                            </div>


                        </li>

                    </ul>

                </div>
            </div>

        </div>

    {/capture}





    {function feeds}

        {if not $org.members.approved}


            <div class="col-sm-12 no-padding no-margins">

                <div class="alert alert-info" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->
                    <i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;
                    <a class="alert-link" href="#">No members yet.</a>
                </div>

            </div>


            {if not $isStrict} {$smarty.capture.requirements} {/if}



        {/if}

        <div class="col-sm-12">

            {include "`$root`public\included_template\admin\admin_populate_members.tpl"}

        </div>

        <div class="col-sm-12">

            {include "`$root`public\included_template\admin\admin_populate_old_members.tpl"}

        </div>

    {/function}







    {function sideInfo}

        <div class="col-sm-5">


            <div class="col-sm-12 m-b-md">

                <div class="ibox-title">
                    <h5>Organization details</h5>
                </div>

                <ul class="ibox-content no-padding border-left-right coverphoto">
                    <li style="list-style: none">
                        <img class="scoa-img-responsive cover-photo" src="http://localhost/SCOA/public//files/default_image/default.png" id="coverphoto" alt="img04">
                    </li>
                </ul>


                <div class="ibox-content">

                    <div class="sk-spinner sk-spinner-double-bounce">
                        <div class="sk-double-bounce1"></div>
                        <div class="sk-double-bounce2"></div>
                    </div>


                    <h5>ABOUT</h5>

                    <p>


                        {if ($org.details|trim)}

                            {$org.details|trim}

                        {else}


                            <a href='javascript:void 0'>
                                <u> <i class="fa fa-pencil"></i>
                                    edit about
                                </u>
                            </a>


                        {/if}


                    </p>

                    <h5>CODE</h5>
                    <span>


                    {$org.member_code}


                        </span>


                    <h5>MEMBERS</h5>

                    {if $org.members.approved}

                        <p class="user-friends">

                            {* populate the members of target organization *}


                            {foreach $org.members.approved as $every => $user}


                                <a href="">
                                    <img alt="image" data-toggle="tooltip" data-placement="auto" title=
                                    "{$user.Firstname|cat:" "|cat: $user.Lastname|capitalize:true:true }" class="img-circle profile" src="{$public}/files/profile/{$user.profile|default:'default/1.jpg'}">
                                </a>


                            {/foreach}


                            {* end of comment *}

                        </p>

                    {else}

                        <a href='javascript:void 0'>
                            <u> <i class="fa fa-plus"></i>
                                Add members
                            </u>
                        </a>

                    {/if}




                </div>

            </div>


            {if $org.members.approved or $isStrict}

                {$smarty.capture.requirements}

            {/if}


        </div>

    {/function}



    {function wizard_load}

        <div class="ibox-content load _wizard">

            <small class="animated-background">
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA SCOA SCOA
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA SCOA SCOA
                SCOA SCOA SCOA
            </small>

            <br>


            <small class="animated-background">
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA SCOA SCOA
            </small>

            <br>

            <small class="animated-background">
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA
                SCOA SCOA SCOA SCOA SCOA
            </small>


            <br>

            <small class="animated-background">
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA
            </small>


            <br>
            <br>


            <small class="animated-background">
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA SCOA SCOA
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA SCOA SCOA
                SCOA SCOA SCOA
            </small>

            <br>


            <small class="animated-background">
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA SCOA SCOA
            </small>

            <br>

            <small class="animated-background">
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA
                SCOA SCOA SCOA SCOA SCOA
            </small>


            <br>

            <small class="animated-background">
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA
            </small>



            <br>
            <br>


            <small class="animated-background">
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA SCOA SCOA
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA SCOA SCOA
                SCOA SCOA SCOA
            </small>

            <br>


            <small class="animated-background">
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA SCOA SCOA
            </small>

            <br>

            <small class="animated-background">
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA
                SCOA SCOA SCOA SCOA SCOA
            </small>


            <br>

            <small class="animated-background">
                SCOA SCOA SCOA SCOA SCOA SCOA SCOA
            </small>



        </div>

    {/function}



    {function wizard}

        <div class="col-lg-8">

            {call wizard_load}


            <div class="ibox-content display-none _wizard" >

                <p class="p-lg-5">
                    Some Information of this club is not specified, you can skip the current steps by clicking
                    next.
                </p>

                <br>

                <div id="wizard">
                    <h1>Members</h1>
                    <div class="step-content">

                        <div class="p-lg min-h-300px">

                            <strong class="m-t-none m-b">Add members</strong>

                            <div class="form-group">

                                <span class="help-block">

                                    Select users to add as a members of the group or inform
                                    them about the newly created group (max 4)

                                </span>


                                <p class="user-friends">
                                    <input name="users" type="text" class="form-control full-width" id="mention"
                                           placeholder="Search Users">
                                </p>

                            </div>


                            <div id="loaded_mem" class="display-none">

                                <div class="form-group">

                                    <strong class="m-t-none m-b">Members</strong>

                                </div>

                                <div class="loading_mem">
                                    <table class="table table-hover default-b">

                                        <tbody>

                                        <tr>

                                            {$smarty.capture.loading_members}

                                        </tbody>

                                    </table>
                                </div>

                            </div>


                            <div id="no_members" class="m-t-md">

                                <h3 class="text-center">No current members</h3>

                            </div>

                        </div>

                    </div>

                    <h1>Information</h1>
                    <div class="step-content">

                        <fieldset id="form-p-0" role="tabpanel" aria-labelledby="form-h-0" class="body current" aria-hidden="false">
                            <h2>Group Information</h2>

                            <div class="row">
                                <div class="col-lg-8" id="groupInformation"></div>
                                <div class="col-lg-4">
                                    <div class="text-center">
                                        <div style="margin-top: 20px">
                                            <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>


                    </div>

                    <h1>Cover photo</h1>
                    <div class="step-content">
                        <div class="text-center m-t-md">
                            <fieldset id="form-p-0" role="tabpanel" aria-labelledby="form-h-0" class="body current" aria-hidden="false">

                                <form action="#" method="POST" class="dropzone scoa" id="cover_drop">
                                    <div class="fallback">
                                        <input name="file[]" type="file" />
                                    </div>
                                </form>

                            </fieldset>
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

    {/function}




    {function Info}

        <div class="col-sm-12">

            {if ($org.details|trim) && $org.members.approved}

                <div class="col-lg-7">

                    {call feeds}

                </div>

                {call sideInfo}

            {else}

                {call image_cropper}

                {call wizard}

            {/if}


        </div>

    {/function}

    <div class="wrapper wrapper-content">
        <div class="row m-b-xl">

            {call Info}

        </div>


        {call footer}

    </div>


{/block}




{function Info_script}

    <script src="/SCOA/public/js/scoa/scoa_partial.js"></script>

    <script src="/SCOA/public/js/LAB.js"></script>

    <script type="text/javascript">

        const r_code = "{$org.RCode}";

        const tempath = "{$org.tempath}";

        {literal}


        import("/SCOA/public/js/scoa/admin_org_info.js").then(function (call) {

            const org_identity = scoa.page.parameterOf;

            if(!org_identity)

                throw new Error("No parameters found");

            $$.localStorage.groups.asyncRequest(51)

            scoa
                .localStorage
                .groups
                .asyncRequest(org_identity)
                .then(function(result) {

                    if(scoa.isEmpty(result))

                        throw new Error("Cant Verify Infomation of a group");

                    scoa.getServerTemplate({
                        template_url : "misc/org_info_header",
                        data : result,
                        template_variable : "org"
                    }).then(function (template) {

                        const markUp = "header_info"._getId();
                        markUp.innerHTML = template;
                        const renewal_id = result.id;

                        //Security Risk

                        call.default({
                            r_code : r_code,
                            renewal_id : renewal_id,
                            tempath : tempath,
                            group_info : result
                        });

                    });

                })

        });

        {/literal}

    </script>

{/function}




{block script append}

    {call Info_script}

{/block}







