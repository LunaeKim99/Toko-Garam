<section class="section-padding">
    <div class="container-custom">
        <x-section-heading title="Testimoni" subtitle="Apa Kata Pelanggan Kami" />

        <div class="swiper testimonial-swiper">
            <div class="swiper-wrapper pb-12">
                @php
                    $testimonials = [
                        ['name' => 'Budi Santoso', 'role' => 'PT. Makanan Sehat', 'text' => 'Kualitas garam dari Garam Nusantara sangat konsisten. Kami sudah bekerja sama selama 5 tahun dan tidak pernah kecewa.', 'rating' => 5],
                        ['name' => 'Siti Rahayu', 'role' => 'Restoran Padang Jaya', 'text' => 'Pengiriman selalu tepat waktu dan kualitas garamnya terbaik. Sangat direkomendasikan untuk bisnis kuliner.', 'rating' => 5],
                        ['name' => 'Ahmad Fauzi', 'role' => 'Distributor Garam Jatim', 'text' => 'Harga kompetitif dengan kualitas premium. Klien kami juga puas dengan produk dari Garam Nusantara.', 'rating' => 5],
                    ];
                @endphp

                @foreach($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="bg-white p-6 rounded-xl shadow-sm border border-light-gray h-full">
                            <i data-lucide="quote" class="w-8 h-8 text-primary/20 mb-3"></i>
                            <p class="text-gray-600 text-sm leading-relaxed mb-4">"{{ $testimonial['text'] }}"</p>
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
                                    <div class="font-medium text-dark text-sm">{{ $testimonial['name'] }}</div>
                                    <div class="text-xs text-gray-400">{{ $testimonial['role'] }}</div>
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