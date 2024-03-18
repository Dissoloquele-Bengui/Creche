<?php

namespace App\Http\Controllers\DP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoriaLivro;
use App\Models\Logger;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CategoriaLivroController extends Controller
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
        $categoria_livros = CategoriaLivro::all();
        return view('admin.categoria_livro.index', ['categoria_livros' => $categoria_livros]);
    }

    public function create()
    {
        return view('admin.categoria_livro.create.index');
    }

    public function store(Request $request)
    {
        //dd($request);


        try {
            //dd($request);
            $categoria_livro = CategoriaLivro::create([
                'nome' => $request->nome,
                'descricao' => $request->descricao,
            ]);
            //dd($categoria_livro);

            return redirect()->back()->with('categoria_livro.create.success', 1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('categoria_livro.create.error', 1);
        }
    }

    public function show()
    {
        $categoria_livros = CategoriaLivro::all();
        return view('admin.categoria_livro.edit.index', ['categoria_livros' => $categoria_livros]);
    }

    public function edit($id)
    {
        $data["categoria_livro"] = CategoriaLivro::find($id);

        return view('admin.categoria_livro.edit.index', $data);
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        try {
            $categoria_livro = CategoriaLivro::findOrfail($id)->update([
                'nome' => $request->nome,
                'descricao' => $request->descricao,
            ]);


            return redirect()->back()->with('categoria_livro.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('categoria_livro.create.error', 1);
        }
    }

    public function destroy($id)
    {
        try {
            //code...
            $categoria_livro = CategoriaLivro::findOrFail($id);
            CategoriaLivro::findOrFail($id)->delete();
            $this->loggerData(" Eliminou a CategoriaLivro  de id, fisciplina ($categoria_livro->nome) ");
            return redirect()->back()->with('categoria_livro.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('categoria_livro.destroy.error',1);
        }
    }

    public function purge($id)
    {
        try {
            //code...
            $categoria_livro = CategoriaLivro::findOrFail($id);
            CategoriaLivro::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou a CategoriaLivro  de id, CategoriaLivro ($categoria_livro->nome) ");
            return redirect()->back()->with('categoria_livro.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('categoria_livro.purge.error',1);
        }
    }
}

