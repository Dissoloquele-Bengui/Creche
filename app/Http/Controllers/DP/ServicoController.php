<?php

namespace App\Http\Controllers\DP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servico;
use App\Models\Matricula;
use App\Models\CursoClasseDisciplina;
use App\Models\Prova;
use App\Models\Avaliacao;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Logger;

use Mpdf\Mpdf;

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
    public function emitirDocumento(Request $request){
        try{
            $aluno = getAlunos()
                ->where('id',$request->id_aluno);
            //dd($request);
            if($request->id_servico == 1){
                $data['aluno']=$aluno->first();
                $html = view('admin.servico.documentos.declaracao', $data);
                $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
                $mpdf->SetFont("arial");
                ini_set('memory_limit', '15000000M');
                ini_set("pcre.backtrack_limit", "300000000");
                $mpdf->setHeader();
                $mpdf->AddPage();
                $mpdf->WriteHTML($html);
                $mpdf->Output("DECLARAÇÃO SEM NOTAS" . ".pdf", "D");
            
            }else if($request->id_servico == 2){
                $data['aluno']=$aluno->first();
                $aluno=$aluno->first();
               // dd($aluno);
                $turma=Matricula::join('turmas','matriculas.turma_id','turmas.id')
                    ->select('turmas.*')
                    ->where('turmas.idClasse',$request->id_classe)
                    ->where('matriculas.aluno_id',$request->id_aluno)
                    ->first();
                $disciplinas=CursoClasseDisciplina::join('disciplinas','disciplinas.id','curso_classe_disciplinas.disciplina_id')
                    ->select('disciplinas.nome','disciplinas.codigo as codigo','curso_classe_disciplinas.id as id')
                    ->where('curso_classe_disciplinas.classe_id',$request->id_classe)
                    ->where('curso_classe_disciplinas.curso_id',$turma->idCurso)
                    ->get();
                $media_geral=0;
                $avaliacoes=[];
                $media=[];
                foreach($disciplinas as $disciplina){
                    foreach([1,2,3] as $trimestre){
                        $p1 = Prova::where('matricula_id', $aluno->idMatricula)
                            ->select('provas.valor')
                            ->where('disciplina_id', $disciplina->id)
                            ->where('trimestre',$trimestre)
                            ->where('tipo','p1' )
                            ->first();
        
                        $p2 = Prova::where('matricula_id', $aluno->idMatricula)
                            ->select('provas.valor')
                            ->where('disciplina_id', $disciplina->id)
                            ->where('trimestre',$trimestre)
                            ->where('tipo','p2' )
                            ->first();
            
                        $mac=Avaliacao::where('matricula_id', $aluno->idMatricula)
                            ->where('disciplina_id', $disciplina->id)
                            ->where('trimestre',$trimestre)
                            ->avg('valor');
                        $p1 = $p1!=null?$p1->valor:0;
                        $p2 = $p2!=null?$p2->valor:0;
                        $avaliacoes[$disciplina->id][]=($p1+$p2+$mac)/3;
                        //dd(($p1+$p2+$mac)/3);
                        
                    }
                    $media[$disciplina->id]=($avaliacoes[$disciplina->id][0]+$avaliacoes[$disciplina->id][1]+$avaliacoes[$disciplina->id][2])/3;
                    $media_geral+=$media[$disciplina->id];
                }
                //dd($avaliacoes);
                $data['media_geral']=$media_geral/$disciplinas->count();
                $data['disciplinas']=$disciplinas;
                $data['avaliacoes']=$avaliacoes;
                $data['media']=$media;
                $html = view('admin.servico.documentos.declaracao_notas', $data);
                $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
                $mpdf->SetFont("arial");
                ini_set('memory_limit', '15000000M');
                ini_set("pcre.backtrack_limit", "300000000");
                $mpdf->setHeader();
                $mpdf->AddPage();
                $mpdf->WriteHTML($html);
                $mpdf->Output("DECLARAÃO COM NOTAS" . ".pdf", "D");
            }else{
                $data['aluno']=$aluno->first();
                $data['turma']=Matricula::join('turmas','matriculas.turma_id','turmas.id')
                    ->join('classes','classes.id','turmas.idClasse')
                    ->join('cursos','cursos.id','turmas.idCurso')
                    ->join('ano_lectivos','ano_lectivos.id','turmas.idAno')
                    ->select('turmas.*','classes.nome as classe','cursos.nome as curso','ano_lectivos.data_inicio as ano_inicio','ano_lectivos.data_fim as ano_final')
                    ->where('turmas.idClasse',$request->id_classe)
                    ->where('matriculas.aluno_id',$request->id_aluno)
                    ->first();
                
                $html = view('admin.servico.documentos.cartao', $data);
                $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
                $mpdf->SetFont("arial");
                ini_set('memory_limit', '15000000M');
                ini_set("pcre.backtrack_limit", "300000000");
                $mpdf->setHeader();
                $mpdf->AddPage();
                $mpdf->WriteHTML($html);
                $mpdf->Output("Cartão Escolar" . ".pdf", "D");
            }

            
        }catch(\Thrwoable $th){
            throw $th;
            dd($th);
        }
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
