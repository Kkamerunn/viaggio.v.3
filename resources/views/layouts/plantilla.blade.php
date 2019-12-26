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
</head>
<body>
    <div class="d-flex flex-column">
        <header class="mb-4 sticky-top">
            @yield('header')    
        </header>
        <main class="mb-2 overflow-auto">
            @yield('content')    
        </main>    
        <footer class="bg-success">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        &copy;copy rights viaggio 2020
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <style>
        footer {
            height: 75px;
        }

        footer .col-12 {
            top: 25px;
        }
    </style>
    <script src="{{ asset('/js/lucas.js') }}"></script>
</body>
</html>
