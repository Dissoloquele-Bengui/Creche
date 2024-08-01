<?php

namespace App\Http\Controllers\DP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Classe;
use App\Models\Curso;
use App\Models\Logger;
use App\Models\Matricula;
use App\Models\User;
use App\Models\Turma;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AlunoController extends Controller
{
    public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }
    public function index()
    {
        if(Auth::user()->tipo=="Administrador"){
            $data['alunos'] = Aluno::leftJoin('users','users.id','alunos.user_id')
            ->select('users.name as nome_responsavel','users.contacto as contato_responsavel','alunos.*')
            ->get();
            $data['users']=User::where('tipo',"Encarregado")
                ->select('users.*')
                ->get();
        }else{
            $data['alunos'] = Aluno::leftJoin('users','users.id','alunos.user_id')
            ->select('users.name as nome_responsavel','users.contacto as contato_responsavel','alunos.*')
            ->where('alunos.user_id',Auth::user()->id)
            ->get();
            $data['users']=User::where('tipo',"Encarregado")
                ->select('users.*')
                ->where('id',Auth::user()->id)
                ->get();
        }
        //dd($data);
        $this->loggerData(" Listou Crianças");
        return view('admin.aluno.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['classes']=Classe::all();
        $data['users']=User::where('tipo',"Encarregado")
        ->select('users.*')
        ->get();

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
            /*$user = User::create([
                'primeiro_nome' => $request->primeiro_nome,
                'ultimo_nome' => $request->ultimo_nome,
                'name'=>$request->primeiro_nome,
                'data_nascimento' => $request->data_nascimento,
                'endereco' => $request->endereco,
                'email' => $request->email,
                'numero_bi' => $request->numero_bi,
                'genero' => $request->genero,
                'tipo'=>"Aluno",
                'password'=>Hash::make("12345678"),
            ]);*/

            $aluno = Aluno::create([
                'nome' => $request->primeiro_nome,
                'sobrenome' => $request->ultimo_nome,
                'data_nascimento' => $request->data_nascimento,
                'nacionalidade' => $request->nacionalidade,
                'parentesco_responsavel' => $request->parentesco_responsavel,
                'naturalidade' => $request->naturalidade,
                'provincia' => $request->provincia,
                'deficiencia' => $request->deficiencia,
                'nome_pai' => $request->nome_pai,
                'nome_mae' => $request->nome_mae,
                'user_id'=>$request->encarregado_id,
            ]);
            $turmas=Turma::where('idClasse',$request->classe)
                ->where('idAno',1)
                ->get();

            foreach($turmas as $turma){
                if(Matricula::where('turma_id',$turma->id)->count()<$turma->limite){
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
        $alunos = Aluno::leftJoin('users','users.id','alunos.user_id')
            ->select('users.name as nome_responsavel','users.contacto as contato_responsavel','alunos.*')
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
        $data['classes']=Classe::all();
        $data["aluno"] = Aluno::leftJoin('users','users.id','alunos.user_id')
            ->select('users.name as nome_responsavel','users.contacto as contato_responsavel','alunos.*')
            ->where('alunos.id',$id)
            ->first();

        $data['users']=User::where('tipo',"Encarregado")
            ->select('users.*')
            ->get();

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
            $aluno = Aluno::find($id);
            Aluno::find($id)->update([

                'nome' => $request->primeiro_nome,
                'sobrenome' => $request->ultimo_nome,
                'data_nascimento' => $request->data_nascimento,
                'nacionalidade' => $request->nacionalidade,
                'parentesco_responsavel' => $request->parentesco_responsavel,
                'naturalidade' => $request->naturalidade,
                'provincia' => $request->provincia,
                'deficiencia' => $request->deficiencia,
                'nome_pai' => $request->nome_pai,
                'nome_mae' => $request->nome_mae,
                'user_id'=>$request->encarregado_id,
            ]);
            //dd($c);
            $this->loggerData(" Editou o aluno  de id ".$aluno->id);
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
            $aluno = Aluno::findOrFail($id);
            Aluno::findOrFail($id)->delete();
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
            $aluno = Aluno::findOrFail($id);
            Aluno::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou o aluno  de id, $aluno->id");
            return redirect()->back()->with('aluno.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('aluno.purge.error',1);
        }
    }
}
