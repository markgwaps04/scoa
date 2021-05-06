<?php
/* Smarty version 3.1.33, created on 2019-05-11 14:32:47
  from 'C:\laragon\www\SCOA\public\included_template\user\user_index_confirm_account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd6dd0f1b94e6_23069809',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ed990a77b391de704c80b64256fd1a6d928d5f1' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\public\\included_template\\user\\user_index_confirm_account.tpl',
      1 => 1553587581,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd6dd0f1b94e6_23069809 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19087446405cd6dd0f1b1459_14916897', 'content');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_home_structure.tpl");
}
/* {block 'content'} */
class Block_19087446405cd6dd0f1b1459_14916897 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_19087446405cd6dd0f1b1459_14916897',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['request']->value != 2) {?><div class="col-sm-12"><div class="ibox"><div class="ibox-title"><strong>Verify your phone number</strong></div><div class="ibox-content"><div class="row"><div class="col-sm-6 "><?php if ($_smarty_tpl->tpl_vars['request']->value == 1) {?><div class="alert alert-warning warning alert-dismissable" style="background-color: #fffffe"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><i class="fa fa-times-circle" style="font-size: 15px"></i>&nbsp;<a class="alert-link" href="#">Invalid code</a> The code is invalid and not exist.</div><?php }?><h3 class="m-t-none m-b">Confirm your identity</h3><p>To finish creating an account, you need to confirm that you own the mobile phone number that you used to create the account.</p><?php if ($_smarty_tpl->tpl_vars['user']->value->hasVerificatonCode()) {?><p>Check your phone, we sent a verification code on <br><strong class="text-success"><?php echo $_smarty_tpl->tpl_vars['user']->value->getPhoneNumber();?>
</strong> </p><?php }?><form role="form" method="post"><?php if ($_smarty_tpl->tpl_vars['user']->value->hasVerificatonCode()) {?><div class="form-group"><label>Code</label><input type="text" name="code" class="form-control"></div><div><button class="btn btn-sm btn-primary m-r-xs" name="type" value="check" type="submit"><strong>Submit</strong></button><button class="btn btn-sm btn-warning " name="type" value="generate" type="submit"><strong>Generate again</strong></button></div><?php } else { ?><div><button class="btn btn-sm btn-primary" name="type" value="generate"><strong>Generate</strong></button></div><?php }?></form></div><div class="col-sm-6"><h3 class="m-t-none m-b">How do i finish creating my account and confirm my mobile number ?</h3><div class="pull-left"><ul><li>To confirm your mobile number enter the code you get via text message (SMS) in the Confirmation box</li><li>If you din't get the SMS press "Generate again"</li>.<li>Anytime, you can always check or change you phone number at your <a class="text-success" href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/home/account">Account.</a></li></ul></div><p>Confirming your mobile phone number help us know that we're sending your account info to the right place.</p><p><strong>Note : </strong>Please confirm your phone number as soon as possible. You may not be able to use your account until you confirm your phone number.</p><p>If you think there's a mistake you can message us or personally talk with us at our office.</p></div></div></div></div></div><?php } else { ?><div class="col-sm-12"><div class="ibox"><div class="ibox-content"><div class="row"><div class="col-sm-8 "><h1 class="animated slideInRight">Success</h1><p>You will be redirected to the homepage on 3s </p><p><a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/organization" class="btn btn-primary btn-sm">Go to home</a></p></div></div></div></div></div><?php echo '<script'; ?>
>(function () {setTimeout(function () {window.location = "/SCOA/public/organization";},3000);})()<?php echo '</script'; ?>
><?php }
}
}
/* {/block 'content'} */
}
