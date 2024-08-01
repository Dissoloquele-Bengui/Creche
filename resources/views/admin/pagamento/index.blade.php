@extends('layout.admin.body')
@section('titulo','Lista dos Pagamentos')

@section('conteudo')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="row">
        <!-- Small table -->
        <div class="my-4 col-md-12">
            <h2 class="text"> Lista dos Pagamentos
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
                    <th>Nº da Fatura</th>
                    <th>Estado</th>
                    <th>Opções</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($vendas as $venda)
                        <tr>
                            <td>{{$venda->cliente}}</td>
                            <td>{{$venda->id}}</td>
                            <td>{{{$venda->it_estado==2?'Processsando':'Aprovado'}}}</td>
                            <td>
                              <div class="dropdown">
                                  <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-muted sr-only">Action</span>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalEdit{{$venda->id_pagamento}}">{{ __('Editar') }}</a>
                                  </div>
                              </div>
                            </td>
                        </tr>
                        <div class="text-left modal fade" id="ModalEdit{{$venda->id_pagamento}}" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="modal-title">{{ __('Editar Pagamento') }}</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <form action="{{ route('admin.pagamento_fatura.update', ['id' => $venda->id_pagamento]) }}
                                          " method="post">
                                          @csrf
                                          <div class="card-body">
                                              @include('_form.pagamento_faturaForm.index')
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

            </div>
          </div>
        </div> <!-- customized table -->
      </div> <!-- end section -->
    </div> <!-- .col-12 -->
  </div> <!-- .row -->
</div> <!-- .container-fluid -->

@endsection
