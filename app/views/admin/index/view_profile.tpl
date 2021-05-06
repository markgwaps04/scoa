{extends "`$root`public\included_template\admin\structures\admin_structure.tpl"}

{include "`$root`public\included_template\global_functions.tpl" scope="global"}


{block title} SCOA | PROFILE {/block}

{assign targetUser $byUser[0] scope="global"}

{call user_fullname param=$targetUser withoutTag=true assign="user_name"}



{capture pageTitle}


    <div class="row wrapper border-bottom white-bg page-heading">

        <div class="col-sm-4">

            <h2>Administrator Profile</h2>


            <ol class="breadcrumb">
                <li>
                    <a href="{$public}/staff">Home</a>
                </li>

                <li>
                    <strong>Accounts</strong>
                </li>

                <li class="active">
                    <strong>Profile</strong>
                </li>

            </ol>
        </div>


    </div>

{/capture}



{capture description}

    <div class="row m-b-lg m-t-lg">

        <div class="col-md-6">

            <div class="profile-image">
                <img _src="/SCOA/public/files/profile/{$targetUser.profile}" class="profile img-circle circle-border m-b-md" alt="profile">
            </div>

            <div class="profile-info">
                <div class="">
                    <div>

                        <h2 class="no-margins">
                            {preg_replace("/\s+/"," ",$user_name)|trim|truncate:20:"..."}
                        </h2>

                        {if $targetUser.Path}

                            <h3>Administrator</h3>

                        {else}

                            <h3>Staff</h3>

                        {/if}


                        <small>
                            {$targetUser.about|truncate:150:"..."}
                        </small>




                    </div>
                </div>
            </div>



        </div>



        <state>

            <div class="col-md-3">

                <table class="table small m-b-xs">
                    <tbody>

                    <tr>
                        <td>
                            <strong>0</strong> Post
                        </td>
                        <td>
                            <strong>0</strong> Respond
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <strong>0</strong> Approved
                        </td>
                        <td>
                            <strong>0</strong> UnApproved
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <strong>0</strong> Block
                        </td>
                        <td>
                            <strong>0</strong> UnApproved
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>

            <div class="col-md-3">
                <small>Activity</small>
                <h2 class="no-margins">0%</h2>No loaded data
                <div id="sparkline1"></div>
            </div>

        </state>


    </div>

{/capture}




{capture newsfeed}


    <div class="col-lg-8">


        <feeds class="m-t-xl"></feeds>

        <div class="social-feed-separated">

            <div class="social-feed-box">

                <div class="social-body">

                    <h4 class="scoa-small-brand-name">#SCOA</h4>

                </div>

            </div>


        </div>

    </div>

{/capture}



{capture body}

    {strip}

        {$smarty.capture.pageTitle}

        <div class="wrapper wrapper-content">

            {$smarty.capture.description}

            <div class="row">


                <div class="col-lg-4">

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="ibox">

                                <div class="ibox-content">

                                    <div class="pull-right" style="position:relative; top:-5px">
                                        <span class="simple_tag btn bg-small">
                                            <i class="fa fa-gear"></i>
                                        </span>
                                    </div>

                                    <h3>About {preg_replace("/\s+/"," ",$user_name)|trim|truncate:20:"..."}</h3>

                                    <p class="small">

                                        {$targetUser.about}

                                    </p>

                                    <h5>Phone number</h5>

                                    <p class="small">{$targetUser.CP}</p>

                                    <h5>Date added</h5>

                                    <p class="small">{$targetUser.DT|date_format:"%b %e, %Y"}</p>


                                    {*<br>*}
                                    {*Date added : {$targetUser.DT|date_format:"%b %e, %Y"}*}


                                    {*{if $targetUser.createBy}*}

                                    {*{assign addedBy $user->user_details($targetUser.createBy) }*}

                                    {*{call user_fullname param=$addedBy withoutTag=true assign="byUser"}*}
                                    {*<br>*}
                                    {*Added by : {preg_replace("/\s+/"," ",$byUser)|trim|truncate:20:"..."}*}
                                    {*{/if}*}


                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 no-padding" id="byType">



                        </div>

                    </div>



                </div>

                {$smarty.capture.newsfeed}



            </div>

        </div></div>


    {/strip}


    <script>

        window.scoaUserId = "{$targetUser.id}";

    </script>


{/capture}



{block body}

    {$smarty.capture.body}

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


