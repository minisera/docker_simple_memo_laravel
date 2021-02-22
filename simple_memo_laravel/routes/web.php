<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/','App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login.index');
Route::get('/user','App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('user.register');
Route::post('/user/register', 'App\Http\Controllers\Auth\RegisterController@register')->name('user.exec.register');
Route::get('/memo',function() {
    return view("memo");
})->name('memo.index');
Auth::routes();


