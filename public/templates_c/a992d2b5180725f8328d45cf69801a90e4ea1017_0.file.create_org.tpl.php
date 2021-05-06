<?php
/* Smarty version 3.1.33, created on 2019-05-11 22:35:41
  from 'C:\laragon\www\SCOA\app\views\Users\home\create_org.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd6ddbd058d47_59519127',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a992d2b5180725f8328d45cf69801a90e4ea1017' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\app\\views\\Users\\home\\create_org.tpl',
      1 => 1557585337,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd6ddbd058d47_59519127 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'create' => 
  array (
    'compiled_filepath' => 'C:\\laragon\\www\\SCOA\\public\\templates_c\\a992d2b5180725f8328d45cf69801a90e4ea1017_0.file.create_org.tpl.php',
    'uid' => 'a992d2b5180725f8328d45cf69801a90e4ea1017',
    'call_name' => 'smarty_template_function_create_1284166415cd6ddbd008e18_00815688',
  ),
  'account' => 
  array (
    'compiled_filepath' => 'C:\\laragon\\www\\SCOA\\public\\templates_c\\a992d2b5180725f8328d45cf69801a90e4ea1017_0.file.create_org.tpl.php',
    'uid' => 'a992d2b5180725f8328d45cf69801a90e4ea1017',
    'call_name' => 'smarty_template_function_account_1284166415cd6ddbd008e18_00815688',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>





<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18223706975cd6ddbd0490c3_06550013', 'title');
?>


































<?php if ($_smarty_tpl->tpl_vars['currentUserClass']->value->isCompletedRequirements()) {?>

    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'create', array(), true);?>


<?php } else { ?>

    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'account', array(), true);?>


<?php }?>







<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_structure.tpl");
}
/* {block 'title'} */
class Block_18223706975cd6ddbd0490c3_06550013 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_18223706975cd6ddbd0490c3_06550013',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | MyOrg <?php
}
}
/* {/block 'title'} */
/* smarty_template_function_create_1284166415cd6ddbd008e18_00815688 */
if (!function_exists('smarty_template_function_create_1284166415cd6ddbd008e18_00815688')) {
function smarty_template_function_create_1284166415cd6ddbd008e18_00815688(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_create_org.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php
}}
/*/ smarty_template_function_create_1284166415cd6ddbd008e18_00815688 */
/* smarty_template_function_account_1284166415cd6ddbd008e18_00815688 */
if (!function_exists('smarty_template_function_account_1284166415cd6ddbd008e18_00815688')) {
function smarty_template_function_account_1284166415cd6ddbd008e18_00815688(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>



    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_account.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php
}}
/*/ smarty_template_function_account_1284166415cd6ddbd008e18_00815688 */
}
