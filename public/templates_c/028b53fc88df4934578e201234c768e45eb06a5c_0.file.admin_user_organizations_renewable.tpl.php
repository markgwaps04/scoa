<?php
/* Smarty version 3.1.33, created on 2021-05-06 12:55:44
  from 'C:\xampp\htdocs\scoa\public\included_template\admin\admin_user_organizations_renewable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_609376d02dfca7_70854341',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '028b53fc88df4934578e201234c768e45eb06a5c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\scoa\\public\\included_template\\admin\\admin_user_organizations_renewable.tpl',
      1 => 1549644176,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609376d02dfca7_70854341 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>





<?php $_smarty_tpl->_assignInScope('org', $_smarty_tpl->tpl_vars['user_org']->value[0] ,true);?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_262757964609376d02d3172_63319013', 'title');
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2140457487609376d02d5133_02600156', 'head');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1164163882609376d02dab15_54397082', 'body');
?>






<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\structures\admin_structure.tpl");
}
/* {block 'title'} */
class Block_262757964609376d02d3172_63319013 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_262757964609376d02d3172_63319013',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | INFO <?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_2140457487609376d02d5133_02600156 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_2140457487609376d02d5133_02600156',
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
class Block_1164163882609376d02dab15_54397082 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_1164163882609376d02dab15_54397082',
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
