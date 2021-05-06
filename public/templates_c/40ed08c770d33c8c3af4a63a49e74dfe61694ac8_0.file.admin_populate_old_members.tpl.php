<?php
/* Smarty version 3.1.33, created on 2019-04-22 03:33:21
  from 'C:\wamp64\www\SCOA\public\included_template\admin\admin_populate_old_members.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cbcc581ac5619_40417128',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40ed08c770d33c8c3af4a63a49e74dfe61694ac8' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\admin\\admin_populate_old_members.tpl',
      1 => 1549385798,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cbcc581ac5619_40417128 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'time_goes' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\40ed08c770d33c8c3af4a63a49e74dfe61694ac8_0.file.admin_populate_old_members.tpl.php',
    'uid' => '40ed08c770d33c8c3af4a63a49e74dfe61694ac8',
    'call_name' => 'smarty_template_function_time_goes_12550702965cbcc5819fe8b7_27452215',
  ),
));
$_smarty_tpl->_assignInScope('timeline', $_smarty_tpl->tpl_vars['org_model']->value->old_members($_smarty_tpl->tpl_vars['org']->value['RCode']) ,true);?>


<?php if ('timeline') {?>


    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['timeline']->value, 'organization', false, 'every');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every']->value => $_smarty_tpl->tpl_vars['organization']->value) {
?>



        




        <?php if ($_smarty_tpl->tpl_vars['organization']->value['members']) {?>



            <div class="ibox float-e-margins scoa-transparent no-margins">

                <div class="ibox-title no-borders scoa-transparent">

                    <h5>

                        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'time_goes', array(), true);?>


                    </h5>


                    <div class="ibox-tools">

                        <a class="collapse-link pull-right">
                            <i class="fa fa-chevron-up"></i>
                        </a>


                    </div>

                </div>

                <div class="ibox-content inspinia-timeline scoa-transparent scoa-social-feed">


                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['organization']->value['members'], 'users', false, 'evey');
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



                                <div class="social-body"></div>


                            </div>

                        </div>




                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



                </div>

            </div>



        <?php }?>



    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>




<?php }
}
/* smarty_template_function_time_goes_12550702965cbcc5819fe8b7_27452215 */
if (!function_exists('smarty_template_function_time_goes_12550702965cbcc5819fe8b7_27452215')) {
function smarty_template_function_time_goes_12550702965cbcc5819fe8b7_27452215(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>


            <?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['organization']->value['approval_date_time'],'%B %e, %Y'))===null||$tmp==='' ? 'xxxx' : $tmp);?>

            -
            <?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['organization']->value['unapproved_date_time'],'%B %e, %Y'))===null||$tmp==='' ? 'xxxx' : $tmp);?>



        <?php
}}
/*/ smarty_template_function_time_goes_12550702965cbcc5819fe8b7_27452215 */
}
