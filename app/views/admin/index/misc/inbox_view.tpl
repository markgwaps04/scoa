

{include "`$root`public\included_template\global_functions.tpl" scope="parent"}


{$pin = mt_rand(0,1000)}





{function state}


    {if $info.submissionState eq 1}

        <span class="label label-primary ">Approved</span>

    {elseif $info.submissionState eq 0 and not $info.post_details.hasApprovedEntry }


        <span class="label label-warning">Pending</span>

    {elseif $info.post_details.hasApprovedEntry}

        <span class="label label-success m-l-xs">Entry</span>

    {else}

        <span class="label label-danger">Unapproved</span>

    {/if}



{/function}








{* @param $info  *}

{function footer}


    {if $info.post_details.hasApprovedEntry  }

        <div class="mail-body font-bold">

            <i class="fa fa-warning text-danger"></i>
            &nbsp;
            <a>Has duplicate entry</a>

        </div>

    {/if}



    <div class="mail-body tooltip-demo no-padding" id="comment-section">

        <div class="ibox-content no-padding">

            <div class="sk-spinner sk-spinner-three-bounce">
                <div class="sk-bounce1"></div>
                <div class="sk-bounce2"></div>
                <div class="sk-bounce3"></div>
            </div>




            {$smarty.capture.comment}





            {if $info.checklist_id eq $checklist_class->getUpdatedID()}



                <div class="form-inline full-width m-t-md">

                    <div class="col-sm-12">

                        <textarea id="inbox-comment-field" name="body" class="scoa-textarea scoa-textarea-min-height" placeholder="Write something..."></textarea>

                    </div>


                    <div class="col-sm-12 p-sm">

                        <div class="form-group pull-right" post_url="{$info.path}">


                            {if $info.submissionState eq 0 and not $info.post_details.hasApprovedEntry }

                                <button type="submit" class="btn btn-sm btn-info checklist-update" method="respond_checklist">
                                    <i class="fa fa-reply"></i> Respond
                                </button>


                                <button type="submit" class="btn btn-sm btn-white checklist-update" method="approved_checklist">
                                    <i class="fa fa-check"></i> Approved
                                </button>

                                <button type="submit" class="btn btn-sm btn-warning checklist-update" method="unapproved_checklist">
                                    <i class="fa fa-times"></i> Decline
                                </button>




                            {/if}





                            {if $info.submissionState eq 1 and ($info.checklist_id eq $checklist_class->getUpdatedID())}



                                <button type="submit" class="btn btn-sm btn-warning checklist-update" method="resubmit_checklist" >
                                    <i class="fa fa-times"></i> Resubmit
                                </button>



                            {/if}





                            {if $info.post_details.hasApprovedEntry or $info.submissionState eq -1}

                                <button type="submit" class="btn btn-sm btn-info checklist-update" method="respond_checklist">
                                    <i class="fa fa-reply"></i> Respond
                                </button>


                            {/if}


                        </div>

                    </div>


                </div>

            {/if}

        </div>


    </div>


    <div class="clearfix"></div>



{/function}

{* end of section *}





{capture comment}

    <div class="no-padding ibox-content sk-loading" style="min-height: 20px">

        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>

        <div id="responds"></div>

    </div>


{/capture}





{capture inbox_close}

    <div class="ibox-tools position-relative bottom-up-md">
        <a class="close-link" id="inbox-close">
            <i class="fa fa-times"></i>
        </a>
    </div>

{/capture}




