<?php

namespace App\Http\Controllers\DP;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Models\PlanoAula;
use App\Models\Turma;
use App\Models\AnoLectivo;
use App\Models\Curso;
use App\Models\Classe;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class PlanoAulaController extends Controller
{
    //
    //


    //
    public function index()
    {
        $data['turmas']=Turma::all();

        $data['plano_aulas'] = getplanoAula();
        //dd($data);
            return view('admin.plano_aula.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $dados['turmas']=Turma::all();
        return view('admin.plano_aula.create.index',$dados);
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
            $plano_aula = PlanoAula::create([
                'caminho' => $this->upload($request->caminho),
                'professor_id' => $request->professor_id,
                'curso_classe_disciplina_id' => $request->curso_classe_disciplina_id,
                'turma_id'=>$request->turma_id,
                'trimestre'=>$request->trimestre
            ]);
           // dd($plano_aula);

            return redirect()->back()->with('plano_aula.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('plano_aula.create.error', 1);
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
        $anos=AnoLectivo::all();
        $cursos=Curso::all();
        $classes=Classe::all();
        $plano_aulas = PlanoAula::all();
        return view('admin.plano_aula.edit.index',['plano_aulas'=>$plano_aulas,'anos'=>$anos,'cursos'=>$cursos,'classes'=>$classes]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $dados['turmas']=Turma::all();
        $dados["plano_aula"] = PlanoAula::findOrFail($id);
        return view('admin.plano_aula.edit.index',$dados);
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


            $plano_aula = PlanoAula::findOrFail($id)->update([
                'caminho' => $this->upload($request->caminho),
                'professor_id' => $request->professor_id,
                'curso_classe_disciplina_id' => $request->curso_classe_disciplina_id,
                'turma_id'=>$request->turma_id,
                'trimestre'=>$request->trimestre
            ]);


            return redirect()->back()->with('plano_aula.update.success',1);

         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('plano_aula.update.error',1);
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
        //
        try {
            //code...
            $plano_aula = PlanoAula::findOrFail($id);
            PlanoAula::findOrFail($id)->delete();
            return redirect()->back()->with('plano_aula.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('plano_aula.destroy.error',1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $plano_aula = PlanoAula::findOrFail($id);
            PlanoAula::findOrFail($id)->forceDelete();
            return redirect()->back()->with('plano_aula.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('plano_aula.purge.error',1);
        }
    }
    public function upload( $file){

        $nomeFile = uniqid() . '.' . $file->getClientOriginalExtension();
        $caminhoFile = public_path('docs/users/imagens'); // Pasta de destino

        $file->move($caminhoFile, $nomeFile);
        return "docs/users/imagens/".$nomeFile;

    }
}
