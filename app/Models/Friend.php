<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    //友情链接
    public $timestamps = false;
    public $fillable = ['friend_name','friend_link'];
}
