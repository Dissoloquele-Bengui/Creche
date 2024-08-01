<?php

namespace App\Http\Controllers\DP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Turma;
use App\Models\AnoLectivo;
use App\Models\Curso;
use App\Models\Classe;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class TurmaController extends Controller
{
    //
    //


    //
    public function index()
    {
        $turmas =Turma::join('classes', 'turmas.idClasse', '=', 'classes.id')
            ->join('ano_lectivos', 'turmas.idAno', '=', 'ano_lectivos.id')
            ->select('turmas.*','classes.nome as classe','ano_lectivos.data_inicio as data_inicio', 'ano_lectivos.data_fim as data_fim', 'ano_lectivos.id as idAno')
            ->get();
            return view('admin.turma.index',['turmas'=>$turmas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $anos=AnoLectivo::all();

        $classes=Classe::all();
        return view('admin.turma.create.index',['anos'=>$anos,'classes'=>$classes]);
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
            $turma = Turma::create([
                'nome' => $request->nome,

                'idClasse' => $request->idClasse,
                'idAno' => $request->idAno,
                'limite'=>$request->limite
            ]);
            //dd($turma);

            return redirect()->back()->with('turma.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('turma.create.error', 1);
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

        $classes=Classe::all();
        $turmas = Turma::all();
        return view('admin.turma.edit.index',['turmas'=>$turmas,'anos'=>$anos,'classes'=>$classes]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['anos']=AnoLectivo::all();
        $data['cursos']=Curso::all();
        $data['classes']=Classe::all();
        $data["turma"] = Turma::join('classes', 'turmas.idClasse', '=', 'classes.id')
        ->join('ano_lectivos', 'turmas.idAno', '=', 'ano_lectivos.id')
        ->join('cursos', 'cursos.id', '=', 'turmas.idCurso')
        ->select('turmas.*','classes.nome as classe','cursos.nome as curso','ano_lectivos.data_inicio as data_inicio', 'ano_lectivos.data_fim as data_fim', 'ano_lectivos.id as idAno')
        ->findOrFail($id);
        return view('admin.turma.edit.index',$data);
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


            $turma = Turma::findOrFail($id)->update([
                'nome' => $request->nome,

                'idClasse' => $request->idClasse,
                'idAno' => $request->idAno,
                'limite'=>$request->limite
            ]);

            return redirect()->back()->with('turma.update.success',1);

         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('turma.update.error',1);
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
            $turma = Turma::findOrFail($id);
            Turma::findOrFail($id)->delete();
            return redirect()->back()->with('turma.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('turma.destroy.error',1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $turma = Turma::findOrFail($id);
            Turma::findOrFail($id)->forceDelete();
            return redirect()->back()->with('turma.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('turma.purge.error',1);
        }
    }
}
