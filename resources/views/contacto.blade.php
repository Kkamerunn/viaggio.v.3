@extends('layouts.plantilla')

@section('title')
    Contacto
@endsection

@section('header')
    <div class="row pt-3 align-items-center">
        <div class="col-12 col-sm-4 text-center">
            <!-- Left side navbar -->
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
                        <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="far fa-user-circle"></i>
                        CERRAR SESION
                    </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>   
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><i class="far fa-user-circle"></i>REGISTRATE</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <h2>La url que acabas de acceder es <span class="text-warning">{{ $url }}</span></h2>
    <div class="container my-5">
        <div class="row justify-content-center contacto">
            <div class="col-12 col-sm-7 mt-2">
                <h3>Dirección: </h3>
                <hr>
                <p>Localidad: Acassuso</p>
                <p>Provincia de Buenos Aires</p>
                <p>Calle: General Justo José de Urquiza</p>
                <p>Altura: 241</p>
                <p>Piso: 3</p>
                <p>Oficina: 1</p>
                <p>Referencias: entre calles Manzone y Arenales</p>
                <p>Horarios: Lun a Vie de 8am a 12pm y de 13pm a 18pm</p>
            </div>
            <div class="col-12 col-sm-7 my-5">
                <h3>Telefonos de contacto: </h3>
                <hr>
                <p>Movil: +54 9 11 6416 3312</p>
                <p>Fijo: +54 9 11 5243 1843</p>
            </div>
            <div class="col-12 col-sm-7">
                <h3>Email: </h3>
                <hr>
                <p>info@viaggio.com.ar</p>
            </div>
        </div>
    </div>
@endsection