<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorClientes;
use App\Http\Controllers\AutenticadorApiControlador;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

/*Route::prefix('/cliente')->middleware('auth:api')->group(function(){
    Route::get('/lista',[ControladorClientes::class,'index'])->name('lista.cliente');
    Route::get('/detalhes/{id}',[ControladorClientes::class,'show'])->name('detalhes.cliente');
    Route::put('/atualizar/{id}',[ControladorClientes::class,'update'])->name('atualizar.cliente');
    Route::get('/deletar/{clientes}',[ControladorClientes::class,'destroy'])->name('delete.cliente');
});*/


// Rotas protegidas pelo Auth
Route::prefix('auth')->group(function(){
    Route::post('registro',[AutenticadorApiControlador::class,'registrar'])->name('autentica');
    Route::post('login',[AutenticadorApiControlador::class,'login'])->name('logar');
    Route::middleware('auth:api')->group(function(){
        Route::post('logout',[AutenticadorApiControlador::class,'logout'])->name('logout');
    });
});
// rotas do CRUD api
Route::get('lista/clientes',[ControladorClientes::class,'index'])->name('lista.cliente')->middleware('auth:api');
Route::get('lista/clientes/{id}',[ControladorClientes::class,'show'])->name('lista.cliente.unico')->middleware('auth:api');
Route::post('inserir/clientes',[ControladorClientes::class,'store'])->name('inserir.cliente')->middleware('auth:api');
Route::put('editar/clientes/{id}',[ControladorClientes::class,'update'])->name('update.cliente')->middleware('auth:api');
Route::delete('delete/clientes/{id}',[ControladorClientes::class,'destroy'])->name('delete.cliente')->middleware('auth:api');






