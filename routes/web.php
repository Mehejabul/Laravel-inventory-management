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

Route::group(['prefix' => 'admin','middleware' => ['auth']], function() {
    Route::get('/',[AdminController::class, 'index']);

    // user Route list
    Route::get('/users',[UserController::class,'index'])->name('user.index');
    Route::get('/user/create',[UserController::class,'create'])->name('user.create');
    Route::post('/user',[UserController::class,'store'])->name('user.store');
    Route::get('/user/show/{slug}',[UserController::class,'show'])->name('user.show');
    Route::get('/user/edit/{slug}',[UserController::class,'edit'])->name('user.edit');
    Route::put('/user{slug}',[UserController::class,'update'])->name('user.update');
    Route::post('/user/softdel/{slug}',[UserController::class,'softdel'])->name('user.softdel');
    Route::delete('/user/}',[UserController::class,'destroy'])->name('user.destroy');

    // CustomerGroup Route list
    Route::get('/customer/group',[CustomerGroupController::class,'index'])->name('cg.index');
    Route::get('/customer/group/create',[CustomerGroupController::class,'create'])->name('cg.create');
    Route::post('/customer/group',[CustomerGroupController::class,'store'])->name('cg.store');
    Route::get('/customer/group/edit/{slug}',[CustomerGroupController::class,'edit'])->name('cg.edit');
    Route::put('/customer/group/{slug}',[CustomerGroupController::class,'update'])->name('cg.update');
    Route::post('/customer/group/softdel/{slug}',[CustomerGroupController::class,'softdel'])->name('cg.softdel');
    Route::delete('/customer/group/{slug}',[CustomerGroupController::class,'destroy'])->name('cg.destroy');

    //Customer Route list
    Route::get('/customer',[CustomerController::class,'index'])->name('customer.index');
    Route::get('/customer/create',[CustomerController::class,'create'])->name('customer.create');
    Route::post('/customer',[CustomerController::class,'store'])->name('customer.store');
    Route::get('/customer/edit/{slug}',[CustomerController::class,'edit'])->name('customer.edit');
    Route::put('/customer/{slug}',[CustomerController::class,'update'])->name('customer.update');
    Route::put('/customer/softdel/{slug}',[CustomerController::class,'softdel'])->name('customer.softdel');
    Route::delete('/customer/{slug}',[CustomerController::class,'delete'])->name('customer.destroy');
});



//laravel default auth code
require __DIR__.'/auth.php';
