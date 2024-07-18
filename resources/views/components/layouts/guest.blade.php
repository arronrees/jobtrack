<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Job Tracker') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=chivo:100,200,300,400,500,600,700,800" rel="stylesheet" />

    @vite(['resources/css/app.css'])
</head>

<body class="font-sans antialiased">

    <div class="p-4 bg-slate-100">

        <nav class="flex justify-end p-4 mb-6 gap-4">
            <a href="/login" class="rounded py-2 px-4 bg-slate-300">Login</a>
            <a href="/register" class="rounded py-2 px-4 bg-slate-500 text-white">Sign Up</a>
        </nav>

        {{ $slot }}

    </div>

</body>

</html>
