{assign type $smarty.server.QUERY_STRING|@replace:"url=":"" }

{strip}


<li class="{if $type eq "scoa_admin"}active{/if}">

    <a href="{$public}/scoa_admin"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>

</li>


<li class="{if $type eq "scoa_feeds"}active{/if}">

    <a href="{$public}/scoa_feeds"><i class="fa fa-feed"></i> <span class="nav-label">Feeds</span></a>

</li>

<li class="{if $type eq "Inbox"}active{/if}">

    <a href="{$public}/Inbox"><i class="fa fa-envelope"></i> <span class="nav-label">Inbox</span></a>

</li>


<li class="{if $type eq "scoa_checklist"}active{/if}">

    <a href="{$public}/scoa_checklist"><i class="fa fa-check-square"></i> <span class="nav-label">Checklist</span></a>

</li>

{capture org_dept_section}

    {if $type eq "scoa_organization/renewable_organizations"}
        active
    {/if}


    {if $type eq "scoa_organization/un_renewable_organizations"}
        active
    {/if}


    {if $type eq "scoa_organization/request"}
        active
    {/if}

    {if $type eq "scoa_organization/addOrg"}
        active
    {/if}

{/capture}



<li class="{$smarty.capture.org_dept_section|strip_tags|replace:' ':''}">

    <a href="{$public}/scoa_organization">
        <i class="fa fa-list-ul"></i>
        <span class="nav-label">Org/Dept</span>
    </a>

        <ul class="nav nav-second-level collapse">

            <li>
                <a class="links" href="{$public}/scoa_organization/addOrg">Add</a>
            </li>

            <li>
                <a class="links" href="{$public}/scoa_organization/renewable_organizations">
                    Renewable
                </a>
            </li>

            <li>
                <a class="links" href="{$public}/scoa_organization/un_renewable_organizations">
                    Un renew
                </a>
            </li>

            <li>

                <a class="links" href="{$public}/scoa_organization/request">
                    Pending

                    {if $club->unapproved_organizations()|count}

                        <span class="valign-middle pull-right label label-info position-relative-b-n-1">

                            {$club->unapproved_organizations()|count}

                        </span>

                    {/if}

                </a>


            </li>
        </ul>

</li>


<li class="{if $type eq "contact"}active{/if}">

    <a href="{$public}/contact"><i class="fa fa-phone-square"></i> <span class="nav-label">Contacts</span></a>

</li>


<li class="{if $type eq "scoa_account"}active{/if}">

    <a href="{$public}/scoa_account"><i class="fa fa-user-secret"></i> <span class="nav-label">Accounts</span></a>

</li>


{/strip}