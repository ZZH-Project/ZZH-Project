<?php

namespace App\Http\Middleware;

use App\Models\Ar;
use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class Rbac
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //获取当前登录用户的ID
        $id = session('auser')['id'];
        //查询当前登录用户有的权限
        $permissions = DB::table('auser_role')
            ->select('permissions.*','auser_role.auser_id')
            ->LeftJoin('permission_role', 'permission_role.role_id', 'auser_role.role_id')
            ->LeftJoin('permissions', 'permissions.id', 'permission_role.permission_id')
            ->where('permissions.parent_id',0)
            ->where('auser_role.auser_id', $id)
            ->groupBy('permissions.id')
            ->groupBy('auser_role.auser_id')
            ->get();
        $pers = array('admin/logout','admin/index','admin/info','admin/send');
        foreach ($permissions as $permission) {
            $pers[] = $permission->name;
        }
        //获取访问的路由
        $current = Route::current()->uri();
        //判断数据库是否有数据
        $ars = Ar::where('id',1)->get();
        if ($ars == null) {
            //更新数据库
            Ar::where('id',1)->update(['name' => $current]);
        } else {
            //更新数据库
            Ar::where('id',1)->update(['name' => $current]);
        }
        $flag = array();
        //循环模糊查询判断
        foreach ($pers as $v) {
            if (Ar::where('name','like',$v.'%')->get()->toArray() != null) {
                $flag[] = true;
            } else {
                $flag[] = false;
            }
        }
        if (!in_array(true, $flag)) {
            return abort(503);
        }
        return $next($request);
    }
}
