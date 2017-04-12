<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QaComment extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['qa_id','user_id','comment_id','content','good_num','is_show','issue_time'];
}
