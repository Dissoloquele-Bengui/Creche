<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartão Escolar</title>
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
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .school-info {
            text-align: center;
            margin-bottom: 20px;
        }
        .student-info {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            width: 100%;
        }
        .student-info img {
            width: 150px;
            height: auto;
            margin-right: 20px;
        }
        .student-details {
            flex-grow: 1;
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        p {
            margin-bottom: 10px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="school-info">
            <h1>Escola Exemplo</h1>
            <p>Rua da Escola, 123 - Cidade</p>
            <p>Tel: (00) 1234-5678 | E-mail: contato@escolaexemplo.com</p>
        </div>
        <table>
            <tr>
                <td>
                    <img src="https://via.placeholder.com/150" alt="Foto do Aluno">
                </td>
                <td>
                    <h4><strong>Curso:</strong> {{$turma->curso}}</h4>
                    <h4><strong>Nome Completo:</strong> {{$aluno->primeiro_nome." ".$aluno->ultimo_nome}}</h4>
    
                    <h4><strong>Classe:</strong> {{$turma->classe}}</h4>
                    <h4><strong>Nº de Processo:</strong> {{$aluno->id}}</h4>
                
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
