<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsuariosController;

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
    return view('auth.login');
})->middleware('guest');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/home',"home")->middleware('auth')->name('home');
Route::view('/login',"auth.login")->name('login')->middleware('guest');
Route::view('/register',"auth.register")->name('register')->middleware('guest');
Route::get('/empleados', [UsuariosController::class, 'showUsersCourse'])->name('staff');

