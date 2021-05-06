{include "`$root`public\included_template\global_functions.tpl" scope="parent"}


{$pin = mt_rand(0,1000)}




<style>

    .xx-small {

        font-size: xx-small;
    }

</style>




{foreach $post_details as $every => $info}


    {if $info.feedsType eq "F"}

        <div class="social-feed-box no-borders no-margins">

            <div class="social-footer">

                <div class="social-comment">

                    {if $info.isStaff}

                        <a href="" class="pull-left">
                            <img alt="image" src="{$public}/files/scoa.png" class="profile" letters="{$info.staffFirstname|substr:0:1}">
                        </a>

                    {/if}



                    <div class="media-body">



                        <a href="javascript:void 0">{call user_fullname param=$info}</a>


                        {if $info.isStaff}


                            {if $info.post_details.state eq "0"}

                            <span class="pull-right">

                                <span class="label label-warning xx-small">Pending</span>

                            </span>


                            {/if}



                            {if $info.post_details.state eq "1"}

                                <span class="pull-right">

                                <span class="label label-primary xx-small">Approved</span>

                            </span>


                            {/if}




                            {if $info.post_details.state eq "2"}

                                <span class="pull-right">

                                <span class="label label-info xx-small">Respond</span>

                            </span>


                            {/if}


                            {if $info.post_details.state eq "-1"}

                                <span class="pull-right">

                                <span class="label label-danger xx-small">Un approved</span>

                            </span>


                            {/if}



                        {/if}

                        <p>
                            {$info.post_details.body|trim|htmlspecialchars}
                        </p>

                        <small class="text-muted">{call post_detail param=$info.PDT}</small>
                        -
                        <small class="text-muted">{call getIntervalByShorthand strEnd=$info.PDT}</small>

                    </div>
                </div>

            </div>



        </div>

    {/if}




{foreachelse}


    <div class="social-feed-box no-borders no-margins">

        <div class="social-footer">

            <div class="social-comment">

                <h5 class="text-center">No Activity's</h5>

            </div>

        </div>



    </div>


{/foreach}

