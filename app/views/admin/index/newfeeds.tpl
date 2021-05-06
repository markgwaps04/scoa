

{extends "`$root`public\included_template\admin\structures\admin_structure.tpl"}

{assign globalfeeds true scope="global"}


{block title} SCOA | FEEDS {/block}




{function section_left }


    <div class="col-lg-3">

        <div class="ibox float-e-margins">
            <div class="ibox-content mailbox-content">

                <h1 class="scoa-small-brand-name medium-text-size">SCOA</h1>

                <div class="file-manager">

                    <div class="space-25"></div>

                    <ul class="folder-list m-b-md" style="padding: 0">
                        <li><a href="javascript:void 0"> <i class="fa fa-group "></i> Organizations </a></li>

                        <li><a href="javascript:void 0"> <i class="fa fa-phone"></i> Contacts </a></li>

                        <li><a href="javascript:void 0"> <i class="fa fa-id-card-o"></i> Accounts </a></li>
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






{function post_box}

<post_box>

    <div class="ibox-content scoa-transparent no-borders no-margins no-padding post-box padding-bottom-xs">


        <div class="social-feed-separated  position-relative">

            <div class="social-avatar">
                <a href="">

                    <img letters="{$_currentUser.Firstname}" _src="/SCOA/public/files/profile/{$safe_profile}">

                </a>
            </div>

            <div class="social-feed-box">

                <div class="tabs-container">


                    <ul class="nav nav-tabs post_type">

                        <li class="active regular_post" for="66">

                            <a data-toggle="tab" href="#regular"  aria-expanded="false" >Post</a>

                        </li>


                        <li class="pull-right">

                            <div class="switch">

                                <div class="onoffswitch" id="switch" data-toggle="tooltip" data-placement="left" title="" data-original-title="Notify">
                                    <input type="checkbox" class="onoffswitch-checkbox scoa notify-state" checked  id="example1">
                                    <label class="onoffswitch-label" for="example1">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>


                            </div>


                        </li>

                    </ul>


                    <div class="tab-content">

                        <div id="regular" class="tab-pane active" data-emojiarea data-type="unicode" data-global-picker="false">
                            <div class="panel-body no-borders">

                                <textarea id="input2" width="100%" class="scoa-textarea" placeholder="Write something..."></textarea>

                            </div>


                        </div>




                    </div>

                    <input type="file" id="scoa-file-browser" multiple name="files[]" class="hidden"/>

                </div>


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

        <div class="sk-spinner sk-spinner-wave scoa-center">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>

    </div>

</post_box>

{/function}








{function section_right}



    <div class="col-sm-9 p-lg">

        {call post_box}

            <hr class="hr-line-solid m-b-xl">

            <feeds class="m-t-xl"></feeds>

            <div class="social-feed-separated">


                <div class="social-feed-box">

                    <div class="social-body">

                        <h4 class="scoa-small-brand-name">#SCOA</h4>

                    </div>


                </div>
            </div>

    </div>




{/function}












{function structure}

    <div class="wrapper wrapper-content">

        <div class="row">

            {call section_left}

            {call section_right}


        </div>

    </div>

{literal}

    <script id="result-template" type="text/x-handlebars-template">


        <div class="ProfileCard u-cf">

            <img class="ProfileCard-avatar profile" letters="{{Firstname}}" src="/SCOA/public/files/profile/{{profile}}">

            <div class="ProfileCard-details">
                <div class="ProfileCard-realName">{{Firstname}} {{Middlename}} {{Lastname}}</div>
                <div class="ProfileCard-screenName">@{{user_url}}</div>
                <div class="ProfileCard-description">{{description}}</div>
            </div>

        </div>



    </script>


{/literal}


{/function}





{block body}

    {call structure}

{/block}


{block upper_head}


    <link href="{$css}ckin.min.css?{$pin}" media="all" rel="stylesheet" type="text/css" />

    <link href="{$css}fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

    <link href="{$css}plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">

    <style>

        .file-thumb-progress.kv-hidden
        {
            top: 34px !important;
        }
        .scoa-textarea
        {
            color: black;
        }

    </style>


{/block}



{block script}

    <script src="{$js}plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

    <script src="{$js}ckin.min.js?{$pin}" type="text/javascript"></script>

    <script src="{$js}fileinput.min.js?{$pin}" type="text/javascript"></script>

    <script src="{$js}plugins/_typehead/typehead.js?{$pin}" type="text/javascript"></script>

    <script src="{$js}plugins/_typehead/handlebar.js?{$pin}" type="text/javascript"></script>

    {*<script src="{$js}scoa/mention.js?{$pin}" type="text/javascript"></script>*}


{/block}





<script>

    {block inner_script append}


    {literal}


    //initialize post_box action


    try{

        let scoa = jQuery.scoa;

        scoa.post_box._call("post_box *");

        scoa.file_input._call('#scoa-file-browser',"/SCOA/public//scoa_feeds/upload");

        let create_post = scoa.create_post;

        create_post.uri = "/SCOA/public//scoa_feeds/SetNewPostGlobally";
        create_post.org_uri = {/literal}"{$org.url}"{literal};
        create_post._call('.post-button','.scoa-textarea');

        scoa.feed._call("feeds:last-of-type","{/literal}{$public}/scoa_feeds/viewAllFeeds");


    }catch(err)
    {


        swal("Reloading...", "authentication request failed please wait while reprocessing your request", "error");

        window.location.reload();

    }





    {/block}

</script>






