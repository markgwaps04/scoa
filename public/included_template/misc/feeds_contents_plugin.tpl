



{function set_profile}

    {if not $isStaff}

        {if $profile}

            <img alt="image" class="profile {$class}" src="{$public}/files/profile/{$profile}">

        {else}

            <img alt="image" class="profile {$class}" src="{$public}/files/profile/default/1.jpg" letters="{$firstname|substr:0:1|upper}">

        {/if}



    {else}

        <img alt="image" class="profile {$class}" src="{$public}/files/scoa.png">

    {/if}

{/function}





{capture profile}


    <div class="social-avatar">

        <a href="javascript: void 0" class="{$profile_class}">


            {call set_profile profile=$feeds.profile firstname=$feeds.Firstname isStaff=$feeds.isStaff}

            {*{if not $feeds.isStaff}*}

                {*{if $feeds.profile}*}

                    {*<img alt="image" class="profile" src="{$public}/files/profile/{$feeds.profile}">*}

                {*{else}*}

                    {*<img alt="image" class="profile" letters="{$feed.Firstname}">*}

                {*{/if}*}



            {*{else}*}

                {*<img alt="image" class="profile" src="{$public}/files/scoa.png">*}

            {*{/if}*}

        </a>
    </div>





{/capture}







{capture test}


    {if $isStaff and $user_model}


        {$public}//scoa_organization/view_info/{$feeds.org_info.RCode}


    {else}

        {$public}/organization/members/{$feeds.org_info.url}


    {/if}




{/capture}







{function user_name}

    <a href="javascript:void 0">

        {if not $param.isStaff}

            {call user_fullname param=$param|default:'User'}

        {else}

            {if not $isGlobalfeeds}

                Student’s Commission on Audit (SCOA)

            {else}

                {call user_fullname param=$param|default:'User'}

            {/if}


        {/if}


    </a>

{/function}






{if $feeds.files|count}




        {capture download_dropdown assign="dropdown"}



            <div class="pull-right social-action dropdown">
                <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu m-t-xs">
                    <li><a target="_parent" href="#">Download files</a></li>
                </ul>
            </div>


        {/capture}



        {capture post_type assign="post_type"} uploaded a files {/capture}



        {capture file_body assign="file_body"}

            <div class="row p-sm no-padding-bottom">


                {foreach $feeds.files as $every => $file}

                    {assign type FILE::get_fileType($file.fname)}



                    {if $file@index eq 4 and !$skipLoadFile}

                        <div class="file-box loadInfo" id="scoa-files">
                            <div class="file no-borders">

                                <div class="big-icon-container">
                                    <button type="button"  class="btn btn-w-m btn-outline-info btn-primary full-width full-height">
                                        <h1><i class="fa fa-repeat"></i></h1>
                                        <h4 >Load more file</h4>
                                    </button>
                                </div>


                            </div>

                        </div>

                    {/if}





                    <div class="file-box {if $file@index > 3 and !$skipLoadFile}hidden{/if}" id="scoa-files">
                        <div class="file">

                            <span class="corner"></span>

                            <div class="file-name">

                                <a target="_blank" href="{$public}/files/upload/{$file.file}">
                                    {$file.fname|truncate:20:"...."}
                                </a>

                                <br>
                                <small>Added: {$feeds.PDT|date_format:"%B %e,%y"}</small>
                            </div>


                            {if $type === "image"}


                                <div class="image file-type">

                                    <a href="{$public}/files/upload/{$file.file}" data-gallery="">


                                        <img class="scoa-img-responsive img-responsive cover no-margins" src="{$public}/files/upload/{$file.file}" alt="{$file.fname}"/>

                                    </a>


                                </div>


                            {/if}




                            {if $type === "video"}


                                <a href="{$public}/files/upload/{$file.file}" title="{$file.fname}" type="video/mp4" data-gallery ></a>

                                <div class="video">
                                    <video class=""  ckin="compact" src="{$public}/files/upload/{$file.file}"></video>
                                </div>


                            {/if}





                            {if $type === "text"}


                                <div class="icon">
                                    <i class="img-responsive text-cadet-blue fa fa-file-text"></i>
                                </div>


                            {/if}



                            {if $type === "html"}


                                <div class="icon">
                                    <i class="img-responsive text-light-red fa fa-html5"></i>
                                </div>


                            {/if}




                            {if $type === "office" or $type === "gdocs"}


                                <div class="icon">
                                    <i class="img-responsive text-blue  fa fa-file-word-o"></i>
                                </div>


                            {/if}





                            {if $type === "audio"}


                                <div class="audio">
                                    {*<i class="img-responsive fa fa-file-audio-o"></i>*}

                                    <audio ckin="compact" controls src="{$public}/files/upload/{$file.file}"></audio>
                                </div>


                            {/if}






                            {if $type === "pdf"}


                                <div class="icon">
                                    <i class="img-responsive text-cadet-blue fa fa-file-pdf-o"></i>
                                </div>


                            {/if}




                            {if $type === "other"}


                                <div class="icon">
                                    <i class="img-responsive text-success fa fa-file"></i>
                                </div>


                            {/if}




                        </div>

                    </div>





                {/foreach}


            </div>




        {/capture}



        {if $feeds.files|count === 1 and not $skip}


            {assign file_attributes $feeds.files[0]}

            {assign type FILE::get_fileType($file_attributes.fname)}


            {capture download_dropdown assign="dropdown"}

                <div class="pull-right social-action dropdown">
                    <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu m-t-xs">
                        <li>
                            <a target="_parent" href="{$public}/files/upload/{$file_attributes.file}">Download
                                {if $type neq "other"} {$type} {else} file {/if}
                            </a>
                        </li>
                    </ul>
                </div>

            {/capture}



            {if $type === "video"}

                {capture post_type assign="post_type"} posted a video {/capture}

                {capture file_body assign="file_body"}

                    <p>

                        <video src="{$public}/files/upload/{$file_attributes.file}" data-overlay="1" data-ckin="compact" data-title="{$file_attributes.fname}"></video>

                        <a href="{$public}/files/upload/{$file_attributes.file}" title="{$file_attributes.file}" type="video/mp4" data-gallery></a>

                    </p>

                {/capture}



            {elseif $type === "image"}

                {capture post_type assign="post_type"} posted a image {/capture}


                {capture file_body assign="file_body"}

                    <div class="lightBoxGallery">

                        <p class="text-center center-block">

                            <a href="{$public}/files/upload/{$file_attributes.file}" data-gallery="">


                                <img class="no-margins scoa-image-feed" src="{$public}/files/upload/{$file_attributes.file}" alt="{$file_attributes.fname}"/>


                            </a>

                        </p>


                        <div id="blueimp-gallery" class="blueimp-gallery">
                            <div class="slides"></div>
                            <h3 class="title"></h3>
                            <a class="prev">‹</a>
                            <a class="next">›</a>
                            <a class="close">×</a>
                            <a class="play-pause"></a>
                            <ol class="indicator"></ol>
                        </div>

                    </div>

                {/capture}





            {elseif $type === "audio"}


                {capture post_type assign="post_type"} uploaded a audio {/capture}


                {capture file_body assign="file_body"}

                    <p>
                        <audio class="full-width" src="{$public}/files/upload/{$file_attributes.file}" controls></audio>
                    </p>

                {/capture}





            {/if}


        {/if}


    {/if}








