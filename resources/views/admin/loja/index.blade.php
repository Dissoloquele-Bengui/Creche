@extends('layout.admin.body')
@section('titulo', 'Lista das  Lojas')

@section('conteudo')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
        <h2 class="text page-title mb-2">
            Lista das Lojas
        </h2>
      <div class="row">
        <!-- Small table -->
        <div class="my-4 col-md-12">
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
                    <th>NOME</th>
                    <th>NIF</th>
                    <th>LOCALIZAÇÃO</th>
                    <th>CLASSIFICAÇÃO</th>
                    <th>OPÇÕES</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($lojas as $loja)
                        <tr>
                            <td>{{$loja->id}}</td>
                            <td>{{{$loja->nome}}}</td>
                            <td>{{{$loja->nif}}}</td>
                            <td>{{{$loja->localizacao}}}</td>
                            <td>{{{$loja->classificacao}}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" ariaexpanded="false">
                                    <span class="sr-only text-muted">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalEdit{{$loja->id}}">{{ __('Editar') }}</a>
                                        <a class="dropdown-item" href="{{route('admin.loja.destroy',['id'=>$loja->id])}}">{{ __('Remover') }}</a>
                                        <a class="dropdown-item" href="{{route('admin.loja.purge',['id'=>$loja->id])}}">{{ __('Purgar') }}</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        {{-- ModalUpdate --}}
                        <div class="text-left modal fade" id="ModalEdit{{$loja->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ __('Editar Loja') }}</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.loja.update', ['id' => $loja->id]) }}
                                            " method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                @include('_form.lojaForm.index')
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Adicionar Loja') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.loja.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        {{ $loja = null }}
                        @include('_form.lojaForm.index')
                        <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- ModalCreate --}}
@if (session('loja.destroy.success'))
    <script>
        Swal.fire(
            'Loja Eliminada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('loja.destroy.error'))
    <script>
        Swal.fire(
            'Erro ao Eliminar Loja!',
            '',
            'error'
        )
    </script>
@endif
@if (session('loja.purge.success'))
    <script>
        Swal.fire(
            'Loja Purgada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('loja.purge.error'))
    <script>
        Swal.fire(
            'Erro ao Purgar Loja!',
            '',
            'error'
        )
    </script>
@endif
@if (session('loja.create.success'))
    <script>
        Swal.fire(
            'Loja Cadastrada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('loja.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Loja!',
            '',
            'error'
        )
    </script>
@endif
@if (session('loja.update.success'))
    <script>
        Swal.fire(
            'Loja Actualizada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('loja.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Loja!',
            '',
            'error'
        )
    </script>
@endif
@endsection
