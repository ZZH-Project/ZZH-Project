<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QaCollect extends Model
{
    //问答收藏
    public $timestamps = false;
    protected $fillable = ['qa_id','wuser_id'];
}
