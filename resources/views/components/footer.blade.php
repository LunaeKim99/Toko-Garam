<footer class="bg-dark text-white">
    <div class="container-custom section-padding">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">

            {{-- Column 1: Brand --}}
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-sm">GN</span>
                    </div>
                    <span class="text-lg font-bold">Garam Nusantara</span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed mb-4">
                    Penyedia produk garam berkualitas tinggi untuk kebutuhan industri dan konsumen di seluruh Indonesia.
                </p>
                <div class="flex gap-3">
                    @foreach(['facebook', 'instagram', 'twitter'] as $social)
                        <a href="#" class="w-9 h-9 rounded-lg bg-white/10 flex items-center justify-center hover:bg-primary transition-colors duration-300">
                            <i data-lucide="{{ $social }}" class="w-4 h-4"></i>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Column 2: Quick Links --}}
            <div>
                <h3 class="font-semibold mb-4">Menu Cepat</h3>
                <ul class="space-y-2">
                    @foreach([
                        ['url' => route('home'), 'label' => 'Home'],
                        ['url' => route('about'), 'label' => 'Tentang Kami'],
                        ['url' => route('products'), 'label' => 'Produk'],
                        ['url' => route('articles'), 'label' => 'Artikel'],
                        ['url' => route('contact'), 'label' => 'Kontak'],
                    ] as $link)
                        <li>
                            <a href="{{ $link['url'] }}" class="text-gray-400 text-sm hover:text-primary transition-colors duration-300">
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Column 3: Contact --}}
            <div>
                <h3 class="font-semibold mb-4">Kontak</h3>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li class="flex items-start gap-3">
                        <i data-lucide="map-pin" class="w-4 h-4 mt-0.5 text-primary flex-shrink-0"></i>
                        <span>Jl. Raya Pantai No. 123, Jakarta Utara</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i data-lucide="phone" class="w-4 h-4 mt-0.5 text-primary flex-shrink-0"></i>
                        <span>+62 21 1234 5678</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i data-lucide="mail" class="w-4 h-4 mt-0.5 text-primary flex-shrink-0"></i>
                        <span>info@garamnusantara.co.id</span>
                    </li>
                </ul>
            </div>

            {{-- Column 4: Hours --}}
            <div>
                <h3 class="font-semibold mb-4">Jam Operasional</h3>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li class="flex justify-between">
                        <span>Senin - Jumat</span>
                        <span>08:00 - 17:00</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Sabtu</span>
                        <span>08:00 - 13:00</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Minggu</span>
                        <span class="text-red-400">Libur</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    {{-- Copyright --}}
    <div class="border-t border-white/10">
        <div class="container-custom py-4 flex flex-col sm:flex-row justify-between items-center gap-2 text-sm text-gray-500">
            <span>&copy; {{ date('Y') }} Garam Nusantara. All rights reserved.</span>
            <span>Designed with <i data-lucide="heart" class="w-3 h-3 inline text-red-400"></i></span>
        </div>
    </div>
</footer>