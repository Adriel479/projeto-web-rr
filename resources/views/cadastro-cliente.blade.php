<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/estilo-zero.css')}}"/>
        <title>Cadastro de Usuários</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="">RR - Sys </a>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{url('/login')}}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('/cadastro-cliente')}}">Cadastro</a></li>
            </ul>
        </nav>
       <section class="container">
            <header>
                <?php 
                    if (session()->has('estado') && session('estado') == 'usuario_cadastrado') {
                        echo "<p class='alert alert-success' role='alert'>Cadastrado com sucesso!</p>";
                        session()->forget('estado');
                    }

                    if (session()->has('campos_vazios')) {
                        echo "<p class='alert alert-danger' role='alert'>Todos os campos são obrigatórios!</p>";
                        session()->forget('campos_vazios');
                    }

                    if (session()->has('login_existente')) {
                        echo "<p class='alert alert-danger' role='alert'>Já existe um usuário com esse Login!</p>";
                        session()->forget('login_existente');
                    }

                ?>
                <h1>Cadastro de usuário</h1>
            </header>
            <form action="inserir-usuario" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <label>Nome:</label>
                <input type="text" class="form-control" name="nome_usuario" placeholder="Nome Completo"/>
                <label>Usuário:</label>
                <input type="text" class="form-control" name="login_usuario" placeholder="Usuário"/>
                <label>Senha:</label>
                <input type="password" class="form-control" name="senha_usuario" placeholder="Senha"/><br/>
                <input type="submit" class="btn btn-success form-control" value="Cadastrar"/><br/>
            </form> 
       </section>
    </body>
</html>
