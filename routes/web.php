<?php

use Illuminate\Http\Request as RequestMethods;

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

Route::put('/inicio', 'InicioController@likes');

Route::get('/perfil/{id}', 'PerfilController@show');

// FAQ´S

Route::get('/faq', function() {
    return view('faq');
});

// EN PERFIL: SEGUIDORES Y PERSONAS SEGUIDAS + EDICION DE DATOS PERSONALES

Route::middleware('auth')->group(function() {

    Route::get('/personas_seguidas', 'FollowerController@following');

    Route::post('/personas_seguidas', 'FollowerController@follow');

    Route::delete('/eliminar/{id}', 'FollowerController@stopFollowing')->name('eliminar');

    Route::get('/seguidores', 'FollowerController@followers');

    Route::get('/editar', 'EditarController@index')->name('editar');

    Route::put('/editar/{id}', 'EditarController@editar')->name('editar');

    Route::post('/comments', 'CommentController@uploadComment');

    Route::put('/comments', 'CommentController@commentLikes');

    Route::post('/responses', 'ResponseController@uploadReponse');

    Route::put('/responses', 'ResponseController@responseLikes');

});


Route::get('/terminos_y_condiciones', function() {
    return view('terminos_y_condiciones');
});

Route::get('/contacto', function(RequestMethods $request) {
    return view('contacto', ['url' => $request->fullUrl()]);
});

Route::view('/saludo', 'saludo', ['saludos' => 'Hola, bienvenidos a mi proyecto en laravel']);

Route::get('/despedida', 'Despedida');

/*
-------------------
CONSUMIENDO UNA API
-------------------
*/

Route::get('/clima', 'ClimaController@verClima');

/*
----------------------------------------------------
VISTA POR DEFAULT SI NO SE ENCUENTRA LA QUE SE BUSCA
----------------------------------------------------
*/

Route::fallback(function() {
    return view('welcome');
});
