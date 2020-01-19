@extends('layouts.plantilla')

@section('title')
    FAQ
@endsection

@section('header')
    <div class="row pt-3 align-items-center">
        <div class="col-12 col-sm-4 text-center">
            <ul class="navbar-nav ml-auto d-inline-flex flex-row">
            @auth
                <li class="nav-item">
                    <a href="/inicio" class="nav-link px-2">INICIO</a>
                </li>
                <li class="nav-item">
                    <a href="/faq" class="nav-link px-2">FAQ</a>
                </li>
                <li class="nav-item">
                    <a href="/contacto" class="nav-link px-2">CONTACTO</a>
                </li> 
            @endauth
            @guest
                <li class="nav-item">
                    <a href="/faq" class="nav-link px-2">FAQ</a>
                </li>
                <li class="nav-item">
                    <a href="/contacto" class="nav-link px-2">CONTACTO</a>
                </li>  
            @endguest
            </ul>
        </div>
        <div class="col-12 col-sm-4">
            <div class="row justify-content-center">
                <img src="/storage/viaggio.png" alt="viaggio" class="align-middle">
            </div>
        </div>
        <div class="col-12 col-sm-4 text-center">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="far fa-user-circle"></i>CERRAR SESION</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>    
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="far fa-user-circle"></i>INICIAR SESION</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center py-5">
            <div class="col-8">
                <p class="text-center">faq´s</p>
                <br>
                <div id="accordion" class="">
                    <button class="accordion">¿Debo pagar por tener una cuenta en esta página? <span class="plus float-right">+</span></button>
                    <div class="panel">
                        <p class="align-middle py-2">No, la página es gratuita, y siempre lo será.</p>
                    </div>
                    <button class="accordion">¿Puedo ver todos los posteos? <span class="plus float-right">+</span></button>
                    <div class="panel">
                        <p class="align-middle py-2">Sólo podes ver los posts de las personas que sigues.</p>
                    </div>
                    <button class="accordion">¿Puedo postear lo que quiera? <span class="plus float-right">+</span></button>
                    <div class="panel">
                        <p class="align-middle py-2">Puedes postear lo que quieras siempre que tu post no contenga imágenes pornográficas o violentas, contenido implicita o explcitamente agresivo y/o discriminatorio.</p>
                    </div>
                    <button class="accordion">¿Cuantos posteos puedo hacer, tengo algún limite? <span class="plus float-right">+</span></button>
                    <div class="panel">
                        <p class="align-middle py-2">Puedes hacer todos los posteos que quieras hasta el infinito.</p>
                    </div>
                    <button class="accordion">¿Qué debo hacer si veo un post con contenido no adecuado a los terminos sujetos de esta red social? <span class="plus float-right">+</span></button>
                    <div class="panel">
                        <p class="align-middle py-2">Puedes denunciar el post y la persona que lo hizo.</p>
                    </div>
                    <button class="accordion">¿Quienes pueden ver mis posteos? <span class="plus float-right">+</span></button>
                    <div class="panel">
                        <p class="align-middle py-2">Todos pueden ver tus posteos.</p>
                    </div>
                    <button class="accordion">¿Todos pueden ver la informacion personal de mi perfil? <span class="plus float-right">+</span></button>
                    <div class="panel">
                        <p class="align-middle py-2">Sólo pueden ver tu perfil las personas que te siguen.</p>
                    </div>
                    <button class="accordion">¿Me puede seguir cualquier persona? <span class="plus float-right">+</span></button>
                    <div class="panel">
                        <p class="align-middle py-2">Si, pero también puedes bloquear a quien no quieras que te siga.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .container-fluid {
            background-image: url("/storage/world_map.png");
        }

        .text-center {
            text-transform: uppercase;
        }

        #accordion {
            border: 2px solid grey;
        }

        .accordion {
            background-color: transparent;
            color: black;
            font-weight: bold;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            text-align: left;
            border: none;
            outline: none;
            transition: 1.5s;
        }

        .active, .accordion:hover {
            background-color: #ccc;
        }

        .panel {
            padding: 0 18px;
            background-color: transparent;
            display: none;
            overflow: hidden;
        }
        /*
        .panel p {
            margin-top: 0;
            margin-bottom: 0;
        }*/

        .plus {
            font-size: 1rem;
            color: #90c74c;
        }
    </style>
    <script src="{{ asset('/js/faq.js') }}"></script>
@endsection