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


Route::prefix('admin')->group(function(){


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


        Route::get('listarVinculoTurma/{id}', ['as' => 'admin.professor.listarVinculoTurma', 'uses' => 'App\Http\Controllers\DP\ProfessorController@listarVinculoTurma']);
        Route::get('createVinculoTurma{id}', ['as' => 'admin.professor.createVinculoTurma', 'uses' => 'App\Http\Controllers\DP\ProfessorController@createVinculoTurma']);
        Route::post('storeVinculoTurma', ['as' => 'admin.professor.storeVinculoTurma', 'uses' => 'App\Http\Controllers\DP\ProfessorController@storeVinculoTurma']);
        Route::get('editVinculoTurma/{id}', ['as' => 'admin.professor.editVinculoTurma', 'uses' => 'App\Http\Controllers\DP\ProfessorController@editVinculoTurma']);
        Route::post('updateVinculoTurma/{id}', ['as' => 'admin.professor.updateVinculoTurma', 'uses' => 'App\Http\Controllers\DP\ProfessorController@updateVinculoTurma']);
        Route::get('destroyVinculoTurma/{id}', ['as' => 'admin.professor.destroyVinculoTurma', 'uses' => 'App\Http\Controllers\DP\ProfessorController@destroyVinculoTurma']);
        Route::get('purgeVinculoTurma/{id}', ['as' => 'admin.professor.purgeVinculoTurma', 'uses' => 'App\Http\Controllers\DP\ProfessorController@purgeVinculoTurma']);
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

    Route::prefix('encarregado')->group(function () {
        Route::get('index', ['as' => 'admin.encarregado.index', 'uses' => 'App\Http\Controllers\Admin\EncarregadoController@index']);
        Route::get('create', ['as' => 'admin.encarregado.create', 'uses' => 'App\Http\Controllers\Admin\EncarregadoController@create']);
        Route::post('store', ['as' => 'admin.encarregado.store', 'uses' => 'App\Http\Controllers\Admin\EncarregadoController@store']);
        Route::get('edit/{id}', ['as' => 'admin.encarregado.edit', 'uses' => 'App\Http\Controllers\Admin\EncarregadoController@edit']);
        Route::post('update/{id}', ['as' => 'admin.encarregado.update', 'uses' => 'App\Http\Controllers\Admin\EncarregadoController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.encarregado.destroy', 'uses' => 'App\Http\Controllers\Admin\EncarregadoController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.encarregado.purge', 'uses' => 'App\Http\Controllers\Admin\EncarregadoController@purge']);
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
        Route::get('listar/{id}', ['as' => 'admin.propina.listar', 'uses' => 'App\Http\Controllers\DP\PropinaController@listarPropina']);
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
        Route::post('registarFrequencia/', ['as' => 'admin.frequencia.registarFrequencia', 'uses' => 'App\Http\Controllers\DP\FrequenciaController@registarFrequencia']);
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
