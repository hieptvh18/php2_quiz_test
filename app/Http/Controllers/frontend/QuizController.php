<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    // màn hình làm quiz của client
    public function index($id){
        // get data
        

        return view('frontend.quizs.quiz-detail');
    }
}
