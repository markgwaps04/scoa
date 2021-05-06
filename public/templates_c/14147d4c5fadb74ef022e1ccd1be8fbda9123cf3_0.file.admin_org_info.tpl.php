<?php
/* Smarty version 3.1.33, created on 2019-04-24 17:01:40
  from 'C:\wamp64\www\SCOA\public\included_template\admin\admin_org_info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cc025f4e53479_52974472',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14147d4c5fadb74ef022e1ccd1be8fbda9123cf3' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\admin\\admin_org_info.tpl',
      1 => 1556096497,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cc025f4e53479_52974472 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'feeds' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\14147d4c5fadb74ef022e1ccd1be8fbda9123cf3_0.file.admin_org_info.tpl.php',
    'uid' => '14147d4c5fadb74ef022e1ccd1be8fbda9123cf3',
    'call_name' => 'smarty_template_function_feeds_2163710865cc025f4cfa2b1_90761219',
  ),
  'sideInfo' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\14147d4c5fadb74ef022e1ccd1be8fbda9123cf3_0.file.admin_org_info.tpl.php',
    'uid' => '14147d4c5fadb74ef022e1ccd1be8fbda9123cf3',
    'call_name' => 'smarty_template_function_sideInfo_2163710865cc025f4cfa2b1_90761219',
  ),
  'Info' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\14147d4c5fadb74ef022e1ccd1be8fbda9123cf3_0.file.admin_org_info.tpl.php',
    'uid' => '14147d4c5fadb74ef022e1ccd1be8fbda9123cf3',
    'call_name' => 'smarty_template_function_Info_2163710865cc025f4cfa2b1_90761219',
  ),
));
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'requirements', null, null);?>

    <div class="col-sm-12">

        <div class="ibox float-e-margins" id="ibox1">
            <div class="ibox-title">
                <h5>Requirements</h5>
            </div>
            <div class="ibox-content sk-loading scoa-requirements">

                <div class="sk-spinner sk-spinner-double-bounce">
                    <div class="sk-double-bounce1"></div>
                    <div class="sk-double-bounce2"></div>
                </div>


                <ul class="sortable-list connectList agile-list ui-sortable" id="todo">
                    <li class="warning-element" id="task1">

                        <div class="checkbox checkbox-primary no-padding">

                            <div class="row no-padding">

                                <div class="col-sm-1">
                                    <input id="positions" class="scoa hide" required name="agreement" disabled type="checkbox">&nbsp;
                                </div>
                                <div class="col-sm-10">

                                    <a href="javascript: void 0">5 members including the Treasurer, Auditor, Organization President, Department Governor and Adviser.</a>

                                </div>

                            </div>

                        </div>

                    </li>
                    <li class="warning-element" id="task2">

                        <div class="checkbox checkbox-primary no-padding">

                            <div class="row no-padding">

                                <div class="col-sm-1">
                                    <input id="members" class="scoa hide" required name="agreement" disabled type="checkbox">&nbsp;
                                </div>
                                <div class="col-sm-10">

                                    <a href="javascript: void 0">Complete members requirements.</a>

                                </div>

                            </div>

                        </div>

                    </li>
                    <li class="warning-element" id="task3">

                        <div class="checkbox checkbox-primary no-padding">

                            <div class="row no-padding">

                                <div class="col-sm-1">
                                    <input id="cover" class="scoa hide" required name="agreement" disabled type="checkbox">&nbsp;
                                </div>
                                <div class="col-sm-10">

                                    <a href="javascript: void 0">Cover photo of organization</a>

                                </div>

                            </div>

                        </div>


                    </li>

                </ul>

            </div>
        </div>

    </div>


<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>




















<div class="wrapper wrapper-content">

<div class="row m-b-xl">

    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'Info', array(), true);?>


</div>


<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'footer', array(), true);?>


</div>



<?php }
/* smarty_template_function_feeds_2163710865cc025f4cfa2b1_90761219 */
if (!function_exists('smarty_template_function_feeds_2163710865cc025f4cfa2b1_90761219')) {
function smarty_template_function_feeds_2163710865cc025f4cfa2b1_90761219(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


    <div class="col-lg-7">


        <?php if (!$_smarty_tpl->tpl_vars['org']->value['members']['approved']) {?>


            <div class="col-sm-12 no-padding no-margins">

                <div class="alert alert-info" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->
                    <i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;
                    <a class="alert-link" href="#">No members yet.</a>
                </div>

            </div>


            <?php if (!$_smarty_tpl->tpl_vars['isStrict']->value) {?> <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'requirements');?>
 <?php }?>



        <?php }?>

        <div class="col-sm-12">

            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\admin_populate_members.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        </div>


        <div class="col-sm-12">

            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\admin_populate_old_members.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        </div>


    </div>

<?php
}}
/*/ smarty_template_function_feeds_2163710865cc025f4cfa2b1_90761219 */
/* smarty_template_function_sideInfo_2163710865cc025f4cfa2b1_90761219 */
if (!function_exists('smarty_template_function_sideInfo_2163710865cc025f4cfa2b1_90761219')) {
function smarty_template_function_sideInfo_2163710865cc025f4cfa2b1_90761219(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
?>


    <div class="col-sm-5">


        <div class="col-sm-12 m-b-md">

            <div class="ibox-title">
                <h5>Organization details</h5>
            </div>

            <ul class="ibox-content no-padding border-left-right coverphoto">
                <li style="list-style: none">
                    <img class="scoa-img-responsive cover-photo" src="http://localhost/SCOA/public//files/default_image/default.png" id="coverphoto" alt="img04">
                </li>
            </ul>


            <div class="ibox-content">

                <div class="sk-spinner sk-spinner-double-bounce">
                    <div class="sk-double-bounce1"></div>
                    <div class="sk-double-bounce2"></div>
                </div>


                <h5>ABOUT</h5>

                <p>


                    <?php if ((trim($_smarty_tpl->tpl_vars['org']->value['details']))) {?>

                        <?php echo trim($_smarty_tpl->tpl_vars['org']->value['details']);?>


                    <?php } else { ?>


                        <a href='javascript:void 0'>
                            <u> <i class="fa fa-pencil"></i>
                                edit about
                            </u>
                        </a>


                    <?php }?>


                </p>

                <h5>CODE</h5>
                <span>


                    <?php echo $_smarty_tpl->tpl_vars['org']->value['member_code'];?>



                        </span>


                <h5>MEMBERS</h5>

                <?php if ($_smarty_tpl->tpl_vars['org']->value['members']['approved']) {?>

                    <p class="user-friends">

                        

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['org']->value['members']['approved'], 'user', false, 'every');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every']->value => $_smarty_tpl->tpl_vars['user']->value) {
?>


                            <a href="">
                                <img alt="image" data-toggle="tooltip" data-placement="auto" title=
                                "<?php echo smarty_modifier_capitalize((($_smarty_tpl->tpl_vars['user']->value['Firstname']).(" ")).($_smarty_tpl->tpl_vars['user']->value['Lastname']),true,true);?>
" class="img-circle profile" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/profile/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value['profile'])===null||$tmp==='' ? 'default/1.jpg' : $tmp);?>
">
                            </a>


                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                        
                    </p>

                <?php } else { ?>

                    <a href='javascript:void 0'>
                        <u> <i class="fa fa-plus"></i>
                            Add members
                        </u>
                    </a>

                <?php }?>




            </div>

        </div>


        <?php if ($_smarty_tpl->tpl_vars['org']->value['members']['approved'] || $_smarty_tpl->tpl_vars['isStrict']->value) {?>

            <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'requirements');?>


        <?php }?>




    </div>

<?php
}}
/*/ smarty_template_function_sideInfo_2163710865cc025f4cfa2b1_90761219 */
/* smarty_template_function_Info_2163710865cc025f4cfa2b1_90761219 */
if (!function_exists('smarty_template_function_Info_2163710865cc025f4cfa2b1_90761219')) {
function smarty_template_function_Info_2163710865cc025f4cfa2b1_90761219(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


    <div class="col-sm-12">



        <?php if ((trim($_smarty_tpl->tpl_vars['org']->value['details'])) && $_smarty_tpl->tpl_vars['org']->value['members']['approved']) {?>

            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'Info', array(), true);?>


        <?php } else { ?>



        <?php }?>




        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'sideInfo', array(), true);?>




    </div>

<?php
}}
/*/ smarty_template_function_Info_2163710865cc025f4cfa2b1_90761219 */
}
