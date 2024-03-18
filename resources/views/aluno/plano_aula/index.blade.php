@extends('layout.admin.body')
@section('titulo','Lista dos Planos de aula')

@section('conteudo')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <h2 class="mb-2 page-title">Lista dos Planos de aula</h2>

      <div class="row my-4">
        <!-- Small table -->
        <div class="col-md-12">
          <div class="card shadow">

            <div class="card-body">
                <!-- table -->
              <table class="table datatables" id="dataTable-1">
                  {{-- @can('user-create') --}}

                <thead>
                  <tr>
                      <th>ID</th>
                      <th>Professor</th>
                      <th>TURMA</th>
                      <th>CURSO</th>
                      <th>CLASSE</th>
                      <th>DISCIPLINA</th>
                      <th>TRIMESTRE</th>
                      <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($plano_aulas as $plano_aula)
                      <tr>
                          <td>{{$plano_aula->id}}</td>
                          <td>{{{$plano_aula->professor}}}</td>
                          <td>{{{$plano_aula->turma}}}</td>
                          <td>{{{$plano_aula->curso}}}</td>
                          <td>{{{$plano_aula->classe}}}</td>
                          <td>{{{$plano_aula->disciplina}}}</td>
                          <td>{{{$plano_aula->trimestre}}}</td>
                          <td>
                              <div class="dropdown">
                                  <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-muted sr-only">Action</span>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right">
                                      <a class="dropdown-item" href="{{ asset($plano_aula->caminho) }}" download="Plano de aula de {{$plano_aula->disciplina}} do {{$plano_aula->trimestre}} Trimestre ">Baixar</a>

                                  </div>
                                  </div>

                          </td>
                      </tr>
                  @endforeach
              </tbody>
              </table>
            </div>
          </div>
        </div> <!-- simple table -->
      </div> <!-- end section -->
    </div> <!-- .col-12 -->
  </div> <!-- .row -->
</div> <!-- .container-fluid1 -->





@endsection
