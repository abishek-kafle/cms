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
    return view('front.index');
});

Route::prefix('/admin')->group(function(){
    Route::get('/login', [App\Http\Controllers\Admin\AdminLoginController::class, 'adminLogin'])->name('adminLogin');
    Route::post('/login', [App\Http\Controllers\Admin\AdminLoginController::class, 'loginAdmin'])->name('loginAdmin');

    Route::group(['middleware' => 'admin'], function(){
        // Admin Dashboard
        Route::get('/dashboard', [App\Http\Controllers\Admin\AdminLoginController::class, 'adminDashboard'])->name('adminDashboard');
        // Admin Profile
        Route::get('/profile', [App\Http\Controllers\Admin\AdminController::class, 'adminProfile'])->name('adminProfile');
        Route::post('/profile/{id}', [App\Http\Controllers\Admin\adminController::class, 'adminProfileUpdate'])->name('adminProfileUpdate');
        Route::get('/delete-image/{id}', [App\Http\Controllers\Admin\adminController::class, 'deleteImage'])->name('deleteImage');
        // Change Password
        Route::get('/change-password', [\App\Http\Controllers\Admin\AdminController::class, 'changePassword'])->name('changePassword');
        // Check Current Password
        Route::post('/check-password', [\App\Http\Controllers\Admin\AdminController::class, 'chkUserPassword'])->name('chkUserPassword');
        //Update Admin password
        Route::post('/profile/update_password/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'updatePassword'])->name('updatePassword');

        // Bio
        Route::get('/bio', [App\Http\Controllers\Admin\BioController::class, 'index'])->name('bio.index');
        Route::post('/bio/update/{id}', [App\Http\Controllers\Admin\BioController::class, 'update'])->name('bio.update');

        // About
        Route::get('/about', [App\Http\Controllers\Admin\AboutController::class, 'index'])->name('about.index');
        Route::post('/about/update/{id}', [App\Http\Controllers\Admin\AboutController::class, 'update'])->name('about.update');

        // Skills
        Route::get('/skills', [App\Http\Controllers\Admin\SkillController::class, 'index'])->name('skill.index');
        Route::get('/skill/add', [App\Http\Controllers\Admin\SkillController::class, 'add'])->name('skill.add');
        Route::post('/skill/add', [App\Http\Controllers\Admin\SkillController::class, 'store'])->name('skill.store');
        Route::get('/skill/edit/{id}', [App\Http\Controllers\Admin\SkillController::class, 'edit'])->name('skill.edit');
        Route::post('/skill/update/{id}', [App\Http\Controllers\Admin\SkillController::class, 'update'])->name('skill.update');
        Route::get('/skill/delete/{id}', [App\Http\Controllers\Admin\SkillController::class, 'delete'])->name('skill.delete');

    });

    // Admin Logout
    Route::get('/logout', [App\Http\Controllers\Admin\AdminLoginController::class, 'adminLogout'])->name('adminLogout');
});
