<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icon -->
    <link rel="shortcut icon" href="/storage/viaggio.png">

    <title>
        @yield('title')
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/d9e6b5e683.js" crossorigin="anonymous"></script>

    <!-- SweetAlertjs -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">

    <!-- Other Styles -->

    <style>
        html {
            height: auto;
        }

        body {
            height: inherit;
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
            font-weight: bold;
        }

        header {
            height: inherit;
        }

        main {
            height: inherit;
        }

        footer {
            height: inherit;
            background-color: white;
            color: #d1d8e0;
            position: relative;
            bottom: 0;
            left: 0;
            width: 100%;
            opacity: 1;
        }

        footer i {
            color: #badc58;
            font-size: 25px;
        }

        footer .nav-link {
            color: black;
        }

        img[alt=logo] {
            height: 100%;
            width: 300px;
        }
    </style>
</head>
<body>
    <header class="sticky-top">
        @yield('header')    
    </header>
    <main class="">
        @yield('content')    
    </main>    
    <footer>
        <div class="d-flex justify-content-center pt-5">
            <div class="container">
                <!-- Bienvenida -->
                <div class="col-7 mx-auto">
                    <div class="row justify-content-center">
                        <div class="col-7">
                            <img src="/storage/viaggio-gris.png" alt="logo">
                        </div>
                        <div class="col-7">
                            <p>Al suscribirte se te abre un mundo de posibilidades para conocer loque hacen otras personas cuando viajan y llenarte de ideas para tu proximo viaje</p>
                        </div>
                    </div>
                </div>
                <!-- Ayuda -->
                <div class="col-7 mx-auto">
                    <div class="row justify-content-center">
                        <ul class="navbar-nav d-flex flex-row">
                            @auth
                                <li class="nav-item px-2">
                                    <a href="/inicio" class="nav-link">INICIO</a>
                                </li>
                            @endauth    
                            <li class="nav-item px-2">
                                <a href="/contacto" class="nav-link">CONTACTO</a>
                            </li>
                            <li class="nav-item px-2">
                                <a href="/faq" class="nav-link">FAQS</a>
                            </li>
                            <li class="nav-item px-2">
                                <a href="/terminos_y_condiciones" class="nav-link">TERMINOS Y CONDICIONES</a>
                            </li>
                        </ul>
                    </div> 
                </div> 
                <!-- Copy rights -->
                <div class="col-7 mx-auto">
                    <div class="row justify-content-center">
                        <div class="col-7">
                            &copy;2020. All rights reserved 
                        </div>
                    </div>
                </div>
                <!-- Icons -->
                <div class="col-7 mx-auto">
                    <div class="row justify-content-center">
                        <ul class="navbar-nav d-flex flex-row">
                            <li class="nav-item px-2">
                                <a href="" class="nav-link"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li class="nav-item px-2">
                                <a href="" class="nav-link"><i class="fab fa-facebook-square"></i></a>
                            </li>
                            <li class="nav-item px-2">
                                <a href="" class="nav-link"><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>  
            </div>
        </div>
    </footer>
    <script src="{{ asset('/js/main.js') }}"></script>
</body>
</html>
