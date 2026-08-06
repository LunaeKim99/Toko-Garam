@extends('layouts.app')

@section('meta_title', 'Produk Kami — Garam Nusantara Jepara')
@section('meta_description', 'Katalog lengkap garam Nusantara Jepara dalam berbagai kemasan: 200g, 500g, 1kg, dan 50kg (1 karung) untuk kebutuhan rumah tangga hingga industri.')

@section('content')
<section class="relative py-28 bg-linear-to-br from-dark to-primary/80 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.pexels.com/photos/27098281/pexels-photo-27098281.jpeg" class="w-full h-full object-cover" alt="Garam Kristal">
    </div>
    <div class="absolute inset-0 bg-dark/50"></div>
    <div class="relative container-custom text-center">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-3">Produk Kami</h1>
        <div class="flex items-center justify-center gap-2 text-sm text-white/70">
            <a href="{{ route('home') }}" class="hover:text-white">Home</a>
            <span>/</span>
            <span>Produk Kami</span>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container-custom">
        <x-section-heading title="Katalog Produk Lengkap" subtitle="Berbagai Pilihan Kemasan" />

        <p class="text-center text-gray-500 dark:text-slate-400 max-w-2xl mx-auto mb-12 transition-colors duration-300">
            Garam premium kami tersedia dalam berbagai ukuran kemasan untuk memenuhi kebutuhan rumah tangga, usaha kuliner, hingga industri besar.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 lg:gap-8">
            @forelse($productVariants as $index => $variant)
                <div id="{{ $variant['id'] }}" class="group bg-white dark:bg-slate-900 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 border border-light-gray dark:border-slate-800 overflow-hidden"
                    data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="aspect-square overflow-hidden">
                        @if($product && $product->gambar)
                            <img src="{{ $product->gambar }}" alt="{{ $variant['nama'] }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-300 dark:text-gray-600">
                                <i data-lucide="image" class="w-16 h-16"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-6 flex flex-col">
                        <span class="text-primary font-medium text-sm mb-2 transition-colors duration-300">{{ $variant['berat'] }}</span>
                        <h2 class="text-xl font-bold text-dark dark:text-slate-100 mb-3 transition-colors duration-300 group-hover:text-primary">{{ $variant['nama'] }}</h2>
                        <p class="text-sm text-gray-500 dark:text-slate-400 leading-relaxed mb-5 flex-1 transition-colors duration-300">{{ $variant['deskripsi'] }}</p>
                        <a href="https://wa.me/{{ $product?->whatsapp ?? '6281234567890' }}?text=Halo%20saya%20ingin%20pesan%20{{ urlencode($variant['nama']) }}"
                            target="_blank"
                            class="btn-whatsapp w-full">
                            <i data-lucide="send" class="w-4 h-4"></i>
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 dark:text-slate-400">
                        Produk belum tersedia.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="section-padding bg-light dark:bg-slate-900 transition-colors duration-300">
    <div class="container-custom">
        <x-section-heading title="Keunggulan Produk Kami" subtitle="Kualitas Terjamin" />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $advantages = [
                    ['icon' => 'award', 'title' => 'Garam Berkualitas', 'desc' => 'Diproduksi dari air laut alami dengan proses tradisional yang menjamin kandungan garam yang tinggi.'],
                    ['icon' => 'shield-check', 'title' => 'Diproses Higienis', 'desc' => 'Sistem produksi yang bersih dan terstandarisasi, bebas kontaminasi serta tanpa bahan pengawet buatan.'],
                    ['icon' => 'package', 'title' => 'Banyak Pilihan Kemasan', 'desc' => 'Tersedia dari kemasan 200 gram hingga 50 kilogram untuk keperluan rumah tangga hingga industri.'],
                    ['icon' => 'truck', 'title' => 'Grosir & Industri', 'desc' => 'Kami melayani pembelian grosir dan partai besar dengan harga khusus serta pengiriman tepat waktu.'],
                ];
            @endphp

            @foreach($advantages as $index => $item)
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 p-6 text-center border border-light-gray dark:border-slate-800"
                    data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="{{ $item['icon'] }}" class="w-7 h-7 text-primary"></i>
                    </div>
                    <h3 class="font-semibold text-dark dark:text-slate-100 mb-2 transition-colors duration-300">{{ $item['title'] }}</h3>
                    <p class="text-sm text-gray-500 dark:text-slate-400 leading-relaxed transition-colors duration-300">{{ $item['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section-padding" x-data="{ faqOpen: null }">
    <div class="container-custom max-w-3xl">
        <x-section-heading title="Pertanyaan Umum" subtitle="FAQ" />

        @php
            $faqs = [
                ['q' => 'Apakah garam ini aman untuk konsumsi sehari-hari?', 'a' => 'Ya, Garam Laut Jepara Premium aman dikonsumsi sehari-hari. Diproses higienis tanpa bahan pengawet dan pewarna buatan.'],
                ['q' => 'Berapa lama umur simpan garam ini?', 'a' => 'Garam memiliki umur simpan 24 bulan dalam kemasan tertutup. Setelah dibuka, segera tutup rapat dan gunakan dalam 6 bulan.'],
                ['q' => 'Apakah bisa pesan dalam jumlah besar?', 'a' => 'Tentu, kami melayani pemesanan partai besar untuk kebutuhan industri dan distribusi. Hubungi kami via WhatsApp.'],
                ['q' => 'Bagaimana cara pemesanan?', 'a' => 'Cukup klik tombol "Pesan Sekarang" pada produk yang diinginkan dan kirim pesan via WhatsApp. Tim kami akan merespon secepatnya.'],
            ];
        @endphp

        <div class="space-y-4">
            @foreach($faqs as $index => $faq)
                <div class="bg-white dark:bg-slate-900 border border-light-gray dark:border-slate-800 rounded-xl overflow-hidden" data-aos="fade-up">
                    <button @click="faqOpen === {{ $index }} ? faqOpen = null : faqOpen = {{ $index }}"
                        class="w-full flex items-center justify-between p-5 text-left">
                        <span class="font-medium text-dark dark:text-slate-100 text-sm pr-4">{{ $faq['q'] }}</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 text-gray-400 dark:text-slate-500 shrink-0 transition-transform duration-300"
                            :class="faqOpen === {{ $index }} ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="faqOpen === {{ $index }}" x-cloak x-collapse class="px-5 pb-5">
                        <p class="text-sm text-gray-500 dark:text-slate-400 leading-relaxed">{{ $faq['a'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('partials.cta')
@endsection