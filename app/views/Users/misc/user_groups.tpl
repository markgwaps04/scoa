

{include "`$root`public\included_template\Misc\\feeds_contents_plugin.tpl" scope="global"}


{*<!-- @param status -->*}

{function club_status }

    {if $status eq 1}

        <div class="font-bold" style="color: steelblue ">ACTIVE</div>

    {else}

        <div class="font-bold" style="color: firebrick ">NOT ACTIVE</div>


    {/if}


{/function}





{*<!-- @param renewal_code -->*}

{function cover_photo}

    {assign "cover" $club->get_cover_photo($renewal_code)}

    {if $cover neq "" }

        <div class="org" style="background-image: url('http://localhost/SCOA/public//files/cover/{$cover}');"></div>

    {else}

        <div class="org" style="background-image: url('http://localhost/SCOA/public//files/default_image/default.png');"></div>

    {/if}

{/function}



{section clubs $has_organization}


    <div class="ibox">

        <div class="ibox-title">

         <span class="label label-primary pull-right">
             New
         </span>


            <h5>
                <a href="{$public}feeds/{$has_organization[clubs].url}">
                    {$has_organization[clubs].name}
                </a>

            </h5>

        </div>
        <div class="ibox-content no-padding" style="overflow: hidden">

            <div class="row">

                <div class="col-lg-6 org_details">

                    <div class="team-members">

                        {foreach $has_organization[clubs].members.approved as $every =>$a_user}


                            {call set_profile class="img-circle" profile=$a_user.profile firstname=$a_user.Firstname isStaff=$a_user.isStaff}


                        {/foreach}


                    </div>


                    <h4>ABOUT</h4>

                    <p>

                        {assign "Rcode" $has_organization[clubs].RCode}

                        {$has_organization[clubs].details|truncate:270: '&nbsp;<a href="#">See more...</a>'}

                    </p>

                    <div class="row  m-t-sm">
                        <div class="col-sm-4">
                            <div class="font-bold">CODE</div>

                            {$has_organization[clubs].member_code}

                        </div>
                        <div class="col-sm-4">
                            <div class="font-bold">MEMBERS</div>

                            {count($has_organization[clubs].members.approved)}


                        </div>
                        <div class="col-sm-4 text-right">
                            <div class="font-bold">Status</div>

                            {club_status status=$has_organization[clubs].isRenewalApproved}

                        </div>
                    </div>

                </div>

                <div class="col-lg-6">

                    {cover_photo renewal_code=$Rcode }

                </div>

            </div>

        </div>
    </div>

    {sectionelse}



    <div class="text-center">

        <h2>

            <p><a href="#">Join</a></p>

            <p class="small">or</p>

            <p><a href="create">create new organization</a></p>


        </h2>

    </div>


{/section}