<section id="features" class="section-padding bg-light">
    <div class="container-custom">
        <x-section-heading title="Mengapa Memilih Kami" subtitle="Keunggulan" />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $features = [
                    ['icon' => 'badge-check', 'title' => 'Produk Berkualitas', 'desc' => 'Garam diproses dengan standar ISO untuk menjamin mutu terbaik.'],
                    ['icon' => 'shield-check', 'title' => 'Higienis', 'desc' => 'Diproses di fasilitas bersertifikat dengan kontrol kualitas ketat.'],
                    ['icon' => 'truck', 'title' => 'Distribusi Cepat', 'desc' => 'Jaringan distribusi luas ke seluruh wilayah Indonesia.'],
                    ['icon' => 'tag', 'title' => 'Harga Kompetitif', 'desc' => 'Harga terjangkau tanpa mengorbankan kualitas produk.'],
                ];
            @endphp

            @foreach($features as $index => $feature)
                <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 text-center"
                    data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="{{ $feature['icon'] }}" class="w-7 h-7 text-primary"></i>
                    </div>
                    <h3 class="font-semibold text-dark mb-2">{{ $feature['title'] }}</h3>
                    <p class="text-sm text-gray-500">{{ $feature['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>