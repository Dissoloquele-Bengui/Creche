{{-- @extends('layout.admin.body') --}}
{{-- @section('titulo','Cadastrar categoriaTituloHabitantes') --}}

{{-- @section('conteudo') --}}
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
        <strong class="card-title">Cadastrar Categória de Notificaçãos</strong>
        </div> --}}
        <form action="{{route('admin.categoria_notificacao.store')}}" method="post">
            @csrf
            <div class="card-body">
                {{$categoria_notificacao=null}}
                @include('_form.categoria_notificacaoForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>

@if (session('categoria_notificacao.create.success'))
    <script>
        Swal.fire(
            'Categória de Notificação Cadastrada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('categoria_notificacao.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Categória de Notificação!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}
