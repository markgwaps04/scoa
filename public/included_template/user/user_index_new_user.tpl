
{strip}

<div class="alert alert-info" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->
    <i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;
    <a class="alert-link" href="#">Welcome to <strong>SCOA</strong> site.</a> student of university of mindanao, at this time your not yet join an any organization, in order to use the fully featured of our site as a required of every student and a user of this site please submit a request atleast one of any organization as a confirmation to our dear students, you an also sent us a request to <a href="{$public}organization/create" style="text-decoration: underline">create your own organization</a> or personally talk to our staff at our office.
</div>





{if $request eq 1}

    <div class="alert alert-warning" style="background-color: #fdfdfde0">
        <i class="fa fa-exclamation-triangle animated wobble" style="font-size: 15px"></i>&nbsp;
        <a class="alert-link" href="#">Invalid Request.</a> code is does'nt exist or the position you selected is not available or you have nor permission to join this organization if you think this is a mistake <a href="#">Let us know</a>.
    </div>

{elseif not $currentUserClass->isPhoneVerify()}

    <div class="alert alert-warning warning" style="background-color: #fffffe">
        <i class="fa fa-phone" style="font-size: 15px"></i>&nbsp;
        <a class="alert-link" href="#">Confirm my identity</a> adding a mobile phone number to your account, help your account secure , make easier to connect with you and makes it easier to regain access to your account if you have trouble logging in. <a href="{$public}User/confirmAccount" style="text-decoration: underline">Confirm your phone number</a> you can always change your phone number anytime on your account <a href="{$public}home/account" style="text-decoration: underline">Go to my account</a>.
    </div>


{/if}

{/strip}

{include "`$root`public\included_template\user\user_index_join_org_template.tpl"}