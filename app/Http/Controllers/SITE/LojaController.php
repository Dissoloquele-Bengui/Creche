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
}
