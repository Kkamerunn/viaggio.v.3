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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/d9e6b5e683.js" crossorigin="anonymous"></script>

    <style>
        html {
            height: auto;
        }

        body {
            height: inherit;
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
                <div class="col-7 mx-auto">
                    <div class="row justify-content-center">
                        <ul class="navbar-nav d-flex flex-row">
                            <li class="nav-item px-2">
                                <a href="" class="nav-link">INICIO</a>
                            </li>
                            <li class="nav-item px-2">
                                <a href="" class="nav-link">AYUDA</a>
                            </li>
                            <li class="nav-item px-2">
                                <a href="" class="nav-link">CONTACTO</a>
                            </li>
                            <li class="nav-item px-2">
                                <a href="" class="nav-link">FAQS</a>
                            </li>
                            <li class="nav-item px-2">
                                <a href="" class="nav-link">TERMINOS Y CONDICIONES</a>
                            </li>
                        </ul>
                    </div> 
                </div> 
                <div class="col-7 mx-auto">
                    <div class="row justify-content-center">
                        <div class="col-7">
                            &copy;copy rights viaggio 2020
                        </div>
                    </div>
                </div>
                <!-- Icons -->
                <div class="col-7 mx-auto">
                    <div class="row justify-content-center">
    
                    </div>
                </div>  
            </div>
        </div>
    </footer>
</body>
</html>
