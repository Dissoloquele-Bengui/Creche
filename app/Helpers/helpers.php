<?php


use App\Models\Aluno;
use App\Models\Professor;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Estado_Notificacoe;
use App\Models\Classe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Route as RT;

function isLoja(){
    $routePrefix = app(RT::class)->getPrefix();
    //dd(strpos($routePrefix, 'loja'));
    return strpos($routePrefix, 'loja');
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
function getProfessores(){
    return Professor::join('users','users.id','professors.user_id')
    ->select('users.name as nome','users.genero as genero','users.numero_bi','users.email','users.data_nascimento','users.endereco','professors.*')
    ->where('users.tipo',"Professor")
    ->get();;
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
?>
