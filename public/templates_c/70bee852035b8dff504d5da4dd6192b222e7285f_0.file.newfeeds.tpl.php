<?php
/* Smarty version 3.1.33, created on 2019-04-19 23:12:43
  from 'C:\wamp64\www\SCOA\app\views\admin\index\newfeeds.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb9e56beb8490_74248790',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70bee852035b8dff504d5da4dd6192b222e7285f' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\app\\views\\admin\\index\\newfeeds.tpl',
      1 => 1553976872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb9e56beb8490_74248790 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'section_left' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\70bee852035b8dff504d5da4dd6192b222e7285f_0.file.newfeeds.tpl.php',
    'uid' => '70bee852035b8dff504d5da4dd6192b222e7285f',
    'call_name' => 'smarty_template_function_section_left_19111529095cb9e56bb0eee4_53243553',
  ),
  'post_box' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\70bee852035b8dff504d5da4dd6192b222e7285f_0.file.newfeeds.tpl.php',
    'uid' => '70bee852035b8dff504d5da4dd6192b222e7285f',
    'call_name' => 'smarty_template_function_post_box_19111529095cb9e56bb0eee4_53243553',
  ),
  'section_right' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\70bee852035b8dff504d5da4dd6192b222e7285f_0.file.newfeeds.tpl.php',
    'uid' => '70bee852035b8dff504d5da4dd6192b222e7285f',
    'call_name' => 'smarty_template_function_section_right_19111529095cb9e56bb0eee4_53243553',
  ),
  'structure' => 
  array (
    'compiled_filepath' => 'C:\\wamp64\\www\\SCOA\\public\\templates_c\\70bee852035b8dff504d5da4dd6192b222e7285f_0.file.newfeeds.tpl.php',
    'uid' => '70bee852035b8dff504d5da4dd6192b222e7285f',
    'call_name' => 'smarty_template_function_structure_19111529095cb9e56bb0eee4_53243553',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php $_smarty_tpl->_assignInScope('globalfeeds', 'true' ,true ,32);?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9488953055cb9e56bd1ead0_90758980', 'title');
?>








































<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13444049975cb9e56be64f27_38744369', 'body');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19483720975cb9e56be7bba6_36154998', 'upper_head');
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13880115065cb9e56be9c263_32210750', 'script');
?>






<?php echo '<script'; ?>
>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21360324135cb9e56beac970_85759831', 'inner_script');
?>


<?php echo '</script'; ?>
>






<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\admin\structures\admin_structure.tpl");
}
/* {block 'title'} */
class Block_9488953055cb9e56bd1ead0_90758980 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_9488953055cb9e56bd1ead0_90758980',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 SCOA | FEEDS <?php
}
}
/* {/block 'title'} */
/* smarty_template_function_section_left_19111529095cb9e56bb0eee4_53243553 */
if (!function_exists('smarty_template_function_section_left_19111529095cb9e56bb0eee4_53243553')) {
function smarty_template_function_section_left_19111529095cb9e56bb0eee4_53243553(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>



    <div class="col-lg-3">

        <div class="ibox float-e-margins">
            <div class="ibox-content mailbox-content">

                <h1 class="scoa-small-brand-name medium-text-size">SCOA</h1>

                <div class="file-manager">

                    <div class="space-25"></div>

                    <ul class="folder-list m-b-md" style="padding: 0">
                        <li><a href="javascript:void 0"> <i class="fa fa-group "></i> Organizations </a></li>

                        <li><a href="javascript:void 0"> <i class="fa fa-phone"></i> Contacts </a></li>

                        <li><a href="javascript:void 0"> <i class="fa fa-id-card-o"></i> Accounts </a></li>
                    </ul>

                    <h5>Categories</h5>

                    <ul class="category-list" style="padding: 0">

                        <li>
                            <a href="javascript:void 0" class="inbox-categories" type="reset">
                                <i class="fa fa-circle text-primary"></i>
                                All
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void 0" class="inbox-categories" type="AOP">
                                <i class="fa fa-circle text-navy"></i>
                                Annual Operating Plan
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void 0" class="inbox-categories" type="MAM">
                                <i class="fa fa-circle text-danger"></i>
                                Minutes from the Activity's
                            </a>
                        </li>


                        <li>
                            <a href="javascript:void 0" class="inbox-categories" type="CBL">
                                <i class="fa fa-circle text-primary"></i> CBL
                            </a>
                        </li>

                        <li>
                            <a  href="javascript:void 0" class="inbox-categories" type="FS">
                                <i class="fa fa-circle text-info"></i>
                                Financial Statements
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void 0" class="inbox-categories" type="DE">
                                <i class="fa fa-circle text-warning"></i>
                                Documentary Evidence
                            </a>
                        </li>

                    </ul>


                    <div class="clearfix"></div>

                </div>


            </div>
        </div>
    </div>


<?php
}}
/*/ smarty_template_function_section_left_19111529095cb9e56bb0eee4_53243553 */
/* smarty_template_function_post_box_19111529095cb9e56bb0eee4_53243553 */
if (!function_exists('smarty_template_function_post_box_19111529095cb9e56bb0eee4_53243553')) {
function smarty_template_function_post_box_19111529095cb9e56bb0eee4_53243553(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


<post_box>

    <div class="ibox-content scoa-transparent no-borders no-margins no-padding post-box padding-bottom-xs">


        <div class="social-feed-separated  position-relative">

            <div class="social-avatar">
                <a href="">

                    <img alt="image" class="profile" letters="" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/files/profile/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value->get_profile())===null||$tmp==='' ? 'default/1.jpg' : $tmp);?>
