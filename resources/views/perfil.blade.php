@extends('layouts.plantilla')

@section('title')
    Perfil
@endsection

@section('header')
<nav class="navbar navbar-expand-lg navbar-light">
            
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Notificaciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/inicio">Inicio</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-mountain"></i> 
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/settings">Theme</a>
                    <a class="dropdown-item" href="/faq">FAQ</a>
                    <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>

<style>
    header {
        background-color: #8854d0;
    }

    header .nav-link {
        color: #d1d8e0 !important; 
    }

    header .nav-item {
        padding-left: 5px; 
        padding-right: 5px;
        transition: width 3s, height 3s, background-color 1s, font-size 2s;
        -webkit-transition: width 3s, height 3s, background-color 1s, font-size 2s;
    }

    header .nav-item:hover {
        width: 120px;
        height: 50px;
        background-color: #a55eea;
        font-size: 20px;
    }

</style>
@endsection

@section('content')
    <div class="container-fluid" id="main-container">
        <div class="row" style="height: 100%;">
            <div class="col-3">
                <aside class="container-fluid position-sticky">
                    <div class="row">
                        <div class="col-12 img">
                            <img src="/storage/{{ $userLog->avatar }}" alt="avatar" class="my-1">
                        </div>
                        <div class="col-12 links d-flex align-items-center" style="height: 60%;">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                  <a class="nav-link text-dark" href="#">Seguidores</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#">Personas que sigues</a>
                                  </li>
                                <li class="nav-item">
                                  <a class="nav-link text-dark" href="#">Editar</a>
                                </li>
                              </ul>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="col-9 overflow-auto">
                <div class="row">
                    <div id="tit" class="mx-auto">
                        <p class="h2">Tus posteos</p>   
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        @foreach ($posts as $post)
                            @if ($post->user_id == $userLog->id)
                                <div class="container-fluid my-2">
                                    <div class="row my-3">
                                        <div class=" post-container col-10">
                                            <div class="item1">
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
                    </div>
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
            background-color: #0fb9b1;
        }

        aside img {
            border-radius: 50%;
            width: 115px;
            margin: 0 auto;
            display: block;
            height: 70%;
            position: relative;
            top: 20px;
        }
        
        aside .row {
            height: 100%;
        }

        main {
            background-color: #4b7bec;
        }

        #main-container {
            height: 100%;
            padding-top: 3px;
            padding-bottom: 3px;
        }

        #tit {
            background-color: #2bcbba;
            width: 190px;
            height: 50px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            transition: background-color 1s;
        }

        #tit:hover {
            background-color: #4b7bec;
            cursor: pointer;
        }

        #tit p {
            color: #d1d8e0;
        }

        .post-container {
            display: flex;
            flex-direction: column;
            width: 80%;
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
        }
    </style>
@endsection