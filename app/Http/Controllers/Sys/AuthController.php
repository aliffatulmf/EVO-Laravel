<?php

namespace App\Http\Controllers\Sys;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        // return (auth()->user()) ? redirect()->back() : view('auth.login');
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credential = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return redirect()
            ->back()
            ->withErrors($credential);
    }

    public function forget(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()
            ->route('login');
    }
}
