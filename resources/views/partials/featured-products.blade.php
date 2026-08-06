<section class="section-padding">
    <div class="container-custom">
        <x-section-heading title="Produk Kami" subtitle="Satu Produk, Kualitas Terbaik" />

        <div class="max-w-4xl mx-auto" data-aos="fade-up">
            @if($product)
            <a href="{{ route('product') }}" class="group block bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden border border-light-gray">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="aspect-square md:aspect-auto">
                        <img src="{{ $product->gambar ?? 'https://images.unsplash.com/photo-1518110925495-5fe2eb8e0a05?w=600' }}"
                            alt="{{ $product->nama }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6 lg:p-8 flex flex-col justify-center">
                        <span class="text-primary font-medium text-sm mb-1">{{ $product->berat }}</span>
                        <h3 class="text-xl lg:text-2xl font-bold text-dark mb-3">{{ $product->nama }}</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ Str::limit($product->deskripsi, 150) }}</p>
                        <div class="flex items-center gap-2 text-primary font-medium text-sm group-hover:gap-3 transition-all duration-300">
                            Lihat Detail
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </div>
                    </div>
                </div>
            </a>
            @endif
        </div>
    </div>
</section>