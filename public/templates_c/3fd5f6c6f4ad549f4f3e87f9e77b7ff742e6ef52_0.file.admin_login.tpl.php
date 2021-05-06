<?php
/* Smarty version 3.1.33, created on 2019-05-11 12:03:37
  from 'C:\laragon\www\SCOA\app\views\admin\login\admin_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd6ba195ad7a5_37773586',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3fd5f6c6f4ad549f4f3e87f9e77b7ff742e6ef52' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\app\\views\\admin\\login\\admin_login.tpl',
      1 => 1552915738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd6ba195ad7a5_37773586 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'if_has_admin' => 
  array (
    'compiled_filepath' => 'C:\\laragon\\www\\SCOA\\public\\templates_c\\3fd5f6c6f4ad549f4f3e87f9e77b7ff742e6ef52_0.file.admin_login.tpl.php',
    'uid' => '3fd5f6c6f4ad549f4f3e87f9e77b7ff742e6ef52',
    'call_name' => 'smarty_template_function_if_has_admin_17206027395cd6ba1953d496_64398450',
  ),
  'if_has_no_admin' => 
  array (
    'compiled_filepath' => 'C:\\laragon\\www\\SCOA\\public\\templates_c\\3fd5f6c6f4ad549f4f3e87f9e77b7ff742e6ef52_0.file.admin_login.tpl.php',
    'uid' => '3fd5f6c6f4ad549f4f3e87f9e77b7ff742e6ef52',
    'call_name' => 'smarty_template_function_if_has_no_admin_17206027395cd6ba1953d496_64398450',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17450108485cd6ba19598d59_14476936', 'navbar');
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1101438125cd6ba1959cd56_34053533', 'header');
?>






















<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'if_has_admin', array(), true);
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\home\header_view_structure.tpl");
}
/* {block 'navbar'} */
class Block_17450108485cd6ba19598d59_14476936 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'navbar' => 
  array (
    0 => 'Block_17450108485cd6ba19598d59_14476936',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <li>
        <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/home">
            Log In as User
        </a>
    </li>


<?php
}
}
/* {/block 'navbar'} */
/* {block 'header'} */
class Block_1101438125cd6ba1959cd56_34053533 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_1101438125cd6ba1959cd56_34053533',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <style>

        .text-danger {

            color : firebrick;

        }


    </style>

<?php
}
}
/* {/block 'header'} */
/* {block 'script'} */
class Block_1432368745cd6ba195a0a04_02233980 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_1432368745cd6ba195a0a04_02233980',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 
        

            <?php echo '<script'; ?>
 type="text/javascript">
                function whenclose(e){
                    $(e.parentElement).fadeOut();
                }
            <?php echo '</script'; ?>
>

        


        <?php
}
}
/* {/block 'script'} */
/* {block 'body'} */
class Block_4074172765cd6ba195a2238_89105965 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_4074172765cd6ba195a2238_89105965',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 
        <div class="module module-login span4 offset4">


            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
