<section class="section-padding dark:bg-[var(--background)] transition-colors duration-300">
    <div class="container-custom">
        <x-section-heading title="Testimoni" subtitle="Apa Kata Pelanggan Kami" />

        <div class="swiper testimonial-swiper">
            <div class="swiper-wrapper pb-12">
                @php
                    $testimonials = [
                        ['name' => 'Pak. Suharto', 'role' => 'Restoran Traditional Jepara', 'text' => 'Garam Laut Jepara Premium dari Garam Nusantara selalu memberikan rasa gurih alami pada setiap hidangan kami. Kami sudah bekerja sama selama 3 tahun.', 'rating' => 5],
                        ['name' => 'Ibu. Sri Wulandari', 'role' => 'Warung Nasi Campur', 'text' => 'Kualitas garam konsisten dan higienis. Pelanggan selalu kembali untuk memesan kembali. Sangat terjangkau untuk usaha kecil.', 'rating' => 5],
                        ['name' => 'Kurir Dapur', 'role' => 'CV. Catering Sehat', 'text' => 'Dari tambak langsung ke dapur kami. Rasa garam laut yang kaya akan mineral membuat semua masakan kami lebih sedap.', 'rating' => 5],
                    ];
                @endphp

                @foreach($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="bg-[var(--surface)] dark:bg-[var(--surface)] p-6 rounded-xl shadow-sm-aj border border-[var(--border)] h-full transition-colors duration-300">
                            <i data-lucide="quote" class="w-8 h-8 text-primary/20 mb-3"></i>
                            <p class="text-[var(--text-secondary)] text-sm leading-relaxed mb-4 transition-colors duration-300">"{{ $testimonial['text'] }}"</p>
                            <div class="flex gap-0.5 mb-3">
                                @for($i = 0; $i < $testimonial['rating']; $i++)
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                                @endfor
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                    <span class="text-primary font-semibold text-sm">{{ substr($testimonial['name'], 0, 1) }}</span>
                                </div>
                                <div>
                                    <div class="font-medium text-[var(--text)] text-sm transition-colors duration-300">{{ $testimonial['name'] }}</div>
                                    <div class="text-xs text-[var(--text-muted)] transition-colors duration-300">{{ $testimonial['role'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination !bottom-0"></div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    new Swiper('.testimonial-swiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: { el: '.swiper-pagination', clickable: true },
        autoplay: { delay: 4000, disableOnInteraction: false },
        breakpoints: {
            640: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
    });
</script>
@endpush