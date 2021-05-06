
{extends "`$root`public\included_template\home\header_view_structure.tpl"}


<NAVBAR>

    {block name=navbar}


        <li class="nav-link"><a href="{$public}/staff">Back to login</a></li>
        <li class="nav-link"><a href="{$public}/home">LogIn as User</a></li>


    {/block}

</NAVBAR>





<SCRIPTS>

    {block name=script} {* start of scripts *}


    {literal}

        <script>

            var form_validation = function() {


                var e = function() {


                    jQuery.validator.addMethod("check_if_there_is_digit",function(value,element){

                        return ! /(\W|(\d|[0-9]))/g.test(value.replace(/\s/g,""))

                    },'No special/number characters');

                    jQuery.validator.addMethod("check_CP_pattern",function(value){

                        return  /(^[9][0-9]{9}$)/g.test(value)

                    },'Invalid format');

                    jQuery.validator.addMethod("username",function(value){

                        return true;

                    },'Username is already exist');

                    jQuery.validator.addMethod("spaces",function(value){


                        try{
                            return !Number.isInteger(Number.parseInt(value)) ? (!/\s/g.test(value)) : true;
                        }catch (e) {
                            return (!/\s/g.test(value));
                        }



                    },'should not contain spaces');

                    jQuery.validator.addMethod("startwithletters",function(value){

                        try{

                            return !Number.isInteger(Number.parseInt(value)) ? (!/^[a-zA-Z0-9]+([a-zA-Z0-9](_|-| )[a-zA-Z0-9])*[a-zA-Z0-9]$/g.test(value)) : true;
                        }catch (e) {

                            return (!/^[a-zA-Z0-9]+([a-zA-Z0-9](_|-| )[a-zA-Z0-9])*[a-zA-Z0-9]$/g.test(value));
                        }



                    },'<p><ul><li>Start with letters</li><li>Contain numbers and special characters</li>');

                    jQuery.validator.addMethod("password_validate",function(value){

                        return  /(\w{6,30}$)/g.test(value)

                    },'Password must contain at least six characters!');

                    jQuery.validator.addMethod("contain_number",function(value){

                        return  /[0-9]/g.test(value)

                    },'should contain one numbers');

                    jQuery.validator.addMethod("contain_lowecase",function(value){

                        return  /[a-z]/g.test(value)

                    },'should contain one lowercase character');

                    jQuery.validator.addMethod("contain_uppercase",function(value){

                        return  /[A-Z]/g.test(value)

                    },'should contain one uppercase character');

                    jQuery.validator.addMethod("password_validate_again",function(value){

                        return  /([A-Z])+([a-z])+([0-9])/g.test(value)

                    },'should contain atleast one uppercase and lowecase character and should have a number');



                    jQuery(".sign-up-form").validate({

                        ignore: [],
                        errorElement: "span",
                        errorClass: "help-inline error_color animated fadeInDown",

                        submitHandler: function(form) {

                            form.submit();

                        },

                        errorPlacement: function(e, a) {


                            let req = jQuery(a).parents(".control-group").find(".required");

                            jQuery(req).popover("destroy");

                            if(e.text()){
                                jQuery(req).popover({content: e.text(), placement : "right" , trigger: "manual" });
                                jQuery(req).popover("show")

                            }


                        },
                        highlight: function(e) {},
                        success: function(e) {

                            let element = jQuery(e),target = jQuery('.valid[name="user_url"]');

                            if(target.length){

                                $.get('is_user_exist/'+target.val(),function(data)
                                {

                                    if(data) {

                                        let req = target.parents(".control-group").find(".required");

                                        jQuery(req).popover("destroy");
                                        jQuery(req).popover({content: "<i class='fa fa-warning'></i> &nbsp Username not available"
                                            , placement : "right"
                                            , trigger: "manual"
                                            , html : true
                                        });
                                        jQuery(req).popover("show");
                                    }
                                    else{

                                        jQuery(req).popover("destroy");

                                    }

                                })


                            }


                        },
                        rules :{

                            "Lastname" : {
                                required : !0,
                                minlength: 2,
                                check_if_there_is_digit: true

                            },
                            "Firstname" : {
                                required : !0,
                                minlength: 2,
                                check_if_there_is_digit: true

                            },
                            "Middlename" : {
                                minlength: 2,
                                check_if_there_is_digit: true

                            },
                            "user_url" : {
                                required : !0,
                                minlength : 5,
                                username : true
                            },
                            "address" : {
                                required : !0
                            },
                            "CP":{
                                required : !0,
                                check_CP_pattern : true
                            },
                            "password":{
                                required : !0,
                                password_validate : true,
                                contain_number:true,
                                contain_lowecase:true,
                                contain_uppercase:true,
                                password_validate_again : true

                            }
                        },
                        messages : {

                            "Lastname" : {
                                required: "Please fill this field",
                                minlength: "should at least 2 characters",
                            },
                            "Firstname" : {
                                required: "Please fill this field",
                                minlength: "should at least 2 characters",
                            },
                            "Middlename" : {
                                minlength: "should at least 2 characters",
                            },
                            "user_url" : {
                                required: "Please fill this field",
                                range : "minimum age is 9 , max 99"
                            },
                            "address":{
                                required: "Please fill this field"
                            },
                            "CP":{
                                required: "Please fill this field"
                            },
                            "username":{
                                required: "Please fill this field",
                            }


                        }
                    })

                };


                return {

                    check : this.$check,
                    init: function() {
                        e(), jQuery(".js-select2").on("change", function() {
                            jQuery(this).valid()
                        })
                    }
                }
            }();

            $(document).ready(function(){

                form_validation.init();


            })

        </script>

    {/literal}


    {if $request eq -2}

    {literal}

        <script>
            $(document).ready(function(){

                let ele = jQuery("[name='user_url']").parents(".control-group").find(".required")

                jQuery(ele).popover("destroy");
                jQuery(ele).popover({content: "Username/id is not available", placement : "right" , trigger: "manual" });
                jQuery(ele).popover("show");

            })
        </script>
    {/literal}

    {/if}



    {/block} {* end of scripts *}

</SCRIPTS>





<HEADER>


    {block name=header} {* start of header *}

        <link href="{$public}css/bootstrap.css" rel="stylesheet">


    {literal}

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



    {/literal}


    {/block} {* end of header *}


</HEADER>




<BODY>


{block name=body} {* start of body *}

    <div class="module">
        <div class="module-head">
            <h3>Request for new organization</h3>
        </div>
        <div class="module-body">

            {if $request eq -2}

                <div class="alert alert-warning">
                    <button class="close" data-dismiss="alert" style="top: -11px;right: -7px;">x</button>

                    <i class="fas fa-warning"></i>&nbsp;
                    <strong>Username is already exist</strong>
                    please choose a unique username.
                </div>

            {/if}

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
                    <label class="control-label" for="basicinput">Department</label>
                    <div class="controls">
                        <select style="width: 50%" id="dept" name="dept" >
                            <option></option>
                        </select>

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

{/block} {* end of body *}

</BODY>


