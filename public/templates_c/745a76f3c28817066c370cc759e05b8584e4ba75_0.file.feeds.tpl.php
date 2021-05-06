<?php
/* Smarty version 3.1.33, created on 2019-04-22 03:30:49
  from 'C:\wamp64\www\SCOA\app\views\admin\index\feeds.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cbcc4e95a0851_73465764',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '745a76f3c28817066c370cc759e05b8584e4ba75' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\app\\views\\admin\\index\\feeds.tpl',
      1 => 1549610114,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cbcc4e95a0851_73465764 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php $_smarty_tpl->_assignInScope('isStrict', 'true' ,true);?>

<?php $_smarty_tpl->_assignInScope('org', $_smarty_tpl->tpl_vars['user_org']->value[0]);?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3577535955cbcc4e951f306_81580152', 'title');
?>





<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17102242355cbcc4e9528c39_80686472', 'upper_head');
?>







<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14532617505cbcc4e9544d28_77623261', 'script');
?>











<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18661709605cbcc4e9557710_25112557', 'body');
?>



<?php echo '<script'; ?>
>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20416491535cbcc4e9571303_49305693', 'inner_script');
?>


<?php echo '</script'; ?>
><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\structures\admin_structure.tpl");
}
/* {block 'title'} */
class Block_3577535955cbcc4e951f306_81580152 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_3577535955cbcc4e951f306_81580152',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | FEEDS <?php
}
}
/* {/block 'title'} */
/* {block 'upper_head'} */
class Block_17102242355cbcc4e9528c39_80686472 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'upper_head' => 
  array (
    0 => 'Block_17102242355cbcc4e9528c39_80686472',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
ckin.min.css?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" media="all" rel="stylesheet" type="text/css" />

    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">

    <style>

        .file-thumb-progress.kv-hidden
        {
            top: 34px !important;
        }
        .scoa-textarea
        {
            color: black;
        }

    </style>


<?php
}
}
/* {/block 'upper_head'} */
/* {block 'script'} */
class Block_14532617505cbcc4e9544d28_77623261 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_14532617505cbcc4e9544d28_77623261',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/blueimp/jquery.blueimp-gallery.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
ckin.min.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" type="text/javascript"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
fileinput.min.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" type="text/javascript"><?php echo '</script'; ?>
>


<?php
}
}
/* {/block 'script'} */
/* {block 'body'} */
class Block_18661709605cbcc4e9557710_25112557 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_18661709605cbcc4e9557710_25112557',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\misc\org_info_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\admin_feeds.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


<?php
}
}
/* {/block 'body'} */
/* {block 'inner_script'} */
class Block_20416491535cbcc4e9571303_49305693 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'inner_script' => 
  array (
    0 => 'Block_20416491535cbcc4e9571303_49305693',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    


    //initialize post_box action


    try{

        let scoa = jQuery.scoa;




        scoa.post_box._call("post_box *");

        scoa.file_input._call('#scoa-file-browser',"../upload");

        let create_post = scoa.create_post;

        create_post.uri = "../post_request/<?php echo $_smarty_tpl->tpl_vars['org']->value['RCode'];?>
";
        create_post.org_uri = "<?php echo $_smarty_tpl->tpl_vars['org']->value['url'];?>
";
        create_post._call('.post-button','.scoa-textarea');

        scoa.feed._call("feeds:last-of-type","<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/scoa_feeds/org_posts/<?php echo $_smarty_tpl->tpl_vars['org']->value['RCode'];?>
","<?php echo $_smarty_tpl->tpl_vars['org']->value['url'];?>
");



    }catch(err)
    {

        swal("Reloading...", "authentication request failed please wait while reprocessing your request", "error");

        window.location.reload();

    }



    



    <?php
}
}
/* {/block 'inner_script'} */
}
