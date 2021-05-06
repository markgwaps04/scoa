<?php
/* Smarty version 3.1.33, created on 2021-05-06 06:33:51
  from 'C:\xampp\htdocs\scoa\public\included_template\home\header_view_structure.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_609371af11ecc1_73470957',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5cf6eddb295973f4d6ea89e36629f59767179451' => 
    array (
      0 => 'C:\\xampp\\htdocs\\scoa\\public\\included_template\\home\\header_view_structure.tpl',
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
function content_609371af11ecc1_73470957 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <?php $_smarty_tpl->_subTemplateRender('file:included_template/home/home_view_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_498785588609371af11a2d3_78403986', 'header');
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_681568616609371af11b2b2_02169392', 'navbar');
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1067873285609371af11c600_47667713', 'body');
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1138949897609371af11e664_99206298', 'script');
?>


</body>
<?php }
/* {block 'header'} */
class Block_498785588609371af11a2d3_78403986 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_498785588609371af11a2d3_78403986',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'header'} */
/* {block 'navbar'} */
class Block_681568616609371af11b2b2_02169392 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'navbar' => 
  array (
    0 => 'Block_681568616609371af11b2b2_02169392',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'navbar'} */
/* {block 'body'} */
class Block_1067873285609371af11c600_47667713 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_1067873285609371af11c600_47667713',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'body'} */
/* {block 'script'} */
class Block_1138949897609371af11e664_99206298 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_1138949897609371af11e664_99206298',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'script'} */
}
