<?php
/* Smarty version 3.1.33, created on 2021-05-06 12:24:58
  from 'C:\xampp\htdocs\scoa\app\views\admin\index\notification.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60936f9a21ce06_76259464',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd7a5183a29e7e36760913eedf4add8fac781813' => 
    array (
      0 => 'C:\\xampp\\htdocs\\scoa\\app\\views\\admin\\index\\notification.tpl',
      1 => 1554053893,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60936f9a21ce06_76259464 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'structure' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\scoa\\public\\templates_c\\cd7a5183a29e7e36760913eedf4add8fac781813_0.file.notification.tpl.php',
    'uid' => 'cd7a5183a29e7e36760913eedf4add8fac781813',
    'call_name' => 'smarty_template_function_structure_60776133660936f9a10e735_53169938',
  ),
));
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\scoa\\app\\core\\Smarty\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),1=>array('file'=>'C:\\xampp\\htdocs\\scoa\\app\\core\\Smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),2=>array('file'=>'C:\\xampp\\htdocs\\scoa\\app\\core\\Smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\global_functions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
?>

<?php $_smarty_tpl->_assignInScope('pin', mt_rand(0,1000));?>



<?php $_smarty_tpl->_assignInScope('notify', $_smarty_tpl->tpl_vars['notify']->value ,true);?>









<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['notify']->value, 'feed', false, 'every');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every']->value => $_smarty_tpl->tpl_vars['feed']->value) {
?>


    <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'profile', null, null);?>


        <?php if (!$_smarty_tpl->tpl_vars['feed']->value['isStaff']) {?>


            <img alt="image" letters="<?php echo mb_strtoupper(substr($_smarty_tpl->tpl_vars['firstname']->value,0,1), 'UTF-8');?>
" class="profile img-circle" _src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/profile/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['feed']->value['profile'])===null||$tmp==='' ? "1.jpg" : $tmp);?>
">

        <?php } else { ?>

            <img alt="image" class="profile img-circle" _src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/scoa.png">

        <?php }?>


    <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>




    <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'user_type', null, null);?>

        <?php if (!$_smarty_tpl->tpl_vars['feed']->value['isStaff']) {?>

            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('withoutTag'=>true,'param'=>(($tmp = @$_smarty_tpl->tpl_vars['feed']->value)===null||$tmp==='' ? 'User' : $tmp)), true);?>


        <?php } else { ?>

            Student’s Commission on Audit (SCOA)

        <?php }?>


    <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>







    









    <?php if ($_smarty_tpl->tpl_vars['feed']->value['feedsType'] == "E") {?>

        <?php ob_start();
echo trim($_smarty_tpl->tpl_vars['public']->value);
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_assignInScope('link', $_prefixVariable1."feeds/".((string)$_smarty_tpl->tpl_vars['feed']->value['org_info']['url']) ,true);?>

        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'typeF', null, null);?>


            <?php if ($_smarty_tpl->tpl_vars['feed']->value['isMemberState']) {?>

                respond to the requirement of

            <?php } else { ?>

                submitted a requirements to

            <?php }?>



            <a class="font-inherit no-padding" href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
"><strong>
                    <?php echo smarty_modifier_truncate(smarty_modifier_capitalize($_smarty_tpl->tpl_vars['feed']->value['org_info']['name']),50,"...");?>

                </strong></a>.

        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>


        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'structure', array('body'=>$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'typeF'),'link'=>$_smarty_tpl->tpl_vars['link']->value), true);?>




    <?php }?>







    <?php if ($_smarty_tpl->tpl_vars['feed']->value['feedsType'] == "F") {?>


        <?php ob_start();
echo trim($_smarty_tpl->tpl_vars['public']->value);
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_assignInScope('link', $_prefixVariable2."feeds/".((string)$_smarty_tpl->tpl_vars['feed']->value['org_info']['url']) ,true);?>

        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'typeF', null, null);?>

            respond to the post on <a class="font-inherit no-padding" href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
"><strong>
                <?php echo smarty_modifier_truncate(smarty_modifier_capitalize($_smarty_tpl->tpl_vars['feed']->value['org_info']['name']),50,"...");?>
</strong></a>

        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>


        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'structure', array('body'=>$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'typeF'),'link'=>$_smarty_tpl->tpl_vars['link']->value), true);?>




    <?php }?>





    <?php if ($_smarty_tpl->tpl_vars['feed']->value['feedsType'] == "H") {?>


        <li id="scoa-notify" feedsId="<?php echo $_smarty_tpl->tpl_vars['feed']->value['path'];?>
">
            <div class="dropdown-messages-box">
                <a href="profile.html" class="pull-left">
                    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'profile');?>

                </a>
                <div class="media-body smaller">

                    <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
" class="scoa-notify-link">

                        <small class="pull-right text-navy">

                            <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'getIntervalByShorthand', array('strEnd'=>$_smarty_tpl->tpl_vars['feed']->value['PDT']), true);
$_smarty_tpl->assign("date_time", ob_get_clean());?>


                            <?php echo $_smarty_tpl->tpl_vars['date_time']->value;?>



                        </small>

                        <strong>
                            <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'user_type');?>

                        </strong>



                        <?php if ($_smarty_tpl->tpl_vars['feed']->value['post_details']['_status'] == "1") {?>

                            approved

                            <a class="font-inherit no-padding" href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">
                                <strong><?php echo smarty_modifier_truncate(smarty_modifier_capitalize($_smarty_tpl->tpl_vars['feed']->value['org_info']['name']),50,"...");?>
</strong>

                            </a>.

                            <br>


                        <?php } else { ?>
                            unapproved your request to create organization
                        <?php }?>


                        <small class="text-muted"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['feed']->value['PDT']), true);?>
</small>

                    </a>



                </div>
            </div>
        </li>

        <li class="divider"></li>


    <?php }?>




    <?php if ($_smarty_tpl->tpl_vars['feed']->value['feedsType'] == "I") {?>


        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'typeI', null, null);?>

            Set the new batch for <strong><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['feed']->value['PDT'],"%Y");?>
</strong>

        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>


        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'structure', array('body'=>$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'typeI')), true);?>



    <?php }?>





    <?php if ($_smarty_tpl->tpl_vars['feed']->value['feedsType'] == "J") {?>



        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'typeJ', null, null);?>

            Set the deadline <strong><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['feed']->value['post_details']['deadline']), true);?>
</strong>

        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>


        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'structure', array('body'=>$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'typeJ')), true);?>



    <?php }?>









    <?php if ($_smarty_tpl->tpl_vars['feed']->value['feedsType'] == "C") {?>



        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, '_user', null, null);?>

            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('withoutTag'=>true,'param'=>(($tmp = @$_smarty_tpl->tpl_vars['feed']->value['post_details'])===null||$tmp==='' ? 'User' : $tmp)), true);?>


        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>


        <?php ob_start();
echo trim($_smarty_tpl->tpl_vars['public']->value);
$_prefixVariable3=ob_get_clean();
$_smarty_tpl->_assignInScope('link', $_prefixVariable3."feeds/".((string)$_smarty_tpl->tpl_vars['feed']->value['org_info']['url']) ,true);?>


        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'typeC', null, null);?>


            <?php if ($_smarty_tpl->tpl_vars['feed']->value['m_requestType'] == 'A') {?>

                sent a request to join

            <?php } elseif ($_smarty_tpl->tpl_vars['feed']->value['m_requestType'] == 'B') {?>

                approved your request to join

            <?php } elseif ($_smarty_tpl->tpl_vars['feed']->value['m_requestType'] == 'C') {?>

                remove you as a member of

            <?php } elseif ($_smarty_tpl->tpl_vars['feed']->value['m_requestType'] == 'D') {?>

                unapproved your request to join

            <?php }?>



            <a class="font-inherit no-padding" href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
"><strong>
                <?php echo smarty_modifier_truncate(smarty_modifier_capitalize($_smarty_tpl->tpl_vars['feed']->value['org_info']['name']),50,"...");?>
</strong></a>.


        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>





        <?php if ($_smarty_tpl->tpl_vars['feed']->value['m_requestType'] == 'A') {?>

            <?php ob_start();
echo trim($_smarty_tpl->tpl_vars['public']->value);
$_prefixVariable4=ob_get_clean();
$_smarty_tpl->_assignInScope('link', $_prefixVariable4."/organization/members/".((string)$_smarty_tpl->tpl_vars['feed']->value['org_info']['url']) ,true);?>

        <?php }?>





        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'structure', array('body'=>$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'typeC'),'userName'=>$_smarty_tpl->tpl_vars['_user']->value,'link'=>$_smarty_tpl->tpl_vars['link']->value), true);?>



    <?php }?>











<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php }
/* smarty_template_function_structure_60776133660936f9a10e735_53169938 */
if (!function_exists('smarty_template_function_structure_60776133660936f9a10e735_53169938')) {
function smarty_template_function_structure_60776133660936f9a10e735_53169938(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>



        <li id="scoa-notify" feedsId="<?php echo $_smarty_tpl->tpl_vars['feed']->value['path'];?>
">
            <div class="dropdown-messages-box">
                <a href="profile.html" class="pull-left">
                    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'profile');?>

                </a>
                <div class="media-body smaller">

                    <a href="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['link']->value)===null||$tmp==='' ? "javascript:void 0" : $tmp);?>
" class="scoa-notify-link">

                        <small class="pull-right text-navy">

                            <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'getIntervalByShorthand', array('strEnd'=>$_smarty_tpl->tpl_vars['feed']->value['PDT']), true);
$_smarty_tpl->assign("date_time", ob_get_clean());?>


                            <?php $_smarty_tpl->_assignInScope('dateTimeTemp', mb_strtolower($_smarty_tpl->tpl_vars['date_time']->value, 'UTF-8') ,true);?>

                            <?php if ($_smarty_tpl->tpl_vars['dateTimeTemp']->value == "today") {?>

                                Today

                            <?php } else { ?>

                                <?php echo $_smarty_tpl->tpl_vars['date_time']->value;?>


                            <?php }?>

                        </small>



                        <?php if (!$_smarty_tpl->tpl_vars['userName']->value) {?>

                            <strong>
                                <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'user_type');?>

                            </strong>

                        <?php }?>


                        <?php echo $_smarty_tpl->tpl_vars['body']->value;?>


                        <br>

                        <small class="text-muted"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['feed']->value['PDT']), true);?>
</small>

                    </a>



                </div>
            </div>
        </li>

        <li class="divider"></li>



    <?php
}}
/*/ smarty_template_function_structure_60776133660936f9a10e735_53169938 */
}
