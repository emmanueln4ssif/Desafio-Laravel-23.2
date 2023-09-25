<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <title>Relatório</title>
</head>

    <body>
        
        <div class="cabecalho" style="text-align: center"><h2>CLÍNICA VETERINÁRIA VETCENTER</h2></div>
        <br>
        <div class="titulo" style="text-align: center"><h2>Relatório de Consultas</h2></div>
            <br>
        <div class="subtitulo" style="text-align:right"> 
            Emitido às <b>{{$hora}}</b> do dia <b>{{$dia}}</b>.
            <br>
            Solicitante: <b>{{$autor->name}}</b>.
        </div>

        <br><br>

        <div class="container">
           @if ($consultas->isEmpty())
           <br> <div style="text-align: center">Sem consultas cadastradas!</div>
           @else
            <table border="1">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Funcionário</th>
                        <th>Animal</th>
                        <th>Proprietário</th>
                        <th>Nome do Tratamento</th>
                        <th>Medicamentos</th>
                        <th>Tempo de Repouso</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($consultas as $consulta)
                            <tr>
                            <td>{{$consulta->inicio}}</td>
                            <td>{{$consulta->user->name}}</td>
                            <td>{{$consulta->animal->nome}}</td>
                            <td>{{$consulta->animal->proprietario->nome}}</td>
                            <td>{{$consulta->nome_tratamento}}</td>
                            <td>{{$consulta->medicacoes_tratamento}}</td>
                            <td>{{$consulta->repouso_tratamento}}</td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
            @endif
        </div>

    </body>
</html>