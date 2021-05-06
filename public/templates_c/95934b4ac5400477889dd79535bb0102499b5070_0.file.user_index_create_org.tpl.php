<?php
/* Smarty version 3.1.33, created on 2019-04-20 23:52:40
  from 'C:\wamp64\www\SCOA\public\included_template\user\user_index_create_org.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cbb40489e31d9_41908778',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95934b4ac5400477889dd79535bb0102499b5070' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\user\\user_index_create_org.tpl',
      1 => 1554258448,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cbb40489e31d9_41908778 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<HEAD><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18380549465cbb40488d9757_14761765', 'head');
?>
</HEAD><SCRIPTS><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4436429545cbb404890f170_37640747', 'script');
?>
</SCRIPTS><SCOA_BODY><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10177437525cbb4048931700_57093108', 'body');
?>
</SCOA_BODY><?php }
/* {block 'head'} */
class Block_18380549465cbb40488d9757_14761765 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_18380549465cbb40488d9757_14761765',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
<link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/select2/select2.min.css" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet"><?php
}
}
/* {/block 'head'} */
/* {block 'script'} */
class Block_4436429545cbb404890f170_37640747 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_4436429545cbb404890f170_37640747',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/select2/select2.full.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
jquery.validate.min.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" type="text/javascript"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
scoa/scoa_create_org.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
"><?php echo '</script'; ?>
><?php echo '<script'; ?>
>$(".scoa_position").select2({placeholder: "Who are you in your organization / department ?",allowClear: true});<?php echo '</script'; ?>
><?php
}
}
/* {/block 'script'} */
/* {block 'info'} */
class Block_8446169155cbb404899aa30_74176962 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_right_div.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
/* {/block 'info'} */
/* {block 'body'} */
class Block_10177437525cbb4048931700_57093108 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_10177437525cbb4048931700_57093108',
  ),
  'info' => 
  array (
    0 => 'Block_8446169155cbb404899aa30_74176962',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row"><div class="col-md-8"><div class="alert alert-dark" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"--><i class="fa fa-angle-left" style="font-size: 19px;vertical-align: bottom"></i>&nbsp;<a class="alert-link" href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
">Back to home </a></div><?php if ($_smarty_tpl->tpl_vars['request']->value == 1) {?><div class="alert alert-warning" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"--><i class="fa fa-exclamation-triangle" style="font-size: 15px"></i>&nbsp;<a class="alert-link" href="#">Invalid Request</a> a undefined parameter sent, we cant verify your request right now if you think this an error <a href="javascript:void 0">Let us know</a>.</div><?php } elseif ($_smarty_tpl->tpl_vars['request']->value == 3) {?><div class="alert alert-warning" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"--><i class="fa fa-exclamation-triangle" style="font-size: 15px"></i>&nbsp;<a class="alert-link" href="#">An Error occured</a> internal error , we cant verify your request right now if you think this is a mistake <a href="javascript:void 0">Let us know</a>.</div><?php }?><div class="ibox"><div class="ibox-title"><strong><i class="fa fa-pencil-square"></i>&nbsp; Create new organization</strong></div><div class="ibox-content"><div class="row"><div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Request form</h3><p>sent us a request to create and publish a organization for your members.</p><form role="form" method="post" class="user_org"><div class="form-group"><label>Name of your organization</label><input type="text" name="name" placeholder="e.g. must unique" class="form-control"></div><div class="form-group"><label>Position</label><select name="position" required class="required scoa_position form-control m-b"><option value=""></option><option value="1">Treasurer</option><option value="2">Auditor</option><option value="3">Org Pres.</option><option value="4">Dept Gov.</option><option value="5">Adviser</option></select></div><div class="form-group"><label>Details</label><textarea name="details" style="min-height: 155px" placeholder="e.g. what organization or department you creating for, should be detailed." class="form-control"></textarea></div>                                                                                                                                                                                                                                                                                                    <br><div class="form-group"><button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong>Submit</strong></button></div></form></div><div class="col-sm-6"><h3 class="m-t-none m-b">Required</h3><p>to activate your group , your organization must have..</p><div class="pull-left"><div class="row"><div class="col-sm-1"><i class="fa fa-check"></i></div><div class="col-sm-10 no-padding">5 members the Treasurer, Auditor,  OrgaPresident, Department Governor and Adviser.</div></div><div class="row"><div class="col-sm-1"><i class="fa fa-check"></i></div><div class="col-sm-10 no-padding">Complete member requirements.<ul><li>Profile</li><li>Signature</li></ul></div></div><div class="row"><div class="col-sm-1"><i class="fa fa-check"></i></div><div class="col-sm-10 no-padding">Cover photo.</div></div></div></div></div></div></div></div><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8446169155cbb404899aa30_74176962', 'info', $this->tplIndex);
?>
</div><?php
}
}
/* {/block 'body'} */
}
