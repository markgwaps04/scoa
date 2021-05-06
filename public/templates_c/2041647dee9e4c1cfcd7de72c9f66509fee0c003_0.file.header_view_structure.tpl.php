<?php
/* Smarty version 3.1.33, created on 2019-04-17 05:31:48
  from 'C:\wamp64\www\SCOA\public\included_template\home\header_view_structure.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb6ba443d1458_41177653',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2041647dee9e4c1cfcd7de72c9f66509fee0c003' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\home\\header_view_structure.tpl',
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
function content_5cb6ba443d1458_41177653 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <?php $_smarty_tpl->_subTemplateRender('file:included_template/home/home_view_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8364501165cb6ba443590e2_06381192', 'header');
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21042571405cb6ba44371ed4_42484096', 'navbar');
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17682139395cb6ba44396700_49087025', 'body');
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14956182325cb6ba443c8da0_37817270', 'script');
?>


</body>
<?php }
/* {block 'header'} */
class Block_8364501165cb6ba443590e2_06381192 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_8364501165cb6ba443590e2_06381192',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'header'} */
/* {block 'navbar'} */
class Block_21042571405cb6ba44371ed4_42484096 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'navbar' => 
  array (
    0 => 'Block_21042571405cb6ba44371ed4_42484096',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'navbar'} */
/* {block 'body'} */
class Block_17682139395cb6ba44396700_49087025 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_17682139395cb6ba44396700_49087025',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'body'} */
/* {block 'script'} */
class Block_14956182325cb6ba443c8da0_37817270 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_14956182325cb6ba443c8da0_37817270',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'script'} */
}
