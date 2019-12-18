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
                        </div>
                    </li>
                </ul>
            </div>
        <!--</div>-->
    </nav>
@endsection

@section('content')
    <div class="container my-2">
        <div class="row align-items-center">
            <div class="col-sm-12">
                <form action="/inicio" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="post-content">Viajaste?</label>
                        <textarea class="form-control" name="post-content" id="post-content" cols="100" rows="7" placeholder="Escribe tu viaje..."></textarea>
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
                <div class="container-fluid my-2">
                    <div class="row my-3">
                        <div class="col-12 w-100 m-0" id="post-container">
                            {{ $post->content }}
                        </div>
                    </div>
                </div>
                @empty
                    <em>¡SE EL PRIMERO EN CONTAR TU EXPERIENCIA EN VIAGGIO!</em>
            @endforelse
        </div>
    </div>

    <style lang="scss">
        #post-container {
            background-color: #00F149;
            height: 100%;
        }
    </style>
@endsection