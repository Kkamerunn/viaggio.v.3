@extends('layouts.plantilla')

@section('title')
    Inicio
@endsection

@section('header')
    
@endsection

@section('content')
    <div class="container my-2">
        <div class="row align-items-center">
            <div class="col-sm-12">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="post-content">Viajaste?</label>
                        <textarea class="form-control" name="post-content" id="post-content" cols="100" rows="7" placeholder="Escribe tu viaje..."></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">
                            <!--icon-->Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">

        </div>
    </div>
@endsection