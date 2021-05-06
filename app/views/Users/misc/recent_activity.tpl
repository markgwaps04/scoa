

{include "`$root`public\included_template\Misc\\feeds_contents_plugin.tpl" scope="global"}

{include "`$root`public\included_template\global_functions.tpl" scope="global"}


{foreach $activity as $feeds=>$post}



    {if not $post.org_info} {continue} {/if}

    {*<!-- end comment -->*}

    {capture link} {$public}feeds/{$post.org_info.url} {/capture}






    {capture user_name}

        <a href="javascript:void 0">

            {if not $post.isStaff}

                {call user_fullname param=$post|default:'User'}

            {else}

                Student’s Commission on Audit (SCOA)

            {/if}


        </a>

    {/capture}








    {if $post.feedsType eq "D"}


        {capture body}


            {if $post.files|count === 1}


                {assign file_attributes $post.files[0]}

                {assign type FILE::get_fileType($file_attributes.fname)}



                {if $type === "video" }

                    uploaded a video on

                    <a href="{$smarty.capture.link|trim}">{$post.org_info.name|capitalize:true:true|default:'your organization'}
                    </a>.


                    <p><small class="text-muted">{call post_detail param=$post.PDT}</small></p>

                    <div class="list-group background-white">


                        <a class="list-group-item text-success" target="_blank" href="{$public}/files/upload/{$file_attributes.file}">
                            <i class="fa fa-download"></i>&nbsp;Download Video
                        </a>


                    </div>



                {elseif $type === "image"}


                    posted a photo on <a href="{$smarty.capture.link|trim}">{$post.org_info.name|capitalize:true:true|default:'your organization'}</a>.


                    <p><small class="text-muted">{call post_detail param= $post.PDT}</small></p>

                    <div class="photos">
                        <a href="{$smarty.capture.link|trim}"> <img alt="image" class="feed-photo cover" src="{$public}/files/upload/{$file_attributes.file}"></a>
                    </div>


                {/if}



            {else}



                posted on <a href="{$smarty.capture.link|trim}">{$post.org_info.name|capitalize:true:true|default:'your organization'}</a>.


                <p><small class="text-muted">{call post_detail param= $post.PDT}</small></p>

                <p>

                    {$post.body|htmlentities}

                </p>




            {/if}





        {/capture}







        <div class="feed-element" id="{$post.feedsId}">
            <a href="#" class="pull-left">

                {call set_profile class="img-circle" profile=$post.profile firstname=$post.Firstname isStaff=$post.isStaff}

            </a>
            <div class="media-body ">

                <a href="">{$smarty.capture.user_name}</a>

                {$smarty.capture.body}

            </div>
        </div>



    {/if}








    {if $post.feedsType eq "A"}



        <div class="feed-element" id="{$post.feedsId}">
            <a href="#" class="pull-left">

                {call set_profile class="img-circle" profile=$post.profile firstname=$post.Firstname isStaff=$post.isStaff}

            </a>
            <div class="media-body ">

                <a href="">

                    {$smarty.capture.user_name}

                </a>


                sent a request to create new <a href="{$smarty.capture.link|trim}">organization</a>.

                <p><small class="text-muted">{call post_detail param= $post.PDT}</small></p>

                <div class="well">
                    <h5>
                        <a href="javascript:void 0">
                            <i class="fa fa-send"></i>&nbsp; {$post.org_info.name|capitalize:true:true}
                        </a>

                        &nbsp; > &nbsp;

                        <a href="#">SCOA</a>

                    </h5>

                    <p>
                        {$post.org_info.details|truncate:570: '&nbsp;<a href="#">See more...</a>'}.
                    </p>


                </div>

            </div>
        </div>

    {/if}






    {if $post.m_requestType eq "A"}

        <div class="feed-element" id="{$post.feedsId}">
            <a href="#" class="pull-left">

                {call set_profile class="img-circle" profile=$post.profile firstname=$post.Firstname isStaff=$post.isStaff}


            </a>
            <div class="media-body ">

                <a href="">{$smarty.capture.user_name}</a>

                sent a request to join on <a href="#">{$post.org_info.name|capitalize:true:true|default:'your organization'}</a>.

                <p><small class="text-muted">{call post_detail param= $post.PDT}</small></p>

                <div class="well">

                    <h5>


                        <i class="fa fa-shield"></i>&nbsp;

                        {call position param=$post.position_target_user|default:'Any position'}

                        &nbsp; > &nbsp;

                        <a href="#">{$post.org_info.name|capitalize:true:true|default:'your organization'}</a>

                    </h5>

                </div>


            </div>
        </div>

    {/if}











    {if $post.m_requestType eq "B"}



        <div class="feed-element" id="{$post.feedsId}">
            <a href="#" class="pull-left">


                {call set_profile class="img-circle" profile=$post.profile firstname=$post.Firstname isStaff=$post.isStaff}

            </a>
            <div class="media-body ">

                <a href="javascript:void 0">
                    {$smarty.capture.user_name}
                </a>

                approved a request to join



                {if not ($post.user_url eq $post.post_details.user_url)}


                    <a href="javascript:void 0">{call user_fullname param=$post.post_details|default:'User'}</a>


                {/if}


                as a position of

                <strong>
                    {call position param= $post.position_target_user|default:'Any position'}
                </strong>.

                <p><small class="text-muted">{call post_detail param=$post.PDT}</small></p>

                <div class="well">
                    <h5>
                        <a href="javascript:void 0">
                            <i class="fa fa-check"></i>&nbsp; {$post.org_info.name|capitalize:true:true}
                        </a>

                        &nbsp; > &nbsp;

                        <a href="#">{call user_fullname param=$post.post_details|default:'User'}</a>

                    </h5>

                    <p>
                        {$post.org_info.details|truncate:570: '&nbsp;<a href="#">See more...</a>'}.
                    </p>


                </div>


            </div>
        </div>

    {/if}




    {foreachelse}



    <div>

        <h2 class="text-center">No recent activity</h2>

    </div>


{/foreach}

