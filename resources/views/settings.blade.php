@extends('layouts.plantilla')

@section('title')
    Theme
@endsection

@section('header')
    <div id="header" class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-5 go-back">
                <a href="/inicio"><i class="fas fa-chevron-circle-left"></i></a>
            </div>
            <div class="col-12 col-sm-7 theme">
                <p class="h2">Theme</p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid" id="main-container">
        <div class="row">
            <p class="col-12 mx-auto text-center">Change your Theme</p>
            <div id="theme1" class="col-12 col-sm-3">
                <svg height="300" width="300">
                    <defs>
                        <radialGradient id="circle-grad1" cx="50%" cy="50%" r="40%" fx="50%" fy="50%">
                            <stop offset="0%" style="stop-color: #d1d8e0; stop-opacity:0.7" />
                            <stop offset="100%" style="stop-color: #A3CB38; stop-opacity:1" />
                        </radialGradient>
                    </defs>
                    <circle cx="150" cy="150" r="70" stroke="black" stroke-width="1" fill="url(#circle-grad1)" />
                </svg>
            </div>
            <div id="theme2" class="col-12 col-sm-3">
                <svg height="300" width="300">
                    <defs>
                        <radialGradient id="circle-grad2" cx="50%" cy="50%" r="40%" fx="50%" fy="50%">
                            <stop offset="0%" style="stop-color: #d1d8e0; stop-opacity:0.7" />
                            <stop offset="100%" style="stop-color: #1289A7; stop-opacity:1" />
                        </radialGradient>
                    </defs>
                    <circle cx="150" cy="150" r="70" stroke="black" stroke-width="1" fill="url(#circle-grad2)" />
                </svg>
            </div>
            <div id="theme3" class="col-12 col-sm-3">
                <svg height="300" width="300">
                    <defs>
                        <radialGradient id="circle-grad3" cx="50%" cy="50%" r="40%" fx="50%" fy="50%">
                            <stop offset="0%" style="stop-color: #d1d8e0; stop-opacity:0.7" />
                            <stop offset="100%" style="stop-color: #D980FA; stop-opacity:1" />
                        </radialGradient>
                    </defs>
                    <circle cx="150" cy="150" r="70" stroke="black" stroke-width="1" fill="url(#circle-grad3)" />
                </svg>
            </div>
            <div id="theme4" class="col-12 col-sm-3">
                <svg height="300" width="300">
                    <defs>
                        <radialGradient id="circle-grad4" cx="50%" cy="50%" r="40%" fx="50%" fy="50%">
                            <stop offset="0%" style="stop-color: #d1d8e0; stop-opacity:0.7" />
                            <stop offset="100%" style="stop-color: #EE5A24; stop-opacity:1" />
                        </radialGradient>
                    </defs>
                    <circle cx="150" cy="150" r="70" stroke="black" stroke-width="1" fill="url(#circle-grad4)" />
                </svg>
            </div>
        </div>
    </div>
    <script src="{{ asset('/js/theme.js') }}"></script>
    <style>
        header .container-fluid {
            background-color: #2d98da;
        }
        
        main .container-fluid {
            background-color: #45aaf2;
        } 

        #theme1 svg, #theme2 svg, #theme3 svg, #theme4 svg {
            cursor: pointer;
        }   

        .go-back {
            color: #d1d8e0 !important;
        }

        .theme {
            color: #d1d8e0;
        }

        p {
            color: #d1d8e0;
            font-size: 2em;
        }
    </style>
@endsection