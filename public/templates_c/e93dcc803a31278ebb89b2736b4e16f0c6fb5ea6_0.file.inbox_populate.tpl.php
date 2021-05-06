<?php
/* Smarty version 3.1.33, created on 2019-04-17 15:32:04
  from 'C:\wamp64\www\SCOA\app\views\admin\index\misc\inbox_populate.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb6d6747e8908_09326885',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e93dcc803a31278ebb89b2736b4e16f0c6fb5ea6' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\app\\views\\admin\\index\\misc\\inbox_populate.tpl',
      1 => 1555260084,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb6d6747e8908_09326885 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'state' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\e93dcc803a31278ebb89b2736b4e16f0c6fb5ea6_0.file.inbox_populate.tpl.php',
    'uid' => 'e93dcc803a31278ebb89b2736b4e16f0c6fb5ea6',
    'call_name' => 'smarty_template_function_state_3357897685cb6d674520b83_09455971',
  ),
  'checklistType' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\e93dcc803a31278ebb89b2736b4e16f0c6fb5ea6_0.file.inbox_populate.tpl.php',
    'uid' => 'e93dcc803a31278ebb89b2736b4e16f0c6fb5ea6',
    'call_name' => 'smarty_template_function_checklistType_3357897685cb6d674520b83_09455971',
  ),
  'regularChecklist' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\e93dcc803a31278ebb89b2736b4e16f0c6fb5ea6_0.file.inbox_populate.tpl.php',
    'uid' => 'e93dcc803a31278ebb89b2736b4e16f0c6fb5ea6',
    'call_name' => 'smarty_template_function_regularChecklist_3357897685cb6d674520b83_09455971',
  ),
  'populate' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\e93dcc803a31278ebb89b2736b4e16f0c6fb5ea6_0.file.inbox_populate.tpl.php',
    'uid' => 'e93dcc803a31278ebb89b2736b4e16f0c6fb5ea6',
    'call_name' => 'smarty_template_function_populate_3357897685cb6d674520b83_09455971',
  ),
));
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.regex_replace.php','function'=>'smarty_modifier_regex_replace',),));
?>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\global_functions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
?>

<?php $_smarty_tpl->_assignInScope('pin', mt_rand(0,1000));?>























































<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, smarty_modifier_regex_replace('populate',"/[\r\t\n]/"," "), array(), true);?>



<?php echo '<script'; ?>
>

    jQuery(".disabled-checkbox").iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
        disabledClass: "scoa-disabled-checkbox"
    });

    jQuery(".checkbox").iCheck({
        checkboxClass: 'icheckbox_square-green inbox-checked',
        radioClass: 'iradio_square-green',
    });

<?php echo '</script'; ?>
>

<?php }
/* smarty_template_function_state_3357897685cb6d674520b83_09455971 */
if (!function_exists('smarty_template_function_state_3357897685cb6d674520b83_09455971')) {
function smarty_template_function_state_3357897685cb6d674520b83_09455971(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>



    <?php if ($_smarty_tpl->tpl_vars['info']->value['submissionState'] == 1) {?>

        <span class="label label-primary pull-right">Approved</span>

    <?php } elseif ($_smarty_tpl->tpl_vars['info']->value['submissionState'] == 0 && !$_smarty_tpl->tpl_vars['info']->value['post_details']['hasApprovedEntry']) {?>


        <span class="label label-warning pull-right">Pending</span>

    <?php } elseif ($_smarty_tpl->tpl_vars['info']->value['post_details']['hasApprovedEntry']) {?>

        <span class="label label-success pull-right m-l-xs">Entry</span>

    <?php } else { ?>

        <span class="label label-danger pull-right">Unapproved</span>

    <?php }?>



<?php
}}
/*/ smarty_template_function_state_3357897685cb6d674520b83_09455971 */
/* smarty_template_function_checklistType_3357897685cb6d674520b83_09455971 */
if (!function_exists('smarty_template_function_checklistType_3357897685cb6d674520b83_09455971')) {
function smarty_template_function_checklistType_3357897685cb6d674520b83_09455971(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>



    <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'getIntervalByShorthand', array('strEnd'=>$_smarty_tpl->tpl_vars['info']->value['PDT']), true);
$_smarty_tpl->assign("date_time", ob_get_clean());?>



    <tr class="<?php if ($_smarty_tpl->tpl_vars['info']->value['isRead'] == 1) {?> read <?php } else { ?> unread <?php }?>" id="<?php echo $_smarty_tpl->tpl_vars['info']->value['path'];?>
">

        <td class="check-mail">


            <?php if ($_smarty_tpl->tpl_vars['info']->value['isRead'] == 0) {?>

                <input type="checkbox" value="checked" class="checkbox" checked>

            <?php } else { ?>

                <input type="checkbox" value="" disabled class="disabled-checkbox">

            <?php }?>


        </td>

        <td class="mail-contact">

            <a href="javascript:void 0">

                <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['info']->value['org_info']['name'],20,"...");?>


            </a>



            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'state', array('param'=>$_smarty_tpl->tpl_vars['info']->value), true);?>




        </td>

        <td class="mail-subject">

            <a href="javascript:void 0">
                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checklist_name', array('type'=>$_smarty_tpl->tpl_vars['info']->value['checklistType']), true);?>

            </a>

        </td>

        <td></td>

        <td class="text-right mail-date"><?php echo $_smarty_tpl->tpl_vars['date_time']->value;?>