">

                </a>
            </div>

            <div class="social-feed-box">

                <div class="tabs-container">


                    <ul class="nav nav-tabs post_type">

                        <li class="active regular_post" for="66">

                            <a data-toggle="tab" href="#regular"  aria-expanded="false" >Post</a>

                        </li>


                        <li class="pull-right">

                            <div class="switch">

                                <div class="onoffswitch" id="switch" data-toggle="tooltip" data-placement="left" title="" data-original-title="Notify">
                                    <input type="checkbox" class="onoffswitch-checkbox scoa notify-state" checked  id="example1">
                                    <label class="onoffswitch-label" for="example1">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>


                            </div>


                        </li>

                    </ul>


                    <div class="tab-content">

                        <div id="regular" class="tab-pane active" data-emojiarea data-type="unicode" data-global-picker="false">
                            <div class="panel-body no-borders">

                                <textarea id="input2" width="100%" class="scoa-textarea" placeholder="Write something..."></textarea>

                            </div>


                        </div>




                    </div>

                    <input type="file" id="scoa-file-browser" multiple name="files[]" class="hidden"/>

                </div>


            </div>

        </div>

        <div class="ibox-footer scoa-transparent no-borders">
            <div class="pull-right">

                <button onclick="document.querySelector('#scoa-file-browser').click()" type="submit" class="btn btn-default m-t-n-xs">
                    <i class="fa fa-file"></i>
                </button>

                <button type="button" class="btn  btn-default m-t-n-xs">
                    <i class="fa fa-group"></i>
                </button>

                <button  type="button" class="btn-long-width post-button ladda-button btn btn-sm btn-primary m-t-n-xs" data-style="zoom-in">
                    <i class="fa fa-edit"></i>  <strong>POST</strong>
                </button>

            </div>


        </div>

        <div class="sk-spinner sk-spinner-wave scoa-center">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>

    </div>

</post_box>

