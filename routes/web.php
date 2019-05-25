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

use App\Usuario;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/cadastro-cliente', function () {
    return view('cadastro-cliente');
});

Route::get('/cadastro-recurso', function () {
    return view('cadastro-recurso');
});

Route::get('/gerenciar-recurso', function () {
    return view('gerenciar-recurso');
});

Route::get('/listar-recurso', function () {
    return view('listar-recurso');
});

Route::get('/reservar-recurso', function () {
    return view('reservar-recurso');
});

Route::post("/inserir-usuario", "UsuarioController@cadastrarUsuario");

Route::get('/teste', function () {
            $usuario = new Usuario;
            $usuario->nome = 'Teste';
            $usuario->login = 'Teste';
            $usuario->senha = 'Teste';
            $usuario->tipo = 'C';
            $usuario->save();
});