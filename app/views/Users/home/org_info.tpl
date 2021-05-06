
{extends "`$root`public\included_template\user\user_index_structure.tpl"}

{block name=title} SCOA | INFO{/block}



{if $user_club.isCurrentUserApproved and not $user_club.isRenewalApproved }


    {include file="`$root`public\included_template\user\user_index_org_info.tpl" nocache}


{else}

    {include file="`$root`public\included_template\misc\club_dashboard.tpl" nocache}

{/if}




