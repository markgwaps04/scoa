<?php
/* Smarty version 3.1.33, created on 2019-05-11 20:03:51
  from 'C:\laragon\www\SCOA\app\views\admin\index\welcome_page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd6ba278a4239_16296991',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '982059962473669136694b3137a2a94534cf9827' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\app\\views\\admin\\index\\welcome_page.tpl',
      1 => 1553053897,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd6ba278a4239_16296991 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\admin_index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15634951535cd6ba2789fee0_11915083', 'title');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20601044525cd6ba278a0db6_64418625', 'script');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\structures\admin_structure.tpl");
}
/* {block 'title'} */
class Block_15634951535cd6ba2789fee0_11915083 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_15634951535cd6ba2789fee0_11915083',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | HOME <?php
}
}
/* {/block 'title'} */
/* {block 'script'} */
class Block_20601044525cd6ba278a0db6_64418625 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_20601044525cd6ba278a0db6_64418625',
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
