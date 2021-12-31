<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\OwnerRegisterController;
use App\Http\Controllers\OwnerLoginController;
use App\Http\Controllers\OwnerIndexController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminIndexController;
use App\Http\Middleware\AdminMiddleware;




Route::get('/register',[RegisterController::class,'store'])->name('register');
Route::post('/register',[RegisterController::class,'create']);
Route::get('/thanks',[RegisterController::class,'add'])->name('thanks');


Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'checkUser'])->name('login');


Route::get('/',[IndexController::class,'index'])->middleware('auth')->name('home');
Route::get('/detail/:shop_id/{shop}',[IndexController::class,'bind'])->middleware('auth')->name('shop');
Route::post('/detail/:shop_id/{shop}',[IndexController::class,'create'])->middleware('auth')->name('reservation');
Route::get('/done',[IndexController::class,'done'])->middleware('auth')->name('done');
Route::post('/',[IndexController::class,'search'])->middleware('auth');


Route::get('/mypage',[MyPageController::class,'store'])->middleware('auth');
Route::post('/mypage' , [MyPageController::class , 'update'])->middleware('auth');
Route::post('/logout',[MyPageController::class,'destroy'])->middleware('auth')->name('logout');
Route::post('/delete',[MyPageController::class,'delete'])->middleware('auth')->name('delete');


Route::get('/like/{shop}',[LikeController::class,'like'])->middleware('auth')->name('like');
Route::get('/unlike/{shop}',[LikeController::class,'unlike'])->middleware('auth')->name('unlike');
Route::post('like/delete' , [LikeController::class , 'delete'])->middleware('auth');


Route::get('/review/:shop_id/{shop}' , [ReviewController::class , 'bind'])->middleware('auth');
Route::post('/review/:shop_id/{shop}' , [ReviewController::class , 'create']);


// owner管理画面
Route::get('/owner/register' , [OwnerRegisterController::class , 'index'])->name('owner.register');
Route::post('/owner/register' , [OwnerRegisterController::class , 'create'])->name('owner.register.create');
Route::get('/owner/login' , [OwnerLoginController::class , 'index'])->name('owner.login');
Route::post('/owner/login' , [OwnerLoginController::class , 'login'])->name('owner.login.store');
Route::get('/owner/home' , [OwnerIndexController::class , 'index'])->name('owner.home');
Route::post('/owner/home' , [OwnerIndexController::class , 'AdminCreate'])->name('admin');
Route::get('/owner/done', [OwnerIndexController::class , 'CreateDone']);


//admin管理画面
Route::get('/admin/login' , [AdminLoginController::class , 'index'])->name('admin.login');
Route::post('/admin/login' , [AdminLoginController::class , 'login'])->name('admin.login.store');
Route::get('/admin/:shop_id={id}/home/' , [AdminIndexController::class , 'index'])->name('admin.index');
Route::post('/admin/:shop_id={id}/home/' , [AdminIndexController::class , 'update'])->name('admin.edit');






// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');



// Route::post('/login/mypage',[LoginController::class,'usercheck'])->middleware('auth');

// require __DIR__.'/auth.php';
