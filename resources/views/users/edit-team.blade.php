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
<body class="bg-admin-dash bg-cove">
    @livewire('admin-navbar')

    <div class="mx-8 lg:mx-20">
        <h1 class="text-white font-bold text-3xl my-10">Editar equipo</h1>
    </div>
    <div class="w-full ">
        <div class=" lg:mx-20 bg-gray-500 bg-opacity-50 rounded-3xl mb-20 mx-8 p-10">
            <form method="POST" action="{{ route('update-team') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="flex flex-col md:flex-row justify-between md:w-1/2 mb-6 ">
                        <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">Nombre: </span></h1>
                        <input type="text" value="{{ $team->name }}" name="name" class="px-4 py-2 rounded-lg text-white  bg-gray-500 bg-opacity-25 hover:bg-gray-900 hover:bg-opacity-50 transition duration-300 ease-in-out">
                    </div>
                    <input type="hidden" value="{{ $team->id }}" name="id">
                </div>
                <div class="flex flex-row-reverse">
                    <button type="submit" class="text-white font-medium text-xl rounded-xl px-6 py-2 bg-yellow-400 hover:bg-green-500 transition duration-500 ease-in-out">Actualizar</button>
                    <a href="{{ route('teams') }}" class="text-white font-medium text-xl rounded-xl px-6 py-2 mr-4 bg-gray-500 bg-opacity-25 hover:bg-red-600 transition duration-500 ease-in-out">Cancelar</a>
                </div>
            </form>
            
        </div>
    </div>

    <div class="w-full h-screen">
        <div class="max-w-6xl md:mx-auto bg-gray-500 bg-opacity-50 rounded-3xl my-20 mx-8 p-10">
            <table class="w-full text-white">
                <thead class="text-xl border-b-2">
                    <th class="w-4/5 pb-4 border-r-2">Gamertag</th>
                    <th class="pb-4">Acciones</th>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        @if ($member->access_code === $team->access_code)
                            <tr class="border-t-2">
                                <td class="py-4 text-center border-r-2">{{ $member->profile->gamertag }}</td>
                                <td class="py-4 text-center">
                                        <button onclick="remove('{{ $member->id }}',this)" class="px-4 py-2 bg-yellow-400 rounded-lg hover:bg-red-600 transition duration-500 ease-in-out">
                                            Eliminar
                                        </button> 
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>

    


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

        function remove(id, target) {
            swal({
                    title: "Estás seguro?",
                    text: "Una vez que lo elimines, se eliminaran sus puntos aportados al equipo! Despues puedes agregarlo otra vez a tu equipo",
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
                                swal("¡El perfil fue eliminado!", {
                                    icon: "success",
                                });
                                $(target).parent().parent().remove()
                            } else {
                                swal("Ocurrio un error, intenta más tarde.", {
                                    icon: "error",
                                });
                            }
                        });

                    } else {
                        swal("El perfil no fue eliminado");
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