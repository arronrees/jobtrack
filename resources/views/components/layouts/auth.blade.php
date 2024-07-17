<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Job Tracker') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=chivo:100,200,300,400,500,600,700,800" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <div class="p-4 bg-slate-100 md:grid md:gap-4 md:grid-cols-[auto,3fr] min-h-screen">

        @auth

            <x-navigation.nav />

            <x-card>

                {{ $slot }}

            </x-card>

        @endauth

    </div>

</body>

</html>
