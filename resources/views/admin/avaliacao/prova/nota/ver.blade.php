@extends('layout.admin.body')
@section('titulo','Pauta Trimestral da turma '.$turma->nome )

@section('conteudo')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row">
          <!-- Small table -->
          <div class="col-md-12 my-4">
            <h2 class="h4 mb-1"></h2>
            <p class="mb-3"></p>
            <div class="card shadow">
                <div class="card-header d-flex justify-content-around">
                    <strong class="card-title">Pauta de {{ $disciplina->nome }}</strong>
                    <strong>Curso {{ $turma->curso }}</strong>
                    <strong>Turma {{ $turma->nome }}</strong>
                    <strong>Ano Lectivo {{ $turma->data_inicio }} -- {{ $turma->data_fim }}</strong>
                </div>
              <div class="card-body">
                <div class="toolbar">
                  <form class="form">
                    <div class="form-row">
                      <div class="form-group col-auto mr-auto">
                        <label class="my-1 mr-2 sr-only" for="inlineFormCustomSelectPref1">Show</label>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelectPref1">
                          <option value="">...</option>
                          <option value="1">12</option>
                          <option value="2" selected>32</option>
                          <option value="3">64</option>
                          <option value="3">128</option>
                        </select>
                      </div>
                      <div class="form-group col-auto">
                        <label for="search" class="sr-only">Search</label>
                        <input type="text" class="form-control" id="search1" value="" placeholder="Procurar">
                      </div>
                    </div>
                  </form>
                </div>
                <!-- table -->
                <table class="table table-borderless table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th>Nº de Turma</th>
                      <th>Nº de Processo</th>
                      <th>Nome</th>
                      <th>Prova Do Professor</th>
                      <th>Prova Trimestral</th>
                      <th>M.A.C</th>
                      <th>MÉDIA</th>
                      <th>SITUAÇÂO</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($alunos as $aluno)
                        <tr>
                            <td class="text-justify">
                                <p class="mb-0 text-muted"><strong>{{$loop->iteration }}</strong></p>
                            </td>
                            <td class="text-justify">
                                <p class="mb-0 text-muted"><strong>{{$aluno->id }}</strong></p>
                            </td>
                            <td class="text-justify">
                            <p class="mb-0 text-muted">{{$aluno->primeiro_nome}} {{$aluno->nome_meio}} {{$aluno->ultimo_nome}}</p>
                            </td>
                            <td class="text-justify">
                                <p class="mb-0 text-muted">
                                    {{$aluno->avaliacoes!=null ? $aluno->avaliacoes['p1']:0 }}</p>
                            </td>
                            <td class="text-justify">
                                <p class="mb-0 text-muted">{{$aluno->avaliacoes!=null ? $aluno->avaliacoes['p2']:0}}</p>
                            </td>
                            <td class="text-justify">
                                <p class="mb-0 text-muted">{{$aluno->avaliacoes!=null ? $aluno->avaliacoes['MAC']:0 }}</p>
                            </td>
                            <td class="text-justify">
                                <p class="mb-0 text-muted">{{$aluno->avaliacoes!=null ? ($aluno->avaliacoes['MAC']+$aluno->avaliacoes['p1']+$aluno->avaliacoes['p2'])/3:0}}</p>
                            </td>
                            <td class="text-justify">
                                <p class="mb-0 text-muted">{{$aluno->avaliacoes!=null ?( ($aluno->avaliacoes['MAC']+$aluno->avaliacoes['p1']+$aluno->avaliacoes['p2'])/3>10?'Apto':'Não Apto'):'Não Apto'}}</p>
                            </td>
                        </tr>

                    @endforeach

                  </tbody>
                </table>
                <nav aria-label="Table Paging" class="mb-0 text-muted">
                  <ul class="pagination justify-content-center mb-0">
                    <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Proximo</a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div> <!-- customized table -->
        </div> <!-- end section -->

      </div> <!-- .col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
@endsection
