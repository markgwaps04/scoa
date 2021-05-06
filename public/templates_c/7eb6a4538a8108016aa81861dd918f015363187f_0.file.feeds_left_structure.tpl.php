<?php
/* Smarty version 3.1.33, created on 2019-04-22 03:51:27
  from 'C:\wamp64\www\SCOA\public\included_template\admin\structures\feeds_left_structure.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cbcc9bf05aea5_09767172',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7eb6a4538a8108016aa81861dd918f015363187f' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\admin\\structures\\feeds_left_structure.tpl',
      1 => 1555876285,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cbcc9bf05aea5_09767172 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>


<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'requirements', null, null);?>

    <div class="col-sm-12">

        <div class="ibox float-e-margins" id="ibox1">
            <div class="ibox-title">
                <h5>Requirements</h5>
            </div>
            <div class="ibox-content sk-loading scoa-requirements">

                <div class="sk-spinner sk-spinner-double-bounce">
                    <div class="sk-double-bounce1"></div>
                    <div class="sk-double-bounce2"></div>
                </div>


                <ul class="sortable-list connectList agile-list ui-sortable" id="todo">
                    <li class="warning-element" id="task1">

                        <div class="checkbox checkbox-primary no-padding">

                            <div class="row no-padding">

                                <div class="col-sm-1">
                                    <input id="positions" class="scoa hide" required name="agreement" disabled type="checkbox">&nbsp;
                                </div>
                                <div class="col-sm-10">

                                    <a href="javascript: void 0">5 members including the Treasurer, Auditor, Organization President, Department Governor and Adviser.</a>

                                </div>

                            </div>

                        </div>

                    </li>
                    <li class="warning-element" id="task2">

                        <div class="checkbox checkbox-primary no-padding">

                            <div class="row no-padding">

                                <div class="col-sm-1">
                                    <input id="members" class="scoa hide" required name="agreement" disabled type="checkbox">&nbsp;
                                </div>
                                <div class="col-sm-10">

                                    <a href="javascript: void 0">Complete members requirements.</a>

                                </div>

                            </div>

                        </div>

                    </li>
                    <li class="warning-element" id="task3">

                        <div class="checkbox checkbox-primary no-padding">

                            <div class="row no-padding">

                                <div class="col-sm-1">
                                    <input id="cover" class="scoa hide" required name="agreement" disabled type="checkbox">&nbsp;
                                </div>
                                <div class="col-sm-10">

                                    <a href="javascript: void 0">Cover photo of organization</a>

                                </div>

                            </div>

                        </div>


                    </li>

                </ul>

            </div>
        </div>

    </div>

<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>




<div class="wrapper wrapper-content">

    <div class="row m-b-xl">


        <div class="col-sm-12">

            <div class="col-sm-5">


                <div class="col-sm-12 m-b-md">

                    <div class="ibox-title">
                        <h5>Organization details</h5>
                    </div>

                    <ul class="ibox-content no-padding border-left-right coverphoto">
                        <li style="list-style: none">
                            <img class="scoa-img-responsive cover-photo" src="http://localhost/SCOA/public//files/default_image/default.png" id="coverphoto" alt="img04">
                        </li>
                    </ul>


                    <div class="ibox-content">

                        <div class="sk-spinner sk-spinner-double-bounce">
                            <div class="sk-double-bounce1"></div>
                            <div class="sk-double-bounce2"></div>
                        </div>


                        <h5>ABOUT</h5>

                        <p>



                            <?php echo $_smarty_tpl->tpl_vars['org']->value['details'];?>




                        </p>

                        <h5>CODE</h5>
                        <span>


                    <?php echo $_smarty_tpl->tpl_vars['org']->value['member_code'];?>



                        </span>


                        <h5>MEMBERS</h5>

                        <p class="user-friends">

                            

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['org']->value['members']['approved'], 'user', false, 'every');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every']->value => $_smarty_tpl->tpl_vars['user']->value) {
?>


                                <a href="">
                                    <img alt="image" data-toggle="tooltip" data-placement="auto" title=
                                    "<?php echo smarty_modifier_capitalize((($_smarty_tpl->tpl_vars['user']->value['Firstname']).(" ")).($_smarty_tpl->tpl_vars['user']->value['Lastname']),true,true);?>
" class="img-circle profile" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/profile/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value['profile'])===null||$tmp==='' ? 'default/1.jpg' : $tmp);?>
">
                                </a>


                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                            
                        </p>


                    </div>

                </div>


                <?php if ($_smarty_tpl->tpl_vars['org']->value['members']['approved'] || $_smarty_tpl->tpl_vars['isStrict']->value) {?>

                    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'requirements');?>


                <?php }?>




            </div>

            <div class="col-lg-7">


                <?php if (!$_smarty_tpl->tpl_vars['org']->value['members']['approved']) {?>


                    <div class="col-sm-12 no-padding no-margins">

                        <div class="alert alert-info" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->
                            <i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;
                            <a class="alert-link" href="#">No members yet.</a>
                        </div>


                    </div>


                    <?php if (!$_smarty_tpl->tpl_vars['isStrict']->value) {?> <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'requirements');?>
 <?php }?>




                <?php }?>






                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5629585685cbcc9bf023df2_79817798', 'content');
?>



            </div>
        </div>

    </div>


    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'footer', array(), true);?>


</div>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14514640035cbcc9bf0304a9_61469623', 'script');
?>


<?php echo '<script'; ?>
>

    $(document).ready(function(){



        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7610187545cbcc9bf03cf57_72800353', 'inner_script');
?>



    })



<?php echo '</script'; ?>
><?php }
/* {block 'content'} */
class Block_5629585685cbcc9bf023df2_79817798 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_5629585685cbcc9bf023df2_79817798',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'content'} */
/* {block 'script'} */
class Block_14514640035cbcc9bf0304a9_61469623 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_14514640035cbcc9bf0304a9_61469623',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'script'} */
/* {block 'inner_script'} */
class Block_7610187545cbcc9bf03cf57_72800353 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'inner_script' => 
  array (
    0 => 'Block_7610187545cbcc9bf03cf57_72800353',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


        



        let checkbox = $('.scoa-requirements input[type=checkbox]');



        $.post("<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/scoa_organization/requirements/<?php echo $_smarty_tpl->tpl_vars['org']->value['RCode'];?>
",{ tempath : "<?php echo $_smarty_tpl->tpl_vars['org']->value['tempath'];?>
" },function(response){

            console.log(response);

            let data = JSON.parse(response);

            if(data.hasOwnProperty("is_position_fill") &&
                data.hasOwnProperty("is_cover_photo_set") &&
                data.hasOwnProperty("is_members_set_the_requirements")){

                if(data.is_position_fill)

                    jQuery(".scoa-requirements #positions").attr("checked",true);

                if(data.is_cover_photo_set)

                    jQuery(".scoa-requirements #cover").attr("checked",true);

                if(data.is_members_set_the_requirements)

                    jQuery(".scoa-requirements #members").attr("checked",true);


                checkbox.iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                    disabledClass: "scoa-disabled-checkbox"
                });


                $(".scoa-requirements").toggleClass("sk-loading")

            }


        });






        

        <?php
}
}
/* {/block 'inner_script'} */
}
