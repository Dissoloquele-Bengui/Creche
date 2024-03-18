<?php

namespace App\Http\Controllers\DP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class CursoController extends Controller
{
    //
    //


    //
    public function index()
    {
        $cursos = Curso::all();
        return view('admin.curso.index',['cursos'=>$cursos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.curso.create.index');
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
            $curso = Curso::create([
                'nome' => $request->nome,
                'descricao' => $request->descricao,
                'codigo' => $request->codigo,
            ]);
            //dd($curso);

            return redirect()->back()->with('curso.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('curso.create.error', 1);
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
        $cursos = Curso::all();
        return view('admin.curso.edit.index',['cursos'=>$cursos]);
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
        $data["curso"] = Curso::find($id);

        return view('admin.curso.edit.index',$data);
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


            $curso = Curso::findOrFail($id)->update([
                'nome' => $request->nome,
                'descricao' => $request->descricao,
                'codigo' => $request->codigo,
            ]);

            return redirect()->back()->with('curso.update.success',1);

         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('curso.update.error',1);
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
        try {
            //code...
            $curso = Curso::findOrFail($id);
            Curso::findOrFail($id)->delete();
            return redirect()->back()->with('curso.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('curso.destroy.error',1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $curso = Curso::findOrFail($id);
            Curso::findOrFail($id)->forceDelete();
            return redirect()->back()->with('curso.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('curso.purge.error',1);
        }
    }
}
