{extends "`$root`public\included_template\home\staff_structure.tpl"}

{block head append}

    <style>

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
            max-width: 40%;
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














{block script append}

    <script src="{$js}scoa/scoa_request_to_create_account_for_staff.js?{$pin}"></script>

{/block}









{block navbar}

    <li class="nav-link"><a href="{$public}/staff">Back to login</a></li>
    <li class="nav-link"><a href="{$public}/home">LogIn as User</a></li>

{/block}










{block body}


    <div class="container md-width">

        <div class="row">


            <div class="module">
                <div class="module-head">
                    <h3>Request form for staff</h3>
                </div>
                <div class="module-body">

                    <br>

                    <form class="form-horizontal row-fluid sign-up-form" method="post">

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Lastname</label>
                            <div class="controls">
                                <input type="text" name="Lastname" id="Lastname" id="basicinput" placeholder="What's your last name ?" class="span8">
                                <i  class="required">*</i>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Firstname</label>
                            <div class="controls">
                                <input type="text" id="Firstname" name="Firstname" placeholder="What's your first name ?" class="span8">
                                <i  class="required">*</i>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Middle name</label>
                            <div class="controls">
                                <input type="text" id="Middlename" name="Middlename" placeholder="Full middle name ?" class="span8">
                                <i  class="required">*</i>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">ID Number</label>
                            <div class="controls">
                                <div class="input-prepend">
                                    <input class="span8" type="number" style="width: 137px" id="user_url" name="user_url" min="6" placeholder="ID number">
                                    <i  class="required">*</i>
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Phone number</label>
                            <div class="controls">
                                <div class="input-prepend">
                                    <span class="add-on">+63</span><input pattern="^[9][0-9]{9}$" id="CP" class="span8" name="CP" type="number">
                                </div>
                                <i  class="required" style="position: relative; left: -30px">*</i>
                            </div>
                        </div>



                        <div class="control-group">
                            <label class="control-label" for="basicinput">Password</label>
                            <div class="controls">
                                <input type="text" id="password"  name="password"  class="span8">
                                <i  class="required">*</i>
                            </div>
                            <div class="controls">
                                <p></p>
                                <ul>
                                    <li>at least n characters</li>
                                    <li>combination of upper-case and lower-case characters</li>
                                    <li>one or more digits</li>
                                    <li>not related to other user data (name,address,username,...)</li>
                                    <li>not a dictionary word</li>
                                </ul></span>

                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn">Submit Form</button>
                                <button type="reset" class="btn reset">Reset</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>


        </div>

    </div>



{/block}
