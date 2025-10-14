<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\ValidationException;

class LoginPageController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $creds = $request->validate([
            'email' => ['required','email'],
            'password' => ['required','string','min:6'],
            'remember' => ['nullable','boolean']
        ]);

        $remember = (bool)($creds['remember'] ?? false);
        unset($creds['remember']);

        if (!Auth::attempt($creds, $remember)) {
            throw ValidationException::withMessages([
                'email' => __('Invalid credentials.')
            ]);
        }

        $request->session()->regenerate();

        // ✅ Redirect here after successful login
        return redirect()->away('https://www.cenniglobal.com');
    }
}
