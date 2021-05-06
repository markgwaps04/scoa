<?php
/* Smarty version 3.1.33, created on 2019-04-22 03:30:43
  from 'C:\wamp64\www\SCOA\public\included_template\admin\admin_user_organizations_renewable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cbcc4e3626704_05417438',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '548d52eafeb527db3d89e9f1f7de4dec69223752' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\admin\\admin_user_organizations_renewable.tpl',
      1 => 1549644176,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cbcc4e3626704_05417438 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>





<?php $_smarty_tpl->_assignInScope('org', $_smarty_tpl->tpl_vars['user_org']->value[0] ,true);?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6782606365cbcc4e3608ab0_70623304', 'title');
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15489664935cbcc4e360e6c9_17409025', 'head');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19280539145cbcc4e3618072_98246195', 'body');
?>






<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\structures\admin_structure.tpl");
}
/* {block 'title'} */
class Block_6782606365cbcc4e3608ab0_70623304 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_6782606365cbcc4e3608ab0_70623304',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | INFO <?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_15489664935cbcc4e360e6c9_17409025 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_15489664935cbcc4e360e6c9_17409025',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
/component.css" rel="stylesheet">

    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/jquery.guillotine.css" media="all" rel="stylesheet" type="text/css" />

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
modernizr.custom.js"><?php echo '</script'; ?>
>

<?php
}
}
/* {/block 'head'} */
/* {block 'body'} */
class Block_19280539145cbcc4e3618072_98246195 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_19280539145cbcc4e3618072_98246195',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>





    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">

            <h2>Renewable Organizations</h2>


            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/staff">Home</a>
                </li>
                <li>
                    <a href="javascript:void 0">Organizations</a>
                </li>

                <li class="active">
                    <strong>list of Orgs</strong>
                </li>
            </ol>
        </div>


    </div>


    <div class="wrapper wrapper-content">

        <div class="m-t-md m-b-md">

            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\admin_user_organization_populate.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        </div>


        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'footer', array(), true);?>


    </div>




<?php
}
}
/* {/block 'body'} */
}
