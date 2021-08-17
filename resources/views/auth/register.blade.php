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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>{{ __('Registro') }}</title>
</head>
<body style="background-color: #1a2a41"  class="bg-login bg-cover bg-center bg-fixed">
    <!-- back link -->
    <div class="w-52 text-white pl-10 pt-10 transform hover:translate-x-3 transition duration-300 ease-in-out">
        <a href="/"><i class="fas fa-arrow-left"></i> Volver a Inicio</a>
    </div>
    <!-- main container -->
    <div class="w-full h-full flex flex-col lg:flex-row">
        <div class="w-full lg:w-1/2">
            <!-- logo -->
            <img src="{{ asset('img/logo.png') }}" alt="Royal League" class="w-24 lg:w-96 mx-auto mb-4 lg:mb-10 lg:mt-14">
        </div>
        <div class="w-full lg:w-1/2 pt-4">
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
                <h2 class="text-white text-2xl mb-5">Registro</h2>
                <p class="text-white text-sm opacity-50 font-light mb-10">Vamos a crearte una cuenta.</p>

                <form class="auth-form flex flex-col justify-evenly md:space-around " method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="text" class="text-white bg-transparent py-2 rounded-lg border border-blue-400 focus:outline-none focus:border-yellow-400
                    ransition duration-500 ease-in-out pl-4 mb-4" id="name" name="name" value="{{ old('name') }}" placeholder="{{ __('Nombre completo') }}" autofocus>

                    <input type="email" class="text-white bg-transparent py-2 rounded-lg border border-blue-400 focus:outline-none focus:border-yellow-400
                    ransition duration-500 ease-in-out pl-4 mb-4" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required >
                    
                    <input type="password" class="text-white bg-transparent py-2 rounded-lg border border-blue-400 focus:outline-none focus:border-yellow-400
                    ransition duration-500 ease-in-out pl-4 mb-4" id="password" name="password" placeholder="Password" required autocomplete="current-password">
                    
                    <input type="password" class="text-white bg-transparent py-2 rounded-lg border border-blue-400 focus:outline-none focus:border-yellow-400
                    ransition duration-500 ease-in-out pl-4 mb-4" id="password_confirmation" name="password_confirmation" placeholder="Confirma tu password" required autocomplete="current-password">
                    
                    <input type="text" class="text-white bg-transparent py-2 rounded-lg border border-blue-400 focus:outline-none focus:border-yellow-400
                    ransition duration-500 ease-in-out pl-4 mb-4" id="birthdate" name="birthdate" value="{{ old('birthdate') }}" placeholder="{{ __('Fecha de nacimiento') }}" required >
                    <button type="submit" class="rounded-lg w-full bg-yellow-400 hover:bg-yellow-500 transition duration-500 ease-in-out py-2 text-white mb-4">Registrarme</button>
                </form>
            </div>
            <!-- external text -->
            <div class="w-96 mx-auto text-center">
                <p class="text-white text-sm mb-4">¿Ya tienes cuenta? <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 transition duration-300 ease-in-out">Inicia Sesión</a></p>
            </div>
        </div>
        
        
        
    </div>
    
    <script>
        $(function(){
            $("#birthdate").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
</body>
</html>