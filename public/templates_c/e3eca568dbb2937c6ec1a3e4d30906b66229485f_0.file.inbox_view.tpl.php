<?php
/* Smarty version 3.1.33, created on 2019-04-17 15:32:14
  from 'C:\wamp64\www\SCOA\app\views\admin\index\misc\inbox_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb6d67e4c2d99_96920837',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3eca568dbb2937c6ec1a3e4d30906b66229485f' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\app\\views\\admin\\index\\misc\\inbox_view.tpl',
      1 => 1555266241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb6d67e4c2d99_96920837 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'state' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\e3eca568dbb2937c6ec1a3e4d30906b66229485f_0.file.inbox_view.tpl.php',
    'uid' => 'e3eca568dbb2937c6ec1a3e4d30906b66229485f',
    'call_name' => 'smarty_template_function_state_2262357295cb6d67e1a1da5_91267782',
  ),
  'footer' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\e3eca568dbb2937c6ec1a3e4d30906b66229485f_0.file.inbox_view.tpl.php',
    'uid' => 'e3eca568dbb2937c6ec1a3e4d30906b66229485f',
    'call_name' => 'smarty_template_function_footer_2262357295cb6d67e1a1da5_91267782',
  ),
  'header' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\e3eca568dbb2937c6ec1a3e4d30906b66229485f_0.file.inbox_view.tpl.php',
    'uid' => 'e3eca568dbb2937c6ec1a3e4d30906b66229485f',
    'call_name' => 'smarty_template_function_header_2262357295cb6d67e1a1da5_91267782',
  ),
  'FS_type' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\e3eca568dbb2937c6ec1a3e4d30906b66229485f_0.file.inbox_view.tpl.php',
    'uid' => 'e3eca568dbb2937c6ec1a3e4d30906b66229485f',
    'call_name' => 'smarty_template_function_FS_type_2262357295cb6d67e1a1da5_91267782',
  ),
  'regular_checklist' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\e3eca568dbb2937c6ec1a3e4d30906b66229485f_0.file.inbox_view.tpl.php',
    'uid' => 'e3eca568dbb2937c6ec1a3e4d30906b66229485f',
    'call_name' => 'smarty_template_function_regular_checklist_2262357295cb6d67e1a1da5_91267782',
  ),
  'request' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\e3eca568dbb2937c6ec1a3e4d30906b66229485f_0.file.inbox_view.tpl.php',
    'uid' => 'e3eca568dbb2937c6ec1a3e4d30906b66229485f',
    'call_name' => 'smarty_template_function_request_2262357295cb6d67e1a1da5_91267782',
  ),
  'no_result' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\e3eca568dbb2937c6ec1a3e4d30906b66229485f_0.file.inbox_view.tpl.php',
    'uid' => 'e3eca568dbb2937c6ec1a3e4d30906b66229485f',
    'call_name' => 'smarty_template_function_no_result_2262357295cb6d67e1a1da5_91267782',
  ),
));
?>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\global_functions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
?>


<?php $_smarty_tpl->_assignInScope('pin', mt_rand(0,1000));?>






















<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'comment', null, null);?>

    <div class="no-padding ibox-content sk-loading" style="min-height: 20px">

        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>

        <div id="responds"></div>

    </div>


<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>





<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'inbox_close', null, null);?>

    <div class="ibox-tools position-relative bottom-up-md">
        <a class="close-link" id="inbox-close">
            <i class="fa fa-times"></i>
        </a>
    </div>

<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>



























































<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'display', null, null);?>

    <?php if (count($_smarty_tpl->tpl_vars['inbox_data']->value)) {?>

        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'request', array(), true);?>


    <?php } else { ?>

        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'no_result', array(), true);?>


    <?php }?>

<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

















<link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">

<link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/iziModal/iziModal.css?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" rel="stylesheet">

<div class="ibox-content no-padding bg-transparent no-borders" id="inbox-spinner">

    <div class="sk-spinner sk-spinner-three-bounce">
        <div class="sk-bounce1"></div>
        <div class="sk-bounce2"></div>
        <div class="sk-bounce3"></div>
    </div>


    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'display');?>


</div>




<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/blueimp/jquery.blueimp-gallery.min.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
ckin.min.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" type="text/javascript"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/iziModal/iziModal.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" crossorigin="anonymous"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
>

    
    jQuery._scoa();

    jQuery.scoa.images.load();

    
    scoa_video_init();


<?php echo '</script'; ?>
>


<?php }
/* smarty_template_function_state_2262357295cb6d67e1a1da5_91267782 */
if (!function_exists('smarty_template_function_state_2262357295cb6d67e1a1da5_91267782')) {
function smarty_template_function_state_2262357295cb6d67e1a1da5_91267782(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>



    <?php if ($_smarty_tpl->tpl_vars['info']->value['submissionState'] == 1) {?>

        <span class="label label-primary ">Approved</span>

    <?php } elseif ($_smarty_tpl->tpl_vars['info']->value['submissionState'] == 0 && !$_smarty_tpl->tpl_vars['info']->value['post_details']['hasApprovedEntry']) {?>


        <span class="label label-warning">Pending</span>

    <?php } elseif ($_smarty_tpl->tpl_vars['info']->value['post_details']['hasApprovedEntry']) {?>

        <span class="label label-success m-l-xs">Entry</span>

    <?php } else { ?>

        <span class="label label-danger">Unapproved</span>

    <?php }?>



<?php
}}
/*/ smarty_template_function_state_2262357295cb6d67e1a1da5_91267782 */
/* smarty_template_function_footer_2262357295cb6d67e1a1da5_91267782 */
if (!function_exists('smarty_template_function_footer_2262357295cb6d67e1a1da5_91267782')) {
function smarty_template_function_footer_2262357295cb6d67e1a1da5_91267782(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>



    <?php if ($_smarty_tpl->tpl_vars['info']->value['post_details']['hasApprovedEntry']) {?>

        <div class="mail-body font-bold">

            <i class="fa fa-warning text-danger"></i>
            &nbsp;
            <a>Has duplicate entry</a>

        </div>

    <?php }?>



    <div class="mail-body tooltip-demo no-padding" id="comment-section">

        <div class="ibox-content no-padding">

            <div class="sk-spinner sk-spinner-three-bounce">
                <div class="sk-bounce1"></div>
                <div class="sk-bounce2"></div>
                <div class="sk-bounce3"></div>
            </div>




            <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'comment');?>






            <?php if ($_smarty_tpl->tpl_vars['info']->value['checklist_id'] == $_smarty_tpl->tpl_vars['checklist_class']->value->getUpdatedID()) {?>



                <div class="form-inline full-width m-t-md">

                    <div class="col-sm-12">

                        <textarea id="inbox-comment-field" name="body" class="scoa-textarea scoa-textarea-min-height" placeholder="Write something..."></textarea>

                    </div>


                    <div class="col-sm-12 p-sm">

                        <div class="form-group pull-right" post_url="<?php echo $_smarty_tpl->tpl_vars['info']->value['path'];?>
">


                            <?php if ($_smarty_tpl->tpl_vars['info']->value['submissionState'] == 0 && !$_smarty_tpl->tpl_vars['info']->value['post_details']['hasApprovedEntry']) {?>

                                <button type="submit" class="btn btn-sm btn-info checklist-update" method="respond_checklist">
                                    <i class="fa fa-reply"></i> Respond
                                </button>


                                <button type="submit" class="btn btn-sm btn-white checklist-update" method="approved_checklist">
                                    <i class="fa fa-check"></i> Approved
                                </button>

                                <button type="submit" class="btn btn-sm btn-warning checklist-update" method="unapproved_checklist">
                                    <i class="fa fa-times"></i> Decline
                                </button>




                            <?php }?>





                            <?php if ($_smarty_tpl->tpl_vars['info']->value['submissionState'] == 1 && ($_smarty_tpl->tpl_vars['info']->value['checklist_id'] == $_smarty_tpl->tpl_vars['checklist_class']->value->getUpdatedID())) {?>



                                <button type="submit" class="btn btn-sm btn-warning checklist-update" method="resubmit_checklist" >
                                    <i class="fa fa-times"></i> Resubmit
                                </button>



                            <?php }?>





                            <?php if ($_smarty_tpl->tpl_vars['info']->value['post_details']['hasApprovedEntry'] || $_smarty_tpl->tpl_vars['info']->value['submissionState'] == -1) {?>

                                <button type="submit" class="btn btn-sm btn-info checklist-update" method="respond_checklist">
                                    <i class="fa fa-reply"></i> Respond
                                </button>


                            <?php }?>


                        </div>

                    </div>


                </div>

            <?php }?>

        </div>


    </div>


    <div class="clearfix"></div>



<?php
}}
/*/ smarty_template_function_footer_2262357295cb6d67e1a1da5_91267782 */
/* smarty_template_function_header_2262357295cb6d67e1a1da5_91267782 */
if (!function_exists('smarty_template_function_header_2262357295cb6d67e1a1da5_91267782')) {
function smarty_template_function_header_2262357295cb6d67e1a1da5_91267782(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),1=>array('file'=>'C:\\wamp64\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>




    <div class="mail-box-header">


        <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'inbox_close');?>



        <div class="pull-right tooltip-demo">

            <button  class="btn btn-white btn-sm" id="download" data-toggle="tooltip" data-placement="top">
                <i class="fa fa-download"></i> Download / View
            </button>

        </div>


        <h2>

            <?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checklist_name', array('type'=>$_smarty_tpl->tpl_vars['info']->value['checklistType']), true);
$_smarty_tpl->assign("checklist", ob_get_clean());?>


            <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['checklist']->value,60,"...");?>


        </h2>


        <div class="mail-tools tooltip-demo m-t-md">

            <h3>

                <span class="font-normal">Sent from :
                    <a href="javascript:void 0"><?php echo $_smarty_tpl->tpl_vars['info']->value['org_info']['name'];?>
