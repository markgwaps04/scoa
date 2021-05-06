<?php
/* Smarty version 3.1.33, created on 2019-04-24 16:57:32
  from 'C:\wamp64\www\SCOA\public\included_template\user\user_index_home_structure.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cc024fcd69cc4_70428015',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04ebe316a6c33dc584331602eb534e46617b1fc5' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\user\\user_index_home_structure.tpl',
      1 => 1553486241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cc024fcd69cc4_70428015 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20636352785cc024fccfecc3_21650618', 'body');
?>





<?php }
/* {block 'before_content'} */
class Block_13017216815cc024fcd052d2_03137972 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'before_content'} */
/* {block 'content'} */
class Block_6709439165cc024fcd08dd3_95866524 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'content'} */
/* {block 'info'} */
class Block_2040956015cc024fcd51343_82480855 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_right_div.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
/* {/block 'info'} */
/* {block 'body'} */
class Block_20636352785cc024fccfecc3_21650618 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_20636352785cc024fccfecc3_21650618',
  ),
  'before_content' => 
  array (
    0 => 'Block_13017216815cc024fcd052d2_03137972',
  ),
  'content' => 
  array (
    0 => 'Block_6709439165cc024fcd08dd3_95866524',
  ),
  'info' => 
  array (
    0 => 'Block_2040956015cc024fcd51343_82480855',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <div class="row"><div class="col-md-8"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13017216815cc024fcd052d2_03137972', 'before_content', $this->tplIndex);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6709439165cc024fcd08dd3_95866524', 'content', $this->tplIndex);
?>
</div><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2040956015cc024fcd51343_82480855', 'info', $this->tplIndex);
?>
</div>




<?php
}
}
/* {/block 'body'} */
}
