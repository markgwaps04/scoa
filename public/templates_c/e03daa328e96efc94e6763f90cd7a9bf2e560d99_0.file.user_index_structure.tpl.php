<?php
/* Smarty version 3.1.33, created on 2019-05-11 22:26:40
  from 'C:\laragon\www\SCOA\public\included_template\user\user_index_structure.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd6dba0387ad9_06024297',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e03daa328e96efc94e6763f90cd7a9bf2e560d99' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\public\\included_template\\user\\user_index_structure.tpl',
      1 => 1555121356,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd6dba0387ad9_06024297 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'user_profile' => 
  array (
    'compiled_filepath' => 'C:\\laragon\\www\\SCOA\\public\\templates_c\\e03daa328e96efc94e6763f90cd7a9bf2e560d99_0.file.user_index_structure.tpl.php',
    'uid' => 'e03daa328e96efc94e6763f90cd7a9bf2e560d99',
    'call_name' => 'smarty_template_function_user_profile_17317462315cd6dba01f9747_86674928',
  ),
));
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\Misc\\feeds_contents_plugin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 32, true);
?>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\global_functions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 32, true);
?>


<?php $_smarty_tpl->_assignInScope('pin', mt_rand(0,1000));?>





<html><head><title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10114286875cd6dba02aaeb3_39461027', 'title');
?>
</title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14573408115cd6dba02ab970_16710991', 'upper_head');
?>
<link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
bootstrap.min.css" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/sweetalert/sweetalert.css" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['vendor']->value;?>
font-awesome/css/font-awesome.css" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
/scoa.css" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
/scoa_default.css?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/iCheck/custom.css" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
font_style.css" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
animate.css" rel="stylesheet"><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
jquery-2.1.1.js"><?php echo '</script'; ?>
><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/spreadsheet/jquery-confirm.css" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/spreadsheet/jquery-confirm.css" rel="stylesheet"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14056467955cd6dba02ae043_81190292', 'head');
?>
<DEFAULT><style>.scoa-nav {height: 49px;}.scoa-image-lg {width: 70px !important;height: 70px !important;}.scoa-btn-my-account {margin-top: 10px;font-size: 12px !important;}.scoa-shadow {box-shadow: 0 0 3px rgba(86, 96, 117, 0.7) !important;}@media (max-width: 767px){.navbar-nav .open .dropdown-menu{box-shadow: none !important;}}</style></DEFAULT></head><body class="top-navigation"><div id="wrapper"><div id="page-wrapper" class="gray-bg"><div class="row border-bottom white-bg"><nav class="navbar navbar-static-top" role="navigation"><div class="navbar-header"><button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button"><i class="fa fa-reorder"></i></button><a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
" class="navbar-brand">SCOA</a><ul class="nav scoa-nav navbar-top-links navbar-left"><li class="active"><a aria-expanded="false" role="button" href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
">Home</a></li><?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_notification.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></ul></div><div class="navbar-collapse collapse" id="navbar"><ul class="nav navbar-nav navbar-top-links navbar-right"><li class="dropdown active"><a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">Hi <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['_currentUser']->value['Firstname']);?>
<span class="caret"></span></a><ul role="menu" class="dropdown-menu no-borders dropdown-messages scoa-shadow"><li><div class="dropdown-messages-box"><a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/home/account" class="pull-left"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'set_profile', array('class'=>"img-circle scoa-image-lg profile img-lg",'profile'=>$_smarty_tpl->tpl_vars['_currentUser']->value['profile'],'firstname'=>$_smarty_tpl->tpl_vars['_currentUser']->value['Firstname'],'isStaff'=>$_smarty_tpl->tpl_vars['user']->value->isStaff), true);?>
</a><div class="media-body "><h4><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['_currentUser']->value['Firstname']);?>
 &nbsp;<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['_currentUser']->value['Middlename']);?>
 &nbsp;<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['_currentUser']->value['Lastname']);?>
 &nbsp;</h4><span><?php echo $_smarty_tpl->tpl_vars['_currentUser']->value['user_url'];?>
</span><p><a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/home/account" class="btn scoa-btn-my-account btn-outline btn-primary btn-xs">My Account</a></p></div></div></li></ul></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/home/log_out"><i class="fa fa-sign-out"></i> Log out</a></li></ul></div></nav></div><div class="wrapper wrapper-content"><!--    INSERT BODY      --><div id="parent_wrapper"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12178999705cd6dba0382343_82133203', 'body');
?>
</div></div><!--   FOOTER     --><div class="footer"><div class="pull-right">University of Mindanao</div><div>F<strong>Copyright</strong> SCOA 2018-2019</div></div></div><div id="blueimp-gallery" class="blueimp-gallery hidden"><div class="slides"></div><h3 class="title"></h3><a class="prev">‹</a><a class="next">›</a><a class="close">×</a><a class="play-pause"></a><ol class="indicator"></ol></div></div><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/spreadsheet/jquery-confirm.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
bootstrap.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
responsify.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/metisMenu/jquery.metisMenu.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/slimscroll/jquery.slimscroll.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
inspinia.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/iCheck/icheck.min.js"><?php echo '</script'; ?>
><!--<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/pace/pace.min.js"><?php echo '</script'; ?>
>--><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/sweetalert/sweetalert.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/toastr/toastr.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
scoa.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
/scoa/scoa-notification.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/jexcel/numeral.min.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" crossorigin="anonymous"><?php echo '</script'; ?>
><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17883298315cd6dba0385a03_27266669', 'plugin_script');
echo '<script'; ?>
>$('input[type=checkbox]:not(.scoa)').iCheck({checkboxClass: 'icheckbox_square-green',radioClass: 'iradio_square-green'});$(document).ready(function(){$('a[href="'+window.location.hash+'"]').tab('show');$('.scoa-img-responsive img').responsify();jQuery.scoa.images.load();$('[data-toggle="tooltip"]').tooltip();<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18903113335cd6dba0386492_22739846', 'innerscript');
?>
/** jQuery._scoa(); **/})


