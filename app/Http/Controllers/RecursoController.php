<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recurso;
use App\Mensagem;

class RecursoController extends Controller
{
    public function cadastrarRecurso (Request $request) {
        if (session()->has('login') && session()->get('login')['tipo'] == 'A') {
            $recurso = new Recurso;
            $recurso->nome_recurso = strval($request->nome_recurso);
            $recurso->descricao_recurso = strval($request->descricao_recurso);
            $recurso->quantidade_recurso = $request->quantidade_recurso;
            $recurso->save();
            return redirect('/cadastro-recurso')->with('estado', Mensagem::cadastradoComSucesso());
        } else {
            return view('aviso');
        }
    }
}
