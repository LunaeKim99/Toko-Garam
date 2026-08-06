<footer class="bg-[var(--primary-soft)] dark:bg-[var(--surface)] border-t border-[var(--border)] transition-colors duration-300">
    <div class="container-custom section-padding">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">

            <div>
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 4.5l8.86 8.86a2 2 0 010-2.83l-8.86-8.86a2 2 0 00-2.83 0L4.5 9.64a2 2 0 010 2.83l8.86 8.86a2 2 0 002.83 0l4.5-4.5"></path>
                        </svg>
                    </div>
                    <span class="text-lg font-bold text-[var(--text)]">{{ config('app.name', 'AJ Brand') }}</span>
                </div>
                <p class="text-[var(--text-secondary)] text-sm leading-relaxed mb-4">
                    Produsen garam premium asli Jepara dari tambak tradisional.
                </p>
            </div>

            <div>
                <h3 class="font-semibold text-[var(--text)] mb-4">Navigasi</h3>
                <ul class="space-y-2">
                    @foreach([
                        ['url' => route('home'), 'label' => 'Beranda'],
                        ['url' => route('about'), 'label' => 'Tentang Kami'],
                        ['url' => route('product'), 'label' => 'Produk'],
                        ['url' => route('gallery'), 'label' => 'Galeri'],
                        ['url' => route('contact'), 'label' => 'Kontak'],
                    ] as $link)
                        <li>
                            <a href="{{ $link['url'] }}" class="text-[var(--text-secondary)] text-sm hover:text-primary transition-colors duration-300">
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h3 class="font-semibold text-[var(--text)] mb-4">Hubungi Kami</h3>
                @php($company = \App\Models\CompanyProfile::first())
                <ul class="space-y-3 text-sm text-[var(--text-secondary)]">
                    <li class="flex items-start gap-3">
                        <i data-lucide="map-pin" class="w-4 h-4 mt-0.5 text-primary shrink-0"></i>
                        <span>{{ $company?->alamat ?? 'Jepara, Jawa Tengah' }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i data-lucide="phone" class="w-4 h-4 mt-0.5 text-primary shrink-0"></i>
                        <a href="https://wa.me/{{ $company?->telepon ?? '6281234567890' }}" class="hover:text-primary transition-colors duration-300">
                            {{ $company?->telepon ?? '+62 812-3456-7890' }}
                        </a>
                    </li>
                    <li class="flex items-start gap-3">
                        <i data-lucide="mail" class="w-4 h-4 mt-0.5 text-primary shrink-0"></i>
                        <a href="mailto:{{ $company?->email ?? 'info@garamnusantara.co.id' }}" class="hover:text-primary transition-colors duration-300">
                            {{ $company?->email ?? 'info@garamnusantara.co.id' }}
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold text-[var(--text)] mb-4">Jam Layanan</h3>
                <ul class="space-y-2 text-sm text-[var(--text-secondary)]">
                    <li class="flex justify-between">
                        <span>Senin - Jumat</span>
                        <span>08.00 - 17.00</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Sabtu</span>
                        <span>08.00 - 13.00</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Minggu</span>
                        <span class="text-[var(--danger)]">Libur</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <div class="border-t border-[var(--border)]">
        <div class="container-custom py-4 flex flex-col sm:flex-row justify-between items-center gap-2 text-sm text-[var(--text-muted)]">
            <span>&copy; {{ date('Y') }} {{ config('app.name', 'AJ Brand') }}. All rights reserved.</span>
            <span>Diproduksi dengan <i data-lucide="heart" class="w-3 h-3 inline text-[var(--danger)]"></i> di Jepara</span>
        </div>
    </div>
</footer>