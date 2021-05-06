<?php
/* Smarty version 3.1.33, created on 2019-05-30 19:32:32
  from 'C:\laragon\www\SCOA\public\included_template\user\user_index_join_org.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cefbf50a9cc18_74592041',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ab72cc16f3efce9bbd546c49782ad023725031e' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\public\\included_template\\user\\user_index_join_org.tpl',
      1 => 1559215946,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cefbf50a9cc18_74592041 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>



<SCOA_BODY>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8080436515cefbf50a90ef2_17619553', 'body');
?>



</SCOA_BODY>



<?php }
/* {block 'info'} */
class Block_14330673435cefbf50a9b404_58257081 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_right_div.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        <?php
}
}
/* {/block 'info'} */
/* {block 'body'} */
class Block_8080436515cefbf50a90ef2_17619553 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_8080436515cefbf50a90ef2_17619553',
  ),
  'info' => 
  array (
    0 => 'Block_14330673435cefbf50a9b404_58257081',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



        <div class="row">

        <div class="col-md-8">


            <div class="alert alert-dark" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->
                <i class="fa fa-angle-left" style="font-size: 19px;vertical-align: bottom"></i>&nbsp;
                <a class="alert-link" href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
">Back to home </a>

            </div>


            <?php if ($_smarty_tpl->tpl_vars['request']->value == 1) {?>

            <div class="alert alert-warning" style="background-color: #fdfdfde0">
                <i class="fa fa-exclamation-triangle" style="font-size: 15px"></i>&nbsp;
                <a class="alert-link" href="#">Invalid Request.</a> code is does'nt exist or the position you selected is not available or you have nor permission to join this organization if you think this is a mistake <a href="#">Let us know</a>.
            </div>

            <?php }?>

            <div class="alert alert-info" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->
                No organization yet ? sent us a request to <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/organization/create" class="alert-link">create your organization</a> or personally talk to us at our office.
            </div>


            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_join_org_template.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        </div>


        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14330673435cefbf50a9b404_58257081', 'info', $this->tplIndex);
?>



    </div>


    <?php
}
}
/* {/block 'body'} */
}
