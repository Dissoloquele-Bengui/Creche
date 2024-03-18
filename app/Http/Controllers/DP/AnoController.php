<?php

namespace App\Http\Controllers\DP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnoLectivo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class AnoController extends Controller
{
    //
    //


    //
    public function index()
    {
        $anos = AnoLectivo::all();
        return view('admin.ano.index',['anos'=>$anos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.ano.create.index');
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
            $ano = AnoLectivo::create([
                'data_inicio' => $request->data_inicio,
                'data_fim' => $request->data_fim,
            ]);
            //dd($ano);

            return redirect()->back()->with('Ano.create.success', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('Ano.create.error', 1);
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
        $anos = AnoLectivo::all();
        return view('admin.ano.edit.index',['anos'=>$anos]);
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
        $data["ano"] = AnoLectivo::find($id);

        return view('admin.ano.edit.index',$data);
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


            $ano = AnoLectivo::findOrFail($id)->update([
                'data_inicio' => $request->data_inicio,
                'data_fim' => $request->data_fim,
            ]);

            return redirect()->back()->with('Ano.update.success',1);

         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Ano.update.error',1);
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
            $ano = AnoLectivo::findOrFail($id);
            AnoLectivo::findOrFail($id)->delete();
            return redirect()->back()->with('Ano.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Ano.destroy.error',1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $ano = AnoLectivo::findOrFail($id);
            AnoLectivo::findOrFail($id)->forceDelete();
            return redirect()->back()->with('Ano.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Ano.purge.error',1);
        }
    }
}
