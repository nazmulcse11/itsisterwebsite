<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\AdminController;


Route::get('/', function () {
    return view('welcome');
});



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/register', function () {
    return redirect('/');
});


//Backend routes start

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    //dashboard
    Route::get('/dashboard',[DashboardController::class,'dashboard']);
    // show slider 
    Route::get('/slider',[SliderController::class,'slider']);
    
    //Slider Module
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
   

    //About Module
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


    //Service Module
    // show service 
    Route::get('/service',[ServiceController::class,'service']);
     //add service
     Route::match(['get','post'],'/add-service',[ServiceController::class,'addService']);
     //edit service
    Route::match(['get','post'],'/edit-service/{id}',[ServiceController::class,'editService']);
     //delete service
    Route::get('/delete-service/{id}',[ServiceController::class,'deleteService']);
     //view service details
    Route::get('/view-service-details/{id}',[ServiceController::class,'viewServiceDetails']);
    //update service status
    Route::get('/update-service-status/{id}',[ServiceController::class,'updateServiceStatus']);


    //Course Module
    // show course 
    Route::get('/courses',[CourseController::class,'course']);
    //add course
    Route::match(['get','post'],'/add-course',[CourseController::class,'addCourse']);
    //edit course
    Route::match(['get','post'],'/edit-course/{id}',[CourseController::class,'editCourse']);
    //delete course
    Route::get('/delete-course/{id}',[CourseController::class,'deleteCourse']);
     //view course details
     Route::get('/view-course-details/{id}',[CourseController::class,'viewCourseDetails']);
     //update course status
    Route::get('/update-course-status/{id}',[CourseController::class,'updateCourseStatus']);

     //Post Module
    // show post 
    Route::get('/posts',[PostController::class,'post']);
    //add post
    Route::match(['get','post'],'/add-post',[PostController::class,'addPost']);
    //edit post
    Route::match(['get','post'],'/edit-post/{id}',[PostController::class,'editPost']);
    //delete post
    Route::get('/delete-post/{id}',[PostController::class,'deletePost']);
    //update post status
    Route::get('/update-post-status/{id}',[PostController::class,'updatePostStatus']);
     //view post details
     Route::get('/view-post-details/{id}',[PostController::class,'viewPostDetails']);

    //User/Admin Module
    // show user 
    Route::get('/user',[AdminController::class,'user']);
    //add post
    Route::match(['get','post'],'/add-user',[AdminController::class,'addUser']);

     //delete post
     Route::get('/delete-user/{id}',[AdminController::class,'deleteUser']);
});

//Backend routes end
