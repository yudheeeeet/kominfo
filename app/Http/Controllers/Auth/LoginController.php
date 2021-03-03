<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticated(Request $request)
    {
        // return $request;
        $data = User::join('role_user', 'role_user.user_id', 'users.id')
        ->leftjoin('roles', 'roles.id', 'role_user.role_id')
        ->select('users.*', 'roles.name as role')
        ->where('users.email', $request->email)->first();
        if ($data) {
            if ($data->role != 'admin') {
                if (password_verify($request->password, $data->password)) {
                    session()->put('login', true);
                    session()->put('email', $data->email);
                    session()->put('nama', $data->name);
                    session()->put('id', $data->id);
                    return redirect()->route('user');
                } else {
                    return redirect('/')->with('message', 'Password salah!');
                }

            } else {
                // return $data;
                if (password_verify($request->password, $data->password)) {
                    session()->put('login', true);
                    session()->put('email', $data->email);
                    session()->put('nama', $data->name);
                    session()->put('id', $data->id);
                    return redirect('/admin');
                } else {
                    return redirect('/')->with('message', 'Password salah!');
                }
            }
        } else {
            return redirect('/')->with('message', 'Email tidak teredaftar!');
        }
    }
}
