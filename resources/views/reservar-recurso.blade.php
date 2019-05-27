<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/estilo-login-cadastro.css')}}"/>
        <title>Cadastro</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{url('/')}}">RR - System </a>
            <ul class="navbar-nav">
            <?php 
                    $sessao = session()->get('login');
                    if (session()->has('login') && session()->get('login')['tipo'] == 'A') {
                        echo "<li class='nav-item'><a class='nav-link' href='/cadastro-recurso'>Cadastrar Recurso</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='/gerenciar-recurso'>Gerenciar Recursos</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href=''>Gerenciar Administradores</a></li>";
                    }
                    echo "<li class='nav-item'><a class='nav-link' href='/listar-recurso'>Listar Recursos</a></li>";
                    echo "<li class='nav-item'><a class='nav-link' href='/sair'>Sair</a></li>";
                ?>
            </ul>
        </nav>

           
       <section class="container">
            <header>
                <h1>Confirmar reserva</h1>
            </header>
            <form action="/inserir-reserva" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="text" name="id_recurso" value=<?php echo $dados['id_recurso'];?> hidden/>
                <label>Nome recurso:</label>
                <input type="text" class="form-control" name="nome_recurso" disabled value='<?php echo $dados['nome_recurso'];?>'/>
                <label>Descrição:</label>
                <input type="text" class="form-control" name="descricao_recurso" disabled value='<?php echo $dados['descricao_recurso'];?>'/>
                <label>Data de reserva:</label>
                <select name="data_recurso" class="form-control">
                    <?php
                        $cont = 0;
                        $tamanho = 8;
                        $semana[1] = 'Segunda - feira';
                        $semana[2] = 'Terça - feira';
                        $semana[3] = 'Quarta - feira';
                        $semana[4] = 'Quinta - feira';
                        $semana[5] = 'Sexta - feira';
                        while ($cont < $tamanho) {
                            $data = date('Y-m-d', strtotime('+' . strval($cont) . ' day'));
                            if (date('w', strtotime($data)) != 0 && date('w', strtotime($data)) != 6)
                                echo "<option value='" .  $data . "'>" . $data . ' - ' . $semana[date('w', strtotime($data))] . '</option>';
                            else
                                $tamanho = $tamanho + 1;
                            $cont = $cont + 1;
                        }
                    ?>
                </select><br/>
                <input type="submit" class="btn btn-success form-control" value="Confirmar"/><br/>
            </form> 
       </section>
    </body>
</html>
