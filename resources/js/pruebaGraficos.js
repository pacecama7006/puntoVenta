$(function() {
    var varCompra = document.getElementById('compras').getContext('2d');
    var charCompra = new Chart(varCompra, {
        type: 'line',
        data: {
            labels: [<?php foreach ($comprasmes as $reg)
                        {

                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                    $mes_traducido=strftime('%B',strtotime($reg->mes));

                    echo '"'. $mes_traducido.'",';} ?>],
            datasets: [{
                label: 'Compras',
                data: [<?php foreach ($comprasmes as $reg)
                            {echo ''. $reg->totalmes.',';} ?>],
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 3
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var varVenta = document.getElementById('ventas').getContext('2d');
    var charVenta = new Chart(varVenta, {
        type: 'line',
        data: {
            labels: [<?php foreach ($ventasmes as $reg)
                {
                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                    $mes_traducido=strftime('%B',strtotime($reg->mes));

                    echo '"'. $mes_traducido.'",';} ?>],
            datasets: [{
                label: 'Ventas',
                data: [<?php foreach ($ventasmes as $reg)
                        {echo ''. $reg->totalmes.',';} ?>],
                backgroundColor: 'rgba(20, 204, 20, 1)',
                borderColor: 'rgba(54, 162, 235, 0.2)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var varVenta = document.getElementById('ventas_diarias').getContext('2d');
    var charVenta = new Chart(varVenta, {
        type: 'bar',
        data: {
            labels: [
                @php
                foreach($ventasdia as $ventadia) {
                    echo $ventadia - > dia;
                }
                @endphp
            ],
            datasets: [{
                label: 'Ventas',
                data: [
                    @php
                    foreach($ventasdia as $reg) {
                        echo $reg - > totaldia;
                    }
                    @endphp
                ],
                backgroundColor: 'rgba(20, 204, 20, 1)',
                borderColor: 'rgba(54, 162, 235, 0.2)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
});