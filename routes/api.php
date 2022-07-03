<?php

use App\Http\Controllers\Testamentocontroller;
use Illuminate\Http\Request;
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

route::get('/teste',function(){
    return "teste com sucess";
});

route::post('/testamento', [Testamentocontroller::class,'store']);
route::put('/testamento/{id}', [Testamentocontroller::class,'update']);
route::get('/testamento', [Testamentocontroller::class,'index']);
route::get('/testamento/{id}', [Testamentocontroller::class,'show']);
route::delete('/testamento/{id}', [Testamentocontroller::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
