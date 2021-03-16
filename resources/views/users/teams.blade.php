<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Style -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Equipos</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body style="background-color: #1a2a41" class="bg-fixed bg-center bg-cover bg-teams">

    <div class="relative z-20 w-full h-screen overflow-y-auto">
        <!-- Navbar -->
        @livewire('navbar')

        <!-- Contenido -->
        <div class="container z-30 px-4 mx-auto mt-8 sm:px-0">
            <!-- Titles line-->
            <div class="flex flex-row items-center justify-between w-full mb-8">
                <p class="text-xl font-bold text-white md:text-2xl xl:text-4xl">Mis Equipos</p>
                <div>
                    <button
                        class="w-40 px-3 py-1 mr-2 font-light text-white transition duration-500 ease-in-out bg-gray-600 bg-opacity-50 rounded-lg hover:bg-gray-400 hover:bg-opacity-50"
                        type="button" onclick="openSidePanelJoin()">Unirme a equipo</button>
                    <button
                        class="w-40 px-3 py-1 font-light text-white transition duration-500 ease-in-out bg-gray-600 bg-opacity-50 rounded-lg hover:bg-gray-400 hover:bg-opacity-50"
                        type="button" onclick="openSidePanel()">Agregar equipo</button>
                </div>

            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @if (isset($teams) && count($teams)>0)

                @foreach ($teams as $team)
                @if ($team->owner == $user->id)
                    <div
                        class="col-auto p-3 transition duration-500 ease-in-out transform bg-gray-400 bg-opacity-25 rounded-2xl hover:-translate-y-2">
                        <p class="text-lg font-semibold text-white">{{ $team->name }}</p>
                        <div class="grid grid-cols-2">
                            <div class="col-1">
                                <span class="text-xs font-thin text-white">Miembros</span>
                                <ul>

                                    @foreach ($members as $teamMember)
                                        @if ($teamMember->access_code == $team->access_code)
                                        <li class="mb-1 text-xs font-semibold text-white">{{ $teamMember->profile->gamertag }}</li>
                                        @endif
                                    @endforeach

                                </ul>
                            </div>
                            <div class="text-right col-1">
                                <p class="mb-1 text-xs text-white font-regular">{{ $team->points }} puntos</p>
                                <p class="mb-1 text-xs text-white font-regular">{{ $team->tournaments }} torneos</p>
                                <p class="mb-1 text-xs text-white font-regular">Mejor resultado: <span
                                        class="font-bold">{{ $team->bestResult }}</span></p>
                                <button
                                    class="w-full py-1 text-xs font-bold text-white transition duration-500 ease-in-out bg-yellow-400 rounded-lg hover:bg-yellow-500">Editar
                                    equipo</button>
                            </div>
                        </div>

                    </div>
                @endif
                @endforeach
                @else
                <div class="col-auto p-3 bg-gray-400 bg-opacity-25 rounded-2xl">
                    <p class="text-lg font-semibold text-white">Aún no tienes ningún equipo</p>
                </div>
                @endif

            </div>
        </div>


    </div>

    <!-- Side panel new team -->
    <div class="inset-0 z-50 hidden overflow-hidden" id="sidePanel">
        <div class="absolute inset-0 overflow-hidden">

            <div class="absolute inset-0 transition-opacity bg-gray-900 bg-opacity-75" aria-hidden="true"></div>
            <section class="absolute inset-y-0 right-0 flex max-w-full pl-10" aria-labelledby="slide-over-heading">

                <!-- Slide-over panel, show/hide based on slide-over state. -->
                <div class="relative w-screen max-w-md">

                    <!-- Close button, show/hide based on slide-over state. -->
                    <div class="absolute top-0 left-0 flex pt-4 pr-2 -ml-8 sm:-ml-10 sm:pr-4">
                        <button
                            class="text-gray-300 rounded-md hover:text-white focus:outline-none focus:ring-2 focus:ring-white"
                            type="button" onclick="closeSidePanel()">
                            <span class="sr-only">Close panel</span>
                            <!-- Heroicon name: x -->
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>


                    <div class="z-50 flex flex-col h-full py-6 overflow-y-scroll bg-gray-600 bg-opacity-25 shadow-xl"
                        style="backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
                        <div class="px-4 mb-8 sm:px-6">
                            <h2 id="slide-over-heading" class="text-lg font-medium text-white">
                                Agregar equipo
                            </h2>
                        </div>
                        <div class="relative flex-1 px-4 mt-6 sm:px-6">

                            <!-- Content-->
                            <div class="absolute inset-0 px-4 sm:px-6">
                                <div class="h-full" aria-hidden="true">
                                    <form method="POST" action="{{ route('teams') }}"
                                        class="flex flex-col justify-between h-full">
                                        @csrf

                                        <!-- Team name -->
                                        <div class="flex-col">
                                            <input type="text"
                                                class="w-full py-2 pl-4 mb-10 text-white transition duration-500 ease-in-out bg-opacity-50 rounded-full bg-cool-gray-500 hover:bg-opacity-50 "
                                                id="name" name="name" :value="old('name')"
                                                placeholder="Nombre del equipo" required autofocus>

                                            <!-- Profile selector -->
                                            <h3 class="mb-8 text-white font-semibold text-lg">Gamertag:</h3>
                                            <div class="flex-col">
                                                <div class="space-y-1"
                                                    x-data="Components.customSelect({ open: false, value: 1, selected: 1 })"
                                                    x-init="init()">
                                                    <div class="relative">
                                                        <span class="inline-block w-52 mb-4 rounded-md shadow-sm">
                                                            <button x-ref="button" @click="onButtonClick()" type="button"
                                                                aria-haspopup="listbox" :aria-expanded="open"
                                                                aria-labelledby="assigned-to-label"
                                                                class="cursor-default relative w-full rounded-md text-white bg-gray-600 bg-opacity-50 hover:bg-gray-400 hover:bg-opacity-50 pl-3 pr-10 py-2 text-left focus:outline-none focus:shadow-outline-blue focus:border-blue-700 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                                                <div class="flex items-center space-x-3">
                                                                    <span
                                                                        x-text="['Perfil'
                                                                        @if (isset($profiles) && count($profiles)>0)
                                                                            @foreach ($profiles as $profile)
                                                                                @if ($profile->user_id === $user->id)
                                                                                    ,'{{ $profile->gamertag }}'
                                                                                @endif
                                                                            @endforeach  
                                                                        @endif
                                                                        ][value - 1]"
                                                                        class="block truncate">Perfil</span>
                                                                </div>
                                                                <span
                                                                    class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                                                    <svg class="h-5 w-5 text-gray-400" fill="currentColor"
                                                                        viewBox="0 0 20 20">
                                                                        <path
                                                                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                        </span>

                                                        <div x-show="open" @focusout="onEscape()" @click.away="open = false"
                                                            x-transition:leave="transition ease-in duration-100"
                                                            x-transition:leave-start="opacity-100"
                                                            x-transition:leave-end="opacity-0"
                                                            class="absolute mt-1 w-52 rounded-md bg-gray-500 bg-opacity-25 shadow-lg"
                                                            style="display: none; backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
                                                            <ul @keydown.enter.stop.prevent="onOptionSelect()"
                                                                @keydown.space.stop.prevent="onOptionSelect()"
                                                                @keydown.escape="onEscape()"
                                                                @keydown.arrow-up.prevent="onArrowUp()"
                                                                @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox"
                                                                tabindex="-1" role="listbox"
                                                                aria-labelledby="assigned-to-label"
                                                                :aria-activedescendant="activeDescendant"
                                                                class="max-h-56 rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5">
                                                                
                                                                @if (isset($profiles) && count($profiles)>0)
                                                                    @php
                                                                        $count = 1;
                                                                    @endphp
                                                                    @foreach ($profiles as $profile)
                                                                        @if ($profile->user_id === $user->id)
                                                                            @php
                                                                                $count = $count + 1;
                                                                            @endphp
                                                                            <li id="assigned-to-option-{{ $count }}" role="option"
                                                                                @click="choose({{ $count }})" @mouseenter="selected = {{ $count }}"
                                                                                @mouseleave="selected = null"
                                                                                :class="{ 'bg-yellow-400': selected === {{ $count }} }"
                                                                                class="text-white cursor-default select-none relative py-2 pl-4 pr-9">
                                                                                <div class="flex items-center space-x-3">
                                                                                    <span
                                                                                        :class="{ 'font-semibold': value === {{ $count }}, 'font-normal': !(value === {{ $count }}) }"
                                                                                        class="font-normal block truncate">
                                                                                        {{ $profile->gamertag }}
                                                                                    </span>
                                                                                </div>
                                                                                <span x-show="value === {{ $count }}"
                                                                                    :class="{ 'text-white': selected === {{ $count }}, 'text-yellow-400': !(selected === {{ $count }}) }"
                                                                                    class="absolute inset-y-0 right-0 flex items-center pr-4 text-yellow-400"
                                                                                    style="display: none;">
                                                                                    <svg class="h-5 w-5" fill="currentColor"
                                                                                        viewBox="0 0 20 20">
                                                                                        <path fill-rule="evenodd"
                                                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                                            clip-rule="evenodd"></path>
                                                                                    </svg>
                                                                                </span>
                                                                            </li>
                                                                        @endif
                                                                    @endforeach    
                                                                @else
                                                                    <li id="assigned-to-option-0" role="option"
                                                                        @click="choose(0)" @mouseenter="selected = 0"
                                                                        class="text-white cursor-default select-none relative py-2 pl-4 pr-9">
                                                                        <div class="flex items-center space-x-3">
                                                                            <span
                                                                                class="font-normal block truncate">
                                                                                Ningún perfil encontrado
                                                                            </span>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                                
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <!-- Team code -->
                                        <div class="flex-col">
                                            <p class="mb-10 font-light text-white">Comparte este código para que los
                                                demás integrantes se unan a tu equipo.</p>
                                            @livewire('random-team-code')
                                        </div>

                                        <!-- Buttons -->
                                        <div class="flex-col align-baseline">
                                            <div class="grid grid-cols-2 gap-2">
                                                <button
                                                    class="px-4 py-2 text-white transition duration-500 ease-in-out bg-gray-400 rounded-xl hover:bg-gray-500"
                                                    onclick="closeSidePanel()" type="button">Cancelar</button>
                                                <button
                                                    class="px-4 py-2 text-white transition duration-500 ease-in-out bg-yellow-400 rounded-xl hover:bg-yellow-500"
                                                    type="submit">Guardar</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="owner" id="owner" value="{{ $user->id }}">
                                        <input type="hidden" name="profile_id" class="profile_id" value="">
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Side panel join team -->
    <div class="inset-0 z-50 hidden overflow-hidden" id="sidePanelJoin">
        <div class="absolute inset-0 overflow-hidden">

            <div class="absolute inset-0 transition-opacity bg-gray-900 bg-opacity-75" aria-hidden="true"></div>
            <section class="absolute inset-y-0 right-0 flex max-w-full pl-10" aria-labelledby="slide-over-heading">

                <!-- Slide-over panel, show/hide based on slide-over state. -->
                <div class="relative w-screen max-w-md">

                    <!-- Close button, show/hide based on slide-over state. -->
                    <div class="absolute top-0 left-0 flex pt-4 pr-2 -ml-8 sm:-ml-10 sm:pr-4">
                        <button
                            class="text-gray-300 rounded-md hover:text-white focus:outline-none focus:ring-2 focus:ring-white"
                            type="button" onclick="closeSidePanelJoin()">
                            <span class="sr-only">Close panel</span>
                            <!-- Heroicon name: x -->
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>


                    <div class="z-50 flex flex-col h-full py-6 overflow-y-scroll bg-gray-600 bg-opacity-25 shadow-xl"
                        style="backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
                        <div class="px-4 mb-8 sm:px-6">
                            <h2 id="slide-over-heading" class="text-lg font-medium text-white">
                                Ingresa el código de equipo
                            </h2>
                        </div>
                        <div class="relative flex-1 px-4 mt-6 sm:px-6">

                            <!-- Content-->
                            <div class="absolute inset-0 px-4 sm:px-6">
                                <div class="h-full" aria-hidden="true">
                                    <form method="POST" action="{{ route('members') }}"
                                        class="flex flex-col justify-between h-full">
                                        @csrf

                                        <!-- Access code -->
                                        <div class="flex-col">
                                            <input type="text"
                                                class="w-full py-2 pl-4 mb-20 text-white transition duration-500 ease-in-out bg-opacity-50 rounded-full bg-cool-gray-500 hover:bg-opacity-50 "
                                                id="access_code" name="access_code" :value="old('access_code')"
                                                placeholder="Código del equipo" required autofocus>

                                            <!-- Profile selector -->

                                            <h3 class="mb-8 text-white font-semibold text-lg">Gamertag:</h3>
                                            <div class="flex-col">
                                                <div class="space-y-1"
                                                    x-data="Components.customSelect({ open: false, value: 1, selected: 1 })"
                                                    x-init="init()">
                                                    <div class="relative">
                                                        <span class="inline-block w-52 mb-4 rounded-md shadow-sm">
                                                            <button x-ref="button" @click="onButtonClick()" type="button"
                                                                aria-haspopup="listbox" :aria-expanded="open"
                                                                aria-labelledby="assigned-to-label"
                                                                class="cursor-default relative w-full rounded-md text-white bg-gray-600 bg-opacity-50 hover:bg-gray-400 hover:bg-opacity-50 pl-3 pr-10 py-2 text-left focus:outline-none focus:shadow-outline-blue focus:border-blue-700 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                                                <div class="flex items-center space-x-3">
                                                                    <span
                                                                        x-text="['Perfil'
                                                                        @if (isset($profiles) && count($profiles)>0)
                                                                            @foreach ($profiles as $profile)
                                                                                @if ($profile->user_id === $user->id)
                                                                                    ,'{{ $profile->gamertag }}'
                                                                                @endif
                                                                            @endforeach  
                                                                        @endif
                                                                        ][value - 1]"
                                                                        class="block truncate">Perfil</span>
                                                                </div>
                                                                <span
                                                                    class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                                                    <svg class="h-5 w-5 text-gray-400" fill="currentColor"
                                                                        viewBox="0 0 20 20">
                                                                        <path
                                                                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                        </span>

                                                        <div x-show="open" @focusout="onEscape()" @click.away="open = false"
                                                            x-transition:leave="transition ease-in duration-100"
                                                            x-transition:leave-start="opacity-100"
                                                            x-transition:leave-end="opacity-0"
                                                            class="absolute mt-1 w-52 rounded-md bg-gray-500 bg-opacity-25 shadow-lg"
                                                            style="display: none; backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
                                                            <ul @keydown.enter.stop.prevent="onOptionSelect()"
                                                                @keydown.space.stop.prevent="onOptionSelect()"
                                                                @keydown.escape="onEscape()"
                                                                @keydown.arrow-up.prevent="onArrowUp()"
                                                                @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox"
                                                                tabindex="-1" role="listbox"
                                                                aria-labelledby="assigned-to-label"
                                                                :aria-activedescendant="activeDescendant"
                                                                class="max-h-56 rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5">
                                                                
                                                                @if (isset($profiles) && count($profiles)>0)
                                                                    @php
                                                                        $count = 1;
                                                                    @endphp
                                                                    @foreach ($profiles as $profile)
                                                                        @if ($profile->user_id === $user->id)
                                                                            @php
                                                                                $count = $count + 1;
                                                                            @endphp
                                                                            <li id="assigned-to-option-{{ $count }}" role="option"
                                                                                @click="choose({{ $count }})" @mouseenter="selected = {{ $count }}"
                                                                                @mouseleave="selected = null"
                                                                                :class="{ 'bg-yellow-400': selected === {{ $count }} }"
                                                                                class="text-white cursor-default select-none relative py-2 pl-4 pr-9">
                                                                                <div class="flex items-center space-x-3">
                                                                                    <span
                                                                                        :class="{ 'font-semibold': value === {{ $count }}, 'font-normal': !(value === {{ $count }}) }"
                                                                                        class="font-normal block truncate">
                                                                                        {{ $profile->gamertag }}
                                                                                    </span>
                                                                                </div>
                                                                                <span x-show="value === {{ $count }}"
                                                                                    :class="{ 'text-white': selected === {{ $count }}, 'text-yellow-400': !(selected === {{ $count }}) }"
                                                                                    class="absolute inset-y-0 right-0 flex items-center pr-4 text-yellow-400"
                                                                                    style="display: none;">
                                                                                    <svg class="h-5 w-5" fill="currentColor"
                                                                                        viewBox="0 0 20 20">
                                                                                        <path fill-rule="evenodd"
                                                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                                            clip-rule="evenodd"></path>
                                                                                    </svg>
                                                                                </span>
                                                                            </li>
                                                                        @endif
                                                                    @endforeach    
                                                                @else
                                                                    <li id="assigned-to-option-0" role="option"
                                                                        @click="choose(0)" @mouseenter="selected = 0"
                                                                        class="text-white cursor-default select-none relative py-2 pl-4 pr-9">
                                                                        <div class="flex items-center space-x-3">
                                                                            <span
                                                                                class="font-normal block truncate">
                                                                                Ningún perfil encontrado
                                                                            </span>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                                
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        

                                        <!-- Buttons -->
                                        <div class="flex-col align-baseline">
                                            <div class="grid grid-cols-2 gap-2">
                                                <button
                                                    class="px-4 py-2 text-white transition duration-500 ease-in-out bg-gray-400 rounded-xl hover:bg-gray-500"
                                                    onclick="closeSidePanelJoin()" type="button">Cancelar</button>
                                                <button
                                                    class="px-4 py-2 text-white transition duration-500 ease-in-out bg-yellow-400 rounded-xl hover:bg-yellow-500"
                                                    type="submit">Unirme</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="profile_id" class="profile_id" value="">
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </section>
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
    <script>
        function asignValue(valor) {
            var x = document.getElementsByClassName("profile_id");
            var id = <?php echo $user->id ?>;
            var count = 1;
            var array = <?php echo $profiles ?>;
            array.forEach(element => {
                if (element['user_id'] === id) {
                    if (count === valor-1) {
                        var i;
                        for (i = 0; i < x.length; i++) {
                            x[i].value = element['id'];
                        }
                    }
                    count++
                }
            });
        }

        window.Components = {
            customSelect(options) {
                return {
                    init() {
                        this.$refs.listbox.focus()
                        this.optionCount = this.$refs.listbox.children.length
                        this.$watch('selected', value => {
                            if (!this.open) return

                            if (this.selected === null) {
                                this.activeDescendant = ''
                                return
                            }
                        })
                    },
                    activeDescendant: null,
                    optionCount: null,
                    open: false,
                    selected: null,
                    value: 1,
                    choose(option) {
                        this.value = option
                        this.open = false
                        asignValue(option);
                    },
                    onButtonClick() {
                        if (this.open) return
                        this.selected = this.value
                        this.open = true
                        this.$nextTick(() => {
                            this.$refs.listbox.focus()
                            
                        })
                    },
                    onOptionSelect() {
                        if (this.selected !== null) {
                            this.value = this.selected
                        }
                        this.open = false
                        this.$refs.button.focus()
                    },
                    onEscape() {
                        this.open = false
                        this.$refs.button.focus()
                    },
                    onArrowUp() {
                        this.selected = this.selected - 1 < 1 ? this.optionCount : this.selected - 1
                        this.$refs.listbox.children[this.selected - 1].scrollIntoView({
                            block: 'nearest'
                        })
                    },
                    onArrowDown() {
                        this.selected = this.selected + 1 > this.optionCount ? 1 : this.selected + 1
                        this.$refs.listbox.children[this.selected - 1].scrollIntoView({
                            block: 'nearest'
                        })
                    },
                    
                }
            }
        }

    </script>
</body>

</html>
