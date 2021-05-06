<?php
/* Smarty version 3.1.33, created on 2019-05-13 01:01:56
  from 'C:\laragon\www\SCOA\app\views\admin\index\account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd85184049c43_22574445',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '05c4c8f4bc6855202b21dcc134efdd9493d4f113' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\app\\views\\admin\\index\\account.tpl',
      1 => 1554032454,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd85184049c43_22574445 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>





<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6966018555cd85183e29442_20459967', 'title');
?>



<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'modal', null, null);?>

    <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <div class="modal-content" id="sign-up-form">

                <div class="ibox-content no-padding bg-transparent">

                    <div class="sk-spinner sk-spinner-three-bounce">
                        <div class="sk-bounce1"></div>
                        <div class="sk-bounce2"></div>
                        <div class="sk-bounce3"></div>
                    </div>


                    <div class="modal-body">

                        <button type="button" class="close" data-dismiss="modal">
                               <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>



                        <form role="form" method="post">

                            <div class="row">

                                <div class="col-sm-6 b-r" id="create_account">

                                    <h3 class="m-t-none m-b">Create Account</h3>

                                    <errors>

                                        <not_valid class="hidden">

                                            <div class="alert alert-warning error" style="background-color: #fdfdfde0">
                                                <i class="fa fa-exclamation-triangle animated wobble" style="font-size: 15px"></i>&nbsp;
                                                <a class="alert-link" href="#">Invalid Request.</a>
                                                The request is not valid
                                            </div>

                                        </not_valid>



                                        <user_exist class="hidden">

                                            <div class="alert alert-warning error" style="background-color: #fdfdfde0">
                                                <i class="fa fa-exclamation-triangle animated wobble" style="font-size: 15px"></i>&nbsp;
                                                <a class="alert-link" href="#">The Username is already exist</a>,
                                                choose a unique username
                                            </div>

                                        </user_exist>



                                    </errors>






                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="user_url" placeholder="Username" class="form-control">
                                    </div>


                                    <div class="form-group password">

                                        <label>Password</label>

                                        <div class="input-group">
                                            <input name="password" type="password" placeholder="Password" class="form-control">
                                            <div class="input-group-btn">
                                                <a href="javascript:void 0" class="btn btn-default">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <span class="help-block">

                                        Ignore and the system will generate this for you.

                                    </span>

                                    </div>

                                    <div class="form-group">
                                        <label>First name</label>
                                        <input type="text" name="Firstname" placeholder="Firstname" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input type="text" name="Lastname" placeholder="Lastname" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Middle name (Optional)</label>
                                        <input type="text" name="Middlename" placeholder="Middle name" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Phone number</label>
                                        <input type="text" name="CP" data-mask="(+63) 9999 999 999" placeholder="Phone number" class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <input type="checkbox" name="sendCredentials" class="form-control">
                                        &nbsp; Confirm and include credentials (Optional).
                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <h4>Profile</h4>
                                    <p>Upload image this is optional.</p>


                                    <div class="dropzone scoa-transparent" id="profile_drop" style="border: none" >
                                        <div class="fallback">
                                            <input name="file[]" type="file" class="hidden" />
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label>About (Optional)</label>
                                        <textarea class="form-control" placeholder="Write about..." style="max-width: 100%" name="about" ></textarea>
                                    </div>


                                </div>

                            </div>

                        </form>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="form-submit">Save</button>
                    </div>

                </div>


            </div>
        </div>
    </div>

<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>






<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'pageTitle', null, null);?>

    <div class="row wrapper border-bottom white-bg page-heading">

        <div class="col-sm-4">

            <h2>Administrator Accounts</h2>


            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/staff">Home</a>
                </li>

                <li class="active">
                    <strong>Accounts</strong>
                </li>

            </ol>
        </div>

        <?php if ($_smarty_tpl->tpl_vars['numStaff']->value <= 4) {?>

            <div class="col-sm-8">


                <div class="title-action">

                    <button class="btn btn-default btn-sm choices-x" data-toggle="modal" data-target="#myModal"  data-style="expand-left">
                        <i class="fa fa-plus"></i> Add new
                    </button>

                </div>

                <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'modal');?>



            </div>

        <?php }?>




    </div>

<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>





<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'body', null, null);?>

    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'pageTitle');?>
<div class="wrapper wrapper-content"><?php if ($_smarty_tpl->tpl_vars['numStaff']->value > 4) {?><div class="alert alert-info" style="background-color: #fdfdfde0">You cannot add new staff at this moment, the maximum number of Administrator is 5 only.</div><?php }?><div class="row p-sm" id="populate_accounts"></div></div>


<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9744058565cd85184044a04_99178444', 'body');
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13806666505cd85184045e97_88666000', 'script');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7951179355cd851840479b9_31699269', 'head');
?>






<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\structures\admin_structure.tpl");
}
/* {block 'title'} */
class Block_6966018555cd85183e29442_20459967 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_6966018555cd85183e29442_20459967',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | ACCOUNT <?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_9744058565cd85184044a04_99178444 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_9744058565cd85184044a04_99178444',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'body');?>


