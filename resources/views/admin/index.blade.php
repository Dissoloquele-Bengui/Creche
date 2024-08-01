@extends('layout.admin.body')
@section('titulo','Dashboard')

@section('conteudo')

<div class="container-fluid">
    @if(Auth::user()->tipo == "Administrador")
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="mb-2 row align-items-center">
          <div class="col">
            <h2 class="h5 page-title">Bem-vindo!</h2>
          </div>
          <div class="col-auto">
            <form class="form-inline">
              <div class="form-group d-none d-lg-inline">
                <label for="reportrange" class="sr-only">Intervalo de Datas</label>
                <div id="reportrange" class="px-2 py-2 text-muted">
                  <span class="small"></span>
                </div>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-sm"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                <button type="button" class="mr-2 btn btn-sm"><span class="fe fe-filter fe-16 text-muted"></span></button>
              </div>
            </form>
          </div>
        </div>
        <!-- widgets -->
        <div class="my-4 row">
          <div class="col-md-4">
            <div class="mb-4 shadow card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <small class="mb-1 text-muted">Alunos Matriculados</small>
                    <h3 class="mb-0 card-title">150</h3>
                    <p class="mb-0 small text-muted"><span class="fe fe-arrow-up fe-12 text-success"></span> +15% Último mês</p>
                  </div>
                  <div class="text-right col-4">
                    <span class="sparkline inlineline"></span>
                  </div>
                </div> <!-- /. row -->
              </div> <!-- /. card-body -->
            </div> <!-- /. card -->
          </div> <!-- /. col -->
          <div class="col-md-4">
            <div class="mb-4 shadow card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <small class="mb-1 text-muted">Alunos Presentes Hoje</small>
                    <h3 class="mb-0 card-title">120</h3>
                    <p class="mb-0 small text-muted"><span class="fe fe-arrow-up fe-12 text-success"></span> +10% Último mês</p>
                  </div>
                  <div class="text-right col-4">
                    <span class="sparkline inlinepie"></span>
                  </div>
                </div> <!-- /. row -->
              </div> <!-- /. card-body -->
            </div> <!-- /. card -->
          </div> <!-- /. col -->
          <div class="col-md-4">
            <div class="mb-4 shadow card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <small class="mb-1 text-muted">Professores</small>
                    <h3 class="mb-0 card-title">20</h3>
                    <p class="mb-0 small text-muted"><span class="fe fe-arrow-up fe-12 text-success"></span> +20% Último mês</p>
                  </div>
                  <div class="text-right col-4">
                    <span class="sparkline inlinebar"></span>
                  </div>
                </div> <!-- /. row -->
              </div> <!-- /. card-body -->
            </div> <!-- /. card -->
          </div> <!-- /. col -->
        </div> <!-- end section -->
        <!-- linechart -->
        <div class="my-4">
          <div id="lineChart"></div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="mb-4 shadow card">
              <div class="card-header">
                <strong>Metas</strong>
              </div>
              <div class="px-4 card-body">
                <div class="row border-bottom">
                  <div class="mb-3 text-center col-4">
                    <p class="mb-1 small text-muted">Matrículas</p>
                    <span class="h3">30</span><br />
                    <span class="small text-muted">+10% Último mês</span>
                    <span class="fe fe-arrow-up text-success fe-12"></span>
                  </div>
                  <div class="mb-3 text-center col-4">
                    <p class="mb-1 small text-muted">Presença</p>
                    <span class="h3">90%</span><br />
                    <span class="small text-muted">+5% Último mês</span>
                    <span class="fe fe-arrow-up text-success fe-12"></span>
                  </div>
                  <div class="mb-3 text-center col-4">
                    <p class="mb-1 small text-muted">Satisfação</p>
                    <span class="h3">4.5/5</span><br />
                    <span class="small text-muted">+0.5 Último mês</span>
                    <span class="fe fe-arrow-up text-success fe-12"></span>
                  </div>
                </div>
                <table class="table mt-3 mb-1 table-borderless mx-n1 table-sm">
                  <thead>
                    <tr>
                      <th class="w-50">Meta</th>
                      <th class="text-right">Atual</th>
                      <th class="text-right">Mês Anterior</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Matrículas</td>
                      <td class="text-right">150</td>
                      <td class="text-right">135</td>
                    </tr>
                    <tr>
                      <td>Presença</td>
                      <td class="text-right">90%</td>
                      <td class="text-right">85%</td>
                    </tr>
                    <tr>
                      <td>Satisfação</td>
                      <td class="text-right">4.5/5</td>
                      <td class="text-right">4/5</td>
                    </tr>
                  </tbody>
                </table>
              </div> <!-- .card-body -->
            </div> <!-- .card -->
          </div> <!-- .col -->
          <div class="col-md-6">
            <div class="mb-4 shadow card">
              <div class="card-header">
                <strong>Atividades Recentes</strong>
              </div>
              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <span class="mr-2 fe fe-check-circle text-success"></span>
                    Inscrição de Novo Aluno - João
                    <span class="float-right text-muted small">Agora mesmo</span>
                  </li>
                  <li class="list-group-item">
                    <span class="mr-2 fe fe-check-circle text-success"></span>
                    Presença Confirmada - Maria
                    <span class="float-right text-muted small">Há 1 hora</span>
                  </li>
                  <li class="list-group-item">
                    <span class="mr-2 fe fe-check-circle text-success"></span>
                    Atualização de Turma - Infantil 1
                    <span class="float-right text-muted small">Há 2 horas</span>
                  </li>
                  <li class="list-group-item">
                    <span class="mr-2 fe fe-check-circle text-success"></span>
                    Novo Evento - Passeio ao Parque
                    <span class="float-right text-muted small">Ontem</span>
                  </li>
                </ul>
              </div> <!-- .card-body -->
            </div> <!-- .card -->
          </div> <!-- .col -->
        </div> <!-- .row -->
      </div> <!-- .col -->
    </div> <!-- .row -->
    @endif
</div> <!-- .container-fluid -->

@endsection

@section('scripts')
<script>
  var line = new Morris.Line({
    element: 'lineChart',
    data: [{
        y: '2012',
        a: 100,
        b: 90
      },
      {
        y: '2013',
        a: 75,
        b: 65
      },
      {
        y: '2014',
        a: 50,
        b: 40
      },
      {
        y: '2015',
        a: 75,
        b: 65
      },
      {
        y: '2016',
        a: 50,
        b: 40
      },
      {
        y: '2017',
        a: 75,
        b: 65
      },
      {
        y: '2018',
        a: 100,
        b: 90
      }
    ],
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['Matrículas', 'Presença'],
    lineColors: ['#a3a4a9', '#35a287'],
    lineWidth: 2,
    pointSize: 4,
    pointStrokeColors: ['#7a7e93', '#2dccb3'],
    resize: true,
    hideHover: 'auto'
  });
</script>
@endsection
