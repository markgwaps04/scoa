<?php
/* Smarty version 3.1.33, created on 2019-05-30 10:08:38
  from 'C:\laragon\www\SCOA\public\included_template\misc\org_info_header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cef3b26472359_72243289',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c24a25fa24dd827a192977a4a40697bc4f859fae' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\public\\included_template\\misc\\org_info_header.tpl',
      1 => 1559181786,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cef3b26472359_72243289 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>

<div class="row wrapper border-bottom white-bg page-heading">

    <div class="col-sm-12">

        <h2><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['org']->value['name'],80,"...");?>
</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/staff">Home</a>
            </li>
            <li>
                <a href="javascript:void 0">Organizations</a>
            </li>
            <li class="active">
                <strong>Info</strong>
            </li>
        </ol>

    </div>













</div><?php }
}
