@extends('layout.admin.body')
@section('titulo', 'Lista dos Cheques ')

@section('conteudo')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="row">
        <!-- Small table -->
        <div class="my-4 col-md-12">
            <h2 class="">
              Lista dos Cheques 
            </h2>
          <div class="p-3 shadow card">
            <div class="card-body">
              <div class="mb-3 toolbar row">
                <div class="ml-auto col">
                    <div class="float-right dropdown">
                      <button class="float-right ml-3 btn btn-primary"
                      class="btn botao" data-toggle="modal" data-target="#ModalCreate"
                      type="button">Adicionar +</button>

                    </div>
                  </div>

              </div>
              <!-- table -->
              <table class="table datatables" id="dataTable-1">
                <thead class="thead-dark">
                  <tr>
                    <th>ID</th>
                    <th>CLIENTE</th>
                    <th>CÓDIGO</th>
                    <th>MONTANTE</th>
                    <th>OPÇÕES</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($cheques as $cheque)
                        <tr>
                            <td>{{$cheque->id}}</td>
                            <td>{{{$cheque->user}}}</td>
                            <td>{{{$cheque->codigo}}}</td>
                            <td>{{{$cheque->montante}}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" ariaexpanded="false">
                                    <span class="sr-only text-muted">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalEdit{{$cheque->id}}">{{ __('Editar') }}</a>
                                        <a class="dropdown-item" href="{{route('admin.cheque.destroy',['id'=>$cheque->id])}}">{{ __('Remover') }}</a>
                                        <a class="dropdown-item" href="{{route('admin.cheque.purge',['id'=>$cheque->id])}}">{{ __('Purgar') }}</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        {{-- ModalUpdate --}}
                        <div class="text-left modal fade" id="ModalEdit{{$cheque->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ __('Editar Cheque ') }}</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.cheque.update', ['id' => $cheque->id]) }}
                                            " method="post">
                                            @csrf
                                            <div class="card-body">
                                                @include('_form.chequeForm.index')
                                                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
                                            </div>
                                        </form>
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
        </div> <!-- customized table -->
      </div> <!-- end section -->
    </div> <!-- .col-12 -->
  </div> <!-- .row -->
</div> <!-- .container-fluid -->

{{-- ModalCreate --}}
<div class="text-left modal fade" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Adicionar Cheque ') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.cheque.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        {{ $cheque = null }}
                        @include('_form.chequeForm.index')
                        <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- ModalCreate --}}
@if (session('cheque.destroy.success'))
    <script>
        Swal.fire(
            'Cheque  Eliminado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('cheque.destroy.error'))
    <script>
        Swal.fire(
            'Erro ao Eliminar Cheque!',
            '',
            'error'
        )
    </script>
@endif
@if (session('cheque.purge.success'))
    <script>
        Swal.fire(
            'Cheque  Purgado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('cheque.purge.error'))
    <script>
        Swal.fire(
            'Erro ao Purgar Cheque !',
            '',
            'error'
        )
    </script>
@endif
@if (session('cheque.create.success'))
    <script>
        Swal.fire(
            'Cheque  Cadastrado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('cheque.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Cheque !',
            '',
            'error'
        )
    </script>
@endif
@if (session('cheque.update.success'))
    <script>
        Swal.fire(
            'Cheque  Actualizado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('cheque.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Cheque !',
            '',
            'error'
        )
    </script>
@endif
@endsection
