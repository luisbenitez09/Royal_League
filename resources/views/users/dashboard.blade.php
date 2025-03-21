<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Style -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body style="background-color: #1a2a41"  class="bg-dash bg-cover bg-center bg-fixed">
    
    <div class="w-full min-h-screen z-20 ">
        <!-- Navbar -->
        @livewire('navbar')

        <!-- Contenido -->
        <div class="container mx-auto mt-8 px-4 sm:px-0 z-30">
            <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-8 gap-x-8">
                <!-- Teams -->
                <div class="col-span-1 md:col-span-2 lg:h-screen overflow-y-auto mb-8 md:mb-0">
                    <h2 class="text-lg text-white font-semibold text-opacity-50 mb-8" >Mis equipos</h2>
                    <ul>
                        @foreach ($teams as $team)
                                <li>
                                    <div class="w-full flex flex-row bg-gray-500 bg-opacity-25 rounded-2xl p-3 mb-4 transform hover:-translate-y-2 transition duration-500 ease-in-out">
                                        <div class="w-2/3">
                                            <h3 class="font-semibold text-white">{{ $team->name }}</h3>
                                            <p class="font-light text-white text-opacity-75 text-xs mb-2">
                                                {{ DB::table('members')->where('access_code', $team->access_code)->count() }} miebros</p><!-- fix this in backend -->
                                            <p class="font-medium text-white">{{ $team->points }} puntos</p>
                                        </div>
                                        
                                    </div>
                                </li>
                        @endforeach
                        <li>
                            <a href="{{ route('teams') }}" class="w-full h-20 mb-10 flex flex-col items-center bg-gray-400 bg-opacity-50 hover:bg-gray-500 hover:bg-opacity-50 transition duration-500 ease-in-out rounded-2xl p-2 " >
                                    <h3 class="font-light mt-3 text-white animate-pulse">Ver mis equipos</h3>
                                    <i class="fa fa-search animate-pulse text-white"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Torneos -->
                <div class="col-span-1 md:col-span-4 h-screen overflow-y-auto">

                    <!-- Title-->
                    <h2 class="text-lg text-white font-semibold text-opacity-50 mb-8">Torneo en progreso</h2>
                    <!-- Main Card-->
                    @if ($onlineTournament)
                        @foreach ($tournaments as $tournament)
                        @if ($tournament->status === 2)
                            <div class="w-full h-56 rounded-3xl bg-online-t bg-center bg-cover mb-8 transform hover:-translate-y-2 transition duration-500 ease-in-out">
                                <div class="w-full h-56 rounded-3xl p-4 bg-black bg-opacity-50">
                                    <h1 class="text-white font-semibold text-2xl mb-1">{{ $tournament->title }}</h1>
                                    <p class="font-light text-white text-sm">{{ $tournament->date }}</p>
                                    <p class="font-light text-white text-sm">KD 10 max / team</p>
                                    <p class="font-light text-white text-sm mb-1">{{ $tournament->time }} <span class="font-bold text-xs">Hora CDMX (GMT-6)</span></p>
                                    <!-- Live marker-->
                                    <div class="w-28 grid grid-cols-2 lg:mb-10">
                                        <div class="col-1 items-center">
                                            <span class="flex h-3 w-3">
                                                <span class="animate-pulse relative w-full h-full rounded-full inline-flex bg-red-600"></span>
                                                
                                            </span>
                                        </div>
                                        <span class="text-red-600 text-xs font-light col-1 -ml-8 -mt-1 align-top">En curso</span>
                                    </div>
                                    <!-- Button -->
                                    <a href="{{ route('live-tournament',$tournament->id) }}" class="w-32 bg-yellow-400 hover:bg-yellow-300 transition duration-500 ease-in-out py-1 px-4 rounded-lg text-white font-semibold ">
                                        Ver torneo
                                    </a>
                                </div>
                            </div>
                        @endif
                        @endforeach
                    @else
                        <div class="w-full h-56 rounded-3xl bg-no-t bg-cover mb-8 transform hover:-translate-y-2 transition duration-500 ease-in-out">
                            <div class="w-full h-56 rounded-3xl p-4 bg-black bg-opacity-50">
                                <h1 class="text-white font-semibold text-2xl mb-1">No hay ningún torneo en juego</h1>    
                            </div>
                        </div>
                    @endif
                    
                    <!-- Subtitles line-->
                    <div class="w-full grid grid-cols-2 mb-4">
                        <h2 class="font-bold text-white text-opacity-50 text-lg col-1">Próximos torneos</h2>
                        <a href="{{ route('tournaments') }}" class="text-white text-opacity-75 font-thin col-start-3 ">Ver todos</a>
                    </div>

                    <!-- Cards grid-->
                    <div class="grid grid-cols-2 gap-y-4 gap-x-8 mb-52">
                        @foreach ($tournaments as $tournament)
                            @if ($tournament->status === 1)
                                <div class="bg-prox-t bg-center bg-cover w-full rounded-2xl transform hover:-translate-y-2 transition duration-500 ease-in-out">
                                    <img src="" alt="">
                                    <div class="w-full  bg-black bg-opacity-50 rounded-2xl p-3">
                                        <h3 class="text-white font-semibold text-sm">{{ $tournament->title }}</h3>
                                        <p class="text-xs text-white font-thin mb-6">{{ $tournament->date }}</p>
                                        <div>
                                            <a href="{{ route('tournament-info',$tournament->id) }}" class="text-white bg-yellow-400 w-28 rounded-md px-7 hover:bg-yellow-500 transition duration-500 ease-in-out">Ver</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <!-- Stats -->
                <div class="col-span-1 md:col-span-6 lg:col-span-2 mb-8 z-0">
                    <h2 class="text-lg text-white font-semibold text-opacity-50 mb-8">Mi progreso</h2>
                    <!-- Stats card one-->
                    <div class="w-full h-64 mb-8 bg-gray-500 bg-opacity-25 rounded-3xl p-4 flex flex-col items-center transform hover:-translate-y-2 transition duration-500 ease-in-out">
                        <h3 class="font-semibold text-white text-md mb-4">Puntos acumulados</h3>
                        <h1 class="font-bold text-yellow-400 text-4xl mb-4">{{ $userPoints }}</h1>
                        <p class="font-light text-white text-xs mb-3">Torneos jugados: {{ $user->played_t }}</p>
                        <p class="font-light text-white text-xs mb-4">Podios: {{ $user->podiums }}</p>
                        <div class="px-4 py-2 bg-black bg-opacity-50 rounded-lg">
                            <p class="text-white font-medium text-sm">Último torneo: {{ $user->last_result }}</p>
                        </div>
                    </div>
                    <!-- Stats card 2-->
                    <div class="w-full h-20 bg-gray-500 bg-opacity-25 rounded-3xl p-4 transform hover:-translate-y-2 transition duration-500 ease-in-out">
                        <p class="text-white font-semibold text-sm">Equipos creados: {{ $ownedTeams }}</p>
                        <p class="text-white font-semibold text-sm">Número de perfiles: {{ $profileNum }}</p>
                    </div>
                </div>
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
    </script>
</body>
</html>