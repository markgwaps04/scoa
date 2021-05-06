<?php
/* Smarty version 3.1.33, created on 2019-05-11 20:04:49
  from 'C:\laragon\www\SCOA\app\views\Misc\Reminders.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd6ba610aa713_23662167',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b088c2f7a2c1a845da55ab142b0c946128976ff' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\app\\views\\Misc\\Reminders.tpl',
      1 => 1555875028,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd6ba610aa713_23662167 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'theme1' => 
  array (
    'compiled_filepath' => 'C:\\laragon\\www\\SCOA\\public\\templates_c\\3b088c2f7a2c1a845da55ab142b0c946128976ff_0.file.Reminders.tpl.php',
    'uid' => '3b088c2f7a2c1a845da55ab142b0c946128976ff',
    'call_name' => 'smarty_template_function_theme1_13698301775cd6ba60f322f6_06051194',
  ),
  'theme2' => 
  array (
    'compiled_filepath' => 'C:\\laragon\\www\\SCOA\\public\\templates_c\\3b088c2f7a2c1a845da55ab142b0c946128976ff_0.file.Reminders.tpl.php',
    'uid' => '3b088c2f7a2c1a845da55ab142b0c946128976ff',
    'call_name' => 'smarty_template_function_theme2_13698301775cd6ba60f322f6_06051194',
  ),
));
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\Misc\\feeds_contents_plugin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 32, true);
?>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\global_functions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 32, true);
?>














<?php if ($_smarty_tpl->tpl_vars['data']->value['theme'] == "true") {?>

    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'theme2', array(), true);?>


<?php } else { ?>

    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'theme1', array(), true);?>


<?php }?>





<?php }
/* smarty_template_function_theme1_13698301775cd6ba60f322f6_06051194 */
if (!function_exists('smarty_template_function_theme1_13698301775cd6ba60f322f6_06051194')) {
function smarty_template_function_theme1_13698301775cd6ba60f322f6_06051194(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>


    <?php $_smarty_tpl->_assignInScope('data', json_decode($_smarty_tpl->tpl_vars['data']->value['of']));?>

    <?php $_smarty_tpl->_assignInScope('IsStaff', $_smarty_tpl->tpl_vars['sessions']->value[@constant('SESSION_KEY')]['staff']);?>

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Reminder</h5>

            <a class="text-success pull-right" href="javascript:void 0">
                See all
            </a>

        </div>

        <div class="ibox-content inspinia-timeline">

            <div class="row" id="scoa_reminders">





                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'post', false, 'every');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every']->value => $_smarty_tpl->tpl_vars['post']->value) {
?>

                    <?php $_smarty_tpl->_assignInScope('post', $_smarty_tpl->tpl_vars['main']->value->intoArray($_smarty_tpl->tpl_vars['post']->value));?>

                    <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'getInterval', array('strEnd'=>$_smarty_tpl->tpl_vars['post']->value['PDT']), true);
$_smarty_tpl->assign("interval", ob_get_clean());?>


                    <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>$_smarty_tpl->tpl_vars['post']->value,'withoutTag'=>true), true);
$_smarty_tpl->assign("user_full", ob_get_clean());?>


                    <?php $_smarty_tpl->_assignInScope('post_details', $_smarty_tpl->tpl_vars['post']->value['post_details']);?>

                    <?php $_smarty_tpl->_assignInScope('post_details', $_smarty_tpl->tpl_vars['main']->value->intoArray($_smarty_tpl->tpl_vars['post_details']->value));?>




                    <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'date_representation', null, null);?>

                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['PDT'],"m/d/Y");?>


                    <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>


                    <?php if ($_smarty_tpl->tpl_vars['post']->value['feedsType'] == "E") {?>


                        <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checklist_name', array('type'=>$_smarty_tpl->tpl_vars['post']->value['checklistType']), true);
$_smarty_tpl->assign("checklist", ob_get_clean());?>


                        <div class="timeline-item feed-element" id="<?php echo $_smarty_tpl->tpl_vars['post']->value['path'];?>
">

                            <div class="row">


                                <div class="col-xs-3 date">
                                    <i class="fa fa-briefcase"></i>
                                    <small><b><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'date_representation');?>
