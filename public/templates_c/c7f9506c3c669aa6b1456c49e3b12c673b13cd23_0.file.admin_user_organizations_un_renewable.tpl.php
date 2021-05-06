<?php
/* Smarty version 3.1.33, created on 2019-05-11 21:59:42
  from 'C:\laragon\www\SCOA\public\included_template\admin\admin_user_organizations_un_renewable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd6d54e7ebd20_17921175',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7f9506c3c669aa6b1456c49e3b12c673b13cd23' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\public\\included_template\\admin\\admin_user_organizations_un_renewable.tpl',
      1 => 1555264890,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd6d54e7ebd20_17921175 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>





<?php $_smarty_tpl->_assignInScope('org', $_smarty_tpl->tpl_vars['user_org']->value[0] ,true);?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11433761295cd6d54e6591a2_11427863', 'title');
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16865977255cd6d54e65ab45_64227781', 'head');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7788151245cd6d54e70e3b6_41675740', 'body');
?>






<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\structures\admin_structure.tpl");
}
/* {block 'title'} */
class Block_11433761295cd6d54e6591a2_11427863 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_11433761295cd6d54e6591a2_11427863',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | INFO <?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_16865977255cd6d54e65ab45_64227781 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_16865977255cd6d54e65ab45_64227781',
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
class Block_7788151245cd6d54e70e3b6_41675740 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_7788151245cd6d54e70e3b6_41675740',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>





    <div class="row wrapper border-bottom white-bg page-heading">


        <div class="col-sm-12">

            <h2>Nonrenewal organizations</h2>

            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/staff">Home</a>
                </li>
                <li>
                    <a href="javascript:void 0">Organizations</a>
                </li>

                <li class="active">
                    <strong>Nonrenewal organizations</strong>
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
