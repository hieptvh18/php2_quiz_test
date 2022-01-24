<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\Quizs;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    //detail

    public function detail($id){
        // get data
        // nếu tồn tại sp thì ms get ko thì rd
        if(DB::table('subjects')->where('id',$id)->exists()){
            $myQuiz = DB::table('quizs')->where('subject_id',$id)->get();

            $quizTitle = DB::table('subjects')
                            ->select('name')
                            ->where('id',$id)
                            ->first();

           
            
        }else{
            // ko tồn tại
           return redirect(route('client.home'))->with('msg','Không tồn tại sản phẩm');
        }


        return view('frontend.subjects.list-quiz',compact('myQuiz','quizTitle'));
    }

    // 
}
