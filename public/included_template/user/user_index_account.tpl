
{strip}

    {assign user_info $_currentUser}


<HEAD>

    {block name=head}

    <link href="{$css}plugins/dropzone/basic.css" rel="stylesheet">
    <link href="{$css}plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Ladda style -->
    <link href="{$css}plugins/ladda/ladda-themeless.min.css" rel="stylesheet">

    <style>

        .dz-preview img {

            width: 100%;
            height: 100%

        }

        .dz-preview * {
            cursor: pointer !important;
        }

        .error_color{
            color: red;
        }

        .required {
            vertical-align: 5px; color: red; font-size: 19px;
        }
        .popover-inner{
            overflow-wrap: break-word;

        }
        .popover {
            width: auto;
            max-width: 20%;
            font-size: small;
        }
        .brand {

            position: relative;
            top: -2px;
            padding : 16px !important;

        }

        .popover * {

            background-color: #fcf8e3;
            border-color: #faebcc;
            color: red;

        }
        .add-on { height: auto !important; }

        .nav-link {

            font-size: 13px;
        }

        .popover-title { display: none }

        @media (max-width: 50rem) {
            .form {
                margin: auto;
            }
        }


    </style>

    {/block}

</HEAD>


<SCOA_SCRIPT>

    {block name=script}

        <script src="/SCOA/public/js/scoa/scoa_partial.js"></script>

        <script src="/SCOA/public/js/LAB.js"></script>

        <script>

            const obj = {
                sign_base30 : "{$user_info.sign_base30}",
                token : '{$pin}',
                profile : '{$currentUserClass->getProfile()}'
            };

            {literal}

            (function () {


                const script = [
                    "plugins/dropzone/dropzone.js",
                    "jSignature.min.js",
                    "plugins/jasny/jasny-bootstrap.min.js",
                    "jquery.validate.min.js",
                    "scoa_validate_account.js",
                    "plugins/ladda/spin.min.js",
                    "plugins/ladda/ladda.min.js",
                    "plugins/ladda/ladda.jquery.min.js",
                    "scoa/user_index_account.js?" + obj.token
                ];



                scoa.documentReady(function () {

                    $LAB
                        .setOptions({AlwaysPreserveOrder:true})
                        .script(script.toNestedArray("/SCOA/public/js/"))
                        .wait(function(){

                            scoa.user_account(obj);

                        });

                });


            })();

            {/literal}

        </script>

        {$_currentUser assign='user_info'}

    {/block}

