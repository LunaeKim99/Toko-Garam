@props(['product'])

<a href="{{ route('product-detail', $product['slug']) }}"
    class="group block bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1 overflow-hidden"
    data-aos="fade-up">

    <div class="overflow-hidden">
        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}"
            class="w-full h-48 sm:h-56 object-cover group-hover:scale-105 transition-transform duration-500">
    </div>

    <div class="p-5">
        <span class="inline-block px-2.5 py-1 bg-primary/10 text-primary text-xs font-medium rounded-lg mb-2">
            {{ $product['category'] }}
        </span>

        <h3 class="font-semibold text-dark group-hover:text-primary transition-colors duration-300 mb-1">
            {{ $product['name'] }}
        </h3>

        <span class="inline-block text-xs text-gray-500 mb-2">{{ $product['weight'] }}</span>

        <p class="text-sm text-gray-500 line-clamp-2 mb-3">{{ $product['description'] }}</p>

        <span class="inline-flex items-center gap-1 text-sm font-medium text-primary">
            Lihat Detail
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </span>
    </div>
</a>