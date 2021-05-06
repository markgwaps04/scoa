


<SCOA_BODY>


    {block name=body}


        <div class="row">

        <div class="col-md-8">


            <div class="alert alert-dark" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->
                <i class="fa fa-angle-left" style="font-size: 19px;vertical-align: bottom"></i>&nbsp;
                <a class="alert-link" href="{$public}">Back to home </a>

            </div>


            {if $request eq 1}

            <div class="alert alert-warning" style="background-color: #fdfdfde0">
                <i class="fa fa-exclamation-triangle" style="font-size: 15px"></i>&nbsp;
                <a class="alert-link" href="#">Invalid Request.</a> code is does'nt exist or the position you selected is not available or you have nor permission to join this organization if you think this is a mistake <a href="#">Let us know</a>.
            </div>

            {/if}

            <div class="alert alert-info" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->
                No organization yet ? sent us a request to <a href="{$public}/organization/create" class="alert-link">create your organization</a> or personally talk to us at our office.
            </div>


            {include "`$root`public\included_template\user\user_index_join_org_template.tpl"}

        </div>


        {block name=info}

        {include "`$root`public\included_template\user\user_index_right_div.tpl"}

        {/block}


    </div>


    {/block}


</SCOA_BODY>



