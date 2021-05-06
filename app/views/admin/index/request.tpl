{extends "`$root`public\included_template\admin\structures\admin_structure.tpl"}

{block title} SCOA | REQUEST {/block}

{block head append}

    <link href="{$css}plugins/ladda/ladda-themeless.min.css" rel="stylesheet">

    <style>

        .choices-x:first-child {

            margin-right: 3px;

        }

        .project-people img {

            width: 25px;
            height: 25px;

        }

    </style>

{/block}

{block body}

{*    {assign organizations $club->unapproved_organizations()}*}

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Pending Approvals</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{$public}/staff">Home</a>
                </li>
                <li>
                    <a href="javascript:void 0">Organizations</a>
                </li>

                <li class="active">
                    <strong>Request</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content">

        <div class="col-lg-8">

            <div class="ibox">
                <div class="ibox-content">
                    <div class="project-list">
                        <table class="table table-hover load" id="request_group">

                            <tbody>

                            {strip}

                                <tr>

                                    <td class="project-status">
                                        <small class="animated-background">SCOA SCOA </small>
                                    </td>

                                    <td class="project-files">

                                        <small class="animated-background">SCOA SCOA SCOA</small>

                                    </td>

                                    <td class="project-title">

                                        <small class="animated-background">SCOA SCOA SCOA</small>

                                        <br/>

                                        <small class="animated-background">

                                            SCOA SCOA

                                        </small>

                                    </td>

                                    <td class="project-people">

                                        <img class="animated-background img-circle">

                                    </td>

                                    <td class="project-actions">

                                        <small class="animated-background">

                                            SCOA SCOA SCOA

                                        </small>

                                    </td>

                                </tr>


                                <tr>

                                    <td class="project-status">
                                        <small class="animated-background">SCOA SCOA SCOA</small>
                                    </td>

                                    <td class="project-files">

                                        <small class="animated-background">SCOA SCOA SCOA SCOA</small>

                                    </td>

                                    <td class="project-title">

                                        <small class="animated-background">SCOA SCOA</small>

                                        <br/>

                                        <small class="animated-background">

                                            SCOA SCOA SCOA SCOA

                                        </small>

                                    </td>

                                    <td class="project-people">

                                        <img class="animated-background img-circle">

                                    </td>

                                    <td class="project-actions">

                                        <small class="animated-background">

                                            SCOA SCOA SCOA SCOA

                                        </small>

                                    </td>
                                </tr>
                                <tr>

                                    <td class="project-status">
                                        <small class="animated-background">SCOA SCOA </small>
                                    </td>

                                    <td class="project-files">

                                        <small class="animated-background">SCOA SCOA SCOA</small>

                                    </td>

                                    <td class="project-title">

                                        <small class="animated-background">SCOA SCOA SCOA</small>

                                        <br/>

                                        <small class="animated-background">

                                            SCOA SCOA

                                        </small>

                                    </td>

                                    <td class="project-people">

                                        <img class="animated-background img-circle">

                                    </td>

                                    <td class="project-actions">

                                        <small class="animated-background">

                                            SCOA SCOA SCOA

                                        </small>

                                    </td>
                                </tr>
                                <tr>

                                    <td class="project-status">
                                        <small class="animated-background">SCOA SCOA SCOA</small>
                                    </td>

                                    <td class="project-files">

                                        <small class="animated-background">SCOA SCOA SCOA SCOA</small>

                                    </td>

                                    <td class="project-title">

                                        <small class="animated-background">SCOA SCOA</small>

                                        <br/>

                                        <small class="animated-background">

                                            SCOA SCOA SCOA SCOA

                                        </small>

                                    </td>

                                    <td class="project-people">

                                        <img class="animated-background img-circle">

                                    </td>

                                    <td class="project-actions">

                                        <small class="animated-background">

                                            SCOA SCOA SCOA SCOA

                                        </small>

                                    </td>
                                </tr>

                            {/strip}

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-4">

            <div class="ibox-content" id="reminders">

                <div class="feed-activity-list load">

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

    </div>


{/block}


{block script append}

    <script src="/SCOA/public/js/scoa/scoa_partial.js"></script>

    <script src="/SCOA/public/js/LAB.js"></script>

    <script src="/SCOA/public/js/scoa/scoa_request_groups.js" type="text/javascript"></script>

{/block}