</a>
                </span>

            </h3>


            <h5>

                <span class="pull-right font-normal">

                    <?php echo mb_strtoupper(smarty_modifier_date_format($_smarty_tpl->tpl_vars['info']->value['PDT'],'h:m:s a d M Y'), 'UTF-8');?>


                </span>


                <span class="font-normal">Code: </span>

                <?php echo $_smarty_tpl->tpl_vars['info']->value['org_info']['member_code'];?>




            </h5>


            <h5>

                    <span class="font-normal"> Active :

                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['info']->value['org_info']['approval_date_time'],'d M Y');?>

                        -
                        <?php $_smarty_tpl->_assignInScope('unactive', smarty_modifier_date_format($_smarty_tpl->tpl_vars['info']->value['org_info']['unapproved_date_time'],'d M Y'));?>


                        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['unactive']->value)===null||$tmp==='' ? "Present" : $tmp);?>


                    </span>


            </h5>


            <h5><span class="font-normal">Batch id: </span> <?php echo $_smarty_tpl->tpl_vars['info']->value['checklist_id'];?>
</h5>

            <?php if (!$_smarty_tpl->tpl_vars['info']->value['isStaff']) {?>

                <h5>
                    <span class="font-normal"> Submit from:  </span>

                    <a href="javascript:void 0"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>$_smarty_tpl->tpl_vars['info']->value,'withoutTag'=>true), true);?>
