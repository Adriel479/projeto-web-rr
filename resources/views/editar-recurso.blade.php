<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/estilo-zero.css')}}"/>
        <title>Editar Recurso</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="">RR - Sys </a>
            <ul class="navbar-nav">
                <?php 
                    $sessao = session()->get('login');
                    if (session()->has('login') && session()->get('login')['tipo'] == 'A') {
                        echo "<li class='nav-item'><a class='nav-link' href='/cadastro-recurso'>Cadastrar Recurso</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='/gerenciar-recurso'>Gerenciar Recursos</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='/gerenciar-admin'>Gerenciar Administradores</a></li>";
                    }
                    echo "<li class='nav-item'><a class='nav-link' href='/listar-recurso'>Listar Recursos</a></li>";
                    echo "<li class='nav-item'><a class='nav-link' href='/sair'>Sair</a></li>";
                ?>
            </ul>
        </nav>
       <section class="container">
            <header>
                <?php
                    if (isset($mensagem)) {
                        echo "<p class='alert alert-warning'>" . $mensagem. "</p>";
                    }
                ?>
                <h1>Editar Recurso</h1>
            </header>
            <form action="/atualizar-recurso" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <?php
                    echo "<input type='text' name='id_recurso' value='" . $recurso['id_recurso'] . "'hidden/>";
                    echo "<label>Nome:</label>";
                    echo "<input type='text' class='form-control' name='nome_recurso' placeholder='Nome' value='" . $recurso['nome_recurso'] . "'/>";
                    echo "<label>Descrição:</label>";
                    echo "<input type='text' class='form-control' name='descricao_recurso' placeholder='Descrição' value='" . $recurso['descricao_recurso'] . "'/>";
                ?>
                <br/>
                <input type="submit" class="btn btn-success form-control" value="Salvar"/><br/>
            </form> 
       </section>
    </body>
</html>
