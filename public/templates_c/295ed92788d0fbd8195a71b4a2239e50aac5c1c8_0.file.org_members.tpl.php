<?php
/* Smarty version 3.1.33, created on 2019-04-27 17:39:30
  from 'C:\wamp64\www\SCOA\app\views\Users\home\org_members.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cc423522d4339_82918965',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '295ed92788d0fbd8195a71b4a2239e50aac5c1c8' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\app\\views\\Users\\home\\org_members.tpl',
      1 => 1549057999,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cc423522d4339_82918965 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11479240095cc4235213acd7_03882057', 'title');
?>



<?php if ($_smarty_tpl->tpl_vars['user_club']->value['isCurrentUserApproved']) {?>


    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_org_members_structure.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


<?php } else { ?>


    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\Error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


<?php }
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_structure.tpl");
}
/* {block 'title'} */
class Block_11479240095cc4235213acd7_03882057 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_11479240095cc4235213acd7_03882057',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | MEMBERS <?php
}
}
/* {/block 'title'} */
}
