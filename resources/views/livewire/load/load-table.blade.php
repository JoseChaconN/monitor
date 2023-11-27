<div class="col-md-12">
    <div class="col-md-12">
        <form wire:submit="search">
            <input class="form-control" type="text" wire:model.live="search" placeholder="Buscar">
        </form>
    </div>
    <div class="col-md-12 mt-4">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Descripción</th>
                        <th>Fecha Cargado</th>
                        <th>Usuario</th>
                        <th>-</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($load as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i:s')}}</td>
                            <td>{{ $item->user_load->name }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('data-load.show',$item) }}">Ver Informe</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-12">
        {!! $load->links() !!}
    </div>
    {{-- Care about people's approval and you will be their prisoner. --}}
</div>
