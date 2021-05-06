(function() {

    try {

        const createOrg = function() {

            const usersTags = jQuery(".tagsinput"),
                phoneTags =  jQuery('#phone_number'),
                form = jQuery(".user_org");


            const identifier = "users";

            const call = {

                get userOnTagTemplate() {

                    return [
                        '<span class="tag bold">',
                        '<a href="javascript:void 0" class="text-navy">',
                        '<img alt="image" ' +
                        'letters="{Firstname} ',
                        'src="/SCOA/public/files/default_image/blankprofile.jpg"',
                        '_src="/SCOA/public/files/profile/{profile}"',
                        'data-toggle="tooltip"',
                        'data-placement="auto"',
                        'title=""',
                        'data-original-title="Alliene Thamie Del Rosario"',
                        'class="img-circle profile mention">',
                        '{Firstname}',
                        '{Lastname}<br>',
                        '</a>',
                        '</span>'
                    ].join(" ");


                },

                get usersHintParentCard() {

                    return [
                        '<div class="ProfileCard u-cf border-bottom">',
                        '<img ' +
                        'class="ProfileCard-avatar profile" ' +
                        'letters="{Firstname}"',
                        '_src="/SCOA/public/files/profile/{profile}">',
                        '{card_details}',
                        '</div>',
                    ].join("\n");

                },

                get usersHintCardDetails() {

                    return [
                        '<div class="ProfileCard-details">',
                        '<div class="ProfileCard-realName">' +
                        '{Firstname} ' +
                        '{Middlename} ' +
                        '{Lastname}' +
                        '</div>',
                        '<div class="ProfileCard-screenName">@{user_url}</div>',
                        '<div class="ProfileCard-description">{description}</div>',
                        '</div>'
                    ].join("\n");


                },

                get usersMainHint() {

                    let partial =  this
                        .usersHintParentCard
                        .setTokens({
                            card_details : this.usersHintCardDetails
                        });


                    return partial.setTokens({
                        description : [
                            "<small>",
                            "{CP}",
                            "</small>",
                            "<p>",
                            "<small>",
                            "last active : {last_active}",
                            "</small>",
                            "</p>"
                        ].join("\n")
                    });

                },

                get queryUsers() {

                    const users =  new Bloodhound({
                        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('user_url'),
                        queryTokenizer: Bloodhound.tokenizers.whitespace,
                        remote : {
                            url: "/SCOA/public/scoa_organization/QueryUsers/%QUERY",
                            wildcard: '%QUERY',
                        }

                    });

                    users.initialize();

                    return users;

                } ,

                usersTags : function() {

                    const root = this;

                    usersTags.tagsinput({
                        itemValue : "id",
                        maxTags: 4,
                        confirmKeys: [13,32,44,8],
                        trimValue : true,
                        template : this.userOnTagTemplate,
                        typeaheadjs: {
                            name: identifier,
                            displayKey: "user_url",
                            source: this.queryUsers.ttAdapter(),
                            templates : {
                                suggestion : function(item) {

                                    return root.usersMainHint.setTokens({
                                        Firstname : item.Firstname,
                                        Middlename : item.Middlename,
                                        Lastname : item.Lastname,
                                        user_url : item.user_url,
                                        description : item.about || "",
                                        profile : item.profile,
                                        CP : item.CP,
                                        last_active : item.last_active || "<strong class='text-navy'>online</strong>"
                                    });

                                }
                            }
                        }
                    });


                    return this;

                },

                phoneTags : function() {

                    phoneTags.tagsinput({
                        tagClass: 'label label-primary',
                        maxTags: 4,
                        maxChars: 11,
                        confirmKeys: [13,32,44,8],
                        trimValue : true
                    });

                    return this;

                },

                onSubmit : function() {

                    jQuery.validator.addMethod("checkValidity",function(value,element){

                        const target = jQuery("[name=numbers]");

                        target
                            .siblings(".help-block")
                            .remove();

                        fieldValue = target.val().replace(/\s/gm,"");
                        const split = fieldValue
                            .split(",")
                            .filter(Boolean);

                        const check = split.every(function (value) {
                            const regext = /(^9)([0-9]{9}$)/g;
                            return regext.test(value);
                        });

                        if(!check) {

                            target.after([
                                '<span class="help-block m-b-none error text-danger">',
                                'Invalid mobile phone number(s) eg. 912345678.</span>'
                            ].join(""));

                        }

                        return check;

                    },"");

                    jQuery.validator.addMethod("check_if_there_is_digit",function(value,element){

                        return ! /(\W|(\d|[0-9]))/g.test(value.replace(/\s/g,""))

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


                        submitHandler : function(form) {

                            const tags =  usersTags.val() || phoneTags.val();

                            if(tags) return form.submit();

                            swal({
                                title: "Are you sure?",
                                text: "You attempting to create an " +
                                "organization or department without a group members",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: '#DD6B55',
                                confirmButtonText: 'Yes, I am sure!',
                                cancelButtonText: "No, cancel it!",
                                closeOnConfirm: false,
                                closeOnCancel: false
                            },function (state) {

                                swal.close();

                                if(!state) return ;

                                form.submit();

                            });

                        },


                        rules : {

                            name : {                                required: !0,
                                check_if_there_is_digit : !0,
                                minlength: 2,
                                checkValidity : !0
                            }


                        },



                    };

                    form.validate(param);

                    return this;

                },

                main : function() {

                    this.usersTags()
                        .phoneTags()
                        .onSubmit();

                }

            };

            call.main();

        };

        createOrg();



    }catch(err) {

        console.warn(err);

    }

})();