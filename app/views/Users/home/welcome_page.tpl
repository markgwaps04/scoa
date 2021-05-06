
{extends "`$root`public/included_template/user/user_index_structure.tpl"}

{block name=title} SCOA | Home{/block}











{*<!-- welcome display  -->*}

{function welcome}


    {assign "has_organization" $club->has_club() }


        {if not $has_organization }


            {include "`$root`public\included_template\user\user_index_new_user.tpl"}


        {else}

            {include "`$root`public\included_template\user\user_activity_and_organizations.tpl"}

        {/if}




{/function}


{*<!-- end welcome display  -->*}




{block script}

    <script>

        (function(__){

            __(document).ready(function () {

                jQuery._scoa();

            })

        })(jQuery)

    </script>



{/block}













<SCOA_BODY>


    {block name=body}

    <div class="row">

        <div class="col-md-8">



          {welcome}

        </div>




        {block name=info}

        {include "`$root`public\included_template\user\user_index_right_div.tpl"}

        {/block}




    </div>


    {/block}


</SCOA_BODY>


