<?php
/* Smarty version 3.1.33, created on 2019-05-11 20:03:59
  from 'C:\laragon\www\SCOA\public\included_template\admin\admin_Inbox.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd6ba2feb5d90_12414326',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3153a8ee885ac0bfe316752a242d6e5ed65a35bc' => 
    array (
      0 => 'C:\\laragon\\www\\SCOA\\public\\included_template\\admin\\admin_Inbox.tpl',
      1 => 1552725683,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd6ba2feb5d90_12414326 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'inbox_header', null, null);?>

    <div class="mail-box-header">

        <div class="pull-right mail-search">
            <div class="input-group">

                <input type="text" class="form-control input-sm" id="inbox_search" name="search" placeholder="Search">

                <div class="input-group-btn">
                    <a class="btn btn-sm btn-primary" id="inbox-search-button">
                        Search
                    </a>
                </div>

            </div>
        </div>


        <h2>
            Inbox
        </h2>


        <div class="mail-tools tooltip-demo m-t-md">
            <div class="btn-group pull-right">

                <button class="btn btn-white btn-sm" id="inbox-prev">
                    <i class="fa fa-arrow-left"></i>
                </button>

                <button class="btn btn-white btn-sm" id="inbox-next">
                    <i class="fa fa-arrow-right"></i>
                </button>

            </div>

            <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Refresh inbox" id="inbox-refresh">
                <i class="fa fa-refresh"></i> Refresh
            </button>

            <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as read" id="inbox-read">
                <i class="fa fa-eye"></i>
            </button>

            <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Select All" id="inbox-all">
                <i class="fa fa-check"></i>
            </button>


        </div>
    </div>


<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>




<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'body', null, null);?>


    <div class="mail-box p-md-1">

        <div class="ibox-content">

            <div class="sk-spinner sk-spinner-three-bounce">
                <div class="sk-bounce1"></div>
                <div class="sk-bounce2"></div>
                <div class="sk-bounce3"></div>
            </div>

            <table class="table table-hover table-mail no-margin-bottom" id="inbox_table">

                <tbody>

                <tr class="p-lg">

                    <td class="no-borders">

                        <h2 class="text-center full-width clear-left">Loading...</h2>

                    </td>

                </tr>

                </tbody>

            </table>

        </div>




    </div>


<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>





<div class="col-lg-9" id="inbox-content">

    <div id="inbox-mail">


        <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'inbox_header');?>


        <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'body');?>


    </div>



    <div id="inbox-view-mail"></div>


</div>







<?php }
}
