<?php

namespace App\Http\Controllers\SITE;

use App\Http\Controllers\Controller;
use App\Models\AlimentoProduto;
use App\Models\Aluno;
use App\Models\AvaliacaoProduto;
use App\Models\Cheque;
use App\Models\Comentario;
use App\Models\Compra;
use App\Models\Fatura;
use App\Models\Produto;
use App\Models\Loja;
use App\Models\PagamentoFatura;
use App\Models\Tabuleiro;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;

use Throwable;

class LojaController extends Controller
{

    public function sobre(){
        return view("site.sobre");
    }
    public function contacto(){
        return view("site.contacto");
    }
    public function compra(Request $request){
       // dd("foi");
        
           // dd("foi");
        $cheque = isset($request->cheque)?Cheque::where('codigo',$request->cheque)->first():Cheque::where('id_cliente',Auth::id())->first();
        if(isset($cheque)){//Validando o código
            $data['produtos'] = null;
            if(Tabuleiro::where('id_usuario',Auth::user()->id)
            ->exists()){
                $data['produtos']= Tabuleiro::join('produtos','tabuleiros.id_produto','produtos.id')
                    ->select('produtos.*','tabuleiros.qtd as quantidade')
                    ->where('id_usuario',Auth::user()->id)
                    ->get();
            }else{
                $data['produtos']=Compra::join('produtos','compras.id_produto','produtos.id')
                    ->select('produtos.*','compras.valor as total','compras.qtd as quantidade')
                    ->where('compras.id_usuario',Auth::user()->id)
                    ->where('it_estado',0)
                    ->get();
            }

            $total = 0;
            if(isset($data['produtos'])){
                foreach($data['produtos'] as $produto){
                    $total += $produto->quantidade * $produto->preco;
                }
            }

            //dd($data['produtos']);

            if($cheque->montante >= $total){//Verificando o saldo
                //Tabuleiro::where
                $fatura = Fatura::where('id_usuario',Auth::id())->where('it_estado',null)->orWhere('it_estado',0)->first();
                if(isset($fatura)){
                    Fatura::find($fatura->id)->update([
                        'total'=>$fatura->total+$total,
                    ]);
                }else{
                    // dd(Auth::user());
                    $fatura=Fatura::create([
                        'data'=>Carbon::now(),
                        'total'=>$total,
                        'it_estado'=>0,
                        'cliente'=>Auth::user()->name,
                        'email'=>Auth::user()->email,
                        'telefone'=>"958070350",
                        'endereco'=>Auth::user()->endereco,
                        'id_usuario'=>Auth::id()

                    ]);
                }
                if(isset($data['produtos'])){
                    foreach($data['produtos'] as $produto){//Efectuando a compra
                        
                        if(!Compra::where('id_produto',$produto->id)->where('id_usuario',Auth::id())->where('it_estado',0)->exists()){
                            Compra::create([
                                'id_produto'=>$produto->id,
                                'id_usuario'=>Auth::id(),
                                'id_cheque'=>$cheque->id,
                                'id_fatura'=>$fatura->id,
                                'qtd'=>$produto->quantidade,
                                'valor'=>$produto->quantidade * $produto->preco,
                                'it_estado'=>0
                            ]);
                            $qtd = Produto::find($produto->id)->qtd;
                            Produto::find($produto->id)->update([
                                'qtd'=>($qtd-$produto->quantidade)
                            ]);
                            Cheque::find($cheque->id)->update([
                                'montante'=>$cheque->montante - ($produto->quantidade * $produto->preco)
                            ]);

                        }
                    }
                }
                $data['total']=$total;
                /*$data['produtos']=Compra::join('produtos','compras.id_produto','produtos.id')
                    ->select('produtos.*','compras.valor as total','compras.qtd as quantidade')
                    ->where('compras.id_usuario',Auth::user()->id)
                    ->where('it_estado',0)
                    ->get();*/
                //dd($data['produtos']);
                return view("site.compra",$data);
            }
            return redirect()->back()->with('cheque.saldo.insuficiente',1);
        }
        
        //dd("foi");
        return redirect()->back()->with('cheque.invalido',1);
    }
    public function checkout(Request $request){
        try{
            //dd($request);
            
            Tabuleiro::where('id_usuario',Auth::id())->forcedelete();
            $fatura=Fatura::join('users','faturas.id_usuario','users.id')
                ->select('faturas.*','faturas.id as fatura_id','users.*')
                ->where('faturas.it_estado',0)
                ->where('faturas.id_usuario',Auth::id())
                ->latest('faturas.created_at')
                ->first();
            if(!isset($fatura)){
                $fatura=Fatura::join('users','faturas.id_usuario','users.id')
                ->select('faturas.*','faturas.id as fatura_id','users.*')
                ->where('faturas.id_usuario',Auth::id())
                ->latest('faturas.created_at')
                ->first();
            }
            //dd($data['fatura']);
            $data['fatura']=$fatura;

            //dd(Compra::where('id_usuario',Auth::id())->where('it_estado',0)->first());
            //$cheque=Cheque::find(Compra::where('id_usuario',Auth::id())->where('it_estado',0)->first()->id_cheque);
            //dd($cheque);
            $data['produtos']=Compra::join('produtos','compras.id_produto','produtos.id')
            ->select('produtos.*','compras.valor as valor','compras.qtd as quantidade')
                ->where('id_usuario',Auth::id())
                ->where('id_fatura',$fatura->fatura_id)
                ->orWhere('it_estado',0)
                ->get();

            Compra::where('id_usuario',Auth::id())
                ->where('it_estado',0)->update([
                    'it_estado'=>1
                ]);
            $data['fatura']->valor_total=$data['produtos']->sum('valor');


            Fatura::where('id_usuario',Auth::id())
                ->where('it_estado',0)
                ->update([
                    'cliente'=>$request->nome,
                    'email'=>$request->email,
                    'endereco'=>$request->endereco,
                    'it_estado'=>1,
                    'telefone'=>isset($request->telefone)?$request->telefone:'958070350',
                    'total'=>$data['produtos']->sum('valor')
                ]);
            $html = view("site/fatura",$data);
            //dd($html);
            $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
            $mpdf->SetFont("arial");
            $mpdf->setHeader();
            $mpdf->AddPage();
            $mpdf->WriteHTML($html);

            $mpdf->Output("Fatura Nº".$fatura->id."/2024" . ".pdf", "D");

        }catch(\Throwable $th){
            throw $th;
            //dd($th);
            return redirect()->back()->with('pagamento.error',1);
        }
    }

