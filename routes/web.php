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

});

// Dashboard
Route::middleware('sessionValidation')->group(function(){
    Route::controller(LocationControl::class)->group(function(){

        //get dashboard data when root.
        Route::get('/dashboard','index');

        //post from dashboard.
        Route::post('/addPackage','create');

        //delete from dashboard.
        Route::get('/delete/{id}','destroy');

        //get dashboard data.
        Route::get('/dashboard/{id}','indexChild');

        //go to dashboard.
        Route::get('/dash','dash');

        //go back to prev node.
        Route::get('/go/back','goBack');

        //set session to pass to form.
        Route::get('/session/set/{id}','setSession');

        //delete set session from form.
        Route::get('/session/delete','resetSession');

        //lock file.
        Route::post('/lock/file/{id}','lockFile');

    });
});


//Route::get('/user', [UserControl::class,'getUser']);

Route::get('/tools', function () {
    return view('tools')->middleware('sessionCheck');
});
