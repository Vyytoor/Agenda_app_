<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Agendas;
use App\Http\Controllers\AgendaHistory;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(Agendas::class)->group(function(){
    Route::get('/lista_contatos', 'lista_contatos');
    Route::post('/insere_contatos', 'insere_contatos');
    Route::put('/edita_contatos/{id}', 'edita_contatos');
    Route::delete('/exclui_contatos/{id}','exclui_contatos');
});

Route::get('/agenda_history/{id}', [AgendaHistory::class, 'listar_historico']);
