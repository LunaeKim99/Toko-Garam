<section class="section-padding">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
            <div data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800"
                    alt="Tambak Garam Jepara" class="rounded-xl shadow-lg w-full h-80 object-cover">
            </div>

            <div data-aos="fade-left">
                <p class="text-primary font-medium text-sm uppercase tracking-wider mb-2">Tentang Kami</p>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-dark mb-4">
                    Produsen Garam Lokal dari Jepara
                </h2>
                <p class="text-gray-500 leading-relaxed mb-4">
                    {{ Str::limit($company?->tentang ?? 'Garam Nusantara memproduksi garam premium langsung dari tambak di Jepara.', 200) }}
                </p>

                <div class="grid grid-cols-3 gap-4 mb-6">
                    @foreach([
                        ['number' => '15+', 'label' => 'Tahun Pengalaman'],
                        ['number' => '1', 'label' => 'Produk Unggulan'],
                        ['number' => '1000+', 'label' => 'Pelanggan Puas'],
                    ] as $stat)
                        <div>
                            <div class="text-2xl sm:text-3xl font-bold text-primary">{{ $stat['number'] }}</div>
                            <div class="text-xs text-gray-400">{{ $stat['label'] }}</div>
                        </div>
                    @endforeach
                </div>

                <a href="{{ route('about') }}" class="btn-primary">
                    Selengkapnya
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
        </div>
    </div>
</section>