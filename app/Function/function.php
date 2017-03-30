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