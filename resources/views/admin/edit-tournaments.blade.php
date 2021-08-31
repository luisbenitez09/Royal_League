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
    <title>Editar torneo</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-dash bg-cover bg-center">
    @livewire('admin-navbar')

    
    <!-- Edit tournament -->
    <section>
        <div class="mx-8 lg:mx-20">
            <h1 class="text-white font-bold text-3xl text-center mb-10">Editar torneo</h1>
        </div>

        <div class="w-full ">
            <div class="max-w-6xl md:mx-auto bg-gray-800 bg-opacity-50 rounded-3xl mb-20 mx-8 p-10">
                <form method="POST" action="{{ route('update-tournament') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="flex flex-col  justify-between md:w-1/2 mx-auto mb-6 ">
                            <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">Torneo: </span></h1>
                            <input type="text" value="{{ $tournament->title }}" name="title" class="px-4 py-2 rounded-lg text-white  bg-gray-500 bg-opacity-25 hover:bg-gray-900 hover:bg-opacity-50 transition duration-300 ease-in-out">
                        </div>
                        <div class="flex flex-col justify-between md:w-1/2 mx-auto mb-6 ">
                            <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">Juego: </span></h1>
                            <input type="text" value="{{ $tournament->game }}" name="game" class="px-4 py-2 rounded-lg text-white  bg-gray-500 bg-opacity-25 hover:bg-gray-900 hover:bg-opacity-50 transition duration-300 ease-in-out">
                        </div>
                        <div class="flex flex-col justify-between md:w-1/2 mx-auto mb-6 ">
                            <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">Status: </span></h1>
                            <input type="text" value="{{ $tournament->status }}" name="status" class="px-4 py-2 rounded-lg text-white  bg-gray-500 bg-opacity-25 hover:bg-gray-900 hover:bg-opacity-50 transition duration-300 ease-in-out">
                        </div>
                        <div class="flex flex-col justify-between md:w-1/2 mx-auto mb-6 ">
                            <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">Fecha: </span></h1>
                            <input type="text" value="{{ $tournament->date }}" name="date" class="px-4 py-2 rounded-lg text-white  bg-gray-500 bg-opacity-25 hover:bg-gray-900 hover:bg-opacity-50 transition duration-300 ease-in-out">
                        </div>
                        <div class="flex flex-col justify-between md:w-1/2 mx-auto mb-6 ">
                            <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">Horario: </span></h1>
                            <input type="text" value="{{ $tournament->time }}" name="time" class="px-4 py-2 rounded-lg text-white  bg-gray-500 bg-opacity-25 hover:bg-gray-900 hover:bg-opacity-50 transition duration-300 ease-in-out">
                        </div>
                        <div class="flex flex-col justify-between md:w-1/2 mx-auto mb-6 ">
                            <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">KD: </span></h1>
                            <input type="text" value="{{ $tournament->kd }}" name="kd" class="px-4 py-2 rounded-lg text-white  bg-gray-500 bg-opacity-25 hover:bg-gray-900 hover:bg-opacity-50 transition duration-300 ease-in-out">
                        </div>
                        <div class="flex flex-col justify-between md:w-1/2 mx-auto mb-6 ">
                            <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">1er lugar: </span></h1>
                            <input type="text" value="{{ $tournament->price1 }}" name="kd" class="px-4 py-2 rounded-lg text-white  bg-gray-500 bg-opacity-25 hover:bg-gray-900 hover:bg-opacity-50 transition duration-300 ease-in-out">
                        </div>
                        <div class="flex flex-col justify-between md:w-1/2 mx-auto mb-6 ">
                            <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">2do lugar: </span></h1>
                            <input type="text" value="{{ $tournament->price2 }}" name="kd" class="px-4 py-2 rounded-lg text-white  bg-gray-500 bg-opacity-25 hover:bg-gray-900 hover:bg-opacity-50 transition duration-300 ease-in-out">
                        </div>
                        <div class="flex flex-col justify-between md:w-1/2 mx-auto mb-6 ">
                            <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">3er lugar: </span></h1>
                            <input type="text" value="{{ $tournament->price3 }}" name="kd" class="px-4 py-2 rounded-lg text-white  bg-gray-500 bg-opacity-25 hover:bg-gray-900 hover:bg-opacity-50 transition duration-300 ease-in-out">
                        </div>
                        <div class="flex flex-col justify-between md:w-1/2 mx-auto mb-6 ">
                            <label class="w-full flex flex-col items-center px-4 py-6 bg-gray-500 bg-opacity-25 rounded-lg tracking-wide cursor-pointer hover:bg-opacity-50 text-white hover:text-yellow-400 ease-in-out transition duration-500">
                                <i class="fas fa-cloud-upload-alt fa-2x"></i>
                                <span class="mt-2 text-base leading-normal">Selecciona imagen</span>
                                <input type='file' id="image" name="image" class="hidden" />
                            </label>
                        </div>
                        <div class="flex flex-col md:col-span-2 justify-between md:w-2/3 mx-auto mb-6 ">
                            <h1 class="text-center text-xl md:text-2xl text-white font-bold mr-5">Descripción: </span></h1>
                            <textarea name="description" cols="24" rows="10" class="px-4 py-2 rounded-lg text-white  bg-gray-500 bg-opacity-25 hover:bg-gray-900 hover:bg-opacity-50 transition duration-300 ease-in-out">{{ $tournament->description }}</textarea>
                        </div>
                        <input type="hidden" value="{{ $tournament->id }}" name="id">
                    </div>
                    <div class="flex flex-row-reverse">
                        <button type="submit" class="text-white font-medium text-xl rounded-xl px-6 py-2 bg-yellow-400 hover:bg-green-500 transition duration-500 ease-in-out">Actualizar</button>
                        <a href="{{ route('admin-tournaments') }}" class="text-white font-medium text-xl rounded-xl px-6 py-2 mr-4 bg-gray-500 bg-opacity-25 hover:bg-red-600 transition duration-500 ease-in-out">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Rules -->
    <section>
        <div class="mx-8 lg:mx-20">
            <h1 class="text-white font-bold text-3xl text-center mb-10">Reglas</h1>
        </div>

        <div class="w-full ">
            <div class="max-w-6xl md:mx-auto bg-gray-800 bg-opacity-50 rounded-3xl mb-20 mx-8 p-10">
                <!-- errors zone -->
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="w-full md:w-1/2 px-5 py-3 rounded-lg mx-auto mb-4 bg-yellow-400 text-white">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                <form method="POST" action="{{ route('rules') }}" class="mb-12">
                    @csrf
                    <p class="text-white font-light mb-6">Agrega una regla al torneo</p>
                    <div class="flex flex-col md:flex-row justify-between align-top mt-2 mb-8 w-full">
                        <input type="text"
                            class="h-10 pl-4 text-white transition duration-500 ease-in-out bg-opacity-50 rounded-full mb-4 md:w-3/4 bg-gray-700 hover:bg-gray-500 hover:bg-opacity-50"
                            id="rule" name="rule" value="{{ old('rule') }}" placeholder="Regla" required>
                        
                        <input type="hidden" id="tournament_id" name="tournament_id" value="{{ $tournament->id }}">
                        
                        <button type="submit"
                            class="px-4 h-10 font-light text-white transition duration-500 ease-in-out bg-gray-600 bg-opacity-50 rounded-lg hover:bg-yellow-400">
                            Agregar</button>
                    </div>

                </form>

                <!-- Show rules -->
                <table class="w-full table-auto">
                    <thead class="text-left">
                        <tr>
                            <th class="text-white text-2xl">Regla</th>
                            <th class="text-white text-2xl">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rules as $rule)
                            <tr class="border-white border-b">
                                <td class="text-white text-xl py-4">{{ $rule->rule }}</td>
                                <td class="py-4 text-right">
                                    <button onclick="removeR('{{ $rule->id }}',this)" class="submit bg-red-800 hover:bg-red-700 px-4 py-1 rounded-lg text-white transition duration-500 ease-in-out">Borrar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    
    <!-- Parameters -->
    <section>
        <div class="mx-8 lg:mx-20">
            <h1 class="text-white font-bold text-3xl text-center mb-10">Parámetros</h1>
        </div>

        <div class="w-full ">
            <div class="max-w-6xl md:mx-auto bg-gray-800 bg-opacity-50 rounded-3xl mb-20 mx-8 p-10">
                <!-- errors zone -->
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="w-full md:w-1/2 px-5 py-3 rounded-lg mx-auto mb-4 bg-yellow-400 text-white">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                
                <form method="POST" action="{{ route('parameter') }}" class="mb-12">
                    @csrf
                    <p class="text-white font-light mb-6">Agrega un parámetro al torneo</p>
                    <div class="flex flex-col md:flex-row justify-between align-top mt-2 mb-8 w-full">
                        <input type="text"
                            class="h-10 pl-4 text-white transition duration-500 ease-in-out bg-opacity-50 rounded-full mb-4 md:w-3/4 bg-gray-700 hover:bg-gray-500 hover:bg-opacity-50"
                            id="parameter" name="parameter" value="{{ old('parameter') }}" placeholder="Parametro" required>
                        
                        <input type="hidden" id="tournament_id" name="tournament_id" value="{{ $tournament->id }}">
                        
                        <button type="submit"
                            class="px-4 h-10 font-light text-white transition duration-500 ease-in-out bg-gray-600 bg-opacity-50 rounded-lg hover:bg-yellow-400">
                            Agregar</button>
                    </div>

                </form>

                <!-- Show parameters -->
                <table class="w-full table-auto">
                    <thead class="text-left">
                        <tr>
                            <th class="text-white text-2xl">Parámetro</th>
                            <th class="text-white text-2xl text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($parameters as $parameter)
                            <tr class="border-white border-b">
                                <td class="text-white text-xl py-4">{{ $parameter->parameter }}</td>
                                <td class="py-4 text-right">
                                    <button onclick="remove('{{ $parameter->id }}',this)" class="submit bg-red-800 hover:bg-red-700 px-4 py-1 rounded-lg text-white transition duration-500 ease-in-out">Borrar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

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

        
    </script>
    <script>
        function remove(id, target) {
            swal({
                    title: "Estás seguro?",
                    text: "Una vez que lo elimines, no podrás recuperarlo!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        axios({
                            method: 'delete',
                            url: '{{ url('parameter') }}',
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            }
                        }).then(function (response) {
                            if (response.data.code == 200) {
                                swal("¡El parámetro fue eliminado!", {
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
                        swal("El parámetro no fue eliminado");
                    }
                });
        }
        function removeR(id, target) {
            swal({
                    title: "Estás seguro?",
                    text: "Una vez que la elimines, no podrás recuperarla!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        axios({
                            method: 'delete',
                            url: '{{ url('rules') }}',
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            }
                        }).then(function (response) {
                            if (response.data.code == 200) {
                                swal("¡La regla fue eliminada!", {
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
                        swal("La regla no fue eliminada");
                    }
                });
        }
    </script>
    
</body>
</html>
