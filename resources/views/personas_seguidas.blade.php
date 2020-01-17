@extends('layouts.plantilla')

@section('title')
    Personas que sigues
@endsection

@section('header')
    
@endsection

<!--Arreglar este código para que se vea-->

@section('content')
    @foreach ($followers as $follower)
        <div class='container'>
            <div class='row'>
                <div class='col-12 col-sm-8 mx-auto'>
                    <p>Estas siguiendo a:</p><br>
                    <ul>
                        @if ($follower->followed_user_name)
                            <li>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 fo">
                                            <div class="d-flex flex-row">
                                                <img src="/storage/{{ $follower->followed_avatar }}" alt="avatar" class="follower-img">
                                                <div class="follower-name">
                                                    {{ $follower->followed_user_name }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @else 
                            <li>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 fo">
                                            <div class="d-flex flex-row">
                                                <img src="/storage/{{ $follower->followed_avatar }}" alt="avatar" class="follower-img">
                                                <div class="follower-name">
                                                    {{ $follower->followed_name }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
    <style>
        li {
            list-style: none;
        }

        .follower-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .follower-name {

        }
    </style>
@endsection