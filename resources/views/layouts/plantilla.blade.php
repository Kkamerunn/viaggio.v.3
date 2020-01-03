<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
            height: 15%;
        }

        main {
            height: 70%;
        }

        footer {
            height: 60px;
            background-color: #8854d0;
            color: #d1d8e0;
            position: relative;
            bottom: 0;
        }

        footer .col-12 {
            top: 20px;
        }
    </style>
</head>
<body>
    <header class="sticky-top">
        @yield('header')    
    </header>
    <main class="overflow-auto">
        @yield('content')    
    </main>    
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    &copy;copy rights viaggio 2020
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