{literal}


    <script src="/SCOA/public/js/scoa/scoa_partial.js"></script>

    <script src="/SCOA/public/js/LAB.js"></script>
    <!-- Sparkline -->
    <script src="/SCOA/public/js/plugins/sparkline/jquery.sparkline.min.js"></script>


    <script type="text/html" id="states">

        <div class="col-md-3">
            <table class="table small m-b-xs">
                <tbody>

                <tr>
                    <td>
                        <strong>{post}</strong> Post
                    </td>
                    <td>
                        <strong>{respond}</strong> Respond
                    </td>

                </tr>

                <tr>
                    <td>
                        <strong>{approved}</strong> Approved
                    </td>
                    <td>
                        <strong>{unapproved}</strong> UnApproved
                    </td>
                </tr>


                <tr>
                    <td>
                        <strong>{block}</strong> Block
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <small>Activity</small>
            <h2 class="no-margins">{percent}</h2> {from}
            <div id="sparkline1"></div>
        </div>

</script>


    <script>

        const jsDir = "/SCOA/public/js/";


        (function(){


            const script = [
                "plugins/blueimp/jquery.blueimp-gallery.min.js",
                "ckin.min.js",
                "fileinput.min.js",
                "plugins/_typehead/typehead.js",
                "plugins/_typehead/handlebar.js",
                "plugins/breeze/lodash.js",
                "moment/moment.js",
                "plugins/jexcel/numeral.min.js"
            ];

            $LAB
                .setOptions({AlwaysPreserveOrder:true})
                .script(script.toNestedArray(jsDir))
                .wait(function(){

                    jQuery._scoa();

                });


            $(document).ready(function() {

                $("#sparkline1").sparkline([0, 0, 0, 0, 0, 0,0,0], {
                    type: 'line',
                    width: '100%',
                    height: '50',
                    lineColor: '#1ab394',
                    fillColor: "transparent"
                });

                jQuery.get("/SCOA/public/scoa_account/feedsState/",function(data) {


                    try{

                        const result = {};

                        const json = JSON.parse(data);

                        const group = function(data) {

                            return _.groupBy(data,function (respond) {

                                return moment(respond.PDT).format("YYYY-MMMM-D")

                            });

                        }


                        const targetUserPost = _.filter(json,{user : window.scoaUserId});

                        const dates = group(json);

                        let allAdmins = _.groupBy(json,"user")

                        if(allAdmins.hasOwnProperty(window.scoaUserId)) {

                            allAdmins[window.scoaUserId]["isTarget"] = 1;

                        }

                        const overAll = _.map(dates,function (e,key) {

                            const targetUserPost = _.filter(e,{user : window.scoaUserId})

                            return numeral(targetUserPost.length / e.length)._value * 100;

                        })



                        result.post = targetUserPost.length;

                        const post_details_has_state = _.map(targetUserPost,function(e){

                            const retune =  e.post_details;

                            if(retune.hasOwnProperty("state")) {
                                return retune;
                            }

                        }).filter(Boolean);


                        result.approved = _.filter(post_details_has_state,{state : "1"}).length;

                        result.unapproved = _.filter(post_details_has_state,{state : "-1"}).length;

                        result.respond = _.filter(post_details_has_state,{state : "2"}).length

                        const _from = _.orderBy(targetUserPost,"id");

                        const totalLength = numeral(overAll.length)._value * 100;

                        const targetTotal = (_.sumBy(overAll) / totalLength);

                        const state_template = jQuery("#states").html().setTokens({

                            block : 0,
                            post : result.post,
                            approved : result.approved,
                            unapproved : result.unapproved,
                            respond : result.respond,
                            percent : numeral(targetTotal).format("%"),
                            get from() {

                                const last = _.last(_from);

                                if(last.hasOwnProperty("PDT")) {

                                    return "<small> Data from " + (moment(last.PDT).format("MMMM, D YYYY")) + "</small>";

                                }

                               return "No loaded data";

                            }

                        });

                        jQuery("state").html(state_template);



                        jQuery("#sparkline1").sparkline(overAll, {
                            type: 'line',
                            width: '100%',
                            height: '50',
                            lineColor: '#1ab394',
                            fillColor: "transparent"
                        });


                    }catch(eerr) {

                        console.log(eerr);

                    }



                })

                jQuery.post("/SCOA/public/scoa_account/feedsState/byType"+window.scoaUserId,function(response){

                    console.log(response);

                })


                $("#edit_about").click(function(){

                    alert("Success");

                })

            })

        })();




    </script>

{/literal}


{/block}








<script>


    {block inner_script append}


    {literal}


    //initialize post_box action


    try{

        let scoa = jQuery.scoa;

        scoa.feed._call("feeds:last-of-type","/SCOA/public/scoa_feeds/viewAllFeeds/"+window.scoaUserId);


    }catch(err)
    {

        console.log(err);
        swal("Reloading...", "authentication request failed please wait while reprocessing your request", "error");


    }






    {/literal}

    {/block}

</script>

