<?php

namespace App\Http\Controllers\DP;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Models\Avaliacao;
use App\Models\AnoLectivo;
use App\Models\Curso;
use App\Models\Classe;
use App\Models\CursoClasseDisciplina;
use App\Models\Disciplina;
use App\Models\DisciplinaProfessor;
use App\Models\Matricula;
use App\Models\Professor;
use App\Models\Prova;
use App\Models\Trimestre;
use App\Models\Turma;
use App\Models\TurmaProfessor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;

class AvaliacaoController extends Controller
{
    //
    //


    //
    protected $disciplinas = null;

    public function avaliar()
    {
        $dados['disciplinas']=$this->getDisciplinas();
        $dados['turmas']=Turma::join('matriculas','turmas.id','=','matriculas.turma_id')
            ->whereColumn('matriculas.turma_id','turmas.id')
            ->get();
        //dd();
        return view('admin.avaliacao.avaliacaoContinua.index',$dados);
    }
    public function lancarAvaliacao(Request $request)
    {

        $dados['disciplina']=$this->getDisciplinas()->where('id',$request->idDisciplina)->first();

        $dados['turma'] = Turma::join('cursos', 'turmas.idCurso', '=', 'cursos.id')
        ->join('classes', 'turmas.idClasse', '=', 'classes.id')
        ->join('ano_lectivos', 'turmas.idAno', '=', 'ano_lectivos.id')
        ->select('turmas.*', 'cursos.nome as curso', 'classes.nome as classe', 'ano_lectivos.data_inicio', 'ano_lectivos.data_fim')
        ->where('turmas.id', $request->idTurma)
        ->first();

        $dados['alunos'] = Aluno::join('matriculas', 'alunos.id', '=', 'matriculas.aluno_id')
        ->join('users','users.id','alunos.user_id')
        ->join('turmas', 'turmas.id', '=', 'matriculas.turma_id')
        ->select('alunos.*','users.primeiro_nome','users.ultimo_nome', 'matriculas.id as idMatricula')
        ->where('matriculas.turma_id', $request->idTurma)
        ->get();

        foreach ($dados['alunos'] as $aluno) {
            $avaliacoes = Avaliacao::where('matricula_id', $aluno->idMatricula)
            ->select('avaliacaos.valor')
            ->where('disciplina_id', $request->idDisciplina)
            ->where('trimestre',$request->trimestre)
            ->where('data',$request->data)
            ->first();
            //dd($avaliacoes);
            $aluno->avaliacoes = $avaliacoes!=null?$avaliacoes->valor: '';
        }
        //dd($request->all());
        $dados['data']=$request->data;
        $dados['trimestre']=$request->trimestre;
        //dd($dados['trimestre']);
        return view('admin.avaliacao.avaliacaoContinua.registar',$dados);
    }
    public function registarAvaliacao(Request $request)
    {
        //dd($request);
        $notas = $request->input('notas');
            try {
                // Verifica se já existe uma avaliação para essa matricula_id
                foreach ($notas as $idMatricula => $valores) {
                    $av = $valores['av'];
                    $avaliacao = Avaliacao::where('matricula_id', $idMatricula)
                        ->where('data', $request->data)
                        ->where('disciplina_id',$request->disciplina_id)
                        ->where('trimestre',$request->trimestre)
                        ->first();
                    // Atualiza ou cria uma nova avaliação
                    if ($avaliacao) {
                        $avaliacao->valor = $av;
                        $avaliacao->save();
                    } else {
                        //dd($request);
                        Avaliacao::create([
                            'disciplina_id' => $request->disciplina_id,
                            'matricula_id' => $idMatricula,
                            'valor' => $av,
                            'data'=>$request->data,
                            'trimestre'=>$request->trimestre
                        ]);
                    }
                }
                return redirect()->route('admin.avaliacao.avaliar')->with('avaliacao.make.success', 1);
            } catch (\Throwable $th) {
                dd($th);
                return redirect()->route('admin.avaliacao.prova')->withInput()->with('avaliacao.create.error', 1);
            }
    }
    public function prova()
    {
        $dados['disciplinas']=$this->getDisciplinas();
        $dados['turmas']=Turma::join('matriculas','turmas.id' ,'=','matriculas.turma_id')->whereColumn('matriculas.turma_id','turmas.id')->get();
        $dados['trimestres']=Trimestre::all();
        return view('admin.avaliacao.prova.index',$dados);
    }
    public function lancarProva(Request $request)
    {
        $dados['disciplina']=$this->getDisciplinas()->where('id',$request->idDisciplina)->first();
        $dados['trimestre']=$request->trimestre;
        $dados['turma'] = Turma::join('cursos', 'turmas.idCurso', '=', 'cursos.id')
            ->leftJoin('classes', 'turmas.idClasse', '=', 'classes.id')
            ->leftJoin('ano_lectivos', 'turmas.idAno', '=', 'ano_lectivos.id')
            ->select('turmas.*', 'cursos.nome as curso', 'classes.nome as classe', 'ano_lectivos.data_inicio', 'ano_lectivos.data_fim')
            ->where('turmas.id', $request->idTurma)
            ->first();
        $dados['alunos'] = Aluno::join('matriculas', 'alunos.id', '=', 'matriculas.aluno_id')
            ->join('users','users.id','alunos.user_id')
            ->join('turmas', 'turmas.id', '=', 'matriculas.turma_id')
            ->select('alunos.*','users.primeiro_nome','users.ultimo_nome', 'matriculas.id as idMatricula')
            ->where('matriculas.turma_id', $request->idTurma)
            ->get();

        foreach ($dados['alunos'] as $aluno) {
            $avaliacoes = Prova::where('matricula_id', $aluno->idMatricula)
                ->where('disciplina_id', $request->idDisciplina)
                ->pluck('valor', 'tipo')
                ->toArray();
            $aluno->avaliacoes = $avaliacoes;
        }
        //dd($dados);

        return view('admin.avaliacao.prova.registar', $dados);
    }
    public function getDisciplinaByTurma(Request $request){
        $turma = Turma::find($request->id);
        $disciplina = $this->getDisciplinas()->where('curso_id',$turma->idCurso)->where('classe_id',$turma->idClasse);
        return response()->json($disciplina,200);
    }
    public function verProva()
    {
        $dados['disciplinas']=$this->getDisciplinas();
        $dados['turmas']=Turma::join('matriculas','turmas.id' ,'=','matriculas.turma_id')->whereColumn('matriculas.turma_id','turmas.id')->get();
        $dados['trimestres']=Trimestre::all();
        return view('admin.avaliacao.prova.nota.index',$dados);
    }
    public function verAvaliacao()
    {
        $dados['disciplinas']=$this->getDisciplinas();
        $dados['turmas']=Turma::join('matriculas','turmas.id' ,'=','matriculas.turma_id')->whereColumn('matriculas.turma_id','turmas.id')->get();
        return view('admin.avaliacao.avaliacaoContinua.nota.index',$dados);
    }
    
