<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — Garam Nusantara</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-50 font-sans antialiased">
    <nav class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center gap-6">
                    <a href="{{ route('admin.dashboard') }}" class="font-bold text-dark text-lg">GN Admin</a>
                    <div class="hidden sm:flex items-center gap-4">
                        <a href="{{ route('admin.company-profile.edit') }}" class="text-sm text-gray-600 hover:text-primary">Profil</a>
                        <a href="{{ route('admin.product.edit') }}" class="text-sm text-gray-600 hover:text-primary">Produk</a>
                        <a href="{{ route('admin.galeri.index') }}" class="text-sm text-gray-600 hover:text-primary">Galeri</a>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('home') }}" target="_blank" class="text-sm text-gray-500 hover:text-primary">Lihat Website</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm text-red-500 hover:text-red-700">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl text-green-700 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() { lucide.createIcons(); });
    </script>
</body>
</html>