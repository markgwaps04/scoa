<?php
/* Smarty version 3.1.33, created on 2021-05-06 12:55:43
  from 'C:\xampp\htdocs\scoa\app\views\admin\index\user_organizations_renewable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_609376cff0e6b9_18785969',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab19e53e3719574d183dc2d6bf593e7777d9efd8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\scoa\\app\\views\\admin\\index\\user_organizations_renewable.tpl',
      1 => 1549436316,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609376cff0e6b9_18785969 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php $_smarty_tpl->_assignInScope('renewable', array_chunk($_smarty_tpl->tpl_vars['org_model']->value->renewable_org_list(),3) ,true);?>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\admin_user_organizations_renewable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\structures\admin_structure.tpl");
}
}
