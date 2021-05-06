<?php
/* Smarty version 3.1.33, created on 2019-04-17 15:28:18
  from 'C:\wamp64\www\SCOA\app\views\Users\home\welcome_page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb6d592021482_48990026',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '212c7a45fa485c5820d9bfe6f9a6d83cd144414a' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\app\\views\\Users\\home\\welcome_page.tpl',
      1 => 1554250420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb6d592021482_48990026 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'welcome' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\212c7a45fa485c5820d9bfe6f9a6d83cd144414a_0.file.welcome_page.tpl.php',
    'uid' => '212c7a45fa485c5820d9bfe6f9a6d83cd144414a',
    'call_name' => 'smarty_template_function_welcome_11131350845cb6d591cc4590_49759574',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6458080315cb6d591de0c15_27340421', 'title');
?>




















<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3435619505cb6d592008ed5_40631903', 'script');
?>














<SCOA_BODY>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2626886885cb6d59200ef06_76730469', 'body');
?>



</SCOA_BODY>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public/included_template/user/user_index_structure.tpl");
}
/* {block 'title'} */
class Block_6458080315cb6d591de0c15_27340421 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_6458080315cb6d591de0c15_27340421',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | Home<?php
}
}
/* {/block 'title'} */
/* smarty_template_function_welcome_11131350845cb6d591cc4590_49759574 */
if (!function_exists('smarty_template_function_welcome_11131350845cb6d591cc4590_49759574')) {
function smarty_template_function_welcome_11131350845cb6d591cc4590_49759574(Smarty_Internal_Template $_smarty_tpl,$params) {
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
/*/ smarty_template_function_welcome_11131350845cb6d591cc4590_49759574 */
/* {block 'script'} */
class Block_3435619505cb6d592008ed5_40631903 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_3435619505cb6d592008ed5_40631903',
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
class Block_17438050265cb6d5920162d5_32430863 extends Smarty_Internal_Block
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
class Block_2626886885cb6d59200ef06_76730469 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_2626886885cb6d59200ef06_76730469',
  ),
  'info' => 
  array (
    0 => 'Block_17438050265cb6d5920162d5_32430863',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">

        <div class="col-md-8">



          <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'welcome', array(), true);?>


        </div>




        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17438050265cb6d5920162d5_32430863', 'info', $this->tplIndex);
?>





    </div>


    <?php
}
}
/* {/block 'body'} */
}
