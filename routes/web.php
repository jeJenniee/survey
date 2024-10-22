<?php

use App\Http\Controllers\PostController;
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

//user
Route::get('/', [UserController::class, 'login'])->name('login');
Route::get('/datadiri', [UserController::class, 'datadiri'])->name('datadiri');

//post
Route::post('/postdatadiri', [PostController::class, 'postdatadiri'])->name('postdatadiri');
