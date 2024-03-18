<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Compra;
use App\Models\Gestor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendaController extends Controller
{
    public function index()
    {
        if(!isset(Auth::user()->nivel)){
            $data['lojas'] = Gestor::join('lojas', 'gestores.id_loja', 'lojas.id')
            ->select('lojas.*')
            ->where('id_usuario', Auth::user()->id)
            ->get();

        $data['vendas']=Compra::join('produtos','compras.id_produto','produtos.id')
            ->join('users','compras.id_usuario','users.id')
            ->join('cheques','compras.id_cheque','cheques.id')
            ->join('lojas','produtos.id_loja','lojas.id')
            ->join('faturas','compras.id_fatura','faturas.id')
            ->select('produtos.nome as produtos','produtos.id_loja','users.name as cliente','lojas.nome as loja', 'compras.*','faturas.id as fatura','cheques.codigo as cheque')
            ->get();


        }else{
            $data['lojas'] = Gestor::join('lojas', 'gestores.id_loja', 'lojas.id')
                ->select('lojas.*')
                ->where('id_usuario', Auth::user()->id)
                ->get();

            $data['vendas']=Compra::join('produtos','compras.id_produto','produtos.id')
                ->join('users','compras.id_usuario','users.id')
                ->join('cheques','compras.id_cheque','cheques.id')
                ->join('lojas','produtos.id_loja','lojas.id')
                ->join('faturas','compras.id_fatura','faturas.id')
                ->select('produtos.nome as produtos','produtos.id_loja','users.name as cliente','lojas.nome as loja', 'compras.*','faturas.id as fatura','cheques.codigo as cheque')
                ->whereIn('produtos.id_loja',$data['lojas']->pluck('id')->toArray())
                ->get();


        }
        return view('admin.vendas.index',$data);
    }
}
