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

}
