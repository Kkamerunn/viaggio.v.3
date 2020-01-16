@extends('layouts.plantilla')

@section('title')
    Editar
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
    <div class="container py-3">
        <div class="row pt-5">
            <div id="tit" class="mx-auto">
                <p class="h2">Editar perfil</p>   
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-12">
                <img class="img mx-auto d-block" src="/storage/{{ $user->avatar }}" alt="avatar image">
            </div>
        </div>
        <div class="row pt-3 justify-content-center">
            <div class="col-8">
                <form action="/editar/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                        <label for="new-user-name" class="col-12 col-sm-3 col-form-label">Nuevo nombre de usuario</label>
                        <div class="col-12 col-sm-9">
                            <input type="text" class="form-control" name="new-user-name" id="new-user-name">
                        </div>  
                    </div>
                    <div class="form-group row">
                        <label for="new-avatar" class="col-12 col-sm-3 col-form-label">Nuevo avatar</label>
                        <div class="col-12 col-sm-9">
                            <input type="file" class="form-control" name="new-avatar" id="new-avatar">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="new-pass" class="col-12 col-sm-3 col-form-label">Nueva clave</label>
                        <div class="col-12 col-sm-9">
                            <input type="password" class="form-control" name="new-pass" id="new-pass">  
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn">Guardar cambios</button>
                    </div>    
                </form>
            </div>
        </div>
    </div>
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

        .img {
            width: 240px;
            height: 240px;
            border-radius: 50%;
        }

        input {
        background-color: #dfe6e9 !important;
        border: 0;
        border-radius: 5px;
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