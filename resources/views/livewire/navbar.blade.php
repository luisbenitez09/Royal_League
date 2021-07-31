<div>
    <header class="z-20 mx-auto px-6 md:px-0 py-2 md:grid md:grid-cols-8 sticky container">
        
        <div class="flex items-center justify-between mb-4 md:mb-0 md:col-span-2">
            <img class="w-16 md:w-20" src="{{ asset('img/logo.png') }}" alt="Logo">

            <div class="md:hidden">
                <button type="button" onclick="drop(1)"
                    class="block btn-drop border-b-2 border-gray-100 border-opacity-50 md:border-none pb-2 mb-2 font-light text-white transition duration-500 ease-in-out">
                    @auth
                        {{ $user->name }}
                    @else
                        Menú
                    @endauth 
                        <i class="fa fa-chevron-down"></i>
                </button>
                <div id="drop-menu-1"
                    class="hidden origin-top-left absolute right-4 mt-2 w-56 rounded-md shadow-lg bg-gray-900"
                    >
                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        @auth
                            
                            <a href="/"
                                class="block px-4 py-2 text-sm text-white hover:bg-gray-500 hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                role="menuitem">Inicio</a>
                            <a href="{{ route('dashboard') }}"
                                class="block px-4 py-2 text-sm text-white hover:bg-gray-500 hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                role="menuitem">Dashboard</a>
                            <a href="{{ route('teams') }}"
                                class="block px-4 py-2 text-sm text-white hover:bg-gray-500 hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                role="menuitem">Mis equipos</a>
                            <a href="{{ route('tournaments') }}"
                                class="block px-4 py-2 text-sm text-white hover:bg-gray-500 hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                role="menuitem">Torneos</a>
                            <a href="{{ route('profile') }}"
                                class="block px-4 py-2 text-sm text-white hover:bg-gray-500 hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                role="menuitem">Mi perfil</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-white hover:bg-red-500 hover:bg-opacity-75 rounded-md transition duration-100 ease-in-out focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                                    role="menuitem">
                                    Cerrar sesión
                                </button>
                            </form>
                           
                        @else
                            <a href="/"
                                class="block px-4 py-2 text-sm text-white hover:bg-gray-500 hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                role="menuitem">Inicio</a>
                            <a href="{{ route('tournaments') }}"
                                class="block px-4 py-2 text-sm text-white hover:bg-gray-500 hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                role="menuitem">Torneos</a>
                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-sm text-white hover:bg-gray-500 hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                role="menuitem">Login</a>
                            <a href="{{ route('register') }}"
                                class="block px-4 py-2 text-sm text-white hover:bg-gray-500 hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                role="menuitem">Register</a>
                        @endauth
                    </div>
                </div>
            </div>

        </div>
        
        @auth
            <!--<div class="hidden md:block md:col-span-4">
                <h3 class="text-xl font-bold text-white text-opacity-25">Hola, {{ $user->name }},</h3>
                <h1 class="text-4xl font-bold text-white">¡Bienvenid@!</h1>
            </div>-->
        @endauth
        

        <nav class="hidden md:inline-flex z-30 col-span-2 col-end-9" id="nav-bar">
            <ul class="list-reset w-full md:flex md:items-center">
                <li class="w-full">
                    <button type="button" onclick="drop(2)"
                        class="block w-full text-right btn-drop border-b-2 border-gray-100 border-opacity-50 md:border-none  font-light text-white transition duration-500 ease-in-out">
                        @auth
                            {{ $user->name }}
                        @else
                            Menú
                        @endauth
                         
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <div id="drop-menu-2"
                        class="hidden origin-top-left absolute right-4 mt-2 w-56 rounded-md shadow-lg bg-gray-900"
                        style="backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
                        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                            @auth
                                
                            <a href="{{ route('inicio') }}"
                            class="block px-4 py-2 text-sm text-white hover:bg-gray-500 hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                            role="menuitem">Inicio</a>
                            <a href="{{ route('dashboard') }}"
                                class="block px-4 py-2 text-sm text-white hover:bg-gray-500 hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                role="menuitem">Dashboard</a>
                            <a href="{{ route('teams') }}"
                                class="block px-4 py-2 text-sm text-white hover:bg-gray-500 hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                role="menuitem">Mis equipos</a>
                            <a href="{{ route('tournaments') }}"
                                class="block px-4 py-2 text-sm text-white hover:bg-gray-500 hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                role="menuitem">Torneos</a>
                            <a href="{{ route('profile') }}"
                                class="block px-4 py-2 text-sm text-white hover:bg-gray-500 hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                role="menuitem">Mi perfil</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-white hover:bg-red-500 hover:bg-opacity-75 rounded-md transition duration-100 ease-in-out focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                                    role="menuitem">
                                    Cerrar sesión
                                </button>
                            </form>
                            @else
                            <a href="#"
                                class="block px-4 py-2 text-sm text-white hover:bg-gray-500 hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                role="menuitem">Inicio</a>
                            <a href="{{ route('tournaments') }}"
                                class="block px-4 py-2 text-sm text-white hover:bg-gray-500 hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                role="menuitem">Torneos</a>
                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-sm text-white hover:bg-gray-500 hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                role="menuitem">Login</a>
                            <a href="{{ route('register') }}"
                                class="block px-4 py-2 text-sm text-white hover:bg-gray-500 hover:bg-opacity-25 rounded-md transition duration-100 ease-in-out"
                                role="menuitem">Register</a>
                            @endauth
                        </div>
                    </div>
                </li>

            </ul>
        </nav>
    </header>
</div>
