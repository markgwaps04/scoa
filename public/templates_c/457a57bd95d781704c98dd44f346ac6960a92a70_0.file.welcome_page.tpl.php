<?php
/* Smarty version 3.1.33, created on 2019-05-11 22:26:39
  from 'C:\laragon\www\SCOA\app\views\Users\home\welcome_page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd6db9fef5022_02901877',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '457a57bd95d781704c98dd44f346ac6960a92a70' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\app\\views\\Users\\home\\welcome_page.tpl',
      1 => 1554250420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd6db9fef5022_02901877 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'welcome' => 
  array (
    'compiled_filepath' => 'C:\\laragon\\www\\SCOA\\public\\templates_c\\457a57bd95d781704c98dd44f346ac6960a92a70_0.file.welcome_page.tpl.php',
    'uid' => '457a57bd95d781704c98dd44f346ac6960a92a70',
    'call_name' => 'smarty_template_function_welcome_16087759295cd6db9f6de629_13185248',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_210829545cd6db9fc9fc31_09242533', 'title');
?>




















<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15507406655cd6db9febb6a5_26362945', 'script');
?>














<SCOA_BODY>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17617887185cd6db9febc290_11114274', 'body');
?>



</SCOA_BODY>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public/included_template/user/user_index_structure.tpl");
}
/* {block 'title'} */
class Block_210829545cd6db9fc9fc31_09242533 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_210829545cd6db9fc9fc31_09242533',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | Home<?php
}
}
/* {/block 'title'} */
/* smarty_template_function_welcome_16087759295cd6db9f6de629_13185248 */
if (!function_exists('smarty_template_function_welcome_16087759295cd6db9f6de629_13185248')) {
function smarty_template_function_welcome_16087759295cd6db9f6de629_13185248(Smarty_Internal_Template $_smarty_tpl,$params) {
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
/*/ smarty_template_function_welcome_16087759295cd6db9f6de629_13185248 */
/* {block 'script'} */
class Block_15507406655cd6db9febb6a5_26362945 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_15507406655cd6db9febb6a5_26362945',
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
class Block_3838766245cd6db9fef36e3_78422055 extends Smarty_Internal_Block
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
class Block_17617887185cd6db9febc290_11114274 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_17617887185cd6db9febc290_11114274',
  ),
  'info' => 
  array (
    0 => 'Block_3838766245cd6db9fef36e3_78422055',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">

        <div class="col-md-8">



          <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'welcome', array(), true);?>


        </div>




        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3838766245cd6db9fef36e3_78422055', 'info', $this->tplIndex);
?>





    </div>


    <?php
}
}
/* {/block 'body'} */
}
