<?php
namespace App\Models;
class RTResule
{
    //定义属性
    public $status;
    public $message;

    public function toJson()
    {
        return json_encode($this, JSON_UNESCAPED_UNICODE);
    }
}