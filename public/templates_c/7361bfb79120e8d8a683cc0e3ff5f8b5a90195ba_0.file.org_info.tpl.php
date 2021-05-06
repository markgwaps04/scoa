<?php
/* Smarty version 3.1.33, created on 2019-05-11 22:39:53
  from 'C:\laragon\www\SCOA\app\views\Users\home\org_info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd6deb9836578_46803060',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7361bfb79120e8d8a683cc0e3ff5f8b5a90195ba' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\app\\views\\Users\\home\\org_info.tpl',
      1 => 1554825541,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd6deb9836578_46803060 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6722906125cd6deb982c980_08845827', 'title');
?>




<?php if ($_smarty_tpl->tpl_vars['user_club']->value['isCurrentUserApproved'] && !$_smarty_tpl->tpl_vars['user_club']->value['isRenewalApproved']) {?>


    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_org_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


<?php } else { ?>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\misc\club_dashboard.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php }?>




<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_structure.tpl");
}
/* {block 'title'} */
class Block_6722906125cd6deb982c980_08845827 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_6722906125cd6deb982c980_08845827',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | INFO<?php
}
}
/* {/block 'title'} */
}
