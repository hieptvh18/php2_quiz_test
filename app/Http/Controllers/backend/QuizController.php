<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Subject;
use App\Models\Quiz;

class QuizController extends Controller
{

    // list quuiz
    public function list(){
        // get data

        return view('');

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
}
