


(function(__) {


    window.scoa_graph =  {

        collection_report : null,
        collection_report_format : null,
        cash_received : null,
        cash_received_format : null,
        cash_flows : null,
        note_disbursement : null,
        data : null,


        get collected_receipt() {


            if(!this.collection_report_format) return;

            try{

                let source = JSON.parse(this.collection_report || "[]");

                if(!source.length) return;

                let formatted = JSON.parse(this.collection_report_format || "[]");


                const totalFromSource = _.sumBy(source,e => numeral(e.amount)._value);

                const cash_received = this.total_cash_received;

                return {
                    hasInvalid : source.length !== formatted.data.chunk(3).length,
                    isHigherFromReceived : cash_received.value < totalFromSource,
                    groupedValue : source,
                    get percentageOfEquality() {

                        if(this.isHigherFromReceived)

                            return numeral(cash_received.value / totalFromSource).format("%")

                        return numeral(totalFromSource / cash_received.value).format("%")

                    },
                }

            }catch(err){

              //  throw new Error(err);

            }


        },

        get total_cash_received_by_format() {

            if(!this.cash_received_format) return;

            const columnLenghToRead = 2;

            try{

                let source = JSON.parse(this.cash_received_format || "[]");

                if(!source.length) return;

                const data =  source.map(function(cell){

                    var [name,amount] = (cell.column || []).splice(0,columnLenghToRead);

                    name = name
                        .value
                        .replace(/\s/gm," ")
                        .toString()
                        .trim()

                    amount = numeral(amount.value)._value;

                    if(!(amount && name)) return;

                    return {

                        name : name,
                        amount : amount

                    }


                }).filter(Boolean);

                /** get total of data and return a final result **/

                return {

                    data : data,
                    total : _.sumBy(data,"amount"),
                    get formattedTotal() {

                        return numeral(this.total).format("0,0")

                    }

                }

            }catch(err){

               // throw new Error(err);

            }


        },

        get total_cash_received() {


            if(!this.cash_received) return;

            try{

                let source = JSON.parse(this.cash_received || "[]");

                const total =  _.sumBy(source,function (obj) {

                    const amount = obj.amount || 0;
                    return numeral(amount)._value;

                });


                var output = {};
                output["value"] = total || 0;
                output["formatted_value"] = numeral(output["value"]).format("0,0");

                return output;



            }catch(err){

               // throw new Error(err);

            }

        },

        get total_cash_flows() {

            if(!this.cash_received) return;

            try{

                let source = JSON.parse(this.cash_flows || "[]");

                const total =  _.sumBy(source,function (obj) {

                    const amount = obj.amount || 0;

                    return numeral(amount)._value || 0;

                })

                var output = {};
                output["value"] = total || 0;
                output["formatted_value"] = numeral(output["value"]).format("0,0");

                return output;


            }catch(err){

             //   throw new Error(err);

            }

        },

        get totalOfExpenses() {

            const expenses = this.definedAllExpenses() || [];

            return _.sumBy(Object.keys(expenses),function(e){

                return expenses[e]["total"] || [];

            })

        },

        get balance() {

            const received = this.total_cash_received.value,
                flows = this.total_cash_flows.value;

            var output = {};
            output["value"] = Number(received) - Number(flows);
            output["formatted_value"] = numeral(output["value"]).format("0,0");
            output["isMarkUp"] = Number(received) < Number(flows);
            output["markUp"] = (Math.abs(output["value"]) / Number(received));
            output["percentage"] = numeral(output["markUp"]).format("%");
            output["removePercent"] = numeral(output["percentage"])._value;

            return output;

        },

        get activity() {


            const root = this;

            if(!this.note_disbursement) return;


            try{

                let source = JSON.parse(this.cash_flows || "[]");

                source = _.uniqBy(source,"name");

                const totalOf = _.sumBy(source,function(e){

                    return numeral(e.amount || 0)._value;

                });

                /** format result **/

                source = _.mapValues(source,function (e) {


                    return {

                        amount : numeral(e.amount)._value,
                        activity : e.name,
                        isMax : false,
                        percentage : 0,
                        types : root.definedAllExpenses(function(expenses) {

                            const result = _.mapValues(expenses,function(typeInfo)
                            {

                                const groupByActivity = _.groupBy(typeInfo,"activityId")[e.name];

                                return groupByActivity || [];

                            });

                            return result;

                        })
                    }

                });


                if(!Object.keys(source).length) return;


                /** group result by activity **/

                source = _.groupBy(source,"activity");

                /** trim result **/

                source = _.mapValues(source,e => e[0]);

                /** sort result and get the first row then mark as max **/

                const order = _.orderBy(source,"amount","desc")[0];

                source[order.activity]["isMax"] = true;

                /** calculate percentages **/

                _.forEach(source,function(e) {

                    const percent = Number(e.amount) / totalOf

                    source[e.activity]['percentage'] = numeral(percent).format("%")

                })



                return source;


            }catch(err){

               // throw new Error(err);

            }



        },


        definedAllExpensesByActivity : function(type) {

            const root = this;

            if(!this.note_disbursement) return {};


            try{


                let source = JSON.parse(this.note_disbursement || "[]");

                if(!source.length) return;

                /** get Activity name **/

                let activity = _.map(source,"activityId");


                activity.forEach(function (e,index) {

                    const isValid = (e.replace(/\s/gm,"")+"").trim();

                    if(!isValid)

                        activity[index] = "Other Expense"

                })

                /** get unique values **/

                activity = _.uniq(activity);

                var finalResult =  _.map(activity,function(e) {

                    const output =  root.definedAllExpenses(function(expenses){

                        const result = _.mapValues(expenses,function(typeInfo)
                        {

                            const groupByActivity = _.groupBy(typeInfo,"activityId")[e];

                            return groupByActivity || [];

                        });


                        if(type) {

                            const groupByType = result[type];

                            const obj = {};
                            obj[type] = groupByType;
                            return obj;

                        }

                        return result;

                    });

                    var obj = {};
                    obj[e] =  output || [];
                    return obj;

                });

                /** trim result **/

                var temp = {};

                _.forEach(finalResult,e => Object.assign(temp,e));

                finalResult = temp;


                /** format data **/

                finalResult = _.mapValues(finalResult,function(byActivity,index) {

                    const totalOfTypes = _.sumBy(Object.keys(byActivity),function(key) {

                        return numeral(byActivity[key]["total"])._value || 0;

                    });

                    return {

                        total : totalOfTypes,
                        name : index,
                        types : byActivity,
                        percentage : 0
                    }

                });

                /** calculate percentages **/

                const totalOf = _.sumBy(Object.keys(finalResult),function(key) {

                    return finalResult[key]["total"];

                });

                _.forEach(Object.keys(finalResult),function(e){

                    const percent = Number(finalResult[e]["total"]) / Number(totalOf);

                    finalResult[e]["percentage"] = numeral(percent).format("%");

                })

                return finalResult;

            }catch(err){

                console.warn(err);

              //  throw new Error(err);

            }

            return {};

        },

        definedAllExpenses : function (filter) {

            if(!this.note_disbursement) return;

            try{

                let source = JSON.parse(this.note_disbursement || "[]");

                if(!source.length) return;

                const nonType = source
                    .filter(e => !e.hasOwnProperty("type") && (e["type"]))

                /** remove nonType **/

                source = source
                    .filter(e => e.hasOwnProperty("type") && (e["type"]))

                /** group the result by Type **/

                source = _.groupBy(source,"type");

                /** merge nonType into "Other" type **/

                source["Other"] = source["Other"] || [];

                nonType.forEach(e => source["Other"].push(e))

                if(typeof filter === "function")

                    source = filter(source)


                /** format result **/

                source = _.mapValues(source,function(expenses,type){

                    const total = _.sumBy(expenses,e => numeral(e.amount)._value);

                    return {
                        total : total,
                        formatted_total : numeral(total).format("0,0"),
                        expenses : expenses,
                        percentage : 0,
                        type : type,
                        isMax : false
                    }

                })


                /** sort result and get the first row then mark as max **/

                const order = _.orderBy(source,"total","desc")[0];

                source[order.type]["isMax"] = true;

                /** calculate percentage **/

                const totalOf = _.sumBy(Object.keys(source),e => numeral(source[e].total)._value)

                _.forEach(source,function(e) {

                    const percent = Number(e.total) / totalOf

                    source[e.type]['percentage'] = numeral(percent).format("%")

                });


                return source;


            }catch(err){

               // throw new Error(err);

            }

        },

        loadData : function() {

            const source = this.data;

            const isValid =
                source.hasOwnProperty("cash_collection_report") &&
                source.hasOwnProperty("cash_received") &&
                source.hasOwnProperty("print_format_received") &&
                source.hasOwnProperty("cash_collection_report_format") &&
                source.hasOwnProperty("cash_flows") &&
                source.hasOwnProperty("note_disbursement");


            if(!isValid)

                throw new Error("The data source is not valid");


            const toString = function(e) {

                return typeof e === "string"
                    ? e
                    : JSON.stringify(e);

            }


            this.collection_report = toString(source.cash_collection_report) || null ;
            this.cash_received = toString(source.cash_received) || null;
            this.cash_received_format = toString(source.print_format_received) || null;
            this.collection_report_format = toString(source.cash_collection_report_format) || null;
            this.cash_flows = toString(source.cash_flows) || null ;
            this.note_disbursement = toString(source.note_disbursement) || null;

        },

        main : function (url,org_code) {

            const root = this;

            if(!window.scoa_token)

                throw new Error("Undefined scoa_token variable");

            const token = {url : url,member_code : org_code}

            return new Promise(function(resolve, reject) {

                __.post("/SCOA/public//Inbox/getUnformattedData",token,function(data) {

                    /** validate request **/

                    data = data.replace(/\s/gm," ");

                    if(!(data+"").trim())

                        throw new Error("No loaded data");


                    try{

                        let source = JSON.parse(data);
                        root.data = source;
                        root.loadData();

                        resolve(root);

                    }catch(err){

                        reject(err);

                        throw new Error(err);

                    }



                    // root.chart("Expenses",[
                    //     { y: 26, name: "School Aid", exploded: true },
                    //     { y: 20, name: "Medical Aid" },
                    //     { y: 5, name: "Debt/Capital" },
                    //     { y: 3, name: "Elected Officials" },
                    //     { y: 7, name: "University" },
                    //     { y: 17, name: "Executive" },
                    //     { y: 22, name: "Other Local Assistance"}
                    // ],"chartExpenses")


                })


            });



            return root;

        }

    }


})($)