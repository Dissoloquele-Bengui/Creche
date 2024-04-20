@extends('layout.admin.body')
@section('titulo','Lista dos Educadores')

@section('conteudo')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="text page-title mb-2">
          Lista dos Educadores
        </h2>
        <div class="row">
          <!-- Small table -->
          <div class="col-md-12 my-4">
            <h2 class="h4 mb-1"></h2>
            <p class="mb-3"></p>
            <div class="card shadow">
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
                      <th>IMAGEM</th>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Contacto</th>
                      <th>Data de Contratação</th>
                      <th>Area de especialização</th>
                      <th>Genero</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($professores as $professor)
                    <tr>

                        <td>
                          <div class="avatar avatar-md">
                            <img src="./assets/avatars/face-3.jpg" alt="..." class="avatar-img rounded-circle">
                          </div>
                        </td>
                        <td>
                          <p class="mb-0 text-muted"><strong>{{$professor->id }}</strong></p>
                        </td>
                        <td>
                          <p class="mb-0 text-muted">{{$professor->nome}}</p>
                        </td>
                        <td>
                          <p class="mb-0 text-muted">{{$professor->telefone}}</p>
                        </td>
                        <td>
                            <p class="mb-0 text-muted">{{$professor->data_contratacao}}</p>
                          </td>
                        <td class="w-25">
                            <p class="mb-0 text-muted">{{$professor->area_especializacao}}</p>
                        </td>

                        <td class="w-25">
                            <p class="mb-0 text-muted">{{$professor->genero}}</p>
                        </td>
                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('admin.professor.edit',['id'=>$professor->id])}}">Editar</a>
                                <a class="dropdown-item" href="{{route('admin.professor.destroy',['id'=>$professor->id])}}">Remover</a>
                                <a class="dropdown-item" href="{{route('admin.professor.purge',['id'=>$professor->id])}}">Purgar</a>
                                <a class="dropdown-item" href="{{route('admin.professor.createVinculoDisciplina',['id'=>$professor->id])}}">Atribuir Disciplina</a>
                                <a class="dropdown-item" href="{{route('admin.professor.createVinculoCurso',['id'=>$professor->id])}}">Atribuir Curso</a>
                                <a class="dropdown-item" href="{{route('admin.professor.createVinculoTurma',['id'=>$professor->id])}}">Atribuir Turma</a>

                                <a class="dropdown-item" href="{{route('admin.professor.listarVinculoDisciplina',['id'=>$professor->id])}}">Listar Disciplinas Atribuidas</a>
                                <a class="dropdown-item" href="{{route('admin.professor.listarVinculoCurso',['id'=>$professor->id])}}">Listar Cursos Atribuidos</a>
                                <a class="dropdown-item" href="{{route('admin.professor.listarVinculoTurma',['id'=>$professor->id])}}">Listar Turmas Atribuidas</a>
                            </div>
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
  @if (session('professor.destroy.success'))
  <script>
      Swal.fire(
          'Educador Removido com sucesso!',
          '',
          'success'
      )
  </script>
@endif
@if (session('professor.destroy.error'))
  <script>
      Swal.fire(
          'Erro ao Remover Educador!',
          '',
          'error'
      )
  </script>
@endif
@if (session('professor.purge.success'))
  <script>
      Swal.fire(
          'Educador Purgado com sucesso!',
          '',
          'success'
      )
  </script>
@endif
@if (session('professor.purge.error'))
  <script>
      Swal.fire(
          'Erro ao Purgar Educador!',
          '',
          'error'
      )
  </script>
@endif

@endsection
