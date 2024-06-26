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
Route::get('/contact', function () {
    return view('site.contact');
})->name('contact')/*->middleware('auth')*/;
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
