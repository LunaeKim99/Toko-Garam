@extends('layouts.app')

@section('meta_title', 'Produk — Garam Nusantara')
@section('meta_description', 'Daftar produk garam berkualitas dari Garam Nusantara.')

@section('content')
<section class="relative py-24 bg-gradient-to-br from-dark to-primary/80">
    <div class="relative container-custom text-center">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-3">Produk Kami</h1>
        <div class="flex items-center justify-center gap-2 text-sm text-white/70">
            <a href="{{ route('home') }}" class="hover:text-white">Home</a>
            <span>/</span>
            <span>Produk</span>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container-custom" x-data="productFilter()">
        {{-- Toolbar --}}
        <div class="flex flex-col sm:flex-row gap-4 mb-8" data-aos="fade-up">
            <div class="flex-1">
                <input type="text" x-model="search" placeholder="Cari produk..."
                    class="w-full px-4 py-3 border border-light-gray rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none">
            </div>
            <div class="relative">
                <select x-model="selectedCategory"
                    class="appearance-none w-full sm:w-48 px-4 py-3 border border-light-gray rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none bg-white pr-10 cursor-pointer">
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}">{{ $cat }}</option>
                    @endforeach
                </select>
                <i data-lucide="chevron-down" class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"></i>
            </div>
        </div>

        <p class="text-sm text-gray-400 mb-6" x-text="filtered.length + ' produk ditemukan'"></p>

        {{-- Product Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-6">
            <template x-for="product in filtered" :key="product.slug">
                <a :href="'/produk/' + product.slug"
                    class="group block bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                    <div class="overflow-hidden">
                        <img :src="product.image" :alt="product.name"
                            class="w-full h-48 sm:h-56 object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5">
                        <span class="inline-block px-2.5 py-1 bg-primary/10 text-primary text-xs font-medium rounded-lg mb-2"
                            x-text="product.category"></span>
                        <h3 class="font-semibold text-dark group-hover:text-primary transition-colors duration-300 mb-1"
                            x-text="product.name"></h3>
                        <span class="inline-block text-xs text-gray-500 mb-2" x-text="product.weight"></span>
                        <p class="text-sm text-gray-500 line-clamp-2 mb-3" x-text="product.description"></p>
                        <span class="inline-flex items-center gap-1 text-sm font-medium text-primary">
                            Lihat Detail
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </span>
                    </div>
                </a>
            </template>
        </div>

        {{-- Empty State --}}
        <div x-show="filtered.length === 0" class="text-center py-16">
            <i data-lucide="search-x" class="w-12 h-12 text-gray-300 mx-auto mb-4"></i>
            <p class="text-gray-400">Produk tidak ditemukan.</p>
        </div>
    </div>
</section>

@include('partials.cta')
@endsection

@push('scripts')
<script>
    function productFilter() {
        return {
            search: '',
            selectedCategory: 'Semua',
            products: @json($products),
            get filtered() {
                return this.products.filter(p => {
                    const matchCategory = this.selectedCategory === 'Semua' || p.category === this.selectedCategory;
                    const matchSearch = p.name.toLowerCase().includes(this.search.toLowerCase()) ||
                                        p.description.toLowerCase().includes(this.search.toLowerCase());
                    return matchCategory && matchSearch;
                });
            }
        }
    }
</script>
@endpush
