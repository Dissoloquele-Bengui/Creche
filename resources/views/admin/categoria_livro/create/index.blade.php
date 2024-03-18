{{-- @extends('layout.admin.body') --}}
{{-- @section('titulo','Cadastrar categoriaTituloHabitantes') --}}

{{-- @section('conteudo') --}}
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
        <strong class="card-title">Cadastrar Categória de Livros</strong>
        </div> --}}
        <form action="{{route('admin.categoria_livro.store')}}" method="post">
            @csrf
            <div class="card-body">
                {{$categoria_livro=null}}
                @include('_form.categoria_livroForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>

@if (session('categoria_livro.create.success'))
    <script>
        Swal.fire(
            'Categória de Livro Cadastrada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('categoria_livro.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Categória de Livro!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}
