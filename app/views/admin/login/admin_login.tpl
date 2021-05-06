
{extends "`$root`public\included_template\home\header_view_structure.tpl"}


{block navbar}

    <li>
        <a href="{$public}/home">
            Log In as User
        </a>
    </li>


{/block}



{block header append}

    <style>

        .text-danger {

            color : firebrick;

        }


    </style>

{/block}


{function if_has_admin}

    <SCRIPTS>

        {block name=script} {**start of scripts**}

        {literal}

            <script type="text/javascript">
                function whenclose(e){
                    $(e.parentElement).fadeOut();
                }
            </script>

        {/literal}


        {/block} {* end of scripts *}

    </SCRIPTS>



    <BODY>


    {block name=body} {* start of body *}

        <div class="module module-login span4 offset4">


            <form method="post" action="{$public}staff" class="form-vertical">

                <div class="module-head">
                    <h3>Sign in</h3>
                </div>



                <div class="module-body">

                    <div class="control-group">
                        <div class="controls row-fluid">
                            <input class="span12" type="text" name="user" id="inputEmail" placeholder="Username or Admin code" required>
                        </div>
                    </div>
                    <div class="control-group Err">
                        <div class="controls row-fluid">
                            <input class="span12" type="password"  name="pass" id="inputPassword" placeholder="Password" required>
                        </div>
                    </div>


                    {*** 1 => PASSWORD_INVALID, -1 => USERNAME_INVALID , 2 => REQUEST_VALID ***}

                    {if $request eq 1}
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <div class="alert alert-error fade in">
                                    <button type="button" class="close"  onclick="whenclose(this)" >×</button>
                                    The Username/ID and password combination you entered cannot be recognized or does not exist. Please try again.
                                </div>
                            </div>
                        </div>

                    {elseif $request eq -1}

                        <div class="control-group">
                            <div class="controls row-fluid">
                                <div class="alert alert-error fade in">
                                    <button type="button" class="close"  onclick="whenclose(this)" >×</button>
                                    Username or ID doesn't exist
                                </div>
                            </div>
                        </div>


                    {/if}






                </div>
                <div class="module-foot">
                    <div class="control-group">
                        <div class="controls clearfix">
                            <button type="submit"  class="btn btn-primary pull-right">Login</button>
                            <label class="checkbox">
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    {/block} {* end of body *}

    </BODY>


{/function}











{function if_has_no_admin}

    {block name=body} {* start of body *}


        <div class="module module-login span4 offset4">



            <form method="post" action="{$public}staff/_new" class="form-vertical sign-up-form">

                <div class="module-head">
                    <h3>Sign Up</h3>
                </div>


                <div class="module-body">

                    <div class="alert alert-info fade in">
                        <i class="fa fa-exclamation-circle"></i>
                        Welcome to your site, fill the fields above
                        to see the action.
                    </div>


                    <div class="control-group">

                        <div class="controls row-fluid">
                            <input class="span12" type="text" name="Firstname" id="Firstname" placeholder="First name" required>
                        </div>

                    </div>

                    <div class="control-group Err">

                        <div class="controls row-fluid">
                            <input class="span12" type="text"  name="Lastname" id="Lastname" placeholder="Lastname" required>
                        </div>

                    </div>


                    <div class="control-group Err">

                        <div class="controls row-fluid">
                            <input class="span12" type="text"  name="user_url" id="user_url" placeholder="Username" required>
                        </div>

                    </div>

                    <div class="control-group Err">

                        <div class="controls row-fluid">
                            <input class="span12" type="text" id="CP" name="CP" data-mask="(+63) 9999 999 999"  placeholder="Phone number" required>
                        </div>

                    </div>


                    <div class="control-group Err">

                        <div class="controls row-fluid">
                            <input class="span12" type="password"  id="password"  name="password" placeholder="Password" required>
                        </div>

                    </div>


                    <div class="control-group Err">

                        <div class="controls row-fluid">
                            <input class="span12" type="password"  id="confirm_password" placeholder="Confirm password" required>
                        </div>

                    </div>


                </div>



                <div class="module-foot">
                    <div class="control-group">
                        <div class="controls clearfix">
                            <button type="submit"  class="btn btn-primary pull-right">Login</button>
                            <label class="checkbox">
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    {/block} {* end of body *}



    {block script}

        <script src="{$js}/scoa/scoa_login_admin_validation.js" crossorigin="anonymous"></script>

        <script src="{$js}/plugins/jasny/jasny-bootstrap.min.js" crossorigin="anonymous"></script>

    {/block}


{/function}






{call if_has_admin}