
var Dasureco = function(){


    let Initialized = function () {

        let [$,$_,$__] = [this[0],this,jQuery];

        if(typeof $ === "object"){

            this.kalog = function(){


            };
            this.Timer = function (callback,delay){

                var timerId,start,remaining=delay;

                this.pause = function(){
                    window.clearInterval(timerId);
                    remaining -= new Date() - start;
                };

                this.resume = function(){

                    start = new Date();
                    window.clearTimeout(timerId);
                    timerId = window.setTimeout(callback,remaining);

                };

                this.resume();

            };

            this.part_address = function(){

                jQuery.get("Welcome/testing.xml", function(data, status,xhr ){
                    let response = xhr.responseText;

                    if(typeof response === "string" && response){

                        let dom = new DOMParser().parseFromString(response,"text/xml");
                        let municipal = dom.querySelectorAll("municipality mdata");

                        municipal.forEach(function (value) {

                            jQuery("[name='for_municipacility']").newElement({"option" :
                                    {value:value.textContent,
                                     innerHTML: value.textContent
                                    }})

                        });


                        jQuery("[name='for_municipacility']").on("change",function(){
                            $barangay_list();
                        });


                        function $barangay_list() {

                            jQuery("[name='for_barangay']").newElement([{innerHTML : ""}]);

                            let current_select = document.querySelector("[name='for_municipacility']");
                            let barangay = dom.querySelectorAll("municipality[value='"+current_select.value+"'] barangay bdata");

                            barangay.forEach((value) => {

                               if(value.textContent.trim()){
                                   jQuery("[name='for_barangay']").newElement([
                                       {"option" :
                                               {
                                                   value:value.textContent,
                                                   innerHTML: value.textContent
                                               }}])
                               }

                            });
                        };

                        $barangay_list();

                    }
                });

            };


            this.newElement = $__.fn.newElement;

            this.live_update = function(){

               let timer = new this.Timer(function(){

                   timer.pause();

                    try{

                        let identity = document.querySelectorAll(".load_main:not(.act)");

                        for(let x of identity){

                            let id = x.getAttribute("for");
                            let type = document.querySelector(".load_type[for='"+id+"']");
                            let status = document.querySelector(".load_status[for='"+id+"']");

                            if(type !== null && status !== null){

                                let is_Dis = status.getAttribute("stat");


                                    $__.fn.newElement([
                                    {
                                            onmousemove : 'mouseMove(this)',
                                            onmouseout : 'mouseOut(this)',
                                            innerHTML : ""
                                    },
                                    {div: {
                                            class : "btn-group btn-group-sm",
                                            style : "width:100%",
                                            role :'group',
                                            "aria-label" : "Small button group"
                                          },
                                    child : [
                                        {button : {
                                            class : "btn btn-" + (is_Dis ? "danger" : "primary"),
                                            name : "Con_Dis",
                                            onclick :'Confirmation('+id+',this)',
                                            "style" : 'width: 100%',
                                            "innerText" : is_Dis ? "Disconnect" : "Connect"
                                        }},
                                        {button: {
                                                class : "btn btn-success",
                                                innerText : "View"
                                            }}
                                            ]},

                                    ],x);


                                $__.fn.newElement({"innerText" : type.getAttribute("type_") },type);
                                $__.fn.newElement({
                                    class : "load_status badge badge-" + (is_Dis.trim() ? "success" : "warning"),
                                    innerText : is_Dis.trim() ? "Connected" : "Disconnected"
                                },status);
                              }}

                    }catch(err){
                        console.log(err.message);
                    }

                    timer.resume();

                },1)

            }}

        return this; 
      };

    return {
        init : function(){

             $.fn.dasureco = Initialized;

             $.fn.intoAnObject = function() {

                     let $Arr = jQuery(this[0]).serializeArray();

                     let newArr = {};
                     for(let list of $Arr){
                         newArr[list['name']] = list['value'];
                     }
                     return newArr;

             };


             $.fn.newElement = function(...options){

                 let $Arr = {
                     func :['innerText','innerHTML','contentBefore','parent','addClass','Me'] ,
                     temp : ['childs','children','child'],
                     global : {"*":{}}
                 };


                 let select = this[0] || options[1];

                 let $_resGlobal = () =>{

                     for(let attr in $Arr.global){

                         $Arr.global[attr] = {}

                     }

                 };

                 let $_getAttr = (ele,currentArr) => {


                    ele['addClass'] = (...options) => {
                        options[0].className = (options[0].className + " " + options[1]).trim();
                    };

                     ele['addId'] = (...options) => {
                         options[0].id = (options[0].id + " " + options[1]).trim();
                     };

                     ele['contentBefore'] = (...options) => {

                         let textnode = document.createTextNode(options[1]);

                         //Contruction


                     };

                     for(let attr in currentArr){

                         if(!$Arr.func.find((v)=> {if(v.trim() === attr.trim()) return true;}))
                             ele.setAttribute(attr,currentArr[attr]);
                         else{


                             if(typeof ele[attr] === "function")
                                 ele[attr](ele,currentArr[attr]);
                             else
                                 ele[attr] = currentArr[attr];

                         }
                     }};

                 let $_global = (val,global) => {

                     for(let value in global){

                         if(value.toLocaleUpperCase() === val.toLocaleLowerCase())
                             return [true,value];

                     }

                     return [false,null];

                 };

                 let $_set = (ele,item,g_var) => {

                     let global = $_global(ele,g_var);


                     if(!global[0]){


                         let element = null;

                         let $_set = (selector = item[ele]) =>{
                             $_getAttr(element,g_var['*']);
                             $_getAttr(element,selector);
                         };

                         if(typeof item[ele] === "object" && !Array.isArray(item[ele])){

                             element = document.createElement(ele) ;
                             $_set();

                         }else{

                             element = select;
                             $_set(item);
                             return null;

                         }

                         return element;

                     }else{

                         for(let attr in item[ele]){ g_var[global[1]][attr] = item[ele][attr]}

                     }



                 };
                 let $_begIn = (currentArr,parent = select,global = {"*":{}}) => {


                     if(typeof currentArr === "object"){

                         currentArr = currentArr.length > 0 ? currentArr : [currentArr];



                         let obj_list = [

                             currentArr.filter((item) => {
                                 return typeof item === "object" ? !Array.isArray(item) : false;
                             }),
                             currentArr.filter((item) => {
                                 return Array.isArray(item);
                             })];


                         obj_list[0].forEach((item)=>{

                             let parent_element = null;

                             for(let ele in item){

                                 if(!$Arr.temp.find((v)=> {if(v.trim() === ele.trim()) return true})){

                                   parent_element = $_set(ele,item,global);


                                 }else{

                                  if(parent_element)
                                    $_begIn(item[ele],parent_element);

                                 }

                                 if(parent_element)
                                     parent.appendChild(parent_element);


                             }
                         })}
                 };



                 if(options.length > 0)
                 $_begIn(options[0]);

             };

             $.fn.message = ($Arr = {

                 type : "warning",
                 title : "Warning!",
                 content : "",
                 icon : "fas fa-exclamation-circle"

             },customStyle = "background-color:  #ffc1071a !important; padding : 10px 0px 0px 0px") => {

                 return [
                     {innerHTML : ""},
                     {"div" :
                             {class : "animated tada  alert alert-"+$Arr.type+" error-valid alert-dismissable",
                                 style : customStyle,
                             },
                         child : [
                             {a :
                                     {class : "close",
                                         href : "#",
                                         "data-dismiss" : "alert",
                                         "aria-label" : "close",
                                         title : "close",
                                         innerText : "x",
                                         style : "position: relative !important;right: 10px !important;top: -8px !important;"
                                     }},
                             {div : {class : "text-center mb-4",},
                                 child : [{h2 :  {class : "text-center"},
                                     child : {i :
                                             {style : "position: relative;left: 10px;",
                                                 class : $Arr.icon
                                             }}},
                                     {h5 : {innerText : $Arr.title}},
                                     {p :  {innerHTML : $Arr.content}}
                                 ]}]},
                             {br : {}}];


             };

             $.fn.check = (col,val,$table = 'service_info') => {

                 //document.body[col] = [false,null];

                 let result = [true,null];



                 //
                 // jQuery.ajax({
                 //     'async' : false,
                 //     'type' : "POST",
                 //     'global' : false,
                 //     'dataType' : "html",
                 //     'url' :  "Welcome/exist.php",
                 //     'data' : {column : col , value : val, table : $table},
                 //     'success' : function(data){
                 //         alert(data);
                 //         try{
                 //             // data = JSON.parse(data.trim() || []);
                 //             //
                 //             // if(data ? data[0] : false){
                 //             //
                 //             //     result = data;
                 //             //
                 //             // }
                 //         }catch(err){}
                 //     }
                 // });

                 return result;

             };
        }
    }
}();
jQuery(function() {
    Dasureco.init();
});
