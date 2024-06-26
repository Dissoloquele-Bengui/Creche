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
use Illuminate\Support\Facades\Auth;
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
        $dados['turmas']=Turma::join('matriculas','turmas.id','=','matriculas.turma_id')->whereColumn('matriculas.aluno_id','turmas.id')->get();
        if(Auth::user()->tipo=="Encarregado"){
            $dados['turmas']=Turma::join('matriculas','turmas.id','=','matriculas.turma_id')
                ->join('alunos','alunos.id','=','matriculas.aluno_id')
                ->select('turmas.*')
                ->where('alunos.user_id',Auth::user()->id)
                ->distinct('turmas.id')
                ->get();
        }
        return view('admin.frequencia.read.buscar',$dados);
    }
    public function verFrequencia(Request $request)
    {
        //dd($request);
        $dados['data_atual']=$request->data;
        $dados['turma'] = Turma::join('classes', 'turmas.idClasse', '=', 'classes.id')
            ->join('ano_lectivos', 'turmas.idAno', '=', 'ano_lectivos.id')
            ->select('turmas.*', 'classes.nome as classe', 'ano_lectivos.data_inicio', 'ano_lectivos.data_fim')
            ->where('turmas.id', $request->idTurma)
            ->first();
        $dados['alunos'] = Aluno::join('matriculas', 'alunos.id', '=', 'matriculas.aluno_id')
            ->join('turmas', 'turmas.id', '=', 'matriculas.turma_id')
            ->select('alunos.*', 'matriculas.id as idMatricula')
            ->where('matriculas.turma_id', $request->idTurma)
            ->get();
        if(Auth::user()->tipo=="Encarregado"){
            $dados['alunos'] = Aluno::join('matriculas', 'alunos.id', '=', 'matriculas.aluno_id')
                ->join('turmas', 'turmas.id', '=', 'matriculas.turma_id')
                ->select('alunos.*', 'matriculas.id as idMatricula')
                ->where('matriculas.turma_id', $request->idTurma)
                ->where('alunos.user_id',Auth::user()->id)
                ->get();
        }

        foreach ($dados['alunos'] as $aluno) {
            $frequencia = Frequencia::where('matricula_id', $aluno->idMatricula)
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

        $dados['turmas']=Turma::all();
        return view('admin.frequencia.presenca.index',$dados);
    }
    public function lancarFrequencia(Request $request)
    {
        $dados['data_atual']=$request->data;
        $dados['turma'] = Turma::join('classes', 'turmas.idClasse', '=', 'classes.id')
            ->join('ano_lectivos', 'turmas.idAno', '=', 'ano_lectivos.id')
            ->select('turmas.*', 'classes.nome as classe', 'ano_lectivos.data_inicio', 'ano_lectivos.data_fim')
            ->where('turmas.id', $request->idTurma)
            ->first();
        $dados['alunos'] = Aluno::join('matriculas', 'alunos.id', '=', 'matriculas.aluno_id')
            ->join('turmas', 'turmas.id', '=', 'matriculas.turma_id')
            ->select('alunos.*', 'matriculas.id as idMatricula')
            ->where('matriculas.turma_id', $request->idTurma)
            ->get();

        foreach ($dados['alunos'] as $aluno) {
            $frequencia = Frequencia::where('matricula_id', $aluno->idMatricula)
                ->where('data_aula', $request->data)
                ->pluck('presenca')
                ->first();
            $aluno->frequencia = $frequencia; // Corrigir a atribuição para a propriedade 'frequencia'
        }
        //dd($dados['alunos']);
        return view('admin.frequencia.presenca.registar', $dados);
    }

    public function registarFrequencia(Request $request)
    {
        //dd($data_atual);
        $frequencia = $request->input('frequencia');
        //dd($frequencia);
            try {
                foreach ($frequencia as $idMatricula=>$id) {
                    $valor=$id[$idMatricula];
                    //dd($valor);
                    $frequencia = Frequencia::where('matricula_id', $idMatricula)
                        ->where('data_aula',$request->data_atual)
                        ->first();
                    // Atualiza ou cria uma nova avaliação
                    if ($frequencia) {
                        $frequencia->presenca = $valor;
                        $frequencia->save();
                    } else {
                        $frequencia=Frequencia::create([
                            'data_aula' => $request->data_atual,
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
