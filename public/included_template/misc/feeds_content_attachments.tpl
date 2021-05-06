


{function attachment}


    {assign feeds $param[0]}


    {capture ByInterval}

        {call getIntervalByShorthand strEnd=$feeds.PDT assign="interval"}

        <small class="pull-right text-navy">{$interval}</small>

    {/capture}



    {include "`$root`public\included_template\misc\\feeds_contents_plugin.tpl"  scope=parent}



    {capture inner_profile}

        <a href="javascript: void 0" class="pull-left">


            {if not $feeds.isStaff}


                <img alt="image" class="profile" src="{$public}/files/profile/{$feeds.profile|default : "1.jpg"}">

            {else}

                <img alt="image" class="profile" src="{$public}/files/scoa.png">

            {/if}

        </a>


    {/capture}



       <div class="social-feed-box center-block no-margins">

           {$smarty.capture.download_dropdown}


           <div class="social-avatar">

               {$smarty.capture.ByInterval}

               {$smarty.capture.inner_profile}

               <div class="media-body">

                   <a href="#">
                       {call user_name param=$feeds}
                   </a>

                   <small class="text-muted">{call post_detail param= $feeds.PDT}</small>

               </div>


           </div>


           <div class="social-body">

               <br>

               <div class="well bg-white">

                   <big>
                       <strong>

                           <p>
                               <a href="javascript:void 0">

                                   {if $feeds.submissionState neq -1}

                                       <i class="fa fa-check"></i>

                                   {/if}


                                   {call checklist_name type=$feeds.checklistType|trim}
                               </a>
                           </p>

                       </strong>
                   </big>



                   {$feeds.submissionBody}


                   <div style="margin-top: 10px" class="mail-attachment">
                       <p>
                           <span><i class="fa fa-paperclip"></i> {$feeds.files|count} attachments - </span>
                           <a href="#">Download all</a>
                       </p>

                       {$file_body}

                   </div>


               </div>


           </div>


       </div>



{/function}