<?php
/* Smarty version 3.1.33, created on 2019-04-24 08:47:01
  from 'C:\wamp64\www\SCOA\app\views\admin\index\request.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cbfb2051af868_90024070',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b8b71d86546d2c3e6d050671eb2e9d0319186474' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\app\\views\\admin\\index\\request.tpl',
      1 => 1556066806,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cbfb2051af868_90024070 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1298904015cbfb2050fcf48_48405389', 'title');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4941333695cbfb2051019a0_97933759', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\structures\admin_structure.tpl");
}
/* {block 'title'} */
class Block_1298904015cbfb2050fcf48_48405389 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1298904015cbfb2050fcf48_48405389',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | REQUEST <?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_4941333695cbfb2051019a0_97933759 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_4941333695cbfb2051019a0_97933759',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
?>


    <?php $_smarty_tpl->_assignInScope('organizations', $_smarty_tpl->tpl_vars['club']->value->unapproved_organizations());?>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Organizations</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/staff">Home</a>
                </li>
                <li>
                    <a href="javascript:void 0">Organizations</a>
                </li>

                <li class="active">
                    <strong>Request</strong>
                </li>
            </ol>
        </div>

    </div>

    <div class="wrapper wrapper-content">
        <div class="ibox">
            <div class="ibox-content">


                <div class="project-list">

                    <table class="table table-hover">

                        <tbody>



                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['organizations']->value, 'club', false, 'every');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every']->value => $_smarty_tpl->tpl_vars['club']->value) {
?>


                            <tr>

                                <td class="project-status">
                                    <?php echo $_smarty_tpl->tpl_vars['club']->value['member_code'];?>

                                </td>

                                <td class="project-files">

                                    <a class="active">

                                        <?php if ($_smarty_tpl->tpl_vars['club']->value['isUpdated_RCode']) {?>

                                            Updated

                                        <?php }?>


                                    </a>

                                </td>

                                <td class="project-title">

                                    <a href="view_info/<?php echo $_smarty_tpl->tpl_vars['club']->value['renewalId'];?>
">

                                        <?php echo $_smarty_tpl->tpl_vars['club']->value['name'];?>


                                    </a>
                                    <br/>

                                    <small>

                                        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_detail', array('param'=>$_smarty_tpl->tpl_vars['club']->value['create_date_time']), true);?>


                                    </small>

                                </td>


                                <td class="project-people">




                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['club']->value['members']['approved'], 'user', false, 'every');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every']->value => $_smarty_tpl->tpl_vars['user']->value) {
?>

                                        <img alt="image" data-toggle="tooltip" data-placement="auto" title=
                                        "<?php echo smarty_modifier_capitalize((($_smarty_tpl->tpl_vars['user']->value['Firstname']).(" ")).($_smarty_tpl->tpl_vars['user']->value['Lastname']),true,true);?>
" class="img-circle profile" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/profile/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value['profile'])===null||$tmp==='' ? 'default/1.jpg' : $tmp);?>
">

                                        <?php
}
} else {
?>

                                        <a class="active">No members</a>

                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



                                </td>


                                <td class="project-actions">



                                    <form method="post" class="inline">

                                        <input type="hidden" name="renewal_code" value="<?php echo $_smarty_tpl->tpl_vars['club']->value['RCode'];?>
">

                                        <button  class="ladda-button btn btn-primary btn-sm choices-x" type="submit"  data-style="expand-left"><i class="fa fa-check"></i> Accept </button>

                                    </form>



                                    <?php if (!$_smarty_tpl->tpl_vars['club']->value['had_renew']) {?>


                                        <form method="post" class="inline">

                                            <input type="hidden" name="renewal_code_decline" value="<?php echo $_smarty_tpl->tpl_vars['club']->value['RCode'];?>
">

                                            <input type="hidden" name="tempath" value="<?php echo $_smarty_tpl->tpl_vars['club']->value['tempath'];?>
">


                                            <button  class=" ladda-button btn btn-warning btn-sm choices-x" type="submit"   data-style="expand-left"><i class="fa fa-times"></i> Reject </button>


                                        </form>



                                    <?php }?>


                                </td>
                            </tr>




                            <?php
}
} else {
?>

                            <div class="row wrapper  white-bg page-heading">
                                <div class="col-lg-12 text-center ">
                                    </br>
                                    <h2 class="position-absolute text-center full-width clear-left">No request found</h2>
                                </div>

                            </div>

                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>


<?php
}
}
/* {/block 'body'} */
}
