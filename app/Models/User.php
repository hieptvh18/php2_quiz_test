<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model 
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = ['name','email','password','avatar','role_id','google_id'];

    // lrv mong đợi field created_at & updated_at
    public $timestamps = false;

}
