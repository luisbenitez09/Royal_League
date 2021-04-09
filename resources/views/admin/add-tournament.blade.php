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
    <title>Agregar torneo</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-admin-add-t bg-cover bg-fixed">
    @livewire('admin-navbar')
    <div class="mx-8 lg:mx-20">
        <h1 class="text-white font-bold text-3xl my-10">Agregar equipo</h1>
    </div>
    <div class="w-full ">
        <div class=" lg:mx-20 bg-gray-500 bg-opacity-50 rounded-3xl mb-20 mx-8 p-10">
            <form method="POST" action="{{ route('add-new-tournament') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="flex flex-col  justify-between md:w-1/2 mx-auto mb-6 ">
                        <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">Torneo: </span></h1>
                        <input type="text" value="" name="title" class="px-4 py-2 rounded-lg text-white  bg-gray-500 bg-opacity-25 hover:bg-gray-900 hover:bg-opacity-50 transition duration-300 ease-in-out">
                    </div>
                    <div class="flex flex-col justify-between md:w-1/2 mx-auto mb-6 ">
                        <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">Juego: </span></h1>
                        <input type="text" value="" name="game" class="px-4 py-2 rounded-lg text-white  bg-gray-500 bg-opacity-25 hover:bg-gray-900 hover:bg-opacity-50 transition duration-300 ease-in-out">
                    </div>
                    <div class="flex flex-col justify-between md:w-1/2 mx-auto mb-6 ">
                        <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">Status: </span></h1>
                        <input type="text" value="" name="status" class="px-4 py-2 rounded-lg text-white  bg-gray-500 bg-opacity-25 hover:bg-gray-900 hover:bg-opacity-50 transition duration-300 ease-in-out">
                    </div>
                    <div class="flex flex-col justify-between md:w-1/2 mx-auto mb-6 ">
                        <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">Fecha: </span></h1>
                        <input type="text" value="" name="date" class="px-4 py-2 rounded-lg text-white  bg-gray-500 bg-opacity-25 hover:bg-gray-900 hover:bg-opacity-50 transition duration-300 ease-in-out">
                    </div>
                    <div class="flex flex-col justify-between md:w-1/2 mx-auto mb-6 ">
                        <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">Horario: </span></h1>
                        <input type="text" value="" name="time" class="px-4 py-2 rounded-lg text-white  bg-gray-500 bg-opacity-25 hover:bg-gray-900 hover:bg-opacity-50 transition duration-300 ease-in-out">
                    </div>
                    <div class="flex flex-col justify-between md:w-1/2 mx-auto mb-6 ">
                        <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">KD: </span></h1>
                        <input type="text" value="" name="kd" class="px-4 py-2 rounded-lg text-white  bg-gray-500 bg-opacity-25 hover:bg-gray-900 hover:bg-opacity-50 transition duration-300 ease-in-out">
                    </div>
                    <div class="flex flex-col justify-between md:w-1/2 mx-auto mb-6 ">
                        <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">1er lugar: </span></h1>
                        <input type="text" value="" name="kd" class="px-4 py-2 rounded-lg text-white  bg-gray-500 bg-opacity-25 hover:bg-gray-900 hover:bg-opacity-50 transition duration-300 ease-in-out">
                    </div>
                    <div class="flex flex-col justify-between md:w-1/2 mx-auto mb-6 ">
                        <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">2do lugar: </span></h1>
                        <input type="text" value="" name="kd" class="px-4 py-2 rounded-lg text-white  bg-gray-500 bg-opacity-25 hover:bg-gray-900 hover:bg-opacity-50 transition duration-300 ease-in-out">
                    </div>
                    <div class="flex flex-col justify-between md:w-1/2 mx-auto mb-6 ">
                        <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">3er lugar: </span></h1>
                        <input type="text" value="" name="kd" class="px-4 py-2 rounded-lg text-white  bg-gray-500 bg-opacity-25 hover:bg-gray-900 hover:bg-opacity-50 transition duration-300 ease-in-out">
                    </div>
                    <div class="flex flex-col md:col-span-2 justify-between md:w-2/3 mx-auto mb-6 ">
                        <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">Descripción: </span></h1>
                        <textarea name="description" cols="24" rows="10" class="px-4 py-2 rounded-lg text-white  bg-gray-500 bg-opacity-25 hover:bg-gray-900 hover:bg-opacity-50 transition duration-300 ease-in-out"></textarea>
                    </div>
                    <input type="hidden" value="" name="id">
                </div>
                <div class="flex flex-row-reverse">
                    <button type="submit" class="text-white font-medium text-xl rounded-xl px-6 py-2 bg-yellow-400 hover:bg-green-500 transition duration-500 ease-in-out">Actualizar</button>
                    <a href="" class="text-white font-medium text-xl rounded-xl px-6 py-2 mr-4 bg-gray-500 bg-opacity-25 hover:bg-red-600 transition duration-500 ease-in-out">Cancelar</a>
                </div>
            </form>
            
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