<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QaList extends Model
{
    //问答内容管理
    public $timestamps = false;
    protected $fillable = ['title','content','user_id','cate_id','good_num','issue_time'];
}
