<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Show\ShowController;
use Illuminate\Http\Request;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('shows/{show}', [ShowController::class, 'show'])->name('show.detail');

Route::get('shows/{show}/episodes/{episode}', [ShowController::class, 'episode'])->name('show.episode');

Route::post('shows/comment/{show}', [ShowController::class, 'createComment'])->name('add.comment');

Route::get('shows/follow/{show}', [ShowController::class, 'followShow'])->name('show.follow');
