@extends('layout.admin.body')
@section('titulo','Lista dos Horários')

@section('conteudo')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <h2 class="mb-2 page-title">Lista dos Horários</h2>

      <div class="row my-4">
        <!-- Small table -->
        <div class="col-md-12">
          <div class="card shadow">

            <div class="card-body">
                <div class="ml-auto col">
                    <div class="float-right dropdown">
                      <button class="float-right ml-3 btn btn-primary"
                      class="btn botao" data-toggle="modal" data-target="#ModalCreate"
                      type="button">Adicionar +</button>
                    </div>
                </div>
                <!-- table -->
              <table class="table datatables" id="dataTable-1">
                  {{-- @can('user-create') --}}

                <thead>
                  <tr>
                      <th>ID</th>
                      <th>TURMA</th>
                      <th>CURSO</th>
                      <th>CLASSE</th>
                      <th>ANO LECTIVO</th>
                      <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($horarios as $horario)
                      <tr>
                          <td>{{$horario->id}}</td>
                          <td>{{{$horario->turma}}}</td>
                          <td>{{{$horario->curso}}}</td>
                          <td>{{{$horario->classe}}}</td>
                          <td>{{{$horario->data_inicio}}} {{{$horario->data_fim}}}</td>
                          <td>
                              <div class="dropdown">
                                  <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-muted sr-only">Action</span>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right">
                                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalEdit{{$horario->id}}">{{ __('Editar') }}</a>
                                      {{-- <a class="dropdown-item" href="{{route('admin.horario.edit',['id'=>$horario->id])}}">Editar</a> --}}
                                      <a class="dropdown-item" href="{{route('admin.horario.destroy',['id'=>$horario->id])}}">Remover</a>
                                      <a class="dropdown-item" href="{{route('admin.horario.purge',['id'=>$horario->id])}}">Purgar</a>
                                  </div>
                                  </div>

                          </td>
                      </tr>
                  {{-- ModalUpdate --}}
                  <div class="modal fade text-left" id="ModalEdit{{$horario->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title">{{ __('Editar Horário') }}</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  @include('admin.horario.edit.index')
                                  </div>
                              </div>
                          </div>
                      </div>
                  {{-- ModalUpdate --}}
                  @endforeach
              </tbody>
              </table>
            </div>
          </div>
        </div> <!-- simple table -->
      </div> <!-- end section -->
    </div> <!-- .col-12 -->
  </div> <!-- .row -->
</div> <!-- .container-fluid1 -->

{{-- ModalCreate --}}

        <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('Adicionar Horário') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('admin.horario.create.index')
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{-- ModalCreate --}}




@if (session('horario.destroy.success'))
    <script>
        Swal.fire(
            'horario Eliminado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('horario.destroy.error'))
    <script>
        Swal.fire(
            'Erro ao Eliminar horario!',
            '',
            'error'
        )
    </script>
@endif
@if (session('horario.purge.success'))
    <script>
        Swal.fire(
            'horario Purgado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('horario.purge.error'))
    <script>
        Swal.fire(
            'Erro ao Purgar horario!',
            '',
            'error'
        )
    </script>
@endif
@endsection
