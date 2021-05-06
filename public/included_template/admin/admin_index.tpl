{block body}


    <div class="wrapper wrapper-content">




        <div class="row">

            <div class="col-lg-3">
                <div class="widget style1 navy-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">

                            {if $userCount > 300}

                                <span> Active Users </span>

                                <h2 class="font-bold">{$activeUsersCount}</h2>

                            {else}


                                <span> Users </span>

                                <h2 class="font-bold">{$activeUsersCount}/{$userCount}</h2>


                            {/if}

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-3">
                <div class="widget style1 lazur-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-envelope-o fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span>Request/Messages </span>

                            <h2 class="font-bold">{$requestCount}</h2>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="widget bg-light-blue">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-pencil-square-o fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> New posts </span>

                            {if $unread_post < 1000}

                                <h2 class="font-bold">{$unread_post}</h2>

                            {else}

                                <h3 class="font-bold">{$unread_post}</h3>

                            {/if}


                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-3">
                <div class="widget style1 yellow-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Org/Department </span>
                            <h2 class="font-bold">12</h2>
                        </div>
                    </div>
                </div>
            </div>


        </div>


        <div class="p-w-md m-t-sm">

            <br>
            <br>

            <div class="row">


                <div class="col-sm-8">
                    <div id="chartActivity" style="height: 270px; max-width: 100%; margin: 0px auto;"></div>
                </div>

               <div class="col-sm-4">
                    <h1 class="m-b-xs">
                        <span id="totalOfType">0</span>
                    </h1>
                    <small>
                        <span id="lastOfType">No data to loaded</span>
                    </small>

                    <div id="sparkline2" class="m-b-sm"></div>

                    <div class="row">
                        <div class="col-xs-6">
                            <small class="stats-label">Largest</small>
                            <br>
                            <small id="largestOfType">0%</small>
                        </div>
                        <div class="col-xs-6">
                            <small class="stats-label">Smallest</small>
                            <br>
                            <small id="smallestOfType">0%</small>
                        </div>

                    </div>


               </div>

            </div>




        </div>

        <div class="p-w-md m-t-sm">

            <div class="col-lg-3 no-padding">

                    <div class="ibox float-e-margins">
                        <div class="ibox-content mailbox-content">

                            <h1 class="scoa-small-brand-name fa-big">SCOA</h1>

                            <div class="file-manager">

                                <div class="space-25"></div>

                                <ul class="category-list" style="padding: 0">

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

            <div class="col-lg-9 no-padding">

                <div>

                    <div id="chartContainer" class="m-b-xl" style="height: 370px; max-width: 920px;"></div>

                    <div class="p-xl text-center display-none" id="error-data-gap">

                        <h1 class="scoa-small-brand-name medium-text-size">Error</h1>

                        <h3 class="scoa-small-brand-name medium-text-size font-size-sm-1">Cant load data</h3>

                        <p>A error occured while load the data from a server, contact the developers.</p>

                    </div>


                </div>


            </div>

        </div>

        <div class="row">

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>All Organization Status</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>

                                    <th>Code</th>
                                    <th>Organization/Department name</th>
                                    <th>isUpdated</th>
                                    <th>Checklist</th>
                                    <th>Completed</th>
                                    <th>Percentage</th>

                                </tr>
                                </thead>
                                <tbody>


                                {foreach $orgStatus as $every => $_org}

                                    {assign status $_org.status}


                                    <tr>
                                        <td>{$_org.member_code}</td>
                                        <td><a href="{$public}scoa_organization/feeds/{$_org.RCode}">{$_org.name|truncate:30:"..."}</a></td>
                                        <td>
                                            {if $_org.isUpdated_RCode}
                                                <i class="fa fa-check text-success"></i>
                                            {/if}
                                        </td>
                                        <td>

                                            <div class="file-manager">

                                                <ul class="category-list" style="padding: 0">

                                                    {if in_array("AOP",$status)}

                                                    <li>
                                                        <a href="javascript:void 0" class="inbox-categories" type="AOP">
                                                            <i class="fa fa-check" style="color:#1c84c6"></i>
                                                            Annual Operating Plan
                                                        </a>
                                                    </li>


                                                    {/if}


                                                    {if in_array("MAM",$status)}

                                                    <li>
                                                        <a href="javascript:void 0" class="inbox-categories" type="MAM">
                                                            <i class="fa fa-check" style="color:#1c84c6"></i>
                                                            Minutes from the Activity's
                                                        </a>
                                                    </li>


                                                    {/if}


                                                    {if in_array("CBL",$status)}

                                                    <li>
                                                        <a href="javascript:void 0" class="inbox-categories" type="CBL">
                                                            <i class="fa fa-check" style="color:#1c84c6"></i> CBL
                                                        </a>
                                                    </li>


                                                    {/if}


                                                    {if in_array("FS",$status)}

                                                    <li>
                                                        <a href="javascript:void 0" class="inbox-categories" type="FS">
                                                            <i class="fa fa-check" style="color:#1c84c6"></i>
                                                            Financial Statements
                                                        </a>
                                                    </li>


                                                    {/if}



                                                    {if in_array("DE",$status)}

                                                    <li>
                                                        <a href="javascript:void 0" class="inbox-categories" type="DE">
                                                            <i class="fa fa-check" style="color:#1c84c6"></i>
                                                            Documentary Evidence
                                                        </a>
                                                    </li>


                                                    {/if}







                                                    {* Un checked checklist  *}







                                                    {if not in_array("AOP",$status)}

                                                        <li>
                                                            <a href="javascript:void 0" class="inbox-categories" type="AOP">
                                                                <i class="fa fa-times text-muted" style="color: #e0e1e2;" ></i>
                                                                Annual Operating Plan
                                                            </a>
                                                        </li>


                                                    {/if}


                                                    {if not in_array("MAM",$status)}

                                                        <li>
                                                            <a href="javascript:void 0" class="inbox-categories" type="MAM">
                                                                <i class="fa fa-times text-muted" style="color: #e0e1e2;" ></i>
                                                                Minutes from the Activity's
                                                            </a>
                                                        </li>


                                                    {/if}


                                                    {if not in_array("CBL",$status)}

                                                        <li>
                                                            <a href="javascript:void 0" class="inbox-categories" type="CBL">
                                                                <i class="fa fa-times text-muted" style="color: #e0e1e2;" ></i>
                                                                CBL
                                                            </a>
                                                        </li>


                                                    {/if}


                                                    {if not in_array("FS",$status)}

                                                        <li>
                                                            <a href="javascript:void 0" class="inbox-categories" type="FS">
                                                                <i class="fa fa-times text-muted" style="color: #e0e1e2;" ></i>
                                                                Financial Statements
                                                            </a>
                                                        </li>


                                                    {/if}



                                                    {if not in_array("DE",$status)}

                                                        <li>
                                                            <a href="javascript:void 0" class="inbox-categories" type="DE">
                                                                <i class="fa fa-times text-muted" style="color: #e0e1e2;" ></i>
                                                                Documentary Evidence
                                                            </a>
                                                        </li>


                                                    {/if}










                                                </ul>



                                                <div class="clearfix"></div>

                                            </div>

                                        </td>

                                        <td><span class="pie">{$_org.statusPercentage},100</span></td>
                                        <td>{$_org.statusPercentage}%</td>


                                    </tr>


                                {/foreach}



                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>



    </div>





