/**
 * @author Yuan
 */



(function (factory) {
    "use strict";

    //JQuery Registered a global variable $.fn.custom_variable

    //noinspection JS Unresolved Variable

    //jshint : this line will ignore

    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(['jquery'], factory); // jshint ignore:line
    } else { // noinspection JSUnresolvedVariable
        if (typeof module === 'object' && module.exports) { // jshint ignore:line
            // Node/CommonJS
            // noinspection JSUnresolvedVariable
            module.exports = factory(require('jquery')); // jshint ignore:line
        } else {
            // Browser globals
            factory(window.jQuery);
        }
    }
}(function ($) {


    if(!window.hasOwnProperty("jQuery")) return;


    $.fn.parse_into_json = function(){

        let element = this;

        if(Object.prototype.toString.call(element) === "[object Object]"){

            let $Arr = jQuery(element).serializeArray();
            let newArr = {};
            for(let list of $Arr){
                newArr[list['name']] = list['value'];
            }
            return newArr;

        }

    };


    String.prototype._toJSON = function() {

        const data = this;

        try {

            return JSON.parse(data);

        }catch(err) {

            console.warn("Invalid json output of ");
            console.log(String(data));

            return [];

        }

    };

    String.prototype.setTokens = function (replacePairs,callBack) {

        let str = this.toString(), key, re;

        for (key in replacePairs) {

            if(!isNaN(key)) key = "\\"+key;

            re = new RegExp("\{" + key + "\}", "gm");
            str = str.replace(re, replacePairs[key]);

            if(typeof callBack !== "function") continue;

            callBack.prototype.constructor({
                current : key,
                isEqual : re,
                value : str
            });


        }
        return str;
    };

    String.prototype.seperator = function(symbol) {

        let result = [],
            item = '',
            depth = 0;

        function push() {

            if(item)

                result.push(item);

            item = '';

        }

        for(let i =0,c; c = this[i] , i < this.length; i++)
        {

            if(!depth && c === symbol) push();

            else {

                item+=c;
                if(c==="[") depth++;
                if(c==="]") depth--;

            }

        }

        push();
        return result;

    }

    String.prototype._toKnuthMorrisPratt = function(str) {

        const string = this;

        const buildPatternTable = function() {

            const pattern = str.split('');

            const fault = Array(pattern.length).fill(0);
            let j = 0;
            let i = 1;

            while(i < str.length || j!=0) {

                if(pattern[i] === pattern[j]) {

                    fault[i] = j+1;
                    j++;

                } else if (j > 0) {

                    j = fault[j-1];
                    continue;

                }

                i++;


            }

            return fault;

        }

        const patternTable = buildPatternTable();
        let j = 0;

        for(let i =0; i < string.length;i++) {

            if(string[i] === str[j]) {

                j++;

                if(j === str.length) return i - j + 1;

            }else if(j > 0) {

                j = patternTable[j-1] + 1;

            }

        }


        return -1;


    }


    /**
     *
     * @param {String} search Query/search term
     * @param {Array<any>} list Data set
     * @param {String} property? Required when items in list are objects
     * @param {Number} maxResults? Optional limit for filtered results
     * @returns {{item: any, score: Number}[]}
     */

    String.prototype._fuzzySearch = function(list, property = undefined, maxResults = Infinity) {

        let maximumAcceptableList = Infinity;
        let search = this;

        const breakToPairs = (expression, useLowerCase = false) => {
            const string = useLowerCase ? expression.toLowerCase() : expression;
            const length = string.length - 1;
            const result = new Array(string.length - 1);
            for (let i = 0; i <= length; i++) {
                result[i] = string.slice(i, i + 2);
            }
            return result;
        };


        const calcSimilarity = (str1, str2) => {
            // compare every pairs of characters (or single) between two strings.
            // add score when a character is on both strings
            // add extra score if the character's position is close to the compared string
            // add score when character pairs are on both strings
            let score = 0;
            if (str1.length > 0 && str2.length > 0) {
                let tempIndex = 0;
                const pairs1 = breakToPairs(str1);
                const pairs2 = breakToPairs(str2);


                const union = pairs1.length + pairs2.length;

                // character exists
                pairs1.forEach((pair) => {
                    if (str2.toLowerCase().indexOf(pair) >= 0) {
                    score++;
                }
            });


                // distance position
                str1.split('').forEach((char, index) => {
                    // every character that is close to the same character on the comparison get's a score
                    const inIndex = str2.toLowerCase().indexOf(char);

                if (inIndex >= tempIndex) {
                    score += 0.5 * ( union - ( inIndex - index ) );
                    tempIndex = inIndex;
                }


            });

                // character pairs matching
                pairs1.forEach((pair1) => {
                    const x = pair1;
                pairs2.forEach((pair2) => {
                    const y = pair2;
                if (x === y) {
                    score++;
                }
            });
            });


                if (score > 0) {
                    return score / union;
                }


            }
            return 0;
        };

        if (maximumAcceptableList < list.length) {
            throw new Error(`Cannot accept list longer than ${maximumAcceptableList}`);
        }
        if (!search) {
            const limit = Math.min(maxResults, list.length);
            const result = [];
            for (let i = 0; i < limit; i++) {
                result.push({item: list[i], score: 0});
            }
            return result;
        }
        return list.map((item) => {
            let lookup = property ? item[property] : item;
        const relevance = calcSimilarity(search, lookup);
        return {
            item: item,
            score: relevance
        };
    }).sort((a, b) => {
            if (a.score === b.score) {return 0;}
        return a.score < b.score ? 1 : -1;
    }).slice(0, maxResults);

        return -1;

    }



    String.prototype._search = function(list,map = false,property = null,limit = Infinity) {

        const str = this;


        var call = {

            onsearch : function (onList,property) {

                onList = typeof onList === "string"
                    ? [onList]
                    : onList;

                let result = str._fuzzySearch(onList,property);
                result = result.filter(e => e.score >= 2);
                result = result.map(e => e.item);
                result = result.splice(0,limit);
                return result;

            },

            map : function(arr,keys,isLoop = false) {

                const root = this;

                const result = arr.map(function(e,index) {

                    if(e === null || e === undefined) return false;

                    if(root.checkIfHasObject(e)) {

                        const _values = Object.values(e);
                        const _keys = Object.keys(e);

                        let _result = root.map(_values,_keys,true);

                        if(!_result.length) return;

                        if(isLoop) _result = _result[0].of;

                        return {
                            of : e,
                            value : _result instanceof Array
                                ? _result[0].value
                                : _result
                        }

                    }


                    const values = typeof e === "string"
                        ? e
                        : Object
                            .values(e)
                            .filter(Boolean)
                            .map(String)


                    const TempResult = root.onsearch(values);
                    const check = typeof TempResult === "object" || TempResult === "string"
                        ? TempResult.length > 0
                        : TempResult;

                    if(!(check && root.hasARequiredProperty(keys))) return;

                    return TempResult;


                }).filter(Boolean);


                return result;

            },

            hasARequiredProperty : function(data,index = null) {

                if(property) {

                    if(!data instanceof Array)

                        return false;

                    if(!(data.indexOf(property) > -1))

                        return false;

                    return true;

                }

                return true;

            },

            checkIfHasObject : function(arr) {

                const root = this;

                if(typeof arr === "object") {

                    try {

                        const check = Object.values(arr).filter(function (e) {
                            return typeof e === "object";
                        });

                        return check.length > 0;

                    }catch(err) {

                        return false;

                    }

                }

                return false;

            },

            filter : function(arr,keys = null) {

                const root = this;

                const result = arr.filter(function(e) {

                    if(e === null || e === undefined) return false;

                    if(root.checkIfHasObject(e)) {

                        const _values = Object.values(e);
                        const _keys = Object.keys(e);

                        const _result = root.filter(_values,_keys);
                        return _result.length > 0;

                    }


                    const values = typeof e === "string"
                        ? e
                        : Object
                            .values(e)
                            .filter(Boolean)
                            .map(String)


                    const TempResult = root.onsearch(values);
                    const check = typeof TempResult === "object" || TempResult === "string"
                        ? TempResult.length > 0
                        : TempResult;

                    return check && root.hasARequiredProperty(keys);


                });

                return result;

            },

            parse : function() {

                if(map) return this.map(list);

                return this.filter(list);

            },

            main : function () {

                if(typeof list === "string") return String(this.onsearch(list));

                if(!list instanceof Array) {

                    console.warn("Invalid supply on " +
                        "parameter list expected type of Array");

                    console.log({
                        type : typeof list,
                        value : list
                    });

                    return {};

                }

                return this.parse();

            }

        };

        return call.main();

    },


        Object.defineProperty(Array.prototype,"_checkIfHasProperyOf",{

            enumerable : false,

            value : function(obj) {

                let check = true;
                let on = 1;

                while(check) {

                    if(this.length >= on) {

                        const propertyName = this[on - 1];

                        if(!obj.hasOwnProperty(propertyName)) {

                            console.warn("Cant find property of " + propertyName + " by value on");
                            console.log(obj);

                            return false;

                        }

                        obj = obj[propertyName];

                        on+=1;
                        check = true;

                        continue;

                    }

                    check = false;

                }


                return true;


            }

        });


    Object.defineProperty(Array.prototype,"_trim",{

        enumerable : false,

        value : function(objToCheck) {

            let arr = this;

            const trim = function(tempArr) {

                return tempArr.map(function(val) {

                    if(val instanceof Array) {

                        const length = val.length;

                        if(length > 1) return val;

                        return trim(val)[0];

                    }

                    return val;

                }).filter(Boolean);

            };


            return trim(arr);

        }

    });


    Object.defineProperty(Array.prototype,"_isKeysExist",{

        enumerable : false,

        value : function(objToCheck) {

            function check(value)
            {

                return objToCheck.hasOwnProperty(value) &&
                    typeof value === "string"

            }


            return this.every(check);

        }

    });


    Array.range = function(n) {
        // Array.range(5) --> [0,1,2,3,4]
        return Array.apply(null,Array(n)).map((x,i) => i)
    };

    Object.defineProperty(Array.prototype, 'chunk', {
        value: function(n) {

            // ACTUAL CODE FOR CHUNKING ARRAY:
            return Array.range(Math.ceil(this.length/n)).map((x,i) => this.slice(i*n,i*n+n));

        }
    });



    function _scoa(options)
    {

        var self = this;
        self.options = options;
        self.init();


    }


    _scoa.prototype = {

        init : function() {

            var _ = jQuery;


            this.path = window
                .location
                .hostname
                .concat("/scoa/public/");


            this
                .checklist()
                .reminders()
                .auth()
                .misc()
                .avatar()
                .post()
                .loadingBar()
                .table()
                .file.call()


            _('.hide-wrapper')
                .removeClass("hidden")
                .show() //if class hidden not specify


            _('.hide-slowly')
                .delay(5000)
                .slideUp()

            /** switch **/



            _("#switch input[type=checkbox]").change(function() {

                const value =  _(this).is("[checked]");
                if(!value) _(this).attr("checked","");
                if(value) _(this).removeAttr("checked");

                _(this)[0].value = value ? 0 : 1;

            }).trigger("change");

            window.onbeforeunload = () => {

                _("html").remove();

                return null;

            };


        },

        get settings() {

            return jQuery
                .fn
                ._scoa
                .defaults = jQuery.fn._scoa.defaults || new Object();

        },


        get file() {

            var self = this;

            return {

                get list() {

                    var file_parent_thumbnails = jQuery(".file-preview-thumbnails")
                        .children(`.file-preview-frame[data-xFile][data-xName]`);

                    var array_of_files = [];


                    file_parent_thumbnails.each(function(index,element)
                    {
                        array_of_files =  array_of_files.concat({
                            fname : element.attributes["data-xName"].value,
                            file : element.attributes['data-xFile'].value,
                        })

                    })

                    return array_of_files;

                },

                get length(){

                    return this.list.length;

                },


                call : function() { return this; }


            }


        },


        reminders : function() {

            var call = {

                get is_element_exist() {

                    return jQuery("scoa_reminders").length;

                },

                main : function() {

                    setTimeout(function(){

                        if(this.is_element_exist) {

                            jQuery.get("/SCOA/public/organization/reminders/4",function(response){

                                jQuery("scoa_reminders").html(response);

                            })

                        }

                    },1000)




                }

            }

            //  call.main();

            return this;


        },

        misc : function() {

            var call = {

                /** stop image to render **/

                renderImage : function() {

                    return;

                    const root = this;

                    setTimeout(function() {

                        const element = "img.profile" +
                            ":not(.scoa-avatar)" +
                            ":not(#loaded)"


                        jQuery(element).each(function(index,ele) {

                            if(jQuery(ele).is("[loaded]")) return;

                            var src = jQuery(ele)[0].src

                            src = src.replace(/\s/gm,"");

                            const _default = "/SCOA/public/files/profile/default/1.jpg";

                            if(!src) return;

                            jQuery(ele)
                                .attr("_src",src || jQuery(ele).attr("_src") || _default)
                                .attr("src","data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=")
                                .toggleClass("animated-background facebook loading-avatar-feed")
                                .removeAttr("alt")
                                .attr("id","loaded");




                        })

                        root.renderImage();

                    },1000)

                },

                passwordField : function() {

                    const element = jQuery(".password");

                    if(!element.length) return this;

                    element.each(function(curr,ele) {

                        var check = $(ele).has(".input-group").length
                            && $(ele).has("input").length
                            && $(ele).has(".input-group-btn a,.input-group-btn button").length;

                        if(!check) return;

                        $(ele)
                            .find(".input-group-btn a")
                            .click(function() {

                                const input = $(ele).find("input")[0]

                                if(input.type == "password") {

                                    input.type = "text";

                                } else {

                                    input.type = "password"

                                }

                            })

                    });

                    return this;

                },

                main : function() {

                    this.passwordField()
                        .renderImage()

                }

            }


            call.main();

            return this;

        },

        auth : function() {

            var call = {

                get loginCredentials() {

                    return new Promise(function(resolve,reject) {

                        jQuery.post("/SCOA/public/User/isAlreadySign",function(response){

                            resolve(response);

                        });

                    })

                },

                hasChanged : function(credentials,by) {

                    if(by.userId === false) {
                        return this;
                    }

                    if(credentials.userId != by.userId) {

                        setTimeout(() => {

                            window.location.reload(true);

                    },4000)


                        if(!jQuery.hasOwnProperty("dialog"))

                            window.location.reload(true);


                        jQuery.dialog({
                            icon: 'fa fa-spinner fa-spin',
                            title: 'Time out',
                            content: 'Your session is already time out...',
                            closeIconClass : "hidden",
                            closeIcon : null,
                            buttons : {}
                        });



                    }

                    return this

                },

                ifitLogIn : function(credentials,by) {

                    if(!(credentials.isLogin && !by.isLogin)) return this;

                    if(!credentials.isStaff) {
                        window.location = "/SCOA/public/organization"
                    }else {
                        window.location = "/SCOA/public/scoa_admin"
                    }



                    return this;

                },

                update : function(callback,logIn) {

                    const root = this;

                    this
                        .loginCredentials
                        .then(function(e) {

                            const response = JSON.parse(e);

                            root
                                .ifitLogIn(response,logIn)
                                .hasChanged(response,logIn);


                            callback();

                        })


                },

                main : function () {

                    const root = this;

                    const currentCredentials = this.loginCredentials;

                    const live = function(e) {

                        const current = JSON.parse(e);

                        setTimeout(function() {

                            /** request after some request is done **/
                            root.update(function() {

                                live(e);

                            },current);

                        },5000);

                    }

                    currentCredentials.then(live)

                }

            }

            call.main();

            return this;

        },

        addSettings: function(id,value) {

            this.settings[id] = value;

            return this.settings;

        },

        avatar : function() {

            var call = {

                profile : function() {

                    const root = this;

                    jQuery('img.profile').each(function(index,element) {

                        const target = jQuery(element);

                        if(target.is(".scoa-avatar")) return;

                        root.image_status(element.src,function() {

                            jQuery(element).addClass("animated-background " +
                                "facebook " +
                                "loading-avatar-feed");

                            const attribute = element.getAttribute("letters")
                                || element.getAttribute("letter")
                                || null;


                            if(attribute)
                            {

                                var letter = attribute.trim() || "U";

                                letter = letter.split("")[0] || null;
                                jQuery(element).attr("letters",letter);

                                return root.setUp(element);

                            }


                            jQuery(element).attr("src","data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=");


                            root.setUp(element)

                            // root.replace_image('blankprofile.jpg',element);

                        })

                    })

                    return this;


                },

                status : function(url) {

                    const imgPromise = new Promise(function imgPromise(resolve, reject){

                        const imgElement = new Image();

                        imgElement.addEventListener('load',function imgOnLoad(){
                            resolve(this);
                        });

                        imgElement.addEventListener('error',function imgOnError(){
                            reject();
                        });

                        imgElement.src = url;

                    })

                    return imgPromise;

                },

                /**
                 * for non href and unable to load image
                 * set default profile
                 * @param image
                 * @param element
                 */

                replace_image : function(image,element){

                    element.src = "/SCOA/public/files/default_image/".concat(image);

                    return this;

                },

                image_status : function(src,callback_when_error){

                    this.status(src).then(function fulfilled(img) { return;}, callback_when_error);


                },

                /**
                 * For non href image this will create
                 * avatar
                 */

                listen : function() {

                    const root = this;

                    setTimeout(function() {

                        root.profile();

                        var images = document.querySelectorAll("" +
                            "img#loaded" +
                            ":not(.scoa-avatar)" +
                            ":not(.scoa-profile)" +
                            ":not([letters])," +
                            "img[letters]" +
                            ":not(.scoa-avatar)" +
                            ":not(.scoa-profile)");

                        for (var i = 0, len = images.length; i < len; i++) {

                            var img = images[i];

                            const async_image = jQuery(images).is("#loaded")

                            if($(images).attr("src") && !async_image) continue;

                            root.setUp(img);

                        }



                        root.listen();



                    },0);

                    return this;

                },

                hasDir : function(image) {

                    return new Promise(function(resolve,reject) {

                        var dirImg = (image.getAttribute('_src')+"").trim();

                        if(dirImg) {

                            jQuery(image).attr("src",dirImg);

                            const imgElement = new Image();
                            imgElement.src = dirImg;
                            imgElement.onerror = function() {

                                return reject({
                                    src : dirImg,
                                    element : scoa.toJquery(image)
                                });

                            };

                            imgElement.onload = function() {

                               //console.log(typeof resolve);

                                return resolve({
                                    src : dirImg,
                                    element : scoa.toJquery(image)
                                });

                            }


                        }
                    })


                },

                get localHistory () {

                    const root = this;
                    const localCacheIdentifier = "profiles";
                    const limitlocalCacheRequest = 5;

                    const init = {

                        add : function(item) {

                            let value = [];

                            if(this.checkIfExist(item))

                                throw new Error("Image property is already exists");

                            if(scoa.localStorage.isExist("profiles"))

                               value =  scoa.localStorage.getItem("profiles");


                            value.push(item);
                            scoa.localStorage.save("profiles",value);


                            return true;

                        },

                        checkIfExist: function(identifier,callBack) {

                            if(!scoa.localStorage.isExist(localCacheIdentifier)) return false;

                            const profiles = scoa.localStorage.getItem(localCacheIdentifier);

                            for(let index =0; index < profiles.length; index++) {

                                const item = profiles[index];

                                if(!scoa.hasOwnProperty(item,"identifier","letter","value","isLoaded"))
                                    continue;


                                if(item.identifier !== identifier)

                                    continue;


                                if(typeof callBack === "function") {

                                    return callBack.prototype.constructor(item,index);

                                }

                                return true;


                            }

                            return false;


                        },

                        getByElement : function(img) {

                            const identifier = img.getAttribute('identifier')

                            if(!identifier)

                                throw new Error("No valid attribute to save");

                            return this.get(identifier);

                        },

                        removeState : function(data,identifier,request) {

                            if(request >= limitlocalCacheRequest)

                                data = data.filter((e,index) => index !== identifier);

                            return data;

                        },

                        get : function (key) {

                            const root = this;

                            const ifExist = function (value,index) {

                                let localCache = scoa.localStorage.getItem(localCacheIdentifier);
                                const request = (localCache[index]["request"] || 0)+1;
                                localCache[index]["request"] = request;

                                localCache = root.removeState(
                                    localCache,
                                    index,
                                    request
                                );


                                scoa.localStorage.save(localCacheIdentifier,localCache);

                                return value;

                            };

                            const result = this.checkIfExist(key,ifExist);

                            if(scoa.isEmpty(result))

                                throw new Error("Image property not found");


                            return result;

                        }

                    };

                    return init;

                },

                hasLocalHistory : function(img) {

                    const identifier = img.getAttribute('identifier');

                    if(!identifier) return false;

                    if(!this.localHistory.checkIfExist(identifier)) return false;

                    return true;

                },

                setUp : function(img) {

                    const root = this;
                    const value = img.getAttribute('letters');
                    const hasCustomText = img.getAttribute('value');
                    const identifierToSave = img.getAttribute("identifier");
                    const backgroundColor = scoa.toJquery(img).attr("background");
                    const color = scoa.toJquery(img).attr("color");
                    const image_width = scoa.toJquery(img).attr("width");


                    const init = {

                        get textValue () {

                            if(hasCustomText) return hasCustomText;
                            let letter = value || "U";
                            if(letter.length > 1) return letter.slice(0,1);
                            return letter;

                        },

                        get image_properties() {

                            const obj = {
                                letter : this.textValue,
                                size :  image_width || 60,
                            };


                            const config = {
                                background : backgroundColor,
                                color : color,
                            };

                            Object.keys(config).forEach(function (key) {
                                const OfValue = config[key];
                                if(!OfValue) return;
                                obj[key] = config[key];
                            });

                            return obj;

                        },

                        saveHistory : function(value,isLoaded) {

                            if(!identifierToSave) return;

                            root.localHistory.add({
                                identifier : identifierToSave,
                                letter : this.textValue,
                                value : value.src,
                                isLoaded : isLoaded
                            });

                            return true;


                        },

                        settingUp : function(response) {

                            const output = root.create(this.image_properties);
                            img.src = output;

                            this.saveHistory({
                                src : output,
                                element : scoa.toJquery(img)
                            },false);

                        },


                        image_validation : function() {

                            root
                                .hasDir(img)
                                .then(value => this.saveHistory(value,true))
                                .catch(response => this.settingUp(response))

                            return;

                        },

                        main : function () {

                            // img.removeAttribute('letters');
                            jQuery(img).addClass("scoa-avatar");

                            if(!root.hasLocalHistory(img)) return this.image_validation();

                            const result = root.localHistory.getByElement(img);
                            img.src = result.value;

                        }


                    };

                    return init.main();

                },

                create : function(config) {

                    if(scoa.checkType(config) !== "object") return;

                    config = Object.assign({

                        background : null,
                        color : "#FFFFFF",
                        letter : "U",
                        font : null,
                        size : 60,

                    },config);

                    config.font = config.font || (Math.round(config.size / 2) + "px Arial");
                    config.letter = config.letter || "U";

                    var canvas = document.createElement('canvas');
                    var context = canvas.getContext("2d");

                    // Set canvas with & height
                    canvas.width = config.size;
                    canvas.height = config.size;

                    // Select a font family to support different language characters
                    // like Arial
                    context.font = config.font;
                    context.textAlign = "center";

                    // Setup background and front color
                    context.fillStyle = config.background || jQuery.scoa._generateRandomColors();
                    context.fillRect(0, 0, canvas.width, canvas.height);
                    context.fillStyle = config.color;
                    context.fillText(config.letter, config.size / 2, config.size / 1.5);

                    // Set image representation in default format (png)
                    dataURI = canvas.toDataURL();

                    // Dispose canvas element
                    canvas = null;

                    return dataURI;

                },


                main : function() {

                    this
                        .profile()
                        .listen()



                }


            }

            call.main();

            return this;


        },

        table : function (element = null) {

            var self = this,
                target = element || jQuery("[scoa-table]"),
                action = {

                    "scoa-button-add-row" : "insertRow",
                    "scoa-button-undo" : "undo",
                    "scoa-button-redo" : "redo",
                    "scoa-button-download" :  "download"

                };

            var call = {

                currentTarget : null,
                tableElement : null,

                data : [],
                numeric : [],
                components : [],

                get columns() {

                    return this.currentTarget
                        .find("thead tr th, thead tr td")
                        .get();
                },

                get elementOptions() {

                    return this.parseToJSON(this.currentTarget.attr("data-options"));

                },

                get colSettings() {

                    var root = this;

                    function filter(element,index) {

                        var options = jQuery(element).attr("data-options"),
                            data = root.parseToJSON(options || '');


                        if(options === undefined)

                            return;


                        if(data.hasOwnProperty("numeric"))
                        {
                            var numeric = data.numeric;

                            if(numeric instanceof Array || typeof numeric === "string")
                                root.numeric[index] = data.numeric;
                            else
                                root.numeric.push(index)

                            delete data.numeric;
                        }

                        if(data.hasOwnProperty("type"))
                        {

                            var type = data.type,
                                isjExcelType = ["calendar","dropdown","checkbox"].indexOf(type);

                            if(isjExcelType > -1)

                                root.components.push(index)

                        }


                        return data;

                    }

                    return this.columns.map(filter);

                },

                get rows() {

                    return this
                        .currentTarget
                        .find("tbody tr:not(#last)")
                        .get();

                },

                get loadedRows() {

                    return this
                        .currentTarget
                        .find(".jexcel-content tbody tr")
                        .get();

                },

                get tableSettings() {


                    if(!self
                        .settings
                        .hasOwnProperty(this.currentTarget.attr("id")))
                    {
                        throw new Error("Not found id");

                        return;

                    }


                    if(!self
                        .settings[this.currentTarget.attr("id")]
                        .hasOwnProperty("table"))
                    {

                        throw new Error("Not found table");

                        return;

                    }



                    return  self.settings[this.currentTarget.attr("id")].table;


                },

                set tableSettings(obj) {

                    if(!this.tableSettings)
                    {
                        throw new Error("No settings to set of!");

                        return;
                    }

                    jQuery
                        .fn
                        ._scoa
                        .defaults[this.currentTarget.attr("id")]
                        .table = Object.assign(this.tableSettings,obj);

                },

                get cellAttributes() {

                    function filter(currentValue,index)
                    {

                        var styles = jQuery(currentValue)
                            .children("td")
                            .get()
                            .map(function(cellValue,cellIndex)
                            {
                                var cell = jQuery(cellValue),
                                    style = cell.attr("style"), has_comment = cell.is("td.jexcel_comments,th.jexcel_comments");


                                var obj = {
                                    row : index,
                                    col : cellIndex,
                                    style : style,
                                    comment : jQuery(cell).attr("title") || null
                                }


                                if(!style && !has_comment)

                                    return;

                                return obj;

                            });

                        if(!styles || !styles[0]) return;

                        return styles;


                    }



                    return this
                        .rows
                        .map(filter)
                        .filter(Boolean);

                },

                get lastRow() {

                    var tablerow = this
                        .currentTarget
                        .find("tbody tr#last")
                        .get()
                        .map(element => this.tableData(element))

                    return tablerow;

                },

                get cells() {

                    var root = this;

                    function filter(element) {

                        return jQuery(element)
                            .find("td")
                            .get()
                            .map(value => value.innerHTML);

                    }

                    return this.rows.map(filter);

                },

                get colHeaders() {

                    var root = this;

                    function filter(element) {

                        if(root.isElement(element))

                            return new String(element.innerHTML).trim();

                    }

                    return this.columns.map(filter);

                },

                get structure() {

                    var options = this.elementOptions,
                        datas = {
                            data : this.cells,
                            colHeaders : this.colHeaders,
                            columns: this.colSettings,
                        }

                    options = Object.assign(this.elementOptions,this.triggers());

                    return Object.assign(options,datas);

                },

                get parentElement() {

                    return jQuery(this.currentTarget.parents("[scoa-table-base-parent]")[0] ||
                        this.currentTarget.parent()[0]);

                },

                get numericColumns() {

                    return JSON.parse(this.currentTarget.attr("numeric-columns"));

                },

                get column_hasjExcelComponents() {

                    var components = this.currentTarget.attr("components");

                    if(components === undefined) return [];

                    return JSON.parse(this.currentTarget.attr("components"));


                },

                get rowStyle() {

                    function filter(currentValue,index)
                    {

                        var tableDataLength = jQuery(currentValue)
                            .has("td")
                            .length;

                        var style = jQuery(currentValue)
                            .attr("style");

                        if(!tableDataLength && !style)

                            return;

                        return {index : index , style : style};

                    }

                    return this.rows.map(filter);


                },

                get xmlFormatted() {

                    var root = this;

                    function filter(currentVal,rowIndex)
                    {

                        var rowElement = jQuery(currentVal),
                            Rownode = document.createElement("tr"),
                            rowStyle = rowElement.attr("style");

                        if(rowStyle !== undefined)

                            Rownode.setAttribute("style",rowStyle);


                        var column =  jQuery(currentVal)
                            .children("td:not(.jexcel_label)")
                            .get()
                            .map(function(cellElement,cellIndex) {


                                var cell = jQuery(cellElement),
                                    cellNode = document.createElement("td"),
                                    cellStyle = cell.attr("style"),
                                    cellComment = cell.is(".jexcel_comments");


                                if(cellStyle)

                                    cellNode.setAttribute("style",cellStyle);


                                if(cellComment)
                                {

                                    cellNode.setAttribute("title",cell.attr("title"));
                                    cellNode.classList.add("jexcel_comments");

                                }





                                // var isjExcelPlugin = settings
                                //     .jexcelPlugin
                                //     .indexOf(columnIndex) > -1;

                                // cellNode.innerHTML = isjExcelPlugin || InvalidFormatValue
                                //     ? root.String(cell.html())
                                //     : cell.html().trim();

                                /** @END **/


                                var settings = self
                                    .settings[root.currentTarget.attr("id")]
                                    .table;


                                var columnIndex = cell.index() - 1,
                                    id = root.tableInfo.id;


                                var isjExcelPlugin = settings
                                        .jexcelPlugin
                                        .indexOf(columnIndex) > -1 &&
                                    !root
                                        .tableInfo
                                        .isDropdown(id,cellIndex);


                                if(root.tableInfo.isDropdown(id,cellIndex)) {

                                    /**
                                     * dropdown id is formatted
                                     * as lower case and no spaces
                                     *
                                     * **/

                                    const dropdownValue = cell
                                        .html()
                                        .replace(/\s/gm,"")
                                        .toLowerCase();

                                    cellNode.innerHTML = root.String(dropdownValue)


                                }


                                /**
                                 * Check if a current element is jexcel plugin
                                 * if true return a valid string(no-styles or tags)
                                 * if false skip and continue the next execution
                                 */


                                else if(isjExcelPlugin) {

                                    cellNode.innerHTML =  root.String(cell.html());

                                }
                                else {

                                    cellNode.innerHTML = cell.html().trim();

                                    // var InvalidFormatValue = !!cell.has("input").length;
                                    //
                                    // cellNode.innerHTML =  InvalidFormatValue
                                    //     ? root.String(cell.html())
                                    //     : cell.html().trim();


                                }


                                return cellNode.outerHTML;


                            }).join("\n");

                        Rownode.innerHTML = column;

                        return Rownode.outerHTML;

                    }


                    return this.loadedRows
                        .map(filter)
                        .join("\n");


                },


                get tableInfo() {

                    var root = this;

                    return {

                        get base() {

                            return $.fn.jexcel.defaults;

                        },

                        get id() {

                            return root.currentTarget.attr("id");

                        },

                        get config() {

                            return this.base[this.id];

                        },

                        refreshTable : function(element = null) {

                            element = element || root.currentTarget;

                            root.getDataByRows(element);

                            element.jexcel('loadCells',root.data)

                            return this;

                        },

                        column_options : function(index = null) {

                            if(index)

                                return this.config.columns[index];

                            return this.config.columns;

                        },


                        getColumnSource : function(id,colIndex) {

                            return this.base[id].columns[colIndex].source;

                        },



                        checkEveyColumn : function(id,callback)
                        {

                            return this.base[id].columns
                                .every((details,index) => !callback(details,index,id))

                        },

                        findColumn : function(id,callback)
                        {

                            return this.base[id].columns
                                .filter((details,index) => !callback(details,index,id))

                        },

                        isDropdown : function(id,colIndex) {


                            var col = this.base[id].columns[colIndex];


                            if(col.hasOwnProperty("type"))

                                return col.type === "dropdown";

                            return false;

                        },

                        getDropdownValue : function(rowIndex,colIndex,id = null) {

                            id = id || this.id;


                            return this
                                .base[id]
                                .data[rowIndex][colIndex];

                        },

                        getColumnSourceNames : function(id,colIndex) {


                            function filter(details) {

                                if(typeof details === "object" && !details instanceof Array)

                                    return details.name;

                                return details;

                            }

                            return this
                                .getColumnSource(id,colIndex)
                                .map(filter)
                                .filter(Boolean)

                        }



                    }


                },

                triggers : function() {

                    var root = this;

                    var data = function(obj) {

                        root.currentTarget = obj;

                        var objToReturn = {
                            target : obj,
                            data : root.getData(obj),
                            rows : root.getDataByRows(obj),
                            xmlFormatted: root.xmlFormatted,
                            tableInfo : root.tableInfo
                        }

                        return objToReturn;

                    }


                    return {


                        "onafterchange" : function (obj) {



                            /**
                             * reset the value of
                             * temporary found data
                             * **/

                            root.data = [];

                            /** @END **/




                            root.currentTarget = obj;

                            root.tableSettings = data(obj);

                            var objElement = jQuery(obj);

                            objElement.trigger("after_change",data(obj));

                        },

                        "afterSetComment" : function(obj) {

                            root.currentTarget = obj

                            obj.trigger("comment_changed",data(obj));

                        },

                        "onchange" : function(obj, cell, val) {

                            /**
                             * remove toolbars
                             */

                            jQuery("#scoa-toolbar-options").remove();


                            /** @END **/

                            root.currentTarget = obj

                            var properties = Object.assign(data(obj),{

                                cell : cell,
                                cellValue : root.getFormattedValue(cell,val)

                            })

                            obj.trigger("when_change",properties);


                        },

                        "oninsertcolumn" : function(obj) {

                            root.currentTarget = obj;

                            obj.trigger("adding_column",data(obj))

                        },

                        "ondeletecolumn" : function (obj) {

                            root.currentTarget = obj;

                            obj.trigger("adding_column",data(obj))
                        },

                        "oninsertrow" : function(obj) {

                            root.currentTarget = obj;

                            obj.trigger("rowInserted",data(obj))

                        },

                        "ondeleterow" : function(obj) {

                            root.currentTarget = obj;

                            obj.trigger("delete_row",data(obj))

                            root.tableInfo.refreshTable();

                        },


                        "beforedeleteColumn" : function(obj) {

                            root.currentTarget = obj;

                            obj.trigger("before_delete",data(obj))

                            var currentHeader = root
                                    .tableInfo
                                    .config
                                    .colHeaders,
                                defaultStructure = self
                                    .settings[root.tableInfo.id]
                                    .table
                                    .structure,
                                defaultColHeaders = defaultStructure
                                    .colHeaders;

                            var isValid = defaultStructure.hasOwnProperty("isColumnFixed")
                                && defaultStructure.isColumnFixed === true;


                            if(!isValid) return true;

                            return currentHeader.length > defaultColHeaders.length;

                        }


                    }


                },

                reset : function () {

                    this.numeric = [];
                    this.components = [];
                    this.data = [];

                    return this;

                },

                hasValue : function(val) {

                    var root = this;


                    if(!(val instanceof Array)) return;

                    function check(value) {

                        /** undefined become an empty string **/

                        if(!root.byType(value || "")) return;

                        return true;

                    }


                    return val.map(check).indexOf(true) > -1;

                },

                byType : function(val) {

                    try {

                        var type = numeral.validate(val)
                            ? numeral(val)._value
                            : this.String(val);

                        return type;

                    }catch (e) { return val}

                },

                String : function(val) {

                    var dom = document.createElement("div");
                    dom.innerHTML = val;
                    var value = dom.textContent;

                    return new String(value).trim();

                },



                tableData : function (element) {

                    return jQuery(element)
                        .find("td")
                        .get()
                        .map(element => element.innerHTML)

                },


                parseToJSON : function (value) {

                    var root = this,
                        ObjectVal = new Object(),
                        nonWhiteSpaceValue = value.replace(/\s/gm,"");

                    var comma_seperate = nonWhiteSpaceValue.seperator(",");

                    comma_seperate.forEach(function(every_value) {

                        var colon_seperate = every_value.seperator(":");

                        if(colon_seperate.length <= 1) return;

                        var keyname = root.removeQuotesAndSpaces(colon_seperate[0]),
                            objectType = root.parseToObjectType(colon_seperate[1]);

                        ObjectVal[keyname] = objectType;

                    });


                    return ObjectVal;


                },

                refresh : function(element) {

                    element.jexcel('orderBy',0)

                    element.jexcel('orderBy',0)

                },

                removeQuotesAndSpaces : function(val) {

                    return val.replace(/(")|(\s)/gm,"");

                },

                isElement: function (element) {

                    return element instanceof Element

                },

                isExcelFormula : function (value) {

                    return /^\=/gm.test(value);

                },

                parseToObjectType : function(value) {

                    try {

                        var objectType = JSON.parse(value);

                        if(typeof objectType === "string")

                            return this.removeQuotesAndSpaces(objectType);

                        return objectType;

                    }catch(err) {

                        return this.removeQuotesAndSpaces(value);

                    }

                },

                order : function (element) {

                    var root = this,
                        button = this.parentElement.find("[scoa-button-order-by]");

                    button.click(function () {

                        var status = root
                            .currentTarget
                            .toggleClass("orderASC")
                            .is(".orderASC");

                        var icon = button
                            .find(".fa-sort-amount-asc")
                            .toggleClass("fa-sort-amount-desc")

                        element.jexcel('orderBy',0);

                    });

                    return this;

                },

                buttonActions : function(element) {

                    var root = this;

                    this.order(element);
                    this.parentElement.find("button,input[type=button]").click(function() {

                        var currentLoop = this;

                        Object.keys(action).forEach(function (currentVal) {

                            if(!jQuery(currentLoop).is(`[${currentVal}]`)) return;

                            element.jexcel(action[currentVal],1);

                        })

                    })

                    return this;


                },

                striped : function(row,cell,obj) {


                    var options = this.elementOptions;


                    if(options.hasOwnProperty("striped"))
                    {


                        var targetType = typeof options.striped,
                            defaultConfig = {
                                row : 2,
                                background : '#edf3ff',
                                col : null
                            };

                        if(targetType === "number")

                            defaultConfig.row = options.striped;

                        if(options.striped instanceof Array)

                            defaultConfig = Object.assign(defaultConfig,options.striped[0]);


                        $(targetCell).removeClass("striped");


                        if (row % defaultConfig.row)
                        {

                            var targetCell = defaultConfig.col
                                ? ".r1 "+defaultConfig.col
                                : cell;


                            $(targetCell).css('background-color', defaultConfig.background);
                            $(targetCell).addClass("striped");

                        }



                    }


                    return this;

                },

                numericFormatting : function (col,cell,value) {

                    var cell_element = jQuery(cell);


                    if(this.numericColumns.indexOf(Number(col)) > -1) {

                        let txt = numeral(value).format('0,0.00');
                        cell_element.html(' ' + txt);

                    }



                    return this;

                },

                getFormattedValue : function(cellElement,nonFormattedValue) {

                    var root = this;

                    if(this.isExcelFormula(nonFormattedValue))

                        nonFormattedValue = root.String(cellElement.html())

                    return nonFormattedValue;

                },


                isValidText : function (value) {


                    if(value === null || value === undefined)

                        return false;

                    var trimString = new String(value).trim();

                    return trimString == this.String(value);

                },


                is_aValidColumn : function(element,string = null)
                {

                    var contents = string || element.html(),
                        col_index = element.index() - 1; /** not td.jexcel-label **/


                var isJeExcelComponent = this
                        .column_hasjExcelComponents
                        .indexOf(col_index) > -1;


                    var text =  this.isValidText(contents)

                    const hasValidStyle = !element.is("[style]:not(.striped)") || !element.attr("style")



                    return (text && hasValidStyle) || isJeExcelComponent;



                },


                is_aValidRow : function(instance,rowIndex) {

                    var root = this;

                    return this.currentTarget
                        .find(".jexcel-content table tr")
                        .eq(rowIndex)
                        .find("td:not(.jexcel_label)")
                        .get()
                        .every(element => root.is_aValidColumn(jQuery(element)))


                },


                updateDataOnSettings : function() {

                    /**

                     var row = object.row,
                     id = object.id,
                     cellValue = object.formattedCellValue;

                     if(!this.data.hasOwnProperty(row))

                     this.data[row] = new Object();

                     this.data[row][id] = cellValue;

                     jQuery(element)
                     .siblings("input#scoa-table-result[type=hidden]")
                     .val(JSON.stringify(this.data))

                     **/

                    // this.tableSettings =  {
                    //
                    //     "Success" : "Success"
                    //
                    // }


                    return this;

                },


                getDataByRows : function(element) {

                    var root =this,
                        unFormattedData = element.jexcel("getData");

                    var fullData = [];

                    function filterRows(currentVal,row_index)
                    {

                        var targetRow = element.find(`#row-${row_index}`),
                            col = [];


                        for(var col_index in currentVal)
                        {

                            var column = currentVal[col_index] || "",
                                targetColumn = targetRow.find(`.c${col_index}`),
                                formattedValue = root.String(targetColumn.text());


                            /**
                             * check if a string has dom nodes  or styles
                             * return true if not
                             */



                            if(!root.is_aValidColumn(targetColumn,column))

                                return;


                            if(root.isExcelFormula(column))

                                currentVal[col_index] = formattedValue;



                            fullData.push({
                                col: col_index,
                                row: row_index,
                                cell: targetColumn,
                                newValue: currentVal[col_index],
                                oldValue: ''
                            })


                            /**
                             * add column element for a current row
                             * see obj variable
                             */

                            col.push(targetColumn);


                        }


                        if(root.hasValue(currentVal))
                        {


                            var obj = {
                                element : targetRow,
                                index : row_index ,
                                columns : col,
                                data : currentVal
                            };


                            return obj;

                        }


                    }

                    root.data = fullData;

                    return unFormattedData
                        .map(filterRows)
                        .filter(Boolean);


                },


                getData : function(object) {

                    return this.getDataByRows(object)
                        .filter(Object)
                        .map(row => row.data)

                },

                tableActions : function(element,storeResult) {

                    var root = this;

                    element.jexcel('updateSettings', {

                        table : function (instance, cell, col, row, val, id) {

                            root.currentTarget = instance;

                            /** set toolbar **/

                            if(root.String(val).trim())

                                root.toolbar(cell,id,val);


                            element.trigger("onAction",{
                                instance : instance,
                                cell : cell,
                                row : row,
                                val : val,
                                id : id,
                            });


                            /**
                             * check if row is valid it does not have a styles
                             * or tags except for the jexcel components
                             * @type {*|boolean}
                             *
                             */


                            if(root.is_aValidRow(instance,row))

                                root.numericFormatting(col,cell,val);


                            root
                                .striped(row,cell,jQuery(instance))
                                .image_rendering(cell,val)




                            // jQuery(root.currentTarget)
                            //     .jexcel('executeFormula', id);


                        }

                    });

                    return this;
                },

                setRowsStyle : function(rowData) {

                    var root = this;

                    rowData.forEach(function(currentValue)
                    {

                        var tableRow =  root
                            .currentTarget
                            .find(".jexcel-content table tbody tr");


                        tableRow
                            .eq(currentValue.index)
                            .attr("style",currentValue.style);


                    })

                    return this;

                },

                image_rendering : function(cell,val) {

                    const isLink = /(http|https):\/\//gm.test(val)

                    if(!(isLink && val)) return;


                    var img = new Image();
                    img.onerror = function() { return; }
                    img.onload =  function() {

                        $(cell)
                            .html([
                                '<a href="'+ val +'" data-gallery style="z-index:999999">',
                                '<input type="hidden" value="'+ val +'">',
                                '<img src="' + val + '" style="width:100px;height:100px">',
                                '</a>'
                            ].join("\n"));

                    }

                    img.src = val

                },


                toolbar : function(cell,id,val) {

                    const root = this;

                    if(this.tableSettings.structure.hasOwnProperty("toolbar"))
                    {



                        if(!$.fn.hasOwnProperty("toolbar"))
                        {

                            throw new Error("Toolbar plugin not exist");

                            return;


                        }else {

                            /**
                             * define toolbar contents
                             */

                            if(!$("#scoa-toolbar-options").length)
                            {

                                jQuery("body").append([

                                    '<div id="scoa-toolbar-options" class="hidden">',
                                    '<a href="javascript:void 0" edit>',
                                    '<i class="fa fa-edit"></i></a>' ,
                                    '<a href="javascript:void 0" bold>',
                                    '<i class="fa fa-bold"></i></a>' ,
                                    '<a href="javascript:void 0" not-important>',
                                    '<i class="fa fa-toggle-off"></i></a>' ,
                                    '</div>'

                                ].join("\n"));

                            }


                        }


                        const toolbarSettings = {

                            content: '#scoa-toolbar-options',
                            event : 'click',
                            zIndex: 99999999999999,
                            hideOnClick: true,
                            style: 'success'

                        };

                        const bold = function () {

                            var isBold = cell.css('font-weight');


                            if(numeral(isBold)._value > 500)

                                return  cell.css("font-weight" , "");

                            cell.css("font-weight" , "bold");


                        }

                        const not_important = function() {


                            if(!cell.find("#not-important").length) {

                                cell
                                    .html([
                                        '<input type="hidden" id="not-important">',
                                        root.String(val),

                                    ].join("\n"));

                                jQuery(this).css("background","currentColor");

                            }

                            else {

                                jQuery(this).css("background","#28948c")
                                cell.find("#not-important").remove();

                            }



                        }


                        const response_when_toolbar_loaded = function(evt,params) {

                            params
                                .toolbar
                                .find("[bold]").off("click").click(bold);

                            params
                                .toolbar
                                .find("[edit]").off("click").click(function() {

                                root.currentTarget.jexcel('setValue', id);

                            });

                            params
                                .toolbar
                                .find("[not-important]")
                                .off("click").click(not_important)


                        }

                        jQuery(cell)
                            .off("toolbar_loaded")
                            .on("toolbar_loaded",response_when_toolbar_loaded)
                            .toolbar(toolbarSettings)



                    }

                },

                setCellAttributes : function (rowData) {


                    var root = this;


                    rowData.forEach(function(column)
                    {

                        column.forEach(function(currentValue)
                        {

                            if(currentValue === undefined)

                                return;

                            var tableRow =  root
                                .currentTarget
                                .find(`
                            .jexcel-content
                            table
                            tbody
                            tr:eq(${currentValue.row})`);

                            var tableData =  tableRow
                                .children("td:not(.jexcel_label)")
                                .eq(currentValue.col);



                            if(!tableData.length) return;


                            if(currentValue.style)

                                tableData.attr("style",currentValue.style);


                            if(currentValue.comment)

                                tableData
                                    .attr("title",currentValue.comment)
                                    .addClass("jexcel_comments")


                        })

                    })

                    return this;


                },


                settings : function(id) {

                    self.addSettings(id,{

                        table : {

                            structure : this.structure,

                            "numeric-columns" :  this.numeric,

                            jexcelPlugin : this.components

                        }

                    });

                    return this;

                },

                main : function() {

                    var root = this;

                    target.each(function (index,_element) {



                        var node = document.createElement("div"),
                            uniqueId = `scoa-table-jexcel-${Math.floor((Math.random() * 100) + 1)}`,
                            _target = jQuery(_element),
                            targetClassList = _target.attr("class");

                        var inputResult = document.createElement("input");
                        inputResult.type = "hidden";
                        inputResult.id = "scoa-table-result";

                        node.id = uniqueId;

                        _target
                            .after(node)
                            .after(inputResult);


                        root
                            .reset()
                            .currentTarget = _target;



                        var table = jQuery(`div#${uniqueId}:last`),
                            rowStyleData = root.rowStyle,
                            cellAttributes = root.cellAttributes,
                            options = root
                                .currentTarget
                                .attr("data-options")
                                .replace(/\s/gm,"");


                        root.tableElement = table;

                        root.settings(uniqueId);

                        table.jexcel(root.structure);

                        /** add property's of obj settings **/


                        table
                            .addClass(targetClassList)
                            .attr("data-options",options)
                            .attr("numeric-columns",JSON.stringify(root.numeric))
                            .attr("components",JSON.stringify(root.components))


                        root
                            .tableActions(table,inputResult)
                            .buttonActions(table)
                            .setRowsStyle(rowStyleData)
                            .setCellAttributes(cellAttributes);


                        root.tableSettings = {
                            rows : root.getDataByRows(table),
                            tableInfo : root.tableInfo,
                            data : root.getData(table),
                            xmlFormatted :root.xmlFormatted
                        }



                    }).remove();

                }

            }

            call.main();

            return this;

        },

        loadingBar : function() {

            var self = this,
                path = this.target.loadingBar;



            var call = {

                get parent(){

                    return jQuery(`.${path.class_name}`);

                },

                spinner : function(){

                    this.parent
                        .prepend([
                            '<div class="scoa-loading">',
                            '<div class="sk-spinner sk-spinner-rotating-plane loading">',
                            '<div></div>'
                        ].join("\n"))
                        .addClass("overlayA");

                    this.spinnerLocation();

                    return this;

                },

                spinnerLocation: function()
                {


                    jQuery(".scoa-loading .loading").each(function()
                    {

                        var target = jQuery(this),
                            x = target.outerWidth(),
                            y = target.outerHeight();


                        target.css({

                            marginTop : `${0-(y/2)}px`,
                            marginLeft : `${(0-x/2)}px`

                        }).parent().css({height : `${window.innerHeight/1.4}px`})

                    })


                    return this;


                },

                formSubmitted : function() {

                    var self = this;

                    if(!path.targetElement.length) return;

                    path.targetElement.click(function()
                    {
                        self
                            .spinner()
                            .showTarget();

                    });



                    return path.targetElement;

                },


                hideTarget : function() {

                    this.parent.hide();

                    return this;

                },

                showTarget : function() {

                    this.parent.show();

                    return this;

                },

                load : function () {

                    return this.hideTarget()
                        .formSubmitted();
                }


            }

            call.load();

            return this;

        },

        post : function() {

            let self = this,
                tabs = this.target.postBoxTabsElement,
                postButton = self.target.postSubmitElement;



            var call =  {


                get is_regular_post(){

                    var class_target = self.target.postTypeClass.regular_post;

                    return this.activeTab.is(`.${class_target}`);

                },

                get is_checklist_post(){

                    var class_target = self.target.postTypeClass.checklist_post;

                    return this.activeTab.is(`.${class_target}`);

                },

                get activeTab() {

                    return tabs.children("li.active");

                },

                submit : function(){

                    window.post = false;

                    if(this.is_checklist_post) postButton.trigger("post_checklist");

                    /** consider **/

                    if(this.is_regular_post) postButton.trigger("regular_post");

                }

            }

            postButton.click(function()
            {

                call.submit();

            })


            return this;


        },

        regular_post : function() {

            var self = this;


        },

        checklist : function() {

            var self = this,
                path = self.target.checklist,
                allbutton = self.target.postSubmitElement,
                listElements = path.element.children("li"),
                submitButton = allbutton.not(path.FSsubmitButton);



            var submitButton_defaultLayout = submitButton.html();


            const call =
                {
                    id : null,

                    selectedID : function (target) {

                        this
                            .resetSelection
                            .id = target
                            .addClass("info-element active")
                            .attr("id");

                        if(!this.validateID)

                            throw new Error("Invalid id");

                        if(this.isFS)

                            return submitButton
                                .html(`<i class='fa fa-angle-double-right'></i>&nbsp<strong>Next</strong>`)
                                .addClass("btn-warning");


                        submitButton
                            .html(submitButton_defaultLayout)
                            .removeClass("btn-warning");


                    },


                    get isFS(){

                        return path.fsID === this.id

                    },

                    get checklistFieldValue(){

                        var target_class = self.target.checklist.fieldClass;

                        return jQuery(`.${target_class}`).val()

                    },

                    get resetSelection(){

                        listElements.removeClass("info-element active");

                        return this;

                    },

                    get validateID() {

                        return this.id && this.id.match(/^(AOP|MAM|CBL|FS|DE)$/);

                    },

                    get messageInvalidID (){

                        if(!this.validateID)
                        {
                            this.id = null;

                            swal({
                                title : "Select type of checklist first",
                            })

                        }


                        return this;

                    },

                    get loadingBar() {


                        var _target = path
                            .element
                            .parents(`.${self.target.loadingBaseClass}`)

                        jQuery(`.${self.target.overlayClass}`).trigger("off");


                        _target
                            .off("load")
                            .off("unload")
                            .on("load",() => _target.addClass("sk-loading"))
                    .on("unload",() => _target.removeClass("sk-loading"))

                        return _target;

                    },



                    submit : function(element) {

                        if(!this.messageInvalidID.id)

                            return;


                        if(!self.file.length && !this.isFS)

                            return swal({
                                title : "Upload a file!"
                            });


                        this.save();


                    },

                    postRequest : function(additionalParams = new Object()) {


                        var options = self.target.postOptions;

                        var _default = {

                            body : this.checklistFieldValue,
                            type : this.id,
                            isMemberState : 0,
                            files : self.file.list

                        }


                        var WithAjaxParams = Object.assign(_default,options.Ajax_parameter),
                            WithMethodParams = Object.assign(WithAjaxParams,additionalParams);


                        var load = this.loadingBar.trigger("load");



                        jQuery.post(path.SourceUri,WithMethodParams,function(respond) {

                            const success = "1";

                            // load.trigger("unload");

                            if(respond.trim() !== success)
                            {

                                swal("Failed!","cant accept your request at this moment","error");

                                throw new Error(" err message :  "+respond);


                            }

                            window.location.reload(true);

                        })


                    },


                    saveAsRegular_checklist : function() {

                        this.postRequest();

                    },


                    settingUp_FS : function() {

                        var _ = jQuery,
                            _self = this,
                            _path = self.target.checklist;



                        var call =  {

                            modalState : false,

                            get targetElement() {

                                return _(`#${_path.FSModalClass}`);

                            },

                            get is_FSModal_specify() {

                                return this.targetElement.length

                            },

                            style : function() {

                                return this
                                    .targetElement
                                    .addClass("z-indexFocus")

                            },

                            show : function() {

                                if(this.modalState) return false;

                                this
                                    .style()
                                    .modal({
                                        backdrop: "static",
                                        show : true,});

                                this.modalState = true;

                                return this;

                            },

                            modal_close : function() {

                                this
                                    .targetElement
                                    .modal("hide");


                            },

                            ready : function() {

                                const root = this;

                                this
                                    .targetElement
                                    .on("shown.bs.modal",function() {

                                        root.modalState = 2;

                                    })

                                return this;


                            },

                            hidden : function() {

                                var root = this;

                                this.targetElement.on('hide.bs.modal', function () {

                                    root.modalState = false;

                                });

                                return this;

                            },

                            checkRequest : function(data) {

                                var Isvalid = ["xml","data","type"]._isKeysExist(data) &&
                                    Object.values(data).every(Boolean)

                                if(!this.modalState || !Isvalid)
                                {
                                    new Error("not permitted action");

                                    return false;
                                }

                                return true;

                            },


                            action : function() {

                                var root = this,
                                    options = self.target.postOptions

                                _path.FSpathElement.on("update", function(evt,data) {

                                    if(!root.checkRequest(data))

                                        return false;

                                    jQuery.ajax({

                                        error : function(xhr,status,error)
                                        {

                                            _path.FSpathElement.trigger("error",{
                                                xhr : xhr,
                                                status : data,
                                                error : error,
                                                data : data
                                            })

                                        },

                                        beforeSend : function (xhr)
                                        {

                                            _path.FSpathElement.trigger("beforeUpdate",{
                                                xhr : xhr,
                                                data : data
                                            })

                                        },

                                        complete : function(xhr,status)
                                        {
                                            _path.FSpathElement.trigger("completeRequest",{
                                                xhr : xhr,
                                                status : status,
                                                data : data
                                            });
                                        },

                                        success : function(result,status,xhr)
                                        {

                                            _path.FSpathElement.trigger("success",{
                                                result : new String(result).trim(),
                                                data : data,
                                                status : status,
                                                xhr : xhr
                                            });

                                        },

                                        type : "post",
                                        url : path.FS_sourceUri,
                                        data : Object.assign(data,options.Ajax_parameter)

                                    })
                                })

                                return this;


                            },



                            submit : function() {

                                var root =this;


                                //if(this.modalState !== true ) return false;



                                path.FSsubmitButton

                                /** remove previous click action  **/


                                    .off("click")

                                    /** add click trigger **/


                                    .on("click",function() {

                                        const method =  _(this).attr("method");

                                        jQuery("#parent_wrapper")
                                            .toggleClass("hidden");


                                        $("#fs_content_wrapper")
                                            .hide()
                                            .remove();


                                        _self.postRequest({
                                            isMemberState: 1,
                                            method : method
                                        })

                                    })



                            },

                            /** @temporary **/

                            main : function () {

                                // if(!this.is_FSModal_specify)
                                // {
                                //     throw new Error("Modal not found");
                                //
                                //     return;
                                // }

                                const root = this;

                                const protocol =  window.location.protocol+"//";

                                jQuery.confirm({
                                    content: function () {
                                        var _self = this;
                                        return jQuery.ajax({
                                            url: "/SCOA/public/feeds/newFS/"+window.scoa_token,
                                            method: 'post'
                                        }).done(function (response) {



                                            _self.close();

                                            const template = [

                                                "<content id='fs_content_wrapper'>",
                                                response,
                                                "</content>"

                                            ].join("\n");


                                            jQuery("#parent_wrapper")
                                                .toggleClass("hidden")
                                                .after(template)


                                            root.submit();



                                        }).fail(function(e){

                                            self.setContent('Something went wrong.');

                                        });
                                    }
                                });

                            }

                        };

                        call.main();

                    },

                    save : function() {

                        if(this.isFS)

                            return this.settingUp_FS();

                        this.saveAsRegular_checklist();

                    }



                };


            submitButton.on("post_checklist",function() {

                call.submit();

            })



            listElements.click(function () {

                call.selectedID(jQuery(this));

            });


            return this;

        },

        get target() {

            var self = this,
                defaultParams = {

                    checklist : {

                        element : jQuery("ul#checklist"),
                        fsID : "FS",
                        fieldClass : "checklist-textarea",
                        SourceUri : "../organization/submitChecklist",
                        FSModalClass : "FSModal",
                        get FSsubmitButton() { return jQuery("#FS_submit") } ,
                        FSpathElement : jQuery(".checklist-fs"),
                        FS_sourceUri : '../organization/submitFS'

                    },
                    overlayClass : "scoa-overlay",
                    loadingBaseClass : "ibox-content",
                    postBoxTabsElement : jQuery(".post_type"),
                    loadingBar : {

                        targetElement : jQuery("form button,form input[type=button],.scoa-body-overlay").not("#disableLoad"),
                        class_name : "scoa-loading-wrapper"

                    },
                    postTypeClass : {
                        regular_post : "regular_post",
                        checklist_post : "checklist_post"
                    },
                    regular_post : {
                        fieldClass : "scoa-textarea",
                        Respond_uri : "../feeds/post_request",
                    },
                    postOptions : {
                        Ajax_parameter : null,
                    },
                    postSubmitElement : jQuery(".post-button")
                }


            Object.keys(this.options).forEach(function (key) {

                if(!defaultParams.hasOwnProperty(key))
                    return;


                if(typeof defaultParams[key] !== typeof self.options[key])
                    return;

                Object.assign(defaultParams[key],self.options[key])

            })


            return defaultParams;


        }


    }


    /**
     *
     * @deprecated
     *
     *
     * **/

    jQuery.scoa = {

        text_area : null,

        post_button : null,

        create_post :
            {
                uri : "",
                type : "user",
                notifyClass : "notify-state",
                org_uri : null,

                _call : function(button,textarea)
                {

                    var buttonElement = jQuery(button),
                        self = this,
                        textareaElement = jQuery(textarea);

                    buttonElement
                        .off("regular_post")
                        .on("regular_post",function () {

                            // buttonElement.off("regular_post");

                            var is_valid = self.is_valid_input(textareaElement),
                                parentIbox = textareaElement.parents(".ibox-content");


                            if(!is_valid) return;

                            jQuery(".scoa-overlay").trigger("off");

                            parentIbox.addClass("sk-loading");

                            jQuery.post(self.uri, {

                                body : textareaElement.val(),
                                files : self.files(),
                                type : self.type,
                                notify : self.notifyState,
                                org_url : self.org_uri

                            },function(response) {



                                var format = response.replace(/\s/gm,"");

                                if(format == 2) {

                                    window.location.reload();

                                    return;

                                }

                                jQuery(".scoa-overlay").trigger("off");

                                swal("Error","Error occured please refresh this page","error")

                                throw new Error("Error occured : " + response);

                            })



                        })

                },

                submit : function(){

                    var self = this;

                },


                get notifyState() {

                    return jQuery(`.${this.notifyClass}`).val() || 0;

                },

                is_valid_input : function(textareaElement)
                {

                    var textareaValue = textareaElement.val().trim(),
                        files = this.files();

                    if(!(files.length || textareaValue.length))

                        return false;

                    return true;

                },



                files : function()
                {
                    var file_parent_thumbnails = jQuery(`.file-preview-thumbnails .file-preview-frame[data-xFile][data-xName]`),
                        array_of_files = [];


                    file_parent_thumbnails.each(function(index,element)
                    {
                        array_of_files =  array_of_files.concat({
                            fname : element.attributes["data-xName"].value,
                            file : element.attributes['data-xFile'].value,
                        })

                    })

                    return array_of_files;

                }


            },

        file_input : {

            _call : function(selector,url)
            {

                var uploadUri = {uploadUrl : url},
                    krajee_fileInput =  jQuery(selector).fileinput(Object.assign(uploadUri,this.config));


                this.events(krajee_fileInput);

            },

            events : function(selector)
            {

                var target = jQuery(selector);

                target.on("fileselect",function(event)
                {
                    var has_preview = jQuery(".file-input .file-preview-frame")[0];

                    if(has_preview !== undefined) jQuery('.file-input').css("display","block");

                })


                target.on("change",function(event)
                {
                    var has_preview = jQuery(".file-input .file-preview-frame")[0];

                    if(has_preview === undefined) jQuery('.file-input').hide();

                })


                target.on('fileerror',function(event,data,msg)
                {
                    swal('Files exceeded',msg,"warning");
                })

                target.on('fileuploaded', function(event, data, previewId, index) {


                    try {


                        if(!data.response
                            && (data.response.length > 0)
                            && data.response[0] !== undefined)

                            return;


                        var fileUploadName = data.response[0].fname,
                            file_original_name = data.response[0].original_fname,
                            previewIdElement = jQuery(`#${previewId}`).not("[data-xFile]");

                        previewIdElement.attr("data-xFile",fileUploadName);
                        previewIdElement.attr("data-xName",file_original_name);

                    }catch (e){};

                });

                /**
                 * automatic upload when files selected
                 */

                target.on('filebatchselected', function(event,files) {

                    jQuery(".file-input .kv-file-upload.btn").trigger("click");

                });


            },

            get config()
            {


                return {


                    browseClass: 'btn btn-sm btn-default m-t-n-xs',
                    theme : 'fas',
                    showCancel : false,
                    maxFileCount : 10,
                    showUpload : false,
                    showRemove : false,
                    msgErrorClass : 'display-none',
                    showCaption : false,
                    previewFileIcon : "<i class='fa fa-file-archive-o'></i>",
                    maxFileSize : 5000000,
                    showAjaxErrorDetails : true,
                    browseIcon : '<i class="fa fa-file"></i>',
                    previewZoomButtonIcons: {
                        prev: '<i class="fa fa-angle-left"></i>',
                        next: '<i class="fa fa-angle-right"></i>',
                        toggleheader: '<i class="fa fa-arrows"></i>',
                        fullscreen: '<i class="fa fa-arrows-alt"></i>',
                        borderless: '<i class="fa fa-expand"></i>',
                        close: '<i class="fa fa-times"></i>'
                    },
                    layoutTemplates : {
                        actionZoom : `<button type="button" class="kv-file-zoom {zoomClass}" title="{zoomTitle}" ><i class="fa fa-search-plus"></i></button>`,
                        indicator : ''

                    },
                    fileActionSettings : {
                        removeIcon: '<i class="fa fa-trash"></i>',
                        uploadIcon: '<i class="fa fa-upload"></i>',
                        indicatorNew : ``,
                        uploadRetryIcon: '<i class="fa fa-repeat"></i>',
                    }

                }

            }


        },

        feed : {

            _call : function(selector,urlSource,org_url = null)
            {

                var self = jQuery.scoa.feed,
                    jQuery_target = jQuery(selector),
                    DOM_target = document.querySelector(selector),
                    post_count = -1;


                jQuery_target.on("on",function () {

                    var body = jQuery("body");

                    if(!body.is(".active"))
                    {
                        body.addClass("active");

                        DOM_target.insertAdjacentHTML("beforeend",self.loading_bars);

                        jQuery.post(urlSource,{post_count : post_count,url : org_url},function(response)
                        {



                            try{

                                if(!response.trim()) {
                                    return;
                                }

                                post_count+=10;

                                jQuery(".loading-bars").first().before(response);
                                jQuery.scoa.images.load();

                                var loading_bars = jQuery(".loading-bars");

                                loading_bars.remove();
                                body.removeClass("active");


                                jQuery(".loadInfo button").click(function(){

                                    var target= jQuery(this)
                                        .parents('.loadInfo')

                                    target.siblings('div#scoa-files.file-box.hidden')
                                        .removeClass("hidden")

                                    target.remove();


                                })

                                self.video_load();



                            }catch(err){}

                        })

                    }



                })
                    .trigger("on");


                this.listen(DOM_target);


            },


            listen : function(target)
            {


                window.onscroll = function()
                {

                    var currentY_value = window.scrollY,
                        lastChild = jQuery(target).children().not(".loading-bars").last()[0] || target
                    elementRect = target.getBoundingClientRect(),
                        scrollValue = $(window).scrollTop();


                    if (scrollValue >= ($(document).height() - $(window).height()) )
                    {
                        jQuery(target).trigger("on");
                    }
                    else if(currentY_value >= elementRect.bottom){

                        jQuery(target).trigger("on");

                    }



                }



            },


            video_load : function()
            {

                scoa_video_init('video:not(.scoa-video)',function(video)
                {

                    video.classList.add("scoa-video")

                });

            },



            get loading_bars()
            {

                var bars = [

                    '<div class="background-masker header-top"></div>',
                    '<div class="background-masker header-right"></div>',
                    '<div class="background-masker header-bottom"></div>',
                    '<div class="background-masker subheader-right"></div>',
                    '<div class="background-masker subheader-bottom"></div>',
                    '<div class="background-masker content-top"></div>',
                    '<div class="background-masker content-first-end"></div>',
                    '<div class="background-masker content-second-line"></div>',
                    '<div class="background-masker content-second-end"></div>',
                    '<div class="background-masker content-third-line"></div>',
                    '<div class="background-masker content-third-end"></div>',
                    '<div class="background-masker fourth"></div>',
                    '<div class="background-masker content-top one"></div>',
                    '<div class="background-masker content-first-end two"></div>',
                    '<div class="background-masker content-second-line tree"></div>',
                    '<div class="background-masker content-second-end four"></div>',
                    '<div class="background-masker content-third-line five"></div>',
                    '<div class="background-masker content-third-end six"></div>',
                    '<div class="background-masker fourth one"></div>'

                ].join("\n");

                var template = [

                    '<div class="social-feed-separated loading-bars">',
                    '<div class="social-avatar">',
                    '<div class="animated-background facebook loading-avatar-feed">',
                    '</div>',
                    '</div>',
                    '<div class="social-feed-box">',
                    '<div class="feed-element loading">',
                    '<div class="feed-item">',
                    '<div class="animated-background facebook">',
                    `${bars}`,
                    '</div>',
                    '</div>',
                    '</div>',
                    '</div>',


                ].join("\n");


                return [template,template,template].join("\n");

            },


        },

        post_box : {

            _call : function(selector)
            {

                let self = jQuery.scoa.post_box,
                    target = jQuery(selector),
                    overlay = self.listen(target),
                    postBoxElement = target.parent(".post-box");



                if(!target.length) return;

                target.each(function (index,element) {

                    element.onfocus = function()
                    {
                        overlay.trigger("on");
                    }

                    element.onblur = function ()
                    {
                        overlay.trigger("off");
                    }

                })


            },

            listen : function (target) {

                let overlay  = jQuery.scoa.post_box.overlayElement;

                return overlay.on("on",function()
                {

                    overlay.css({
                        "z-index" : "9999",
                        "background" : "#333333b8",
                        "width" : "100%",
                        "height" : "100%",
                        "position" : "fixed",
                        "top" : "0"
                    });

                    target.css({
                        "z-index" : "999999",
                        "position" : "relative"
                    })


                })
                    .on("off",function()
                    {

                        overlay.removeAttr("style");
                        target.removeAttr("style");

                    })






            },

            get overlayElement(){

                var div = document.createElement("div");
                div.className = "scoa-overlay";

                document.body.appendChild(div)

                return jQuery(div);

            },


        },

        images : {
            path : window.location.hostname.concat("/scoa/public/"),

            status : function(url)
            {
                const imgPromise = new Promise(function imgPromise(resolve, reject){

                    const imgElement = new Image();

                    imgElement.addEventListener('load',function imgOnLoad(){
                        resolve(this);
                    })

                    imgElement.addEventListener('error',function imgOnError(){
                        reject();
                    })


                    imgElement.src = url;


                })

                return imgPromise;
            },

            replace_image : function(image,element){

                let protocol = window.location.protocol,self = jQuery.scoa.images;
                element.src = protocol+"//"+self.path.concat("files/default_image/".concat(image));

            },

            image_status : function(src,callback_when_error){

                let self = jQuery.scoa.images;

                self.status(src).then(

                    function fulfilled(img){
                        return;
                    }, callback_when_error);


            },

            get profile() { return $('img.profile');},

            get covers() {return $('img.cover');},

            setProfile: function(){

                let self = jQuery.scoa.images;

                self.profile.each(function(index,element)
                {
                    self.image_status(element.src,function(){

                        // self.replace_image('blankprofile.jpg',element);

                    })
                })


            },


            setCover : function(){

                let self = jQuery.scoa.images;

                self.covers.each(function(index,element)
                {
                    self.image_status(element.src,function(){

                        self.replace_image('default.png',element);

                    })
                })

            },



            load : function()
            {
                let self = jQuery.scoa.images;
                self.setProfile();
                self.setCover();

            }


        },


        alert : {


            warning : function(options = {body : "example body"})
            {
                return jQuery.scoa.alert.check("warning",options);
            },

            info : function(options = {body : "example body"})
            {
                return jQuery.scoa.alert.check("info",options);
            },

            check : function(type,options)
            {

                if(Object.prototype.toString.call(type) !== "[object String]"){
                    return;
                }

                let result,root = jQuery.scoa.alert;

                if(Object.prototype.toString.call(options) === "[object Object]")
                {
                    result = root.params(options).setTokens({type : type.toString()});
                }

                return (root.clear_uncessary(result));

            },

            params : function(object){

                let type,
                    template_root = jQuery.scoa.alert.templates,
                    source = template_root.source,
                    structure = template_root.default_structure ;



                let every,keys = Object.keys(object);

                for (let index in keys) {

                    let temp_token = new Object()
                        ,token = new Object()
                        ,every = keys[index];

                    if(source.hasOwnProperty(every)) {

                        temp_token[every] = object[every];
                        token[every] = source[every].setTokens(temp_token);
                        structure = structure.setTokens(token)

                    }
                }

                return structure;

            },

            clear_uncessary : function(result_string) {

                let source = jQuery.scoa.alert.templates.source,
                    keys = Object.keys(source),
                    token = new Object();

                for (let index in keys) {
                    token[keys[index]] = '';
                    result_string = result_string.setTokens(token);
                }
                return result_string;

            },
            get templates(){

                return {

                    source : {
                        parent : `<div class="alert alert-{type} alert-dismissable" style="background-color: #fdfdfde0">{contents}</div> `,
                        button : `<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> `,
                        icon : `<i class="fa {icon} animated wobble" style="font-size: 15px"></i>&nbsp; `,
                        title : `<a href="" class="alert-link">{title}. </a> `,
                        body : `{body} `,
                        link : `<a href="{link}">Let us know</a> `,
                    },

                    get default_structure() {
                        let root = jQuery.scoa.alert.templates.source;

                        let base = root.parent.setTokens({contents : "{button}{icon}{title}{body}{link}"});
                        return base.setTokens({body : root.body});

                    }
                };

            }
        },

        _generateRandomColors : function () {

            var letters = "0123456789ABCDEF".split(''),
                color = "#";

            for(var i = 0; i < 6; i++)
            {
                color+=letters[Math.floor(Math.random() * letters.length)];
            }

            return color;

        }


    }


    /**
     * @deprecated see prototypes below
     * @type {{removeAttr: (function(*, ...[*]): *), addClass: (function(*, ...[*]): Window.scoa), removeClass: (function(*, ...[*]): Window.scoa), replaceBy: (function(*, *): string), showHiddens: Window.scoa.showHiddens, removeLoadings: Window.scoa.removeLoadings, loading: Window.scoa.loading, caller: (function(*, ...[*]): Window.scoa), jQuery: (function(...[*]): any[]), TryCatch: Window.scoa.TryCatch, isEmpty: Window.scoa.isEmpty, documentReady: Window.scoa.documentReady, addSripts: Window.scoa.addSripts}}
     */

    window.scoa = {

    removeAttr : function(element,...args) {

        const remove = function(item) {
            element.removeAttribute(item);
        };

        args.forEach(remove);

        return element;

    },

    get page(){

        const root = this;

        const pathname = window.location.pathname,
            byGroup = pathname
                .split("/")
                .filter(Boolean);


        const get = {

            get parent() {

                return root.TryCatch(() => byGroup[2] || "" , () => "");

            },

            get methodOf() {

                return root.TryCatch(() => byGroup[3] || "" , () => "");

            },


            get parameterOf() {

                return root.TryCatch(() => byGroup[4] || "" , () => "");

            },

            get parent_url() {

                return "/SCOA/public/" + this.parent + "/";

            },

        };


        return get;

    },

    addClass : function(element,...classes) {

        if(!(element instanceof Array))

            element = [element];

        const add = function(targetEle) {

            classes.forEach(function (item) {

                if(!targetEle.nodeType) return;
                const alreadyAddedClass = targetEle.className || "";
                targetEle.className = alreadyAddedClass +" "+ String(item);

            });

        };

        element.forEach(add);

        return this;

    },

    removeClass : function(element,...  classes) {


        if(!(element instanceof Array))

            element = [element];

        const add = function(targetEle) {

            classes.forEach(function (item) {

                if(!targetEle.nodeType) return;

                targetEle.classList.remove(item);

            });


        };

        element.forEach(add);

        return this;

    },

    replaceBy : function(template,replacePairs) {

        let str = template.toString(), key, re;

        for (key in replacePairs) {

            if(!isNaN(key)) key = "\\"+key;

            re = new RegExp("\{" + key + "\}", "gm");
            str = str.replace(re, replacePairs[key]);

        }
        return str;

    },

    showHiddens : function(hiddenClass = "hiddenBy") {

        const hiddens = document.querySelectorAll("."+hiddenClass);

        hiddens.forEach(function(element) {
            const classList = element.classList;
            classList.remove(hiddenClass);
        });

    },

    removeLoadings : function (loadingClass = "loadingBy") {

        const hiddens = document.querySelectorAll("."+loadingClass);

        hiddens.forEach(function(element) {
            element.remove();
        });

    },

    loading : function(loadingClass = "load") {

        const hiddens = document.querySelectorAll("."+loadingClass);

        console.log(hiddens);


    },

    caller : function(object,...propertys) {

        const call = function(item) {

            if(!object.hasOwnProperty(item) || !item)

                throw new Error("Not found property of " + item);

            const returne = object[item]();
            object = returne;
        }

        propertys.forEach(call);
        return this;

    },

    jQuery : function(...attr) {

        if(!window.hasOwnProperty("jQuery"))

            throw new Error("jQuery plugin not found");

        return attr.map(function(ele) {
            const element =  jQuery(ele);
            const nonChar = String(ele).replace(/\W/gm,"");
            window[nonChar] = element;
            return element;

        });

    },

    TryCatch : function(resolve,reject) {

        try {
            return resolve();
        }catch(err) {
            return reject(err);
        }

    },

    isEmpty : function(data) {

        const typeOfData = typeof data;
        const NOTHING = null;

        switch (true) {

            case typeOfData === "string" :

                return String(data).replace(/\s/gm,"") ? false : true;

                break;

            case typeOfData === "object" :

                if(data instanceof Array)

                    return data.length ? false : true;

                return Object.keys(data).length ? false : true;

                break;

            case typeOfData ===  "number" :

                return true;

                break;


            default :

                return false;

                break;


        }


    },

    documentReady : function(callBack) {


        try {

            window.onload = callBack;

        }catch (e) {

            throw new Error(e);

        }

    },

    define : function(protoType,name,callBack) {

        Object.defineProperty(protoType,name,{

            enumerable : false,
            value : callBack

        });


    },

    hasClass : function(element,_class) {

        return element.classList.contains(_class);

    },

    hasOwnProperty : function(object,...propertys) {

        const call = function(item) {

            if(!object.hasOwnProperty(item) || !item) {

                console.warn("Not found property of " + item);

                return false;

            }

            if(typeof object[item] === "function")

                object = object[item]();

            else if(typeof object[item] === "object" && !typeof object[item] instanceof Array)

                object = object[item];

            return true;

        }

        return propertys.every(call);

    },

    defaultAttributes : function(object,_defaults) {

        if(this.checkType(object) !== "object")

            throw new Error("target value to be assigned as default is not valid Object");

        return Object.assign(object,_defaults);

    },

    hideBody : function() {

        scoa.addClass("body"._getTag(),"display-none");

        return this;

    },

    showBody : function() {
        scoa.removeClass("body"._getTag(),"display-none");

        return this;

    },

    concat : function(...args) {

        return args.reduce((on,item) => {

            return on.concat(String(item));

        },"");

    },

    endsWith : function(target,ends) {

        if(target) return String(target).concat(ends);

        return "";

    },

    promise : function(callBack) {

        return new Promise(callBack);

    },

    checkType : function(value) {

        const typeOfData = typeof value;

        if(typeOfData === "object") {

            if(value instanceof Array)

                return "array";

            return "object";

        }


        return this.TryCatch(function() {

            return typeof JSON.parse(value);

        },function() {

            return typeOfData;

        })

    },

    checkObject : function(obj) {

        const root = this;
        const newObj = {};

        if(this.checkType(obj) !== "object")

            throw new Error("Parameter 1 not valid as object type");

        Object.keys(obj).forEach(function(e) {

            newObj[e] = root.checkType(obj[e]);

        });

        return newObj;

    },

    isJquery : function(element) {

        return element && (element instanceof jQuery || element.constructor.prototype.jquery);
    },

    isNodeType : function(element,doc) {

        return (doc || document).body.nodeType === Node.ELEMENT_NODE
    },

    toJquery : function(queryElement) {

        const type = this.checkType(queryElement);

        if(!this.isJquery(queryElement)) {

            switch (true) {

                case type === "string" :

                    return jQuery(queryElement);
                    break;

                case this.isNodeType(queryElement) :

                    return jQuery(queryElement);
                    break;

                default :

                    throw new Error('Your target element is not valid syntax');
                    break;
            }

        }

        return queryElement;

    },

    loop : function(array,callBack) {

        if(typeof callBack !== "function") return;

        for(let index = 0; index < array.length; index++) {

            const value = array[index];
            const response = callBack(value,index);

            if(response) return response;

        }

        return false;

    },

    queryUsers : function(element,config) {

        const root = this;
        const init = {

            get usersHintParentCard() {

                return [
                    '<div class="ProfileCard def u-cf border-bottom">',
                    '<img ' +
                    'class="ProfileCard-avatar profile" ' +
                    'letters="{Firstname}" ',
                    'identifier="profile_user{user_url}" ',
                    '_src="/SCOA/public/files/profile/{profile}">',
                    '{card_details}',
                    '</div>',
                ].join("\n");

            },

            get usersHintCardDetails() {

                return [
                    '<div class="ProfileCard-details">',
                    '<div class="ProfileCard-realName">' +
                    '{Firstname} ' +
                    '{Middlename} ' +
                    '{Lastname}' +
                    '</div>',
                    '<div class="ProfileCard-screenName">@{user_url}</div>',
                    '<div class="ProfileCard-description">{description}</div>',
                    '</div>'
                ].join("\n");


            },

            get usersMainHint() {

                const partial =  this
                    .usersHintParentCard
                    .setTokens({
                        card_details : this.usersHintCardDetails
                    });


                return partial.setTokens({
                    description : [
                        "<small>",
                        "{CP}",
                        "</small>",
                        "<p>",
                        "<small>",
                        "last active : {last_active}",
                        "</small>",
                        "</p>"
                    ].join("\n")
                });

            },

            get request() {

                const users =  new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('user_url'),
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    remote : {
                        url: config.url.concat("/%QUERY"),
                        wildcard: '%QUERY',
                    }

                });

                users.initialize();

                return users;

            }

        };

        config = Object.assign({
            source: init.request,
            templates : {
                suggestion : function(item) {

                    return init.usersMainHint.setTokens({
                        Firstname : item.Firstname,
                        Middlename : item.Middlename,
                        Lastname : item.Lastname,
                        user_url : item.user_url,
                        description : item.about || "",
                        profile : item.profile,
                        CP : item.CP,
                        last_active : item.last_active || "<strong class='text-navy'>online</strong>"
                    });

                }
            }

        },config);


        return this
            .toJquery(element)
            .typeahead(null,config);

    },

    Querfy : function(objTo,arrayToGetOnly) {

        const __obj = {};

        if(this.checkType(arrayToGetOnly) !== "array")

            throw new Error("Parameters 2 not valid array");


        if(this.checkType(objTo) !== "object")

            throw new Error("Parameters 1 not valid object");

        arrayToGetOnly.forEach(function (e) {

            if(!objTo.hasOwnProperty(e)) return;

            __obj[e] = objTo[e];

        });


        return __obj;

    },

    updateKeys : function(objTo,objBase) {

        const root = this;

        if(this.checkType(objBase) !== "object")

            throw new Error("Parameters 1 not valid object");


        if(this.checkType(objTo) !== "object")

            throw new Error("Parameters 1 not valid object");


        Object.keys(objBase).forEach(function (value) {

            const isSpecified = objTo.hasOwnProperty(value);

            if(!isSpecified) return;

            const currItem = objBase[value];

            if(root.checkType(currItem) !== "string")

                throw new Error("Not valid string type");

            objTo[currItem] = objTo[value];

            delete objTo[value];

        });

        return objTo;

    },

    dataAttributes : function(element) {

        const root = this;

        const target = this.toJquery(element);
        const attributes = target
            .find("scoa_attr[type]")
            .get();

        const obj = {};

        attributes.forEach(function(e) {

            const attr = jQuery(e).attr("type");
            const value = jQuery(e).text();

            if(root.isEmpty(attr)) return;
            if(root.isEmpty(value)) return;

            obj[attr] = value;

        });

        return obj;

    },

    getServerTemplate : function(Obj) {

        if(this.checkType(Obj) !== "object")

            throw new Error("Invalid type parameter 1 Object required");

        const newObj = Object.assign(new Object(),Obj);

        if(!this.hasOwnProperty(newObj,"template_url","data","template_variable"))

            throw new Error("Invalid attributes at Object");


        if(this.checkType(newObj['data']) !== "object")

            throw new Error("Invalid type of Object attrbute 'data' should be Object");


        newObj['data'] = JSON.stringify(newObj['data']);
        newObj['template_url'] = this.concat(
            "../../SCOA/public/included_template/",
            newObj["template_url"]
        ) ;


        const request_path = this.page.parent_url+"getTemplate";

        return new Promise(function(resolve) {

            jQuery.post(request_path,newObj,function(res) {
                resolve(res);
            });

        });

    },

    getContainer : function(isJquery = false) {

        return "content"._getClass(isJquery);

    },

    get localStorage () {

        const root = this;

        function encodedByType(value) {

            const type = root.checkType(value);

            if(type === "array" || type === "object")

                return btoa(JSON.stringify(value));

            return btoa(value);

        }

        const init = {

          get of() {

            return localStorage;

          },

          get all() {

              const root = this;
              const all = this.getItem("cache_identifier");

              let obj = {};

              all.forEach(function(e) {

                  if(!root.isExist(e)) {
                      obj[e] = [];
                      return;
                  }

                  obj[e] = root.getItem(e);
              });

              return obj;

          },

          get org_members() {

              return this.getOf("org_members");

          },

          get profiles() {

              return this.getOf("profiles");

          },

          get groups() {

              const key = "scoa_group_information";

              const init_root = this;

              const is_valid_parameters = function (item) {

                  const type = root.checkType(item);

                  if(type !== "object")

                      throw new Error("Parameter is not an object type");

                  const valid_params =  root.hasOwnProperty(item,
                      "id",
                      "name",
                      "details",
                      "group_type",
                      "orgID",
                      "isUpdated_RCode",
                      "create_date_time",
                      "had_renew"
                  );


                  if(!valid_params)

                      throw new Error("Object is not valid parameters");

                  const types_of_params = root.checkObject(item);


                  if(types_of_params.id !== "number")

                      throw new Error("Id is not a number type");

                  if(types_of_params.name !== "string")

                      throw new Error("name is not a string type");

                  if(types_of_params.orgID !== "number")

                      throw new Error("orgID is not a number type");

                  if(types_of_params.isUpdated_RCode !== "boolean")

                      throw new Error("isUpdated_RCode is not a boolean type");

                  if(types_of_params.had_renew !== "boolean")

                      throw new Error("had_renew is not a boolean type");

                  return true;

              };


              const obj = {

                  get all() {

                      return init_root.getOf(key)

                  },

                  save : function(item) {

                      const inner_root = this;

                      return root.TryCatch(function() {

                          if(!is_valid_parameters(item)) return;

                          if(!inner_root.checkExist(item.id)) return inner_root.add(item);

                          const index = inner_root.index(item.id);

                          const update = inner_root.all;
                          update[index] = item;
                          init_root.save(key,update);

                          return update;

                      },() => false);

                  },

                  add : function (item) {

                      if(!is_valid_parameters(item)) return;

                      if(this.checkExist(item.id))

                          throw new Error("The Object is already been added");

                      item["request"] = 0;

                      const all = this.all;

                      all.push(item);
                      init_root.save(key,all);

                      return item;

                  },

                  index : function(id) {

                      const index =  this.all.findIndex(function(e){

                          return root.TryCatch(function() {

                              if(!is_valid_parameters(e)) return;

                              return e.id == id;

                          },() => false);

                      });

                      return index;
                  },

                  checkExist : function (id) {

                      return this.index(id) > -1;

                  },

                  remove : function(id,data) {

                      data = (data || this.all).filter(function(e) {
                          return e.id != id;
                      });

                      init_root.save(key,data);

                      return data;

                  },

                  states : function(data) {

                      data = (data || this.all).filter(function(e) {
                          return e.request < 5;
                      });

                      init_root.save(key,data);
                      return data;
                  },

                  requestToServer : function(id) {

                      //SecurityRisk

                      const request = scoa.concat(root.page.parent_url,"getGroup/",id);

                      return new Promise(function(resolve,reject) {

                          jQuery.get(request,function(response) {

                              response = String(response)._noDoubleSpace();

                              if(root.checkType(response) !== "object") return reject(response);

                              response = response._toJSON();

                              resolve(response);

                          });

                      });


                  },

                  asyncRequest : function(id) {

                      const inner_root = this;

                      return new Promise(function(resolve) {

                          const information = inner_root.get(id);

                          if(!root.isEmpty(information)) return resolve(information[0]);


                          /** request from server **/

                          const response = function(result) {

                              const hasValid = root.hasOwnProperty(result,
                                  "member_code",
                                  "had_renew",
                                  "name",
                                  "create_date_time",
                                  "isUpdated_RCode",
                                  "renewalId",
                                  "orgID",
                                  "group_type",
                                  "details"
                              );

                              if(!hasValid) resolve({});

                              let response = scoa.updateKeys(result,{
                                  "renewalId" : "id"
                              });


                              const value =  scoa.Querfy(response,[
                                  "member_code",
                                  "had_renew",
                                  "name",
                                  "create_date_time",
                                  "members",
                                  "isUpdated_RCode",
                                  "id",
                                  "orgID",
                                  "group_type",
                                  "details"
                              ]);

                              inner_root.save(value);

                              resolve(value);

                          };

                          inner_root
                              .requestToServer(id)
                              .then(response).catch(function(e) {
                                  throw new Error(e);
                              });


                      })

                  },

                  get : function(id) {

                      let data = this.all.filter(function(e) {
                          return e.id == id;
                      });

                      data = data.map(function(e) {
                          const request = e.request;
                          e.request = request + 1;
                          return e;
                      });



                      return this.states(data);

                  },

                  clear : function () {
                      init_root.remove(key);
                      return this.all;
                  }

              }

              return obj;

          },



          getOf : function(identifier) {

              const isSpecified = localStorage.hasOwnProperty(identifier);

              if(!isSpecified) return [];

              return this.getItem(identifier);

          } ,

          reset : function() {

              const root = this;
              const all = this.getItem("cache_identifier");

              all.forEach(function(e) {
                  localStorage.removeItem(e);
              });

              return localStorage;

          },

          save : function (id,value) {

              if(this.isExist(id)) this.remove(id);

              this.addId(id);
              localStorage.setItem(id,encodedByType(value));

          },

          addId : function(id) {

              let _identifiers = [];

              if(this.isExist("cache_identifier"))

                  _identifiers = this.getItem("cache_identifier");

              const exist = _identifiers.indexOf(id) > -1;

              if(exist) return;

              _identifiers.push(id);

              const value = btoa(JSON.stringify(_identifiers));

              localStorage.setItem("cache_identifier",value);

          },

          isExist : function(key) {

              return localStorage.hasOwnProperty(key);

          },

          getItem : function (key) {

              let item = localStorage.getItem(key);

              if(!item) throw new Error("Uknown property of " + key + " from localStorage");

              item = item._base64decoded();

              return root.TryCatch(function() {

                  return JSON.parse(item);

              },() => item);

          },

          remove : function (key) {

              localStorage.removeItem(key);

          },

          update : function(id,callBack) {

              const init_root = this,
                  value = this.getItem(id),
                  type = root.checkType(value);

              this.remove(id);

              const filter = function() {

                  if(type === "array")

                      return value.map(callBack);

                  if(type === "object")

                      return Object
                          .keys(value)
                          .map(e => callBack(value[e]));

                  return callBack(value);

              };

              this.save(id,filter().filter(Boolean));

          },



        };

        return init;

    },

    get users() {

        const root = this;

        const init = {

            get encodedCurrentUser() {

                return "scoa_auth"
                    ._getContent()
                    ._base64decoded();

            },

            isCurrentUser : function(id) {

                const currentUser = this
                    .encodedCurrentUser
                    ._toJSON();

                if(root.isEmpty(currentUser))

                    throw new Error("Current user not specified");

                if(!root.hasOwnProperty(currentUser,"id","Firstname","Middlename","Lastname"))

                    throw  new Error("Invalid supplied of data");

                return id == currentUser.id;

            },

            _get : function(id,state = 0) {

                const init_root = this;

                return root.promise(function(resolve) {

                    if(init_root.isCurrentUser(id))

                        return resolve(init_root
                            .encodedCurrentUser
                            ._toJSON());


                    const attribute = {id : id,state : state},
                        path = "/SCOA/public/"+root.page.parent+"/getUser";

                    jQuery.post(path,attribute,function(response) {

                        response = response
                            ._base64decoded()
                            ._toJSON();

                        return resolve(response);

                    })

                });





            },

            get currentUser() {

                const root = this;

                return root.promise(function(resolve) {

                    const requestUrl = "/SCOA/public/" + root.page.parent;

                    jQuery.post(requestUrl+"/currentUserDetails",function(data) {

                        const arr = data._toJSON();
                        resolve(arr);

                    });

                });

            },

        };

        return init;

    },

    main : function() {

        const root = this;

        const types = {

            String : function() {

                const protoType = String.prototype;
                const nodeQuery = {

                    node : document,
                    query : "#",
                    value : null,
                    isJquery : false,

                    get get() {

                        const query = String(this.query).concat(this.value);
                        const returne = this.isJquery
                            ? root.jQuery(query)
                            : (this.node || document).querySelectorAll(query);

                        if(returne.length === 1) return returne[0];
                        return returne;

                    }

                };


                root.define(protoType,"_getId",function(IsJquery = false,val) {

                    nodeQuery.node = val;
                    nodeQuery.value = this;
                    nodeQuery.query = "#";
                    nodeQuery.isJquery = IsJquery;
                    return nodeQuery.get;

                });

                root.define(protoType,"_getClass",function(IsJquery = false,val) {

                    nodeQuery.node = val;
                    nodeQuery.query = ".";
                    nodeQuery.value = this;
                    nodeQuery.isJquery = IsJquery;
                    return nodeQuery.get;

                });

                root.define(protoType,"_getTag",function(IsJquery = false,val) {

                    nodeQuery.node = val;
                    nodeQuery.query = "";
                    nodeQuery.value = this;
                    nodeQuery.isJquery = IsJquery;
                    return nodeQuery.get;

                });

                root.define(protoType,"_noDoubleSpace",function () {
                    return String(this).replace(/\s\s/gm,"");
                })

                root.define(protoType,"_toggleClass",function (...elements) {

                    const _class = "display-none";

                    elements.forEach(function(value) {

                        const EveryEle =  document.querySelectorAll(value);

                        EveryEle.forEach(ele => {

                            if(root.hasClass(ele,_class)) {

                            root.removeClass(ele,_class);
                            return;

                        }

                        root.addClass(ele,_class);
                    })

                    });

                    return this;

                });

                root.define(protoType,"_strCut",function (length = 3,replacement = "...") {

                    let str = this.slice(0,length);

                    if(this.length >= length) str+=String(replacement);

                    return str;

                });

                root.define(protoType,"_base64decoded",function () {

                    try {

                        return atob(this);

                    }catch (e) {

                        console.log(String(this));

                    }


                });

                root.define(protoType,"_getContent",function () {

                    return this._getId().innerText;

                });

                root.define(protoType,"_getItemFromLocal",function () {

                    return root.localStorage.getOf(this);

                });


            },

            Array : function () {

                const prototype = Array.prototype;

                root.define(prototype,"searchObject",function(ObjectSearch) {

                    if(root.checkType(ObjectSearch) !== "object")

                        throw new Error("Not valid Object");

                    const keys = Object.keys(ObjectSearch);

                    return this.findIndex(function(e) {

                        if(root.checkType(e) !== "object") return;

                        return keys.every(function (search) {

                            if(!e.hasOwnProperty(search)) return;

                            const itemValue = String(e[search]).toLowerCase();
                            const searchValue =  String(ObjectSearch[search]).toLowerCase();

                            return itemValue === searchValue;

                        })

                    })

                });



            }

        };

        types.String();
        types.Array();

    }

};




    window.scoa.main();
    window.$$ = window.scoa;


    /** check jQuery plugin is added **/

    if (!window.hasOwnProperty("jQuery"))
    {
        console.warn("jQuery has not been initialize!!");
        return;
    }



    /** check _scoa is already initialize **/

    window._ = jQuery, $_ = $.fn;

    if(!$_.hasOwnProperty("_scoa"))
    {

        jQuery._scoa = function(options = new Object())
        {
            return new _scoa(options);
        }


        $.fn._scoa = function (options = new Object()) {

            return new _scoa(options);

        }

    }


}));




/** To prevent a form submitting again when refresh **/

if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href)
}
