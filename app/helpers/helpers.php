<?php


use App\Models\CursoClasseDisciplina;
use App\Models\Aluno;
use App\Models\Turma;
use App\Models\Prova;
use App\Models\Avaliacao;
use App\Models\Professor;
use App\Models\PlanoAula;
use App\Models\CategoriaLivro;
use App\Models\servico;
use App\Models\Projeto;
use App\Models\Curso;
use App\Models\Compra;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Estado_Notificacoe;
use App\Models\Gestor;
use App\Models\Loja;
use App\Models\Livro;
use App\Models\Classe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Route as RT;

function isLoja(){
    $routePrefix = app(RT::class)->getPrefix();
    //dd(strpos($routePrefix, 'loja'));
    return strpos($routePrefix, 'loja');
}

function getLojas(){
    if(Auth::user()->tipo=="Administrador"){
        return Loja::all();
    }else{
        //dd(Auth::user()->id);
        return Gestor::join('lojas','gestores.id_loja','lojas.id')
            ->select('lojas.*')
            ->where('id_usuario',Auth::user()->id)
            ->get();
    }
}


function getGestores(){
    return Gestor::join('users','gestores.id_usuario','users.id')
        ->select('users.*')
        ->whereIn('id_loja',getLojas()->pluck('id')->toArray())
        ->distinct('users.id')
        ->get();
}

function getPrestadorServico(){
    return user::where('tipo',"Prestador de Serviços")->get();
}

function getProjectImage($id){
    $caminho = 'site/assets/img/projects/remodeling-1.jpg';
    return isset(Projeto::find($id)->imagem)?Projeto::find($id)->imagem:$caminho;
}

function getProdutosByFatura($id){
    $data['produtos']=Compra::join('produtos','compras.id_produto','produtos.id')
        ->select('produtos.*','compras.valor as valor','compras.qtd as quantidade')
        ->where('compras.id_fatura',$id)
        ->get();   
    //dd(Compra::all());
    return isset($data['produtos'])?$data['produtos']:[];
}


function getCategoriaForNotificacaoPagamento(){
    $categoria =  CategoriaNotificacao::where('');
}

function formatarDataPortugues($data)
{
    return date("d/m/Y", strtotime($data));
}

function users()
{
    return User::all();
}