    public function consultarNotaProva(Request $request)
    {
        $dados['disciplina']=$this->getDisciplinas()->where('id',$request->idDisciplina)->first();
        $dados['turma'] = Turma::join('cursos', 'turmas.idCurso', '=', 'cursos.id')
        ->join('classes', 'turmas.idClasse', '=', 'classes.id')
        ->join('ano_lectivos', 'turmas.idAno', '=', 'ano_lectivos.id')
        ->select('turmas.*', 'cursos.nome as curso', 'classes.nome as classe', 'ano_lectivos.data_inicio', 'ano_lectivos.data_fim')
        ->where('turmas.id', $request->idTurma)
        ->first();
        $dados['alunos'] = Aluno::join('matriculas', 'alunos.id', '=', 'matriculas.aluno_id')
        ->join('users','users.id','alunos.user_id')
        ->join('turmas', 'turmas.id', '=', 'matriculas.turma_id')
        ->select('alunos.*','users.primeiro_nome','users.ultimo_nome', 'matriculas.id as idMatricula')
        ->where('matriculas.turma_id', $request->idTurma)
        ->get();

        foreach ($dados['alunos'] as $aluno) {
            $p1 = Prova::where('matricula_id', $aluno->idMatricula)
            ->select('provas.valor')
                ->where('disciplina_id', $request->idDisciplina)
                ->where('tipo','p1' )
                ->first();
            $p2 = Prova::where('matricula_id', $aluno->idMatricula)
            ->select('provas.valor')
                ->where('disciplina_id', $request->idDisciplina)
                ->where('tipo','p2' )
                ->first();
            $mac=Avaliacao::where('matricula_id', $aluno->idMatricula)
                ->where('disciplina_id', $request->idDisciplina)
                ->avg('valor');
            $aluno->avaliacoes = ['p1'=>$p1!=null?$p1->valor:0,'p2'=>$p2!=null?$p2->valor:0,'MAC'=>$mac];

            //dd($aluno->avaliacoes);
        }
        //dd($dados['alunos']);

        return view('admin.avaliacao.prova.nota.ver', $dados);
    }
    public function consultarNotaAvaliacao(Request $request)
    {
        $dados['disciplina']=$this->getDisciplinas()->where('id',$request->idDisciplina)->first();
        $dados['turma'] = Turma::join('cursos', 'turmas.idCurso', '=', 'cursos.id')
            ->join('classes', 'turmas.idClasse', '=', 'classes.id')
            ->join('ano_lectivos', 'turmas.idAno', '=', 'ano_lectivos.id')
            ->select('turmas.*', 'cursos.nome as curso', 'classes.nome as classe', 'ano_lectivos.data_inicio', 'ano_lectivos.data_fim')
            ->where('turmas.id', $request->idTurma)
            ->first();
        $dados['alunos'] = Aluno::join('matriculas', 'alunos.id', '=', 'matriculas.aluno_id')
            ->join('users','users.id','alunos.user_id')
            ->join('turmas', 'turmas.id', '=', 'matriculas.turma_id')
            ->select('alunos.*','users.primeiro_nome','users.ultimo_nome', 'matriculas.id as idMatricula')
            ->where('matriculas.turma_id', $request->idTurma)
            ->get();

        foreach ($dados['alunos'] as $aluno) {
            $avaliacoes = Avaliacao::where('matricula_id', $aluno->idMatricula)
                ->where('disciplina_id', $request->idDisciplina)
                ->where('trimestre',$request->trimestre)
                ->avg('valor');
            $aluno->avaliacoes = $avaliacoes;
        }
       // dd($dados['alunos']);

        return view('admin.avaliacao.avaliacaoContinua.nota.ver', $dados);
    }

