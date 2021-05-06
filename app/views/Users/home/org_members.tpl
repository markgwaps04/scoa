
{extends "`$root`public\included_template\user\user_index_structure.tpl"}

{block name=title} SCOA | MEMBERS {/block}


{if $user_club.isCurrentUserApproved}


    {include "`$root`public\included_template\user\user_index_org_members_structure.tpl"}


{else}


    {include "`$root`public\included_template\Error.tpl"}


{/if}

