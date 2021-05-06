
{include "`$root`public\included_template\Misc\\feeds_contents_plugin.tpl" scope="global"}



<REQUEST>




    {assign unapprovedMembers $user_club.members.unapproved}

    <div class="ibox float-e-margins scoa-transparent no-margins">

        <div class="ibox-title no-borders scoa-transparent">

            <h5><i class="text-success fa fa-send"></i> &nbsp Request</h5>
            <div class="ibox-tools">

                <a class="collapse-link pull-right">
                    <i class="fa fa-chevron-up"></i>
                </a>

                {if $unapprovedMembers}

                <span class="label label-primary pull-right">{$unapprovedMembers|@count}</span>


                {/if}

            </div>

        </div>

        <div class="ibox-content no-padding inspinia-timeline scoa-transparent scoa-social-feed">



            {foreach $unapprovedMembers as $every =>$a_user}


                {assign user_url $a_user.user_url}

                {assign __user user_model::get($user_url)}


                <div class="p-lg social-feed-separated no-margins no-padding-bottom">

                    <div class="social-avatar">
                        <a href="">



                            {call set_profile profile=$a_user.profile firstname=$a_user.Firstname isStaff=$a_user.isStaff}


                        </a>
                    </div>


                    <div class="social-feed-box">

                        <div class="pull-right social-action dropdown">
                            <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu m-t-xs">

                                <li><a href="javascript:void 0" class="scoa_remove_member" request="{$a_user.id}" state="blocked">Block</a></li>
                            </ul>
                        </div>

                        <div class="social-avatar">

                            <a href="#">
                                {user_fullname param=$a_user|default:'User' }
                            </a>

                            is a member of

                            <strong>

                                <a href="">
                                    {$user_club.name|default:'an organization' }
                                </a>

                            </strong>


                            as a position as <strong>{position param=$a_user.position|default:'any Position' }</strong>

                            <br>

                            <small class="text-muted">{post_detail param=$a_user.join_date_time}</small>
                        </div>

                        <div class="social-body">


                            <div class="well">

                                <big>

                                    <strong>


                                        <p>
                                            <a href="">
                                                {$user_club.name|default:'Your organization' }
                                            </a>
                                        </p>


                                    </strong>

                                </big>


                                <p>


                                    {$user_club.details|truncate:570: '&nbsp;<a href="#">See more...</a>'|default:'<a href="javascript:void 0"><i class="fa fa-pencil"></i>&nbsp; edit about</>' }


                                </p>

                                <div style="margin-top: 3%">


                                    <div class="row">

                                        <div class="col-md-8">

                                            <h4>Requirements as Member</h4>
                                            <small>The page you requested cannot be displayed right now. it may be temporarily unavailable, the link you clicked on may be broken or expired, or you may not have permission to view this page.</small>

                                        </div>

                                        <div class="col-md-4 org_choices">


                                            <div style="float:right;">

                                                <form method="post">

                                                    <input type="hidden" name="renewalID" value="{$user_club.renewalId}">

                                                    <input type="hidden" name="tempath" value="{$user_club.tempath}">

                                                    <input type="hidden" name="user_id" value="{$a_user.id}">

                                                    <button data-style="zoom-in" for="1"  class="ladda-button ladda btn btn-primary btn-sm" name="state" value="approved" type="submit">

                                                        <i class="fa fa-check"></i>

                                                        <span class="bold">Approved</span>
                                                    </button>

                                                    <button data-style="zoom-in" name="state" value="unapproved" for="2" class="ladda-button ladda btn btn-warning btn-sm" type="submit" >

                                                        <i class="fa fa-close"></i>

                                                        <span class="bold">Decline</span>

                                                    </button>

                                                </form>


                                            </div>


                                        </div>


                                    </div>

                                    <ul class="todo-list m-t">
                                        
                                        <li>
                                            <input type="checkbox" value="" name=""

                                                    {if $__user->is_signature_set()}
                                                        checked
                                                    {/if}

                                                   class="i-checks"/>


                                            <span class="m-l-xs">Signature</span>

                                        </li>

                                        <li>

                                            <input type="checkbox" value=""

                                                    {if $__user->is_profile_set()}
                                                        checked
                                                    {/if}

                                                   name="" class="i-checks"/>


                                            <span class="m-l-xs">Upload a profile picture.</span>

                                        </li>

                                        <li>

                                            <input type="checkbox" value=""

                                                    {if $__user->is_phone_number_specified()}
                                                        checked
                                                    {/if}

                                                   name="" class="i-checks"/>


                                            <span class="m-l-xs">Phone number.</span>

                                        </li>


                                    </ul>

                                </div>

                            </div>


                        </div>


                    </div>

                </div>


                {foreachelse}

                <div class="p-xl social-feed-separated m-b-lg no-padding-bottom scoa-social-no-content">

                    <h2 class="text-center">No Request</h2>

                </div>

            {/foreach}


        </div>

    </div>

