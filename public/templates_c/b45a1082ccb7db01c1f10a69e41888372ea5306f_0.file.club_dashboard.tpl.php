<?php
/* Smarty version 3.1.33, created on 2019-04-21 23:07:58
  from 'C:\wamp64\www\SCOA\public\included_template\misc\club_dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cbc874e4da074_08239843',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b45a1082ccb7db01c1f10a69e41888372ea5306f' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\misc\\club_dashboard.tpl',
      1 => 1555859275,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cbc874e4da074_08239843 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\global_functions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 32, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19195308975cbc874e2f79d7_73967323', 'body');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10115686535cbc874e4408c9_08476695', 'head');
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6189555035cbc874e455b66_75104620', 'script');
?>


<?php }
/* {block 'body'} */
class Block_19195308975cbc874e2f79d7_73967323 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_19195308975cbc874e2f79d7_73967323',
  ),
);
public $prepend = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
?>


    <div class="wrapper wrapper-content" style="padding-bottom: 0;">

        <ol class="breadcrumb scoa-transparent">
            <li>
                <a href="/SCOA/public/organization">Home</a>
            </li>
            <li>
                <a href="/SCOA/public/feeds/<?php echo $_smarty_tpl->tpl_vars['user_club']->value['url'];?>
">Organization</a>
            </li>
            <li class="active">
                <strong><?php echo $_smarty_tpl->tpl_vars['user_club']->value['name'];?>
</strong>
            </li>
        </ol>

    </div>


    <div class="wrapper wrapper-content">

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5> <i class="fa fa-spinner fa-spin" id="title-spinner"></i> &nbsp; Financial Statements</h5>
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-white active" id="semestral">Batch</button>
                                <button type="button" class="btn btn-xs btn-white" id="yearly">Annual</button>
                            </div>
                        </div>
                    </div>

                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="flot-chart">
                                    <canvas id="lineChart" height="70"></canvas>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <ul class="stat-list" id="stat-list">

                                    <li>
                                        <h2 class="no-margins">0</h2>
                                        <small>Current Balance</small>
                                        <div class="stat-percent">0% <i class="fa fa-spinner fa-spin text-navy"></i></div>
                                        <div class="progress progress-mini">
                                            <div style="width: 0%;" class="progress-bar"></div>
                                        </div>
                                    </li>


                                    <li>
                                        <h2 class="no-margins ">0</h2>
                                        <small>Final balance last batch</small>
                                        <div class="stat-percent">0% <i class="fa fa-spinner fa-spin text-navy"></i></div>
                                        <div class="progress progress-mini">
                                            <div style="width: 0%;" class="progress-bar"></div>
                                        </div>
                                    </li>

                                    <li>
                                        <h2 class="no-margins ">0</h2>
                                        <small>Current Cash Collected</small>
                                        <div class="stat-percent">0% <i class="fa fa-spinner fa-spin text-navy"></i></div>
                                        <div class="progress progress-mini">
                                            <div style="width: 0%;" class="progress-bar"></div>
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-lg-4">

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Reminders</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content ibox-heading">
                        <h3><i class="fa fa-exclamation-circle"></i> Remainder's </h3>
                        <small><i class="fa fa-tim"></i> You have <span id="remind_count">0</span> Important notification.</small>
                    </div>

                    <div class="ibox-content">

                        <div class="feed-activity-list load" id="reminders">

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

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Notification</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
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

                                            <a href=
                                               "<?php if ($_smarty_tpl->tpl_vars['user_club']->value['isCurrentUserApproved']) {?>

                                               <?php echo $_smarty_tpl->tpl_vars['public']->value;?>
organization/members/<?php echo $_smarty_tpl->tpl_vars['user_club']->value['url'];?>


                                               <?php } else { ?>

                                               javascript:void 0

                                               <?php }?>">5 members including the Treasurer, Auditor, Organization President, Department Governor and Adviser.</a>

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

                                            <a href=
                                               "<?php if ($_smarty_tpl->tpl_vars['user_club']->value['isCurrentUserApproved']) {?>

                                               <?php echo $_smarty_tpl->tpl_vars['public']->value;?>
