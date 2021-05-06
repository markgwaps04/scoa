
{include "`$root`public\included_template\global_functions.tpl" scope="global"}


{block body prepend}

    <div class="wrapper wrapper-content" style="padding-bottom: 0;">

        <ol class="breadcrumb scoa-transparent">
            <li>
                <a href="/SCOA/public/organization">Home</a>
            </li>
            <li>
                <a href="/SCOA/public/feeds/{$user_club.url}">Organization</a>
            </li>
            <li class="active">
                <strong>{$user_club.name}</strong>
            </li>
        </ol>

    </div>


    <div class="wrapper wrapper-content">

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5> <i class="fa fa-spinner fa-spin" id="title-spinner"></i> &nbsp; Financial Statements</h5>
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-white active" id="semestral">Batch</button>
                                <button type="button" class="btn btn-xs btn-white" id="yearly">Annual</button>
                            </div>
                        </div>
                    </div>

                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="flot-chart">
                                    <canvas id="lineChart" height="70"></canvas>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <ul class="stat-list" id="stat-list">

                                    <li>
                                        <h2 class="no-margins">0</h2>
                                        <small>Current Balance</small>
                                        <div class="stat-percent">0% <i class="fa fa-spinner fa-spin text-navy"></i></div>
                                        <div class="progress progress-mini">
                                            <div style="width: 0%;" class="progress-bar"></div>
                                        </div>
                                    </li>


                                    <li>
                                        <h2 class="no-margins ">0</h2>
                                        <small>Final balance last batch</small>
                                        <div class="stat-percent">0% <i class="fa fa-spinner fa-spin text-navy"></i></div>
                                        <div class="progress progress-mini">
                                            <div style="width: 0%;" class="progress-bar"></div>
                                        </div>
                                    </li>

                                    <li>
                                        <h2 class="no-margins ">0</h2>
                                        <small>Current Cash Collected</small>
                                        <div class="stat-percent">0% <i class="fa fa-spinner fa-spin text-navy"></i></div>
                                        <div class="progress progress-mini">
                                            <div style="width: 0%;" class="progress-bar"></div>
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-lg-4">

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Reminders</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content ibox-heading">
                        <h3><i class="fa fa-exclamation-circle"></i> Remainder's </h3>
                        <small><i class="fa fa-tim"></i> You have <span id="remind_count">0</span> Important notification.</small>
                    </div>

                    <div class="ibox-content">

                        <div class="feed-activity-list load" id="reminders">

                            <div class="feed-element">
                                <div>
                                    <small class="pull-right text-navy animated-background">SCOA</small>
                                    <small class="animated-background">Student’s Commission on Audit</small>
                                    <p class="animated-background">
                                        Student’s
                                        Commission on Audit SCOA SCOA
                                        SCOA
                                    </p>
                                    <small class="animated-background">SCOA
                                        SCOA SCOA SCOA SCOA SCOA SCOA
                                    </small>
                                </div>
                            </div>

                            <div class="feed-element">
                                <div>
                                    <small class="pull-right text-navy animated-background">SCOA</small>
                                    <small class="animated-background">Student’s Commission on Audit</small>
                                    <p class="animated-background">
                                        Student’s
                                        Commission on Audit SCOA SCOA
                                        SCOA
                                    </p>
                                    <small class="animated-background">SCOA
                                        SCOA SCOA SCOA SCOA SCOA SCOA
                                    </small>
                                </div>
                            </div>

                            <div class="feed-element">
                                <div>
                                    <small class="pull-right text-navy animated-background">SCOA</small>
                                    <small class="animated-background">Student’s Commission on Audit</small>
                                    <p class="animated-background">
                                        Student’s
                                        Commission on Audit SCOA SCOA
                                        SCOA
                                    </p>
                                    <small class="animated-background">SCOA
                                        SCOA SCOA SCOA SCOA SCOA SCOA
                                    </small>
                                </div>
                            </div>


                            <div class="feed-element">
                                <div>
                                    <small class="pull-right text-navy animated-background">SCOA</small>
                                    <small class="animated-background">Student’s Commission on Audit</small>
                                    <p class="animated-background">
                                        Student’s
                                        Commission on Audit SCOA SCOA
                                        SCOA
                                    </p>
                                    <small class="animated-background">SCOA
                                        SCOA SCOA SCOA SCOA SCOA SCOA
                                    </small>
                                </div>
                            </div>

                            <div class="feed-element">
                                <div>
                                    <small class="pull-right text-navy animated-background">SCOA</small>
                                    <small class="animated-background">Student’s Commission on Audit</small>
                                    <p class="animated-background">
                                        Student’s
                                        Commission on Audit SCOA SCOA
                                        SCOA
                                    </p>
                                    <small class="animated-background">SCOA
                                        SCOA SCOA SCOA SCOA SCOA SCOA
                                    </small>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Notification</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content sk-loading scoa-requirements">

                        <div class="sk-spinner sk-spinner-double-bounce">
                            <div class="sk-double-bounce1"></div>
                            <div class="sk-double-bounce2"></div>
                        </div>


                        <ul class="sortable-list connectList agile-list ui-sortable" id="todo">
                            <li class="warning-element" id="task1">

                                <div class="checkbox checkbox-primary no-padding">

                                    <div class="row no-padding">

                                        <div class="col-sm-1">
                                            <input id="positions" class="scoa hide" required name="agreement" disabled type="checkbox">&nbsp;
                                        </div>
                                        <div class="col-sm-10">

                                            <a href=
                                               "{if $user_club.isCurrentUserApproved}

                                               {$public}organization/members/{$user_club.url}

                                               {else}

                                               javascript:void 0

                                               {/if}">5 members including the Treasurer, Auditor, Organization President, Department Governor and Adviser.</a>

                                        </div>

                                    </div>

                                </div>

                            </li>
                            <li class="warning-element" id="task2">

                                <div class="checkbox checkbox-primary no-padding">

                                    <div class="row no-padding">

                                        <div class="col-sm-1">
                                            <input id="members" class="scoa hide" required name="agreement" disabled type="checkbox">&nbsp;
                                        </div>
                                        <div class="col-sm-10">

                                            <a href=
                                               "{if $user_club.isCurrentUserApproved}

                                               {$public}organization/members/{$user_club.url}

                                               {else}

                                               javascript:void 0

                                               {/if}">Complete members requirements.</a>

                                        </div>

                                    </div>

                                </div>

                            </li>
                            <li class="warning-element" id="task3">

                                <div class="checkbox checkbox-primary no-padding">

                                    <div class="row no-padding">

                                        <div class="col-sm-1">
                                            <input id="cover" class="scoa hide" required name="agreement" disabled type="checkbox">&nbsp;
                                        </div>

                                        <div class="col-sm-10">

                                            <a>Cover photo of organization</a>

                                        </div>

                                    </div>

                                </div>


                            </li>

                        </ul>

                    </div>

                </div>


            </div>

            <div class="col-lg-8">

                <div class="row" id="group_statistics"></div>

                <div class="row">

                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>About your group</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="ibox-content">

                                <div class="sk-spinner sk-spinner-double-bounce">
                                    <div class="sk-double-bounce1"></div>
                                    <div class="sk-double-bounce2"></div>
                                </div>


                                <h5>ABOUT


                                    {* check if current user is approved *}

                                    {if $user_club.isCurrentUserApproved}

                                        <i class="fa fa-pencil small text-muted scoa_xxsmall_text" data-toggle="tooltip" data-placement="right" title="edit" style="vertical-align: top"></i>

                                    {/if}

                                    {* end of comment *}



                                </h5>

                                <p>

                                    {* about the organization *}

                                    {$user_club.details}

                                    {* end of comment *}

                                </p>

                                <h5>CODE</h5>
                                <span>

                            {$user_club.member_code}

                                    {* check if current user is approved *}

                                    {if $user_club.isCurrentUserApproved}

                                        <form method="post" class="inline">

                            <input type="hidden" name="url" value="{$user_club.url}">

                            <button type="submit"  class="btn btn-sm small text-success scoa_xsmall_text btn-default fa fa-repeat"></button>

                        </form>

                                    {/if}

                                    {* end of comment *}


                        </span>

                                <h5><a href="{$public}organization/members/{$user_club.url}">MEMBERS</a></h5>

                                <p class="user-friends">

                                    {* populate the members of target organization *}


                                    {foreach $user_club.members.approved as $every => $user}


                                        <a href="{$public}organization/members/{$user_club.url}">

                                            <img alt="image" data-toggle="tooltip" data-placement="auto" title=
                                            "{$user.Firstname|cat:" "|cat: $user.Lastname|capitalize:true:true }" class="img-circle profile" src="{$public}/files/profile/{$user.profile|default:'default/1.jpg'}">


                                        </a>


                                    {/foreach}


                                    {* end of comment *}

                                </p>


                            </div>

                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">


                            <div class="ibox-title">
                                <h5>Submissions</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>


                            <div class="ibox-content dashboard load">
                                <table class="table table-hover no-margins">
                                    <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>User</th>
                                        <th>Type</th>
                                    </tr>
                                    </thead>
                                    <tbody id="submission">

                                    <tr>
                                        <td><small class="animated-background">SCOA SCOA</small></td>
                                        <td><span class="animated-background">SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA</span></td>
                                    </tr>

                                    <tr>
                                        <td><small class="animated-background">SCOA SCOA SCOA</small></td>
                                        <td><span class="animated-background">SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA SCOA</span></td>
                                    </tr>

                                    <tr>
                                        <td><small class="animated-background">SCOA SCOA SCOA SCOA</small></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA</span></td>
                                    </tr>

                                    <tr>
                                        <td><small class="animated-background">SCOA</small></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA</span></td>
                                    </tr>

                                    <tr>
                                        <td><small class="animated-background">SCOA SCOA SCOA</small></td>
                                        <td><span class="animated-background">SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA</span></td>
                                    </tr>

                                    <tr>
                                        <td><small class="animated-background">SCOA SCOA SCOA SCOA</small></td>
                                        <td><span class="animated-background">SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA SCOA</span></td>
                                    </tr>

                                    <tr>
                                        <td><small class="animated-background">SCOA SCOA SCOA</small></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA SCOA</span></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </div>

    </div>

