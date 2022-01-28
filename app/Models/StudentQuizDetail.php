<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentQuizDetail extends Model
{
    use HasFactory;
    protected $table = 'student_quiz_detail';

    protected $fillable = ['student_quiz_id', 'question_id'	,'answer_id'];

    public $timestamps = false;
}