</a>

                </h5>

            <?php }?>

            <h5>
                <span class="font-normal"> Status: </span>

                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'state', array('info'=>$_smarty_tpl->tpl_vars['info']->value), true);?>



            </h5>



        </div>

    </div>


<?php
}}
/*/ smarty_template_function_header_2262357295cb6d67e1a1da5_91267782 */
/* smarty_template_function_FS_type_2262357295cb6d67e1a1da5_91267782 */
if (!function_exists('smarty_template_function_FS_type_2262357295cb6d67e1a1da5_91267782')) {
function smarty_template_function_FS_type_2262357295cb6d67e1a1da5_91267782(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>




    <?php $_smarty_tpl->_assignInScope('_fs', $_smarty_tpl->tpl_vars['fs_data']->value->cash_flow($_smarty_tpl->tpl_vars['info']->value['r_code']) ,true);?>


    <div class="mail-view">


        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'header', array('info'=>$_smarty_tpl->tpl_vars['info']->value), true);?>


        <div class="mail-box">


            <div class="mail-body">


                <div class="row">


                    <div class="col-lg-12 p-sm">

                        <div class="col-lg-4">
                            <div class="widget style1 navy-bg">
                                <div class="row">

                                    <div class="col-xs-3">
                                        <i class="fa fa-rouble fa-3x"></i>
                                    </div>

                                    <div class="col-xs-9 text-right">
                                        <span>
                                           Cash Collected
                                        </span>
                                        <h2 class="font-bold total-collected">
                                            <i class="small text-white fa fa-spinner fa-spin"></i>
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
                                        <h2 class="font-bold total-balance"><i class="small text-white fa fa-spinner fa-spin"></i></h2>
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
                                        <h2 class="font-bold total-expenses"><i class="small text-white fa fa-spinner fa-spin"></i></h2>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                    <div class="col-lg-12 ibox-content bg-transparent no-borders sk-loading parent-content">


                        <div class="col-lg-6">

                            <div id="chartExpenses" style="height: 170px; max-width: 100%; margin: 0px auto;"></div>

                        </div>


                        <div class="col-lg-6">

                            <div id="chartActivity" style="height: 170px; max-width: 100%; margin: 0px auto;"></div>

                        </div>


                        <div class="col-lg-6">



                            <div class="ibox">

                                <div class="ibox-title no-borders">

                                    <a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown" class="pull-right">View All</a>

                                </div>

                                <div class="ibox-content" id="misc_data_received">

                                    <h5>Total Cash Received (Contains misc. data)</h5>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="ibox">

                                <div class="ibox-title no-borders"></div>

                                <div class="ibox-content notice-table">

                                    <h5>Notice</h5>

                                    
                                                                                                                                                                                                                        
                                    
                                    
                                                                        


                                                                                                                                                
                                    
                                    
                                                                                                            
                                    


                                    
                                </div>

                                <div class="ibox-content administration">

                                    <h5>From Previous Administration</h5>

                                    <table class="table table-stripped small m-t-md">

                                        

                                        
                                                                                                                        
                                        
                                        
                                        
                                        

                                        
                                                                                                                        
                                        
                                        
                                        
                                        

                                        
                                                                                                                        
                                        
                                        
                                        
                                        


                                        
                                    </table>

                                </div>

                            </div>

                        </div>


                    </div>





                </div>

                

            </div>




            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'footer', array('info'=>$_smarty_tpl->tpl_vars['info']->value), true);?>





        </div>


    </div>




    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
