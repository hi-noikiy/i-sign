<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;

class AuthAdmin
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
        $user = $request->user();
        if ($user && $user->role_level == 9) {

            return $next($request);
        }

        if ($request->ajax()) {
            return Response::json([
                'error' => [
                    'msg' => '权限认证失败'
                ]
            ]);
        }

        return redirect('admin/login')->withErrors('该用户，没有权限访问后台');
    }
}
