<section class="section-padding bg-light">
    <div class="container-custom">
        <x-section-heading title="Proses Produksi" subtitle="Dari Tambak ke Meja Anda" />

        <div class="relative max-w-3xl mx-auto">
            {{-- Vertical Line --}}
            <div class="hidden sm:block absolute left-8 lg:left-1/2 top-0 bottom-0 w-0.5 bg-primary/20 -translate-x-1/2"></div>

            @php
                $steps = [
                    ['number' => '01', 'icon' => 'droplets', 'title' => 'Penguapan Air Laut', 'desc' => 'Air laut dipompa ke tambak dan dipanaskan matahari hingga mengkristal.'],
                    ['number' => '02', 'icon' => 'gem', 'title' => 'Kristalisasi Garam', 'desc' => 'Kristal garam terbentuk dan dipisahkan dari larutan sisa.'],
                    ['number' => '03', 'icon' => 'sparkles', 'title' => 'Pengolahan & Pencucian', 'desc' => 'Garam dicuci dan difermentasi untuk menghilangkan kotoran.'],
                    ['number' => '04', 'icon' => 'package', 'title' => 'Pengemasan & Distribusi', 'desc' => 'Garam dikemas sesuai standar dan siap didistribusikan ke seluruh Indonesia.'],
                ];
            @endphp

            @foreach($steps as $index => $step)
                <div class="relative flex items-start gap-6 sm:gap-8 mb-10 last:mb-0"
                    data-aos="fade-up" data-aos-delay="{{ $index * 150 }}">

                    {{-- Number Badge --}}
                    <div class="relative z-10 flex-shrink-0 w-16 h-16 bg-primary rounded-xl flex items-center justify-center shadow-lg shadow-primary/20">
                        <span class="text-white font-bold text-lg">{{ $step['number'] }}</span>
                    </div>

                    {{-- Content --}}
                    <div class="bg-white p-5 rounded-xl shadow-sm flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <i data-lucide="{{ $step['icon'] }}" class="w-5 h-5 text-primary"></i>
                            <h3 class="font-semibold text-dark">{{ $step['title'] }}</h3>
                        </div>
                        <p class="text-sm text-gray-500">{{ $step['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>