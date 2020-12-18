<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Style -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .carousel-open:checked+.carousel-item {
            position: static;
            opacity: 100;
        }

        .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }

        #carousel-1:checked~.control-1,
        #carousel-2:checked~.control-2,
        #carousel-3:checked~.control-3 {
            display: block;
        }

        .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }

        #carousel-1:checked~.control-1~.carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-2:checked~.control-2~.carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-3:checked~.control-3~.carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #e4d745;
            /*Set to match the Tailwind colour you want the active one to be */
        }

    </style>

    <title>Royal League</title>
</head>

<body style="background-color: #0a1346;">

    <!-- Navbar -->
    <nav class=" container mx-auto px-6 py-2 flex justify-between items-center sticky">
        <img class="w-24" src="img/logo.png" alt="Logo">
        <div class="block md:hidden">
            <button
                class="flex items-center px-3 py-2 border rounded text-cool-gray-300 border-cool-gray-300 hover:text-white hover:border-white appearance-none focus:outline-none">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>
        <div class="hidden md:block">
            <ul class="grid grid-cols-1 md:inline-flex">
                <li><a class="px-4 font-bold text-white" href="/">Inicio</a></li>
                <li><a class="px-4 text-white hover:font-semibold" href="#">Torneos</a></li>
                @auth
                    <li><a class="px-4 my-auto text-white hover:font-semibold" href="#">Dashboard</a></li>
                @else
                    <li><a class="px-4 my-auto text-white hover:font-semibold" href="#">Login</a></li>
                    <button
                        class="px-4 py-1 flex items-center justify-center rounded-full bg-red-700 hover:bg-red-800 text-white"
                        type="submit">
                        Register
                    </button>
                @endauth
            </ul>
        </div>
    </nav>

    <div class="carousel">
        <div class="carousel-inner  overflow-hidden w-full hero -mt-32">
            <!--Slide 1-->
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden=""
                checked="checked">
            <div class="carousel-item absolute opacity-0">
                <img src="img/bg-1.png" class="w-full " />
                <div class="heading-container flex -mt-60 lg:-mt-96  mb-20 lg:mb-60 justify-center items-center w-full">
                    <h1 class="text-6xl text-white font-medium">
                        Torneos <br> Warzone
                    </h1>
                </div>
            </div>
            <label for="carousel-2"
                class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-red-700 leading-tight text-center z-10 inset-y-0 left-0 mt-36 md:mt-60 lg:my-auto">‹</label>
            <label for="carousel-2"
                class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-red-700 leading-tight text-center z-10 inset-y-0 right-0 mt-36 md:mt-60 lg:my-auto">›</label>

            <!--Slide 2-->
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0">
                <img src="img/bg-2.png" class="w-full " />
                <div class="heading-container flex -mt-60 lg:-mt-96  mb-20 lg:mb-60 justify-center items-center w-full">
                    <h1 class="text-6xl text-white font-medium">
                        Torneos <br> Destiny 2
                    </h1>
                </div>
            </div>
            <label for="carousel-1" class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold
                text-black hover:text-white rounded-full bg-white hover:bg-red-700 leading-tight text-center z-10 
                inset-y-0 left-0 mt-36 md:mt-60 lg:my-auto">‹</label>
            <label for="carousel-1" class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold
                text-black hover:text-white rounded-full bg-white hover:bg-red-700 leading-tight text-center z-10
                inset-y-0 right-0 mt-36 md:mt-60 lg:my-auto">›</label>

            <!-- Add additional indicators for each slide-->
            <ol class="carousel-indicators">
                <li class="inline-block mr-3">
                    <label for="carousel-1"
                        class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-red-700">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-2"
                        class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-red-700">•</label>
                </li>
            </ol>

        </div>
    </div>

    <!-- Hero section 
    <section class="hero -mt-32">
        <img src="img/bg-1.png" class="w-full " />
        <div class="heading-container flex -mt-60 lg:-mt-96  mb-20 lg:mb-60 justify-center items-center w-full">
            <h1 class="text-6xl text-white font-medium">
                Torneos </br> Warzone
            </h1>
        </div>
    </section> -->

    <!-- Info -->
    <section class="lg:flex lg:justify-between lg:items-center pt-16 mb-40 relative">
        <div class="px-4 sm:px-16 md:px-32 lg:px-14">
            <div class="bg-green-200 rounded-full w-16 h-16 flex items-center mb-10">
                <i class="far fa-clock text-green-500 mx-auto"></i>
            </div>
            <h1 class="text-3xl sm:text-4xl font-medium mb-8 text-white">Torneos cada 15 dias</h1>
            <p class="text-gray-500 mb-20 font-light">Inscríbete a nuestros torneos de COD Warzone y ten la oportunidad
                de ganar $5,000 MXN. Organizamos
                torneos cada 15 días. Lo único que tienes que hacer es registrarte y pagar tu inscripción.</p>
            <div style="width: 58px; height: 1px;" class="bg-green-300 mb-12"></div>
            <h3 class="text-white font-semibold sm:text-xl mb-4">Resultados en 48 hrs</h3>
            <p class="text-gray-500 mb-16 font-light">Sube tus resultados antes de la hora establecida, y en un máximo
                de 48 hrs sabrás quién es el ganador.</p>

            <h3 class="text-white font-semibold sm:text-xl mb-4">Torneos gratuitos y de paga</h3>
            <p class="text-gray-500 mb-8 font-light">Podrás participar en nuestros torneos gratuitos, pero si buscas los
                mejores premios, no dudes en elegir
                los torneos de paga.</p>
        </div>
        <div class="px-4 sm:px-16 md:px-32 lg:px-0">
            <img src="img/browser.png" alt="Call of Duty Warzone">
        </div>
    </section>

    <!-- Comments -->
    <section class="bg-quotes bg-cover bg-fixed mt-40" style="height: 600px;">
        <div class="ml-4 md:ml-20 pt-36">
            <h1 class="text-4xl text-white md:w-1/2 lg:w-1/3">
                "Torneos bastante competitivos y buena atención por parte de los organizadores."
            </h1>
            <div class="flex">
                <img src="img/user.jpeg" alt="User" class="w-20 h-20 rounded-full mr-4">
                <div class="pt-4">
                    <h4 class="text-yellow-300 text-xl font-semibold">Miky Benitez</h4>
                    <h5 class="text-gray-500">LPZ Team</h5>
                </div>
            </div>
        </div>
    </section>

    <!-- Rewards -->
    <section>
        <div class="container mx-auto px-6 text-center pt-20 pb-80">
            <h2 class="mb-6 text-4xl font-bold text-center text-white">
                Premios atractivos por torneo
            </h2>
            <h3 class="my-4 text-gray-400">
                Los 3 mejores premios por torneo para los 3 mejores equipos
            </h3>
            <div class="sm:flex sm:justify-between sm:items-center mt-20">
                <div class="md:pt-8 lg:pt-16 rounded-md my-16 sm:w-44 md:w-60 sm:h-44 md:h-60 lg:w-72 lg:h-72">
                    <h2 class="text-gray-400 text-lg font-bold">Tercer Lugar</h2>
                    <h1 class="text-5xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mt-8 text-yellow-300">$1,500 MX
                    </h1>
                </div>
                <div class="bg-gradient-to-b from-orange-400 via-red-700 to-pink-800 md:pt-8 lg:pt-16 rounded-md my-16
                    sm:w-44 md:w-60 sm:h-44 md:h-60 lg:w-72 lg:h-72 shadow-xl transition duration-500 ease-in-out
                    transform hover:-translate-y-1 hover:scale-110">
                    <h2 class="text-white text-lg font-bold">Primer Lugar</h2>
                    <h1 class="text-5xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mt-8 text-white">$3,000 MX</h1>
                </div>
                <div class="md:pt-8 lg:pt-16 rounded-md my-16 sm:w-44 md:w-60 sm:h-44 md:h-60 lg:w-72 lg:h-72">
                    <h2 class="text-gray-400 text-lg font-bold">Segundo Lugar</h2>
                    <h1 class="text-5xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mt-8 text-yellow-300">$500 MX</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- cta -->
    <section class="mx-4 md:mx-16 lg:mx-16 relative -mb-72 -mt-44">
        <div class="bg-mainCTA bg-cover rounded-3xl pt-40 pb-24">
            <div class="grid grid-cols-1 ">
                <h2 class="mx-auto text-white font-medium text-center text-3xl sm:text-3xl md:text-4xl">Los mejores
                    torneos son de</br>Royal League</h2>
                <a href=""
                    class="bg-red-600 hover:bg-red-700 rounded-lg text-white font-medium p-4 w-36 text-center mx-auto mt-4 md:mt-8 ">Ver
                    Torneos</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="pt-80 bg-footer-texture bg-cover">
        <div class="container mx-auto pt-10 pb-6">
            <div class="flex flex-wrap justify-between">
                <div class="w-full lg:w-1/4 text-center lg:text-left">
                    <h5 class="uppercase mb-6 font-bold text-cool-gray-50">Royal League</h5>
                    <ul class="mb-4">
                        <li class="mt-2">
                            <a href="#" class="text-cool-gray-300 hover:text-cool-gray-50">Inicio</a>
                        </li>
                        <li class="mt-2">
                            <a href="#" class="text-cool-gray-300 hover:text-cool-gray-50">Torneos</a>
                        </li>
                        <li class="mt-2">
                            <a href="#" class="text-cool-gray-300 hover:text-cool-gray-50">Dashboard</a>
                        </li>
                    </ul>
                </div>
                <div class="w-full lg:w-1/4 text-center lg:text-left">
                    <h5 class="uppercase mb-6 font-bold text-cool-gray-50">Legal</h5>
                    <ul class="mb-4">
                        <li class="mt-2">
                            <a href="#" class="text-cool-gray-300 hover:text-cool-gray-50">Terminos y condiciones</a>
                        </li>
                        <li class="mt-2">
                            <a href="#" class="text-cool-gray-300 hover:text-cool-gray-50">Aviso de privacidad</a>
                        </li>
                    </ul>
                </div>
                <div class="w-full lg:w-1/4 text-center lg:text-left">
                    <h5 class="uppercase mb-6 font-bold text-cool-gray-50">Contacto</h5>
                    <ul class="mb-4">
                        <li class="mt-2">
                            <a class="text-cool-gray-300"
                                mailto="support@royalleague.com">support@royalleague.com.mx</a>
                        </li>
                    </ul>
                </div>
                <div class="w-full lg:w-1/4 text-center ">
                    <h5 class="uppercase mb-6 font-bold text-cool-gray-50">¡Siguenos!</h5>
                    <ul class="inline-flex">
                        <li class="pr-6">
                            <a href="https://www.facebook.com/Royal-League-109787480839374" target="_blank">
                                <i class="fab fa-facebook-f text-cool-gray-300 hover:text-cool-gray-50"></i></a>
                        </li>
                        <li class="pr-6">
                            <a href="https://www.instagram.com/royalleagueorg/" target="_blank">
                                <i class="fab fa-instagram text-cool-gray-300 hover:text-cool-gray-50"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/royalleagueorg/" target="_blank">
                                <i class="fab fa-youtube text-cool-gray-300 hover:text-cool-gray-50"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
