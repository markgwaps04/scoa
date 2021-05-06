<?php
/* Smarty version 3.1.33, created on 2019-05-30 20:01:28
  from 'C:\laragon\www\SCOA\app\views\Users\misc\position_required.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cefc618453323_75740054',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '956fe5b25f732bbaa65c37cb8ac99617beb78943' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\app\\views\\Users\\misc\\position_required.tpl',
      1 => 1559217687,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cefc618453323_75740054 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8547893795cefc618448875_29578303', 'title');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6513047025cefc6184496e8_32486032', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_structure.tpl");
}
/* {block 'title'} */
class Block_8547893795cefc618448875_29578303 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_8547893795cefc618448875_29578303',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | JOIN <?php
}
}
/* {/block 'title'} */
/* {block 'info'} */
class Block_13644705765cefc61844db75_28253811 extends Smarty_Internal_Block
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
class Block_7809547365cefc618449c73_90659895 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



            <div class="row">

                <div class="col-md-8">

                    <div class="ibox">
                        <div class="ibox-title">
                            <strong>Position required</strong>
                        </div>
                        <div class="ibox-content">
                            <div class="row">

                                <div class="col-sm-6 ">

                                    <h3 class="m-t-none m-b text-success"><?php echo $_smarty_tpl->tpl_vars['user_club']->value['name'];?>
</h3>
                                    <h4><?php echo $_smarty_tpl->tpl_vars['user_club']->value['member_code'];?>
</h4>

                                    <p>This group required your position to be attach on reports and validations</p>

                                    <form role="form" method="post">

                                        <div class="form-group"><label>Position</label>


                                            <select class="form-control m-b" name="position_update" required="">
                                                <option value="1">Treasurer</option>
                                                <option value="2">Auditor</option>
                                                <option value="3">Org_Pres</option>
                                                <option value="4">Governor</option>
                                                <option value="5">Adviser</option>
                                            </select>

                                        </div>


                                        <div>
                                            <button class="btn btn-sm btn-primary pull-left m-t-n-xs" type="submit">
                                                <strong>Submit</strong>
                                            </button>
                                        </div>


                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13644705765cefc61844db75_28253811', 'info', $this->tplIndex);
?>



            </div>


        <?php
}
}
/* {/block 'body'} */
/* {block 'body'} */
class Block_6513047025cefc6184496e8_32486032 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_6513047025cefc6184496e8_32486032',
    1 => 'Block_7809547365cefc618449c73_90659895',
  ),
  'info' => 
  array (
    0 => 'Block_13644705765cefc61844db75_28253811',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>




    <SCOA_BODY>


        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7809547365cefc618449c73_90659895', 'body', $this->tplIndex);
?>



    </SCOA_BODY>

<?php
}
}
/* {/block 'body'} */
}
