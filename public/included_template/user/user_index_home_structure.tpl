
{block body}


    {strip}


    <div class="row">

        <div class="col-md-8">

            {block before_content}{/block}

            {block content} {/block}


        </div>


        {block name=info}

            {include "`$root`public\included_template\user\user_index_right_div.tpl"}

        {/block}



    </div>


    {/strip}




{/block}




