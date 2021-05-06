(function () {

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




    
    const reports = {

        url : null,

        isNotImportant  : function(_col) {

            /** check if all fields is empty **/

            const not_emptys = _col.filter(e => e.value);

            if(!not_emptys.length) return true;

            /** @end **/

            const filter = function(cell) {

                if(!cell.hasOwnProperty("cssVal") || cell.css === "")

                    return false;


                const check_css = function(_class) {

                    if(_class === "background" && cell.cssVal[_class] === "#FFFFFF") return false

                    const check_valid = _class == "text-align" || _class == "color";

                    if(check_valid) return false;

                    return cell.cssVal[_class];

                }

                return Object
                    .keys(cell.cssVal)
                    .filter(check_css)
                    .length;

            }


            return _col
                .filter(filter)
                .length;

        },

        toStyle : function(style) {

            return Object.keys(style)
                .map(e => e+":"+(style[e]))
                .join(";");

        },

        get getData() {

          const root = this;

          return new Promise(function (resolve, reject) {

              const sourceURL = "/SCOA/public/"+currentPage()+"/getUnformattedData";
              $.post(sourceURL,{url : root.url },function(data) {

                  console.log(data);

              });

          });

        },

        main : function(token) {

          token = String(token).replace(/\s/gm,"");

          if(!token)

              throw new Error("Invalid token");

          this.url = token;


      }

    };



    /** check dependencies **/


    /** lodash.js **/

    if(!["_","VERSION"]._checkIfHasProperyOf(window)) return;

    /** numeral.js **/

    if(!["numeral"]._checkIfHasProperyOf(window)) return;

    /** jQuery.js **/

    if(!["jQuery"]._checkIfHasProperyOf(window)) return;


    window.reports = reports.main;


})();