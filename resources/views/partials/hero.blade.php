<section class="relative min-h-screen flex items-center overflow-hidden">
    <div class="swiper hero-swiper absolute inset-0 z-0">
        <div class="swiper-wrapper">
            @foreach([
                'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1920',
                'https://images.unsplash.com/photo-1560493676-04071c5f467b?w=1920',
                'https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=1920',
            ] as $img)
                <div class="swiper-slide">
                    <img src="{{ $img }}" alt="Tambak Garam Jepara" class="w-full h-full object-cover">
                </div>
            @endforeach
        </div>
    </div>

    <div class="absolute inset-0 z-10 bg-gradient-to-r from-dark/80 via-dark/60 to-primary/40 dark:from-dark/80 dark:via-dark/70 dark:to-primary/50"></div>

    <div class="relative z-20 container-custom py-20">
        <div class="max-w-2xl">
            <h1 class="text-3xl sm:text-5xl lg:text-7xl font-bold text-white leading-tight mb-4 sm:mb-6 transition-colors duration-300"
                data-aos="fade-up">
                Garam Jepara Asli,<br>
                <span class="text-primary-light">Diproduksi Langsung dari Tambak Kami</span>
            </h1>
            <p class="text-lg sm:text-xl text-gray-200 dark:text-gray-300 mb-6 sm:mb-8 max-w-lg transition-colors duration-300"
                data-aos="fade-up" data-aos-delay="100">
                Garam premium produksi sendiri dari pesisir Jepara. Dipanen alami, higienis, kaya mineral. Kualitas terjaga dari tambak ke meja Anda.
            </p>
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4"
                data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('product') }}" class="btn-primary">
                    Lihat Produk
                </a>
                <a href="{{ route('contact') }}" class="btn-outline">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 animate-bounce">
        <a href="#keunggulan" class="text-white/70 hover:text-white transition-colors duration-300">
            <i data-lucide="chevrons-down" class="w-6 h-6"></i>
        </a>
    </div>
</section>

@push('scripts')
<script>
    new Swiper('.hero-swiper', {
        loop: true,
        effect: 'fade',
        fadeEffect: { crossFade: true },
        autoplay: { delay: 5000, disableOnInteraction: false },
        speed: 1000,
    });
</script>
@endpush
