<?php
/* Smarty version 3.1.33, created on 2019-05-14 08:41:37
  from 'C:\laragon\www\SCOA\public\included_template\admin\admin_populate_members.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cda0ec17da8f6_07389617',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e191058aa5e1fc3d03ffc7c982065cf3c26acad7' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\public\\included_template\\admin\\admin_populate_members.tpl',
      1 => 1549731448,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cda0ec17da8f6_07389617 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['org']->value['members']['approved']) {?>


    <div class="ibox float-e-margins scoa-transparent no-margins">

        <div class="ibox-title no-borders scoa-transparent">

            <h5>Current Members</h5>
            <div class="ibox-tools">

                <a class="collapse-link pull-right">
                    <i class="fa fa-chevron-up"></i>
                </a>


            </div>

        </div>

        <div class="ibox-content inspinia-timeline scoa-transparent scoa-social-feed">


            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['org']->value['members']['approved'], 'users', false, 'evey');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['evey']->value => $_smarty_tpl->tpl_vars['users']->value) {
?>



                <div class="social-feed-separated no-margins no-padding-bottom">

                    <div class="social-avatar">
                        <a href="">
                            <img alt="image" class="profile" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/profile/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['users']->value['profile'])===null||$tmp==='' ? 'default/1.jpg' : $tmp);?>
">
                        </a>
                    </div>


                    <div class="social-feed-box">


                        <?php if (!$_smarty_tpl->tpl_vars['org']->value['isRenewalApproved']) {?>


                            <form method="post">


                                <input type="hidden" name="tempath" value="<?php echo $_smarty_tpl->tpl_vars['org']->value['tempath'];?>
">
                                <input type="hidden" name="state" value="remove">
                                <input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['users']->value['id'];?>
">
                                <input type="hidden" name="renewalID" value="<?php echo $_smarty_tpl->tpl_vars['org']->value['renewalId'];?>
">


                                <div class="pull-right social-action dropdown">
                                    <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                                        <i class="fa fa-angle-down"></i>
                                    </button>


                                    <ul class="dropdown-menu m-t-xs">

                                        <li>
                                            <button type="submit" class="scoa_remove_member">remove</button>
                                        </li>


                                    </ul>


                                </div>

                            </form>


                        <?php }?>



                        <div class="social-avatar">

                            <a href="#">
                                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>(($tmp = @$_smarty_tpl->tpl_vars['users']->value)===null||$tmp==='' ? 'User' : $tmp)), true);?>

                            </a>

                            is a member of

                            <strong>

                                <a href="">
                                    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['org']->value['name'])===null||$tmp==='' ? 'an organization' : $tmp);?>

                                </a>

                            </strong>


                            as a position as <strong><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'position', array('param'=>(($tmp = @$_smarty_tpl->tpl_vars['users']->value['position'])===null||$tmp==='' ? 'any Position' : $tmp)), true);?>
</strong>

                            <br>

                            <small class="text-muted"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['users']->value['join_date_time']), true);?>
</small>
                        </div>



                        <div class="social-body">


                            <div class="well">

                                <div style="margin-top: 3%">

                                    <div class="row">

                                        <div class="col-md-8">

                                            <h4>Requirements as Member</h4>
                                            <small>The page you requested cannot be displayed right now. it may be temporarily unavailable, the link you clicked on may be broken or expired, or you may not have permission to view this page.</small>

                                        </div>



                                    </div>


                                    <ul class="todo-list m-t">
                                        <li>


                                            <input type="checkbox" value="" name=""

                                                    <?php if ($_smarty_tpl->tpl_vars['user_model']->value->is_Signature_set($_smarty_tpl->tpl_vars['users']->value['user_url'])) {?>
                                                        checked
                                                    <?php }?>

                                                   class="i-checks"/>


                                            <span class="m-l-xs">Signature</span>

                                        </li>
                                        <li>

                                            <input type="checkbox" value=""

                                                    <?php if ($_smarty_tpl->tpl_vars['user_model']->value->get_profile($_smarty_tpl->tpl_vars['users']->value['user_url'])) {?>
                                                        checked
                                                    <?php }?>

                                                   name="" class="i-checks"/>


                                            <span class="m-l-xs">Upload a profile picture.</span>

                                        </li>

                                        <li>

                                            <input type="checkbox" value=""

                                                    <?php if ($_smarty_tpl->tpl_vars['user_model']->value->is_phone_number_specified($_smarty_tpl->tpl_vars['users']->value['user_url'])) {?>
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
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



        </div>

    </div>



<?php }?>




<?php }
}
