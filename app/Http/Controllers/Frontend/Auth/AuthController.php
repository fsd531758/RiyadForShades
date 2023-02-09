<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {   
        return view('frontend.auth.login');
    }



    public function home()
    {
        return view('/');
    }

    public function authenticate(FrontLoginRequest $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;
        $user = Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'active' => 1], $remember_me);
        if ($user) {
            $request->session()->regenerate();

            return redirect()->intended(route('/'));
        }
        return redirect()->back()->with('error', __('message.invalid_login'));
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('/');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('message.something_wrong'));
        }
    }
}
