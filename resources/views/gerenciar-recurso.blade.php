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
                <h1>Lista de recursos</h1>
            </header>
            <table class="table">
                <th>Código</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Editar</th>
                <th>Excluir</th>
                <tr>
                    <td>Eu sou uma linha</td>
                    <td>Eu sou uma linha</td>
                    <td>Eu sou uma linha</td>
                    <td>Eu sou uma linha</td>
                    <td><form action="" method="post" class="btn-"><input type="submit" class="btn btn-primary" value="Editar"></form></td>
                    <td><form action="" method="post"><input type="submit" class="btn btn-danger" value="Excluir"></form></td>
                </tr>
            </table>
       </section>
    </body>
</html>
