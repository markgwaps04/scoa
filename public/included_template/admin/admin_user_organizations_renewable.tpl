

{extends "`$root`public\included_template\admin\structures\admin_structure.tpl"}


{assign org $user_org[0]}




{block title} SCOA | INFO {/block}



{block head append}

    <link href="{$css}/component.css" rel="stylesheet">

    <link href="{$css}plugins/jquery.guillotine.css" media="all" rel="stylesheet" type="text/css" />

    <script src="{$js}modernizr.custom.js"></script>

{/block}


{block body}




    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">

            <h2>Renewable Organizations</h2>


            <ol class="breadcrumb">
                <li>
                    <a href="{$public}/staff">Home</a>
                </li>
                <li>
                    <a href="javascript:void 0">Organizations</a>
                </li>

                <li class="active">
                    <strong>list of Orgs</strong>
                </li>
            </ol>
        </div>


    </div>


    <div class="wrapper wrapper-content">

        <div class="m-t-md m-b-md">

            {include "`$root`public\included_template\admin\admin_user_organization_populate.tpl"}

        </div>


        {call footer}

    </div>




{/block}





