<?php
/* Smarty version 3.1.33, created on 2019-05-11 22:38:59
  from 'C:\laragon\www\SCOA\public\included_template\misc\post_box.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd6de839e20e9_86586448',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd5418c97181ab8aa5247c20dd88e1420dc0d83f' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\public\\included_template\\misc\\post_box.tpl',
      1 => 1556473703,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd6de839e20e9_86586448 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
?>


<post_box><?php if ($_smarty_tpl->tpl_vars['org']->value['isRenewalApproved'] && $_smarty_tpl->tpl_vars['org']->value['isUpdated_RCode']) {?><div class="ibox-content scoa-transparent no-borders no-margins no-padding post-box padding-bottom-xs"><div class="social-feed-separated  position-relative"><div class="social-avatar"><a href=""><img alt="image" class="profile" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/profile/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['safe_profile']->value)===null||$tmp==='' ? 'default/1.jpg' : $tmp);?>
"></a></div><div class="social-feed-box"><div class="tabs-container"><ul class="nav nav-tabs post_type"><li class="active regular_post" for="66"><a data-toggle="tab" href="#regular" aria-expanded="false" >Post</a></li><?php if ((!$_smarty_tpl->tpl_vars['user']->value->isStaff) && ($_smarty_tpl->tpl_vars['isDeadline']->value && !$_smarty_tpl->tpl_vars['isChecklistCompleted']->value)) {?><li class="checklist_post" for="77"><a data-toggle="tab" href="#checklist" aria-expanded="true">Submit a checklist</a></li><?php }?></ul><div class="tab-content"><div id="regular" class="tab-pane active" data-emojiarea data-type="unicode" data-global-picker="false"><div class="panel-body no-borders"><textarea id="input2" class="scoa-textarea" placeholder="Write something..."></textarea></div></div><?php if (!$_smarty_tpl->tpl_vars['user']->value->isStaff) {
$_smarty_tpl->_assignInScope('approvedChecklist', $_smarty_tpl->tpl_vars['checklist_class']->value->getApprovedTypeList($_smarty_tpl->tpl_vars['org']->value['RCode']));?><div id="checklist" class="tab-pane"><?php if ((!$_smarty_tpl->tpl_vars['user']->value->isStaff) && ($_smarty_tpl->tpl_vars['isDeadline']->value && !$_smarty_tpl->tpl_vars['isChecklistCompleted']->value)) {?><div class="panel-body "><textarea id="input2" class="checklist-textarea scoa-textarea" placeholder="Write something..."></textarea><div class="ibox no-padding m-t-md no-margin-bottom"><div class="ibox-content no-padding no-borders"><p class="small">Select a type of checklist to submit</p><ul class="sortable-list connectList agile-list ui-sortable" id="checklist"><?php if (!in_array("AOP",$_smarty_tpl->tpl_vars['approvedChecklist']->value)) {?><li class="ui-sortable-handle" id="AOP"><a href="javascript:void 0"><strong>Annual Operating Plan (Secure a copy from SCOA)</strong></a></li><?php }
if (!in_array("MAM",$_smarty_tpl->tpl_vars['approvedChecklist']->value)) {?><li class=" ui-sortable-handle" id="MAM"><a href="javascript:void 0"><strong>Minutes from the Activity's meeting</strong></a></li><?php }
if (!in_array("CBL",$_smarty_tpl->tpl_vars['approvedChecklist']->value)) {?><li class="ui-sortable-handle" id="CBL"><a href="javascript:void 0"><strong>CBL</strong></a></li><?php }
if (!in_array("FS",$_smarty_tpl->tpl_vars['approvedChecklist']->value)) {?><li class="ui-sortable-handle" id="FS"><a href="javascript:void 0"><strong>Financial Statements</strong></a></li><?php }
if (!in_array("DE",$_smarty_tpl->tpl_vars['approvedChecklist']->value)) {?><li class="ui-sortable-handle" id="DE"><a href="javascript:void 0"><strong>Documentary Evidence</strong></a></li><?php }?></ul></div></div></div><?php }?></div><?php }?></div><input type="file" id="scoa-file-browser" multiple name="files[]" class="hidden"/></div></div></div><div class="ibox-footer scoa-transparent no-borders"><div class="pull-right"><button onclick="document.querySelector('#scoa-file-browser').click()" type="submit" class="btn btn-default m-t-n-xs"><i class="fa fa-file"></i></button><button type="button" class="btn  btn-default m-t-n-xs"><i class="fa fa-group"></i></button><button type="button" class="btn-long-width post-button ladda-button btn btn-sm btn-primary m-t-n-xs" data-style="zoom-in"><i class="fa fa-edit"></i> <strong>POST</strong></button></div></div>



            <div class="sk-spinner sk-spinner-wave scoa-center">
                <div class="sk-rect1"></div>
                <div class="sk-rect2"></div>
                <div class="sk-rect3"></div>
                <div class="sk-rect4"></div>
                <div class="sk-rect5"></div>
            </div>


            </div><?php } elseif ($_smarty_tpl->tpl_vars['org']->value['isRenewalApproved']) {?><div class="alert alert-warning" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"--><i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;Your organization <a class="alert-link" href="#"><?php echo (($tmp = @smarty_modifier_capitalize($_smarty_tpl->tpl_vars['org']->value['name'],true,true))===null||$tmp==='' ? 'your organization' : $tmp);?>
</a> is currently disabled you can't post or submit a requirements using thisorganization , please personally talk or message us for new code</div><?php } else { ?><div class="alert alert-warning" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"--><i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;<a class="alert-link" href="#">This organization is not been approved</a></div><?php }?></post_box><?php }
}
