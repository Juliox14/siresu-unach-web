@props([
    'title' => 'SIRESU - Secretaría de Identidad y Responsabilidad Social Universitaria - UNACH',
    'description' => 'Secretaría de Identidad y Responsabilidad Social Universitaria (SIRESU) de la Universidad Autónoma de Chiapas. Promoviendo el desarrollo, el bienestar y la comunicación de nuestra comunidad.',
    'keywords' => 'SIRESU, UNACH, Universidad Autónoma de Chiapas, identidad universitaria, responsabilidad social, Chiapas, convocatorias, eventos, noticias',
    'image' => null,
    'canonical' => null,
    'robots' => 'index, follow',
])

<!DOCTYPE html>
<html lang="es" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Meta Tags SEO -->
    <meta name="description" content="{{ $description }}">
    <meta name="keywords" content="{{ $keywords }}">
    <meta name="robots" content="{{ $robots }}">
    
    <!-- URL Canónica -->
    <link rel="canonical" href="{{ $canonical ?? request()->url() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $canonical ?? request()->url() }}">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:image" content="{{ $image ?? asset('images/logo-siresu-color.png') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ $canonical ?? request()->url() }}">
    <meta name="twitter:title" content="{{ $title }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="{{ $image ?? asset('images/logo-siresu-color.png') }}">

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
