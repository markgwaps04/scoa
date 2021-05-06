
{strip}

<style>

    .org_details
    {

        padding: 15px 35px 22px 38px;

    }

    .org {


        background-position: center;
        height: auto;
        min-height: 39%;
        background-origin: content-box;
        background-clip: content-box;
        background-size: cover;

    }
    .scoa-active {

        color: cornflowerblue !important;

    }

</style>

<!--<link href="http://localhost/SCOA/public/css/bootstrap.min.css" rel="stylesheet">-->

    {*{if not $user->hasVerificatonCode()}*}

{if not true}

    <div class="alert alert-warning warning" style="background-color: #fffffe">
        <i class="fa fa-phone" style="font-size: 15px"></i>&nbsp;
        <a class="alert-link" href="#">Confirm Your Identity</a>, adding a mobile phone number to your account, help your account secure , make easier to connect with you and makes it easier to regain access to your account if you have trouble logging in. <a href="{$public}User/confirmAccount" style="text-decoration: underline">Confirm your phone number</a> you can always change your phone number anytime <a href="{$public}home/account" style="text-decoration: underline">Go to my account</a>.
    </div>


{/if}


<div class="panel blank-panel">
    <div class="panel-heading">
        <div class="panel-options">
            <ul class="nav nav-tabs " role="tablist">
                <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">Recent Activity</a></li>
                <li><a href="#tab2" data-toggle="tab" aria-expanded="false">My Organizations</a></li>
                <li class="pull-right"><a href="{$public}/organization/join" class="text-success scoa-active"><i class="fa fa-plus"></i> Add</a></li>
            </ul>

        </div>
    </div>


    <div class="panel-body">

        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <div class="feed-activity-list feeds">

                    <RECENT_ACTIVITY>


                        <!--<div class="text-center">-->

                        <!--<h2>No recent Activity</h2>-->

                        <!--</div>-->

                        {*{include "`$root`public\included_template\user\user_index_recent_activity.tpl"}*}

                    </RECENT_ACTIVITY>

                </div>

            </div>


            <div class="tab-pane fade" id="tab2">

                <!--    MY ORGANIZATION     -->


                <ALL_USER_GROUPS>


                    {*{include "`$root`public\included_template\user\user_index_clubs.tpl"}*}

                </ALL_USER_GROUPS>

            </div>
        </div>

    </div>

</div>



<script src="{$js}/scoa/scoa_welcome_page.js"></script>


{/strip}