
{extends "`$root`public\included_template\user\user_index_structure.tpl"}

{block name=title} SCOA | FEED {/block}




{**<!--

check if renewal code is approved if true display feeds if not
check if a current user is setted her requirements if setted display
org info otherwise display an error

 -->**}


{function welcome}


    {if not $is_identify}


        {include "`$root`public\included_template\user\user_index_account.tpl"}


    {elseif ($user_club.isRenewalApproved  and $user_club.isCurrentUserApproved) }


        {include "`$root`public\included_template\user\user_index_feeds.tpl"}


    {else}

        {include "`$root`public\included_template\user\user_index_org_info.tpl"}

    {/if}


{/function}

{*<!-- end of function  -->*}




{welcome}