staff" class="form-vertical">

                <div class="module-head">
                    <h3>Sign in</h3>
                </div>



                <div class="module-body">

                    <div class="control-group">
                        <div class="controls row-fluid">
                            <input class="span12" type="text" name="user" id="inputEmail" placeholder="Username or Admin code" required>
                        </div>
                    </div>
                    <div class="control-group Err">
                        <div class="controls row-fluid">
                            <input class="span12" type="password"  name="pass" id="inputPassword" placeholder="Password" required>
                        </div>
                    </div>


                    
                    <?php if ($_smarty_tpl->tpl_vars['request']->value == 1) {?>
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <div class="alert alert-error fade in">
                                    <button type="button" class="close"  onclick="whenclose(this)" >×</button>
                                    The Username/ID and password combination you entered cannot be recognized or does not exist. Please try again.
                                </div>
                            </div>
                        </div>

                    <?php } elseif ($_smarty_tpl->tpl_vars['request']->value == -1) {?>

                        <div class="control-group">
                            <div class="controls row-fluid">
                                <div class="alert alert-error fade in">
                                    <button type="button" class="close"  onclick="whenclose(this)" >×</button>
                                    Username or ID doesn't exist
                                </div>
                            </div>
                        </div>


                    <?php }?>






                </div>
                <div class="module-foot">
                    <div class="control-group">
                        <div class="controls clearfix">
                            <button type="submit"  class="btn btn-primary pull-right">Login</button>
                            <label class="checkbox">
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    <?php
}
}
/* {/block 'body'} */
/* smarty_template_function_if_has_admin_17206027395cd6ba1953d496_64398450 */
if (!function_exists('smarty_template_function_if_has_admin_17206027395cd6ba1953d496_64398450')) {
function smarty_template_function_if_has_admin_17206027395cd6ba1953d496_64398450(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


    <SCRIPTS>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1432368745cd6ba195a0a04_02233980', 'script');
?>
 
    </SCRIPTS>



    <BODY>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4074172765cd6ba195a2238_89105965', 'body');
?>
 
    </BODY>


<?php
}}
/*/ smarty_template_function_if_has_admin_17206027395cd6ba1953d496_64398450 */
/* {block 'body'} */
class Block_2162759305cd6ba195a7c71_23090179 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_2162759305cd6ba195a7c71_23090179',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 

        <div class="module module-login span4 offset4">



            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
staff/_new" class="form-vertical sign-up-form">

                <div class="module-head">
                    <h3>Sign Up</h3>
                </div>


                <div class="module-body">

                    <div class="alert alert-info fade in">
                        <i class="fa fa-exclamation-circle"></i>
                        Welcome to your site, fill the fields above
                        to see the action.
                    </div>


                    <div class="control-group">

                        <div class="controls row-fluid">
                            <input class="span12" type="text" name="Firstname" id="Firstname" placeholder="First name" required>
                        </div>

                    </div>

                    <div class="control-group Err">

                        <div class="controls row-fluid">
                            <input class="span12" type="text"  name="Lastname" id="Lastname" placeholder="Lastname" required>
                        </div>

                    </div>


                    <div class="control-group Err">

                        <div class="controls row-fluid">
                            <input class="span12" type="text"  name="user_url" id="user_url" placeholder="Username" required>
                        </div>

                    </div>

                    <div class="control-group Err">

                        <div class="controls row-fluid">
                            <input class="span12" type="text" id="CP" name="CP" data-mask="(+63) 9999 999 999"  placeholder="Phone number" required>
                        </div>

                    </div>


                    <div class="control-group Err">

                        <div class="controls row-fluid">
                            <input class="span12" type="password"  id="password"  name="password" placeholder="Password" required>
                        </div>

                    </div>


                    <div class="control-group Err">

                        <div class="controls row-fluid">
                            <input class="span12" type="password"  id="confirm_password" placeholder="Confirm password" required>
                        </div>

                    </div>


                </div>



                <div class="module-foot">
                    <div class="control-group">
                        <div class="controls clearfix">
                            <button type="submit"  class="btn btn-primary pull-right">Login</button>
                            <label class="checkbox">
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    <?php
}
}
/* {/block 'body'} */
/* {block 'script'} */
class Block_6345778395cd6ba195a8bf8_69166030 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_6345778395cd6ba195a8bf8_69166030',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
/scoa/scoa_login_admin_validation.js" crossorigin="anonymous"><?php echo '</script'; ?>
>

        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
/plugins/jasny/jasny-bootstrap.min.js" crossorigin="anonymous"><?php echo '</script'; ?>
>

    <?php
}
}
/* {/block 'script'} */
/* smarty_template_function_if_has_no_admin_17206027395cd6ba1953d496_64398450 */
if (!function_exists('smarty_template_function_if_has_no_admin_17206027395cd6ba1953d496_64398450')) {
function smarty_template_function_if_has_no_admin_17206027395cd6ba1953d496_64398450(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2162759305cd6ba195a7c71_23090179', 'body');
?>
 


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6345778395cd6ba195a8bf8_69166030', 'script');
?>



<?php
}}
/*/ smarty_template_function_if_has_no_admin_17206027395cd6ba1953d496_64398450 */
}
