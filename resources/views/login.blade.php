<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/estilo-login-cadastro.css')}}"/>
        <title>Login</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{url('')}}">RR - System </a>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{url('/login')}}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('/cadastro-cliente')}}">Cadastro</a></li>
            </ul>
        </nav>
        <section class="container">
            <header>
                <?php 
                    if (session()->has('falha_login')) {
                        echo "<p class='alert alert-danger'>" . session('falha_login') . "</p>";
                    }
                ?>
                <h1>Login</h1>
                <p>Seja bem-vindo ao sistema de reserva de recursos acesse o sistema com seu login e senha!</p>
            </header>
            <form action="/autenticar-usuario" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <label>Usuário:</label>
                <input type="text" class="form-control" name="login_usuario" placeholder="Usuário"/>
                <label>Senha:</label>
                <input type="password" class="form-control" name="senha_usuario" placeholder="Senha"/><br/>
                <input type="submit" class="btn btn-success form-control" value="Entrar"/><br/>
            </form> 
       </section>
    </body>
</html>
