<?php

use App\Http\Controllers\TopPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\ScoreimportController;
use App\Http\Controllers\ScoreViewController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/login',[TopPageController::class,'login'])->name('login');
Route::get('/auth/redirect', [GoogleLoginController::class, 'getGoogleAuth']);
Route::get('/login/callback', [GoogleLoginController::class, 'authGoogleCallback']);

// INDEX
Route::get('/', [TopPageController::class,'Index'])->name('index');

// PROFILE
Route::get('/profile', [ProfileController::class,'Index'])->name('profile');
Route::post('/profile/update', [ProfileController::class,'ProfileSend'])->name('profile.update');
Route::get('/profile/edit', [ProfileController::class,'ProfileEdit'])->name('profile.edit');
Route::get('/import', [ScoreimportController::class,'Index'])->name('import');
Route::get('/import/uplaod', [TopPageController::class,'Index']);
Route::post('/import/uplaod', [ScoreimportController::class,'upload'])->name('scoreimport');

// RECENT
Route::get('/recent', [ScoreViewController::class,'Recent'])->name('recent');
// LEVEL
Route::get('/lv/{level}', [ScoreViewController::class,'LevelView'])->where('level', '[0-9]+')->name('level');
Route::get('/lv/beg', [ScoreViewController::class,'LevelViewBeginner'])->name('level.beginner');
Route::get('/lv/leg', [ScoreViewController::class,'LevelViewLeggendaria'])->name('level.leggendaria');
// TYPE
Route::get('/clear/fcombo', [ScoreViewController::class,'CleartypeFullcombo'])->name('clear.fcombo');
Route::get('/clear/exhard', [ScoreViewController::class,'CleartypeExHard'])->name('clear.exhard');
Route::get('/clear/hard', [ScoreViewController::class,'CleartypeHard'])->name('clear.hard');
Route::get('/clear/clear', [ScoreViewController::class,'CleartypeClear'])->name('clear.clear');
Route::get('/clear/aclear', [ScoreViewController::class,'CleartypeAssistClear'])->name('clear.aclear');
Route::get('/clear/eclear', [ScoreViewController::class,'CleartypeEasyClear'])->name('clear.eclear');
Route::get('/clear/failed', [ScoreViewController::class,'CleartypeFailed'])->name('clear.failed');
Route::get('/clear/noplay', [ScoreViewController::class,'CleartypeNoPlay'])->name('clear.noplay');
// RANK
Route::get('/rank/aaa', [ScoreViewController::class,'RankAAA'])->name('rank.aaa');
Route::get('/rank/aa', [ScoreViewController::class,'RankAA'])->name('rank.aa');
Route::get('/rank/a', [ScoreViewController::class,'RankA'])->name('rank.a');
Route::get('/rank/b', [ScoreViewController::class,'RankB'])->name('rank.b');
Route::get('/rank/c', [ScoreViewController::class,'RankC'])->name('rank.c');
Route::get('/rank/d', [ScoreViewController::class,'RankD'])->name('rank.d');
Route::get('/rank/e', [ScoreViewController::class,'RankE'])->name('rank.e');
Route::get('/rank/f', [ScoreViewController::class,'RankF'])->name('rank.f');
Route::get('/rank/noscore', [ScoreViewController::class,'RankNoScore'])->name('rank.noscore');
// VERSION
Route::get('/version/{ver}', [ScoreViewController::class,'VersionView'])->where('ver', '[0-9]+')->name('version');
// ACCOUNT
Route::get('/account/profile', [UsersController::class,'Index'])->name('account.profile');
Route::get('/account/edit', [UsersController::class,'ProfileEdit'])->name('account.edit');
Route::post('/account/update', [UsersController::class,'ProfileSend'])->name('account.update');
// DASHBOARD
Route::get('/dashboard', [AdminController::class,'Dashboard'])->name('dashboard');
Route::post('/admin/profile/update', [AdminController::class,'AdminProfileSend'])->name('admin.accountUpdate');
Route::post('/admin/profile/delete', [AdminController::class,'AdminAccountDelete'])->name('admin.accountDelete');


Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');