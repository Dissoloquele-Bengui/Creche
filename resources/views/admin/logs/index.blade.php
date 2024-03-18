@extends('layout.admin.body')
@section('titulo','Lista das Actividades')

@section('conteudo')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="text page-title mb-2">
          Lista das Actividades
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
                      <th>ID do usuário</th>
                      <th>Usuário</th>
                      <th>Descrição</th>
                      <th>Data</th>
                      <th>IP</th>
                      <th>Dispositivo</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($logs as $log)
                    <tr>


                        <td>
                          <p class="mb-0 text-muted"><strong>{{$log->user_id }}</strong></p>
                        </td>
                        <td>
                          <p class="mb-0 text-muted">{{$log->nome}}</p>
                        </td>
                        <td>
                          <p class="mb-0 text-muted">{{$log->descricao}}</p>
                        </td>
                        <td>
                          <p class="mb-0 text-muted">{{$log->created_at}}</p>
                        </td>
                        <td>
                          <p class="mb-0 text-muted">{{$log->endereco}}</p>
                        </td>
                        <td>
                          <p class="mb-0 text-muted">{{$log->dispositivo}}</p>
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
