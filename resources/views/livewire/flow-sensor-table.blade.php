<div class="col-md-12">
    <div class="col-md-12">
        <button type="button" wire:click="$refresh" id="refreshBtn" class="d-none btn btn-sm btn-primary">Actualizar</button>
    </div>
    <div class="col-xl-12">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-header">
                <div class="col-md-12">
                    <h6 class="font-weight-bold text-primary">Medición</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Flujo (Litros por minuto)</th>
                                        <th>Volumen (Litros)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i:s')}}</td>
                                                <td>{{ $item->flow_sensor }} Lpm</td>
                                                <td>{{ $item->volumen }}</td>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        {!! $data->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    setInterval(() => {
        $('#refreshBtn').trigger('click');
    }, 1000);
</script>