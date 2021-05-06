<?php
/* Smarty version 3.1.33, created on 2021-05-06 12:46:49
  from 'C:\xampp\htdocs\scoa\app\views\admin\index\welcome_page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_609374b9c0a4f2_54192627',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9713eb2a5187cf6d2a44716929b63f371554075e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\scoa\\app\\views\\admin\\index\\welcome_page.tpl',
      1 => 1553053897,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609374b9c0a4f2_54192627 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\admin_index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_472811073609374b9c06930_38920790', 'title');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1098325461609374b9c07676_14500763', 'script');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\structures\admin_structure.tpl");
}
/* {block 'title'} */
class Block_472811073609374b9c06930_38920790 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_472811073609374b9c06930_38920790',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | HOME <?php
}
}
/* {/block 'title'} */
/* {block 'script'} */
class Block_1098325461609374b9c07676_14500763 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_1098325461609374b9c07676_14500763',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/canvasJs/canvasjs.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/breeze/lodash.js"><?php echo '</script'; ?>
>



<?php
}
}
/* {/block 'script'} */
}
