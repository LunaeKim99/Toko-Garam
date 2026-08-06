<section class="section-padding bg-light dark:bg-slate-900 transition-colors duration-300">
    <div class="container-custom">
        <x-section-heading title="Keunggulan Produk" subtitle="Kualitas Terjamin" />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $advantages = [
                    ['icon' => 'award', 'title' => 'Garam Berkualitas', 'desc' => 'Diproduksi dari air laut alami dengan proses tradisional, menjamin garam premium penuh gizi.'],
                    ['icon' => 'shield-check', 'title' => 'Diproses Higienis', 'desc' => 'Standar produksi bersih dan terstandarisasi, bebas kontaminasi dan bahan pengawet buatan.'],
                    ['icon' => 'package', 'title' => 'Banyak Kemasan', 'desc' => 'Tersedia mulai dari 200g hingga 50kg untuk kebutuhan rumah tangga, usaha, hingga industri.'],
                    ['icon' => 'truck', 'title' => 'Grosir & Industri', 'desc' => 'Kami melayani pembelian grosir dan partai besar dengan harga khusus serta pengiriman tepat waktu.'],
                ];
            @endphp

            @foreach($advantages as $index => $item)
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 p-6 text-center border border-light-gray dark:border-slate-800"
                    data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="{{ $item['icon'] }}" class="w-7 h-7 text-primary"></i>
                    </div>
                    <h3 class="font-semibold text-dark dark:text-slate-100 mb-2 transition-colors duration-300">{{ $item['title'] }}</h3>
                    <p class="text-sm text-gray-500 dark:text-slate-400 leading-relaxed transition-colors duration-300">{{ $item['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
