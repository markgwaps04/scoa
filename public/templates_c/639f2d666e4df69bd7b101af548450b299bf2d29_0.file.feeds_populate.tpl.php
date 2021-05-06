<?php
/* Smarty version 3.1.33, created on 2019-04-17 15:28:45
  from 'C:\wamp64\www\SCOA\app\views\Users\home\feeds_populate.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb6d5adb22838_22296912',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '639f2d666e4df69bd7b101af548450b299bf2d29' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\app\\views\\Users\\home\\feeds_populate.tpl',
      1 => 1555259611,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb6d5adb22838_22296912 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\global_functions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php $_smarty_tpl->_assignInScope('isStaff', $_smarty_tpl->tpl_vars['user_model']->value->isStaff);?>



<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['post']->value, 'feeds', false, 'every');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every']->value => $_smarty_tpl->tpl_vars['feeds']->value) {
?>



    <?php $_smarty_tpl->_assignInScope('post_type', '');?>

    <?php $_smarty_tpl->_assignInScope('dropdown', '');?>

    <?php $_smarty_tpl->_assignInScope('file_body', '');?>


    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\misc\\feeds_contents_plugin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
?>


    <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'org_dept', null, null);?>


        <?php if ($_smarty_tpl->tpl_vars['isGlobalfeeds']->value) {?>

            on <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
scoa_organization/feeds/<?php echo $_smarty_tpl->tpl_vars['feeds']->value['r_code'];?>
">Java Develepers</a>

        <?php }?>


    <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>


    <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'interval', null, null);?>

        <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'getIntervalByShorthand', array('strEnd'=>$_smarty_tpl->tpl_vars['feeds']->value['PDT']), true);
$_smarty_tpl->assign("interval", ob_get_clean());?>


        <small class="pull-right text-navy"><?php echo $_smarty_tpl->tpl_vars['interval']->value;?>
</small>

    <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>




    <?php if ($_smarty_tpl->tpl_vars['feeds']->value['feedsType'] == "A") {?>

        <div class="social-feed-separated" id="<?php echo $_smarty_tpl->tpl_vars['feeds']->value['feedsId'];?>
">

            <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'profile');?>


            <div class="social-feed-box">

                <div class="social-avatar">

                    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'interval');?>


                    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_name', array('param'=>$_smarty_tpl->tpl_vars['feeds']->value), true);?>


                    created
                    <a>
                        <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['feeds']->value['org_info']['name'],50,"...");?>

                    </a>

                    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'org_dept');?>


                    <br>
                    <small class="text-muted">date</small>

                </div>


                <div class="social-body">
                    <div class="well">
                        <big>
                            <strong>
                                <a href="#"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['feeds']->value['org_info']['name'],50,"...");?>
</a>
                            </strong></big>

                        <span class="pre-line">

                            <?php echo trim((($tmp = @smarty_modifier_truncate($_smarty_tpl->tpl_vars['feeds']->value['org_info']['details'],300,'&nbsp;<a href="#">See more...</a>'))===null||$tmp==='' ? '<a href="javascript:void 0"><i class="fa fa-pencil"></i>&nbsp; edit about</>' : $tmp));?>


                        </span>

                    </div>
                </div>



            </div>
        </div>

    <?php }?>












    <?php if ($_smarty_tpl->tpl_vars['feeds']->value['m_requestType'] == "B") {?>



        <div class="social-feed-separated" id="<?php echo $_smarty_tpl->tpl_vars['feeds']->value['feedsId'];?>
">


            <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'profile');?>



            <div class="social-feed-box" id="<?php echo $_smarty_tpl->tpl_vars['feeds']->value['feedsId'];?>
">

                <div class="social-avatar">

                    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'interval');?>



                    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_name', array('param'=>$_smarty_tpl->tpl_vars['feeds']->value), true);?>


                    approved a request to join


                    <?php if (!($_smarty_tpl->tpl_vars['feeds']->value['user_url'] == $_smarty_tpl->tpl_vars['feeds']->value['post_details']['user_url'])) {?>


                        <a href="javascript:void 0">
                            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>(($tmp = @$_smarty_tpl->tpl_vars['feeds']->value['post_details'])===null||$tmp==='' ? 'User' : $tmp)), true);?>

                        </a>


                    <?php }?>

                    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'org_dept');?>


                    <br>

                    <small class="text-muted"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['feeds']->value['PDT']), true);?>
</small>



                </div>


                <div class="social-body">

                    <div class="list-group">


                        <a class="list-group-item active text-white" href="<?php echo trim($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'test'));?>
">

                            <h3 class="list-group-item-heading text-white">

                                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>(($tmp = @$_smarty_tpl->tpl_vars['feeds']->value['post_details'])===null||$tmp==='' ? 'User' : $tmp)), true);?>
 &nbsp;

                                <i class="text-center fa fa-angle-right"></i> &nbsp;


                                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'is_position_valid', array('param'=>(($tmp = @$_smarty_tpl->tpl_vars['feeds']->value['position_target_user'])===null||$tmp==='' ? 'Any position' : $tmp)), true);?>




                            </h3>
                        </a>


                    </div>
                </div>

            </div>
        </div>


    <?php }?>









    <?php if ($_smarty_tpl->tpl_vars['feeds']->value['feedsType'] == "D") {?>




        <div class="social-feed-separated scoa-video" id="<?php echo $_smarty_tpl->tpl_vars['feeds']->value['feedsId'];?>
" >


            <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'profile');?>


            <div class="social-feed-box">

                <?php echo $_smarty_tpl->tpl_vars['dropdown']->value;?>


                <div class="social-avatar">

                    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'interval');?>


                    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_name', array('param'=>$_smarty_tpl->tpl_vars['feeds']->value), true);?>


                    <?php if ($_smarty_tpl->tpl_vars['feeds']->value['notify_state']) {?>

                        posted an <strong>Announcement</strong>

                        <i class="fa fa-bookmark text-warning"></i>

                    <?php } else { ?>

                        posted a post

                    <?php }?>


                    <?php if ($_smarty_tpl->tpl_vars['feeds']->value['r_code']) {?>

                        on

                        <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'org_dept');?>


                    <?php }?>


                    <br>

                    <?php if ($_smarty_tpl->tpl_vars['feeds']->value['notify_state']) {?>

                        <i class="fa fa-bullhorn text-success animated tada infinite"></i>

                    <?php }?>

                    <small class="text-muted"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['feeds']->value['PDT']), true);?>
</small>

                </div>


                <div class="social-body">

                    <?php if (trim($_smarty_tpl->tpl_vars['feeds']->value['body'])) {?>

                        <p class="m-b-md">
                            <?php echo $_smarty_tpl->tpl_vars['feeds']->value['body'];?>

                        </p>

                    <?php }?>

                    <?php echo $_smarty_tpl->tpl_vars['file_body']->value;?>


                </div>



            </div>


        </div>



    <?php }?>
















    <?php if ($_smarty_tpl->tpl_vars['feeds']->value['m_requestType'] == "A") {?>


        <div class="social-feed-separated" id="<?php echo $_smarty_tpl->tpl_vars['feeds']->value['feedsId'];?>
">


            <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'profile');?>


            <div class="social-feed-box">



                <div class="social-avatar">

                    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'interval');?>


                    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_name', array('param'=>$_smarty_tpl->tpl_vars['feeds']->value), true);?>


                    sent a request to join

                    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'org_dept');?>


                    <br>
                    <small class="text-muted"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['feeds']->value['PDT']), true);?>
</small>

                </div>


                <div class="social-body">

                    <div class="list-group">
                        <a class="list-group-item" href="<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'test');?>
">

                            <h3 class="list-group-item-heading text-muted">

                                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>(($tmp = @$_smarty_tpl->tpl_vars['feeds']->value)===null||$tmp==='' ? 'User' : $tmp)), true);?>
 &nbsp;

                                <i class="text-center fa fa-angle-right"></i> &nbsp;


                                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'is_position_valid', array('param'=>(($tmp = @$_smarty_tpl->tpl_vars['feeds']->value)===null||$tmp==='' ? 'Any position' : $tmp)), true);?>




                            </h3>
                        </a>

                    </div>

                </div>



            </div>
        </div>


    <?php }?>







    <?php if ($_smarty_tpl->tpl_vars['feeds']->value['feedsType'] == "E") {?>



        <?php if ($_smarty_tpl->tpl_vars['feeds']->value['isMemberState']) {?>


            <div class="social-feed-separated" id="<?php echo $_smarty_tpl->tpl_vars['feeds']->value['feedsId'];?>
">


                <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'profile');?>


                <div class="social-feed-box">


                    <div class="social-avatar">

                        <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'interval');?>


                        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_name', array('param'=>$_smarty_tpl->tpl_vars['feeds']->value), true);?>


                        respond to the organizaton requirement

                        <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'org_dept');?>


                        <br>
                        <small class="text-muted">

                            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['feeds']->value['PDT']), true);?>


                            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'approval_state', array('param'=>$_smarty_tpl->tpl_vars['feeds']->value), true);?>



                        </small>




                    </div>


                    <div class="social-body">

                        <?php if ($_smarty_tpl->tpl_vars['feeds']->value['submissionBody']) {?>

                            <p><?php echo $_smarty_tpl->tpl_vars['feeds']->value['submissionBody'];?>
</p>

                        <?php }?>


                        <div class="list-group">


                            <a class="list-group-item text-muted" data-toggle="modal"  href="#FSModal">

                                <h3 class="list-group-item-heading">

                                    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checklist_name', array('type'=>trim($_smarty_tpl->tpl_vars['feeds']->value['checklistType'])), true);?>


                                    &nbsp;

                                    <i class="text-center fa fa-angle-right"></i> &nbsp;

                                    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'is_position_valid', array('param'=>(($tmp = @$_smarty_tpl->tpl_vars['feeds']->value)===null||$tmp==='' ? 'Any position' : $tmp)), true);?>


                                </h3>


                            </a>


                        </div>


                        <?php if (count($_smarty_tpl->tpl_vars['feeds']->value['files'])) {?>

                            <p class="small">

                            <span>
                                <i class="fa fa-paperclip"></i>
                                <?php echo count($_smarty_tpl->tpl_vars['feeds']->value['files']);?>
 attachments -
                            </span>

                                <a href="#">Download all</a>

                                <?php echo $_smarty_tpl->tpl_vars['file_body']->value;?>


                            </p>


                        <?php }?>



                    </div>


                </div>

            </div>




        <?php } else { ?>



            <div class="social-feed-separated" id="<?php echo $_smarty_tpl->tpl_vars['feeds']->value['feedsId'];?>
">


                <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'profile');?>


                <div class="social-feed-box">



                    <div class="social-avatar">

                        <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'interval');?>


                        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_name', array('param'=>$_smarty_tpl->tpl_vars['feeds']->value), true);?>


                        submit a requirement

                        <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'org_dept');?>


                        <br>
                        <small class="text-muted"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['feeds']->value['PDT']), true);?>
</small>

                    </div>


                    <div class="social-body">

                        <div class="well">

                            <big>
                                <strong>

                                    <p>

                                        <a href="javascript:void 0">
                                            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checklist_name', array('type'=>trim($_smarty_tpl->tpl_vars['feeds']->value['checklistType'])), true);?>

                                        </a>


                                    </p>

                                </strong>
                            </big>




                            <?php echo $_smarty_tpl->tpl_vars['feeds']->value['submissionBody'];?>



                            <div style="margin-top: 10px" class="mail-attachment">
                                <p>
                                    <span><i class="fa fa-paperclip"></i> <?php echo count($_smarty_tpl->tpl_vars['feeds']->value['files']);?>
 attachments - </span>
                                    <a href="#">Download all</a>
                                </p>


                                <?php echo $_smarty_tpl->tpl_vars['file_body']->value;?>



                            </div>




                        </div>

                    </div>



                </div>
            </div>



        <?php }?>



    <?php }?>






















    <?php if ($_smarty_tpl->tpl_vars['feeds']->value['feedsType'] == "F") {?>



        <?php $_smarty_tpl->_assignInScope('attach', $_smarty_tpl->tpl_vars['feeds']->value['post_details']['attachment']);?>





        <div class="social-feed-separated" id="<?php echo $_smarty_tpl->tpl_vars['feeds']->value['feedsId'];?>
">


            <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'profile');?>


            <div class="social-feed-box">


                <div class="social-avatar">

                    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'interval');?>


                    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_name', array('param'=>$_smarty_tpl->tpl_vars['feeds']->value), true);?>


                    respond to organization post

                    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'org_dept');?>


                    <br>

                    <small class="text-muted">

                        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['feeds']->value['PDT']), true);?>


                        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'approval_state', array('param'=>$_smarty_tpl->tpl_vars['attach']->value[0]), true);?>



                    </small>

                </div>


                <div class="social-body">

                    <p><?php echo trim($_smarty_tpl->tpl_vars['feeds']->value['post_details']['body']);?>
</p>



                    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\misc\\feeds_content_attachments.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
?>


                    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'attachment', array('param'=>$_smarty_tpl->tpl_vars['feeds']->value['post_details']['attachment']), true);?>


                </div>


            </div>
        </div>


    <?php }?>





<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>




<?php }
}
