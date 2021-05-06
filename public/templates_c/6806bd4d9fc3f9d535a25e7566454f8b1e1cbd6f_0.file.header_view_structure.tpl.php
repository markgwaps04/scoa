<?php
/* Smarty version 3.1.33, created on 2019-05-11 12:03:37
  from 'C:\laragon\www\SCOA\public\included_template\home\header_view_structure.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd6ba196a9234_48502061',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6806bd4d9fc3f9d535a25e7566454f8b1e1cbd6f' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\public\\included_template\\home\\header_view_structure.tpl',
      1 => 1552722635,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:included_template/home/home_view_header.tpl' => 1,
    'file:included_template/home/Error.html' => 1,
    'file:included_template/home/home_view_footer.mrk' => 1,
    'file:included_template/home/home_view_scripts.mrk' => 1,
  ),
),false)) {
function content_5cd6ba196a9234_48502061 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <?php $_smarty_tpl->_subTemplateRender('file:included_template/home/home_view_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19629022095cd6ba196a4e85_12273272', 'header');
?>


    
        
    

</head>
<body>



<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i>
            </a>

            <a class="brand" href="javascript:void 0">
                SCOA.staff
            </a>



            <div class="nav-collapse navbar-inverse-collapse">

                <ul class="nav pull-right">

                    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18466922485cd6ba196a5b14_44413038', 'navbar');
?>


                </ul>
            </div><!-- /.nav-collapse -->
        </div>
    </div><!-- /navbar-inner -->
</div><!-- /navbar -->


<div class="wrapper">

<div class="container">

       <div class="row">


            
            <?php if ($_smarty_tpl->tpl_vars['request']->value != 3) {?>

            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15645725705cd6ba196a6b55_15673694', 'body');
?>


            <?php } else { ?>

            <?php $_smarty_tpl->_subTemplateRender("file:included_template/home/Error.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php }?>



        </div>



    </div><!--/.content-->
</div><!--/.wrapper-->

<?php $_smarty_tpl->_subTemplateRender('file:included_template/home/home_view_footer.mrk', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:included_template/home/home_view_scripts.mrk', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3197770985cd6ba196a8a85_83206266', 'script');
?>


</body>
<?php }
/* {block 'header'} */
class Block_19629022095cd6ba196a4e85_12273272 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_19629022095cd6ba196a4e85_12273272',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'header'} */
/* {block 'navbar'} */
class Block_18466922485cd6ba196a5b14_44413038 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'navbar' => 
  array (
    0 => 'Block_18466922485cd6ba196a5b14_44413038',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'navbar'} */
/* {block 'body'} */
class Block_15645725705cd6ba196a6b55_15673694 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_15645725705cd6ba196a6b55_15673694',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'body'} */
/* {block 'script'} */
class Block_3197770985cd6ba196a8a85_83206266 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_3197770985cd6ba196a8a85_83206266',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'script'} */
}
