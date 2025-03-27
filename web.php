<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\User\ArticlesController;
Route::get('/', function () {
    return view('welcome');
});
 
/*Route::prefix('articless')->group(function () {
    Route::get('', [ArticlesController::class, 'index'])->name('articless.index');
    Route::get('/{MaBaiViet}', [ArticlesController::class, 'show'])->name('articless.show');
});*/

Route::prefix('articless')->middleware(['auth', 'role:VIEWER'])->group(function () {
    Route::get('', [ArticlesController::class, 'index'])->name('articless.index');
    Route::get('/{MaBaiViet}', [ArticlesController::class, 'show'])->name('articless.show');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
  
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
 
    // Routes cho ArticleController
    Route::controller(ArticleController::class)->prefix('articles')->group(function () {
        Route::get('', 'index')->name('articles.index');  // Đảm bảo sử dụng articles.index
        Route::get('create', 'create')->name('articles.create');
        Route::post('store', 'store')->name('articles.store');
        Route::post('comments/store', [CommentController::class, 'store'])->name('comments.store');
        Route::delete('comments/destroy/{MaBinhLuan}', [CommentController::class, 'destroy'])->name('comments.destroy');
        Route::put('comments/{MaBinhLuan}', [CommentController::class, 'update'])->name('comments.update');
        // Dùng MaBaiViet thay vì id cho các route liên quan đến bài viết
        Route::get('show/{MaBaiViet}', 'show')->name('articles.show');
        Route::get('edit/{MaBaiViet}', 'edit')->name('articles.edit');
        Route::put('edit/{MaBaiViet}', 'update')->name('articles.update');
        Route::delete('destroy/{MaBaiViet}', 'destroy')->name('articles.destroy');
    });
    
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});