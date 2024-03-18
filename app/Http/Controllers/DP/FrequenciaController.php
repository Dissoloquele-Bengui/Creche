<?php

namespace App\Http\Controllers\DP;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Models\Frequencia;
use App\Models\AnoLectivo;
use App\Models\Curso;
use App\Models\Classe;
use App\Models\Disciplina;
use App\Models\Matricula;
use App\Models\Turma;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class FrequenciaController extends Controller
{
    //
    //


    //
    public function index()
    {
        $dados['disciplinas']=Disciplina::all();
        $dados['turmas']=Turma::join('matriculas','turmas.id','=','matriculas.aluno_id')->whereColumn('matriculas.aluno_id','turmas.id')->get();
        return view('admin.frequencia.read.buscar',$dados);
    }
    public function verFrequencia(Request $request)
    {
        $dados['data_atual']=$request->data;
        $dados['disciplina_id']=$request->idDisciplina;
        $dados['disciplina'] = Disciplina::where('id', $request->idDisciplina)->first();
        $dados['turma'] = Turma::join('cursos', 'turmas.idCurso', '=', 'cursos.id')
            ->join('classes', 'turmas.idClasse', '=', 'classes.id')
            ->join('ano_lectivos', 'turmas.idAno', '=', 'ano_lectivos.id')
            ->select('turmas.*', 'cursos.nome as curso', 'classes.nome as classe', 'ano_lectivos.data_inicio', 'ano_lectivos.data_fim')
            ->where('turmas.id', $request->idTurma)
            ->first();
        $dados['alunos'] = Aluno::join('matriculas', 'alunos.id', '=', 'matriculas.aluno_id')
            ->join('turmas', 'turmas.id', '=', 'matriculas.turma_id')
            ->select('alunos.*', 'matriculas.id as idMatricula')
            ->where('matriculas.turma_id', $request->idTurma)
            ->get();

        foreach ($dados['alunos'] as $aluno) {
            $frequencia = Frequencia::where('matricula_id', $aluno->idMatricula)
                ->where('disciplina_id', $request->idDisciplina)
                ->where('data_aula', $request->data)
                ->pluck('presenca')
                ->first();
            $aluno->frequencia = $frequencia; // Corrigir a atribuição para a propriedade 'frequencia'
        }
        //dd($dados['alunos']);
        return view('admin.frequencia.read.index', $dados);
    }


    public function registar()
    {
        $dados['disciplinas']=Disciplina::all();
        $dados['turmas']=Turma::join('matriculas','turmas.id','=','matriculas.aluno_id')->whereColumn('matriculas.aluno_id','turmas.id')->get();
        return view('admin.frequencia.presenca.index',$dados);
    }
    public function lancarFrequencia(Request $request)
    {
        $dados['data_atual']=$request->data;
        $dados['disciplina_id']=$request->idDisciplina;
        $dados['disciplina'] = Disciplina::where('id', $request->idDisciplina)->first();
        $dados['turma'] = Turma::join('cursos', 'turmas.idCurso', '=', 'cursos.id')
            ->join('classes', 'turmas.idClasse', '=', 'classes.id')
            ->join('ano_lectivos', 'turmas.idAno', '=', 'ano_lectivos.id')
            ->select('turmas.*', 'cursos.nome as curso', 'classes.nome as classe', 'ano_lectivos.data_inicio', 'ano_lectivos.data_fim')
            ->where('turmas.id', $request->idTurma)
            ->first();
        $dados['alunos'] = Aluno::join('matriculas', 'alunos.id', '=', 'matriculas.aluno_id')
            ->join('turmas', 'turmas.id', '=', 'matriculas.turma_id')
            ->select('alunos.*', 'matriculas.id as idMatricula')
            ->where('matriculas.turma_id', $request->idTurma)
            ->get();

        foreach ($dados['alunos'] as $aluno) {
            $frequencia = Frequencia::where('matricula_id', $aluno->idMatricula)
                ->where('disciplina_id', $request->idDisciplina)
                ->where('data_aula', $request->data)
                ->pluck('presenca')
                ->first();
            $aluno->frequencia = $frequencia; // Corrigir a atribuição para a propriedade 'frequencia'
        }
        //dd($dados['alunos']);
        return view('admin.frequencia.presenca.registar', $dados);
    }

    public function registarFrequencia(Request $request, $disciplina_id,$data_atual)
    {
        //dd($data_atual);
        $frequencia = $request->input('frequencia');
        //dd($frequencia);
            try {
                foreach ($frequencia as $idMatricula=>$id) {
                    $valor=$id[$idMatricula];
                    //dd($valor);
                    $frequencia = Frequencia::where('matricula_id', $idMatricula)
                        ->where('disciplina_id',$disciplina_id)->where('data_aula',$data_atual)
                        ->first();
                    // Atualiza ou cria uma nova avaliação
                    if ($frequencia) {
                        $frequencia->presenca = $valor;
                        $frequencia->save();
                    } else {
                        $frequencia=Frequencia::create([
                            'data_aula' => $data_atual,
                            'disciplina_id' => $disciplina_id,
                            'matricula_id' => $idMatricula,
                            'presenca' => $valor,
                        ]);
                    }
                    //dd($frequencia);

                }
                return redirect()->route('admin.frequencia.presenca')->with('Frequencia.update.success', 1);
            } catch (\Throwable $th) {
                dd($th);
                return redirect()->route('admin.frequencia.presenca')->withInput()->with('Frequencia.create.error', 1);
            }

    }


}
