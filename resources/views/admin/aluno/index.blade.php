@extends('layout.admin.body')
@section('titulo','Lista das Crianças')

@section('conteudo')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="text">
          Lista das Crianças
        </h2>
        <div class="row">
          <div class="my-4 col-md-12">
            <h2 class="mb-1 h4"></h2>
            <p class="mb-3"></p>
            <div class="shadow card">
              <div class="card-body">
                <div class="toolbar">
                  <form class="form">
                    <div class="form-row">
                      <div class="col-auto mr-auto form-group">
                        <label class="my-1 mr-2 sr-only" for="inlineFormCustomSelectPref1">Show</label>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelectPref1">
                          <option value="">...</option>
                          <option value="1">12</option>
                          <option value="2" selected>32</option>
                          <option value="3">64</option>
                          <option value="3">128</option>
                        </select>
                      </div>
                      <div class="col-auto form-group">
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
                      <th>Nome do responsavel</th>
                      <th>Contacto do Responsável</th>
                      <th>Data de nascimento</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($alunos as $aluno)
                        <tr>

                            <td>
                                <div class="avatar avatar-md">
                                    <img src="./assets/avatars/face-3.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>
                            </td>
                            <td>
                            <p class="mb-0 text-muted"><strong>{{$aluno->id }}</strong></p>
                            </td>
                            <td>
                            <p class="mb-0 text-muted">{{$aluno->primeiro_nome}} {{$aluno->ultimo_nome}}</p>
                            </td>
                            <td>
                            <p class="mb-0 text-muted">+244 {{$aluno->numero_telefone}}</p>

                            </td>
                            <td class="w-25">
                                <p class="mb-0 text-muted">{{$aluno->nome_responsavel}}</p>
                            </td>

                            <td class="w-25">
                                <p class="mb-0 text-muted">{{$aluno->contato_responsavel}}</p>
                            </td>
                            <td class="w-25">
                                <p class="mb-0 text-muted">{{$aluno->data_nascimento}}</p>
                            </td>
                            <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only text-muted">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @if (Auth::user()->tipo == "Administrador")
                                        <a class="dropdown-item" href="{{route('admin.aluno.edit',['id'=>$aluno->id])}}">Editar</a>
                                        <a class="dropdown-item" href="{{route('admin.aluno.destroy',['id'=>$aluno->id])}}">Remover</a>
                                        <a class="dropdown-item" href="{{route('admin.aluno.purge',['id'=>$aluno->id])}}">Purgar</a>
                                    @endif

                                </div>
                                </td>
                        </tr>

                    @endforeach

                  </tbody>
                </table>
                <nav aria-label="Table Paging" class="mb-0 text-muted">
                  <ul class="mb-0 pagination justify-content-center">
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
@if (session('aluno.purge.success'))
    <script>
        Swal.fire(
            'Criança Purgada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('aluno.purge.error'))
    <script>
        Swal.fire(
            'Erro ao Purgar Criança!',
            '',
            'error'
        )
    </script>
@endif
@if (session('aluno.destroy.success'))
    <script>
        Swal.fire(
            'Criança Eliminada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('aluno.destroy.error'))
    <script>
        Swal.fire(
            'Erro ao Eliminar Criança!',
            '',
            'error'
        )
    </script>
@endif
@endsection
