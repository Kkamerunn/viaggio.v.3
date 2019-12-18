@extends('layouts.plantilla')

@section('title')
    Perfil
@endsection

@section('header')
<nav class="navbar navbar-expand-lg navbar-light bg-success" style="background-color: #00F149">
            
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
                    <a class="dropdown-item" href="/settings">Settings</a>
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
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <aside>
                    <div class="img bg-success border-primary">
                        <img width="280px" src="/storage/{{ $userLog->avatar }}" alt="avatar">
                    </div>
                    <div class="links">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                              <a class="nav-link" href="#">Seguidores</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">Editar</a>
                            </li>
                          </ul>
                    </div>
                </aside>
            </div>
            <div class="col-8">
                <div class="row">
                    <p class="h2">Tus posteos</p>
                </div>
                <div class="row">
                    <div class="col">
                        @foreach ($posts as $post)
                            @if ($post->user_id == $userLog->id)
                                <div class="container-fluid my-2">
                                    <div class="row my-3">
                                        <div class="col-8 w-100 m-0" id="post-container">
                                            {{ $post->content }}
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

    <style lang="scss">
        aside {

        }
    </style>
@endsection