</REQUEST>








<MEMBER>



    <div class="ibox float-e-margins scoa-transparent">
        <div class="ibox-title no-borders scoa-transparent">

            <h5> <i class="text-success fa fa-shield"></i> &nbsp; Current Members</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>

        </div>

        <div class="ibox-content no-padding inspinia-timeline scoa-transparent">



            {foreach $user_club.members.approved as $every =>$a_user}

                {assign user_url $a_user.user_url}

                {assign __user user_model::get($user_url)}


                <div class="p-lg social-feed-separated no-margins no-padding-bottom scoa-social-feed">

                <div class="social-avatar">
                    <a href="">

                        {call set_profile profile=$a_user.profile firstname=$a_user.Firstname isStaff=$a_user.isStaff}


                    </a>
                </div>


                <div class="social-feed-box">


                    {if not $user_club.isRenewalApproved}


                        <div class="pull-right social-action dropdown">


                            <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                                <i class="fa fa-angle-down"></i>
                            </button>



                            {if $user_club.currentUser neq $a_user.id}

                                <ul class="dropdown-menu m-t-xs">
                                    <li><a href="javascript:void 0" class="scoa_remove_member" id="{$user_club.renewalId}" state="remove" request="{$a_user.id}">Remove</a></li>
                                </ul>

                            {else}

                                <ul class="dropdown-menu m-t-xs">
                                    <li><a href="javascript:void 0" class="scoa_remove_member" id="{$user_club.renewalId}" state="remove" request="{$a_user.id}">Leave this organization</a></li>
                                </ul>


                            {/if}


                        </div>


                    {/if}







                    <div class="social-avatar">

                        <a href="#">
                            {user_fullname param=$a_user|default:'User' }
                        </a>

                        is a member of

                        <strong>

                            <a href="">
                                {$user_club.name|default:'an organization' }
                            </a>

                        </strong>


                        as a position as <strong>{position param=$a_user.position|default:'any Position' }</strong>

                        <br>

                        <small class="text-muted">{post_detail param=$a_user.join_date_time}</small>
                    </div>



                    <div class="social-body">


                        <div class="well">

                            <big>

                                <strong>


                                    <p>
                                        <a href="">
                                            {$user_club.name|default:'Your organization' }
                                        </a>
                                    </p>


                                </strong>

                            </big>

                            <p>


                                {$user_club.details|truncate:570: '&nbsp;<a href="#">See more...</a>'|default:'<a href="javascript:void 0"><i class="fa fa-pencil"></i>&nbsp; edit about</>' }


                            </p>

                            <div style="margin-top: 3%">


                                <div class="row">

                                    <div class="col-md-8">

                                        <h4>Requirements as Member</h4>
                                        <small>The page you requested cannot be displayed right now. it may be temporarily unavailable, the link you clicked on may be broken or expired, or you may not have permission to view this page.</small>

                                    </div>

                                    <div class="col-sm-2 col-lg-offset-2">


                                        <div style="float:left;" class="team-members">

                                            <a href="javascript:void 0">
                                                <img alt="member" class="img-circle profile" src="">


                                        </div>


                                    </div>


                                </div>


                                <ul class="todo-list m-t">

                                    <li>


                                        <input type="checkbox" disabled value="" name=""

                                                {if $__user->is_signature_set()}
                                                    checked
                                                {/if}

                                               class="i-checks"/>


                                        <span class="m-l-xs">Signature</span>

                                    </li>

                                    <li>

                                        <input type="checkbox" disabled value=""

                                                {if $__user->is_profile_set()}
                                                    checked
                                                {/if}

                                               name="" class="i-checks"/>


                                        <span class="m-l-xs">Upload a profile picture.</span>

                                    </li>

                                    <li>

                                        <input type="checkbox" disabled value=""

                                                {if $__user->is_phone_number_specified()}
                                                    checked
                                                {/if}

                                               name="" class="i-checks"/>


                                        <span class="m-l-xs">Phone number.</span>

                                    </li>


                                </ul>

                            </div>

                        </div>


                    </div>


                </div>

            </div>


            {foreachelse}

                <div class="p-xl social-feed-separated m-b-lg no-padding-bottom scoa-social-no-content">

                    <h2 class="text-center">No members</h2>

                </div>

            {/foreach}

        </div>

    </div>



</MEMBER>


