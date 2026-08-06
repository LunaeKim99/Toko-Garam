@extends('layouts.app')

@section('meta_title', 'Produk Kami — Garam Nusantara Jepara')
@section('meta_description', $product?->nama . ' — ' . Str::limit($product?->deskripsi, 160))

@section('content')
<section class="relative py-24 bg-gradient-to-br from-dark to-primary/80 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1920" class="w-full h-full object-cover" alt="">
    </div>
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
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-start">
            <div data-aos="fade-right">
                <div class="rounded-xl overflow-hidden shadow-lg">
                    <img src="{{ $product?->gambar ?? 'https://images.unsplash.com/photo-1518110925495-5fe2eb8e0a05?w=800' }}"
                        alt="{{ $product?->nama }}" class="w-full h-auto object-cover">
                </div>
            </div>

            <div data-aos="fade-left">
                <span class="text-primary font-medium text-sm">{{ $product?->berat }}</span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-dark dark:text-slate-100 mb-4 mt-1">{{ $product?->nama }}</h2>
                <p class="text-gray-500 dark:text-slate-400 leading-relaxed mb-6">{{ $product?->deskripsi }}</p>

                <div class="mb-6">
                    <h3 class="font-semibold text-dark dark:text-slate-100 mb-3">Keunggulan</h3>
                    <ul class="space-y-2">
                        @foreach($product?->keunggulan ?? [] as $item)
                            <li class="flex items-start gap-2 text-sm text-gray-600 dark:text-slate-300">
                                <i data-lucide="check-circle" class="w-4 h-4 text-primary mt-0.5 flex-shrink-0"></i>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="mb-6">
                    <h3 class="font-semibold text-dark dark:text-slate-100 mb-3">Manfaat</h3>
                    <ul class="space-y-2">
                        @foreach($product?->manfaat ?? [] as $item)
                            <li class="flex items-start gap-2 text-sm text-gray-600 dark:text-slate-300">
                                <i data-lucide="star" class="w-4 h-4 text-yellow-500 mt-0.5 flex-shrink-0"></i>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <a href="https://wa.me/{{ $product?->whatsapp }}?text=Halo,%20saya%20ingin%20pesan%20{{ urlencode($product?->nama) }}" target="_blank"
                    class="btn-whatsapp w-full sm:w-auto">
                    <svg viewBox="0 0 24 24" class="w-5 h-5 fill-current"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    Pesan via WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-light dark:bg-slate-900">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm" data-aos="fade-right">
                <h3 class="font-bold text-dark dark:text-slate-100 text-lg mb-4">
                    <i data-lucide="settings" class="w-5 h-5 text-primary inline"></i>
                    Spesifikasi
                </h3>
                <div class="space-y-3">
                    @foreach(($product?->spesifikasi ?? []) as $key => $value)
                        <div class="flex justify-between text-sm border-b border-light-gray dark:border-slate-800 pb-2">
                            <span class="text-gray-500 dark:text-slate-400">{{ $key }}</span>
                            <span class="font-medium text-dark dark:text-slate-100">{{ $value }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm" data-aos="fade-left">
                <h3 class="font-bold text-dark dark:text-slate-100 text-lg mb-4">
                    <i data-lucide="info" class="w-5 h-5 text-primary inline"></i>
                    Cara Penyimpanan
                </h3>
                <p class="text-sm text-gray-500 dark:text-slate-400 leading-relaxed">{{ $product?->penyimpanan }}</p>

                <div class="mt-6 p-4 bg-primary/5 dark:bg-primary/10 rounded-lg">
                    <h4 class="font-semibold text-dark dark:text-slate-100 text-sm mb-2">Kenapa Memilih Garam Kami?</h4>
                    <ul class="space-y-2">
                        <li class="flex items-start gap-2 text-sm text-gray-600 dark:text-slate-300">
                            <i data-lucide="check" class="w-4 h-4 text-primary mt-0.5 flex-shrink-0"></i>
                            Diproduksi langsung dari tambak sendiri
                        </li>
                        <li class="flex items-start gap-2 text-sm text-gray-600 dark:text-slate-300">
                            <i data-lucide="check" class="w-4 h-4 text-primary mt-0.5 flex-shrink-0"></i>
                            Proses penjemuran alami 100%
                        </li>
                        <li class="flex items-start gap-2 text-sm text-gray-600 dark:text-slate-300">
                            <i data-lucide="check" class="w-4 h-4 text-primary mt-0.5 flex-shrink-0"></i>
                            Tanpa bahan kimia berbahaya
                        </li>
                        <li class="flex items-start gap-2 text-sm text-gray-600 dark:text-slate-300">
                            <i data-lucide="check" class="w-4 h-4 text-primary mt-0.5 flex-shrink-0"></i>
                            Kaya mineral alami dari laut Jepara
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding" x-data="{ faqOpen: null }">
    <div class="container-custom max-w-3xl">
        <x-section-heading title="Pertanyaan Umum" subtitle="FAQ" />
        @php
            $faqs = [
                ['q' => 'Apakah garam ini aman untuk konsumsi sehari-hari?', 'a' => 'Ya, Garam Meja Jepara Premium aman dikonsumsi sehari-hari. Diproses higienis tanpa bahan pengawet dan pewarna buatan.'],
                ['q' => 'Berapa lama umur simpan garam ini?', 'a' => 'Garam memiliki umur simpan 24 bulan dalam kemasan tertutup. Setelah dibuka, segera tutup rapat dan gunakan dalam 6 bulan.'],
                ['q' => 'Apakah bisa pesan dalam jumlah besar?', 'a' => 'Tentu, kami melayani pemesanan partai besar untuk kebutuhan industri dan distribusi. Hubungi kami via WhatsApp.'],
                ['q' => 'Bagaimana cara pemesanan?', 'a' => 'Cukup klik tombol "Pesan via WhatsApp" dan kirim pesan. Tim kami akan merespon secepatnya untuk proses pemesanan.'],
            ];
        @endphp

        <div class="space-y-4">
            @foreach($faqs as $index => $faq)
                <div class="bg-white dark:bg-slate-900 border border-light-gray dark:border-slate-800 rounded-xl overflow-hidden" data-aos="fade-up">
                    <button @click="faqOpen === {{ $index }} ? faqOpen = null : faqOpen = {{ $index }}"
                        class="w-full flex items-center justify-between p-5 text-left">
                        <span class="font-medium text-dark dark:text-slate-100 text-sm pr-4">{{ $faq['q'] }}</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 text-gray-400 dark:text-slate-500 flex-shrink-0 transition-transform duration-300"
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
