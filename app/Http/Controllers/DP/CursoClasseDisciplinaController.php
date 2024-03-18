<?php

namespace App\Http\Controllers\DP;

use App\Models\Classe;
use App\Models\Curso;
use App\Models\CursoClasseDisciplina;
use App\Models\CursoDisciplina;
use App\Models\Disciplina;
use Illuminate\Http\Request;

class CursoClasseDisciplinaController extends \App\Http\Controllers\Controller
{
    public function lista($id)
    {
        $data['cursoDisciplinas'] = CursoClasseDisciplina::join('classes','curso_classe_disciplinas.classe_id','=','classes.id')
        ->join('disciplinas','curso_classe_disciplinas.disciplina_id','=','disciplinas.id')
        ->join('cursos','curso_classe_disciplinas.curso_id','=','cursos.id')
        ->select('curso_classe_disciplinas.*','disciplinas.nome as nome','disciplinas.codigo as codigo','classes.nome as classe','cursos.nome as curso','cursos.id as curso_id')
        ->where('cursos.id',$id)
        ->get();
        $data['curso']=Curso::findOrfail($id);
        return view('admin.curso.disciplina.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //dd($id);
        $data['cursos']=Curso::where('id',$id)->first();
        $data['classes']=Classe::all();
        $data['disciplinas']=Disciplina::all();
        $data['cursos']=Curso::all();

        return view('admin.curso.disciplina.create.index',$data);
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
            $classeDisciplina = CursoClasseDisciplina::create([
                'classe_id' => $request->classe_id,
                'disciplina_id' => $request->disciplina_id,
                'curso_id'=>$request->curso_id
            ]);
            return redirect()->back()->with('Classe.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('Classe.create.error', 1);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $data['disciplinas'] = Disciplina::all();
        $data['classes']=Classe::all();
        $data['cursos']=Curso::where('id',CursoClasseDisciplina::find($id)->curso_id)->get();
        $data['cursoDisciplina'] = CursoClasseDisciplina::join('classes','curso_classe_disciplinas.classe_id','=','classes.id')
            ->join('disciplinas','curso_classe_disciplinas.disciplina_id','=','disciplinas.id')
            ->join('cursos','curso_classe_disciplinas.curso_id','=','cursos.id')
            ->select('curso_classe_disciplinas.*','disciplinas.nome as nome','disciplinas.codigo as codigo','classes.nome as classe','cursos.nome as curso')
            ->find($id);
        //dd($data);
        return view('admin.curso.disciplina.edit.index',$data);
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
         try {
            $classe = CursoClasseDisciplina::findOrFail($id)->update([
                'classe_id' => $request->classe_id,
                'curso_id'=> $request->curso_id,
                'disciplina_id' => $request->disciplina_id
            ]);
            return redirect()->back()->with('Classe.update.success',1);
         } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('Classe.update.error',1);
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
            $classeDisciplina = CursoClasseDisciplina::findOrFail($id);
            CursoClasseDisciplina::findOrFail($id)->delete();
            return redirect()->back()->with('ClasseDisciplina.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('ClasseDisciplina.destroy.error',1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $classeDisciplina = CursoClasseDisciplina::findOrFail($id);
            CursoClasseDisciplina::findOrFail($id)->forceDelete();
            return redirect()->back()->with('ClasseDisciplina.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('ClasseDisciplina.purge.error',1);
        }
    }
}