<?php
}
}
/* {/block 'body'} */
/* {block 'script'} */
class Block_13806666505cd85184045e97_88666000 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_13806666505cd85184045e97_88666000',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
scoa/scoa_partial.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
LAB.js"><?php echo '</script'; ?>
>


    <?php echo '<script'; ?>
 type="text/html" id="search_template">


            <div class="ibox-content no-padding scoa-transparent no-borders" id="search_content">

                <div class="no-result">

                    <div class="wrap">
                        <i class="fa fa-search search-1 lg"></i>
                        <i class="fa fa-search search-2 lg"></i>
                        <i class="fa fa-search search-3 lg"></i>
                        <i class="fa fa-search search-4 lg"></i>
                        <div class="items">
                            <i class="fa fa-file-o lg-2"></i>
                            <i class="fa fa-file-archive-o lg-2"></i>
                            <i class="fa fa-file-audio-o lg-2"></i>
                            <i class="fa fa-file-code-o lg-2"></i>
                            <i class="fa fa-file-excel-o lg-2"></i>
                            <i class="fa fa-file-image-o lg-2"></i>
                            <i class="fa fa-file-pdf-o lg-2"></i>
                            <i class="fa fa-file-powerpoint-o lg-2"></i>
                            <i class="fa fa-file-video-o lg-2"></i>
                            <i class="fa fa-file-word-o lg-2"></i>
                        </div>
                    </div>

                </div>


            </div>


    <?php echo '</script'; ?>
>




    <?php echo '<script'; ?>
>

        (function(__){

            const render = function() {

                const jsDir = "http://localhost/SCOA/public/js/";

                const scripts = [
                    "jquery.validate.min.js",
                    "scoa/scoa_admin_account.js",
                    "plugins/dropzone/dropzone.js",
                    "plugins/jasny/jasny-bootstrap.min.js"
                ];


                const loaded = new Promise(function(resolve) {

                    $LAB
                        .setOptions({AlwaysPreserveOrder:true})
                        .script(scripts.toNestedArray(jsDir))
                        .wait(function(){

                            resolve();

                        });

                });


                loaded.then(function() {

                    const dropzoneTarget =  jQuery("#profile_drop");

                    const call = {

                        profile : function() {

                            dropzoneTarget.dropzone({

                                url : "/SCOA/public/scoa_account/upload/profile",
                                paramName: "file", /** The name that will be used to transfer the file**/
                                maxFiles : 1,
                                maxFilesize: 2, /** MB **/
                                dictDefaultMessage: "<strong>Select .jpg or .png format</strong>",
                                acceptedFiles : 'image/*',

                                init : function() {

                                    this.on("success",function(file,responseText) {

                                        try {

                                            const response = JSON.parse(responseText);

                                            const fname = response[0].fname;

                                            dropzoneTarget.parent()
                                                .find("input[name=profile]")
                                                .remove();

                                            dropzoneTarget.parent()
                                                .append("<input type='hidden' name='profile' value='"+fname+"'  >")


                                        }catch(err) {

                                            alert(err);

                                        }



                                    });

                                    this.on("complete",function(file) {


                                        let length = jQuery(".dz-preview").length;

                                        if(length >= 2){
                                            jQuery(".dz-preview").first().fadeOut();
                                        }



                                    });

                                    this.on("addedfile",function(file)
                                    {


                                        file.previewElement.addEventListener("click",function()
                                        {
                                            jQuery(file.previewElement).parents(".dropzone").click();


                                        });


                                        if(this.files[1] != null)
                                        {
                                            this.removeFile(this.files[0]);

                                        }





                                    });


                                    let dz = this,mockFile = {
                                        name : "SCOA",
                                        size : 0
                                    };



                                },
                            });


                        },

                        main : function () {
                            this.profile();
                        }

                    };

                    call.main();

                })






            };

            __(document).ready(render);

        })(jQuery);

    <?php echo '</script'; ?>
>




<?php
}
}
/* {/block 'script'} */
/* {block 'head'} */
class Block_7951179355cd851840479b9_31699269 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_7951179355cd851840479b9_31699269',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/dropzone/basic.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/dropzone/dropzone.css" rel="stylesheet">

<?php
}
}
/* {/block 'head'} */
}
