<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string', 'min:8']
        ], [
            'email.required' => 'Ingresa un email',
            'email.email' => 'Ingresa un email válido',
            'password.required' => 'Ingresa una contraseña',
            'password.min' => 'La contraseña debe de ser al menos de 8 caracteres'
        ]);

        $remember = $request->filled('remember');

        if(Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        throw ValidationException::withMessages([
            'email' => 'Tus datos son incorrectos'
        ]);

    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'string', 'same:password'],
            'birthdate' => ['required', 'date', 'before:-18 years']
        ], [
            'name.required' => 'Ingresa un nombre',
            'name.min' => 'Nombre demasiado corto',
            'password.required' => 'Ingresa una contraseña',
            'password.min' => 'La contraseña debe de ser al menos de 8 caracteres',
            'password_confirmation.same' => 'Las contraseñas no coinciden',
            'birthdate.required' => 'Ingresa una fecha de nacimiento',
            'birthdate.date' => 'La fecha de nacimiento no esta en un formato válido',
            'birthdate.before' => 'Debes ser mayor a 18 años',
        ]);

        $dataArray = array(
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "birthdate" => $request->birthdate
        );

        $user = User::create($dataArray);
        if(!is_null($user)) {
            $credentials = $request->validate([
                'email' => ['required', 'email', 'string'],
                'password' => ['required', 'string']
            ]);

            if(Auth::attempt($credentials)) {
                return redirect()->intended('dashboard');
            }

            throw ValidationException::withMessages([
                'email' => 'Ocurrio un problema, intenta más tarde'
            ]);
        }

        else {
            return back()->with("failed", "Alert! Failed to register");
        }

    }

    public function passEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email']
        ], [
            'email.required' => 'Ingresa un email',
            'email.email' => 'Ingresa un email válido',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => "Holi"]);
    }
}
