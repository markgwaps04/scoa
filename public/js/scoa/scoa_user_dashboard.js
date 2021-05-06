
(function(){

    window.dash = function(url,member_code) {

        const pathRoot = "/SCOA/public/";
        const currentURL = location.href;
        const currentPage = function() {

            let loc = currentURL.split("/");
            loc = _.remove(loc,Boolean);
            const index  = _.indexOf(loc,"public");
            const next = loc[index+1];

            if(!next) throw new Error("INVALID URL");

            return next;

        };


        const call = {

            info_template : null,
            data : null,

            get lineChart() {

                return {

                    labels : [],
                    budget : [],
                    received : [],
                    expenses : [],
                    options : new Object(),

                    get dataSets() {

                        return   [{

                            label: "Final budget",
                            backgroundColor: "rgba(26,179,148,0.5)",
                            borderColor: "rgba(26,179,148,0.7)",
                            pointBackgroundColor: "rgba(26,179,148,1)",
                            pointBorderColor: "#fff",
                            data: this.budget

                        }, {
                            label: "Cash Received",
                            backgroundColor: "rgba(220,220,220,0.5)",
                            borderColor: "rgba(220,220,220,1)",
                            pointBackgroundColor: "rgba(220,220,220,1)",
                            pointBorderColor: "#fff",
                            data: this.received
                        }, {
                            label: "Expenses",
                            backgroundColor: "#0099ff",
                            borderColor: "#0099ff",
                            pointBackgroundColor: "#014c7d",
                            pointBorderColor: "#fff",
                            data: this.expenses
                        }]

                    },

                    event : function(chart,element) {

                        const actionTrigger = function(evt,callBack) {

                            const activePoint = chart.getElementAtEvent(evt);

                            if(activePoint.length > 0) {

                                const ElementIndex = activePoint[0]._index;
                                const label = chart.data.labels[ElementIndex];

                                callBack(label);
                            }

                        };

                        element.onmousemove = function(evt) {

                            actionTrigger(evt,e =>  jQuery(element).trigger("pointHover",e));

                        };


                        element.onclick = function(evt) {

                            actionTrigger(evt,e =>  jQuery(element).trigger("pointClicked",e));

                        };


                    },

                    reset : function(element) {

                        const target = jQuery(element),
                            parent = target.parent();

                        parent
                            .html("")
                            .append('<canvas id="lineChart" height="70"></canvas>');


                        return document.querySelector("#lineChart");

                    },

                    main : function(element,callBack) {

                        if(!window.hasOwnProperty("Chart"))

                            throw new Error("Chart.min.js is not exist");

                        element = document.querySelector(element);

                        element = this.reset(element);

                        const isNode = element && element.nodeType === Node.ELEMENT_NODE;

                        if(!isNode)

                            throw new Error("Target element is undefined " +
                                "or not a valid node element");


                        const options = Object.assign({

                            responsive: true

                        },this.options);


                        const lineData = {

                            labels : this.labels,
                            datasets : this.dataSets

                        };


                        const ctx = element.getContext("2d");

                        const chart =  new Chart(ctx, {
                            type: 'line',
                            data: lineData,
                            options:options
                        });

                        this.event(chart,element);
                        return chart;

                    }

                };

            },

            groupAndFilter : function(data) {

                const stat = scoa_graph;
                stat.data = data;
                stat.loadData();

                return stat;

            },

            state : function(target) {

                switch (target) {

                    case "yearly" :

                        jQuery(`button#yearly`).addClass("active");
                        jQuery("button#semestral").removeClass("active");

                        break;

                    case "semestral" :

                        jQuery(`button#yearly`).removeClass("active");
                        jQuery("button#semestral").addClass("active");

                        break;

                }



            },

            getPartialInfo : function(obj) {

                let template = [
                    '<li>',
                    '<h2 class="no-margins">{value}</h2>',
                    '<small>{title}</small>',
                    '<div class="stat-percent">{percentage}<i class="fa {icon} text-navy"></i></div>',
                    '<div class="progress progress-mini">',
                    '<div style="width: {percentage};" class="progress-bar"></div>',
                    '</div>',
                    '</li>'
                ].join("\n");


                template = template.setTokens({
                    value : obj.value,
                    title : obj.title,
                    percentage : obj.percentage,
                    icon : obj.icon
                });


                return template;

            },

            setPartialInfo : function(data) {

                const root = this;

                const format = this.groupAndFormat(data);

                const current = format.info.current || {};
                const prev = format.info.prev || {};

                const getTemplate = function(targetData,property,title) {

                    return root.getPartialInfo({
                        value : numeral(targetData[property] || 0).format("0,0"),
                        title : title,
                        get percentage () {

                            if(!scoa.hasOwnProperty(targetData,"percentage",property,"ByAll"))

                                return 0;

                           return targetData.percentage[property]["ByAll"];

                        },
                        get icon() {
                            const percent = numeral(this.percentage || 0)._value;
                            if(percent > 0.49 ) return "fa-level-up";
                            if(percent < 0.49 && percent >= 0.20 ) return "fa-bolt";
                            return "fa-level-down";
                        }
                    });

                };


                let cash_collected = getTemplate(current,"received","Current Cash Collected");
                let current_balance = getTemplate(current,"balance","Final balance last batch");
                let prev_balance = getTemplate(prev,"balance","Current Balance");

                document.querySelector("#stat-list").innerHTML = [
                    current_balance,
                    prev_balance,
                    cash_collected
                ].join("\n");

                return this;

            },

            setInfo : function(obj) {

                const group_stat = jQuery("#group_statistics");
                group_stat.html("");

                let group_stat_template = jQuery("#group_statistics_template").html();

                const format = function(value) {
                    return numeral(value).format("0,0")
                };


                group_stat_template = group_stat_template.setTokens({
                    collected_cash : format(obj.collected),
                    balance : format(obj.balance),
                    expenses : format(obj.expenses),
                    batch : obj.batch
                });


                group_stat.html(group_stat_template);


            },

            setMax : function(data,identifier) {

                const max = _.maxBy(Object.keys(data),key =>  data[key][identifier]);

                if(!max) return data;

                data[max]["isMax"] = true;

                return data;

            },

            percentages : function(data,identifier,addKey) {

                const keys = Object.keys(data);

                /** get total **/

                const total = _.sumBy(keys,function (key) {
                    return numeral(data[key][identifier])._value;
                });

                _.forEach(keys,function (key) {

                    const from  = numeral(data[key][identifier])._value;
                    const percentage = from / total;

                    data[key][addKey] = numeral(percentage).format("%");

                })

                return data;

            },

            pieChart : function(obj) {

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

            },

            error_placement : function(obj) {

                const template = [

                    '<div class="alert alert-warning alert-dismissable animated fadeIn"' +
                    ' style="background-color: #fdfdfde0">',
                    '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>',
                    '<i class="fa fa fa-exclamation-triangle" style="font-size: 15px"></i>&nbsp;',
                    '<a href="" class="alert-link">{title}</a>',
                    '{body}',
                    '</div>'

                ].join("\n");

                const output = template.setTokens(Object.assign({

                    title : "Unspecified Notice",
                    body : ""
                },obj))

                jQuery("error_placement").html(output);

            },

            filterAndDistinct : function(data,identifier,by) {

                const checkandGet = function (value) {

                    if(value.hasOwnProperty(identifier)) {

                        if(value[identifier] === undefined)

                            return {};

                        return value[identifier];

                    }

                    return {};


                }


                /*** check if a key is already defined on a first place **/

                const foundInAFirstPlace = checkandGet(data);

                if(!Object.keys(foundInAFirstPlace)) return foundInAFirstPlace;


                /** find the key **/

                const output = _.reduce(data,function(get,current) {

                    if(!current.hasOwnProperty(identifier)) return;
                    const target = checkandGet(current);

                    Object.keys(target).forEach(function (key) {

                        if(!get.hasOwnProperty(key))

                            get[key] = target[key];

                        else {

                            const currentAmount = target[key][by];
                            const sum = get[key][by] + currentAmount;

                            target[key][by] = numeral(sum)._value;
                            target[key]["isMax"] = false

                            get[key] = target[key];

                        }

                    });

                    return get;

                },{});

                return this.setMax(output,by);

            },

            getActivitys : function(data) {

                return this.filterAndDistinct(data,"AllActivitys","amount");

            },

            getExpenses : function(data) {

                return this.filterAndDistinct(data,"AllExpenses","total");

            },

            getExpensesByActivity : function(data,target) {


                /** filter and remove rendundant id  **/

                data = _.uniqBy(data, function(current) {

                    if(current.hasOwnProperty("get")) {

                        return current.id;

                    }

                });

                data = _.reduce(data,function(get,current) {

                    get = get || {};

                    if(current.hasOwnProperty("get")) {

                        const expenses =  current
                            .get
                            .definedAllExpensesByActivity(target);

                        const keys = Object.keys(expenses);

                        if(keys) {

                            _.forEach(keys,function (value) {

                                if(get.hasOwnProperty(value)) {

                                    const from = get[value]["total"];
                                    const expense = expenses[value]["total"];

                                    const total = numeral(from)
                                        .add(expense)
                                        ._value;

                                    get[value]["total"] = total;
                                    get[value]["percentage"] = "0%";

                                    return;

                                }

                                get[value] = expenses[value];
                                get[value]["percentage"] = "0%";

                                return;

                            })

                        }

                    }

                    return get;

                },{})

                data = this.percentages(data,"total","percentage");

                return data;

            },

            pieExpenses : function(data) {

                const root = this;

                const expenses = this.getExpenses(data);

                const filter = function(e) {

                    const formatAsInfo = function () {

                        const details =  root.getExpensesByActivity(data,e);

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
                    };


                };


                const format =  Object
                    .keys(expenses)
                    .map(filter);


                this.pieChart({
                    title : "Expenses",
                    datapoints : format,
                    element : "expenses",
                    tooltip : [
                        '{name}: <strong>(#percent%)</strong>',
                        "<p>{template}</p>"
                    ].join("")
                });


            },

            pieActivity : function(data) {

                const root = this;

                const AllActivitys = this.getActivitys(data);

                if(!Object.keys(AllActivitys))

                    throw new Error("Pie Activity : no loaded data");


                const filter = function(e) {

                    const formatAsInfo = function() {

                        const description = AllActivitys[e],
                            types = description.types;

                        if(types === undefined || types === null)
                        {

                            root.error_placement({
                                title : "Notice,",
                                body : "the disbursments is not properly setted."
                            });

                            return [];

                        }


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
                        y : numeral(AllActivitys[e].amount)._value,
                        name : e,
                        exploded : AllActivitys[e].isMax,
                        template : formatAsInfo()
                    }

                };


                const format = Object
                    .keys(AllActivitys)
                    .map(filter)
                    .filter(Boolean);


                this.pieChart({
                    title : "Activity's",
                    datapoints : format,
                    element : "activity",
                    tooltip : [
                        '{name}: <strong>(#percent%)</strong>',
                        "<p>{template}</p>"

                    ].join("")
                });

            },

            formatFromGroupedData : function(data) {

                const root = this;

                return _.mapValues(data,function(grouped,index) {

                    const byValues =  _.map(grouped,function(valueOfgrouped) {

                        const stat = root.groupAndFilter(valueOfgrouped);


                        return  {

                            received : stat
                                .total_cash_received
                                .value,

                            balance : stat
                                .balance
                                .value,

                            expense : stat
                                .total_cash_flows
                                .value,

                            AllExpenses : stat
                                .definedAllExpenses(),

                            AllActivitys : stat
                                .activity,

                            from :  valueOfgrouped,

                            get get() {

                                return root.groupAndFilter(this.from);

                            },

                            id : valueOfgrouped.id


                        };



                    });


                    byValues["receivedTotal"] = _.sumBy(byValues,"received");
                    byValues["balanceTotal"] = _.sumBy(byValues,"balance");
                    byValues["expenseTotal"] = _.sumBy(byValues,"expense");
                    byValues["index"] = Number(index) || index;

                    return byValues;

                });

            },

            groupAndFormat : function(data) {

                data = Object.values(data);

                const percentage = function(fullData,targetData,format) {

                    targetData = targetData || {};


                    const percent = function (property,allProperty) {

                        targetData[property] = targetData[property] || 0;

                        return {

                            ByAll : numeral(Math.abs(targetData[property] / format[allProperty])).format("%"),
                            get ByPrev() {

                                let prevs  = _.remove(fullData,e => e.id != targetData.id);

                                if(!prevs.length)   return "0%";

                                prevs = _.orderBy(prevs,function(e) {

                                    if(e.hasOwnProperty("id")) return e.id;

                                    return e[property];

                                },"asc");

                                prevs = _.last(prevs);

                                let total = Math.abs(targetData[property] / prevs[property]);

                                /**
                                 * a "total" variable sometimes return
                                 * infinity if a targetData is less than prevs variable
                                 * @type {string}
                                 * @return {string}
                                 */

                                total = String(total).replace(/\w/gm,"");

                                return numeral(total || 1).format("%");


                            }

                        }

                    };

                    return {

                        balance : percent("balance","balanceTotal"),

                        expenses : percent("expense","expenseTotal"),

                        received : percent("received","receivedTotal")

                    }

                };

                const format =  Object.assign(data,{
                    get balanceTotal() { return _.sumBy(data,e => Math.abs(e.balanceTotal || 0)); },
                    get expenseTotal() { return _.sumBy(data,e => Math.abs(e.expenseTotal || 0)); },
                    get receivedTotal() { return _.sumBy(data,e => Math.abs(e.receivedTotal || 0)); },
                    info : {

                        get parent() { return format.info },

                        get current() {

                            let current = member_code._search(data,true,"member_code");

                            if(scoa.isEmpty(current)) {

                                console.warn("No current value of null");
                                return {strict : true}

                            }

                            let by = _.flatten(_.map(current,e => e.of));
                            by = by.filter(e => e.from.member_code === member_code);


                            if(scoa.isEmpty(by)) {

                                console.warn("Search_r :No current value of null");
                                return {strict : true}

                            }

                            let last = _.last(by);

                            last["percentage"] =  percentage(_.flatten(data),last,format);

                            return last;

                        },
                        get prev() {

                            const root = this;

                            if(!root.current.id) return;

                            let value = _.flatten(data);
                            value = _.remove(value,e => e.id != root.current.id);

                            if(value) {

                                const orders = _.orderBy(value,"id","desc");

                                let last =  _.last(orders) || [];

                                last["percentage"] =  percentage(value,last,format);

                                return last;

                            }

                            console.warn("No previous value");
                            return {strict : true};


                        }

                    }
                });

                return format;


            },

            showInfo : function(data) {

                const targetData = data;

                this.setInfo({
                    collected : targetData.receivedTotal,
                    balance : targetData.balanceTotal,
                    expenses : targetData.expenseTotal,
                    batch : targetData.index
                });

                this.pieActivity(targetData);
                this.pieExpenses(targetData);

            },

            LineGraphData : function(data) {

                const labels = _.map(data,e => e.index);
                let budget = _.map(data,e => e.balanceTotal);
                let received = _.map(data,e => e.receivedTotal);
                let expenses = _.map(data,e => e.expenseTotal);

                budget = _.map(budget,e => numeral(e)._value);
                received = _.map(received,e => numeral(e)._value);
                expenses = _.map(expenses,e => numeral(e)._value);

                const chart = this.lineChart;

                chart.labels = labels;
                chart.budget  = budget;
                chart.received  = received;
                chart.expenses  = expenses;

                return chart.main("#lineChart");

            },

            last : function(data) {

                this.setInfo({
                    collected : data.receivedTotal || 0,
                    balance : data.balanceTotal || 0,
                    expenses : data.expenseTotal || 0,
                    batch : data.index || 0
                });



                this.pieActivity(data)
                this.pieExpenses(data);

            },

            yearly : function(data) {

                const root = this;

                const call =  {

                    onIndex : null,
                    tempIndex : null,

                    get byYearly() {

                        return _.groupBy(data,"data_startY_from");

                    },

                    get parse() {

                        return root.formatFromGroupedData(this.byYearly);

                    },


                    get orders() {
                        return _.orderBy(this.parse,"index","asc");
                    },


                    showInfo : function(label) {

                        return root.showInfo(this.parse[label])

                    },

                    setLineGraphData : function() {

                        return root.LineGraphData(this.orders);

                    },


                    last : function() {

                        const lastIndex = _.last(this.orders);

                        root.last(lastIndex);

                        this.onIndex = lastIndex.index;
                        this.tempIndex = lastIndex.index;

                    },


                    action : function() {

                        const child_root = this;
                        const targetChart = jQuery("#lineChart");

                        targetChart.off("pointHover").on("pointHover",function(evt,label) {

                            if(label === child_root.onIndex) return;

                            child_root.showInfo(label);
                            child_root.tempIndex = label;

                        });


                        targetChart.off("pointClicked").on("pointClicked",function(evt,label) {

                            child_root.showInfo(label);
                            child_root.onIndex = label;
                            child_root.tempIndex = label;

                        })


                    },

                    byDefaultInfo : function() {

                        const child_root = this;

                        jQuery("#lineChart").mouseleave(function () {


                            if(child_root.onIndex == child_root.tempIndex) return;

                            if(!child_root.onIndex) return child_root.last();

                            child_root.showInfo(child_root.onIndex);

                        });

                    },

                    main : function() {

                        const child_root = this;

                        jQuery("button#yearly").click(function() {

                            root.state("yearly");
                            child_root.setLineGraphData();
                            child_root.action();
                            child_root.byDefaultInfo();
                            child_root.last();

                        });

                    }

                };


                call.main();

                return this;

            },

            semestral : function(data) {

                const root = this;

                var call = {

                    onIndex : null,
                    tempIndex : null,

                    get groupedByChecklist() {

                        return _.groupBy(data,"checklist_id")

                    },

                    get parse() {

                        return root.formatFromGroupedData(this.groupedByChecklist);

                    },

                    get orders() {

                        return _.orderBy(this.updateLabels,"index","asc");

                    },

                    get updateLabels() {

                        return  _.mapValues(this.byGroupByDate,function (data,index) {

                            data["index"] = index;
                            return data;

                        });

                    },

                    get byGroupByDate() {

                        const child_root = this;

                        const byId = this.groupedByChecklist;

                        const data = _.mapKeys(this.parse,function (byChecklist,index) {

                            if(byId[index] === undefined)

                                throw new Error("groupByChecklist keys has been change" +
                                    " or some of the key values is undefined and not exist");


                            const FIRST_ROW = 0;
                            const one = byId[index][FIRST_ROW];

                            const dateStart = one.date_time;
                            const dateEnd = one.deadline;

                            const result =  child_root.formatDate(dateStart) +
                                " - "
                                + child_root.formatDate(dateEnd)


                            return result;


                        });

                        return data;

                    },

                    showInfo : function(label) {

                        return root.showInfo(this.updateLabels[label])

                    },

                    setLineGraphData : function() {

                        return root.LineGraphData(_.take(this.orders,5));

                    },

                    last : function() {

                        let lastIndex = _.last(this.orders) || {};

                        root.last(lastIndex);

                        this.onIndex = lastIndex.index;
                        this.tempIndex = lastIndex.index;

                    },

                    formatDate : function(date) {

                        if(!window.hasOwnProperty("moment"))

                            throw new Error("Moment.js is not added");

                        return moment(new Date(date)).format("MM/DD/YY");

                    },

                    action : function() {

                        const child_root = this;
                        const targetChart = jQuery("#lineChart");

                        targetChart.off("pointHover").on("pointHover",function(evt,label) {

                            if(label === child_root.onIndex) return;

                            child_root.showInfo(label);
                            child_root.tempIndex = label;

                        });


                        targetChart.off("pointClicked").on("pointClicked",function(evt,label) {

                            child_root.showInfo(label);
                            child_root.onIndex = label;
                            child_root.tempIndex = label;

                        })


                    },

                    byDefaultInfo : function() {

                        const child_root = this;

                        jQuery("#lineChart").mouseleave(function () {

                            if(child_root.onIndex == child_root.tempIndex) return;

                            if(!child_root.onIndex) return child_root.last();

                            child_root.showInfo(child_root.onIndex);

                        });

                    },

                    main : function() {

                        const child_root = this;

                        jQuery("button#semestral").off("click").on("click",function() {

                             root.state("semestral");
                             child_root.setLineGraphData();
                             child_root.action();
                             child_root.byDefaultInfo();
                             child_root.last();
                             root.setPartialInfo(child_root.parse);

                        }).trigger("click");



                    }

                }

                call.main();
                return this;


            },

            onload : function() {

                const chart = this.lineChart;

                chart.labels = ["Present"];
                chart.budget  = [0];
                chart.received  = [0];
                chart.expenses  = [0];

                const ChartElement = chart.main("#lineChart");

                /** jQuery("#lineChart").on("pointHover",function (evt,label) {
                        console.log(label);
                    }); **/

                return this;

            },

            parse : function(json) {

                try {

                    return JSON.parse(json);

                }catch (err) {

                    console.warn("Catch trigger >> "+err);
                    console.warn("Result >> "+json);
                    throw new Error(err);

                }

            },

            main : function() {

                const root = this;

                this
                    .onload()
                    .info_template = jQuery("#group_statistics_template").html();

                const path = "/SCOA/public/organization/byGroupData/"+url;

                jQuery.get(path,function (response) {

                    let data = root.parse(response);
                    data = _.take(data,10);

                    root
                        .yearly(data)
                        .semestral(data);

                    document
                        .querySelector("#title-spinner")
                        .remove();

                    /** jQuery("#group_statistics").html(root.info_template) **/

                });



                var addOns = {

                    /** @user **/

                    approved_checklist : {

                        get getData() {

                            return new Promise(function (resolve, reject) {

                                const request = "/SCOA/public/"+currentPage()+"/ApprovedChecklist";

                                const response = function(result) {

                                    result = String(result).replace(/\s\s/gm,"");

                                    if(!result) reject("No results");

                                    try {

                                        const jsonParse = JSON.parse(result);
                                        resolve(jsonParse);

                                    }catch(err) {

                                        reject(err);

                                    }


                                };

                                $.post(request,{org_url : url},response);

                            });

                        },

                        type : function(type) {

                            switch (type) {

                                case "MAM" :

                                    return "Minutes from the Activity's meeting"

                                break;

                                case "FS" :

                                    return "Financial Statements";

                                    break;

                                case "DE" :

                                    return "Documentary Evidence";

                                    break;

                                case "AOP" :

                                    return "Annual Operating Plan";

                                    break;

                                default :

                                    return type;

                                    break;

                            }

                        },

                        state : function(data) {

                            const state = data.isApproved;

                            switch (Number(state)) {

                                case 1 :

                                    return ["Approved","primary"];

                                    break;

                                case 0 :

                                    return ["Pending","warning"];

                                    break;


                                default :

                                    return ["Disapproved","danger"];

                                    break;

                            }

                        },

                        template : function(data,element) {

                            const root = this;

                            const targetElement = jQuery("#approved_checklist_template");
                            const template = targetElement.html();

                            const fullName = function(details) {

                                if(details.hasOwnProperty("Firstname"))

                                    return details.Firstname + " "
                                        + details.Lastname;

                                return "";

                            };




                            return _.map(data,function (details) {

                               return (template || "").setTokens({
                                   type : root.type(details.type),
                                   user : fullName(details),
                                   path : details.path,
                                   dateTime : details.PDT,
                                   state : root.state(details)[0],
                                   typeState : root.state(details)[1]
                               });

                            }).join("\n");


                        },

                        main : function(element) {

                            const root = this;

                            // localStorage["scoa_result"] = JSON.parse(result);
                            //
                            // const temp = root.template(localStorage["scoa_result"]);
                            // document.querySelector(element).innerHTML = temp;


                            this.getData.then(function(result) {
                                const temp = root.template(result);
                                document.querySelector(element).innerHTML = temp;

                            });

                        }

                    }

                };


                return addOns;


            }

        };

        return call.main();

    };


})();
