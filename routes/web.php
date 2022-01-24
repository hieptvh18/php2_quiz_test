<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\frontend\HomeController;
use  App\Http\Controllers\frontend\SubjectController;
use  App\Http\Controllers\frontend\AccountController;
use  App\Http\Controllers\frontend\QuizController;

// admin
use  App\Http\Controllers\backend\DashboardController;

// ==========login & register=========
Route::any('/register',[AccountController::class,'register'])->name('register');
Route::any('/login',[AccountController::class,'login'])->name('login');
Route::any('/logout',[AccountController::class,'logout'])->name('logout');

//=========== define route frontend ==========
// group all route yêu cầu login
Route::middleware(['AuthLogin:class'])->group(function(){

    Route::get('/',[HomeController::class,'index'])->name('client.home') ;
    // group route client
    Route::prefix('join')->group(function(){
    
        // home
        Route::get('/',[HomeController::class,'index'])->name('client.home');
        
        // màn hình danh sách các bài quiz của từng môn
        Route::get('subject/detail/{id?}',[SubjectController::class,'detail'])->where(['id' => '[0-9]+'])->name('client.subject.list');
        
        // màn hình làm quiz
        Route::any('quiz/detail/{id?}',[QuizController::class,'index'])->name('client.quiz.detail');
    });
    
    //=========== define route backend ==========
    
    // => handle middleware check login
    
    Route::prefix('admin')->group(function(){
    
        Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    
    });
});


