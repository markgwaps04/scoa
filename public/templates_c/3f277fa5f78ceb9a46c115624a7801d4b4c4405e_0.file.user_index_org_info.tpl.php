<?php
/* Smarty version 3.1.33, created on 2019-04-24 16:57:32
  from 'C:\wamp64\www\SCOA\public\included_template\user\user_index_org_info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cc024fc821c05_55678212',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3f277fa5f78ceb9a46c115624a7801d4b4c4405e' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\user\\user_index_org_info.tpl',
      1 => 1549306125,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cc024fc821c05_55678212 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'message' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\3f277fa5f78ceb9a46c115624a7801d4b4c4405e_0.file.user_index_org_info.tpl.php',
    'uid' => '3f277fa5f78ceb9a46c115624a7801d4b4c4405e',
    'call_name' => 'smarty_template_function_message_2881636975cc024fc785f52_04707128',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>












<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\misc\org_info_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>



<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_home_structure.tpl");
}
/* smarty_template_function_message_2881636975cc024fc785f52_04707128 */
if (!function_exists('smarty_template_function_message_2881636975cc024fc785f52_04707128')) {
function smarty_template_function_message_2881636975cc024fc785f52_04707128(Smarty_Internal_Template $_smarty_tpl,$params) {
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
                <a class="alert-link" href="#">Request sent</a>, your organization is not been approved.
            </div>

        </div>

    <?php }?>



<?php
}}
/*/ smarty_template_function_message_2881636975cc024fc785f52_04707128 */
}
