<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // define table
    protected $table = 'subjects';
    protected $fillable = ['name','author_id'];
    public $timestamps = false;
}
