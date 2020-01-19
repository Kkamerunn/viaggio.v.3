@extends('layouts.plantilla')

@section('title')
    Seguidores
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
                    <a href="/inicio" class="nav-link px-2">INICIO</a>
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
    <ul>
        @foreach ($userLog->followers as $item)
            <li>
                <div class="container seguidores">
                    <div class="row mx-auto justify-content-center my-5 seguidores-content">
                        <div class="avatar-seguidor col-5 align-self-center">
                            <img src="{{ $item->avatar }}" alt="avatar" class="img-fluid">
                        </div>
                        <div class="nombre-seguidor col-5 align-self-center">
                            @if ($item->user_name)
                                <a href="/perfil/{{ $item->id }}">{{ $item->user_name }}</a>
                            @else 
                                <a href="/perfil/{{ $item->id }}">{{ $item->name }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    <style>
      ul {
        list-style: none;   
      }

      li, .seguidores {
        height: auto;
      }

      .seguidores-content {
        width: 50%;  
        height: auto;
        background-color: white;
        box-shadow: 0px 10px 10px grey;
      }

      .avatar-seguidor {
          width: 100px;
          height: 100px;
          border-radius: 50%;
          box-shadow: 0px 10px 10px grey;
      }

      a {
          color: black;
          transition: color .1s;
      }

      a:hover {
          text-decoration: none;
          color: #90c74c;
      }
    </style>
@endsection

