<!-- resources/views/livewire/flow-sensor-graph.blade.php -->

<div class="col-md-12">
    <div class="col-xl-12">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-header">
                <div class="col-md-12">
                    <h6 class="font-weight-bold text-primary">Gráfico en tiempo real</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-md-12">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    myChart = new Chart(
            document.getElementById('myChart'), {
                type: 'line',
                data: {
                    labels: @json($label),
                    datasets: [{
                        label: 'Sensor de flujo',
                        data: @json($datas),
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    },
                    responsive: true,
                    scales: {
                        x: {
                            stacked: true,
                        },
                        y: {
                            stacked: true
                        }
                    }
                }
            }
    );
    function fnFlowSensorChartUpdate() {
        $.ajax({
            url: "{{ route('update-flow-sensor-chart') }}",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Verifica si la respuesta contiene datos antes de actualizar el gráfico
                if (data.values.length > 0 || data.labels.length > 0 ) {
                    // Actualiza las etiquetas y los datos del gráfico con los datos recibidos
                    //myChart.data.labels = data.labels;
                    //myChart.data.datasets[0].data = data.values;
                    console.log('SE ACTUALIZO.');
                    // Actualiza el gráfico
                    //myChart.update();
                    addData(myChart,data.labels,data.values);
                    
                } else {
                    console.log('No hay datos para actualizar el gráfico.');
                }
            },
            error: function(error) {
                console.error('Error al obtener datos:', error);
            }
        });
    }

        // Llama a la función para obtener datos y actualizar el gráfico
        setInterval(() => {
            fnFlowSensorChartUpdate();    
        }, 1000);
        function addData(chart, label, newData) {
            chart.data.labels.push(label);
            chart.data.datasets.forEach((dataset) => {
                dataset.data.push(newData);
            });
            chart.update();
        }
</script>
