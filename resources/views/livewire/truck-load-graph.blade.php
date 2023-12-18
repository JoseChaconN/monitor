<div class="col-md-12">
    <div class="col-xl-12">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-header">
                <div class="col-md-12">
                    <h6 class="font-weight-bold text-primary">Volumen (3000 Litros base | <span id="remainingLiters">3000 Litros restantes</span>)</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-md-12">
                        <canvas id="truckLoadChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    myLineChart = new Chart(
        document.getElementById('truckLoadChart'), {
            type: 'bar',
            data: {
                labels: ['Carga restante'],
                datasets: [{
                    label: 'Litros restante',
                    data: [3000],
                    backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                    'rgb(75, 192, 192)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                y: {
                    beginAtZero: true
                }
                }
            },
        }
    );
    function fnTruckLoadChartUpdate() {
        $.ajax({
            url: "{{ route('update-truck-load-chart') }}",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Verifica si la respuesta contiene datos antes de actualizar el gráfico
                $('#remainingLiters').html(data.values+' Litros restantes')
                myLineChart.data.datasets[0].data[0] = data.values; // Would update the first dataset's value of 'March' to be 50
                myLineChart.update();
            },
            error: function(error) {
                console.error('Error al obtener datos:', error);
            }
        });
    }
    setInterval(() => {
        fnTruckLoadChartUpdate()
    }, 1000);
</script>