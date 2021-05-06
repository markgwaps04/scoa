
{include "`$root`public\included_template\global_functions.tpl" scope="global"}



{strip}

{assign accounts $accounts|array_chunk:3}

    {foreach $accounts as $every => $row}

        <div class="row">

        {foreach $row as $every_col => $user_details}


            <div class="col-lg-4">


                {if $_currentUser.Path or $_currentUser.user_url eq $user_details.user_url}

                    <a class="close"><i class="fa fa-times-circle side"></i></a>

                {/if}


                <div class="contact-box">
                    <a href="/SCOA/public/scoa_account/profile/{$user_details.id}">

                        <div class="col-sm-4">
                            <div class="text-center">
                                <img alt="image" class="profile animated-background facebook loading-avatar-feed scoa-avatar contacts-profile img-circle m-t-xs img-responsive" _src="/SCOA/public/files/profile/{$user_details.profile}" letters="{$user_details.Firstname}">
                            </div>
                        </div>

                        {call user_fullname param=$user_details withoutTag=true assign="user_name"}

                        <div class="col-sm-8">


                            <h4>{preg_replace("/\s+/"," ",$user_name)|trim|truncate:20:"..."}</h4>

                            <p><i class="fa fa-phone-square"></i>&nbsp; {$user_details.CP} </p>

                            <address>

                                <p>Date added on <strong>{$user_details.DT|date_format:"%b %e, %Y"}</strong></p>

                                {if $user_details.createBy}

                                    {assign addedBy $user->user_details($user_details.createBy) }

                                    {if $addedBy}

                                        {call user_fullname param=$addedBy withoutTag=true assign="byUser"}

                                        <p>Added by : {preg_replace("/\s+/"," ",$byUser)|trim|truncate:20:"..."}</p>

                                    {/if}

                                {/if}


                            </address>
                        </div>

                        <div class="clearfix"></div>

                    </a>
                </div>
            </div>


        {/foreach}


        </div>

    {/foreach}

{/strip}

