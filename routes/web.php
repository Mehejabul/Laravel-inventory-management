<?php

use App\Http\Controllers\AdminController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        // Matches The "/admin/users" URL
    });
});
    //Admin Panel Route start
Route::get('admin',[AdminController::class, 'index']);


// user Route start
Route::get('/user',[UserController::class,'index']);
Route::get('/user/create',[UserController::class,'create']);
Route::post('/user',[UserController::class,'store']);
Route::get('/user/show/{slug}',[UserController::class,'show']);
Route::get('/user/edit/{slug}',[UserController::class,'edit']);
Route::put('/user/{slug}',[UserController::class,'update']);
Route::post('/user/softdel',[UserController::class,'softdel']);
Route::delete('/user/}',[UserController::class,'delete']);


//laravel default auth code
require __DIR__.'/auth.php';

