<?php
/* Smarty version 3.1.33, created on 2019-04-27 17:39:30
  from 'C:\wamp64\www\SCOA\public\included_template\user\user_index_org_members_structure.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cc42352768899_04158277',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5923abedca282926791dfdf89d4158b02976da8f' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\user\\user_index_org_members_structure.tpl',
      1 => 1549730770,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cc42352768899_04158277 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>





<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5877856425cc423525274d7_30363545', 'content');
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3721571345cc4235275c7c5_50128375', 'script');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_home_structure.tpl");
}
/* {block 'content'} */
class Block_5877856425cc423525274d7_30363545 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_5877856425cc423525274d7_30363545',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>




    <div class="row wrapper border-bottom white-bg page-heading">

        <div class="col-sm-12">

           <div class="row">

               <div class="col-sm-9">

                   <h2>

                       <?php echo (($tmp = @smarty_modifier_truncate($_smarty_tpl->tpl_vars['user_club']->value['name'],55,"..."))===null||$tmp==='' ? 'Your Organization' : $tmp);?>



                   </h2>


                   <ol class="breadcrumb">
                       <li>
                           <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/organization">Home</a>
                       </li>
                       <li>
                           <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/organization?#tab2">Organization</a>
                       </li>

                       <li class="active">
                           <strong>Members</strong>
                       </li>
                   </ol>



               </div>

               <div class="col-sm-3">
                   <h4 class="scoa-xxs-brand-name pull-right middle-box no-margins margin-top-negative "><?php echo $_smarty_tpl->tpl_vars['user_club']->value['member_code'];?>
</h4>
               </div>

           </div>

        </div>


    </div>



    <div class="row  m-t / m-t-(xs,sm,md,lg,xl)">

        <div class="row">

            <div class="col-sm-12">

                <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\user\user_index_org_members_populate.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            </div>

        </div>

    </div>

<?php
}
}
/* {/block 'content'} */
/* {block 'script'} */
class Block_3721571345cc4235275c7c5_50128375 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_3721571345cc4235275c7c5_50128375',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>






    <?php echo '<script'; ?>
 id="remove_feed" type="text/html">

        <div class="social-feed-box no-margin-left">
            <div class="social-body">
                <h4 class="scoa-small-brand-name">#SCOA</h4>
            </div>
        </div>

    <?php echo '</script'; ?>
>



    <?php echo '<script'; ?>
>

        $(document).ready(function()
        {



            $('input[type=checkbox]:not(.scoa)').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
                disabledClass: "scoa-disabled-checkbox"
            });


            $(".scoa_remove_member").click(function(){

                let request_id = $(this).attr("request"),
                    parent = $(this).parents('.scoa-social-feed'),
                    tempath = "<?php echo $_smarty_tpl->tpl_vars['user_club']->value['tempath'];?>
",
                    type = $(this).attr("state"),
                    id= jQuery(this).attr("id");

                swal({
                    title: "Are you sure?",
                    text: "This will be notify others",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes",
                    closeOnConfirm: false
                }, function () {


                     jQuery.post("<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/organization/members_state",
                         {
                        tempath : tempath ,
                        state : type ,
                        user_id : request_id,
                        renewalID : id
                         },
                        function (response) {


                        let result = JSON.parse(response),
                            is_valid_result = result.hasOwnProperty("response")
                                && result.hasOwnProperty("tempath")
                                && result.response;


                            if(is_valid_result)
                            {
                                jQuery(parent).html(jQuery("#remove_feed").html());
                                swal("Success", "A member has been "+type, "success");

                            }

                            if(!is_valid_result)

                                swal("Error", "an error occur, we cant accept your request at this moment", "error");


                            if(result.tempath)

                                tempath = result.tempath;


                    });




                });

            })


        })


    <?php echo '</script'; ?>
>




<?php
}
}
/* {/block 'script'} */
}
