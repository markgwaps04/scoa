<?php
/* Smarty version 3.1.33, created on 2019-05-30 08:38:15
  from 'C:\laragon\www\SCOA\app\views\admin\index\request.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cef25f7251cf1_15021514',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9061c1f89075c8757f42c2a0223521e562213e92' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\app\\views\\admin\\index\\request.tpl',
      1 => 1559176688,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cef25f7251cf1_15021514 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11217038155cef25f7177767_83803831', 'title');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_372364735cef25f71cc582_30587074', 'head');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2942596645cef25f724d7d6_59460365', 'body');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_451070995cef25f7251018_86204294', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\structures\admin_structure.tpl");
}
/* {block 'title'} */
class Block_11217038155cef25f7177767_83803831 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_11217038155cef25f7177767_83803831',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | REQUEST <?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_372364735cef25f71cc582_30587074 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_372364735cef25f71cc582_30587074',
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
class Block_2942596645cef25f724d7d6_59460365 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_2942596645cef25f724d7d6_59460365',
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
class Block_451070995cef25f7251018_86204294 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_451070995cef25f7251018_86204294',
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
