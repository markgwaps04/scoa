

{strip}

<post_box>


    {**

    $org => organization details

    **}





    {if $org.isRenewalApproved and $org.isUpdated_RCode}


        <div class="ibox-content scoa-transparent no-borders no-margins no-padding post-box padding-bottom-xs">


            <div class="social-feed-separated  position-relative">

                <div class="social-avatar">
                    <a href="">

                        <img alt="image" class="profile" src="{$public}/files/profile/{$safe_profile|default:'default/1.jpg'}">

                    </a>
                </div>

                <div class="social-feed-box">

                    <div class="tabs-container">


                        <ul class="nav nav-tabs post_type">

                            <li class="active regular_post" for="66">

                                <a data-toggle="tab" href="#regular"  aria-expanded="false" >Post</a>

                            </li>


                            {if (not $user->isStaff) and ($isDeadline and not $isChecklistCompleted) }

                                <li class="checklist_post"  for="77">

                                    <a data-toggle="tab" href="#checklist" aria-expanded="true">Submit a checklist</a>

                                </li>

                            {/if}



                        </ul>


                        <div class="tab-content">

                            <div id="regular" class="tab-pane active" data-emojiarea data-type="unicode" data-global-picker="false">
                                <div class="panel-body no-borders">

                                    <textarea id="input2" class="scoa-textarea" placeholder="Write something..."></textarea>

                                </div>



                            </div>


                            {if not $user->isStaff}


                                {assign approvedChecklist $checklist_class->getApprovedTypeList($org.RCode)}


                                <div id="checklist" class="tab-pane">


                                    {if (not $user->isStaff) and ($isDeadline and not $isChecklistCompleted)  }

                                        <div class="panel-body ">

                                            <textarea id="input2" class="checklist-textarea scoa-textarea" placeholder="Write something..."></textarea>


                                            <div class="ibox no-padding m-t-md no-margin-bottom">

                                                <div class="ibox-content no-padding no-borders">

                                                    <p class="small">

                                                        Select a type of checklist to submit

                                                    </p>


                                                    <ul class="sortable-list connectList agile-list ui-sortable" id="checklist">




                                                        {if NOT in_array("AOP",$approvedChecklist)}

                                                            <li class="ui-sortable-handle" id="AOP">
                                                                <a href="javascript:void 0">
                                                                    <strong>
                                                                        Annual Operating Plan (Secure a copy from SCOA)
                                                                    </strong>
                                                                </a>
                                                            </li>

                                                        {/if}




                                                        {if NOT in_array("MAM",$approvedChecklist)}


                                                            <li class=" ui-sortable-handle" id="MAM">
                                                                <a href="javascript:void 0">
                                                                    <strong>
                                                                        Minutes from the Activity's meeting
                                                                    </strong>
                                                                </a>
                                                            </li>


                                                        {/if}



                                                        {if NOT in_array("CBL",$approvedChecklist)}


                                                            <li class="ui-sortable-handle" id="CBL">
                                                                <a href="javascript:void 0">
                                                                    <strong>
                                                                        CBL
                                                                    </strong>
                                                                </a>
                                                            </li>


                                                        {/if}



                                                        {if NOT in_array("FS",$approvedChecklist)}


                                                            <li class="ui-sortable-handle" id="FS">
                                                                <a href="javascript:void 0">
                                                                    <strong>
                                                                        Financial Statements
                                                                    </strong>
                                                                </a>
                                                            </li>


                                                        {/if}





                                                        {if NOT in_array("DE",$approvedChecklist)}


                                                            <li class="ui-sortable-handle" id="DE">
                                                                <a href="javascript:void 0">
                                                                    <strong>
                                                                        Documentary Evidence
                                                                    </strong>
                                                                </a>
                                                            </li>


                                                        {/if}




                                                    </ul>

                                                </div>
                                            </div>

                                        </div>



                                    {/if}


                                </div>

                            {/if}



                        </div>

                        <input type="file" id="scoa-file-browser" multiple name="files[]" class="hidden"/>

                    </div>

                    {*<div class="file-upload">*}

                    {*<input style="display: none;" id="file-3" name="images[]" type="file" multiple  data-min-file-count="3" >*}

                    {*</div>*}


                </div>

            </div>

            <div class="ibox-footer scoa-transparent no-borders">
                <div class="pull-right">

                    <button onclick="document.querySelector('#scoa-file-browser').click()" type="submit" class="btn btn-default m-t-n-xs">
                        <i class="fa fa-file"></i>
                    </button>

                    <button type="button" class="btn  btn-default m-t-n-xs">
                        <i class="fa fa-group"></i>
                    </button>

                    <button  type="button" class="btn-long-width post-button ladda-button btn btn-sm btn-primary m-t-n-xs" data-style="zoom-in">
                        <i class="fa fa-edit"></i>  <strong>POST</strong>
                    </button>


                </div>


            </div>



            {/strip}



            <div class="sk-spinner sk-spinner-wave scoa-center">
                <div class="sk-rect1"></div>
                <div class="sk-rect2"></div>
                <div class="sk-rect3"></div>
                <div class="sk-rect4"></div>
                <div class="sk-rect5"></div>
            </div>


            {strip}

        </div>


    {elseif $org.isRenewalApproved}


        <div class="alert alert-warning" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->
            <i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;
            Your organization <a class="alert-link" href="#">{$org.name|capitalize:true:true|default:'your organization'}</a> is currently disabled you can't post or submit a requirements using this
            organization , please personally talk or message us for new code
        </div>


    {else}


        <div class="alert alert-warning" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->
            <i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;
            <a class="alert-link" href="#">This organization is not been approved</a>
        </div>


    {/if}






</post_box>


{/strip}