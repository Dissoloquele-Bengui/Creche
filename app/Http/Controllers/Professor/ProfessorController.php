<?php

namespace App\Http\Controllers\MDA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Aluno;
use App\Models\Avaliacao;
use App\Models\Matricula;
use App\Models\Disciplina;
use App\Models\Prova;
use Illuminate\Support\Facades\Auth;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function boletim()
    {
        //
        $dados['disciplinas']=Disciplina::all();
        $id_aluno = Auth::id();
        $aluno = Aluno::join('matriculas', 'alunos.id', '=', 'matriculas.aluno_id')
            ->join('turmas', 'turmas.id', '=', 'matriculas.turma_id')
            ->select('alunos.*', 'matriculas.id as idMatricula')
            ->where('alunos.user_id', $id_aluno)
            ->first();
        foreach ($dados['disciplinas'] as $disciplina) {
            $avaliacoes = Prova::where('matricula_id', $aluno->idMatricula)
                ->where('disciplina_id', $disciplina->id)
                ->pluck('valor', 'tipo')
                ->toArray();
            $mac = Avaliacao::where('matricula_id', $aluno->idMatricula)
                ->where('disciplina_id', $disciplina->id)
                ->avg('valor');
            $disciplina->avaliacoes = $avaliacoes;
        }

        return view("aluno.boletim.index",$dados);
    }
    public function frequencia()
    {
        //
        return view("aluno.frequencia.index");
    }
    public function consultarFrequencia(Request $request)
    {
        //
        return view("aluno.frequencia.consultar.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
