<section class="section-padding dark:bg-slate-950 transition-colors duration-300">
    <div class="container-custom">
        <x-section-heading title="Produk Unggulan Kami" subtitle="Tersedia dalam berbagai pilihan kemasan untuk memenuhi kebutuhan rumah tangga, usaha, hingga industri." />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12 lg:mb-16">
            @php
                $icons = [
                    '200g' => 'package',
                    '500g' => 'package-2',
                    '1kg' => 'package-plus',
                    '50kg' => 'truck',
                ];
            @endphp
            @foreach($productVariants as $index => $variant)
                <div class="group bg-white dark:bg-slate-900 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 border border-light-gray dark:border-slate-800 overflow-hidden"
                    data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="aspect-square bg-light dark:bg-slate-800 relative overflow-hidden">
                        @if($product && $product->gambar)
                            <img src="{{ $product->gambar }}" alt="{{ $variant['nama'] }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-300 dark:text-gray-600">
                                <i data-lucide="image" class="w-12 h-12"></i>
                            </div>
                        @endif
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-dark/80 to-transparent p-3">
                            <span class="text-primary-light font-medium text-sm">{{ $variant['berat'] }}</span>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="font-semibold text-dark dark:text-slate-100 mb-2 transition-colors duration-300 group-hover:text-primary">{{ $variant['nama'] }}</h3>
                        <p class="text-sm text-gray-500 dark:text-slate-400 leading-relaxed mb-4 transition-colors duration-300">{{ $variant['deskripsi'] }}</p>
                        <a href="{{ route('product') }}#{{ $variant['id'] }}" class="inline-flex items-center gap-1.5 text-primary font-medium text-sm hover:gap-2 transition-all duration-300">
                            Detail
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center" data-aos="fade-up">
            <a href="{{ route('product') }}" class="btn-primary">
                <i data-lucide="grid" class="w-5 h-5"></i>
                Lihat Semua Produk
            </a>
        </div>
    </div>
</section>