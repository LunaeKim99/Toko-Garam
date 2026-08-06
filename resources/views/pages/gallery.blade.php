@extends('layouts.app')

@section('meta_title', 'Galeri — Garam Nusantara Jepara')
@section('meta_description', 'Dokumentasi aktivitas produksi garam di tambak Jepara. Lihat proses penjemuran, pemanenan, pengemasan, dan pengiriman.')

@section('content')
<section class="relative py-24 bg-gradient-to-br from-dark to-primary/80 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1920" class="w-full h-full object-cover" alt="">
    </div>
    <div class="relative container-custom text-center">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-3">Galeri</h1>
        <div class="flex items-center justify-center gap-2 text-sm text-white/70">
            <a href="{{ route('home') }}" class="hover:text-white">Home</a>
            <span>/</span>
            <span>Galeri</span>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('gallery', () => ({
            activeFilter: 'Semua',
            lightboxOpen: false,
            lightboxImg: '',
            lightboxTitle: '',
            categories: @json(array_merge(['Semua'], $categories)),
            items: @json($galleries->map(fn($g) => ['kategori' => $g->kategori, 'gambar' => $g->gambar, 'judul' => $g->judul])->values())
        }))
    })
</script>
@endpush

<section class="section-padding dark:bg-[#020617] transition-colors duration-300" x-data="gallery()">
    <div class="container-custom">
        <div class="flex flex-wrap justify-center gap-3 mb-10" data-aos="fade-up">
            <button @click="activeFilter = categories[0]"
                :class="activeFilter === categories[0] ? 'bg-primary text-white' : 'bg-white text-dark dark:bg-[#0F172A] dark:text-gray-300 hover:bg-primary/10 dark:hover:bg-white/10'"
                class="px-5 py-2 rounded-xl text-sm font-medium transition-all duration-300 border border-light-gray dark:border-[#1E293B]">
                Semua
            </button>
            @foreach($categories as $index => $cat)
                <button @click="activeFilter = categories[{{ $index + 1 }}]"
                    :class="activeFilter === categories[{{ $index + 1 }}] ? 'bg-primary text-white' : 'bg-white text-dark dark:bg-[#0F172A] dark:text-gray-300 hover:bg-primary/10 dark:hover:bg-white/10'"
                    class="px-5 py-2 rounded-xl text-sm font-medium transition-all duration-300 border border-light-gray dark:border-[#1E293B]">
                    {{ $cat }}
                </button>
            @endforeach
        </div>

        <div class="columns-1 sm:columns-2 lg:columns-3 gap-4 space-y-4">
            @foreach($galleries as $index => $gallery)
                <div class="break-inside-avoid" x-show="activeFilter === 'Semua' || activeFilter === items[{{ $index }}].kategori"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95">
                    <div class="bg-white dark:bg-[#0F172A] rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 group cursor-pointer"
                        @click="lightboxOpen = true; lightboxImg = items[{{ $index }}].gambar; lightboxTitle = items[{{ $index }}].judul">
                        <div class="overflow-hidden">
                            <img src="{{ $gallery->gambar }}" alt="{{ $gallery->judul }}"
                                class="w-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-4">
                            <span class="text-primary text-xs font-medium">{{ $gallery->kategori }}</span>
                            <h3 class="font-semibold text-dark dark:text-white text-sm mt-1 transition-colors duration-300">{{ $gallery->judul }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div x-show="lightboxOpen" x-cloak x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            @click="lightboxOpen = false"
            class="fixed inset-0 z-[100] bg-black/90 flex items-center justify-center p-4 cursor-pointer">
            <div @click.stop class="relative max-w-4xl max-h-[90vh] w-full">
                <img :src="lightboxImg" :alt="lightboxTitle" class="w-full h-auto max-h-[80vh] object-contain rounded-xl">
                <p x-text="lightboxTitle" class="text-white text-center mt-4 font-medium"></p>
                <button @click="lightboxOpen = false"
                    class="absolute -top-3 -right-3 w-10 h-10 bg-white/20 hover:bg-white/40 rounded-full flex items-center justify-center text-white transition-colors">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
        </div>
    </div>
</section>

@include('partials.cta')
@endsection