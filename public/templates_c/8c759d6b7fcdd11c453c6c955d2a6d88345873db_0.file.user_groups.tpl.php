<?php
/* Smarty version 3.1.33, created on 2021-05-06 12:27:37
  from 'C:\xampp\htdocs\scoa\app\views\Users\misc\user_groups.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_609370390a1689_18501981',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c759d6b7fcdd11c453c6c955d2a6d88345873db' => 
    array (
      0 => 'C:\\xampp\\htdocs\\scoa\\app\\views\\Users\\misc\\user_groups.tpl',
      1 => 1553482448,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609370390a1689_18501981 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'club_status' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\scoa\\public\\templates_c\\8c759d6b7fcdd11c453c6c955d2a6d88345873db_0.file.user_groups.tpl.php',
    'uid' => '8c759d6b7fcdd11c453c6c955d2a6d88345873db',
    'call_name' => 'smarty_template_function_club_status_55885709760937038f24f38_98958450',
  ),
  'cover_photo' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\scoa\\public\\templates_c\\8c759d6b7fcdd11c453c6c955d2a6d88345873db_0.file.user_groups.tpl.php',
    'uid' => '8c759d6b7fcdd11c453c6c955d2a6d88345873db',
    'call_name' => 'smarty_template_function_cover_photo_55885709760937038f24f38_98958450',
  ),
));
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\scoa\\app\\core\\Smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>


<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."public\included_template\Misc\\feeds_contents_plugin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 32, true);
?>














<?php
$__section_clubs_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['has_organization']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_clubs_0_total = $__section_clubs_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_clubs'] = new Smarty_Variable(array());
if ($__section_clubs_0_total !== 0) {
for ($__section_clubs_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_clubs']->value['index'] = 0; $__section_clubs_0_iteration <= $__section_clubs_0_total; $__section_clubs_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_clubs']->value['index']++){
?>


    <div class="ibox">

        <div class="ibox-title">

         <span class="label label-primary pull-right">
             New
         </span>


            <h5>
                <a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
feeds/<?php echo $_smarty_tpl->tpl_vars['has_organization']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clubs']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clubs']->value['index'] : null)]['url'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['has_organization']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clubs']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clubs']->value['index'] : null)]['name'];?>

                </a>

            </h5>

        </div>
        <div class="ibox-content no-padding" style="overflow: hidden">

            <div class="row">

                <div class="col-lg-6 org_details">

                    <div class="team-members">

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['has_organization']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clubs']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clubs']->value['index'] : null)]['members']['approved'], 'a_user', false, 'every');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every']->value => $_smarty_tpl->tpl_vars['a_user']->value) {
?>


                            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'set_profile', array('class'=>"img-circle",'profile'=>$_smarty_tpl->tpl_vars['a_user']->value['profile'],'firstname'=>$_smarty_tpl->tpl_vars['a_user']->value['Firstname'],'isStaff'=>$_smarty_tpl->tpl_vars['a_user']->value['isStaff']), true);?>



                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                    </div>


                    <h4>ABOUT</h4>

                    <p>

                        <?php $_smarty_tpl->_assignInScope('Rcode', $_smarty_tpl->tpl_vars['has_organization']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clubs']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clubs']->value['index'] : null)]['RCode']);?>

                        <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['has_organization']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clubs']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clubs']->value['index'] : null)]['details'],270,'&nbsp;<a href="#">See more...</a>');?>


                    </p>

                    <div class="row  m-t-sm">
                        <div class="col-sm-4">
                            <div class="font-bold">CODE</div>

                            <?php echo $_smarty_tpl->tpl_vars['has_organization']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clubs']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clubs']->value['index'] : null)]['member_code'];?>


                        </div>
                        <div class="col-sm-4">
                            <div class="font-bold">MEMBERS</div>

                            <?php echo count($_smarty_tpl->tpl_vars['has_organization']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clubs']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clubs']->value['index'] : null)]['members']['approved']);?>



                        </div>
                        <div class="col-sm-4 text-right">
                            <div class="font-bold">Status</div>

                            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'club_status', array('status'=>$_smarty_tpl->tpl_vars['has_organization']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clubs']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clubs']->value['index'] : null)]['isRenewalApproved']), true);?>


                        </div>
                    </div>

                </div>

                <div class="col-lg-6">

                    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'cover_photo', array('renewal_code'=>$_smarty_tpl->tpl_vars['Rcode']->value), true);?>


                </div>

            </div>

        </div>
    </div>

    <?php }} else {
 ?>



    <div class="text-center">

        <h2>

            <p><a href="#">Join</a></p>

            <p class="small">or</p>

            <p><a href="create">create new organization</a></p>


        </h2>

    </div>


<?php
}
}
/* smarty_template_function_club_status_55885709760937038f24f38_98958450 */
if (!function_exists('smarty_template_function_club_status_55885709760937038f24f38_98958450')) {
function smarty_template_function_club_status_55885709760937038f24f38_98958450(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


    <?php if ($_smarty_tpl->tpl_vars['status']->value == 1) {?>

        <div class="font-bold" style="color: steelblue ">ACTIVE</div>

    <?php } else { ?>

        <div class="font-bold" style="color: firebrick ">NOT ACTIVE</div>


    <?php }?>


<?php
}}
/*/ smarty_template_function_club_status_55885709760937038f24f38_98958450 */
/* smarty_template_function_cover_photo_55885709760937038f24f38_98958450 */
if (!function_exists('smarty_template_function_cover_photo_55885709760937038f24f38_98958450')) {
function smarty_template_function_cover_photo_55885709760937038f24f38_98958450(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


    <?php $_smarty_tpl->_assignInScope('cover', $_smarty_tpl->tpl_vars['club']->value->get_cover_photo($_smarty_tpl->tpl_vars['renewal_code']->value));?>

    <?php if ($_smarty_tpl->tpl_vars['cover']->value != '') {?>

        <div class="org" style="background-image: url('http://localhost/SCOA/public//files/cover/<?php echo $_smarty_tpl->tpl_vars['cover']->value;?>
');"></div>

    <?php } else { ?>

        <div class="org" style="background-image: url('http://localhost/SCOA/public//files/default_image/default.png');"></div>

    <?php }?>

<?php
}}
/*/ smarty_template_function_cover_photo_55885709760937038f24f38_98958450 */
}
