(function(){

   const inbox = function () {

       const _ = jQuery;

       const targets = {

           search : _("#inbox_search"),
           table : _('#inbox_table'),
           next : _("#inbox-next"),
           prev : _("#inbox-prev"),
           select_all : _("#inbox-all"),
           read : _("#inbox-read"),
           refresh : _("#inbox-refresh"),
           search_button : _("#inbox-search-button"),
           categories : _(".inbox-categories"),
           options : _(".inbox-options"),
           mail_content_container : _("#inbox-view-mail"),
           mail_table : _("#inbox-mail"),
           parent_element : _("#inbox-content"),
           view_close : _("#inbox-close"),

           get partial_chart_cash_flow() {

               return _("#inbox_pie_chart_cash_flow");

           },

           get FS_total_cash_flow() {

               return _("inbox_fs_sum"); //tag

           },

           get view_FS_button() {

               return _("#inbox_fs_view");

           },

           get ibox_spinner() {

               return _("#inbox-spinner");

           },

           get FSModal() {

               return _("#admin_FSModal");

           },

           get checklist_identifier() {

               return _(".checklist-fs");

           },

           get update_checklist_button() {

               return _(".checklist-update");

           },

           get comment_section() {

               return _(".comment-section");

           },

           get responds() {

             return _("#responds");

           },

           get comment_field() {

               return _("#inbox-comment-field");

           },



       }

       var offset = 0,
           limit = 20,
           method = null,
           tempSearch = new Object();


       const call = {



           get spinner() {

               let ibox = targets.table.parents(".ibox-content");

               return targets.table
                   .off("load")
                   .off("unload")
                   .on("load",() => ibox.addClass("sk-loading"))
                   .on("unload",() => ibox.removeClass("sk-loading"));

           },

           get content_state() {

               targets
                   .parent_element.on("mail",function () {

                       targets
                           .mail_table
                           .show();

                       targets
                           .mail_content_container
                           .hide();

                   })

               targets.parent_element.on("post",function () {


                   targets
                       .mail_content_container
                       .show();

                   targets
                       .mail_table
                       .hide();

               })


               return targets.parent_element;


           },


           comments : function (path) {

               const action = function(response)
               {

                   targets
                       .responds.html(response)
                       .parents(".sk-loading")
                       .removeClass("sk-loading");

               }


               _.post("/SCOA/public//Inbox/getComments",{"post_url" : path},action);

               return this;

           },

           new_notif_inbox : function() {

               const root = this;

               const action = function(response) {

                   root.new_notif_inbox();

               }

               setTimeout(function () {

                   _.post("Inbox/data",{
                       data : JSON.stringify(
                           {
                               "feeds.isRead" : 0,
                               "LIMIT" : 99
                           })
                   },action)

               },5000)


           },

           update_checklist : function () {

               const root = this;

               const action = function() {

                   const method = _(this).attr("method"),
                       post_url = _(this)
                           .parents("div[post_url]")
                           .attr("post_url");



                   if(!method || !post_url)
                   {
                       throw new Error("parameters invalid and not exist " +
                           "#update_checklist #inbox.js");


                       return;
                   }

                   targets
                       .ibox_spinner
                       .toggleClass("sk-loading");

                   const obj = {
                       "body" : targets.comment_field.val(),
                       "post_url" : post_url,
                       "type" : method
                   }


                   const request = function(response) {



                       targets
                           .ibox_spinner
                           .toggleClass("sk-loading");


                       if(numeral(response)._value !== 1)
                       {
                           throw new Error("unable to update checklist " +
                               "state @update checklist #inbox.js >> " +
                                response)

                           return;

                       }

                       const obj = { "feeds.path" : post_url }; //Query


                       root
                           .setContent(obj)
                           .comments(post_url);


                   }



                   _.post("Inbox/update_submitted_checklist_status",obj,request);

               }


               targets
                   .update_checklist_button
                   .off("click")
                   .on("click",action);

               return this;

           },

           isEmpty : function(value)
           {

               if(value instanceof Array)

                   return !!value.length;

               if(typeof value === "string")

                   return !!value.trim()

               if(typeof value === "number")

                   return !!value || value === 0;

               if(Object.prototype.toString.call(value) === "[object Object]")

                   return Object.keys(value).length;


               return !!value;

           },


           trigger_change_fs : function() {


               const root = this;

               const action = function(rcode)
               {

                   const trigger = function(data,type) {


                       const send = {

                           "xml" : data.xmlFormatted,
                           "folder" : type,
                           "rcode" : rcode

                       }

                       const respond = function(result) {

                          result = result+"".trim();

                          if(numeral(result)._value != "2") //not Success
                          {

                              swal("Error","Error occured if you think this is a error" +
                                  " please contact the developers","error")

                              throw new Error(result);

                          }

                       }

                       _.post("Inbox/saveXMLFS",send,respond);


                   }

                   const eventType = "comment_changed";

                   _(".report").on(eventType,(evt,data) => trigger(data,"cash_collection_report"));
                   _(".received").on(eventType,(evt,data) => trigger(data,"cash_received"));
                   _(".cash-flows").on(eventType,(evt,data) => trigger(data,"cash_flows"));
                   _(".cash-disbursement").on(eventType,(evt,data) => trigger(data,"note_disbursement"));
                   _(".cash-statement").on(eventType,(evt,data) => trigger(data,"cash_statement"));


               }


               window._setFS = action

               return this;


           },

           cash_flow_total : function(data) {

               const add = function (total,value) {

                   return numeral(total)._value
                    + numeral(value)._value
               }


               const total =  data
                   .map(val => val.amount)
                   .filter(Boolean)
                   .reduce(add);


               const formattedTotal = numeral(total).format("0,0");

               targets.FS_total_cash_flow.html(`${formattedTotal}`);

               return this;

           },

           radar_pie_config: function (data) {

               const root = this;

               /** check if radar plugin is exist **/

               if (!window.hasOwnProperty("c3")) {

                   throw new Error("Radar plugin not exist");

                   root.content_state.trigger("mail");

                   return;

               }

               const obj = {

                   bindto: '#'+targets
                       .partial_chart_cash_flow
                       .attr("id"),
                   data: Object.assign(data, {type: 'pie'}),
                   size : {
                       width : 200,
                       height: "auto",
                   },
                   legend : {
                       position : "left"
                   }
               }


               c3.generate(obj);

               return this;

           },

           radar_pie_chart : function(data) {


               const root = this;

               const cleanData = data
                   .filter(value =>
                   value.hasOwnProperty("name") &&
                   value.hasOwnProperty("amount"));


               const columns = cleanData.map(value => [
                   value.name,
                   numeral(value.amount)._value
               ])

               const colors = cleanData.map(value => [
                   value.name,
                   jQuery.scoa._generateRandomColors()
               ])


               const obj = {
                   columns : columns.filter(Array),
                   colors : colors.filter(Array)
               }

               root
                   .radar_pie_config(obj)
                   .cash_flow_total(cleanData);

               return this;


           },

           c3_pie_config : function(data) {

               /** check if plot plugin is exist **/

               if(!$.hasOwnProperty("plot"))
               {

                   throw new Error("jquery.plot.js not exist");

                   root.content_state.trigger("mail");

                   return;
               }


               var plotObj = $.plot(targets.partial_chart_cash_flow, data, {
                   series: {
                       pie: {
                           show: true
                       }
                   },
                   grid: {
                       hoverable: true
                   },
                   tooltip: true,
                   tooltipOpts: {
                       content: "%p.0%, %s", /** show percentages, rounding to 2 decimal places **/
                       shifts: {
                           x: 20,
                           y: 0
                       },
                       defaultTheme: true
                   }
               });

               return this;

           },

           cash_flow_graph : function() {

               const root = this;

               var trigger = function(data) {

                   var parseData = JSON.parse(data);

                   const keyLength = Object.keys(parseData).length;

                   switch (true)
                   {

                       case keyLength <= 4 :

                           root.c3_pie_chart(parseData);

                           break;

                       case keyLength > 4 :

                           root.radar_pie_chart(parseData);

                           break;

                   }
               }

               _.fn._scoa.defaults.cash_flow_graph = trigger;

               return this;

           },

           c3_pie_chart : function(data) {

               const root = this;

               var parseData = data.map(function(value){

                       var is_valid = value.hasOwnProperty("name") &&
                           value.hasOwnProperty("amount");


                       if(!is_valid) return;


                       var obj = {

                           label : value.name,

                           data : numeral(value.amount)._value,

                           color: jQuery.scoa._generateRandomColors(),

                       }


                       return obj;


                   }).filter(Boolean);


               root
                   .c3_pie_config(parseData)
                   .cash_flow_total(data);


               return this;
           },

           view_close : function() {

               _("#inbox-close").on("click",() => this.content_state.trigger("mail"));

               return this;

           },

           setContent : function(obj) {

               const root =this;

               function load_content(template) {


                   /** hide mail unhide post container **/

                   var noSpaces = template.replace(/[\s]/gm," ");

                   root.trigger_change_fs();


                   targets.mail_content_container.html(noSpaces)

                   /** update actions **/

                   root
                       .update_checklist()
                       .view_close()
                       .content_state
                       .trigger("post");

                   root.spinner
                       .trigger("unload");



               }

               root.spinner.trigger("load");

               _.post("Inbox/view",
                   {
                       data : JSON.stringify(obj),
                       LIMIT : 1

                   },load_content);


               return this;


           },

           view : function() {

               const root = this;

               function response() {

                   const id = _(this)
                       .parents("tr:last")
                       .attr("id");


                   root.update_mark_as_read(id,function () {

                       const obj = { "feeds.path" : id }; //Query

                       root
                           .setContent(obj)
                           .comments(id)

                   })


               }

               targets
                   .table
                   .find("tbody tr td")
                   .not(".check-mail")
                   .off("click")
                   .on("click",response)

               return this;

           },

           reset_selected_options : function() {

               _(".folder-list .inbox-options .check-primary").remove();

               delete tempSearch["submission.isApproved"];

               return this;


           },

           update_selected_options : function(type,element) {



               const data = tempSearch["submission.isApproved"];

               if(data && data instanceof Array)
               {


                   const index = data.indexOf(type),
                       isValidId = !isNaN(Number(type));


                   switch (true)
                   {

                       case index > -1 && isValidId :

                           element.find(".check-primary").remove();

                           delete data[index];

                           break;

                       case index <= -1 && isValidId :

                           element
                               .append('<i class="fa fa-check pull-right check-primary"></i>');

                           /** add data if a type is not exist **/

                           data.push(type);

                           break;


                       case type == "entries" && method != "entries" :

                           method = "entries";

                           element
                               .append('<i class="fa fa-check pull-right check-primary"></i>');

                           _(".inbox-options:not([type=entries]) .check-primary").remove();

                           break;


                       case method == "entries" && type == "entries" :

                           method = null;

                           element.find(".check-primary").remove();

                           break;


                   }

                   tempSearch["submission.isApproved"] = data.filter(Boolean);

                   return this;

               }

               tempSearch["submission.isApproved"] = [];

               return this;

           },

           entries : function(type) {



           },

           options : function() {

               const root = this;

               targets.options.on("click",function () {

                   this.reset_offset;

                   const oldData = tempSearch["submission.isApproved"];


                   tempSearch["submission.isApproved"] = oldData || [] ;


                   offset = 0;


                   root.update_selected_options(this.type,jQuery(this))


                   if(!tempSearch["submission.isApproved"])

                       tempSearch = {};


                   root.load(null);

               })

               return this;

           },

           categories : function() {

               var root = this;

               targets.categories.on("click",function () {

                   this.reset_offset;

                   offset = 0;


                   if(this.type != "reset")

                       tempSearch["submission.type"] = this.type;

                   else

                       tempSearch["submission.type"] = ["AOP","FS","MAM","DE","CBL"];


                   root.load(null);

               })

               return this;

           },

           search_button : function() {

               targets.search_button.on("click",function () {

                   targets.search.trigger("trigger-search");

               })

               return this;

           },

           update_mark_as_read : function(id,callback) {

               const root = this;

               const obj = {

                   data : JSON.stringify({"feeds.path" : id})
               }


               function response(response) {

                   root.spinner.on("unload");

                   targets.read.removeAttr("disabled");

                   if(typeof callback === "function")

                       callback(response)

                   if(response.replace(/\s/gm,"") !== "1")

                       return;

                       //throw new Error("Unable to update #read");


               }

               /** disable button for mark_read **/

               targets.read.attr("disabled",true);

               root.spinner.on("load");

               _.post("Inbox/state_of_already_read_feed",obj,response);


               return this;

           },

           markAsRead : function() {

               const root = this;

               targets.read.on("click",function () {

                   const checkbox =  targets
                       .table
                       .find("tbody tr td div.inbox-checked.checked");


                   function filter(element) {


                       const feedsId = _(element)
                           .parents("tr.unread")
                           .attr("id");

                       if(feedsId !== undefined)

                           return feedsId;

                   }

                   const id =  checkbox
                       .get()
                       .map(filter)
                       .filter(Boolean);



                   if(id.length)

                      root.update_mark_as_read(id,() => root.load());



               })

               return this;

           },

           select_all : function() {

               targets.select_all.on("click",function () {

                  var checkbox =  targets
                       .table
                       .find("tbody tr td div.inbox-checked");

                  checkbox.each((index,element) => _(element).addClass("checked"));


               })

               return this;

           },

           reset_state : function() {

               targets.next.removeAttr("disabled");
               targets.prev.removeAttr("disabled");
               targets.select_all.removeAttr("disabled");
               targets.read.removeAttr("disabled");

               return this;

           },

           force_reset() {

               this.reset_selected_options()
               offset = 0;
               tempSearch = {};
               method = null;

           },

           refresh : function() {

              var root =this;

              targets.refresh.on("click",function(){

                  root.force_reset();

                  root.load();

              })

               return this;

           },

           button_state : function() {

               const resultSet = targets.table.find("tbody tr:not(.no-data)");

               this.reset_state();

               var offsetTemp = offset;

               if(resultSet.length < limit)
               {
                   targets.next.attr("disabled",true);

                   offsetTemp=-2;

               }


               if(!resultSet.length && offset <= limit )
               {
                   targets.prev.attr("disabled",true);
               }


               /** if has no previos data **/


               if(!offset)
               {
                   targets.prev.attr("disabled",true);
               }


               if(offsetTemp <= offset)

                   return false

               return true;

           },

           offset : function() {

               const root =this;

               function loadState(data) {

                 const ifInputNotEmpty = targets
                     .search
                     .val()
                     .trim() !== "";

                 if(ifInputNotEmpty)
                 {

                     targets.search.trigger("trigger-search");

                     return;

                 }

                   root.load(null);

               }

               targets.next.on("click",function () {

                   offset+=limit;

                   loadState();

               })

               targets.prev.on("click",function () {

                   offset = offset !== 0
                       ? offset-limit
                       : 0;

                   loadState();

               })

               return this;

           },

           get reset_offset() {

               offset = 0;

           },

           get reset_tempSearch()  {

               tempSearch = new Object();

           },

           search : function() {

               var root = this;

               targets.search.on("change trigger-search",function(evt)
               {

                   if(evt.handleObj.type !== "trigger-search")
                   {
                       root.reset_offset;
                   }


                   var obj = {

                       OR : {

                           "user.Firstname[~]" : targets.search.val(),
                           "user.Middlename[~]" : targets.search.val(),
                           "user.Lastname[~]" : targets.search.val(),
                           "submission.type[~]" : targets.search.val(),
                           "submission.body[~]" : targets.search.val(),
                           "feeds.PDT[~]" : targets.search.val(),

                       },

                   }

                   root.load(obj);

               })

               return this;

           },

           load : function(data = null,callback) {


               const root = this,
                   offsetTemp = offset;

               data = Object.assign(data || {},{LIMIT : [offsetTemp,limit]});

               data = Object.assign(data,tempSearch);

               root.content_state.trigger("mail");

               /** clean parameter **/

               Object.keys(data).forEach(key => {

                  if(!root.isEmpty(data[key]))

                      delete data[key];

               })


               const url = method
                   ? `Inbox/get/${method}`
                   : `Inbox/get`;


               _.ajax({

                   type : "post",
                   url : url,
                   data : {data : JSON.stringify(data)},
                   beforeSend : () => this.spinner.trigger("load"),
                   complete : () => root.spinner.trigger("unload"),


                   success : function (response) {

                       var noSpaces = response.replace(/[\s]/gm," ");

                       targets.table
                           .find("tbody")
                           .html(noSpaces);

                       if(typeof callback === "function")

                           callback(noSpaces);


                       root
                           .view() //update action
                           .button_state() //Boolean return


                   }

               })

               return this;

           },

           main : function ()
           {

              this
                  .load()
                  .search()
                  .offset()
                  .refresh()
                  .select_all()
                  .markAsRead()
                  .search_button()
                  .categories()
                  .options()
                  .cash_flow_graph()
                  .new_notif_inbox();


           }

       };


       call.main();

   };


   if($.fn._scoa.defaults === undefined)

       $.fn._scoa.defaults = new Object();


   $.fn._scoa.defaults.inbox = inbox;

   jQuery(document).ready($.fn._scoa.defaults.inbox)

})();


