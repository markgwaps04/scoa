<?php
/* Smarty version 3.1.33, created on 2019-04-17 15:28:35
  from 'C:\wamp64\www\SCOA\public\included_template\user\user_index_feeds.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb6d5a32f0d07_08876826',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5987374ef0bbb5745182db043caea21c764289d5' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\user\\user_index_feeds.tpl',
      1 => 1522545451,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb6d5a32f0d07_08876826 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php echo '<script'; ?>
><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17114573675cb6d5a327db66_80480323', 'innerscript');
echo '</script'; ?>
><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10959561945cb6d5a32ba3b1_46700319', 'content');
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14495970175cb6d5a32e5c21_71912042', 'head');
?>



<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_feed_structure.tpl");
}
/* {block 'innerscript'} */
class Block_17114573675cb6d5a327db66_80480323 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'innerscript' => 
  array (
    0 => 'Block_17114573675cb6d5a327db66_80480323',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
$('.tagsinput').tagsinput({tagClass: 'label label-primary',maxTags: 4,maxChars: 11,confirmKeys: [13,32,44,8],trimValue : true});window.scoa_token = `<?php echo $_smarty_tpl->tpl_vars['user_club']->value['url'];?>
`;/** initialize post_box action **/jQuery.scoa._reset = function(){try{const club_url = "<?php echo $_smarty_tpl->tpl_vars['user_club']->value['url'];?>
";let scoa = jQuery.scoa;scoa.post_box._call("post_box *");scoa.file_input._call('#scoa-file-browser',"../feeds/upload");let create_post = scoa.create_post;create_post.uri = "../feeds/post_request";create_post.org_uri = club_url;create_post._call('.post-button','.scoa-textarea');scoa.feed._call("feeds:last-of-type","<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/feeds/users_post",club_url);jQuery._scoa({postOptions : {Ajax_parameter : {url : club_url},}});}catch(err){console.log(err);swal("Reloading...", "authentication request failed please wait while reprocessing your request", "error");/** window.location.reload() **/}return true;}();<?php
}
}
/* {/block 'innerscript'} */
/* {block 'content'} */
class Block_10959561945cb6d5a32ba3b1_46700319 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_10959561945cb6d5a32ba3b1_46700319',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('org', $_smarty_tpl->tpl_vars['user_club']->value);?><div id="body_content"><?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\misc\content_feeds.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></div><?php
}
}
/* {/block 'content'} */
/* {block 'head'} */
class Block_14495970175cb6d5a32e5c21_71912042 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_14495970175cb6d5a32e5c21_71912042',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
<link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/spreadsheet/spreadsheet.css?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" rel="stylesheet"><link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet"><?php
}
}
/* {/block 'head'} */
}
