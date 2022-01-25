<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Subject;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{

    // list quuiz
    public function detail($id){
        // get data
        $quizName = Quiz::select('name')->where('id',$id)->first();
        $quizId = $id;
        // danh sách câu hỏi + đáp án của quiz;
        $contentQuiz = DB::table('quizs')
                            ->select('questions.*','answers.*')
                            ->join('questions','quizs.id','=','questions.quiz_id')
                            ->join('answers','answers.question_id','=','questions.id')
                            ->where('quizs.id',$id)->get();

        return view('frontend.quizs.quiz-detail',compact('contentQuiz','quizName','quizId'));

    }

    //add quiz
    public function create(Request $rq){
        // get data
        $listSubject = Subject::all();
        if($rq->isMethod('post')){
            $rq->validate([
                'name'=>'required|max:100|unique:quizs',
                'subject_id'=>'required',
                'duration_minutes'=>'required',
                'start_time'=>'required',
                'end_time'=>'required',
            ]); 

            $quizModel = new Quiz();
            $quizModel->fill($rq->all());
            $save = $quizModel->save();

            if($save){
                return back()->with('msg','Thêm thành công 1 quiz mới!');
            }
            return back()->with('fail','Thêm thất bại, vui lòng thử lại!');
        }

        return view('backend.quizs.create',compact('listSubject'));
    }

    // edit
    public function edit(Request $rq,$id)
    {

    }

    // remove
    public function remove($id)
    {
        
    }

   
}
