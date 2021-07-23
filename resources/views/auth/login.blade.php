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
    <!-- pagina -->
    <div class="flex flex-col md:flex-row  items-center md:h-screen p-10">
        <!-- left card -->
        <div class="flex justify-between items-center bg-gray-700 bg-opacity-50 rounded-3xl w-full md:w-1/3 md:h-full p-4" style="backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
            <!-- contenedor -->
            <div class="flex flex-row md:flex-col justify-between w-full items-center md:items-baseline md:h-full">
                <!-- textos -->
                <div class="md:w-full md:h-full md:flex flex-row items-center">
                    <div class="md:align-middle">
                        <h1 class="text-white font-semibold text-2xl md:text-3xl mb-3 md:mb-12">Login</h1>
                        <p class="font-bold text-white">{{ __('¡Bienvenido de nuevo!') }}</p>
                        <p class="font-light text-cool-gray-300 text-sm">{{ __('Inicia sesión para continuar') }}</p>
                    </div>
                    
                </div>
                <!-- cta -->
                <div class="bg-gray-600 py-6 md:p-3 w-1/2 md:w-full md:align-bottom rounded-xl">
                    <div class="flex flex-col items-center md:items-baseline">
                        <h2 class="font-light text-white">{{ __('¿Aún no tienes cuenta?') }}</h2>
                        <a href="{{ route('register') }}" class="font-bold text-yellow-400 hover:text-yellow-200 transition duration-500 ease-in-out">{{ __('Registrate') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full mt-10 md:mt-0 md:w-2/3 md:h-full">
            <div class="w-full  md:w-1/2 md:h-full md:mx-auto">
                <form class="auth-form flex flex-col justify-evenly md:space-around items-center h-96 md:h-full" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group flex flex-col items-center w-full mb-8 ">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="w-full px-5 py-3 rounded-full bg-yellow-400 text-white">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <!--<button class="rounded-full w-full bg-blue-600 hover:bg-blue-500 py-2 text-white mb-4 md:mb-8
                        transition duration-500 ease-in-out transform hover:-translate-y-1"><i class="fab fa-facebook-f text-white mr-2"></i>
                            Login with Facebook
                        </button>
                        <button class="rounded-full w-full bg-red-600 hover:bg-red-500 py-2 text-white
                        transition duration-500 ease-in-out transform hover:-translate-y-1"><i class="fab fa-google text-white mr-2"></i>
                            Login with Google
                        </button>-->
                    </div>
                    <div class="form-group flex flex-col items-center w-full mb-4">
                        <input type="email" class="w-full text-white bg-cool-gray-500 bg-opacity-50 hover:bg-opacity-50 py-2 rounded-full
                        transition duration-500 ease-in-out pl-4 mb-4 md:mb-8" style="backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus
                        >
                        <input type="password" class="w-full text-white bg-cool-gray-500  bg-opacity-50 hover:bg-opacity-50 py-2 rounded-full
                        transition duration-500 ease-in-out pl-4" style="backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);" id="password" name="password" placeholder="Password" required autocomplete="current-password"
                        >
                    </div>
                    <div class="form-group flex flex-col items-center mb-4">
                        @if (Route::has('password.request'))
                            <a class="text-white hover:text-red-500 mb-2 transition duration-500 ease-in-out" href="{{ route('password.request') }}">
                               {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                        <label for="remember_me" class="flex items-center">
                            <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                            <span class="ml-2 text-sm text-white">{{ __('Mantener sesión abierta') }}</span>
                        </label>
                    </div>
                    <div class="form-group flex flex-col items-center">
                        <button type="submit" class="rounded-full w-60 bg-green-500 hover:bg-green-600 transition duration-500 ease-in-out py-2 text-white mb-4">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>