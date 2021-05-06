<?php
/* Smarty version 3.1.33, created on 2019-05-11 20:04:31
  from 'C:\laragon\www\SCOA\app\views\admin\index\checklist.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd6ba4fc5f540_39727860',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04c0aa4dfb3a5ef5890cfd81f1ae5566fda8efcd' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\app\\views\\admin\\index\\checklist.tpl',
      1 => 1551527926,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd6ba4fc5f540_39727860 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12550406805cd6ba4fc588d8_72610576', 'title');
?>





<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\admin_checklist.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6905007175cd6ba4fc5e195_62975891', 'head');
?>



<?php echo '<script'; ?>
>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3649835845cd6ba4fc5ed96_11822821', 'inner_script');
?>



<?php echo '</script'; ?>
><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\structures\admin_structure.tpl");
}
/* {block 'title'} */
class Block_12550406805cd6ba4fc588d8_72610576 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_12550406805cd6ba4fc588d8_72610576',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | CHECKLIST <?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_6905007175cd6ba4fc5e195_62975891 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_6905007175cd6ba4fc5e195_62975891',
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
class Block_3649835845cd6ba4fc5ed96_11822821 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'inner_script' => 
  array (
    0 => 'Block_3649835845cd6ba4fc5ed96_11822821',
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