/plugins/canvasJs/canvasjs.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
/plugins/canvasJs/canvasjs.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/breeze/lodash.js?pin=<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
scoa/scoa-graph.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>


        <?php $_smarty_tpl->_assignInScope('previousOrg', $_smarty_tpl->tpl_vars['club']->value->getPreviousOrgURL($_smarty_tpl->tpl_vars['info']->value['org_info']['url']));?>

        window.scoa_token = "<?php echo $_smarty_tpl->tpl_vars['info']->value['org_info']['url'];?>
";
        window.scoa_org_code = "<?php echo $_smarty_tpl->tpl_vars['info']->value['org_info']['member_code'];?>
";


        

        $(document).ready(function () {

            const org = scoa_graph.main(window.scoa_token,window.scoa_org_code);

            org.then(function(info){

                /** widgets  **/

                const markUp = function(obj,element) {

                    if(!obj.isMarkUp) return;

                    const percent = obj.removePercent;

                    const target = element
                        .parents(".widget")
                        .find("#percentage:not(.percentage)")
                        .addClass("percentage");

                    const template = [
                        '<p>{percentage}',
                        '</p>'
                    ].join("");


                    target.append(template.setTokens({
                        percentage : obj.percentage,
                    }));


                };


                const total_collection = info.total_cash_received.formatted_value,
                    balance = info.balance.formatted_value,
                    total_expense = info.total_cash_flows.formatted_value;

                $(".total-collected").html(total_collection);
                $(".total-balance").html(balance);
                $(".total-expenses").html(total_expense);

                markUp(info.balance,$(".total-balance"));


                /** @END Widgets **/



                /** PIE CHARTS **/

                const pie_chart = function(obj) {

                    return new CanvasJS.Chart(obj.element, {
                        title: {
                            text: obj.title,
                        },
                        animationEnabled: true,
                        data: [{
                            type: "pie",
                            percentFormatString : "#0.##",
                            toolTipContent: obj["tooltip"] || "{name}: <strong>(#percent%)</strong>",
                            indexLabel: "{name} - (#percent%)",
                            dataPoints: obj.datapoints
                        }]
                    }).render();

                };


                var expenses = info.definedAllExpenses();

                var activity = info.activity;

                activity = Object
                    .keys(activity)
                    .map(function(e) {

                        const formatAsInfo = function() {

                            const description = activity[e],
                                types = description.types;

                            return Object
                                .keys(types)
                                .map(function(byType) {

                                    const typeDescrip = types[byType],
                                        template = "{key} : <strong>{total}</strong>";

                                    return template.setTokens({

                                        key : byType,
                                        total : typeDescrip.percentage

                                    });

                                }).join("<br>");

                        };

                        return {
                            y : numeral(activity[e].amount)._value,
                            name : e,
                            exploded : activity[e].isMax,
                            template : formatAsInfo()
                        }

                    });

                expenses = Object
                    .keys(expenses)
                    .map(function(e) {

                        const formatAsInfo = function () {

                            const details = info
                                .definedAllExpensesByActivity(e);

                            return Object
                                .keys(details)
                                .map(function(every,index){

                                    const value = details[every],
                                        template = "{key} : <strong>{total}</strong>";

                                    return template.setTokens({

                                        key : every,
                                        total : value["percentage"]

                                    });

                                }).join("<br>");

                        };

                        return {
                            y : numeral(expenses[e].total)._value,
                            name : e,
                            exploded : expenses[e].isMax,
                            template : formatAsInfo()
                        }

                    });


                const expense_format = {

                    title : "Expenses",
                    element : "chartExpenses",
                    datapoints: expenses,
                    tooltip : [
                        '{name}: <strong>(#percent%)</strong>',
                        "<p>{template}</p>"

                    ].join("")

                };


                const activity_format = {

                    title : "Activity's",
                    element : "chartActivity",
                    datapoints: activity,
                    tooltip : [
                        '{name}: <strong>(#percent%)</strong>',
                        "<p>{template}</p>"


                    ].join("")

                };



                pie_chart(expense_format);
                pie_chart(activity_format);


                /** @END Pie Charts **/

                /** misc data **/

                const tableTemplate = function(options) {

                    options = Object.assign({
                        source : [],
                        status : "text-navy",
                        isCustom : false,
                        text : ""
                    },options);


                    var table = [
                        '<table class="table table-stripped small m-t-md">',
                        '<tbody>{body}</tbody>{footer}',
                        '</table>'
                    ].join("");


                    if(!options.isCustom) {

                        table = table.setTokens({footer : [
                                '<tfoot>',
                                '<tr>',
                                !options.isCustom ? '<td>Total:</td>' : "" ,
                                '<td><b class="pull-right">{total}</b></td>',
                                '</tr>',
                                '</tfoot>',
                            ].join("")})
                    }


                    /** Misc Data **/

                    const misc =  options.source,
                        data = misc.data,
                        total = misc.formattedTotal;


                    const body = _.sumBy(data,function(value){

                        var bodyTemplate = [
                            '<tr>',
                            '<td class="no-borders">',
                            '<i class="fa fa-circle {status_color}"></i>',
                            '</td>',
                            '<td class="no-borders">',
                            '{checkCustom}',
                            '</td>',
                            '</tr>'
                        ].join('');



                        bodyTemplate = bodyTemplate.setTokens({
                            checkCustom : options.isCustom
                                ? "{text}"
                                : "{name} : {amount}"
                        });



                        return bodyTemplate.setTokens({
                            name : value.name || "" ,
                            amount : !options.isCustom ? numeral(value.amount).format("0,0") : "",
                            status_color : options.status,
                        })


                    });

                    if(options.isCustom)
                    {
                        return table.setTokens({
                            body : options.text ,
                            total : "",
                            footer : ""
                        })
                    }

                    return table.setTokens({body : body, total : total || ""});

                };

                const tableCashReceived = tableTemplate({
                    source : info.total_cash_received_by_format
                });

                $("#misc_data_received")
                    .not(".loaded")
                    .append(tableCashReceived)
                    .addClass("loaded");


                /** end of misc data **/


                /** notice data **/

                var receipt_body = "" ,
                    receipt = info.collected_receipt || {},
                    receipt_template =  [
                        '<tr>',
                        '<td class="no-borders">',
                        '<i class="fa fa-circle text-danger"></i>',
                        '</td>',
                        '<td class="no-borders">',
                        '{value}',
                        '</td>',
                        '</tr>'
                    ].join('');



                if(receipt.hasInvalid) {

                    receipt_body += receipt_template.setTokens({
                        value : "Contains Un number and Invalid Receipt"
                    });

                }



                if(receipt.isHigherFromReceived) {

                    receipt_body += receipt_template.setTokens({
                        value : "The total amount of collection " +
                        "receipt is greater than from the total amount of expenditures"
                    });

                }


                receipt_body += receipt_template.setTokens({
                    value : "The percentage of data collected " +
                    "and probability of data legit base upon the " +
                    "collection of receipt : " + (receipt.percentageOfEquality || "0% (no data to load)")
                });


                receipt_body = tableTemplate({
                    text : receipt_body,
                    isCustom : true
                });


                $(".notice-table")
                    .not(".loaded")
                    .append(receipt_body)
                    .addClass("loaded");

                /** @ENd of notice data **/


                /** FS Modal **/

                $("body").after('<div id="modal" class="izi-modal"></div>');

                $("#modal").iziModal({

                onOpening: function(modal) {

                    modal.startLoading();

                    $.get('/path/to/file', function(data) {

                        $("#modal .iziModal-content").html(data);

                        modal.stopLoading();
                    });


                }});

                /** @end of FS modal **/

                $(".parent-content").removeClass("sk-loading");

            });


            $("#download")
                .off("click")
                .on("click",function(){


                    window.printing =  $.dialog({
                        icon: 'fa fa-spinner fa-spin',
                        title: 'Setting data!',
                        content: 'processing request',
                        closeIconClass : "hidden",
                        closeIcon : null,
                        buttons : {}
                    });



                    $("body").after([
                        `<iframe onload=" window.printing.close(true);" class="fs_print_container" style="display: none !important;" src='/SCOA/public/Inbox/print_reports/${window.scoa_token}'>`,
                        "</iframe>"
                    ].join("\n"));


                })


            /** previous administration **/




        })

        

    <?php echo '</script'; ?>
