<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\IndexController;



Route::get('/register',[RegisterController::class,'store']);
Route::post('/register',[RegisterController::class,'create'])->name('registration');
Route::get('/thanks',[RegisterController::class,'add'])->name('thanks');


Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'checkUser'])->name('login');

Route::get('/',[IndexController::class,'index'])->middleware('auth')->name('home');
Route::get('/detail/:shop_id/{shop}',[IndexController::class,'bind']);
Route::post('/detail/:shop_id/{shop}',[IndexController::class,'create'])->name('reservation');
Route::get('/done',[IndexController::class,'done']);





Route::get('/mypage',[MyPageController::class,'store'])->middleware('auth');
Route::post('/logout',[MyPageController::class,'destroy'])->middleware('auth')->name('logout');







// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');



// Route::post('/login/mypage',[LoginController::class,'usercheck'])->middleware('auth');

// require __DIR__.'/auth.php';