function minhasNotificacoes(){

    //dd(Auth::id());
    if(Auth::check()){
        $data['notificacoes'] = Estado_Notificacoe::join('users', 'estado_notificacoes.it_id_usuario', 'users.id')
        ->leftJoin('notificacoes', 'estado_notificacoes.it_id_notificacoe', 'notificacoes.id')
        ->leftJoin('categoria_notificacoes', 'notificacoes.it_id_categoria', 'categoria_notificacoes.id')
        ->select('notificacoes.*', 'categoria_notificacoes.vc_nome as categoria', 'estado_notificacoes.id as id_estado', 'estado_notificacoes.it_estado as it_estado', 'estado_notificacoes.*')
        ->where('estado_notificacoes.it_id_usuario', Auth::user()->id)
        ->where('estado_notificacoes.created_at', '>=', Carbon::now()->subDays(360))
        ->get();
    $data['not_view'] = Estado_Notificacoe::where('it_estado', 0)
        ->where('estado_notificacoes.it_id_usuario', Auth::user()->id)
        ->count();
    }
    if(!isset($data)){
        $data['notificacoes']=[];
        $data['not_view']=[];
    }
    return isset($data)?$data:[];
}
function  upload( $file){

    $nomeFile = uniqid() . '.' . $file->getClientOriginalExtension();
    $caminhoFile = public_path('docs/files/imagens'); // Pasta de destino

    $file->move($caminhoFile, $nomeFile);
    return "docs/files/imagens/".$nomeFile;

}
function getLivros(){
    $livros = Livro::join('categoria_livros','livros.categoria_id','categoria_livros.id')
        ->select('livros.*','categoria_livros.nome as categoria')
        ->get();
    return $livros;
}
function getCategoriaLivros(){
    return CategoriaLivro::all();
}
function getCursos(){
    return Curso::all();
}
function getProjetos(){
    //dd(Projeto::all());
    return Projeto::all();
}
function getProfessores(){
    return Professor::join('users','users.id','professors.user_id')
    ->select('users.name as nome','users.genero as genero','users.numero_bi','users.email','users.data_nascimento','users.endereco','professors.*')
    ->where('users.tipo',"Professor")
    ->get();;
}
function getCursoClasseDisciplinas(){
    return CursoClasseDisciplina::join('classes','curso_classe_disciplinas.classe_id','=','classes.id')
        ->join('disciplinas','curso_classe_disciplinas.disciplina_id','=','disciplinas.id')
        ->join('cursos','curso_classe_disciplinas.curso_id','=','cursos.id')
        ->select('curso_classe_disciplinas.*','disciplinas.nome as disciplina','disciplinas.codigo as codigo','classes.nome as classe','cursos.nome as curso','cursos.id as curso_id')
        ->get();
}
function getPlanoAula(){
   return PlanoAula::leftJoin('turmas','plano_aulas.turma_id','turmas.id')
            ->leftJoin('curso_classe_disciplinas','plano_aulas.curso_classe_disciplina_id','curso_classe_disciplinas.id')
            ->leftJoin('cursos','curso_classe_disciplinas.curso_id','cursos.id')
            ->leftJoin('classes','curso_classe_disciplinas.classe_id','classes.id')
            ->leftJoin('disciplinas','curso_classe_disciplinas.disciplina_id','disciplinas.id')
            ->leftJoin('professors','plano_aulas.professor_id','professors.id')
            ->leftJoin('users','users.id','professors.user_id')
            ->select('turmas.nome as turma','users.name as professor','classes.nome as classe','cursos.nome as curso','disciplinas.nome as disciplina','plano_aulas.*')->get();

}
function getAlunos(){
    return Aluno::join('users','users.id','alunos.user_id')
        ->leftJoin('matriculas','matriculas.aluno_id','alunos.id')
        ->leftJoin('turmas','matriculas.turma_id','turmas.id')
        ->select('users.primeiro_nome','users.ultimo_nome','users.genero','users.numero_bi','users.email','users.data_nascimento','matriculas.id as idMatricula','users.endereco','alunos.*','turmas.nome as turma')
        ->where('users.tipo',"Aluno")
        ->get();
}
function getClasses(){
    return Classe::all();
}
function getNotas($trimestre){
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
        $dados['trimestres']=$trimestre;
        $exist = Prova::where('matricula_id', $aluno->idMatricula)
            ->where('trimestre',$trimestre)
            ->exists();
        if($exist){
            foreach ($dados['disciplinas'] as $disciplina) {
                // $disciplina->avaliacoes = ['p1'=>1,'p2'=>2,'mac'=>3];                
                 $p1 = Prova::where('matricula_id', $aluno->idMatricula)
                     ->select('provas.valor')
                     ->where('disciplina_id', $disciplina->id)
                     ->where('tipo','p1' )
                     ->where('trimestre',$trimestre)
                     ->first();
     
                 $p2 = Prova::where('matricula_id', $aluno->idMatricula)
                     ->select('provas.valor')
                     ->where('disciplina_id', $disciplina->id)
                     ->where('tipo','p2' )
                     ->where('trimestre',$trimestre)
                     ->first();
     
                 $mac=Avaliacao::where('matricula_id', $aluno->idMatricula)
                     ->where('disciplina_id', $disciplina->id)
                     ->where('trimestre',$trimestre)
                     ->avg('valor');
                 $p1 = $p1!=null?$p1->valor:0;
                 $p2 = $p2!=null?$p2->valor:0;
                 //dd(                $mac);  
     
                 $disciplina->avaliacoes=['p1'=>$p1,'p2'=>$p2,'mac'=>$mac];
                 
             }
        }else{
            return null;
        }
        return $dados['disciplinas'];
}
?>
