<?php
namespace App\Http\Controllers\DP;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\AgendaN;
use App\Models\Aluno;
use App\Models\livro;
use App\Models\Ap_unidade;
use App\Models\Destinatario;
use App\Models\Edificios;
use App\Models\Logger;
use Illuminate\Http\Request;
use App\Models\Categorialivro;
use App\Models\Estado_Notificacoe;
use App\Models\Andar;
use App\Models\Professor;
use App\Models\Turma;
use App\Models\TurmaProfessor;
use Illuminate\Support\Facades\Auth;

class livroController extends Controller
{


    public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }

    public function index(){
       

        $data['categorias']=CategoriaLivro::all();
        $data['livros']=Livro::join('categoria_livros','livros.categoria_id','=','categoria_livros.id')
        ->select(
            'livros.*',
            'categoria_livros.nome as categoria',
        )->get();


        $this->loggerData("Listou Livros");

        return view('admin.livro.index', $data);

    }

    public function create(){

        return view('admin.livro.create.index',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request){
        /*$request->validate([
            'titulo'=>'required',
            'descricao'=>'required',
        ],[
            'titulo.required'=>'O Assunto é um campo obrigatório',
            'descricao.required'=>'A Descrição é um campo obrigatório',



        ]);*/
       // dd($request);
        try{
            $livro=Livro::create([
                'titulo'=>$request->titulo,
                'descricao'=>$request->lt_descricao,
                'categoria_id'=>$request->categoria_id,
                'imagem'=>upload($request->imagem),
                'ficheiro'=>upload($request->ficheiro)
            ]);

            $this->loggerData(" Cadastrou uma  Notificação " . $request->titulo);

            return redirect()->back()->with('livro.create.success',1);

         } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('livro.create.error',1);
        }


     }


      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    public function edit(int $id)
    {
        //
        $data["livro"] = Livro::find($id);


        return view('admin.livro.edit.index',$data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



     public function update(Request $request, int $id)
     {
        $request->validate([
            'titulo'=>'required',
            'descricao'=>'required',
        ],[
            'titulo.required'=>'O Assunto é um campo obrigatório',
            'descricao.required'=>'A Descrição é um campo obrigatório',

        ]);
        try {
            //code...
            $livro = Livro::find($id);

            $c =Livro::findOrFail($id)->update([
                'titulo'=>$request->titulo,
                'descricao'=>$request->lt_descricao,
                'categoria_id'=>$request->categoria_id
            ]);
            if(isset($request->ficheiro)){
                $c =Livro::findOrFail($id)->update([
                    'ficheiro'=>upload($request->ficheiro),
    
                ]);
            }
            if(isset($request->imagem)){
                $c =Livro::findOrFail($id)->update([
                    'imagem'=>upload($request->imagem),
    
                ]);
            }
            
            $this->loggerData("Editou o livro que possui o id $livro->id  e nome  $livro->titulo");
            return redirect()->back()->with('livro.update.success',1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('livro.update.error',1);
        }
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
        try {
            //code...
            $livro =Livro::findOrFail( $id);

            Livro::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o livro , ($livro->titulo)");
            return redirect()->back()->with('livro.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('livro.destroy.error',1);
        }
    }

    public function purge(int $id)
    {
        //
        try {
            //code...
            $livro = Livro::findOrFail($id);
            Livro::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou a Notificação  ($livro->titulo)");
            return redirect()->back()->with('livro.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('livro.purge.error',1);
        }
    }


}
