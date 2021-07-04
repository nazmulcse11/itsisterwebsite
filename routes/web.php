<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SliderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
    Route::get('/dashboard',[DashboardController::class,'dashboard']);
    Route::get('/slider',[SliderController::class,'slider']);

    Route::match(['get','post'],'/add-slider',[SliderController::class,'addSlider']);

});
