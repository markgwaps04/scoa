<?php
/* Smarty version 3.1.33, created on 2019-05-11 21:59:40
  from 'C:\laragon\www\SCOA\app\views\admin\index\user_organizations_unrenewable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd6d54cc42462_44037935',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab7f7311dccf471796c047c22dbb18f5a1976ec3' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\app\\views\\admin\\index\\user_organizations_unrenewable.tpl',
      1 => 1549438152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd6d54cc42462_44037935 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php $_smarty_tpl->_assignInScope('renewable', array_chunk($_smarty_tpl->tpl_vars['org_model']->value->unrenewable_org_list(),3) ,true);?>

<?php $_smarty_tpl->_assignInScope('isStrict', 'true');?>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\admin_user_organizations_un_renewable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\structures\admin_structure.tpl");
}
}
