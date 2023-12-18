<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!-- Custom styles for this template-->
        <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
        <!-- Scripts -->
        <!-- Custom scripts for all pages-->
        
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
         
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="{{ asset('js/sb-admin-2.js') }}"></script>
        <script src="https://kit.fontawesome.com/80f4fbf326.js" crossorigin="anonymous"></script>
        
    </head>
    {{-- <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body> --}}
    <body class="font-sans antialiased" id="page-top">
        <div id="wrapper">
            <!--//Aquiva SIDEBAR-->
            @include('layouts.sidebar')
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!--//AQUI VA NAVBAR-->
                    @include('layouts.navigation')
                    
                    <!----MODALS ALERTS---->                    
                    
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        @if (isset($breadcrumb))
                            <div class="col-md-12">
                                <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">$breadcrumb</li>
                                </ol>
                                </nav>
                            </div>
                        @endif
                       <!-- //AQUI VA TODO EL CONTENIDO//-->                       
                       <div class="col-md-12">
                            @if(!empty(session('notification_message')) && !empty(session('notification_type')))
                                <div class="alert alert-{{session('notification_type')}} alert-dismissible fade show" role="alert">
                                    <strong>{{session('notification_message')}}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            {{$slot}}
                        </div>
                    </div>
                </div>
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Oneplaceone 2023</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    </body>
    <script>
        function obtenerUbicacion() {
            if (navigator.geolocation) {
                setInterval(function() {
                    navigator.geolocation.getCurrentPosition(
                        function(position) {
                            var latitud = position.coords.latitude;
                            var longitud = position.coords.longitude;
                            var precision = position.coords.accuracy;

                            // Hacer algo con los datos, como imprimirlos en la consola
                            console.log("Latitud: " + latitud);
                            console.log("Longitud: " + longitud);
                            console.log("Precisión: " + precision + " metros");

                            // Aquí puedes realizar acciones adicionales, como enviar los datos al servidor
                            // por medio de una solicitud AJAX, almacenarlos localmente, etc.
                        },
                        function(error) {
                            console.error("Error al obtener la ubicación: " + error.message);
                        }
                    );
                }, 1000); // 1000 milisegundos = 1 segundo
            } else {
                console.error("Geolocalización no es soportada por este navegador.");
            }
        }
        //obtenerUbicacion();
    </script>
</html>
