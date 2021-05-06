
(function() {

    const reminders = function(_obj = {},theme = true,limit = 10) {

        const pathRoot = "/SCOA/public/";
        const currentURL = location.href;
        const currentPage = function() {

            let loc = currentURL.split("/");
            loc = _.remove(loc,Boolean);
            const index  = _.indexOf(loc,"public");
            const next = loc[index+1];

            if(!next) throw new Error("INVALID URL");

            return next;

        };



        const init = {

            get request() {

              return new Promise(function (resolve,reject) {

                  const request = "/SCOA/public/"+currentPage();
                  const response = function (result) {

                      result = String(result).replace("/\s/gm","");

                      if(!result) reject("No results");

                      try {

                         const json = JSON.parse(result);
                         resolve(json);

                      }catch (e) {
                          reject(e,result);
                      }

                  };


                  //$.post(request+"/getReminders/50",Object.assign({"url" : url},_obj),response);

                  $.post(request+"/getReminders/50",_obj,response);

              });


              return this;


            },

            setResult : function(template,count) {

                jQuery("#reminders.ibox-content")
                    .attr("class","");

                document.querySelector("#reminders").innerHTML = template;
                document.querySelector("#remind_count").innerHTML = count;

            },

            getTemplates : function(data) {

                const request = "/SCOA/public/templating";

                return new Promise(function (resolve, reject) {

                    const response = function(result) {

                        result = String(result).replace(/\s\s\s/gm,"");

                        if(!result) reject("No result");

                        const dom = document.createElement("div");
                        dom.innerHTML =  result;
                        const count = dom.querySelectorAll(".feed-element").length;

                        if(!count) reject("No results");

                        resolve(result,count);

                    };

                    $.post(request+"/setTemplateReminders",{
                        of : JSON.stringify(data),
                        theme : theme,
                    },response);

                });


            },

            last : function(data,property) {

                if(data.hasOwnProperty(property))

                    data[property] = Array.of(_.last(data[property]));

                return data;

            },

            submitted_checklist : function(data) {

                if(data.hasOwnProperty("E")) {

                    let byChecklistType = _.groupBy(data["E"],"checklistType");

                    byChecklistType = _.mapValues(byChecklistType,function (e) {
                        let groupByUser = _.groupBy(e,"user");
                        groupByUser = _.mapValues(groupByUser,byUser =>  _.orderBy(byUser,"feedsId","asc"));
                        groupByUser = _.map(groupByUser,e => _.last(e));
                        return groupByUser;
                    });

                    const flat  = _.map(byChecklistType,_out => _out);
                    data["E"] = _.flatten(flat);

                }

                return data;

            },

            batch_set : function(data) {

                return this.last(data,"I");

            },

            batch_update : function(data) {

                return this.last(data,"J");

            },

            groupAndOrder : function(data) {

                const group =  _.groupBy(data,"feedsType");

                const byOrder = _.mapValues(group,function (typeValue) {

                    return _.orderBy(typeValue,function (everyPost) {
                        return numeral(everyPost.feedsId)._value;
                    },"asc");

                });

                return byOrder;

            },

            main : function () {

                const root = this;

                this.request.then(function (response) {

                    let data = root.groupAndOrder(response);
                    data = root.batch_update(data);
                    data = root.batch_set(data);
                    data = root.submitted_checklist(data);

                    data = _.map(data,e => e);
                    data = _.flatten(data);

                    data = _.orderBy(data,"feedsId","desc");

                    data = _.take(data,limit);

                    root.getTemplates(data).then(function (result) {
                       root.setResult(result);

                    }).catch(function (reason) {

                        console.warn("Reminder says : "+reason);
                        jQuery("#reminders").parents(".ibox-content").remove();

                    });

                }).catch(function(reason,results) {

                    console.warn("Cant get reminders reason : " + reason);
                    jQuery("#reminders").parents(".ibox-content").remove();

                })

            }

        };

        /** check dependencies **/

        /** lodash.js **/

        if(!["_","VERSION"]._checkIfHasProperyOf(window)) return;

        /** numeral.js **/

        if(!["numeral"]._checkIfHasProperyOf(window)) return;

        return init.main();

    };

    window.reminders = reminders;

})();