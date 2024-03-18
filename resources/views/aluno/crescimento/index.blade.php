@extends('layout.admin.body')
@section('titulo','Crescimento Estudantil')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
            <strong class="card-title">Crescimento Estudantil</strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-9">
                        <label for="it_id_disciplina">Disciplina</label>
                        <select onchange="getNotas()" id="it_id_disciplina"  class="form-control select2" >
                            <option value="All" >All</option>
                            @foreach($disciplinas as $disciplina)
                                <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group mb-9">
                        <label for="it_id_trimestre">Trimestres</label>
                        <select onchange="getNotas()" id="it_id_trimestre"  class="form-control select2" >
                            <option value="All" >All</option>
                            <option value="1">Iº</option>
                            <option value="2">IIº</option>
                            <option value="3">IIIº</option>
                        </select>
                    </div>
                </div> <!-- /.col -->
            </div>
            <div class="my-4 row">
                <div class="mb-4 col-md-12">
                    <div class="shadow card">
                        <div class="card-body">
                            <canvas id="alunos_c"  height="300"></canvas>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /. col -->
            </div> <!-- end section -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var chartColors = [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)',
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)',
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)'
            ];

            var borderColor = [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ];
        $.ajax({
            type: 'GET',
            url: "/aluno/nota",
            success: function(data) {
                console.log(data);
                var ChartOptions = {
                    maintainAspectRatio: !1,
                    responsive: !0,
                    legend: {
                        display: !1
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display: !1
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                display: !1,
                                color: borderColor,
                                zeroLineColor: borderColor
                            },
                            ticks: {
                                beginAtZero: true // Define que o eixo Y começa em 0
                            }
                        }]
                    }
                };



                areaChartData={
                    labels:data.trimestres,
                    datasets:[
                        {
                            label:"Crescimento Estudantil",
                            barThickness:10,
                            backgroundColor:chartColors,
                            borderColor:borderColor,
                            pointRadius:!1,
                            pointColor:"#3b8bba",
                            pointStrokeColor:"rgba(60,141,188,1)",
                            pointHighlightFill:"#fff",
                            pointHighlightStroke:"rgba(60,141,188,1)",
                            data:data.media,
                            lineTension:.1
                        },
                    ]
                };
                var areaChartjs=document.getElementById("alunos_c");
                new Chart(areaChartjs,
                    {
                        type:"line",
                        data:areaChartData,
                        options:ChartOptions
                    }
                );
            },
            error: function(error) {
                console.error('Erro ao recuperar dados:', error);
            }
        });

        function getNotas(){
            let id_trimestre = $('#it_id_trimestre').val();
            let id_disciplina = $('#it_id_disciplina').val();
            $.ajax({
                type: 'GET',
                url: "/aluno/nota",
                data:{
                    it_id_disciplina:id_disciplina,
                    it_id_trimestre:id_trimestre
                },
                success: function(data) {

                    var ChartOptions = {
                        maintainAspectRatio: !1,
                        responsive: !0,
                        legend: {
                            display: !1
                        },
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    display: !1
                                }
                            }],
                            yAxes: [{
                                gridLines: {
                                    display: !1,
                                    color: colors.borderColor,
                                    zeroLineColor: colors.borderColor
                                },
                                ticks: {
                                    beginAtZero: true // Define que o eixo Y começa em 0
                                }
                            }]
                        }
                    };


                    areaChartData={
                        labels:data.trimestres,
                        datasets:[
                            {
                                label:"Crescimento Estudantil",
                                barThickness:10,
                                backgroundColor:base.primaryColor,
                                borderColor:base.primaryColor,
                                pointRadius:!1,
                                pointColor:"#3b8bba",
                                pointStrokeColor:"rgba(60,141,188,1)",
                                pointHighlightFill:"#fff",
                                pointHighlightStroke:"rgba(60,141,188,1)",
                                data:data.media,
                                lineTension:.1
                            },
                        ]
                    };
                    var areaChartjs=document.getElementById("alunos_c");
                    new Chart(areaChartjs,
                        {
                            type:"line",
                            data:areaChartData,
                            options:ChartOptions
                        }
                    );
                    $(".inlineline").sparkline([2,0,5,7,4,6,8],
                        {
                            type:"line",
                            width:"100%",
                            height:"32",
                            defaultPixelsPerValue:5,
                            lineColor:base.primaryColor,
                            fillColor:"transparent",
                            minSpotColor:!1,
                            spotColor:!1,
                            highlightSpotColor:"",
                            maxSpotColor:!1,
                            lineWidth:2
                        }
                    );
                },
                error: function(error) {
                    console.error('Erro ao recuperar dados:', error);
                }
            });
        }
    </script>
@endsection
