<?php
/* Smarty version 3.1.33, created on 2019-05-30 10:08:54
  from 'C:\laragon\www\SCOA\public\included_template\admin\structures\admin_structure.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cef3b36807e53_01615852',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c5d9cee6e8331543718715a996d062c488ccbca' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\public\\included_template\\admin\\structures\\admin_structure.tpl',
      1 => 1559182132,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cef3b36807e53_01615852 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'footer' => 
  array (
    'compiled_filepath' => 'C:\\laragon\\www\\SCOA\\public\\templates_c\\2c5d9cee6e8331543718715a996d062c488ccbca_0.file.admin_structure.tpl.php',
    'uid' => '2c5d9cee6e8331543718715a996d062c488ccbca',
    'call_name' => 'smarty_template_function_footer_8184260085cef3b365cbb75_48909230',
  ),
));
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.regex_replace.php','function'=>'smarty_modifier_regex_replace',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\global_functions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
?>

<?php $_smarty_tpl->_assignInScope('pin', mt_rand(0,1000));?>

<?php $_smarty_tpl->_assignInScope('current_admin', $_smarty_tpl->tpl_vars['_currentUser']->value);?>






<!DOCTYPE html>
<html>

<head>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16652721155cef3b36720d97_51394263', 'upper_head');
?>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20676548865cef3b36721df3_46419974', 'title');
?>
</title><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
ckin.min.css?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" media="all" rel="stylesheet" type="text/css" /><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
bootstrap.min.css" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/sweetalert/sweetalert.css" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['vendor']->value;?>
font-awesome/css/font-awesome.css" rel="stylesheet"><link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
/scoa.css" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
/scoa_default.css?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
animate.css" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/iCheck/custom.css" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
font_style.css" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/spreadsheet/jquery-confirm.css" rel="stylesheet"><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
jquery-3.1.1.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/spreadsheet/jquery-confirm.js"><?php echo '</script'; ?>
><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14751992135cef3b36726bd3_07674780', 'head');
echo '<script'; ?>
 type="text/plain" id="scoa_auth"><?php echo $_smarty_tpl->tpl_vars['_currentUserEncoded']->value;
echo '</script'; ?>
>


</head>

<body class="scoa-admin sk-loading">


<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">

                        <span>

                            <img alt="image" letters="<?php echo mb_strtoupper(substr($_smarty_tpl->tpl_vars['current_admin']->value['Firstname'],0,1), 'UTF-8');?>
" class="img-circle profile avatar-small" style="width: 30px;height: 30px" _src="/SCOA/public/files/profile/<?php echo $_smarty_tpl->tpl_vars['current_admin']->value['profile'];?>
" />

                        </span>

                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <span class="clear">

                                <span class="block m-t-xs inline">

                                    <strong class="font-bold">
                                        <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>$_smarty_tpl->tpl_vars['current_admin']->value), true);
$_smarty_tpl->assign(smarty_modifier_regex_replace("user_fullname","/[\r\t\n\s]/",''), ob_get_clean());?>


                                        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['user_fullname']->value)===null||$tmp==='' ? "Admin" : $tmp);?>


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

                <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\admin_left_div.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


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
                        <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/home/log_out">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="content">

            <div class="test scoa-loading-wrapper ibox-content"></div>

            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2405042905cef3b367f5774_47683951', 'body');
?>


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


<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
responsify.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/metisMenu/jquery.metisMenu.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/slimscroll/jquery.slimscroll.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
inspinia.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/iCheck/icheck.min.js"><?php echo '</script'; ?>
>
<!--<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/pace/pace.min.js"><?php echo '</script'; ?>
>-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/sweetalert/sweetalert.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/toastr/toastr.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/tinycon/tinycon.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/jexcel/numeral.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
scoa.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
"><?php echo '</script'; ?>
>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5600130395cef3b36802b74_94675925', 'script');
?>


<?php echo '<script'; ?>
>

    jQuery(document).ready(function()
    {

        
        
        
        jQuery.scoa.images.load();

        $('.scoa-img-responsive img').responsify();

        $('input[type=checkbox]:not(.scoa)').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });

        $('[data-toggle="tooltip"]').tooltip();

        jQuery._scoa();

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21187066415cef3b36806669_63662321', 'inner_script');
?>



    })

<?php echo '</script'; ?>
>


</body>

</html>




<?php }
/* smarty_template_function_footer_8184260085cef3b365cbb75_48909230 */
if (!function_exists('smarty_template_function_footer_8184260085cef3b365cbb75_48909230')) {
function smarty_template_function_footer_8184260085cef3b365cbb75_48909230(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


    <div class="footer margin-top-xxsm">
        <div>
            <strong>Copyright</strong> University of Mindanao &copy; 2019-2020
        </div>
    </div>

<?php
}}
/*/ smarty_template_function_footer_8184260085cef3b365cbb75_48909230 */
/* {block 'upper_head'} */
class Block_16652721155cef3b36720d97_51394263 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'upper_head' => 
  array (
    0 => 'Block_16652721155cef3b36720d97_51394263',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'upper_head'} */
/* {block 'title'} */
class Block_20676548865cef3b36721df3_46419974 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_20676548865cef3b36721df3_46419974',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_14751992135cef3b36726bd3_07674780 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_14751992135cef3b36726bd3_07674780',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'head'} */
/* {block 'body'} */
class Block_2405042905cef3b367f5774_47683951 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_2405042905cef3b367f5774_47683951',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


            <?php
}
}
/* {/block 'body'} */
/* {block 'script'} */
class Block_5600130395cef3b36802b74_94675925 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_5600130395cef3b36802b74_94675925',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'script'} */
/* {block 'inner_script'} */
class Block_21187066415cef3b36806669_63662321 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'inner_script' => 
  array (
    0 => 'Block_21187066415cef3b36806669_63662321',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'inner_script'} */
}
