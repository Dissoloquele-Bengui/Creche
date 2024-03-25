<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Declaração Escolar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        p {
            margin-bottom: 10px;
        }
        .info {
            margin-top: 20px;
        }
        .info p {
            margin: 5px 0;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        #notas {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Declaração Escolar</h1>
        <section id="declaracao">
            <h2>Declaração</h2>
            <p>Declaramos que o(a) aluno(a) <strong>{{$aluno->primeiro_nome." ".$aluno->ultimo_nome}}</strong>, nascido(a) em <strong>{{formatarDataPortugues($aluno->data_nascimento)}}</strong>, está regularmente matriculado(a) nesta instituição de ensino no ano letivo de <strong>2023/2024</strong>.</p>
            <p>Informamos que as notas apresentadas abaixo correspondem aos trimestres realizados ao longo do ano letivo.</p>
            <p>A média geral do aluno é <strong>{{$media_geral}}</strong>.</p>
        </section>
        <section id="notas">
            <h2>Notas</h2>
            <table>
                <thead>
                    <tr>
                        <th>Disciplina</th>
                        <th>1º Trimestre</th>
                        <th>2º Trimestre</th>
                        <th>3º Trimestre</th>
                        <th>Média</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($disciplinas as $disciplina)
                        <tr>
                            <td>{{$disciplina->nome}}</td>

                            <td>{{array_key_exists('0',$avaliacoes[$disciplina->id])?$avaliacoes[$disciplina->id]['0']:0}}</td>
                            <td>{{array_key_exists('1',$avaliacoes[$disciplina->id])?$avaliacoes[$disciplina->id]['1']:0}}</td>
                            <td>{{array_key_exists('2',$avaliacoes[$disciplina->id])?$avaliacoes[$disciplina->id]['2']:0}}</td>
                            <td>{{$media[$disciplina->id]}}</td>
                        </tr>                        
                    @endforeach

                </tbody>
            </table>
        </section>
        <section id="assinatura">
            <p>___________________________________</p>
            <p>[Assinatura do Diretor/Coordenador]</p>
            <p>[Cargo do Diretor/Coordenador]</p>
            <p>___________________________________</p>
            <p>[Carimbo da Escola]</p>
        </section>
    </div>
</body>
</html>
