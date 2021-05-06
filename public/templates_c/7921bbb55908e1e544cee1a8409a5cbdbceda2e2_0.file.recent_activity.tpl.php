<?php
/* Smarty version 3.1.33, created on 2021-05-06 12:27:48
  from 'C:\xampp\htdocs\scoa\app\views\Users\misc\recent_activity.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_609370446b4495_79340603',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7921bbb55908e1e544cee1a8409a5cbdbceda2e2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\scoa\\app\\views\\Users\\misc\\recent_activity.tpl',
      1 => 1553489450,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609370446b4495_79340603 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\scoa\\app\\core\\Smarty\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),1=>array('file'=>'C:\\xampp\\htdocs\\scoa\\app\\core\\Smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>


<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\Misc\\feeds_contents_plugin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 32, true);
?>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\global_functions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 32, true);
?>


<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['activity']->value, 'post', false, 'feeds');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['feeds']->value => $_smarty_tpl->tpl_vars['post']->value) {
?>



    <?php if (!$_smarty_tpl->tpl_vars['post']->value['org_info']) {?> <?php continue 1;?> <?php }?>

    
    <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'link', null, null);?> <?php echo $_smarty_tpl->tpl_vars['public']->value;?>
feeds/<?php echo $_smarty_tpl->tpl_vars['post']->value['org_info']['url'];?>
 <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>






    <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'user_name', null, null);?>

        <a href="javascript:void 0">

            <?php if (!$_smarty_tpl->tpl_vars['post']->value['isStaff']) {?>

                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>(($tmp = @$_smarty_tpl->tpl_vars['post']->value)===null||$tmp==='' ? 'User' : $tmp)), true);?>


            <?php } else { ?>

                Student’s Commission on Audit (SCOA)

            <?php }?>


        </a>

    <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>








    <?php if ($_smarty_tpl->tpl_vars['post']->value['feedsType'] == "D") {?>


        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'body', null, null);?>


            <?php if (count($_smarty_tpl->tpl_vars['post']->value['files']) === 1) {?>


                <?php $_smarty_tpl->_assignInScope('file_attributes', $_smarty_tpl->tpl_vars['post']->value['files'][0]);?>

                <?php $_smarty_tpl->_assignInScope('type', FILE::get_fileType($_smarty_tpl->tpl_vars['file_attributes']->value['fname']));?>



                <?php if ($_smarty_tpl->tpl_vars['type']->value === "video") {?>

                    uploaded a video on

                    <a href="<?php echo trim($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'link'));?>
"><?php echo (($tmp = @smarty_modifier_capitalize($_smarty_tpl->tpl_vars['post']->value['org_info']['name'],true,true))===null||$tmp==='' ? 'your organization' : $tmp);?>

                    </a>.


                    <p><small class="text-muted"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['post']->value['PDT']), true);?>
</small></p>

                    <div class="list-group background-white">


                        <a class="list-group-item text-success" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/upload/<?php echo $_smarty_tpl->tpl_vars['file_attributes']->value['file'];?>
">
                            <i class="fa fa-download"></i>&nbsp;Download Video
                        </a>


                    </div>



                <?php } elseif ($_smarty_tpl->tpl_vars['type']->value === "image") {?>


                    posted a photo on <a href="<?php echo trim($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'link'));?>
"><?php echo (($tmp = @smarty_modifier_capitalize($_smarty_tpl->tpl_vars['post']->value['org_info']['name'],true,true))===null||$tmp==='' ? 'your organization' : $tmp);?>
</a>.


                    <p><small class="text-muted"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['post']->value['PDT']), true);?>
</small></p>

                    <div class="photos">
                        <a href="<?php echo trim($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'link'));?>
"> <img alt="image" class="feed-photo cover" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/upload/<?php echo $_smarty_tpl->tpl_vars['file_attributes']->value['file'];?>
"></a>
                    </div>


                <?php }?>



            <?php } else { ?>



                posted on <a href="<?php echo trim($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'link'));?>
"><?php echo (($tmp = @smarty_modifier_capitalize($_smarty_tpl->tpl_vars['post']->value['org_info']['name'],true,true))===null||$tmp==='' ? 'your organization' : $tmp);?>
</a>.


                <p><small class="text-muted"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['post']->value['PDT']), true);?>
</small></p>

                <p>

                    <?php echo htmlentities($_smarty_tpl->tpl_vars['post']->value['body']);?>


                </p>




            <?php }?>





        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>







        <div class="feed-element" id="<?php echo $_smarty_tpl->tpl_vars['post']->value['feedsId'];?>
">
            <a href="#" class="pull-left">

                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'set_profile', array('class'=>"img-circle",'profile'=>$_smarty_tpl->tpl_vars['post']->value['profile'],'firstname'=>$_smarty_tpl->tpl_vars['post']->value['Firstname'],'isStaff'=>$_smarty_tpl->tpl_vars['post']->value['isStaff']), true);?>


            </a>
            <div class="media-body ">

                <a href=""><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'user_name');?>
</a>

                <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'body');?>


            </div>
        </div>



    <?php }?>








    <?php if ($_smarty_tpl->tpl_vars['post']->value['feedsType'] == "A") {?>



        <div class="feed-element" id="<?php echo $_smarty_tpl->tpl_vars['post']->value['feedsId'];?>
">
            <a href="#" class="pull-left">

                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'set_profile', array('class'=>"img-circle",'profile'=>$_smarty_tpl->tpl_vars['post']->value['profile'],'firstname'=>$_smarty_tpl->tpl_vars['post']->value['Firstname'],'isStaff'=>$_smarty_tpl->tpl_vars['post']->value['isStaff']), true);?>


            </a>
            <div class="media-body ">

                <a href="">

                    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'user_name');?>


                </a>


                sent a request to create new <a href="<?php echo trim($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'link'));?>
">organization</a>.

                <p><small class="text-muted"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['post']->value['PDT']), true);?>
</small></p>

                <div class="well">
                    <h5>
                        <a href="javascript:void 0">
                            <i class="fa fa-send"></i>&nbsp; <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['post']->value['org_info']['name'],true,true);?>

                        </a>

                        &nbsp; > &nbsp;

                        <a href="#">SCOA</a>

                    </h5>

                    <p>
                        <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['post']->value['org_info']['details'],570,'&nbsp;<a href="#">See more...</a>');?>
.
                    </p>


                </div>

            </div>
        </div>

    <?php }?>






    <?php if ($_smarty_tpl->tpl_vars['post']->value['m_requestType'] == "A") {?>

        <div class="feed-element" id="<?php echo $_smarty_tpl->tpl_vars['post']->value['feedsId'];?>
">
            <a href="#" class="pull-left">

                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'set_profile', array('class'=>"img-circle",'profile'=>$_smarty_tpl->tpl_vars['post']->value['profile'],'firstname'=>$_smarty_tpl->tpl_vars['post']->value['Firstname'],'isStaff'=>$_smarty_tpl->tpl_vars['post']->value['isStaff']), true);?>



            </a>
            <div class="media-body ">

                <a href=""><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'user_name');?>
</a>

                sent a request to join on <a href="#"><?php echo (($tmp = @smarty_modifier_capitalize($_smarty_tpl->tpl_vars['post']->value['org_info']['name'],true,true))===null||$tmp==='' ? 'your organization' : $tmp);?>
</a>.

                <p><small class="text-muted"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['post']->value['PDT']), true);?>
</small></p>

                <div class="well">

                    <h5>


                        <i class="fa fa-shield"></i>&nbsp;

                        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'position', array('param'=>(($tmp = @$_smarty_tpl->tpl_vars['post']->value['position_target_user'])===null||$tmp==='' ? 'Any position' : $tmp)), true);?>


                        &nbsp; > &nbsp;

                        <a href="#"><?php echo (($tmp = @smarty_modifier_capitalize($_smarty_tpl->tpl_vars['post']->value['org_info']['name'],true,true))===null||$tmp==='' ? 'your organization' : $tmp);?>
</a>

                    </h5>

                </div>


            </div>
        </div>

    <?php }?>











    <?php if ($_smarty_tpl->tpl_vars['post']->value['m_requestType'] == "B") {?>



        <div class="feed-element" id="<?php echo $_smarty_tpl->tpl_vars['post']->value['feedsId'];?>
">
            <a href="#" class="pull-left">


                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'set_profile', array('class'=>"img-circle",'profile'=>$_smarty_tpl->tpl_vars['post']->value['profile'],'firstname'=>$_smarty_tpl->tpl_vars['post']->value['Firstname'],'isStaff'=>$_smarty_tpl->tpl_vars['post']->value['isStaff']), true);?>


            </a>
            <div class="media-body ">

                <a href="javascript:void 0">
                    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'user_name');?>

                </a>

                approved a request to join



                <?php if (!($_smarty_tpl->tpl_vars['post']->value['user_url'] == $_smarty_tpl->tpl_vars['post']->value['post_details']['user_url'])) {?>


                    <a href="javascript:void 0"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>(($tmp = @$_smarty_tpl->tpl_vars['post']->value['post_details'])===null||$tmp==='' ? 'User' : $tmp)), true);?>
</a>


                <?php }?>


                as a position of

                <strong>
                    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'position', array('param'=>(($tmp = @$_smarty_tpl->tpl_vars['post']->value['position_target_user'])===null||$tmp==='' ? 'Any position' : $tmp)), true);?>

                </strong>.

                <p><small class="text-muted"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['post']->value['PDT']), true);?>
</small></p>

                <div class="well">
                    <h5>
                        <a href="javascript:void 0">
                            <i class="fa fa-check"></i>&nbsp; <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['post']->value['org_info']['name'],true,true);?>

                        </a>

                        &nbsp; > &nbsp;

                        <a href="#"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>(($tmp = @$_smarty_tpl->tpl_vars['post']->value['post_details'])===null||$tmp==='' ? 'User' : $tmp)), true);?>
</a>

                    </h5>

                    <p>
                        <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['post']->value['org_info']['details'],570,'&nbsp;<a href="#">See more...</a>');?>
.
                    </p>


                </div>


            </div>
        </div>

    <?php }?>




    <?php
}
} else {
?>



    <div>

        <h2 class="text-center">No recent activity</h2>

    </div>


<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php }
}
