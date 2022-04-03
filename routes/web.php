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

        // Timeline
        Route::get('/timeline', [App\Http\Controllers\Admin\TimelineController::class, 'index'])->name('timeline.index');
        Route::get('/timeline/add', [App\Http\Controllers\Admin\TimelineController::class, 'add'])->name('timeline.add');
        Route::post('/timeline/add', [App\Http\Controllers\Admin\TimelineController::class, 'store'])->name('timeline.store');
        Route::get('/timeline/edit/{id}', [App\Http\Controllers\Admin\TimelineController::class, 'edit'])->name('timeline.edit');
        Route::post('/timeline/update/{id}', [App\Http\Controllers\Admin\TimelineController::class, 'update'])->name('timeline.update');
        Route::get('/timeline/delete/{id}', [App\Http\Controllers\Admin\TimelineController::class, 'delete'])->name('timeline.delete');

        // Blogs
        Route::get('/blog', [App\Http\Controllers\Admin\BlogController::class, 'index'])->name('blog.index');
        Route::get('/blog/add', [App\Http\Controllers\Admin\BlogController::class, 'add'])->name('blog.add');
        Route::post('/blog/add', [App\Http\Controllers\Admin\BlogController::class, 'store'])->name('blog.store');
        Route::get('/blog/edit/{id}', [App\Http\Controllers\Admin\BlogController::class, 'edit'])->name('blog.edit');
        Route::post('/blog/update/{id}', [App\Http\Controllers\Admin\BlogController::class, 'update'])->name('blog.update');
        Route::get('/blog/delete/{id}', [App\Http\Controllers\Admin\BlogController::class, 'delete'])->name('blog.delete');

        // Projects
        Route::get('/project', [App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('project.index');
        Route::get('/project/add', [App\Http\Controllers\Admin\ProjectController::class, 'add'])->name('project.add');
        Route::post('/project/add', [App\Http\Controllers\Admin\ProjectController::class, 'store'])->name('project.store');
        Route::get('/project/edit/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'edit'])->name('project.edit');
        Route::post('/project/update/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'update'])->name('project.update');
        Route::get('/project/delete/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'delete'])->name('project.delete');
    });

    // Admin Logout
    Route::get('/logout', [App\Http\Controllers\Admin\AdminLoginController::class, 'adminLogout'])->name('adminLogout');
});
