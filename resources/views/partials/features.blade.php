<section id="keunggulan" class="section-padding bg-light dark:bg-slate-900 transition-colors duration-300">
    <div class="container-custom">
        <x-section-heading title="Keunggulan Kami" subtitle="Mengapa Memilih Garam Nusantara" />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $features = [
                    ['icon' => 'factory', 'title' => 'Garam Produksi Sendiri', 'desc' => 'Diproduksi langsung dari tambak kami sendiri tanpa perantara.'],
                    ['icon' => 'map-pin', 'title' => 'Dipanen dari Tambak Jepara', 'desc' => 'Berasal dari pesisir utara Jepara dengan air laut yang jernih.'],
                    ['icon' => 'shield-check', 'title' => 'Proses Higienis', 'desc' => 'Diproses dengan standar higienis dan pengawasan kualitas ketat.'],
                    ['icon' => 'badge-check', 'title' => 'Kualitas Terjaga', 'desc' => 'Setiap butir garam melalui proses penjemuran dan sortir terbaik.'],
                ];
            @endphp

            @foreach($features as $index => $feature)
                <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 text-center border border-light-gray dark:border-slate-800"
                    data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="{{ $feature['icon'] }}" class="w-7 h-7 text-primary"></i>
                    </div>
                    <h3 class="font-semibold text-dark dark:text-slate-100 mb-2 transition-colors duration-300">{{ $feature['title'] }}</h3>
                    <p class="text-sm text-gray-500 dark:text-slate-400 transition-colors duration-300">{{ $feature['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
