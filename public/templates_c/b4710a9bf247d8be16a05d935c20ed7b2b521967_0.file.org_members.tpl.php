<?php
/* Smarty version 3.1.33, created on 2019-05-14 01:17:24
  from 'C:\laragon\www\SCOA\app\views\Users\home\org_members.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd9a6a4a12512_69344221',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4710a9bf247d8be16a05d935c20ed7b2b521967' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\app\\views\\Users\\home\\org_members.tpl',
      1 => 1557113468,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd9a6a4a12512_69344221 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11810487835cd9a6a4a08e58_65933996', 'title');
?>



<?php if ($_smarty_tpl->tpl_vars['user_club']->value['isCurrentUserApproved']) {?>


    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_org_members_structure.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


<?php } else { ?>


    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\Error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


<?php }?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_structure.tpl");
}
/* {block 'title'} */
class Block_11810487835cd9a6a4a08e58_65933996 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_11810487835cd9a6a4a08e58_65933996',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | MEMBERS <?php
}
}
/* {/block 'title'} */
}
