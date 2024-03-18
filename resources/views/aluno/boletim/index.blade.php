@extends('layout.admin.body')
@section('titulo','Boletim de Notas')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
            <strong class="card-title">Boletim de Notas</strong>
        </div>
        <div class="card-body" style="min-height: 400px">
            <div class="row justify-content-around">
                @foreach ($disciplinas as $disciplina)
                    <div class=" card shadow col-md-3  m-2  p-4">
                        <span class="text fs-1 title success">{{$disciplina->nome}}</span>
                        <span class="text fs-2"> Prova do Professor: {{array_key_exists('p1',$disciplina->avaliacoes)?$disciplina->avaliacoes['p1']:0}}</span>
                        <span class="text fs-2 text-around">Prova Trimestral: {{array_key_exists('p2',$disciplina->avaliacoes)?$disciplina->avaliacoes['p2']:0}}</span>
                        <span class="text fs-2 text-around">MAC:  {{array_key_exists('mac',$disciplina->avaliacoes)?$disciplina->avaliacoes['mac']:0}}</span>
                        @php
                            $media = ((intval($disciplina->avaliacoes['p1'])+intval($disciplina->avaliacoes['p2'])+(array_key_exists('mac',$disciplina->avaliacoes)?$disciplina->avaliacoes['mac']:0))/3);
                        @endphp
                        <span class="text fs-2">Média: {{$media}}</span>


                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
