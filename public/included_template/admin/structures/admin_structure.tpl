{include "`$root`public\included_template\global_functions.tpl" scope="parent"}

{$pin = mt_rand(0,1000)}

{assign current_admin $_currentUser }


{function footer}

    <div class="footer margin-top-xxsm">
        <div>
            <strong>Copyright</strong> University of Mindanao &copy; 2019-2020
        </div>
    </div>

{/function}



<!DOCTYPE html>
<html>

<head>

    {strip}

    {block upper_head}{/block}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{block title}{/block}</title>



    <link href="{$css}ckin.min.css?{$pin}" media="all" rel="stylesheet" type="text/css" />

    <link href="{$css}bootstrap.min.css" rel="stylesheet">

    <link href="{$css}plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <link href="{$vendor}font-awesome/css/font-awesome.css" rel="stylesheet">

    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

    <link href="{$css}/scoa.css" rel="stylesheet">
    <link href="{$css}/scoa_default.css?{$pin}" rel="stylesheet">
    <link href="{$css}animate.css" rel="stylesheet">

    <link href="{$css}plugins/iCheck/custom.css" rel="stylesheet">
    <link href="{$css}font_style.css" rel="stylesheet">

    <link href="{$css}plugins/spreadsheet/jquery-confirm.css" rel="stylesheet">

    <script src="{$js}jquery-3.1.1.min.js"></script>

    <script src="{$js}plugins/spreadsheet/jquery-confirm.js"></script>



    {block head}{/block}

    <script type="text/plain" id="scoa_auth">
        {$_currentUserEncoded}
    </script>

    {/strip}


</head>

<body class="scoa-admin sk-loading">


<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">

                        <span>

                            <img alt="image" letters="{$current_admin.Firstname|substr:0:1|upper}" class="img-circle profile avatar-small" style="width: 30px;height: 30px" _src="/SCOA/public/files/profile/{$current_admin.profile}" />

                        </span>

                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <span class="clear">

                                <span class="block m-t-xs inline">

                                    <strong class="font-bold">
                                        {call user_fullname param=$current_admin assign="user_fullname"|regex_replace:"/[\r\t\n\s]/":""}

                                        {$user_fullname|default:"Admin"}

                                    </strong>

                                     <span class="text-muted text-xs block">
                                    Staff
                                </span>

                                </span>



                            </span>

                        </a>

                    </div>
                    <div class="logo-element">
                        SCOA
                    </div>
                </li>

                {include "`$root`public\included_template\admin\admin_left_div.tpl"}


            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg overflow-hidden">

        <div class="row border-bottom">
            <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">

                    <li class="dropdown">

                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                        </a>

                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        {*<img alt="image" class="img-circle" src="img/a7.jpg">*}
                                    </a>
                                    <div class="media-body">
                                        <small class="pull-right">46h ago</small>
                                        <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                        <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        {*<img alt="image" class="img-circle" src="img/a4.jpg">*}
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right text-navy">5h ago</small>
                                        <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                        <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        {*<img alt="image" class="img-circle" src="img/profile.jpg">*}
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right">23h ago</small>
                                        <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                        <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="mailbox.html">
                                        <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                    </a>
                                </div>
                            </li>
                        </ul>

                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="mailbox.html">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="profile.html">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="grid_options.html">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="notifications.html">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="{$public}/home/log_out">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="content">

            <div class="test scoa-loading-wrapper ibox-content"></div>

            {block name=body}

            {/block}

        </div>


    </div>


</div>


<div id="blueimp-gallery" class="blueimp-gallery">

    <div class="slides"></div>
    <div class="title"></div>
    <div class="prev"></div>
    <div class="next"></div>
    <div class="close"></div>
    <div class="play-pause"></div>
    <div class="indicator"></div>
</div>


<script src="{$js}bootstrap.min.js"></script>
<script src="{$js}responsify.js"></script>
<script src="{$js}plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="{$js}plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="{$js}inspinia.js"></script>
<script src="{$js}plugins/iCheck/icheck.min.js"></script>
<!--<script src="{$js}plugins/pace/pace.min.js"></script>-->
<script src="{$js}plugins/sweetalert/sweetalert.min.js"></script>
<script src="{$js}plugins/toastr/toastr.min.js"></script>
<script src="{$js}plugins/tinycon/tinycon.min.js"></script>
<script src="{$js}plugins/jexcel/numeral.min.js"></script>
<script src="{$js}scoa.js?{$pin}"></script>


{block script}{/block}

<script>

    jQuery(document).ready(function()
    {

        {*{if not $request}*}

        {*swal("Error!", "Cant accept your request", "error");*}

        {*{/if}*}

        jQuery.scoa.images.load();

        $('.scoa-img-responsive img').responsify();

        $('input[type=checkbox]:not(.scoa)').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });

        $('[data-toggle="tooltip"]').tooltip();

        jQuery._scoa();

        {block inner_script}{/block}


    })

</script>


</body>

</html>




