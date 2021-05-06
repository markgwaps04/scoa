<?php
/* Smarty version 3.1.33, created on 2019-05-13 04:48:13
  from 'C:\laragon\www\SCOA\app\views\admin\index\view_profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd8868d7e2cb7_21253550',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bfa936a468f1a8b2439fc2529b3a0bdec3453c73' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\app\\views\\admin\\index\\view_profile.tpl',
      1 => 1554031621,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd8868d7e2cb7_21253550 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),1=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\global_functions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 32, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2643814585cd8868d7a0b87_96732570', 'title');
?>


<?php $_smarty_tpl->_assignInScope('targetUser', $_smarty_tpl->tpl_vars['byUser']->value[0] ,true ,32);?>

<?php ob_start();
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'user_fullname', array('param'=>$_smarty_tpl->tpl_vars['targetUser']->value,'withoutTag'=>true), true);
$_smarty_tpl->assign("user_name", ob_get_clean());?>




<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'pageTitle', null, null);?>


    <div class="row wrapper border-bottom white-bg page-heading">

        <div class="col-sm-4">

            <h2>Administrator Profile</h2>


            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/staff">Home</a>
                </li>

                <li>
                    <strong>Accounts</strong>
                </li>

                <li class="active">
                    <strong>Profile</strong>
                </li>

            </ol>
        </div>


    </div>

<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>



<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'description', null, null);?>

    <div class="row m-b-lg m-t-lg">

        <div class="col-md-6">

            <div class="profile-image">
                <img _src="/SCOA/public/files/profile/<?php echo $_smarty_tpl->tpl_vars['targetUser']->value['profile'];?>
" class="profile img-circle circle-border m-b-md" alt="profile">
            </div>

            <div class="profile-info">
                <div class="">
                    <div>

                        <h2 class="no-margins">
                            <?php echo smarty_modifier_truncate(trim(preg_replace("/\s+/"," ",$_smarty_tpl->tpl_vars['user_name']->value)),20,"...");?>

                        </h2>

                        <?php if ($_smarty_tpl->tpl_vars['targetUser']->value['Path']) {?>

                            <h3>Administrator</h3>

                        <?php } else { ?>

                            <h3>Staff</h3>

                        <?php }?>


                        <small>
                            <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['targetUser']->value['about'],150,"...");?>

                        </small>




                    </div>
                </div>
            </div>



        </div>



        <state>

            <div class="col-md-3">

                <table class="table small m-b-xs">
                    <tbody>

                    <tr>
                        <td>
                            <strong>0</strong> Post
                        </td>
                        <td>
                            <strong>0</strong> Respond
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <strong>0</strong> Approved
                        </td>
                        <td>
                            <strong>0</strong> UnApproved
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <strong>0</strong> Block
                        </td>
                        <td>
                            <strong>0</strong> UnApproved
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>

            <div class="col-md-3">
                <small>Activity</small>
                <h2 class="no-margins">0%</h2>No loaded data
                <div id="sparkline1"></div>
            </div>

        </state>


    </div>

<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>




<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'newsfeed', null, null);?>


    <div class="col-lg-8">


        <feeds class="m-t-xl"></feeds>

        <div class="social-feed-separated">

            <div class="social-feed-box">

                <div class="social-body">

                    <h4 class="scoa-small-brand-name">#SCOA</h4>

                </div>

            </div>


        </div>

    </div>

<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>



<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'body', null, null);?>

    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'pageTitle');?>
<div class="wrapper wrapper-content"><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'description');?>
<div class="row"><div class="col-lg-4"><div class="row"><div class="col-lg-12"><div class="ibox"><div class="ibox-content"><div class="pull-right" style="position:relative; top:-5px"><span class="simple_tag btn bg-small"><i class="fa fa-gear"></i></span></div><h3>About <?php echo smarty_modifier_truncate(trim(preg_replace("/\s+/"," ",$_smarty_tpl->tpl_vars['user_name']->value)),20,"...");?>
</h3><p class="small"><?php echo $_smarty_tpl->tpl_vars['targetUser']->value['about'];?>
</p><h5>Phone number</h5><p class="small"><?php echo $_smarty_tpl->tpl_vars['targetUser']->value['CP'];?>
</p><h5>Date added</h5><p class="small"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['targetUser']->value['DT'],"%b %e, %Y");?>
</p>                                                                                                                                                </div></div></div><div class="col-lg-12 no-padding" id="byType"></div></div></div><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'newsfeed');?>
</div></div></div>


    <?php echo '<script'; ?>
>

        window.scoaUserId = "<?php echo $_smarty_tpl->tpl_vars['targetUser']->value['id'];?>
";

    <?php echo '</script'; ?>
>


<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5993136945cd8868d7de650_36182133', 'body');
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16152156635cd8868d7df780_31884795', 'upper_head');
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20644674995cd8868d7e0b89_41237866', 'script');
?>









<?php echo '<script'; ?>
>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4467687335cd8868d7e1db1_09341335', 'inner_script');
?>


<?php echo '</script'; ?>
>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\structures\admin_structure.tpl");
}
/* {block 'title'} */
class Block_2643814585cd8868d7a0b87_96732570 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_2643814585cd8868d7a0b87_96732570',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | PROFILE <?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_5993136945cd8868d7de650_36182133 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_5993136945cd8868d7de650_36182133',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'body');?>


