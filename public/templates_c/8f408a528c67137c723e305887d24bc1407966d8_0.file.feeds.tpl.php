<?php
/* Smarty version 3.1.33, created on 2021-05-06 12:27:57
  from 'C:\xampp\htdocs\scoa\app\views\Users\home\feeds.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6093704d992318_71661560',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f408a528c67137c723e305887d24bc1407966d8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\scoa\\app\\views\\Users\\home\\feeds.tpl',
      1 => 1559215832,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6093704d992318_71661560 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'welcome' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\scoa\\public\\templates_c\\8f408a528c67137c723e305887d24bc1407966d8_0.file.feeds.tpl.php',
    'uid' => '8f408a528c67137c723e305887d24bc1407966d8',
    'call_name' => 'smarty_template_function_welcome_16203905666093704d938f64_00007559',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9555089906093704d982b56_80075896', 'title');
?>













<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'welcome', array(), true);?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_structure.tpl");
}
/* {block 'title'} */
class Block_9555089906093704d982b56_80075896 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_9555089906093704d982b56_80075896',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | FEED <?php
}
}
/* {/block 'title'} */
/* smarty_template_function_welcome_16203905666093704d938f64_00007559 */
if (!function_exists('smarty_template_function_welcome_16203905666093704d938f64_00007559')) {
function smarty_template_function_welcome_16203905666093704d938f64_00007559(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>



    <?php if (!$_smarty_tpl->tpl_vars['is_identify']->value) {?>


        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_account.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


    <?php } elseif (($_smarty_tpl->tpl_vars['user_club']->value['isRenewalApproved'] && $_smarty_tpl->tpl_vars['user_club']->value['isCurrentUserApproved'])) {?>


        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_feeds.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


    <?php } else { ?>

        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_org_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    <?php }?>


<?php
}}
/*/ smarty_template_function_welcome_16203905666093704d938f64_00007559 */
}
