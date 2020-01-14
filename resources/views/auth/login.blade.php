@extends('layouts.plantilla')

@section('title')
    Sign in
@endsection

@section('header')
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
                        <a class="nav-link" href="{{ route('register') }}"><i class="far fa-user-circle"></i>REGISTRARSE</a>
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
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Presentation -->
        <div class="col-12 presentation text-center">
            <strong>INICIAR SESIÓN</strong>
        </div>
        <!-- Separador -->
        <div class="separator"></div>
        <!-- Log in -->
        <div class="col-md-8">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary mt-4">
                            iniciar sesión
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Olvidaste tu contraseña?
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    body {
        overflow-x: hidden;
    }

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

    main {
        background-color: white;
        font-weight: bold;
        color: black;
    }

    .container {
        padding-top: 75px;
    }

    .presentation {
        font-size: 20px;
    }

    .separator {
        height: 100px;
    }

    input {
        background-color: #dfe6e9 !important;
        border: 0;
    }

    .btn-primary {
        color: white;
        font-weight: 200;
        width: 50%;
        font-size: 20px;
        letter-spacing: 3px;
        text-transform: uppercase;
        line-height: initial;
        border-radius: 15px !important;
    }

    footer {
        display: none;
    }
</style>
@endsection
