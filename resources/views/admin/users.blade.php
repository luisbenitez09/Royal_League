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
    <title>Usuarios</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-dash bg-cover bg-center">
    <!-- navbar -->
    @livewire('admin-navbar')

    <!-- header -->
    <div class="w-full py-20 z-0">
        <h1 class="text-white text-5xl font-bold text-center">Usuarios registrados</h1>

        <div class="flex flex-col md:flex-row w-full justify-around">
            <div class="w-36 mx-auto lg:mx-0 mb-4 py-1  bg-gray-600 bg-opacity-50 rounded-full flex flex-row transform hover:-translate-y-2 transition duration-500 ease-in-out">
                <div class="w-1/3">
                    <img src="{{ asset('img/icon-users.png') }}" alt="Premio" class="w-6 ml-4 mt-2">
                </div>
                <div class="w-2/3 flex flex-col">
                    <h3 class="font-semibold text-white">{{ $users_count }}</h3>
                    <p class="text-gray-400 font-light text-xs">Usuarios</p>
                </div>
            </div>
            <div class="w-40 mx-auto lg:mx-0 mb-4 py-1  bg-gray-600 bg-opacity-50 rounded-full flex flex-row transform hover:-translate-y-2 transition duration-500 ease-in-out">
                <div class="w-1/3">
                    <img src="{{ asset('img/icon-admin.png') }}" alt="Premio" class="w-6 ml-4 mt-2">
                </div>
                <div class="w-2/3 flex flex-col">
                    <h3 class="font-semibold text-white">{{ $admins_count }}</h3>
                    <p class="text-gray-400 font-light text-xs">Admins</p>
                </div>
            </div>
            
        </div>
    </div>


    <!-- users table -->
    <div class="w-full h-screen">
        <div class="max-w-6xl md:mx-auto bg-gray-800 bg-opacity-50 rounded-3xl my-20 mx-8 p-10">
            <table class="w-full text-white">
                <thead class="text-xl border-b-2">
                    <th class="pb-4">Usuario</th>
                    <th class="pb-4">Email</th>
                    <th class="pb-4">Puntos</th>
                    <th class="pb-4">Acciones</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                       <tr class="">
                            <td class="py-4 text-center">{{ $user->name }}</td>
                            <td class="py-4 text-center">{{ $user->email }}</td>
                            <td class="py-4 text-center">
                                @php
                                    if($user->role_id === 1) {
                                        echo "Admin";
                                    } else {
                                        $userPoints = 0;
                                    foreach ($profiles as $profile) {
                                        if($profile->user_id === $user->id) {
                                            $userPoints+=$profile->points;
                                        }
                                    }
                                    echo $userPoints;
                                    }
                                    
                                @endphp
                            </td>
                            <td class="py-4 text-center">
                                <a href="{{ route('edit-user',$user->id) }}" class="px-4 py-2 bg-yellow-400 rounded-lg hover:bg-red-600 transition duration-500 ease-in-out">
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