<?php
/* Smarty version 3.1.33, created on 2021-05-06 06:25:08
  from 'C:\xampp\htdocs\scoa\app\views\Users\home\confirm_account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60936fa46a1855_94668272',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff25f77b51a8244f99cca237843e880a7efdce53' => 
    array (
      0 => 'C:\\xampp\\htdocs\\scoa\\app\\views\\Users\\home\\confirm_account.tpl',
      1 => 1558004586,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60936fa46a1855_94668272 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'welcome' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\scoa\\public\\templates_c\\ff25f77b51a8244f99cca237843e880a7efdce53_0.file.confirm_account.tpl.php',
    'uid' => 'ff25f77b51a8244f99cca237843e880a7efdce53',
    'call_name' => 'smarty_template_function_welcome_46809357960936fa4638529_47895950',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_209850910460936fa4691b95_05282893', 'title');
?>





















<SCOA_BODY>


    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'welcome', array(), true);?>




</SCOA_BODY>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_structure.tpl");
}
/* {block 'title'} */
class Block_209850910460936fa4691b95_05282893 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_209850910460936fa4691b95_05282893',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | VERIFY <?php
}
}
/* {/block 'title'} */
/* smarty_template_function_welcome_46809357960936fa4638529_47895950 */
if (!function_exists('smarty_template_function_welcome_46809357960936fa4638529_47895950')) {
function smarty_template_function_welcome_46809357960936fa4638529_47895950(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>



    <?php if (!$_smarty_tpl->tpl_vars['currentUserClass']->value->isPhoneVerify() || $_smarty_tpl->tpl_vars['request']->value == 2) {?>

        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_confirm_account.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    <?php } else { ?>

        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\Error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    <?php }?>


<?php
}}
/*/ smarty_template_function_welcome_46809357960936fa4638529_47895950 */
}
