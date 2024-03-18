<?php

namespace App\Http\Controllers\DP;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Turma;
use App\Models\AnoLectivo;
use App\Models\Curso;
use App\Models\Classe;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class HorarioController extends Controller
{
    //
    //


    //
    public function index()
    {
        $data['turmas']=Turma::all();
        $data['horarios'] = Horario::join('turmas', 'turmas.id', '=', 'horarios.turma_id')
            ->join('classes', 'turmas.idClasse', '=', 'classes.id')
            ->join('ano_lectivos', 'turmas.idAno', '=', 'ano_lectivos.id')
            ->join('cursos', 'cursos.id', '=', 'turmas.idCurso')
            ->select('horarios.*',   'turmas.nome as turma', 'ano_lectivos.data_inicio as data_inicio', 'ano_lectivos.data_fim', 'cursos.nome as curso', 'classes.nome as classe')
            ->whereColumn('turmas.id', '=', 'horarios.turma_id')
            ->get();

        //dd($data['horarios']);
        return view('admin.horario.index',$data);
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
        return view('admin.horario.create.index',$dados);
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
            $horario = Horario::create([
                'caminho' => $this->upload($request->caminho),
                'turma_id' => $request->turma_id,
            ]);
            //dd($horario);

            return redirect()->back()->with('horario.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('horario.create.error', 1);
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
        $horarios = Horario::all();
        return view('admin.horario.edit.index',['horarios'=>$horarios,'anos'=>$anos,'cursos'=>$cursos,'classes'=>$classes]);
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
        $dados["horario"] = Horario::findOrFail($id);
        return view('admin.horario.edit.index',$dados);
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


            $horario = Horario::findOrFail($id)->update([
                'caminho' => $this->upload($request->caminho),
                'turma_id' => $request->turma_id,
            ]);


            return redirect()->back()->with('horario.update.success',1);

         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('horario.update.error',1);
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
            $horario = Horario::findOrFail($id);
            Horario::findOrFail($id)->delete();
            return redirect()->back()->with('horario.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('horario.destroy.error',1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $horario = Horario::findOrFail($id);
            Horario::findOrFail($id)->forceDelete();
            return redirect()->back()->with('horario.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('horario.purge.error',1);
        }
    }
    public function upload( $file){

        $nomeFile = uniqid() . '.' . $file->getClientOriginalExtension();
        $caminhoFile = public_path('docs/users/imagens'); // Pasta de destino

        $file->move($caminhoFile, $nomeFile);
        return "docs/users/imagens/".$nomeFile;

    }
}
