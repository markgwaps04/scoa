<?php
/* Smarty version 3.1.33, created on 2021-05-06 12:27:57
  from 'C:\xampp\htdocs\scoa\public\included_template\misc\org_info_content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6093704db94868_84008010',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '05ab79398acdf40008113d528b8669a86d874b82' => 
    array (
      0 => 'C:\\xampp\\htdocs\\scoa\\public\\included_template\\misc\\org_info_content.tpl',
      1 => 1552595753,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6093704db94868_84008010 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1792355216093704db2ee58_85403327', 'content');
?>






<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9208182776093704db92442_26478669', 'script');
}
/* {block 'content'} */
class Block_1792355216093704db2ee58_85403327 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1792355216093704db2ee58_85403327',
  ),
);
public $prepend = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\scoa\\app\\core\\Smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),1=>array('file'=>'C:\\xampp\\htdocs\\scoa\\app\\core\\Smarty\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
?>


    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'message', array(), true);?>


    <div class="row wrapper border-bottom white-bg page-heading">

        <div class="col-sm-12">



            <h2>


                <?php echo (($tmp = @smarty_modifier_truncate($_smarty_tpl->tpl_vars['user_club']->value['name'],55,"..."))===null||$tmp==='' ? 'Your Organization' : $tmp);?>


                
                <?php if ($_smarty_tpl->tpl_vars['user_club']->value['isCurrentUserApproved']) {?>

                    <a href="javascript:void 0">
                        <i class="fa fa-pencil small text-muted scoa_small_text" data-toggle="tooltip" data-placement="right" title="change name" style="vertical-align: top"></i>
                    </a>

                <?php }?>

                

            </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
">Home</a>
                </li>
                <li class="active">
                    <strong>Info</strong>
                </li>
            </ol>
        </div>


    </div>

    <div class="row  m-t / m-t-(xs,sm,md,lg,xl)">

        <div class="row">

            <div class="col-lg-6 ">

                <div class="ibox float-e-margins" id="ibox1">
                    <div class="ibox-title">
                        <h5>Details</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="sk-spinner sk-spinner-double-bounce">
                            <div class="sk-double-bounce1"></div>
                            <div class="sk-double-bounce2"></div>
                        </div>


                        <h5>ABOUT


                            
                            <?php if ($_smarty_tpl->tpl_vars['user_club']->value['isCurrentUserApproved']) {?>

                                <i class="fa fa-pencil small text-muted scoa_xxsmall_text" data-toggle="tooltip" data-placement="right" title="edit" style="vertical-align: top"></i>

                            <?php }?>

                            


                        </h5>

                        <p>

                            
                            <?php echo $_smarty_tpl->tpl_vars['user_club']->value['details'];?>


                            
                        </p>

                        <h5>CODE</h5>
                        <span>

                            <?php echo $_smarty_tpl->tpl_vars['user_club']->value['member_code'];?>


                            
                            <?php if ($_smarty_tpl->tpl_vars['user_club']->value['isCurrentUserApproved']) {?>

                                <form method="post" class="inline">

                            <input type="hidden" name="url" value="<?php echo $_smarty_tpl->tpl_vars['user_club']->value['url'];?>
">

                            <button type="submit"  class="btn btn-sm small text-success scoa_xsmall_text btn-default fa fa-repeat"></button>

                        </form>

                            <?php }?>

                            

                        </span>

                        <h5><a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
organization/members/<?php echo $_smarty_tpl->tpl_vars['user_club']->value['url'];?>
">MEMBERS</a></h5>

                        <p class="user-friends">

                            

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user_club']->value['members']['approved'], 'user', false, 'every');
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

            </div>

            <div class="col-lg-6">

                <div class="ibox float-e-margins" id="ibox1">
                    <div class="ibox-title">
                        <h5>Required</h5>
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

                                            <a href=
                                               "<?php if ($_smarty_tpl->tpl_vars['user_club']->value['isCurrentUserApproved']) {?>

                                               <?php echo $_smarty_tpl->tpl_vars['public']->value;?>
organization/members/<?php echo $_smarty_tpl->tpl_vars['user_club']->value['url'];?>


                                               <?php } else { ?>

                                               javascript:void 0

                                               <?php }?>">5 members including the Treasurer, Auditor, Organization President, Department Governor and Adviser.</a>

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

                                            <a href=
                                               "<?php if ($_smarty_tpl->tpl_vars['user_club']->value['isCurrentUserApproved']) {?>

                                               <?php echo $_smarty_tpl->tpl_vars['public']->value;?>
organization/members/<?php echo $_smarty_tpl->tpl_vars['user_club']->value['url'];?>


                                               <?php } else { ?>

                                               javascript:void 0

                                               <?php }?>">Complete members requirements.</a>

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

                                            <a>Cover photo of organization</a>

                                        </div>

                                    </div>

                                </div>


                            </li>

                        </ul>

                    </div>
                </div>

            </div>

        </div>

    </div>

<?php
}
}
/* {/block 'content'} */
/* {block 'script'} */
class Block_9208182776093704db92442_26478669 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_9208182776093704db92442_26478669',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>





    <?php echo '<script'; ?>
>

        $(document).ready(function(){

            let checkbox = $('.scoa-requirements input[type=checkbox]');


            $.post('<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/organization/requirements',{ tempath : "<?php echo $_smarty_tpl->tpl_vars['user_club']->value['tempath'];?>
" },function(response){

                let data = JSON.parse(response);

                console.log(data);

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







        })

    <?php echo '</script'; ?>
>




<?php
}
}
/* {/block 'script'} */
}
