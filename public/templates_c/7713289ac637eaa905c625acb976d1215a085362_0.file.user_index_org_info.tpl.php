<?php
/* Smarty version 3.1.33, created on 2021-05-06 12:27:57
  from 'C:\xampp\htdocs\scoa\public\included_template\user\user_index_org_info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6093704da7b9f5_03593231',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7713289ac637eaa905c625acb976d1215a085362' => 
    array (
      0 => 'C:\\xampp\\htdocs\\scoa\\public\\included_template\\user\\user_index_org_info.tpl',
      1 => 1559213784,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6093704da7b9f5_03593231 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'message' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\scoa\\public\\templates_c\\7713289ac637eaa905c625acb976d1215a085362_0.file.user_index_org_info.tpl.php',
    'uid' => '7713289ac637eaa905c625acb976d1215a085362',
    'call_name' => 'smarty_template_function_message_12383878226093704da56da7_35901438',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>












<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\misc\org_info_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>



<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_home_structure.tpl");
}
/* smarty_template_function_message_12383878226093704da56da7_35901438 */
if (!function_exists('smarty_template_function_message_12383878226093704da56da7_35901438')) {
function smarty_template_function_message_12383878226093704da56da7_35901438(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>




    

    <?php if (!$_smarty_tpl->tpl_vars['user_club']->value['isCurrentUserApproved']) {?>

        <div class="row">

            <div class="alert alert-warning" style="background-color: #fdfdfde0">
                <i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;
                <a class="alert-link" href="#">Request sent to the current member of this organization</a>, your not yet been approved.
            </div>

        </div>

    <?php }?>



    

    <?php if ($_smarty_tpl->tpl_vars['user_club']->value['isCurrentUserApproved'] && !$_smarty_tpl->tpl_vars['user_club']->value['isRenewalApproved']) {?>

        <div class="row">

            <div class="alert alert-info" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->
                <i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;
                <a class="alert-link" href="#">Waiting for Approval</a>, this group is not yet been approved
                please fill the necessary details.
            </div>

        </div>

    <?php }?>



<?php
}}
/*/ smarty_template_function_message_12383878226093704da56da7_35901438 */
}
