<?php
/* Smarty version 3.1.33, created on 2019-04-28 14:32:02
  from 'C:\wamp64\www\SCOA\app\views\Users\home\feeds.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cc5b9627f2457_36447285',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69a6949a435f96274cc8eab6974e73aa5d2d9f6b' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\app\\views\\Users\\home\\feeds.tpl',
      1 => 1556461816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cc5b9627f2457_36447285 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'welcome' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\69a6949a435f96274cc8eab6974e73aa5d2d9f6b_0.file.feeds.tpl.php',
    'uid' => '69a6949a435f96274cc8eab6974e73aa5d2d9f6b',
    'call_name' => 'smarty_template_function_welcome_16342119395cc5b962506344_32889214',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13978768335cc5b962529580_96755511', 'title');
?>


















<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'welcome', array(), true);?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_structure.tpl");
}
/* {block 'title'} */
class Block_13978768335cc5b962529580_96755511 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_13978768335cc5b962529580_96755511',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | FEED <?php
}
}
/* {/block 'title'} */
/* smarty_template_function_welcome_16342119395cc5b962506344_32889214 */
if (!function_exists('smarty_template_function_welcome_16342119395cc5b962506344_32889214')) {
function smarty_template_function_welcome_16342119395cc5b962506344_32889214(Smarty_Internal_Template $_smarty_tpl,$params) {
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
/*/ smarty_template_function_welcome_16342119395cc5b962506344_32889214 */
}
