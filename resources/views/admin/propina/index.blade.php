@extends('layout.admin.body')
@section('titulo','Listar professors')

@section('conteudo')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row">
          <!-- Small table -->
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
                      <th>ID</th>
                      <th>MÊS</th>
                      <th>PREÇO</th>
                      <th>DATA VENCIMENTO</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($propinas as $propina)
                    <tr>
                        <td>
                          <p class="mb-0 text-muted"><strong>{{$propina->id }}</strong></p>
                        </td>
                        <td>
                          <p class="mb-0 text-muted">{{$propina->mes}}</p>
                        </td>
                        <td>
                          <p class="mb-0 text-muted">{{$propina->limite}}</p>
                        </td>
                        <td>
                            <p class="mb-0 text-muted">{{$propina->data_vencimento}}</p>
                        </td>
                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only text-muted">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                @if (Auth::user()->tipo == "Administrador")
                                    <a class="dropdown-item" href="{{route('admin.propina.edit',['id'=>$propina->id])}}">Editar</a>
                                    <a class="dropdown-item" href="{{route('admin.propina.destroy',['id'=>$propina->id])}}">Remover</a>
                                    <a class="dropdown-item" href="{{route('admin.propina.purge',['id'=>$propina->id])}}">Purgar</a>
                                    <a class="dropdown-item" href="{{route('admin.propina.pagar',['id'=>$propina->id])}}">pagar</a>
                                @endif

                                <a class="dropdown-item" href="{{route('admin.propina.listar',['id'=>$propina->id])}}">Listar Pgamentos</a>
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
  @if (session('Propina.destroy.success'))
  <script>
      Swal.fire(
          'Propina Eliminada com sucesso!',
          '',
          'success'
      )
  </script>
@endif
@if (session('Propina.destroy.error'))
  <script>
      Swal.fire(
          'Erro ao Eliminar Propina!',
          '',
          'error'
      )
  </script>
@endif
@if (session('Propina.purge.success'))
  <script>
      Swal.fire(
          'Propina Purgada com sucesso!',
          '',
          'success'
      )
  </script>
@endif
@if (session('Propina.purge.error'))
  <script>
      Swal.fire(
          'Erro ao Purgar Propina!',
          '',
          'error'
      )
  </script>
@endif


@endsection
