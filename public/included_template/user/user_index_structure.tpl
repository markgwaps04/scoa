
{include "`$root`public\included_template\Misc\\feeds_contents_plugin.tpl" scope="global"}

{include "`$root`public\included_template\global_functions.tpl" scope="global"}


{$pin = mt_rand(0,1000)}


{*<!-- @param value -->*}
{function user_profile}


    {if empty($value)}

        <img alt="image" class="img-circle scoa-image-lg profile img-lg" src="{$public}/files/default_image/blank1profile.jpg">


    {else}

        <img alt="image" class="img-circle scoa-image-lg profile img-lg" src="{$public}/files/profile/{$value}">


    {/if}

{/function}


{strip}


<html>


<head>

     <title>{block name=title}{/block}</title>


    {block upper_head}{/block}


    <link href="{$css}bootstrap.min.css" rel="stylesheet">

    <link href="{$css}plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <link href="{$vendor}font-awesome/css/font-awesome.css" rel="stylesheet">

    {*<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>*}

    <link href="{$css}/scoa.css" rel="stylesheet">
    <link href="{$css}/scoa_default.css?{$pin}" rel="stylesheet">

    <link href="{$css}plugins/iCheck/custom.css" rel="stylesheet">
    <link href="{$css}font_style.css" rel="stylesheet">
    <link href="{$css}animate.css" rel="stylesheet">

    <script src="{$js}jquery-2.1.1.js"></script>

    <link href="{$css}plugins/spreadsheet/jquery-confirm.css" rel="stylesheet">
    <link href="{$css}plugins/spreadsheet/jquery-confirm.css" rel="stylesheet">




    {block head} {/block}

    <DEFAULT>

        <style>

            .scoa-nav {

                height: 49px;

            }
            .scoa-image-lg {

                width: 70px !important;
                height: 70px !important;

            }
            .scoa-btn-my-account {

                margin-top: 10px;
                font-size: 12px !important;

            }
            .scoa-shadow {
                box-shadow: 0 0 3px rgba(86, 96, 117, 0.7) !important;
            }

            @media (max-width: 767px){

                .navbar-nav .open .dropdown-menu{
                    box-shadow: none !important;
                }

            }

        </style>

    </DEFAULT>


</head>



<body class="top-navigation">


<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">

        <div class="row border-bottom white-bg">


            <nav class="navbar navbar-static-top" role="navigation">

                <div class="navbar-header">

                    <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <i class="fa fa-reorder"></i>
                    </button>

                    <a href="{$public}" class="navbar-brand">SCOA</a>

                    <ul class="nav scoa-nav navbar-top-links navbar-left">

                        <li class="active">
                            <a aria-expanded="false" role="button" href="{$public}">Home</a>
                        </li>

                            {include "`$root`public\included_template\user\user_notification.tpl"}

                    </ul>

                </div>


                <div class="navbar-collapse collapse" id="navbar">

                    <ul class="nav navbar-nav navbar-top-links navbar-right">

                        <li class="dropdown active">
                            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">


                                Hi {$_currentUser.Firstname|capitalize}

                                <span class="caret"></span>
                            </a>

                            <ul role="menu" class="dropdown-menu no-borders dropdown-messages scoa-shadow">
                               <li>

                                   <div class="dropdown-messages-box">
                                       <a href="{$public}/home/account" class="pull-left">

                                           {call set_profile class="img-circle scoa-image-lg profile img-lg" profile=$_currentUser.profile firstname=$_currentUser.Firstname isStaff=$user->isStaff}

                                       </a>
                                       <div class="media-body ">
                                           <h4>

                                               {$_currentUser.Firstname|capitalize} &nbsp;
                                               {$_currentUser.Middlename|capitalize} &nbsp;
                                               {$_currentUser.Lastname|capitalize} &nbsp;

                                           </h4>
                                           <span>

                                               {$_currentUser.user_url}

                                           </span>

                                           <p>
                                               <a href="{$public}/home/account" class="btn scoa-btn-my-account btn-outline btn-primary btn-xs">My Account</a>
                                           </p>

                                       </div>
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



                </div>
            </nav>
        </div>



        <div class="wrapper wrapper-content">

            <!--    INSERT BODY      -->

            <div id="parent_wrapper">

                {block name=body} {block name=info}{/block}  {/block}

            </div>



        </div>



        <!--   FOOTER     -->


        <div class="footer">
            <div class="pull-right">
                University of Mindanao
            </div>
            <div>F
                <strong>Copyright</strong> SCOA 2018-2019
            </div>
        </div>



    </div>

    <div id="blueimp-gallery" class="blueimp-gallery hidden">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>


</div>


<script src="{$js}plugins/spreadsheet/jquery-confirm.js"></script>

<script src="{$js}bootstrap.min.js"></script>
<script src="{$js}responsify.js"></script>
<script src="{$js}plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="{$js}plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="{$js}inspinia.js"></script>
<script src="{$js}plugins/iCheck/icheck.min.js"></script>

<!--<script src="{$js}plugins/pace/pace.min.js"></script>-->

<script src="{$js}plugins/sweetalert/sweetalert.min.js"></script>
<script src="{$js}plugins/toastr/toastr.min.js"></script>
<script src="{$js}scoa.js?{$pin}"></script>
<script src="{$js}/scoa/scoa-notification.js?{$pin}"></script>
<script src="{$js}plugins/jexcel/numeral.min.js?{$pin}" crossorigin="anonymous"></script>



{block plugin_script}{/block}

<script>



 $('input[type=checkbox]:not(.scoa)').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });


 $(document).ready(function()
 {

     $('a[href="'+window.location.hash+'"]').tab('show');

     $('.scoa-img-responsive img').responsify();

     jQuery.scoa.images.load();

     $('[data-toggle="tooltip"]').tooltip();

     {block innerscript}{/block}




     /** jQuery._scoa(); **/


 })


 {/strip}


</script>


{block name=script}{/block}


</body>

</html>
