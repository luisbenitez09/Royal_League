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
    <title>Usuarios / Equipos</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-admin-teams bg-cover bg-fixed">
    @livewire('admin-navbar')

    <div class="w-full h-screen">
        <div class="max-w-6xl md:mx-auto bg-gray-500 bg-opacity-50 rounded-3xl my-20 mx-8 p-10">
            <h1 class="text-center text-2xl text-white font-bold mb-5">Equipos registrados</h1>
            <table class="w-full text-white">
                <thead class="text-xl border-b-2">
                    <th class="pb-4 border-r-2">Nombre</th>
                    <th class="pb-4 border-r-2">Creador</th>
                    <th class="pb-4 border-r-2">Puntos</th>
                    <th class="pb-4">Acciones</th>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                        <tr class="border-t-2">
                            <td class="py-4 text-center border-r-2">{{ $team->name }}</td>
                            <td class="py-4 text-center border-r-2">{{ $team->user->name }}</td>
                            <td class="py-4 text-center border-r-2">{{ $team->points }}</td>
                            <td class="py-4 text-center">
                                <a href="{{ route('edit-team',$team->id) }}" class="px-4 py-2 bg-yellow-400 rounded-lg hover:bg-red-600 transition duration-500 ease-in-out">
                                    Editar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    
                    
                </tbody>
            </table>
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