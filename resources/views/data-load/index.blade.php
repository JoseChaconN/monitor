<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="m-0 font-weight-bold text-primary">Informe Cargado</h6>
                    </div>
                </div>
                <div class="card-body border-left-primary">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Descripción:</label>
                                {{ $data->name }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Fecha Cargado:</label>
                                {{\Carbon\Carbon::parse($data->created_at)->format('d-m-Y H:i:s')}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Responsable carga:</label>
                                {{ $data->user_load->name }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a class="btn btn-success" href="{{ $data->getMedia('file-load')->last()->getUrl() }}" download="">Descargar Archivo</a>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardMap" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardMap">
                                    <h6 class="m-0 font-weight-bold text-primary">Mapa</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardMap" style="visibility: inherit">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div style="width: 100%;min-height: 800px;" id="mapViewer"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover table-stripped">
                                <thead>
                                    <tr>
                                        <th>Coordenadas</th>
                                        <th>Fecha</th>
                                        <th>Sensor de Flujo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->data_load as $item)
                                        <tr>
                                            <td>{{ $item->longitude.','.$item->latitude }}</td>
                                            <td>{{\Carbon\Carbon::parse($item->day)->format('d-m-Y').' '.$item->time}}</td>
                                            <td>{{ $item->flow_sensor }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhjRycJDyi9evO8MEvwH3V0tV5Kn5O6qw&callback=initMap&libraries=&v=weekly" defer></script>
    <script>
        puntos = @json($data->data_load);
        function initMap() {
            //-33.43997635912143, -70.58332584881887
            map = new google.maps.Map(document.getElementById("mapViewer"), {
                zoom: 14,
                center: { lat: parseFloat(-33.43997635912143), lng: parseFloat(-70.58332584881887) },
                mapTypeId: "satellite",
            });
            icono_url = '/img/red_point.png';
            icono={
                url:  icono_url,
                scaledSize: new google.maps.Size(10, 10)
            }
            $.each(puntos,function(index,value){
                    const marker = new google.maps.Marker({
                        position: new google.maps.LatLng(parseFloat(value['latitude']),parseFloat(value['longitude'])),
                        icon:icono,
                        map: map,
                    });
                }); 
            /*
                const imageBounds = {
                    north: -20.02904446674162,
                    south: -20.08403020574,
                    east: -69.22647328549225,
                    west: -69.3110297049431,
                };
                historicalOverlay = new google.maps.GroundOverlay(
                    "https://control.oneplaceone.com/images/FAENA_COMPLETA_ABRIL_2021.png",
                    imageBounds
                );
                historicalOverlay.setMap(map);
                $.each(puntos,function(index,value){
                    if(parseInt(value['pm10']) >= color_1_from && parseInt(value['pm10']) <= color_1_until){
                        icono_url = 'https://<?= $_SERVER['HTTP_HOST'] ?>/images/green_point.png';
                    }else if(parseInt(value['pm10']) >= color_2_from && parseInt(value['pm10']) <= color_2_until){
                        icono_url = 'https://<?= $_SERVER['HTTP_HOST'] ?>/images/yellow_point.png';
                    }else if(parseInt(value['pm10']) >= color_3_from && parseInt(value['pm10']) <= color_3_until){
                        icono_url = 'https://<?= $_SERVER['HTTP_HOST'] ?>/images/red_point.png';
                    }
                    icono={
                        url:  icono_url,
                        scaledSize: new google.maps.Size(10, 10)
                    }
                    const marker = new google.maps.Marker({
                        position: new google.maps.LatLng(parseFloat(value['y']),parseFloat(value['x'])),
                        icon:icono,
                        map: map,
                    });
                }); 
            */
        }
    </script>
</x-app-layout>