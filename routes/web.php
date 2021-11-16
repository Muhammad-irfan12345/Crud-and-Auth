<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

require __DIR__.'/auth.php';
Route::middleware(['admin', 'auth'])->group( function (){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('admin');
    Route::resource('post',App\Http\Controllers\PostController::class);
    Route::get('/all-user', [UserController::class, 'user'])->name('all-user');
Route::get('/user-edit', [UserController::class, 'edituser'])->name('user-edit');
Route::get('/user-destroy/{id}', [UserController::class, 'userdestroy'])->name('user-destroy');
});

Route::middleware(['auth'])->group( function (){
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::resource('post',App\Http\Controllers\PostController::class);


});

