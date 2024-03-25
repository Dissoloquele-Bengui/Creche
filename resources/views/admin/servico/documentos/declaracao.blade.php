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
        #assinatura {
            text-align: center;
            margin-top: 20px;
        }
        #dados-aluno {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        #dados-aluno img {
            width: 100px;
            height: auto;
            margin-right: 20px;
        }
        #dados-aluno ul {
            margin: 0;
        }
        #dados-aluno ul li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Declaração Escolar</h1>
        <section id="declaracao">
            <h2>Declaração</h2>
            <p>Declaramos que o(a) aluno(a) <strong>{{$aluno->primeiro_nome." ".$aluno->ultimo_nome}}</strong>, nascido(a) em <strong>{{$aluno->data_nascimento}}</strong>, está regularmente matriculado(a) na Escola XYZ.</p>
            <p>Informamos que este documento confirma a participação regular do(a) aluno(a) nas atividades escolares, bem como o seu desempenho, sem uso de notas numéricas.</p>
            <p>O(a) aluno(a) tem apresentado um bom desempenho escolar, demonstrando habilidades e competências em diversas áreas do conhecimento.</p>
            <p>Este documento é válido para fins de [especificar a finalidade da declaração].</p>
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
