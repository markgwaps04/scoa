
{include "`$root`public\included_template\global_functions.tpl"}

{assign isStaff $user_model->isStaff}



{foreach $post as $every =>$feeds}



    {assign post_type ""}

    {assign dropdown ""}

    {assign file_body ""}


    {include "`$root`public\included_template\misc\\feeds_contents_plugin.tpl"  scope=parent}


    {capture org_dept}


        {if $isGlobalfeeds}

            on <a href="{$public}scoa_organization/feeds/{$feeds.r_code}">Java Develepers</a>

        {/if}


    {/capture}


    {capture interval}

        {call getIntervalByShorthand strEnd=$feeds.PDT assign="interval"}

        <small class="pull-right text-navy">{$interval}</small>

    {/capture}




    {if $feeds.feedsType eq "A"}

        <div class="social-feed-separated" id="{$feeds.feedsId}">

            {$smarty.capture.profile}

            <div class="social-feed-box">

                <div class="social-avatar">

                    {$smarty.capture.interval}

                    {call user_name param=$feeds}

                    created
                    <a>
                        {$feeds.org_info.name|truncate:50:"..."}
                    </a>

                    {$smarty.capture.org_dept}

                    <br>
                    <small class="text-muted">date</small>

                </div>


                <div class="social-body">
                    <div class="well">
                        <big>
                            <strong>
                                <a href="#">{$feeds.org_info.name|truncate:50:"..."}</a>
                            </strong></big>

                        <span class="pre-line">

                            {$feeds.org_info.details|truncate:300: '&nbsp;<a href="#">See more...</a>'|default:'<a href="javascript:void 0"><i class="fa fa-pencil"></i>&nbsp; edit about</>'|@trim }

                        </span>

                    </div>
                </div>



            </div>
        </div>

    {/if}












    {if $feeds.m_requestType eq "B"}



        <div class="social-feed-separated" id="{$feeds.feedsId}">


            {$smarty.capture.profile}


            <div class="social-feed-box" id="{$feeds.feedsId}">

                <div class="social-avatar">

                    {$smarty.capture.interval}


                    {call user_name param=$feeds}

                    approved a request to join


                    {if not ($feeds.user_url eq $feeds.post_details.user_url)}


                        <a href="javascript:void 0">
                            {call user_fullname param=$feeds.post_details|default:'User'}
                        </a>


                    {/if}

                    {$smarty.capture.org_dept}

                    <br>

                    <small class="text-muted">{call post_detail param= $feeds.PDT}</small>



                </div>


                <div class="social-body">

                    <div class="list-group">


                        <a class="list-group-item active text-white" href="{$smarty.capture.test|trim}">

                            <h3 class="list-group-item-heading text-white">

                                {call user_fullname param=$feeds.post_details|default:'User'} &nbsp;

                                <i class="text-center fa fa-angle-right"></i> &nbsp;


                                {call is_position_valid param=$feeds.position_target_user|default:'Any position'}



                            </h3>
                        </a>


                    </div>
                </div>

            </div>
        </div>


    {/if}









    {if $feeds.feedsType eq "D"}




        <div class="social-feed-separated scoa-video" id="{$feeds.feedsId}" >


            {$smarty.capture.profile}

            <div class="social-feed-box">

                {$dropdown}

                <div class="social-avatar">

                    {$smarty.capture.interval}

                    {call user_name param=$feeds}

                    {if $feeds.notify_state}

                        posted an <strong>Announcement</strong>

                        <i class="fa fa-bookmark text-warning"></i>

                    {else}

                        posted a post

                    {/if}


                    {if $feeds.r_code}

                        on

                        {$smarty.capture.org_dept}

                    {/if}


                    <br>

                    {if $feeds.notify_state}

                        <i class="fa fa-bullhorn text-success animated tada infinite"></i>

                    {/if}

                    <small class="text-muted">{call post_detail param= $feeds.PDT}</small>

                </div>


                <div class="social-body">

                    {if $feeds.body|trim}

                        <p class="m-b-md">
                            {$feeds.body}
                        </p>

                    {/if}

                    {$file_body}

                </div>



            </div>


        </div>



    {/if}
















    {if $feeds.m_requestType eq "A"}


        <div class="social-feed-separated" id="{$feeds.feedsId}">


            {$smarty.capture.profile}

            <div class="social-feed-box">



                <div class="social-avatar">

                    {$smarty.capture.interval}

                    {call user_name param=$feeds}

                    sent a request to join

                    {$smarty.capture.org_dept}

                    <br>
                    <small class="text-muted">{call post_detail param= $feeds.PDT}</small>

                </div>


                <div class="social-body">

                    <div class="list-group">
                        <a class="list-group-item" href="{$smarty.capture.test}">

                            <h3 class="list-group-item-heading text-muted">

                                {call user_fullname param=$feeds|default:'User'} &nbsp;

                                <i class="text-center fa fa-angle-right"></i> &nbsp;


                                {call is_position_valid param=$feeds|default:'Any position'}



                            </h3>
                        </a>

                    </div>

                </div>



            </div>
        </div>


    {/if}







    {if $feeds.feedsType eq "E"}



        {if $feeds.isMemberState}


            <div class="social-feed-separated" id="{$feeds.feedsId}">


                {$smarty.capture.profile}

                <div class="social-feed-box">


                    <div class="social-avatar">

                        {$smarty.capture.interval}

                        {call user_name param=$feeds}

                        respond to the organizaton requirement

                        {$smarty.capture.org_dept}

                        <br>
                        <small class="text-muted">

                            {call post_detail param= $feeds.PDT}

                            {call approval_state param=$feeds}


                        </small>




                    </div>


                    <div class="social-body">

                        {if $feeds.submissionBody}

                            <p>{$feeds.submissionBody}</p>

                        {/if}


                        <div class="list-group">


                            <a class="list-group-item text-muted" data-toggle="modal"  href="#FSModal">

                                <h3 class="list-group-item-heading">

                                    {call checklist_name type=$feeds.checklistType|trim}

                                    &nbsp;

                                    <i class="text-center fa fa-angle-right"></i> &nbsp;

                                    {call is_position_valid param=$feeds|default:'Any position'}

                                </h3>


                            </a>


                        </div>


                        {if $feeds.files|count}

                            <p class="small">

                            <span>
                                <i class="fa fa-paperclip"></i>
                                {$feeds.files|count} attachments -
                            </span>

                                <a href="#">Download all</a>

                                {$file_body}

                            </p>


                        {/if}



                    </div>


                </div>

            </div>




        {else}



            <div class="social-feed-separated" id="{$feeds.feedsId}">


                {$smarty.capture.profile}

                <div class="social-feed-box">



                    <div class="social-avatar">

                        {$smarty.capture.interval}

                        {call user_name param=$feeds}

                        submit a requirement

                        {$smarty.capture.org_dept}

                        <br>
                        <small class="text-muted">{call post_detail param= $feeds.PDT}</small>

                    </div>


                    <div class="social-body">

                        <div class="well">

                            <big>
                                <strong>

                                    <p>

                                        <a href="javascript:void 0">
                                            {call checklist_name type=$feeds.checklistType|trim}
                                        </a>


                                    </p>

                                </strong>
                            </big>




                            {$feeds.submissionBody}


                            <div style="margin-top: 10px" class="mail-attachment">
                                <p>
                                    <span><i class="fa fa-paperclip"></i> {$feeds.files|count} attachments - </span>
                                    <a href="#">Download all</a>
                                </p>


                                {$file_body}


                            </div>




                        </div>

                    </div>



                </div>
            </div>



        {/if}



    {/if}






















    {if $feeds.feedsType eq "F"}



        {assign attach $feeds.post_details.attachment}





        <div class="social-feed-separated" id="{$feeds.feedsId}">


            {$smarty.capture.profile}

            <div class="social-feed-box">


                <div class="social-avatar">

                    {$smarty.capture.interval}

                    {call user_name param=$feeds}

                    respond to organization post

                    {$smarty.capture.org_dept}

                    <br>

                    <small class="text-muted">

                        {call post_detail param= $feeds.PDT}

                        {call approval_state param= $attach[0]}


                    </small>

                </div>


                <div class="social-body">

                    <p>{$feeds.post_details.body|trim}</p>



                    {include "`$root`public\included_template\misc\\feeds_content_attachments.tpl"  scope=parent}


                    {call attachment param=$feeds.post_details.attachment}

                </div>


            </div>
        </div>


    {/if}





{/foreach}




