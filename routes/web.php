<?php

use App\Http\Controllers\GruposController;
use App\Http\Controllers\ItensController;
use App\Http\Controllers\MembrosController;
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
    return view('home');
});




Route::resource('grupos' , GruposController::class );
Route::post('grupos/novo' , [GruposController::class , 'store'])->name('grupo.novo');
Route::get('grupos/detalhes/{id}' , [GruposController::class , 'show'])->name('grupo.detalhe');
Route::get('grupos/detalhes/edit/{id}' , [GruposController::class , 'show'])->name('grupo.detalhe');
Route::delete('grupos/detalhes/delet/{id}' , [GruposController::class , 'destroy'])->name('grupo.delete');



//membros
Route::post('grupos/detalhes/membros' , [MembrosController::class , 'create'])->name('membros.add');
Route::get('grupos/detalhes/membros/{id}' , [MembrosController::class , 'detalhes'])->name('membros.detalhes');




//itens ainda não temos a tabela
Route::post('grupos/detalhes/itens' , [ItensController::class , 'create'])->name('itens.add');




