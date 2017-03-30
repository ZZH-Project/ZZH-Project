<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    public $fillable = ['name', 'parent_id','display_name', 'description'];
    //关闭时间戳
    public $timestamps = false;
}
