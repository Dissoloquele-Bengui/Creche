<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/






Route::get('/', function () {
    return view('site.index');
})->name('home')/*->middleware('auth')*/;

Route::get('/about', function () {
    return view('site.about');
})->name('sobre')/*->middleware('auth')*/;
Route::get('/services', function () {
    return view('site.service');
})->name('services')/*->middleware('auth')*/;
Route::get('/project', function () {
    return view('site.project');
})->name('project')/*->middleware('auth')*/;
Route::get('/contact', function () {
    return view('site.contact');
})->name('contact')/*->middleware('auth')*/;
Route::get('/service_detail', function () {
    return view('site.service_detail');
})->name('service_detail')/*->middleware('auth')*/;
Route::get('/project_detail', function () {
    return view('site.project_detail');
})->name('project_detail')/*->middleware('auth')*/;
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('admin/painel', function () {
    return view('admin.index');
})->name('admin.painel.index')->middleware('auth');


Route::prefix('loja/site')->group(function () {
    //Rota de listar
    Route::get('index', ['as' => 'loja.site.index', 'uses' => 'App\Http\Controllers\SITE\LojaController@index']);
   //Rota para ver detalhes do loja
    Route::get('loja/{id}', ['as' => 'loja.site.loja', 'uses' => 'App\Http\Controllers\SITE\LojaController@loja']);
    Route::get('livro', ['as' => 'loja.site.livro', 'uses' => 'App\Http\Controllers\SITE\LojaController@livro']);
    //Rota para ver todos os loja
    Route::get('lojas', ['as' => 'loja.site.lojas', 'uses' => 'App\Http\Controllers\SITE\LojaController@lojas']);
    Route::post('lojas', ['as' => 'loja.site.lojas', 'uses' => 'App\Http\Controllers\SITE\LojaController@searchLojas']);
    //Rota para ver detalhes do produtos
    Route::get('produtos/{id}', ['as' => 'loja.site.produtos', 'uses' => 'App\Http\Controllers\SITE\LojaController@produto']);
    //Rota para abrir a página de sobre
    Route::get('sobre', ['as' => 'loja.site.sobre', 'uses' => 'App\Http\Controllers\SITE\LojaController@sobre']);
    

});
Route::prefix('loja/site')->middleware('auth')->group(function () {
    //Rota que leva a página de compras
    Route::post('compra', ['as' => 'loja.site.compra', 'uses' => 'App\Http\Controllers\SITE\LojaController@compra']);
    //Rota que leva a página de compras
    Route::get('compra', ['as' => 'loja.site.compra', 'uses' => 'App\Http\Controllers\SITE\LojaController@compra']);
    //Rota para comentar
    Route::post('comentarios', ['as' => 'loja.site.comentarios', 'uses' => 'App\Http\Controllers\SITE\LojaController@comentarios']);
    //Rota para gerar facturas gerarFatura
    Route::post('checkout', ['as' => 'loja.site.checkout', 'uses' => 'App\Http\Controllers\SITE\LojaController@checkout']);
    Route::get('gerarFatura/{id}', ['as' => 'loja.site.gerarFatura', 'uses' => 'App\Http\Controllers\SITE\LojaController@gerarFatura']);
    //Rota para enviar a fatura
    Route::post('enviarFatura', ['as' => 'loja.site.enviarFatura', 'uses' => 'App\Http\Controllers\SITE\LojaController@enviarFatura']);
    //Rota para ver o tabuleiro
    Route::get('tabuleiro/{id}', ['as' => 'loja.site.tabuleiro', 'uses' => 'App\Http\Controllers\SITE\LojaController@tabuleiro']);
    //Rota para actualizar o tabuleiro
    Route::post('updateCarrinho/{id}', ['as' => 'loja.site.updateCarrinho', 'uses' => 'App\Http\Controllers\SITE\LojaController@updateTabuleiro']);

    //Rota para adicionar um produtos ao carrinho
    Route::get('addProdutoCart/{id}', ['as' => 'loja.site.addProdutoCart', 'uses' => 'App\Http\Controllers\SITE\LojaController@addProdutoCart']);
    //Rota para remover um produtos do carrinho
    Route::get('removeProdutoCart/{id}', ['as' => 'loja.site.removeProdutoCart', 'uses' => 'App\Http\Controllers\SITE\LojaController@removeProdutoCart']);
    //Rota para avaliar um produtos
    Route::get('avaliarProduto', ['as' => 'loja.site.avaliarProduto', 'uses' => 'App\Http\Controllers\SITE\LojaController@avaliarProduto']);

});

Route::get('/login2', function () {
    return view('auth.login2');
})->name('login2')/*->middleware('auth')*/;
Route::get('getEmail', ['as' => 'admin.aluno.getEmail', 'uses' => 'App\Http\Controllers\MDA\AlunoController@getEmail']);
Route::get('/procedimentos/matricula', function () {
    return view('site.contact');
})->name('matricula')/*->middleware('auth')*/;
Route::get('/procedimentos/inscricao', function () {
    return view('site.inscricao');
})->name('inscricao')/*->middleware('auth')*/;