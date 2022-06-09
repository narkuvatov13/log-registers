<?php

use App\Http\Controllers\PostController;
use App\Http\Middleware\RoleKontrol;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::middleware('role')->group(function(){
        Route::get('/admins',[AdminController::class,'index'])->name('admin.index');
        Route::get('/admins/post/create',[PostController::class,'create'])->name('post.create');
        Route::post('/admins/post/store',[PostController::class,'store'])->name('post.store');
        Route::get('/admins/post/lists',[PostController::class,'index'])->name('post.index');
        Route::get('/admins/post/{id}/edit',[PostController::class,'edit'])->name('post.edit');
        Route::patch('/admins/post/{id}/update',[PostController::class,'update'])->name('post.update');
        Route::delete('/admins/post/{id}/destroy',[PostController::class,'destroy'])->name('post.destroy');
    });

});


