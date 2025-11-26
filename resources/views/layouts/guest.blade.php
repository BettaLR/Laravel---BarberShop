<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-white bg-barber-black">
    <div class="flex flex-col items-center min-h-screen pt-6 sm:justify-center sm:pt-0 bg-barber-black">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-barber-gold" />
            </a>
        </div>

        <div class="w-full px-6 py-4 mt-6 overflow-hidden shadow-md bg-barber-gray sm:max-w-md sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>