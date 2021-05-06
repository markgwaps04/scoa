
<div class="row wrapper border-bottom white-bg page-heading">

    <div class="col-sm-12">

        <h2>{$org.name|truncate:80:"..."}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{$public}/staff">Home</a>
            </li>
            <li>
                <a href="javascript:void 0">Organizations</a>
            </li>
            <li class="active">
                <strong>Info</strong>
            </li>
        </ol>

    </div>

{*    <div class="col-sm-8">*}

{*        {if not $org.isRenewalApproved}*}
{*            *}
{*            <div class="title-action">*}

{*                <form method="post" action="{ROOT_URI}/scoa_organization/request" class="inline">*}

{*                    <input type="hidden" name="renewal_code" value="{$org.RCode}">*}

{*                    <button class="btn btn-primary btn-sm choices-x" type="submit" data-style="expand-left">*}
{*                        <i class="fa fa-check"></i> Approved </button>*}

{*                </form>*}


{*                <form method="post" action="{ROOT_URI}/scoa_organization/request" class="inline">*}

{*                    <input type="hidden" name="renewal_code_decline" value="{$ORG.RCode}">*}

{*                    <input type="hidden" name="tempath" value="{$ORG.RCode}">*}

{*                    <button class="btn btn-info btn-sm choices-x" type="submit" data-style="expand-left">*}
{*                        <i class="fa fa-times"></i> Decline </button>*}

{*                </form>*}
{*                &nbsp;*}
{*            </div>*}
{*        {/if}*}

{*    </div>*}
</div>