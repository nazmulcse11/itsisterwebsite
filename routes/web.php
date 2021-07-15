<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\SectionController;


// Route::get('/', function () {
//     return view('welcome');
// });



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/register', function () {
    return redirect('/');
});


//Backend routes start

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    //dashboard
    Route::get('/dashboard',[DashboardController::class,'dashboard']);
    Route::get('/view-contact-details/{id}',[DashboardController::class,'viewContactDetails']);
    Route::get('/delete-contact/{id}',[DashboardController::class,'deleteContact']);
    Route::get('/delete-email/{id}',[DashboardController::class,'deleteEmail']);

    //Slider Module
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

    //Client Module
    // show client 
    Route::get('/client',[ClientController::class,'client']);
    //add client
    Route::match(['get','post'],'/add-client',[ClientController::class,'addClient']);
    //edit client
    Route::match(['get','post'],'/edit-client/{id}',[ClientController::class,'editClient']);
    //delete client
    Route::get('/delete-client/{id}',[ClientController::class,'deleteClient']);
   

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

     //delete user
     Route::get('/delete-user/{id}',[AdminController::class,'deleteUser']);
     //update user details
     Route::match(['get','post'],'/update-details/{id}',[AdminController::class,'updateDetails']);
     //update user password
     Route::match(['get','post'],'/update-password/{id}',[AdminController::class,'updatePassword']);

     //Section Module
    // show section 
    Route::get('/section',[SectionController::class,'section']);
    //add section
    Route::match(['get','post'],'/add-section',[SectionController::class,'addSection']);
    //edit section
      Route::match(['get','post'],'/edit-section/{id}',[SectionController::class,'editSection']);
    //delete section
     Route::get('/delete-section/{id}',[SectionController::class,'deleteSection']);
     //view section details
     Route::get('/view-section-details/{id}',[SectionController::class,'viewSectionDetails']);

    // /Team Module
    // show team 
    Route::get('/team',[TeamController::class,'team']);
    //add slider
    Route::match(['get','post'],'/add-team',[TeamController::class,'addTeam']);
    //edit slider
    Route::match(['get','post'],'/edit-team/{id}',[TeamController::class,'editTeam']);
    //delete slider
    Route::get('/delete-team/{id}',[TeamController::class,'deleteTeam']);
    //view slider details
    Route::get('/view-team-details/{id}',[TeamController::class,'viewTeamDetails']);
});

//Backend routes end

//Frontend routes start
Route::get('/', [App\Http\Controllers\Frontend\IndexController::class, 'index']);
Route::get('/about-us', [App\Http\Controllers\Frontend\IndexController::class, 'aboutUs']);
Route::get('/service/{url}', [App\Http\Controllers\Frontend\IndexController::class, 'service']);
Route::get('/blog/all-posts', [App\Http\Controllers\Frontend\IndexController::class, 'blog']);
Route::get('/blog/{url}', [App\Http\Controllers\Frontend\IndexController::class, 'postDetails']);
Route::post('/subscribe-us', [App\Http\Controllers\Frontend\IndexController::class, 'subscribeUs']);
Route::match(['get','post'],'/contact-us', [App\Http\Controllers\Frontend\IndexController::class, 'contactUs']);

//Frontend routes end
