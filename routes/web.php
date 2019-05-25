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
use App\Mensagem;
use App\Recurso;
use App\Reserva;

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
    if (session()->has('login') && session()->get('login')['tipo'] == 'A')
        return view('cadastro-recurso');
    else
        return view('aviso');
});

Route::get('/gerenciar-recurso', function () {
    if (session()->has('login') && session()->get('login')['tipo'] == 'A')
        return view('gerenciar-recurso');
    else
        return view('aviso');
});

Route::get('/listar-recurso', function () {
    if (session()->has('login')) {
        $lista_recursos = Recurso::all();
       // $lista_reservas = Reserva::where('id_usuario', session()->get('login')['id_usuario']);
        return view('listar-recurso', ['lista_recurso'=>$lista_recursos]);
    } else {
        return redirect('login')->with('falha_login', Mensagem::acessoNaoPermitido());
    }
});

Route::get('/reservar-recurso', function () {
    if (session()->has('login'))
        return view('reservar-recurso');
    else
        return view('aviso');
});

Route::get('/sair', function() {
    session()->flush();
    return redirect('/login');
});

Route::post("/inserir-usuario", "UsuarioController@cadastrarUsuario");

Route::post("/inserir-recurso", "RecursoController@cadastrarRecurso");

Route::post("/autenticar-usuario", "LoginController@autenticarUsuario");