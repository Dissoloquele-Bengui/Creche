<?php

namespace App\Http\Controllers\DP;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Models\Falta;
use App\Models\AnoLectivo;
use App\Models\Curso;
use App\Models\Classe;
use App\Models\Disciplina;
use App\Models\frequencia;
use App\Models\Matricula;
use App\Models\Turma;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class FaltaController extends Controller
{
    //
    //


    //

    public function justificar()
    {
        $dados['disciplinas']=Disciplina::all();
        return view('admin.falta.justificar.index',$dados);
    }
    public function justificarFalta(Request $request)
    {
        $dados['data_falta']=$request->data;
        $dados['disciplina_id']=$request->idDisciplina;
        $dados['disciplina'] = Disciplina::where('id', $request->idDisciplina)->first();
        $dados['frequencia']=Frequencia::where('matricula_id',$request->matricula)->where('disciplina_id',$request->idDisciplina)->where('data_aula',$request->data)->where('presenca',"Ausente")->first();
        $dados['aluno'] = Aluno::join('matriculas', 'alunos.id', '=', 'matriculas.aluno_id')
            ->join('turmas', 'turmas.id', '=', 'matriculas.turma_id')
            ->select('alunos.*', 'matriculas.id as idMatricula','turmas.nome as turma')
            ->where('matriculas.id', $request->matricula)
            ->first();
        if($dados['frequencia']){
            return view('admin.falta.justificar.registar', $dados);
        }else{
            return redirect()->back();
        }
    }

    public function registarJustificativa(Request $request, )
    {
        //dd($data_atual);
        //dd($falta);
            try {
                $falta = Falta::where('frequencia_id', $request->frequencia_id)
                ->where('data_falta',$request->data_falta)
                ->first();
                // Atualiza ou cria uma nova avaliação
                if ($falta) {
                    $falta->justificativa = $request->justificativa;
                    $falta->save();
                } else {
                    $falta=Falta::create([
                        'data_falta' => $request->data_falta,
                        'frequencia_id' => $request->frequencia_id,
                        'justificativa' => $request->justificativa,
                    ]);
                }
                return redirect()->route('admin.falta.justificar')->with('Falta.update.success', 1);
            } catch (\Throwable $th) {
                dd($th);
                return redirect()->route('admin.falta.justificar')->withInput()->with('Falta.create.error', 1);
            }

    }


}
