<?php
/* Smarty version 3.1.33, created on 2021-05-06 12:26:08
  from 'C:\xampp\htdocs\scoa\app\views\Users\home\create_org.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60936fe0416830_17280607',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec0f48ad7af7925ab904ff75624243993a40b709' => 
    array (
      0 => 'C:\\xampp\\htdocs\\scoa\\app\\views\\Users\\home\\create_org.tpl',
      1 => 1557585337,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60936fe0416830_17280607 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'create' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\scoa\\public\\templates_c\\ec0f48ad7af7925ab904ff75624243993a40b709_0.file.create_org.tpl.php',
    'uid' => 'ec0f48ad7af7925ab904ff75624243993a40b709',
    'call_name' => 'smarty_template_function_create_154981524860936fe03beb02_17371662',
  ),
  'account' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\scoa\\public\\templates_c\\ec0f48ad7af7925ab904ff75624243993a40b709_0.file.create_org.tpl.php',
    'uid' => 'ec0f48ad7af7925ab904ff75624243993a40b709',
    'call_name' => 'smarty_template_function_account_154981524860936fe03beb02_17371662',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>





<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_88849691560936fe0404a32_01149210', 'title');
?>


































<?php if ($_smarty_tpl->tpl_vars['currentUserClass']->value->isCompletedRequirements()) {?>

    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'create', array(), true);?>


<?php } else { ?>

    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'account', array(), true);?>


<?php }?>







<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_structure.tpl");
}
/* {block 'title'} */
class Block_88849691560936fe0404a32_01149210 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_88849691560936fe0404a32_01149210',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | MyOrg <?php
}
}
/* {/block 'title'} */
/* smarty_template_function_create_154981524860936fe03beb02_17371662 */
if (!function_exists('smarty_template_function_create_154981524860936fe03beb02_17371662')) {
function smarty_template_function_create_154981524860936fe03beb02_17371662(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_create_org.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php
}}
/*/ smarty_template_function_create_154981524860936fe03beb02_17371662 */
/* smarty_template_function_account_154981524860936fe03beb02_17371662 */
if (!function_exists('smarty_template_function_account_154981524860936fe03beb02_17371662')) {
function smarty_template_function_account_154981524860936fe03beb02_17371662(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>



    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_account.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php
}}
/*/ smarty_template_function_account_154981524860936fe03beb02_17371662 */
}
