<?php

namespace App\Http\Controllers\DP;

use App\Models\Curso;
use App\Models\CursoDisciplina;
use App\Models\Disciplina;
use Illuminate\Http\Request;

class CD extends \App\Http\Controllers\Controller
{
    //
    public function listar()
    {
        $data['cursoDisciplinas'] = CursoDisciplina::join('cursos','curso_disciplinas.curso_id','=','cursos.id')
            ->join('disciplinas','curso_disciplinas.disciplina_id','disciplinas.id')
            ->select('curso_disciplinas.*','disciplinas.nome as disciplina','disciplinas.codigo as codigo','cursos.nome as curso')
            ->get();
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
        $data['disciplinas']=Disciplina::all();

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
            $cursoDisciplina = CursoDisciplina::create([
                'curso_id' => $request->curso_id,
                'disciplina_id' => $request->disciplina_id,
            ]);
            return redirect()->back()->with('Curso.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('Curso.create.error', 1);
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
        $data['cursoDisciplina'] = CursoDisciplina::join('cursos','curso_disciplinas.curso_id','=','cursos.id')
        ->join('disciplinas','curso_disciplinas.disciplina_id','disciplinas.id')
        ->select('curso_disciplinas.*','disciplinas.nome as disciplina','disciplinas.codigo as codigo','cursos.nome as curso')->find($id);
        $data['disciplinas'] = Disciplina::all();
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
            $curso = CursoDisciplina::findOrFail($id)->update([
                'curso_id' => $request->curso_id,
                'disciplina_id' => $request->disciplina_id,
            ]);
            return redirect()->back()->with('Curso.update.success',1);
         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Curso.update.error',1);
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
            $cursoDisciplina = CursoDisciplina::findOrFail($id);
            CursoDisciplina::findOrFail($id)->delete();
            return redirect()->back()->with('CursoDisciplina.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('CursoDisciplina.destroy.error',1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $cursoDisciplina = CursoDisciplina::findOrFail($id);
            CursoDisciplina::findOrFail($id)->forceDelete();
            return redirect()->back()->with('CursoDisciplina.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('CursoDisciplina.purge.error',1);
        }
    }
}
