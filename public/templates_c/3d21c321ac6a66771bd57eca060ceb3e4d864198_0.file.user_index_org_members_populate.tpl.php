<?php
/* Smarty version 3.1.33, created on 2019-05-06 11:22:55
  from 'C:\wamp64\www\SCOA\public\included_template\user\user_index_org_members_populate.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ccfa88f117b52_22094814',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d21c321ac6a66771bd57eca060ceb3e4d864198' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\user\\user_index_org_members_populate.tpl',
      1 => 1557112973,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ccfa88f117b52_22094814 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\Misc\\feeds_contents_plugin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 32, true);
?>



<REQUEST>




    <?php $_smarty_tpl->_assignInScope('unapprovedMembers', $_smarty_tpl->tpl_vars['user_club']->value['members']['unapproved']);?>

    <div class="ibox float-e-margins scoa-transparent no-margins">

        <div class="ibox-title no-borders scoa-transparent">

            <h5><i class="text-success fa fa-send"></i> &nbsp Request</h5>
            <div class="ibox-tools">

                <a class="collapse-link pull-right">
                    <i class="fa fa-chevron-up"></i>
                </a>

                <?php if ($_smarty_tpl->tpl_vars['unapprovedMembers']->value) {?>

                <span class="label label-primary pull-right"><?php echo count($_smarty_tpl->tpl_vars['unapprovedMembers']->value);?>
</span>


                <?php }?>

            </div>

        </div>

        <div class="ibox-content no-padding inspinia-timeline scoa-transparent scoa-social-feed">



            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['unapprovedMembers']->value, 'a_user', false, 'every');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every']->value => $_smarty_tpl->tpl_vars['a_user']->value) {
?>


                <?php $_smarty_tpl->_assignInScope('user_url', $_smarty_tpl->tpl_vars['a_user']->value['user_url']);?>

                <?php $_smarty_tpl->_assignInScope('__user', _User::get($_smarty_tpl->tpl_vars['user_url']->value));?>


                <div class="p-lg social-feed-separated no-margins no-padding-bottom">

                    <div class="social-avatar">
                        <a href="">



                            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'set_profile', array('profile'=>$_smarty_tpl->tpl_vars['a_user']->value['profile'],'firstname'=>$_smarty_tpl->tpl_vars['a_user']->value['Firstname'],'isStaff'=>$_smarty_tpl->tpl_vars['a_user']->value['isStaff']), true);?>



                        </a>
                    </div>


                    <div class="social-feed-box">

                        <div class="pull-right social-action dropdown">
                            <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu m-t-xs">

                                <li><a href="javascript:void 0" class="scoa_remove_member" request="<?php echo $_smarty_tpl->tpl_vars['a_user']->value['id'];?>
" state="blocked">Block</a></li>
                            </ul>
                        </div>



                        <div class="social-avatar">

                            <a href="#">
                                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>(($tmp = @$_smarty_tpl->tpl_vars['a_user']->value)===null||$tmp==='' ? 'User' : $tmp)), true);?>

                            </a>

                            is a member of

                            <strong>

                                <a href="">
                                    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['user_club']->value['name'])===null||$tmp==='' ? 'an organization' : $tmp);?>

                                </a>

                            </strong>


                            as a position as <strong><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'position', array('param'=>(($tmp = @$_smarty_tpl->tpl_vars['a_user']->value['position'])===null||$tmp==='' ? 'any Position' : $tmp)), true);?>
</strong>

                            <br>

                            <small class="text-muted"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['a_user']->value['join_date_time']), true);?>
</small>
                        </div>



                        <div class="social-body">


                            <div class="well">

                                <big>

                                    <strong>


                                        <p>
                                            <a href="">
                                                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['user_club']->value['name'])===null||$tmp==='' ? 'Your organization' : $tmp);?>

                                            </a>
                                        </p>


                                    </strong>

                                </big>

                                <p>


                                    <?php echo (($tmp = @smarty_modifier_truncate($_smarty_tpl->tpl_vars['user_club']->value['details'],570,'&nbsp;<a href="#">See more...</a>'))===null||$tmp==='' ? '<a href="javascript:void 0"><i class="fa fa-pencil"></i>&nbsp; edit about</>' : $tmp);?>



                                </p>

                                <div style="margin-top: 3%">


                                    <div class="row">

                                        <div class="col-md-8">

                                            <h4>Requirements as Member</h4>
                                            <small>The page you requested cannot be displayed right now. it may be temporarily unavailable, the link you clicked on may be broken or expired, or you may not have permission to view this page.</small>

                                        </div>

                                        <div class="col-md-4 org_choices">


                                            <div style="float:right;">

                                                <form method="post">


                                                    <input type="hidden" name="renewalID" value="<?php echo $_smarty_tpl->tpl_vars['user_club']->value['renewalId'];?>
">

                                                    <input type="hidden" name="tempath" value="<?php echo $_smarty_tpl->tpl_vars['user_club']->value['tempath'];?>
">

                                                    <input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['a_user']->value['id'];?>
">

                                                    <button data-style="zoom-in" for="1"  class="ladda-button ladda btn btn-primary btn-sm" name="state" value="approved" type="submit">

                                                        <i class="fa fa-check"></i>

                                                        <span class="bold">Approved</span>
                                                    </button>

                                                    <button data-style="zoom-in" name="state" value="unapproved" for="2" class="ladda-button ladda btn btn-warning btn-sm" type="submit" >

                                                        <i class="fa fa-close"></i>

                                                        <span class="bold">Decline</span>

                                                    </button>

                                                </form>


                                            </div>


                                        </div>


                                    </div>

                                    <ul class="todo-list m-t">




                                        <li>
                                            <input type="checkbox" value="" name=""

                                                    <?php if ($_smarty_tpl->tpl_vars['__user']->value->is_signature_set()) {?>
                                                        checked
                                                    <?php }?>

                                                   class="i-checks"/>


                                            <span class="m-l-xs">Signature</span>

                                        </li>
                                        <li>

                                            <input type="checkbox" value=""

                                                    <?php if ($_smarty_tpl->tpl_vars['__user']->value->is_profile_set()) {?>
                                                        checked
                                                    <?php }?>

                                                   name="" class="i-checks"/>


                                            <span class="m-l-xs">Upload a profile picture.</span>

                                        </li>

                                        <li>

                                            <input type="checkbox" value=""

                                                    <?php if ($_smarty_tpl->tpl_vars['__user']->value->is_phone_number_specified()) {?>
                                                        checked
                                                    <?php }?>

                                                   name="" class="i-checks"/>


                                            <span class="m-l-xs">Phone number.</span>

                                        </li>


                                    </ul>

                                </div>

                            </div>


                        </div>


                    </div>

                </div>


                <?php
}
} else {
?>

                <div class="p-xl social-feed-separated m-b-lg no-padding-bottom scoa-social-no-content">

                    <h2 class="text-center">No Request</h2>

                </div>

            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


        </div>

    </div>

</REQUEST>








<MEMBER>



    <div class="ibox float-e-margins scoa-transparent">
        <div class="ibox-title no-borders scoa-transparent">

            <h5> <i class="text-success fa fa-shield"></i> &nbsp; Current Members</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>

        </div>

        <div class="ibox-content no-padding inspinia-timeline scoa-transparent">



            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user_club']->value['members']['approved'], 'a_user', false, 'every');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every']->value => $_smarty_tpl->tpl_vars['a_user']->value) {
?>

                <?php $_smarty_tpl->_assignInScope('user_url', $_smarty_tpl->tpl_vars['a_user']->value['user_url']);?>

                <?php $_smarty_tpl->_assignInScope('__user', _User::get($_smarty_tpl->tpl_vars['user_url']->value));?>


                <div class="p-lg social-feed-separated no-margins no-padding-bottom scoa-social-feed">

                <div class="social-avatar">
                    <a href="">

                        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'set_profile', array('profile'=>$_smarty_tpl->tpl_vars['a_user']->value['profile'],'firstname'=>$_smarty_tpl->tpl_vars['a_user']->value['Firstname'],'isStaff'=>$_smarty_tpl->tpl_vars['a_user']->value['isStaff']), true);?>



                    </a>
                </div>


                <div class="social-feed-box">


                    <?php if (!$_smarty_tpl->tpl_vars['user_club']->value['isRenewalApproved']) {?>


                        <div class="pull-right social-action dropdown">


                            <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                                <i class="fa fa-angle-down"></i>
                            </button>



                            <?php if ($_smarty_tpl->tpl_vars['user_club']->value['currentUser'] != $_smarty_tpl->tpl_vars['a_user']->value['id']) {?>

                                <ul class="dropdown-menu m-t-xs">
                                    <li><a href="javascript:void 0" class="scoa_remove_member" id="<?php echo $_smarty_tpl->tpl_vars['user_club']->value['renewalId'];?>
" state="remove" request="<?php echo $_smarty_tpl->tpl_vars['a_user']->value['id'];?>
">Remove</a></li>
                                </ul>

                            <?php } else { ?>

                                <ul class="dropdown-menu m-t-xs">
                                    <li><a href="javascript:void 0" class="scoa_remove_member" id="<?php echo $_smarty_tpl->tpl_vars['user_club']->value['renewalId'];?>
" state="remove" request="<?php echo $_smarty_tpl->tpl_vars['a_user']->value['id'];?>
">Leave this organization</a></li>
                                </ul>


                            <?php }?>


                        </div>


                    <?php }?>







                    <div class="social-avatar">

                        <a href="#">
                            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>(($tmp = @$_smarty_tpl->tpl_vars['a_user']->value)===null||$tmp==='' ? 'User' : $tmp)), true);?>

                        </a>

                        is a member of

                        <strong>

                            <a href="">
                                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['user_club']->value['name'])===null||$tmp==='' ? 'an organization' : $tmp);?>

                            </a>

                        </strong>


                        as a position as <strong><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'position', array('param'=>(($tmp = @$_smarty_tpl->tpl_vars['a_user']->value['position'])===null||$tmp==='' ? 'any Position' : $tmp)), true);?>
</strong>

                        <br>

                        <small class="text-muted"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['a_user']->value['join_date_time']), true);?>
</small>
                    </div>



                    <div class="social-body">


                        <div class="well">

                            <big>

                                <strong>


                                    <p>
                                        <a href="">
                                            <?php echo (($tmp = @$_smarty_tpl->tpl_vars['user_club']->value['name'])===null||$tmp==='' ? 'Your organization' : $tmp);?>

                                        </a>
                                    </p>


                                </strong>

                            </big>

                            <p>


                                <?php echo (($tmp = @smarty_modifier_truncate($_smarty_tpl->tpl_vars['user_club']->value['details'],570,'&nbsp;<a href="#">See more...</a>'))===null||$tmp==='' ? '<a href="javascript:void 0"><i class="fa fa-pencil"></i>&nbsp; edit about</>' : $tmp);?>



                            </p>

                            <div style="margin-top: 3%">


                                <div class="row">

                                    <div class="col-md-8">

                                        <h4>Requirements as Member</h4>
                                        <small>The page you requested cannot be displayed right now. it may be temporarily unavailable, the link you clicked on may be broken or expired, or you may not have permission to view this page.</small>

                                    </div>

                                    <div class="col-sm-2 col-lg-offset-2">


                                        <div style="float:left;" class="team-members">

                                            <a href="javascript:void 0">
                                                <img alt="member" class="img-circle profile" src="">


                                        </div>


                                    </div>


                                </div>


                                <ul class="todo-list m-t">

                                    <li>


                                        <input type="checkbox" disabled value="" name=""

                                                <?php if ($_smarty_tpl->tpl_vars['__user']->value->is_signature_set()) {?>
                                                    checked
                                                <?php }?>

                                               class="i-checks"/>


                                        <span class="m-l-xs">Signature</span>

                                    </li>

                                    <li>

                                        <input type="checkbox" disabled value=""

                                                <?php if ($_smarty_tpl->tpl_vars['__user']->value->is_profile_set()) {?>
                                                    checked
                                                <?php }?>

                                               name="" class="i-checks"/>


                                        <span class="m-l-xs">Upload a profile picture.</span>

                                    </li>

                                    <li>

                                        <input type="checkbox" disabled value=""

                                                <?php if ($_smarty_tpl->tpl_vars['__user']->value->is_phone_number_specified()) {?>
                                                    checked
                                                <?php }?>

                                               name="" class="i-checks"/>


                                        <span class="m-l-xs">Phone number.</span>

                                    </li>


                                </ul>

                            </div>

                        </div>


                    </div>


                </div>

            </div>


            <?php
}
} else {
?>

                <div class="p-xl social-feed-separated m-b-lg no-padding-bottom scoa-social-no-content">

                    <h2 class="text-center">No members</h2>

                </div>

            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        </div>

    </div>



</MEMBER>


<?php }
}
