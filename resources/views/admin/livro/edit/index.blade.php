{{-- @extends('layout.admin.body')
@section('titulo','Actualizar Operador')

@section('conteudo') --}}
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
        <strong class="card-title">Actualizar livro</strong>
        </div> --}}
        <form action="{{ route('admin.livro.update', ['id' => $livro->id]) }}
" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                @include('_form.livroForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>

@if (session('livro.update.success'))
    <script>
        Swal.fire(
            'Livro Actualizado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('livro.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Livro!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}
