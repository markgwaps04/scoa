
{**<!--

display a message if a current user is not yet been approved if it false
display a message where renewal code is need to approved

 -->**}


{function message}



    {* if a user is not yet been approved *}


    {if not $user_club.isCurrentUserApproved}

        <div class="row">

            <div class="alert alert-warning" style="background-color: #fdfdfde0">
                <i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;
                <a class="alert-link" href="#">Request sent to the current member of this organization</a>, your not yet been approved.
            </div>

        </div>

    {/if}



    {* if a user if approved  *}


    {if $user_club.isCurrentUserApproved and not $user_club.isRenewalApproved }

        <div class="row">

            <div class="alert alert-info" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->
                <i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;
                <a class="alert-link" href="#">Waiting for Approval</a>, this group is not yet been approved
                please fill the necessary details.
            </div>

        </div>

    {/if}



{/function}






{extends "`$root`public\included_template\user\user_index_home_structure.tpl"}

{include "`$root`public\included_template\misc\org_info_content.tpl"}