</b></small>
                                    <br/>
                                    <small class="text-navy"><?php echo $_smarty_tpl->tpl_vars['interval']->value;?>
</small>
                                </div>

                                <div class="col-xs-7 content no-top-border">
                                    <p class="m-b-xs">

                                        <a href="javascript:void 0">

                                            <strong>
                                                <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['post']->value['org_name'],50,"...");?>

                                            </strong>

                                        </a>

                                    </p>

                                    <p>
                                        <a href="javascript:void 0"><?php echo $_smarty_tpl->tpl_vars['user_full']->value;?>
</a>
                                        submitted a requirements for <strong><?php echo $_smarty_tpl->tpl_vars['checklist']->value;?>
</strong>
                                    </p>

                                </div>

                            </div>

                        </div>

                    <?php }?>


                    <?php if ($_smarty_tpl->tpl_vars['post']->value['feedsType'] == "I") {?>


                        <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['post_details']->value['date_time']), true);
$_smarty_tpl->assign("batch_set", ob_get_clean());?>




                        <div class="timeline-item feed-element" id="<?php echo $_smarty_tpl->tpl_vars['post']->value['path'];?>
">

                            <div class="row">


                                <div class="col-xs-3 date">
                                    <i class="fa fa-bookmark text-navy"></i>
                                    <small><b><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'date_representation');?>
</b></small>
                                    <br/>
                                    <small class="text-navy"><?php echo $_smarty_tpl->tpl_vars['interval']->value;?>
</small>
                                </div>

                                <div class="col-xs-7 content no-top-border">
                                    <p class="m-b-xs">

                                        <a href="<?php if ('IsStaff') {?>/SCOA/public/scoa_checklist<?php } else { ?>javascript:void 0<?php }?>">

                                            <strong>
                                                Student’s Commission on Audit
                                            </strong>

                                        </a>

                                    </p>

                                    <p>

                                        <?php if ('IsStaff') {?>


                                            <a href="/SCOA/public/scoa_account/profile/<?php echo $_smarty_tpl->tpl_vars['post']->value['currentUser'];?>
">
                                                <?php echo $_smarty_tpl->tpl_vars['user_full']->value;?>

                                            </a>

                                            set a renewal of organization or department, start on
                                            <strong><?php echo $_smarty_tpl->tpl_vars['batch_set']->value;?>
</strong>

                                        <?php } else { ?>



                                        <?php }?>

                                    </p>

                                </div>

                            </div>

                        </div>

                    <?php }?>



                    <?php if ($_smarty_tpl->tpl_vars['post']->value['feedsType'] == "F") {?>



                        <?php $_smarty_tpl->_assignInScope('attachment', $_smarty_tpl->tpl_vars['post_details']->value['attachment'][0]);?>

                        <?php $_smarty_tpl->_assignInScope('attachment', $_smarty_tpl->tpl_vars['main']->value->intoArray($_smarty_tpl->tpl_vars['attachment']->value));?>

                        <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checklist_name', array('type'=>$_smarty_tpl->tpl_vars['attachment']->value['checklistType']), true);
$_smarty_tpl->assign("checklist", ob_get_clean());?>


                        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'submissionState', null, null);?>

                            <?php if ($_smarty_tpl->tpl_vars['post_details']->value['state'] == "-1") {?>

                                <span class="label label-danger">Disapproved</span>

                            <?php }?>


                            <?php if ($_smarty_tpl->tpl_vars['post_details']->value['state'] == "1") {?>

                                <span class="label label-primary">Approved</span>

                            <?php }?>


                            <?php if ($_smarty_tpl->tpl_vars['post_details']->value['state'] == "2") {?>

                                <span class="label label-info">Respond</span>

                            <?php }?>

                            <?php if ($_smarty_tpl->tpl_vars['post_details']->value['state'] == "0") {?>

                                <span class="label label-warning">Resubmit</span>

                            <?php }?>

                        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>




                        <?php if ($_smarty_tpl->tpl_vars['IsStaff']->value) {?>

                            <div class="timeline-item feed-element" id="<?php echo $_smarty_tpl->tpl_vars['post']->value['path'];?>
">

                                <div class="row">


                                    <div class="col-xs-3 date">
                                        <i class="fa fa-reply text-cadet-blue"></i>
                                        <small><b><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'date_representation');?>
