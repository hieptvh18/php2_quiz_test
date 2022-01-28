<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;

class QuestionController extends Controller
{
    //
     // thêm câu hỏi
     public function addQuestion(Request $rq,$id){
        // get data
        $quizName = Quiz::select('name')->where('id',$id)->first();
        $quizId = $id;

        if($rq->isMethod('post')){
            $rq->validate([
                'name'=>'required|min:3|max:300|unique:questions',
            ]);

            $ques = new Question();
            $ques->fill($rq->all());

            // ko bắt buộc câu hỏi p có img
            if($rq->file('img')){
                $fileName = uniqid() . '-question' . time() . '.' . $rq->img->extension();
                $rq->file('img')->move(public_path('uploads'), $fileName);
                $ques->img = $fileName;
           }

            $save = $ques->save();

            if($save){
                return redirect()->route('admin.quiz.add-answer',['id'=>$ques->id]);
            }else{
                return back()->with('fail','Thêm thất bại, vui lòng thử lại sau!');
            }

        }

        return view('backend.quizs.add-question',compact('quizName','quizId'));
    }


    // remove

    public function removeQuestion($id){

        // code
        if(Question::find($id)){
            // xóa đáp án
            $listAns = Question::select('answers.id')->join('answers','answers.question_id','=','questions.id')->where('questions.id',$id)->get();
            
            foreach($listAns as $item){
                Answer::destroy($item->id);
            }
            // xóa câu hỏi
            Question::destroy($id);

            return back()->with('msg','Xóa thành công 1 câu hỏi!');
        }
        return back()->with('fail','Xóa không thành công!');
    }
}
