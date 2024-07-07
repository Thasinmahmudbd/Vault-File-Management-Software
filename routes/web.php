<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\UserControl;
use App\http\Middleware\loginAuth;



Route::get('/', function () {
    return view('index');
});

// Login
Route::controller(UserControl::class)->group(function(){

    Route::post('/checkCode','login');

    Route::get('/logout','logOut');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('sessionCheck');

Route::get('/user', [UserControl::class,'getUser']);

Route::get('/tools', function () {
    return view('tools');
});

Route::controller(UserControl::class)->group(function(){

    Route::get('/login','login');

});
