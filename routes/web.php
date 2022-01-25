<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\frontend\HomeController;
use  App\Http\Controllers\frontend\SubjectController;
use  App\Http\Controllers\frontend\AccountController;
use  App\Http\Controllers\frontend\QuizController;

// admin
use  App\Http\Controllers\backend\DashboardController;
use  App\Http\Controllers\backend\SubjectController as SubjectAdminController;
use  App\Http\Controllers\backend\QuizController as QuizAdminController;
use  App\Http\Controllers\backend\QuestionController;
use  App\Http\Controllers\backend\AnswerController;

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

        // Subject
        Route::prefix('subject')->group(function(){

            // insert
            Route::any('/add',[SubjectAdminController::class,'create'])->name('admin.subject.add');
            
            // remove
            Route::get('/remove/{id?}',[SubjectAdminController::class,'remove'])->name('admin.subject.del');
            
            // edit
            Route::any('/edit/{id?}',[SubjectAdminController::class,'edit'])->name('admin.subject.edit');
        });

        // Quizs controller
        Route::prefix('quizs')->group(function(){

            // list
            Route::any('/create',[QuizAdminController::class,'create'])->name('admin.quiz.add');
            
            // manage quiz()
            Route::get('/quiz-detail/{id?}',[QuizAdminController::class,'detail'])->name('admin.quiz.detail');

            // add quuestion
            Route::any('/add-question/{id}',[QuestionController::class,'addQuestion'])->name('admin.quiz.add-question');

             // add answer
             Route::any('/add-answer/{id}',[AnswerController::class,'addAnswer'])->name('admin.quiz.add-answer');

        });
    
    });
});


