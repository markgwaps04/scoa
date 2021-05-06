<?php
/* Smarty version 3.1.33, created on 2019-05-11 20:04:31
  from 'C:\laragon\www\SCOA\public\included_template\admin\admin_checklist.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd6ba4fd382b7_12448524',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '15bf175b4d2cf4d4168fae85c30f1f3ea719ef51' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\public\\included_template\\admin\\admin_checklist.tpl',
      1 => 1522553745,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd6ba4fd382b7_12448524 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'structure' => 
  array (
    'compiled_filepath' => 'C:\\laragon\\www\\SCOA\\public\\templates_c\\15bf175b4d2cf4d4168fae85c30f1f3ea719ef51_0.file.admin_checklist.tpl.php',
    'uid' => '15bf175b4d2cf4d4168fae85c30f1f3ea719ef51',
    'call_name' => 'smarty_template_function_structure_7412520055cd6ba4fcee172_48461824',
  ),
  'header' => 
  array (
    'compiled_filepath' => 'C:\\laragon\\www\\SCOA\\public\\templates_c\\15bf175b4d2cf4d4168fae85c30f1f3ea719ef51_0.file.admin_checklist.tpl.php',
    'uid' => '15bf175b4d2cf4d4168fae85c30f1f3ea719ef51',
    'call_name' => 'smarty_template_function_header_7412520055cd6ba4fcee172_48461824',
  ),
  'tabs' => 
  array (
    'compiled_filepath' => 'C:\\laragon\\www\\SCOA\\public\\templates_c\\15bf175b4d2cf4d4168fae85c30f1f3ea719ef51_0.file.admin_checklist.tpl.php',
    'uid' => '15bf175b4d2cf4d4168fae85c30f1f3ea719ef51',
    'call_name' => 'smarty_template_function_tabs_7412520055cd6ba4fcee172_48461824',
  ),
));
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>



<?php $_smarty_tpl->_assignInScope('currentChecklist', $_smarty_tpl->tpl_vars['checklist_class']->value->getBatchDetails());?>




<?php $_smarty_tpl->_assignInScope('aop', $_smarty_tpl->tpl_vars['checklist_class']->value->getTypeObject("AOP"));?>


<?php $_smarty_tpl->_assignInScope('mam', $_smarty_tpl->tpl_vars['checklist_class']->value->getTypeObject("MAM"));?>


<?php $_smarty_tpl->_assignInScope('cbl', $_smarty_tpl->tpl_vars['checklist_class']->value->getTypeObject("CBL"));?>


<?php $_smarty_tpl->_assignInScope('fs', $_smarty_tpl->tpl_vars['checklist_class']->value->getTypeObject("FS"));?>


<?php $_smarty_tpl->_assignInScope('de', $_smarty_tpl->tpl_vars['checklist_class']->value->getTypeObject("DE"));?>






<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20996636355cd6ba4fcf6805_50379261', 'head');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3842249845cd6ba4fcf9d43_38432128', 'script');
?>


















<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'action', null, null);?>



    <div class="vote-item checklist m-b-lg">

        <div class="row">

            <div class="col-md-3">

                <div class="vote-info no-margin-left">

                    <div class="form-group" id="date">

                        <label class="font-normal">Deadline</label>

                        <div class="input-group date">

                            <span class="input-group-addon">
                                <i class="hover-text-success fa fa-calendar"></i>
                            </span>


                            <input type="text" readonly name="date" class="form-control bg-unset" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['currentChecklist']->value['deadline'],'%A, %b %e, %Y'))===null||$tmp==='' ? 'Not set' : $tmp);?>
">

                        </div>

                    </div>

                </div>

            </div>


            <div class="col-md-3">

                <div class="vote-info no-margin-left">



                    <div class="form-group" id="data_1">

                        <label class="font-normal">Time</label>

                        <div class="input-group clockpicker" data-autoclose="true">

                            <span class="input-group-addon">
                                <i class="fa fa-clock-o hover-text-success"></i>
                            </span>

                            <input type="text" name="time" readonly class="form-control bg-unset" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['currentChecklist']->value['deadline'],'H:m'))===null||$tmp==='' ? '00:00' : $tmp);?>
">

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <button class="btn btn-sm btn-primary valign-n-1" type="submit">Save</button>

            </div>

            <div class="col-md-12">

                <p> <span class="text-success"><i class="fa fa-info-circle"></i></span> Should have atleast one renewable organization</p>


                <?php $_smarty_tpl->_assignInScope('isDeadlineSet', $_smarty_tpl->tpl_vars['checklist_class']->value->getBatchDetails());?>


                <?php if (!$_smarty_tpl->tpl_vars['isDeadlineSet']->value['isDeadlineSet']) {?>

                    <p> <span class="text-warning"><i class="fa fa-info-circle"></i></span>
                        Deadline of current batch not set
                    </p>

                <?php }?>



                <?php if (!$_smarty_tpl->tpl_vars['checklist_class']->value->isDeadline()) {?>

                    <p> <span class="text-warning"><i class="fa fa-info-circle"></i></span>
                        Time out
                    </p>

                <?php }?>








            </div>


        </div>


    </div>



<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>


























<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'aop', null, null);?>




    <div class="vote-item checklist no-borders">

        <div class="row">


            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'header', array('title'=>'Annual Operating Plan (Secure a copy from SCOA)','source'=>$_smarty_tpl->tpl_vars['aop']->value), true);?>


            <div class="col-md-1">

                <a data-toggle="collapse" data-parent="#accordion" href="#scoa1" aria-expanded="true"  class="btn btn-white btn-circle btn-lg edit" type="button"  for="201">
                    <i class="valign-middle fa fa-edit active"></i>
                </a>

            </div>



        </div>


    </div>



<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>



<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'aop_body', null, null);?>


    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'tabs', array('source'=>$_smarty_tpl->tpl_vars['aop']->value,'startingID'=>0), true);?>



<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>











<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'mam', null, null);?>



    <div class="vote-item checklist no-borders">

        <div class="row">


            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'header', array('title'=>"Minutes from the Activity's meeting",'source'=>$_smarty_tpl->tpl_vars['mam']->value), true);?>



            <div class="col-md-1">

                <a data-toggle="collapse" data-parent="#accordion" href="#scoa2" aria-expanded="true"  class="btn btn-white btn-circle btn-lg edit" type="button"  for="201">
                    <i class="valign-middle fa fa-edit active"></i>
                </a>

            </div>

        </div>


    </div>



<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>



<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'mam_body', null, null);?>

    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'tabs', array('source'=>$_smarty_tpl->tpl_vars['mam']->value,'startingID'=>5), true);?>


<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>


















<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'cbl', null, null);?>


    <div class="vote-item checklist no-borders">

        <div class="row">


            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'header', array('title'=>"CBL",'source'=>$_smarty_tpl->tpl_vars['cbl']->value), true);?>



            <div class="col-md-1">


                <a data-toggle="collapse" data-parent="#accordion" href="#scoa3" aria-expanded="true"  class="btn btn-white btn-circle btn-lg edit" type="button"  for="201">
                    <i class="valign-middle fa fa-edit active"></i>
                </a>

            </div>

        </div>


    </div>



<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>



<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'cbl_body', null, null);?>

    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'tabs', array('source'=>$_smarty_tpl->tpl_vars['cbl']->value,'startingID'=>10), true);?>


<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
















<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'fs', null, null);?>



    <div class="vote-item checklist no-borders">

        <div class="row">


            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'header', array('title'=>"Financial Statements",'source'=>$_smarty_tpl->tpl_vars['fs']->value), true);?>



            <div class="col-md-1">


                <a data-toggle="collapse" data-parent="#accordion" href="#scoa4" aria-expanded="true"  class="btn btn-white btn-circle btn-lg edit" type="button"  for="201">
                    <i class="valign-middle fa fa-edit active"></i>
                </a>

            </div>

        </div>


    </div>



<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>



<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'fs_body', null, null);?>

    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'tabs', array('source'=>$_smarty_tpl->tpl_vars['fs']->value,'startingID'=>15), true);?>


<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>













<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'de', null, null);?>



    <div class="vote-item checklist no-borders">

        <div class="row">


            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'header', array('title'=>"Documentary Evidence",'source'=>$_smarty_tpl->tpl_vars['de']->value), true);?>



            <div class="col-md-1">


                <a data-toggle="collapse" data-parent="#accordion" href="#scoa5" aria-expanded="true"  class="btn btn-white btn-circle btn-lg edit" type="button"  for="201">
                    <i class="valign-middle fa fa-edit active"></i>
                </a>

            </div>

        </div>


    </div>



<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>



<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'de_body', null, null);?>

    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'tabs', array('source'=>$_smarty_tpl->tpl_vars['de']->value,'startingID'=>20), true);?>


<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6670229395cd6ba4fd2d146_72321984', 'body');
?>







    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9986296235cd6ba4fd35da7_48364527', 'inner_script');
?>



<?php }
/* {block 'head'} */
class Block_20996636355cd6ba4fcf6805_50379261 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_20996636355cd6ba4fcf6805_50379261',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/clockpicker/clockpicker.css" rel="stylesheet">


