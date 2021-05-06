


$(document).ready(function(){


    $('.summernote').summernote();





    window.Overlay = {

        on : function($selector){


            document.querySelectorAll(".over-lay")[0].classList.add("overlayZ");
            document.querySelectorAll($selector)[0].classList.add("post-box-overlay");



        },

        off : function($selector){

            document.querySelectorAll(".over-lay")[0].classList.remove("overlayZ");
            document.querySelectorAll($selector)[0].classList.remove("post-box-overlay");

        },

        elements : function($selector,myFunction){

            if(typeof myFunction !== "function")
                return false;

            let selector = $selector + " *";

            let all_elements = document.querySelectorAll(selector);


            all_elements.forEach(function (element) {

                myFunction(element)

            });


        },






        register : function ($selector,$action = null) {

            if($action){


                return eval("window.Overlay."+$action+"('"+$selector+"')")

            }

            Overlay.defaultAction($selector);


        },




        defaultAction : function($selector){

            Overlay.elements($selector,function(node){

                node.addEventListener("focus",function () {

                    Overlay.on($selector);

                });

                node.addEventListener("blur",function(){

                    Overlay.off($selector);

                })

            });

            return true;

        }





    };


    Overlay.register(".post-box");

    window.File = {

        selector : null,



        register : function($selector)  {

            File.selector = $($selector);

            if (window.FileReader) {

                return this;

            }

            return false;
        },


        _when_change_the_cover : function($output,$callbacks){


            File.selector.change(function() {

                let fileReader = new FileReader(),
                    files = this.files,
                    file;

                if (!files.length) {
                    return false;
                }

                file = files[0];

                console.log(file);

                if (/^image\/\w+$/.test(file.type)) {
                    fileReader.readAsDataURL(file);
                    fileReader.onload = function () {
                        File.selector.val("");

                        $($output).attr("src",this.result);


                    };
                }
            });

            return false;

        },



        _fileinput : function($params){


            if(typeof $params !== "object"){

                return false;

            }


            return $(File.selector).fileinput($params);


        }




    };



    let config = {

        layoutTemplates: {

            btnBrowse : "<button  tabindex='500' class='{css}' {status}>{icon}</button>",
            indicator : ""


        }

    };

    config.uploadUrl = "../Welcome/upload.php";
    config.browseClass = "btn btn-sm btn-default m-t-n-xs ";
    config.theme = 'fas';
    config.previewClass = "animated fadeIn";
    config.showCancel = false;
    config.showUpload= false;
    config.showRemove= false;
    config.allowedPreviewTypes= ['image', 'video', 'audio', 'flash', 'pdf'];
    config.showCaption= false;
    config.fileType= "any";
    config.previewFileIcon= "<i class='fa fa-file-archive-o'></i>";
    config.maxFileSize= 5000000;
    config.maxFilePreviewSize= 5000000;
    config.uploadAsync= false;
    config.showAjaxErrorDetails= false;
    config.browseIcon = '<i class="fa fa-file"></i>';
    config.uploadExtraData = function(previewId, index) {
        return {
            upload : true
        }

    };




    let file_upload = File.register("#file-3");

    let settings = file_upload._fileinput(config);

    let cover_photo = File.register("#inputImage")._when_change_the_cover("#coverphoto");


    settings.on('filebatchselected', function(event,files) {
        $(".kv-file-upload.btn.btn-sm.btn-kv.btn-default.btn-outline-secondary:first-child:visible").click();
        document.querySelector(".file-upload").classList.remove("file-upload-margin");
        document.querySelector(".file-upload").classList.add("file_upload_padding");
    });

    settings.on('fileuploaded', function(event, data, previewId, index) {
        let fileUploadName = data.response.file_upload_name, path = $("#"+previewId+" .kv-file-remove");
        path.attr("onclick","window.rFile(this)");
        path.attr("data-xFile",fileUploadName);
        path.attr("data-xName",data.files[data.files.length -1].name);
    });


    document.getElementById("save_checklist").addEventListener('click',function(){

        let $form = $("#checklist").intoAnObject(),files = window.files();

        $form.files = files || [];

        $form.type = "";
    $.post('../Welcome/checklistpost.php',$form,(data) => {

        data = JSON.parse(data);




    })


    })




    // trigger.register(".coverphoto","on");



});


function files(){

    let files = [],select = Array.from($("[data-xfile]"));

    for(let x in select){

        if(select[x].hasAttribute("data-xfile") ){

            let result,name = $(select[x]).attr('data-xName');

            result = new Array($(select[x]).attr('data-xfile'));

            if(name !== undefined){ result.push(name) }

            files.push(result);
        }

    }


    return files ;

}








