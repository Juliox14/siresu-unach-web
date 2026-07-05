@props(['title' => 'SIRESU - UNACH'])

<!DOCTYPE html>
<html lang="es" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>


<body class="font-sans antialiased bg-unach-azul text-[#001B3A] flex flex-col min-h-screen">
    <x-header />

    <main class="grow">
        {{ $slot }}
    </main>

    <x-aliados.carrousel />
    <x-footer />

</body>

</html>
