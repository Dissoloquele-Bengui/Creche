@extends('layout.admin.body')
@section('titulo','Cadastrar Propina')

@section('conteudo')
    <div class="mb-4 shadow card">
        <div class="card-header">
        <strong class="card-title">Cadastrar Propina</strong>
        </div>
        <form action="{{route('admin.propina.pagarPropina')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.pagamentoForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>

@if (session('Propina.create.error'))
    <script>
        Swal.fire(
            'Erro ao efectuar pagamento! Certifique e de pagar a quantia que falta para este mês!',
            '',
            'error'
        )
    </script>
  @endif
  @if (session('Propina.create.success'))
    <script>
        Swal.fire(
            'Propina paga com sucesso!',
            '',
            'success'
        )
    </script>
  @endif
@endsection
