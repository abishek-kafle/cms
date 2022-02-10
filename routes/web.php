<?php

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

Route::prefix('/admin')->group(function(){
    Route::get('/login', [App\Http\Controllers\Admin\AdminLoginController::class, 'adminLogin'])->name('adminLogin');
    Route::post('/login', [App\Http\Controllers\Admin\AdminLoginController::class, 'loginAdmin'])->name('loginAdmin');

    Route::group(['middleware' => 'admin'], function(){
        // Admin Dashboard
        Route::get('/dashboard', [App\Http\Controllers\Admin\AdminLoginController::class, 'adminDashboard'])->name('adminDashboard');
    });

    // Admin Logout
    Route::get('/logout', [App\Http\Controllers\Admin\AdminLoginController::class, 'adminLogout'])->name('adminLogout');
});
