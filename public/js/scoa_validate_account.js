
(function(__){

    var account = function() {

        var global_error = "",
            defaultParams = {

                errorClass: "help-inline invalid_message text-danger animated",

                errorElement: "span",

                errorPlacement: function(e, a) {


                    let error_placement = jQuery(a).parents(".form-group").find("i.fa");


                    if(e.text()){

                        jQuery(error_placement).popover({
                            content: e.text(), placement : "right" , trigger: "manual",container  : "body" });
                        jQuery(error_placement).popover("show");

                        /**
                         * making sure that the content of popover is updated
                         *
                         * @deprecated un safe
                         *
                         * v3.3.6 bootstrap error calling multiple times of destroy
                         * this issue is being close as a "won't fix"
                         *
                         * (Bootstrap 3 is no longer officially developed or supported)
                         */

                        try{

                            let popover_content,popover_id =  error_placement.attr('aria-describedby');
                            popover_content = jQuery("#"+popover_id).find(".popover-content");
                            popover_content.html(e.html());

                        }catch(err){}



                    }else{
                        jQuery(error_placement).popover("destroy");
                    }

                },

                success: function(e) {

                    jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove();

                },


            }

        var call = {

            get func() {

                __.validator.addMethod("check_if_there_is_digit",function(value,element){

                    return ! /(\W|(\d|[0-9]))/g.test(value.replace(/\s/g,""))

                },'No special/number characters');


                __.validator.addMethod("check_CP_pattern",function(value){

                    return  /(^(\(\+63\))+(\s)+([9][0-9]{3})+(\s)+([0-9]{3})+(\s)+([0-9]{3}$))/g.test(value)

                },'Invalid format');


                __.validator.addMethod("username",function(value,element,params){


                    /** expect slow request **/

                    global_error = "";

                    let result = false;

                    $.ajax({
                        async : false,
                        cache : false,
                        url : "../User/is_user_exist/"+value,
                        success: function(data){

                            if(data.trim()){
                                global_error = "<i class='fa fa-exclamation-triangle'>" +
                                    "</i>&nbsp; " +
                                    "Username/id is already exist";
                                result = false;
                            }else{
                                result = true;
                            }

                        }
                    })


                    return result;


                },function(){

                    return global_error || "loading...";

                });


                __.validator.addMethod("spaces",function(value){


                    try{
                        return !Number.isInteger(Number.parseInt(value)) ? (!/\s/g.test(value)) : true;
                    }catch (e) {
                        return (!/\s/g.test(value));
                    }



                },'should not contain spaces');


                __.validator.addMethod("startwithletters",function(value){

                    value = new String(value).replace(/(\s)/g,"");

                    try{

                        return !Number.isInteger(Number.parseInt(value)) ? (!/^[a-zA-Z0-9]+([a-zA-Z0-9](_|-| )[a-zA-Z0-9])*[a-zA-Z0-9]$/g.test(value)) : true;

                    }catch (e) {

                        return (!/^[a-zA-Z0-9]+([a-zA-Z0-9](_|-| )[a-zA-Z0-9])*[a-zA-Z0-9]$/g.test(value));
                    }



                },'<p><ul><li>Start with letters</li><li> contain numbers and special characters</li>');

                __.validator.addMethod("password_validate",function(value){

                    return  /(\w{6,30}$)/g.test(value)

                },'Password must contain at least six characters!');

                __.validator.addMethod("contain_number",function(value){

                    return  /[0-9]/g.test(value)

                },'should contain one numbers');


                __.validator.addMethod("contain_lowecase",function(value){

                    return  /[a-z]/g.test(value)

                },'should contain one lowercase character');


                __.validator.addMethod("contain_uppercase",function(value){

                    return  /[A-Z]/g.test(value)

                },'should contain one uppercase character');


                __.validator.addMethod("password_validate_again",function(value){

                    return  /([A-Z])+([a-z])+([0-9])/g.test(value)

                },'should contain atleast one uppercase and lowecase character and should have a number');


                __.validator.addMethod("stud_id",function(value){

                    if(value){
                        return false;
                    }
                    return true;


                },"use your own student id , more attempts can lead permament disabled of your account")


                return jQuery.validator;

            },

            get checkCPifVarified() {

               return new Promise(function(resolve){

                   __.get("/SCOA/public/User/isVerified",function(response) {

                       const result = response.replace(/\s/gm,"");

                       resolve(result);

                   })

                })


            },

            laddaLoad : function(button,form) {


                let sub_button = jQuery(button),
                    sub_form = jQuery(form);

                sub_button.ladda(); //initialize plugin ladda

                if(sub_button === undefined || sub_form === undefined ){return;}

                sub_button.on("load",function(){

                    let target = jQuery(this);
                    target.ladda("start").attr("disabled","");

                }).on("unload",function(){

                    let inputs = sub_form
                        .find("i.fa-edit")
                        .parents(".form-group")
                        .find("input");

                    jQuery(this).ladda("stop")
                        .removeAttr("disabled");

                    inputs.attr("disabled","");

                });

                return sub_button.trigger("load");

            },

            update_credentials : function() {

                const root = this;

                let param = Object.assign(defaultParams,{

                    rules : {

                        "user_url" : {
                            required : !0,
                            minlength : 5,
                            username : true,
                            startwithletters : true,
                            contain_number : true,
                            contain_lowecase : true,
                            contain_uppercase : true

                        },

                        "password" : {
                            required : !0,
                            password_validate : true,
                            contain_number:true,
                            contain_lowecase:true,
                            contain_uppercase:true,
                            password_validate_again : true
                        }

                    },

                    messages : {

                        "user_url" : {
                            required : "fill this field",
                            minlength : "should atleast 5 characters",

                        },
                        "password" : {
                            required : "fill this field"
                        }

                    }

                })

                param.submitHandler = function(form) {

                    const formButton = __(form).find("[type=submit]"),

                        ladda = root.laddaLoad(formButton,form),

                        inputs = __(form).parse_into_json(),

                        old_password = inputs.hasOwnProperty("old_password")
                            ? inputs.old_password
                            : "",

                        sourceUrl = "/SCOA/public/User/update_credentials/"+old_password;


                    const response = function(data) {

                        let message;

                        ladda.trigger("unload");

                        data = data.replace(/\s/gm,"");

                        switch (data.trim()) {

                            case "2" :

                                //

                                break;

                            case "-2":

                                message = __.scoa.alert.warning({
                                    title : "Invalid Username",
                                    body : "The username is already exist or the request is invalid if you think this is a mistake",
                                    link : "Let us know",
                                    icon : "fa fa-exclamation-triangle"
                                })

                                __("ALERT.security").html(message);

                                break;

                            case "1":

                                message = __.scoa.alert.warning({
                                    title : "Invalid Password",
                                    body : "The old password field is not recognized or invalid if you think this is a mistake",
                                    link : "Let us know",
                                    icon : "fa fa-exclamation-triangle"
                                })

                                __("ALERT.security").html(message);

                                break;

                            default :

                                console.log(data.trim())

                                message = __.scoa.alert.warning({
                                    title : "Request terminitted",
                                    body : "we cant accept your request at this moment, if you think this a mistake",
                                    link : "Let us know",
                                    icon : "fa fa-exclamation-circle"
                                })

                                __("ALERT.security").html(message)

                                break;


                        }

                    }

                    __.post(sourceUrl,inputs,response);


                };

                jQuery(".security").validate(param)


            },

            details : function() {

                const root = this;

                let param = Object.assign(defaultParams,{

                    rules : {

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
                        "CP":{
                            required : !0,
                            check_CP_pattern : true
                        },
                        "email" : {
                            email : !0,
                            required : !0,
                        },
                        "studID":{
                            stud_id: true,
                            minlength : 4,
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

                        "address":{
                            required: "Please fill this field"
                        },
                        "CP":{
                            required: "Please fill this field"
                        },


                    }


                })

                param.submitHandler = function (form) {

                    const submitButton = __(form).find("[type=submit]");
                    const ladda = root.laddaLoad(submitButton,form);

                    const source = "/SCOA/public/User/edit_info",
                        formData = __(form).parse_into_json();


                    const response = function(data) {

                        console.log(data);

                        const afterTimeOut = function(){
                            ladda.trigger("unload");
                        };

                        const everyFields = function() {
                            let name = this.name;
                            if(json.hasOwnProperty(name)) {
                                jQuery(this).attr("value",json[name]);
                            }
                        };

                        setTimeout(afterTimeOut,1000)

                        if(data == "null" || !data) {return;}

                        let json = JSON.parse(data);

                        __(".details input").each(everyFields)


                    }


                    __.post(source,formData,response)


                };

                __(".details").validate(param);

                return this;

            },

            main : function () {

                const root = this;

                this.func;
                this.details();
                this.update_credentials();

                /** check the cp is verified **/

                const checkCP = function() {

                    const action = function() {

                        root
                            .checkCPifVarified
                            .then(function (response) {

                                const targetElement = __("[name=CP]");

                                targetElement
                                    .siblings(".help-block")
                                    .remove();

                                if(response.length) return;

                                targetElement
                                    .parent()
                                    .append([
                                        '<span class="help-block m-b-none">',
                                        'To help us to easier to contact you',
                                        '<a class="text-success -underline" style="text-decoration: underline"',
                                        'href="#">Confirm your identity.</a></span>'
                                    ].join(" "))

                                checkCP();

                            })



                    }

                    setTimeout(action,1000);

                };


                checkCP();

            }

        }

        call.main();


    }


    __(document).ready(account)


})(jQuery);


