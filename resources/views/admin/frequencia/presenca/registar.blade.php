@extends('layout.admin.body')
@section('titulo','Registrar Frequencia')

@section('conteudo')
    <div class="mb-4 shadow card">
        <div class="card-header d-flex justify-content-center">
            <strong class="card-title">Registrar Frequencias da Turma {{ $turma->nome }}</strong>

        </div>
        <form action="{{route('admin.frequencia.registarFrequencia')}}" method="POST">
            @csrf
            <input type="hidden" name="data_atual" value="{{$data_atual}}"">
            <div class="card-body">
                <div class="pb-3 row justify-content-end">

                </div>
                <table class="table table-borderless table-hover">
                    <thead class="thead-dark">
                      <tr>
                        <th>Aluno</th>
                        <th>Estado</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($alunos as $aluno)
                            <tr>
                                <td>
                                    <p class="col-md-6">
                                        {{ $aluno->nome }} {{ $aluno->sobrenome }} {{ $aluno->ultimo_nome }}
                                    </p>
                                </td>
                                <td>
                                    <select name="frequencia[{{ $aluno->idMatricula }}][{{ $aluno->idMatricula }}]" id="" class="mb-3 form-control"> <option value="Presente" {{$aluno->frequencia=="Presente"?'selected':''}}>Presente</option>
                                        <option value="Ausente" {{$aluno->frequencia=="Ausente"?'selected':''}}>Ausente</option>
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                <button type="submit" class="btn btn-primary w-md ">Lançar</button>
            </div>
        </form>

    </div>
@endsection
