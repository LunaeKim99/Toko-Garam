<section class="section-padding dark:bg-[var(--background)] transition-colors duration-300">
    <div class="container-custom">
        <x-section-heading title="Produk Unggulan Kami" subtitle="Pilihan terbaik untuk kebutuhan rumah tangga dan usaha" />

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center mb-12 lg:mb-16">
            <div class="relative">
                @php
                    $featuredImages = [
                        asset('images/producs/garam-200g.png'),
                        asset('images/producs/garam-500g.png'),
                    ];
                @endphp
                <div x-data="{ current: 0, interval: null }" x-init="interval = setInterval(() => current = (current + 1) % 2, 4000)">
                    @foreach($featuredImages as $i => $image)
                        <img src="{{ $image }}" alt="Garam Nusantara Jepara" x-show="current === {{ $i }}" class="w-full h-auto rounded-xl transition-opacity duration-500" />
                    @endforeach
                </div>
            </div>

            <div class="space-y-4">
                <p class="text-[var(--text-secondary)] leading-relaxed">Garam Nusantara Jepara adalah produk unggulan PT Alfa Jaya Bersama yang diproduksi langsung dari tambak garam di pesisir Jepara, Jawa Tengah. Kami menggunakan air laut alami dengan proses penguapan tradisional di bawah sinar matahari, menghasilkan kristal garam berkualitas tinggi yang kaya mineral.</p>
                <p class="text-[var(--text-secondary)] leading-relaxed">Produk ini diproses secara higienis tanpa bahan pengawet buatan, bebas kontaminasi, dan terjaga kemurniannya dari tambak hingga ke meja masyarakat. Dengan kandungan natrium yang seimbang dan rasa yang khas, garam Nusantara Jepara menjadi pilihan utama keluarga Indonesia untuk kebutuhan memasak sehari-hari.</p>
                <p class="text-[var(--text-secondary)] leading-relaxed">Tersedia dalam berbagai pilihan kemasan mulai dari 200 gram hingga 50 kilogram, kami melayani kebutuhan rumah tangga, usaha kuliner, hingga industri besar. Garam Nusantara Jepara, rasa alami dari pesisir Jawa.</p>
                <a href="{{ route('product') }}" class="inline-flex items-center gap-1.5 text-primary font-medium text-sm hover:gap-2 transition-all duration-300 mt-2">
                    Lihat Detail <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>
        </div>
    </div>
</section>