
{assign timeline $org_model->old_members($org.RCode)}


{if timeline}


    {foreach $timeline as $every => $organization}



        {function time_goes}

            {$organization.approval_date_time|date_format :'%B %e, %Y'|default:'xxxx'}
            -
            {$organization.unapproved_date_time|date_format :'%B %e, %Y'|default: 'xxxx'}


        {/function}




        {if $organization.members}



            <div class="ibox float-e-margins scoa-transparent no-margins">

                <div class="ibox-title no-borders scoa-transparent">

                    <h5>

                        {time_goes}

                    </h5>


                    <div class="ibox-tools">

                        <a class="collapse-link pull-right">
                            <i class="fa fa-chevron-up"></i>
                        </a>


                    </div>

                </div>

                <div class="ibox-content inspinia-timeline scoa-transparent scoa-social-feed">


                    {foreach $organization.members as $evey => $users}



                        <div class="social-feed-separated no-margins no-padding-bottom">

                            <div class="social-avatar">
                                <a href="">
                                    <img alt="image" class="profile" src="{$public}/files/profile/{$users.profile|default:'default/1.jpg'}">
                                </a>
                            </div>


                            <div class="social-feed-box">



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



                                <div class="social-body"></div>


                            </div>

                        </div>




                    {/foreach}



                </div>

            </div>



        {/if}



    {/foreach}




{/if}
