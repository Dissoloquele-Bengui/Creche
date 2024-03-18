<?php

namespace App\Http\Controllers\DP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Disciplina;
use App\Models\Logger;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class DisciplinaController extends Controller
{
    // ...
    public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }
    public function index()
    {
        $disciplinas = Disciplina::all();
        return view('admin.disciplina.index', ['disciplinas' => $disciplinas]);
    }

    public function create()
    {
        return view('admin.disciplina.create.index');
    }

    public function store(Request $request)
    {
        //dd($request);


        try {
            //dd($request);
            $disciplina = Disciplina::create([
                'nome' => $request->nome,
                'codigo' => $request->codigo,
            ]);
            //dd($disciplina);

            return redirect()->back()->with('disciplina.create.success', 1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('disciplina.create.error', 1);
        }
    }

    public function show()
    {
        $disciplinas = Disciplina::all();
        return view('admin.disciplina.edit.index', ['disciplinas' => $disciplinas]);
    }

    public function edit($id)
    {
        $data["disciplina"] = Disciplina::find($id);

        return view('admin.disciplina.edit.index', $data);
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        try {
            $disciplina = Disciplina::findOrfail($id)->update([
                'nome' => $request->nome,
                'codigo' => $request->codigo,
            ]);


            return redirect()->back()->with('disciplina.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('disciplina.create.error', 1);
        }
    }

    public function destroy($id)
    {
        try {
            //code...
            $disciplina = Disciplina::findOrFail($id);
            Disciplina::findOrFail($id)->delete();
            $this->loggerData(" Eliminou a Disciplina  de id, fisciplina ($disciplina->nome) ");
            return redirect()->back()->with('disciplina.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('disciplina.destroy.error',1);
        }
    }

    public function purge($id)
    {
        try {
            //code...
            $disciplina = Disciplina::findOrFail($id);
            Disciplina::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou a Disciplina  de id, Disciplina ($disciplina->nome) ");
            return redirect()->back()->with('disciplina.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('disciplina.purge.error',1);
        }
    }
}