organization/members/<?php echo $_smarty_tpl->tpl_vars['user_club']->value['url'];?>


                                               <?php } else { ?>

                                               javascript:void 0

                                               <?php }?>">Complete members requirements.</a>

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

                                            <a>Cover photo of organization</a>

                                        </div>

                                    </div>

                                </div>


                            </li>

                        </ul>

                    </div>

                </div>


            </div>

            <div class="col-lg-8">

                <div class="row" id="group_statistics"></div>

                <div class="row">

                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>About your group</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="ibox-content">

                                <div class="sk-spinner sk-spinner-double-bounce">
                                    <div class="sk-double-bounce1"></div>
                                    <div class="sk-double-bounce2"></div>
                                </div>


                                <h5>ABOUT


                                    
                                    <?php if ($_smarty_tpl->tpl_vars['user_club']->value['isCurrentUserApproved']) {?>

                                        <i class="fa fa-pencil small text-muted scoa_xxsmall_text" data-toggle="tooltip" data-placement="right" title="edit" style="vertical-align: top"></i>

                                    <?php }?>

                                    


                                </h5>

                                <p>

                                    
                                    <?php echo $_smarty_tpl->tpl_vars['user_club']->value['details'];?>


                                    
                                </p>

                                <h5>CODE</h5>
                                <span>

                            <?php echo $_smarty_tpl->tpl_vars['user_club']->value['member_code'];?>


                                    
                                    <?php if ($_smarty_tpl->tpl_vars['user_club']->value['isCurrentUserApproved']) {?>

                                        <form method="post" class="inline">

                            <input type="hidden" name="url" value="<?php echo $_smarty_tpl->tpl_vars['user_club']->value['url'];?>
">

                            <button type="submit"  class="btn btn-sm small text-success scoa_xsmall_text btn-default fa fa-repeat"></button>

                        </form>

                                    <?php }?>

                                    

                        </span>

                                <h5><a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
organization/members/<?php echo $_smarty_tpl->tpl_vars['user_club']->value['url'];?>
">MEMBERS</a></h5>

                                <p class="user-friends">

                                    

                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user_club']->value['members']['approved'], 'user', false, 'every');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every']->value => $_smarty_tpl->tpl_vars['user']->value) {
?>


                                        <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
organization/members/<?php echo $_smarty_tpl->tpl_vars['user_club']->value['url'];?>
">

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


                            </div>

                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">


                            <div class="ibox-title">
                                <h5>Submissions</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>


                            <div class="ibox-content dashboard load">
                                <table class="table table-hover no-margins">
                                    <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>User</th>
                                        <th>Type</th>
                                    </tr>
                                    </thead>
                                    <tbody id="submission">

                                    <tr>
                                        <td><small class="animated-background">SCOA SCOA</small></td>
                                        <td><span class="animated-background">SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA</span></td>
                                    </tr>

                                    <tr>
                                        <td><small class="animated-background">SCOA SCOA SCOA</small></td>
                                        <td><span class="animated-background">SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA SCOA</span></td>
                                    </tr>

                                    <tr>
                                        <td><small class="animated-background">SCOA SCOA SCOA SCOA</small></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA</span></td>
                                    </tr>

                                    <tr>
                                        <td><small class="animated-background">SCOA</small></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA</span></td>
                                    </tr>

                                    <tr>
                                        <td><small class="animated-background">SCOA SCOA SCOA</small></td>
                                        <td><span class="animated-background">SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA</span></td>
                                    </tr>

                                    <tr>
                                        <td><small class="animated-background">SCOA SCOA SCOA SCOA</small></td>
                                        <td><span class="animated-background">SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA SCOA</span></td>
                                    </tr>

                                    <tr>
                                        <td><small class="animated-background">SCOA SCOA SCOA</small></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA</span></td>
                                        <td><span class="animated-background">SCOA SCOA SCOA SCOA</span></td>
                                    </tr>

                                    </tbody>
                                </table>
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
/* {block 'head'} */
class Block_10115686535cbc874e4408c9_08476695 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_10115686535cbc874e4408c9_08476695',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <style>

        .ibox-content.dashboard table td {

            font-size: small;

        }
        .afterload {

            display: none !important;

        }


    </style>


<?php
}
}
/* {/block 'head'} */
/* {block 'script'} */
class Block_6189555035cbc874e455b66_75104620 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_6189555035cbc874e455b66_75104620',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <!-- ChartJS-->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/chartJs/Chart.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/canvasJs/canvasjs.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
scoa/scoa-graph.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
scoa/scoa_user_dashboard.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/breeze/lodash.js?pin=<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" crossorigin="anonymous"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
moment/moment.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
scoa/scoa_reminders.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
"><?php echo '</script'; ?>
>




    <?php echo '<script'; ?>
 id="group_statistics_template" type="text/x-handlebars-template">

        <div class="col-lg-12">

            <error_placement></error_placement>

            <div class="ibox float-e-margins">

                <div class="ibox-title">
                    <div class="ibox-tools">
                        <span class="pull-right label label-primary animated wobble">{batch}</span>
                    </div>
                </div>

                <div class="ibox-content">

                    <div class="row">

                        <div class="col-lg-12 p-sm">

                            <div class="col-lg-4">
                                <div class="widget style1 navy-bg">
                                    <div class="row">

                                        <div class="col-xs-3">
                                            <i class="fa fa-rouble fa-3x"></i>
                                        </div>

                                        <div class="col-xs-9 text-right">

                                            <span>Cash Collected</span>

                                            <h2 class="font-bold total-collected">
                                                {collected_cash}
                                            </h2>

                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="widget style1 yellow-bg">
                                    <div class="row">
                                        <div class="col-xs-3" id="percentage">
                                            <i class="fa fa-rouble fa-3x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <span> Final Balance </span>
                                            <h2 class="font-bold total-balance">
                                                {balance}
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="widget style1 lazur-bg">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-rouble fa-3x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <span> Total Expenses </span>
                                            <h2 class="font-bold total-expenses">
                                                {expenses}
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>


                    <div class="row">

                        <div class="col-sm-6 no-padding">
                            <div id="expenses" style="height: 170px; max-width: 100%; margin: 0px auto;"></div>
                        </div>

                        <div class="col-sm-6 no-padding">
                            <div id="activity" style="height: 170px; max-width: 100%; margin: 0px auto;"></div>
                        </div>

                    </div>

                    <br>
                    <br>


                </div>

            </div>
        </div>


    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 id="approved_checklist_template" type="text/html">

        <tr>
            <td><span class="label label-{typeState}">{state}</span></td>
            <td><i class="fa fa-clock-o"></i> {dateTime}</td>
            <td>{user}</td>
            <td class="text-navy"><a href="javascript:void 0">{type}</a></td>
        </tr>


    <?php echo '</script'; ?>
