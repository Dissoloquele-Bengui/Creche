<?php

namespace App\Http\Controllers\MDA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Aluno;
use App\Models\Avaliacao;
use App\Models\Turma;
use App\Models\Matricula;
use App\Models\Disciplina;
use App\Models\CursoClasseDisciplina;
use App\Models\Horario;
use App\Models\Rupe;
use App\Models\SolicitacaoServico;
use App\Models\Prova;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\Auth;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function boletim()
    {
        //
//        $dados['disciplinas']=Disciplina::all();
        $id_aluno = Auth::id();
        $aluno = Aluno::join('matriculas', 'alunos.id', '=', 'matriculas.aluno_id')
            ->join('turmas', 'turmas.id', '=', 'matriculas.turma_id')
            ->select('alunos.*', 'matriculas.id as idMatricula','turmas.id as turma_id')
            ->where('alunos.user_id', $id_aluno)
            ->first();
        $turma=Turma::find($aluno->turma_id);
        //dd(CursoClasseDisciplina::all());
        $dados['disciplinas']=CursoClasseDisciplina::join('disciplinas','disciplinas.id','curso_classe_disciplinas.disciplina_id')
            ->select('disciplinas.nome','curso_classe_disciplinas.*')
            ->where('curso_id',$turma->idCurso)
            ->where('classe_id',$turma->idClasse)
            ->get();
        $dados['trimestres']=[1];

        foreach ($dados['disciplinas'] as $disciplina) {
           // $disciplina->avaliacoes = ['p1'=>1,'p2'=>2,'mac'=>3];

                
                $p1 = Prova::where('matricula_id', $aluno->idMatricula)
                    ->select('provas.valor')
                    ->where('disciplina_id', $disciplina->id)
                    ->where('tipo','p1' )
                    ->where('trimestre',1)
                    ->first();

                $p2 = Prova::where('matricula_id', $aluno->idMatricula)
                    ->select('provas.valor')
                    ->where('disciplina_id', $disciplina->id)
                    ->where('tipo','p2' )
                    ->where('trimestre',1)
                    ->first();

                $mac=Avaliacao::where('matricula_id', $aluno->idMatricula)
                    ->where('disciplina_id', $disciplina->id)
                    ->where('trimestre',1)
                    ->avg('valor');
                $p1 = $p1!=null?$p1->valor:0;
                $p2 = $p2!=null?$p2->valor:0;
                //dd(                $mac);  

                $disciplina->avaliacoes=['p1'=>$p1,'p2'=>$p2,'mac'=>$mac];
            
        }

        return view("aluno.boletim.index",$dados);
    }
    public function frequencia()
    {
        //
        return view("aluno.frequencia.index");
    }
    public function consultarFrequencia(Request $request)
    {
        //
        return view("aluno.frequencia.consultar.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crescimento()
    {
        $data['disciplinas']=Disciplina::all();

        return view('aluno.crescimento.index',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function plano_aula(){
        $aluno_id = Aluno::where('user_id',Auth::id())->first()->id;
        $turma_id = Matricula::where('aluno_id',$aluno_id)->first()->id;
        $data['plano_aulas'] = getPlanoAula()->where('turma_id',$turma_id);
        return view('aluno.plano_aula.index',$data);

    }
    public function nota(Request $request)
    {
        $trimestre = isset($request->it_id_trimestre)?$request->it_id_trimestre:null;
        $disciplina = isset($request->it_id_disciplina)?$request->it_id_disciplina:null;
        $id_aluno = Auth::id();
        $dados['media']=[];
        $dados['trimestres']=[];
        $aluno = Aluno::join('matriculas', 'alunos.id', '=', 'matriculas.aluno_id')
            ->join('turmas', 'turmas.id', '=', 'matriculas.turma_id')
            ->select('alunos.*', 'matriculas.id as idMatricula')
            ->where('alunos.user_id', $id_aluno)
            ->first();
        if($disciplina=="All" && $trimestre== "All"){
            //dd("1");
            $total= Disciplina::count();
            for ($trim=1; $trim <= 3; $trim++) {

                $p1 = Prova::where('matricula_id', $aluno->idMatricula)
                    ->where('tipo','p1' )
                    ->where('trimestre',$trim)
                    ->avg('provas.valor');
                $p2 = Prova::where('matricula_id', $aluno->idMatricula)
                    ->where('tipo','p2' )
                    ->where('trimestre',$trim)
                    ->avg('provas.valor');
                $mac=Avaliacao::where('matricula_id', $aluno->idMatricula)
                    ->where('trimestre',$trim)
                    ->avg('valor');
                $dados['media'][] = ($p1+$p2+$mac)/(3*$total);
            }



        }else if($disciplina=="All" && $trimestre!= "All"){
            //dd("foi");
            $total= Disciplina::count();
            $p1 = Prova::where('matricula_id', $aluno->idMatricula)
                ->where('tipo','p1' )
                ->where('trimestre',$trimestre)
                ->avg('provas.valor');
            $p2 = Prova::where('matricula_id', $aluno->idMatricula)
                ->where('tipo','p2' )
                ->where('trimestre',$trimestre)
                ->avg('provas.valor');
            $mac=Avaliacao::where('matricula_id', $aluno->idMatricula)
                ->where('trimestre',$trimestre)
                ->avg('valor');
                $dados['media'][] = ($p1+$p2+$mac)/(3*$total);

        }else if($disciplina!="All" && $trimestre== "All"){
            //dd($trimestre);
            for ($trim=1; $trim <= 3; $trim++) {

                $p1 = Prova::where('matricula_id', $aluno->idMatricula)
                    ->where('tipo','p1' )
                        ->where('disciplina_id',$disciplina)
                    ->where('trimestre',$trim)
                    ->avg('provas.valor');
                $p2 = Prova::where('matricula_id', $aluno->idMatricula)
                    ->where('tipo','p2' )
                        ->where('disciplina_id',$disciplina)
                    ->where('trimestre',$trim)
                    ->avg('provas.valor');
                $mac=Avaliacao::where('matricula_id', $aluno->idMatricula)
                    ->where('disciplina_id',$disciplina)
                    ->where('trimestre',$trim)
                    ->avg('valor');
                $dados['media'][] = ($p1+$p2+$mac)/3;
            }
        }
        else if($disciplina!="All" && $trimestre!= "All"){
            //dd("4");
            //$dados['disciplinas']=Disciplina::findOrfail($disciplina);
            $p1 = Prova::where('matricula_id', $aluno->idMatricula)
                ->where('disciplina_id',$disciplina)
                ->where('trimestre',$trimestre)
                ->where('tipo','p1' )
                ->avg('valor');
            $p2 = Prova::where('matricula_id', $aluno->idMatricula)
                ->where('disciplina_id',$disciplina)
                ->where('trimestre',$trimestre)
                ->where('tipo','p2' )
                ->avg('valor');
            $mac=Avaliacao::where('matricula_id', $aluno->idMatricula)
                 ->where('disciplina_id',$disciplina)
                ->where('trimestre',$trimestre)
                ->avg('valor');
            //dd([$p1,$p2,$mac]);
            $dados['media'][] = ($p1+$p2+$mac)/3;

        }
        if(isset($request)){
            $p1 = Prova::where('matricula_id', $aluno->idMatricula)
                ->where('tipo','p1' )
                ->where('trimestre',1)
                ->avg('provas.valor');
            $p2 = Prova::where('matricula_id', $aluno->idMatricula)
                ->where('tipo','p2' )
                ->where('trimestre',1)
                ->avg('provas.valor');
            $mac=Avaliacao::where('matricula_id', $aluno->idMatricula)
                ->where('trimestre',1)
                ->avg('valor');
            $total = Disciplina::count();
            $dados['media'][] = [number_format(($p1 + $p2 + $mac) / (3 * $total), 1)];

            //dd($dados);
        }
        if($trimestre == "All"){
            $dados['trimestres']=['Iº','IIº','IIIº'];
        }else{
            $dados['trimestres']=[0,isset($trimestre)?$trimestre:"Iº"];

        }
        return response()->json($dados, 200);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function horario()
    {
        $aluno_id = Aluno::where('user_id',Auth::id())->first()->id;
        $turma_id = Matricula::where('aluno_id',$aluno_id)->first()->id;
        $data['horario']=Horario::where('turma_id',$turma_id)->first();
        return view('aluno.horario.index',$data);
    }


    public function cartao(){
        return view('aluno.cartao.index');
    }
    public function certificado(){
        return view('aluno.certificado.index');
    }
    public function declaracao(){
        return view('aluno.declaracao.index');
    }
    public function getEmail(Request $request){
        $aluno = Aluno::join('users','alunos.user_id','users.id')
        ->select('users.email')
        ->where('alunos.id',$request->processo)
        ->first();
        return response()->json($aluno->email);
    }
    public function solicitaCartao(Request $request){
        $id_aluno = Aluno::where('user_id',Auth::id())->first()->id;
        if(Rupe::where('codigo',$request->codigo)->where('servico_id',2)->exists()){
            $servico_id=Rupe::where('codigo',$request->codigo)->first()->servico_id;
            SolicitacaoServico::create([
                'aluno_id'=>$id_aluno,
                'caminho_comprovativo'=>upload($request->comprovativo),
                'caminho_foto'=>upload($request->foto),
                'servico_id'=>$servico_id
            ]);
            return redirect()->back()->with('solicita.create.success',1);
        }else{
            return redirect()->back()->with('solicita.create.error',1);
        }
    }
    public function solicitaCertificado(Request $request){
        $id_aluno = Aluno::where('user_id',Auth::id())->first()->id;
        //dd(        Rupe::where('codigo',$request->codigo)->where('servico_id',4)->exists());
        //dd(Rupe::where('codigo',$request->codigo)->where('servico_id',5)->exists());
        if(Rupe::where('codigo',$request->codigo)->where('servico_id',6)->exists()){
            try{
                $servico_id=Rupe::where('codigo',$request->codigo)->first()->servico_id;
                SolicitacaoServico::create([
                    'aluno_id'=>$id_aluno,
                    'caminho_comprovativo'=>upload($request->comprovativo),
                    //'caminho_foto'=>upload($request->foto),
                    'servico_id'=>$servico_id
                ]);
                return redirect()->back()->with('solicita.create.success',1);
            }catch(Thrwoable $th){
                throw $th;
                dd($th);
                return redirect()->back()->with('solicita.create.error',1);
            }
        }else{
            return redirect()->back()->with('solicita.create.error',1);
        }
    }
    public function solicitaDeclaracao(Request $request){
        $id_aluno = Aluno::where('user_id',Auth::id())->first()->id;

        if(Rupe::where('codigo',$request->codigo)->where('servico_id',$request->servico_id)->exists()){
            $servico_id=$request->servico_id;
            SolicitacaoServico::create([
                'aluno_id'=>$id_aluno,
                'caminho_comprovativo'=>upload($request->comprovativo),
                //'caminho_foto'=>upload($request->foto),
                'servico_id'=>$servico_id
            ]);
            return redirect()->back()->with('solicita.create.success',1);
        }else{
            return redirect()->back()->with('solicita.create.error',1);
        }
    }
    public function solicitaDeclaracaoNota(Request $request){
        $id_aluno = Aluno::where('user_id',Auth::id())->first()->id;
        if(Rupe::where('codigo',$request->codigo)->where('servico_id',3)->exists()){
            $servico_id=Rupe::where('codigo',$request->codigo)->first()->servico_id;
            SolicitacaoServico::create([
                'aluno_id'=>$id_aluno,
                'caminho_comprovativo'=>upload($request->comprovativo),
                //'caminho_foto'=>upload($request->foto),
                'servico_id'=>$servico_id
            ]);
            return redirect()->back()->with('solicita.create.success',1);
        }else{
            return redirect()->back()->with('solicita.create.error',1);
        }
    }
    

    public function emitirRupeCartao(){
        //$aluno_id = Aluno::where('user_id',Auth::id())->first();
        $this->gerarRupe(2);
        
    }

    public function emitirRupeCertificado(){
        //$aluno_id = Aluno::where('user_id',Auth::id())->first();
        $this->gerarRupe(6);
        
    }

    public function emitirRupeDeclaracao(){
        //$aluno_id = Aluno::where('user_id',Auth::id())->first();
        $this->gerarRupe(3);
        
    }
    public function emitirRupeDeclaracaoNota(){
        //$aluno_id = Aluno::where('user_id',Auth::id())->first();
        $this->gerarRupe(4);
        
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
    }
    public function gerarRupe($valor){
        $data['rupe']=Rupe::join('servicos','rupes.servico_id','servicos.id')
            ->select('rupes.*','servicos.nome as servico','servicos.nome')
            ->where('servicos.id',$valor)
            ->first();
        $html = view('aluno.rupe.index', $data);
        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $mpdf->SetFont("arial");
        ini_set('memory_limit', '15000000M');
        ini_set("pcre.backtrack_limit", "300000000");
        $mpdf->setHeader();
        $mpdf->AddPage();
        $mpdf->WriteHTML($html);
        $mpdf->Output("REFERÊNCIA DE PAGAMENTO ÚNICO AO ESTADO(RUPE)" . ".pdf", "D");
    }
}
