<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
            if (!Auth::check()) { //nếu chưa login
                return redirect()->route('admin.login');
            }

        $user = Auth::user(); //lấy thông tin user khi đã đăng nhập
//        $user->routes();
        //kiểm tra quyền của người dùng
        $route =$request->route()->getName();

        return $next($request);
    }
}
