<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginPageController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors([
                'login_error' => 'Invalid email or password.'
            ])->withInput();
        }

        LoginLog::create([
            'user_id' => Auth::user()->id,
            'email' => $request->email,
            'ip' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'logged_in_at' => now()
        ]);

        return redirect()->away('https://www.cenniglobal.com');
    }
}
