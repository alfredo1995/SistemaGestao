<?php
use Illuminate\Support\Facades\Route;

/*|Registrar as rotas que vao trabalha no estilo cliente web processando do lado backend e servindo em respostas as requisições.
terminal: php artisan serve (http://localhost:8000) */

Route::get('/', function () {return view('site.principal');});
Route::get('/contato', function () {return ('Contatos');});
Route::get('/sobre', function () {return ('Sobre');});  

/*adiciona caminho das rotas para definir as que o controller  vai se responsabilizar por delegar ações */

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::get('/sobre', [\App\Http\Controllers\SobreController::class, 'sobre'])->name('site.sobre');

//agrupar rotas privadas

Route::prefix('/app')->group(function (){
    Route::get('/login', function () { return 'login';})->name('app.login');
    Route::get('/clientes', function () { return 'clientes vips';})->name('app.clientes');
//  Route::get('/fornecedores', function () { return 'fornecedores vips';})->name('app.fornecedores'); // não funcionava o code abaixo kkkk 
    Route::get('fornecedores', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedor.index');
    Route::get('/produtos', function () { return 'produtos';})->name('app.produtos');
});

//redirecionando as rotas

Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('teste.rota2'); /*SOMANDO*/
Route::get('/rota2', function(){ return redirect()->route('site.rota1');})->name('site.rota2');

// rota de fallback

Route::fallback(function() { echo 'A rota n existe. <a href="'.route('site.index').'">clique aqui</a>para ir p/ pagina inicial';
});