</td>


    </tr>



<?php
}}
/*/ smarty_template_function_checklistType_3357897685cb6d674520b83_09455971 */
/* smarty_template_function_regularChecklist_3357897685cb6d674520b83_09455971 */
if (!function_exists('smarty_template_function_regularChecklist_3357897685cb6d674520b83_09455971')) {
function smarty_template_function_regularChecklist_3357897685cb6d674520b83_09455971(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>



    <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'getIntervalByShorthand', array('strEnd'=>$_smarty_tpl->tpl_vars['info']->value['PDT']), true);
$_smarty_tpl->assign("date_time", ob_get_clean());?>



    <tr class="<?php if ($_smarty_tpl->tpl_vars['info']->value['isRead'] == 1) {?> read <?php } else { ?> unread <?php }?>" id="<?php echo $_smarty_tpl->tpl_vars['info']->value['path'];?>
">

        <td class="check-mail">


            <?php if ($_smarty_tpl->tpl_vars['info']->value['isRead'] == 0) {?>

                <input type="checkbox" value="checked" class="checkbox" checked>

            <?php } else { ?>

                <input type="checkbox" value="" disabled class="disabled-checkbox">

            <?php }?>


        </td>

        <td class="mail-contact">

            <a href="javascript:void 0">

                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('withoutTag'=>true,'param'=>smarty_modifier_truncate((($tmp = @$_smarty_tpl->tpl_vars['info']->value)===null||$tmp==='' ? 'User' : $tmp),20,"...")), true);?>


            </a>



            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'state', array('param'=>$_smarty_tpl->tpl_vars['info']->value), true);?>





        </td>

        <td class="mail-subject">

            <a href="javascript:void 0">
                                <?php echo $_smarty_tpl->tpl_vars['info']->value['checklistType'];?>

            </a>

        </td>

        <td class="">
            <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['info']->value['org_info']['name'],30,"...");?>

        </td>

        <td class="text-right mail-date"><?php echo $_smarty_tpl->tpl_vars['date_time']->value;?>
</td>


    </tr>


<?php
}}
/*/ smarty_template_function_regularChecklist_3357897685cb6d674520b83_09455971 */
/* smarty_template_function_populate_3357897685cb6d674520b83_09455971 */
if (!function_exists('smarty_template_function_populate_3357897685cb6d674520b83_09455971')) {
function smarty_template_function_populate_3357897685cb6d674520b83_09455971(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>




    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['inbox_data']->value, 'info', false, 'every');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every']->value => $_smarty_tpl->tpl_vars['info']->value) {
?>


        <?php if ($_smarty_tpl->tpl_vars['info']->value['feedsType'] == "E") {?>


            <?php if ($_smarty_tpl->tpl_vars['info']->value['checklistType'] == "FS" && (!$_smarty_tpl->tpl_vars['info']->value['isMemberState'])) {?>

                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checklistType', array('info'=>$_smarty_tpl->tpl_vars['info']->value), true);?>


            <?php } else { ?>

                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'regularChecklist', array('info'=>$_smarty_tpl->tpl_vars['info']->value), true);?>


            <?php }?>



        <?php }?>




        <?php
}
} else {
?>


        <tr class="p-lg no-data">

            <td class="no-borders">

                <NO_DISPLAY_OF_DATA>

                    <h2 class="text-center full-width clear-left">Not found</h2>

                </NO_DISPLAY_OF_DATA>

            </td>

        </tr>

        <?php echo '<script'; ?>
>

            jQuery("#inbox-next").attr("disabled","true");
            jQuery("#inbox-read").attr("disabled","true");
            jQuery("#inbox-all").attr("disabled","true");

        <?php echo '</script'; ?>
>


    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php
}}
/*/ smarty_template_function_populate_3357897685cb6d674520b83_09455971 */
}
