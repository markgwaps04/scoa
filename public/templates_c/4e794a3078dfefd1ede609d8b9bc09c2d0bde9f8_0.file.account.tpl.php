<?php
/* Smarty version 3.1.33, created on 2021-05-06 09:08:07
  from 'C:\xampp\htdocs\scoa\app\views\Users\home\account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_609395d70c9a32_77400577',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e794a3078dfefd1ede609d8b9bc09c2d0bde9f8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\scoa\\app\\views\\Users\\home\\account.tpl',
      1 => 1548833463,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609395d70c9a32_77400577 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1134303557609395d701ccd5_69024469', 'title');
?>







<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_account.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_structure.tpl");
}
/* {block 'title'} */
class Block_1134303557609395d701ccd5_69024469 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1134303557609395d701ccd5_69024469',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | Home<?php
}
}
/* {/block 'title'} */
}
