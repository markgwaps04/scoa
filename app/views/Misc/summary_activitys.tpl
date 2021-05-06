{include "`$root`public\included_template\global_functions.tpl"}

{include "`$root`public\included_template\misc\\feeds_contents_plugin.tpl"  scope=parent}

 <div id="vertical-timeline" class="vertical-container light-timeline no-margins">



     {foreach $post as $every =>$feeds}


     {capture Ondate}


     <span class="vertical-date">{call getInterval strStart=$feeds.PDT} <br>
         <small>{$feeds.PDT|date_format:"%b %e, %Y"}</small>

     {/capture}



         {if $feeds.feedsType eq "A"}



             <div class="vertical-timeline-block">
                 <div class="vertical-timeline-icon navy-bg">
                     <i class="fa fa-group"></i>
                 </div>

                 <div class="vertical-timeline-content">
                     <strong>Request to create Org/Dept</strong>
                     {$Ondate}
                </span>

                 </div>

             </div>


         {/if}












         {if $feeds.m_requestType eq "B"}


             <div class="vertical-timeline-block">
                 <div class="vertical-timeline-icon navy-bg">
                     <i class="fa fa-check"></i>
                 </div>

                 <div class="vertical-timeline-content">
                     <strong>Approval of Member request</strong>
                     {$Ondate}
                     </span>

                 </div>

             </div>


         {/if}




         {if $feeds.feedsType eq "E"}



             <div class="vertical-timeline-block">
                 <div class="vertical-timeline-icon navy-bg">
                     <i class="fa fa-reply"></i>
                 </div>

                 <div class="vertical-timeline-content">
                     <strong>Responded to Org/Dept Requirements</strong>
                     {$Ondate}
                     </span>

                 </div>

             </div>



         {/if}






















         {if $feeds.feedsType eq "F"}



             {assign attach $feeds.post_details.attachment}



             <div class="vertical-timeline-block">
                 <div class="vertical-timeline-icon navy-bg">
                     <i class="fa fa-reply"></i>
                 </div>

                 <div class="vertical-timeline-content">
                     <strong>Responded to Org/Dept Post</strong>
                     {$Ondate}
                     </span>

                 </div>

             </div>


         {/if}





     {/foreach}

 </div>
