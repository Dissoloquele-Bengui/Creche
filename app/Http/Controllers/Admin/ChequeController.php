<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cheque;
use App\Models\Logger;
use App\Models\Loja;
use App\Models\User;
use Illuminate\Http\Request;

class ChequeController extends Controller
{
    //


    public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }


    public function index(){
        $data['lojas']=Loja::all();
        $data['users']=User::where('tipo',"Aluno")->get();
        $data['cheques']=Cheque::join('users','cheques.id_cliente','users.id')
            ->leftJoin('lojas','cheques.id_loja','lojas.id')
            ->select('users.name as user','cheques.*','lojas.nome as loja')
            ->get();
        //dd($data['cheque']);
        $this->loggerData("Listou os  Cheques ");

        return view('admin.cheque.index', $data);

    }
    public function create(){


        return view('admin.cheque.create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        //dd($request);
        $request->validate([
            'montante'=>'required',

        ],[
            'montante.required'=>'O nome é um campo obrigatório',

        ]);
        //dd($request);
        try{
            $cheque=Cheque::create([
                'codigo'=>uniqid().$request->id_cliente,
                'montante'=>$request->montante,
                'id_cliente'=>$request->id_cliente,
                //'id_loja'=>$request->id_loja
            ]);

            $this->loggerData(" Cadastrou o cheque " . $request->nome);

            return redirect()->back()->with('cheque.create.success',1);

        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('cheque.create.error',1);
        }


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $data["cheque"] = Cheque::find($id);

        return view('admin.cheque.edit.index',$data);
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
        //dd($request);
        $request->validate([
            'montante'=>'required',

        ],[
            'montante.required'=>'A cheque é um campo obrigatório',

        ]);


        try {
            //code...
            $cheque = Cheque::find($id);

            Cheque::findOrFail($id)->update([
                'codigo'=>uniqid().$request->id_cliente,
                'montante'=>$request->montante,
                'id_cliente'=>$request->id_cliente,
                //'id_loja'=>$request->id_loja
            ]);
            $this->loggerData("Editou o cheque que possui o id $cheque->id ");

            return redirect()->back()->with('cheque.update.success',1);

        } catch (\Throwable $th) {

            return redirect()->back()->with('cheque.update.error',1);
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
            $cheque =Cheque::findOrFail($id);

            Cheque::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o cheque  de id, ($cheque->id)");
            return redirect()->back()->with('cheque.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('cheque.destroy.error',1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $cheque = Cheque::findOrFail($id);
            Cheque::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou o cheque  de id, cheque ($cheque->nome)");
            return redirect()->back()->with('cheque.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('cheque.purge.error',1);
        }
    }


}