<?php
}
}
/* {/block 'body'} */
/* {block 'upper_head'} */
class Block_16152156635cd8868d7df780_31884795 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'upper_head' => 
  array (
    0 => 'Block_16152156635cd8868d7df780_31884795',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
ckin.min.css?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" media="all" rel="stylesheet" type="text/css" />

    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">

    <style>

        .file-thumb-progress.kv-hidden
        {
            top: 34px !important;
        }
        .scoa-textarea
        {
            color: black;
        }

    </style>


<?php
}
}
/* {/block 'upper_head'} */
/* {block 'script'} */
class Block_20644674995cd8868d7e0b89_41237866 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_20644674995cd8868d7e0b89_41237866',
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
    <!-- Sparkline -->
    <?php echo '<script'; ?>
 src="/SCOA/public/js/plugins/sparkline/jquery.sparkline.min.js"><?php echo '</script'; ?>
>


    <?php echo '<script'; ?>
 type="text/html" id="states">

        <div class="col-md-3">
            <table class="table small m-b-xs">
                <tbody>

                <tr>
                    <td>
                        <strong>{post}</strong> Post
                    </td>
                    <td>
                        <strong>{respond}</strong> Respond
                    </td>

                </tr>

                <tr>
                    <td>
                        <strong>{approved}</strong> Approved
                    </td>
                    <td>
                        <strong>{unapproved}</strong> UnApproved
                    </td>
                </tr>


                <tr>
                    <td>
                        <strong>{block}</strong> Block
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <small>Activity</small>
            <h2 class="no-margins">{percent}</h2> {from}
            <div id="sparkline1"></div>
        </div>

<?php echo '</script'; ?>
>


    <?php echo '<script'; ?>
>

        const jsDir = "/SCOA/public/js/";


        (function(){


            const script = [
                "plugins/blueimp/jquery.blueimp-gallery.min.js",
                "ckin.min.js",
                "fileinput.min.js",
                "plugins/_typehead/typehead.js",
                "plugins/_typehead/handlebar.js",
                "plugins/breeze/lodash.js",
                "moment/moment.js",
                "plugins/jexcel/numeral.min.js"
            ];

            $LAB
                .setOptions({AlwaysPreserveOrder:true})
                .script(script.toNestedArray(jsDir))
                .wait(function(){

                    jQuery._scoa();

                });


            $(document).ready(function() {

                $("#sparkline1").sparkline([0, 0, 0, 0, 0, 0,0,0], {
                    type: 'line',
                    width: '100%',
                    height: '50',
                    lineColor: '#1ab394',
                    fillColor: "transparent"
                });

                jQuery.get("/SCOA/public/scoa_account/feedsState/",function(data) {


                    try{

                        const result = {};

                        const json = JSON.parse(data);

                        const group = function(data) {

                            return _.groupBy(data,function (respond) {

                                return moment(respond.PDT).format("YYYY-MMMM-D")

                            });

                        }


                        const targetUserPost = _.filter(json,{user : window.scoaUserId});

                        const dates = group(json);

                        let allAdmins = _.groupBy(json,"user")

                        if(allAdmins.hasOwnProperty(window.scoaUserId)) {

                            allAdmins[window.scoaUserId]["isTarget"] = 1;

                        }

                        const overAll = _.map(dates,function (e,key) {

                            const targetUserPost = _.filter(e,{user : window.scoaUserId})

                            return numeral(targetUserPost.length / e.length)._value * 100;

                        })



                        result.post = targetUserPost.length;

                        const post_details_has_state = _.map(targetUserPost,function(e){

                            const retune =  e.post_details;

                            if(retune.hasOwnProperty("state")) {
                                return retune;
                            }

                        }).filter(Boolean);


                        result.approved = _.filter(post_details_has_state,{state : "1"}).length;

                        result.unapproved = _.filter(post_details_has_state,{state : "-1"}).length;

                        result.respond = _.filter(post_details_has_state,{state : "2"}).length

                        const _from = _.orderBy(targetUserPost,"id");

                        const totalLength = numeral(overAll.length)._value * 100;

                        const targetTotal = (_.sumBy(overAll) / totalLength);

                        const state_template = jQuery("#states").html().setTokens({

                            block : 0,
                            post : result.post,
                            approved : result.approved,
                            unapproved : result.unapproved,
                            respond : result.respond,
                            percent : numeral(targetTotal).format("%"),
                            get from() {

                                const last = _.last(_from);

                                if(last.hasOwnProperty("PDT")) {

                                    return "<small> Data from " + (moment(last.PDT).format("MMMM, D YYYY")) + "</small>";

                                }

                               return "No loaded data";

                            }

                        });

                        jQuery("state").html(state_template);



                        jQuery("#sparkline1").sparkline(overAll, {
                            type: 'line',
                            width: '100%',
                            height: '50',
                            lineColor: '#1ab394',
                            fillColor: "transparent"
                        });


                    }catch(eerr) {

                        console.log(eerr);

                    }



                })

                jQuery.post("/SCOA/public/scoa_account/feedsState/byType"+window.scoaUserId,function(response){

                    console.log(response);

                })


                $("#edit_about").click(function(){

                    alert("Success");

                })

            })

        })();




    <?php echo '</script'; ?>
>




<?php
}
}
/* {/block 'script'} */
/* {block 'inner_script'} */
class Block_4467687335cd8868d7e1db1_09341335 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'inner_script' => 
  array (
    0 => 'Block_4467687335cd8868d7e1db1_09341335',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    


    //initialize post_box action


    try{

        let scoa = jQuery.scoa;

        scoa.feed._call("feeds:last-of-type","/SCOA/public/scoa_feeds/viewAllFeeds/"+window.scoaUserId);


    }catch(err)
    {

        console.log(err);
        swal("Reloading...", "authentication request failed please wait while reprocessing your request", "error");


    }






    

    <?php
}
}
/* {/block 'inner_script'} */
}
