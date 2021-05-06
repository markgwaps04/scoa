var form_validation = function() {


    var e = function() {


        jQuery.validator.addMethod("check_if_there_is_digit",function(value,element){

            return ! /(\W|(\d|[0-9]))/g.test(value.replace(/\s/g,""))

        },'No special/number characters');

        jQuery.validator.addMethod("check_pno_pattern",function(value){

            return  /(^[9][0-9]{9}$)/g.test(value)

        },'Invalid format');

        jQuery.validator.addMethod("username",function(value){

            return true;


        //   return  !$.fn.check("user",value,"login")[0] && !$.fn.check("username",value,"admin_info")[0];

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
            errorClass: "help-inline error_color animated fadeInDown",
            errorElement: "span",
            submitHandler: function(form) {
               let back_up = form;
                form = jQuery(form).intoAnObject();

                jQuery.post("Welcome/Add_new_admin.php",form,function(data){


                    function message($Arr = {
                        type : "success",
                        title : "Successfully added",
                        content : ""
                    }){
                        jQuery(".Err-alert").newElement([
                            {innerText : ""},
                            {"div" : {class: "alert alert-"+$Arr.type},
                                child : [
                                    {button : {class:"close",
                                            "data-dismiss":"alert",
                                            innerText : "x"}},
                                    {strong : {innerText: $Arr.title}},
                                    {br : {}},
                                    {span: {innerText : $Arr.content}}
                                ]
                            }
                        ]);
                    }

                    if(data.trim()){
                        console.log(data);

                        data = JSON.parse(data);

                        switch (data[0]) {

                            case true:

                                let check_if_added = data[1] ? "Your request has been approved you can now login your account" : null;

                               message({
                                   type : "success",
                                   title : "Successfully added",
                                   content : check_if_added || "please wait for the respond"
                               });

                                $(".reset").click();


                                break;


                            case false :

                                if(data[1].length > 2){

                                    message({
                                        type : "warning",
                                        title : "External error",
                                        content : data[1][2]
                                    });

                                }else{

                                    message({
                                        type : "warning",
                                        title : "Internal error",
                                        content : "We can't process you request at this moment"
                                    });



                                }

                                break;
                        }
                    }


                })},

            errorPlacement: function(e, a) {

                jQuery(a).parents(".controls").append(e)
            },
            highlight: function(e) {
                jQuery(e).closest(".controls").removeClass("is-invalid").addClass("is-invalid")
            },
            success: function(e) {
                jQuery(e).closest(".controls").removeClass("is-invalid"), jQuery(e).remove()
            },
            rules :{
                "lastname" : {
                    required : !0,
                    minlength: 2,
                    check_if_there_is_digit: true

                },
                "firstname" : {
                    required : !0,
                    minlength: 2,
                    check_if_there_is_digit: true

                },
                "middlename" : {
                    required : !0,
                    minlength: 2,
                    check_if_there_is_digit: true

                },
                "age" : {
                    required : !0,
                    range: [14,80]
                },
                "address" : {
                    required : !0
                },
                "pno":{
                    required : !0,
                    check_pno_pattern : true
                },
                "username" : {
                    required : !0,
                    username : true,
                    spaces:true,
                    startwithletters : true
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
                "lastname" : {
                    required: "Please fill this field",
                    minlength: "should at least 2 characters",
                },
                "firstname" : {
                    required: "Please fill this field",
                    minlength: "should at least 2 characters",
                },
                "middlename" : {
                    required: "Please fill this field",
                    minlength: "should at least 2 characters",
                },
                "age" : {
                    required: "Please fill this field",
                    range : "minimum age is 14 , max 80"
                },
                "address":{
                    required: "Please fill this field"
                },
                "pno":{
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
            e(), a(), jQuery(".js-select2").on("change", function() {
                jQuery(this).valid()
            })
        }
    }
}();
jQuery(function() {
    form_validation.init();
});