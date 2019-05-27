<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{
    public function cadastrarUsuario(Request $request) {
        $usuario = new Usuario;
        $usuario->nome_usuario = $request->nome_usuario;
        $usuario->login_usuario = $request->login_usuario;
        $usuario->senha_usuario = $request->senha_usuario;
        $usuario->tipo_usuario = 'C';
        $usuario->save();
        return redirect('/cadastro-cliente')->with('estado','usuario_cadastrado');
    }

    public function alterarPermissao(Request $request) {
        if (session()->has('login')) {
            if (strval($request->tipo_usuario) == strval('U')) {
                Usuario::where('id_usuario', $request->id_usuario)->update(array('tipo_usuario'=>'A'));
            } else {
                Usuario::where('id_usuario', $request->id_usuario)->update(array('tipo_usuario'=>'U'));
            }
            $usuarios = Usuario::all('id_usuario', 'nome_usuario', 'tipo_usuario');
            return view('gerenciar-admin', ['mensagem'=>'Alterado com sucesso!','usuario' => $usuarios]);
        } else {
            return view('aviso');
        }
    }

}
