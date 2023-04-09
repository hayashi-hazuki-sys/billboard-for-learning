<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;

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

//TOPページ
Route::get('/',  [TopController::class, 'index'])->name('site.top');

//投稿一覧
Route::get('/postlist', [ArticalController::class, 'list'])->name('site.postlist');

//ログイン
Route::group(['prefix' => 'auth'], function () {
    Route::match(['get','post'],'login', [LoginController::class, 'login'])->name('site.login');
    Route::get('logout', [LoginController::class, 'logout'])->name('site.logout');
});

//ログインユーザのみアクセス可能ページ
Route::group(['prefix' => 'auth','middleware' => 'auth'], function () {
    //マイページ
    //Route::get('/mypage', [MypageController::class, 'index'])->name('site.mypage');
    //投稿書き込みページ
    Route::get('/postedit', [ArticleController::class, 'edit'])->name('site.postedit');
    //DM
    Route::get('/room', [ArticleController::class, 'index'])->name('site.room');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
