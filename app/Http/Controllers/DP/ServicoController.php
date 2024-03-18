<?php

namespace App\Http\Controllers\DP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servico;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Logger;

class ServicoController extends Controller
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
        $dados['servicos'] = Servico::select('servicos.*')
            ->get();
        //dd($dados['prestadores']);
        return view('admin.servico.index', $dados);
    }

    public function create()
    {
        //$dados['prestadores']=User::all();

        return view('admin.servico.create.index');
    }

    public function store(Request $request)
    {
        //dd($request);


        try {
            //dd($request);
            $servico = Servico::create([
                'nome' => $request->nome,
                'preco' => $request->preco,
            ]);
            //dd($servico);
            $this->loggerData(" Cadastrou o Servico   ($servico->nome) ");
            return redirect()->back()->with('servico.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('servico.create.error', 1);
        }
    }

    public function show()
    {
        $servicos = Servico::all();
        return view('admin.servico.edit.index', ['servicos' => $servicos]);
    }

    public function edit($id)
    {
        $dados["servico"] = Servico::find($id);

        $dados['prestadores']=User::all();
        return view('admin.servico.edit.index', $dados);
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        try {
            $servico = Servico::findOrfail($id)->update([
                'nome' => $request->nome,
                'preco' => $request->preco,
            ]);

            $this->loggerData(" Actulizou o Servico  de id $id ");
            return redirect()->back()->with('servico.update.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('servico.update.error', 1);
        }
    }

    public function destroy($id)
    {
        try {
            //code...
            $servico = Servico::findOrFail($id);
            Servico::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o Servico  de id ($servico->id) ");
            return redirect()->back()->with('servico.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('servico.destroy.error',1);
        }
    }

    public function purge($id)
    {
        try {
            //code...
            $servico = Servico::findOrFail($id);
            Servico::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou o Servico  de id ($servico->id) ");
            return redirect()->back()->with('servico.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('servico.purge.error',1);
        }
    }
}
