<?php
/* Smarty version 3.1.33, created on 2019-04-17 13:21:03
  from 'C:\wamp64\www\SCOA\public\included_template\admin\admin_index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb6b7bf37ddc5_31092040',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a32d0d99ad8b15fa35838d1d73f4e6b08476670d' => 
    array (
      0 => 'C:\\wamp64\\www\\SCOA\\public\\included_template\\admin\\admin_index.tpl',
      1 => 1554632061,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb6b7bf37ddc5_31092040 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4433626995cb6b7bf189328_95518486', 'body');
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16607494075cb6b7bf362054_50441508', 'script');
}
/* {block 'body'} */
class Block_4433626995cb6b7bf189328_95518486 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_4433626995cb6b7bf189328_95518486',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\SCOA\\app\\core\\Smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>



    <div class="wrapper wrapper-content">




        <div class="row">

            <div class="col-lg-3">
                <div class="widget style1 navy-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">

                            <?php if ($_smarty_tpl->tpl_vars['userCount']->value > 300) {?>

                                <span> Active Users </span>

                                <h2 class="font-bold"><?php echo $_smarty_tpl->tpl_vars['activeUsersCount']->value;?>
</h2>

                            <?php } else { ?>


                                <span> Users </span>

                                <h2 class="font-bold"><?php echo $_smarty_tpl->tpl_vars['activeUsersCount']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['userCount']->value;?>
</h2>


                            <?php }?>

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

                            <h2 class="font-bold"><?php echo $_smarty_tpl->tpl_vars['requestCount']->value;?>
</h2>

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

                            <?php if ($_smarty_tpl->tpl_vars['unread_post']->value < 1000) {?>

                                <h2 class="font-bold"><?php echo $_smarty_tpl->tpl_vars['unread_post']->value;?>
</h2>

                            <?php } else { ?>

                                <h3 class="font-bold"><?php echo $_smarty_tpl->tpl_vars['unread_post']->value;?>
</h3>

                            <?php }?>


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


                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orgStatus']->value, '_org', false, 'every');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['every']->value => $_smarty_tpl->tpl_vars['_org']->value) {
?>

                                    <?php $_smarty_tpl->_assignInScope('status', $_smarty_tpl->tpl_vars['_org']->value['status']);?>


                                    <tr>
                                        <td><?php echo $_smarty_tpl->tpl_vars['_org']->value['member_code'];?>
</td>
                                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
