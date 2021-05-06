

{extends "`$root`public\included_template\user\user_index_structure.tpl"}


{block name=title} SCOA | MyOrg {/block}










{*<!-- redirect to create org page -->*}

{function create}

    {include file="`$root`public\included_template\user\user_index_create_org.tpl" nocache}

{/function}

{*<!-- end of comment -->*}






{*<!-- redirect to user account page -->*}

{function account}


    {include file="`$root`public\included_template\user\user_index_account.tpl"}

{/function}

{*<!-- end of comment -->*}







{***<!-- check if the current user is valid to create organization -->***}




{if $currentUserClass->isCompletedRequirements() }

    {create}

{else}

    {account}

{/if}


{*<!-- end of comment -->*}





