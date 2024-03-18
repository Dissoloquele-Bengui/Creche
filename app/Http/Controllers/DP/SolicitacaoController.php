<?php


namespace App\Http\Controllers\DP;
use App\Http\Controllers\Controller;
use App\Models\SolicitacaoServico;
use App\Models\Servico;
use App\Models\Fatura;
use App\Models\Gestor;
use App\Models\Aluno;
use App\Models\Notificacoes;
use App\Models\Destinatario;
use App\Models\Logger;
use Illuminate\Http\Request;
use App\Models\CategoriaNotificacao;
use App\Models\Estado_Notificacoe;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SolicitacaoController extends Controller
{
    public function index()
    {
            

        $data['solicitacoes']=SolicitacaoServico::join('servicos','solicitacao_servicos.servico_id','servicos.id')
            ->join('alunos','solicitacao_servicos.aluno_id','alunos.id')
            ->join('matriculas','alunos.id','matriculas.aluno_id')
            ->join('users','alunos.user_id','users.id')
            ->select('solicitacao_servicos.*','users.primeiro_nome','alunos.id as processo','users.ultimo_nome','servicos.nome as servico')
            ->get();


  
        return view('admin.solicita.index',$data);
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

            SolicitacaoServico::findOrFail($id)->update([
                'estado'=>$request->estado,
            ]);
            $fatura = SolicitacaoServico::findOrFail($id);
            $servico = Servico::find($request->servico_id);
            //dd($servico);
            $dataAtual = Carbon::now();
            $dataFormatada = $dataAtual->toDateString(); 
            $horaAtual = $dataAtual->toTimeString(); 


            $descricao = '';
            switch ($request->estado) {
                case 2:
                    $descricao = "Sua solicitação para o serviço de $servico->nome foi reprovada. Por favor, verifique os detalhes do pagamento e tente novamente.";
                    break;
                case 1:
                    $descricao = "Sua solicitação para o serviço de $servico->nome foi aprovada com sucesso. Já podes ir levantar!";
                    break;
                case 0:
                    $descricao = "Sua solicitação está atualmente em processamento. Isso pode levar algum tempo. Por favor, aguarde.";
                    break;

                default:
                    $descricao = "O estado do pagamento não pôde ser determinado. Entre em contato conosco para obter assistência.";
            }
            $id_usuario = Aluno::find($fatura->aluno_id)->user_id;

            $notificacao = Notificacoes::create([
                'vc_assunto' => "Solicitação de Serviços",
                'lt_descricao' => $descricao,
                'dt_data' => $dataFormatada,
                'tm_hora' => $horaAtual,
                'it_id_categoria' => 3,
            ]);

            $destinatario = Destinatario::create([
                'it_id_usuario' => $id_usuario,
                'it_id_notificacoe' => $notificacao->id,
            ]);


            Estado_Notificacoe::create([
                'it_id_usuario' => $id_usuario,
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
