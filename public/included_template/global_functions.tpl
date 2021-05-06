

{*<!-- full name of a user @param $param @islink = true -->*}


{function test}

    Success

{/function}


{function user_fullname}


    {capture ___name}

        {if $param.isStaff}

            {$param.staffFirstname|capitalize:true:true}
            {$param.staffMiddlename|capitalize:true:true}
            {$param.staffLastname|capitalize:true:true}

        {else}

            {$param.Firstname|capitalize:true:true}
            {$param.Middlename|capitalize:true:true}
            {$param.Lastname|capitalize:true:true}

        {/if}



    {/capture}



    {if not $withoutTag}

        <strong>

           {$smarty.capture.___name}

        </strong>

    {else}


        {$smarty.capture.___name}


    {/if}




{/function}



{*<!-- end comment -->*}








{*<!-- format time and date of posting detail @param $param -->*}

{function post_detail}


    {$param|date_format:"%A, %B %e, %Y"}


{/function}

{*<!-- end comment -->*}









{*<!-- identify type of position @param $param-->*}

{function position}

    {if $param eq 1 } Treasurer {/if}

    {if $param eq 2 } Auditor {/if}

    {if $param eq 3 } President {/if}

    {if $param eq 4 } Department Governor {/if}

    {if $param eq 5 } Adviser {/if}


{/function}

{*<!-- end comment -->*}







{*<!-- identify type of position @param $param-->*}


{function is_position_valid}


    {call position param=$param.post_details.position_target_user assign="position"}


    {if empty($position|@trim)}

        {call position param=$param.membership.position}

    {else}

        {$position}

    {/if}





{/function}



{*<!-- end comment -->*}





{* @param $type *}

{function checklist_name}



    {if $type eq "AOP"}

        Annual Operating Plan (Secure a copy from SCOA)


    {elseif $type eq "MAM"}

       Minutes from the Activity's meeting


    {elseif $type eq "CBL"}

       CBL


    {elseif $type eq "FS"}

        Financial Statements


    {elseif $type eq "DE"}

        Documentary Evidence


    {/if}




{/function}






{function approval_state }

    {* @param $param  *}


    {if $param.submissionState eq "1"}

        <span class="badge badge-primary badge-pill">
                    <i class="fa fa-bookmark"></i> Approved
                </span>


    {elseif $param.submissionState eq "0" }

        <span class="badge badge-warning badge-pill">
                    <i class="fa fa-bookmark"></i> Pending
                </span>

    {else}



        <span class="badge badge-danger badge-pill">
                    <i class="fa fa-bookmark"></i> Unapproved
                </span>

    {/if}



{/function}













{*@param $strStart @param $strEnd *}

{function getInterval}

    {assign interval $date_class->relative_time($strEnd)}


    {if $interval->isInverted()}


        {if $interval->isSecondsAgo()}

            {$interval->seconds()} seconds ago



        {elseif $interval->isMinutesAgo() }

            {$interval->minutes()} minutes ago



        {elseif $interval->isHourAgo()}

            {$interval->hour()} hours ago


        {elseif $interval->isYesterday()}

            Yesterday


        {elseif $interval->isAfter3Days()}

            {$interval->days()} days ago



        {elseif $interval->isAfterAMonth()}

            {$interval->month()} month ago


        {else}

            {call post_detail param=$strEnd}

        {/if}



    {else}


        {if $interval->isTomorrow()}

            Tomorrow


        {elseif $interval->isToday()}

            Today

        {else}

            {call post_detail param=$strEnd}

        {/if}



    {/if}



{/function}




{*@param $strStart @param $strEnd *}

{function getIntervalByShorthand}

    {assign interval $date_class->relative_time($strEnd)}


    {capture date_time}

        {if $interval->isInverted()}


            {if $interval->isSecondsAgo()}

                {$interval->seconds()} s



            {elseif $interval->isMinutesAgo() }

                {$interval->minutes()} m



            {elseif $interval->isHourAgo()}

                {$interval->hour()} h


            {elseif $interval->isYesterday()}

                Yesterday


            {elseif $interval->isAfter3Days()}

                {$interval->days()} d



            {elseif $interval->isAfterAMonth()}

                {$interval->month()} m


            {/if}



        {else}


            {if $interval->isTomorrow()}

                Tom


            {elseif $interval->isToday()}

                Today

            {else}

                {call post_detail param=$strEnd}

            {/if}




        {/if}

    {/capture}

    {$smarty.capture.date_time|regex_replace:"/[\r\t\n]/":" "|trim}

{/function}