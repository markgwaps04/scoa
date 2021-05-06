
{include "`$root`public\included_template\Misc\\feeds_contents_plugin.tpl" scope="global"}

{include "`$root`public\included_template\global_functions.tpl" scope="global"}


{function theme1}

    {assign data $data.of|json_decode}

    {assign IsStaff $sessions[$smarty.const.SESSION_KEY].staff}

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Reminder</h5>

            <a class="text-success pull-right" href="javascript:void 0">
                See all
            </a>

        </div>

        <div class="ibox-content inspinia-timeline">

            <div class="row" id="scoa_reminders">





                {foreach $data as $every=>$post}

                    {assign post $main->intoArray($post)}

                    {call getInterval strEnd=$post.PDT assign="interval"}

                    {call user_fullname param=$post withoutTag=true assign="user_full"}

                    {assign post_details $post.post_details}

                    {assign post_details $main->intoArray($post_details)}




                    {capture date_representation}

                        {$post.PDT|date_format:"m/d/Y"}

                    {/capture}


                    {if $post.feedsType eq "E"}


                        {call checklist_name type=$post.checklistType assign="checklist"}

                        <div class="timeline-item feed-element" id="{$post.path}">

                            <div class="row">


                                <div class="col-xs-3 date">
                                    <i class="fa fa-briefcase"></i>
                                    <small><b>{$smarty.capture.date_representation}</b></small>
                                    <br/>
                                    <small class="text-navy">{$interval}</small>
                                </div>

                                <div class="col-xs-7 content no-top-border">
                                    <p class="m-b-xs">

                                        <a href="javascript:void 0">

                                            <strong>
                                                {$post.org_name|truncate:50:"..."}
                                            </strong>

                                        </a>

                                    </p>

                                    <p>
                                        <a href="javascript:void 0">{$user_full}</a>
                                        submitted a requirements for <strong>{$checklist}</strong>
                                    </p>

                                </div>

                            </div>

                        </div>

                    {/if}


                    {if $post.feedsType eq "I"}


                        {call post_detail param=$post_details.date_time assign="batch_set"}



                        <div class="timeline-item feed-element" id="{$post.path}">

                            <div class="row">


                                <div class="col-xs-3 date">
                                    <i class="fa fa-bookmark text-navy"></i>
                                    <small><b>{$smarty.capture.date_representation}</b></small>
                                    <br/>
                                    <small class="text-navy">{$interval}</small>
                                </div>

                                <div class="col-xs-7 content no-top-border">
                                    <p class="m-b-xs">

                                        <a href="{if IsStaff}/SCOA/public/scoa_checklist{else}javascript:void 0{/if}">

                                            <strong>
                                                Student’s Commission on Audit
                                            </strong>

                                        </a>

                                    </p>

                                    <p>

                                        {if IsStaff}


                                            <a href="/SCOA/public/scoa_account/profile/{$post.currentUser}">
                                                {$user_full}
                                            </a>

                                            set a renewal of organization or department, start on
                                            <strong>{$batch_set}</strong>

                                        {else}



                                        {/if}

                                    </p>

                                </div>

                            </div>

                        </div>

                    {/if}



                    {if $post.feedsType eq "F"}



                        {assign attachment $post_details.attachment[0]}

                        {assign attachment $main->intoArray($attachment)}

                        {call checklist_name type=$attachment.checklistType assign="checklist"}

                        {capture submissionState}

                            {if $post_details.state eq "-1"}

                                <span class="label label-danger">Disapproved</span>

                            {/if}


                            {if $post_details.state eq "1"}

                                <span class="label label-primary">Approved</span>

                            {/if}


                            {if $post_details.state eq "2"}

                                <span class="label label-info">Respond</span>

                            {/if}

                            {if $post_details.state eq "0"}

                                <span class="label label-warning">Resubmit</span>

                            {/if}

                        {/capture}




                        {if $IsStaff}

                            <div class="timeline-item feed-element" id="{$post.path}">

                                <div class="row">


                                    <div class="col-xs-3 date">
                                        <i class="fa fa-reply text-cadet-blue"></i>
                                        <small><b>{$smarty.capture.date_representation}</b></small>
                                        <br/>
                                        <small class="text-navy">{$interval}</small>
                                    </div>

                                    <div class="col-xs-7 content no-top-border">
                                        <p class="m-b-xs">

                                            <a href="javascript:void 0">

                                                <strong>
                                                    {$post.org_name|truncate:50:"..."}
                                                </strong>

                                            </a>

                                        </p>

                                        <p>

                                            <a href="/SCOA/public/scoa_account/profile/{$post.currentUser}">
                                                    {$user_full}
                                            </a>

                                            {$smarty.capture.submissionState}

                                            &nbsp;the submitted requirement for
                                            <strong> {$checklist} </strong>

                                        </p>

                                    </div>

                                </div>

                            </div>

                        {/if}


                        {if !$IsStaff}

                            {call user_fullname param=$attachment withoutTag=true assign="aUser"}


                            <div class="timeline-item feed-element" id="{$post.path}">

                                <div class="row">


                                    <div class="col-xs-3 date">
                                        <i class="fa fa-reply text-cadet-blue"></i>
                                        <small><b>{$smarty.capture.date_representation}</b></small>
                                        <br/>
                                        <small class="text-navy">{$interval}</small>
                                    </div>

                                    <div class="col-xs-7 content no-top-border">
                                        <p class="m-b-xs">

                                            <a href="javascript:void 0">

                                                <strong>
                                                    Student’s Commission on Audit
                                                </strong>

                                            </a>

                                        </p>

                                        <p>


                                            {$smarty.capture.submissionState}

                                            &nbsp;the submitted requirement sent from
                                            <a href="javascript:void 0">
                                                {$aUser}
                                            </a>
                                            for <strong> {$checklist} </strong>

                                        </p>

                                    </div>

                                </div>

                            </div>

                        {/if}


                    {/if}



                    {if $post.feedsType eq "J"}


                        {call post_detail param=$post_details.date_time assign="batch_update"}

                        {call post_detail param=$post_details.deadline assign="batch_deadline"}


                        {if $IsStaff}

                            {call user_fullname param=$attachment withoutTag=true assign="aUser"}

                            <div class="timeline-item feed-element" id="{$post.path}">

                                <div class="row">


                                    <div class="col-xs-3 date">
                                        <i class="fa fa-gear text-cadet-blue"></i>
                                        <small><b>{$smarty.capture.date_representation}</b></small>
                                        <br/>
                                        <small class="text-navy">{$interval}</small>
                                    </div>

                                    <div class="col-xs-7 content no-top-border">
                                        <p class="m-b-xs">

                                            <a href="javascript:void 0">

                                                <strong>
                                                    {$user_full}
                                                </strong>

                                            </a>

                                        </p>

                                        <p>


                                            Update the deadline for this batch, the batch has start on
                                            <strong>{$batch_update}</strong> and the deadline will be
                                            <strong>{$batch_deadline}</strong>


                                        </p>

                                    </div>

                                </div>

                            </div>

                        {/if}


                        {if !$IsStaff}

                            {call user_fullname param=$attachment withoutTag=true assign="aUser"}

                            <div class="timeline-item feed-element" id="{$post.path}">

                                <div class="row">


                                    <div class="col-xs-3 date">
                                        <i class="fa fa-gear text-cadet-blue"></i>
                                        <small><b>{$smarty.capture.date_representation}</b></small>
                                        <br/>
                                        <small class="text-navy">{$interval}</small>
                                    </div>

                                    <div class="col-xs-7 content no-top-border">
                                        <p class="m-b-xs">

                                            <a href="javascript:void 0">

                                                <strong>
                                                    Student’s Commission on Audit
                                                </strong>

                                            </a>

                                        </p>

                                        <p>


                                            Update the deadline for this batch, the batch has start on
                                            <strong>{$batch_set}</strong> and the deadline will be
                                            <strong>{$batch_deadline}</strong>, visit our office or
                                            <a href="javascript:void 0">Message us</a> if you have a questions regarding this.



                                        </p>

                                    </div>

                                </div>

                            </div>

                        {/if}


                    {/if}






                    {foreachelse}


                    <div class="row">
                        <div class="col-xs-12 no-borders text-center">
                            <h2>No data loaded</h2>
                        </div>
                    </div>


                {/foreach}



            </div>



        </div>


    </div>