<?php echo '</script'; ?>
>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18559995055cd6dba0386de5_27768504', 'script');
?>



</body>

</html>
<?php }
/* smarty_template_function_user_profile_17317462315cd6dba01f9747_86674928 */
if (!function_exists('smarty_template_function_user_profile_17317462315cd6dba01f9747_86674928')) {
function smarty_template_function_user_profile_17317462315cd6dba01f9747_86674928(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>



    <?php if (empty($_smarty_tpl->tpl_vars['value']->value)) {?>

        <img alt="image" class="img-circle scoa-image-lg profile img-lg" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/default_image/blank1profile.jpg">


    <?php } else { ?>

        <img alt="image" class="img-circle scoa-image-lg profile img-lg" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/profile/<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
">


    <?php }?>

<?php
}}
/*/ smarty_template_function_user_profile_17317462315cd6dba01f9747_86674928 */
/* {block 'title'} */
class Block_10114286875cd6dba02aaeb3_39461027 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_10114286875cd6dba02aaeb3_39461027',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'title'} */
/* {block 'upper_head'} */
class Block_14573408115cd6dba02ab970_16710991 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'upper_head' => 
  array (
    0 => 'Block_14573408115cd6dba02ab970_16710991',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'upper_head'} */
/* {block 'head'} */
class Block_14056467955cd6dba02ae043_81190292 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_14056467955cd6dba02ae043_81190292',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'head'} */
/* {block 'info'} */
class Block_8189319075cd6dba0382906_27646641 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'info'} */
/* {block 'body'} */
class Block_12178999705cd6dba0382343_82133203 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_12178999705cd6dba0382343_82133203',
  ),
  'info' => 
  array (
    0 => 'Block_8189319075cd6dba0382906_27646641',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8189319075cd6dba0382906_27646641', 'info', $this->tplIndex);
?>
  <?php
}
}
/* {/block 'body'} */
/* {block 'plugin_script'} */
class Block_17883298315cd6dba0385a03_27266669 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'plugin_script' => 
  array (
    0 => 'Block_17883298315cd6dba0385a03_27266669',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'plugin_script'} */
/* {block 'innerscript'} */
class Block_18903113335cd6dba0386492_22739846 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'innerscript' => 
  array (
    0 => 'Block_18903113335cd6dba0386492_22739846',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'innerscript'} */
/* {block 'script'} */
class Block_18559995055cd6dba0386de5_27768504 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_18559995055cd6dba0386de5_27768504',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'script'} */
}
