<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gestor;
use App\Models\Logger;
use App\Models\Loja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EncarregadoController extends Controller
{
    //


    public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }


    public function index(){

        $data['encarregados'] = User::where('tipo',"Encarregado")
        ->get();
        $data['encarregado_view']=true;
        if(Auth::user()->tipo == "Encarregado"){
            $data['encarregados'] = $data['encarregados']->where('id',Auth::id());
        }
        $this->loggerData("Listou Encarregados");

        return view('admin.encarregado.index', $data);

    }
    public function create(){


        return view('admin.encarregado.create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        //dd($request);
        $request->validate([
            'name'=>'required',

        ],[
            'name.required'=>'O name é um campo obrigatório',

        ]);
        //dd($request);
        try{
            $encarregado=  User::create([
                'name'=>$request->name,
                'data_nascimento' => $request->data_nascimento,
                'endereco' => $request->endereco,
                'email' => $request->email,
                'bi' => $request->numero_bi,
                'genero' => $request->genero,
                'tipo'=>$request->tipo,
                'password'=>Hash::make($request->password),
            ]);

            $this->loggerData(" Cadastrou o encarregado " . $request->name);

            return redirect()->back()->with('user.create.success',1);

        } catch (\Throwable $th) {
            throw $th;
            //dd($th);
            return redirect()->back()->with('user.create.error',1);
        }


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $data["encarregado"] = User::find($id);

        return view('admin.encarregado.edit.index',$data);
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
        //dd($request);
        $request->validate([
            'name'=>'required',

        ],[
            'name.required'=>'A encarregado é um campo obrigatório',

        ]);


        try {
            //code...
            $encarregado = User::find($id);

            $user = User::findOrFail($id)->update([
                'name'=>$request->name,
                'data_nascimento' => $request->data_nascimento,
                'endereco' => $request->endereco,
                'email' => $request->email,
                'bi' => $request->numero_bi,
                'genero' => $request->genero,
                'tipo'=>$request->tipo,
                'password'=>Hash::make($request->password)
            ]);
            //dd($request);
            //dd($user);

            //dd(Gestor::all());
            $this->loggerData("Editou o encarregado que possui o id $encarregado->id ");

            return redirect()->back()->with('user.update.success',1);

        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('user.update.error',1);
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
            $encarregado =User::findOrFail($id);

            User::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o encarregado  de id, ($encarregado->id)");
            return redirect()->back()->with('user.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('user.destroy.error',1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $encarregado = User::findOrFail($id);
            User::findOrFail($id)->forceDelete();
            $this->loggerData("Purgou o encarregado  de id, encarregado $encarregado->name");
            return redirect()->back()->with('user.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('user.purge.error',1);
        }
    }

    public function upload( $file){

        $nomeFile = uniqid() . '.' . $file->getClientOriginalExtension();
        $caminhoFile = public_path('docs/users/imagens'); // Pasta de destino

        $file->move($caminhoFile, $nomeFile);
        return "docs/users/imagens/".$nomeFile;

    }
}