</SCOA_SCRIPT>


    {capture buttons}

        <div class="form-group">

            <div class="col-sm-7">



                <button class="btn btn-sm btn-default pull-right m-xxs" type="reset"><strong>Reset</strong>
                </button>

                <button class="btn btn-sm btn-primary pull-right m-xxs ladda-button" type="submit" >

                    <strong>Save</strong>

                </button>

            </div>



        </div>

    {/capture}



    {capture details}

        <!--Details-->

        <form method="POST" action="../Users/edit_info"  role="form"  class="form-horizontal details">

            <div class="ibox float-e-margins">

                <div class="ibox-title">
                    <h5><i class="fa fa-list-ol"></i>&nbsp;Your details</h5>
                    <div class="ibox-tools">
                        <a class="">
                            <i class="fa fa-calendar"></i>
                        </a>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>

                    </div>
                </div>

                <div class="ibox-content ">

                    <div class="form-group"><label class="col-sm-2 control-label">Firstname</label>

                        <div class="col-sm-5">

                            <input type="text" name="Firstname" value="{$user_info.Firstname}"
                                   disabled  class="form-control input-sm">

                            <!--                                        <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->

                        </div>

                        <label class="col-sm-0 control-label">

                            <i class="fa fa-edit small text-success edit-info"></i>

                        </label>

                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group"><label class="col-sm-2 control-label">Middle name</label>
                        <div class="col-sm-5">

                            <input type="text" name="Middlename" value="{$user_info.Middlename}" disabled class="form-control input-sm">
                            <!---->
                            <!--                                        <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                        </div>

                        <label class="col-sm-0 control-label">

                            <i class="fa fa-edit small text-success edit-info" ></i>

                        </label>

                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group"><label class="col-sm-2 control-label">Lastname</label>

                        <div class="col-sm-5">

                            <input type="text" name="Lastname" value="{$user_info.Lastname}" disabled  class="form-control input-sm">

                            <!--                                        <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->

                        </div>

                        <label class="col-sm-0 control-label">

                            <i class="fa fa-edit small text-success edit-info"></i>

                        </label>

                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">

                        <label class="col-sm-2 control-label">Phone number</label>

                        <div class="col-sm-5">

                            <input type="text" name="CP" value="{$user_info.CP}" disabled class="form-control input-sm" data-mask="(+63) 9999 999 999">

                            {if not $currentUserClass->isPhoneVerify()}

                                <span class="help-block m-b-none">To help us to easier to contact you <a class="text-success -underline" style="text-decoration: underline" href="#">Confirm your identity.</a></span>


                            {/if}



                        </div>

                        <label class="col-sm-0 control-label">

                            <i class="fa fa-edit small text-success edit-info"></i>

                        </label>

                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">

                        <label class="col-sm-2 control-label">Student Id no.</label>

                        <div class="col-sm-5">

                            <input type="text" name="studID" value="{$user_info.studID}"  class="form-control input-sm" placeholder="eg. 012345 (Optional)">

                            <span class="help-block m-b-none">in case of you can't remember your password or your account is temporary disabled.</span>

                        </div>

                        <label class="col-sm-0 control-label">

                            <i class="fa fa-times-circle small text-danger"></i>

                        </label>


                    </div>

                    <div class="form-group">

                        <label class="col-sm-2 control-label" >Email address.</label>

                        <div class="col-sm-5">

                            <input type="email" name="email" value="{$user_info.email}"  disabled class="form-control input-sm" placeholder="scoa@gmail.com">

                            <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span>

                        </div>

                        <label class="col-sm-0 control-label">

                            <i class="fa fa-edit small text-success edit-info"></i>

                        </label>


                    </div>

                    {$smarty.capture.buttons}


                </div>

            </div>

        </form>


    {/capture}




    {capture signature}

        <!--Signature-->

        <div  class="form-horizontal">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><i class="fa fa-pencil-square-o"></i>&nbsp; Signature</h5>
                    <div class="ibox-tools">

                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>

                    </div>
                </div>

                <div class="ibox-content ">

                    <div class="form-group">

                        <label class="col-sm-2 control-label">Change your sign</label>

                        <div class="col-sm-7 user_signature">

                            <div id="user_signature" style="max-width: inherit">

                                <hr style="position:relative;bottom: -113px;z-index: 5" >

                            </div>

                        </div>

                        <div class="form-group">

                            <div class="col-sm-7">

                                <button class="btn btn-sm btn-default pull-right m-xxs" type="reset" onclick="$('#user_signature').jSignature('reset')"><strong>Clear</strong>
                                </button>

                                <button class="btn btn-sm btn-default pull-right m-xxs reset_sign"><strong>Reset</strong>
                                </button>

                                <button  class="btn btn-sm btn-primary pull-right m-xxs"
                                         id="save_signature"><strong>Save</strong>
                                </button>

                            </div>



                        </div>

                    </div>


                </div>
            </div>

        </div>

    {/capture}



    {capture profile_section}

        <div  class="form-horizontal">

            <div class="ibox float-e-margins">

                <div class="ibox-title">
                    <h5><i class="fa fa-image"></i>&nbsp; Profile</h5>
                    <div class="ibox-tools">

                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>

                    </div>
                </div>

                <div class="ibox-content ">

                    <div class="form-group">

                        <label class="col-sm-2 control-label">Change your profile</label>

                        <div class="col-sm-5">

                            <form action="#" style="border: none" method="POST"  class="dropzone" id="profile_drop">
                                <div class="fallback">
                                    <input name="file[]" type="file" />
                                </div>
                            </form>

                            <!--                                        <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->

                        </div>
                    </div>


                </div>

            </div>

        </div>

    {/capture}




    {capture security}

        <form method="get" class="form-horizontal security" >

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><i class="fa fa-user-secret"></i>&nbsp; Security</h5>
                    <div class="ibox-tools">
                        <a class="">
                            <i class="fa fa-calendar"></i>
                        </a>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>

                    </div>
                </div>

                <div class="ibox-content ">

                    <div class="form-group">

                        <ALERT class="security">

                        </ALERT>

                        <label class="col-sm-2 control-label">Username</label>

                        <div class="col-sm-5">

                            <input type="text" value="{$user_info.user_url}" name="user_url" disabled  class="form-control input-sm">

                            <!--                                        <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->

                        </div>

                        <label class="col-sm-0 control-label">

                            <i class="fa fa-edit small text-success error_invalid edit-info"></i>


                        </label>



                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">

                        <label class="col-sm-2 control-label">New password</label>

                        <div class="col-sm-5">

                            <input name="password" disabled class="form-control input-sm">

                        </div>

                        <label class="col-sm-0 control-label">

                            <i class="fa fa-edit small text-success edit-info"></i>


                        </label>


                    </div>

                    <div class="form-group">

                        <label class="col-sm-2 control-label">Old password</label>

                        <div class="col-sm-5">

                            <input type="text" name="old_password" value="{$user_info.password}"  disabled value="Mark04"  class="form-control input-sm">

                            <span class="help-block m-b-none">e.g. for security concerns we crypt your password.</span>

                        </div>

                        <label class="col-sm-0 control-label">

                            <i class="fa fa-edit small text-success edit-info"></i>

                        </label>


                    </div>

                    {$smarty.capture.buttons}

                </div>




            </div>

        </form>

    {/capture}









