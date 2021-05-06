<?php
/* Smarty version 3.1.33, created on 2019-05-13 04:48:14
  from 'C:\laragon\www\SCOA\public\included_template\misc\feeds_content_attachments.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd8868ed74457_16573567',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0fce5caba964323f1f904a5f56154ab74817baf2' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\public\\included_template\\misc\\feeds_content_attachments.tpl',
      1 => 1555259611,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd8868ed74457_16573567 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'attachment' => 
  array (
    'compiled_filepath' => 'C:\\laragon\\www\\SCOA\\public\\templates_c\\0fce5caba964323f1f904a5f56154ab74817baf2_0.file.feeds_content_attachments.tpl.php',
    'uid' => '0fce5caba964323f1f904a5f56154ab74817baf2',
    'call_name' => 'smarty_template_function_attachment_16330377495cd8868ec4b618_02373693',
  ),
));
?>


<?php }
/* smarty_template_function_attachment_16330377495cd8868ec4b618_02373693 */
if (!function_exists('smarty_template_function_attachment_16330377495cd8868ec4b618_02373693')) {
function smarty_template_function_attachment_16330377495cd8868ec4b618_02373693(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>



    <?php $_smarty_tpl->_assignInScope('feeds', $_smarty_tpl->tpl_vars['param']->value[0]);?>


    <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'ByInterval', null, null);?>

        <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'getIntervalByShorthand', array('strEnd'=>$_smarty_tpl->tpl_vars['feeds']->value['PDT']), true);
$_smarty_tpl->assign("interval", ob_get_clean());?>


        <small class="pull-right text-navy"><?php echo $_smarty_tpl->tpl_vars['interval']->value;?>
</small>

    <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>



    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\misc\\feeds_contents_plugin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
?>



    <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'inner_profile', null, null);?>

        <a href="javascript: void 0" class="pull-left">


            <?php if (!$_smarty_tpl->tpl_vars['feeds']->value['isStaff']) {?>


                <img alt="image" class="profile" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/profile/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['feeds']->value['profile'])===null||$tmp==='' ? "1.jpg" : $tmp);?>
">

            <?php } else { ?>

                <img alt="image" class="profile" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/scoa.png">

            <?php }?>

        </a>


    <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>



       <div class="social-feed-box center-block no-margins">

           <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'download_dropdown');?>



           <div class="social-avatar">

               <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'ByInterval');?>


               <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'inner_profile');?>


               <div class="media-body">

                   <a href="#">
                       <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_name', array('param'=>$_smarty_tpl->tpl_vars['feeds']->value), true);?>

                   </a>

                   <small class="text-muted"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['feeds']->value['PDT']), true);?>
</small>

               </div>


           </div>


           <div class="social-body">

               <br>

               <div class="well bg-white">

                   <big>
                       <strong>

                           <p>
                               <a href="javascript:void 0">

                                   <?php if ($_smarty_tpl->tpl_vars['feeds']->value['submissionState'] != -1) {?>

                                       <i class="fa fa-check"></i>

                                   <?php }?>


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



<?php
}}
/*/ smarty_template_function_attachment_16330377495cd8868ec4b618_02373693 */
}
