<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\IndexController;


Route::get('/',[IndexController::class,'index']);
Route::get('/detail/:shop_id/{shop}',[IndexController::class,'bind']);
Route::post('/detail/:shop_id/{shop}',[IndexController::class,'create']);
// Route::get('/detail/:shop_id/{shop}',function(){
//     return 'gogoggo';
// });


Route::get('/register',[RegisterController::class,'store']);
Route::post('/thanks',[RegisterController::class,'create']);
Route::get('/thanks',[RegisterController::class,'add'])->name('thanks');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'checkUser']);

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
