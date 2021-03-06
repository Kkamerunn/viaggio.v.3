@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            
            @if (Auth::user()->user_name)
                <div class="card-header">Bienvenido {{ Auth::user()->user_name }}</div>    
            @else 
                <div class="card-header">Bienvenido {{ Auth::user()->name }}</div>
            @endif    
            
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Estas Logueado
                    <br>    
                    <a href="/inicio" class="text-decoration-none text-success">Inicio</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
