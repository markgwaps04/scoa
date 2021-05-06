<?php
/* Smarty version 3.1.33, created on 2019-04-17 05:31:47
  from 'C:\wamp64\www\SCOA\app\views\admin\login\admin_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb6ba43721d76_67148456',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b36b27e91ecfc4634675facc9a7d010235464fe' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\app\\views\\admin\\login\\admin_login.tpl',
      1 => 1552915738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb6ba43721d76_67148456 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'if_has_admin' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\3b36b27e91ecfc4634675facc9a7d010235464fe_0.file.admin_login.tpl.php',
    'uid' => '3b36b27e91ecfc4634675facc9a7d010235464fe',
    'call_name' => 'smarty_template_function_if_has_admin_14078906945cb6ba42bcd5e2_99660838',
  ),
  'if_has_no_admin' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\3b36b27e91ecfc4634675facc9a7d010235464fe_0.file.admin_login.tpl.php',
    'uid' => '3b36b27e91ecfc4634675facc9a7d010235464fe',
    'call_name' => 'smarty_template_function_if_has_no_admin_14078906945cb6ba42bcd5e2_99660838',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8549317095cb6ba433de571_91170109', 'navbar');
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19296741715cb6ba43416984_64553014', 'header');
?>






















<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'if_has_admin', array(), true);
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\home\header_view_structure.tpl");
}
/* {block 'navbar'} */
class Block_8549317095cb6ba433de571_91170109 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'navbar' => 
  array (
    0 => 'Block_8549317095cb6ba433de571_91170109',
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
class Block_19296741715cb6ba43416984_64553014 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_19296741715cb6ba43416984_64553014',
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
class Block_15547576065cb6ba4361a269_26175717 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_15547576065cb6ba4361a269_26175717',
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
class Block_12186879255cb6ba4362aa70_64536833 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_12186879255cb6ba4362aa70_64536833',
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
/* smarty_template_function_if_has_admin_14078906945cb6ba42bcd5e2_99660838 */
if (!function_exists('smarty_template_function_if_has_admin_14078906945cb6ba42bcd5e2_99660838')) {
function smarty_template_function_if_has_admin_14078906945cb6ba42bcd5e2_99660838(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


    <SCRIPTS>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15547576065cb6ba4361a269_26175717', 'script');
?>
 
    </SCRIPTS>



    <BODY>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12186879255cb6ba4362aa70_64536833', 'body');
?>
 
    </BODY>


<?php
}}
/*/ smarty_template_function_if_has_admin_14078906945cb6ba42bcd5e2_99660838 */
/* {block 'body'} */
class Block_1840628325cb6ba436690a4_37806099 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_1840628325cb6ba436690a4_37806099',
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
class Block_1134672585cb6ba436788b5_74432634 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_1134672585cb6ba436788b5_74432634',
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
/* smarty_template_function_if_has_no_admin_14078906945cb6ba42bcd5e2_99660838 */
if (!function_exists('smarty_template_function_if_has_no_admin_14078906945cb6ba42bcd5e2_99660838')) {
function smarty_template_function_if_has_no_admin_14078906945cb6ba42bcd5e2_99660838(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1840628325cb6ba436690a4_37806099', 'body');
?>
 


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1134672585cb6ba436788b5_74432634', 'script');
?>



<?php
}}
/*/ smarty_template_function_if_has_no_admin_14078906945cb6ba42bcd5e2_99660838 */
}
