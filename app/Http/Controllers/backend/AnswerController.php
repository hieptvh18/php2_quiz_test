<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Quiz;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    // thêm câu trả lời

    public function addAnswer(Request $rq,$id){
        // get data
        $question = Question::select('questions.*')->where('id',$id)->first();
        $question_id = $id;
        $quiz_id = Question::select('quizs.id')
                    ->join('quizs','quizs.id','questions.quiz_id')
                    ->where('questions.id',$question_id)->first();
        $question_name = Question::select('name')->where('id',$id)->first(); 
        if($rq->isMethod('post')){
            $rq->validate([
                'content'=>'required|max:300',
                'is_correct'=>'required'
            ]);
            // add answers
            $ans = new Answer();

            $ans->fill($rq->all());

            $save = $ans->save();
            if($save){
                $countAns = DB::table('questions')
                                ->select('answers.*')
                                ->join('answers','answers.question_id','=','questions.id')
                                ->where('question_id',$question_id)
                                ->count();

                return back()->with('msg','Thêm thành công '.$countAns.' câu trả lời!');
            }else{
                return back()->with('fail','Thêm đáp án thất bại! Vui lòng thử lại!');
            }


        }

        return view('backend.quizs.add-answer',compact('question_id','question_name','question','question_id','quiz_id'));
    }

    // action remove answer
    public function removeAnswer($id){

        // code
        if(Answer::find($id)){

            Answer::destroy($id);
            return back()->with('msg','Xóa thành công 1 đáp án1');
        }
        return back()->with('fail','Xóa thất bại, thử lại!');
    }
}
