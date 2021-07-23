<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string']
        ]);

        $remember = $request->filled('remember');

        if(Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return $redirect->intended('dashboard');
        }

        throw ValidationException::withMessages([
            'email' => 'Tus datos son incorrectos'
        ]);

    }
}