    public function tabuleiro(){
        $data['produtos'] = Tabuleiro::join('produtos','tabuleiros.id_produto','produtos.id')
            ->select('produtos.*','tabuleiros.qtd as quantidade','tabuleiros.id as id_tabuleiro')
            ->where('id_usuario',Auth::user()->id)
            ->get();
            $total= 0;
            if(isset($data['produtos'])){
                foreach($data['produtos'] as $produto){
                    $total += $produto->quantidade * $produto->preco;
                }
            }
            $data['total']=$total;
        return view("site.tabuleiro", $data);
    }
    public function updateTabuleiro(Request $request){
        //dd($request);
        try{
            foreach($request->product as $id => $qtd){
                //dd($request);
                Tabuleiro::find($id)->update([
                    'qtd'=>$qtd
                ]);
            }
            return redirect()->route('loja.site.tabuleiro')->with('loja.updateTabuleiro',1);
            //dd($request->product);
        }catch(\Throwable $th){
            throw $th;
            //dd($th);

            return redirect()->back()->with('loja.updateTabuleiro',1);
        }
    }


    public function produto($id){
        $data['produto']=Produto::find($id);
        $data['produtos']=Produto::join('lojas','produtos.id_loja','lojas.id')
            ->select('produtos.*','lojas.nome as loja')
            ->where('qtd','>',0)
            ->get();
        $data['media']=AvaliacaoProduto::where('id_produto',$id)->avg('valor');
        return view("site.prato",$data);
    }



    public function lojas(){
        $data['lojas']=Loja::all();
        $data['produtos']=Produto::join('lojas','produtos.id_loja','lojas.id')
            ->select('produtos.*','lojas.nome as loja')
            ->where('qtd','>',0)
            ->get();
        return view("site.restaurantes",$data);
    }

    public function comentarios(Request $request){
        try{

            $comentario=Comentario::create([
                'id_usuario'=>Auth::id(),
                'id_loja'=>$request->id_loja,
                'mensagem'=>$request->message
            ]);
            //dd($comentario);
            return redirect()->back()->with('comentario.success',1);
        }catch(\Throwable $th){
            throw $th;
            //dd($th);
            return redirect()->back()->with('comentario.error',1);
        }
    }

    public function loja($id){
        $data['loja']=Loja::find($id);
        $data['produtos']=Produto::join('lojas','produtos.id_loja','lojas.id')
            ->select('produtos.*','lojas.nome as loja')
            ->where('id_loja',$id)
            ->get();
        $data['comentarios']=Comentario::join('users','comentarios.id_usuario','users.id')
            ->select('comentarios.*','users.*')
            ->where('id_loja',$id)
            ->get();
        return view("site.restaurante",$data);
    }
    public function addProdutoCart($id){
        //dd(Auth::user());
        $id_usuario = Auth::user()->id;
        $exists=Tabuleiro::where('id_produto',$id)->where('id_usuario',$id_usuario)->first();
        if(isset($exists)){
            Tabuleiro::where('id_produto',$id)->where('id_usuario',$id_usuario)->update([
                'qtd'=>$exists->qtd+1
            ]);
        }else{
            Tabuleiro::create([
                'id_usuario'=>$id_usuario,
                'id_produto'=>$id,
                'qtd'=>1
            ]);
        }
        $data['produtos'] = Tabuleiro::join('produtos','tabuleiros.id_produto','produtos.id')
            ->select('produtos.*','tabuleiros.qtd as quantidade','tabuleiros.id as id_tabuleiro')
            ->where('id_usuario',$id_usuario)
            ->get();
        //dd($data);
        $total=0;
        if(isset($data['produtos'])){
            foreach($data['produtos'] as $produto){
                $total += $produto->quantidade * $produto->preco;
            }
        }
        $data['total']=$total;
        return redirect()->route('loja.site.tabuleiro')->with($data);
        return view("site.tabuleiro", $data);
    }

