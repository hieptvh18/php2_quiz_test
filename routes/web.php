<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\frontend\HomeController;
use  App\Http\Controllers\frontend\SubjectController;
use  App\Http\Controllers\auth\AccountController;
use  App\Http\Controllers\frontend\QuizController;
use  App\Http\Controllers\exam\ExamController;

// admin
use  App\Http\Controllers\backend\DashboardController;
use  App\Http\Controllers\backend\SubjectController as SubjectAdminController;
use  App\Http\Controllers\backend\QuizController as QuizAdminController;
use  App\Http\Controllers\backend\QuestionController;
use  App\Http\Controllers\backend\AnswerController;

// ajax
use App\Http\Controllers\handle\AjaxController;

// ==========login & register=========
Route::any('/register',[AccountController::class,'register'])->name('register');
Route::any('/login',[AccountController::class,'login'])->name('login');
Route::any('/logout',[AccountController::class,'logout'])->name('logout');

//=========== define route frontend ==========
// group all route yêu cầu login

Route::middleware(['AuthLogin:class'])->group(function(){

    Route::get('/',[HomeController::class,'index'])->name('client.home') ;

    // exam result
    Route::get('exam/result/{id}',[ExamController::class,'examResult'])->name('exam.result');

    
    // group route client
    Route::prefix('join')->group(function(){
    
        // home
        Route::get('/',[HomeController::class,'index'])->name('client.home');

        // tìm kiếm
        Route::get('/',[HomeController::class,'index'])->name('search.quiz');
        
        // màn hình danh sách các bài quiz của từng môn
        Route::get('subject/detail/{id?}',[SubjectController::class,'detail'])->where(['id' => '[0-9]+'])->name('client.subject.list');
        
        // màn hình làm quiz
        Route::any('quiz/exam/{id?}',[ExamController::class,'examPreview'])->name('client.quiz.exam');
        
        // ctrl gửi đáp án quiz
        Route::any('exam/post',[ExamController::class,'examPost'])->name('client.exam.post');

    });
    
    
    //=========== define route backend ==========
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

            // màn hình danh sách các bài quiz của từng môn
            Route::get('/list-quiz/{id}',[SubjectAdminController::class,'listQuiz'])->where(['id' => '[0-9]+'])->name('admin.subject.list-quiz');
        });

        // Quizs controller
        Route::prefix('quizs')->group(function(){

            // list
            Route::any('/list',[QuizAdminController::class,'list'])->name('admin.quiz.list');

            // manage
            Route::any('/manage/{id}',[QuizAdminController::class,'resultExam'])->name('admin.quiz.result');

            // add
            Route::any('/create',[QuizAdminController::class,'create'])->name('admin.quiz.add');

            // edit
            Route::any('/edit/{id}',[QuizAdminController::class,'edit'])->name('admin.quiz.edit');
            
            // remove quiz
            Route::any('/remove/{id}',[QuizAdminController::class,'remove'])->name('admin.quiz.remove');
            
            // quiz detail
            Route::get('/quiz-detail/{id?}',[QuizAdminController::class,'detail'])->name('admin.quiz.detail');

            // add quuestion
            Route::any('/add-question/{id}',[QuestionController::class,'addQuestion'])->name('admin.quiz.add-question');

            // remove quuestion
            Route::any('/remove-question/{id}',[QuestionController::class,'removeQuestion'])->name('admin.quiz.remove-question');

             // add answer
             Route::any('/add-answer/{id}',[AnswerController::class,'addAnswer'])->name('admin.quiz.add-answer');
             
              // add answer
              Route::any('/remove-answer/{id}',[AnswerController::class,'removeAnswer'])->name('admin.quiz.remove-answer');

        });




    
    });

    // ============================route handle ajax==============
    Route::post('ajax/previewImg',[AjaxController::class,'previewImg'])->name('ajax.previewImg');
});