{function header}



    <div class="mail-box-header">


        {$smarty.capture.inbox_close}


        <div class="pull-right tooltip-demo">

            <button  class="btn btn-white btn-sm" id="download" data-toggle="tooltip" data-placement="top">
                <i class="fa fa-download"></i> Download / View
            </button>

        </div>


        <h2>

            {call checklist_name type=$info.checklistType assign="checklist"}

            {$checklist|truncate:60:"..."}

        </h2>


        <div class="mail-tools tooltip-demo m-t-md">

            <h3>

                <span class="font-normal">Sent from :
                    <a href="javascript:void 0">{$info.org_info.name}</a>
                </span>

            </h3>


            <h5>

                <span class="pull-right font-normal">

                    {$info.PDT|date_format:'h:m:s a d M Y'|upper}

                </span>


                <span class="font-normal">Code: </span>

                {$info.org_info.member_code}



            </h5>


            <h5>

                    <span class="font-normal"> Active :

                        {$info.org_info.approval_date_time|date_format:'d M Y'}
                        -
                        {assign unactive $info.org_info.unapproved_date_time|date_format:'d M Y'}


                        {$unactive|default:"Present"}

                    </span>


            </h5>


            <h5><span class="font-normal">Batch id: </span> {$info.checklist_id}</h5>

            {if not $info.isStaff}

                <h5>
                    <span class="font-normal"> Submit from:  </span>

                    <a href="javascript:void 0">{call user_fullname param=$info withoutTag=true}</a>

                </h5>

            {/if}

            <h5>
                <span class="font-normal"> Status: </span>

                {call state info=$info}


            </h5>



        </div>

    </div>


{/function}














