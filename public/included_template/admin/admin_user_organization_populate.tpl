


{foreach $renewable as $evey => $rows}


    <div class="row">


        {foreach $rows as $evey => $organization}


            {*{if $isStrict and not $organization.had_renew} {continue} {/if}*}


        <div class="col-lg-4">
            <div class="ibox">

                <div class="ibox-title">


                    <h5>

                        <a href="{$public}/scoa_organization/feeds/{$organization.RCode}">

                            {$organization.name|truncate:40:"..."}

                        </a>

                    </h5>




                </div>



                <div class="ibox-content">


                    <div class="team-members">

                        {foreach $organization.members.approved as $every => $user}


                            <a href="">
                                <img alt="image" data-toggle="tooltip" data-placement="auto" title=
                                "{$user.Firstname|cat:" "|cat: $user.Lastname|capitalize:true:true }" class="img-circle profile" src="{$public}/files/profile/{$user.profile|default:'default/1.jpg'}">
                            </a>


                         {foreachelse}

                            <div class="alert alert-info no-margins position-relative top-n-md" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->
                                <i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;
                                <a class="alert-link" href="#">No current members</a>
                            </div>

                        {/foreach}

                    </div>


                    <h4>About</h4>

                    <p>

                        {$organization.details|truncate:300: '&nbsp;<a href="{$organization.RCode}">See more...</a>'|@trim }

                    </p>


                    <div class="row  m-t-sm" style="font-size: 12px">
                        {*<div class="col-sm-6 pull-left">*}
                            {*<div class="font-bold">CHECKLIST</div>*}
                            {*12*}
                        {*</div>*}
                        <div class="col-sm-12">
                            <strong>Code : </strong> {$organization.member_code }
                        </div>

                    </div>

                </div>
            </div>

        </div>


        {/foreach}




    </div>


{foreachelse}


    <div class="col-sm-12">

        <div class="middle-box text-center animated wobble no-margin-top">
            <h2 class="font-bold">No found results</h2>
            <div class="error-desc">
                Try to refresh the page
                <br><a href="{$public}" class="btn btn-primary m-t">Dashboard</a>
            </div>
        </div>

    </div>


{/foreach}