{/block}



{block script append}

    <script src="{$js}plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="{$js}plugins/peity/jquery.peity.min.js"></script>
    <script src="{$js}plugins/breeze/lodash.js?pin={$pin}" crossorigin="anonymous"></script>
    <script src="{$js}scoa/scoa-graph.js?{$pin}"></script>
    <script src="{$js}moment/moment.js?{$pin}"></script>


    <script>

        window.scoa_checklist = `{$checklist_data}`;


        {literal}

        (function(__){

            __(document).ready(function () {


                const pie_chart = function(obj) {

                    return new CanvasJS.Chart(obj.element, {
                        title: {
                            text: obj.title,
                        },
                        animationEnabled: true,
                        backgroundColor: "transparent",
                        data: [{
                            type: "pie",
                            percentFormatString : "#0.##",
                            toolTipContent: obj["tooltip"] || "{name}: <strong>(#percent%)</strong>",
                            indexLabel: "{name} - (#percent%)",
                            dataPoints: obj.datapoints
                        }]
                    }).render();

                };


                $("span.pie").peity("pie", {
                    fill: ['#1ab394', '#d7d7d7', '#ffffff']
                })


                const date = function(data) {

                    return moment(new Date(data)).format("MM/DD/YY");

                }

                /** main graph **/

                $.post("/SCOA/public/scoa_admin/getData",function(response) {


                   try {


                       var parsingData = {

                           lastOfType : function() {

                               if(!this.parse.length > 0) return;

                               const checklist = this.checklist;

                               const sort = _.sortBy(checklist,"id_checklist","desc");

                               const target = sort[0];

                               const _from = moment(target.date_time).format("MMMM DD YYYY");

                               const _to = moment(target.deadline).format("MMMM DD YYYY");

                               const expenses = this.sortData[0].defineExpenses;

                               const total = _.reduce(Object.keys(expenses),function(by,e){

                                   return numeral(by)._value + numeral(expenses[e])._value;

                               });


                               const largest = _.maxBy(Object.keys(expenses),function(e) {

                                   return expenses[e];

                               })


                               const min = _.minBy(Object.keys(expenses),function(e) {

                                   return expenses[e];

                               })



                               $("#lastOfType").html("Data from " + _from +" to " + _to)

                               $("#totalOfType").html(numeral(total).format("0,0"))

                               $("#largestOfType").html(largest +"("+numeral(expenses[largest]).format(",")+")")

                               $("#smallestOfType").html(min +"("+numeral(expenses[min]).format(",")+")")

                           },

                           bayTypeList : function() {


                               if(!this.parse.length > 0) return;

                               const currentExpenses = this.sortData[0].defineExpenses;

                               const params = _.map(currentExpenses,function (e,index) {

                                   return {name : index, y : e, exploded : true}

                               });


                               pie_chart({

                                   element : "chartActivity",
                                   title : "",
                                   datapoints : params

                               })



                           },

                           byCollectionChart : function() {

                               const order = this.sortData;

                               var chart = new CanvasJS.Chart("chartContainer", {
                                   backgroundColor: "transparent",
                                   animationEnabled: true,
                                   theme: "light2",
                                   gridThickness : 0,
                                   axisX: {
                                       valueFormatString: "MMM"
                                   },
                                   axisY:{
                                       gridThickness: 0,
                                       tickLength: 0,
                                       lineThickness: 0,
                                       labelFormatter: function(){
                                           return " ";
                                       }
                                   },

                                   toolTip: {
                                       shared: true
                                   },

                                   data: [
                                       {
                                           type: "column",
                                           name: "Cash Received",
                                           showInLegend: true,
                                           xValueFormatString: "MMMM YYYY",
                                           yValueFormatString: "#,##0",
                                           dataPoints: _.map(order,e => e.received)
                                       },
                                       {
                                           type: "line",
                                           name: "Expenses",
                                           showInLegend: true,
                                           yValueFormatString: "#,##0",
                                           dataPoints: _.map(order,e => e.expenses)
                                       },
                                       {
                                           type: "area",
                                           name: "Final Budget",
                                           markerBorderColor: "white",
                                           markerBorderThickness: 2,
                                           showInLegend: true,
                                           yValueFormatString: "#,##0",
                                           dataPoints: _.map(order,e => e.budget)
                                       }]
                               }).render();

                               return this;

                           },

                           get sortData() {

                              return _.orderBy(this.parse,"index","desc");

                           },


                           get response () {

                               return JSON.parse(response);

                           },


                           get checklist() {

                              return JSON.parse(window.scoa_checklist);

                           },


                           get checklistDetails() {

                               return _.groupBy(this.response,"checklist_id");

                           },


                           get groupedByChecklist() {

                               return _.groupBy(this.checklist,"id_checklist")

                           },


                           get parse() {


                               const checklist = this.checklist;

                               const data = this.response;

                               /** group by checklist id **/

                               var checklistById =this.groupedByChecklist;

                               var details = this.checklistDetails;


                                return _.map(details,function(data,index) {

                                   var expenseTemp = {};

                                   const format = Object.keys(data).map(function(cells,index) {

                                       const fs = scoa_graph;
                                       fs.data = data[cells];
                                       fs.loadData();

                                       _.forEach(fs.definedAllExpenses(),function(e,index) {

                                           if(expenseTemp.hasOwnProperty(index)) {

                                               expenseTemp[index].total +=  e.total || 0;
                                               return;

                                           }

                                           expenseTemp[index] = e.total || 0;

                                       })



                                       return {
                                           balance : fs.balance || {},
                                           received : fs.total_cash_received || {},
                                           expenses: fs.totalOfExpenses,
                                           definedExpenses : expenseTemp
                                       }

                                   });


                                   const checklist_details = checklistById[index];

                                   var gap = date(checklist_details[0]["date_time"]) +" - " + date(checklist_details[0]["deadline"]);


                                   const TotalBudget = _.sumBy(format,e => Math.abs(e.balance.value || 0));
                                   const TotalReceived = _.sumBy(format,e => Math.abs(e.received.value || 0));
                                   const TotalExpenses = _.sumBy(format,e => Math.abs(e.expenses || 0));

                                   var newExpenseTemp = {};

                                   _.forEach(expenseTemp,function (e,index) {

                                       if(newExpenseTemp.hasOwnProperty(index)) {

                                           newExpenseTemp[index] += e  || 0;
                                           return;

                                       }

                                       newExpenseTemp[index] = e;

                                   })


                                   return {
                                       index : Number(index),
                                       budget : {label : gap , y : TotalBudget},
                                       received : {label : gap , y : TotalReceived},
                                       expenses : {label : gap , y : TotalExpenses},
                                       defineExpenses : newExpenseTemp
                                   }

                               });


                           },

                           main : function() {

                               this.byCollectionChart()
                               this.bayTypeList();
                               this.lastOfType();

                           }

                       }


                       parsingData.main();




                   }catch(err) {

                       console.log(err);

                   }

                });





            })

        })($)

        {/literal}

    </script>

{/block}