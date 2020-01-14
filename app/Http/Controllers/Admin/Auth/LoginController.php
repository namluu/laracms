<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validator($request);

        if (Auth::guard('admin')->attempt($request->only('email','password'))) {
            return redirect()->intended(route('admin.home'))->with('success','You are Logged in as Admin!');
        }
        return $this->loginFailed();
    }

    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email'    => 'required|email|exists:admins|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];
        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];
        //validate the request.
        $request->validate($rules,$messages);
    }

    public function username()
    {
        return 'email';
    }

    private function loginFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Login failed, please try again!');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()
            ->route('admin.login')
            ->with('status','Admin has been logged out!');
    }
}
