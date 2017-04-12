<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyQuestion extends Model
{
    //忘记密码问题
    public $timestamps = false;
    public $fillable = ['question','answer','wuid'];

}
