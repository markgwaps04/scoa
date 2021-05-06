
{include "`$root`public\included_template\global_functions.tpl" scope="parent"}

{$pin = mt_rand(0,1000)}



{assign notify $notify}









{foreach $notify as $every => $feed}


    {capture profile}


        {if not $feed.isStaff}


            <img alt="image" letters="{$firstname|substr:0:1|upper}" class="profile img-circle" _src="{$public}/files/profile/{$feed.profile|default : "1.jpg"}">

        {else}

            <img alt="image" class="profile img-circle" _src="{$public}/files/scoa.png">

        {/if}


    {/capture}




    {capture user_type}

        {if not $feed.isStaff}

            {call user_fullname withoutTag=true param=$feed|default:'User'}

        {else}

            Student’s Commission on Audit (SCOA)

        {/if}


    {/capture}







    {function structure}


        <li id="scoa-notify" feedsId="{$feed.path}">
            <div class="dropdown-messages-box">
                <a href="profile.html" class="pull-left">
                    {$smarty.capture.profile}
                </a>
                <div class="media-body smaller">

                    <a href="{$link|default:"javascript:void 0"}" class="scoa-notify-link">

                        <small class="pull-right text-navy">

                            {call getIntervalByShorthand strEnd=$feed.PDT assign="date_time"}

                            {assign dateTimeTemp $date_time|lower }

                            {if $dateTimeTemp eq "today"}

                                Today

                            {else}

                                {$date_time}

                            {/if}

                        </small>



                        {if not $userName}

                            <strong>
                                {$smarty.capture.user_type}
                            </strong>

                        {/if}


                        {$body}

                        <br>

                        <small class="text-muted">{call post_detail param= $feed.PDT}</small>

                    </a>



                </div>
            </div>
        </li>

        <li class="divider"></li>



    {/function}









    {if $feed.feedsType eq "E"}

        {assign link "{$public|trim}feeds/{$feed.org_info.url}" }

        {capture typeF}


            {if $feed.isMemberState}

                respond to the requirement of

            {else}

                submitted a requirements to

            {/if}



            <a class="font-inherit no-padding" href="{$link}"><strong>
                    {$feed.org_info.name|capitalize|truncate:50:"..."}
                </strong></a>.

        {/capture}


        {call structure body=$smarty.capture.typeF link=$link}



    {/if}







    {if $feed.feedsType eq "F"}


        {assign link "{$public|trim}feeds/{$feed.org_info.url}" }

        {capture typeF}

            respond to the post on <a class="font-inherit no-padding" href="{$link}"><strong>
                {$feed.org_info.name|capitalize|truncate:50:"..."}</strong></a>

        {/capture}


        {call structure body=$smarty.capture.typeF link=$link}



    {/if}





    {if $feed.feedsType eq "H"}


        <li id="scoa-notify" feedsId="{$feed.path}">
            <div class="dropdown-messages-box">
                <a href="profile.html" class="pull-left">
                    {$smarty.capture.profile}
                </a>
                <div class="media-body smaller">

                    <a href="{$link}" class="scoa-notify-link">

                        <small class="pull-right text-navy">

                            {call getIntervalByShorthand strEnd=$feed.PDT assign="date_time"}

                            {$date_time}


                        </small>

                        <strong>
                            {$smarty.capture.user_type}
                        </strong>



                        {if $feed.post_details._status eq "1"}

                            approved

                            <a class="font-inherit no-padding" href="{$link}">
                                <strong>{$feed.org_info.name|capitalize|truncate:50:"..."}</strong>

                            </a>.

                            <br>


                        {else}
                            unapproved your request to create organization
                        {/if}


                        <small class="text-muted">{call post_detail param= $feed.PDT}</small>

                    </a>



                </div>
            </div>
        </li>

        <li class="divider"></li>


    {/if}




    {if $feed.feedsType eq "I" }


        {capture typeI}

            Set the new batch for <strong>{$feed.PDT|date_format:"%Y"}</strong>

        {/capture}


        {call structure body=$smarty.capture.typeI}


    {/if}





    {if $feed.feedsType eq "J" }



        {capture typeJ}

            Set the deadline <strong>{call post_detail param=$feed.post_details.deadline}</strong>

        {/capture}


        {call structure body=$smarty.capture.typeJ}


    {/if}









    {if $feed.feedsType eq "C"}



        {capture _user}

            {call user_fullname withoutTag=true param=$feed.post_details|default:'User'}

        {/capture}


        {assign link "{$public|trim}feeds/{$feed.org_info.url}" }


        {capture typeC}


            {if $feed.m_requestType eq 'A'}

                sent a request to join

            {elseif $feed.m_requestType eq 'B' }

                approved your request to join

            {elseif $feed.m_requestType eq 'C' }

                remove you as a member of

            {elseif $feed.m_requestType eq 'D' }

                unapproved your request to join

            {/if}



            <a class="font-inherit no-padding" href="{$link}"><strong>
                {$feed.org_info.name|capitalize|truncate:50:"..."}</strong></a>.


        {/capture}





        {if $feed.m_requestType eq 'A'}

            {$link="{$public|trim}/organization/members/{$feed.org_info.url}"}

        {/if}





        {call structure body=$smarty.capture.typeC  userName=$_user link=$link}


    {/if}











{/foreach}

