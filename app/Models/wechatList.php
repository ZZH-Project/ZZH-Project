<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class wechatList extends Model
{
    protected $fillable = ['user_id','cate_id','wechat_id','wechat_name','content'];
}
