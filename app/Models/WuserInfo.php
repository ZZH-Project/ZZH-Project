<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WuserInfo extends Model
{
    //用户信息
    public $timestamps =false;
    public $fillable = ['pic','sex','wuid','wusername'];
}
