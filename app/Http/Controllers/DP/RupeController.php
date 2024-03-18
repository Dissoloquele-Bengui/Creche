<?php

namespace App\Http\Controllers\DP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rupe;
use App\Models\Servico;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Logger;

class RupeController extends Controller
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
        $dados['rupes'] = Rupe::join('servicos','rupes.servico_id','servicos.id')
            ->select('rupes.*','servicos.nome as servico')
            ->get();
        //dd($dados['servicos']);
        return view('admin.rupe.index', $dados);
    }

    public function create()
    {
        $dados['servicos']=Servico::all();

        return view('admin.rupe.create.index',$dados);
    }

    public function store(Request $request)
    {
        //dd($request);


        try {
            //dd($request);
            $rupe = Rupe::create([
                'codigo' => $request->codigo,
                'servico_id' => $request->id_servico,
            ]);
            //dd($rupe);
            $this->loggerData(" Cadastrou o Rupe   ($rupe->codigo) ");
            return redirect()->back()->with('rupe.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('rupe.create.error', 1);
        }
    }

    public function show()
    {
        $rupes = Rupe::all();
        return view('admin.rupe.edit.index', ['rupes' => $rupes]);
    }

    public function edit($id)
    {
        $dados["rupe"] = Rupe::find($id);

        $dados['servicos']=Servico::all();
        return view('admin.rupe.edit.index', $dados);
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        try {
            $rupe = Rupe::findOrfail($id)->update([
                'codigo' => $request->codigo,
                'servico_id' => $request->id_servico,
            ]);

            $this->loggerData(" Actulizou o Rupe  de id $id ");
            return redirect()->back()->with('rupe.update.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('rupe.create.error', 1);
        }
    }

    public function destroy($id)
    {
        try {
            //code...
            $rupe = Rupe::findOrFail($id);
            Rupe::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o Rupe  de id ($rupe->id) ");
            return redirect()->back()->with('rupe.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('rupe.destroy.error',1);
        }
    }

    public function purge($id)
    {
        try {
            //code...
            $rupe = Rupe::findOrFail($id);
            Rupe::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou o Rupe  de id ($rupe->id) ");
            return redirect()->back()->with('rupe.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('rupe.purge.error',1);
        }
    }
}
