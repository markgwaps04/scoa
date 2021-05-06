<?php
/* Smarty version 3.1.33, created on 2019-04-27 23:07:36
  from 'C:\wamp64\www\SCOA\public\included_template\user\user_activity_and_organizations.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cc47038a80a81_28752618',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'efa401c826193a11aa85dd197a9e91c1194a15a6' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\user\\user_activity_and_organizations.tpl',
      1 => 1556377653,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cc47038a80a81_28752618 (Smarty_Internal_Template $_smarty_tpl) {
?>
<style>.org_details{padding: 15px 35px 22px 38px;}.org {background-position: center;height: auto;min-height: 39%;background-origin: content-box;background-clip: content-box;background-size: cover;}.scoa-active {color: cornflowerblue !important;}</style><!--<link href="http://localhost/SCOA/public/css/bootstrap.min.css" rel="stylesheet">--><?php if (!true) {?><div class="alert alert-warning warning" style="background-color: #fffffe"><i class="fa fa-phone" style="font-size: 15px"></i>&nbsp;<a class="alert-link" href="#">Confirm Your Identity</a>, adding a mobile phone number to your account, help your account secure , make easier to connect with you and makes it easier to regain access to your account if you have trouble logging in. <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
User/confirmAccount" style="text-decoration: underline">Confirm your phone number</a> you can always change your phone number anytime <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
home/account" style="text-decoration: underline">Go to my account</a>.</div><?php }?><div class="panel blank-panel"><div class="panel-heading"><div class="panel-options"><ul class="nav nav-tabs " role="tablist"><li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">Recent Activity</a></li><li><a href="#tab2" data-toggle="tab" aria-expanded="false">My Organizations</a></li><li class="pull-right"><a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/organization/join" class="text-success scoa-active"><i class="fa fa-plus"></i> Add</a></li></ul></div></div><div class="panel-body"><div class="tab-content"><div class="tab-pane active" id="tab1"><div class="feed-activity-list feeds"><RECENT_ACTIVITY><!--<div class="text-center">--><!--<h2>No recent Activity</h2>--><!--</div>--></RECENT_ACTIVITY></div></div><div class="tab-pane fade" id="tab2"><!--    MY ORGANIZATION     --><ALL_USER_GROUPS></ALL_USER_GROUPS></div></div></div></div><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
/scoa/scoa_welcome_page.js"><?php echo '</script'; ?>
><?php }
}
