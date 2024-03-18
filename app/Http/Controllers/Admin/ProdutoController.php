<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alimento;
use App\Models\AlimentoProduto;
use App\Models\Gestor;
use App\Models\Logger;
use App\Models\Produto;
use App\Models\Loja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    //


    public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }


    public function index(){
        if(!isset(Auth::user()->nivel)){
            $lojas=Loja::all();
        }else{
            $lojas=Gestor::join('lojas','gestores.id_loja','lojas.id')
                ->select('lojas.*')
                ->where('id_usuario',Auth::user()->id)
                ->get()
                ->unique('id');
        }
        $data['produtos']=Produto::join("lojas","produtos.id_loja","lojas.id")
            ->select("produtos.*","lojas.nome as loja")
            ->whereIn('id_loja',$lojas->pluck('id')->toArray())
            ->get();
        $data['lojas']=$lojas;
        $this->loggerData("Listou Produtos");

        return view('admin.produto.index', $data);

    }
    public function create(){


        return view('admin.produto.create.index');
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
            'nome'=>'required',

        ],[
            'nome.required'=>'O nome é um campo obrigatório',

        ]);
        //dd($request);
        try{
            //$imagem=$this->upload($request->imagem);
            foreach($request->id_loja as $id_loja){
                $produtos=Produto::create([
                    'nome'=>$request->nome,
                    'id_loja'=>$id_loja,
                    'descricao'=>$request->descricao,
                    'qtd'=>$request->qtd,
                    'preco'=>$request->preco,
                    'imagem'=>$this->upload($request->imagem)
                ]);
                $this->loggerData(" Cadastrou o produtos " . $request->nome);
            }




            return redirect()->back()->with('produto.create.success',1);

        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('produto.create.error',1);
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
        $data["produtos"] = Produto::find($id);

        return view('admin.produto.edit.index',$data);
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
            'nome.required'=>'A produtos é um campo obrigatório',

        ]);


        try {
            //code...
            $produtos = Produto::find($id);

            Produto::findOrFail($id)->update([
                'nome'=>$request->nome,
                'id_loja'=>$request->id_loja,
                'calorias'=>$request->calorias,
                'descricao'=>$request->descricao,
                'qtd'=>$request->qtd,
                'preco'=>$request->preco
            ]);
            if(isset($request->imagem)){
                Produto::findOrFail($id)->update([
                    'imagem'=>$this->upload($request->imagem),
                ]); 
            }

            $this->loggerData("Editou o produto que possui o id $produtos->id ");

            return redirect()->back()->with('produto.update.success',1);

        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('produto.update.error',1);
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
            $produtos =Produto::findOrFail($id);

            Produto::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o produtos  de id, ($produtos->id)");
            return redirect()->back()->with('produto.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('produto.destroy.error',1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $produtos = Produto::findOrFail($id);
            Produto::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou o produtos  de id, produtos ($produtos->nome)");
            return redirect()->back()->with('produto.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('produto.purge.error',1);
        }
    }

    public function upload( $file){

        $nomeFile = uniqid() . '.' . $file->getClientOriginalExtension();
        $caminhoFile = public_path('docs/produtos/imagens'); // Pasta de destino

        $file->move($caminhoFile, $nomeFile);
        return "docs/produtos/imagens/".$nomeFile;

    }
}
