(function() {


    scoa.documentReady(function () {


        const path = "/SCOA/public/js/";

        const script = [
            "plugins/breeze/lodash.js",
            "scoa/scoa_reminders.js",
            "plugins/ladda/spin.min.js",
            "plugins/ladda/ladda.min.js",
            "plugins/ladda/ladda.jquery.min.js"
        ];

        const opt = new Object();
        opt["AlwaysPreserveOrder"] = true;

        $LAB
            .setOptions(opt)
            .script(script.toNestedArray(path))
            .wait(function() {

                const target = "request_group"._getId(true);

                const init = {

                    get template() {

                        const  init = {

                            get hasData () {

                                return [

                                    '<tr>',

                                    '<td class="project-status">',
                                    '{member_code}',
                                    '</td>',

                                    '<td class="project-files">',
                                    '{state}',
                                    '</td>',

                                    '<td class="project-title">',
                                    '<a href="view_info/{id}">',
                                    '{name}',
                                    '</a>',
                                    '<br/>',
                                    '<small>',
                                    '{create_date_time}',
                                    '</small>',
                                    '</td>',

                                    '<td class="project-people">',
                                    '{users}',
                                    '</td>',

                                    '<td class="project-actions">',
                                    '{buttons}',
                                    '</td>',

                                    '</tr>'

                                ].join(" ");

                            },

                            get no_data() {

                                return [

                                    '<div class="row wrapper  white-bg page-heading">',
                                    '<div class="col-lg-12 text-center ">',
                                    '</br>',
                                    '<h2 class="position-absolute text-center full-width clear-left">No request',
                                    'found</h2>',
                                    '</div>',
                                    '</div>'

                                ].join(" ");

                            },


                            get approved() {

                                return [
                                    '<span class="',
                                    'valign-middle',
                                    'pull-right',
                                    'label label-info',
                                    'position-relative-b-n-1">',
                                    '<i class="fa fa-check"></i>',
                                    'Approved',
                                    '</span>'
                                ].join(" ");

                            },


                            get decline() {

                                return [
                                    '<span class="',
                                    'valign-middle',
                                    'pull-right',
                                    'label label-warning',
                                    'position-relative-b-n-1">',
                                    '<i class="fa fa-times"></i>',
                                    'Decline',
                                    '</span>'
                                ].join(" ");

                            },

                            buttons : function (hadRenew = true) {

                                const accept = [

                                    '<button  class="ladda-button btn btn-primary btn-sm choices-x attr" type="button"',
                                    ' data-style="expand-left">',
                                    '<scoa_attr type="id">{id}</scoa_attr>',
                                    '<scoa_attr type="orgId">{orgId}</scoa_attr>',
                                    '<i class="fa fa-check"></i>',
                                    'Accept',
                                    '</button>'

                                ].join("");

                                const reject = [

                                    '<button class=" ladda-button btn btn-warning btn-sm choices-y" type="button"',
                                    'data-style="expand-right">',
                                    '<scoa_attr type="id">{id}</scoa_attr>',
                                    '<scoa_attr type="orgId">{orgId}</scoa_attr>',
                                    '<i class="fa fa-times"></i>',
                                    'Reject </button>'

                                ].join(" ");

                                return "{accept}{reject}".setTokens({

                                    accept : accept,
                                    get reject() {
                                        if(!hadRenew) return reject;
                                        return "";
                                    }

                                })

                            },

                            users : function (data) {

                                if(scoa.checkType(data) !== "array")

                                    throw new Error("Invalid paramter type");

                                const temp = [

                                    '<img',
                                    'data-toggle="tooltip"',
                                    'data-placement="auto"',
                                    'title="{Firstname}{Middlename}{Lastname}"',
                                    'class="img-circle"',
                                    'data-save="{id}"',
                                    'identifier="profile_user{user_url}"',
                                    'letters="{Firstname}"',
                                    '_src="{profile}">',

                                ];

                                 const result = data.map(function (e) {
                                     return temp.join(" ").setTokens(e);
                                 });

                                 if(result.length < 3) return result.join(" ");

                                 const not_visible_length = (result.length) - 2;

                                 const partial = result.splice(0,2);

                                 return scoa.concat(partial.join(" "), [
                                         '<img class="img-circle"',
                                         'value="+{count}"',
                                         'letters="U"',
                                         'background="#FFFFFF"',
                                         'color="#000000"',
                                         '>',
                                     ].join(" ").setTokens({count : not_visible_length})
                                 );


                            }

                        };

                        return init;

                    },

                    get request () {

                        const root = this;

                        return new Promise(function (resolve) {

                            const response = function (result) {

                                result = result
                                    ._noDoubleSpace()
                                    ._toJSON();

                                resolve(result);

                            };

                            jQuery.get("/SCOA/public//scoa_organization/unapproved_group",response);
                        });

                    },

                    action : function() {

                        const root = this;

                        const accept_identifier  = "choices-x";
                        const reject_identifier  = "choices-y";

                        const accept_buttons = accept_identifier._getClass(true);
                        const reject_buttons = reject_identifier._getClass(true);

                        const button_state = function (element) {

                            if(!element.length) throw new Error("No target element");

                            const parent_td = element.parents("td");
                            const reject = parent_td.find("button."+reject_identifier);
                            const accept  = parent_td.find("button."+accept_identifier);

                            const path = "/SCOA/public/scoa_organization/club_approval_request";
                            const state = scoa.hasClass(element[0],accept_identifier)
                                ? "activate"
                                : "decline";

                            const obj = Object.assign({state : state},scoa.dataAttributes(element[0]));

                            element = scoa.toJquery(element).ladda();

                            const init = {

                                load_state : function(load,notvisible) {

                                    if(!load.length) return;

                                    load.on("load",function() {

                                        load.ladda("start");
                                        notvisible.addClass("display-none");

                                    }).on("stop",function () {

                                        if(!notvisible.length) return;

                                        setTimeout(function () {
                                            load.ladda("stop");
                                            notvisible.removeClass("display-none");
                                        },500);

                                    });

                                    return load;

                                },

                                start_load : function() {

                                    if(state === "activate") return accept.trigger("load");

                                    return reject.trigger("load");

                                },

                                get request() {

                                    const root = this;

                                    return new Promise(function (resolve) {

                                        root.start_load();
                                        const result = function(response) {

                                            const format = String(response)._noDoubleSpace();
                                            const noSpace = format.replace(/\s/gm,"");

                                            if(!noSpace.length) return start_load.trigger('stop');

                                            if(scoa.checkType(format) !== "number") {
                                                swal("Error","Server error unable to update","error");
                                                throw new Error(response);
                                            }

                                            resolve(format);

                                        };

                                        jQuery.post(path,obj,result);

                                    });

                                },

                                main : function () {

                                    if(!window.hasOwnProperty("Ladda")) throw new Error("Plugin ladda not exists");

                                    if(!accept.length) swal("Error","No accept button found");

                                    this.load_state(accept,reject);
                                    this.load_state(reject,accept);

                                    this.start_load();

                                    this.request.then(function (response) {

                                        if(state === "activate") return parent_td.html(root.template.approved);

                                        return parent_td.html(root.template.decline);

                                    });

                                }

                            };

                            return init.main();

                        };

                        const send = function(state,element) {

                            const attributes = scoa.dataAttributes(element);
                            const isEmptyAttr = scoa.isEmpty(attributes);
                            const isValidParameters = scoa.hasOwnProperty(attributes, "id");
                            const OfElement = scoa.toJquery(element);

                            if(isEmptyAttr && !isValidParameters)
                            {

                                swal("Error","The Parameters is not valid","error");

                                OfElement
                                    .parents("td")
                                    .html("<red>No available actions</red>");

                                return;
                            }

                            button_state(OfElement);

                        };

                        accept_buttons.click(function () {
                            send(1,this);
                        });

                        reject_buttons.click(function () {
                            send(0,this);
                        });

                    },

                    format_members : function(data) {

                        if(scoa.checkType(data) !== "object") return;

                        const hasValid = scoa.hasOwnProperty(data,
                            "id",
                            "user_url",
                            "profile",
                            "Firstname",
                            "Middlename",
                            "Lastname",
                        );


                        if(!hasValid) return;

                        const filtered =  scoa.Querfy(data,[
                            "id",
                            "user_url",
                            "profile",
                            "Firstname",
                            "Middlename",
                            "Lastname",
                        ]);

                        filtered.Firstname = scoa.endsWith(filtered.Firstname," ");
                        filtered.Middlename = scoa.endsWith(filtered.Middlename," ");
                        filtered.Lastname = scoa.endsWith(filtered.Lastname," ");

                        return filtered;

                    },

                    format : function(data) {

                        if(scoa.checkType(data) !== "object") return;

                        const hasValid = scoa.hasOwnProperty(data,
                            "member_code",
                            "had_renew",
                            "name",
                            "create_date_time",
                            "isUpdated_RCode",
                            "renewalId",
                            "orgID",
                            "group_type",
                            "details"
                        );

                        if(!hasValid) return;

                        data = scoa.updateKeys(data,{
                            "renewalId" : "id"
                        });

                        return scoa.Querfy(data,[
                            "member_code",
                            "had_renew",
                            "name",
                            "create_date_time",
                            "members",
                            "isUpdated_RCode",
                            "id",
                            "orgID",
                            "group_type",
                            "details"
                        ]);



                    },

                    main : function () {

                        const root = this;

                        this.request.then(function (value) {

                            if(!value.length) return request_group.html(root.template.no_data);

                            const format = value.map(e => root.format(e)).filter(Boolean);

                            const result = format.map(function (e) {

                                const template_values = Object.assign(e,{

                                    name : String(e.name)._strCut(25),

                                    get users() {

                                        const members = e
                                            .members
                                            .approved
                                            .map(data => root.format_members(data))
                                            .filter(Boolean);

                                        if(!members.length) return "<red>No members</red>";

                                        const setTemplate = root.template.users(members)

                                        return setTemplate;

                                    },

                                    get buttons() {

                                        return root
                                            .template
                                            .buttons(e.had_renew)
                                            .setTokens({
                                                id : e.id,
                                                orgId : e.orgID,
                                            });

                                    },

                                    state : e.isUpdated_RCode
                                        ? "<a href='javascript:void 0'>Updated</a>"
                                        : ""

                                });
                                
                                return root
                                    .template
                                    .hasData
                                    .setTokens(template_values);

                            });

                            request_group.html(result);
                            root.action();

                            jQuery('[data-toggle="tooltip"]').tooltip()

                        });

                    }

                };


                init.main();

                const reminders = window.reminders({
                    "set" : "remindByAdmin",
                    "by" : "allStaff"
                },false,4);

            });


    });

})();