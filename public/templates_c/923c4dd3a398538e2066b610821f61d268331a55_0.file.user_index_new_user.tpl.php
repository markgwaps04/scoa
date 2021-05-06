<?php
/* Smarty version 3.1.33, created on 2019-04-28 20:19:28
  from 'C:\wamp64\www\SCOA\public\included_template\user\user_index_new_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cc59a50abc891_03122111',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '923c4dd3a398538e2066b610821f61d268331a55' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\user\\user_index_new_user.tpl',
      1 => 1553534304,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cc59a50abc891_03122111 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="alert alert-info" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"--><i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;<a class="alert-link" href="#">Welcome to <strong>SCOA</strong> site.</a> student of university of mindanao, at this time your not yet join an any organization, in order to use the fully featured of our site as a required of every student and a user of this site please submit a request atleast one of any organization as a confirmation to our dear students, you an also sent us a request to <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
organization/create" style="text-decoration: underline">create your own organization</a> or personally talk to our staff at our office.</div><?php if ($_smarty_tpl->tpl_vars['request']->value == 1) {?><div class="alert alert-warning" style="background-color: #fdfdfde0"><i class="fa fa-exclamation-triangle animated wobble" style="font-size: 15px"></i>&nbsp;<a class="alert-link" href="#">Invalid Request.</a> code is does'nt exist or the position you selected is not available or you have nor permission to join this organization if you think this is a mistake <a href="#">Let us know</a>.</div><?php } elseif (!$_smarty_tpl->tpl_vars['user']->value->isPhoneNumberVerify()) {?><div class="alert alert-warning warning" style="background-color: #fffffe"><i class="fa fa-phone" style="font-size: 15px"></i>&nbsp;<a class="alert-link" href="#">Confirm my identity</a> adding a mobile phone number to your account, help your account secure , make easier to connect with you and makes it easier to regain access to your account if you have trouble logging in. <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
User/confirmAccount" style="text-decoration: underline">Confirm your phone number</a> you can always change your phone number anytime on your account <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
home/account" style="text-decoration: underline">Go to my account</a>.</div><?php }?>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_join_org_template.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
