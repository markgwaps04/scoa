

{extends "`$root`public\included_template\user\user_index_home_structure.tpl"}

{strip}

{block content}

    {if $request neq 2}

        <div class="col-sm-12">

            <div class="ibox">
                <div class="ibox-title">
                    <strong>Verify your phone number</strong>
                </div>
                <div class="ibox-content">
                    <div class="row">

                        <div class="col-sm-6 ">

                            {if $request eq 1}

                                <div class="alert alert-warning warning alert-dismissable" style="background-color: #fffffe">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <i class="fa fa-times-circle" style="font-size: 15px"></i>&nbsp;
                                    <a class="alert-link" href="#">Invalid code</a> The code is invalid and not exist.
                                </div>

                            {/if}

                            <h3 class="m-t-none m-b">Confirm your identity</h3>
                            <p>To finish creating an account, you need to confirm that you own the mobile phone number that you used to create the account.</p>

                            {if $user->hasVerificatonCode()}

                                <p>Check your phone, we sent a verification code on <br><strong class="text-success">{$user->getPhoneNumber()}</strong> </p>

                            {/if}



                            <form role="form" method="post">

                                {if $user->hasVerificatonCode()}

                                    <div class="form-group">
                                        <label>Code</label>

                                        <input type="text" name="code"  class="form-control">
                                    </div>

                                    <div>
                                        <button class="btn btn-sm btn-primary m-r-xs" name="type" value="check" type="submit">
                                            <strong>Submit</strong>
                                        </button>

                                        <button class="btn btn-sm btn-warning " name="type" value="generate" type="submit">
                                            <strong>Generate again</strong>
                                        </button>
                                    </div>

                                {else}

                                    <div>

                                        <button class="btn btn-sm btn-primary" name="type" value="generate">
                                            <strong>Generate</strong>
                                        </button>
                                    </div>


                                {/if}


                            </form>

                        </div>

                        <div class="col-sm-6">
                            <h3 class="m-t-none m-b">How do i finish creating my account and confirm my mobile number ?</h3>

                            <div class="pull-left">

                                <ul>

                                    <li>To confirm your mobile number enter the code you get via text message (SMS) in the Confirmation box</li>

                                    <li>If you din't get the SMS press "Generate again"</li>.

                                    <li>Anytime, you can always check or change you phone number at your <a class="text-success" href="{$public}/home/account">Account.</a></li>

                                </ul>
                            </div>

                            <p>Confirming your mobile phone number help us know that we're sending your account info to the right place.</p>

                            <p>
                                <strong>Note : </strong>
                                Please confirm your phone number as soon as possible. You may not be able to use your account until you confirm your phone number.
                            </p>

                            <p>If you think there's a mistake you can message us or personally talk with us at our office.</p>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    {else}


        <div class="col-sm-12">

            <div class="ibox">

                <div class="ibox-content">
                    <div class="row">

                        <div class="col-sm-8 ">

                            <h1 class="animated slideInRight">Success</h1>

                            <p>You will be redirected to the homepage on 3s </p>

                            <p><a href="{$public}/organization" class="btn btn-primary btn-sm">Go to home</a></p>

                        </div>

                    </div>
                </div>
            </div>

        </div>

        <script>

            (function () {

                setTimeout(function () {

                    window.location = "/SCOA/public/organization";

                },3000);



            })()

        </script>


    {/if}



{/block}


{/strip}

