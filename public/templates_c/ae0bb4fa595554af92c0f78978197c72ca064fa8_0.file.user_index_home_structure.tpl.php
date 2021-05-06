<?php
/* Smarty version 3.1.33, created on 2021-05-06 06:25:08
  from 'C:\xampp\htdocs\scoa\public\included_template\user\user_index_home_structure.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60936fa489b8a5_71820627',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae0bb4fa595554af92c0f78978197c72ca064fa8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\scoa\\public\\included_template\\user\\user_index_home_structure.tpl',
      1 => 1553486241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60936fa489b8a5_71820627 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_89781172360936fa4897509_93723598', 'body');
?>





<?php }
/* {block 'before_content'} */
class Block_34546214360936fa48981b2_38630348 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'before_content'} */
/* {block 'content'} */
class Block_199770961460936fa4898d00_44698812 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'content'} */
/* {block 'info'} */
class Block_71384508360936fa4899928_79005520 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_right_div.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
/* {/block 'info'} */
/* {block 'body'} */
class Block_89781172360936fa4897509_93723598 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_89781172360936fa4897509_93723598',
  ),
  'before_content' => 
  array (
    0 => 'Block_34546214360936fa48981b2_38630348',
  ),
  'content' => 
  array (
    0 => 'Block_199770961460936fa4898d00_44698812',
  ),
  'info' => 
  array (
    0 => 'Block_71384508360936fa4899928_79005520',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <div class="row"><div class="col-md-8"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_34546214360936fa48981b2_38630348', 'before_content', $this->tplIndex);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_199770961460936fa4898d00_44698812', 'content', $this->tplIndex);
?>
</div><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_71384508360936fa4899928_79005520', 'info', $this->tplIndex);
?>
</div>




<?php
}
}
/* {/block 'body'} */
}
