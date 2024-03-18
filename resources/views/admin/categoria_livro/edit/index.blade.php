{{-- @extends('layout.admin.body')
@section('titulo','Actualizar Operador')

@section('conteudo') --}}
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
        <strong class="card-title">Actualizar Categoria de Livro</strong>
        </div> --}}
        <form action="{{ route('admin.categoria_livro.update', ['id' => $categoria_livro->id]) }}
" method="post">
            @csrf
            <div class="card-body">
                @include('_form.categoria_livroForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>

@if (session('categoria_livro.update.success'))
    <script>
        Swal.fire(
            'Categoria de Livro Actualizada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('categoria_livro.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Categoria de Livro!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}
