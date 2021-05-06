
{include "`$root`public\included_template\global_functions.tpl" scope="parent"}

{$pin = mt_rand(0,1000)}




{* @param #info from populate function *}

{function state}


    {if $info.submissionState eq 1}

        <span class="label label-primary pull-right">Approved</span>

    {elseif $info.submissionState eq 0 and not $info.post_details.hasApprovedEntry }


        <span class="label label-warning pull-right">Pending</span>

    {elseif $info.post_details.hasApprovedEntry}

        <span class="label label-success pull-right m-l-xs">Entry</span>

    {else}

        <span class="label label-danger pull-right">Unapproved</span>

    {/if}



{/function}

{* end of section  *}







{* @param #info from populate function *}

{function checklistType}


    {call getIntervalByShorthand strEnd=$info.PDT assign="date_time"}


    <tr class="{if $info.isRead eq 1} read {else} unread {/if}" id="{$info.path}">

        <td class="check-mail">


            {if $info.isRead eq 0 }

                <input type="checkbox" value="checked" class="checkbox" checked>

            {else}

                <input type="checkbox" value="" disabled class="disabled-checkbox">

            {/if}


        </td>

        <td class="mail-contact">

            <a href="javascript:void 0">

                {$info.org_info.name|truncate:20:"..."}

            </a>



            {call state param=$info}



        </td>

        <td class="mail-subject">

            <a href="javascript:void 0">
                {call checklist_name type=$info.checklistType}
            </a>

        </td>

        <td></td>

        <td class="text-right mail-date">{$date_time}</td>


    </tr>



{/function}











{function regularChecklist}


    {call getIntervalByShorthand strEnd=$info.PDT assign="date_time"}


    <tr class="{if $info.isRead eq 1} read {else} unread {/if}" id="{$info.path}">

        <td class="check-mail">


            {if $info.isRead eq 0 }

                <input type="checkbox" value="checked" class="checkbox" checked>

            {else}

                <input type="checkbox" value="" disabled class="disabled-checkbox">

            {/if}


        </td>

        <td class="mail-contact">

            <a href="javascript:void 0">

                {call user_fullname withoutTag=true param=$info|default:'User'|truncate:20:"..."}

            </a>



            {call state param=$info}




        </td>

        <td class="mail-subject">

            <a href="javascript:void 0">
                {*{call checklist_name type=$info.checklistType}*}
                {$info.checklistType}
            </a>

        </td>

        <td class="">
            {$info.org_info.name|truncate:30:"..."}
        </td>

        <td class="text-right mail-date">{$date_time}</td>


    </tr>


{/function}



















{function populate}



    {foreach $inbox_data as $every => $info}


        {if $info.feedsType eq "E"}


            {if $info.checklistType eq "FS" and  (not $info.isMemberState)}

                {call checklistType info=$info}

            {else}

                {call regularChecklist info=$info}

            {/if}



        {/if}




        {foreachelse}


        <tr class="p-lg no-data">

            <td class="no-borders">

                <NO_DISPLAY_OF_DATA>

                    <h2 class="text-center full-width clear-left">Not found</h2>

                </NO_DISPLAY_OF_DATA>

            </td>

        </tr>

        <script>

            jQuery("#inbox-next").attr("disabled","true");
            jQuery("#inbox-read").attr("disabled","true");
            jQuery("#inbox-all").attr("disabled","true");

        </script>


    {/foreach}


{/function}






{* init *}

{call populate|regex_replace:"/[\r\t\n]/":" "}


<script>

    jQuery(".disabled-checkbox").iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
        disabledClass: "scoa-disabled-checkbox"
    });

    jQuery(".checkbox").iCheck({
        checkboxClass: 'icheckbox_square-green inbox-checked',
        radioClass: 'iradio_square-green',
    });

</script>

