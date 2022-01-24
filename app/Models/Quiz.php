<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizs';

    protected $fillable = ['name','subject_id','duration_minutes','start_time','end_time','status','is_shuffle'];

    public $timestamps = false;
}
