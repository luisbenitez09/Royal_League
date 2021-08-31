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
    @livewire('navbar')

    <!-- header -->
    <div class="w-full -mt-28">
        <div class="absolute w-full mt-2/12">
            <h1 class="text-white tex-3xl md:text-5xl font-bold text-center">Torneos</h1>
        </div>
        
        <img src="{{ asset('img/bg-torneos.png') }}" alt="" class="h-full w-screen ">
    </div>

    <!-- tournaments -->
    <div class="w-full md:container mx-auto py-20 px-20 md:px-0">

        <!-- filters 
        <div class="flex flex-row text-white font-light text-sm mb-20">
            <button class="mr-8 hover:text-red-600 transition duration-500 ease-in-out">Todos</button>
            <button class="mr-8 hover:text-red-600 transition duration-500 ease-in-out">Próximos</button>
            <button class="mr-8 hover:text-red-600 transition duration-500 ease-in-out">Finalizados</button>
            <button class="mr-8 hover:text-red-600 transition duration-500 ease-in-out">COD WARZONE</button>
        </div> -->

        <!-- grid -->
        <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($tournaments as $tournament)
            <div class="max-w-sm h-96">
                <img src="{{ asset('storage/img/torneos/'.$tournament->image) }}"  alt="" class="w-full h-60 ">
                <!-- overlay -->
                <div class="w-full h-60 bg-gradient-to-r from-red-700 to-gray-900 opacity-0 hover:opacity-75 -mt-60 relative mb-4 text-center transition duration-500 ease-in-out">
                    <a href="{{ route('tournament-info',$tournament->id) }}" class="text-white mt-28 -ml-7 absolute">Ver más</a>
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