{function FS_type}



    {assign _fs $fs_data->cash_flow($info.r_code)}


    <div class="mail-view">


        {call header info=$info}

        <div class="mail-box">


            <div class="mail-body">


                <div class="row">


                    <div class="col-lg-12 p-sm">

                        <div class="col-lg-4">
                            <div class="widget style1 navy-bg">
                                <div class="row">

                                    <div class="col-xs-3">
                                        <i class="fa fa-rouble fa-3x"></i>
                                    </div>

                                    <div class="col-xs-9 text-right">
                                        <span>
                                           Cash Collected
                                        </span>
                                        <h2 class="font-bold total-collected">
                                            <i class="small text-white fa fa-spinner fa-spin"></i>
                                        </h2>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="widget style1 yellow-bg">
                                <div class="row">
                                    <div class="col-xs-3" id="percentage">
                                        <i class="fa fa-rouble fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <span> Final Balance </span>
                                        <h2 class="font-bold total-balance"><i class="small text-white fa fa-spinner fa-spin"></i></h2>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="widget style1 lazur-bg">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-rouble fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <span> Total Expenses </span>
                                        <h2 class="font-bold total-expenses"><i class="small text-white fa fa-spinner fa-spin"></i></h2>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                    <div class="col-lg-12 ibox-content bg-transparent no-borders sk-loading parent-content">


                        <div class="col-lg-6">

                            <div id="chartExpenses" style="height: 170px; max-width: 100%; margin: 0px auto;"></div>

                        </div>


                        <div class="col-lg-6">

                            <div id="chartActivity" style="height: 170px; max-width: 100%; margin: 0px auto;"></div>

                        </div>


                        <div class="col-lg-6">



                            <div class="ibox">

                                <div class="ibox-title no-borders">

                                    <a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown" class="pull-right">View All</a>

                                </div>

                                <div class="ibox-content" id="misc_data_received">

                                    <h5>Total Cash Received (Contains misc. data)</h5>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="ibox">

                                <div class="ibox-title no-borders"></div>

                                <div class="ibox-content notice-table">

                                    <h5>Notice</h5>

                                    {*<table class="table table-stripped small m-t-md">*}

                                    {*<tbody>*}
                                    {**}
                                    {*<tr>*}
                                    {*<td class="no-borders">*}
                                    {*<i class="fa fa-circle text-danger"></i>*}
                                    {*</td>*}

                                    {*<td class="no-borders">*}

                                    {*Contains Un numbered and Invalid Receipt*}

                                    {*</td>*}
                                    {*</tr>*}



                                    {*<tr>*}
                                    {*<td class="no-borders">*}
                                    {*<i class="fa fa-circle text-danger"></i>*}
                                    {*</td>*}

                                    {*<td class="no-borders">*}

                                    {*The total amount of collection receipt is greater than the total amount of expenditures*}

                                    {*</td>*}
                                    {*</tr>*}
                                    {**}

                                    {*</tbody>*}



                                    {*</table>*}

                                </div>

                                <div class="ibox-content administration">

                                    <h5>From Previous Administration</h5>

                                    <table class="table table-stripped small m-t-md">

                                        {*<tbody>*}


                                        {*<tr>*}

                                        {*<td class="no-borders">*}
                                        {*<i class="fa fa-circle text-warning"></i>*}
                                        {*</td>*}

                                        {*<td class="no-borders">*}

                                        {*Total Cash Received : 12,000*}

                                        {*</td>*}

                                        {*</tr>*}


                                        {*<tr>*}

                                        {*<td class="no-borders">*}
                                        {*<i class="fa fa-circle text-warning"></i>*}
                                        {*</td>*}

                                        {*<td class="no-borders">*}

                                        {*Cash Collected : 12,000*}

                                        {*</td>*}

                                        {*</tr>*}


                                        {*<tr>*}

                                        {*<td class="no-borders">*}
                                        {*<i class="fa fa-circle text-warning"></i>*}
                                        {*</td>*}

                                        {*<td class="no-borders">*}

                                        {*Remaining Cash  : 12,000*}

                                        {*</td>*}

                                        {*</tr>*}



                                        {*</tbody>*}

                                    </table>

                                </div>

                            </div>

                        </div>


                    </div>





                </div>

                {*{include "`$root`public\included_template\admin\admin_FS_view.tpl" info=$info}*}


            </div>




            {call footer info=$info}




        </div>


    </div>




    <script src="{$js}/plugins/canvasJs/canvasjs.min.js"></script>

    <script src="{$js}/plugins/canvasJs/canvasjs.min.js"></script>

    <script src="{$js}plugins/breeze/lodash.js?pin={$pin}" crossorigin="anonymous"></script>
    <script src="{$js}scoa/scoa-graph.js?{$pin}"></script>

    <script>


        {assign previousOrg $club->getPreviousOrgURL($info.org_info.url)}

        window.scoa_token = "{$info.org_info.url}";
        window.scoa_org_code = "{$info.org_info.member_code}";


        {literal}

        $(document).ready(function () {

            const org = scoa_graph.main(window.scoa_token,window.scoa_org_code);

            org.then(function(info){

                /** widgets  **/

                const markUp = function(obj,element) {

                    if(!obj.isMarkUp) return;

                    const percent = obj.removePercent;

                    const target = element
                        .parents(".widget")
                        .find("#percentage:not(.percentage)")
                        .addClass("percentage");

                    const template = [
                        '<p>{percentage}',
                        '</p>'
                    ].join("");


                    target.append(template.setTokens({
                        percentage : obj.percentage,
                    }));


                };


                const total_collection = info.total_cash_received.formatted_value,
                    balance = info.balance.formatted_value,
                    total_expense = info.total_cash_flows.formatted_value;

                $(".total-collected").html(total_collection);
                $(".total-balance").html(balance);
                $(".total-expenses").html(total_expense);

                markUp(info.balance,$(".total-balance"));


                /** @END Widgets **/



                /** PIE CHARTS **/

                const pie_chart = function(obj) {

                    return new CanvasJS.Chart(obj.element, {
                        title: {
                            text: obj.title,
                        },
                        animationEnabled: true,
                        data: [{
                            type: "pie",
                            percentFormatString : "#0.##",
                            toolTipContent: obj["tooltip"] || "{name}: <strong>(#percent%)</strong>",
                            indexLabel: "{name} - (#percent%)",
                            dataPoints: obj.datapoints
                        }]
                    }).render();

                };


                var expenses = info.definedAllExpenses();

                var activity = info.activity;

                activity = Object
                    .keys(activity)
                    .map(function(e) {

                        const formatAsInfo = function() {

                            const description = activity[e],
                                types = description.types;

                            return Object
                                .keys(types)
                                .map(function(byType) {

                                    const typeDescrip = types[byType],
                                        template = "{key} : <strong>{total}</strong>";

                                    return template.setTokens({

                                        key : byType,
                                        total : typeDescrip.percentage

                                    });

                                }).join("<br>");

                        };

                        return {
                            y : numeral(activity[e].amount)._value,
                            name : e,
                            exploded : activity[e].isMax,
                            template : formatAsInfo()
                        }

                    });

                expenses = Object
                    .keys(expenses)
                    .map(function(e) {

                        const formatAsInfo = function () {

                            const details = info
                                .definedAllExpensesByActivity(e);

                            return Object
                                .keys(details)
                                .map(function(every,index){

                                    const value = details[every],
                                        template = "{key} : <strong>{total}</strong>";

                                    return template.setTokens({

                                        key : every,
                                        total : value["percentage"]

                                    });

                                }).join("<br>");

                        };

                        return {
                            y : numeral(expenses[e].total)._value,
                            name : e,
                            exploded : expenses[e].isMax,
                            template : formatAsInfo()
                        }

                    });


                const expense_format = {

                    title : "Expenses",
                    element : "chartExpenses",
                    datapoints: expenses,
                    tooltip : [
                        '{name}: <strong>(#percent%)</strong>',
                        "<p>{template}</p>"

                    ].join("")

                };


                const activity_format = {

                    title : "Activity's",
                    element : "chartActivity",
                    datapoints: activity,
                    tooltip : [
                        '{name}: <strong>(#percent%)</strong>',
                        "<p>{template}</p>"


                    ].join("")

                };



                pie_chart(expense_format);
                pie_chart(activity_format);


                /** @END Pie Charts **/

                /** misc data **/

                const tableTemplate = function(options) {

                    options = Object.assign({
                        source : [],
                        status : "text-navy",
                        isCustom : false,
                        text : ""
                    },options);


                    var table = [
                        '<table class="table table-stripped small m-t-md">',
                        '<tbody>{body}</tbody>{footer}',
                        '</table>'
                    ].join("");


                    if(!options.isCustom) {

                        table = table.setTokens({footer : [
                                '<tfoot>',
                                '<tr>',
                                !options.isCustom ? '<td>Total:</td>' : "" ,
                                '<td><b class="pull-right">{total}</b></td>',
                                '</tr>',
                                '</tfoot>',
                            ].join("")})
                    }


                    /** Misc Data **/

                    const misc =  options.source,
                        data = misc.data,
                        total = misc.formattedTotal;


                    const body = _.sumBy(data,function(value){

                        var bodyTemplate = [
                            '<tr>',
                            '<td class="no-borders">',
                            '<i class="fa fa-circle {status_color}"></i>',
                            '</td>',
                            '<td class="no-borders">',
                            '{checkCustom}',
                            '</td>',
                            '</tr>'
                        ].join('');



                        bodyTemplate = bodyTemplate.setTokens({
                            checkCustom : options.isCustom
                                ? "{text}"
                                : "{name} : {amount}"
                        });



                        return bodyTemplate.setTokens({
                            name : value.name || "" ,
                            amount : !options.isCustom ? numeral(value.amount).format("0,0") : "",
                            status_color : options.status,
                        })


                    });

                    if(options.isCustom)
                    {
                        return table.setTokens({
                            body : options.text ,
                            total : "",
                            footer : ""
                        })
                    }

                    return table.setTokens({body : body, total : total || ""});

                };

                const tableCashReceived = tableTemplate({
                    source : info.total_cash_received_by_format
                });

                $("#misc_data_received")
                    .not(".loaded")
                    .append(tableCashReceived)
                    .addClass("loaded");


                /** end of misc data **/


                /** notice data **/

                var receipt_body = "" ,
                    receipt = info.collected_receipt || {},
                    receipt_template =  [
                        '<tr>',
                        '<td class="no-borders">',
                        '<i class="fa fa-circle text-danger"></i>',
                        '</td>',
                        '<td class="no-borders">',
                        '{value}',
                        '</td>',
                        '</tr>'
                    ].join('');



                if(receipt.hasInvalid) {

                    receipt_body += receipt_template.setTokens({
                        value : "Contains Un number and Invalid Receipt"
                    });

                }



                if(receipt.isHigherFromReceived) {

                    receipt_body += receipt_template.setTokens({
                        value : "The total amount of collection " +
                        "receipt is greater than from the total amount of expenditures"
                    });

                }


                receipt_body += receipt_template.setTokens({
                    value : "The percentage of data collected " +
                    "and probability of data legit base upon the " +
                    "collection of receipt : " + (receipt.percentageOfEquality || "0% (no data to load)")
                });


                receipt_body = tableTemplate({
                    text : receipt_body,
                    isCustom : true
                });


                $(".notice-table")
                    .not(".loaded")
                    .append(receipt_body)
                    .addClass("loaded");

                /** @ENd of notice data **/


                /** FS Modal **/

                $("body").after('<div id="modal" class="izi-modal"></div>');

                $("#modal").iziModal({

                onOpening: function(modal) {

                    modal.startLoading();

                    $.get('/path/to/file', function(data) {

                        $("#modal .iziModal-content").html(data);

                        modal.stopLoading();
                    });


                }});

                /** @end of FS modal **/

                $(".parent-content").removeClass("sk-loading");

            });


            $("#download")
                .off("click")
                .on("click",function(){


                    window.printing =  $.dialog({
                        icon: 'fa fa-spinner fa-spin',
                        title: 'Setting data!',
                        content: 'processing request',
                        closeIconClass : "hidden",
                        closeIcon : null,
                        buttons : {}
                    });



                    $("body").after([
                        `<iframe onload=" window.printing.close(true);" class="fs_print_container" style="display: none !important;" src='/SCOA/public/Inbox/print_reports/${window.scoa_token}'>`,
                        "</iframe>"
                    ].join("\n"));


                })


            /** previous administration **/




        })

        {/literal}

    </script>


