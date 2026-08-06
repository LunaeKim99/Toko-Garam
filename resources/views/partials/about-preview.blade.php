<section class="section-padding dark:bg-[var(--background)] transition-colors duration-300">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
            <div data-aos="fade-right">
                <img src="https://images.pexels.com/photos/3344508/pexels-photo-3344508.jpeg"
                    alt="Tambak Garam Jepara" class="rounded-xl shadow-lg w-full h-80 object-cover">
            </div>

            <div data-aos="fade-left">
                <p class="text-primary font-medium text-sm uppercase tracking-wider mb-2">Profil Usaha</p>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[var(--text)] transition-colors duration-300">
                    Produsen Garam Laut dari Jepara
                </h2>
                <p class="text-[var(--text-secondary)] leading-relaxed mb-4 transition-colors duration-300">
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
                            <div class="text-xs text-[var(--text-muted)] transition-colors duration-300">{{ $stat['label'] }}</div>
                        </div>
                    @endforeach
                </div>

                <a href="{{ route('about') }}" class="btn-primary">
                    Selengkapnya
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-16">
            <div class="bg-[var(--surface)] rounded-xl shadow-sm-aj overflow-hidden border border-[var(--border)] transition-colors duration-300" data-aos="fade-up">
                <img src="https://images.pexels.com/photos/27098270/pexels-photo-27098270.jpeg" alt="Petani Garam" class="w-full h-40 object-cover">
                <div class="p-6">
                    <h3 class="font-semibold text-[var(--text)] mb-2 transition-colors duration-300">Petani Garam</h3>
                    <p class="text-sm text-[var(--text-secondary)] transition-colors duration-300">Petani garam lokal yang sudah berpengalaman selama puluhan tahun memanen garam laut secara tradisional.</p>
                </div>
            </div>
            <div class="bg-[var(--surface)] rounded-xl shadow-sm-aj overflow-hidden border border-[var(--border)] transition-colors duration-300" data-aos="fade-up" data-aos-delay="100">
                <img src="https://images.pexels.com/photos/27203325/pexels-photo-27203325.jpeg" alt="Pengangkutan Garam" class="w-full h-40 object-cover">
                <div class="p-6">
                    <h3 class="font-semibold text-[var(--text)] mb-2 transition-colors duration-300">Pengangkutan</h3>
                    <p class="text-sm text-[var(--text-secondary)] transition-colors duration-300">Garam yang sudah siap dikemas diangkut dengan hati-hati dari tambak ke pabrik pengemasan kami.</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <div class="bg-[var(--surface)] rounded-xl shadow-sm-aj overflow-hidden border border-[var(--border)] transition-colors duration-300" data-aos="fade-up" data-aos-delay="200">
                <img src="https://images.pexels.com/photos/5173683/pexels-photo-5173683.jpeg" alt="Pemandangan Tambak dari Udara" class="w-full h-40 object-cover">
                <div class="p-6">
                    <h3 class="font-semibold text-[var(--text)] mb-2 transition-colors duration-300">Pemandangan Tambak</h3>
                    <p class="text-sm text-[var(--text-secondary)] transition-colors duration-300">Tambak garam kami yang tersebar di pesisir Jepara, dikelola dengan teknik tradisional yang sudah turun-temurun.</p>
                </div>
            </div>
            <div class="bg-[var(--surface)] rounded-xl shadow-sm-aj overflow-hidden border border-[var(--border)] transition-colors duration-300" data-aos="fade-up" data-aos-delay="300">
                <img src="https://images.pexels.com/photos/33326470/pexels-photo-33326470.jpeg" alt="Pesisir Jepara" class="w-full h-40 object-cover">
                <div class="p-6">
                    <h3 class="font-semibold text-[var(--text)] mb-2 transition-colors duration-300">Pesisir Jepara</h3>
                    <p class="text-sm text-[var(--text-secondary)] transition-colors duration-300">Pemandangan pesisir yang sejuk menjadi sumber kekayaan air laut untuk produksi garam kami.</p>
                </div>
            </div>
        </div>
    </div>
</section>
