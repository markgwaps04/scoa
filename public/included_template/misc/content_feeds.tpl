
{include "`$root`public\included_template\global_functions.tpl" scope="global"}


{strip}


    {assign approvedChecklist $checklist_class->getApprovedTypeList($org.RCode)}

    {$isChecklistCompleted = ($approvedChecklist|count >= 5)}

    {assign batchDetails $checklist_class->getBatchDetails()}

    {assign isDeadline $checklist_class->isDeadline()}

    {assign numTemp $org.attempt_to_change_numbers|default:0}

    {assign minTemLeft 100}


<div class="row  m-t / m-t-(xs,sm,md,lg,xl) ">


    <div class="col-sm-12">



        {assign current_position  $_membership->getCurrentUserPosition()}

        {assign is_position_fill  $_membership->is_position_fill()}


        {if not $user->isStaff}


        {if ($org.isUpdated_RCode and $isChecklistCompleted)}


            <div class="alert alert-info background-white-blue"> <!--style="background-color: #fdfdfde0"-->
                    <i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;

                    <a class="alert-link" href="#">As of {$batchDetails.date_time|date_format:"F Y"}

                        {assign deadline $batchDetails.deadline|date_format:"F Y"}

                        {if $deadline}

                            to {$deadline}

                        {/if}


                    </a>,&nbsp;

                    this organization has completed the requirements

                    <a href="{$public}/organization/info/{$org.url}" class="pull-right">View Org Info</a>

                </div>


            {elseif not $isDeadline and not $isChecklistCompleted}

            <div class="alert alert-danger background-white-blue">

                    <i class="fa fa-warning" style="font-size: 15px"></i>&nbsp;

                    <a class="alert-link" href="#">As of {$batchDetails.date_time|date_format:"F Y"}

                        {assign date $batchDetails.deadline|date_format:"F d Y"}

                        {assign time $batchDetails.deadline|date_format:"h:m a"}

                    </a>, &nbsp;

                    this organization has completed the requirements before the deadline {$date}
                    &nbsp; at {$time}. if you have a question <a href="javascript:void 0">Talk to us</a>.


                </div>

            {/if}


        {if $current_position eq "5" and not $is_position_fill}



            {if ($minTemLeft - $numTemp) > 0}

                <div class="alert alert-info" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->
                    <i class="fa fa-group" style="font-size: 15px"></i>&nbsp;
                    <a class="alert-link" href="#">Members</a>,
                    &nbsp; this group is need at least 4 members required

                    <a data-toggle="modal" class="pull-right" href="#modal-form">Invite them</a>

                </div>


                <div id="modal-form" class="modal fade" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">

                                    <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Invite your co-members</h3>


                                        {*<p>You have {$minTemLeft - $numTemp} attempt left. </p>*}

                                        <form method="post" role="form" class="TempPhoneTags" >

                                            <div class="form-group">

                                                <label>Current members</label>

                                                <p class="user-friends">

                                                    {foreach $org.members.approved as $every => $user}

                                                        {assign name $user.Firstname|cat:" "|cat: $user.Lastname|capitalize:true:true }

                                                        {call position param=$user.position assign="position"}

                                                        <a href="">
                                                            <img alt="image" data-toggle="tooltip" data-placement="auto" title="{$name},{$position}" class="img-circle profile" src="{$public}/files/profile/{$user.profile|default:'default/1.jpg'}">
                                                        </a>


                                                    {/foreach}

                                                </p>

                                            </div>


                                            <div class="form-group">

                                                <label>Mobile Phone numbers (ex. 912345678)</label>

                                                <input name="url" type="hidden" value="{$org.url}">

                                                <input name="numbers" id="PhoneNumbers" type="text" class="form-control tagsinput" value="{$org.temp_numbers}">


                                            </div>


                                        </form>


                                        <div>
                                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" id="phoneTagSubmit">
                                                <strong>Submit</strong>
                                            </button>
                                        </div>

                                    </div>

                                    <div class="col-sm-6">

                                       <h3>How do I invite the members of a group to my org/dept site</h3>

                                        <ul class="pull-left">

                                            <p>

                                            <li>Once you create an event, you'll be set as the host. Adviser of the group will also become hosts.</li>

                                            </p>

                                            <p>
                                            <li>Adviser's and host is allowed to invite members</li>
                                            </p>


                                            <p>
                                            <li>If your group is smaller than 4 people, you can invite your co-member
                                                to join to your organization/department</li>
                                            </p>

                                            {*<p>*}
                                            {*<li>You can invite at least 3 attempts only</li>*}
                                            {*</p>*}



                                        </ul>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <script>



                    (function(__){



                        $(document).ready(function() {


                            jQuery.validator.addMethod("isPhoneNumbers",function(value,element){

                                alert("Success");

                            },'No special/number characters');

                            let param = {

                                errorClass: "help-inline invalid_message text-danger animated",

                                errorElement: "span",

                                errorPlacement: function(e, a) {

                                    jQuery(a).parents(".form-group").append(e)

                                },

                                highlight: function(e) {
                                    jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
                                },
                                success: function(e) {
                                    jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
                                },


                                rules :{
                                    numbers : {
                                        required : !0,
                                        isPhoneNumbers : !0
                                    },

                                    adad : {

                                        required:!0

                                    }
                                },




                            };

                            __(".TempPhoneTags").validate(param);

                            const targetField = __("#PhoneNumbers");


                            const whenchange = function(fieldValue) {

                               fieldValue = fieldValue.replace(/\s/gm,"");

                               var split = fieldValue.split(",");

                                {literal}

                               const check = split.every(function (value) {
                                   const regext = /(^9)([0-9]{9}$)/g;
                                   return regext.test(value);
                               });

                                {/literal}


                                targetField
                                    .siblings(".error")
                                    .remove();

                               switch (true) {

                                   case !fieldValue:

                                       targetField.after([
                                           '<span class="help-block m-b-none error text-danger">',
                                           'This field is required.</span>'
                                       ].join(""));

                                       break;


                                   case !check:

                                       targetField.after([
                                           '<span class="help-block m-b-none error text-danger">',
                                           'Invalid mobile phone number(s) eg. 912345678.</span>'
                                       ].join(""));

                                       break;


                               }


                               return check;


                            };


                            targetField.change(function () {

                                whenchange(__(this).val());

                            });

                            __("#phoneTagSubmit").click(function () {

                                const value = targetField.val();

                                if(whenchange(value))

                                    __(".TempPhoneTags").submit();


                            })

                        });

                    })(jQuery);



                </script>


            {/if}




        {/if}



        {/if}




        {include "`$root`public\included_template\misc\post_box.tpl"}

        <hr class="hr-line-solid m-b-xl">

        {*{include "`$root`public\included_template\user\user_index_populate_feeds.tpl"}*}


        <feeds class="m-t-xl"></feeds>




        {*<div class="social-feed-separated" id="{$feeds.feedsId}">*}


            {*<div class="social-avatar">*}
                {*<a href="javascript: void 0">*}




                        {*<img alt="image" class="profile" src="{$public}/files/scoa.png">*}



                {*</a>*}
            {*</div>*}

            {*<div class="social-feed-box">*}



                {*<div class="social-avatar">*}

                    {*Mark Anthony Libres*}

                    {*sent a request to join*}

                    {*<br>*}
                    {*<small class="text-muted">January 11 1997</small>*}

                {*</div>*}


                {*<div class="social-body">*}

                    {*<div data-nanogallery2 = '{literal}{"galleryDisplayTransitionDuration":1500,"galleryMosaic":[*}
                    {*{"w":1,"h":1,"c":4,"r":3},*}
                    {*{"w":2,"h":1,"c":2,"r":3},*}
                    {*{"w":1,"h":2,"c":1,"r":3},*}
                    {*{"w":1,"h":1,"c":2,"r":4},*}
                    {*{"w":2,"h":1,"c":3,"r":4},*}
                    {*{"w":1,"h":1,"c":5,"r":4},*}
                    {*{"w":1,"h":1,"c":6,"r":4}*}
                    {*],"thumbnailAlignment":"scaled","thumbnailHeight":"180","thumbnailWidth":"220","thumbnailBaseGridHeight":80,"thumbnailDisplayTransition":"slideLeft","thumbnailDisplayTransitionDuration":600,"thumbnailDisplayInterval":90,"galleryMaxRows":1,"galleryDisplayMode":"rows","thumbnailL1GutterWidth":0,"thumbnailL1GutterHeight":0,"thumbnailBorderHorizontal":0,"thumbnailBorderVertical":0,"thumbnailL1BuildInit2":".nGY2GThumbnailAlbumTitle_border-left_5px solid #23CB99|.nGY2GThumbnailAlbumTitle_margin_20px|                    title_backgroundColor_rgba(200,200,200,0.8)|title_color_#000","thumbnailL1HoverEffect2":"label_left_-100%_0%|thumbnail_scale_1.00_0.95","galleryBuildInit2":"perspective_900px|perspective-origin_50% 150%","thumbnailHoverEffect2":"label_font-size_1em_1.5em|title_backgroundColor_rgba(255,255,255,0.34)_rgba(((35,203,153,0.8)|title_color_#000_#fff|image_scale_1.00_1.10_5000|image_rotateZ_0deg_4deg_5000","thumbnailToolbarImage":null,"thumbnailToolbarAlbum":null,"thumbnailLabel":{"display":false,"position":"onBottomOverImage","hideIcons":true,"titleFontSize":"1em","align":"left","titleMultiLine":true,"displayDescription":false},"gallerySorting":"random","galleryTheme":{"thumbnail":{"titleShadow":"none","descriptionShadow":"none","titleColor":"#fff"},"navigationBreadcrumb":{"background":"#3C4B5B"},"navigationFilter":{"background":"#2E7C7F","backgroundSelected":"#19676B","color":"#eee"}},"touchAnimation":false,"locationHash":true}'{/literal}>*}

                        {*<a href="{$public}/files/upload/test.jpg" data-ngthumb="{$public}/files/upload/test.jpg"></a>*}
                        {*<a href="{$public}/files/upload/test.jpg" data-ngthumb="{$public}/files/upload/test.jpg"></a>*}
                        {*<a href="{$public}/files/upload/test.jpg" data-ngthumb="{$public}/files/upload/test.jpg"></a>*}
                        {*<a href="{$public}/files/upload/test.jpg" data-ngthumb="{$public}/files/upload/test.jpg"></a>*}
                        {*<a href="{$public}/files/upload/test.mp4"  type="video/mp4" data-ngthumb="{$public}/files/upload/test.mp4"></a>*}




                    {*</div>*}

                {*</div>*}



            {*</div>*}
        {*</div>*}



        {*<div class="social-feed-separated" id="{$feeds.feedsId}">*}


            {*<div class="social-avatar">*}
                {*<a href="javascript: void 0">*}




                    {*<img alt="image" class="profile" src="{$public}/files/scoa.png">*}



                {*</a>*}
            {*</div>*}

            {*<div class="social-feed-box">*}



                {*<div class="social-avatar">*}

                    {*Mark Anthony Libres*}

                    {*sent a request to join*}

                    {*<br>*}
                    {*<small class="text-muted">January 11 1997</small>*}

                {*</div>*}


                {*<div class="social-body">*}


                    {*<a href="{$public}/files/upload/test.jpg" data-gallery>*}

                        {*sdsds*}

                    {*</a>*}



                {*</div>*}



            {*</div>*}
        {*</div>*}


        <div class="social-feed-separated">


            <div class="social-feed-box">

                <div class="social-body">

                    <h4 class="scoa-small-brand-name">#SCOA</h4>

                </div>


            </div>
        </div>



    </div>

</div>


{/strip}