>


<?php
}}
/*/ smarty_template_function_FS_type_2262357295cb6d67e1a1da5_91267782 */
/* smarty_template_function_regular_checklist_2262357295cb6d67e1a1da5_91267782 */
if (!function_exists('smarty_template_function_regular_checklist_2262357295cb6d67e1a1da5_91267782')) {
function smarty_template_function_regular_checklist_2262357295cb6d67e1a1da5_91267782(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>



    <div class="mail-view">

        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'header', array('info'=>$_smarty_tpl->tpl_vars['info']->value), true);?>




        <div class="mail-box">



            <?php if ($_smarty_tpl->tpl_vars['info']->value['submissionBody']) {?>

                <div class="mail-body">

                    <?php echo htmlspecialchars(trim($_smarty_tpl->tpl_vars['info']->value['submissionBody']));?>


                </div>

            <?php }?>



            
            <?php $_smarty_tpl->_assignInScope('feeds', $_smarty_tpl->tpl_vars['info']->value);?>

            <?php $_smarty_tpl->_assignInScope('skip', 'true');?>

            <?php $_smarty_tpl->_assignInScope('skipLoadFile', 'true');?>


            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\misc\\feeds_contents_plugin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
?>


            

            <div class="mail-attachment">

                <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'file_body');?>


            </div>



            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'footer', array('info'=>$_smarty_tpl->tpl_vars['info']->value), true);?>



        </div>

    </div>


