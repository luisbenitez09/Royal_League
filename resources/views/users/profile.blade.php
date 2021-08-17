<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v${1:2.x.x}/dist/alpine.js" defer></script>
    <!-- Style -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Mi Perfil</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body style="background-color: #1a2a41" class="bg-fixed bg-center bg-cover bg-dash">

    <div class="relative z-20 w-full min-h-screen mb-20">
        <!-- Navbar -->
        @livewire('navbar')

        <!-- Contenido -->
        <div class="container z-30 px-4 mx-auto mt-8 sm:px-0">
            <!-- Name -->
            <div class="flex flex-col md:flex-row justify-between">
                <h1 class=" text-4xl text-white font-bold">{{ $user->name }}</h1>
                <h1 class="md:ml-12 text-2xl text-white font-light">Puntos: <span class="text-4xl text-white font-bold">{{ $userPoints }}</span></h1>
            </div>
            
            <!-- Email -->
            <div class="flex flex-row items-center mt-8 mb-20">
                <p class="mr-8 text-xl font-light text-gray-400">{{ $user->email }}</p>
                <!-- <a href="{{ route('change-password') }}"
                    class="px-4 py-2 mr-2 font-light text-white transition duration-500 ease-in-out bg-gray-600 bg-opacity-50 rounded-lg hover:bg-gray-400 hover:bg-opacity-50">Cambiar
                    password</a> -->
            </div>
            
            <!-- Add Gamertag -->
            <form method="POST" action="{{ route('profile') }}" class="mb-12">
                @csrf
                <p class="text-white font-light mb-6">Agrega un perfil de juego</p>
                <div class="flex flex-col md:flex-row justify-between align-top mt-2 mb-8 w-full">
                    <input type="text"
                        class="h-10 pl-4 text-white transition duration-500 ease-in-out bg-opacity-50 rounded-full mb-4 w-80 bg-gray-700 hover:bg-gray-500 hover:bg-opacity-50"
                        id="gamertag" name="gamertag" value="{{ old('gamertag') }}" placeholder="Gamertag" required
                        autofocus>
                    <!-- Platform selector -->
                    <div class="space-y-1" x-data="Components.customSelect({ open: false, value: 1, selected: 1 })"
                        x-init="init()">
                        <div class="relative">
                            <span class="inline-block w-52 mb-4 rounded-md shadow-sm">
                                <button x-ref="button" @click="onButtonClick()" type="button" aria-haspopup="listbox"
                                    :aria-expanded="open" aria-labelledby="assigned-to-label"
                                    class="cursor-default relative w-full rounded-md text-white bg-gray-700 bg-opacity-50 hover:bg-gray-500 hover:bg-opacity-50 pl-3 pr-10 py-2 text-left focus:outline-none focus:shadow-outline-blue focus:border-blue-700 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    <div class="flex items-center space-x-3">
                                        <span
                                            x-text="['Plataforma', 'Xbox Live', 'Battlenet', 'Play Station Network'][value - 1]"
                                            class="block truncate">Plataforma</span>
                                    </div>
                                    <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </button>
                            </span>

                            <div x-show="open" @focusout="onEscape()" @click.away="open = false"
                                x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0" class="absolute mt-1 w-52 rounded-md bg-gray-900 shadow-lg"
                                >
                                <ul @keydown.enter.stop.prevent="onOptionSelect()"
                                    @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()"
                                    @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()"
                                    x-ref="listbox" tabindex="-1" role="listbox" aria-labelledby="assigned-to-label"
                                    :aria-activedescendant="activeDescendant"
                                    class="max-h-56 rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5">
                                    <li id="assigned-to-option-2" role="option" @click="choose(2)" @mouseenter="selected = 2"
                                        @mouseleave="selected = null"
                                        :class="{ 'bg-yellow-400': selected === 2 }"
                                        class="text-white cursor-default select-none relative py-2 pl-4 pr-9">
                                        <div class="flex items-center space-x-3">
                                            <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }"
                                                class="font-normal block truncate">
                                                Xbox Live
                                            </span>
                                        </div>
                                        <span x-show="value === 2"
                                            :class="{ 'text-white': selected === 2, 'text-yellow-400': !(selected === 2) }"
                                            class="absolute inset-y-0 right-0 flex items-center pr-4 text-yellow-400"
                                            style="display: none;">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li id="assigned-to-option-3" role="option" @click="choose(3)" @mouseenter="selected = 3"
                                        @mouseleave="selected = null" aria-selected="true"
                                        :class="{ 'bg-yellow-400': selected === 3 }"
                                        class="text-white cursor-default select-none relative py-2 pl-4 pr-9">
                                        <div class="flex items-center space-x-3">
                                            <span :class="{ 'font-semibold': value === 3, 'font-normal': !(value === 3) }"
                                                class="font-normal block truncate">
                                                Battlenet
                                            </span>
                                        </div>
                                        <span x-show="value === 3"
                                            :class="{ 'text-white': selected === 3, 'text-yellow-400': !(selected === 3) }"
                                            class="absolute inset-y-0 right-0 flex items-center pr-4 text-yellow-400"
                                            style="display: none;">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li id="assigned-to-option-4" role="option" @click="choose(4)" @mouseenter="selected = 4"
                                        @mouseleave="selected = null" aria-selected="true"
                                        :class="{ 'bg-yellow-400': selected === 4 }"
                                        class="text-white cursor-default select-none relative py-2 pl-4 pr-9">
                                        <div class="flex items-center space-x-3">
                                            <span :class="{ 'font-semibold': value === 4, 'font-normal': !(value === 4) }"
                                                class="font-normal block truncate">
                                                PlayStation Network
                                            </span>
                                        </div>
                                        <span x-show="value === 4"
                                            :class="{ 'text-white': selected === 4, 'text-yellow-400': !(selected === 4) }"
                                            class="absolute inset-y-0 right-0 flex items-center pr-4 text-yellow-400"
                                            style="display: none;">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="platform" id="platform" value="battle">
                    <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
                    
                    <button type="submit"
                        class="px-4 h-10 font-light text-white transition duration-500 ease-in-out bg-gray-600 bg-opacity-50 rounded-lg hover:bg-gray-400 hover:bg-opacity-50">
                        Agregar</button>
                </div>

            </form>

            <!-- Show profiles -->
            <table class="w-full table-auto">
                <thead class="text-left">
                    <tr>
                        <th class="text-white text-2xl">Gamertag</th>
                        <th class="text-white text-2xl">Plataforma</th>
                        <th class="text-white text-2xl">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                            <tr>
                                <td class="text-white text-xl py-4">{{ $profile->gamertag }}</td>
                                <td class="text-white text-xl py-4">
                                    @if ($profile->platform == "xbl")
                                        Xbox Live
                                    @endif
                                    @if ($profile->platform =="battle")
                                        Battle.net
                                    @endif
                                    @if ($profile->platform == "psn")
                                        PlayStation Network
                                    @endif
                                </td>
                                <td class="py-4">
                                    <button onclick="remove('{{ $profile->id }}',this)" class="submit bg-red-800 hover:bg-red-700 px-4 py-1 rounded-lg text-white transition duration-500 ease-in-out">Borrar</button>
                                </td>
                            </tr>
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

        function remove(id, target) {
            swal({
                    title: "Estás seguro?",
                    text: "Una vez que lo elimines, no podrás recuperar este perfil!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        axios({
                            method: 'delete',
                            url: '{{ url('profile') }}',
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

    </script>
    <script>
        function asignValue(valor) {
            var x = document.getElementById("platform");
            switch(valor) {
                case 2: x.value = "xbl";
                    break
                case 3: x.value = "battle";
                    break
                case 4: x.value = "psn";
                    break
                default: x.value = "battle";
                    break
            }
        }

        window.Components = {
            customSelect(options) {
                return {
                    init() {
                        this.$refs.listbox.focus()
                        this.optionCount = this.$refs.listbox.children.length
                        this.$watch('selected', value => {
                            if (!this.open) return

                            if (this.selected === null) {
                                this.activeDescendant = ''
                                return
                            }

                            this.activeDescendant = this.$refs.listbox.children[this.selected - 1].id
                        })
                    },
                    activeDescendant: null,
                    optionCount: null,
                    open: false,
                    selected: null,
                    value: 1,
                    choose(option) {
                        this.value = option
                        this.open = false
                        asignValue(option);
                    },
                    onButtonClick() {
                        if (this.open) return
                        this.selected = this.value
                        this.open = true
                        this.$nextTick(() => {
                            this.$refs.listbox.focus()
                            this.$refs.listbox.children[this.selected - 1].scrollIntoView({
                                block: 'nearest'
                            })
                        })
                    },
                    onOptionSelect() {
                        if (this.selected !== null) {
                            this.value = this.selected
                        }
                        this.open = false
                        this.$refs.button.focus()
                    },
                    onEscape() {
                        this.open = false
                        this.$refs.button.focus()
                    },
                    onArrowUp() {
                        this.selected = this.selected - 1 < 1 ? this.optionCount : this.selected - 1
                        this.$refs.listbox.children[this.selected - 1].scrollIntoView({
                            block: 'nearest'
                        })
                    },
                    onArrowDown() {
                        this.selected = this.selected + 1 > this.optionCount ? 1 : this.selected + 1
                        this.$refs.listbox.children[this.selected - 1].scrollIntoView({
                            block: 'nearest'
                        })
                    },
                    ...options,
                }
            },
        }

    </script>
</body>

</html>
