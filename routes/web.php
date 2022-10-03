<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\User_Controller;
use App\Http\Controllers\Penduduk_Controller;
use App\Http\Controllers\API\API_Warga_Controller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',           [User_Controller::class, 'login'])->name('home')->middleware('guest');
Route::get('/login',      [User_Controller::class, 'login'])->name('login')->middleware('guest'); // agar tidak error auth middleware
Route::post('/login',     [UserAuth::class, 'userLogin'])->middleware('guest');

Route::post('/logout',    [UserAuth::class, 'logout'])->name('logout'); //name berfungsi unutunk pemangilan di blade.php

Route::get('/register',   [User_Controller::class, 'register'])->middleware('guest');
Route::post('/register',  [UserAuth::class, 'userRegister'])->name('userRegister')->middleware('guest');
// done 20/09/22

Route::get('/dashboard',   [User_Controller::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/user/profile', [User_Controller::class, 'user'])->name('user_profile')->middleware('auth');
Route::post('/user/profile/update', [UserAuth::class, 'updateProfile'])->name('update_profile')->middleware('auth');
Route::post('/user/image', [UserAuth::class, 'userImage'])->name('userImage')->middleware('auth');

//DataWargaController 
Route::get('/warga/token',    [Penduduk_Controller::class, 'index'])->middleware('cros'); // test
Route::get('dashboard/warga', [Penduduk_Controller::class, 'warga'])->name('warga')->middleware('auth');
Route::post('/warga/post',    [Penduduk_Controller::class, 'post_warga'])->name('post_warga')->middleware('auth');
Route::post('/warga/tes',     [Penduduk_Controller::class, 'tes']);

/// TEST WargaController 
Route::get('api_warga',             [API_Warga_Controller::class, 'index'])->middleware('cros');
Route::post('api_warga/create',     [API_Warga_Controller::class, 'create'])->name('api_create');
Route::get('api_warga/delete/{id}', [API_Warga_Controller::class, 'destroy'])->name('api_warga_delete');
Route::get('api_warga/getDataById/{id}',      [API_Warga_Controller::class, 'getDataById'])->name('getDataById');
// Route::put('api_warga/edit',  [API_Warga_Controller::class, 'edit'])->name('api_warga_edit');
// Route::get('/warga/{id}/edit', [Warga::class, 'index']);
