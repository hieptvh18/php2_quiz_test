<?php

namespace App\Http\Controllers\exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Quiz;
use App\Models\StudentQuiz;
use App\Models\StudentQuizDetail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

// use App\Helper\Helper;

class ExamController extends Controller
{
    //action làm quiz của student

    public function examPreview(Request $rq, $id)
    {
        // get data
        $quiz = Quiz::select('quizs.*')->where('id', $id)->first();
        $quizId = $id;
        // tg bắt đầu làm
        $start_time = Carbon::now()->toDateTimeString();

        if (!$quiz) {
            return back()->with('fail', 'Quiz không tồn tại');
        }

        // kiểm tra is_shuffle xem có xáo trộn câu hỏi hay không
        $isShuffle = Quiz::select('is_shuffle')->where('id', $id)->first();
        if ($isShuffle->is_shuffle == 1) {
            // xáo
            $listQues = Question::select('questions.*')->where('quiz_id', $id)
                ->orderBy(DB::raw('RAND()'))
                ->get();
        } else {
            // ko xáo
            $listQues = Question::select('questions.*')->where('quiz_id', $id)->get();
        }

        return view('frontend.exam.exam', compact('quiz', 'listQues', 'quizId', 'start_time'));
    }

    // handle result post
    public function examPost(Request $rq)
    {
        // save info examer
        if ($rq->isMethod('post')) {
            $dataRequest = $rq->all();
            // user id
            $student_id = session('student') ? session('student')->id : session('teacher')->id;
            $quiz_id = $rq->input('quiz_id');
            $listQues = Question::select('questions.*')->where('quiz_id', $quiz_id)->get();
            $start_time = $rq->input('start_time');
            $end_time = Carbon::now()->toDateTimeString();
            $arrQues = [];
            $arrAns = [];

            // tính điểm mốc của mỗi câu hỏi trong quiz, cho thang điểm 10
            $minimumScore = 10 / $listQues->COUNT();

            // tính câu chính xác(1 là ko làm câu nào 2 là có làm)->nếu input answer = null cả thì cho nó 0 điểm về chỗ
            $true = 0;
            $false = 0;

            for ($n = 1; $n <= count($dataRequest); $n++) {

                // lặp ra các câu hỏi
                if (isset($dataRequest['questions_id' . $n]) && isset($dataRequest['answers' . $n])) {

                    // tìm answer true của từng câu hỏi
                    $answer_true = Question::select('answers.id')
                        ->join('answers', 'answers.question_id', 'questions.id')
                        ->where('answers.is_correct',1)
                        ->where('questions.id',$dataRequest['questions_id'.$n])->first();

                    // check true fasle
                    if ($answer_true->id == $dataRequest['answers' . $n]) {
                        // true
                        $true++;
                    } else {
                        $false++;
                    }
                }
            }

            // tính điểm * vs điểm mốc
            $total_point = $minimumScore * $true;

            // check xem ng này đã từng làm quiz này chưa, rồi thì xóa cái cũ lưu cái mới
            $userExist = StudentQuiz::where('quiz_id',$quiz_id)
                            ->where('student_id',$student_id)->first();
            if($userExist){
                StudentQuiz::destroy($userExist->id);   
            }

            // lưu thông tin vô student_quiz
            $student_quiz = new StudentQuiz;
            $student_quiz->student_id = $student_id;
            $student_quiz->quiz_id = $quiz_id;
            $student_quiz->start_time = $start_time;
            $student_quiz->end_time = $end_time;
            $student_quiz->score = $total_point;

            $student_quiz->save();
            
            // lưu vô student_quiz_detail
            // lưu đúng nếu user trả lời hết các câu hỏi
            
            for ($n = 1; $n <= count($dataRequest); $n++) {
                // lặp ra các câu hỏi lưu vào mảng rỗng -> up vào table student_quiz_detail
                if(isset($dataRequest['questions_id' . $n]) ){

                    array_push($arrQues,$dataRequest['questions_id' . $n]);
                }
                if ( isset($dataRequest['answers' . $n])) {
                    // lưu vô mảng 
                    array_push($arrAns,$dataRequest['answers' . $n]);
                }
            }
            $student_quiz_detail = new StudentQuizDetail;
            foreach($arrQues as $key=>$item){
                $student_quiz_detail->student_quiz_id = $student_quiz->id;
                $student_quiz_detail->question_id = $item;
                
                    $student_quiz_detail->answer_id = $arrAns[$key];

                }
                $student_quiz_detail->save();


            return redirect(route('exam.result',['id'=>$quiz_id]))->with('msg','Đã hoàn thành bài quiz');
        }
    }

    // màn hình kết quả
    public function examResult(Request $rq,$id){
        // get data
        $userId = session('student') ? session('student')->id : session('teacher')->id;
        $result = StudentQuiz::where('student_id',$userId)->where('quiz_id',$id)->get();

        return view('exam.exam-result',compact('result'));
    }

    // màn hình chi tiết kết quả
    public function examDetail(){
        
    }

    // màn hình lịch sử bài quiz đã làm
    public function examDone(){
        // get data
        $userId = session('student') ? session('student')->id : session('teacher')->id;
        $testDone = StudentQuiz::select('student_quizs.start_time as exam_date','student_quizs.score','quizs.*')
                        // ->join('student_quiz_detail','student_quiz_detail.student_quiz_id','student_quizs.id')
                        ->join('quizs','quizs.id','student_quizs.quiz_id')
                        ->orderBy('student_quizs.id','desc')
                        ->where('student_quizs.student_id',$userId)->get();

        return view('exam.exam-history',compact('testDone'));
    }
}
