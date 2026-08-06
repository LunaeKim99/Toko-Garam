<section class="section-padding bg-surface transition-colors duration-300">
    <div class="container-custom">
        <x-section-heading title="Proses Produksi" subtitle="Dari Tambak Jepara ke Meja Anda" />

        <div class="relative max-w-3xl mx-auto">
            <div class="hidden sm:block absolute left-8 lg:left-1/2 top-0 bottom-0 w-0.5 bg-primary/20 -translate-x-1/2"></div>

            @php
                $steps = [
                    ['number' => '01', 'icon' => 'sun', 'title' => 'Penampungan Air Laut', 'desc' => 'Air laut alami masuk ke dalam tambak garam kami untuk memulai proses penguapan.', 'img' => 'https://images.pexels.com/photos/3344508/pexels-photo-3344508.jpeg'],
                    ['number' => '02', 'icon' => 'droplets', 'title' => 'Penguapan', 'desc' => 'Air laut menguap di bawah sinar matahari, menyisakan garam di dasar petak-petak tambak.', 'img' => 'https://images.pexels.com/photos/5173683/pexels-photo-5173683.jpeg'],
                    ['number' => '03', 'icon' => 'hand', 'title' => 'Panen Garam', 'desc' => 'Kristal garam dipanen langsung dari tambak oleh petani garam berpengalaman.', 'img' => 'https://images.pexels.com/photos/27098270/pexels-photo-27098270.jpeg'],
                    ['number' => '04', 'icon' => 'package-check', 'title' => 'Penyortiran dan Pengemasan', 'desc' => 'Garam disortir, lalu dikemas dalam kemasan kedap udara agar tetap bersih dan kualitasnya terjaga.', 'img' => 'https://images.pexels.com/photos/27098281/pexels-photo-27098281.jpeg'],
                ];
            @endphp

            @foreach($steps as $index => $step)
                <div class="relative flex items-start gap-6 sm:gap-8 mb-10 last:mb-0"
                    data-aos="fade-up" data-aos-delay="{{ $index * 150 }}">

                    <div class="relative z-10 flex-shrink-0 w-16 h-16 bg-primary rounded-xl flex items-center justify-center shadow-lg shadow-primary/20">
                        <span class="text-white font-bold text-lg">{{ $step['number'] }}</span>
                    </div>

                    <div class="bg-[var(--surface)] dark:bg-[var(--surface)] rounded-xl shadow-sm-aj flex-1 border border-[var(--border)] transition-colors duration-300 overflow-hidden">
                        <img src="{{ $step['img'] }}" alt="{{ $step['title'] }}" class="w-full h-36 object-cover">
                        <div class="p-5">
                            <div class="flex items-center gap-2 mb-2">
                                <i data-lucide="{{ $step['icon'] }}" class="w-5 h-5 text-primary"></i>
                                <h3 class="font-semibold text-[var(--text)] transition-colors duration-300">{{ $step['title'] }}</h3>
                            </div>
                            <p class="text-sm text-[var(--text-secondary)] transition-colors duration-300">{{ $step['desc'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>