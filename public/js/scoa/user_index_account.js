(function() {

    scoa.user_account = function(obj) {

        scoa.showHiddens();

        $('.account .collapse-link')
            .trigger("click");


        Dropzone.autoDiscover = false;

        const account = {

            jSignature : function() {

                const
                    target = "user_signature"._getId(true),
                    reset = "reset_sign"._getClass(true),
                    save_sign = "save_signature"._getId(true);


                const sign = target.jSignature({
                    'decor-color': 'transparent',
                    'decor' : false,
                    'color': '#000',
                    'width': '400',
                    'height': '160',
                    'lineWidth': 1,
                });

                reset.on("click",function() {

                    scoa.TryCatch(function() {

                        base30 = decodeURI(obj.sign_base30);

                        console.log(base30);

                        target.jSignature("setData","data:"+base30);

                    },e => {

                        console.warn(e);

                });


                }).trigger("click");

                save_sign.on("click",function () {

                    let button = save_sign.ladda();

                    let target = jQuery("#user_signature"),svg_base64,base30;
                    svg_base64 = target.jSignature("getData","svgbase64");
                    base30 = target.jSignature("getData","base30");

                    button.ladda("start");

                    $.post("../Users/edit_info",{

                        sign_svgbase64 : encodeURI(svg_base64) ,
                        sign_base30 : encodeURI(base30)

                    } ,function (data) {

                        let json = JSON.parse(data);
                        // sign = [json.sign_svgbase64 , json.sign_base30];
                        button.ladda("stop");

                    })

                });

                return this;

            },

            profile : function() {

                
            const target = "profile_drop"._getId(true);

            const dropzone_config = {

                url : "/SCOA/public/User/set_profile",
                paramName: "file", /** The name that will be used to transfer the file**/
                maxFiles : 1,
                maxFilesize: 2, /** MB **/
                dictDefaultMessage: "<strong>Drop files here or click to upload. </strong>",
                acceptedFiles : 'image/*',

                init : function()
                {

                    this.on("complete",function(file) {

                        const preview = "dz-preview"
                            ._getClass(true);

                        let length = preview.length;

                        if(length >= 2) preview
                            .first()
                            .fadeOut();


                    });

                    this.on("addedfile",function(file)
                    {

                        file.previewElement.addEventListener("click",function()
                        {
                            jQuery(file.previewElement).parents(".dropzone").click();

                        });


                        if(this.files[1] != null)
                        {
                            this.removeFile(this.files[0]);

                        }

                    });


                    let dz = this,mockFile = {
                        name : "SCOA",
                        size : 0
                    };



                    if("{$currentUserClass->getProfile()}")   {
                        this.options.addedfile.call(this,mockFile);
                        this.options.thumbnail.call(this,mockFile,
                            "/SCOA/public/files/profile/"+obj.profile);
                        this.emit("complete",mockFile);
                    }


                }

            };

            target.dropzone(dropzone_config);

            const preview = "dz-preview"._getClass(true);

            preview.click(function(){
                $("form.dropzone").click();
            });

            return this;

            },

            inputs : function() {

                const fields = "edit-info"._getClass(true);

                fields.on("click",function (e) {

                    let target = jQuery(this),
                        field = target.parents('.form-group').find('input'),
                        type = field.attr("type");

                    field.attr("type","text")
                        .removeAttr('disabled')
                        .focus();
                    field.focusout(function(){
                        /** field.attr("disabled","")
                         .attr("type",type); **/
                    });

                })


            },

            main : function () {


                this
                    .jSignature()
                    .profile()
                    .inputs();

            }

        };

        account.main();




    };


})();