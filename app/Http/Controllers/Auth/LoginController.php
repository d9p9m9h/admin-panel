<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function creat()
    {
        return view('auth.login');
    }

    public function store (Request $request)
    {
        $credential = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credential, $request->boolean('remember'))) {

            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }
        return back()
            ->withErrors(['Incorrect email or password'])
            ->onlyInput('email');
    }

    public function destory(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}