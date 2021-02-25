<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MemoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/',[LoginController::class,'showLoginForm'])->name('login.index');
Route::get('/user',[RegisterController::class,'showRegistrationForm'])->name('user.register');
Route::post('/user/register', [RegisterController::class,'register'])->name('user.exec.register');
Route::group(['middleware' => ['auth']],function(){
    Route::get('/memo',[MemoController::class,'index'])->name('memo.index');
    Route::get('/memo/add',[MemoController::class,'add'])->name('memo.add');
});
Auth::routes();


