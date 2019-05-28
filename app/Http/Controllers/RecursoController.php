<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recurso;
use App\Mensagem;
use App\Reserva;

class RecursoController extends Controller
{
    public function cadastrarRecurso (Request $request) {
        if (session()->has('login') && session()->get('login')['tipo'] == 'A') {
            if (empty($request->nome_recurso) || empty($request->descricao_recurso)) 
                return redirect('/cadastro-recurso')->with('campos_vazios', '.');
            $recurso = new Recurso;
            $recurso->nome_recurso = strval($request->nome_recurso);
            $recurso->descricao_recurso = strval($request->descricao_recurso);
           // $recurso->quantidade_recurso = $request->quantidade_recurso;
            $recurso->save();
            return redirect('/cadastro-recurso')->with('estado', Mensagem::cadastradoComSucesso());
        } else {
            return view('aviso');
        }
    }

    public function removerRecurso(Request $request) {
        if (session()->has('login') && session()->get('login')['tipo'] == 'A') {
            Reserva::where('id_recurso', $request->id_recurso)->delete();
            Recurso::where('id_recurso', $request->id_recurso)->delete();
            return view('/gerenciar-recurso', ['mensagem'=>'Removido com sucesso!']);
        } else {
            return view('aviso');
        }
        
    }

    public function atualizarRecurso(Request $request) {
        if (session()->has('login') && session()->get('login')['tipo'] == 'A') {
            $recurso = array(
                'nome_recurso' => $request->nome_recurso, 
                'descricao_recurso' => $request->descricao_recurso,
                'quantidade_recurso' => $request->quantidade_recurso        
            );
            $recurso['id_recurso'] = $request->id_recurso;
            Recurso::where('id_recurso', $request->id_recurso)->update($recurso);
            return view('/editar-recurso', ['mensagem'=>'Alterado com sucesso!', 'recurso'=>$recurso]);
        } else {
            return view('aviso');
        }
    }

}
