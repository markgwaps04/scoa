<?php
/* Smarty version 3.1.33, created on 2019-05-30 19:36:06
  from 'C:\laragon\www\SCOA\public\included_template\user\user_index_feeds.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cefc0268fef92_26171397',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b087b296e928ed1b6093c3f654d836b00c979a11' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\public\\included_template\\user\\user_index_feeds.tpl',
      1 => 1559216058,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cefc0268fef92_26171397 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'main_feeds' => 
  array (
    'compiled_filepath' => 'C:\\laragon\\www\\SCOA\\public\\templates_c\\b087b296e928ed1b6093c3f654d836b00c979a11_0.file.user_index_feeds.tpl.php',
    'uid' => 'b087b296e928ed1b6093c3f654d836b00c979a11',
    'call_name' => 'smarty_template_function_main_feeds_15710678215cefc026878d18_13546197',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php echo '<script'; ?>
><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12677677945cefc0268db906_18524403', 'innerscript');
echo '</script'; ?>
><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19350304135cefc0268f1325_26851554', 'content');
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16936881615cefc0268fb654_42508963', 'head');
?>



<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_feed_structure.tpl");
}
/* {block 'innerscript'} */
class Block_12677677945cefc0268db906_18524403 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'innerscript' => 
  array (
    0 => 'Block_12677677945cefc0268db906_18524403',
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
/* smarty_template_function_main_feeds_15710678215cefc026878d18_13546197 */
if (!function_exists('smarty_template_function_main_feeds_15710678215cefc026878d18_13546197')) {
function smarty_template_function_main_feeds_15710678215cefc026878d18_13546197(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\misc\content_feeds.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}}
/*/ smarty_template_function_main_feeds_15710678215cefc026878d18_13546197 */
/* {block 'content'} */
class Block_19350304135cefc0268f1325_26851554 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_19350304135cefc0268f1325_26851554',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('org', $_smarty_tpl->tpl_vars['user_club']->value);?><div id="body_content"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'main_feeds', array(), true);?>
</div><?php
}
}
/* {/block 'content'} */
/* {block 'head'} */
class Block_16936881615cefc0268fb654_42508963 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_16936881615cefc0268fb654_42508963',
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
