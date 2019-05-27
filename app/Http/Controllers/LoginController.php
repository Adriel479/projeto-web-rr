<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Mensagem;

class LoginController extends Controller
{
    public function autenticarUsuario(Request $request) {
        $resultado = Usuario::where('login_usuario', strval($request->login_usuario))->where('senha_usuario', strval($request->senha_usuario))->get();
        if (!empty($resultado[0])) {
            $request->session()->put("login", [
                'id' => $resultado[0]['id_usuario'],
                'login' => $resultado[0]['login_usuario'],
                'senha' => $resultado[0]['senha_usuario'],
                'tipo' => $resultado[0]['tipo_usuario']
            ]);
            return redirect('/listar-recurso');
        }
        return redirect('/login')->with('falha_login', Mensagem::acessoNaoPermitido());
    }
}
