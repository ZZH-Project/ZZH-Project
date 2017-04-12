<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //判断是否登录，如果没有登录，则跳转到登录
        if (!$request->session()->get('auser')) {
            return redirect('admin/login');
        }
        return $next($request);
    }
}
