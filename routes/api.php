<?php

use App\Http\Controllers\JenisPengirimanController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\PengirimansController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\jenis_pengiriman;
use App\Models\pengiriman;

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

Route::get('jenis', [JenisPengirimanController::class, 'index']);
Route::get('jenis/{id}', [JenisPengirimanController::class, 'show']);
Route::get('pengiriman', [PengirimansController::class, 'index']);
Route::get('pengiriman/{id}', [PengirimansController::class, 'show']);
Route::patch('pengiriman/{id}', [PengirimansController::class, 'update']);
Route::post('pengiriman', [PengirimansController::class, 'store']);
Route::delete('pengiriman/{id}', [PengirimansController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