</b></small>
                                        <br/>
                                        <small class="text-navy"><?php echo $_smarty_tpl->tpl_vars['interval']->value;?>
</small>
                                    </div>

                                    <div class="col-xs-7 content no-top-border">
                                        <p class="m-b-xs">

                                            <a href="javascript:void 0">

                                                <strong>
                                                    <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['post']->value['org_name'],50,"...");?>

                                                </strong>

                                            </a>

                                        </p>

                                        <p>

                                            <a href="/SCOA/public/scoa_account/profile/<?php echo $_smarty_tpl->tpl_vars['post']->value['currentUser'];?>
">
                                                    <?php echo $_smarty_tpl->tpl_vars['user_full']->value;?>

                                            </a>

                                            <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'submissionState');?>


                                            &nbsp;the submitted requirement for
                                            <strong> <?php echo $_smarty_tpl->tpl_vars['checklist']->value;?>
 </strong>

                                        </p>

                                    </div>

                                </div>

                            </div>

                        <?php }?>


                        <?php if (!$_smarty_tpl->tpl_vars['IsStaff']->value) {?>

                            <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>$_smarty_tpl->tpl_vars['attachment']->value,'withoutTag'=>true), true);
$_smarty_tpl->assign("aUser", ob_get_clean());?>



                            <div class="timeline-item feed-element" id="<?php echo $_smarty_tpl->tpl_vars['post']->value['path'];?>
">

                                <div class="row">


                                    <div class="col-xs-3 date">
                                        <i class="fa fa-reply text-cadet-blue"></i>
                                        <small><b><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'date_representation');?>
</b></small>
                                        <br/>
                                        <small class="text-navy"><?php echo $_smarty_tpl->tpl_vars['interval']->value;?>
</small>
                                    </div>

                                    <div class="col-xs-7 content no-top-border">
                                        <p class="m-b-xs">

                                            <a href="javascript:void 0">

                                                <strong>
                                                    Student’s Commission on Audit
                                                </strong>

                                            </a>

                                        </p>

                                        <p>


                                            <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'submissionState');?>


                                            &nbsp;the submitted requirement sent from
                                            <a href="javascript:void 0">
                                                <?php echo $_smarty_tpl->tpl_vars['aUser']->value;?>

                                            </a>
                                            for <strong> <?php echo $_smarty_tpl->tpl_vars['checklist']->value;?>
 </strong>

                                        </p>

                                    </div>

                                </div>

                            </div>

                        <?php }?>


                    <?php }?>



                    <?php if ($_smarty_tpl->tpl_vars['post']->value['feedsType'] == "J") {?>


                        <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['post_details']->value['date_time']), true);
$_smarty_tpl->assign("batch_update", ob_get_clean());?>


                        <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['post_details']->value['deadline']), true);
$_smarty_tpl->assign("batch_deadline", ob_get_clean());?>



                        <?php if ($_smarty_tpl->tpl_vars['IsStaff']->value) {?>

                            <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>$_smarty_tpl->tpl_vars['attachment']->value,'withoutTag'=>true), true);
$_smarty_tpl->assign("aUser", ob_get_clean());?>


                            <div class="timeline-item feed-element" id="<?php echo $_smarty_tpl->tpl_vars['post']->value['path'];?>
">

                                <div class="row">


                                    <div class="col-xs-3 date">
                                        <i class="fa fa-gear text-cadet-blue"></i>
                                        <small><b><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'date_representation');?>
