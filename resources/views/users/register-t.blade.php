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
    <title>Registrarme</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body style="background-color: #1a2a41" class="bg-fixed bg-center bg-cover bg-dash">

    <!-- back link -->
    <div class="w-52 text-white pl-10 pt-10 transform hover:translate-x-3 transition duration-300 ease-in-out">
        <a href="{{ route('tournament-info',$tournament->id) }}"><i class="fas fa-arrow-left"></i> Volver a Torneo</a>
    </div>
    <!-- main container -->
    <div class="w-full h-full items-center">
        <!-- logo -->
        <img src="{{ asset('img/logo.png') }}" alt="Royal League" class="w-24 mx-auto mb-10">
    
        <!-- errors zone -->
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="w-96 px-5 py-3 rounded-lg mx-auto mb-4 bg-yellow-400 text-white">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        @if(session()->has('message'))
            <div class="w-96 md:w-1/3 flex flex-col justify-between md:flex-row px-5 py-3 rounded-lg mx-auto mb-4 bg-green-400 text-white">
                <p>{{ session()->get('message') }}</p>
                <a href="{{ route('tournament-info',$tournament->id) }}" class="px-4 py-1 bg-green-600 rounded-lg hover:bg-green-800 transition duration-500 ease-in-out">
                    Ok
                </a>
            </div>
        @endif

        <!-- login form -->
        <div class=" bg-gray-600 bg-opacity-50 rounded-xl w-96 md:w-1/3 p-4 mx-auto mb-10" style="backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
            <h2 class="text-white text-2xl mb-5">¡Estas a un paso de registrarte!</h2>
            <h2 class="text-white text-xl mb-5">{{ $tournament->title }}</h2>
            <p class="text-white text-sm opacity-50 font-light mb-5">Selecciona que equipo quieres registrar.</p>

            <form class="auth-form flex flex-col justify-evenly md:space-around " method="POST" action="{{ route('register-team') }}">
                @csrf
                <!-- Team Selector -->
                <div class="flex-col">
                    <div class="space-y-1"
                        x-data="Components.customSelect({ open: false, value: 1, selected: 1 })"
                        x-init="init()">
                        <div class="relative">
                            <span class="inline-block w-52 mb-4 rounded-md shadow-sm">
                                <button x-ref="button" @click="onButtonClick()" type="button"
                                    aria-haspopup="listbox" :aria-expanded="open"
                                    aria-labelledby="assigned-to-label"
                                    class="cursor-default relative w-full rounded-md text-white bg-gray-500 bg-opacity-25 hover:bg-opacity-50 pl-3 pr-10 py-2 text-left focus:outline-none focus:shadow-outline-blue focus:border-blue-700 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    <div class="flex items-center space-x-3">
                                        <span
                                            x-text="['Equipo'
                                            @if (isset($teams) && count($teams)>0)
                                                @foreach ($teams as $team)
                                                    ,'{{ $team->name }}'
                                                @endforeach  
                                            @endif
                                            ][value - 1]"
                                            class="block truncate">Equipo</span>
                                    </div>
                                    <span
                                        class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </button>
                            </span>

                            <div x-show="open" @focusout="onEscape()" @click.away="open = false"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                class=" z-50 mt-1 w-52 rounded-md bg-gray-900 opacity-100 shadow-lg">
                                <ul @keydown.enter.stop.prevent="onOptionSelect()"
                                    @keydown.space.stop.prevent="onOptionSelect()"
                                    @keydown.escape="onEscape()"
                                    @keydown.arrow-up.prevent="onArrowUp()"
                                    @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox"
                                    tabindex="-1" role="listbox"
                                    aria-labelledby="assigned-to-label"
                                    :aria-activedescendant="activeDescendant"
                                    class="max-h-56 rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5">
                                    
                                    @if (isset($teams) && count($teams)>0)
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($teams as $team)
                                            @php
                                                $count = $count + 1;
                                            @endphp
                                            <li id="assigned-to-option-{{ $count }}" role="option"
                                                @click="choose({{ $count }})" @mouseenter="selected = {{ $count }}"
                                                @mouseleave="selected = null"
                                                :class="{ 'bg-yellow-400': selected === {{ $count }} }"
                                                class="text-white cursor-default select-none relative py-2 pl-4 pr-9">
                                                <div class="flex items-center space-x-3">
                                                    <span
                                                        :class="{ 'font-semibold': value === {{ $count }}, 'font-normal': !(value === {{ $count }}) }"
                                                        class="font-normal block truncate">
                                                        {{ $team->name }}
                                                    </span>
                                                </div>
                                                <span x-show="value === {{ $count }}"
                                                    :class="{ 'text-white': selected === {{ $count }}, 'text-yellow-400': !(selected === {{ $count }}) }"
                                                    class="absolute inset-y-0 right-0 flex items-center pr-4 text-yellow-400"
                                                    style="display: none;">
                                                    <svg class="h-5 w-5" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                            </li>
                                        @endforeach    
                                    @else
                                        <li id="assigned-to-option-0" role="option"
                                            @click="choose(0)" @mouseenter="selected = 0"
                                            class="text-white cursor-default select-none relative py-2 pl-4 pr-9">
                                            <div class="flex items-center space-x-3">
                                                <span
                                                    class="font-normal block truncate">
                                                    Ningún equipo encontrado
                                                </span>
                                            </div>
                                        </li>
                                    @endif
                                    
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="text-white text-sm opacity-50 font-light mb-5">Elige tu método de pago.</p>

                <div id="smart-button-container">
                    <div style="text-align: center;">
                        <div id="paypal-button-container"></div>
                    </div>
                </div>

                <input type="hidden" name="tournament_id" value="{{ $tournament->id }}">
                <input type="hidden" name="team_id" id="team_id" value="">
                <button type="submit" class="rounded-lg w-full bg-yellow-400 hover:bg-yellow-500 transition duration-500 ease-in-out py-2 text-white mb-4">Registrar equipo</button>
            </form>
        </div>
        
    </div>
    <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=MXN" data-sdk-integration-source="button-factory"></script>
    <script>
        function initPayPalButton() {
        paypal.Buttons({
            style: {
            shape: 'rect',
            color: 'blue',
            layout: 'vertical',
            label: 'pay',
            
            },

            createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{"description":"Torneo Royal League","amount":{"currency_code":"MXN","value":126,"breakdown":{"item_total":{"currency_code":"MXN","value":300},"shipping":{"currency_code":"MXN","value":0},"tax_total":{"currency_code":"MXN","value":-174}}}}]
            });
            },

            onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
                
                // Full available details
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                // Show a success message within this page, e.g.
                const element = document.getElementById('paypal-button-container');
                element.innerHTML = '';
                element.innerHTML = '<h3>Thank you for your payment!</h3>';

                // Or go to another URL:  actions.redirect('thank_you.html');
                
            });
            },

            onError: function(err) {
            console.log(err);
            }
        }).render('#paypal-button-container');
        }
        initPayPalButton();
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script>
        function asignValue(valor) {
            var x = document.getElementById("team_id");
            var count = 1;
            var array = <?php echo $teams ?>;
            array.forEach(element => {
                if (count === valor-1) {
                    x.value = element['id'];
                }
                count++
            });
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
                        this.selected = this.selected + 1 > this.optionCount+1 ? 1 : this.selected + 1
                        this.$refs.listbox.children[this.selected + 1].scrollIntoView({
                            block: 'nearest'
                        })
                    },
                    
                }
            }
        }

    </script>
    
</body>

</html>
