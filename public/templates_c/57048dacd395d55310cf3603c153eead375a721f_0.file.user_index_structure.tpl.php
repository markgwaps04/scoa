<?php
/* Smarty version 3.1.33, created on 2019-04-17 15:28:18
  from 'C:\wamp64\www\SCOA\public\included_template\user\user_index_structure.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb6d59290ef71_62414527',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '57048dacd395d55310cf3603c153eead375a721f' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\user\\user_index_structure.tpl',
      1 => 1555121356,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb6d59290ef71_62414527 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'user_profile' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\57048dacd395d55310cf3603c153eead375a721f_0.file.user_index_structure.tpl.php',
    'uid' => '57048dacd395d55310cf3603c153eead375a721f',
    'call_name' => 'smarty_template_function_user_profile_4596221225cb6d592464288_24039186',
  ),
));
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\Misc\\feeds_contents_plugin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 32, true);
?>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\global_functions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 32, true);
?>


<?php $_smarty_tpl->_assignInScope('pin', mt_rand(0,1000));?>





<html><head><title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11349451245cb6d59267f6f8_74933538', 'title');
?>
</title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1195370805cb6d59268f142_43608435', 'upper_head');
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15658263935cb6d5926b7543_22409818', 'head');
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20651786685cb6d5928b7681_72315729', 'body');
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5432008365cb6d5928f7964_74758792', 'plugin_script');
echo '<script'; ?>
>$('input[type=checkbox]:not(.scoa)').iCheck({checkboxClass: 'icheckbox_square-green',radioClass: 'iradio_square-green'});$(document).ready(function(){$('a[href="'+window.location.hash+'"]').tab('show');$('.scoa-img-responsive img').responsify();jQuery.scoa.images.load();$('[data-toggle="tooltip"]').tooltip();<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12982651895cb6d5928fdcb3_48062589', 'innerscript');
?>
/** jQuery._scoa(); **/})


<?php echo '</script'; ?>
>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13438667945cb6d592908881_01168730', 'script');
?>



</body>

</html>
<?php }
/* smarty_template_function_user_profile_4596221225cb6d592464288_24039186 */
if (!function_exists('smarty_template_function_user_profile_4596221225cb6d592464288_24039186')) {
function smarty_template_function_user_profile_4596221225cb6d592464288_24039186(Smarty_Internal_Template $_smarty_tpl,$params) {
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
/*/ smarty_template_function_user_profile_4596221225cb6d592464288_24039186 */
/* {block 'title'} */
class Block_11349451245cb6d59267f6f8_74933538 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_11349451245cb6d59267f6f8_74933538',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'title'} */
/* {block 'upper_head'} */
class Block_1195370805cb6d59268f142_43608435 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'upper_head' => 
  array (
    0 => 'Block_1195370805cb6d59268f142_43608435',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'upper_head'} */
/* {block 'head'} */
class Block_15658263935cb6d5926b7543_22409818 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_15658263935cb6d5926b7543_22409818',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'head'} */
/* {block 'info'} */
class Block_12754125275cb6d5928ba710_96107152 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'info'} */
/* {block 'body'} */
class Block_20651786685cb6d5928b7681_72315729 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_20651786685cb6d5928b7681_72315729',
  ),
  'info' => 
  array (
    0 => 'Block_12754125275cb6d5928ba710_96107152',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12754125275cb6d5928ba710_96107152', 'info', $this->tplIndex);
?>
  <?php
}
}
/* {/block 'body'} */
/* {block 'plugin_script'} */
class Block_5432008365cb6d5928f7964_74758792 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'plugin_script' => 
  array (
    0 => 'Block_5432008365cb6d5928f7964_74758792',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'plugin_script'} */
/* {block 'innerscript'} */
class Block_12982651895cb6d5928fdcb3_48062589 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'innerscript' => 
  array (
    0 => 'Block_12982651895cb6d5928fdcb3_48062589',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'innerscript'} */
/* {block 'script'} */
class Block_13438667945cb6d592908881_01168730 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_13438667945cb6d592908881_01168730',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'script'} */
}
