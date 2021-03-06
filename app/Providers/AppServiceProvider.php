<?php

namespace App\Providers;

use App\Models\AuserRole;
use App\Models\NavCate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	//监听
	/*DB::listen(function ($query) {
             echo $query->sql;
            // $query->bindings
            // $query->time
        });*/
        //查询当前登录用户有的权限
        $permissions = DB::table('auser_role')
            ->select('permissions.*','auser_role.auser_id')
            ->LeftJoin('permission_role', 'permission_role.role_id', 'auser_role.role_id')
            ->LeftJoin('permissions', 'permissions.id', 'permission_role.permission_id')
            ->where('permissions.parent_id', 0)
            ->where('permissions.is_menu', 1)
            ->groupBy('permissions.id')
            ->groupBy('auser_role.auser_id')
            ->get();
        // 使用基于闭包的composers...
        view()->composer('admin.layouts.Index', function ($view) use ($permissions) {
            $view->with('permissions', $permissions);
        });

        //前台主模版数据
        //查询前5条网站导航分类
        $data = NavCate::orderBy('sort_id','asc')->limit(5)->get();
        view()->composer('web.layouts.index', function ($view) use ($data) {
            $view->with('data', $data);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
