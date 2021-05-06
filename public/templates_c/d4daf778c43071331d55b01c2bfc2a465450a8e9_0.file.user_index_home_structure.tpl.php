<?php
/* Smarty version 3.1.33, created on 2019-05-11 14:32:47
  from 'C:\laragon\www\SCOA\public\included_template\user\user_index_home_structure.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd6dd0f25ae78_15047612',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4daf778c43071331d55b01c2bfc2a465450a8e9' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\public\\included_template\\user\\user_index_home_structure.tpl',
      1 => 1553486241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd6dd0f25ae78_15047612 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11687300405cd6dd0f257c50_90049202', 'body');
?>





<?php }
/* {block 'before_content'} */
class Block_2178242755cd6dd0f258596_60422332 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'before_content'} */
/* {block 'content'} */
class Block_2471236845cd6dd0f258df3_07755006 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'content'} */
/* {block 'info'} */
class Block_19869377085cd6dd0f2596a8_09679385 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_right_div.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
/* {/block 'info'} */
/* {block 'body'} */
class Block_11687300405cd6dd0f257c50_90049202 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_11687300405cd6dd0f257c50_90049202',
  ),
  'before_content' => 
  array (
    0 => 'Block_2178242755cd6dd0f258596_60422332',
  ),
  'content' => 
  array (
    0 => 'Block_2471236845cd6dd0f258df3_07755006',
  ),
  'info' => 
  array (
    0 => 'Block_19869377085cd6dd0f2596a8_09679385',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <div class="row"><div class="col-md-8"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2178242755cd6dd0f258596_60422332', 'before_content', $this->tplIndex);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2471236845cd6dd0f258df3_07755006', 'content', $this->tplIndex);
?>
</div><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19869377085cd6dd0f2596a8_09679385', 'info', $this->tplIndex);
?>
</div>




<?php
}
}
/* {/block 'body'} */
}
