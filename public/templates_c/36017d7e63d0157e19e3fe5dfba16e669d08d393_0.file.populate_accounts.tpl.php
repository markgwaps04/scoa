<?php
/* Smarty version 3.1.33, created on 2019-05-13 01:01:57
  from 'C:\laragon\www\SCOA\app\views\admin\index\misc\populate_accounts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd85185811820_58172306',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36017d7e63d0157e19e3fe5dfba16e669d08d393' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\app\\views\\admin\\index\\misc\\populate_accounts.tpl',
      1 => 1554031732,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd85185811820_58172306 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),1=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\global_functions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 32, true);
?>



<?php $_smarty_tpl->_assignInScope('accounts', array_chunk($_smarty_tpl->tpl_vars['accounts']->value,3) ,true);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['accounts']->value, 'row', false, 'every');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every']->value => $_smarty_tpl->tpl_vars['row']->value) {
?><div class="row"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['row']->value, 'user_details', false, 'every_col');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every_col']->value => $_smarty_tpl->tpl_vars['user_details']->value) {
?><div class="col-lg-4"><?php if ($_smarty_tpl->tpl_vars['_currentUser']->value['Path'] || $_smarty_tpl->tpl_vars['_currentUser']->value['user_url'] == $_smarty_tpl->tpl_vars['user_details']->value['user_url']) {?><a class="close"><i class="fa fa-times-circle side"></i></a><?php }?><div class="contact-box"><a href="/SCOA/public/scoa_account/profile/<?php echo $_smarty_tpl->tpl_vars['user_details']->value['id'];?>
"><div class="col-sm-4"><div class="text-center"><img alt="image" class="profile animated-background facebook loading-avatar-feed scoa-avatar contacts-profile img-circle m-t-xs img-responsive" _src="/SCOA/public/files/profile/<?php echo $_smarty_tpl->tpl_vars['user_details']->value['profile'];?>
" letters="<?php echo $_smarty_tpl->tpl_vars['user_details']->value['Firstname'];?>
"></div></div><?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>$_smarty_tpl->tpl_vars['user_details']->value,'withoutTag'=>true), true);
$_smarty_tpl->assign("user_name", ob_get_clean());?>
<div class="col-sm-8"><h4><?php echo smarty_modifier_truncate(trim(preg_replace("/\s+/"," ",$_smarty_tpl->tpl_vars['user_name']->value)),20,"...");?>
</h4><p><i class="fa fa-phone-square"></i>&nbsp; <?php echo $_smarty_tpl->tpl_vars['user_details']->value['CP'];?>
 </p><address><p>Date added on <strong><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user_details']->value['DT'],"%b %e, %Y");?>
</strong></p><?php if ($_smarty_tpl->tpl_vars['user_details']->value['createBy']) {
$_smarty_tpl->_assignInScope('addedBy', $_smarty_tpl->tpl_vars['user']->value->user_details($_smarty_tpl->tpl_vars['user_details']->value['createBy']) ,true);
if ($_smarty_tpl->tpl_vars['addedBy']->value) {
ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>$_smarty_tpl->tpl_vars['addedBy']->value,'withoutTag'=>true), true);
$_smarty_tpl->assign("byUser", ob_get_clean());?>
<p>Added by : <?php echo smarty_modifier_truncate(trim(preg_replace("/\s+/"," ",$_smarty_tpl->tpl_vars['byUser']->value)),20,"...");?>
</p><?php }
}?></address></div><div class="clearfix"></div></a></div></div><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php }
}
