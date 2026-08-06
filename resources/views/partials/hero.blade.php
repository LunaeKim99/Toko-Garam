<section class="relative min-h-screen flex items-center overflow-hidden">
    <div class="swiper hero-swiper absolute inset-0 z-0">
        <div class="swiper-wrapper">
            @foreach([
                'https://images.pexels.com/photos/3344508/pexels-photo-3344508.jpeg?auto=compress&w=1920&h=1280&fit=crop',
                'https://images.pexels.com/photos/5173683/pexels-photo-5173683.jpeg?auto=compress&w=1920&h=1280&fit=crop',
                'https://images.pexels.com/photos/27098270/pexels-photo-27098270.jpeg?auto=compress&w=1920&h=1280&fit=crop',
                'https://images.pexels.com/photos/27098281/pexels-photo-27098281.jpeg?auto=compress&w=1920&h=1280&fit=crop',
            ] as $img)
                <div class="swiper-slide min-h-screen">
                    <img src="{{ $img }}" alt="Tambak Garam Jepara" class="w-full h-full object-cover object-center">
                </div>
            @endforeach
        </div>
    </div>

    <div class="absolute inset-0 z-10 bg-gradient-to-r from-dark/90 via-dark/70 to-primary/50 dark:from-dark/90 dark:via-dark/80 dark:to-primary/60"></div>

    <div class="relative z-20 container-custom py-16">
        <div class="max-w-2xl">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-3 sm:mb-4 transition-colors duration-300"
                data-aos="fade-up">
                Garam Jepara Asli,<br>
                <span class="text-primary-light">Diproduksi Langsung dari Tambak Kami</span>
            </h1>
            <p class="text-base sm:text-lg text-gray-200 dark:text-gray-300 mb-4 sm:mb-6 max-w-lg transition-colors duration-300"
                data-aos="fade-up" data-aos-delay="100">
                Garam laut berkualitas tinggi yang diproduksi secara tradisional dan higienis dari tambak garam di pesisir Jepara, Jawa Tengah.
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