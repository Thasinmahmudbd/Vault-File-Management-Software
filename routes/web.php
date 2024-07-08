<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\UserControl;
use App\http\Controllers\LocationControl;
use App\http\Middleware\loginAuth;



Route::get('/', function () {
    return view('index');
});

// Login
Route::controller(UserControl::class)->group(function(){

    Route::post('/checkCode','login');

    Route::get('/logout','logOut');

    Route::get('/delete/{id}','/');

});

// Dashboard
Route::controller(LocationControl::class)->group(function(){

    //Show dashboard data.
    Route::get('/dashboard','index');

    //post from dashboard.
    Route::post('/addPackage','create');

});


//Route::get('/user', [UserControl::class,'getUser']);

Route::get('/tools', function () {
    return view('tools')->middleware('sessionCheck');
});
