<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Cadastro</title>

        <style>
            .container {
                width: 50%;
                height: 50%;
                margin-top: 15%;
                border: 1px solid #e5e5e5;
                border-radius: 10px;
                padding: 80px;
            }

            .container header{
                text-align: center;
            }
        </style>

    </head>
    <body>
       <section class="container">
            <header>
                <h1>Cadastro de Rercusos</h1>
            </header>
            <form action="" method="">
                <label>Nome:</label>
                <input type="text" class="form-control" name="nome_recurso" placeholder="Nome do recurso"/>
                <label>Quantidade:</label>
                <input type="number" class="form-control" name="quantidade_recurso"/>
                <label>Descrição:</label>
                <textarea class="form-control" rows="5"></textarea><br/>
                <input type="submit" class="btn btn-success form-control" value="Cadastrar"/><br/>
            </form> 
       </section>
    </body>
</html>
