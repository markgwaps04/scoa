<?php
/* Smarty version 3.1.33, created on 2019-05-11 20:04:42
  from 'C:\laragon\www\SCOA\app\views\admin\index\misc\addOrg.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd6ba5ab40f95_05925161',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '968d12a939befc5f0ecf2be286361a904254313d' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\app\\views\\admin\\index\\misc\\addOrg.tpl',
      1 => 1556811673,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd6ba5ab40f95_05925161 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'errors' => 
  array (
    'compiled_filepath' => 'C:\\laragon\\www\\SCOA\\public\\templates_c\\968d12a939befc5f0ecf2be286361a904254313d_0.file.addOrg.tpl.php',
    'uid' => '968d12a939befc5f0ecf2be286361a904254313d',
    'call_name' => 'smarty_template_function_errors_13010059515cd6ba5aadb261_22240639',
  ),
  'loading' => 
  array (
    'compiled_filepath' => 'C:\\laragon\\www\\SCOA\\public\\templates_c\\968d12a939befc5f0ecf2be286361a904254313d_0.file.addOrg.tpl.php',
    'uid' => '968d12a939befc5f0ecf2be286361a904254313d',
    'call_name' => 'smarty_template_function_loading_13010059515cd6ba5aadb261_22240639',
  ),
  'header' => 
  array (
    'compiled_filepath' => 'C:\\laragon\\www\\SCOA\\public\\templates_c\\968d12a939befc5f0ecf2be286361a904254313d_0.file.addOrg.tpl.php',
    'uid' => '968d12a939befc5f0ecf2be286361a904254313d',
    'call_name' => 'smarty_template_function_header_13010059515cd6ba5aadb261_22240639',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14900920935cd6ba5ab1b029_11890607', 'title');
?>


<?php $_smarty_tpl->_assignInScope('currentChecklist', $_smarty_tpl->tpl_vars['checklist_class']->value->getBatchDetails());?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11131865455cd6ba5ab20d06_17570248', 'script');
?>







<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6144184835cd6ba5ab24a59_84697787', 'head');
?>



















<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12699081085cd6ba5ab39a59_00842913', 'body');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "../../../../../public/included_template/admin/structures/admin_structure.tpl");
}
/* {block 'title'} */
class Block_14900920935cd6ba5ab1b029_11890607 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_14900920935cd6ba5ab1b029_11890607',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | CLUB <?php
}
}
/* {/block 'title'} */
/* {block 'script'} */
class Block_11131865455cd6ba5ab20d06_17570248 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_11131865455cd6ba5ab20d06_17570248',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
 src="/SCOA/public/js/scoa/scoa_partial.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="/SCOA/public/js/LAB.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>

     const request = Number("<?php echo $_smarty_tpl->tpl_vars['request']->value;?>
" || 0);

     

        (function () {

            const path = "/SCOA/public/js/";

            const script = [
                "plugins/breeze/lodash.js",
                "scoa/scoa_reminders.js",
                "plugins/validate/jquery.validate.min.js",
                "plugins/_typehead/typehead.js",
                "plugins/bootstrap-tagsinput/bootstrap-tagsinput.js",
                "scoa/scoa-create-org-by-admin.js",
            ];

            $LAB
                .setOptions({AlwaysPreserveOrder:true})
                .script(script.toNestedArray(path))
                .wait(function(){

                    scoa.showHiddens();
                    scoa.removeLoadings();

                    const reminders = window.reminders({
                       "set" : "remindByAdmin",
                       "by" : "allStaff"
                    },false,3);


                });

        })();

     

    <?php echo '</script'; ?>
>


<?php
}
}
/* {/block 'script'} */
/* {block 'head'} */
class Block_6144184835cd6ba5ab24a59_84697787 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_6144184835cd6ba5ab24a59_84697787',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <style>

        .ProfileCard-details {

            width: 300px;

        }
        .ProfileCard {
            background: #ffffff;
        }
        .ProfileCard-avatar.profile {
            position: absolute;
        }

        img.mention {

            width : 25px;
            height: 25px;

        }

        .profile-x {
            width: 42px;
            height: 42px;
        }



    </style>

