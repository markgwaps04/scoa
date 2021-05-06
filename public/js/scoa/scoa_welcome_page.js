(function(__) {

    const spinnerTemplate = ' <div id="scoa_spinner" ' +
        'class="ibox-content middle-box scoa-transparent sk-loading no-borders" >\n' +
        '                        <div class="sk-spinner sk-spinner-three-bounce">\n' +
        '                            <div class="sk-bounce1"></div>\n' +
        '                            <div class="sk-bounce2"></div>\n' +
        '                            <div class="sk-bounce3"></div>\n' +
        '                        </div>\n' +
        '                    </div>';


    if(__("ALL_USER_GROUPS").length)
    {

        __.ajax({

            url : "/SCOA/public/organization/user_groups",
            type : "get",
            beforeSend : function() {

                __("ALL_USER_GROUPS").html(spinnerTemplate);

            },

            complete : function() {

                __("#scoa_spinner").remove();

            },

            success : function(response) {

              __("ALL_USER_GROUPS").html(response);

            }

        })

    }




    if(__("RECENT_ACTIVITY").length)
    {

        __.ajax({

            url : "/SCOA/public/organization/recent_activity",
            type : "get",
            beforeSend : function() {

                __("RECENT_ACTIVITY").html(spinnerTemplate);

            },

            complete : function() {

                __("#scoa_spinner").remove();

            },

            success : function(response) {

                const trim = response.replace(/\s/gm,"");

                if(!trim.length) {

                    __("RECENT_ACTIVITY").html([
                        '<div>',
                        '<h2 class="text-center">No recent activity</h2>',
                        '</div>'
                    ].join("\n"));

                    return;

                }

                __("RECENT_ACTIVITY").html(response);

            }

        })

    }





})(jQuery);