export default function (configuration) {

    configuration = Object.assign({
        r_code : "",
        renewal_id : "",
        tempath : "",
        group_info : {}
    },configuration);


    const __ = jQuery;

    const path = "/SCOA/public/js/";

    const script = [
        "plugins/_typehead/typehead.js",
        "plugins/breeze/lodash.js",
        "plugins/steps/jquery.steps.min.js",
        "scoa/scoa_reminders.js",
        "plugins/_typehead/typehead.js"
    ];

    const opt = new Object();
    opt["AlwaysPreserveOrder"] = true;

    $LAB
        .setOptions(opt)
        .script(script.toNestedArray(path))
        .wait(function() {

            const set = {

                requirement : function() {


                    const set =  {

                        get request() {

                            let checkbox = $('.scoa-requirements input[type=checkbox]');
                            const pathRequest = "/SCOA/public/scoa_organization/requirements/"+configuration.r_code;

                            return new Promise(function (resolve, reject) {

                                const res = function(req) {

                                    const resolver =  scoa.TryCatch(() => JSON.parse(req),reject)

                                    resolve(resolver);
                                };

                                jQuery.post(pathRequest,{
                                    tempath : configuration.tempath
                                },res);

                            });

                        },

                        checkAttr : function(data) {

                            if(!data.hasOwnProperty("is_position_fill"))

                                throw new Error("is_position_fill not specified");

                            if(!data.hasOwnProperty("is_cover_photo_set"))

                                throw new Error("is_cover_photo_set not specified");

                            if(!data.hasOwnProperty("is_members_set_the_requirements"))

                                throw new Error("is_members_set_the_requirements not specified");

                            return true;

                        },

                        CompletedReq : function(data) {

                            this.checkAttr(data);

                            if (data.is_position_fill)

                                __(".scoa-requirements #positions").attr("checked", true);

                            if (data.is_cover_photo_set)

                                __(".scoa-requirements #cover").attr("checked", true);

                            if (data.is_members_set_the_requirements)

                                __(".scoa-requirements #members").attr("checked", true);


                            __('.scoa-requirements input[type=checkbox]').iCheck({
                                checkboxClass: 'icheckbox_square-green',
                                radioClass: 'iradio_square-green',
                                disabledClass: "scoa-disabled-checkbox"
                            });


                            __(".scoa-requirements").toggleClass("sk-loading");

                        },

                        suggestion : function() {

                            if(!window.hasOwnProperty("Bloodhound"))

                                throw new Error("Typehead plugin not found");

                            scoa.jQuery("#mention","body");

                            const suggest =  {

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

                                main : function () {

                                    const root = this;
                                    mention.typeahead({
                                        name: "user",
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
                                    });

                                }

                            };

                            suggest.main();

                            return this;

                        },

                        select_position : function() {

                            const target = "selectPosition"._getId(true);

                        },

                        main : function() {

                            const root = this;

                            this.request.then(function (response) {
                                root.CompletedReq(response)
                            }).catch(function (err) {
                                throw new Error(err);
                            });


                            this
                                .suggestion()
                                .select_position();

                            return this;

                        }

                    };

                    set.main();

                    return this;

                },

                cover_photo : function() {

                  const init = {

                      dropzone : function() {

                          const root = this;

                          const target = "cover_drop"._getId(true);
                          let modal = "modal_cropper"._getId();
                          const modalTemplate = modal.outerHTML;


                          import("/SCOA/public/js/plugins/dropzone/dropzone.js").then(function (value) {

                              const config = {
                                  paramName: "file", // The name that will be used to transfer the file
                                  maxFilesize: 2, // MB
                                  maxFile : 1,
                                  dictDefaultMessage: "<strong>Drop files here or click to upload. </strong></br>" +
                                      " (max size 2 Mb)",
                                  accept : function (file,done) {
                                      done();
                                  },

                                  init : function () {
                                      this.on("addedfile",function () {

                                          if(this.files[1] == null) return;

                                          this.removeFile(this.files[0]);

                                      });
                                  }

                              };

                              Dropzone.autoDiscover = false;
                              const dropzone = new Dropzone("#cover_drop",config);

                              dropzone.on('thumbnail',function(file) {

                                  if(file.cropped) return;

                                  const cachedFilename = file.name;
                                  dropzone.removeFile(file);

                                  "modal_cropper"
                                      ._getId(true)
                                      .remove();

                                  console.log(modalTemplate);

                                  jQuery("body").append(modalTemplate);

                                  modal = "modal_cropper"._getId(true);
                                  const image_container = modal.find(".modal-body .image-crop img");
                                  const reader = new FileReader();

                                  reader.onloadend = function (ev) {

                                      image_container.attr('src',reader.result);

                                      image_container.cropper({
                                          aspectRatio : 1.618,
                                          preview: ".img-preview",
                                          movable : true,
                                          cropBoxResizable : true,
                                          minContainerWidth :850
                                      });

                                  };

                                  reader.readAsDataURL(file);
                                  modal.modal('show');


                              });


                          });

                      },

                      cropper : function() {

                          import("/SCOA/public/js/plugins/cropper/cropper.min.js").then(() => true);

                          return this;

                      },

                      main : function () {

                          const root = this;
                          this.cropper();
                          this.dropzone();


                      }

                  };

                  init.main();

                },

                groupInformation : function() {

                    const target = "groupInformation"._getId(true);
                    const identifier = scoa.page.parameterOf;

                    const init = {

                        template : function(obj) {

                             let myObj = obj;

                             const root = this;

                             if(scoa.checkType(obj) !== "object")

                                 throw new Error("Not valid Object");

                             myObj = Object.assign({
                                 nameField : "",
                                 detailsField : "",
                                 selectedType : 0
                             },obj);


                            const init = {

                                get name() {

                                    return [
                                        '<div class="form-group">',
                                        '<label>Name *</label>',
                                        '<input id="userName"',
                                        'name="userName"',
                                        'type="text"',
                                        'class="form-control required"',
                                        'value="{nameField}"',
                                        'aria-required="true">',
                                        '</div>',
                                    ].join(" ");

                                },

                                get details () {

                                    return [
                                        '<div class="form-group">',
                                        '<label>Details</label>',
                                        '<textarea class="form-control" name="details" style="min-height: 155px;',
                                        'border: 1px"',
                                        'placeholder="What group you creating for ?"',
                                        'value={detailsField}',
                                        'class="form-control"></textarea>',
                                        '</div>'
                                    ].join(" ")

                                },

                                type : function(select = 0) {

                                    const options = [
                                        '<option value="0" {selected}></option>',
                                        '<option value="1" {selected}>Department</option>',
                                        '<option value="2" {selected}>Organization</option>',
                                        '<option value="3" {selected}>Club</option>',
                                    ];

                                    const base =  [
                                        '<div class="form-group">',
                                        '<label>Type</label>',
                                        '<select class="form-control">',
                                        '{options}',
                                        '</select>',
                                        '</div>'
                                    ].join("");

                                    const format_options =  options.map(function (item,index) {

                                        if(index === select) return item.setTokens({selected : "selected"});

                                        return item.setTokens({selected : ""});

                                    }).join("");

                                    return base.setTokens({options : format_options});

                                },


                            };

                            const partial = "{name}{options}{details}".setTokens({
                                name : init.name,
                                options : init.type(myObj.selectedType),
                                details : init.details
                            });


                            return partial.setTokens({
                                nameField : myObj.nameField,
                                detailsField : myObj.detailsField
                            });

                        },
                        main : function () {

                           const root = this;

                           if(scoa.isEmpty(identifier))

                               throw new Error("Parameters is not Valid");

                            scoa
                                .localStorage
                                .groups
                                .asyncRequest(identifier)
                                .then(function(result) {


                                  const temp = root.template({
                                      nameField : result.name,
                                      detailsField : result.details,
                                      selectedType : result.group_type || 0
                                  });

                                  target.html(temp);

                                }).catch(function (reason) { throw new Error(reason); })

                        }
                    };

                    init.main();

                    return this;

                },

                members : function() {

                    const targetClass = "loading_mem"._getClass(true),
                        tableBody = targetClass.find("tbody");

                    if(!tableBody.length) {
                        console.warn("tbody not specified");
                        return;
                    }


                    const mem = {

                        loading : function() {

                            "display-none"._toggleClass("#loaded_mem","#no_members");

                            return this;

                        },

                        get request() {

                            return new Promise(function(resolve) {

                                const response = function (result) {

                                    result = result
                                        ._noDoubleSpace()
                                        ._toJSON();

                                    resolve(result);

                                };

                                jQuery.post("/SCOA/public//scoa_organization/getMembers",{
                                    "renewal__id" : configuration.renewal_id
                                },response)

                            });

                        },

                        get template() {

                            const temp = {

                                parent : "<tr id='{userId}' class='load'>{content}</tr>",
                                mem_state : [
                                    '<td class="project-status">',
                                    '<span class="label label-{label-state}">{state}</span>',
                                    '</td>'
                                ].join(""),

                                user_details : [

                                    '<td class="project-title">',
                                    '<a href="javascript:void 0">{userName}</a>',
                                    '<br>',
                                    '<small id="addedBy" class="animated-background">',
                                    'SCOA SCOA SCOA SCOA SCOA</small>',
                                    '</td>'

                                ].join(""),

                                profile : [

                                    '<td class="project-people">',
                                    '<a href="javascript:void 0">',
                                    '<img class="img-circle" letters="{userFirstname}"',
                                    '_src="/SCOA/public/files/profile/{profile}"',
                                    'data-save="{userId}" identifier="profile_user{user_url}">',
                                    '</a>',
                                    '</td>',

                                ].join(""),

                                position : [

                                    '<td>',
                                    '<select class="form-control input-sm selectPosition">',
                                    '<option value="0"></option>',
                                    '{positions}',
                                    '</select>',
                                    '</td>'

                                ].join(""),

                                buttons : [
                                    '<td class="project-actions">',
                                    '<button href="#" class="remove_mem btn btn-white btn-sm">',
                                    '<i class="fa fa-times"></i> ',
                                    'Remove',
                                    '</button>',
                                    '</td>'
                                ].join("")

                            };


                            const content = scoa.concat(
                                temp.mem_state,
                                temp.user_details ,
                                temp.profile,
                                temp.position,
                                temp.buttons
                            );

                            return temp
                                .parent
                                .setTokens({content : content});

                        },

                        searchUser : function() {

                            const target = scoa.toJquery("#mention");
                            const root = this;

                            const init = {

                                visibilityStateFALSE : function (index) {

                                    const localData = scoa.localStorage.getOf("org_members");

                                    if(index > localData.length) return;

                                    const item = localData[index];

                                    if(!item.hasOwnProperty("visible")) return;

                                    delete item.visible;

                                    const _localData = localData;
                                    _localData[index] = item;

                                    scoa.localStorage.save("org_members",_localData);

                                    return true;

                                },

                                index : function (identifiers) {

                                    const localData = scoa.localStorage.getOf("org_members");

                                    return localData.searchObject(identifiers);

                                },


                            };

                            const whenHasSelected = function(e,datum) {

                                const exisTance = init.index({
                                    id: datum.id
                                });
                                const localData = scoa.localStorage.getOf("org_members");

                                (function () {

                                    if(exisTance > -1) {

                                        const ifJustAdded = init.visibilityStateFALSE(exisTance);

                                        if(!ifJustAdded) swal(
                                            "Already added",
                                            "The user you selected is already " +
                                            "exist",
                                            "error");

                                        return;

                                    }

                                    localData.push(datum);
                                    scoa.localStorage.save("org_members",localData);

                                })();


                                root.refresh();



                            };

                            scoa.queryUsers(target, {
                                hint: true,
                                highlight: true,
                                minLength: 4,
                                url : "/SCOA/public/scoa_organization/QueryUsers",
                                display : function (item) {
                                    return $$.concat(
                                        scoa.endsWith(item.Firstname," "),
                                        scoa.endsWith(item.Middlename," "),
                                        scoa.endsWith(item.Lastname," ")
                                    )
                                }
                            }).on("typeahead:selected",whenHasSelected);

                        },

                        isIdExist : function(id) {

                            const checkOnLocal = function () {

                                const check =  "org_members"
                                    ._getItemFromLocal()
                                    .filter(e => e.id == id && e.hasOwnProperty("visible"));

                                return check.length > 0;

                            };

                            const checkId = targetClass.find("tbody tr[id="+id+"]");
                            return checkId.length > 0 || checkOnLocal();

                        },

                        getId : function(element) {

                            return jQuery(element)
                                .parents("tr[id]")
                                .attr("id");

                        },

                        noMembersState : function() {

                            const tableRows = targetClass.find("table tr");
                            const no_members_template = "no_members"._getId(true);

                            if(tableRows.length) {

                                scoa.addClass(no_members_template[0],"display-none");
                                scoa.removeClass(targetClass[0],"display-none");

                                return;

                            }

                            scoa.addClass(targetClass[0],"display-none");
                            scoa.removeClass(no_members_template[0],"display-none");

                        },

                        removeMembers : function() {

                            const root = this;

                            tableBody.find("tr .remove_mem").on("click",function (e) {

                                const targetId =  root.getId(this);

                                scoa.localStorage.update("org_members",function (item) {
                                    if(item.id != targetId) return item;
                                    item.visible = false;
                                    return item;
                                });

                                tableBody.find("tr").remove();
                                root.refresh();

                            });

                        },

                        refresh : function(requestFromServer = false,callBackServerResult) {

                            const root = this;

                            const localData = "org_members"._getItemFromLocal();

                            (function() {

                                const populate = function(data) {

                                    data.forEach(e => root.designate(e,data));
                                    root.removeMembers();
                                    root.position_selected();

                                };

                                const hidden_data = function () {
                                    return localData.filter(e => e.hasOwnProperty("visible"));
                                };

                                if(!requestFromServer)

                                    return populate(localData);

                                return root.request.then(function (response) {

                                    const deleted_item = hidden_data();

                                    response = response.filter(function (item) {

                                        const byId = deleted_item.filter(
                                            e => e.id == item.id && e.hasOwnProperty("visible")
                                    );

                                        return byId.length <= 0;

                                    });

                                    populate(response);
                                    callBackServerResult(response);
                                });


                            })();


                            this.noMembersState();


                        },

                        live : function() {

                            const root = this;
                            const timer = setTimeout(function () {
                                root.refresh(true,function () {
                                    root.live();
                                });
                            },1000);

                        },

                        addedBy : function(output,id,IsStaff) {

                            const user = scoa.users._get(id,IsStaff).then(function (response) {

                                let template = "<semi_red>Not available</semi_red>";

                                if(!scoa.isEmpty(response)) {

                                    template = [
                                        "Added by",
                                        "<a href='javascript:void 0' class='description'> ",
                                        scoa.concat(
                                            scoa.endsWith(response.Firstname," "),
                                            scoa.endsWith(response.Middlename," "),
                                            scoa.endsWith(response.Lastname," ")
                                        )._strCut(25),
                                        "</a>",
                                    ].join("");

                                }

                                output = tableBody.find("tr[id='"+output+"'] #addedBy");

                                output
                                    .html(template)
                                    .removeClass("animated-background");

                            });

                        },

                        position_selected : function() {

                            const root = this;

                            tableBody.find("tr .selectPosition").on("change",function (e) {

                                const value = this.value,
                                    targetId = root.getId(this);

                                scoa.localStorage.update("org_members",function (item) {
                                    if(item.id != targetId) return item;
                                    item["position"] = value;

                                    if(value != 0) item["IsApproved"] = 1;
                                    else item["IsApproved"] = 0;

                                    return item;

                                });

                                tableBody.find("tr").remove();
                                root.refresh();

                            });

                        },

                        designate : function(data,full) {

                            const root = this,
                                tableBody = targetClass.find("tbody");

                            if(this.isIdExist(data.id)) return;


                            const _state = {

                                get def_state() {

                                    const position = data.position;

                                    if(position == 0) return "Pending";

                                    return data.IsApproved == "1" ? "Active" : "Pending";

                                },


                                get label_state() {

                                    const position = data.position;

                                    if(position == 0) return "warning";

                                    return data.IsApproved == "1" ? "primary" : "warning";

                                }

                            };


                            const template_value = {
                                userId : data.id,
                                user_url : data.user_url,
                                state : _state.def_state,
                                "label-state" : _state.label_state,
                                userName : scoa.concat(
                                    scoa.endsWith(data.Firstname," "),
                                    scoa.endsWith(data.Middlename," "),
                                    scoa.endsWith(data.Lastname," ")
                                )._strCut(25),
                                profile : data.profile,
                                userFirstname : data.Firstname,
                                get addedBy() {

                                    return root.addedBy(
                                        this.userId,
                                        data.addedBy,
                                        data.addByStaff
                                    );

                                },

                                get positions() {

                                    const init_root = this;

                                    const positions = [
                                        "Treasurer",
                                        "Auditor",
                                        "Org Pres.",
                                        "Dept Gov.",
                                        "Adviser"
                                    ];

                                    const init = {

                                        index : function (callBack) {

                                            return positions.map((e,index) => {

                                                index = index + 1;
                                            return callBack(index,e);

                                        }).filter(Boolean);

                                        },

                                        get specified_positions () {

                                            const defined_positions = function (e) {

                                                return new Object({id : e.id , position : Number(e.position)});

                                            };

                                            const already_positions = full
                                                .filter(e => !e.hasOwnProperty("visible"))
                                        .map(defined_positions)
                                                .filter(e => e.position);


                                            const positionIndex = this.index(function (index,item) {
                                                return {index : index , position : item}
                                            });


                                            const filter_already_positions = already_positions
                                                .filter(function (e) {

                                                    return (
                                                        e.id != data.id
                                                        && e.position == e.position
                                                        && e.position != 0);

                                                });


                                            const filter_available_positions = function (item) {

                                                const num = item.index,
                                                    alreadyHasPositions = filter_already_positions
                                                        .map(e => e.position);

                                                if(scoa.isEmpty(alreadyHasPositions)) return true;

                                                return alreadyHasPositions.every(e => e != num);

                                            };

                                            return positionIndex
                                                .filter(filter_available_positions)
                                                .filter(Boolean);


                                        },

                                        get options() {

                                            return this
                                                .specified_positions
                                                .map(function (item) {

                                                    const template = [
                                                        "<option {state} value='{index}'>",
                                                        item.position,
                                                        "</option>"
                                                    ];

                                                    const attribute = {
                                                        index : item.index,
                                                        state : data.position == item.index
                                                            ? "selected"
                                                            : ""
                                                    };

                                                    return template
                                                        .join("")
                                                        .setTokens(attribute);

                                                }).join("");

                                        },

                                        main : function() {

                                            const i = this.options;

                                            return i;

                                        }

                                    };

                                    return init.main();

                                }
                            };

                            const result = root.template.setTokens(template_value);

                            tableBody.append(result);

                            scoa.localStorage.save("org_members",full);

                        },

                        main : function() {

                            const root = this;

                            this
                                .loading()
                                .request.then(function (response) {

                                root.searchUser();
                                scoa.localStorage.save("org_members",response);
                                tableBody.html('');
                                response.forEach(e => root.designate(e,response));
                                root.removeMembers();
                                root.position_selected();
                                root.live();

                            });

                            return this;

                        }

                    }

                    mem.main();


                },

                wizard : function() {

                    const wizard = __("._wizard");
                    wizard.toggleClass("display-none");

                    __("#wizard").steps({
                        height : "auto",
                        onStepChanging: function (event, currentIndex, newIndex) {
                            return true;
                        },
                        onFinished: function (event, currentIndex)
                        {
                            alert("Success");
                        }
                    });

                    this.members();

                    return this;

                },

            };

            scoa.caller(set,
                "requirement",
                "wizard",
                "groupInformation",
                "cover_photo"
            );

            const reminders = window.reminders({
                "set" : "remindByAdmin",
                "by" : "allStaff"
            },false,4);

        });

};