<?php
/* Smarty version 3.1.33, created on 2019-05-13 04:43:59
  from 'C:\laragon\www\SCOA\app\views\admin\index\misc\inbox_comments.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd8858fa142c6_70322706',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '953cb0191175e2b16f7a402c52a1551975b89793' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\app\\views\\admin\\index\\misc\\inbox_comments.tpl',
      1 => 1552966531,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd8858fa142c6_70322706 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\global_functions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
?>


<?php $_smarty_tpl->_assignInScope('pin', mt_rand(0,1000));?>




<style>

    .xx-small {

        font-size: xx-small;
    }

</style>




<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['post_details']->value, 'info', false, 'every');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every']->value => $_smarty_tpl->tpl_vars['info']->value) {
?>


    <?php if ($_smarty_tpl->tpl_vars['info']->value['feedsType'] == "F") {?>

        <div class="social-feed-box no-borders no-margins">

            <div class="social-footer">

                <div class="social-comment">

                    <?php if ($_smarty_tpl->tpl_vars['info']->value['isStaff']) {?>

                        <a href="" class="pull-left">
                            <img alt="image" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/scoa.png" class="profile" letters="<?php echo substr($_smarty_tpl->tpl_vars['info']->value['staffFirstname'],0,1);?>
">
                        </a>

                    <?php }?>



                    <div class="media-body">



                        <a href="javascript:void 0"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>$_smarty_tpl->tpl_vars['info']->value), true);?>
</a>


                        <?php if ($_smarty_tpl->tpl_vars['info']->value['isStaff']) {?>


                            <?php if ($_smarty_tpl->tpl_vars['info']->value['post_details']['state'] == "0") {?>

                            <span class="pull-right">

                                <span class="label label-warning xx-small">Pending</span>

                            </span>


                            <?php }?>



                            <?php if ($_smarty_tpl->tpl_vars['info']->value['post_details']['state'] == "1") {?>

                                <span class="pull-right">

                                <span class="label label-primary xx-small">Approved</span>

                            </span>


                            <?php }?>




                            <?php if ($_smarty_tpl->tpl_vars['info']->value['post_details']['state'] == "2") {?>

                                <span class="pull-right">

                                <span class="label label-info xx-small">Respond</span>

                            </span>


                            <?php }?>


                            <?php if ($_smarty_tpl->tpl_vars['info']->value['post_details']['state'] == "-1") {?>

                                <span class="pull-right">

                                <span class="label label-danger xx-small">Un approved</span>

                            </span>


                            <?php }?>



                        <?php }?>

                        <p>
                            <?php echo htmlspecialchars(trim($_smarty_tpl->tpl_vars['info']->value['post_details']['body']));?>

                        </p>

                        <small class="text-muted"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['info']->value['PDT']), true);?>
</small>
                        -
                        <small class="text-muted"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'getIntervalByShorthand', array('strEnd'=>$_smarty_tpl->tpl_vars['info']->value['PDT']), true);?>
</small>

                    </div>
                </div>

            </div>



        </div>

    <?php }?>




<?php
}
} else {
?>


    <div class="social-feed-box no-borders no-margins">

        <div class="social-footer">

            <div class="social-comment">

                <h5 class="text-center">No Activity's</h5>

            </div>

        </div>



    </div>


<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php }
}
