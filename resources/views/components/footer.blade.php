<footer class="bg-dark text-white transition-colors duration-300">
    <div class="container-custom section-padding">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">

            <div>
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-sm">GN</span>
                    </div>
                    <span class="text-lg font-bold">Garam Nusantara</span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed mb-4">
                    Garam Nusantara — Jepara, Jawa Tengah. Garam produksi sendiri dari tambak Jepara.
                </p>
            </div>

            <div>
                <h3 class="font-semibold mb-4">Menu</h3>
                <ul class="space-y-2">
                    @foreach([
                        ['url' => route('home'), 'label' => 'Home'],
                        ['url' => route('about'), 'label' => 'Tentang Kami'],
                        ['url' => route('product'), 'label' => 'Produk Kami'],
                        ['url' => route('gallery'), 'label' => 'Galeri'],
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

            <div>
                <h3 class="font-semibold mb-4">Kontak</h3>
                @php($company = \App\Models\CompanyProfile::first())
                <ul class="space-y-3 text-sm text-gray-400">
                    <li class="flex items-start gap-3">
                        <i data-lucide="map-pin" class="w-4 h-4 mt-0.5 text-primary flex-shrink-0"></i>
                        <span>{{ $company?->alamat ?? 'Jepara, Jawa Tengah' }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i data-lucide="phone" class="w-4 h-4 mt-0.5 text-primary flex-shrink-0"></i>
                        <span>{{ $company?->telepon ?? '+62 812-3456-7890' }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i data-lucide="mail" class="w-4 h-4 mt-0.5 text-primary flex-shrink-0"></i>
                        <span>{{ $company?->email ?? 'info@garamnusantara.co.id' }}</span>
                    </li>
                </ul>
            </div>

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

    <div class="border-t border-white/10">
        <div class="container-custom py-4 flex flex-col sm:flex-row justify-between items-center gap-2 text-sm text-gray-500">
            <span>&copy; {{ date('Y') }} Garam Nusantara Jepara. All rights reserved.</span>
            <span>Diproduksi dengan <i data-lucide="heart" class="w-3 h-3 inline text-red-400"></i> di Jepara</span>
        </div>
    </div>
</footer>