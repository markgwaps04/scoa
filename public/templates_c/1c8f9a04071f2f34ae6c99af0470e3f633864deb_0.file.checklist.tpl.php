<?php
/* Smarty version 3.1.33, created on 2021-05-06 12:57:02
  from 'C:\xampp\htdocs\scoa\app\views\admin\index\checklist.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6093771eb04694_14037105',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c8f9a04071f2f34ae6c99af0470e3f633864deb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\scoa\\app\\views\\admin\\index\\checklist.tpl',
      1 => 1551527926,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6093771eb04694_14037105 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8454140366093771eafab38_50341124', 'title');
?>





<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\admin_checklist.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9443021586093771eb02087_17002654', 'head');
?>



<?php echo '<script'; ?>
>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2765778026093771eb03893_99171386', 'inner_script');
?>



<?php echo '</script'; ?>
><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\structures\admin_structure.tpl");
}
/* {block 'title'} */
class Block_8454140366093771eafab38_50341124 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_8454140366093771eafab38_50341124',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | CHECKLIST <?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_9443021586093771eb02087_17002654 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_9443021586093771eb02087_17002654',
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
class Block_2765778026093771eb03893_99171386 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'inner_script' => 
  array (
    0 => 'Block_2765778026093771eb03893_99171386',
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
