<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public $fillable = ['name', 'display_name', 'description'];
    //过滤时间戳
    public $timestamps = false;
    //关系到权限表
    public function permission()
    {
        return $this->belongsToMany('App\Models\Permission');
    }
}
