@extends('layouts.plantilla')

@section('title')
    Editar
@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/inicio">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/perfil">Perfil</a>
            </li>
        </ul>
    </nav>
@endsection

@section('content')
    <div class="container py-1">
        <div class="row">
            <div class="col-12">
                <img class="img mx-auto d-block" src="/storage/{{ $user->avatar }}" alt="avatar image">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
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
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
    <style>
        .img {
            width: 240px;
            height: 240px;
            border-radius: 50%;
        }
    </style>
@endsection