<?php
}}
/*/ smarty_template_function_post_box_19111529095cb9e56bb0eee4_53243553 */
/* smarty_template_function_section_right_19111529095cb9e56bb0eee4_53243553 */
if (!function_exists('smarty_template_function_section_right_19111529095cb9e56bb0eee4_53243553')) {
function smarty_template_function_section_right_19111529095cb9e56bb0eee4_53243553(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>




    <div class="col-sm-9 p-lg">

        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'post_box', array(), true);?>


            <hr class="hr-line-solid m-b-xl">

            <feeds class="m-t-xl"></feeds>

            <div class="social-feed-separated">


                <div class="social-feed-box">

                    <div class="social-body">

                        <h4 class="scoa-small-brand-name">#SCOA</h4>

                    </div>


                </div>
            </div>

    </div>




<?php
}}
/*/ smarty_template_function_section_right_19111529095cb9e56bb0eee4_53243553 */
/* smarty_template_function_structure_19111529095cb9e56bb0eee4_53243553 */
if (!function_exists('smarty_template_function_structure_19111529095cb9e56bb0eee4_53243553')) {
function smarty_template_function_structure_19111529095cb9e56bb0eee4_53243553(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


    <div class="wrapper wrapper-content">

        <div class="row">

            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'section_left', array(), true);?>


            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'section_right', array(), true);?>



        </div>

    </div>



    <?php echo '<script'; ?>
 id="result-template" type="text/x-handlebars-template">


        <div class="ProfileCard u-cf">

            <img class="ProfileCard-avatar profile" letters="{{Firstname}}" src="/SCOA/public/files/profile/{{profile}}">

            <div class="ProfileCard-details">
                <div class="ProfileCard-realName">{{Firstname}} {{Middlename}} {{Lastname}}</div>
                <div class="ProfileCard-screenName">@{{user_url}}</div>
                <div class="ProfileCard-description">{{description}}</div>
            </div>

        </div>



    <?php echo '</script'; ?>
>





<?php
}}
/*/ smarty_template_function_structure_19111529095cb9e56bb0eee4_53243553 */
/* {block 'body'} */
class Block_13444049975cb9e56be64f27_38744369 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_13444049975cb9e56be64f27_38744369',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'structure', array(), true);?>


<?php
}
}
/* {/block 'body'} */
/* {block 'upper_head'} */
class Block_19483720975cb9e56be7bba6_36154998 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'upper_head' => 
  array (
    0 => 'Block_19483720975cb9e56be7bba6_36154998',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
ckin.min.css?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" media="all" rel="stylesheet" type="text/css" />

    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">

    <style>

        .file-thumb-progress.kv-hidden
        {
            top: 34px !important;
        }
        .scoa-textarea
        {
            color: black;
        }

    </style>


<?php
}
}
/* {/block 'upper_head'} */
/* {block 'script'} */
class Block_13880115065cb9e56be9c263_32210750 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_13880115065cb9e56be9c263_32210750',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/blueimp/jquery.blueimp-gallery.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
ckin.min.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" type="text/javascript"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
fileinput.min.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" type="text/javascript"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/_typehead/typehead.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" type="text/javascript"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/_typehead/handlebar.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" type="text/javascript"><?php echo '</script'; ?>
>

    

<?php
}
}
/* {/block 'script'} */
/* {block 'inner_script'} */
class Block_21360324135cb9e56beac970_85759831 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'inner_script' => 
  array (
    0 => 'Block_21360324135cb9e56beac970_85759831',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    


    //initialize post_box action


    try{

        let scoa = jQuery.scoa;

        scoa.post_box._call("post_box *");

        scoa.file_input._call('#scoa-file-browser',"/SCOA/public//scoa_feeds/upload");

        let create_post = scoa.create_post;

        create_post.uri = "/SCOA/public//scoa_feeds/SetNewPostGlobally";
        create_post.org_uri = "<?php echo $_smarty_tpl->tpl_vars['org']->value['url'];?>
";
        create_post._call('.post-button','.scoa-textarea');

        scoa.feed._call("feeds:last-of-type","<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/scoa_feeds/viewAllFeeds");


    }catch(err)
    {


        swal("Reloading...", "authentication request failed please wait while reprocessing your request", "error");

        window.location.reload();

    }





    <?php
}
}
/* {/block 'inner_script'} */
}
