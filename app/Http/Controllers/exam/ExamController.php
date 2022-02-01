<?php

namespace App\Http\Controllers\exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Quiz;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

// use App\Helper\Helper;

class ExamController extends Controller
{
    //action làm quiz của student

    public function exam(Request $rq,$id)
    {
        // get data
        $quiz = Quiz::select('quizs.*')->where('id', $id)->first();
        $quizId = $id;
        // tg bắt đầu làm
        $start_time = Carbon::now()->toDateTimeString(); 
        
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

        return view('frontend.exam.exam', compact('quiz', 'listQues','quizId','start_time'));
    }

    // handle result post
    public function examPost(Request $rq)
    {
        // save info examer
        // code....
        if($rq->isMethod('post')){
            // dd($rq->input());
            // user id
            if(session()->has('student')){
                $student_id = session('student')->id;
            }else{
                $student_id = session('teacher')->id;
            }

            // quiz_id
            $quiz_id=$rq->input('quiz_id');

            // list ques of quiz_id
            $listQues = Question::select('questions.*')->where('quiz_id',$quiz_id)->get();

            // ngày làm <-> kết thúc
            $start_time = $rq->input('start_time');
            $end_time = Carbon::now()->toDateTimeString(); 

            // tính câu chính xác(1 là ko làm câu nào 2 là có làm)->nếu input answer = null cả thì cho nó 0 điểm về chỗ
            $true = 0;
            $false = 0;
            foreach($listQues as $key => $q){
                // list option
                $listAns = Answer::select('answers.*')->where('question_id',$q->id)->get(); 
                
            }

            // tính điểm mốc của mỗi câu hỏi, cho thang điểm 10
            $minimumScore = 10/$listQues->COUNT();

            // tính số câu hỏi chính xác  r x với pointMin;



        }

    }

}
