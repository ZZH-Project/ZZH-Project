<?php

namespace App\Http\Middleware;

use Closure;

class WebLogin
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
        //判断是否登录，如果没有登录，则跳转到登录
        if (!$request->session()->get('weblogin')) {
            return redirect('web/user/login');
        }
        return $next($request);
    }
}
