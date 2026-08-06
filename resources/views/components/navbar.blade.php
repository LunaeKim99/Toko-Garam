<header x-data="{ scrolled: false, mobileOpen: false }"
    @scroll.window="scrolled = (window.scrollY > 50)"
    :class="scrolled ? 'bg-white/95 backdrop-blur-md shadow-sm' : 'bg-transparent'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">

    <div class="container-custom">
        <nav class="flex items-center justify-between h-16 lg:h-20">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-sm">GN</span>
                </div>
                <span class="text-lg font-bold" :class="scrolled ? 'text-dark' : 'text-white'">
                    Garam Nusantara
                </span>
            </a>

            <div class="hidden lg:flex items-center gap-8">
                @php
                    $navLinks = [
                        ['route' => 'home', 'label' => 'Home', 'url' => route('home')],
                        ['route' => 'about', 'label' => 'Tentang Kami', 'url' => route('about')],
                        ['route' => 'product', 'label' => 'Produk', 'url' => route('product')],
                        ['route' => 'gallery', 'label' => 'Galeri', 'url' => route('gallery')],
                        ['route' => 'contact', 'label' => 'Kontak', 'url' => route('contact')],
                    ];
                @endphp

                @foreach($navLinks as $link)
                    <a href="{{ $link['url'] }}"
                        class="text-sm font-medium transition-colors duration-300"
                        :class="scrolled
                            ? '{{ request()->routeIs($link['route']) ? 'text-primary' : 'text-dark hover:text-primary' }}'
                            : '{{ request()->routeIs($link['route']) ? 'text-primary' : 'text-white/90 hover:text-white' }}'">
                        {{ $link['label'] }}
                    </a>
                @endforeach

                @if($product = \App\Models\Product::first())
                    <a href="https://wa.me/{{ $product->whatsapp }}" target="_blank" class="btn-primary text-sm !py-2 !px-5">
                        Hubungi Kami
                    </a>
                @endif
            </div>

            <button @click="mobileOpen = !mobileOpen"
                class="lg:hidden p-2 rounded-lg"
                :class="scrolled ? 'text-dark' : 'text-white'">
                <svg x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="mobileOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </nav>
    </div>

    <div x-show="mobileOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        @click.away="mobileOpen = false"
        class="lg:hidden bg-white shadow-lg border-t border-light-gray">

        <div class="container-custom py-4 space-y-1">
            @foreach($navLinks as $link)
                <a href="{{ $link['url'] }}"
                    @click="mobileOpen = false"
                    class="block px-4 py-3 rounded-lg text-sm font-medium transition-colors
                        {{ request()->routeIs($link['route']) ? 'bg-primary/10 text-primary' : 'text-dark hover:bg-light' }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
            @if($product = \App\Models\Product::first())
                <a href="https://wa.me/{{ $product->whatsapp }}" target="_blank" @click="mobileOpen = false"
                    class="block btn-primary text-center mt-3">
                    Hubungi Kami
                </a>
            @endif
        </div>
    </div>
</header>