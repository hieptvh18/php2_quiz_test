<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Quiz;

class AnswerController extends Controller
{
    // thêm câu trả lời

    public function addAnswer(Request $rq,$id){
        // get data
        $question_id = $id;
        $question_name = Question::select('name')->where('id',$id)->first(); 
        $quizName = 'Để ngày 26 lấy';
        if($rq->isMethod('post')){
            $rq->validate([

            ]);
            // add answers
            $ans = new Answer();

            // ...


        }

        return view('backend.quizs.add-answer',compact('question_id','quizName','question_name'));
    }
}
