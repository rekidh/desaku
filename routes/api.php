<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\API_Warga_Controller;

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
/// TEST WargaController 
Route::get('api_warga', [API_Warga_Controller::class, 'index']);
Route::post('api_warga/create',     [API_Warga_Controller::class, 'create'])->middleware('cros');
Route::get('api_warga/delete/{id}', [API_Warga_Controller::class, 'destroy'])->middleware('cros');
Route::get('api_warga/getDataById/{id}', [API_Warga_Controller::class, 'getDataById'])->middleware('cros');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
