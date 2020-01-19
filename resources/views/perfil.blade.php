@extends('layouts.plantilla')

@section('title')
    Perfil
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
    <div class="container-fluid px-0" id="main-container">
        <div class="row" style="height: 100%;">
            <div class="col-4" id="aside">
                <aside class="container-fluid">
                    <div class="row">
                        <div class="col-12 img">
                            @if ($userLog->avatar)
                                <img src="/storage/{{ $userLog->avatar }}" alt="avatar" class="my-1">
                            @else 
                                <img src="/storage/avatar.png" alt="avatar" class="my-1">
                            @endif
                        </div>
                        <div class="col-12 links d-flex align-items-center" style="height: 60%;">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                  <a class="nav-link" href="/seguidores">Seguidores</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/personas_seguidas">Personas que sigues</a>
                                  </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="/editar">Editar</a>
                                </li>
                              </ul>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="col-8 overflow-auto pt-5">
                <div class="row">
                    <div id="tit" class="mx-auto">
                        <p class="h2">MIS POSTEOS</p>   
                    </div>
                </div>
                <hr>
                <div class="row">
                    <!--<div class="col">-->
                        @foreach ($posts as $post)
                            @if ($post->user_id == $userLog->id)
                                <div class="container-fluid my-2">
                                    <div class="row justify-content-center">
                                        <div class="post-container col-10">
                                            <div class="item1 my-2">
                                                <div class="item1-avatar">
                                                    <img src="/storage/{{ $post->postUser->avatar }}" alt="avatar">
                                                </div>
                                                @if ($post->postUser->user_name)
                                                    <div class="item1-username ml-2">
                                                        {{ $post->postUser->user_name }}  
                                                    </div>
                                                @else
                                                    <div class="item1-username ml-2">
                                                        {{ $post->postUser->name }}  
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="item2 my-2">
                                                {{ $post->content }}
                                            </div>
                                        </div>
                                    </div>
                                </div>       
                            @endif    
                        @endforeach
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>

    <style>
        aside {
            height: 70%;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.6);
            padding-left: 0;
        }

        aside a {
            color: white;
        }

        aside a:hover {
            color: #90c74c;   
        }

        aside img {
            border-radius: 50%;
            width: 115px;
            margin: 0 auto;
            display: block;
            height: 70%;
            position: relative;
            top: 20px;
            border: 1px solid white;
            box-shadow: 0px 10px 10px grey;
        }
        
        aside .row {
            height: 100%;
        }

        main {
            background-color: #4b7bec;
        }

        #main-container {
            padding-bottom: 3px;
            background-image: url("/storage/misposteos_img.png");
            width: 100%;
            height: auto;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative !important;
            background-color: #fafbfc;
        }

        .h2 {
            color: #90c74c;
        }

        #tit {
            width: 220px;
            height: 50px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .post-container {
            display: flex;
            flex-direction: column;
            width: 90%;
            height: auto;
            background-color: white;
            box-shadow:  0px 10px 10px grey;
        }

        .item1 {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        .item1-avatar img {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            border: 1px solid white;
            box-shadow: 0px 10px 10px grey;
        }
    </style>
@endsection