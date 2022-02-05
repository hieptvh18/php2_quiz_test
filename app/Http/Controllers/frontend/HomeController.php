<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    //home
    public function index(Request $rq){
        // get data
        $listCourse = DB::table('subjects')
        ->leftJoin('quizs','subjects.id','=','quizs.subject_id')
        ->select('subjects.*',DB::raw('count(quizs.id) as countQuiz'))
        ->groupBy('subjects.name','subjects.avatar','subjects.author_id')
        ->get();

        $page_title = 'Trang chủ / Khóa học của bạn';

        // kq tìm kiếm
        if($rq->input('key_search')){
            $key = $rq->input('key_search');
            $page_title = 'Kết quả tìm kiếm: '.'"'.$key.'"';

            $listCourse = DB::table('subjects')
            ->leftJoin('quizs','subjects.id','=','quizs.subject_id')
            ->select('subjects.*',DB::raw('count(quizs.id) as countQuiz'))
            ->where('subjects.name','LIKE',"%$key%")
            ->groupBy('subjects.name','subjects.avatar','subjects.author_id')
            ->get();
        }
        return view('frontend.homepage.home',['listCourse'=>$listCourse,'page_title'=>$page_title]);
    }
}