>




    <?php echo '<script'; ?>
>

        $(document).ready(function() {

            let checkbox = $('.scoa-requirements input[type=checkbox]');

            $.post('<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/organization/requirements',{ tempath : "<?php echo $_smarty_tpl->tpl_vars['user_club']->value['tempath'];?>
" },function(response){

                let data = JSON.parse(response);

                console.log(data);

                if(data.hasOwnProperty("is_position_fill") &&
                    data.hasOwnProperty("is_cover_photo_set") &&
                    data.hasOwnProperty("is_members_set_the_requirements")){

                    if(data.is_position_fill)

                        jQuery(".scoa-requirements #positions").attr("checked",true);

                    if(data.is_cover_photo_set)

                        jQuery(".scoa-requirements #cover").attr("checked",true);

                    if(data.is_members_set_the_requirements)

                        jQuery(".scoa-requirements #members").attr("checked",true);


                    checkbox.iCheck({
                        checkboxClass: 'icheckbox_square-green',
                        radioClass: 'iradio_square-green',
                        disabledClass: "scoa-disabled-checkbox"
                    });


                    $(".scoa-requirements").toggleClass("sk-loading")

                }


            });


            jQuery._scoa();


            

            const dash = window.dash("<?php echo $_smarty_tpl->tpl_vars['user_club']->value['url'];?>
","<?php echo $_smarty_tpl->tpl_vars['user_club']->value['member_code'];?>
");
            
            const reminder = window.reminders({
                url : "<?php echo $_smarty_tpl->tpl_vars['user_club']->value['url'];?>
",
                set : "remindByURL",
                by : "ofUser"
            });



            dash.approved_checklist.main("#submission");

            


        })

    <?php echo '</script'; ?>
>




<?php
}
}
/* {/block 'script'} */
}
