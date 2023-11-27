<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="m-0 font-weight-bold text-primary">Cargar archivo nuevo</h6>
                    </div>
                </div>
                <form action="{{ route('load.store') }}" enctype="multipart/form-data" method="POST">
                    <div class="card-body border-left-primary">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Descripción:</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" aria-describedby="Descripción" placeholder="Descripción">
                                    @error('name')
                                        <small class="text-danger">*El campo Descripción es obligatorio.</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Archivo:</label>
                                <div class="custom-file">                                    
                                    <input type="file" class="custom-file-input" id="file" name="archivo">
                                    <label class="custom-file-label" for="file">Elegir archivo</label>
                                </div>
                                @error('archivo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>