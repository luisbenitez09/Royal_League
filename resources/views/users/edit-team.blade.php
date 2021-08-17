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
    <title>Editar equipo</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-fixed bg-center bg-cover bg-dash">
    
    <!-- Navbar -->
        @livewire('navbar')
    <!-- Titulo -->
    <div class="mx-8 lg:mx-20 flex flex-row justify-between my-8">
        <h1 class="text-white font-bold text-3xl">Editar equipo</h1>
        <button class="w-40 px-3 h-12 font-light text-white transition duration-500 ease-in-out bg-gray-500 bg-opacity-25 rounded-lg hover:bg-red-600 hover:bg-opacity-100"
        type="button" onclick="remove('{{ $team->id }}',this)">Eliminar equipo</button>
    </div>

    <!-- Top card -->
    <div class="w-full">
        <div class="max-w-6xl xl:mx-auto lg:mx-20 bg-gray-500 bg-opacity-25 rounded-3xl mb-20 mx-8 p-10">
            <form method="POST" action="{{ route('update-team') }}">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <div class="flex flex-col md:flex-row justify-between md:w-1/2 mb-6 ">
                        <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">Nombre: </h1>
                        <input type="text" value="{{ $team->name }}" name="name" class="px-4 py-2 rounded-lg text-white  bg-gray-700 bg-opacity-25 hover:bg-gray-600 hover:bg-opacity-50 transition duration-300 ease-in-out">
                    </div>
                    <div class="flex flex-row lg:flex-row-reverse mb-4 md:mb-0">
                        <h1 class="text-center text-xl md:text-2xl text-white font-light mr-4 lg:mr-0">Puntos: <span class="font-bold">{{ $team->points }}</span></h1>
                        <h1 class="text-center text-xl md:text-2xl text-white font-light lg:mr-4">Torneos: <span class="font-bold">{{ $team->tournaments }}</span></h1>
                    </div>
                    <input type="hidden" value="{{ $team->id }}" name="id">
                </div>
                
                <div class="flex flex-col md:flex-row justify-between">
                    <h1 class="mb-4 md:mb-0 text-xl md:text-2xl text-white font-bold mr-5">Código de equipo: <span class="text-sm font-light">{{ $team->access_code }}</span></h1>
                    <div class="flex flex-row-reverse justify-between">
                        <button type="submit" class="text-white font-medium text-xl rounded-xl h-12 px-6  bg-yellow-400 hover:bg-green-500 transition duration-500 ease-in-out">Actualizar</button>
                        <a href="{{ route('teams') }}" class="text-white font-medium text-xl pt-2 rounded-xl px-6 h-12 mr-4 bg-gray-500 bg-opacity-25 hover:bg-red-600 transition duration-500 ease-in-out">Cancelar</a>
                    </div>
                </div>
            </form>
            
        </div>
    </div>

    <!-- Members card -->
    @isset($members)
       <div class="w-full">
            <div class="max-w-6xl xl:mx-auto lg:mx-20 bg-gray-500 bg-opacity-25 rounded-3xl my-20 mx-8 p-10">
                <table class="w-full text-white">
                    <thead class="text-xl border-b-2">
                        <th class="w-1/4 pb-4">Usuario</th>
                        <th class="w-1/4 pb-4">Plataforma</th>
                        <th class="w-1/4 pb-4">Puntos</th>
                        <th class="pb-4">Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($members as $member)
                            <tr class="">
                                <td class="py-4 text-center">{{ $member->profile->gamertag }}</td>
                                <td class="py-4 text-center">
                                    @if ($member->profile->platform === "xbl")
                                        Xbox Live
                                    @endif
                                    @if ($member->profile->platform === "battle")
                                        Battlenet
                                    @endif
                                    @if ($member->profile->platform === "psn")
                                        PlayStation Network
                                    @endif
                                    
                                </td>
                                <td class="py-4 text-center">{{ $member->member_points }}</td>
                                <td class="py-4 text-center">
                                        <button onclick="removeMember('{{ $member->id }}','{{ $team->id }}',this)" class="px-4 py-2 bg-yellow-400 rounded-lg hover:bg-red-600 transition duration-500 ease-in-out">
                                            Eliminar
                                        </button> 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div> 
    @endisset
    

    @livewire('footer')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

        function remove(id) {
            swal({
                    title: "Estás seguro?",
                    text: "Una vez que elimines el equipo, no podrás recuperalo.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        axios({
                            method: 'delete',
                            url: '{{ url('teams') }}',
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            }
                        }).then(function (response) {
                            if (response.data.code == 200) {
                                window.location = '/teams';
                            } else {
                                swal("Ocurrio un error, intenta más tarde.", {
                                    icon: "error",
                                });
                            }
                        });

                    } else {
                        swal("El equipo no fue eliminado");
                    }
                });
        }


        function removeMember(id, tId) {
            swal({
                    title: "Estás seguro?",
                    text: "Una vez que lo elimines, no podrás recuperalo.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        axios({
                            method: 'delete',
                            url: '{{ url('members') }}',
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            }
                        }).then(function (response) {
                            if (response.data.code == 200) {
                                window.location = '/teams';
                            } else {
                                swal("Ocurrio un error, intenta más tarde.", {
                                    icon: "error",
                                });
                            }
                        });

                    } else {
                        swal("El miembro no fue eliminado");
                    }
                });
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