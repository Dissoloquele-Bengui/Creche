@extends('layout.admin.body')
@section('titulo', 'Lista dos Produtos')

@section('conteudo')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="row">
        <!-- Small table -->
        <div class="my-4 col-md-12">
            <h2 class="">
              Lista dos Produtos
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
                    <th>NOME</th>
                    <th>DESCRIÇÃO</th>
                    <th>PREÇO</th>
                    <th>QUANTIDADE</th>
                    <th>CLASSIFICAÇÃO</th>
                    <th>OPÇÕES</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produtos)
                        <tr>
                            <td>{{$produtos->id}}</td>
                            <td>{{{$produtos->nome}}}</td>
                            <td>{{{$produtos->descricao}}}</td>
                            <td>{{{$produtos->preco}}}</td>
                            <td>{{{$produtos->qtd}}}</td>
                            <td>{{{$produtos->classificacao}}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" ariaexpanded="false">
                                    <span class="sr-only text-muted">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalEdit{{$produtos->id}}">{{ __('Editar') }}</a>
                                        <a class="dropdown-item" href="{{route('admin.produto.destroy',['id'=>$produtos->id])}}">{{ __('Remover') }}</a>
                                        <a class="dropdown-item" href="{{route('admin.produto.purge',['id'=>$produtos->id])}}">{{ __('Purgar') }}</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        {{-- ModalUpdate --}}
                        <div class="text-left modal fade" id="ModalEdit{{$produtos->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ __('Editar Produto') }}</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.produto.update', ['id' => $produtos->id]) }}
                                            " method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                @include('_form.produtoForm.index')
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
                <h4 class="modal-title">{{ __('Adicionar Produto') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.produto.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        {{ $produtos = null }}
                        @include('_form.produtoForm.index')
                        <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- ModalCreate --}}
@if (session('produto.destroy.success'))
    <script>
        Swal.fire(
            'Produto Eliminado  com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('produto.destroy.error'))
    <script>
        Swal.fire(
            'Erro ao Eliminar Produto!',
            '',
            'error'
        )
    </script>
@endif
@if (session('produto.purge.success'))
    <script>
        Swal.fire(
            'Produto Purgado  com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('produto.purge.error'))
    <script>
        Swal.fire(
            'Erro ao Purgar Produto!',
            '',
            'error'
        )
    </script>
@endif
@if (session('produto.create.success'))
    <script>
        Swal.fire(
            'Produto Cadastrado  com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('produto.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Produto!',
            '',
            'error'
        )
    </script>
@endif
@if (session('produto.update.success'))
    <script>
        Swal.fire(
            'Produto Actualizado  com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('produto.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Produto!',
            '',
            'error'
        )
    </script>
@endif
@endsection
