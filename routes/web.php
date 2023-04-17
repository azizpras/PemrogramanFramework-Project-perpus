<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RakController;
use App\Http\Controllers\LoginController;  

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
    return view('home');
});

Route::post('/login', [LoginController::class, 'authenticate']);

Route::resource('/dashboard/raks', RakController::class)->middleware('auth');
Route::resource('/dashboard/books', BookController::class)->middleware('auth');
  
Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');
