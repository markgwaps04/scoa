
{if $org.members.approved}


    <div class="ibox float-e-margins scoa-transparent no-margins">

        <div class="ibox-title no-borders scoa-transparent">

            <h5>Current Members</h5>
            <div class="ibox-tools">

                <a class="collapse-link pull-right">
                    <i class="fa fa-chevron-up"></i>
                </a>


            </div>

        </div>

        <div class="ibox-content inspinia-timeline scoa-transparent scoa-social-feed">


            {foreach $org.members.approved as $evey => $users}



                <div class="social-feed-separated no-margins no-padding-bottom">

                    <div class="social-avatar">
                        <a href="">
                            <img alt="image" class="profile" src="{$public}/files/profile/{$users.profile|default:'default/1.jpg'}">
                        </a>
                    </div>


                    <div class="social-feed-box">


                        {if not $org.isRenewalApproved}


                            <form method="post">


                                <input type="hidden" name="tempath" value="{$org.tempath}">
                                <input type="hidden" name="state" value="remove">
                                <input type="hidden" name="user_id" value="{$users.id}">
                                <input type="hidden" name="renewalID" value="{$org.renewalId}">


                                <div class="pull-right social-action dropdown">
                                    <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu m-t-xs">

                                        <li>
                                            <button type="submit" class="scoa_remove_member">remove</button>
                                        </li>


                                    </ul>
                                </div>

                            </form>


                        {/if}



                        <div class="social-avatar">

                            <a href="#">
                                {call user_fullname param=$users|default:'User' }
                            </a>

                            is a member of

                            <strong>

                                <a href="">
                                    {$org.name|default:'an organization' }
                                </a>

                            </strong>


                            as a position as <strong>{call position param=$users.position|default:'any Position' }</strong>

                            <br>

                            <small class="text-muted">{call post_detail param=$users.join_date_time}</small>
                        </div>



                        <div class="social-body">


                            <div class="well">

                                <div style="margin-top: 3%">

                                    <div class="row">

                                        <div class="col-md-8">

                                            <h4>Requirements as Member</h4>
                                            <small>The page you requested cannot be displayed right now. it may be temporarily unavailable, the link you clicked on may be broken or expired, or you may not have permission to view this page.</small>

                                        </div>



                                    </div>


                                    <ul class="todo-list m-t">
                                        <li>


                                            <input type="checkbox" value="" name=""

                                                    {if $user_model->is_Signature_set($users.user_url)}
                                                        checked
                                                    {/if}

                                                   class="i-checks"/>


                                            <span class="m-l-xs">Signature</span>

                                        </li>
                                        <li>

                                            <input type="checkbox" value=""

                                                    {if $user_model->get_profile($users.user_url)}
                                                        checked
                                                    {/if}

                                                   name="" class="i-checks"/>


                                            <span class="m-l-xs">Upload a profile picture.</span>

                                        </li>

                                        <li>

                                            <input type="checkbox" value=""

                                                    {if $user_model->is_phone_number_specified($users.user_url)}
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




            {/foreach}



        </div>

    </div>



{/if}