{/block}


{block head append}

    <link href="{$css}plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <style>

        .ibox-content.dashboard table td {

            font-size: small;

        }
        .afterload {

            display: none !important;

        }


    </style>


{/block}



{block script}

    <!-- ChartJS-->
    <script src="{$js}plugins/chartJs/Chart.min.js"></script>

    <script src="{$js}plugins/canvasJs/canvasjs.min.js"></script>

    <script src="{$js}scoa/scoa-graph.js?{$pin}"></script>
    <script src="{$js}scoa/scoa_user_dashboard.js?{$pin}"></script>

    <script src="{$js}plugins/breeze/lodash.js?pin={$pin}" crossorigin="anonymous"></script>

    <script src="{$js}moment/moment.js?{$pin}"></script>

    <script src="{$js}scoa/scoa_reminders.js?{$pin}"></script>


{literal}

    <script id="group_statistics_template" type="text/x-handlebars-template">

        <div class="col-lg-12">

            <error_placement></error_placement>

            <div class="ibox float-e-margins">

                <div class="ibox-title">
                    <div class="ibox-tools">
                        <span class="pull-right label label-primary animated wobble">{batch}</span>
                    </div>
                </div>

                <div class="ibox-content">

                    <div class="row">

                        <div class="col-lg-12 p-sm">

                            <div class="col-lg-4">
                                <div class="widget style1 navy-bg">
                                    <div class="row">

                                        <div class="col-xs-3">
                                            <i class="fa fa-rouble fa-3x"></i>
                                        </div>

                                        <div class="col-xs-9 text-right">

                                            <span>Cash Collected</span>

                                            <h2 class="font-bold total-collected">
                                                {collected_cash}
                                            </h2>

                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="widget style1 yellow-bg">
                                    <div class="row">
                                        <div class="col-xs-3" id="percentage">
                                            <i class="fa fa-rouble fa-3x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <span> Final Balance </span>
                                            <h2 class="font-bold total-balance">
                                                {balance}
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="widget style1 lazur-bg">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-rouble fa-3x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <span> Total Expenses </span>
                                            <h2 class="font-bold total-expenses">
                                                {expenses}
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>


                    <div class="row">

                        <div class="col-sm-6 no-padding">
                            <div id="expenses" style="height: 170px; max-width: 100%; margin: 0px auto;"></div>
                        </div>

                        <div class="col-sm-6 no-padding">
                            <div id="activity" style="height: 170px; max-width: 100%; margin: 0px auto;"></div>
                        </div>

                    </div>

                    <br>
                    <br>


                </div>

            </div>
        </div>


    </script>

    <script id="approved_checklist_template" type="text/html">

        <tr>
            <td><span class="label label-{typeState}">{state}</span></td>
            <td><i class="fa fa-clock-o"></i> {dateTime}</td>
            <td>{user}</td>
            <td class="text-navy"><a href="javascript:void 0">{type}</a></td>
        </tr>


    </script>




    <script>

        $(document).ready(function() {

            let checkbox = $('.scoa-requirements input[type=checkbox]');

            $.post('{/literal}{$public}{literal}/organization/requirements',{ tempath : "{/literal}{$user_club.tempath}{literal}" },function(response){

                let data = JSON.parse(response);

                console.log(data);

                if(data.hasOwnProperty("is_position_fill") &&
                    data.hasOwnProperty("is_cover_photo_set") &&
                    data.hasOwnProperty("is_members_set_the_requirements")){

                    if(data.is_position_fill)

                        jQuery(".scoa-requirements #positions").attr("checked",true);

                    if(data.is_cover_photo_set)

                        jQuery(".scoa-requirements #cover").attr("checked",true);

                    if(data.is_members_set_the_requirements)

                        jQuery(".scoa-requirements #members").attr("checked",true);


                    checkbox.iCheck({
                        checkboxClass: 'icheckbox_square-green',
                        radioClass: 'iradio_square-green',
                        disabledClass: "scoa-disabled-checkbox"
                    });


                    $(".scoa-requirements").toggleClass("sk-loading")

                }


            });


            jQuery._scoa();


            {/literal}

            const dash = window.dash("{$user_club.url}","{$user_club.member_code}");
            {*window.reminders("{$user_club.url}");*}

            const reminder = window.reminders({
                url : "{$user_club.url}",
                set : "remindByURL",
                by : "ofUser"
            });



            dash.approved_checklist.main("#submission");

            {literal}


        })

    </script>


{/literal}

{/block}

