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

    public function exam($id)
    {
        // get data
        $quiz = Quiz::select('name','duration_minutes')->where('id', $id)->first();
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
        

        die('đã post');
    }

  
}
