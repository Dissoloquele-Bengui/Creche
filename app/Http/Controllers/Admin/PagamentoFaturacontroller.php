<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PagamentoFatura;
use App\Models\Fatura;
use App\Models\Compra;
use App\Models\Gestor;
use App\Models\Notificacoes;
use App\Models\Destinatario;
use App\Models\Logger;
use Illuminate\Http\Request;
use App\Models\CategoriaNotificacao;
use App\Models\Estado_Notificacoe;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PagamentoFaturaController extends Controller
{
    public function index()
    {
            
        $lojas= getLojas();
        $data['vendas']=PagamentoFatura::join('faturas','pagamento_faturas.id_fatura','faturas.id')
            ->join('users','faturas.id_usuario','users.id')
            ->select('faturas.*','users.name as cliente','pagamento_faturas.id as id_pagamento','pagamento_faturas.caminho as caminho')
            ->whereIn('faturas.id_loja',$lojas->pluck('id')->toArray())
            ->get();
       // dd($data['vendas']);


  
        return view('admin.pagamento.index',$data);
    }
    public function update(Request $request, $id)
    {
        //
        //
        //dd($request);
        $request->validate([
            'estado'=>'required',

        ],[
            'estado.required'=>'A usuario é um campo obrigatório',

        ]);


        try {
            //code...
            $pagamento = PagamentoFatura::find($id);

            $fatura = Fatura::findOrFail($pagamento->id_fatura)->update([
                'it_estado'=>$request->estado,
            ]);
            $fatura = Fatura::findOrFail($pagamento->id_fatura);
            //dd($fatura);
            
            $dataAtual = Carbon::now();
            $dataFormatada = $dataAtual->toDateString(); 
            $horaAtual = $dataAtual->toTimeString(); 


            $descricao = '';
            switch ($request->estado) {
                case 0:
                    $descricao = "Seu pagamento foi reprovado. Por favor, verifique os detalhes do pagamento e tente novamente.";
                    Compra::where('id_fatura',$fatura->id)->update([
                        'it_estado'=>0
                    ]);
                    break;
                case 1:
                    $descricao = "Seu pagamento foi aprovado com sucesso. Obrigado por sua compra!";
                    Compra::where('id_fatura',$fatura->id)->update([
                        'it_estado'=>1
                    ]);
                    break;
                case 2:
                    $descricao = "Seu pagamento está atualmente em processamento. Isso pode levar algum tempo. Por favor, aguarde.";
                    break;

                default:
                    $descricao = "O estado do pagamento não pôde ser determinado. Entre em contato conosco para obter assistência.";
            }


            $notificacao = Notificacoes::create([
                'vc_assunto' => "Pagamento de Produtos",
                'lt_descricao' => $descricao,
                'dt_data' => $dataFormatada,
                'tm_hora' => $horaAtual,
                'it_id_categoria' => 2,
            ]);

            $destinatario = Destinatario::create([
                'it_id_usuario' => $fatura->id_usuario,
                'it_id_notificacoe' => $notificacao->id,
            ]);


            Estado_Notificacoe::create([
                'it_id_usuario' => $fatura->id_usuario,
                'it_id_destinatario' => $destinatario->id,
                'it_id_notificacoe' => $notificacao->id,
                'it_estado' => 0, 
            ]);
            //dd($request);
            //dd($user);

            //dd(Gestor::all());
            //$this->loggerData("Editou o estado da fatura que possui o id $pagamento->id_fatura ");

            return redirect()->back()->with('pagamento.update.success',1);

        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('pagamento.update.error',1);
        }
    }
}
