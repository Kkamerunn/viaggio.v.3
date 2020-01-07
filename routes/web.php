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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/inicio', 'InicioController@init')->name('inicio');

Route::post('/inicio', 'PostController@uploadPost');

Route::get('/perfil', 'PerfilController@show');

Route::get('/settings', function() {
    return view('settings');
});

Route::get('/faq', function() {
    return view('faq');
});

Route::get('/personas_seguidas', 'FollowerController@following');

Route::post('/personas_seguidas', 'FollowerController@follow');

Route::get('/seguidores', 'FollowerController@followers');


