

{block body}

    {assign organizations $club->unapproved_organizations()}



    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Organizations</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{$public}/staff">Home</a>
                </li>
                <li>
                    <a href="javascript:void 0">Organizations</a>
                </li>

                <li class="active">
                    <strong>Request</strong>
                </li>
            </ol>
        </div>

    </div>

    <div class="wrapper wrapper-content">
        <div class="ibox">
            <div class="ibox-content">


                <div class="project-list">

                    <table class="table table-hover">

                        <tbody>



                        {foreach $organizations as $every => $club}


                            <tr>

                                <td class="project-status">
                                    {$club.member_code}
                                </td>

                                <td class="project-files">

                                    <a class="active">

                                        {if $club.isUpdated_RCode}

                                            Updated

                                        {/if}


                                    </a>

                                </td>

                                <td class="project-title">

                                    <a href="view_info/{$club.RCode}">

                                        {$club.name}

                                    </a>
                                    <br/>

                                    <small>

                                        {call post_detail param=$club.create_date_time}

                                    </small>

                                </td>


                                <td class="project-people">




                                    {foreach $club.members.approved as $every => $user}

                                        <img alt="image" data-toggle="tooltip" data-placement="auto" title=
                                        "{$user.Firstname|cat:" "|cat: $user.Lastname|capitalize:true:true }" class="img-circle profile" src="{$public}/files/profile/{$user.profile|default:'default/1.jpg'}">

                                    {foreachelse}

                                        <a class="active">No members</a>

                                    {/foreach}



                                </td>


                                <td class="project-actions">



                                    <form method="post" class="inline">

                                        <input type="hidden" name="renewal_code" value="{$club.RCode}">

                                        <button  class="ladda-button btn btn-primary btn-sm choices-x" type="submit"  data-style="expand-left"><i class="fa fa-check"></i> Accept </button>

                                    </form>



                                    {if not $club.had_renew}


                                    <form method="post" class="inline">

                                        <input type="hidden" name="renewal_code_decline" value="{$club.RCode}">

                                        <input type="hidden" name="tempath" value="{$club.tempath}">


                                        <button  class=" ladda-button btn btn-warning btn-sm choices-x" type="submit"   data-style="expand-left"><i class="fa fa-times"></i> Reject </button>


                                    </form>



                                    {/if}


                                </td>
                            </tr>




                        {foreachelse}

                            <div class="row wrapper  white-bg page-heading">
                                <div class="col-lg-12 text-center ">
                                    </br>
                                    <h2 class="position-absolute text-center full-width clear-left">No request found</h2>
                                </div>

                            </div>

                        {/foreach}





                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>



{/block}