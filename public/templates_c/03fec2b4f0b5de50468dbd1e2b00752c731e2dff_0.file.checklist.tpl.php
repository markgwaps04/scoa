<?php
/* Smarty version 3.1.33, created on 2019-04-20 22:58:56
  from 'C:\wamp64\www\SCOA\app\views\admin\index\checklist.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cbb33b09e4090_98386542',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03fec2b4f0b5de50468dbd1e2b00752c731e2dff' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\app\\views\\admin\\index\\checklist.tpl',
      1 => 1551527926,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cbb33b09e4090_98386542 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19366370625cbb33b09a0c00_15769399', 'title');
?>





<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\admin_checklist.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10478824645cbb33b09db3d0_90867867', 'head');
?>



<?php echo '<script'; ?>
>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4072680605cbb33b09e0cf1_91689657', 'inner_script');
?>



<?php echo '</script'; ?>
><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\structures\admin_structure.tpl");
}
/* {block 'title'} */
class Block_19366370625cbb33b09a0c00_15769399 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_19366370625cbb33b09a0c00_15769399',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | CHECKLIST <?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_10478824645cbb33b09db3d0_90867867 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_10478824645cbb33b09db3d0_90867867',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <style>

        .vote-icon-success
        {
            vertical-align: -19px;
            font-size: 25px;
            color: #1ab394 !important;
        }

        .vote-icon-error
        {
            vertical-align: -19px;
            font-size: 25px;
            color: #b34f15 !important;
        }


    </style>



<?php
}
}
/* {/block 'head'} */
/* {block 'inner_script'} */
class Block_4072680605cbb33b09e0cf1_91689657 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'inner_script' => 
  array (
    0 => 'Block_4072680605cbb33b09e0cf1_91689657',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    jQuery._scoa();


<?php
}
}
/* {/block 'inner_script'} */
}
