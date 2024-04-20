@extends('layout.admin.body')
@section('titulo','Lista dos Pagamentos')

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
                      <th>ALUNO </th>
                      <th>TURMA</th>
                      <th>PROPINA</th>
                      <th>VALOR</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pagamentos as $pagamento)
                    <tr>
                        <td>
                          <p class="mb-0 text-muted"><strong>{{$pagamento->nome." ".$pagamento->sobrenome }}</strong></p>
                        </td>
                        <td>
                            <p class="mb-0 text-muted">{{$pagamento->turma}}</p>
                        </td>
                        <td>
                          <p class="mb-0 text-muted">{{$pagamento->propina}}</p>
                        </td>
                        <td>
                          <p class="mb-0 text-muted">{{$pagamento->valor}}</p>
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
@endsection
