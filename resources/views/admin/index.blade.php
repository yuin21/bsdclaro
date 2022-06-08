@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="graph_content">
                <canvas id="graph1"></canvas>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="graph_content">
                <select name="personal" id="select_personal" class="form-control graph_select"></select>
                <canvas id="graph2"></canvas>
            </div>
        </div>
    </div>
@stop


@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
    <script>
        const graph1 = document.getElementById('graph1')
        const graph2 = document.getElementById('graph2')
        const labels_months = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"]
        const year = {!! $year !!}
        const lastYear = {!! $lastYear !!}
        const ventasCurrentYear = {!! $ventas_currentYear !!}
        const ventasLastYear = {!! $ventas_lastYear !!}
        const parsed_ventasCurrentYear = parsedVentas(ventasCurrentYear)
        const parsed_ventasLastYear = parsedVentas(ventasLastYear)
        const currentYear_ventasXmeses = getTotalVentasXmes(parsed_ventasCurrentYear) // dataset
        const lastYear_ventasXmeses = getTotalVentasXmes(parsed_ventasLastYear) // dataset
        const currentYear_ventasXpersonal = getVentasXpersonal(parsed_ventasCurrentYear)

        // SELECT PERSONAL
        const select_personal = document.getElementById('select_personal')
        let optionsHTML = ''
        currentYear_ventasXpersonal.map(personal => {
            optionsHTML += `<option value="${personal.id}">${personal.nombre}</option>`
        })
        select_personal.innerHTML = optionsHTML
        select_personal.addEventListener('input', (e) => {
            if (chart2) {
                chart2.destroy()
            }
            renderGraph2(e.target.value)
        })

        // GRAPHS
        // Graph 1
        const dataset_lastYear = {
            label: "Año anterior " + lastYear,
            data: lastYear_ventasXmeses,
            backgroundColor: '#D6D6D6',
            borderColor: '#C1BEBD',
            borderWidth: 1
        }

        const dataset_currentYear = {
            label: "Año Actual " + year,
            data: currentYear_ventasXmeses,
            backgroundColor: '#2E9EFF ',
            borderColor: '#2297FC',
            borderWidth: 1,
        }

        const chart1 = new Chart(graph1, {
            type: 'bar',
            data: {
                labels: labels_months,
                datasets: [
                    dataset_currentYear,
                    dataset_lastYear
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

        // Graph 2
        let chart2
        if (currentYear_ventasXpersonal[0]) {
            renderGraph2(currentYear_ventasXpersonal[0].id)
        }

        function renderGraph2(personalId) {
            const index = currentYear_ventasXpersonal.findIndex(item => item.id == personalId)
            const dataset_graph2 = {
                label: "Año Actual " + year,
                data: currentYear_ventasXpersonal[index].TotalVentasXmes,
                backgroundColor: '#2E9EFF ',
                borderColor: '#2297FC',
                borderWidth: 1,
            }

            chart2 = new Chart(graph2, {
                type: 'bar',
                data: {
                    labels: labels_months,
                    datasets: [
                        dataset_graph2
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
                            text: 'VENTAS DE PERSONAL: ' + currentYear_ventasXpersonal[index].nombre,
                            position: 'top',
                            align: 'start',
                            padding: {
                                bottom: 25
                            }
                        }
                    }
                }
            })
        }

        // HELPERS
        function parsedVentas(ventas) {
            // agregar numero de mes a la lista de ventas
            const parsedVentas = ventas.map(item => {
                const date = new Date(item.fecha_registro)
                return {
                    mes: date.getMonth(),
                    ...item
                }
            })
            return parsedVentas
        }

        function getTotalVentasXmes(parsedVentas) {
            const data = []
            // sumar el total de ventas x mes
            for (let i = 0; i < 12; i++) {
                const totalMes = parsedVentas.filter(item => item.mes === i).reduce(
                    (previousValue, currentValue) => previousValue + currentValue.total,
                    0
                )
                data.push(totalMes)
            }
            return data
        }

        function getVentasXpersonal(parsedVentas) {
            //  obtener un array de ventas de cada personal
            const ventasXpersonal = {}
            for (let i = 0; i < parsedVentas.length; i++) {
                if (!ventasXpersonal[parsedVentas[i].bsd_personal_id]) {
                    ventasXpersonal[parsedVentas[i].bsd_personal_id] = []
                }
                ventasXpersonal[parsedVentas[i].bsd_personal_id] = ventasXpersonal[parsedVentas[i].bsd_personal_id]
                    .concat(
                        parsedVentas[i])
            }
            // formatear TotalVentasXmes x personal
            const personalIDs = Object.keys(ventasXpersonal)
            const ventasXpersonal_parsed = []
            personalIDs.forEach(personalId => {
                ventasXpersonal_parsed.push({
                    id: ventasXpersonal[personalId][0].bsd_personal_id,
                    nombre: `${ventasXpersonal[personalId][0].nom_personal} ${ventasXpersonal[personalId][0]
                        .ape_paterno} ${ventasXpersonal[personalId][0].ape_materno}`,
                    TotalVentasXmes: getTotalVentasXmes(ventasXpersonal[personalId])
                })
            });

            return ventasXpersonal_parsed
        }
    </script>
@stop

@section('css')
    <style>
        .graph_content {
            padding: 20px 20px 10px;
            border-radius: 5px;
            background: #fff;
            box-shadow: -2px 0px 10px rgba(169, 169, 169, 0.236);
        }

        .graph_select {
            margin-bottom: 20px;
        }
    </style>
@stop