<?php
}
}
/* {/block 'head'} */
/* smarty_template_function_errors_13010059515cd6ba5aadb261_22240639 */
if (!function_exists('smarty_template_function_errors_13010059515cd6ba5aadb261_22240639')) {
function smarty_template_function_errors_13010059515cd6ba5aadb261_22240639(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>



    <?php if ($_smarty_tpl->tpl_vars['request']->value == "1") {?>

        <div class="alert alert-warning" style="background-color: #fdfdfde0">
            <i class="fa fa-exclamation-triangle animated wobble" style="font-size: 15px"></i>&nbsp;
            <a class="alert-link" href="#">Invalid Request.</a> The parameters sent is Invalid.
        </div>

    <?php }?>


<?php
}}
/*/ smarty_template_function_errors_13010059515cd6ba5aadb261_22240639 */
/* smarty_template_function_loading_13010059515cd6ba5aadb261_22240639 */
if (!function_exists('smarty_template_function_loading_13010059515cd6ba5aadb261_22240639')) {
function smarty_template_function_loading_13010059515cd6ba5aadb261_22240639(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>


    <div class="wrapper wrapper-content load loadingBy">

        <div class="row">

            <div class="col-lg-8">

                <div class="ibox">

                    <div class="ibox-title">
                        <strong><i class="fa fa-pencil-square"></i>&nbsp Add new Org/Dept </strong>
                    </div>

                    <div class="ibox-content ">
                        <div class="row">

                            <div class="col-sm-6 b-r">
                            <?php $_smarty_tpl->_assignInScope('isDeadlineSet', $_smarty_tpl->tpl_vars['checklist_class']->value->getBatchDetails());?>

                                    <span class="animated-background">

                                        <?php if (!$_smarty_tpl->tpl_vars['isDeadlineSet']->value['isDeadlineSet']) {?>

                                            <span class="text-warning"><i class="fa fa-info-circle"></i></span>
                                            Deadline of current batch not set

                                        <?php } elseif (!$_smarty_tpl->tpl_vars['checklist_class']->value->isDeadline()) {?>

                                            The batch is already time out

                                        <?php } else { ?>


                                            Batch for <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['currentChecklist']->value['date_time'],'%A, %b %e, %Y');?>
 to
                                            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['currentChecklist']->value['deadline'],'%A, %b %e, %Y');?>




                                        <?php }?>

                                    </span>

                                    <br>

                                    <p>
                                        <a href="/SCOA/public/scoa_checklist" class="animated-background" target="_blank">Go to checklist config.</a>
                                    </p>


                                    <div class="form-group">

                                        <label class="animated-background">Name of the club</label>
                                        <p class="animated-background">SCOA SCOA SCOA SCOA</p>
                                        <p class="animated-background">SCOA SCOA</p>
                                    </div>

                                    <div class="form-group">
                                        <label class="animated-background">Details</label>
                                        <p class="animated-background">SCOA SCOA SCOA SCOA</p>
                                        <p class="animated-background">SCOA SCOA</p>
                                    </div>

                                    <br>

                                    <div class="form-group">

                                        <span class="btn m-t-n-xs animated-background" type="submit" id="disableLoad">
                                            <strong>Submit</strong></span>

                                    </div>
                                </div>

                            <div class="col-sm-6">

                            <strong class="m-t-none m-b animated-background">Members SCOA</strong>

                                    <div class="form-group">


                                        <strong class=" animated-background">Select users to SCOA SCOA
                                        </strong>

                                        <span class=" animated-background">
                                            Select users to SCOA SCOA SCOA
                                        </span>

                                        <p class="animated-background">SCOA SCOA SCOA SCOA</p>
                                        <p class="animated-background">SCOA SCOA</p>


                                    </div>

                                    <div class="form-group">


                                        <strong class=" animated-background">Select users to SCOA SCOA
                                        </strong>

                                        <span class=" animated-background">
                                            Select users to SCOA SCOA SCOA
                                        </span>

                                        <p class="animated-background">SCOA SCOA SCOA SCOA</p>
                                        <p class="animated-background">SCOA SCOA</p>


                                    </div>

                                </div>


                        </div>
                    </div>
                </div>


            </div>


            <div class="col-lg-4">

                <div class="ibox-content" id="reminders">

                        <div class="feed-activity-list load">

                            <div class="feed-element">
                                <div>
                                    <small class="pull-right text-navy animated-background">SCOA</small>
                                    <small class="animated-background">Student’s Commission on Audit</small>
                                    <p class="animated-background">
                                        Student’s
                                        Commission on Audit SCOA SCOA
                                        SCOA
                                    </p>
                                    <small class="animated-background">SCOA
                                        SCOA SCOA SCOA SCOA SCOA SCOA
                                    </small>
                                </div>
                            </div>

                            <div class="feed-element">
                                <div>
                                    <small class="pull-right text-navy animated-background">SCOA</small>
                                    <small class="animated-background">Student’s Commission on Audit</small>
                                    <p class="animated-background">
                                        Student’s
                                        Commission on Audit SCOA SCOA
                                        SCOA
                                    </p>
                                    <small class="animated-background">SCOA
                                        SCOA SCOA SCOA SCOA SCOA SCOA
                                    </small>
                                </div>
                            </div>

                            <div class="feed-element">
                                <div>
                                    <small class="pull-right text-navy animated-background">SCOA</small>
                                    <small class="animated-background">Student’s Commission on Audit</small>
                                    <p class="animated-background">
                                        Student’s
                                        Commission on Audit SCOA SCOA
                                        SCOA
                                    </p>
                                    <small class="animated-background">SCOA
                                        SCOA SCOA SCOA SCOA SCOA SCOA
                                    </small>
                                </div>
                            </div>


                            <div class="feed-element">
                                <div>
                                    <small class="pull-right text-navy animated-background">SCOA</small>
                                    <small class="animated-background">Student’s Commission on Audit</small>
                                    <p class="animated-background">
                                        Student’s
                                        Commission on Audit SCOA SCOA
                                        SCOA
                                    </p>
                                    <small class="animated-background">SCOA
                                        SCOA SCOA SCOA SCOA SCOA SCOA
                                    </small>
                                </div>
                            </div>

                            <div class="feed-element">
                                <div>
                                    <small class="pull-right text-navy animated-background">SCOA</small>
                                    <small class="animated-background">Student’s Commission on Audit</small>
                                    <p class="animated-background">
                                        Student’s
                                        Commission on Audit SCOA SCOA
                                        SCOA
                                    </p>
                                    <small class="animated-background">SCOA
                                        SCOA SCOA SCOA SCOA SCOA SCOA
                                    </small>
                                </div>
                            </div>

                        </div>
                    </div>

            </div>

        </div>

    </div>