</b></small>
                                        <br/>
                                        <small class="text-navy"><?php echo $_smarty_tpl->tpl_vars['interval']->value;?>
</small>
                                    </div>

                                    <div class="col-xs-7 content no-top-border">
                                        <p class="m-b-xs">

                                            <a href="javascript:void 0">

                                                <strong>
                                                    <?php echo $_smarty_tpl->tpl_vars['user_full']->value;?>

                                                </strong>

                                            </a>

                                        </p>

                                        <p>


                                            Update the deadline for this batch, the batch has start on
                                            <strong><?php echo $_smarty_tpl->tpl_vars['batch_update']->value;?>
</strong> and the deadline will be
                                            <strong><?php echo $_smarty_tpl->tpl_vars['batch_deadline']->value;?>
</strong>


                                        </p>

                                    </div>

                                </div>

                            </div>

                        <?php }?>


                        <?php if (!$_smarty_tpl->tpl_vars['IsStaff']->value) {?>

                            <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>$_smarty_tpl->tpl_vars['attachment']->value,'withoutTag'=>true), true);
$_smarty_tpl->assign("aUser", ob_get_clean());?>


                            <div class="timeline-item feed-element" id="<?php echo $_smarty_tpl->tpl_vars['post']->value['path'];?>
">

                                <div class="row">


                                    <div class="col-xs-3 date">
                                        <i class="fa fa-gear text-cadet-blue"></i>
                                        <small><b><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'date_representation');?>
</b></small>
                                        <br/>
                                        <small class="text-navy"><?php echo $_smarty_tpl->tpl_vars['interval']->value;?>
</small>
                                    </div>

                                    <div class="col-xs-7 content no-top-border">
                                        <p class="m-b-xs">

                                            <a href="javascript:void 0">

                                                <strong>
                                                    Student’s Commission on Audit
                                                </strong>

                                            </a>

                                        </p>

                                        <p>


                                            Update the deadline for this batch, the batch has start on
                                            <strong><?php echo $_smarty_tpl->tpl_vars['batch_set']->value;?>
</strong> and the deadline will be
                                            <strong><?php echo $_smarty_tpl->tpl_vars['batch_deadline']->value;?>
</strong>, visit our office or
                                            <a href="javascript:void 0">Message us</a> if you have a questions regarding this.



                                        </p>

                                    </div>

                                </div>

                            </div>

                        <?php }?>


                    <?php }?>






                    <?php
}
} else {
?>


                    <div class="row">
                        <div class="col-xs-12 no-borders text-center">
                            <h2>No data loaded</h2>
                        </div>
                    </div>


                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



            </div>



        </div>


    </div>

<?php
}}
/*/ smarty_template_function_theme1_13698301775cd6ba60f322f6_06051194 */
/* smarty_template_function_theme2_13698301775cd6ba60f322f6_06051194 */
if (!function_exists('smarty_template_function_theme2_13698301775cd6ba60f322f6_06051194')) {
function smarty_template_function_theme2_13698301775cd6ba60f322f6_06051194(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>


    <?php $_smarty_tpl->_assignInScope('data', json_decode($_smarty_tpl->tpl_vars['data']->value['of']));?>


    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'post', false, 'every');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every']->value => $_smarty_tpl->tpl_vars['post']->value) {
?>

        <?php $_smarty_tpl->_assignInScope('post', $_smarty_tpl->tpl_vars['main']->value->intoArray($_smarty_tpl->tpl_vars['post']->value));?>

        <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>$_smarty_tpl->tpl_vars['post']->value,'withoutTag'=>true), true);
$_smarty_tpl->assign("user_full", ob_get_clean());?>


        <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'getIntervalByShorthand', array('strEnd'=>$_smarty_tpl->tpl_vars['post']->value['PDT']), true);
$_smarty_tpl->assign("interval", ob_get_clean());?>


        <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'getIntervalByShorthand', array('strStart'=>$_smarty_tpl->tpl_vars['post']->value['PDT']), true);
