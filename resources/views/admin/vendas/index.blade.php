@extends('layout.admin.body')
@section('titulo','Lista das Vendas')

@section('conteudo')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="row">
        <!-- Small table -->
        <div class="my-4 col-md-12">
            <h2 class="text"> Lista das Vendas
            </h2>
          <div class="p-3 shadow card">
            <div class="card-body">
              <div class="mb-3 toolbar row">


              </div>

              </div>
              <!-- table -->
              <table class="table datatables" id="dataTable-1">
                <thead class="thead-dark">
                  <tr>
                    <th>CLIENTE</th>
                    <th>LOJA</th>
                    <th>PRATO</th>
                    <th>FATURA</th>
                    <th>QUANTIDADE</th>
                    <th>VALOR</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($vendas as $venda)
                        <tr>
                            <td>{{$venda->cliente}}</td>
                            <td>{{$venda->loja}}</td>
                            <td>{{{$venda->produtos}}}</td>
                            <td>{{$venda->fatura}}/2024</td>
                            <td>{{$venda->qtd}}</td>
                            <td>{{$venda->valor}} Kzs</td>
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
