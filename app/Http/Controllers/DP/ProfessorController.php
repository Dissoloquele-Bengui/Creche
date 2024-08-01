<?php

namespace App\Http\Controllers\DP;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use Illuminate\Http\Request;
use App\Models\Professor;
use App\Models\DisciplinaProfessor;
use App\Models\CursoProfessor;
use App\Models\TurmaProfessor;
use App\Models\Disciplina;
use App\Models\Curso;
use App\Models\CursoClasseDisciplina;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class ProfessorController extends Controller
{
    //
    //


    //
    public function index()
    {
        $professores = Professor::all();
        return view('admin.professor.index',['professores'=>$professores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.professor.create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            //dd($request);
            $professor = Professor::create([
                'area_especializacao' => $request->area_especializacao,
                'nome' => $request->nome,
                'data_nascimento' => $request->data_nascimento,
                'endereco' => $request->endereco,
                'bi' => $request->numero_identificacao,
                'genero' => $request->genero,
                'data_contratacao' => $request->data_contratacao,
                'contacto'=> $request->telefone
            ]);
            //dd($professor);

            return redirect()->back()->with('professor.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('professor.create.error', 1);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $professores = Professor::join('users','users.id','professors.user_id')
        ->select('users.name as nome','users.genero as genero','users.numero_bi','users.email','users.data_nascimento','users.endereco','professors.*')
        ->where('users.tipo',"Professor")
        ->get();;
        return view('admin.professor.edit.index',['professores'=>$professores]);
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
        $data["professor"] = Professor::findOrfail($id);

        return view('admin.professor.edit.index',$data);
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
         //


         try {
            //code...
          //  dd($request);

            $professor = Professor::findOrFail($id)->update([
                'area_especializacao' => $request->area_especializacao,
                'nome' => $request->nome,
                'data_nascimento' => $request->data_nascimento,
                'endereco' => $request->endereco,
                'bi' => $request->numero_identificacao,
                'genero' => $request->genero,
                'data_contratacao' => $request->data_contratacao,
                'contacto'=> $request->telefone
            ]);

            return redirect()->back()->with('professor.update.success',1);

         } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('professor.update.error',1);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            //code...
            $professor = Professor::findOrFail($id);
            Professor::findOrFail($id)->delete();
            return redirect()->back()->with('professor.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('professor.destroy.error',1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $professor = Professor::findOrFail($id);
            Professor::findOrFail($id)->forceDelete();
            return redirect()->back()->with('professor.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('professor.purge.error',1);
        }
    }

    /*End Vinculo Professor Turmas */

    /*Start Vinculo Professor Cursos */

    public function listarVinculoTurma($id)
    {
        $data['turmas'] = TurmaProfessor::join('professors','professors.id','turma_professors.professor_id')
        ->join('users','users.id','professors.user_id')
            ->join('turmas','turma_professors.turma_id','turmas.id')
            ->join('classes', 'turmas.idClasse', '=', 'classes.id')
            ->join('ano_lectivos', 'turmas.idAno', '=', 'ano_lectivos.id')
            ->join('cursos', 'cursos.id', '=', 'turmas.idCurso')
            ->select('turmas.*','classes.nome as classe','cursos.nome as curso','ano_lectivos.data_inicio as data_inicio', 'ano_lectivos.data_fim as data_fim', 'ano_lectivos.id as idAno')
            ->where('professors.id',$id)
            ->get();
        $data['professor']=$data['professor']=Professor::join('users','users.id','professors.user_id')
            ->select('users.name as nome','users.genero','users.numero_bi','users.email','users.data_nascimento','users.endereco','professors.*')
            ->where('professors.id',$id)
            ->first();
        return view('admin.professor.turma.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createVinculoTurma($id)
    {
        //
        $data['turmas']=Turma::all();
        $data['professor']=Professor::join('users','users.id','professors.user_id')
            ->select('users.name as nome','users.genero','users.numero_bi','users.email','users.data_nascimento','users.endereco','professors.*')
            ->where('professors.id',$id)
            ->first();
        return view('admin.professor.turma.create.index',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeVinculoTurma(Request $request)
    {

        try {
            //dd($request);
            $professor = TurmaProfessor::create([
                'professor_id' => $request->professor_id,
                'turma_id' => $request->turma_id,

            ]);
            //dd($professor);

            return redirect()->back()->with('professorTurma.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('professorTurma.create.error', 1);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showVinculoTurma($id)
    {
        $professores = TurmaProfessor::find($id);
        return view('admin.professor.edit.index',['professores'=>$professores]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editVinculoTurma($id)
    {
        //
        $data["professorTurma"] = TurmaProfessor::join('turmas','turma_professors.turma_id','turmas.id')
        ->join('professors','turma_professors.professor_id','professors.id')
        ->join('users','users.id','professors.user_id')
        ->select('users.name as professor','turma_professors.*')
        ->where('turma_professors.id',$id)
        ->first();

        $data['turmas']=Turma::all();
        return view('admin.professor.turma.edit.index',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateVinculoTurma(Request $request, $id)
    {
         try {

            $professor = TurmaProfessor::findOrFail($id)->update([
                'professor_id' => $request->professor_id,
                'turma_id' => $request->turma_id,
            ]);

            return redirect()->back()->with('professorTurma.update.success',1);

         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('professorTurma.update.error',1);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyVinculoTurma($id)
    {
        try {
            //code...
            $professor = TurmaProfessor::findOrFail($id);
            Professor::findOrFail($id)->delete();
            return redirect()->back()->with('professorTurma.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('professorTurma.destroy.error',1);
        }
    }

    public function purgeVinculoTurma($id)
    {
        //
        try {
            //code...
            $professor = TurmaProfessor::findOrFail($id);
            Professor::findOrFail($id)->forceDelete();
            return redirect()->back()->with('professorTurma.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('professorTurma.purge.error',1);
        }
    }
    /*End Vinculo Professor Cursos */

}
