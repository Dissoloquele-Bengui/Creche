@extends('layout.admin.body')
@section('titulo','Lista das Disciplinas Do Curso de '.$curso->nome)

@section('conteudo')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="row">
        <h2 class="text mb-2 page-title">
          Lista das Disciplinas Do Curso de {{$curso->nome}}
        </h2>
        <!-- Small table -->
        <div class="col-md-12 my-4">
          <h2 class="h4 mb-1"></h2>
          <p class="mb-3">Additional table rendering with vertical border, rich content formatting for cell</p>
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
                      <input type="text" class="form-control" id="search1" value="" placeholder="Search">
                    </div>
                  </div>
                </form>
              </div>
              <!-- table -->
              <table class="table table-borderless table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Código</th>
                    <th>Classe</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($cursoDisciplinas as $disciplina)
                        <tr>
                            <td>{{$disciplina->id}}</td>
                            <td>{{{$disciplina->nome}}}</td>
                            <td>{{$disciplina->codigo}}</td>
                            <td>{{{$disciplina->classe}}}</td>
                            <td>
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{route('admin.curso.editVinculoDisciplina',['id'=>$disciplina->id])}}">Edit</a>
                                    <a class="dropdown-item" href="{{route('admin.curso.destroyVinculoDisciplina',['id'=>$disciplina->id])}}">Remove</a>
                                    <a class="dropdown-item" href="{{route('admin.curso.purgeVinculoDisciplina',['id'=>$disciplina->id])}}">Purge</a>

                                </div>
                            </div>
                            </td>
                        </tr>
                        <div class="text-left modal fade" id="ModalEdit{{$disciplina->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ __('Editar Usuário') }}</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.disciplina.update', ['id' => $disciplina->id]) }}
                                            " method="post">
                                            @csrf
                                            <div class="card-body">
                                                @include('_form.disciplinaForm.index')
                                                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
              </table>
              <nav aria-label="Table Paging" class="mb-0 text-muted">
                <ul class="pagination justify-content-center mb-0">
                  <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item active"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
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
