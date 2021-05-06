<?php
/* Smarty version 3.1.33, created on 2019-04-28 14:30:50
  from 'C:\wamp64\www\SCOA\app\views\Users\home\account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cc5b91ac448b5_07895815',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '57da40cbf4ff569bf7c66c999cbbad84be9a893c' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\app\\views\\Users\\home\\account.tpl',
      1 => 1548833463,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cc5b91ac448b5_07895815 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3471087275cc5b91ac174e2_69936679', 'title');
?>







<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_account.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_structure.tpl");
}
/* {block 'title'} */
class Block_3471087275cc5b91ac174e2_69936679 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_3471087275cc5b91ac174e2_69936679',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | Home<?php
}
}
/* {/block 'title'} */
}
