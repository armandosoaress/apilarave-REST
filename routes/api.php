<?php

use App\Http\Controllers\Moedacontroller;
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
    return "teste com sucesso";
});

route::post('/addmoeda', [Moedacontroller::class,'store']);
route::get('/moedas', [Moedacontroller::class,'index']);
route::get('/valordohotel/{valor}/moeda/{moeda}/margem/{margem}', [Moedacontroller::class,'calculo']);
route::get('/moeda/{id}', [Moedacontroller::class,'show']);
route::put('/update/{id}', [Moedacontroller::class,'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
