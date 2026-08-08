<header x-data="{ scrolled: false, mobileOpen: false }" @scroll.window="scrolled = (window.scrollY > 50)"
    :class="scrolled ? 'bg-[var(--background)]/95 backdrop-blur-md shadow-sm-aj border-b border-[var(--border)]' : 'bg-transparent'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">

    <div class="container-custom">
        <nav class="flex items-center justify-between h-16 lg:h-20">
<a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('images/logo/logo-header.svg') }}" alt="Garam Nusantara Jepara" class="h-10 lg:h-12 w-auto" />
                </a>

            <div class="hidden lg:flex items-center gap-6">
                @php
                    $navLinks = [
                        ['route' => 'home', 'label' => 'Beranda', 'url' => route('home')],
                        ['route' => 'about', 'label' => 'Tentang Kami', 'url' => route('about')],
                        ['route' => 'product', 'label' => 'Produk', 'url' => route('product')],
                        ['route' => 'gallery', 'label' => 'Galeri', 'url' => route('gallery')],
                        ['route' => 'contact', 'label' => 'Kontak', 'url' => route('contact')],
                    ];
                    $product = \App\Models\Product::first();
                @endphp

                @foreach($navLinks as $link)
                    <a href="{{ $link['url'] }}"
                        class="text-sm font-medium text-[var(--text-secondary)] transition-colors duration-300 hover:text-primary"
                        :class="scrolled ? '{{ request()->routeIs($link['route']) ? 'text-primary' : 'text-[var(--text-secondary)] hover:text-primary' }}'">
                        {{ $link['label'] }}
                    </a>
                @endforeach

                <button @click="$store.theme.toggle()" type="button"
                    class="theme-toggle" aria-label="Toggle dark mode">
                    <svg x-show="!$store.theme.isDark" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <svg x-show="$store.theme.isDark" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                </button>

                @if($product)
                    <a href="https://wa.me/{{ $product->whatsapp }}" target="_blank" class="btn-primary text-sm !py-2 !px-5">
                        Hubungi Kami
                    </a>
                @endif
            </div>

            <div class="flex items-center gap-2 lg:hidden">
                <button @click="$store.theme.toggle()" type="button"
                    class="p-2 rounded-lg" aria-label="Toggle dark mode">
                    <svg x-show="!$store.theme.isDark" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <svg x-show="$store.theme.isDark" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                </button>

                <button @click="mobileOpen = !mobileOpen"
                    class="p-2 rounded-lg"
                    aria-label="Toggle menu">
                    <svg x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </nav>
    </div>

    <div x-show="mobileOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        @click.away="mobileOpen = false"
        class="lg:hidden bg-[var(--background)] shadow-lg border-t border-[var(--border)]">

        <div class="container-custom py-4 space-y-1">
            @foreach($navLinks as $link)
                <a href="{{ $link['url'] }}"
                    @click="mobileOpen = false"
                    class="block px-4 py-3 rounded-lg text-sm font-medium transition-colors
                        {{ request()->routeIs($link['route']) ? 'bg-primary-soft text-primary' : 'text-[var(--text-secondary)] hover:bg-[var(--surface)]' }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
            @if($product)
                <a href="https://wa.me/{{ $product->whatsapp }}" target="_blank" @click="mobileOpen = false"
                    class="block btn-primary text-center mt-3">
                    Hubungi Kami
                </a>
            @endif
        </div>
    </div>
</header>