    public function consultarNotaTurma(Request $request)
    {
        $turma=Turma::find($request->idTurma);
        $dados['disciplinas']=$this->getDisciplinas()
            ->where('curso_id',$turma->idCurso)
            ->where('classe_id',$turma->idClasse);
        $dados['turma'] = Turma::join('cursos', 'turmas.idCurso', '=', 'cursos.id')
        ->join('classes', 'turmas.idClasse', '=', 'classes.id')
        ->join('ano_lectivos', 'turmas.idAno', '=', 'ano_lectivos.id')
        ->select('turmas.*', 'cursos.nome as curso', 'classes.nome as classe', 'ano_lectivos.data_inicio', 'ano_lectivos.data_fim')
        ->where('turmas.id', $request->idTurma)
        ->first();
        $dados['alunos'] = Aluno::join('matriculas', 'alunos.id', '=', 'matriculas.aluno_id')
            ->join('users','users.id','alunos.user_id')
            ->join('turmas', 'turmas.id', '=', 'matriculas.turma_id')
            ->select('alunos.*','users.primeiro_nome','users.ultimo_nome', 'matriculas.id as idMatricula')
            ->where('matriculas.turma_id', $request->idTurma)
            ->get();
//        dd($dados['disciplinas']);
        $provas= Prova::all();
        $avaliacoes = Avaliacao::all();
        foreach ($dados['disciplinas'] as $disciplina) {
            foreach($dados['alunos'] as $aluno){
                $disciplina->idMatricula = $aluno->idMatricula;
                
                $p1 = $provas->where('matricula_id', $aluno->idMatricula)
                    ->where('disciplina_id', $disciplina->id)
                    ->where('tipo','p1' )->first();

                $p2 = $provas->where('matricula_id', $aluno->idMatricula)
                    ->where('disciplina_id', $disciplina->id)
                    ->where('tipo','p2' )->first();
                
                $mac=$avaliacoes->where('matricula_id', $aluno->idMatricula)
                    ->where('disciplina_id', $disciplina->id)
                    ->avg('valor');
                $disciplina->avaliacoes = ['p1'=>$p1!=null?$p1->valor:0,'p2'=>$p2!=null?$p2->valor:0,'MAC'=>$mac!=null?$mac:0];
            }
        }
        //dd($dados['disciplinas']);



       // dd($dados['alunos']);
       $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'orientation' => 'L']);

        $mpdf->SetFont("arial");
        ini_set('memory_limit', '15000000M');
        ini_set("pcre.backtrack_limit", "300000000");

        $mpdf->setHeader();
        $html = view('admin.avaliacao.nota_turma.ver', $dados);
        $mpdf->writeHTML($html);
        $mpdf->Output("Relatorio Das Escolas.pdf", "I");
    }
    public function verNotaTurma()
    {
        $professor = Professor::where('user_id',Auth::id())
            ->select('professors.*')
            ->first();
        $dados['turmas'] = TurmaProfessor::rightJoin('turmas','turmas.id','turma_professors.turma_id')
        ->select('turmas.*')
        //->where('turma_professors.professor_id',$professor->id)
        ->get();

       // dd($dados['alunos']);

        return view('admin.avaliacao.nota_turma.index', $dados);
    }



    public function registarProva(Request $request, $disciplina_id)
    {
        $notas = $request->input('notas');
        $trimestre = $request->trimestre;
        //dd($notas);
            try {
                // Verifica se já existe uma avaliação para essa matricula_id e tipo
                foreach ($notas as $idMatricula => $valores) {
                    $p1 = $valores['p1'];
                    $p2 = $valores['p2'];
                    $avaliacaoP1 = Prova::where('matricula_id', $idMatricula)
                        ->where('tipo', 'p1')
                        ->where('disciplina_id',$disciplina_id)
                        ->where('trimestre',$trimestre)
                        ->first();

                    $avaliacaoP2 = Prova::where('matricula_id', $idMatricula)
                        ->where('tipo', 'p2')
                        ->where('trimestre',$trimestre)
                        ->where('disciplina_id',$disciplina_id)
                        ->first();

                    // Atualiza ou cria uma nova avaliação
                    if ($avaliacaoP1) {
                        $avaliacaoP1->valor = $p1;
                        $avaliacaoP1->save();
                    } else {
                        Prova::create([
                            'tipo' => 'p1',
                            'disciplina_id' => $disciplina_id,
                            'matricula_id' => $idMatricula,
                            'valor' => $p1,
                            'trimestre' => $request->trimestre==null?1:$request->trimestre
                        ]);
                    }

                    if ($avaliacaoP2) {
                        $avaliacaoP2->valor = $p2;
                        $avaliacaoP2->save();
                    } else {
                        Prova::create([
                            'tipo' => 'p2',
                            'disciplina_id' => $disciplina_id,
                            'matricula_id' => $idMatricula,
                            'valor' => $p2,
                            'trimestre' => $request->trimestre==null?1:$request->trimestre
                        ]);
                    }
                }
                return redirect()->route('admin.avaliacao.prova')->with('Avaliacao.update.success', 1);
            } catch (\Throwable $th) {
                throw $th;
                dd($th);
                return redirect()->route('admin.avaliacao.prova')->withInput()->with('Avaliacao.create.error', 1);
            }

    }

    public function getDisciplinas(){
        // dd(Auth::check());
         if(Auth::user()->tipo=="Professor"){
             $professor = Professor::where('user_id',Auth::id())->select('professors.*')->first();
             return DisciplinaProfessor::join('curso_classe_disciplinas','curso_classe_disciplinas.id','disciplina_professors.curso_classe_disciplina_id')
             ->join('disciplinas','disciplinas.id','curso_classe_disciplinas.disciplina_id')
                 ->select('disciplinas.nome','curso_classe_disciplinas.*','disciplinas.codigo')
                 ->where('disciplina_professors.professor_id',$professor->id)
                 ->get();
         }else{
             return CursoClasseDisciplina::join('disciplinas','disciplinas.id','curso_classe_disciplinas.disciplina_id')
                 ->select('disciplinas.nome','curso_classe_disciplinas.*','disciplinas.codigo')
                 ->get();
         }
     }
}
