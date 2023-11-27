
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <!--div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div-->
            <div class="sidebar-brand-text mx-3">Gestor Inmobiliario</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Inicio</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Gestión
        </div>
        <!-- Nav Item - Utilities Collapse Menu -->        
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomers"
                    aria-expanded="true" aria-controls="collapseCustomers">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <span>Cargas</span>
                </a>
                <div id="collapseCustomers" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar" style="visibility: inherit">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('load.create') }}">Cargar archivo nuevo</a>
                        <a class="collapse-item" href="{{ route('load.index') }}">Archivos cargados</a>
                    </div>
                </div>
            </li>
        {{-- @hasanyrole('admin|administrador') --}}
            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdministracion"
                    aria-expanded="true" aria-controls="collapseAdministracion">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Administración</span>
                </a>
                <div id="collapseAdministracion" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#collapseAdministracion" style="visibility: inherit">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Administración:</h6>
                        <a class="collapse-item" href="#">Usuarios</a>
                    </div>
                </div>
            </li>
        {{-- @endhasanyrole --}}
    </ul>