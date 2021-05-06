<?php
/* Smarty version 3.1.33, created on 2021-05-06 12:24:55
  from 'C:\xampp\htdocs\scoa\app\views\Users\home\welcome_page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60936f9787cf77_10133105',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c149a9585a74c6cadab7ae94841acbadd53be12c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\scoa\\app\\views\\Users\\home\\welcome_page.tpl',
      1 => 1554250420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60936f9787cf77_10133105 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'welcome' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\scoa\\public\\templates_c\\c149a9585a74c6cadab7ae94841acbadd53be12c_0.file.welcome_page.tpl.php',
    'uid' => 'c149a9585a74c6cadab7ae94841acbadd53be12c',
    'call_name' => 'smarty_template_function_welcome_126326503760936f974ee3b0_29720529',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_116628768860936f976c1ca6_36245761', 'title');
?>




















<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_203255400360936f97841ac8_76522927', 'script');
?>














<SCOA_BODY>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_152839525260936f978423e5_85863626', 'body');
?>



</SCOA_BODY>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public/included_template/user/user_index_structure.tpl");
}
/* {block 'title'} */
class Block_116628768860936f976c1ca6_36245761 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_116628768860936f976c1ca6_36245761',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | Home<?php
}
}
/* {/block 'title'} */
/* smarty_template_function_welcome_126326503760936f974ee3b0_29720529 */
if (!function_exists('smarty_template_function_welcome_126326503760936f974ee3b0_29720529')) {
function smarty_template_function_welcome_126326503760936f974ee3b0_29720529(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>



    <?php $_smarty_tpl->_assignInScope('has_organization', $_smarty_tpl->tpl_vars['club']->value->has_club());?>


        <?php if (!$_smarty_tpl->tpl_vars['has_organization']->value) {?>


            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_new_user.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


        <?php } else { ?>

            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_activity_and_organizations.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        <?php }?>




<?php
}}
/*/ smarty_template_function_welcome_126326503760936f974ee3b0_29720529 */
/* {block 'script'} */
class Block_203255400360936f97841ac8_76522927 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_203255400360936f97841ac8_76522927',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
>

        (function(__){

            __(document).ready(function () {

                jQuery._scoa();

            })

        })(jQuery)

    <?php echo '</script'; ?>
>



<?php
}
}
/* {/block 'script'} */
/* {block 'info'} */
class Block_207872808660936f9787b8a2_38537129 extends Smarty_Internal_Block
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
class Block_152839525260936f978423e5_85863626 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_152839525260936f978423e5_85863626',
  ),
  'info' => 
  array (
    0 => 'Block_207872808660936f9787b8a2_38537129',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">

        <div class="col-md-8">



          <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'welcome', array(), true);?>


        </div>




        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_207872808660936f9787b8a2_38537129', 'info', $this->tplIndex);
?>





    </div>


    <?php
}
}
/* {/block 'body'} */
}
