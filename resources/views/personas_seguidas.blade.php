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
                    <a href="/perfil" class="nav-link px-2">PERFIL</a>
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

<!--Arreglar este código para que se vea-->

@section('content')
    @foreach ($userLog->followed as $item)
        <div class='container'>
            <div class='row'>
                <div class='col-12 col-sm-8 mx-auto'>
                    <p>Estas siguiendo a:</p><br>
                    <ul>
                        @if ($item->user_name)
                            <li>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 fo">
                                            <div class="d-flex flex-row">
                                                <img src="/storage/{{ $item->avatar }}" alt="avatar" class="follower-img">
                                                <div class="follower-name">
                                                    {{ $item->user_name }}
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
                                            <div class="d-flex flex-row">
                                                <img src="/storage/{{ $item->avatar }}" alt="avatar" class="follower-img">
                                                <div class="follower-name">
                                                    {{ $item->name }}
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
    <style>
        header {
            background-color: white;
            box-shadow:  0px 10px 10px grey;
            height: 140px !important;
            width: 100%;
        }

        header a {
        color: black;
        }

        header i {
            color: #badc58;
            font-size: 25px;
            margin-right: 8px;
        }

        img[alt=viaggio] {
            height: 80px;
            width: 270px;
        }


        li {
            list-style: none;
        }

        .follower-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .follower-name {

        }
    </style>
@endsection