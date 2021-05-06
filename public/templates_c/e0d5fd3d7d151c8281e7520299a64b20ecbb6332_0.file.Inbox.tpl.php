<?php
/* Smarty version 3.1.33, created on 2019-04-17 15:32:00
  from 'C:\wamp64\www\SCOA\app\views\admin\index\Inbox.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb6d6704b8697_74482949',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0d5fd3d7d151c8281e7520299a64b20ecbb6332' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\app\\views\\admin\\index\\Inbox.tpl',
      1 => 1552727149,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb6d6704b8697_74482949 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'section_left' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\e0d5fd3d7d151c8281e7520299a64b20ecbb6332_0.file.Inbox.tpl.php',
    'uid' => 'e0d5fd3d7d151c8281e7520299a64b20ecbb6332',
    'call_name' => 'smarty_template_function_section_left_5418239935cb6d6703e0ab8_28511296',
  ),
  'section_right' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\e0d5fd3d7d151c8281e7520299a64b20ecbb6332_0.file.Inbox.tpl.php',
    'uid' => 'e0d5fd3d7d151c8281e7520299a64b20ecbb6332',
    'call_name' => 'smarty_template_function_section_right_5418239935cb6d6703e0ab8_28511296',
  ),
  'structure' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\e0d5fd3d7d151c8281e7520299a64b20ecbb6332_0.file.Inbox.tpl.php',
    'uid' => 'e0d5fd3d7d151c8281e7520299a64b20ecbb6332',
    'call_name' => 'smarty_template_function_structure_5418239935cb6d6703e0ab8_28511296',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>





<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14821749535cb6d670482b77_29186208', 'title');
?>













@param $param







<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14420189625cb6d6704a57d2_50116851', 'body');
?>







<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13893415265cb6d6704ac605_81797763', 'script');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\structures\admin_structure.tpl");
}
/* {block 'title'} */
class Block_14821749535cb6d670482b77_29186208 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_14821749535cb6d670482b77_29186208',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | INBOX <?php
}
}
/* {/block 'title'} */
/* smarty_template_function_section_left_5418239935cb6d6703e0ab8_28511296 */
if (!function_exists('smarty_template_function_section_left_5418239935cb6d6703e0ab8_28511296')) {
function smarty_template_function_section_left_5418239935cb6d6703e0ab8_28511296(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


    <div class="col-lg-3">

        <div class="ibox float-e-margins">
            <div class="ibox-content mailbox-content">

                <h1 class="scoa-small-brand-name medium-text-size">SCOA</h1>

                <div class="file-manager">

                    <div class="space-25"></div>

                    <h5>Folders</h5>

                    <ul class="folder-list m-b-md" style="padding: 0">

                        <li><a href="mailbox.html"> <i class="fa fa-inbox "></i> Inbox <span class="label label-warning pull-right">16</span> </a></li>

                        <li><a href="mailbox.html"> <i class="fa fa-envelope-o"></i> Request </a></li>

                        <li><a href="mailbox.html"> <i class="fa fa-id-card-o"></i> Batch </a></li>


                    </ul>

                    <h5>Options</h5>

                    <ul class="folder-list m-b-md" style="padding: 0">

                        <li>
                            <a href="javascript:void 0" class="inbox-options" type="entries">
                                <i class="fa fa-inbox"></i>
                                Entry
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void 0" class="inbox-options" type="0">
                                <i class="fa fa-inbox"></i>
                                Pending
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void 0" class="inbox-options" type="1"> <i class="fa fa-inbox" ></i>
                                Approved
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void 0" class="inbox-options" type="-1"> <i class="fa fa-inbox "></i>
                                Unapproved
                            </a>
                        </li>



                    </ul>


                    <h5>Categories</h5>

                    <ul class="category-list" style="padding: 0">

                        <li>
                            <a href="javascript:void 0" class="inbox-categories" type="reset">
                                <i class="fa fa-circle text-primary"></i>
                                All
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void 0" class="inbox-categories" type="AOP">
                                <i class="fa fa-circle text-navy"></i>
                                Annual Operating Plan
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void 0" class="inbox-categories" type="MAM">
                                <i class="fa fa-circle text-danger"></i>
                                Minutes from the Activity's
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void 0" class="inbox-categories" type="CBL">
                                <i class="fa fa-circle text-primary"></i> CBL
                            </a>
                        </li>

                        <li>
                            <a  href="javascript:void 0" class="inbox-categories" type="FS">
                                <i class="fa fa-circle text-info"></i>
                                Financial Statements
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void 0" class="inbox-categories" type="DE">
                                <i class="fa fa-circle text-warning"></i>
                                Documentary Evidence
                            </a>
                        </li>

                    </ul>



                    <div class="clearfix"></div>

                </div>


            </div>
        </div>
    </div>

<?php
}}
/*/ smarty_template_function_section_left_5418239935cb6d6703e0ab8_28511296 */
/* smarty_template_function_section_right_5418239935cb6d6703e0ab8_28511296 */
if (!function_exists('smarty_template_function_section_right_5418239935cb6d6703e0ab8_28511296')) {
function smarty_template_function_section_right_5418239935cb6d6703e0ab8_28511296(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\admin_Inbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php
}}
/*/ smarty_template_function_section_right_5418239935cb6d6703e0ab8_28511296 */
/* smarty_template_function_structure_5418239935cb6d6703e0ab8_28511296 */
if (!function_exists('smarty_template_function_structure_5418239935cb6d6703e0ab8_28511296')) {
function smarty_template_function_structure_5418239935cb6d6703e0ab8_28511296(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


    <div class="wrapper wrapper-content">

        <div class="row">

            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'section_left', array(), true);?>


            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'section_right', array(), true);?>


        </div>

    </div>

<?php
}}
/*/ smarty_template_function_structure_5418239935cb6d6703e0ab8_28511296 */
/* {block 'body'} */
class Block_14420189625cb6d6704a57d2_50116851 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_14420189625cb6d6704a57d2_50116851',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'structure', array(), true);?>


<?php
}
}
/* {/block 'body'} */
/* {block 'script'} */
class Block_13893415265cb6d6704ac605_81797763 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_13893415265cb6d6704ac605_81797763',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
scoa/inbox.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
"><?php echo '</script'; ?>
>


<?php
}
}
/* {/block 'script'} */
}
