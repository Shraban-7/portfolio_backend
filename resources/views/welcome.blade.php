<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Include the Tailwind CSS CDN -->

    <style>
        .typed-cursor {
            display: none;
        }
    </style>

</head>

<body>

    <section
        class="flex flex-col min-h-screen bg-slate-800 text-white bg-center bg-cover bg-blend-overlay bg-fixed bg-black/30"
        style="background-image: url('{{ asset('frontend/img/intro-bg.jpg') }}')">

        <!-- Navbar -->
        <div class="flex items-center h-20">
            <!-- Navbar Container -->
            <div class="mx-auto relative px-5 max-w-screen-xl w-full flex items-center justify-between">
                <!-- Changed justify-end to justify-between -->
                <!-- Navbar Logo -->
                <div class="text-5xl font-light uppercase ">
                    Portfolio
                </div>

                <!-- Navbar Menu -->
                <nav class="flex gap-5">
                    <!-- Added class to make the "Home" link white -->
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-white">Dashboard</a>

                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="text-white">Login</a>
                        <a href="{{ route('register') }}" class="text-white">Sign Up</a>
                    @endguest

                </nav>
            </div>
        </div>

        <!-- Hero Section Content -->
        <div class="flex-1 flex items-center">
            <div class="text-center mx-auto">
                <h1 class="text-7xl font-semibold">Welcome to Portfolio site!</h1>
                <div class="flex justify-center">

                    <p id="typed-text" class="font-light text-3xl mt-5">
                        <!-- Typewriter cursor -->
                    </p>
                    {{-- <span id="typed-cursor" class="typed-cursor text-3xl">|</span> --}}
                </div>
                <!-- Increased text size -->

            </div>
        </div>


    </section>


    <!-- Include Typed.js library -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

    <!-- Typed.js initialization script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var options = {
                strings: ["The land of opportunity.", "Discover new possibilities.",
                    "Join us for an amazing journey."
                ],
                typeSpeed: 50, // typing speed in milliseconds
                backSpeed: 30, // backspacing speed in milliseconds
                loop: true // loop the animation
            };

            var typed = new Typed('#typed-text', options);
        });
    </script>

</body>


</html>