<SCOA_BODY>


    {block name=body}

    {$_currentUser assign='user_info'}




    <div class="row hiddenBy">

        <div class="col-md-8 account">

            <div class="alert alert-dark" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->
                <i class="fa fa-angle-left" style="font-size: 19px;vertical-align: bottom"></i>&nbsp;
                <a class="alert-link" href="{$public}">Back to home </a>
            </div>

            {if not $currentUserClass->isPhoneVerify()}

                <div class="alert alert-warning warning" style="background-color: #fffffe">
                    <i class="fa fa-phone" style="font-size: 15px"></i>&nbsp;
                    <a class="alert-link" href="#">Confirm your identity</a> adding a mobile phone number to your account, help your account secure , make easier to connect with you and makes it easier to regain access to your account if you have trouble logging in. <a href="{$public}User/confirmAccount?{$pin}" style="text-decoration: underline">Confirm your phone number</a>.
                </div>


            {elseif not $is_identify}

                <div class="alert alert-warning" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->
                    <i class="fa fa-exclamation-triangle" style="font-size: 15px"></i>&nbsp;
                    <a href="" class="alert-link">Set your bio. </a> we required every user for this site to complete their bio to help us know you. <a href="#">Go to your Account</a>
                </div>

            {/if}


            <div class="ibox">

                <div class="ibox-title">
                    <strong><i class="fa fa-user"></i> &nbsp; Your Account</strong>
                </div>

                <div class="ibox-content">

                    {$smarty.capture.security}

                    {$smarty.capture.profile_section}

                    {$smarty.capture.details}

                    {$smarty.capture.signature}

                </div>

            </div>


        </div>


        {block name=info}

            {include "`$root`public\included_template\user\user_index_right_div.tpl"}

        {/block}


    </div>


    {/block}


</SCOA_BODY>


{/strip}