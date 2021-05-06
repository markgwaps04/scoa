<?php
/* Smarty version 3.1.33, created on 2019-05-12 19:34:32
  from 'C:\laragon\www\SCOA\app\views\Users\home\join_org.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd804c8771156_99517147',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c054dc450830504518f1763ba7b594a0c6080374' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\app\\views\\Users\\home\\join_org.tpl',
      1 => 1548833463,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd804c8771156_99517147 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9075187875cd804c8676239_24408970', 'title');
?>


<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_join_org.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_structure.tpl");
}
/* {block 'title'} */
class Block_9075187875cd804c8676239_24408970 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_9075187875cd804c8676239_24408970',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | JOIN <?php
}
}
/* {/block 'title'} */
}
