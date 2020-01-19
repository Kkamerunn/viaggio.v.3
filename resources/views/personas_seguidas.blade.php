@extends('layouts.plantilla')

@section('title')
    Personas que sigues
@endsection

@section('header')
    <div class="row pt-3 align-items-center">
        <div class="col-12 col-sm-4 text-center">
            <ul class="navbar-nav ml-auto d-inline-flex flex-row">
            @auth
                <li class="nav-item">
                    <a href="/perfil/{{ Auth::user()->id }}" class="nav-link px-2">PERFIL</a>
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
                        <a class="nav-link" href="{{ route('login') }}"><i class="far fa-user-circle"></i>INICIAR SESION</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="container px-auto py-5">
        <h1>Estas siguiendo a:</h1><br><hr>
        @foreach ($userLog->followed as $item)
            <div class='container pt-2'>
                <div class='row'>
                    <div class='col-12 col-sm-6 mx-auto follower-container'>
                        <ul>
                            @if ($item->user_name)
                                <li>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-sm-6 fo">
                                                <div class="d-flex flex-row align-items-center mt-3">
                                                    <img src="/storage/{{ $item->avatar }}" alt="avatar" class="follower-img">
                                                    <div class="follower-name">
                                                        <a href="/perfil/{{ $item->id }}" class="perfil-anchor">{{ $item->user_name }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @else 
                                <li>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-sm-6 fo">
                                                <div class="d-flex flex-row  align-items-center mt-3">
                                                    <img src="/storage/{{ $item->avatar }}" alt="avatar" class="follower-img">
                                                    <div class="follower-name">
                                                        <a href="/perfil/{{ $item->id }}" class="perfil-anchor">{{ $item->name }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <style>
        li {
            list-style: none;
        }
    </style>
    <script src="{{ asset('/js/main.js') }}"></script>
@endsection