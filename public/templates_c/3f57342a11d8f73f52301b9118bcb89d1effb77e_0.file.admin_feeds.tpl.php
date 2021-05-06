<?php
/* Smarty version 3.1.33, created on 2019-04-22 03:30:50
  from 'C:\wamp64\www\SCOA\public\included_template\admin\admin_feeds.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cbcc4ea086601_65266438',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3f57342a11d8f73f52301b9118bcb89d1effb77e' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\admin\\admin_feeds.tpl',
      1 => 1549559389,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cbcc4ea086601_65266438 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>






<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4077414845cbcc4ea07e3d3_93178064', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\structures\\feeds_left_structure.tpl");
}
/* {block 'content'} */
class Block_4077414845cbcc4ea07e3d3_93178064 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_4077414845cbcc4ea07e3d3_93178064',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\misc\content_feeds.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php
}
}
/* {/block 'content'} */
}
