<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\hello\HelloController;
use App\Http\Controllers\home\HomeController;

Route::get('hello',[HelloController::class, 'index'])->name('hello');
Route::post('hello',[HelloController::class, 'post']);

Route::get('home',[HomeController::class, 'index'])->name('home');
Route::post('home',[HomeController::class, 'post']);

Route::get('home/add',[HomeController::class, 'add'])->name('home.add');
Route::post('home/add',[HomeController::class,'create']);

Route::get('home/del',[HomeController::class, 'del'])->name('home.del');
Route::post('home/del',[HomeController::class, 'delpost']);

Route::get('home/delpage',[HomeController::class,'delpage'])->name('home.delpage');
Route::post('home/delpage',[HomeController::class,'remove']);

Route::get('home/no',[HomeController::class,'no'])->name('home.no');
Route::get('home/noo',[HomeController::class,'noo'])->name('home.noo');

Route::get('home/reply/{id}',[HomeController::class,'reply'])->name('home.reply');
Route::post('home/reply/{id}',[HomeController::class,'replypost']);

Route::get('home/site/{name}',[HomeController::class,'homesite'])->name('home.site');
Route::post('home/site/{name}',[HomeController::class,'posthomesite']);

Route::get('home/edit',[HomeController::class,'edit'])->name('home.edit');
Route::post('home/edit',[HomeController::class,'editpost']);

Route::get('home/update',[HomeController::class,'update'])->name('home.update');
Route::post('home/update',[HomeController::class,'updatepost'])->name('home.updatepost');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('home/good/{id}',[HomeController::class,'good'])->name('home.good');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('home/follow/{meName}/{itemName}',[HomeController::class, 'follow'])->name('follow');
Route::get('home/unfollow/{meName}/{itemName}',[HomeController::class, 'unfollow'])->name('unfollow');

Route::get('home/message/{id}', [HomeController::class, 'message'])->name('home.message');
Route::post('home/message/{id}', [HomeController::class, 'messagepost']);

Route::get('home/search',[HomeController::class,'search'])->name('home.search');

require __DIR__.'/auth.php';
