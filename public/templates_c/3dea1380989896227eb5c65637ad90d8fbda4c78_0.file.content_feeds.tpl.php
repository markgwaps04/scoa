<?php
/* Smarty version 3.1.33, created on 2019-05-30 19:36:06
  from 'C:\laragon\www\SCOA\public\included_template\misc\content_feeds.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cefc026bd3ad6_32363364',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3dea1380989896227eb5c65637ad90d8fbda4c78' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\public\\included_template\\misc\\content_feeds.tpl',
      1 => 1559216162,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cefc026bd3ad6_32363364 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
?>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\global_functions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 32, true);
?>


<?php $_smarty_tpl->_assignInScope('approvedChecklist', $_smarty_tpl->tpl_vars['checklist_class']->value->getApprovedTypeList($_smarty_tpl->tpl_vars['org']->value['RCode']));
$_smarty_tpl->_assignInScope('isChecklistCompleted', (count($_smarty_tpl->tpl_vars['approvedChecklist']->value) >= 5));
$_smarty_tpl->_assignInScope('batchDetails', $_smarty_tpl->tpl_vars['checklist_class']->value->getBatchDetails());
$_smarty_tpl->_assignInScope('isDeadline', $_smarty_tpl->tpl_vars['checklist_class']->value->isDeadline());
$_smarty_tpl->_assignInScope('numTemp', (($tmp = @$_smarty_tpl->tpl_vars['org']->value['attempt_to_change_numbers'])===null||$tmp==='' ? 0 : $tmp));
$_smarty_tpl->_assignInScope('minTemLeft', 100);?><div class="row  m-t / m-t-(xs,sm,md,lg,xl) "><div class="col-sm-12"><?php $_smarty_tpl->_assignInScope('current_position', $_smarty_tpl->tpl_vars['_membership']->value->getCurrentUserPosition());
$_smarty_tpl->_assignInScope('is_position_fill', $_smarty_tpl->tpl_vars['_membership']->value->is_position_fill());
if (!$_smarty_tpl->tpl_vars['user']->value->isStaff) {
if (($_smarty_tpl->tpl_vars['org']->value['isUpdated_RCode'] && $_smarty_tpl->tpl_vars['isChecklistCompleted']->value)) {?><div class="alert alert-info background-white-blue"> <!--style="background-color: #fdfdfde0"--><i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;<a class="alert-link" href="#">As of <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['batchDetails']->value['date_time'],"F Y");
$_smarty_tpl->_assignInScope('deadline', smarty_modifier_date_format($_smarty_tpl->tpl_vars['batchDetails']->value['deadline'],"F Y"));
if ($_smarty_tpl->tpl_vars['deadline']->value) {?>to <?php echo $_smarty_tpl->tpl_vars['deadline']->value;
}?></a>,&nbsp;this organization has completed the requirements<a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/organization/info/<?php echo $_smarty_tpl->tpl_vars['org']->value['url'];?>
" class="pull-right">View Org Info</a></div><?php } elseif (!$_smarty_tpl->tpl_vars['isDeadline']->value && !$_smarty_tpl->tpl_vars['isChecklistCompleted']->value) {?><div class="alert alert-danger background-white-blue"><i class="fa fa-warning" style="font-size: 15px"></i>&nbsp;<a class="alert-link" href="#">As of <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['batchDetails']->value['date_time'],"F Y");
$_smarty_tpl->_assignInScope('date', smarty_modifier_date_format($_smarty_tpl->tpl_vars['batchDetails']->value['deadline'],"F d Y"));
$_smarty_tpl->_assignInScope('time', smarty_modifier_date_format($_smarty_tpl->tpl_vars['batchDetails']->value['deadline'],"h:m a"));?></a>, &nbsp;this organization has completed the requirements before the deadline <?php echo $_smarty_tpl->tpl_vars['date']->value;?>
&nbsp; at <?php echo $_smarty_tpl->tpl_vars['time']->value;?>
. if you have a question <a href="javascript:void 0">Talk to us</a>.</div><?php }
if ($_smarty_tpl->tpl_vars['current_position']->value == "5" && !$_smarty_tpl->tpl_vars['is_position_fill']->value) {
if (($_smarty_tpl->tpl_vars['minTemLeft']->value-$_smarty_tpl->tpl_vars['numTemp']->value) > 0) {?><div class="alert alert-info" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"--><i class="fa fa-group" style="font-size: 15px"></i>&nbsp;<a class="alert-link" href="#">Members</a>,&nbsp; this group is need at least 4 members required<a data-toggle="modal" class="pull-right" href="#modal-form">Invite them</a></div><div id="modal-form" class="modal fade" aria-hidden="true"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-body"><div class="row"><div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Invite your co-members</h3><form method="post" role="form" class="TempPhoneTags" ><div class="form-group"><label>Current members</label><p class="user-friends"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['org']->value['members']['approved'], 'user', false, 'every');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every']->value => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->_assignInScope('name', smarty_modifier_capitalize((($_smarty_tpl->tpl_vars['user']->value['Firstname']).(" ")).($_smarty_tpl->tpl_vars['user']->value['Lastname']),true,true));
ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'position', array('param'=>$_smarty_tpl->tpl_vars['user']->value['position']), true);
$_smarty_tpl->assign("position", ob_get_clean());?>
<a href=""><img alt="image" data-toggle="tooltip" data-placement="auto" title="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['position']->value;?>
" class="img-circle profile" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/profile/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value['profile'])===null||$tmp==='' ? 'default/1.jpg' : $tmp);?>
"></a><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></p></div><div class="form-group"><label>Mobile Phone numbers (ex. 912345678)</label><input name="url" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['org']->value['url'];?>
"><input name="numbers" id="PhoneNumbers" type="text" class="form-control tagsinput" value="<?php echo $_smarty_tpl->tpl_vars['org']->value['temp_numbers'];?>
"></div></form><div><button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" id="phoneTagSubmit"><strong>Submit</strong></button></div></div><div class="col-sm-6"><h3>How do I invite the members of a group to my org/dept site</h3><ul class="pull-left"><p><li>Once you create an event, you'll be set as the host. Adviser of the group will also become hosts.</li></p><p><li>Adviser's and host is allowed to invite members</li></p><p><li>If your group is smaller than 4 people, you can invite your co-memberto join to your organization/department</li></p>                                                                                        </ul></div></div></div></div></div></div><?php echo '<script'; ?>
>(function(__){$(document).ready(function() {jQuery.validator.addMethod("isPhoneNumbers",function(value,element){alert("Success");},'No special/number characters');let param = {errorClass: "help-inline invalid_message text-danger animated",errorElement: "span",errorPlacement: function(e, a) {jQuery(a).parents(".form-group").append(e)},highlight: function(e) {jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")},success: function(e) {jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()},rules :{numbers : {required : !0,isPhoneNumbers : !0},adad : {required:!0}},};__(".TempPhoneTags").validate(param);const targetField = __("#PhoneNumbers");const whenchange = function(fieldValue) {fieldValue = fieldValue.replace(/\s/gm,"");var split = fieldValue.split(",");

                               const check = split.every(function (value) {
                                   const regext = /(^9)([0-9]{9}$)/g;
                                   return regext.test(value);
                               });

                                targetField.siblings(".error").remove();switch (true) {case !fieldValue:targetField.after(['<span class="help-block m-b-none error text-danger">','This field is required.</span>'].join(""));break;case !check:targetField.after(['<span class="help-block m-b-none error text-danger">','Invalid mobile phone number(s) eg. 912345678.</span>'].join(""));break;}return check;};targetField.change(function () {whenchange(__(this).val());});__("#phoneTagSubmit").click(function () {const value = targetField.val();if(whenchange(value))__(".TempPhoneTags").submit();})});})(jQuery);<?php echo '</script'; ?>
><?php }
}
}
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\misc\post_box.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?><hr class="hr-line-solid m-b-xl"><feeds class="m-t-xl"></feeds>                                                                                                                                                                                                                                                                                                                                                                                <div class="social-feed-separated"><div class="social-feed-box"><div class="social-body"><h4 class="scoa-small-brand-name">#SCOA</h4></div></div></div></div></div><?php }
}
