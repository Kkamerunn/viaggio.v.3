@extends('layouts.plantilla')

@section('title')
    Inicio
@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-light bg-success" style="background-color: #00F149">
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Notificaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/perfil">Perfil</a>
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
                    </li>
                </ul>
            </div>
            <div id="countries-selector" class="float-right">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select your country</label>
                        <div class="container">
                            <div class="row">
                                <div id="image-container" class="col-4">
                                    <img src="" alt="bandera" width="100px">
                                </div>
                                <div class="col-4">
                                    <select class="form-control" id="exampleFormControlSelect1" name="country"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </nav>
    <style>
        #image-container img{
            border-radius: 50%;
            width: 50px;
            height: 50px;
            float: right;
            border: 1px solid black;
        }

        #exampleFormControlSelect1 {
            margin-top: 6px;
        }
    </style>
@endsection

@section('content')
    <div class="container my-2">
        <div class="row align-items-center">
            <div class="col-sm-12">
                <form action="/inicio" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="post-content">Viajaste?</label>
                        <textarea class="form-control" name="post-content" id="post-content" cols="100" rows="7" placeholder="Escribe tu viaje..."></textarea>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-image"></i><input type="file" name="post-image">
                    </div>
                    <div class="form-group">
                        <button type="submit">
                            <i class="far fa-paper-plane"></i> 
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            @forelse ($posts as $post)
                <div class="container-fluid my-1">
                        <div class="col-12 w-100 m-0" id="post-container">
                            <div class="post-user">
                                {{ $post->postUser->name }}
                            </div>
                            <div class="post-text-content">
                                <p>{{ $post->content }}</p>
                            </div>
                            @if ($post->image)
                                <div class="post-image-content">
                                    <img src="/storage/{{ $post->image }}" alt="Post image" class="img-fluid rounded">
                                </div>
                            @endif
                        </div>
                    <form action="/personas_seguidas" method="POST">
                        @csrf
                        <input type="hidden" name="persona" value="{{ $post->user_id }}">
                        <button type="submit" class="">Seguir</button>
                    </form>    
                </div>
            @empty
                <em>¡SE EL PRIMERO EN CONTAR TU EXPERIENCIA EN VIAGGIO!</em>
            @endforelse
        </div>
    </div>

    <style lang="scss">
        #post-container {
            background-color: honeydew;
            height: 100%;
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            border-radius: 5px;
        }

        .container {
            height: auto;
        }

        .post-image-content {
            height: inherit;
        }

        .post-image-content img {
            width: 100%;
            height: 60%;
        }

        .container-fluid {
            height: 200px;
        }
    </style>
@endsection