<?php
}}
/*/ smarty_template_function_regular_checklist_2262357295cb6d67e1a1da5_91267782 */
/* smarty_template_function_request_2262357295cb6d67e1a1da5_91267782 */
if (!function_exists('smarty_template_function_request_2262357295cb6d67e1a1da5_91267782')) {
function smarty_template_function_request_2262357295cb6d67e1a1da5_91267782(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>



    <?php $_smarty_tpl->_assignInScope('info', $_smarty_tpl->tpl_vars['inbox_data']->value[0] ,true);?>


    <?php if ($_smarty_tpl->tpl_vars['info']->value['feedsType'] == "E") {?>


        <?php if ($_smarty_tpl->tpl_vars['info']->value['checklistType'] == "FS" && (!$_smarty_tpl->tpl_vars['info']->value['isMemberState'])) {?>


            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'FS_type', array('info'=>$_smarty_tpl->tpl_vars['info']->value), true);?>



        <?php } else { ?>


            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'regular_checklist', array('info'=>$_smarty_tpl->tpl_vars['info']->value), true);?>



        <?php }?>



    <?php }?>





<?php
}}
/*/ smarty_template_function_request_2262357295cb6d67e1a1da5_91267782 */
/* smarty_template_function_no_result_2262357295cb6d67e1a1da5_91267782 */
if (!function_exists('smarty_template_function_no_result_2262357295cb6d67e1a1da5_91267782')) {
function smarty_template_function_no_result_2262357295cb6d67e1a1da5_91267782(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>



    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3>Unable to load Attachment</h3>
        </div>
        <div class="panel-body">

            <p>
            <h2>#404 Not Found at request uknown</h2>
            </p>

            <p>
                If you think this is a mistake contact the <a>developers</a>
            </p>
        </div>
        <div class="panel-footer">
            SCOA-2019
        </div>
    </div>


<?php
}}
/*/ smarty_template_function_no_result_2262357295cb6d67e1a1da5_91267782 */
}
