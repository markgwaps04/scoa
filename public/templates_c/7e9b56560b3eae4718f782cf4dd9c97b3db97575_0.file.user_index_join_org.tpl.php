<?php
/* Smarty version 3.1.33, created on 2019-04-20 23:52:30
  from 'C:\wamp64\www\SCOA\public\included_template\user\user_index_join_org.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cbb403e1c3df1_82422140',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e9b56560b3eae4718f782cf4dd9c97b3db97575' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\user\\user_index_join_org.tpl',
      1 => 1548825990,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cbb403e1c3df1_82422140 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>



<SCOA_BODY>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9028111755cbb403e18afa1_72787488', 'body');
?>



</SCOA_BODY>



<?php }
/* {block 'info'} */
class Block_6300994205cbb403e1b1481_04832296 extends Smarty_Internal_Block
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
class Block_9028111755cbb403e18afa1_72787488 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_9028111755cbb403e18afa1_72787488',
  ),
  'info' => 
  array (
    0 => 'Block_6300994205cbb403e1b1481_04832296',
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6300994205cbb403e1b1481_04832296', 'info', $this->tplIndex);
?>



    </div>


    <?php
}
}
/* {/block 'body'} */
}
