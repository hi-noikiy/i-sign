<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getLogin()
    {
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {

        $this->validate($request, [
            'mobile' => 'required|numeric',
            'password' => 'required'
        ]);
        if (Auth::attempt([
            'mobile' => $request->mobile,
            'password' => $request->password,
            'role_level' => 9
        ], $request->remember_token)) {
            //admin 登陆成功 定向到 admin
            return redirect('admin');

        }

        return redirect('admin/login')->withErrors('登陆失败 或 权限不足！');
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            Session::flush();
            Session::regenerate();
        }

        return redirect('admin/login');
    }


}
