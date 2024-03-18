<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DP;
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

// Exemplo de rota de logout


Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::prefix('admin')->group(function(){

    Route::post('/iniciar-sessao', 'App\Http\Controllers\Auth\LoginController@login')->name('sessao');


    Route::prefix('aluno')->group(function () {
        Route::get('index', ['as' => 'admin.aluno.index', 'uses' => 'App\Http\Controllers\DP\AlunoController@index']);
        Route::get('create', ['as' => 'admin.aluno.create', 'uses' => 'App\Http\Controllers\DP\AlunoController@create']);
        Route::post('store', ['as' => 'admin.aluno.store', 'uses' => 'App\Http\Controllers\DP\AlunoController@store']);
        Route::get('edit/{id}', ['as' => 'admin.aluno.edit', 'uses' => 'App\Http\Controllers\DP\AlunoController@edit']);
        Route::post('update/{id}', ['as' => 'admin.aluno.update', 'uses' => 'App\Http\Controllers\DP\AlunoController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.aluno.destroy', 'uses' => 'App\Http\Controllers\DP\AlunoController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.aluno.purge', 'uses' => 'App\Http\Controllers\DP\AlunoController@purge']);
    });
    Route::prefix('pagamento')->group(function () {
        Route::get('index', ['as' => 'admin.pagamento_fatura.index', 'uses' => 'App\Http\Controllers\Admin\PagamentoFaturaController@index']);
        Route::get('create', ['as' => 'admin.pagamento_fatura.create', 'uses' => 'App\Http\Controllers\Admin\PagamentoFaturaController@create']);
        Route::post('store', ['as' => 'admin.pagamento_fatura.store', 'uses' => 'App\Http\Controllers\Admin\PagamentoFaturaController@store']);
        Route::get('edit/{id}', ['as' => 'admin.pagamento_fatura.edit', 'uses' => 'App\Http\Controllers\Admin\PagamentoFaturaController@edit']);
        Route::post('update/{id}', ['as' => 'admin.pagamento_fatura.update', 'uses' => 'App\Http\Controllers\Admin\PagamentoFaturaController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.pagamento_fatura.destroy', 'uses' => 'App\Http\Controllers\Admin\PagamentoFaturaController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.pagamento_fatura.purge', 'uses' => 'App\Http\Controllers\Admin\PagamentoFaturaController@purge']);
    });
    Route::prefix('logs')->group(function () {
        Route::get('index', ['as' => 'admin.logs.index', 'uses' => 'App\Http\Controllers\DP\LogController@index']);
    });
    Route::prefix('professor')->group(function () {
        Route::get('index', ['as' => 'admin.professor.index', 'uses' => 'App\Http\Controllers\DP\ProfessorController@index']);
        Route::get('create', ['as' => 'admin.professor.create', 'uses' => 'App\Http\Controllers\DP\ProfessorController@create']);
        Route::post('store', ['as' => 'admin.professor.store', 'uses' => 'App\Http\Controllers\DP\ProfessorController@store']);
        Route::get('edit/{id}', ['as' => 'admin.professor.edit', 'uses' => 'App\Http\Controllers\DP\ProfessorController@edit']);
        Route::post('update/{id}', ['as' => 'admin.professor.update', 'uses' => 'App\Http\Controllers\DP\ProfessorController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.professor.destroy', 'uses' => 'App\Http\Controllers\DP\ProfessorController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.professor.purge', 'uses' => 'App\Http\Controllers\DP\ProfessorController@purge']);

        Route::get('listarVinculoDisciplina/{id}', ['as' => 'admin.professor.listarVinculoDisciplina', 'uses' => 'App\Http\Controllers\DP\ProfessorController@listarVinculoDisciplina']);
        Route::get('createVinculoDisciplina/{id}', ['as' => 'admin.professor.createVinculoDisciplina', 'uses' => 'App\Http\Controllers\DP\ProfessorController@createVinculoDisciplina']);
        Route::post('storeVinculoDisciplina', ['as' => 'admin.professor.storeVinculoDisciplina', 'uses' => 'App\Http\Controllers\DP\ProfessorController@storeVinculoDisciplina']);
        Route::get('editVInculoDisciplina/{id}', ['as' => 'admin.professor.editVinculoDisciplina', 'uses' => 'App\Http\Controllers\DP\ProfessorController@editVInculoDisciplina']);
        Route::post('updateVinculoDisciplina/{id}', ['as' => 'admin.professor.updateVinculoDisciplina', 'uses' => 'App\Http\Controllers\DP\ProfessorController@updateVinculoDisciplina']);
        Route::get('destroyVinculoDisciplina/{id}', ['as' => 'admin.professor.destroyVinculoDisciplina', 'uses' => 'App\Http\Controllers\DP\ProfessorController@destroyVinculoDisciplina']);
        Route::get('purgeVinculoDisciplina/{id}', ['as' => 'admin.professor.purgeVinculoDisciplina', 'uses' => 'App\Http\Controllers\DP\ProfessorController@purgeVinculoDisciplina']);

        Route::get('listarVinculoTurma/{id}', ['as' => 'admin.professor.listarVinculoTurma', 'uses' => 'App\Http\Controllers\DP\ProfessorController@listarVinculoTurma']);
        Route::get('createVinculoTurma{id}', ['as' => 'admin.professor.createVinculoTurma', 'uses' => 'App\Http\Controllers\DP\ProfessorController@createVinculoTurma']);
        Route::post('storeVinculoTurma', ['as' => 'admin.professor.storeVinculoTurma', 'uses' => 'App\Http\Controllers\DP\ProfessorController@storeVinculoTurma']);
        Route::get('editVinculoTurma/{id}', ['as' => 'admin.professor.editVinculoTurma', 'uses' => 'App\Http\Controllers\DP\ProfessorController@editVinculoTurma']);
        Route::post('updateVinculoTurma/{id}', ['as' => 'admin.professor.updateVinculoTurma', 'uses' => 'App\Http\Controllers\DP\ProfessorController@updateVinculoTurma']);
        Route::get('destroyVinculoTurma/{id}', ['as' => 'admin.professor.destroyVinculoTurma', 'uses' => 'App\Http\Controllers\DP\ProfessorController@destroyVinculoTurma']);
        Route::get('purgeVinculoTurma/{id}', ['as' => 'admin.professor.purgeVinculoTurma', 'uses' => 'App\Http\Controllers\DP\ProfessorController@purgeVinculoTurma']);

        Route::get('listarVinculoCurso/{id}', ['as' => 'admin.professor.listarVinculoCurso', 'uses' => 'App\Http\Controllers\DP\ProfessorController@listarVinculoCurso']);
        Route::get('createVinculoCurso/{id}', ['as' => 'admin.professor.createVinculoCurso', 'uses' => 'App\Http\Controllers\DP\ProfessorController@createVinculoCurso']);
        Route::post('storeVinculoCurso', ['as' => 'admin.professor.storeVinculoCurso', 'uses' => 'App\Http\Controllers\DP\ProfessorController@storeVinculoCurso']);

        Route::get('editVInculoCurso/{id}', ['as' => 'admin.professor.editVinculoCurso', 'uses' => 'App\Http\Controllers\DP\ProfessorController@editVInculoCurso']);

        Route::post('updateVinculoCurso/{id}', ['as' => 'admin.professor.updateVinculoCurso', 'uses' => 'App\Http\Controllers\DP\ProfessorController@updateVinculoCurso']);
        Route::get('destroyVinculoCurso/{id}', ['as' => 'admin.professor.destroyVinculoCurso', 'uses' => 'App\Http\Controllers\DP\ProfessorController@destroyVinculoCurso']);
        Route::get('purgeVinculoCurso/{id}', ['as' => 'admin.professor.purgeVinculoCurso', 'uses' => 'App\Http\Controllers\DP\ProfessorController@purgeVinculoCurso']);


    });

    Route::prefix('curso')->group(function () {
        Route::get('index', ['as' => 'admin.curso.index', 'uses' => 'App\Http\Controllers\DP\CursoController@index']);
        Route::get('create', ['as' => 'admin.curso.create', 'uses' => 'App\Http\Controllers\DP\CursoController@create']);
        Route::post('store', ['as' => 'admin.curso.store', 'uses' => 'App\Http\Controllers\DP\CursoController@store']);
        Route::get('edit/{id}', ['as' => 'admin.curso.edit', 'uses' => 'App\Http\Controllers\DP\CursoController@edit']);
        Route::post('update/{id}', ['as' => 'admin.curso.update', 'uses' => 'App\Http\Controllers\DP\CursoController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.curso.destroy', 'uses' => 'App\Http\Controllers\DP\CursoController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.curso.purge', 'uses' => 'App\Http\Controllers\DP\CursoController@purge']);
        Route::get('createVinculoDisciplina/{id}', ['as' => 'admin.curso.createVinculoDisciplina', 'uses' => 'App\Http\Controllers\DP\CursoClasseDisciplinaController@create']);
        Route::get('listaVinculoDisciplina/{id}', ['as' => 'admin.curso.listaVinculoDisciplina', 'uses' => 'App\Http\Controllers\DP\CursoClasseDisciplinaController@lista']);

        Route::post('storeVinculoDisciplina', ['as' => 'admin.curso.storeVinculoDisciplina', 'uses' => 'App\Http\Controllers\DP\CursoClasseDisciplinaController@store']);
        Route::get('editVinculoDisciplina/{id}', ['as' => 'admin.curso.editVinculoDisciplina', 'uses' => 'App\Http\Controllers\DP\CursoClasseDisciplinaController@edit']);
        Route::post('updateVinculoDisciplina/{id}', ['as' => 'admin.curso.updateVinculoDisciplina', 'uses' => 'App\Http\Controllers\DP\CursoClasseDisciplinaController@update']);
        Route::get('destroyVinculoDisciplina/{id}', ['as' => 'admin.curso.destroyVinculoDisciplina', 'uses' => 'App\Http\Controllers\DP\CursoClasseDisciplinaController@destroy']);
        Route::get('purgeVinculoDisciplina/{id}', ['as' => 'admin.curso.purgeVinculoDisciplina', 'uses' => 'App\Http\Controllers\DP\CursoClasseDisciplinaController@purge']);

    });
    Route::prefix('categoria_notificacao')->group(function () {
        Route::get('index', ['as' => 'admin.categoria_notificacao.index', 'uses' => 'App\Http\Controllers\DP\CategoriaNotificacaoController@index']);
        Route::get('create', ['as' => 'admin.categoria_notificacao.create', 'uses' => 'App\Http\Controllers\DP\CategoriaNotificacaoController@create']);
        Route::post('store', ['as' => 'admin.categoria_notificacao.store', 'uses' => 'App\Http\Controllers\DP\CategoriaNotificacaoController@store']);
        Route::get('show/{id}', ['as' => 'admin.categoria_notificacao.show', 'uses' => 'App\Http\Controllers\DP\CategoriaNotificacaoController@show']);
        Route::get('edit/{id}', ['as' => 'admin.categoria_notificacao.edit', 'uses' => 'App\Http\Controllers\DP\CategoriaNotificacaoController@edit']);
        Route::post('update/{id}', ['as' => 'admin.categoria_notificacao.update', 'uses' => 'App\Http\Controllers\DP\CategoriaNotificacaoController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.categoria_notificacao.destroy', 'uses' => 'App\Http\Controllers\DP\CategoriaNotificacaoController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.categoria_notificacao.purge', 'uses' => 'App\Http\Controllers\DP\CategoriaNotificacaoController@purge']);

    });

    Route::prefix('Notificacao')->group(function () {
        Route::get('index', ['as' => 'admin.Notificacao.index', 'uses' => 'App\Http\Controllers\DP\NotificacaoController@index']);
        Route::get('create', ['as' => 'admin.Notificacao.create', 'uses' => 'App\Http\Controllers\DP\NotificacaoController@create']);
        Route::post('store', ['as' => 'admin.Notificacao.store', 'uses' => 'App\Http\Controllers\DP\NotificacaoController@store']);
        Route::get('show/{id}', ['as' => 'admin.Notificacao.show', 'uses' => 'App\Http\Controllers\DP\NotificacaoController@show']);
        Route::get('edit/{id}', ['as' => 'admin.Notificacao.edit', 'uses' => 'App\Http\Controllers\DP\NotificacaoController@edit']);
        Route::post('update/{id}', ['as' => 'admin.Notificacao.update', 'uses' => 'App\Http\Controllers\DP\NotificacaoController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.Notificacao.destroy', 'uses' => 'App\Http\Controllers\DP\NotificacaoController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.Notificacao.purge', 'uses' => 'App\Http\Controllers\DP\NotificacaoController@purge']);
        Route::get('vizualize', ['as' => 'admin.notificacao.vizualize', 'uses' => 'App\Http\Controllers\DP\NotificacaoController@vizualize']);
        Route::get('getApartamento', ['as' => 'admin.notificacao.getApartamento', 'uses' => 'App\Http\Controllers\DP\NotificacaoController@getApartamento']);

    });


    Route::prefix('classe')->group(function () {
        Route::get('index', ['as' => 'admin.classe.index', 'uses' => 'App\Http\Controllers\DP\ClasseController@index']);
        Route::get('create', ['as' => 'admin.classe.create', 'uses' => 'App\Http\Controllers\DP\ClasseController@create']);
        Route::post('store', ['as' => 'admin.classe.store', 'uses' => 'App\Http\Controllers\DP\ClasseController@store']);
        Route::get('edit/{id}', ['as' => 'admin.classe.edit', 'uses' => 'App\Http\Controllers\DP\ClasseController@edit']);
        Route::post('update/{id}', ['as' => 'admin.classe.update', 'uses' => 'App\Http\Controllers\DP\ClasseController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.classe.destroy', 'uses' => 'App\Http\Controllers\DP\ClasseController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.classe.purge', 'uses' => 'App\Http\Controllers\DP\ClasseController@purge']);
    });
    Route::prefix('user')->group(function () {
        Route::get('index', ['as' => 'admin.user.index', 'uses' => 'App\Http\Controllers\Admin\UserController@index']);
        Route::get('create', ['as' => 'admin.user.create', 'uses' => 'App\Http\Controllers\Admin\UserController@create']);
        Route::post('store', ['as' => 'admin.user.store', 'uses' => 'App\Http\Controllers\Admin\UserController@store']);
        Route::get('edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'App\Http\Controllers\Admin\UserController@edit']);
        Route::post('update/{id}', ['as' => 'admin.user.update', 'uses' => 'App\Http\Controllers\Admin\UserController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.user.destroy', 'uses' => 'App\Http\Controllers\Admin\UserController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.user.purge', 'uses' => 'App\Http\Controllers\Admin\UserController@purge']);
    });
    Route::prefix('disciplina')->group(function () {
        Route::get('index', ['as' => 'admin.disciplina.index', 'uses' => 'App\Http\Controllers\DP\DisciplinaController@index']);
        Route::get('create', ['as' => 'admin.disciplina.create', 'uses' => 'App\Http\Controllers\DP\DisciplinaController@create']);
        Route::post('store', ['as' => 'admin.disciplina.store', 'uses' => 'App\Http\Controllers\DP\DisciplinaController@store']);
        Route::get('edit/{id}', ['as' => 'admin.disciplina.edit', 'uses' => 'App\Http\Controllers\DP\DisciplinaController@edit']);
        Route::post('update/{id}', ['as' => 'admin.disciplina.update', 'uses' => 'App\Http\Controllers\DP\DisciplinaController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.disciplina.destroy', 'uses' => 'App\Http\Controllers\DP\DisciplinaController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.disciplina.purge', 'uses' => 'App\Http\Controllers\DP\DisciplinaController@purge']);
    });
    Route::prefix('plano_aula')->group(function () {
        Route::get('index', ['as' => 'admin.plano_aula.index', 'uses' => 'App\Http\Controllers\DP\PlanoAulaController@index']);
        Route::get('create', ['as' => 'admin.plano_aula.create', 'uses' => 'App\Http\Controllers\DP\PlanoAulaController@create']);
        Route::post('store', ['as' => 'admin.plano_aula.store', 'uses' => 'App\Http\Controllers\DP\PlanoAulaController@store']);
        Route::get('edit/{id}', ['as' => 'admin.plano_aula.edit', 'uses' => 'App\Http\Controllers\DP\PlanoAulaController@edit']);
        Route::post('update/{id}', ['as' => 'admin.plano_aula.update', 'uses' => 'App\Http\Controllers\DP\PlanoAulaController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.plano_aula.destroy', 'uses' => 'App\Http\Controllers\DP\PlanoAulaController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.plano_aula.purge', 'uses' => 'App\Http\Controllers\DP\PlanoAulaController@purge']);
    });
    Route::prefix('projeto')->group(function () {
        Route::get('index', ['as' => 'admin.projeto.index', 'uses' => 'App\Http\Controllers\DP\ProjetoController@index']);
        Route::get('create', ['as' => 'admin.projeto.create', 'uses' => 'App\Http\Controllers\DP\ProjetoController@create']);
        Route::post('store', ['as' => 'admin.projeto.store', 'uses' => 'App\Http\Controllers\DP\ProjetoController@store']);
        Route::get('edit/{id}', ['as' => 'admin.projeto.edit', 'uses' => 'App\Http\Controllers\DP\ProjetoController@edit']);
        Route::post('update/{id}', ['as' => 'admin.projeto.update', 'uses' => 'App\Http\Controllers\DP\ProjetoController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.projeto.destroy', 'uses' => 'App\Http\Controllers\DP\ProjetoController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.projeto.purge', 'uses' => 'App\Http\Controllers\DP\ProjetoController@purge']);
    });
    Route::prefix('servico')->group(function () {
        Route::get('index', ['as' => 'admin.servico.index', 'uses' => 'App\Http\Controllers\DP\ServicoController@index']);
        Route::get('create', ['as' => 'admin.servico.create', 'uses' => 'App\Http\Controllers\DP\ServicoController@create']);
        Route::post('store', ['as' => 'admin.servico.store', 'uses' => 'App\Http\Controllers\DP\ServicoController@store']);
        Route::get('edit/{id}', ['as' => 'admin.servico.edit', 'uses' => 'App\Http\Controllers\DP\ServicoController@edit']);
        Route::post('update/{id}', ['as' => 'admin.servico.update', 'uses' => 'App\Http\Controllers\DP\ServicoController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.servico.destroy', 'uses' => 'App\Http\Controllers\DP\ServicoController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.servico.purge', 'uses' => 'App\Http\Controllers\DP\ServicoController@purge']);
    });
    Route::prefix('rupe')->group(function () {
        Route::get('index', ['as' => 'admin.rupe.index', 'uses' => 'App\Http\Controllers\DP\RupeController@index']);
        Route::get('create', ['as' => 'admin.rupe.create', 'uses' => 'App\Http\Controllers\DP\RupeController@create']);
        Route::post('store', ['as' => 'admin.rupe.store', 'uses' => 'App\Http\Controllers\DP\RupeController@store']);
        Route::get('edit/{id}', ['as' => 'admin.rupe.edit', 'uses' => 'App\Http\Controllers\DP\RupeController@edit']);
        Route::post('update/{id}', ['as' => 'admin.rupe.update', 'uses' => 'App\Http\Controllers\DP\RupeController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.rupe.destroy', 'uses' => 'App\Http\Controllers\DP\RupeController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.rupe.purge', 'uses' => 'App\Http\Controllers\DP\RupeController@purge']);
    });
    Route::prefix('ano')->group(function () {
        Route::get('index', ['as' => 'admin.ano.index', 'uses' => 'App\Http\Controllers\DP\AnoController@index']);
        Route::get('create', ['as' => 'admin.ano.create', 'uses' => 'App\Http\Controllers\DP\AnoController@create']);
        Route::post('store', ['as' => 'admin.ano.store', 'uses' => 'App\Http\Controllers\DP\AnoController@store']);
        Route::get('edit/{id}', ['as' => 'admin.ano.edit', 'uses' => 'App\Http\Controllers\DP\AnoController@edit']);
        Route::post('update/{id}', ['as' => 'admin.ano.update', 'uses' => 'App\Http\Controllers\DP\AnoController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.ano.destroy', 'uses' => 'App\Http\Controllers\DP\AnoController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.ano.purge', 'uses' => 'App\Http\Controllers\DP\AnoController@purge']);
    });
    Route::prefix('turma')->group(function () {
        Route::get('index', ['as' => 'admin.turma.index', 'uses' => 'App\Http\Controllers\DP\TurmaController@index']);
        Route::get('create', ['as' => 'admin.turma.create', 'uses' => 'App\Http\Controllers\DP\TurmaController@create']);
        Route::post('store', ['as' => 'admin.turma.store', 'uses' => 'App\Http\Controllers\DP\TurmaController@store']);
        Route::get('edit/{id}', ['as' => 'admin.turma.edit', 'uses' => 'App\Http\Controllers\DP\TurmaController@edit']);
        Route::post('update/{id}', ['as' => 'admin.turma.update', 'uses' => 'App\Http\Controllers\DP\TurmaController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.turma.destroy', 'uses' => 'App\Http\Controllers\DP\TurmaController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.turma.purge', 'uses' => 'App\Http\Controllers\DP\TurmaController@purge']);
    });
    Route::prefix('horario')->group(function () {
        Route::get('index', ['as' => 'admin.horario.index', 'uses' => 'App\Http\Controllers\DP\HorarioController@index']);
        Route::get('create', ['as' => 'admin.horario.create', 'uses' => 'App\Http\Controllers\DP\HorarioController@create']);
        Route::post('store', ['as' => 'admin.horario.store', 'uses' => 'App\Http\Controllers\DP\HorarioController@store']);
        Route::get('edit/{id}', ['as' => 'admin.horario.edit', 'uses' => 'App\Http\Controllers\DP\HorarioController@edit']);
        Route::post('update/{id}', ['as' => 'admin.horario.update', 'uses' => 'App\Http\Controllers\DP\HorarioController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.horario.destroy', 'uses' => 'App\Http\Controllers\DP\HorarioController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.horario.purge', 'uses' => 'App\Http\Controllers\DP\HorarioController@purge']);
    });
    Route::prefix('categoria_livro')->group(function () {
        Route::get('index', ['as' => 'admin.categoria_livro.index', 'uses' => 'App\Http\Controllers\DP\CategoriaLivroController@index']);
        Route::get('create', ['as' => 'admin.categoria_livro.create', 'uses' => 'App\Http\Controllers\DP\CategoriaLivroController@create']);
        Route::post('store', ['as' => 'admin.categoria_livro.store', 'uses' => 'App\Http\Controllers\DP\CategoriaLivroController@store']);
        Route::get('edit/{id}', ['as' => 'admin.categoria_livro.edit', 'uses' => 'App\Http\Controllers\DP\CategoriaLivroController@edit']);
        Route::post('update/{id}', ['as' => 'admin.categoria_livro.update', 'uses' => 'App\Http\Controllers\DP\CategoriaLivroController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.categoria_livro.destroy', 'uses' => 'App\Http\Controllers\DP\CategoriaLivroController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.categoria_livro.purge', 'uses' => 'App\Http\Controllers\DP\CategoriaLivroController@purge']);
    });
    Route::prefix('livro')->group(function () {
        Route::get('index', ['as' => 'admin.livro.index', 'uses' => 'App\Http\Controllers\DP\LivroController@index']);
        Route::get('create', ['as' => 'admin.livro.create', 'uses' => 'App\Http\Controllers\DP\LivroController@create']);
        Route::post('store', ['as' => 'admin.livro.store', 'uses' => 'App\Http\Controllers\DP\LivroController@store']);
        Route::get('edit/{id}', ['as' => 'admin.livro.edit', 'uses' => 'App\Http\Controllers\DP\LivroController@edit']);
        Route::post('update/{id}', ['as' => 'admin.livro.update', 'uses' => 'App\Http\Controllers\DP\LivroController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.livro.destroy', 'uses' => 'App\Http\Controllers\DP\LivroController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.livro.purge', 'uses' => 'App\Http\Controllers\DP\LivroController@purge']);
    });
    Route::prefix('matricula')->group(function () {
        Route::get('index', ['as' => 'admin.matricula.index', 'uses' => 'App\Http\Controllers\DP\MatriculaController@index']);
        Route::get('create', ['as' => 'admin.matricula.create', 'uses' => 'App\Http\Controllers\DP\MatriculaController@create']);
        Route::post('store', ['as' => 'admin.matricula.store', 'uses' => 'App\Http\Controllers\DP\MatriculaController@store']);
        Route::get('edit/{id}', ['as' => 'admin.matricula.edit', 'uses' => 'App\Http\Controllers\DP\MatriculaController@edit']);
        Route::post('update/{id}', ['as' => 'admin.matricula.update', 'uses' => 'App\Http\Controllers\DP\MatriculaController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.matricula.destroy', 'uses' => 'App\Http\Controllers\DP\MatriculaController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.matricula.purge', 'uses' => 'App\Http\Controllers\DP\MatriculaController@purge']);
    });
    Route::prefix('solicitacaoServico')->group(function () {
        Route::get('index', ['as' => 'admin.solicitacaoServico.index', 'uses' => 'App\Http\Controllers\DP\SolicitacaoController@index']);
        Route::post('update/{id}', ['as' => 'admin.solicitacaoServico.update', 'uses' => 'App\Http\Controllers\DP\SolicitacaoController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.solicitacaoServico.destroy', 'uses' => 'App\Http\Controllers\DP\SolicitacaoController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.solicitacaoServico.purge', 'uses' => 'App\Http\Controllers\DP\SolicitacaoController@purge']);
    });
    Route::prefix('propina')->group(function () {
        Route::get('index', ['as' => 'admin.propina.index', 'uses' => 'App\Http\Controllers\DP\PropinaController@index']);
        Route::get('create', ['as' => 'admin.propina.create', 'uses' => 'App\Http\Controllers\DP\PropinaController@create']);
        Route::post('store', ['as' => 'admin.propina.store', 'uses' => 'App\Http\Controllers\DP\PropinaController@store']);
        Route::post('pagarPropina', ['as' => 'admin.propina.pagarPropina', 'uses' => 'App\Http\Controllers\DP\PropinaController@pagarPropina']);
        Route::get('pagar/{id}', ['as' => 'admin.propina.pagar', 'uses' => 'App\Http\Controllers\DP\PropinaController@pagar']);
        Route::get('edit/{id}', ['as' => 'admin.propina.edit', 'uses' => 'App\Http\Controllers\DP\PropinaController@edit']);
        Route::post('update/{id}', ['as' => 'admin.propina.update', 'uses' => 'App\Http\Controllers\DP\PropinaController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.propina.destroy', 'uses' => 'App\Http\Controllers\DP\PropinaController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.propina.purge', 'uses' => 'App\Http\Controllers\DP\PropinaController@purge']);
    });
    Route::prefix('avaliacao')->group(function () {
        Route::get('prova', ['as' => 'admin.avaliacao.prova', 'uses' => 'App\Http\Controllers\DP\AvaliacaoController@prova']);
        Route::post('lancarProva', ['as' => 'admin.avaliacao.lancarProva', 'uses' => 'App\Http\Controllers\DP\AvaliacaoController@lancarProva']);
        Route::get('lancarProva', ['as' => 'admin.avaliacao.lancarProva', 'uses' => 'App\Http\Controllers\DP\AvaliacaoController@lancarProva']);
        Route::get('getDisciplinaByTurma', ['as' => 'admin.avaliacao.getDisciplinaByTurma', 'uses' => 'App\Http\Controllers\DP\AvaliacaoController@getDisciplinaByTurma']);
        Route::post('lancarAvaliacao', ['as' => 'admin.avaliacao.lancarAvaliacao', 'uses' => 'App\Http\Controllers\DP\AvaliacaoController@lancarAvaliacao']);
        Route::post('registarAvaliacao', ['as' => 'admin.avaliacao.registarAvaliacao', 'uses' => 'App\Http\Controllers\DP\AvaliacaoController@registarAvaliacao']);
        Route::get('avaliar', ['as' => 'admin.avaliacao.avaliar', 'uses' => 'App\Http\Controllers\DP\AvaliacaoController@avaliar']);
        Route::post('registarProva/{disciplina_id}', ['as' => 'admin.avaliacao.registarProva', 'uses' => 'App\Http\Controllers\DP\AvaliacaoController@registarProva']);
        Route::post('consultarNotaProva', ['as' => 'admin.avaliacao.consultarNotaProva', 'uses' => 'App\Http\Controllers\DP\AvaliacaoController@consultarNotaProva']);
        Route::post('consultarNotaAvaliacao', ['as' => 'admin.avaliacao.consultarNotaAvaliacao', 'uses' => 'App\Http\Controllers\DP\AvaliacaoController@consultarNotaAvaliacao']);

        Route::get('consultarNotaTurma', ['as' => 'admin.avaliacao.verNotaTurma', 'uses' => 'App\Http\Controllers\DP\AvaliacaoController@verNotaTurma']);
        Route::post('consultarNotaTurma', ['as' => 'admin.avaliacao.consultarNotaTurma', 'uses' => 'App\Http\Controllers\DP\AvaliacaoController@consultarNotaTurma']);

        Route::get('verProva', ['as' => 'admin.avaliacao.verProva', 'uses' => 'App\Http\Controllers\DP\AvaliacaoController@verProva']);
        Route::get('verAvaliacao', ['as' => 'admin.avaliacao.verAvaliacao', 'uses' => 'App\Http\Controllers\DP\AvaliacaoController@verAvaliacao']);
    });
    Route::prefix('frequencia')->group(function () {
        Route::get('presenca', ['as' => 'admin.frequencia.presenca', 'uses' => 'App\Http\Controllers\DP\FrequenciaController@registar']);
        Route::get('index', ['as' => 'admin.frequencia.index', 'uses' => 'App\Http\Controllers\DP\FrequenciaController@index']);
        Route::post('lancarFrequencia', ['as' => 'admin.frequencia.lancarFrequencia', 'uses' => 'App\Http\Controllers\DP\FrequenciaController@lancarFrequencia']);
        Route::post('verFrequencia', ['as' => 'admin.frequencia.verFrequencia', 'uses' => 'App\Http\Controllers\DP\FrequenciaController@verFrequencia']);
        Route::post('registarFrequencia/{disciplina_id}/{data_atual}', ['as' => 'admin.frequencia.registarFrequencia', 'uses' => 'App\Http\Controllers\DP\FrequenciaController@registarFrequencia']);
    });
    Route::prefix('falta')->group(function () {
        Route::get('justificar', ['as' => 'admin.falta.justificar', 'uses' => 'App\Http\Controllers\DP\FaltaController@justificar']);
        Route::post('verTurmaFalta', ['as' => 'admin.falta.verTurmaFalta', 'uses' => 'App\Http\Controllers\DP\FaltaController@verTurmaFalta']);
        Route::post('verAlunoFalta', ['as' => 'admin.falta.verAlunoFalta', 'uses' => 'App\Http\Controllers\DP\FaltaController@verAlunoFalta']);
        Route::post('justificarFalta', ['as' => 'admin.falta.justificarFalta', 'uses' => 'App\Http\Controllers\DP\FaltaController@justificarFalta']);
        Route::post('registarJustificativa', ['as' => 'admin.falta.registarJustificativa', 'uses' => 'App\Http\Controllers\DP\FaltaController@registarJustificativa']);
    });
    
});
Route::prefix('aluno')->middleware('auth')->group(function()
{
    Route::get('boletim', ['as' => 'admin.aluno.boletim', 'uses' => 'App\Http\Controllers\MDA\AlunoController@boletim']);
    Route::get('nota', ['as' => 'admin.aluno.nota', 'uses' => 'App\Http\Controllers\MDA\AlunoController@nota']);
    Route::get('crescimento', ['as' => 'admin.aluno.crescimento', 'uses' => 'App\Http\Controllers\MDA\AlunoController@crescimento']);
    Route::get('horario', ['as' => 'admin.aluno.horario', 'uses' => 'App\Http\Controllers\MDA\AlunoController@horario']);
    Route::get('plano_aula', ['as' => 'admin.aluno.plano_aula', 'uses' => 'App\Http\Controllers\MDA\AlunoController@plano_aula']);
    
    Route::get('cartao', ['as' => 'admin.aluno.cartao', 'uses' => 'App\Http\Controllers\MDA\AlunoController@cartao']);
    Route::get('emitirRupeCartao', ['as' => 'admin.aluno.emitirRupeCartao', 'uses' => 'App\Http\Controllers\MDA\AlunoController@emitirRupeCartao']);
    Route::post('solicitaCartao', ['as' => 'admin.aluno.solicitaCartao', 'uses' => 'App\Http\Controllers\MDA\AlunoController@solicitaCartao']);

    Route::get('certificado', ['as' => 'admin.aluno.certificado', 'uses' => 'App\Http\Controllers\MDA\AlunoController@certificado']);
    Route::get('emitirRupeCertificado', ['as' => 'admin.aluno.emitirRupeCertificado', 'uses' => 'App\Http\Controllers\MDA\AlunoController@emitirRupeCertificado']);
    Route::post('solicitaCertificado', ['as' => 'admin.aluno.solicitaCertificado', 'uses' => 'App\Http\Controllers\MDA\AlunoController@solicitaCertificado']);

    Route::get('declaracao', ['as' => 'admin.aluno.declaracao', 'uses' => 'App\Http\Controllers\MDA\AlunoController@declaracao']);
    Route::get('emitirRupeDeclaracaoNota', ['as' => 'admin.aluno.emitirRupeDeclaracaoNota', 'uses' => 'App\Http\Controllers\MDA\AlunoController@emitirRupeDeclaracaoNota']);
    Route::get('emitirRupeDeclaracao', ['as' => 'admin.aluno.emitirRupeDeclaracao', 'uses' => 'App\Http\Controllers\MDA\AlunoController@emitirRupeDeclaracao']);
    Route::post('solicitaDeclaracao', ['as' => 'admin.aluno.solicitaDeclaracao', 'uses' => 'App\Http\Controllers\MDA\AlunoController@solicitaDeclaracao']);

});
Route::prefix('loja')->group(function () {
    //Rota de listar
    Route::get('index', ['as' => 'admin.loja.index', 'uses' => 'App\Http\Controllers\Admin\LojaController@index']);
    //Rota para armazenar
    Route::post('store', ['as' => 'admin.loja.store', 'uses' => 'App\Http\Controllers\Admin\LojaController@store']);
    //Rota para actualizar
    Route::post('update/{id}', ['as' => 'admin.loja.update', 'uses' => 'App\Http\Controllers\Admin\LojaController@update']);
    //Rota para marcar como eliminado
    Route::get('destroy/{id}', ['as' => 'admin.loja.destroy', 'uses' => 'App\Http\Controllers\Admin\LojaController@destroy']);
    //Rota de eliminar/purgar
    Route::get('purge/{id}', ['as' => 'admin.loja.purge', 'uses' => 'App\Http\Controllers\Admin\LojaController@purge']);
});
Route::prefix('produto')->group(function () {
    //Rota de listar

    Route::get('index', ['as' => 'admin.produto.index', 'uses' => 'App\Http\Controllers\Admin\ProdutoController@index']);
    //Rota de cadastrar
    Route::post('store', ['as' => 'admin.produto.store', 'uses' => 'App\Http\Controllers\Admin\ProdutoController@store']);
    //Rota de actualizar
    Route::post('update/{id}', ['as' => 'admin.produto.update', 'uses' => 'App\Http\Controllers\Admin\ProdutoController@update']);
    //Rota de marcar como eliminado
    Route::get('destroy/{id}', ['as' => 'admin.produto.destroy', 'uses' => 'App\Http\Controllers\Admin\ProdutoController@destroy']);
    //Rota de eliminar
    Route::get('purge/{id}', ['as' => 'admin.produto.purge', 'uses' => 'App\Http\Controllers\Admin\ProdutoController@purge']);
});
Route::prefix('venda')->group(function () {
//Rota para listar as actividades

    Route::get('index', ['as' => 'admin.vendas.index', 'uses' => 'App\Http\Controllers\Admin\VendaController@index']);
});
Route::prefix('cheque')->group(function () {
    //Rota de listar
    Route::get('index', ['as' => 'admin.cheque.index', 'uses' => 'App\Http\Controllers\Admin\ChequeController@index']);
    //Rota de cadastrar
    Route::post('store', ['as' => 'admin.cheque.store', 'uses' => 'App\Http\Controllers\Admin\ChequeController@store']);
        //Rota de actualizar


    Route::post('update/{id}', ['as' => 'admin.cheque.update', 'uses' => 'App\Http\Controllers\Admin\ChequeController@update']);
//Rota de marcar como eliminado

    Route::get('destroy/{id}', ['as' => 'admin.cheque.destroy', 'uses' => 'App\Http\Controllers\Admin\ChequeController@destroy']);
//Rota de eliminar

    Route::get('purge/{id}', ['as' => 'admin.cheque.purge', 'uses' => 'App\Http\Controllers\Admin\ChequeController@purge']);
});
