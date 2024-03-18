<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gestor;
use App\Models\Loja;
use App\Models\Logger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LojaController extends Controller
{
    //


    public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }


    public function index(){
        $data['lojas']=null;
        if(!isset(Auth::user()->tipo)){
            $data['lojas']=Loja::all();
        }else{
            $data['lojas']=Gestor::join('lojas','gestores.id_loja','lojas.id')
                ->select('lojas.*')
                ->where('id_usuario',Auth::user()->id)
                ->get()
                ->unique('id');
        }
        //dd($data['loja']);
        $this->loggerData("Listou Lojas");

        return view('admin.loja.index', $data);

    }
    public function create(){


        return view('admin.loja.create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        //dd($request);
        
        try{
            $loja=Loja::create([
                'nome'=>$request->nome,
                'nif'=>$request->nif,
                'localizacao'=>$request->localizacao,
                'classificacao'=>0,
                //'vc_imagem'=>$this->upload($request->imagem)
            ]);

            $this->loggerData(" Cadastrou o loja " . $request->nome);
            dd($loja);
            return redirect()->back()->with('loja.create.success',1);

        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('loja.create.error',1);
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
        $data["loja"] = Loja::find($id);

        return view('admin.loja.edit.index',$data);
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
            'nome'=>'required',

        ],[
            'nome.required'=>'A loja é um campo obrigatório',

        ]);


        try {
            //code...
            $loja = Loja::find($id);

            Loja::findOrFail($id)->update([
                'nome'=>$request->nome,
                'nif'=>$request->nif,
                'localizacao'=>$request->localizacao,
                'classificacao'=>0
            ]);
            if(isset($request->imagem)){
                Loja::findOrFail($id)->update([
                    //'vc_imagem'=>$this->upload($request->imagem),

                ]);
            }
            $this->loggerData("Editou o loja que possui o id $loja->id ");

            return redirect()->back()->with('loja.update.success',1);

        } catch (\Throwable $th) {
            throw $th;
            //dd($th);
            return redirect()->back()->with('loja.update.error',1);
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
            $loja =Loja::findOrFail($id);

            Loja::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o loja  de id, ($loja->id)");
            return redirect()->back()->with('loja.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('loja.destroy.error',1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $loja = Loja::findOrFail($id);
            Loja::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou o loja  de id, loja ($loja->nome)");
            return redirect()->back()->with('loja.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('loja.purge.error',1);
        }
    }
    public function upload( $file){
        $nomeFile = uniqid() . '.' . $file->getClientOriginalExtension();
        $caminhoFile = public_path('docs/lojas/imagens'); // Pasta de destino

        $file->move($caminhoFile, $nomeFile);
        return "docs/lojas/imagens/".$nomeFile;

    }


}
