<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;



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

Route::get('/guest/login',[LoginController::class,'index'])->name('login');
Route::get('/user/mypage',[LoginController::class,'checkUser'])->middleware('auth')->name('mypage');
Route::post('/user/mypage',[LoginController::class,'checkUser'])->middleware('auth')->name('mypage');






Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



// Route::post('/login/mypage',[LoginController::class,'usercheck'])->middleware('auth');

// require __DIR__.'/auth.php';
