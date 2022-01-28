<?php
use App\Models\Answer;


// get list answer of question
if (!function_exists('getAnswer')) {
    function getAnswer($id)
    {
        $result = Answer::select('answers.*')->where('answers.question_id', $id)->get();
        return $result;
    }
}
