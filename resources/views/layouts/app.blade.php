<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('meta_title', 'Garam Nusantara — Solusi Garam Berkualitas')</title>
    <meta name="description" content="@yield('meta_description', 'Garam Nusantara menyediakan produk garam berkualitas tinggi untuk kebutuhan industri dan konsumen.')">

    {{-- Open Graph --}}
    <meta property="og:title" content="@yield('meta_title', 'Garam Nusantara')">
    <meta property="og:description" content="@yield('meta_description', 'Garam berkualitas tinggi.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    {{-- AOS CSS + JS --}}
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    {{-- Swiper CSS + JS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- Vite CSS + JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('styles')
</head>
<body class="font-sans text-dark bg-white antialiased">
    <x-navbar />

    <main>
        @yield('content')
    </main>

    <x-footer />

    {{-- Lucide Icons Init --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();
        });
    </script>

    @stack('scripts')

    {{-- AOS Init --}}
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 50,
        });
    </script>
</body>
</html>