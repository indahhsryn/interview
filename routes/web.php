<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('auth', [LoginController::class, 'auth']);
Route::get('logout', [LoginController::class, 'logout']);
Route::get('event', [EventController::class, 'index']);
Route::get('create', [EventController::class, 'tambah']);
Route::post('simpan', [EventController::class, 'simpan']);
Route::get('edit{id}', [EventController::class, 'edit']);
Route::post('edit{id}', [EventController::class, 'update']);
Route::post('deleted{id}', [EventController::class, 'delete']);
Route::get('tambahData', [EventController::class, 'tambahData']);
Route::get('home', [HomeController::class, 'index'])->middleware('auth');
