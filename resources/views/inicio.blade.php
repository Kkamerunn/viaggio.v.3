@extends('layouts.plantilla')

@section('title')
    Inicio
@endsection

@section('header')
    <nav class="navbar navbar-expand-lg" style="background-color: #8854d0">
            
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
                            <a class="dropdown-item" href="/settings">Themes</a>
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
                <form action="POST">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" style="color: #d1d8e0;">Select your country</label>
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
@endsection

@section('content')
    <div class="container-fluid py-2" id="principal">
        <div class="row align-items-center">
            <div class="col-sm-12">
                <form action="/inicio" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="post-content" class="h2" style="color: #d1d8e0;">Viajaste? cuenta tu experiencia!</label>
                        <textarea class="form-control textarea" name="post-content" id="post-content" cols="100" rows="7" placeholder="Escribe tu viaje..."></textarea>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-image"></i>
                        <label for="post-image">
                            Sube tu foto
                            <input type="file" name="post-image" id="post-image">
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="submit-post">
                            <i class='far fa-paper-plane'></i> 
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="row overflow-auto">
            @forelse ($posts as $post)
                <div class="post-container col-7 w-100 mx-auto my-2">
                    <div class="post-user-identifier pt-2">
                        <div class="user-avatar">
                            <img src="/storage/{{ $post->postUser->avatar }}" alt="image">
                        </div>
                        @if ($post->postUser->user_name)
                            <div class="user-name-identifier">
                                {{ $post->postUser->user_name }}
                            </div>
                        @else 
                            <div class="user-name-identifier">
                                {{ $post->postUser->name }}
                            </div>
                        @endif   
                    </div> 
                    <div class="post-content d-flex flex-column">
                        <div class="post-text-content py-3">
                            <p>{{ $post->content }}</p>
                        </div>
                        @if ($post->image)
                            <div class="post-image-content pb-3">
                                <img src="/storage/{{ $post->image }}" alt="Post image" class="img-fluid rounded">
                            </div>
                        @endif
                    </div> 
                    @guest
                        <div class="comentar" disabled>Comentar</div>  
                    @endguest
                    @auth
                        <div class="commentDiv">
                            <button class="likes"><i class="far fa-thumbs-up"></i>Like</button><sup></sup>
                            <button class="comentar"><i class="fas fa-comment"></i>Comentar</button>
                            <form action="/comments" method="POST" enctype="multipart/form-data" class="comments-form">
                            @csrf    
                                <input type="text" name="comment-content" class="comment-content" placeholder="comenta..." maxlenght="500">
                                <input type="hidden" name="post-comment-id" value="{{ $post->id }}">
                                <button type="submit" class="submit-comment"><i class="fas fa-share"></i></button>
                            </form>    
                        </div>    
                    @endauth
                    @foreach ($comments as $comment)
                        @if ($post->id == $comment->post_id)
                        <div class="comentarios">
                            <div class="container">
                                <div class="row mt-3">
                                    <div class="col-2">
                                        <img src="/storage/{{ $comment->userComment->avatar }}" alt="comment-user-avatar">
                                    </div>
                                    <div class="col-10">
                                        @if ($comment->userComment->user_name)
                                            <p>{{ $comment->userComment->user_name }}</p>
                                        @else
                                            <p>{{ $comment->userComment->name }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        <p>{{ $comment->comments }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach   
                </div>
            @empty
                <em>¡SE EL PRIMERO EN CONTAR TU EXPERIENCIA EN VIAGGIO!</em>
            @endforelse
        </div>
    </div>
    <script src="{{ asset('/js/inicio.js') }}"></script>
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

        .nav-link {
            color: #d1d8e0 !important;
        }

        label[for=post-content] {
            cursor: pointer;
        }

        .textarea {
            display: none;
            transition: display 2s linear;
        }

        .post-container {
            background-color: #45aaf2; /*honeydew;*/
            color: #d1d8e0;
            font-weight: bold;
            height: 100%;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            border-radius: 5px;
        }

        .post-user-identifier {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .user-avatar img, img[alt=comment-user-avatar] {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        
        .user-name-identifier {
            margin-left: 10px;
        }

        main .container-fluid {
            height: auto;
            background-color: #4b7bec;
        }

        .post-image-content {
            height: inherit;
        }

        .post-image-content img {
            width: 100%;
            height: 60%;
        }

        .container-fluid {
            height: auto;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center; 
        }

        #submit-post {
            background-color: #4b7bec;
            border: 0;
            transition: background-color 1s;
            color: #d1d8e0;
            font-weight: bold;
        }

        button[type=submit]:active {
            background-color: aquamarine;
        }

        .comments-form {
            display: none;
        }

        .comentar {
            background-color: #45aaf2;
            font-weight: bold;
            border: none;
            color: aliceblue;
            border-radius: 15px;
            margin-bottom: 4px;
            transition: background-color 0.5s;
        }

        .likes {
            background-color: #45aaf2;
            font-weight: bold;
            border: none;
            color: aliceblue;
            border-radius: 15px;
            margin-bottom: 4px;
            transition: background-color 0.5s;
        }

        .fa-comment {
            padding-right: 3px;
        }

        .fa-thumbs-up {
            padding-right: 3px;
        }

        .comentar:hover {
            background-color: aquamarine;
            cursor: pointer;
        }

        .likes:hover {
            background-color: aquamarine;
            cursor: pointer;
        }

        .comment-content {
            height: auto;
            width: 90%;
            background-color: #dfe6e9;
            border: none;
            border-radius: 15px;
        }

        .submit-comment {
            background-color: #45aaf2;
            /*color: #8854d0;*/
            border: none;
            border-radius: 50%;
            transition: background-color 0.5s, color 0.5s;
        }

        .submit-comment:hover {
            color: antiquewhite;
            background-color: #4b7bec;
            cursor: pointer;
        }

        .comentarios {
            background-color: #dff9fb;
            border-radius: 15px;
            color: black;
            margin-top: 5px;
            margin-bottom: 5px;
            width: 70%;
            position: relative;
            left: 20px;
        }

        .comentarios p {
            display: inline-block;
            padding-top: 10px;
        }
    </style>
@endsection