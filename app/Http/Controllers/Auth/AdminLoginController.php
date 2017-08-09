<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // attemp to log the user
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
//            $user = auth()->guard('admin')->user();
//            dd($user);
            return redirect()->intended(route('admin.dashboard'));
        }

        // unsuccessful
        return redirect()->back()->withInput($request->only('email'));
    }
}
