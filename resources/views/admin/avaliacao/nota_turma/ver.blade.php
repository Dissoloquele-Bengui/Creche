<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pauta Trimestral da turma {{$turma->nome}}</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .container-fluid {
      padding: 20px;
    }
    .card {
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 20px;
    }
    .card-header {
      background-color: #007bff;
      color: #fff;
      padding: 10px;
      text-align: center;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 10px;
      border-bottom: 1px solid #ddd;
      text-align: center;
    }
    th {
      background-color: #f2f2f2;
    }
    .text-muted {
      color: #6c757d;
    }
    .nota {
      border-right: 1px solid #ddd;
      padding-right: 5px;
      padding-left: 5px;
    }
  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="row">
        <!-- Small table -->
        <div class="col-md-12 my-4">
          <h2 class="h4 mb-1"></h2>
          <p class="mb-3"></p>
          <div class="card shadow">
            <div class="card-header">
              <strong>Curso {{$turma->curso}}</strong>
              <strong>Turma {{$turma->nome}}</strong>
              <strong>Ano Lectivo {{$turma->data_inicio}} -- {{$turma->data_fim}}</strong>
            </div>
            <div class="card-body">
              <!-- table -->
              <table class="table table-borderless table-hover">
                <thead class="thead-dark">
                <tr>
                  <th>Nº</th>
                  <th>Processo</th>
                  <th>Nome</th>
                  @foreach ($disciplinas as $disciplina)
                    <th>{{$disciplina->codigo}}</th>
                  @endforeach
                  <th>SITUAÇÂO</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($alunos as $aluno)
                  <tr>
                    <td>
                      <p class="text-muted"><strong>{{$loop->iteration}}</strong></p>
                    </td>
                    <td>
                      <p class="text-muted"><strong>{{$aluno->id}}</strong></p>
                    </td>
                    <td>
                      <p class="text-muted">{{$aluno->primeiro_nome}} {{$aluno->nome_meio}} {{$aluno->ultimo_nome}}</p>
                    </td>
                    @foreach ($disciplinas->where('idMatricula',$aluno->idMatricula) as $disciplina)
                      <td class="nota">
                        <span class="text fs-2"> {{array_key_exists('p1',$disciplina->avaliacoes)?$disciplina->avaliacoes['p1']:0}}</span>
                        <span class="text fs-2 text-around">{{array_key_exists('p2',$disciplina->avaliacoes)?$disciplina->avaliacoes['p2']:0}}</span>
                        <span class="text fs-2 text-around">{{array_key_exists('mac',$disciplina->avaliacoes)?$disciplina->avaliacoes['mac']:0}}</span>
                        @php
                            $media = ((intval($disciplina->avaliacoes['p1'])+intval($disciplina->avaliacoes['p2'])+(array_key_exists('mac',$disciplina->avaliacoes)?$disciplina->avaliacoes['mac']:0))/3);
                        @endphp
                        <span class="text fs-2"> {{$media}}</span>

                      </td>
                    @endforeach
                    @php
                        $p1=0;
                        $p2=0;
                        $mac=0;
                        $media = 0;
                        foreach ($disciplinas->where('idMatricula',$aluno->idMatricula) as $disciplina) {
                            $p1 += array_key_exists('p1',$disciplina->avaliacoes)?$disciplina->avaliacoes['p1']:0;
                            $p2 += array_key_exists('p2',$disciplina->avaliacoes)?$disciplina->avaliacoes['p2']:0;
                            $mac += array_key_exists('mac',$disciplina->avaliacoes)?$disciplina->avaliacoes['mac']:0;
                            $media += ($p1+$p2+$mac)/3;
                        }
                        $media_final = $media/$disciplinas->where('idMatricula',$aluno->idMatricula)->count();
                        $situacao = $media_final>10*$disciplinas->where('idMatricula',$aluno->idMatricula)->count()?'Aprovado':'Reprovado';
                    @endphp
                    <td>
                        {{$situacao}}
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div> <!-- customized table -->
      </div> <!-- end section -->
    </div> <!-- .col-12 -->
  </div> <!-- .row -->
</div> <!-- .container-fluid -->
</body>
</html>
