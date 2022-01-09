<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\OwnerRegisterController;
use App\Http\Controllers\OwnerLoginController;
use App\Http\Controllers\OwnerIndexController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminIndexController;
use App\Http\Controllers\ImgUploadController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MailController;


Route::get('/register',[RegisterController::class,'store'])->name('register');
Route::post('/register',[RegisterController::class,'create']);
Route::get('/thanks',[RegisterController::class,'add'])->name('thanks');


Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'checkUser'])->name('login');


Route::get('/',[IndexController::class,'index'])->middleware('auth')->name('home');
Route::get('/detail/{shop}',[IndexController::class,'bind'])->middleware('auth')->name('shop');
Route::post('/detail/{shop}',[IndexController::class,'create'])->middleware('auth')->name('reservation');
Route::get('/done',[IndexController::class,'done'])->middleware('auth')->name('done');
Route::post('/',[IndexController::class,'search'])->middleware('auth');

Route::get('/mypage',[MyPageController::class,'store'])->middleware('auth');
Route::post('/mypage' , [MyPageController::class , 'update'])->middleware('auth');
Route::post('/logout',[MyPageController::class,'destroy'])->middleware('auth')->name('logout');
Route::post('/delete',[MyPageController::class,'delete'])->middleware('auth')->name('delete');


Route::get('/like/{shop}',[LikeController::class,'like'])->middleware('auth')->name('like');
Route::get('/unlike/{shop}',[LikeController::class,'unlike'])->middleware('auth')->name('unlike');
Route::post('like/delete' , [LikeController::class , 'delete'])->middleware('auth');


Route::get('/review/{shop}' , [ReviewController::class , 'bind'])->middleware('auth');
Route::post('/review/{shop}' , [ReviewController::class , 'create']);


// owner管理画面
Route::get('/owner/register' , [OwnerRegisterController::class , 'index'])->name('owner.register');
Route::post('/owner/register' , [OwnerRegisterController::class , 'create'])->name('owner.register.create');
Route::get('/owner/login' , [OwnerLoginController::class , 'index'])->name('owner.login');
Route::post('/owner/login' , [OwnerLoginController::class , 'login'])->name('owner.login.store');
Route::get('/owner/home' , [OwnerIndexController::class , 'index'])->middleware('owner')->name('owner.home');
Route::post('/owner/home' , [OwnerIndexController::class , 'AdminCreate'])->name('admin.create');
Route::get('/owner/done', [OwnerIndexController::class , 'CreateDone']);
Route::post('/owner/logout' , [OwnerIndexController::class , 'logout'])->name('owner.logout');


//admin管理画面
Route::get('/admin/login' , [AdminLoginController::class , 'index'])->name('admin.login');
Route::post('/admin/login' , [AdminLoginController::class , 'login'])->name('admin.login.store');
Route::get('/admin/{id}/home/' , [AdminIndexController::class , 'index'])->middleware('admin')->name('admin.index');
Route::post('/admin/{id}/home/' , [AdminIndexController::class , 'update'])->name('admin.edit');
Route::post('/admin/logout' , [AdminIndexController::class , 'logout'])->name('admin.logout');

// メール送信
Route::get('/admin/{id}/mailcontact', [MailController::class, 'index'])->name('contact');
Route::post('/admin/{id}/mailcontact/confirm', [MailController::class, 'confirm'])->name('confirm');
Route::post('/admin/{id}/mailcontact/send', [MailController::class, 'send'])->name('send');
Route::get('/admin/{id}/mailcontact/complete',[MailContoroller::class, 'complete'])->name('complete');


//画像アップロード
Route::get('/imgupload', [ImgUploadController::class, 'index']);
Route::post('/imgupload', [ImgUploadController::class, 'store']);

//メール認証
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function(EmailVerificationRequest $request){
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function(Request $request){
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link send!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/profile', function () {
})->middleware('verified');


//メール送信
Route::get('/mail', [MailController::class, ('send')]);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');



// Route::post('/login/mypage',[LoginController::class,'usercheck'])->middleware('auth');

// require __DIR__.'/auth.php';
