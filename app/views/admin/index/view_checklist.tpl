

{assign _organization $club->organizations(["org.url"=>$orgURL,"LIMIT" => 1])}


{function valid}


    {if $_organization}

        {$_organization = $_organization[0]}

        {include "`$root`public\included_template\admin\admin_checklist_view.tpl"}



    {else}

        {include "`$root`public\included_template\admin\admin_404.tpl"}

    {/if}



{/function}



{call valid}

