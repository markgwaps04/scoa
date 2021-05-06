<?php
/* Smarty version 3.1.33, created on 2019-04-22 03:30:43
  from 'C:\wamp64\www\SCOA\public\included_template\admin\admin_user_organization_populate.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cbcc4e3dbd1d3_52838282',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3154a0be1f5731f26feaed4a8a1c59cff478bdd8' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\admin\\admin_user_organization_populate.tpl',
      1 => 1555264552,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cbcc4e3dbd1d3_52838282 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),1=>array('file'=>'C:\\wamp64\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
?>



<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['renewable']->value, 'rows', false, 'evey');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['evey']->value => $_smarty_tpl->tpl_vars['rows']->value) {
?>


    <div class="row">


        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'organization', false, 'evey');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['evey']->value => $_smarty_tpl->tpl_vars['organization']->value) {
?>


            

        <div class="col-lg-4">
            <div class="ibox">

                <div class="ibox-title">


                    <h5>

                        <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/scoa_organization/feeds/<?php echo $_smarty_tpl->tpl_vars['organization']->value['RCode'];?>
">

                            <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['organization']->value['name'],40,"...");?>


                        </a>

                    </h5>




                </div>



                <div class="ibox-content">


                    <div class="team-members">

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['organization']->value['members']['approved'], 'user', false, 'every');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every']->value => $_smarty_tpl->tpl_vars['user']->value) {
?>


                            <a href="">
                                <img alt="image" data-toggle="tooltip" data-placement="auto" title=
                                "<?php echo smarty_modifier_capitalize((($_smarty_tpl->tpl_vars['user']->value['Firstname']).(" ")).($_smarty_tpl->tpl_vars['user']->value['Lastname']),true,true);?>
" class="img-circle profile" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/profile/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value['profile'])===null||$tmp==='' ? 'default/1.jpg' : $tmp);?>
">
                            </a>


                         <?php
}
} else {
?>

                            <div class="alert alert-info no-margins position-relative top-n-md" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->
                                <i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;
                                <a class="alert-link" href="#">No current members</a>
                            </div>

                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                    </div>


                    <h4>About</h4>

                    <p>

                        <?php echo trim(smarty_modifier_truncate($_smarty_tpl->tpl_vars['organization']->value['details'],300,'&nbsp;<a href="{$organization.RCode}">See more...</a>'));?>


                    </p>


                    <div class="row  m-t-sm" style="font-size: 12px">
                                                                                                                                <div class="col-sm-12">
                            <strong>Code : </strong> <?php echo $_smarty_tpl->tpl_vars['organization']->value['member_code'];?>

                        </div>

                    </div>

                </div>
            </div>

        </div>


        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>




    </div>


<?php
}
} else {
?>


    <div class="col-sm-12">

        <div class="middle-box text-center animated wobble no-margin-top">
            <h2 class="font-bold">No found results</h2>
            <div class="error-desc">
                Try to refresh the page
                <br><a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
" class="btn btn-primary m-t">Dashboard</a>
            </div>
        </div>

    </div>


<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



<?php }
}