    public function removeProdutoCart($id){
        if(Tabuleiro::where('id_produto',$id)->where('id_usuario',Auth::id())->exists()){
            Tabuleiro::where('id_produto',$id)->where('id_usuario',Auth::id())->delete();
        }
        return redirect()->route('loja.site.tabuleiro');
    }

    public function avaliarProduto(Request $request){
        if(AvaliacaoProduto::where('id_usuario',Auth::id())->where('id_produto',$request->id)->exists()){
            AvaliacaoProduto::where('id_usuario',Auth::id())->where('id_produto',$request->id)->update([
                'valor'=>$request->valor
            ]);
        }else{
            AvaliacaoProduto::create([
                'valor'=>$request->valor,
                'id_usuario'=>Auth::id(),
                'id_produto'=>$request->id
            ]);
        }

        $media = AvaliacaoProduto::where('id_produto',$request->id)->avg('valor');
        return response()->json($media);
    }
    public function livro(){
        return view('site.livro');
    }

    public function gerarFatura(){
        $id_usuario=Auth::id();   
        $data['produtos'] = Tabuleiro::join('produtos','tabuleiros.id_produto','produtos.id')
            ->select('produtos.*','tabuleiros.qtd as quantidade','tabuleiros.id as id_tabuleiro')
            ->where('id_usuario',$id_usuario)
            ->get();

        $total=0;
        if(isset($data['produtos'])){
            foreach($data['produtos'] as $produto){
                $total += $produto->quantidade * $produto->preco;
            }
        }

        $data['total']=$total;
        $data['fatura']= Fatura::where('id_usuario',$id_usuario)
            ->where('it_estado',null)
            ->orWhere('it_estado',2)
            ->first();
        if(isset($fatura)){
            Fatura::find($fatura->id)->update([
                'total'=>$fatura->total+$total,
            ]);
        }else{
            // dd(Auth::user());
            $data['fatura']=Fatura::create([
                'data'=>Carbon::now(),
                'total'=>$total,
                'it_estado'=>2,
                'cliente'=>Auth::user()->name,
                'email'=>Auth::user()->email,
                'telefone'=>"958070350",
                'endereco'=>Auth::user()->endereco,
                'id_usuario'=>$id_usuario
                //'id_loja'=>$id_loja

            ]);
        }

        if(isset($data['produtos'])){
            foreach($data['produtos'] as $produto){//Efectuando a compra                
                if(!Compra::where('id_produto',$produto->id)
                    ->where('id_usuario',Auth::id())
                    ->where('it_estado',2)
                    ->where('id_fatura',$data['fatura']->id)
                    ->exists()){
                    Compra::create([
                        'id_produto'=>$produto->id,
                        'id_usuario'=>$id_usuario,
                        //'id_cheque'=>$cheque->id,
                        'id_fatura'=>$data['fatura']->id,
                        'qtd'=>$produto->quantidade,
                        'valor'=>$produto->quantidade * $produto->preco,
                        'it_estado'=>2,
                        //'id_loja'=>$loja->id,
                    ]);
                    $qtd = Produto::find($produto->id)->qtd;
                    Produto::find($produto->id)->update([
                        'qtd'=>($qtd-$produto->quantidade)
                    ]);

                }
            }
        }
        //dd($data['produtos']);
        $data['fatura']->valor_total=$data['produtos']->sum('preco');

        $html = view("site/fatura",$data);
        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $mpdf->SetFont("arial");
        $mpdf->setHeader();
        $mpdf->AddPage();
        //$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
        //$mpdf->WriteHTML($css1, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html);
        $mpdf->Output("Fatura Nº".$data['fatura']->id."/2024" . ".pdf", "D");
    }
    public function enviarFatura(Request $request){
        try{
           PagamentoFatura::create([
            'id_fatura'=>$request->id_fatura,
            'caminho'=>$this->upload($request->caminho)
           ]); 
           return redirect()->back()->with('pagamento.create.success',1);

        }catch(Throwable $th){
            throw $th;
            dd($th);
            return redirect()->back()->with('pagamento.create.error',1);
        }
    }
    public function emitirRecibo($id){

    }
    public function upload( $file){

        $nomeFile = uniqid() . '.' . $file->getClientOriginalExtension();
        $caminhoFile = public_path('docs/faturas/imagens'); // Pasta de destino

        $file->move($caminhoFile, $nomeFile);
        return "docs/faturas/imagens/".$nomeFile;

    }
}
