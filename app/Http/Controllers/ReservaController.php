<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;
use App\Mensagem;
use App\Recurso;

class ReservaController extends Controller
{
    public function cadastrarReserva(Recurso $recurso, Request $request) {
        if (session()->has('login') && session()->has('login')) {
            $reserva = new Reserva;
            $reserva->data_reserva = $request->data_recurso;
            $reserva->id_usuario = strval(session()->get('login')['id']);
            $reserva->id_recurso = $request->id_recurso;
            $reserva->estado_reserva = 'U';
            $reserva->save();
            $ret = Recurso::where('id_recurso', $request->id_recurso)->get();
            $qtd =  ((int)($ret[0]['quantidade_recurso'])) - 1;
            Recurso::where('id_recurso', $request->id_recurso)->update(array('quantidade_recurso' => $qtd));
            return redirect('/listar-recurso')->with('estado', Mensagem::cadastradoComSucesso());
        } else {
            return view('aviso');
        }
    }
}
