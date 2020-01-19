<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.register');
});

Auth::routes();

// HOME/INICIO/PERFIL

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/inicio', 'InicioController@init')->name('inicio');

Route::post('/inicio', 'PostController@uploadPost');

Route::get('/perfil', 'PerfilController@show');

// ELIMINAR SETTINGS

Route::get('/settings', function() {
    return view('settings');
});

// FAQ´S

Route::get('/faq', function() {
    return view('faq');
});

// EN PERFIL: SEGUIDORES Y PERSONAS SEGUIDAS + EDICION DE DATOS PERSONALES

Route::get('/personas_seguidas', 'FollowerController@following');

Route::post('/personas_seguidas', 'FollowerController@follow');

Route::get('/seguidores', 'FollowerController@followers');

Route::get('/editar', 'EditarController@index')->name('editar');

Route::put('/editar/{id}', 'EditarController@editar')->name('editar');

Route::post('/comments', 'CommentController@uploadComment');

Route::post('/responses', 'ResponseController@uploadReponse');

Route::get('/terminos_y_condiciones', function() {
    return view('terminos_y_condiciones');
});

Route::get('/contacto', function() {
    return view('contacto');
});

Route::get('/ayuda', function() {
    return view('ayuda');
});