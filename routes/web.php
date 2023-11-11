<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KendaraanController;
use App\Models\Kendaraan;
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

Route::middleware(['guest'])->group(function(){
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'aunthenticate']);
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'Store']);
});

Route::middleware(['auth', 'checkRole:admin'])->group(function (){
    Route::get('/dashboard', [UserController::class, 'index'])->name('admin.index');

    Route::get('/Customer', [CustomerController::class, 'index'])->name('admin.customer');
    Route::get('/Customer/Create', [CustomerController::class, 'create'])->name('admin.customer.create');
    Route::post('/Customer/Create/Store', [CustomerController::class, 'store'])->name('admin.customer.store');
    Route::get('/Customer/Edit/{id}', [CustomerController::class, 'edit'])->name('admin.customer.edit');
    Route::post('/Customer/Update/{id}', [CustomerController::class,'update'])->name('admin.customer.update');
    Route::get('/Customer/Delete/{id}', [CustomerController::class,'destroy'])->name('admin.customer.delete');

    Route::get('/Kendaraan', [KendaraanController::class, 'index'])->name('admin.kendaraan');
    Route::get('/Kendaraan/Create', [KendaraanController::class, 'create'])->name('admin.kendaraan.create');
    Route::post('/Kendaraan/Create/Store', [KendaraanController::class, 'store'])->name('admin.kendaraan.store');
    Route::get('/Kendaraan/Edit/{id}', [KendaraanController::class, 'edit'])->name('admin.kendaraan.edit');
    Route::post('/Kendaraan/Update/{id}', [KendaraanController::class,'update'])->name('admin.kendaraan.update');
    Route::get('/Kendaraan/Delete/{id}', [KendaraanController::class,'destroy'])->name('admin.kendaraan.delete');

    Route::get('/Order', [OrderController::class, 'index'])->name('admin.order');
    Route::get('/Order/Create', [OrderController::class, 'create'])->name('admin.order.create');
    Route::post('/Order/Create/Store', [OrderController::class, 'store'])->name('admin.order.store');
    Route::get('/Order/Show/{id}', [OrderController::class, 'show'])->name('admin.order.show');
    Route::get('/Order/Edit/{id}', [OrderController::class, 'edit'])->name('admin.order.edit');
    Route::post('/Order/Update/{id}', [OrderController::class,'update'])->name('admin.order.update');
    Route::get('/Order/Delete/{id}', [OrderController::class,'destroy'])->name('admin.order.delete');
});

Route::post('/logout', [LoginController::class, 'logout']);