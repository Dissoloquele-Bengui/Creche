<?php

namespace App\Http\Controllers\DP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Encarregado;
use App\Models\Classe;
use App\Models\Curso;
use App\Models\Logger;
use App\Models\Matricula;
use App\Models\User;
use App\Models\Turma;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class EncarregadoController extends Controller
{
    public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }
    public function index()
    {
        $alunos = Encarregado::join('users','users.id','alunos.user_id')
            ->select('users.primeiro_nome','users.ultimo_nome','users.genero','users.numero_bi','users.email','users.data_nascimento','users.endereco','alunos.*')
            ->where('users.tipo',"Encarregado")
            ->get();
        $this->loggerData(" Listou Encarregados");
        return view('admin.aluno.index',['alunos'=>$alunos]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['cursos']=Curso::all();
        $data['classes']=Classe::all();
        return view('admin.aluno.create.index',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            //dd($request);
            $user = User::create([
                'primeiro_nome' => $request->primeiro_nome,
                'ultimo_nome' => $request->ultimo_nome,
                'name'=>$request->primeiro_nome,
                'data_nascimento' => $request->data_nascimento,
                'endereco' => $request->endereco,
                'email' => $request->email,
                'numero_bi' => $request->numero_bi,
                'genero' => $request->genero,
                'tipo'=>"Encarregado",
                'password'=>Hash::make("12345678"),
            ]);

            $aluno = Encarregado::create([

                'nacionalidade' => $request->nacionalidade,
                'numero_telefone' => $request->numero_telefone,
                'nome_responsavel' => $request->nome_responsavel,
                'numero_telefone' => $request->numero_telefone,
                'parentesco_responsavel' => $request->parentesco_responsavel,
                'escola_anterior' => $request->escola_anterior,
                'numero_telefone' => $request->numero_telefone,
                'estado_civil' => $request->estado_civil,
                'naturalidade' => $request->naturalidade,
                'provincia' => $request->provincia,
                'deficiencia' => $request->deficiencia,
                'nome_pai' => $request->nome_pai,
                'nome_mae' => $request->nome_mae,
                'contato_responsavel' => $request->contato_responsavel,
                'user_id'=>$user->id,
                'idade'=>10
            ]);
            $turmas=Turma::where('idCurso',$request->curso)
                ->where('idClasse',$request->classe)
                ->where('idAno',1)
                ->get();

            foreach($turmas as $turma){
                if(Matricula::where('turma_id')->count()<$turma->limite){
                    Matricula::create([
                        'aluno_id'=>$aluno->id,
                        'turma_id'=>$turma->id,
                    ]);
                    break;

                }
            }

            //dd($aluno);
            $this->loggerData(" Cadastrou o aluno " . $request->nome);
            return redirect()->back()->with('aluno.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('aluno.create.error', 1);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $alunos = Encarregado::join('users','users.id','alunos.user_id')
            ->select('users.primeiro_nome','users.ultimo_nome','users.genero','users.numero_bi','users.email','users.data_nascimento','users.endereco','alunos.*')
            ->where('users.tipo',"Encarregado")
            ->get();
        return view('admin.aluno.edit.index',['alunos'=>$alunos]);
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
        $data['cursos']=Curso::all();
        $data['classes']=Classe::all();
        $data["aluno"] = Encarregado::join('users','users.id','alunos.user_id')
            ->select('users.primeiro_nome','users.ultimo_nome','users.genero','users.numero_bi','users.email','users.data_nascimento','users.endereco','alunos.*')
            ->where('alunos.id',$id)
            ->first();

        return view('admin.aluno.edit.index',$data);
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


         try {
            //code...
            //dd($request->numero_bi);
            $aluno = Encarregado::find($id);
            Encarregado::find($id)->update([
                'nacionalidade'=>$request->nacionalidade,
                'numero_telefone'=>$request->numero_telefone,
                'nome_responsavel'=>$request->nome_responsavel,
                'nome_pai'=>$request->nome_pai,
                'nome_mae'=>$request->nome_mae,
                'contato_responsavel'=>$request->contato_responsavel,
                'parentesco_responsavel'=>$request->parentesco_responsavel,
                'escola_anterior'=>$request->escola_anterior,
                'estado_civil'=>$request->estado_civil,
                'naturalidade'=>$request->naturalidade,
                'provincia'=>$request->provincia,
                'deficiencia'=>$request->deficiencia,
            ]);
            User::find($aluno->user_id)->update([
                'primeiro_nome' => $request->primeiro_nome,
                'ultimo_nome' => $request->ultimo_nome,
                'data_nascimento' => $request->data_nascimento,
                'endereco' => $request->endereco,
                'email' => $request->email,
                'numero_bi' => $request->numero_bi,
                'genero' => $request->genero,
            ]);
            //dd($c);
            $this->loggerData(" Editou o aluno  de id".$aluno->id);
            return redirect()->back()->with('aluno.update.success',1);

         } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('aluno.update.error',1);
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
            $aluno = Encarregado::findOrFail($id);
            Encarregado::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o aluno  de id, $aluno->id");
            return redirect()->back()->with('aluno.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('aluno.destroy.error',1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $aluno = Encarregado::findOrFail($id);
            Encarregado::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou o aluno  de id, $aluno->id");
            return redirect()->back()->with('aluno.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('aluno.purge.error',1);
        }
    }
}
