@extends('layouts.plantilla')

@section('title')
    Home 
@endsection

@section('header')
    <div class="container-fluid nav-container">
        <div class="row pt-3 align-items-center">
            <div class="col-12 col-sm-4 text-center">
                <ul class="navbar-nav ml-auto d-inline-flex flex-row">
                @auth
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
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="far fa-user-circle"></i>   INICIAR SESION</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                    @endguest
                </ul>
            </div>
        </div>
        <!-- Separador -->
        <div class="row separador"></div>
        <!-- Mensaje y fondo -->
        <div class="row align-items-center">
            <div class="col-0 col-sm-6"></div>
            <div class="col-12 col-sm-6 middle-title">
                <p class="text-right">Tu viaje,</p>
                <p class="text-right">tu experiencia.<p>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 presentation pb-4 text-center">
            <strong>REGISTRATE Y CONTÁ TU EXPERIENCIA!</strong>
        </div>
        <!-- photo -->
        <div class="col-12 col-md-5">
            <img src="/storage/getting-rid-of-all.jpg" alt="fotografa">
        </div>
        <!-- form -->
        <div class="col-12 col-md-5">
            <div class="d-flex flex-column">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="user_name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                        <div class="col-md-6">
                            <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>

                            @error('user_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                        <div class="col-md-6">
                            <input id="avatar" type="file" class="form-control" name="avatar">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn">
                                registrarse
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    header {
        background-image: url("/storage/traveler-at-the-airport-PZ2NS4E.jpg");
        width: 100%;
        height: 600px !important;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative !important;
        overflow-y: hidden;
    }

    header i {
            color: #badc58;
            font-size: 25px;
            margin-right: 8px;
        }

    .nav-container {
        height: 100px;
    }

    .nav-link {
        color: antiquewhite;
    }

    img[alt=viaggio] {
        height: 80px;
        width: 270px;
    }

    .separador {
        height: 200px;
    }

    .middle-title {
        color: antiquewhite;
        font-size: 70px;
    }

    main {
        padding: 100px;
        background-color: #f5f8fa;
    }

    form label {
        font-size: large;
    }

    .presentation {
        font-size: 30px;
        font-weight: bold;
    }

    img[alt=fotografa] {
        height: 100%;
        width: 100%;
    }

    form {
        background-color: inherit;
        font-weight: bold;
        color: black;
    }

    input {
        background-color: #dfe6e9 !important;
        border: 0;
    }

    .btn {
        background-color: #badc58;
        color: white;
        font-weight: 200;
        width: 100%;
        font-size: 20px;
        letter-spacing: 3px;
        text-transform: uppercase;
        line-height: initial;
    }

    .btn:hover {
        background-color: #6ab04c;
    }
</style>
@endsection
