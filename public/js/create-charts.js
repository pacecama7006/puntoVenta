(function($) {
    var charts = {
        init: function() {
            // -- Set new default font family and font color to mimic Bootstrap's default styling
            /*Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';*/
            Chart.defaults.FontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.FontColor = '#292b2c';
            this.ajaxGetPostMonthlyData();
        },
        ajaxGetPostMonthlyData: function() {
            var urlPath = 'http://' + window.location.hostname + '/graficas/grafica_venta_mes';
            var request = $.ajax({
                method: 'GET',
                url: urlPath
            });
            request.done(function(response) {
                console.log(response);
                charts.createCompletedJobsChart(response);
            });
        },
        /**
         * Created the Completed Jobs Chart
         */
        createCompletedJobsChart: function(response) {
            var ctx = document.getElementById("vtaMensual");
            var myLineChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: response.mes, // The response got from the ajax request containing all month names in the database
                    datasets: [{
                        label: "Venta Mensual",
                        lineTension: 0.3,
                        backgroundColor: "rgba(75, 192, 192, 0.2)",
                        borderColor: "rgba(75, 192, 192)",
                        pointRadius: 5,
                        pointBackgroundColor: "rgba(75, 192, 192)",
                        pointBorderColor: "rgba(255,255,255,0.8)",
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(75, 192, 192)",
                        pointHitRadius: 20,
                        pointBorderWidth: 2,
                        data: response.venta_total_dato // The response got from the ajax request containing data for the completed jobs in the corresponding months
                    }],
                },
                options: {
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: true
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: response.max, // The response got from the ajax request containing max limit for y axis
                                maxTicksLimit: 5
                            },
                            gridLines: {
                                color: "rgba(0, 0, 0, .125)",
                            }
                        }],
                    },
                    legend: {
                        display: true
                    }
                }
            });
        }
    };
    charts.init();
})(jQuery);