<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Relatório</title>
</head>

    <body>
        <div class="titulo" style="text-align: center"><h2>Relatório de Consultas</h2></div>
            <br>
        <div class="titulo" style="text-align:right"> 
            Emitido às <b>{{$hora}}</b> do dia <b>{{$dia}}</b>.
            <br>
            Solicitante: <b>{{$autor->name}}</b>.
        </div>

        <br><br>

        <div class="container">
           
            <table border="1">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Animal</th>
                        <th>Proprietário</th>
                        <th>Tratamento</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($consultas as $consulta)
                            <tr>
                            <td>{{$consulta->inicio}}</td>
                            <td>{{$consulta->animal->nome}}</td>
                            <td>{{$consulta->animal->proprietario->nome}}</td>
                            <td>{{$consulta->nome_tratamento}}</td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>

    </body>
</html>