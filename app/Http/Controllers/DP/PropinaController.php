<?php

namespace App\Http\Controllers\DP;

use App\Http\Controllers\Controller;
use App\Models\AnoLectivo;
use App\Models\Classe;
use App\Models\Pagamento;
use Illuminate\Http\Request;
use App\Models\Propina;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class PropinaController extends Controller
{
    //
    //


    //
    public function index()
    {
        $data['propinas'] = Propina::all();
        $data['classes']=Classe::all();
        return view('admin.propina.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['anos']=AnoLectivo::all();
        $data['classes']=Classe::all();
        return view('admin.propina.create.index',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ano=AnoLectivo::where('data_inicio',2022)->where('data_fim',2023)->first();
        try {
            //dd($request);
            $propina = Propina::create([
                'mes' => $request->mes,
                'limite' => $request->limite,
                'data_vencimento' => $request->data_vencimento,
                'ano_id' => $ano->id,
                'idClasse' => $request->idClasse,
            ]);
            //dd($propina);

            return redirect()->back()->with('Propina.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('Propina.create.error', 1);
        }
    }
    public function pagar($id)
    {
        //
        $propina=Propina::findOrFail($id);
        //dd($propina);

        return view('admin.propina.pagamento.pagar',['propina'=>$propina]);
    }
    public function pagarPropina(Request $request)
    {
        try {
            $pagamento_anterior = Pagamento::where('matricula_id',$request->matricula_id)
            ->where('propina_id',$request->propina_id)
            ->first();
            $propina = Propina::find($request->propina_id);
            //dd([$pagamento_anterior,$propina]);
            if($pagamento_anterior != null && (($pagamento_anterior->valor + $request->valor) > $propina->limite ) ){
                return redirect()->back()->with('Propina.create.error', 1);

            }

            $pagamento = Pagamento::create([
                'valor' => $request->valor,
                'matricula_id' => $request->matricula_id,
                'propina_id' => $request->propina_id,
                'data'=> $request->data
            ]);

            return redirect()->back()->with('Propina.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('Propina.create.error', 1);
        }
    }
    public function listarPropina($id){
        $data['pagamentos']=Pagamento::join('matriculas','matriculas.id','pagamentos.matricula_id')
            ->join('propinas','propinas.id','pagamentos.propina_id')
            ->join('alunos','alunos.id','matriculas.aluno_id')
            ->join('turmas','turmas.id','matriculas.turma_id')
            ->select('turmas.nome as turma','alunos.nome','alunos.sobrenome','propinas.mes as propina','pagamentos.*')
            ->where('propinas.id',$id)
            ->get();
        if(Auth::user()->tipo=="Encarregado"){
            $data['pagamentos']=Pagamento::join('matriculas','matriculas.id','pagamentos.matricula_id')
                ->join('propinas','propinas.id','pagamentos.propina_id')
                ->join('alunos','alunos.id','matriculas.aluno_id')
                ->join('turmas','turmas.id','matriculas.turma_id')
                ->select('turmas.nome as turma','alunos.nome','alunos.sobrenome','propinas.mes as propina','pagamentos.*')
                ->where('propinas.id',$id)
                ->where('alunos.user_id',Auth::user()->id)
                ->get();
        }
        return view('admin.propina.pagamento.index',$data);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $propinas = Propina::all();
        return view('admin.propina.edit.index',['propinas'=>$propinas]);
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
        $data["propina"] = Propina::find($id);
        $data['classes']=Classe::all();
        $data['anos']=AnoLectivo::all();
        return view('admin.propina.edit.index',$data);
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

            $ano=AnoLectivo::where('data_inicio',2022)->where('data_fim',2023)->first();
            $propina = Propina::findOrFail($id)->update([
                'mes' => $request->mes,
                'limite' => $request->limite,
                'data_vencimento' => $request->data_vencimento,
                'idClasse' => $request->idClasse,
            ]);

            return redirect()->back()->with('Propina.update.success',1);

         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Propina.update.error',1);
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
            $propina = Propina::findOrFail($id);
            Propina::findOrFail($id)->delete();
            return redirect()->back()->with('Propina.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Propina.destroy.error',1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $propina = Propina::findOrFail($id);
            Propina::findOrFail($id)->forceDelete();
            return redirect()->back()->with('Propina.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Propina.purge.error',1);
        }
    }
}