{/function}






{function theme2}

    {assign data $data.of|json_decode}


    {foreach $data as $every => $post}

        {assign post $main->intoArray($post)}

        {call user_fullname param=$post withoutTag=true assign="user_full"}

        {call getIntervalByShorthand strEnd=$post.PDT assign="interval"}

        {call getIntervalByShorthand strStart=$post.PDT assign="intervalReverse"}

        {capture full_date_representation}

            {$intervalReverse} {$post.PDT|date_format:"h:i a - m.d.Y"}

        {/capture}


        {call post_detail param=$post.PDT assign="full_date_post"}

        {assign post_details $post.post_details}









        {if $post.feedsType eq "E"}

           {call checklist_name type=$post.checklistType assign="checklist"}

           <div class="feed-element" id="{$post.path}">
               <div>
                   <small class="pull-right text-navy">{$interval}</small>
                   <a href="javascript:void 0"><strong>{$checklist|truncate:70:"..."}</strong></a>
                   <div>
                       <a href="javascript:void 0"> {$user_full} </a>
                       submitted a requirement.

                   <p><small class="text-muted">{$smarty.capture.full_date_representation}</small></p>

                   </div>
               </div>
           </div>

        {/if}


        {if $post.feedsType eq "I"}

            {call post_detail param=$post_details.date_time assign="batch_set"}

            <div class="feed-element">
                <div>
                    <small class="pull-right text-navy">{$interval}</small>
                    <a href="javascript:void 0"><strong>Student’s Commission on Audit</strong></a>
                    <div>

                        <strong>Renew all organizations and department</strong>, the batch has start on
                        <strong>{$batch_set}</strong>
                        visit our office or <a href="javascript:void 0">Message us</a>
                        if you have a questions regarding this.

                        <p><small class="text-muted">{$smarty.capture.full_date_representation}</small></p>

                    </div>
                </div>
            </div>

        {/if}



        {if $post.feedsType eq "J"}

            {assign post_details $main->intoArray($post_details)}

            {call post_detail param=$post_details.date_time assign="batch_update"}

            {call post_detail param=$post_details.deadline assign="batch_deadline"}

            <div class="feed-element">
                <div>
                    <small class="pull-right text-navy">{$interval}</small>
                    <a href="javascript:void 0"><strong>Student’s Commission on Audit</strong></a>
                    <div>

                        <strong>Update the deadline</strong>, the batch has start on
                        <strong>{$batch_set}</strong> and the deadline will be
                        <strong>{$batch_deadline}</strong>
                        visit our office or <a href="javascript:void 0">Message us</a>
                        if you have a questions regarding this.

                        <p><small class="text-muted">{$smarty.capture.full_date_representation}</small></p>

                    </div>
                </div>
            </div>

        {/if}








    {/foreach}


{/function}




{if $data.theme eq "true"}

    {call theme2}

{else}

    {call theme1}

{/if}





