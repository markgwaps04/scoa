<?php
/* Smarty version 3.1.33, created on 2021-05-06 06:33:50
  from 'C:\xampp\htdocs\scoa\app\views\admin\login\admin_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_609371aef1c360_37943211',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7ffd69d658c1143016be3b18a8f92567ff07f83' => 
    array (
      0 => 'C:\\xampp\\htdocs\\scoa\\app\\views\\admin\\login\\admin_login.tpl',
      1 => 1552915738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609371aef1c360_37943211 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'if_has_admin' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\scoa\\public\\templates_c\\c7ffd69d658c1143016be3b18a8f92567ff07f83_0.file.admin_login.tpl.php',
    'uid' => 'c7ffd69d658c1143016be3b18a8f92567ff07f83',
    'call_name' => 'smarty_template_function_if_has_admin_1722881146609371aeea2815_08661807',
  ),
  'if_has_no_admin' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\scoa\\public\\templates_c\\c7ffd69d658c1143016be3b18a8f92567ff07f83_0.file.admin_login.tpl.php',
    'uid' => 'c7ffd69d658c1143016be3b18a8f92567ff07f83',
    'call_name' => 'smarty_template_function_if_has_no_admin_1722881146609371aeea2815_08661807',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_762283749609371aef0f2f4_26242318', 'navbar');
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_971534148609371aef11f20_55371815', 'header');
?>






















<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'if_has_admin', array(), true);
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\home\header_view_structure.tpl");
}
/* {block 'navbar'} */
class Block_762283749609371aef0f2f4_26242318 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'navbar' => 
  array (
    0 => 'Block_762283749609371aef0f2f4_26242318',
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
class Block_971534148609371aef11f20_55371815 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_971534148609371aef11f20_55371815',
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
class Block_2058182925609371aef14c59_43200695 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_2058182925609371aef14c59_43200695',
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
class Block_373180986609371aef15833_58387980 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_373180986609371aef15833_58387980',
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
/* smarty_template_function_if_has_admin_1722881146609371aeea2815_08661807 */
if (!function_exists('smarty_template_function_if_has_admin_1722881146609371aeea2815_08661807')) {
function smarty_template_function_if_has_admin_1722881146609371aeea2815_08661807(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


    <SCRIPTS>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2058182925609371aef14c59_43200695', 'script');
?>
 
    </SCRIPTS>



    <BODY>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_373180986609371aef15833_58387980', 'body');
?>
 
    </BODY>


<?php
}}
/*/ smarty_template_function_if_has_admin_1722881146609371aeea2815_08661807 */
/* {block 'body'} */
class Block_433256053609371aef19868_68937727 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_433256053609371aef19868_68937727',
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
class Block_1767727227609371aef1a3f3_54066042 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_1767727227609371aef1a3f3_54066042',
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
/* smarty_template_function_if_has_no_admin_1722881146609371aeea2815_08661807 */
if (!function_exists('smarty_template_function_if_has_no_admin_1722881146609371aeea2815_08661807')) {
function smarty_template_function_if_has_no_admin_1722881146609371aeea2815_08661807(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_433256053609371aef19868_68937727', 'body');
?>
 


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1767727227609371aef1a3f3_54066042', 'script');
?>



<?php
}}
/*/ smarty_template_function_if_has_no_admin_1722881146609371aeea2815_08661807 */
}
