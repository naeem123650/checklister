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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');

Route::group(['middleware'=> 'auth'],function(){
    Route::group(['middleware' => 'is_admin', 'prefix' => 'admin','as' => 'admin.'],function (){
        Route::resource('pages', App\Http\Controllers\Admin\PagesController::class);
        Route::resource('checklist_groups',\App\Http\Controllers\Admin\ChecklistGroupController::class);
        Route::resource('checklist_groups.checklists',\App\Http\Controllers\Admin\ChecklistController::class);
        Route::resource('checklists.tasks',\App\Http\Controllers\Admin\TasksController::class);
    });
});
