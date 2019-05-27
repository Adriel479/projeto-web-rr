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
        <section style="width: 80%; margin: 10px auto; text-align:center;">
            <h1 class="alert alert-danger">
                Você não possui permissão para acessar essa página!
            </h1>
            <a href="/listar-recurso" class="btn btn-success">Voltar</a>
       </section>
    </body>
</html>
