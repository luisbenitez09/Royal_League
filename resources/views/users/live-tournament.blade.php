<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Style -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Torneo actual</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-dash bg-cover bg-center">
    <!-- navbar -->
    @livewire('navbar')
    
    <!-- header -->
    <div class="w-full py-20 z-0">
        <h1 class="text-white text-5xl font-bold text-center">{{ $tournament->title }}</h1>

        <!-- Live marker-->
        <div class="w-32 grid grid-cols-2 mx-auto mb-6">
            <div class="col-1 items-center">
                <span class="flex h-6 w-6">
                    <span class="animate-pulse relative w-full h-full rounded-full inline-flex bg-red-600"></span>
                </span>
            </div>
            <span class="text-red-600 text-lg font-light col-1 -ml-8 -mt-1 align-top">En curso</span>
        </div>
        <div class="flex flex-col md:flex-row w-full justify-around">
            <div class="w-36 mx-auto lg:mx-0 mb-4 py-1  bg-gray-600 bg-opacity-50 rounded-full flex flex-row transform hover:-translate-y-2 transition duration-500 ease-in-out">
                <div class="w-1/3">
                    <img src="{{ asset('img/icon-trophy.png') }}" alt="Premio" class="w-6 ml-4 mt-2">
                </div>
                <div class="w-2/3 flex flex-col">
                    <h3 class="font-semibold text-white">${{ $tournament->price1 }}</h3>
                    <p class="text-gray-400 font-light text-xs">Primer lugar</p>
                </div>
            </div>
            <div class="w-40 mx-auto lg:mx-0 mb-4 py-1  bg-gray-600 bg-opacity-50 rounded-full flex flex-row transform hover:-translate-y-2 transition duration-500 ease-in-out">
                <div class="w-1/3">
                    <img src="{{ asset('img/icon-calendar.png') }}" alt="Premio" class="w-6 ml-4 mt-2">
                </div>
                <div class="w-2/3 flex flex-col">
                    <h3 class="font-semibold text-white">{{ $tournament->date }}</h3>
                    <p class="text-gray-400 font-light text-xs">Fecha</p>
                </div>
            </div>
            <div class="w-48 mx-auto lg:mx-0 mb-4 py-1  bg-gray-600 bg-opacity-50 rounded-full flex flex-row transform hover:-translate-y-2 transition duration-500 ease-in-out">
                <div class="w-1/3">
                    <img src="{{ asset('img/icon-clock.png') }}" alt="Premio" class="w-6 ml-4 mt-2">
                </div>
                <div class="w-2/3 flex flex-col">
                    <h3 class="font-semibold text-white">{{ $tournament->time }}</h3>
                    <p class="text-gray-400 font-light text-xs">Hora CDMX GTM-6</p>
                </div>
            </div>
            <div class="w-44 mx-auto lg:mx-0 mb-4 py-1  bg-gray-600 bg-opacity-50 rounded-full flex flex-row transform hover:-translate-y-2 transition duration-500 ease-in-out">
                <div class="w-1/3">
                    <img src="{{ asset('img/icon-kd.png') }}" alt="Premio" class="w-6 ml-4 mt-2">
                </div>
                <div class="w-2/3 flex flex-col">
                    <h3 class="font-semibold text-white">{{ $tournament->kd }}</h3>
                    <p class="text-gray-400 font-light text-xs">KD</p>
                </div>
            </div>
        </div>
    </div>

    <!-- data -->
    <div class="bg-gray-900 bg-opacity-25 hover:bg-gray-700 hover:bg-opacity-50 rounded-3xl mx-4 md:container md:mx-auto p-10 mb-20 transition duration-500 ease-in-out">
        <h3 class="text-white text-xl font-bold mb-8">Tiempo restante: 15:00 min</h3>
        <table class="w-full text-white">
            <thead class="text-xl border-b-2">
                <th class="w-1/2 md:w-2/3 pb-4">Equipo</th>
                <th class="pb-4">Puntos</th>
                <th class="pb-4">Posición</th>
            </thead>
            <tbody>
                @if (isset($teams) && count($teams)>0)
                    @foreach ($teams as $team)
                        <tr>
                            <td class="py-2 text-center">{{ $team->team->name }}</td>
                            <td class="py-2 text-center">{{ $team->t_points }}</td>
                            <td class="py-2 text-center">{{ $team->t_position }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
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