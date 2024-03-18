@extends('layout.admin.body')
@section('titulo','Lista dos Livros')

@section('conteudo')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <h2 class="mb-2 page-title">Lista dos Livros</h2>

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
                      <th>Titulo</th>
                      <th>Descricao</th>
                      <th>Categória</th>
                      <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($livros as $livro)
                      <tr>
                          <td>{{$livro->id}}</td>
                          <td>{{{$livro->titulo}}}</td>
                          <td>{{{$livro->descricao}}}</td>
                          <td>{{{$livro->categoria}}}</td>
                          <td>
                              <div class="dropdown">
                                  <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-muted sr-only">Action</span>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right">
                                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalEdit{{$livro->id}}">{{ __('Editar') }}</a>
                                      {{-- <a class="dropdown-item" href="{{route('admin.livro.edit',['id'=>$livro->id])}}">Editar</a> --}}
                                      <a class="dropdown-item" href="{{route('admin.livro.destroy',['id'=>$livro->id])}}">Remover</a>
                                      <a class="dropdown-item" href="{{route('admin.livro.purge',['id'=>$livro->id])}}">Purgar</a>
                                  </div>
                                  </div>

                          </td>
                      </tr>
                  {{-- ModalUpdate --}}
                  <div class="modal fade text-left" id="ModalEdit{{$livro->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title">{{ __('Editar livro') }}</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  @include('admin.livro.edit.index')
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
                        <h4 class="modal-title">{{ __('Adicionar livro') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('admin.livro.create.index')
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{-- ModalCreate --}}




@if (session('livro.destroy.success'))
    <script>
        Swal.fire(
            'livro Eliminado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('livro.destroy.error'))
    <script>
        Swal.fire(
            'Erro ao Eliminar livro!',
            '',
            'error'
        )
    </script>
@endif
@if (session('livro.purge.success'))
    <script>
        Swal.fire(
            'livro Purgado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('livro.purge.error'))
    <script>
        Swal.fire(
            'Erro ao Purgar livro!',
            '',
            'error'
        )
    </script>
@endif
@endsection
