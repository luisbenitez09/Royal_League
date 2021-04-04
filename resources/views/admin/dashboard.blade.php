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
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="bg-admin-dash bg-cover">
    @livewire('admin-navbar')

    <div class="w-full px-8 md:px-16 xl:px-64">
        <h1 class="text-3xl text-white font-bold mt-20">Dashboard</h1>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-16 justify-between py-5 mb-20">

            <div class="group h-44 p-5 bg-gray-500 bg-opacity-25 hover:bg-opacity-50 rounded-3xl transition duration-500 ease-in-out">
                <div class="bg-gray-400 bg-opacity-25 w-16 h-16 rounded-2xl py-3 mb-4 group-hover:bg-yellow-400 transition duration-500 ease-in-out">
                    <img src="{{ asset('img/icon-user.png') }}" alt="" class="w-10 mx-auto">
                </div>
                <h1 class="text-white font-bold text-2xl">298 usuarios</h1>
                <a href="{{ route('teams-users') }}" class="text-white font-light hover:text-red-700 transition duration-500 ease-in-out">Ver usuarios</a>
            </div>
            <div class="group h-44 p-5 bg-gray-500 bg-opacity-25 hover:bg-opacity-50 rounded-3xl transition duration-500 ease-in-out">
                <div class="bg-gray-400 bg-opacity-25 w-16 h-16 rounded-2xl py-3 mb-4 group-hover:bg-yellow-400 transition duration-500 ease-in-out">
                    <img src="{{ asset('img/icon-team.png') }}" alt="" class="w-10 mx-auto">
                </div>
                <h1 class="text-white font-bold text-2xl">54 equipos</h1>
                <a href="" class="text-white font-light hover:text-red-700 transition duration-500 ease-in-out">Ver equipos</a>
            </div>
            <div class="group h-44 p-5 bg-gray-500 bg-opacity-25 hover:bg-opacity-50 rounded-3xl transition duration-500 ease-in-out">
                <div class="bg-gray-400 bg-opacity-25 w-16 h-16 rounded-2xl py-3 mb-4 group-hover:bg-yellow-400 transition duration-500 ease-in-out">
                    <img src="{{ asset('img/icon-tournaments.png') }}" alt="" class="w-10 mx-auto">
                </div>
                <h1 class="text-white font-bold text-2xl">25 torneos</h1>
                <a href="" class="text-white font-light hover:text-red-700 transition duration-500 ease-in-out">Ver torneos</a>
            </div>

            <div class="lg:col-span-2 h-96 bg-gray-500 bg-opacity-50 rounded-3xl p-6 justify-between">
                <h1 class="text-center text-2xl text-white font-bold">Equipos registrados</h1>
                <table class="w-full text-white mt-6">
                    <thead class="text-xl border-b-2">
                        <th class="w-1/2 pb-4 border-r-2">Equipo</th>
                        <th class="pb-4 border-r-2">Puntos</th>
                        <th class="pb-4">Posición</th>
                    </thead>
                    <tbody>
                        <tr class="border-t-2">
                            <td class="py-2 text-center border-r-2">Fouz</td>
                            <td class="py-2 text-center border-r-2">1289</td>
                            <td class="py-2 text-center">1</td>
                        </tr>
                        <tr class="border-t-2">
                            <td class="py-2 text-center border-r-2">Momos 4k</td>
                            <td class="py-2 text-center border-r-2">1287</td>
                            <td class="py-2 text-center">2</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="group h-44 p-5 bg-gray-500 bg-opacity-25 hover:bg-opacity-50 rounded-3xl transition duration-500 ease-in-out">
                <div class="bg-gray-400 bg-opacity-25 w-16 h-16 rounded-2xl py-3 mb-4 group-hover:bg-yellow-400 transition duration-500 ease-in-out">
                    <img src="{{ asset('img/icon-cms.png') }}" alt="" class="w-10 mx-auto">
                </div>
                <h1 class="text-white font-bold text-2xl">CMS</h1>
                <a href="" class="text-white font-light hover:text-red-700 transition duration-500 ease-in-out">Editar web</a>
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