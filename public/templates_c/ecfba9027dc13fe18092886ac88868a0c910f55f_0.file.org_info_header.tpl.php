<?php
/* Smarty version 3.1.33, created on 2019-04-22 03:30:49
  from 'C:\wamp64\www\SCOA\public\included_template\misc\org_info_header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cbcc4e9e8b879_67527354',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ecfba9027dc13fe18092886ac88868a0c910f55f' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\misc\\org_info_header.tpl',
      1 => 1549643936,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cbcc4e9e8b879_67527354 (Smarty_Internal_Template $_smarty_tpl) {
?>




<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">

        <h2><?php echo $_smarty_tpl->tpl_vars['org']->value['name'];?>
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

    <div class="col-sm-8">

        <?php if (!$_smarty_tpl->tpl_vars['org']->value['isRenewalApproved']) {?>


            <div class="title-action">

                <form method="post" action="<?php echo ROOT_URI;?>
/scoa_organization/request" class="inline">

                    <input type="hidden" name="renewal_code" value="<?php echo $_smarty_tpl->tpl_vars['org']->value['RCode'];?>
">

                    <button class="btn btn-primary btn-sm choices-x" type="submit" data-style="expand-left">
                        <i class="fa fa-check"></i> Approved </button>

                </form>


                <form method="post" action="<?php echo ROOT_URI;?>
/scoa_organization/request" class="inline">

                    <input type="hidden" name="renewal_code_decline" value="<?php echo $_smarty_tpl->tpl_vars['ORG']->value['RCode'];?>
">

                    <input type="hidden" name="tempath" value="<?php echo $_smarty_tpl->tpl_vars['ORG']->value['RCode'];?>
">

                    <button class="btn btn-info btn-sm choices-x" type="submit" data-style="expand-left">
                        <i class="fa fa-times"></i> Decline </button>

                </form>
                &nbsp;
            </div>

        <?php }?>

    </div>



</div><?php }
}
