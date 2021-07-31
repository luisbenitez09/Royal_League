<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Style -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Login</title>
</head>
<body style="background-color: #1a2a41"  class="bg-login bg-cover bg-center bg-fixed">
    <!-- back link -->
    <div class="w-52 text-white pl-10 pt-10 transform hover:translate-x-3 transition duration-300 ease-in-out">
        <a href="/"><i class="fas fa-arrow-left"></i> Volver a Inicio</a>
    </div>
    <!-- main container -->
    <div class="w-full h-full items-center">
        <!-- logo -->
        <img src="{{ asset('img/logo.png') }}" alt="Royal League" class="w-24 mx-auto mb-10">
        <!-- errors zone -->
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="w-96 px-5 py-3 rounded-lg mx-auto mb-4 bg-yellow-400 text-white">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <!-- login form -->
        <div class=" bg-gray-600 bg-opacity-50 rounded-xl w-96 p-4 mx-auto mb-10" style="backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
            <h2 class="text-white text-2xl mb-5">Login</h2>
            <p class="text-white text-sm opacity-50 font-light mb-10">Ingresa tus datos para acceder a tu cuenta.</p>

            <form class="auth-form flex flex-col justify-evenly md:space-around " method="POST" action="{{ route('login') }}">
                @csrf
                <input type="email" class="text-white bg-transparent py-2 rounded-lg border border-blue-400 focus:outline-none focus:border-yellow-400
                ransition duration-500 ease-in-out pl-4 mb-4" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus
                >
                <input type="password" class="text-white bg-transparent py-2 rounded-lg border border-blue-400 focus:outline-none focus:border-yellow-400
                transition duration-500 ease-in-out pl-4 mb-4" id="password" name="password" placeholder="Password" required autocomplete="current-password"
                >
                <!--<label for="remember" class="mb-4">
                    <input id="remember" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-xs font-light text-white opacity-50">{{ __('Mantener sesión abierta') }}</span>
                </label>-->
                <button type="submit" class="rounded-lg w-full bg-yellow-400 hover:bg-yellow-500 transition duration-500 ease-in-out py-2 text-white mb-4">Login</button>
            </form>
        </div>
        <!-- external text -->
        <div class="w-96 mx-auto text-center">
            <p class="text-white text-sm mb-4">¿Aún no tienes cuenta? <a href="{{ route('register') }}" class="text-blue-400 hover:text-blue-600 transition duration-300 ease-in-out">Registrate</a></p>
            @if (Route::has('password.request'))
                <a class="text-blue-400 text-sm hover:text-blue-600 mb-2 transition duration-500 ease-in-out" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif
        </div>
        
    </div>
</body>
</html>