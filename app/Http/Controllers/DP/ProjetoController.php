<?php

namespace App\Http\Controllers\DP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projeto;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Logger;

class ProjetoController extends Controller
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
        $projetos = Projeto::all();
        return view('admin.projeto.index', ['projetos' => $projetos]);
    }

    public function create()
    {
        return view('admin.projeto.create.index');
    }

    public function store(Request $request)
    {
        //dd($request);


        try {
            //dd($request);
            $projeto = Projeto::create([
                'nome' => $request->nome,
                'descricao' => $request->descricao,
                'imagem' => upload($request->imagem),
            ]);
            //dd($projeto);
            $this->loggerData(" Cadastrou o Projeto   ($projeto->nome) ");
            return redirect()->back()->with('projeto.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('projeto.create.error', 1);
        }
    }

    public function show()
    {
        $projetos = Projeto::all();
        return view('admin.projeto.edit.index', ['projetos' => $projetos]);
    }

    public function edit($id)
    {
        $data["projeto"] = Projeto::find($id);

        return view('admin.projeto.edit.index', $data);
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        try {
            $projeto = Projeto::findOrfail($id)->update([
                'nome' => $request->nome,
                'descricao' => $request->descricao,
                'imagem' => upload($request->imagem),
            ]);

            $this->loggerData(" Actulizou o Projeto  de id ($projeto->id) ");
            return redirect()->back()->with('projeto.update.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('projeto.update.error', 1);
        }
    }

    public function destroy($id)
    {
        try {
            //code...
            $projeto = Projeto::findOrFail($id);
            Projeto::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o Projeto  de id ($projeto->id) ");
            return redirect()->back()->with('projeto.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('projeto.destroy.error',1);
        }
    }

    public function purge($id)
    {
        try {
            //code...
            $projeto = Projeto::findOrFail($id);
            Projeto::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou o Projeto  de id ($projeto->id) ");
            return redirect()->back()->with('projeto.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('projeto.purge.error',1);
        }
    }
}
