

$(document).ready(function(){

    $(".links").each(function(i,x){




        if(this.href == window.location){

            $(this).parents("#links")[0].className = "active";

            //this.parents("#links").className = "active";

        }

    })

});