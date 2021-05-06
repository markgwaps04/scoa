<?php
/* Smarty version 3.1.33, created on 2019-05-11 20:04:49
  from 'C:\laragon\www\SCOA\public\included_template\Misc\feeds_contents_plugin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd6ba6166dcb3_50296641',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a9a787917c55eaaf1c0b92ecab6af87f840804c' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\public\\included_template\\Misc\\feeds_contents_plugin.tpl',
      1 => 1553102578,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd6ba6166dcb3_50296641 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'set_profile' => 
  array (
    'compiled_filepath' => 'C:\\laragon\\www\\SCOA\\public\\templates_c\\0a9a787917c55eaaf1c0b92ecab6af87f840804c_0.file.feeds_contents_plugin.tpl.php',
    'uid' => '0a9a787917c55eaaf1c0b92ecab6af87f840804c',
    'call_name' => 'smarty_template_function_set_profile_17467432435cd6ba6162e0e1_06858142',
  ),
  'user_name' => 
  array (
    'compiled_filepath' => 'C:\\laragon\\www\\SCOA\\public\\templates_c\\0a9a787917c55eaaf1c0b92ecab6af87f840804c_0.file.feeds_contents_plugin.tpl.php',
    'uid' => '0a9a787917c55eaaf1c0b92ecab6af87f840804c',
    'call_name' => 'smarty_template_function_user_name_17467432435cd6ba6162e0e1_06858142',
  ),
));
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),1=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>










<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'profile', null, null);?>


    <div class="social-avatar">

        <a href="javascript: void 0" class="<?php echo $_smarty_tpl->tpl_vars['profile_class']->value;?>
">


            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'set_profile', array('profile'=>$_smarty_tpl->tpl_vars['feeds']->value['profile'],'firstname'=>$_smarty_tpl->tpl_vars['feeds']->value['Firstname'],'isStaff'=>$_smarty_tpl->tpl_vars['feeds']->value['isStaff']), true);?>


            
                
                    
                
                    
                


            
                
            
        </a>
    </div>





<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>







<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'test', null, null);?>


    <?php if ($_smarty_tpl->tpl_vars['isStaff']->value && $_smarty_tpl->tpl_vars['user_model']->value) {?>


        <?php echo $_smarty_tpl->tpl_vars['public']->value;?>
//scoa_organization/view_info/<?php echo $_smarty_tpl->tpl_vars['feeds']->value['org_info']['RCode'];?>



    <?php } else { ?>

        <?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/organization/members/<?php echo $_smarty_tpl->tpl_vars['feeds']->value['org_info']['url'];?>



    <?php }?>




<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>














<?php if (count($_smarty_tpl->tpl_vars['feeds']->value['files'])) {?>




        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'download_dropdown', "dropdown", null);?>



            <div class="pull-right social-action dropdown">
                <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu m-t-xs">
                    <li><a target="_parent" href="#">Download files</a></li>
                </ul>
            </div>


        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>



        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'post_type', "post_type", null);?> uploaded a files <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>



        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'file_body', "file_body", null);?>

            <div class="row p-sm no-padding-bottom">


                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['feeds']->value['files'], 'file', false, 'every');
$_smarty_tpl->tpl_vars['file']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every']->value => $_smarty_tpl->tpl_vars['file']->value) {
$_smarty_tpl->tpl_vars['file']->index++;
$__foreach_file_2_saved = $_smarty_tpl->tpl_vars['file'];
?>

                    <?php $_smarty_tpl->_assignInScope('type', FILE::get_fileType($_smarty_tpl->tpl_vars['file']->value['fname']));?>



                    <?php if ($_smarty_tpl->tpl_vars['file']->index == 4 && !$_smarty_tpl->tpl_vars['skipLoadFile']->value) {?>

                        <div class="file-box loadInfo" id="scoa-files">
                            <div class="file no-borders">

                                <div class="big-icon-container">
                                    <button type="button"  class="btn btn-w-m btn-outline-info btn-primary full-width full-height">
                                        <h1><i class="fa fa-repeat"></i></h1>
                                        <h4 >Load more file</h4>
                                    </button>
                                </div>


                            </div>

                        </div>

                    <?php }?>





                    <div class="file-box <?php if ($_smarty_tpl->tpl_vars['file']->index > 3 && !$_smarty_tpl->tpl_vars['skipLoadFile']->value) {?>hidden<?php }?>" id="scoa-files">
                        <div class="file">

                            <span class="corner"></span>

                            <div class="file-name">

                                <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/upload/<?php echo $_smarty_tpl->tpl_vars['file']->value['file'];?>
">
                                    <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['file']->value['fname'],20,"....");?>

                                </a>

                                <br>
                                <small>Added: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['feeds']->value['PDT'],"%B %e,%y");?>
</small>
                            </div>


                            <?php if ($_smarty_tpl->tpl_vars['type']->value === "image") {?>


                                <div class="image file-type">

                                    <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/upload/<?php echo $_smarty_tpl->tpl_vars['file']->value['file'];?>
" data-gallery="">


                                        <img class="scoa-img-responsive img-responsive cover no-margins" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/upload/<?php echo $_smarty_tpl->tpl_vars['file']->value['file'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['file']->value['fname'];?>
"/>

                                    </a>


                                </div>


                            <?php }?>




                            <?php if ($_smarty_tpl->tpl_vars['type']->value === "video") {?>


                                <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/upload/<?php echo $_smarty_tpl->tpl_vars['file']->value['file'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['file']->value['fname'];?>
" type="video/mp4" data-gallery ></a>

                                <div class="video">
                                    <video class=""  ckin="compact" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/upload/<?php echo $_smarty_tpl->tpl_vars['file']->value['file'];?>
"></video>
                                </div>


                            <?php }?>





                            <?php if ($_smarty_tpl->tpl_vars['type']->value === "text") {?>


                                <div class="icon">
                                    <i class="img-responsive text-cadet-blue fa fa-file-text"></i>
                                </div>


                            <?php }?>



                            <?php if ($_smarty_tpl->tpl_vars['type']->value === "html") {?>


                                <div class="icon">
                                    <i class="img-responsive text-light-red fa fa-html5"></i>
                                </div>


                            <?php }?>




                            <?php if ($_smarty_tpl->tpl_vars['type']->value === "office" || $_smarty_tpl->tpl_vars['type']->value === "gdocs") {?>


                                <div class="icon">
                                    <i class="img-responsive text-blue  fa fa-file-word-o"></i>
                                </div>


                            <?php }?>





                            <?php if ($_smarty_tpl->tpl_vars['type']->value === "audio") {?>


                                <div class="audio">
                                    
                                    <audio ckin="compact" controls src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/upload/<?php echo $_smarty_tpl->tpl_vars['file']->value['file'];?>
"></audio>
                                </div>


                            <?php }?>






                            <?php if ($_smarty_tpl->tpl_vars['type']->value === "pdf") {?>


                                <div class="icon">
                                    <i class="img-responsive text-cadet-blue fa fa-file-pdf-o"></i>
                                </div>


                            <?php }?>




                            <?php if ($_smarty_tpl->tpl_vars['type']->value === "other") {?>


                                <div class="icon">
                                    <i class="img-responsive text-success fa fa-file"></i>
                                </div>


                            <?php }?>




                        </div>

                    </div>





                <?php
$_smarty_tpl->tpl_vars['file'] = $__foreach_file_2_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


            </div>




        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>



        <?php if (count($_smarty_tpl->tpl_vars['feeds']->value['files']) === 1 && !$_smarty_tpl->tpl_vars['skip']->value) {?>


            <?php $_smarty_tpl->_assignInScope('file_attributes', $_smarty_tpl->tpl_vars['feeds']->value['files'][0]);?>

            <?php $_smarty_tpl->_assignInScope('type', FILE::get_fileType($_smarty_tpl->tpl_vars['file_attributes']->value['fname']));?>


            <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'download_dropdown', "dropdown", null);?>

                <div class="pull-right social-action dropdown">
                    <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu m-t-xs">
                        <li>
                            <a target="_parent" href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/upload/<?php echo $_smarty_tpl->tpl_vars['file_attributes']->value['file'];?>
">Download
                                <?php if ($_smarty_tpl->tpl_vars['type']->value != "other") {?> <?php echo $_smarty_tpl->tpl_vars['type']->value;?>
 <?php } else { ?> file <?php }?>
                            </a>
                        </li>
                    </ul>
                </div>

            <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>



            <?php if ($_smarty_tpl->tpl_vars['type']->value === "video") {?>

                <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'post_type', "post_type", null);?> posted a video <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

                <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'file_body', "file_body", null);?>

                    <p>

                        <video src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/upload/<?php echo $_smarty_tpl->tpl_vars['file_attributes']->value['file'];?>
" data-overlay="1" data-ckin="compact" data-title="<?php echo $_smarty_tpl->tpl_vars['file_attributes']->value['fname'];?>
"></video>

                        <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/upload/<?php echo $_smarty_tpl->tpl_vars['file_attributes']->value['file'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['file_attributes']->value['file'];?>
" type="video/mp4" data-gallery></a>

                    </p>

                <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>



            <?php } elseif ($_smarty_tpl->tpl_vars['type']->value === "image") {?>

                <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'post_type', "post_type", null);?> posted a image <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>


                <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'file_body', "file_body", null);?>

                    <div class="lightBoxGallery">

                        <p class="text-center center-block">

                            <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/upload/<?php echo $_smarty_tpl->tpl_vars['file_attributes']->value['file'];?>
" data-gallery="">


                                <img class="no-margins scoa-image-feed" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/upload/<?php echo $_smarty_tpl->tpl_vars['file_attributes']->value['file'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['file_attributes']->value['fname'];?>
"/>


                            </a>

                        </p>


                        <div id="blueimp-gallery" class="blueimp-gallery">
                            <div class="slides"></div>
                            <h3 class="title"></h3>
                            <a class="prev">‹</a>
                            <a class="next">›</a>
                            <a class="close">×</a>
                            <a class="play-pause"></a>
                            <ol class="indicator"></ol>
                        </div>

                    </div>

                <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>





            <?php } elseif ($_smarty_tpl->tpl_vars['type']->value === "audio") {?>


                <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'post_type', "post_type", null);?> uploaded a audio <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>


                <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'file_body', "file_body", null);?>

                    <p>
                        <audio class="full-width" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/upload/<?php echo $_smarty_tpl->tpl_vars['file_attributes']->value['file'];?>
" controls></audio>
                    </p>

                <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>





            <?php }?>


        <?php }?>


    <?php }?>








<?php }
/* smarty_template_function_set_profile_17467432435cd6ba6162e0e1_06858142 */
if (!function_exists('smarty_template_function_set_profile_17467432435cd6ba6162e0e1_06858142')) {
function smarty_template_function_set_profile_17467432435cd6ba6162e0e1_06858142(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


    <?php if (!$_smarty_tpl->tpl_vars['isStaff']->value) {?>

        <?php if ($_smarty_tpl->tpl_vars['profile']->value) {?>

            <img alt="image" class="profile <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/profile/<?php echo $_smarty_tpl->tpl_vars['profile']->value;?>
">

        <?php } else { ?>

            <img alt="image" class="profile <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/profile/default/1.jpg" letters="<?php echo mb_strtoupper(substr($_smarty_tpl->tpl_vars['firstname']->value,0,1), 'UTF-8');?>
">

        <?php }?>



    <?php } else { ?>

        <img alt="image" class="profile <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/scoa.png">

    <?php }?>

<?php
}}
/*/ smarty_template_function_set_profile_17467432435cd6ba6162e0e1_06858142 */
/* smarty_template_function_user_name_17467432435cd6ba6162e0e1_06858142 */
if (!function_exists('smarty_template_function_user_name_17467432435cd6ba6162e0e1_06858142')) {
function smarty_template_function_user_name_17467432435cd6ba6162e0e1_06858142(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


    <a href="javascript:void 0">

        <?php if (!$_smarty_tpl->tpl_vars['param']->value['isStaff']) {?>

            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>(($tmp = @$_smarty_tpl->tpl_vars['param']->value)===null||$tmp==='' ? 'User' : $tmp)), true);?>


        <?php } else { ?>

            <?php if (!$_smarty_tpl->tpl_vars['isGlobalfeeds']->value) {?>

                Student’s Commission on Audit (SCOA)

            <?php } else { ?>

                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>(($tmp = @$_smarty_tpl->tpl_vars['param']->value)===null||$tmp==='' ? 'User' : $tmp)), true);?>


            <?php }?>


        <?php }?>


    </a>

<?php
}}
/*/ smarty_template_function_user_name_17467432435cd6ba6162e0e1_06858142 */
}
