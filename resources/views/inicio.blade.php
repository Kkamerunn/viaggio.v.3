@extends('layouts.plantilla')

@section('title')
    Inicio
@endsection

@section('header')
    <div class="row pt-3 align-items-center">
        <div class="col-12 col-sm-4 text-center">
            <ul class="navbar-nav ml-auto d-inline-flex flex-row">
            @auth
                <li class="nav-item">
                    <a href="/perfil/{{ Auth::user()->id }}" class="nav-link px-2">PERFIL</a>
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
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="far fa-user-circle"></i>
                        CERRAR SESION
                    </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>   
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="far fa-user-circle"></i>INICIAR SESION</a>
                    </li>
                @endguest
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Dropdown
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                          <button class="dropdown-item" type="button">
                              <div id="drop-drown-color-div-1"></div>
                          </button>
                          <button class="dropdown-item" type="button">
                              <div id="drop-drown-color-div-2"></div>
                          </button>
                        </div>
                      </div>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid" id="principal">
        <div class="row px-4 pb-2 pt-5">
            <div class="col-12 col-md-4">
                <img src="/storage/{{ Auth::user()->avatar }}" alt="avatar" id="initial-avatar">
                <div id="user-info-square">
                    <div class="background">
                        <p id="username" class="text-right">
                            Bienvenido
                            @if (Auth::user()->user_name)
                                {{ Auth::user()->user_name }}
                            @else 
                                {{ Auth::user()->name }}
                            @endif
                            !
                        </p>
                        <p id="followers-number" class="text-right">
                            <i class="fas fa-user-plus"></i>
                            @if (count(Auth::user()->followers) < 2)
                                {{ count(Auth::user()->followers) }} Seguidor
                            @else 
                                {{ count(Auth::user()->followers) }} Seguidores
                            @endif
                        </p>
                    </div> 
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <h2 style="color: #90c74c;">Viajaste? cuenta tu experiencia!</h2>
                        <form action="/inicio" method="POST" enctype="multipart/form-data" id="post-form" class="post-form">
                            @csrf
                            <div class="user-avatar">
                                <img src="/storage/{{ Auth::user()->avatar }}" alt="image">
                            </div>
                            <div class="form-group">
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
                    <!-- Posts -->
                    @forelse ($posts as $post)
                        <div class="post-container col-11 w-100 mx-auto px-2 my-2">
                            <div class="post-image-content pb-3">   
                                @if ($post->image)
                                    <img src="/storage/{{ $post->image }}" alt="Post image">
                                @endif
                            </div>
                            <div class="post-user-identifier pl-2 pt-2">
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
                                <div class="seguir">
                                    <form action="/personas_seguidas" method="POST">
                                        @csrf
                                        <input type="hidden" name="persona" value="{{ $post->user_id }}">
                                        <button type="submit" class="comentar"><i class="fas fa-user-plus"></i>Seguir</button>
                                    </form> 
                                </div>   
                            </div> 
                            <div class="post-content pl-2 d-flex flex-column">
                                <div class="post-text-content py-3">
                                    <p>{{ $post->content }}</p>
                                </div>    
                            </div> 
                            @guest
                                <div class="comentar pl-2" disabled>Comentar</div>  
                            @endguest
                            @auth
                                <div class="commentDiv pl-2">
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
                            <hr>
                            <!-- Comentarios -->
                            @foreach ($comments as $comment)
                                @if ($post->id == $comment->post_id)
                                <div class="comentarios">
                                    <div class="container pl-2">
                                        <div class="row mt-3">
                                            <div class="post-user-identifier">
                                                <div class="col-2 user-avatar">
                                                    <img src="/storage/{{ $comment->userComment->avatar }}" alt="comment-user-avatar">
                                                </div>
                                                <div class="col-10 pl-4 user-name-identifier">
                                                    @if ($comment->userComment->user_name)
                                                        <p>{{ $comment->userComment->user_name }}</p>
                                                    @else
                                                        <p>{{ $comment->userComment->name }}</p>
                                                    @endif
                                                </div>
                                                <div class="seguir">
                                                    <form action="/personas_seguidas" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="persona" value="{{ $post->user_id }}">
                                                        <button type="submit" class="comentar"><i class="fas fa-user-plus"></i>Seguir</button>
                                                    </form> 
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <p>{{ $comment->comments }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        @guest
                                            <div class="comentar" disabled>Responder</div>  
                                        @endguest
                                        @auth
                                            <div class="commentDiv">
                                                <button class="likes"><i class="far fa-thumbs-up"></i>Like</button><sup></sup>
                                                <button class="responder"><i class="fas fa-comment"></i>Responder</button>
                                                <form action="/responses" method="POST" enctype="multipart/form-data" class="comments-form mb-2">
                                                @csrf    
                                                    <input type="text" name="response-content" class="comment-content" maxlenght="400">
                                                    <input type="hidden" name="comment-response-id" value="{{ $comment->id }}">
                                                    <button type="submit" class="submit-comment"><i class="fas fa-share"></i></button>
                                                </form>    
                                            </div>    
                                        @endauth
                                    </div>
                                </div>
                                <!-- Respuestas de comentarios -->
                                    @foreach ($responses as $response)
                                        @if ($comment->id == $response->comment_id)
                                            <div class="comentarios resp">
                                                <div class="container">
                                                    <div class="row mt-3">
                                                        <div class="post-user-identifier">
                                                            <div class="col-2 user-avatar">
                                                                <img src="/storage/{{ $response->responseUser->avatar }}" alt="comment-user-avatar">
                                                            </div>
                                                            <div class="col-10 pl-4 user-name-identifier">
                                                                @if ($response->responseUser->user_name)
                                                                    <p>{{ $response->responseUser->user_name }}</p>
                                                                @else
                                                                    <p>{{ $response->responseUser->name }}</p>
                                                                @endif
                                                            </div>
                                                            <div class="seguir">
                                                                <form action="/personas_seguidas" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="persona" value="{{ $post->user_id }}">
                                                                    <button type="submit" class="comentar"><i class="fas fa-user-plus"></i>Seguir</button>
                                                                </form> 
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <p>{{ $response->responses }}</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    @guest
                                                        <div class="comentar" disabled>Responder</div>  
                                                    @endguest
                                                    @auth
                                                        <div class="commentDiv">
                                                            <button class="likes"><i class="far fa-thumbs-up"></i>Like</button><sup></sup>
                                                            <button class="comentar"><i class="fas fa-comment"></i>Responder</button>
                                                            <form action="/responses" method="POST" enctype="multipart/form-data" class="responses-form mb-2">
                                                            @csrf    
                                                                <input type="text" name="response-content" class="comment-content" maxlenght="400">
                                                                <input type="hidden" name="comment-response-id" value="{{ $comment->id }}">
                                                                <button type="submit" class="submit-comment"><i class="fas fa-share"></i></button>
                                                            </form>    
                                                        </div>    
                                                    @endauth
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach   
                        </div>
                    @empty
                        <em>¡SE EL PRIMERO EN CONTAR TU EXPERIENCIA EN VIAGGIO!</em>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('/js/inicio.js') }}"></script>
    <style>
        #user-info-square {
            background-image: url('/storage/2-forest.jpg');
            background-repeat: no-repeat;            
            background-size: cover;
            color: white;
            font-weight: bold;
            width: 350px;
            height: 160px;
            border-radius: 10px;
        }

        .background {
            background-color: #90c74c;
            opacity: 0.8;
            width: 100%;
            height: 100%;
            border-radius: inherit;
        }

        #initial-avatar {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            border: 5px solid white;
            position: absolute;
        }

        h2 {
            cursor: pointer;
        }

        .post-form {
            display: none;
        }

        .textarea {
            transition: display 2s linear;
        }

        .post-container {
            background-color: white; 
            color: black;
            font-weight: bold;
            height: 100%;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            box-shadow: 0px 10px 10px grey;
        }

        .post-user-identifier {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .user-avatar img, img[alt=comment-user-avatar] {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .user-name-identifier {
            margin-left: 15px;
        }

        .seguir {
            position: relative;
            float: right;
            margin-left: 15px;
            padding-left: 15px;
        }

        #principal {
            height: auto;
            background-color: #fafbfc;
        }

        .post-image-content {
            height: inherit;
        }

        img[alt="Post image"] {
            height: 100%;
            width: 100%;
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
            color: #90c74c;
        }

        .fa-thumbs-up {
            padding-right: 3px;
            color: #90c74c;
        }

        .fa-user-plus {
            color: #90c74c;
        }

        .comment-content {
            height: auto;
            width: 90%;
            background-color: #dfe6e9;
            border: none;
            border-radius: 15px;
            padding: 7px 10px;
        }

        .submit-comment {
            background-color: #45aaf2;
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
            background-color: lightgrey;
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
            margin-bottom: 10px;
        }

        .resp {
            left: 50px;
        }

        #drop-drown-color-div-1 {
            background-color: black;
            width: 110px;
            height: 50px;
        }

        #drop-drown-color-div-2 {
            background-color: white;
            width: 110px;
            height: 50px;
            border: 1px solid black;
        }
    </style>
@endsection