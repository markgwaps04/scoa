// Set new default font family and font color to mimic Bootstrap's default styling



function chart($val){

    Chart.defaults.global.data ={};
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';
    jQuery.ajax({
        'async' : false,
        'type' : "POST",
        'global' : false,
        'dataType' : "html",
        'url' :  "Welcome/piechart.php",
        'data' : {status : $val},
        'success' : function(data){
            console.log(data);
            data = JSON.parse(data.trim());

            $("#myPieChart").remove();
            $(".yuiks").append('<canvas id="myPieChart" width="100%" height="100%"></canvas>');

            var ctx= document.getElementById("myPieChart");
            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: data.City,
                    datasets: [{
                        data: data.Value,
                        backgroundColor: data.Color,
                    }],
                },
            });

        }
    });
}




chart(1);


