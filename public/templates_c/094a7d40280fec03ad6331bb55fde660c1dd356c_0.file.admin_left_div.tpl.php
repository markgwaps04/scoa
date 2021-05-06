<?php
/* Smarty version 3.1.33, created on 2021-05-06 12:46:50
  from 'C:\xampp\htdocs\scoa\public\included_template\admin\admin_left_div.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_609374ba462003_90046469',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '094a7d40280fec03ad6331bb55fde660c1dd356c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\scoa\\public\\included_template\\admin\\admin_left_div.tpl',
      1 => 1556045709,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609374ba462003_90046469 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\scoa\\app\\core\\Smarty\\plugins\\modifier.replace.php','function'=>'smarty_modifier_replace',),));
$_smarty_tpl->_assignInScope('type', smarty_modifier_replace($_SERVER['QUERY_STRING'],"url=",''));?>

<li class="<?php if ($_smarty_tpl->tpl_vars['type']->value == "scoa_admin") {?>active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/scoa_admin"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a></li><li class="<?php if ($_smarty_tpl->tpl_vars['type']->value == "scoa_feeds") {?>active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/scoa_feeds"><i class="fa fa-feed"></i> <span class="nav-label">Feeds</span></a></li><li class="<?php if ($_smarty_tpl->tpl_vars['type']->value == "Inbox") {?>active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/Inbox"><i class="fa fa-envelope"></i> <span class="nav-label">Inbox</span></a></li><li class="<?php if ($_smarty_tpl->tpl_vars['type']->value == "scoa_checklist") {?>active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/scoa_checklist"><i class="fa fa-check-square"></i> <span class="nav-label">Checklist</span></a></li><?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'org_dept_section', null, null);
if ($_smarty_tpl->tpl_vars['type']->value == "scoa_organization/renewable_organizations") {?>active<?php }
if ($_smarty_tpl->tpl_vars['type']->value == "scoa_organization/un_renewable_organizations") {?>active<?php }
if ($_smarty_tpl->tpl_vars['type']->value == "scoa_organization/request") {?>active<?php }
if ($_smarty_tpl->tpl_vars['type']->value == "scoa_organization/addOrg") {?>active<?php }
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?><li class="<?php echo smarty_modifier_replace(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'org_dept_section')),' ','');?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/scoa_organization"><i class="fa fa-list-ul"></i><span class="nav-label">Org/Dept</span></a><ul class="nav nav-second-level collapse"><li><a class="links" href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/scoa_organization/addOrg">Add</a></li><li><a class="links" href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/scoa_organization/renewable_organizations">Renewable</a></li><li><a class="links" href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/scoa_organization/un_renewable_organizations">Un renew</a></li><li><a class="links" href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/scoa_organization/request">Pending<?php if (count($_smarty_tpl->tpl_vars['club']->value->unapproved_organizations())) {?><span class="valign-middle pull-right label label-info position-relative-b-n-1"><?php echo count($_smarty_tpl->tpl_vars['club']->value->unapproved_organizations());?>
</span><?php }?></a></li></ul></li><li class="<?php if ($_smarty_tpl->tpl_vars['type']->value == "contact") {?>active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/contact"><i class="fa fa-phone-square"></i> <span class="nav-label">Contacts</span></a></li><li class="<?php if ($_smarty_tpl->tpl_vars['type']->value == "scoa_account") {?>active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/scoa_account"><i class="fa fa-user-secret"></i> <span class="nav-label">Accounts</span></a></li><?php }
}
