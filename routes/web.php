<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\AboutController;


Route::get('/', function () {
    return view('welcome');
});



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/register', function () {
    return redirect('/');
});


//Admin routes
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    //dashboard
    Route::get('/dashboard',[DashboardController::class,'dashboard']);
    // show slider 
    Route::get('/slider',[SliderController::class,'slider']);
    
    //add slider
    Route::match(['get','post'],'/add-slider',[SliderController::class,'addSlider']);
    //edit slider
    Route::match(['get','post'],'/edit-slider/{id}',[SliderController::class,'editSlider']);
    //delete slider
    Route::get('/delete-slider/{id}',[SliderController::class,'deleteSlider']);
    //update slider status
    Route::get('/update-slider-status/{id}',[SliderController::class,'updateSliderStatus']);
    //view slider details
    Route::get('/view-slider-details/{id}',[SliderController::class,'viewSliderDetails']);
   

    // show about 
    Route::get('/about',[AboutController::class,'about']);

    //add about
    Route::match(['get','post'],'/add-about',[AboutController::class,'addAbout']);

     //edit about
    Route::match(['get','post'],'/edit-about/{id}',[AboutController::class,'editAbout']);

    //delete about
    Route::get('/delete-about/{id}',[AboutController::class,'deleteAbout']);

    //view about details
    Route::get('/view-about-details/{id}',[AboutController::class,'viewAboutDetails']);


});
