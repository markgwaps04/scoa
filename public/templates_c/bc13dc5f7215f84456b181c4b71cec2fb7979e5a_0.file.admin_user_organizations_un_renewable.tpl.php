<?php
/* Smarty version 3.1.33, created on 2019-04-24 16:39:49
  from 'C:\wamp64\www\SCOA\public\included_template\admin\admin_user_organizations_un_renewable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cc020d5913444_92683549',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc13dc5f7215f84456b181c4b71cec2fb7979e5a' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\admin\\admin_user_organizations_un_renewable.tpl',
      1 => 1555264890,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cc020d5913444_92683549 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>





<?php $_smarty_tpl->_assignInScope('org', $_smarty_tpl->tpl_vars['user_org']->value[0] ,true);?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12718400105cc020d58f27a4_71775021', 'title');
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16466072175cc020d58f84a7_17612153', 'head');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4899182945cc020d5902877_61507035', 'body');
?>






<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\structures\admin_structure.tpl");
}
/* {block 'title'} */
class Block_12718400105cc020d58f27a4_71775021 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_12718400105cc020d58f27a4_71775021',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | INFO <?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_16466072175cc020d58f84a7_17612153 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_16466072175cc020d58f84a7_17612153',
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
class Block_4899182945cc020d5902877_61507035 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_4899182945cc020d5902877_61507035',
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
