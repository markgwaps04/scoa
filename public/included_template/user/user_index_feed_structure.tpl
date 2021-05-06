
{strip}


{block upper_head}

    <link href="{$css}ckin.min.css?{$pin}" media="all" rel="stylesheet" type="text/css" />

    <link href="{$css}fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

    <link href="{$css}plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">

    <link href="{$css}/component.css" rel="stylesheet">

    <link href="{$css}plugins/jquery.guillotine.css" media="all" rel="stylesheet" type="text/css" />

    <script src="{$js}modernizr.custom.js"></script>



{/block}






{block script append}


    <script src="{$js}jquery.guillotine.js" type="text/javascript"></script>

    <script src="{$js}ckin.min.js?{$pin}" type="text/javascript"></script>

    <script src="{$js}fileinput.min.js?{$pin}" type="text/javascript"></script>

    <script src="{$js}plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

    <script src="{$js}scoa/scoa_fs.js?{$pin}"></script>

    <script src="{$js}plugins/upload/jquery.form.js"></script>

    <script src="{$js}plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <script src="{$js}plugins/validate/jquery.validate.min.js"></script>


{/block}



{block body}

    <div class="row">

        <div class="col-sm-8">

            {block content} {/block}

        </div>

        <div class="col-md-4">

            <div class="ibox float-e-margins description">
                <div class="ibox-title">
                    <h5>Organization Details</h5>
                </div>
                <div>

                    <ul class="ibox-content no-padding border-left-right grid cs-style-3 coverphoto">
                        <li style="list-style: none">

                            <figure>
                                <img src="{$public}/files/default_image/default.png" id="coverphoto" alt="img04">

                                <form id="form_cover_photo">

                                    <figcaption>

                                        <span >Cover by Sunlee Gonzales</span>
                                        <div class="btn-group">

                                            <label title="Upload image file"   for="inputImage" class="btn btn-primary">

                                                <form method="post" class="form-inline" enctype="multipart/form-data">

                                                    <input type="file" accept="image/*" name="file" id="inputImage" class="hide btn-xs">
                                                    Edit

                                                </form>


                                            </label>

                                        </div>
                                    </figcaption>

                                </form>

                            </figure>
                        </li>
                    </ul>



                    <div class="ibox-content profile-content">
                        <h3>
                            <strong>

                                <a href="{$public}/organization/info/{$user_club.url}">{$user_club.name|truncate:50:"..."}</a>

                            </strong>
                        </h3>
                        <form method="post" action="" >
                            <h4>
                                <strong>

                                    {$user_club.member_code}
                                </strong>

                                <form method="post" class="inline">

                                    <input type="hidden" name="url" value="{$user_club.url}">

                                    <button type="submit"  class="btn btn-sm small text-success margin-top-xxsm scoa_xsmall_text btn-default fa fa-repeat"></button>

                                </form>


                            </h4>
                            <form>





                                <p><i></i> <strong>Created On </strong> January 12 2019 </p>


                                <p><i class="fa fa-check-circle"></i> 3 Approval waits</p>


                                <h5>
                                    About  <a href="javascript:void 0">
                                        <i class="fa fa-pencil small text-muted scoa_small_text" data-toggle="tooltip" data-placement="right" title="edit" style="vertical-align: top !important;"></i>
                                    </a>
                                </h5>


                                <p>

                                    {$user_club.details|truncate:570: '&nbsp;<a href="#">See more...</a>'|default:'<a href="javascript:void 0"><i class="fa fa-pencil"></i>&nbsp; edit about</>' }

                                </p>


                                <h5>Members</h5>

                                <p class="user-friends">


                                    {foreach $user_club.members.approved as $every => $user}


                                        <a href="">
                                            <img alt="image" data-toggle="tooltip" data-placement="auto" title=
                                            "{$user.Firstname|cat:" "|cat: $user.Lastname|capitalize:true:true }" class="img-circle profile" src="{$public}/files/profile/{$user.profile|default:'default/1.jpg'}">
                                        </a>


                                    {/foreach}

                                </p>

                                <div class="row m-t-lg"></div>

                    </div>
                </div>
            </div>

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><a href="">Upcoming Deadline of Submission</a></h5>
                    <div class="ibox-tools">
                        <a class="">
                            <i class="fa fa-calendar"></i>
                        </a>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>

                    </div>
                </div>

                <div class="ibox-content inspinia-timeline">

                    <div class="timeline-item">
                        <div class="row">

                            <div class="col-xs-12 no-borders text-center">
                                <h2>No schedules yet</h2>
                            </div>
                        </div>
                    </div>



                </div>


            </div>

        </div>


    </div>

{/block}




{block script append}


    <script>

        (function (__) {


            $('form').ajaxForm({
                beforeSend: function() {
                    status.empty();
                    var percentVal = '0%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                },
                success: function() {
                    var percentVal = '100%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                    status.html(xhr.responseText);
                }
            });


        })(jQuery);

    </script>

{/block}

{/strip}