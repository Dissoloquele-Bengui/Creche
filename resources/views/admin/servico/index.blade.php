@extends('layout.admin.body')
@section('titulo','Lista dos Serviços')

@section('conteudo')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <h2 class="text page-title mb-2">
        Lista dos Serviços
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
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($servicos as $servico)
                        <tr>
                            <td>{{$servico->id}}</td>
                            <td>{{{$servico->nome}}}</td>
                            <td>{{$servico->preco}}</td>
                            <td>
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{route('admin.servico.edit',['id'=>$servico->id])}}">Editar</a>
                                    <a class="dropdown-item" href="{{route('admin.servico.destroy',['id'=>$servico->id])}}">Remover</a>
                                    <a class="dropdown-item" href="{{route('admin.servico.purge',['id'=>$servico->id])}}">Purgar</a>
                                </div>
                                </div>
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
@if (session('servico.destroy.success'))
    <script>
        Swal.fire(
            'Serviço Removida com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('servico.destroy.error'))
    <script>
        Swal.fire(
            'Erro ao Remover Serviço!',
            '',
            'error'
        )
    </script>
@endif
@if (session('servico.purge.success'))
    <script>
        Swal.fire(
            'Serviço Purgada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('servico.purge.error'))
    <script>
        Swal.fire(
            'Erro ao Purgar Serviço!',
            '',
            'error'
        )
    </script>
@endif
@endsection
