

$(document).ready(function()
{


    jQuery.validator.addMethod("check_if_there_is_digit",function(value,element){

        return ! /(\W|(\d|[0-9]))/g.test(value.replace(/\s/g,""))

    },'No special/number characters');

    jQuery.validator.addMethod("validate_phone_tags",function(value,element){

        var numbers = value.split(",");

        numbers = value.map(e => e.trim());

    },'No special/number characters');


    let param = {

        errorClass: "help-inline invalid_message text-danger animated",

        errorElement: "span",

        errorPlacement: function(e, a) {

            jQuery(a).parents(".form-group").append(e)

        },

        highlight: function(e) {
            jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
        },
        success: function(e) {
            jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
        },


        rules :{
            position  : {
                required : !0,
            },
            name : {
                required : !0,
                check_if_there_is_digit : !0,
                minlength: 5
            },
            details : {
                required : !0,
                minlength: 250,
                maxlength: 1000
            },

            agreement : {
                required : !0
            }
        },

        messages : {

            position: {
                required : "Please fill this field"
            },
            name : {
                required : "Please fill this field"
            },
            details : {
                required : "Please fill this field"
            },
            agreement : {
                required : "Check this as a sign of agreement."
            }

        }


    };


    jQuery(".user_org").validate(param)




});