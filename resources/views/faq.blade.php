@extends('layouts.plantilla')

@section('title')
    FAQ
@endsection

@section('header')
    <div class="container-fluid header text-uppercase bg-info"><a href="/inicio"><i class="fas fa-chevron-left"></i></a> faq´s</div>
@endsection

@section('content')
    <div class="row pl-2">
        <div class="col-5">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-q1-list" data-toggle="list" href="#list-q1" role="tab" aria-controls="q1">¿Debo pagar por tener una cuenta en esta página?</a>
                <a class="list-group-item list-group-item-action" id="list-q2-list" data-toggle="list" href="#list-q2" role="tab" aria-controls="q2">¿Puedo ver todos los posts?</a>
                <a class="list-group-item list-group-item-action" id="list-q3-list" data-toggle="list" href="#list-q3" role="tab" aria-controls="q3">¿Puedo postear lo que quiera?</a>
                <a class="list-group-item list-group-item-action" id="list-q4-list" data-toggle="list" href="#list-q4" role="tab" aria-controls="q4">¿Cuantos posteos puedo hacer, tengo algún limite?</a>
                <a class="list-group-item list-group-item-action" id="list-q5-list" data-toggle="list" href="#list-q5" role="tab" aria-controls="q5">¿Qué debo hacer si veo un post con contenido no adecuado a los terminos sujetos de esta red social?</a>
                <a class="list-group-item list-group-item-action" id="list-q6-list" data-toggle="list" href="#list-q6" role="tab" aria-controls="q6">¿Quienes pueden ver mis posteos?</a>
                <a class="list-group-item list-group-item-action" id="list-q7-list" data-toggle="list" href="#list-q7" role="tab" aria-controls="q7">¿Todos pueden ver la informacion personal de mi perfil?</a>
                <a class="list-group-item list-group-item-action" id="list-q8-list" data-toggle="list" href="#list-q8" role="tab" aria-controls="q8">¿Me puede seguir cualquier persona?</a>
            </div>
        </div>
        <div class="col-7">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active text-info" id="list-q1" role="tabpanel" aria-labelledby="list-q1-list">No, la página es gratuita, y siempre lo será.</div>
                <div class="tab-pane fade text-info" id="list-q2" role="tabpanel" aria-labelledby="list-q2-list">Sólo podes ver los posts de las personas que sigues.</div>
                <div class="tab-pane fade text-info" id="list-q3" role="tabpanel" aria-labelledby="list-q3-list">Puedes postear lo que quieras siempre que tu post no contenga imágenes pornográficas o violentas, contenido implicita o explcitamente agresivo y/o discriminatorio.</div>
                <div class="tab-pane fade text-info" id="list-q4" role="tabpanel" aria-labelledby="list-q4-list">Puedes hacer todos los posteos que quieras hasta el infinito.</div>
                <div class="tab-pane fade text-info" id="list-q5" role="tabpanel" aria-labelledby="list-q5-list">Puedes denunciar el post y la persona que lo hizo.</div>
                <div class="tab-pane fade text-info" id="list-q6" role="tabpanel" aria-labelledby="list-q6-list">Todos pueden ver tus posteos.</div>
                <div class="tab-pane fade text-info" id="list-q7" role="tabpanel" aria-labelledby="list-q7-list">Sólo pueden ver tu perfil las personas que te siguen.</div>
                <div class="tab-pane fade text-info" id="list-q8" role="tabpanel" aria-labelledby="list-q8-list">Si, pero también puedes bloquear a quien no quieras que te siga.</div>
            </div>
        </div>
    </div>
    <style>
        .header {
            text-align: center;
            font-size: 2rem;
            color: #c06c84;
            font-weight: bold;
            text-shadow: 1px 1px black;
        }

        .tab-content div {
            font-weight: bolder;
            font-size: 2rem;
        }
    </style>
@endsection