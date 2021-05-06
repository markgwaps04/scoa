<?php
/* Smarty version 3.1.33, created on 2021-05-06 12:54:01
  from 'C:\xampp\htdocs\scoa\public\included_template\user\user_index_feed_structure.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_609376699c92e9_15358673',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '815b0f96ae83a9c74e951141864af77f72932f25' => 
    array (
      0 => 'C:\\xampp\\htdocs\\scoa\\public\\included_template\\user\\user_index_feed_structure.tpl',
      1 => 1522545451,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609376699c92e9_15358673 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_360303146609376699ac749_99688600', 'upper_head');
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_350566796609376699ae140_46411793', 'script');
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_767772717609376699aff10_97968798', 'body');
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_956937444609376699c7c53_22456119', 'script');
}
/* {block 'upper_head'} */
class Block_360303146609376699ac749_99688600 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'upper_head' => 
  array (
    0 => 'Block_360303146609376699ac749_99688600',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
<link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
ckin.min.css?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" media="all" rel="stylesheet" type="text/css" /><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
fileinput.min.css" media="all" rel="stylesheet" type="text/css" /><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
/component.css" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/jquery.guillotine.css" media="all" rel="stylesheet" type="text/css" /><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
modernizr.custom.js"><?php echo '</script'; ?>
><?php
}
}
/* {/block 'upper_head'} */
/* {block 'script'} */
class Block_350566796609376699ae140_46411793 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_350566796609376699ae140_46411793',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
jquery.guillotine.js" type="text/javascript"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
ckin.min.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" type="text/javascript"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
fileinput.min.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" type="text/javascript"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/blueimp/jquery.blueimp-gallery.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
scoa/scoa_fs.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/upload/jquery.form.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/validate/jquery.validate.min.js"><?php echo '</script'; ?>
><?php
}
}
/* {/block 'script'} */
/* {block 'content'} */
class Block_431487311609376699b0354_49857504 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'content'} */
/* {block 'body'} */
class Block_767772717609376699aff10_97968798 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_767772717609376699aff10_97968798',
  ),
  'content' => 
  array (
    0 => 'Block_431487311609376699b0354_49857504',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\scoa\\app\\core\\Smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),1=>array('file'=>'C:\\xampp\\htdocs\\scoa\\app\\core\\Smarty\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
?>
<div class="row"><div class="col-sm-8"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_431487311609376699b0354_49857504', 'content', $this->tplIndex);
?>
</div><div class="col-md-4"><div class="ibox float-e-margins description"><div class="ibox-title"><h5>Organization Details</h5></div><div><ul class="ibox-content no-padding border-left-right grid cs-style-3 coverphoto"><li style="list-style: none"><figure><img src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/default_image/default.png" id="coverphoto" alt="img04"><form id="form_cover_photo"><figcaption><span >Cover by Sunlee Gonzales</span><div class="btn-group"><label title="Upload image file" for="inputImage" class="btn btn-primary"><form method="post" class="form-inline" enctype="multipart/form-data"><input type="file" accept="image/*" name="file" id="inputImage" class="hide btn-xs">Edit</form></label></div></figcaption></form></figure></li></ul><div class="ibox-content profile-content"><h3><strong><a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/organization/info/<?php echo $_smarty_tpl->tpl_vars['user_club']->value['url'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['user_club']->value['name'],50,"...");?>
</a></strong></h3><form method="post" action="" ><h4><strong><?php echo $_smarty_tpl->tpl_vars['user_club']->value['member_code'];?>
</strong><form method="post" class="inline"><input type="hidden" name="url" value="<?php echo $_smarty_tpl->tpl_vars['user_club']->value['url'];?>
"><button type="submit" class="btn btn-sm small text-success margin-top-xxsm scoa_xsmall_text btn-default fa fa-repeat"></button></form></h4><form><p><i></i> <strong>Created On </strong> January 12 2019 </p><p><i class="fa fa-check-circle"></i> 3 Approval waits</p><h5>About  <a href="javascript:void 0"><i class="fa fa-pencil small text-muted scoa_small_text" data-toggle="tooltip" data-placement="right" title="edit" style="vertical-align: top !important;"></i></a></h5><p><?php echo (($tmp = @smarty_modifier_truncate($_smarty_tpl->tpl_vars['user_club']->value['details'],570,'&nbsp;<a href="#">See more...</a>'))===null||$tmp==='' ? '<a href="javascript:void 0"><i class="fa fa-pencil"></i>&nbsp; edit about</>' : $tmp);?>
</p><h5>Members</h5><p class="user-friends"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user_club']->value['members']['approved'], 'user', false, 'every');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every']->value => $_smarty_tpl->tpl_vars['user']->value) {
?><a href=""><img alt="image" data-toggle="tooltip" data-placement="auto" title="<?php echo smarty_modifier_capitalize((($_smarty_tpl->tpl_vars['user']->value['Firstname']).(" ")).($_smarty_tpl->tpl_vars['user']->value['Lastname']),true,true);?>
" class="img-circle profile" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/profile/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value['profile'])===null||$tmp==='' ? 'default/1.jpg' : $tmp);?>
"></a><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></p><div class="row m-t-lg"></div></div></div></div><div class="ibox float-e-margins"><div class="ibox-title"><h5><a href="">Upcoming Deadline of Submission</a></h5><div class="ibox-tools"><a class=""><i class="fa fa-calendar"></i></a><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></div></div><div class="ibox-content inspinia-timeline"><div class="timeline-item"><div class="row"><div class="col-xs-12 no-borders text-center"><h2>No schedules yet</h2></div></div></div></div></div></div></div><?php
}
}
/* {/block 'body'} */
/* {block 'script'} */
class Block_956937444609376699c7c53_22456119 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_956937444609376699c7c53_22456119',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>(function (__) {$('form').ajaxForm({beforeSend: function() {status.empty();var percentVal = '0%';bar.width(percentVal);percent.html(percentVal);},uploadProgress: function(event, position, total, percentComplete) {var percentVal = percentComplete + '%';bar.width(percentVal);percent.html(percentVal);},success: function() {var percentVal = '100%';bar.width(percentVal);percent.html(percentVal);},complete: function(xhr) {status.html(xhr.responseText);}});})(jQuery);<?php echo '</script'; ?>
><?php
}
}
/* {/block 'script'} */
}
