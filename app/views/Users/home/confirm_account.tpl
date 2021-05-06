{extends "`$root`public\included_template\user\user_index_structure.tpl"}


{block name=title} SCOA | VERIFY {/block}




{*<!-- welcome display  -->*}

{function welcome}


    {if not $currentUserClass->isPhoneVerify() or $request eq 2}

        {include "`$root`public\included_template\user\user_index_confirm_account.tpl"}

    {else}

        {include "`$root`public\included_template\Error.tpl"}

    {/if}


{/function}


{*<!-- end welcome display  -->*}












<SCOA_BODY>


    {welcome}



</SCOA_BODY>


