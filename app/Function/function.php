<?php
/*
 * 自定义函数库
 */
/*
 * 权限的树状图
 */
function getTree($permissions, $id = 0, $count = 0)
{
    static $res = array();
    foreach ($permissions as $permission) {
        if ($permission->parent_id == $id) {
            $permission->count = $count;
            $res[] = $permission;
            getTree($permissions, $permission->id, $count+1);
        }
    }
    return $res;
}

function getNav($permissions, $id = 0, $count = 0)
{
    static $navs = array();
    foreach ($permissions as $permission) {
        if ($permission->parent_id == $id) {
            $permission->count = $count;
            $navs[] = $permission;
            getTree($permissions, $permission->id, $count+1);
        }
    }
    return $navs;
}

function Tree($data, $id = 0, $count = 0)
{
    //声明一个静态的变量
    static $rec = array();
    //循环数组
    foreach ($data as $val) {
        //需要对每一个数据中的键为pid的值进行判断
        if ($val->comment_id == $id) {
            //先标示$count的值放入$val数量中
            $val->count = $count;
            //需要将该数据重新放入一新的的数组中
            $rec[] = $val;
            //判断当前分类下面是否还有子类
            Tree($data, $val->id, $count + 1);
        }
    }
    return $rec;
}