{/function}














{function regular_checklist}


    <div class="mail-view">

        {call header info=$info}



        <div class="mail-box">



            {if $info.submissionBody}

                <div class="mail-body">

                    {$info.submissionBody|trim|htmlspecialchars}

                </div>

            {/if}



            {* file retrieve set options *}

            {assign feeds $info}

            {assign skip true}

            {assign skipLoadFile true}


            {include "`$root`public\included_template\misc\\feeds_contents_plugin.tpl" scope="parent"}


            {* end comment *}


            <div class="mail-attachment">

                {$smarty.capture.file_body}

            </div>



            {call footer info=$info}


        </div>

    </div>


{/function}






{function request}


    {assign info $inbox_data[0]}


    {if $info.feedsType eq "E"}


        {if $info.checklistType eq "FS" and  (not $info.isMemberState)}


            {call FS_type info=$info}


        {else}


            {call regular_checklist info=$info}


        {/if}



    {/if}





{/function}









{function no_result}


    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3>Unable to load Attachment</h3>
        </div>
        <div class="panel-body">

            <p>
            <h2>#404 Not Found at request uknown</h2>
            </p>

            <p>
                If you think this is a mistake contact the <a>developers</a>
            </p>
        </div>
        <div class="panel-footer">
            SCOA-2019
        </div>
    </div>


{/function}





{* Main *}


{capture display}

    {if $inbox_data|count }

        {call request }

    {else}

        {call no_result }

    {/if}

{/capture}














{* structure section *}



<link href="{$css}plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">

<link href="{$css}plugins/iziModal/iziModal.css?{$pin}" rel="stylesheet">

<div class="ibox-content no-padding bg-transparent no-borders" id="inbox-spinner">

    <div class="sk-spinner sk-spinner-three-bounce">
        <div class="sk-bounce1"></div>
        <div class="sk-bounce2"></div>
        <div class="sk-bounce3"></div>
    </div>


    {$smarty.capture.display}

</div>




<script src="{$js}plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

{* css of ckin is init on main structure *}

<script src="{$js}ckin.min.js?{$pin}" type="text/javascript"></script>

<script src="{$js}plugins/iziModal/iziModal.js?{$pin}" crossorigin="anonymous"></script>


<script>

    {* initialize main js for video rendering plugin *}

    jQuery._scoa();

    jQuery.scoa.images.load();

    {* render video login first *}

    scoa_video_init();


</script>


{* end of structure section *}