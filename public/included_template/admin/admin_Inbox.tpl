
{capture inbox_header}

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


{/capture}




{capture body}


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


{/capture}





<div class="col-lg-9" id="inbox-content">

    <div id="inbox-mail">


        {$smarty.capture.inbox_header}

        {$smarty.capture.body}

    </div>



    <div id="inbox-view-mail"></div>


</div>







