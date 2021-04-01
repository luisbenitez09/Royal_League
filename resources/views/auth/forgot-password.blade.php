<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v${1:2.x.x}/dist/alpine.js" defer></script>
    <!-- Style -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Recuperar contraseña</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body style="background-color: #1a2a41" class="bg-fixed bg-center bg-cover bg-profile">

    <div class="relative z-20 w-full h-screen overflow-y-auto">
        <!-- Navbar -->
        

        <!-- Contenido -->
        <div class="container z-30 px-4 mx-auto mt-8 pt-20 sm:px-0">
            
            <div class="max-w-xl mx-auto">
                <form class="auth-form flex flex-col space-around items-center h-96" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <x-jet-validation-errors class="mb-4" />
                    <h1 class="text-white text-3xl font-medium mb-20">¿Olvidaste tu contraseña?</h1>
                    <p class="text-white text-lg text-center mb-10">No hay problema, solo danos tu dirección de correo que utilizas en nuestra plataforma y te enviaremos un link para recuperar tu contraseña.</p>
                    <div class="form-group flex flex-col items-center w-full mb-10">
                        <input type="email" class="w-full text-white bg-cool-gray-500  bg-opacity-50 hover:bg-opacity-75  py-2 mb-10 rounded-full
                        transition duration-500 ease-in-out pl-4" style="backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);" id="email" name="email" placeholder="{{ __('Email') }}" :value="old('email')" required autofocus >
                    </div>
                    <div class="form-group flex flex-col items-center">
                        <button type="submit" class="rounded-full w-60 bg-red-500 hover:bg-red-800 transition duration-500 ease-in-out py-2 text-white mb-4">{{ __('Obtener link') }}</button>
                    </div>
                </form>
            </div>

        </div>


    </div>

    @livewire('footer')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function drop(x) {
            if (x == 1) {
                if (document.getElementById("drop-menu-1").classList.contains("hidden")) {
                    document.getElementById("drop-menu-1").classList.remove("hidden");
                } else {
                    document.getElementById("drop-menu-1").classList.add("hidden");
                }
            } else {
                if (document.getElementById("drop-menu-2").classList.contains("hidden")) {
                    document.getElementById("drop-menu-2").classList.remove("hidden");
                } else {
                    document.getElementById("drop-menu-2").classList.add("hidden");
                }
            }


        }

        function toggle() {
            var x = document.getElementById("nav-bar");
            if (x.classList.contains("hidden")) {
                x.classList.remove("hidden")
                x.classList.add("block")
            } else {
                x.classList.remove("block")
                x.classList.add("hidden")
            }
        }

        window.onclick = function (event) {
            if (!event.target.matches('.btn-drop')) {
                var dropdown1 = document.getElementById("drop-menu-1");
                var dropdown2 = document.getElementById("drop-menu-2");

                if (!dropdown1.classList.contains('hidden')) {
                    dropdown1.classList.add('hidden');
                }
                if (!dropdown2.classList.contains('hidden')) {
                    dropdown2.classList.add('hidden');
                }

            }
        }

    </script>
    
</body>

</html>
