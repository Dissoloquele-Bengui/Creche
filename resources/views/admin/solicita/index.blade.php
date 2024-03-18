@extends('layout.admin.body')
@section('titulo','Lista das Solicitações')

@section('conteudo')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="row">
        <!-- Small table -->
        <div class="my-4 col-md-12">
            <h2 class="text"> Lista das Solicitações
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
                    <th>PROCESSO</th>
                    <th>ALUNO</th>
                    <th>Serviço</th>
                    <th>Estado</th>
                    <th>Opções</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($solicitacoes as $solicitacao)
                        <tr>
                          <td>{{$solicitacao->processo}}</td>
                            <td>{{$solicitacao->primeiro_nome." ".$solicitacao->ultimo_nome}}</td>
                            <td>{{$solicitacao->servico}}</td>
                            <td>
                              @if ($solicitacao->estado != 2)
                              {{{$solicitacao->estado==0?'Processsando':'Aprovado'}}}                             
                              @else
                                Reprovado
                              @endif
                            </td>
                            <td>
                              <div class="dropdown">
                                  <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-muted sr-only">Action</span>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalEdit{{$solicitacao->id}}">{{ __('Editar') }}</a>
                                    @if ($solicitacao->servico_id==2)                                      
                                        <a class="dropdown-item" href="{{asset($solicitacao->caminho_foto)}}"  >{{ __('Baixar Foto') }}</a>                                      
                                    @endif
                                  </div>
                              </div>
                            </td>
                        </tr>
                        <div class="text-left modal fade" id="ModalEdit{{$solicitacao->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="modal-title">{{ __('Editar Solicitação') }}</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <form action="{{ route('admin.solicitacaoServico.update', ['id' => $solicitacao->id]) }}
                                          " method="post">
                                          @csrf
                                          <div class="card-body">
                                              @include('_form.solicitacaoForm.index')
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
