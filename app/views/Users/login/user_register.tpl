


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCOA | Register</title>

    <link href="{$css}bootstrap.min.css" rel="stylesheet">
    <link href="{$vendor}font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{$css}plugins/iCheck/custom.css" rel="stylesheet">
    <link href="{$css}animate.css" rel="stylesheet">
    <link href="{$css}scoa.css" rel="stylesheet">

    <style>

        .invalid_message
        {
            float: left;
            padding: 8px 0px 8px 0px;

        }


    </style>


</head>



<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated {if $request eq 0} fadeInDown {/if}">
        <div>
            <div>


                <center>
                    <a href="{$public}">
                        <h1 class="logo-name" style="position: relative;left: -95px;">SCOA</h1>
                    </a>
                </center>


            </div>
            <h3>Registration form</h3>
            <p>Create account to see it in action.</p>

            <form class="m-t sign-up-form" role="form" method="post">



                {if $request eq -2}

                    <div class="alert alert-warning alert-dismissable">
                        <i class="fas fa-warning"></i>&nbsp;
                        <strong>Username is already exist</strong>
                        please choose a unique username.
                    </div>

                {/if}




                <div class="form-group">

                    <input type="text" name="Firstname" id="Firstname"  placeholder="Firstname" class="form-control">

                </div>
                <div class="form-group">

                    <input type="text" id="Middlename" name="Middlename" placeholder="Middlename" class="form-control">

                </div>
                <div class="form-group">

                    <input type="text" name="Lastname" id="Lastname" placeholder="Lastname" class="form-control">

                </div>

                <div class="form-group">

                    <input type="text" name="user_url" id="user_url" placeholder="Username" class="form-control">

                </div>

                <div class="form-group">

                    <input type="text" class="form-control" id="CP" name="CP"  data-mask="(+63) 9999 999 999" placeholder="Phone number">

                </div>


                <div class="form-group">

                    <input type="password" id="password"  name="password"  placeholder="Password" class="form-control">

                </div>


                <div class="form-group">

                    <input type="password" id="confirm_password" placeholder="Confirm your password" class="form-control">

                </div>


                <div class="form-group">

                    <select class="form-control" placeholder="Suffixes" name="suffix">

                        <option value="">Suffix (Optional)</option>
                        <option value="1">Jr.</option>
                        <option value="2">I</option>
                        <option value="3">II</option>
                        <option value="4">III</option>
                        <option value="5">CPA</option>
                        <option value="6">MIT</option>
                        <option value="7">MSIS</option>

                    </select>

                </div>



                <div class="form-group">
                    <br>
                    <br>
                    By signing you agree the terms and conditions
                </div>

                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>


                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{$public}">Login</a>

            </form>
            <p class="m-t"> <small>Student’s Commission on Audit (SCOA) Students</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{$js}jquery-3.1.1.min.js"></script>
    <script src="{$js}bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="{$js}plugins/iCheck/icheck.min.js"></script>
    <script src="{$js}plugins/jasny/jasny-bootstrap.min.js"></script>
    <script src="{$js}jquery.validate.min.js" type="text/javascript"></script>
    <script src="{$js}scoa.js" type="text/javascript"></script>

    <SCRIPTS>




        {literal}

        <script>

            var form_validation = function() {


                var e = function() {


                    jQuery.validator.addMethod("check_if_there_is_digit",function(value,element){

                        return ! /(\W|(\d|[0-9]))/g.test(value.replace(/\s/g,""))

                    },'No special/number characters');

                    jQuery.validator.addMethod("check_CP_pattern",function(value){

                        return  /(^(\(\+63\))+(\s)+([9][0-9]{3})+(\s)+([0-9]{3})+(\s)+([0-9]{3}$))/g.test(value)

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

                        value = new String(value).replace(/(\s)/g,"");


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

                        errorClass: "help-inline invalid_message text-danger animated",

                        errorElement: "span",

                        submitHandler: function(form) {

                           form.submit();

                        },

                        errorPlacement: function(e, a) {

                            jQuery(a).parents(".form-group").append(e);

                        },
                        highlight: function(e) {

                            jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")

                        },


                        success: function(e) {


                            let element = jQuery(e),
                                target = jQuery('.valid[name="user_url"]'),
                                error_element = jQuery(target.siblings("span"));

                            jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()

                            if(target.length){

                                $.get('is_user_exist/'+target.val(),function(data)
                                {

                                    if(data.trim()) {

                                        jQuery(target.siblings("span")).remove();
                                        error_element.html("Username/Id is not available");
                                        target.parents(".form-group").append(error_element);
                                    }
                                    else{

                                        jQuery(target.siblings("span")).remove();
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

                            },

                            "confirm_password" : {

                                equalTo : "#password"

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
                            },

                            "confirm_password" : {

                                equalTo : "Password is Invalid"

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


        {if $request eq -2}/{literal}

            <script>
                $(document).ready(function(){

                    let target = jQuery('.valid[name="user_url"]'), error_element = jQuery(target.siblings("span"));
                    jQuery(target.siblings("span")).remove();
                    error_element.html("Username/Id is not available");
                    target.parents(".form-group").append(error_element);

                })
            </script>



        {/literal} {/if}



    </SCRIPTS>

</body>

</html>


{if $request eq 3} {literal}


    <script>
        window.location.reload();
    </script>


{/literal}{/if}
