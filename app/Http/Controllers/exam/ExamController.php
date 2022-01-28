<?php

namespace App\Http\Controllers\exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Quiz;
use Illuminate\Support\Facades\DB;

// use App\Helper\Helper;

class ExamController extends Controller
{
    //action làm quiz của student

    public function exam(Request $rq,$id)
    {
        // get data
        $quiz = Quiz::select('quizs.*')->where('id', $id)->first();
        $quizId = $id;
        
        if(!$quiz){
            return back()->with('fail','Quiz không tồn tại');
        }

        // kiểm tra is_shuffle xem có xáo trộn câu hỏi hay không
        $isShuffle = Quiz::select('is_shuffle')->where('id', $id)->first();
        if ($isShuffle->is_shuffle == 1) {
            // xáo
            $listQues = Question::select('questions.*')->where('quiz_id',$id)
                                    ->orderBy(DB::raw('RAND()'))    
                                    ->get();
        } else {
            // ko xáo
            $listQues = Question::select('questions.*')->where('quiz_id',$id)->get();
        }

        return view('frontend.exam.exam', compact('quiz', 'listQues','quizId'));
    }

    // handle result post
    public function examPost(Request $rq)
    {
        // save info examer
        // code....
        if($rq->isMethod('post')){
            // user id
            dd($rq->input());
            if(session()->has('student')){
                die('student');
            }else{
                die('teacher');

            }

            // quiz_id
            $quiz_id=$rq->input('quiz_id');

            // ngày làm <-> kết thúc
            $start_time = date('Y-m-d H:i:s');
            $end_time = date('Y-m-d H:i:s');

            // tính score(1 là ko làm câu nào 2 là có làm)
           



        }

    }

  
}
