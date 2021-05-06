(function(__) {

    const account = function() {

        var message = null;

        const call = {


            addStaffValidateFields : function() {

              const root = this;

              jQuery.validator.addMethod("check_if_there_is_digit",function(value,element){

                  return ! /(\W|(\d|[0-9]))/g.test(value.replace(/\s/g,""))

              },'No special/number characters');

              jQuery.validator.addMethod("check_CP_pattern",function(value){

                  return  /(^(\(\+63\))+(\s)+([9][0-9]{3})+(\s)+([0-9]{3})+(\s)+([0-9]{3}$))/g.test(value)

              },'Invalid format');

              jQuery.validator.addMethod("username",function(value){

                  return true;

              },() => message || '<span class="help-block"> <i class="fa fa-spinner fa-spin"></i> loading ....  </span>');

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

                  if(!value) return true;

                  return  /(\w{6,30}$)/g.test(value)

              },'Password must contain at least six characters!');

              jQuery.validator.addMethod("contain_number",function(value){

                  if(!value) return true;

                  return  /[0-9]/g.test(value)

              },'should contain one numbers');

              jQuery.validator.addMethod("contain_lowecase",function(value){

                  if(!value) return true;

                  return  /[a-z]/g.test(value)

              },'should contain one lowercase character');

              jQuery.validator.addMethod("contain_uppercase",function(value){

                  if(!value) return true;

                  return  /[A-Z]/g.test(value)

              },'should contain one uppercase character');

              jQuery.validator.addMethod("password_validate_again",function(value){

                  if(!value) return true;

                  return  /([A-Z])+([a-z])+([0-9])/g.test(value)

              },'should contain atleast one uppercase and lowecase character and should have a number');


              const validator = jQuery("#sign-up-form form").validate({

                  ignore: [],

                  errorClass: "help-inline invalid_message text-danger animated",

                  errorElement: "span",

                  submitHandler: function(form) {

                      form.submit();

                  },

                  errorPlacement: function(e, a) {

                      jQuery(a).parents(".form-group,.controls").append(e);

                  },
                  highlight: function(e) {

                      jQuery(e)
                          .closest(".form-group,.controls")
                          .removeClass("is-invalid")
                          .addClass("is-invalid");

                  },


                  success: function(e) {

                      let element = jQuery(e),
                          target = jQuery('.valid[name="user_url"]'),
                          error_element = jQuery(target.siblings("span"));

                      jQuery(e)
                          .closest(".form-group,.controls")
                          .removeClass("is-invalid"), jQuery(e).remove();



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
                      },


                      "CP":{
                          required : !0,
                          check_CP_pattern : true
                      },

                      "password":{

                          password_validate : true,
                          contain_number:true,
                          contain_lowecase:true,
                          contain_uppercase:true,
                          password_validate_again : true

                      },

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
                          range : "minimum age is 9 , max 99",
                          remote : "Username is already use"
                      },
                      "CP":{
                          required: "Please fill this field"
                      },




                  }
              });

              __("#sign-up-form #form-submit")
                  .off("click")
                  .on("click",function() {

                      const result = __("#sign-up-form form").valid();

                      if(result) {

                          root.save();

                      }



                  });


              return this;

          },

            checkUser : function() {

                var count = 0;

                const action = function(evt) {

                    const target = __("[name=user_url]");

                    target
                        .parent()
                        .find(".help-block")
                        .remove();

                    target
                        .parent()
                        .append('' +
                            '<span class="help-block">' +
                            '<i class="fa fa-spinner fa-spin"></i> check existence... ' +
                            '</span>');


                    const value = target
                        .val()
                        .trim();


                    if(!value) return;


                    const url = "/SCOA/public/scoa_account/isUserExist";
                    const data = {user_url : value};

                    __.post(url, data, function(response) {

                       target
                           .parent()
                           .find(".help-block")
                           .remove();

                       const trim = response.replace(/\s/gm,"");

                       console.log(trim);

                       if(trim) {

                           target
                               .parent()
                               .append('' +
                                   '<span class="help-block text-danger">' +
                                   '<i class="fa fa-exclamation-circle"></i>' +
                                   '&nbsp; Username is already use' +
                                   '</span>')

                           return;

                       }


                        target
                            .parent()
                            .append('' +
                                '<span class="help-block text-success">' +
                                '<i class="fa fa-check-circle"></i>' +
                                '&nbsp; Username is available' +
                                '</span>')


                    });


                };

                __("[name=user_url]").on("focusout",action)

            },

            save : function() {

                const root = this;

                const form = __("#sign-up-form form"),
                    values = form.serializeArray();

                const ibox = form.parents(".ibox-content");
                ibox.toggleClass("sk-loading");

                __.post("/SCOA/public/scoa_account/addAdministrator",values,function(result) {

                    const account = jQuery("#create_account");

                    ibox.removeClass("sk-loading");

                    account
                        .find("alert:not(.error)")
                        .remove();

                    const response = result.replace(/\s/gm,"");

                    console.log(response)


                    if(response == "-2") {

                        const template = account
                            .find("user_exist")
                            .html();

                        account
                            .find("errors")
                            .before(template);


                        account
                            .find("input[name=password]")
                            .val("");


                        root.populateAllAccounts();

                        return;

                    }



                    if(response == "2") {


                        /** reset form **/

                        form.trigger("reset");

                        form
                            .find(".help-block")
                            .remove();

                        /** @end **/

                        const file_drop = jQuery("#profile_drop");

                        file_drop[0].dropzone.removeAllFiles(true);

                        file_drop
                            .parent()
                            .find("input[name=profile]").remove();

                        __("#sign-up-form")
                            .parents(".modal")
                            .modal("hide");


                        swal("Success","The account has been added","success");

                        return;


                    }



                    const template = account.find("not_valid");
                    account.prepend(template);



                });

                return this;

            },

            populateAllAccounts : function() {


                const data =  this.getData({
                    url : "/SCOA/public/scoa_account/staffs",
                });


                data.then(function(data) {

                    $("#populate_accounts")
                            .html("")
                            .html(data);

                });




              return this;


            } ,

            getData : function(obj) {

                const options = {

                    beforeSend : function () {},

                    complete : function(xhr,status) {},

                    error : function(xhr,status,error) {

                      throw new Error("Error occured : " + [

                          "xhr : " + xhr,
                          "status : " + status,
                          "error : " +error

                      ].join("\n"));

                  },

                  type : "GET"

                };


              return new Promise(function (resolve,reject) {

                  options["success"] = function(response) {

                      if(obj.hasOwnProperty("success"))
                      {
                          obj["success"](response);

                          delete obj["success"];

                      }
                      else {

                          resolve(response);

                      }

                  };

                  Object.assign(options,obj);

                  __.ajax(options);


              });



          },

          main : function() {

            const root = this;

            const start_search = jQuery("#search_template").html();

            jQuery("#populate_accounts").html(start_search)

            this.populateAllAccounts()
                .addStaffValidateFields()
                .checkUser();

            const live = function() {

                setTimeout(function() {

                    root.populateAllAccounts();

                    live()

                },20000)

            }

            live();


          }

        };

        call.main();

    };

    __(document).ready(account);

})(jQuery);