$_smarty_tpl->assign("intervalReverse", ob_get_clean());?>


        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'full_date_representation', null, null);?>

            <?php echo $_smarty_tpl->tpl_vars['intervalReverse']->value;?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['PDT'],"h:i a - m.d.Y");?>


        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>


        <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['post']->value['PDT']), true);
$_smarty_tpl->assign("full_date_post", ob_get_clean());?>


        <?php $_smarty_tpl->_assignInScope('post_details', $_smarty_tpl->tpl_vars['post']->value['post_details']);?>









        <?php if ($_smarty_tpl->tpl_vars['post']->value['feedsType'] == "E") {?>

           <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checklist_name', array('type'=>$_smarty_tpl->tpl_vars['post']->value['checklistType']), true);
$_smarty_tpl->assign("checklist", ob_get_clean());?>


           <div class="feed-element" id="<?php echo $_smarty_tpl->tpl_vars['post']->value['path'];?>
">
               <div>
                   <small class="pull-right text-navy"><?php echo $_smarty_tpl->tpl_vars['interval']->value;?>
</small>
                   <a href="javascript:void 0"><strong><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['checklist']->value,70,"...");?>
</strong></a>
                   <div>
                       <a href="javascript:void 0"> <?php echo $_smarty_tpl->tpl_vars['user_full']->value;?>
 </a>
                       submitted a requirement.

                   <p><small class="text-muted"><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'full_date_representation');?>
</small></p>

                   </div>
               </div>
           </div>

        <?php }?>


        <?php if ($_smarty_tpl->tpl_vars['post']->value['feedsType'] == "I") {?>

            <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['post_details']->value['date_time']), true);
$_smarty_tpl->assign("batch_set", ob_get_clean());?>


            <div class="feed-element">
                <div>
                    <small class="pull-right text-navy"><?php echo $_smarty_tpl->tpl_vars['interval']->value;?>
</small>
                    <a href="javascript:void 0"><strong>Student’s Commission on Audit</strong></a>
                    <div>

                        <strong>Renew all organizations and department</strong>, the batch has start on
                        <strong><?php echo $_smarty_tpl->tpl_vars['batch_set']->value;?>
</strong>
                        visit our office or <a href="javascript:void 0">Message us</a>
                        if you have a questions regarding this.

                        <p><small class="text-muted"><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'full_date_representation');?>
</small></p>

                    </div>
                </div>
            </div>

        <?php }?>



        <?php if ($_smarty_tpl->tpl_vars['post']->value['feedsType'] == "J") {?>

            <?php $_smarty_tpl->_assignInScope('post_details', $_smarty_tpl->tpl_vars['main']->value->intoArray($_smarty_tpl->tpl_vars['post_details']->value));?>

            <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['post_details']->value['date_time']), true);
$_smarty_tpl->assign("batch_update", ob_get_clean());?>


            <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['post_details']->value['deadline']), true);
$_smarty_tpl->assign("batch_deadline", ob_get_clean());?>


            <div class="feed-element">
                <div>
                    <small class="pull-right text-navy"><?php echo $_smarty_tpl->tpl_vars['interval']->value;?>
</small>
                    <a href="javascript:void 0"><strong>Student’s Commission on Audit</strong></a>
                    <div>

                        <strong>Update the deadline</strong>, the batch has start on
                        <strong><?php echo $_smarty_tpl->tpl_vars['batch_set']->value;?>
</strong> and the deadline will be
                        <strong><?php echo $_smarty_tpl->tpl_vars['batch_deadline']->value;?>
</strong>
                        visit our office or <a href="javascript:void 0">Message us</a>
                        if you have a questions regarding this.

                        <p><small class="text-muted"><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'full_date_representation');?>
</small></p>

                    </div>
                </div>
            </div>

        <?php }?>








    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php
}}
/*/ smarty_template_function_theme2_13698301775cd6ba60f322f6_06051194 */
}
