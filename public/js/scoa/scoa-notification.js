
(function(_){

    const notification = function () {


        const _ = jQuery,
            origin = window.location.origin+"/SCOA/public/";


        var offset = 0,
            notif_length = 0;

        let send = {
            "LIMIT" : 20 ,
            "HAVING" : {"isAlreadyRead" : 0},
            "ORDER" : {"feeds.PDT" : "DESC"}
        };

        const targets = {

            get scroll () {

                return _("#scroll.notification-contents");

            },

            get spinnerBase() {

                return _("#scoa-notification")

            },

            get bellPlacement() {

                return _("#notification");
            },

            get foundPost_container() {

                return _("#scoa-notify");

            },

        };

        const call = {


            get foundFeedPath () {

                return _("[feedsId]")
                    .get()
                    .map(element => _(element).attr("feedsId"))
                    .filter(Boolean);

            },

            markAsRead : function(callback) {

                const root = this;

                if(root.foundFeedPath)
                {

                    function response(result) {

                        if(typeof callback === "function")

                            callback(result);


                    }

                    _.post(origin+"notification/markAsRead",{
                        data : JSON.stringify(root.foundFeedPath)
                    },response);

                }

                return this;

            },

            scroll : function() {

                targets
                    .scroll
                    .slimScroll();

                return this;

            },



            listenScroll : function() {

                const root = this;

                targets.scroll.slimScroll().bind('slimscroll',function(e,pos){

                    if(pos !=="bottom") return;

                    root.alreadySeenPost();


                });


                return this;


            },

            alreadySeenPost : function() {

                const root = this;

                const params = Object.assign(send,{"HAVING" : {"isAlreadyRead" : 1}});

                this.load(params,function (response) {

                    const nonSpaceResult = response.replace(/\s\r\n/gm,"");

                    targets
                        .scroll
                        .find("#read")
                        .last("li:not(#spinner-on)")
                        .after(response);

                    send["feeds.path[!]"] = root.foundFeedPath;


                    return false;


                });

                return this;

            },

            unreadPost : function() {

                const root = this;

                const params = Object.assign(send,{"HAVING" : {"isAlreadyRead" : 0}});

                this.load(params,function (response) {



                    /** create temporary node **/

                   const node = document.createElement("div");
                   node.innerHTML = response;

                   /** get length of results **/

                   const newNotif = node.querySelectorAll("#scoa-notify").length;


                   /** add new result to the current length of found result **/

                   notif_length +=newNotif;


                   if(newNotif != 0)
                   {

                       targets.bellPlacement.html([
                           `<i class="fa fa-bell animated wobble"></i>`,
                           `<span class="label label-primary">${notif_length}</span>`
                       ].join(""));

                       targets
                           .scroll
                           .find("#unread")
                           .prepend(response);

                           send["feeds.path[!]"] = root.foundFeedPath;


                   }


                    setTimeout(() => root.unreadPost(),2000);



                   return false;

                });

                return this;

            },

            live : function() {

                setInterval(() => this.unreadPost(),1000);

            },

            load : function(obj,callback) {

                const action = function(result) {

                    if(typeof callback === "function")
                    {
                        if(!callback(result)) return;

                    }

                    targets
                        .scroll
                        .before()
                        .prepend(result);

                };

                obj = obj || {};

               _.post(origin+"notification/get",{data : JSON.stringify(obj)},action);

               return this;

            },

            main : function() {

                const root = this;

                this
                    .scroll()
                    .unreadPost()
                    .alreadySeenPost()
                    .listenScroll()


                targets.bellPlacement.click(function () {

                    targets.bellPlacement.html('<i class="fa fa-bell"></i>');
                    root.markAsRead(function(val) {

                        console.log(val);

                    });

                })


            }


        };

        call.main();

    };


    if(_.fn._scoa.defaults === undefined)

        _.fn._scoa.defaults = {};


    _.fn._scoa.defaults.notification = notification;

    jQuery(document).ready(_.fn._scoa.defaults.notification)



})(jQuery);