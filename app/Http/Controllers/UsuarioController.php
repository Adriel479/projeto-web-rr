<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{
    public function cadastrarUsuario(Request $request) {
            if (empty($request->nome_usuario) || empty($request->login_usuario)
            || empty($request->senha_usuario)) {
                return redirect('/cadastro-cliente')
                ->with('campos_vazios', '.');
            } else {

                $usuario = Usuario::where('login_usuario', $request->login_usuario)->get();

                if (strval($usuario) != "[]")
                    return redirect('/cadastro-cliente')->with('login_existente', '.');

                $usuario = new Usuario;
                $usuario->nome_usuario = $request->nome_usuario;
                $usuario->login_usuario = $request->login_usuario;
                $usuario->senha_usuario = $request->senha_usuario;
                $usuario->tipo_usuario = 'U';
                $usuario->save();
                return redirect('/cadastro-cliente')->with('estado','usuario_cadastrado');
            }
    }

    public function alterarPermissao(Request $request) {
        if (session()->has('login') && session()->get('login')['tipo'] == 'A') {
            if (strval($request->tipo_usuario) == "U") {
                Usuario::where('id_usuario', (int)$request->id_usuario)->update(array('tipo_usuario'=>'A'));
            } else {
                Usuario::where('id_usuario', (int)$request->id_usuario)->update(array('tipo_usuario'=>'U'));
            }
            $usuarios = Usuario::all('id_usuario', 'nome_usuario', 'tipo_usuario');
            if (session()->get('login')['id'] == (int)$request->id_usuario) {
                session()->flush();
                return redirect('/login')->with('permissao', 'Permissão alterada com sucesso!');
            }
            return view('gerenciar-admin', ['mensagem'=>'Alterado com sucesso!','usuario' => $usuarios]);
        } else {
            return view('aviso');
        }
    }

}
