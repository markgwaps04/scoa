$(function(){

    $(".content-load").each(function(){

        $(this).newElement([
            {"div":{class : "spinner",
                    style : "position: absolute;display: none;top: 40%;left: 0;right: 0;z-index: 1000;"},
                child : [{'div' : {class : "sk-spinner sk-spinner-pulse"}}]
            }

            ]);
        })

    $(window).bind('mousewheel DOMMouseScroll', function(event){
        if(event.ctrlKey == true){event.preventDefault();}
    })


});






function notif($args = {

    title : null,
    content : null,
    type: null


},$callBack = function(){ return null }){

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "preventDuplicates": true,
        "positionClass": "toast-top-right",
        "onclick": typeof $callBack === "function" ? $callBack() : null,
        "showDuration": "400",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };





    toastr[$args.type]($args.content,$args.title);

}


$(document).keydown(function (event) {
    if(event.ctrlKey == true && (event.which == '61'
        || event.which == '107'
        || event.which == '173'
        || event.which == '109'
        || event.which == '187'
        || event.which == '189'
)){event.preventDefault();}


})






(function (factory) {
    "use strict";

    //JQuery Registered a global variable $.fn.custom_variable

    //noinspection JS Unresolved Variable

    //jshint : this line will ignore

    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(['jquery'], factory); // jshint ignore:line
    } else { // noinspection JSUnresolvedVariable
        if (typeof module === 'object' && module.exports) { // jshint ignore:line
            // Node/CommonJS
            // noinspection JSUnresolvedVariable
            module.exports = factory(require('jquery')); // jshint ignore:line
        } else {
            // Browser globals
            factory(window.jQuery);
        }
    }
}(function ($) {

    const CHECKLIST = 2011,CREATED_ORGANIZATION = 101,ARTICLE = 77,REGULAR_POST = 66,NOTHING = '',FEED = 0,RECENT_ACTIVITY = 1,AOP = 201,MAM = 202,CBL = 203,FS = 204,DE = 205;


    const emoji_non_standars_unified = "([\uE000-\uF8FF]|\uD83C[\uDC00-\uDFFF]|\uD83D[\uDC00-\uDFFF]|[\u2011-\u26FF]|\uD83E[\uDD10-\uDFFF])";

    const UPLOAD_PATH = "uploads";

    String.prototype.setTokens = function (replacePairs) {



        let str = this.toString(), key, re;
        for (key in replacePairs) {
            if (replacePairs.hasOwnProperty(key)) {
                re = new RegExp("\{" + key + "\}", "g");
                str = str.replace(re, replacePairs[key]);
            }
        }
        return str;
    };
    String.prototype.encodeUTF16 = function () {
        let value = new String(this).valueOf();

        let buf = new ArrayBuffer(value.length * 2);
        let bufView = new Uint16Array(buf);
        for(let i = 0; i < value.length; i++ ){
            bufView[i] = value.charCodeAt(i);
        }
        return new Uint8Array(buf);
    }

    String.prototype.toJSON = function(){
        let result = {valueOf : false , reason : !true };

        try{

            if(!this.valueOf().trim()){ return result; }

            let valid_json = ! /^[\[|\{](\s|.*|\w)*[\]|\}]$/.test(this);

            if(valid_json){return {valueOf : JSON.parse(this) , reason : !true };}

            result.reason = "Not valid JSON";
            return result;

        }catch (e) {

            result.reason = e;
            return result;
        }

    };
    Element.prototype.error = function(error){

        this.innerHTML = Error.parent.setTokens({
            icon : Error.icon ,
            title : Error.title ,
            message: Error.message ,
            error : error});

    }

    NodeList.prototype.files = function (main) {
        let settings = {
            layoutTemplates : {actionDelete : "" , actionDrag : ""},
            initialPreview : [],
            initialPreviewConfig : []
        }

        this.forEach(function(element){

            if(element.attributes["data"] !== undefined){
                let data = JSON.parse(decodeURI(element.attributes["data"].value));

                for(let index in data){
                    if(!new Boolean(data[index].filename).valueOf()){

                        break;
                    }else{
                        settings.initialPreview.push(UPLOAD_PATH+"/"+data[index].filename);

                        let preConfig = {
                            caption : data[index].original_filename.slice(0,40),
                            type : main._get_file_type(data[index].filename),
                            width: "120px",
                            url: "{$url}"
                        }
                        settings.initialPreviewConfig.push(preConfig);
                    }
                }
                settings.initialPreviewAsData =  true;
                settings.showDownload = true;
                settings.uploadUrl = "../Welcome/upload.php";
                settings.showCaption= false;
                settings.fileType= "any";
                settings.previewFileIcon= "<i class='fa fa-file-archive-o'></i>";
                settings.showAjaxErrorDetails= false;
                $(element).fileinput(settings)
                $(element).remove()
            }

        })
    }
    let SCOA = function(element,source,options){



         let self = this;

        self.Jquery = $(element);
        self.options = options;
        self.source = source;
        self.element = element;
         if(self.isJSON(source) && self.isString(source)){

             self.source = source.toJSON();
         }
         self.init();

    }

    SCOA.prototype = {


        init : function(){
            let source,self = this;
            self._initTemplate();
            self._set_config();

            for(let index in self.source.valueOf){
                source = self.source.valueOf[index];
                if(self.default.type === FEED){self._feed();}
                if(self.default.type === RECENT_ACTIVITY){ self._activity()}

               self.type_of_post = source;
               self._avatar = source;
               self._body = source;
               self._loading()
               self._postURL(source);
               self._show_result;


                /**
                 * Requirements krajee file-input
                 */

               try{document.querySelectorAll("#feed_data").files(self);}catch(err){console.log(err);}

            }
        },

        get _show_result(){
          let self = this;
            self.Jquery.append(self.template);
        },
        set _body(source){

            let self = this;

            let strip = document.createElement("body");
            strip.innerHTML  = source.details.details

            let a_body = `<for_body style="white-space: pre-wrap">{content}</for_body>`.setTokens({content : strip.textContent});

            let body_length,newline_length,body = a_body;
            newline_length = (new String(body).valueOf().match(/\r?\n/g) || '').length + 1;
            body_length = new String(body).valueOf().length;


            if(newline_length > 4){
                body = body.slice(0,Math.abs(newline_length-body_length));
                body+= "...</br></br> <a href='#'>See more</a>";
            }

            if(body_length > 500){
                body = body.slice(0,500);
                body+= "...</br></br> <a href='#'>See more</a>";
            }

            if(self.default.type === FEED){

                self.regular_post(source,body)
                self._checklist(source,body);

            }

            if(self.default.type === RECENT_ACTIVITY){
                self._create_organization(source);
            }

        },
        _postURL : function(source){
           this.template = this.template.setTokens({post_url : encodeURI(source.PostURL)})
        },
        set _avatar(source){

            let self = this;
            if(!source){return false;}
            if(new String(source.postBy).valueOf() == "admin" ){
                self.template =  self.template.setTokens({avatar_name: "SCOA"});
            }else{
                self.template = self.template.setTokens({avatar_name:
                        (source.Firstname.concat(" "+source.Lastname))})
            }

        },

        set _join_organization(source){
            let self = this;
           // if(self.toInt(source.type) === )
        },

        _create_organization : function(source){

            let well,self = this,activity = self.default.recent_activity;
            alert(source.Type);
            if(self.toInt(source.Type) === CREATED_ORGANIZATION){
                well =activity.well.setTokens({well : source.org.details})
                self.template = self.template.setTokens({well : well});
            }

        },
        regular_post : function(source,template){
            let _for_attachment,_for_body,self = this,type = self.toInt(source.Type);

            /**
             * Check type of post
             * this only for regular post for feeds
             */

            if(type === REGULAR_POST || type === ARTICLE){

             _for_body = self.template.setTokens({body: source.details.details
                     ? "<p style='white-space: pre-wrap'>"+template+"</p>{attachment}"
                     : "{attachment}"});


                if(source.files.length > 1){

                   _for_attachment = self.default.feed_template.attachments.ordinary.setTokens(
                       {number_of_files : source.files.length})
                    _for_body = _for_body.setTokens({attachment: _for_attachment});

                }


                _for_body = _for_body.setTokens({attachment: "{files}"});

                /**
                 * Output the result
                 */




                console.log(_for_body.includes("{files}"));


                self.template = self._files(source,_for_body);
            }
        },
         _checklist: function(source,template) {

            let _for_attachment,self = this,attachment = self.default.feed_template.attachments,feed = self.default.feed_template,type = self.toInt(source.Type);

            if(type === CHECKLIST){


                if(source.files.length){

                    template+="{attachment}";
                    _for_attachment = attachment.checklist.setTokens({number_of_files : source.files.length})
                    template = template.setTokens({attachment: _for_attachment});
                    template = self._files(source,template);

                }


                let _for_body = feed.checklist.setTokens(
                    {body : template ,
                        title: self._checklist_type(source.details.type)});



                self.template = self.template.setTokens({
                    body: source.details.details
                        ? _for_body
                        : ""});

            }


        },
        _files : function(source,template) {

            let parent_preview,_for_file,type_of_file,self = this,attachment = self.default.feed_template.attachments;


           // console.log("1st template >> "+template+" >>>> " + (source.files.length === 1));


            if(source.files.length === 1){

              //  console.log("2nd template >> "+template+" >>>> " + (source.files.length === 1));

                type_of_file = self._get_file_type(source.files[0].filename);


                /**
                 * check file type
                 */

                    if(type_of_file === "image" || type_of_file === "video" || type_of_file === "audio"){

                        /**
                          * get the template for the file and stringify
                          */

                    _for_file = attachment.preview[type_of_file].setTokens(
                        {source : 'uploads/'+source.files[0].filename,
                         original_filename : source.files[0].original_filename});



                        parent_preview = attachment.preview.parent.setTokens({content : _for_file});


                        /**
                         * add result to the parent container
                         */


                    _for_file =  template.setTokens({
                        files : parent_preview})



                    return _for_file.setTokens({type_of_file : type_of_file})

                }
            }else{

                for(let files_row in source.files){

                    let result =  template.setTokens({files : attachment.preview.file });
                    return result.setTokens({data: encodeURI(JSON.stringify(source.files)) });
                }
            }

            return template.setTokens({files : ""});

        },
        _get_file_type : function(file_name) {

            let file_types = this.file_types;

            for(let index in file_types){
                if(typeof file_types[index] === "object"){
                    for(let regex in file_types[index]){
                        if(_check_if_equal(file_types[index][regex])){
                            return index;
                        }}
                }

                if(typeof file_types[index] !== "object"){
                    if(_check_if_equal(file_types[index])){
                        return index;
                    }
                }}

            function _check_if_equal(regex){return new RegExp(regex).test(file_name);}
            return "other";

        },
        _checklist_type: function(type,$name){
            let self = this;
            switch (self.toInt(type)){

                case AOP :
                    return "Anual Operating Plan (Secure a copy from SCOA)";
                    break;

                case MAM:
                    return "Minutes from the Activity's meeting"
                    break;

                case CBL :
                    return "CBL";
                    break;

                case FS:
                    return "Financial Statements";
                    break;

                case DE:
                    return "Documentary Evidence";
                    break;
                default:
                    if(name === undefined){
                        return false;
                    }
                    return name;
                    break;
            }

        },
        set type_of_post(source){
            let self = this,type = self.toInt(source.Type) ;
            if(type === CHECKLIST){
                self.template =  self.template.setTokens(
                    {type: "set a ",org_name : 'checklist'});
            }
            if(type === ARTICLE){
                self.template = self.template.setTokens(
                    {type: "create new ",org_name : 'article'});
            }
            if(type === REGULAR_POST){
                self.template = self.template.setTokens(
                    {type: "posted on",org_name : source.org.name});
            }
            if(type === CREATED_ORGANIZATION){
                self.template = self.template.setTokens(
                    {type: "created",org_name : source.org.name});
            }
        },
        toInt : function(value){
            return Number.parseInt(value) || Number(value);
        },
        isEmpty: function (value) {
            return value === undefined || value === null || value.length === 0 || String.prototype.trim.call(value) === '';
        },
        isString : function(value) {
            return typeof value === 'string' && Object.prototype.toString.call(value) === '[object String]';
        },
        isObject : function(value){
          return typeof value && Object.prototype.toString.call(value) === '[object Object]';
        },
        isArray: function (a) {
            return Array.isArray(a) && Object.prototype.toString.call(a) === '[object Array]';
        },
        isJSON : function(value){
            return ! /^[\[|\{](\s|.*|\w)*[\]|\}]$/.test(value);
        },
        _set_config : function(){
            let self = this;
            self.default = Object.assign(self.default,self.options);
        },
        file_types : {

            "image" : ".(gif|png|jpe?g)$",
            "html" : ".(htm|html)$",
            "office" :  [".(word|excel|powerpoint|office)$",".(docx?|xlsx?|pptx?|pps|potx?)$"],
            "gdocs" : [".(docx?|xlsx?|pptx?|pps|potx?|rtf|ods|odt|pages|ai|dxf|ttf|tiff?|wmf|e?ps)$",".(word|excel|powerpoint|office|iwork-pages|tiff?)$"],
            "text" : [".(txt|md|csv|nfo|ini|json|php|js|css)$",".(xml|javascript)$"],
            "video" : [".(ogg|mp4|mp?g|mov|webm|3gp)$",".(og?|mp4|webm|mp?g|mov|3gp)$"],
            "audio" : [".(ogg|mp3|mp?g|wav)$",".(og?|mp3|mp?g|wav)$"],
            "flash" : ".(swf)$",
            "pdf" : ".(pdf)$",


        },
        _loading : function(){
            let container,items,self = this,template=self.default.loading;
            items = template.contents.setTokens({items : template.items})
            container = template.container.setTokens({feed_box_content : items});
            self.load = template.parent.setTokens({avatar : template.avatar , feed_box : container})
        },
        _activity : function(){
            let body,self = this,template = self.default.recent_activity;
            body = template.content.setTokens({body : (template.ago+template.details).concat("{well}")});
            self.template = template.parent.setTokens({content : (template.avatar+body)});
        },
        _feed : function(){
            let parent_box,content,comment,self = this,template = self.default.feed_template;
            comment = template.comment.parent.setTokens({comments : template.comment.input})
            content = template.config + template.details + template.body + comment;
            parent_box = template.content.setTokens({feed_content : content});
            self.template = template.parent.setTokens({content : (template.avatar + parent_box)})
        },
        _initTemplate : function(){
            let self = this;
            let feed_parent,feed_avatar,feed_box,feed_config,feed_details,feed_body,feed_parent_comment,feed_input_comment,preview_mode_parent,preview_mode_video,preview_mode_image,preview_mode_audio,checklist_post_parent,checklist_post_attachment,attachment_for_multiple_type,activity_parent,activity_avatar,
            activity_content,activity_ago,activity_details,activity_well,input_file,loading_feed_parent,loading_avatar,loading_feed_box,loading_feed_item,loading_items;

            feed_parent = `<div class="social-feed-separated" posturl='{post_url}'>{content}</div>`;
            feed_avatar = `<div class="social-avatar"><a href=""><img alt="image" src="img/a5.jpg"></a></div>`;
            feed_box = `<div class="social-feed-box">{feed_content}</div>`;
            feed_config = `<div class="pull-right social-action dropdown"><button data-toggle="dropdown" class="dropdown-toggle btn-white"><i class="fa fa-angle-down"></i></button><ul class="dropdown-menu m-t-xs"><li><a href="#">Edit</a></li></ul></div>`;
            feed_details = `<div class="social-avatar"><a href="#">{avatar_name}</a> {type} <a> {org_name} </a><br><small class="text-muted">{date}</small></div>`;
            feed_body = `  <div class="social-body">{body}</div>`;
            feed_parent_comment = `<div class="social-footer">{comments}</div>`,
            feed_input_comment =   `<div class="social-comment"><a href="" class="pull-left"><img alt="image" class="img-circle" src="img/a8.jpg"></a><div class="media-body"><textarea class="form-control" placeholder="Write comment..."></textarea></div></div>`;
            preview_mode_parent =  `<p class="text-center center-block">{content}</p>`;
            preview_mode_video = `<video src="{source}" controls ></video>`
            preview_mode_image = `<img style="max-width: 100%; max-height: 400px;" src="{source}" alt="{original_filename}"  />`,
            preview_mode_audio = `<audio style="min-width: 100%" src="{source}" controls></audio>`;
            checklist_post_parent = `<div class="well"><big><strong><p><a href="#">{title}</a></p></strong></big>{body}</div>`;
            checklist_post_attachment = `<div style="margin-top: 10px" class="mail-attachment"><p><span><i class="fa fa-paperclip"></i> {number_of_files} attachments - </span><a href="#">Download All</a></p>{files}</div>`,
            attachment_for_multiple_type = ` <div style="margin-top: 10px" class=""><p><span><i class="fa fa-paperclip"></i> {number_of_files} attachments - </span><a href="#">Download All</a></p>{files}</div>`;
            activity_parent = ` <div class="feed-element">{content}</div>`;
            activity_avatar = `<a href="#" class="pull-left"><img alt="image" class="img-circle" src="img/a2.jpg">
                </a>`;
            activity_content = `<div class="media-body ">{body}</div>`;
            activity_ago = `<small class="pull-right">{ago}</small>`;
            activity_details = ` <strong><a href='#'>{avatar_name}</a></strong> {type} <strong><a href=" #" >{org_name}</a></strong>. <br>
                    <small class="text-muted">{date}</small>`;
            activity_well = `<div class="well">{well}</div>`;
            input_file = `<div class="attachment"><input type='file' style="display: none" id='feed_data' data='{data}'   /></div>`;
            loading_feed_parent = ` <div class="social-feed-separated">{avatar}{feed_box}</div>`;
            loading_avatar = `<div class="social-avatar"><div class="animated-background facebook" style="width: 52px;height: 52px;"></div></div>`;
            loading_feed_box = `<div class="social-feed-box">{feed_box_content}</div>`;
            loading_feed_item = ` <div class="feed-item">{items}</div>`;
            loading_items = ` <div class="feed-item animated-background facebook"><div class="background-masker header-top"></div><div class="background-masker header-right"></div><div class="background-masker header-bottom"></div><div class="background-masker subheader-right"></div><div class="background-masker subheader-bottom"></div><div class="background-masker content-top"></div><div class="background-masker content-first-end"></div><div class="background-masker content-second-line"></div><div class="background-masker content-second-end"></div><div class="background-masker content-third-line"></div><div class="background-masker content-third-end"></div><div class="background-masker fourth"></div> <div class="background-masker content-top one"></div><div class="background-masker content-first-end two"></div><div class="background-masker content-second-line tree"></div><div class="background-masker content-second-end four"></div><div class="background-masker content-third-line five"></div><div class="background-masker content-third-end six"></div><div class="background-masker fourth one"></div></div>`;

            self.default = {

                type : FEED,
                feed_template: {
                    parent: feed_parent,
                    avatar: feed_avatar,
                    content: feed_box,
                    config: feed_config,
                    details: feed_details,
                    body: feed_body,
                    comment : {
                        parent : feed_parent_comment,
                        input : feed_input_comment,
                    },
                    attachments : {
                        preview : {
                            parent : preview_mode_parent,
                            video : preview_mode_video,
                            image : preview_mode_image,
                            audio : preview_mode_audio,
                            file : input_file
                        },
                        checklist : checklist_post_attachment,
                        ordinary : attachment_for_multiple_type,
                    },
                    checklist : checklist_post_parent,

                },


                recent_activity : {

                    parent : activity_parent,
                    avatar : activity_avatar,
                    content : activity_content,
                    ago : activity_ago,
                    details : activity_details,
                    well : activity_well

                },

                Error : {

                    parent : `<div class="alert alert-danger">{icon}{title}&nbsp;{message}<br><body_of_error>{error}</body_of_error></div>`,
                    icon : `<i class="fa fa-warning">&nbsp;</i>`,
                    title : `<strong>Error occured</strong>`,
                    message : `Sorry this page is under construction we need time to fix this`

                },

                loading : {

                    parent : loading_feed_parent,
                    avatar : loading_avatar,
                    container : loading_feed_box,
                    contents : loading_feed_item,
                    items : loading_items


                }
            }

        }
    }

    $.fn.scoa = function(source,option){
        return new SCOA(this,source,option);

    }



}));
