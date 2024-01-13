<?php

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


Auth::routes();

Route::group(['middleware'=> ['auth','save_last_action']],function(){
    Route::get('/{slug?}',\App\Http\Controllers\PagesController::class)->name('admin.home');
    Route::get('/checklist/{checklist}',\App\Http\Controllers\ChecklistController::class)->name('user.checklist');
    Route::group(['middleware' => 'is_admin', 'prefix' => 'admin','as' => 'admin.'],function (){
        Route::resource('pages', App\Http\Controllers\Admin\PagesController::class);
        Route::resource('checklist_groups',\App\Http\Controllers\Admin\ChecklistGroupController::class);
        Route::resource('checklist_groups.checklists',\App\Http\Controllers\Admin\ChecklistController::class);
        Route::resource('checklists.tasks',\App\Http\Controllers\Admin\TasksController::class);
        Route::get('users',[\App\Http\Controllers\Admin\UserController::class,'index'])->name('users.index');
        Route::post('image/upload',[\App\Http\Controllers\Admin\ImageUploadController::class,'store'])->name('image.upload');
    });
});
