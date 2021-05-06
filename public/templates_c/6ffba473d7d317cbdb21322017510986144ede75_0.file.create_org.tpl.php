<?php
/* Smarty version 3.1.33, created on 2019-04-20 23:52:40
  from 'C:\wamp64\www\SCOA\app\views\Users\home\create_org.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cbb4048243391_67918344',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ffba473d7d317cbdb21322017510986144ede75' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\app\\views\\Users\\home\\create_org.tpl',
      1 => 1550922541,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cbb4048243391_67918344 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'create' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\6ffba473d7d317cbdb21322017510986144ede75_0.file.create_org.tpl.php',
    'uid' => '6ffba473d7d317cbdb21322017510986144ede75',
    'call_name' => 'smarty_template_function_create_11202756405cbb4048121459_19939930',
  ),
  'account' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\6ffba473d7d317cbdb21322017510986144ede75_0.file.create_org.tpl.php',
    'uid' => '6ffba473d7d317cbdb21322017510986144ede75',
    'call_name' => 'smarty_template_function_account_11202756405cbb4048121459_19939930',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>





<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4675433535cbb40481f7ae2_28441373', 'title');
?>


































<?php if ($_smarty_tpl->tpl_vars['user']->value->required()) {?>

    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'create', array(), true);?>


<?php } else { ?>

    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'account', array(), true);?>


<?php }?>







<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_structure.tpl");
}
/* {block 'title'} */
class Block_4675433535cbb40481f7ae2_28441373 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_4675433535cbb40481f7ae2_28441373',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | MyOrg <?php
}
}
/* {/block 'title'} */
/* smarty_template_function_create_11202756405cbb4048121459_19939930 */
if (!function_exists('smarty_template_function_create_11202756405cbb4048121459_19939930')) {
function smarty_template_function_create_11202756405cbb4048121459_19939930(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_create_org.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php
}}
/*/ smarty_template_function_create_11202756405cbb4048121459_19939930 */
/* smarty_template_function_account_11202756405cbb4048121459_19939930 */
if (!function_exists('smarty_template_function_account_11202756405cbb4048121459_19939930')) {
function smarty_template_function_account_11202756405cbb4048121459_19939930(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>



    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_account.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php
}}
/*/ smarty_template_function_account_11202756405cbb4048121459_19939930 */
}
