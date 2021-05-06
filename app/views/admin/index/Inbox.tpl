

{extends "`$root`public\included_template\admin\structures\admin_structure.tpl"}


{block title} SCOA | INBOX {/block}




{function section_left }

    <div class="col-lg-3">

        <div class="ibox float-e-margins">
            <div class="ibox-content mailbox-content">

                <h1 class="scoa-small-brand-name medium-text-size">SCOA</h1>

                <div class="file-manager">

                    <div class="space-25"></div>

                    <h5>Folders</h5>

                    <ul class="folder-list m-b-md" style="padding: 0">

                        <li><a href="mailbox.html"> <i class="fa fa-inbox "></i> Inbox <span class="label label-warning pull-right">16</span> </a></li>

                        <li><a href="mailbox.html"> <i class="fa fa-envelope-o"></i> Request </a></li>

                        <li><a href="mailbox.html"> <i class="fa fa-id-card-o"></i> Batch </a></li>


                    </ul>

                    <h5>Options</h5>

                    <ul class="folder-list m-b-md" style="padding: 0">

                        <li>
                            <a href="javascript:void 0" class="inbox-options" type="entries">
                                <i class="fa fa-inbox"></i>
                                Entry
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void 0" class="inbox-options" type="0">
                                <i class="fa fa-inbox"></i>
                                Pending
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void 0" class="inbox-options" type="1"> <i class="fa fa-inbox" ></i>
                                Approved
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void 0" class="inbox-options" type="-1"> <i class="fa fa-inbox "></i>
                                Unapproved
                            </a>
                        </li>



                    </ul>


                    <h5>Categories</h5>

                    <ul class="category-list" style="padding: 0">

                        <li>
                            <a href="javascript:void 0" class="inbox-categories" type="reset">
                                <i class="fa fa-circle text-primary"></i>
                                All
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void 0" class="inbox-categories" type="AOP">
                                <i class="fa fa-circle text-navy"></i>
                                Annual Operating Plan
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void 0" class="inbox-categories" type="MAM">
                                <i class="fa fa-circle text-danger"></i>
                                Minutes from the Activity's
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void 0" class="inbox-categories" type="CBL">
                                <i class="fa fa-circle text-primary"></i> CBL
                            </a>
                        </li>

                        <li>
                            <a  href="javascript:void 0" class="inbox-categories" type="FS">
                                <i class="fa fa-circle text-info"></i>
                                Financial Statements
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void 0" class="inbox-categories" type="DE">
                                <i class="fa fa-circle text-warning"></i>
                                Documentary Evidence
                            </a>
                        </li>

                    </ul>



                    <div class="clearfix"></div>

                </div>


            </div>
        </div>
    </div>

{/function}



{function section_right}

    {include "`$root`public\included_template\admin\admin_Inbox.tpl"}

{/function}



@param $param

{function structure}

    <div class="wrapper wrapper-content">

        <div class="row">

            {call section_left}

            {call section_right}

        </div>

    </div>

{/function}





{block body}

    {call structure}

{/block}






{block script}


    <script src="{$js}scoa/inbox.js?{$pin}"></script>


{/block}

