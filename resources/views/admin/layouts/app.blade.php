<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        (function () {
            var theme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            document.documentElement.classList.toggle('dark', theme === 'dark');
        })();
    </script>
    <title>@yield('title', 'Admin') — Garam Nusantara</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-50 font-sans antialiased transition-colors duration-300 dark:bg-[#020617]" x-data="themeManager()" x-init="isDark = document.documentElement.classList.contains('dark')">
    <div class="w-full min-h-screen">
        <aside class="w-64 bg-dark text-white flex flex-col fixed h-screen left-0 top-0 bottom-0 z-30 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out" id="sidebar">
            <div class="p-6 border-b border-dark-light">
                <h2 class="text-xl font-bold text-white">GN Admin</h2>
                <p class="text-sm text-gray-400 mt-1">Garam Nusantara Jepara</p>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-primary/20 hover:text-white transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-primary/20 text-white' : '' }}">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.product.edit') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-primary/20 hover:text-white transition-all {{ request()->routeIs('admin.product.edit') ? 'bg-primary/20 text-white' : '' }}">
                    <i data-lucide="package" class="w-5 h-5"></i>
                    <span>Produk Utama</span>
                </a>
                <a href="{{ route('admin.company-profile.edit') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-primary/20 hover:text-white transition-all {{ request()->routeIs('admin.company-profile.edit') ? 'bg-primary/20 text-white' : '' }}">
                    <i data-lucide="building" class="w-5 h-5"></i>
                    <span>Profil Perusahaan</span>
                </a>
                <a href="{{ route('admin.galeri.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-primary/20 hover:text-white transition-all {{ request()->routeIs('admin.galeri.*') ? 'bg-primary/20 text-white' : '' }}">
                    <i data-lucide="image" class="w-5 h-5"></i>
                    <span>Galeri</span>
                </a>
            </nav>

            <div class="p-4 border-t border-dark-light">
                <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-primary/20 hover:text-white transition-all">
                    <i data-lucide="external-link" class="w-5 h-5"></i>
                    <span>Kembali ke Website</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-red-500/20 hover:text-red-300 transition-all">
                        <i data-lucide="log-out" class="w-5 h-5"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 md:ml-64">
            <nav class="bg-white shadow-sm border-b border-gray-200 h-16 flex items-center px-4 md:px-6 sticky top-0 z-20 dark:bg-[#0F172A] dark:border-gray-700">
                <div class="flex items-center justify-between w-full">
                    <div class="flex items-center gap-4">
                        <button id="sidebar-toggle" class="md:hidden text-gray-600 hover:text-primary dark:text-gray-300">
                            <i data-lucide="menu" class="w-6 h-6"></i>
                        </button>
                        <div class="hidden md:block">
                            <h1 class="text-xl font-bold text-dark dark:text-white">@yield('title', 'Dashboard')</h1>
                            <p class="text-sm text-gray-500 dark:text-gray-400">@yield('subtitle', 'Kelola website Garam Nusantara')</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <button @click="toggleTheme()" type="button"
                            class="theme-toggle dark:text-gray-300" aria-label="Toggle dark mode">
                            <svg x-show="!isDark" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            <svg x-show="isDark" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                            </svg>
                        </button>

                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-medium text-dark dark:text-gray-200">{{ Auth::user()->name ?? 'Admin' }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Administrator</p>
                        </div>
                        <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                            <i data-lucide="user" class="w-4 h-4 text-primary"></i>
                        </div>
                    </div>
                </div>
            </nav>

            <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-500/10 border border-green-500/30 rounded-xl text-green-400 text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </main>

            <footer class="bg-white border-t border-gray-200 py-4 px-4 sm:px-6 lg:px-8 mt-8 dark:bg-[#0F172A] dark:border-gray-700">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400">© {{ date('Y') }} Garam Nusantara Jepara. Admin Panel v1.0</p>
                    <p class="text-xs text-gray-400 dark:text-gray-500">SQLite Database • Powered by Laravel</p>
                </div>
            </footer>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();

            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebar-toggle');

            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('-translate-x-full');
            });

            document.addEventListener('click', function(e) {
                if (!sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
                    if (window.innerWidth < 768) {
                        sidebar.classList.add('-translate-x-full');
                    }
                }
            });
        });
    </script>
</body>
</html>