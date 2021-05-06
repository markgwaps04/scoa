<?php
/* Smarty version 3.1.33, created on 2019-05-13 16:56:52
  from 'C:\laragon\www\SCOA\public\included_template\user\user_index_account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd9a1d4941830_47333187',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '267c16e64ee386f9d3629ae1ce8c0c5f4a2d13ae' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\public\\included_template\\user\\user_index_account.tpl',
      1 => 1557766612,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd9a1d4941830_47333187 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<?php $_smarty_tpl->_assignInScope('user_info', $_smarty_tpl->tpl_vars['_currentUser']->value);?><HEAD><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13332633395cd9a1d49138c5_66710163', 'head');
?>
</HEAD><SCOA_SCRIPT><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15331333195cd9a1d4918963_89390896', 'script');
?>
</SCOA_SCRIPT><?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'buttons', null, null);?><div class="form-group"><div class="col-sm-7"><button class="btn btn-sm btn-default pull-right m-xxs" type="reset"><strong>Reset</strong></button><button class="btn btn-sm btn-primary pull-right m-xxs ladda-button" type="submit" ><strong>Save</strong></button></div></div><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'details', null, null);?><!--Details--><form method="POST" action="../Users/edit_info" role="form" class="form-horizontal details"><div class="ibox float-e-margins"><div class="ibox-title"><h5><i class="fa fa-list-ol"></i>&nbsp;Your details</h5><div class="ibox-tools"><a class=""><i class="fa fa-calendar"></i></a><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></div></div><div class="ibox-content "><div class="form-group"><label class="col-sm-2 control-label">Firstname</label><div class="col-sm-5"><input type="text" name="Firstname" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['Firstname'];?>
"disabled  class="form-control input-sm"><!--                                        <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span>--></div><label class="col-sm-0 control-label"><i class="fa fa-edit small text-success edit-info"></i></label></div><div class="hr-line-dashed"></div><div class="form-group"><label class="col-sm-2 control-label">Middle name</label><div class="col-sm-5"><input type="text" name="Middlename" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['Middlename'];?>
" disabled class="form-control input-sm"><!----><!--                                        <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span>--></div><label class="col-sm-0 control-label"><i class="fa fa-edit small text-success edit-info" ></i></label></div><div class="hr-line-dashed"></div><div class="form-group"><label class="col-sm-2 control-label">Lastname</label><div class="col-sm-5"><input type="text" name="Lastname" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['Lastname'];?>
" disabled  class="form-control input-sm"><!--                                        <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span>--></div><label class="col-sm-0 control-label"><i class="fa fa-edit small text-success edit-info"></i></label></div><div class="hr-line-dashed"></div><div class="form-group"><label class="col-sm-2 control-label">Phone number</label><div class="col-sm-5"><input type="text" name="CP" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['CP'];?>
" disabled class="form-control input-sm" data-mask="(+63) 9999 999 999"><?php if (!$_smarty_tpl->tpl_vars['currentUserClass']->value->isPhoneVerify()) {?><span class="help-block m-b-none">To help us to easier to contact you <a class="text-success -underline" style="text-decoration: underline" href="#">Confirm your identity.</a></span><?php }?></div><label class="col-sm-0 control-label"><i class="fa fa-edit small text-success edit-info"></i></label></div><div class="hr-line-dashed"></div><div class="form-group"><label class="col-sm-2 control-label">Student Id no.</label><div class="col-sm-5"><input type="text" name="studID" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['studID'];?>
"  class="form-control input-sm" placeholder="eg. 012345 (Optional)"><span class="help-block m-b-none">in case of you can't remember your password or your account is temporary disabled.</span></div><label class="col-sm-0 control-label"><i class="fa fa-times-circle small text-danger"></i></label></div><div class="form-group"><label class="col-sm-2 control-label" >Email address.</label><div class="col-sm-5"><input type="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['email'];?>
"  disabled class="form-control input-sm" placeholder="scoa@gmail.com"><span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span></div><label class="col-sm-0 control-label"><i class="fa fa-edit small text-success edit-info"></i></label></div><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'buttons');?>
</div></div></form><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'signature', null, null);?><!--Signature--><div class="form-horizontal"><div class="ibox float-e-margins"><div class="ibox-title"><h5><i class="fa fa-pencil-square-o"></i>&nbsp; Signature</h5><div class="ibox-tools"><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></div></div><div class="ibox-content "><div class="form-group"><label class="col-sm-2 control-label">Change your sign</label><div class="col-sm-7 user_signature"><div id="user_signature" style="max-width: inherit"><hr style="position:relative;bottom: -113px;z-index: 5" ></div></div><div class="form-group"><div class="col-sm-7"><button class="btn btn-sm btn-default pull-right m-xxs" type="reset" onclick="$('#user_signature').jSignature('reset')"><strong>Clear</strong></button><button class="btn btn-sm btn-default pull-right m-xxs reset_sign"><strong>Reset</strong></button><button class="btn btn-sm btn-primary pull-right m-xxs" id="save_signature"><strong>Save</strong></button></div></div></div></div></div></div><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'profile_section', null, null);?><div class="form-horizontal"><div class="ibox float-e-margins"><div class="ibox-title"><h5><i class="fa fa-image"></i>&nbsp; Profile</h5><div class="ibox-tools"><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></div></div><div class="ibox-content "><div class="form-group"><label class="col-sm-2 control-label">Change your profile</label><div class="col-sm-5"><form action="#" style="border: none" method="POST" class="dropzone" id="profile_drop"><div class="fallback"><input name="file[]" type="file" /></div></form><!--                                        <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span>--></div></div></div></div></div><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'security', null, null);?><form method="get" class="form-horizontal security" ><div class="ibox float-e-margins"><div class="ibox-title"><h5><i class="fa fa-user-secret"></i>&nbsp; Security</h5><div class="ibox-tools"><a class=""><i class="fa fa-calendar"></i></a><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></div></div><div class="ibox-content "><div class="form-group"><ALERT class="security"></ALERT><label class="col-sm-2 control-label">Username</label><div class="col-sm-5"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_url'];?>
" name="user_url" disabled  class="form-control input-sm"><!--                                        <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span>--></div><label class="col-sm-0 control-label"><i class="fa fa-edit small text-success error_invalid edit-info"></i></label></div><div class="hr-line-dashed"></div><div class="form-group"><label class="col-sm-2 control-label">New password</label><div class="col-sm-5"><input name="password" disabled class="form-control input-sm"></div><label class="col-sm-0 control-label"><i class="fa fa-edit small text-success edit-info"></i></label></div><div class="form-group"><label class="col-sm-2 control-label">Old password</label><div class="col-sm-5"><input type="text" name="old_password" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['password'];?>
"  disabled value="Mark04" class="form-control input-sm"><span class="help-block m-b-none">e.g. for security concerns we crypt your password.</span></div><label class="col-sm-0 control-label"><i class="fa fa-edit small text-success edit-info"></i></label></div><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'buttons');?>
</div></div></form><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?><SCOA_BODY><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17635961355cd9a1d4931f54_26541644', 'body');
?>
</SCOA_BODY><?php }
/* {block 'head'} */
class Block_13332633395cd9a1d49138c5_66710163 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_13332633395cd9a1d49138c5_66710163',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
<link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/dropzone/basic.css" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/dropzone/dropzone.css" rel="stylesheet"><!-- Ladda style --><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/ladda/ladda-themeless.min.css" rel="stylesheet"><style>.dz-preview img {width: 100%;height: 100%}.dz-preview * {cursor: pointer !important;}.error_color{color: red;}.required {vertical-align: 5px; color: red; font-size: 19px;}.popover-inner{overflow-wrap: break-word;}.popover {width: auto;max-width: 20%;font-size: small;}.brand {position: relative;top: -2px;padding : 16px !important;}.popover * {background-color: #fcf8e3;border-color: #faebcc;color: red;}.add-on { height: auto !important; }.nav-link {font-size: 13px;}.popover-title { display: none }@media (max-width: 50rem) {.form {margin: auto;}}</style><?php
}
}
/* {/block 'head'} */
/* {block 'script'} */
class Block_15331333195cd9a1d4918963_89390896 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_15331333195cd9a1d4918963_89390896',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="/SCOA/public/js/scoa/scoa_partial.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="/SCOA/public/js/LAB.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
>const obj = {sign_base30 : "<?php echo $_smarty_tpl->tpl_vars['user_info']->value['sign_base30'];?>
",token : '<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
',profile : '<?php echo $_smarty_tpl->tpl_vars['currentUserClass']->value->getProfile();?>
'};

            (function () {


                const script = [
                    "plugins/dropzone/dropzone.js",
                    "jSignature.min.js",
                    "plugins/jasny/jasny-bootstrap.min.js",
                    "jquery.validate.min.js",
                    "scoa_validate_account.js",
                    "plugins/ladda/spin.min.js",
                    "plugins/ladda/ladda.min.js",
                    "plugins/ladda/ladda.jquery.min.js",
                    "scoa/user_index_account.js?" + obj.token
                ];



                scoa.documentReady(function () {

                    $LAB
                        .setOptions({AlwaysPreserveOrder:true})
                        .script(script.toNestedArray("/SCOA/public/js/"))
                        .wait(function(){

                            scoa.user_account(obj);

                        });

                });


            })();

            <?php echo '</script'; ?>
><?php $_smarty_tpl->assign('user_info',$_smarty_tpl->tpl_vars['_currentUser']->value);
}
}
/* {/block 'script'} */
/* {block 'info'} */
class Block_13829621755cd9a1d4936796_61228735 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_right_div.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
/* {/block 'info'} */
/* {block 'body'} */
class Block_17635961355cd9a1d4931f54_26541644 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_17635961355cd9a1d4931f54_26541644',
  ),
  'info' => 
  array (
    0 => 'Block_13829621755cd9a1d4936796_61228735',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->assign('user_info',$_smarty_tpl->tpl_vars['_currentUser']->value);?><div class="row hiddenBy"><div class="col-md-8 account"><div class="alert alert-dark" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"--><i class="fa fa-angle-left" style="font-size: 19px;vertical-align: bottom"></i>&nbsp;<a class="alert-link" href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
">Back to home </a></div><?php if (!$_smarty_tpl->tpl_vars['currentUserClass']->value->isPhoneVerify()) {?><div class="alert alert-warning warning" style="background-color: #fffffe"><i class="fa fa-phone" style="font-size: 15px"></i>&nbsp;<a class="alert-link" href="#">Confirm your identity</a> adding a mobile phone number to your account, help your account secure , make easier to connect with you and makes it easier to regain access to your account if you have trouble logging in. <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
User/confirmAccount?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" style="text-decoration: underline">Confirm your phone number</a>.</div><?php } elseif (!$_smarty_tpl->tpl_vars['is_identify']->value) {?><div class="alert alert-warning" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"--><i class="fa fa-exclamation-triangle" style="font-size: 15px"></i>&nbsp;<a href="" class="alert-link">Set your bio. </a> we required every user for this site to complete their bio to help us know you. <a href="#">Go to your Account</a></div><?php }?><div class="ibox"><div class="ibox-title"><strong><i class="fa fa-user"></i> &nbsp; Your Account</strong></div><div class="ibox-content"><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'security');
echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'profile_section');
echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'details');
echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'signature');?>
</div></div></div><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13829621755cd9a1d4936796_61228735', 'info', $this->tplIndex);
?>
</div><?php
}
}
/* {/block 'body'} */
}
