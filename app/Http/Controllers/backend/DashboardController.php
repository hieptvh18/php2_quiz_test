<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Subject;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // màn hình dashboard thống kê website
    public function index(Request $rq){
        // get data
        $idUser = $rq->session()->get('teacher');
        $listCourse = Subject::where('author_id',$idUser->id)->get();     

        return view('backend.dashboard.index',compact('listCourse'));
    }
}
