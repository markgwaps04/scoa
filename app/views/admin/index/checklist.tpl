{extends "`$root`public\included_template\admin\structures\admin_structure.tpl"}

{block title} SCOA | CHECKLIST {/block}




{include "`$root`public\included_template\admin\admin_checklist.tpl"}


{block head append}

    <style>

        .vote-icon-success
        {
            vertical-align: -19px;
            font-size: 25px;
            color: #1ab394 !important;
        }

        .vote-icon-error
        {
            vertical-align: -19px;
            font-size: 25px;
            color: #b34f15 !important;
        }


    </style>



{/block}


<script>

{block inner_script}


    jQuery._scoa();


{/block}


</script>