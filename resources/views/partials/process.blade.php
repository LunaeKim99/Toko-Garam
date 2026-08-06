<section class="section-padding bg-light dark:bg-[#0F172A] transition-colors duration-300">
    <div class="container-custom">
        <x-section-heading title="Proses Produksi" subtitle="Dari Tambak Jepara ke Meja Anda" />

        <div class="relative max-w-3xl mx-auto">
            <div class="hidden sm:block absolute left-8 lg:left-1/2 top-0 bottom-0 w-0.5 bg-primary/20 -translate-x-1/2"></div>

            @php
                $steps = [
                    ['number' => '01', 'icon' => 'sun', 'title' => 'Penjemuran', 'desc' => 'Garam dijemur secara alami di bawah sinar matahari pesisir Jepara hingga mengkristal sempurna.'],
                    ['number' => '02', 'icon' => 'hand', 'title' => 'Pemanenan', 'desc' => 'Kristal garam dipanen langsung dari tambak oleh petani garam berpengalaman.'],
                    ['number' => '03', 'icon' => 'filter', 'title' => 'Penyortiran', 'desc' => 'Garam disortir berdasarkan ukuran dan kualitas untuk memastikan keseragaman kristal.'],
                    ['number' => '04', 'icon' => 'package-check', 'title' => 'Pengemasan', 'desc' => 'Garam dikemas dalam kemasan kedap udara menjaga kesegaran hingga ke tangan Anda.'],
                ];
            @endphp

            @foreach($steps as $index => $step)
                <div class="relative flex items-start gap-6 sm:gap-8 mb-10 last:mb-0"
                    data-aos="fade-up" data-aos-delay="{{ $index * 150 }}">

                    <div class="relative z-10 flex-shrink-0 w-16 h-16 bg-primary rounded-xl flex items-center justify-center shadow-lg shadow-primary/20">
                        <span class="text-white font-bold text-lg">{{ $step['number'] }}</span>
                    </div>

                    <div class="bg-white dark:bg-[#111827] p-5 rounded-xl shadow-sm flex-1 border border-light-gray dark:border-[#1E293B] transition-colors duration-300">
                        <div class="flex items-center gap-2 mb-2">
                            <i data-lucide="{{ $step['icon'] }}" class="w-5 h-5 text-primary"></i>
                            <h3 class="font-semibold text-dark dark:text-white transition-colors duration-300">{{ $step['title'] }}</h3>
                        </div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 transition-colors duration-300">{{ $step['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>