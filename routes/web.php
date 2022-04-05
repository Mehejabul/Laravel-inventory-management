<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerGroupController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


    //Admin Panel Route start
Route::get('admin',[AdminController::class, 'index']);

// user Route list
Route::get('/user',[UserController::class,'index']);
Route::get('/user/create',[UserController::class,'create']);
Route::post('/user',[UserController::class,'store']);
Route::get('/user/show/{slug}',[UserController::class,'show']);
Route::get('/user/edit/{slug}',[UserController::class,'edit']);
Route::put('/user/{slug}',[UserController::class,'update']);
Route::post('/user/softdel',[UserController::class,'softdel']);
Route::delete('/user/}',[UserController::class,'delete']);

// CustomerGroup Route list
Route::get('/customer/group',[CustomerGroupController::class,'index']);
Route::get('/customer/group/create',[CustomerGroupController::class,'create']);
Route::post('/customer/group',[CustomerGroupController::class,'store']);
Route::get('/customer/group/edit/{slug}',[CustomerGroupController::class,'edit']);
Route::put('/customer/group/{slug}',[CustomerGroupController::class,'update']);
Route::delete('/customer/group/{slug}',[CustomerGroupController::class,'destroy']);

//Customer Route list
Route::get('/customer',[CustomerController::class,'index']);
Route::get('/customer/create',[CustomerController::class,'create']);
Route::post('/customer',[CustomerController::class,'store']);
Route::get('/customer/edit/{slug}',[CustomerController::class,'edit']);
Route::put('/customer/{slug}',[CustomerController::class,'update']);
Route::delete('/customer/{slug}',[CustomerController::class,'delete']);

//laravel default auth code
require __DIR__.'/auth.php';

