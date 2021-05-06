

(function(){

    const dash = function() {


        var call = {


            format : function(data) {


                const obj = {

                    formatting : function(target) {


                        return _.map(data, function(value) {

                            const key = _.findKey(value);

                            return { label : key , y : (value[key][target]) }

                        });

                    },

                    get cash_flow() {

                        return this.formatting("cash_flow");

                    },

                    get collection_received() {

                        return this.formatting("cash_received");

                    },

                    get totalOf() {

                        return this.formatting("total_cash_received");

                    }

                };

                return obj;

            },




            setUpCharts : function (data) {


                const values = this.format(data);

                const chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    theme: "light2",
                    axisY: {
                        prefix: "P",
                        labelFormatter: addSymbols
                    },
                    toolTip: {
                        shared: true
                    },
                    legend: {
                        cursor: "pointer",
                        itemclick: toggleDataSeries
                    },
                    data: [
                        {
                            type: "column",
                            name: "Expenses",
                            showInLegend: true,
                            yValueFormatString: "P###,###,###",
                            dataPoints: values.totalOf
                        },
                        {
                            type: "line",
                            name: "Cash Collection Received",
                            showInLegend: true,
                            yValueFormatString: "P###,###,###",
                            dataPoints: values.collection_received
                        },
                        {
                            type: "area",
                            name: "Cash flow",
                            markerBorderColor: "white",
                            markerBorderThickness: 2,
                            showInLegend: true,
                            yValueFormatString: "P###,###,###",
                            dataPoints: values.cash_flow
                        }]
                });

                chart.render();


                function addSymbols(e) {

                    var suffixes = ["", "K", "M", "B"];

                    var order = Math.max(Math.floor(Math.log(e.value) / Math.log(1000)), 0);


                    if(order > suffixes.length - 1)

                        order = suffixes.length - 1;


                    var suffix = suffixes[order];

                    return CanvasJS.formatNumber(e.value / Math.pow(1000, order)) + suffix;

                }


                function toggleDataSeries(e) {

                    if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                        e.dataSeries.visible = false;
                    } else {
                        e.dataSeries.visible = true;
                    }
                    e.chart.render();

                }


                jQuery("#gap-data-container").removeClass("sk-loading");

                return this;

            },


            totalOf : function(array,index) {


                const collection = _.map(array, function(value) {

                    const target = value[index],
                        isArray = _.isArray(target);

                    if(isArray) {

                        return _.reduce(target,function (sum,n) {
                            return sum + (numeral(n)._value || 0)
                        },0)

                    }

                    return 0;

                });

                return _.sum(collection);



            },


            _load : function() {


                jQuery("#error-data-gap").toggleClass("display-none");

                jQuery("#chartContainer").toggleClass("display-none");

            },


            sumOf : function(array) {

                const root = this;

               return _.map(array, function(value,key) {


                    let obj = new Object();

                    const currentIndex = _.keys(array).indexOf(key);

                    const prevYear = _.keys(array)[currentIndex - 1 ];

                    const totalValueofPreviousYear = root.totalOf(array[prevYear],"cash_flow_amount");

                    const currentCashReceived = root.totalOf(value,"cash_received_amount");

                    const cash_received = currentCashReceived;

                    const cash_flow = root.totalOf(value,"cash_flow_amount");

                    const total_cash_received = (currentCashReceived + totalValueofPreviousYear) - cash_flow;


                    obj[key] = {
                        cash_received : cash_received,
                        cash_flow : cash_flow,
                        total_cash_received : Math.abs(total_cash_received),
                        value : value,
                        object : array
                    };

                    return obj;


                });




            },


            set : function(data) {

                const root = this;


                try {

                    return root.sumOf(data);

                } catch(err) {

                    root._load();

                    new Error(err);

                }

                return this;

            },

            dateFormat : function(date,options) {

               options = options || { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                var _date  = new Date(date);

                return _date.toLocaleDateString("en-US", options); // Saturday, September 17, 2016


            },


            last_year(data) {


                if(data == true)
                {


                    const TargetYear = _.keys(_.last(data))[0];

                    const valueLastYear = _.last(data)[TargetYear];

                    const format = numeral(valueLastYear.total_cash_received).format("0,0 a");

                    const updatedValue = _.last(valueLastYear.value);

                    const date = new Date(updatedValue.end);

                    const dateString = this.dateFormat(date)


                    jQuery("#last-year-details").html([

                        '<small class="pull-right">',
                        '<i class="fa fa-clock-o"> </i>',
                        `Update last ${dateString}`,
                        '</small>',
                        '<small>',
                        `<strong>Analysis : </strong> The value has been changed over time, and last year reached a level over ${format}.`,
                        '</small>'

                    ].join("\n"));


                    jQuery("#last-year").html([

                        `<small>Average value of collected cash in the past year :</small>`,
                        `<br/>`,
                        `All cash: 162,862`

                    ].join("\n"));

                }



                return this;

            },


            filter : function(response,callback) {

                const
                    data = JSON.parse(response),
                    filter = _.filter(data, callback);


                const
                    orderByDesc = _.orderBy(filter, ['data_startY_from'], ['desc']),
                    groupByYear  = _.groupBy(orderByDesc, "data_startY_from");

               return this.set(groupByYear);

            },


            current(data,unformattedData,prevData) {


                const root = this;

                const filter = function(value,type){

                   const key =   Object.keys(value)[0];

                   return value[key][type];

                }

                const cash_received = _.sumBy(data, o => filter(o,"cash_received"));
                const budget = _.sumBy(data, o => filter(o,"cash_flow"));

                const MinMax = function() {



                    return  {

                      min : _.minBy(unformattedData,value => + new Date(value.approval_date_time) ),
                      max :  _.maxBy(unformattedData,function(value) { return +new Date(value.unapproved_date_time) } ),


                        get from(){


                          return  root.dateFormat(new Date(this.min.approval_date_time))


                        },

                        get to(){

                          if(this.max)
                          {

                              const date = root.dateFormat(new Date(this.max.unapproved_date_time));

                              return date;

                          }


                          return;


                        },

                    };


                }

                const _minmax= MinMax();


                const optionsDate = { weekday: 'long', year: 'numeric', month: 'numeric', day: 'numeric' };

                const [from,to] = [
                    root.dateFormat(new Date(_minmax.from), optionsDate) ,
                    root.dateFormat(new Date(_minmax.to), optionsDate)
                ]



                const formatted_cash_received = numeral(cash_received).format("0,0");
                const formatted_budget_received = numeral(budget).format("0,0");

                const prev_key = Object.keys(prevData || []);


                if(!prev_key.length) return;


                const percentage_cash =  Math.floor((cash_received / prevData[prev_key[0]].cash_received) * 100);

                const percentage_budget =  Math.floor((budget / prevData[prev_key[0]].cash_flow) * 100);


               function percentage(value) {



                   if(value <= 40 && value >=30)
                   {



                       return [

                           `<div class="stat-percent font-bold text-warning">${value}%`,
                           `<i class="fa fa-level-up"></i></div>`,
                           `<small>${from} - ${to}</small>`

                       ];

                   }


                   if(value <= 15)
                   {

                       return [

                           `<div class="stat-percent font-bold text-danger">${value}%`,
                           `<i class="fa fa-level-down"></i></div>`,
                           `<small>${from} - ${to}</small>`

                       ].join("\n");

                   }


                   return [

                       `<div class="stat-percent font-bold text-navy">100%`,
                       `<i class="fa fa-bolt"></i></div>`,
                       `<small>${from} - ${to}</small>`

                   ].join("\n");


               }


                jQuery("#cash-recieved-data")
                    .html([

                        `<h1 class="no-margins">${formatted_cash_received}</h1>`,
                        percentage(percentage_cash)

                    ].join("\n"));



                jQuery("#budget-data")
                    .html([
                        `<h1 class="no-margins">${formatted_budget_received}</h1>`,
                        percentage(percentage_budget)

                    ].join("\n"));



            },


            main : function (){

                const root = this;

                jQuery.post("scoa_admin/getData",function(response) {

                    const pastTotal = root
                        .filter(response,function(o) { return !numeral(o.isCurrent)._value; });

                    const currentTotal = root
                        .filter(response,function(o) { return numeral(o.isCurrent)._value; });

                    var prev_last_data = [];


                    if(!pastTotal.length){

                        root._load()

                        return;

                    }


                    const last_year = root.last_year(pastTotal);

                    prev_last_data = _.last(pastTotal);

                    root.setUpCharts(pastTotal);


                    root.current(currentTotal,JSON.parse(response),prev_last_data);


                });

            }



        }


        call.main();

    }


    window.onload = dash;


})();