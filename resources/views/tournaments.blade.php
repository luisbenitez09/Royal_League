<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Style -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Torneos</title>
</head>
<body class="bg-blue-900">
    <!-- navbar -->
    <div class="md:absolute w-full bg-white md:bg-opacity-0">
        <header class="z-20 mx-auto px-6 md:px-8 md:py-8 py-2 md:grid md:grid-cols-8 sticky ">
            
            <div class="flex items-center justify-between mb-4 md:mb-0 md:col-span-2">
                <img class="w-16 md:w-28" src="img/logo.png" alt="Logo">

                <div class="md:hidden">
                    <button type="button" onclick="drop(1)"
                        class="block btn-drop md:border-b-2 md:border-gray-100 border-opacity-50 md:border-none pb-2 mb-2 font-light text-gray-800 md:text-white transition duration-500 ease-in-out">
                        Menu <i class="fa fa-chevron-down"></i>
                    </button>
                    <div id="drop-menu-1"
                        class="hidden origin-top-left absolute right-4 mt-2 w-56 rounded-md shadow-lg bg-gray-700 bg-opacity-50"
                        style="backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
                        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                            <a href="/"
                                class="block px-4 py-2 text-sm text-white hover:bg-black hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                role="menuitem">Dashboard</a>
                            <a href="/myTeams"
                                class="block px-4 py-2 text-sm text-white hover:bg-black hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                role="menuitem">Mis equipos</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-white hover:bg-black hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                role="menuitem">Torneos</a>
                            <a href="{{ route('profile') }}"
                                class="block px-4 py-2 text-sm text-white hover:bg-black hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                role="menuitem">Mi perfil</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-white hover:bg-black hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                                    role="menuitem">
                                    Cerrar sesión
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            
            <nav class="hidden md:inline-flex z-30 col-span-2 col-end-9" id="nav-bar">
                <ul class="list-reset w-full md:flex md:items-center">
                    <li class="w-full">
                        <button type="button" onclick="drop(2)"
                            class="block w-full text-right btn-drop border-b-2 border-gray-100 border-opacity-50 md:border-none  font-light text-white transition duration-500 ease-in-out">
                            Menu <i class="fa fa-chevron-down"></i>
                        </button>
                        <div id="drop-menu-2"
                            class="hidden origin-top-left absolute right-4 mt-2 w-56 rounded-md shadow-lg bg-gray-700 bg-opacity-50"
                            style="backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <a href="{{ route('dashboard') }}"
                                    class="block px-4 py-2 text-sm text-white hover:bg-black hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                    role="menuitem">Dashboard</a>
                                <a href="{{ route('teams') }}"
                                    class="block px-4 py-2 text-sm text-white hover:bg-black hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                    role="menuitem">Mis equipos</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-white hover:bg-black hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                    role="menuitem">Torneos</a>
                                <a href="{{ route('profile') }}"
                                    class="block px-4 py-2 text-sm text-white hover:bg-black hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                    role="menuitem">Mi perfil</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-sm text-white hover:bg-black hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                                        role="menuitem">
                                        Cerrar sesión
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>
    </div>

    <!-- header -->
    <div class="w-full">
        <div class="absolute w-full mt-2/12">
            <h1 class="text-white tex-3xl md:text-5xl font-bold text-center">Torneos</h1>
        </div>
        
        <img src="{{ asset('img/bg-torneos.png') }}" alt="" class="h-full w-screen ">
    </div>

    <!-- tournaments -->
    <div class="w-full md:container mx-auto py-20 px-20 md:px-0">

        <!-- filters -->
        <div class="flex flex-row text-white font-light text-sm mb-20">
            <button class="mr-8 hover:text-red-600 transition duration-500 ease-in-out">Todos</button>
            <button class="mr-8 hover:text-red-600 transition duration-500 ease-in-out">Próximos</button>
            <button class="mr-8 hover:text-red-600 transition duration-500 ease-in-out">Finalizados</button>
            <button class="mr-8 hover:text-red-600 transition duration-500 ease-in-out">COD WARZONE</button>
        </div>

        <!-- grid -->
        <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($tournaments as $tournament)
            <div class="max-w-sm h-96">
                <img src="img/{{$tournament->image}}"  alt="" class="w-full h-60 ">
                <!-- overlay -->
                <div class="w-full h-60 bg-gradient-to-r from-red-700 to-gray-900 opacity-0 hover:opacity-75 -mt-60 relative mb-4 text-center transition duration-500 ease-in-out">
                    <a href="" class="text-white mt-28 -ml-7 absolute">Ver más</a>
                </div>
                <h2 class="text-white text-2xl font-semibold mb-4">{{ $tournament->title }}</h2>
                <h3 class="text-white text-sm font-light">{{ $tournament->game }}</h3>
            </div>
            @endforeach
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