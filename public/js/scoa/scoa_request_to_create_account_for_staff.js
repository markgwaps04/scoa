


jQuery(document).ready(function()
{



    let global_error;

    jQuery.validator.addMethod("check_if_there_is_digit",function(value,element){

        return ! /(\W|(\d|[0-9]))/g.test(value.replace(/\s/g,""))

    },'No special/number characters');

    jQuery.validator.addMethod("check_CP_pattern",function(value){

        return  /(^[9][0-9]{9}$)/g.test(value)

    },'Invalid format');

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


    jQuery.validator.addMethod("is_staff_exist",function(value,element,params){


        /** expect slow request **/

        global_error = "";
        let result = false;

        $.ajax({
            async : false,
            cache : false,
            url : "is_staff_exist/"+value,
            success: function(data)
            {

                console.log(data);

                if(data.trim()){
                    global_error = "<i class='fa fa-exclamation-triangle'></i>&nbsp; Username/id is already exist";
                    result = false;
                }else{
                    result = true;
                }

            }
        });


        return result;


    },function(){

        return global_error || "loading...";

    });


    jQuery(".sign-up-form").validate({

        ignore: [],
        errorElement: "span",
        errorClass: "help-inline error_color animated fadeInDown",

        submitHandler: function(form) {

            form.submit();

        },

        errorPlacement: function(e, a)
        {


            let req = jQuery(a).parents(".control-group").find(".required");

            jQuery(req).popover("destroy");

            if(e.text())
            {
                jQuery(req).popover({content: e.text(), placement : "right" , trigger: "manual" });
                jQuery(req).popover("show")

            }


        },
        highlight: function(e) {},
        success: function(e)
        {


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
                required : !0,
                minlength: 2,
                check_if_there_is_digit: true

            },
            "user_url" : {
                required : !0,
                minlength : 5,
                is_staff_exist : true
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
                required: "Please fill this field",
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


});

