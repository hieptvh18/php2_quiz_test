<?php

namespace App\Http\Controllers\handle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentQuiz;


class AjaxController extends Controller
{
    // xử lí trả về dữ liệu bằng Ajax
    // hàm preview img
    public function previewImg(Request $rq){
        //  code
        

    }

    // lọc user admin
    public function filter_score(Request $rq){

        if($rq->ajax()){
            // 
            $filter_option = $rq->input('filter_option');
            $id = $rq->input('quiz_id');

            $quizs = StudentQuiz::select('users.name as fullname','users.email','student_quizs.score','student_quizs.start_time as start_time_exam','student_quizs.end_time as end_time_exam','quizs.name')
            ->join('quizs','student_quizs.quiz_id','quizs.id')
            ->join('users','users.id','student_quizs.student_id')
            ->join('student_quiz_detail','student_quiz_detail.student_quiz_id','student_quizs.id')
            ->where('student_quizs.quiz_id',$id);

            if($filter_option == 1){
                // cao->thấp
                $quizs = $quizs->orderByDesc('student_quizs.score');
                
            }else{
                // thấp ->cao
                $quizs = $quizs->orderBy('student_quizs.score','asc');


            }

            $quizs = $quizs->distinct()->get();

        }
        // handle
        


        return $quizs;
    }
}
