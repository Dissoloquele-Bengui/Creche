<?php

namespace App\Http\Controllers\DP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classe;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class ClasseController extends Controller
{
    //
    //


    //
    public function index()
    {
        $classes = Classe::all();
        return view('admin.classe.index',['classes'=>$classes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.classe.create.index');
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
            $classe = Classe::create([
                'nome' => $request->nome,

            ]);
            //dd($classe);

            return redirect()->back()->with('classe.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('classe.create.error', 1);
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
        $classes = Classe::all();
        return view('admin.classe.edit.index',['classes'=>$classes]);
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
        $data["classe"] = Classe::find($id);

        return view('admin.classe.edit.index',$data);
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


            $classe = Classe::findOrFail($id)->update([
                'nome' => $request->nome,
            ]);

            return redirect()->back()->with('classe.update.success',1);

         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('classe.update.error',1);
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
            $classe = Classe::findOrFail($id);
            Classe::findOrFail($id)->delete();
            return redirect()->back()->with('classe.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('classe.destroy.error',1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $classe = Classe::findOrFail($id);
            Classe::findOrFail($id)->forceDelete();
            return redirect()->back()->with('classe.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('classe.purge.error',1);
        }
    }
}
