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
    <title>Editar equipo</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-dash bg-cover bg-center">
    @livewire('admin-navbar')

    <!-- Titulo -->
    <div class="mx-8 lg:mx-20 flex flex-row justify-between my-8">
        <h1 class="text-white font-bold text-3xl">Equipo</h1>
        <!--<button class="w-40 px-3 h-12 font-light text-white transition duration-500 ease-in-out bg-gray-500 bg-opacity-25 rounded-lg hover:bg-red-600 hover:bg-opacity-100"
        type="button" onclick="remove('{{ $team->id }}',this)">Eliminar usuario</button>-->
    </div>

    <!-- Top card -->
    <div class="w-full">
        <div class="max-w-6xl xl:mx-auto lg:mx-20 bg-gray-500 bg-opacity-25 rounded-3xl mb-20 mx-8 p-10">
            <form method="POST" action="{{ route('changeTeamStatus') }}">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <h1 class="text-center md:text-left mb-10 text-xl md:text-2xl text-white font-light mr-5">Nombre: <span class="font-bold">{{ $team->name }}</span></h1>
                    <div class="flex flex-row lg:flex-row-reverse mb-4 md:mb-0">
                        <h1 class="text-center text-xl md:text-2xl text-white font-light mr-4 lg:mr-0">Puntos: <span class="font-bold">{{ $team->points }}</span></h1>
                        <h1 class="text-center text-xl md:text-2xl text-white font-light lg:mr-4">Torneos: <span class="font-bold">{{ $team->tournaments }}</span></h1>
                        @php
                            if ($team->status === 0) {
                                echo '<p class="text-red-600 text-center text-lg md:text-xl mt-1 font-light mx-2">Equipo suspendido</p>';
                            } else if ($team->status === 1) {
                                echo '<p class="text-green-400 text-center text-lg md:text-xl mt-1 font-light mx-2">Equipo activo</p>';
                            }
                        @endphp
                    </div>
                    <input type="hidden" value="{{ $team->id }}" name="id">
                </div>
                
                <div class="flex flex-col md:flex-row justify-between">
                    <h1 class="mb-4 md:mb-0 text-xl md:text-2xl text-white font-light mr-5">Creador: <span class="font-bold">{{ $team->user->name }}</span></h1>
                    <h1 class="mb-4 md:mb-0 text-xl md:text-2xl text-white font-light mr-5">Código de equipo: <span class="font-bold">{{ $team->access_code }}</span></h1>
                    <div class="flex flex-row-reverse justify-between">
                        @php
                            if ($team->status === 0) {
                                echo '<button class="px-6 py-2 rounded-xl bg-yellow-400 text-white hover:bg-green-500 transition duration-500 ease-in-out ">Activar</button>';
                            } else if ($team->status === 1) {
                                echo '<button class="px-6 py-2 rounded-xl bg-yellow-400 text-white hover:bg-red-500 transition duration-500 ease-in-out ">Suspender</button>';
                            }
                        @endphp
                        <input type="hidden" name="id" value="{{ $team->id }}">
                        <input type="hidden" name="status" 
                        value="<?php 
                            if($team->status === 0) {
                                echo 1;
                            } else {
                                echo 0;
                            }
                        ?>">
                        
                    </div>
                </div>
            </form>
            
        </div>
    </div>

    <div class="mx-8 lg:mx-20 flex flex-row justify-between my-8">
        <h1 class="text-white font-bold text-3xl">Miembros</h1>
    </div>

    <!-- Members card -->
    @isset($members)
       <div class="w-full">
            <div class="max-w-6xl xl:mx-auto lg:mx-20 bg-gray-500 bg-opacity-25 rounded-3xl my-20 mx-8 p-10">
                <table class="w-full text-white">
                    <thead class="text-xl border-b-2">
                        <th class="w-1/4 pb-4">Usuario</th>
                        <th class="w-1/4 pb-4">Plataforma</th>
                        <th class="w-1/4 pb-4">Puntos</th>
                    </thead>
                    <tbody>
                        @foreach ($members as $member)
                            <tr class="">
                                <td class="py-4 text-center">{{ $member->profile->gamertag }}</td>
                                <td class="py-4 text-center">
                                    @if ($member->profile->platform === "xbl")
                                        Xbox Live
                                    @endif
                                    @if ($member->profile->platform === "battle")
                                        Battlenet
                                    @endif
                                    @if ($member->profile->platform === "psn")
                                        PlayStation Network
                                    @endif
                                    
                                </td>
                                <td class="py-4 text-center">{{ $member->member_points }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div> 
    @endisset

    <!--<div class="w-full h-screen">
        <div class="max-w-6xl md:mx-auto bg-gray-800 bg-opacity-50 rounded-3xl my-20 mx-8 p-10">
            <h1 class="text-center text-xl text-white font-light mb-5">Nombre: <span class="font-bold text-2xl">{{ $team->name }}</span></h1>
            <h1 class="text-center text-xl text-white font-light mb-5">Creador: <span class="font-bold text-2xl">{{ $team->user->name }}</span></h1>
            <h1 class="text-center text-xl text-white font-light mb-5">Puntos: <span class="font-bold text-2xl">{{ $team->points }}</span></h1>
            <h1 class="text-center text-xl text-white font-light mb-5">Mejor resultado: <span class="font-bold text-2xl">{{ $team->bestResult }}</span></h1>
            <h1 class="text-center text-xl text-white font-light mb-5">Torneos jugados: <span class="font-bold text-2xl">{{ $team->tournaments }}</span></h1>
            <h1 class="text-center text-xl text-white font-light mb-5">Código de acceso: <span class="font-bold text-2xl">{{ $team->access_code }}</span></h1>
            <h1 class="text-center text-xl text-white font-light mb-5">Status: 
                @php
                    if ($team->status === 0) {
                        echo '<span class="font-bold text-2xl text-red-600">Suspendido</span>';
                    } else if ($team->status === 1) {
                        echo '<span class="font-bold text-2xl text-green-500">Activo</span>';
                    }
                @endphp
            </h1>
            <div class="w-full text-center">
                <form method="POST" action="{{ route('changeTeamStatus') }}">
                    @csrf
                @php
                    if ($team->status === 0) {
                        echo '<button class="px-6 py-2 rounded-xl bg-yellow-400 text-white hover:bg-green-500 transition duration-500 ease-in-out ">Activar</button>';
                    } else if ($team->status === 1) {
                        echo '<button class="px-6 py-2 rounded-xl bg-yellow-400 text-white hover:bg-red-500 transition duration-500 ease-in-out ">Suspender</button>';
                    }
                @endphp
                <input type="hidden" name="id" value="{{ $team->id }}">
                <input type="hidden" name="status" 
                value="<?php 
                    if($team->status === 0) {
                        echo 1;
                    } else {
                        echo 0;
                    }
                ?>">
            </form>
            </div>
            
        </div>
    </div>-->

    


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
