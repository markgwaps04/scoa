

Array.prototype.toNestedArray = function(concat) {

    return this.reduce(function(by,current) {

        const target = [((concat || "").concat(current))]

        const findDepth = function(e){

            e = (e || by);


            const length =  e.length;

            if(e[e.length - 1] instanceof Array) {

                findDepth(e[e.length-1]);

            }
            else{

                e[e.length] = target;

            }

            return e;

        };

        return findDepth();


    },[]);

};


Array.prototype.addCSS = function() {

    const arr = this;


    arr.forEach(function(e) {
        let node = document.createElement("link");
        node.setAttribute("rel","stylesheet");
        node.setAttribute("src",e);
        document.head.appendChild(node);

    })


};