<?php
/* Smarty version 3.1.33, created on 2019-04-20 23:52:30
  from 'C:\wamp64\www\SCOA\public\included_template\user\user_index_join_org_template.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cbb403e389923_57603080',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a1c2b383dbcfd3449a7ec8f7dff02dae36d0323' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\user\\user_index_join_org_template.tpl',
      1 => 1548775896,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cbb403e389923_57603080 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="ibox">
    <div class="ibox-title">
        <strong>Looking an organization ?</strong>
    </div>
    <div class="ibox-content">
        <div class="row">

            <div class="col-sm-6 ">



                <h3 class="m-t-none m-b">Request form</h3>
                <p>Tell me what exactly the details of organization you looking for.</p>

                <form role="form" method="post">
                    <div class="form-group">
                        <label>Code</label>

                        <input type="text"  name="member_code" placeholder="Ex. 123_ABC" class="form-control" required></div>

                    <div class="form-group"><label>Position</label>


                        <select class="form-control m-b" name="position" required>
                            <option value="1">Treasurer</option>
                            <option value="2">Auditor</option>
                            <option value="3">Org_Pres</option>
                            <option value="4">Governor</option>
                            <option value="5">Adviser</option>
                        </select>

                    </div>


                    <div>
                        <button class="btn btn-sm btn-primary pull-left m-t-n-xs" type="submit">
                            <strong>Send</strong>
                        </button>
                    </div>


                </form>
            </div>

        </div>
    </div>
</div><?php }
}
