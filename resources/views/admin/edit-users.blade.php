<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Style -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Editar usuario</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-edit-users bg-cover bg-fixed">
    @livewire('admin-navbar')

    <div class="w-full h-screen">
        <div class="max-w-6xl md:mx-auto bg-gray-500 bg-opacity-50 rounded-3xl my-20 mx-8 p-10">
            <h1 class="text-center text-xl text-white font-light mb-5">Nombre: <span class="font-bold text-2xl">{{ $user->name }}</span></h1>
            <h1 class="text-center text-xl text-white font-light mb-5">Email: <span class="font-bold text-2xl">{{ $user->email }}</span></h1>
            <h1 class="text-center text-xl text-white font-light mb-5">Fecha de nacimiento: <span class="font-bold text-2xl">{{ $user->birthdate }}</span></h1>
            <h1 class="text-center text-xl text-white font-light mb-5">Rol: 
                <span class="font-bold text-2xl">
                    @php
                        if ($user->role_id == 1) {
                            echo "Administrador";
                        } else {
                            echo "Usuario";
                        }
                    @endphp
                </span>
            </h1>
            <h1 class="text-center text-xl text-white font-light mb-5">Status: 
                @php
                    if ($user->status === 0) {
                        echo '<span class="font-bold text-2xl text-red-600">Suspendido</span>';
                    } else if ($user->status === 1) {
                        echo '<span class="font-bold text-2xl text-green-500">Activo</span>';
                    }
                @endphp
            </h1>
            <div class="w-full text-center">
            <form method="POST" action="{{ route('changeStatus') }}">
            @csrf
                @php
                    if ($user->status === 0) {
                        echo '<button class="px-6 py-2 rounded-xl bg-yellow-400 text-white hover:bg-green-500 transition duration-500 ease-in-out ">Activar</button>';
                    } else if ($user->status === 1) {
                        echo '<button class="px-6 py-2 rounded-xl bg-yellow-400 text-white hover:bg-red-500 transition duration-500 ease-in-out ">Suspender</button>';
                    }
                @endphp
                <input type="hidden" name="id" value="{{ $user->id }}">
                <input type="hidden" name="status" 
                value="<?php 
                    if($user->status === 0) {
                        echo 1;
                    } else {
                        echo 0;
                    }
                ?>">
            </form>
                
            </div>
            
        </div>
    </div>

    


    @livewire('footer')
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

        window.onclick = function(event) {
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

        function openSidePanel() {
            var x = document.getElementById("sidePanel");
            x.classList.remove("hidden")
            x.classList.add("fixed")
        }

        function closeSidePanel() {
            var x = document.getElementById("sidePanel");
            x.classList.remove("fixed")
            x.classList.add("hidden")
        }

        function openSidePanelJoin() {
            var x = document.getElementById("sidePanelJoin");
            x.classList.remove("hidden")
            x.classList.add("fixed")
        }

        function closeSidePanelJoin() {
            var x = document.getElementById("sidePanelJoin");
            x.classList.remove("fixed")
            x.classList.add("hidden")
        }
    </script>
    
</body>
</html>