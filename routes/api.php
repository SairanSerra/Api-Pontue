<?php

use App\Http\Controllers\Books;
use App\Http\Controllers\Games;
use App\Http\Controllers\Health;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Health::class, 'VerifyHealthAPI']);

Route::post('/login', [User::class, 'Login']);
Route::post('/nova/conta', [User::class, 'SignUP']);

Route::group(['middleware' => 'auth:sanctum', 'prefix' => '/v1/jogo'],function (){

    Route::get('/lista', [Games::class, 'ListGames']);
    Route::put('/atualiza', [Games::class, 'UpdateGame']);
    Route::post('/novo', [Games::class, 'CreateGame']);
    Route::delete('/excluir', [Games::class, 'DeleteGame']);

});
Route::group(['middleware' => 'auth:sanctum', 'prefix' => '/v1/livro'],function (){

    Route::get('/lista', [Books::class, 'ListBooks']);
    Route::put('/atualiza', [Books::class, 'UpdateBook']);
    Route::post('/novo', [Books::class, 'CreateBook']);
    Route::delete('/excluir', [Books::class, 'DeleteBook']);

});
