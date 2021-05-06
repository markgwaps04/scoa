<?php
/* Smarty version 3.1.33, created on 2019-05-13 04:54:39
  from 'C:\laragon\www\SCOA\app\views\Misc\newFS.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd8880fa29094_45299185',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5b1d2c1389b501573b6a8d63066605df8b8429f' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\app\\views\\Misc\\newFS.tpl',
      1 => 1556591661,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd8880fa29094_45299185 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\global_functions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 32, true);
?>


<?php $_smarty_tpl->_assignInScope('org', $_smarty_tpl->tpl_vars['user_club']->value);?>


<?php $_smarty_tpl->_assignInScope('batchDetails', $_smarty_tpl->tpl_vars['checklist_class']->value->getBatchDetails());?>



<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'message', null, null);?>

    <?php if (!$_smarty_tpl->tpl_vars['batchDetails']->value['isDeadlineSet']) {?>


        <div class="alert semi-primary-background alert-dismissable">
            
            <i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;

            Hi

            <a class="alert-link" href="#">
                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>$_smarty_tpl->tpl_vars['_currentUser']->value), true);?>

            </a>

            as of now the scoa staff is not setted the deadline for this batch you can't
            approved the organization requirements this time.

        </div>


    <?php }?>


<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>


<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'fs_contents', null, null);?>


    <div class="tabs-container">
        <ul class="nav nav-tabs">

            <li class="active">
                <a data-toggle="tab" href="#tab-3" aria-expanded="true">
                    <b>Collection Report</b>
                </a>
            </li>

            <li class="">
                <a data-toggle="tab" href="#tab-4" aria-expanded="false">
                    <b>Cash Received</b>
                </a>
            </li>

            <li class="">
                <a data-toggle="tab" href="#tab-5" aria-expanded="false">
                    <b>Cash Flows</b>
                </a>
            </li>

            <li class="">
                <a data-toggle="tab" href="#tab-6" aria-expanded="false">
                    <b>Notes of Cash Disbursement</b>
                </a>
            </li>



        </ul>
        <div class="tab-content">

            <div id="tab-3" class="tab-pane active">

                <div class="panel-body">

                    <div id="collection_report_fs_table"></div>

                </div>

            </div>


            <div id="tab-4" class="tab-pane">
                <div class="panel-body">

                    <div id="collection_received_fs_table"></div>

                </div>
            </div>

            <div id="tab-5" class="tab-pane">
                <div class="panel-body">

                    <div id="collection_flow_fs_table"></div>

                </div>
            </div>


            <div id="tab-6" class="tab-pane">
                <div class="panel-body">

                    <div id="note_disbursement"></div>

                </div>
            </div>

            <div id="error_spreadsheet" class="hidden" onload="$(this).remove()"></div>

        </div>
    </div>


<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>





<link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/spreadsheet/material_message.css" rel="stylesheet"></link>

<link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/datapicker/datepicker3.css" rel="stylesheet">



<div class="row">


    <div class="col-lg-12">



    </div>



    <div class="col-lg-12 hidden" id="fs_main_container">


        <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'message');?>



        <?php if ($_smarty_tpl->tpl_vars['batchDetails']->value['isDeadlineSet']) {?>


            <?php $_smarty_tpl->_assignInScope('__FS', $_smarty_tpl->tpl_vars['checklist_class']->value->FS($_smarty_tpl->tpl_vars['org']->value['RCode']));?>

            <?php $_smarty_tpl->_assignInScope('validSign', $_smarty_tpl->tpl_vars['__FS']->value->is_valid_to_sign());?>



            <?php if ($_smarty_tpl->tpl_vars['validSign']->value == "1") {?>


                <div class="alert alert-dark" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->

                    <i class="fa fa-angle-left" style="font-size: 19px;vertical-align: bottom"></i>&nbsp;
                    <a class="alert-link" href="javascript:void 0" id="back_to_feeds">Back to feeds</a>

                    <div class="pull-right">

                        <i class="fa fa-times-circle text-info" style="font-size: 14px;"></i>&nbsp;
                        <a class="alert-link text-info" href="javascript:void 0" method="member_decline" id="FS_submit">Decline</a>

                    </div>

                </div>


            <?php }?>



            <?php if ($_smarty_tpl->tpl_vars['validSign']->value != "1") {?>


                <div class="alert alert-dark" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->

                    <i class="fa fa-angle-left" style="font-size: 19px;vertical-align: bottom"></i>&nbsp;
                    <a class="alert-link" href="javascript:void 0" id="back_to_feeds">Back to feeds</a>

                    <div class="pull-right">

                        <i class="fa fa-check text-navy" style="font-size: 14px;"></i>&nbsp;
                        <a class="alert-link text-navy" href="javascript:void 0" id="FS_submit" method="member_approved">Approved</a>

                    </div>

                </div>



            <?php }?>





        <?php }?>



        <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'fs_contents');?>



    </div>



</div>



<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/spreadsheet/spreadsheet.js?pin=<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
&math=true" crossorigin="anonymous"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
scoa/scoa_newfs.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" crossorigin="anonymous"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/datapicker/bootstrap-datepicker.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/spreadsheet/dhtmlxmessage.js?pin=<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
&math=true" crossorigin="anonymous"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/canvasJs/canvasjs.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/breeze/lodash.js?pin=<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" crossorigin="anonymous"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
>


    $("#fs_main_container").ready(function () {



        $("#fs_main_container").toggleClass("hidden");

        $("#spreadsheet_container").removeClass("sk-loading");




        $("#back_to_feeds").click(function() {

            $("#fs_content_wrapper").remove();

            $("#parent_wrapper").toggleClass("hidden");

        })

    });


<?php echo '</script'; ?>
>








<?php }
}
