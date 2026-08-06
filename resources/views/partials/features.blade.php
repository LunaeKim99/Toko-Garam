<section id="keunggulan" class="section-padding bg-surface transition-colors duration-300">
    <div class="container-custom">
        <x-section-heading title="Keunggulan Kami" subtitle="Mengapa Memilih {{ config('app.name', 'AJ Brand') }}" />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $features = [
                    ['img' => 'https://images.pexels.com/photos/3344508/pexels-photo-3344508.jpeg', 'title' => 'Produksi Sendiri', 'desc' => 'Diproduksi langsung dari tambak kami sendiri tanpa perantara.'],
                    ['img' => 'https://cdn.pixabay.com/photo/2015/10/22/11/31/salt-1001054_1280.jpg', 'title' => 'Kualitas Terjaga', 'desc' => 'Setiap butir garam melalui proses penjemuran dan sortir terbaik.'],
                    ['img' => 'https://images.pexels.com/photos/27098281/pexels-photo-27098281.jpeg', 'title' => 'Proses Higienis', 'desc' => 'Diproses dengan standar higienis dan pengawasan kualitas ketat.'],
                    ['img' => 'https://images.pexels.com/photos/5173683/pexels-photo-5173683.jpeg', 'title' => 'Asli Jepara', 'desc' => 'Berasal dari pesisir utara Jepara dengan air laut yang jernih.'],
                ];
            @endphp

            @foreach($features as $index => $feature)
                <div class="bg-[var(--surface)] dark:bg-[var(--surface)] rounded-xl shadow-sm-aj hover:shadow-md-aj transition-all duration-300 overflow-hidden border border-[var(--border)]"
                    data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="h-32 overflow-hidden">
                        <img src="{{ $feature['img'] }}" alt="{{ $feature['title'] }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="font-semibold text-[var(--text)] mb-2 transition-colors duration-300">{{ $feature['title'] }}</h3>
                        <p class="text-sm text-[var(--text-secondary)] transition-colors duration-300">{{ $feature['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
