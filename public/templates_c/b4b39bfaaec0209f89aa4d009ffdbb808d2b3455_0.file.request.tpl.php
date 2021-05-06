<?php
/* Smarty version 3.1.33, created on 2021-05-06 12:47:41
  from 'C:\xampp\htdocs\scoa\app\views\admin\index\request.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_609374edf05394_31152626',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4b39bfaaec0209f89aa4d009ffdbb808d2b3455' => 
    array (
      0 => 'C:\\xampp\\htdocs\\scoa\\app\\views\\admin\\index\\request.tpl',
      1 => 1559176688,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609374edf05394_31152626 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1870274325609374edeff877_96464081', 'title');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_842571760609374edf00711_29453869', 'head');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_879208688609374edf03021_23344468', 'body');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_395366176609374edf049e3_77101121', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\structures\admin_structure.tpl");
}
/* {block 'title'} */
class Block_1870274325609374edeff877_96464081 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1870274325609374edeff877_96464081',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | REQUEST <?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_842571760609374edf00711_29453869 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_842571760609374edf00711_29453869',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/ladda/ladda-themeless.min.css" rel="stylesheet">

    <style>

        .choices-x:first-child {

            margin-right: 3px;

        }

        .project-people img {

            width: 25px;
            height: 25px;

        }

    </style>

<?php
}
}
/* {/block 'head'} */
/* {block 'body'} */
class Block_879208688609374edf03021_23344468 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_879208688609374edf03021_23344468',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Pending Approvals</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/staff">Home</a>
                </li>
                <li>
                    <a href="javascript:void 0">Organizations</a>
                </li>

                <li class="active">
                    <strong>Request</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content">

        <div class="col-lg-8">

            <div class="ibox">
                <div class="ibox-content">
                    <div class="project-list">
                        <table class="table table-hover load" id="request_group">

                            <tbody>

                            <tr><td class="project-status"><small class="animated-background">SCOA SCOA </small></td><td class="project-files"><small class="animated-background">SCOA SCOA SCOA</small></td><td class="project-title"><small class="animated-background">SCOA SCOA SCOA</small><br/><small class="animated-background">SCOA SCOA</small></td><td class="project-people"><img class="animated-background img-circle"></td><td class="project-actions"><small class="animated-background">SCOA SCOA SCOA</small></td></tr><tr><td class="project-status"><small class="animated-background">SCOA SCOA SCOA</small></td><td class="project-files"><small class="animated-background">SCOA SCOA SCOA SCOA</small></td><td class="project-title"><small class="animated-background">SCOA SCOA</small><br/><small class="animated-background">SCOA SCOA SCOA SCOA</small></td><td class="project-people"><img class="animated-background img-circle"></td><td class="project-actions"><small class="animated-background">SCOA SCOA SCOA SCOA</small></td></tr><tr><td class="project-status"><small class="animated-background">SCOA SCOA </small></td><td class="project-files"><small class="animated-background">SCOA SCOA SCOA</small></td><td class="project-title"><small class="animated-background">SCOA SCOA SCOA</small><br/><small class="animated-background">SCOA SCOA</small></td><td class="project-people"><img class="animated-background img-circle"></td><td class="project-actions"><small class="animated-background">SCOA SCOA SCOA</small></td></tr><tr><td class="project-status"><small class="animated-background">SCOA SCOA SCOA</small></td><td class="project-files"><small class="animated-background">SCOA SCOA SCOA SCOA</small></td><td class="project-title"><small class="animated-background">SCOA SCOA</small><br/><small class="animated-background">SCOA SCOA SCOA SCOA</small></td><td class="project-people"><img class="animated-background img-circle"></td><td class="project-actions"><small class="animated-background">SCOA SCOA SCOA SCOA</small></td></tr>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-4">

            <div class="ibox-content" id="reminders">

                <div class="feed-activity-list load">

                    <div class="feed-element">
                        <div>
                            <small class="pull-right text-navy animated-background">SCOA</small>
                            <small class="animated-background">Student’s Commission on Audit</small>
                            <p class="animated-background">
                                Student’s
                                Commission on Audit SCOA SCOA
                                SCOA
                            </p>
                            <small class="animated-background">SCOA
                                SCOA SCOA SCOA SCOA SCOA SCOA
                            </small>
                        </div>
                    </div>

                    <div class="feed-element">
                        <div>
                            <small class="pull-right text-navy animated-background">SCOA</small>
                            <small class="animated-background">Student’s Commission on Audit</small>
                            <p class="animated-background">
                                Student’s
                                Commission on Audit SCOA SCOA
                                SCOA
                            </p>
                            <small class="animated-background">SCOA
                                SCOA SCOA SCOA SCOA SCOA SCOA
                            </small>
                        </div>
                    </div>

                    <div class="feed-element">
                        <div>
                            <small class="pull-right text-navy animated-background">SCOA</small>
                            <small class="animated-background">Student’s Commission on Audit</small>
                            <p class="animated-background">
                                Student’s
                                Commission on Audit SCOA SCOA
                                SCOA
                            </p>
                            <small class="animated-background">SCOA
                                SCOA SCOA SCOA SCOA SCOA SCOA
                            </small>
                        </div>
                    </div>

                    <div class="feed-element">
                        <div>
                            <small class="pull-right text-navy animated-background">SCOA</small>
                            <small class="animated-background">Student’s Commission on Audit</small>
                            <p class="animated-background">
                                Student’s
                                Commission on Audit SCOA SCOA
                                SCOA
                            </p>
                            <small class="animated-background">SCOA
                                SCOA SCOA SCOA SCOA SCOA SCOA
                            </small>
                        </div>
                    </div>

                    <div class="feed-element">
                        <div>
                            <small class="pull-right text-navy animated-background">SCOA</small>
                            <small class="animated-background">Student’s Commission on Audit</small>
                            <p class="animated-background">
                                Student’s
                                Commission on Audit SCOA SCOA
                                SCOA
                            </p>
                            <small class="animated-background">SCOA
                                SCOA SCOA SCOA SCOA SCOA SCOA
                            </small>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>


<?php
}
}
/* {/block 'body'} */
/* {block 'script'} */
class Block_395366176609374edf049e3_77101121 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_395366176609374edf049e3_77101121',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
 src="/SCOA/public/js/scoa/scoa_partial.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="/SCOA/public/js/LAB.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="/SCOA/public/js/scoa/scoa_request_groups.js" type="text/javascript"><?php echo '</script'; ?>
>

<?php
}
}
/* {/block 'script'} */
}
