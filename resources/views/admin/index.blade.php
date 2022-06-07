@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <canvas id="graph1" class="graph"></canvas>
        </div>
        <div class="col-lg-6">
            <canvas id="graph2" class="graph"></canvas>
        </div>
    </div>
@stop


@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
    <script>
        const graph1 = document.getElementById('graph1')
        const graph2 = document.getElementById('graph2')

        const etiquetas = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct",
            "Nov", "Dic"
        ]
        const data_lastYear = {
            label: "Año anterior",
            data: [5000, 1500, 8000, 5102, 10],
            backgroundColor: '#D6D6D6',
            borderColor: '#C1BEBD',
            borderWidth: 1
        }

        const data_currentYear = {
            label: "Año Actual",
            data: [4200, 2000, 5000, 3102],
            backgroundColor: '#2E9EFF ',
            borderColor: '#2297FC',
            borderWidth: 1,
        }

        const chart1 = new Chart(graph1, {
            type: 'bar',
            data: {
                labels: etiquetas,
                datasets: [
                    data_currentYear,
                    data_lastYear
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }, ]
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                        align: 'end',
                    },
                    title: {
                        display: true,
                        text: 'VENTAS',
                        position: 'top',
                        align: 'start',
                        padding: {
                            bottom: 25
                        }
                    }
                }
            }

        })

        const chart2 = new Chart(graph2, {
            type: 'bar',
            data: {
                labels: etiquetas,
                datasets: [
                    data_currentYear,
                    data_lastYear
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }, ]
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                        align: 'end',
                    },
                    title: {
                        display: true,
                        text: 'VENTAS',
                        position: 'top',
                        align: 'start',
                        padding: {
                            bottom: 25
                        }
                    }
                }
            }

        })
    </script>
@stop

@section('css')
    <style>
        .graph {
            /* max-height: 500px;
                                            max-width: 900px; */
            padding: 20px 20px 10px;
            border-radius: 5px;
            background: #fff;
        }
    </style>
@stop
