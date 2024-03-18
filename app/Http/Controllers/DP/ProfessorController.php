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
        $professores = Professor::join('users','users.id','professors.user_id')
        ->select('users.name as nome','users.genero as genero','users.numero_bi','users.email','users.data_nascimento','users.endereco','professors.*')
        ->where('users.tipo',"Professor")
        ->get();
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
            $user=User::create([
                'name' => $request->nome,
                'data_nascimento' => $request->data_nascimento,
                'endereco' => $request->endereco,
                'email' => $request->email,
                'numero_bi' => $request->numero_bi,
                'genero' => $request->genero,
                'password'=>Hash::make("12345678"),
                'tipo'=>"Professor"
            ]);
            $professor = Professor::create([
                'area_especializacao' => $request->area_especializacao,
                'data_contratacao' => $request->data_contratacao,
                'salario' => $request->salario,
                'user_id'=>$user->id,
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
        $data["professor"] = Professor::join('users','users.id','professors.user_id')
            ->select('users.primeiro_nome','users.ultimo_nome','users.genero','users.numero_bi','users.email','users.data_nascimento','users.endereco','professors.*')
            ->where('professors.id',$id)
            ->first();

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


            $professor = Professor::findOrFail($id)->update([
                'area_especializacao' => $request->area_especializacao,
                'data_contratacao' => $request->data_contratacao,
                'salario' => $request->salario,
            ]);
            User::find($professor->user_id)->update([
                'primeiro_nome' => $request->nome,
                'data_nascimento' => $request->data_nascimento,
                'endereco' => $request->endereco,
                'email' => $request->email,
                'numero_bi' => $request->numero_bi,
                'genero' => $request->genero,
            ]);

            return redirect()->back()->with('professor.update.success',1);

         } catch (\Throwable $th) {
            //throw $th;
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
    /*Start Vinculo Professor Disciplinas */

    public function listarVinculoDisciplina($id)
    {
        $dados['professorDisciplinas'] = DisciplinaProfessor::join('curso_classe_disciplinas','disciplina_professors.curso_classe_disciplina_id','=','curso_classe_disciplinas.id')
            ->join('disciplinas','curso_classe_disciplinas.disciplina_id','disciplinas.id')
            ->join('cursos','curso_classe_disciplinas.curso_id','cursos.id')
            ->join('classes','curso_classe_disciplinas.classe_id','classes.id')
            ->join('professors','disciplina_professors.professor_id','=','professors.id')
            ->join('users','professors.user_id','users.id')
            ->select('disciplina_professors.*','users.name as professor','disciplinas.nome as disciplina','disciplinas.codigo as codigo','cursos.nome as curso','classes.nome as classe')
            ->where('professors.id',$id)
            ->get();
        //dd($dados['professorDisciplinas']);
        return view('admin.professor.disciplina.index',$dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createVinculoDisciplina($id)
    {
        //
        $dados['disciplinas']=Disciplina::all();
        $dados['cursos']=Curso::all();
        $dados['classes']=Classe::all();
        $dados['professores']=Professor::join('users','users.id','professors.user_id')
            ->select('users.name as nome','users.genero','users.numero_bi','users.email','users.data_nascimento','users.endereco','professors.*')
            ->where('professors.id',$id)
            ->first();

        return view('admin.professor.disciplina.create.index',$dados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeVinculoDisciplina(Request $request)
    {

        try {
            //dd($request);
            $cursoDisciplina_id=CursoClasseDisciplina::where('curso_id',$request->curso_id)
            ->where('classe_id',$request->classe_id)
            ->where('disciplina_id',$request->disciplina_id)
            ->first();
            if(isset($cursoDisciplina_id)){
                $professorDisciplina = DisciplinaProfessor::create([
                    'professor_id' => $request->professor_id,
                    'curso_classe_disciplina_id' => $cursoDisciplina_id->id,
                ]);
            }else{
                return redirect()->back()->with('professorDisciplina.create.error', 1);
            }
            //dd($professor);

            return redirect()->back()->with('professorDisciplina.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('professorDisciplina.create.error', 1);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showVinculoDisciplina()
    {
        $professores = Professor::join('users','users.id','professors.user_id')
        ->select('users.name as nome','users.genero as genero','users.numero_bi','users.email','users.data_nascimento','users.endereco','professors.*')
        ->where('users.tipo',"Professor")
        ->get();;
        return view('admin.professor.disciplina.edit.index',['professores'=>$professores]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editVinculoDisciplina($id)
    {
        //
        //dd($id);
        $dados['disciplinas']=Disciplina::all();
        $dados['cursos']=Curso::all();
        $dados['classes']=classe::all();
        $dados['professorDisciplina']=DisciplinaProfessor::join('curso_classe_disciplinas','disciplina_professors.curso_classe_disciplina_id','=','curso_classe_disciplinas.id')
            ->join('disciplinas','curso_classe_disciplinas.disciplina_id','disciplinas.id')
            ->join('cursos','curso_classe_disciplinas.curso_id','cursos.id')
            ->join('classes','curso_classe_disciplinas.classe_id','classes.id')
            ->join('professors','disciplina_professors.professor_id','=','professors.id')
            ->join('users','professors.user_id','users.id')
            ->select('disciplina_professors.*','users.name as professor','disciplinas.nome as disciplina','disciplinas.codigo as codigo','cursos.nome as curso','classes.nome as classe')
            ->where('disciplina_professors.id',$id)
            ->first();
        //dd($dados['professorDisciplina']);
        return view('admin.professor.disciplina.edit.index',$dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateVinculoDisciplina(Request $request, $id)
    {
         try {
            //dd($id);
            $professorDisciplina = DisciplinaProfessor::findOrFail($id)->update([
                'professor_id' => $request->professor_id,
                'curso_classe_disciplina_id' => $request->disciplina_id,
            ]);

            return redirect()->back()->with('professorDisciplina.update.success',1);

         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('professorDisciplina.update.error',1);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyVinculoDisciplina($id)
    {
        try {
            //code...
            $professorDisciplina = DisciplinaProfessor::findOrFail($id);
            DisciplinaProfessor::findOrFail($id)->delete();
            return redirect()->back()->with('professorDisciplina.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('professorDisciplina.destroy.error',1);
        }
    }

    public function purgeVinculoDisciplina($id)
    {
        //
        try {
            //code...
            $professor = DisciplinaProfessor::findOrFail($id);
            DisciplinaProfessor::findOrFail($id)->forceDelete();
            return redirect()->back()->with('professorDisciplina.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('professorDisciplina.purge.error',1);
        }
    }
    /*End Vinculo Professor Disciplinas */

    /*Start Vinculo Professor Disciplinas */

    public function listarVinculoCurso($id)
    {
        $dados['professorCursos'] = CursoProfessor::join('cursos','curso_professors.curso_id','=','cursos.id')
            ->join('professors','curso_professors.professor_id','=','professors.id')
            ->join('users','professors.user_id','users.id')
            ->select('curso_professors.*','users.name as professor','cursos.nome as curso','cursos.codigo as codigo')
            ->where('professor_id',$id)
            ->get();
        return view('admin.professor.curso.index',$dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createVinculoCurso($id)
    {
        //
        $dados['cursos']=Curso::all();
        $dados['professor']=Professor::join('users','users.id','professors.user_id')
            ->select('users.name as nome','users.genero','users.numero_bi','users.email','users.data_nascimento','users.endereco','professors.*')
            ->where('professors.id',$id)
            ->first();
        return view('admin.professor.curso.create.index',$dados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeVinculoCurso(Request $request)
    {

        try {
            //dd($request);
            $professorCurso = CursoProfessor::create([
                'professor_id' => $request->professor_id,
                'curso_id' => $request->curso_id
            ]);
            //dd($professor);

            return redirect()->back()->with('professorCurso.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('professorCurso.create.error', 1);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showVinculoCurso()
    {

        return view('admin.professor.edit.index',$dados);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editVinculoCurso($id)
    {
        //
        $dados['professorCurso'] = CursoProfessor::join('cursos','curso_professors.curso_id','=','cursos.id')
            ->join('professors','curso_professors.professor_id','=','professors.id')
            ->join('users','professors.user_id','users.id')
            ->select('curso_professors.*','users.name as professor','cursos.nome as curso','cursos.codigo as codigo')
            ->where('curso_professors.id',$id)
            ->first();
        //dd($dados['professorCurso']);

        $dados['cursos']=Curso::all();

        return view('admin.professor.curso.edit.index',$dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateVinculoCurso(Request $request, $id)
    {
        try {
            //code...


            $professor = CursoProfessor::findOrFail($id)->update([
                'professor_id' => $request->professor_id,
                'curso_id' => $request->curso_id,
            ]);

            return redirect()->back()->with('professorCurso.update.success',1);

            } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('professorCurso.update.error',1);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyVinculoCurso($id)
    {
        try {
            //code...
            $professor = CursoProfessor::findOrFail($id);
            CursoProfessor::findOrFail($id)->delete();
            return redirect()->back()->with('professorCurso.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('professorCurso.destroy.error',1);
        }
    }

    public function purgeVinculoCurso($id)
    {
        //
        try {
            //code...
            $professor = CursoProfessor::findOrFail($id);
            CursoProfessor::findOrFail($id)->forceDelete();
            return redirect()->back()->with('professorCurso.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('professorCurso.purge.error',1);
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