scoa_organization/feeds/<?php echo $_smarty_tpl->tpl_vars['_org']->value['RCode'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['_org']->value['name'],30,"...");?>
</a></td>
                                        <td>
                                            <?php if ($_smarty_tpl->tpl_vars['_org']->value['isUpdated_RCode']) {?>
                                                <i class="fa fa-check text-success"></i>
                                            <?php }?>
                                        </td>
                                        <td>

                                            <div class="file-manager">

                                                <ul class="category-list" style="padding: 0">

                                                    <?php if (in_array("AOP",$_smarty_tpl->tpl_vars['status']->value)) {?>

                                                    <li>
                                                        <a href="javascript:void 0" class="inbox-categories" type="AOP">
                                                            <i class="fa fa-check" style="color:#1c84c6"></i>
                                                            Annual Operating Plan
                                                        </a>
                                                    </li>


                                                    <?php }?>


                                                    <?php if (in_array("MAM",$_smarty_tpl->tpl_vars['status']->value)) {?>

                                                    <li>
                                                        <a href="javascript:void 0" class="inbox-categories" type="MAM">
                                                            <i class="fa fa-check" style="color:#1c84c6"></i>
                                                            Minutes from the Activity's
                                                        </a>
                                                    </li>


                                                    <?php }?>


                                                    <?php if (in_array("CBL",$_smarty_tpl->tpl_vars['status']->value)) {?>

                                                    <li>
                                                        <a href="javascript:void 0" class="inbox-categories" type="CBL">
                                                            <i class="fa fa-check" style="color:#1c84c6"></i> CBL
                                                        </a>
                                                    </li>


                                                    <?php }?>


                                                    <?php if (in_array("FS",$_smarty_tpl->tpl_vars['status']->value)) {?>

                                                    <li>
                                                        <a href="javascript:void 0" class="inbox-categories" type="FS">
                                                            <i class="fa fa-check" style="color:#1c84c6"></i>
                                                            Financial Statements
                                                        </a>
                                                    </li>


                                                    <?php }?>



                                                    <?php if (in_array("DE",$_smarty_tpl->tpl_vars['status']->value)) {?>

                                                    <li>
                                                        <a href="javascript:void 0" class="inbox-categories" type="DE">
                                                            <i class="fa fa-check" style="color:#1c84c6"></i>
                                                            Documentary Evidence
                                                        </a>
                                                    </li>


                                                    <?php }?>







                                                    






                                                    <?php if (!in_array("AOP",$_smarty_tpl->tpl_vars['status']->value)) {?>

                                                        <li>
                                                            <a href="javascript:void 0" class="inbox-categories" type="AOP">
                                                                <i class="fa fa-times text-muted" style="color: #e0e1e2;" ></i>
                                                                Annual Operating Plan
                                                            </a>
                                                        </li>


                                                    <?php }?>


                                                    <?php if (!in_array("MAM",$_smarty_tpl->tpl_vars['status']->value)) {?>

                                                        <li>
                                                            <a href="javascript:void 0" class="inbox-categories" type="MAM">
                                                                <i class="fa fa-times text-muted" style="color: #e0e1e2;" ></i>
                                                                Minutes from the Activity's
                                                            </a>
                                                        </li>


                                                    <?php }?>


                                                    <?php if (!in_array("CBL",$_smarty_tpl->tpl_vars['status']->value)) {?>

                                                        <li>
                                                            <a href="javascript:void 0" class="inbox-categories" type="CBL">
                                                                <i class="fa fa-times text-muted" style="color: #e0e1e2;" ></i>
                                                                CBL
                                                            </a>
                                                        </li>


                                                    <?php }?>


                                                    <?php if (!in_array("FS",$_smarty_tpl->tpl_vars['status']->value)) {?>

                                                        <li>
                                                            <a href="javascript:void 0" class="inbox-categories" type="FS">
                                                                <i class="fa fa-times text-muted" style="color: #e0e1e2;" ></i>
                                                                Financial Statements
                                                            </a>
                                                        </li>


                                                    <?php }?>



                                                    <?php if (!in_array("DE",$_smarty_tpl->tpl_vars['status']->value)) {?>

                                                        <li>
                                                            <a href="javascript:void 0" class="inbox-categories" type="DE">
                                                                <i class="fa fa-times text-muted" style="color: #e0e1e2;" ></i>
                                                                Documentary Evidence
                                                            </a>
                                                        </li>


                                                    <?php }?>










                                                </ul>



                                                <div class="clearfix"></div>

                                            </div>

                                        </td>

                                        <td><span class="pie"><?php echo $_smarty_tpl->tpl_vars['_org']->value['statusPercentage'];?>
,100</span></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['_org']->value['statusPercentage'];?>
%</td>


                                    </tr>


                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>



    </div>





<?php
}
}
/* {/block 'body'} */
/* {block 'script'} */
class Block_16607494075cb6b7bf362054_50441508 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_16607494075cb6b7bf362054_50441508',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/sparkline/jquery.sparkline.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/peity/jquery.peity.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
plugins/breeze/lodash.js?pin=<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
scoa/scoa-graph.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
moment/moment.js?<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
"><?php echo '</script'; ?>
>


    <?php echo '<script'; ?>
>

        window.scoa_checklist = `<?php echo $_smarty_tpl->tpl_vars['checklist_data']->value;?>
`;


        

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

        

    <?php echo '</script'; ?>
>

<?php
}
}
/* {/block 'script'} */
}
