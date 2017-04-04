<?php
namespace App\Models;
class RTResule
{
    //定义属性
    public $status;
    public $message;
    //荣连云储存状态
    public function toJson()
    {
        return json_encode($this, JSON_UNESCAPED_UNICODE);
    }
}