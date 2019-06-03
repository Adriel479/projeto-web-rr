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
use Illuminate\Http\Request;


Route::get('/', function () {
    return redirect('login');
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
    if (session()->has('login') && session()->get('login')['tipo'] == 'A') {
        $recurso = Recurso::all();
        return view('gerenciar-recurso', ['recurso' => $recurso]);
    } else {
        return view('aviso');
    }
});

Route::get('/listar-recurso', function () {
    if (session()->has('login')) {
        $lista_recursos = Recurso::all();
        $lista_reservas = Reserva::where('id_usuario', (session()->get('login'))['id'])
                        ->where('estado_reserva', 'U')->get();
        
        $reservas = Reserva::all();

        $usando =  DB::table('recursos')
            ->join('reservas', 'recursos.id_recurso', '=', 'reservas.id_recurso')
            ->where('reservas.estado_reserva', '=', 'U')
            ->get();
        //return $usando;
        $recursos = array();
        foreach($lista_recursos as $rr) {
            $estado = 0;
            foreach ($usando as $uu) {
                //return $uu;
                if ($rr['id_recurso'] == $uu->id_recurso) {
                    $estado = 1;
                    break;
                }
            }
            if ($estado == 0)
                array_push($recursos, $rr);
        }

        foreach ($reservas as $r) {
            $data_reserva = date('Y-m-d', strtotime($r['data_reserva']));
            $data_hoje = time();
            if ($data_reserva < $data_hoje && $r['estado_reserva'] != 'U') {
                Reserva::where('id_reserva', $r['id_reserva'])->update(['estado_reserva'=>'D']);
            }
        }

        $dados = array();
        foreach ($lista_reservas as $item) {
            $tb = Recurso::where('id_recurso', $item['id_recurso'])->get();
            if (!empty($tb)) {
                array_push($dados, 
                    [
                        "id" => $tb[0]['id_recurso'],
                        "nome" => $tb[0]['nome_recurso'],
                        "descricao" => $tb[0]['descricao_recurso'],
                        "data" => $item['data_reserva']
                    ]
                ); 
            }
        }
        return view('listar-recurso', ['lista_recurso'=>$recursos, 'lista_reserva' => $dados]);
    } else {
        return redirect('login')->with('falha_login', Mensagem::acessoNaoPermitido());
    }
});

Route::post('/reservar-recurso', function (Request $request) {
    if (session()->has('login')) {
        $dados = Recurso::where('id_recurso', $request->id_recurso)->get();
        return view('reservar-recurso', ['dados' => $dados[0]] );
    } else {
        return view('aviso');
    }
});

Route::get('/sair', function() {
    session()->flush();
    return redirect('/login');
});

Route::get('/gerenciar-admin', function() {
    if (session()->has('login') && session()->get('login')['tipo'] == 'A') {
        $usuarios = Usuario::all('id_usuario', 'nome_usuario', 'tipo_usuario');
        return view('gerenciar-admin', ['usuario'=>$usuarios]);
    } else {
        return view('aviso');
    }
    
});

Route::post("/inserir-usuario", "UsuarioController@cadastrarUsuario");

Route::post("/inserir-recurso", "RecursoController@cadastrarRecurso");

Route::post('/inserir-reserva', 'ReservaController@cadastrarReserva');

Route::post("/autenticar-usuario", "LoginController@autenticarUsuario");

Route::post("/editar-recurso", function(Request $request){
    
    if (session()->has('login') && session()->get('login')['tipo'] == 'A') {
        $recurso = Recurso::where('id_recurso', $request->id_recurso)->get();
        return view('editar-recurso', ['recurso' => $recurso[0]] );
    } else {
        return view('aviso');
    }
});

Route::post("/remover-recurso", "RecursoController@removerRecurso");

Route::post("/atualizar-recurso", "RecursoController@atualizarRecurso");

Route::post("/tipo-usuario", "UsuarioController@alterarPermissao");