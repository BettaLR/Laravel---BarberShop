<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'BarberShop') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="antialiased text-white bg-barber-black font-sans">
    <div class="relative min-h-screen selection:bg-barber-gold selection:text-white">
        @if (Route::has('login'))
            <div class="p-6 text-right sm:fixed sm:top-0 sm:right-0 z-10">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-white hover:text-barber-gold focus:outline focus:outline-2 focus:rounded-sm focus:outline-barber-gold">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-white hover:text-barber-gold focus:outline focus:outline-2 focus:rounded-sm focus:outline-barber-gold">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-white hover:text-barber-gold focus:outline focus:outline-2 focus:rounded-sm focus:outline-barber-gold">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="flex flex-col items-center justify-center min-h-screen">
            <!-- Hero Section -->
            <div class="text-center max-w-4xl px-6">
                <h1 class="text-6xl font-serif font-bold text-barber-gold mb-4 tracking-wide">
                    PREMIUM CUTS
                </h1>
                <p class="text-xl text-gray-300 mb-8 font-light tracking-wider">
                    EST. 2025 • MASTER BARBERS • CLASSIC STYLE
                </p>
                <div class="flex justify-center gap-4">
                    <a href="{{ route('login') }}"
                        class="px-8 py-3 bg-barber-gold text-barber-black font-bold uppercase tracking-widest hover:bg-white transition duration-300">
                        Book Appointment
                    </a>
                    <a href="#services"
                        class="px-8 py-3 border border-barber-gold text-barber-gold font-bold uppercase tracking-widest hover:bg-barber-gold hover:text-barber-black transition duration-300">
                        View Services
                    </a>
                </div>
            </div>
        </div>

        <!-- Services Section -->
        <div id="services" class="py-20 bg-barber-gray">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-serif font-bold text-white mb-2">Our Services</h2>
                    <div class="w-24 h-1 bg-barber-gold mx-auto"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Service 1 -->
                    <div
                        class="bg-barber-black p-8 border border-gray-800 hover:border-barber-gold transition duration-300 group">
                        <div class="text-barber-gold text-4xl mb-4 group-hover:scale-110 transition duration-300">✂️
                        </div>
                        <h3 class="text-2xl font-serif font-bold text-white mb-2">Classic Haircut</h3>
                        <p class="text-gray-400 mb-4">Precision cut tailored to your style, finished with a hot towel.
                        </p>
                        <span class="text-barber-gold font-bold text-xl">$35</span>
                    </div>

                    <!-- Service 2 -->
                    <div
                        class="bg-barber-black p-8 border border-gray-800 hover:border-barber-gold transition duration-300 group">
                        <div class="text-barber-gold text-4xl mb-4 group-hover:scale-110 transition duration-300">🪒
                        </div>
                        <h3 class="text-2xl font-serif font-bold text-white mb-2">Beard Trim & Shave</h3>
                        <p class="text-gray-400 mb-4">Sculpting and detailing for the perfect beard, or a clean straight
                            razor shave.</p>
                        <span class="text-barber-gold font-bold text-xl">$25</span>
                    </div>

                    <!-- Service 3 -->
                    <div
                        class="bg-barber-black p-8 border border-gray-800 hover:border-barber-gold transition duration-300 group">
                        <div class="text-barber-gold text-4xl mb-4 group-hover:scale-110 transition duration-300">✨
                        </div>
                        <h3 class="text-2xl font-serif font-bold text-white mb-2">The Full Service</h3>
                        <p class="text-gray-400 mb-4">Haircut, beard trim, wash, and style. The ultimate grooming
                            experience.</p>
                        <span class="text-barber-gold font-bold text-xl">$55</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="py-12 bg-barber-black border-t border-gray-800">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center">
                <div class="text-center md:text-left mb-6 md:mb-0">
                    <h4 class="text-2xl font-serif font-bold text-barber-gold">BarberShop</h4>
                    <p class="text-gray-500 text-sm mt-2">© Tec express</p>
                </div>
                <div class="text-center md:text-right text-gray-400">
                    <p>Tecnologico de Software</p>
                    <p>Lunes-Sabados: 9am - 7pm</p>
                    <p class="text-barber-gold mt-2">(+52) 999-9999</p>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>