<?php
}
}
/* {/block 'head'} */
/* {block 'script'} */
class Block_3842249845cd6ba4fcf9d43_38432128 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_3842249845cd6ba4fcf9d43_38432128',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <!-- Data picker -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/datapicker/bootstrap-datepicker.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/clockpicker/clockpicker.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/scoa/admin_checklist.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
"><?php echo '</script'; ?>
>


<?php
}
}
/* {/block 'script'} */
/* smarty_template_function_structure_7412520055cd6ba4fcee172_48461824 */
if (!function_exists('smarty_template_function_structure_7412520055cd6ba4fcee172_48461824')) {
function smarty_template_function_structure_7412520055cd6ba4fcee172_48461824(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>



    <div class="panel panel-default no-borders">

        <div class="panel-heading no-borders background-white no-padding">

            <div class="panel-title no-borders">

                <?php echo $_smarty_tpl->tpl_vars['title']->value;?>


            </div>


        </div>


        <div id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="panel-collapse collapse" aria-expanded="true" style="">

            <div class="panel-body p-lg">

                <?php echo $_smarty_tpl->tpl_vars['body']->value;?>


            </div>


        </div>

    </div>



<?php
}}
/*/ smarty_template_function_structure_7412520055cd6ba4fcee172_48461824 */
/* smarty_template_function_header_7412520055cd6ba4fcee172_48461824 */
if (!function_exists('smarty_template_function_header_7412520055cd6ba4fcee172_48461824')) {
function smarty_template_function_header_7412520055cd6ba4fcee172_48461824(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>



    <div class="col-md-11">


        <div class="vote-actions">

            <?php if ($_smarty_tpl->tpl_vars['source']->value->approved_list() && (!$_smarty_tpl->tpl_vars['source']->value->unsubmit_list() && !$_smarty_tpl->tpl_vars['source']->value->pending())) {?>

                <a href="#" class="vote-icon-success">
                    <i class="fa fa-check-circle"> </i>
                </a>

            <?php } else { ?>

                <a href="#" class="vote-icon-error">
                    <i class="fa fa-times-circle"> </i>
                </a>

            <?php }?>


        </div>

        <a href="#" class="vote-title text-success-important" ><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a>

        <div class="vote-info">
            <i class="fa fa-check-circle completed"></i> <a href="javascript: void 0">
                <?php echo count($_smarty_tpl->tpl_vars['source']->value->approved_list());?>
  Completed
            </a>
            <i class="fa fa-clock-o pending"></i> <a href="javascript: void 0">
                <?php echo count($_smarty_tpl->tpl_vars['source']->value->pending());?>
 Pending
            </a>

            <i class="fa fa-times-circle unsubmit"></i> <a href="javascript: void 0">
                <?php echo count($_smarty_tpl->tpl_vars['source']->value->unsubmit_list());?>
 unsubmit
            </a>

        </div>


    </div>



<?php
}}
/*/ smarty_template_function_header_7412520055cd6ba4fcee172_48461824 */
/* smarty_template_function_tabs_7412520055cd6ba4fcee172_48461824 */
if (!function_exists('smarty_template_function_tabs_7412520055cd6ba4fcee172_48461824')) {
function smarty_template_function_tabs_7412520055cd6ba4fcee172_48461824(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\function.counter.php','function'=>'smarty_function_counter',),));
?>




    <ul class="nav nav-tabs">

        <li class="active">
            <a data-toggle="tab" href="#tab-<?php echo smarty_function_counter(array('start'=>$_smarty_tpl->tpl_vars['startingID']->value),$_smarty_tpl);?>
">
                <i class="fa fa-clock-o text-success"></i> Pending
            </a>
        </li>

        <li class="">
            <a data-toggle="tab" href="#tab-<?php echo smarty_function_counter(array(),$_smarty_tpl);?>
">
                <i class="fa fa-check text-cadet-blue"></i>  Approved
            </a>
        </li>

        <li class="">
            <a data-toggle="tab" href="#tab-<?php echo smarty_function_counter(array(),$_smarty_tpl);?>
">
                <i class="fa fa-times-circle text-light-red"></i>  Un submit
            </a>
        </li>

    </ul>





    

                                                        
                        
                        
                            
                                                                                                    
                                                                    
                                        
                                                                    

                                

                                

                                
                                    
                                                                            

                                

                            

                            

                            
                                
                                    
                                
                            


                        


                                                                                


                                                                                
                        

                            
                                                                                                    
                                                                    
                                        
                                                                    

                                
                                

                                
                                    
                                        
                                    
                                
                            

                            

                            
                                
                                    
                                
                            


                        
                                                                                


                                                                                
                        


                            
                                                                                                    
                                                                    
                                        
                                                                    



                                



                            

                            

                            
                                
                                    
                                
                            

                        

                                                                                


    


<?php
}}
/*/ smarty_template_function_tabs_7412520055cd6ba4fcee172_48461824 */
/* {block 'body'} */
class Block_6670229395cd6ba4fd2d146_72321984 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_6670229395cd6ba4fd2d146_72321984',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <div class="row wrapper border-bottom white-bg page-heading ">


        <div class="col-sm-4">
            <h2>Checklist</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/scoa_admin">Home</a>
                </li>
                <li class="active">
                    <strong>checklist</strong>
                </li>
            </ol>
        </div>


        <div class="col-sm-4 pull-right">
            <div class="title-action">
                <a href="javascript: void 0" class="btn btn-warning btn-sm" id="renew">Renew</a>
            </div>
        </div>

    </div>



    <div class="wrapper wrapper-content no-padding">

       <div class="ibox-content checklist-body scoa-transparent no-padding">

           <div class="panel-body no-borders">

               <div class="panel-group no-borders sk-loading" id="accordion">


                   <form method="post">


                       <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'action');?>



                   </form>


                   <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'structure', array('title'=>$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'aop'),'body'=>$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'aop_body'),'id'=>'scoa1'), true);?>



                   <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'structure', array('title'=>$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'mam'),'body'=>$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'mam_body'),'id'=>'scoa2'), true);?>



                   <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'structure', array('title'=>$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'cbl'),'body'=>$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'cbl_body'),'id'=>'scoa3'), true);?>



                   <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'structure', array('title'=>$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'fs'),'body'=>$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'fs_body'),'id'=>'scoa4'), true);?>



                   <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'structure', array('title'=>$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'de'),'body'=>$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'de_body'),'id'=>'scoa5'), true);?>




               </div>
           </div>


           <div class="sk-spinner sk-spinner-double-bounce">
               <div class="sk-double-bounce1"></div>
               <div class="sk-double-bounce2"></div>
           </div>


       </div>



    </div>



<?php
}
}
/* {/block 'body'} */
/* {block 'inner_script'} */
class Block_9986296235cd6ba4fd35da7_48364527 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'inner_script' => 
  array (
    0 => 'Block_9986296235cd6ba4fd35da7_48364527',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



        <?php if ($_smarty_tpl->tpl_vars['updateBatch_request']->value == 1) {?>

            swal("Error","An error occur when processing your request","error");

        <?php } elseif ($_smarty_tpl->tpl_vars['updateBatch_request']->value == 2) {?>

            swal("Success","The batch has been updated","success");


        <?php } elseif ($_smarty_tpl->tpl_vars['updateBatch_request']->value == 3) {?>

            swal("No changes","","warning");


        <?php }?>


    <?php
}
}
/* {/block 'inner_script'} */
}
