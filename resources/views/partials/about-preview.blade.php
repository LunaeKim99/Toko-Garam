<section class="section-padding">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
            {{-- Image --}}
            <div data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=800"
                    alt="Tentang Garam Nusantara" class="rounded-xl shadow-lg w-full h-80 object-cover">
            </div>

            {{-- Text --}}
            <div data-aos="fade-left">
                <p class="text-primary font-medium text-sm uppercase tracking-wider mb-2">Tentang Kami</p>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-dark mb-4">
                    Pengalaman Bertahun-tahun dalam Garam Berkualitas
                </h2>
                <p class="text-gray-500 leading-relaxed mb-4">
                    Garam Nusantara telah berdiri sejak 2010 dan menjadi salah satu distributor garam terpercaya di Indonesia. Kami berkomitmen menyediakan produk garam terbaik untuk industri makanan, farmasi, hingga konsumen rumah tangga.
                </p>
                <p class="text-gray-500 leading-relaxed mb-6">
                    Dengan jaringan distribusi yang luas dan standar kualitas internasional, kami siap memenuhi kebutuhan garam Anda.
                </p>

                {{-- Stats --}}
                <div class="grid grid-cols-3 gap-4 mb-6">
                    @foreach([
                        ['number' => '15+', 'label' => 'Tahun Pengalaman'],
                        ['number' => '50+', 'label' => 'Produk Garam'],
                        ['number' => '1000+', 'label' => 'Klien Puas'],
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