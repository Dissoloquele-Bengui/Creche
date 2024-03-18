@extends('layout.admin.body')
@section('titulo','Lista dos Planos de aula')

@section('conteudo')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <h2 class="mb-2 page-title">Lista dos Planos de aula</h2>

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
                      <th>Professor</th>
                      <th>TURMA</th>
                      <th>CURSO</th>
                      <th>CLASSE</th>
                      <th>DISCIPLINA</th>
                      <th>TRIMESTRE</th>
                      <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($plano_aulas as $plano_aula)
                      <tr>
                          <td>{{$plano_aula->id}}</td>
                          <td>{{{$plano_aula->professor}}}</td>
                          <td>{{{$plano_aula->turma}}}</td>
                          <td>{{{$plano_aula->curso}}}</td>
                          <td>{{{$plano_aula->classe}}}</td>
                          <td>{{{$plano_aula->disciplina}}}</td>
                          <td>{{{$plano_aula->trimestre}}}</td>
                          <td>
                              <div class="dropdown">
                                  <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-muted sr-only">Action</span>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right">
                                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalEdit{{$plano_aula->id}}">{{ __('Editar') }}</a>
                                      {{-- <a class="dropdown-item" href="{{route('admin.plano_aula.edit',['id'=>$plano_aula->id])}}">Editar</a> --}}
                                      <a class="dropdown-item" href="{{route('admin.plano_aula.destroy',['id'=>$plano_aula->id])}}">Remover</a>
                                      <a class="dropdown-item" href="{{route('admin.plano_aula.purge',['id'=>$plano_aula->id])}}">Purgar</a>
                                      <a class="dropdown-item" href="{{ asset($plano_aula->caminho) }}" download="Plano de aula de {{$plano_aula->disciplina}} do {{$plano_aula->trimestre}} Trimestre ">Baixar</a>

                                  </div>
                                  </div>

                          </td>
                      </tr>
                  {{-- ModalUpdate --}}
                  <div class="modal fade text-left" id="ModalEdit{{$plano_aula->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title">{{ __('Editar Plano de aula') }}</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  @include('admin.plano_aula.edit.index')
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
                        <h4 class="modal-title">{{ __('Adicionar Plano de aula') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('admin.plano_aula.create.index')
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{-- ModalCreate --}}




@if (session('plano_aula.destroy.success'))
    <script>
        Swal.fire(
            'Plano de aula Eliminado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('plano_aula.destroy.error'))
    <script>
        Swal.fire(
            'Erro ao Eliminar Plano de aula!',
            '',
            'error'
        )
    </script>
@endif
@if (session('plano_aula.purge.success'))
    <script>
        Swal.fire(
            'Plano de aula Purgado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('plano_aula.purge.error'))
    <script>
        Swal.fire(
            'Erro ao Purgar Plano de aula!',
            '',
            'error'
        )
    </script>
@endif
@endsection