<?php
}}
/*/ smarty_template_function_loading_13010059515cd6ba5aadb261_22240639 */
/* smarty_template_function_header_13010059515cd6ba5aadb261_22240639 */
if (!function_exists('smarty_template_function_header_13010059515cd6ba5aadb261_22240639')) {
function smarty_template_function_header_13010059515cd6ba5aadb261_22240639(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>



    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">

            <h2>Create new club</h2>

            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/staff">Home</a>
                </li>
                <li>
                    <a href="javascript:void 0">Organization/Departments</a>
                </li>

                <li class="active">
                    <strong>Add Club</strong>
                </li>
            </ol>
        </div>


    </div>


<?php
}}
/*/ smarty_template_function_header_13010059515cd6ba5aadb261_22240639 */
/* {block 'body'} */
class Block_12699081085cd6ba5ab39a59_00842913 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_12699081085cd6ba5ab39a59_00842913',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>


    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'header', array(), true);?>


    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'loading', array(), true);?>


    <div class="wrapper wrapper-content hiddenBy">

        <div class="row">


            <div class="col-lg-8">

                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'errors', array(), true);?>


                <div class="ibox">
                    <div class="ibox-title">
                        <strong><i class="fa fa-pencil-square"></i>&nbsp Add new Org/Dept </strong>
                    </div>
                    <div class="ibox-content">
                        <div class="row">

                            <form role="form" method="post" class="user_org">

                                <div class="col-sm-6 b-r">


                                    <?php $_smarty_tpl->_assignInScope('isDeadlineSet', $_smarty_tpl->tpl_vars['checklist_class']->value->getBatchDetails());?>

                                    <p>

                                    <?php if (!$_smarty_tpl->tpl_vars['isDeadlineSet']->value['isDeadlineSet']) {?>

                                        <span class="text-warning"><i class="fa fa-info-circle"></i></span>
                                            Deadline of current batch not set

                                    <?php } elseif (!$_smarty_tpl->tpl_vars['checklist_class']->value->isDeadline()) {?>

                                        The batch is already time out

                                    <?php } else { ?>


                                            Batch for <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['currentChecklist']->value['date_time'],'%A, %b %e, %Y');?>
 to
                                            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['currentChecklist']->value['deadline'],'%A, %b %e, %Y');?>




                                    <?php }?>

                                    </p>

                                    <p>
                                        <a href="/SCOA/public/scoa_checklist" target="_blank">Go to checklist config.</a>
                                    </p>


                                    <div class="form-group">

                                        <label>Name of the club</label>
                                        <input type="text" name="name" id="name" placeholder="e.g. must unique" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Details</label>
                                        <textarea name="details" style="min-height: 155px" placeholder="e.g. what organization or department you creating for (Optional)" class="form-control"></textarea>
                                    </div>



                                    <br>

                                    <div class="form-group">

                                        <button class="btn btn-sm btn-primary m-t-n-xs" type="submit" id="disableLoad">
                                            <strong>Submit</strong></button>

                                    </div>
                            </div>

                                <div class="col-sm-6">

                                <strong class="m-t-none m-b">Members</strong>

                                <div class="form-group">


                                    <span class="help-block">

                                        Select users to add as a members of the group or inform
                                        them about the newly created group (max 4)

                                    </span>

                                    <p class="user-friends">

                                    <input name="users" type="text" class="form-control tagsinput">

                                    </p>

                                </div>

                                <div class="form-group">


                                    <span class="help-block">

                                        If a user is not registered of the site you can inform
                                        her by adding her phone number above. (ex. 912345678)

                                    </span>

                                        <p class="user-friends">

                                            <input name="numbers" type="text" class="form-control" id="phone_number" >

                                        </p>

                                </div>

                                </div>

                            </form>


                        </div>
                    </div>
                </div>


            </div>

            <div class="col-lg-4">

                <div class="ibox-content" id="reminders">

                    <div class="feed-activity-list load">

                        <div class="feed-element">
                            <div>
                                <small class="pull-right text-navy animated-background">SCOA</small>
                                <small class="animated-background">Student’s Commission on Audit</small>
                                <p class="animated-background">
                                    Student’s
                                    Commission on Audit SCOA SCOA
                                    SCOA
                                </p>
                                <small class="animated-background">SCOA
                                    SCOA SCOA SCOA SCOA SCOA SCOA
                                </small>
                            </div>
                        </div>

                        <div class="feed-element">
                            <div>
                                <small class="pull-right text-navy animated-background">SCOA</small>
                                <small class="animated-background">Student’s Commission on Audit</small>
                                <p class="animated-background">
                                    Student’s
                                    Commission on Audit SCOA SCOA
                                    SCOA
                                </p>
                                <small class="animated-background">SCOA
                                    SCOA SCOA SCOA SCOA SCOA SCOA
                                </small>
                            </div>
                        </div>

                        <div class="feed-element">
                            <div>
                                <small class="pull-right text-navy animated-background">SCOA</small>
                                <small class="animated-background">Student’s Commission on Audit</small>
                                <p class="animated-background">
                                    Student’s
                                    Commission on Audit SCOA SCOA
                                    SCOA
                                </p>
                                <small class="animated-background">SCOA
                                    SCOA SCOA SCOA SCOA SCOA SCOA
                                </small>
                            </div>
                        </div>


                        <div class="feed-element">
                            <div>
                                <small class="pull-right text-navy animated-background">SCOA</small>
                                <small class="animated-background">Student’s Commission on Audit</small>
                                <p class="animated-background">
                                    Student’s
                                    Commission on Audit SCOA SCOA
                                    SCOA
                                </p>
                                <small class="animated-background">SCOA
                                    SCOA SCOA SCOA SCOA SCOA SCOA
                                </small>
                            </div>
                        </div>

                        <div class="feed-element">
                            <div>
                                <small class="pull-right text-navy animated-background">SCOA</small>
                                <small class="animated-background">Student’s Commission on Audit</small>
                                <p class="animated-background">
                                    Student’s
                                    Commission on Audit SCOA SCOA
                                    SCOA
                                </p>
                                <small class="animated-background">SCOA
                                    SCOA SCOA SCOA SCOA SCOA SCOA
                                </small>
                            </div>
                        </div>

                    </div>
                </div>

            </div>


        </div>

    </div>

<?php
}
}
/* {/block 'body'} */
}
