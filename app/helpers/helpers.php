<?php

use App\Models\Ap_unidade;
use App\Models\Carro;
use App\Models\CursoClasseDisciplina;
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
use App\Models\Livro;
//use App\Models\Projeto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Route as RT;

function isLoja(){
    $routePrefix = app(RT::class)->getPrefix();
    //dd(strpos($routePrefix, 'loja'));
    return strpos($routePrefix, 'loja');
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
if (!function_exists('myCustomFunction')) {
    function myCustomFunction()
    {
        return 'Esta é uma função personalizada!';
    }
}
function perfil(){
    if(Auth::check()){
        $user= User::where('users.id', Auth::user()->id)
        ->first();
        $user->telefone = TelefoneUser::where('it_id_user',$user->id)->get();

        return $user;
    }else{
        return null;
    }
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
?>
