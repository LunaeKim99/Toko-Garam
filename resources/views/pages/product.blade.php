@extends('layouts.app')

@section('meta_title', 'Produk Kami — Garam Nusantara Jepara')
@section('meta_description', 'Katalog lengkap garam Nusantara Jepara dalam berbagai kemasan: 200g, 500g, 1kg, dan 50kg (1 karung) untuk kebutuhan rumah tangga hingga industri.')

@section('content')
@php
    $waNumber = $product?->whatsapp ?? '6281234567890';
@endphp
<section class="relative py-24 bg-gradient-to-br from-[var(--text)] to-[var(--primary)]/80 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.pexels.com/photos/27098281/pexels-photo-27098281.jpeg" class="w-full h-full object-cover" alt="Garam Kristal">
    </div>
    <div class="absolute inset-0 bg-[var(--text)]/50"></div>
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

        <p class="text-center text-[var(--text-secondary)] max-w-2xl mx-auto mb-12 transition-colors duration-300">
            Garam premium kami tersedia dalam berbagai ukuran kemasan untuk memenuhi kebutuhan rumah tangga, usaha kuliner, hingga industri besar.
        </p>

        <div x-data="{ modalOpen: false, active: null, message: '' }"
             x-init="$watch('active', value => { message = value?.message || ''; })"
             @keydown.escape.window="modalOpen = false">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
            @forelse($productVariants as $index => $variant)
                <div id="{{ $variant['id'] }}" class="group bg-[var(--surface)] dark:bg-[var(--surface)] rounded-xl shadow-sm-aj hover:shadow-xl-aj transition-all duration-300 border border-[var(--border)] overflow-hidden cursor-pointer"
                    data-aos="fade-up" data-aos-delay="{{ $index * 100 }}"
                    data-variant="{{ json_encode($variant) }}"
                    @click="modalOpen = true; active = JSON.parse($el.dataset.variant)">
                    <div class="aspect-[4/3] overflow-hidden">
                        @if($variant['image'])
                            <img src="{{ $variant['image'] }}" alt="{{ $variant['nama'] }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @elseif($product && $product->gambar)
                            <img src="{{ $product->gambar }}" alt="{{ $variant['nama'] }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-[var(--text-muted)]">
                                <i data-lucide="image" class="w-16 h-16"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-6 flex flex-col">
                        <span class="text-primary font-medium text-sm mb-2 transition-colors duration-300">{{ $variant['berat'] }}</span>
                        <h2 class="text-xl font-bold text-[var(--text)] mb-3 transition-colors duration-300 group-hover:text-primary">{{ $variant['nama'] }}</h2>
                        <p class="text-sm text-[var(--text-secondary)] leading-relaxed mb-5 flex-1 transition-colors duration-300">{{ $variant['deskripsi'] }}</p>
                        <div class="btn-primary w-full text-center !flex items-center justify-center gap-2 cursor-pointer" @click.stop>
                            <i data-lucide="eye" class="w-4 h-4"></i>
                            Detail Produk
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-[var(--text-secondary)]">Produk belum tersedia.</p>
                </div>
            @endforelse
        </div>

        <!-- Floating Window Modal -->
        <div x-show="modalOpen" x-cloak x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">
            <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" @click="modalOpen = false"></div>
            <div class="relative bg-[var(--surface)] rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden flex flex-col"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 @click.away="modalOpen = false">

                <button @click="modalOpen = false" class="absolute top-3 right-3 z-10 w-8 h-8 bg-[var(--surface)] rounded-full shadow flex items-center justify-center text-[var(--text-muted)] hover:text-[var(--text)] transition-colors">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>

                <div class="flex flex-col lg:flex-row overflow-y-auto">
                    <div class="lg:w-1/2 aspect-[4/3] lg:aspect-auto lg:min-h-[520px] relative shrink-0">
                        <template x-if="active && active.image">
                            <img :src="active.image" :alt="active.nama" class="absolute inset-0 w-full h-full object-cover" />
                        </template>
                        <template x-if="active && !active.image">
                            <div class="absolute inset-0 w-full h-full flex flex-col items-center justify-center gap-2 bg-[var(--background)] text-[var(--text-muted)]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M4 6h16M4 6v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2z"/>
                                </svg>
                                <span class="text-sm" x-text="'Gambar ' + active?.nama + ' segera hadir'"></span>
                            </div>
                        </template>
                    </div>

                    <div class="lg:w-1/2 p-6 lg:p-8 flex flex-col gap-5">
                        <div class="flex-1 overflow-y-auto pr-1 space-y-4">
                            <div>
                                <span class="text-primary font-medium text-sm" x-text="active?.berat"></span>
                                <h3 class="text-2xl lg:text-3xl font-bold text-[var(--text)] mt-1" x-text="active?.nama"></h3>
                            </div>

                            <p class="text-[var(--text-secondary)] leading-relaxed text-sm" x-text="active?.deskripsi"></p>

                            <div class="space-y-3">
                                <h4 class="text-sm font-semibold text-[var(--text)]">Detail Produk</h4>
                                <p class="text-[var(--text-secondary)] text-sm leading-relaxed" x-text="active?.detail"></p>
                            </div>
                        </div>

                        <div class="space-y-3 pt-4 border-t border-[var(--border)] shrink-0">
                            <h4 class="text-sm font-semibold text-[var(--text)]">Tulis Pesan ke WhatsApp</h4>
                            <textarea x-model="message" rows="4"
                                :placeholder="'Pesan untuk ' + (active?.nama || 'produk')"
                                class="w-full px-4 py-3 rounded-xl border border-[var(--border)] bg-[var(--background)] text-[var(--text)] text-sm leading-relaxed focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary resize-none transition-colors duration-300"></textarea>
                            <a :href="'https://wa.me/{{ $waNumber }}?text=' + encodeURIComponent(message || (active?.message || ''))"
                               target="_blank"
                               rel="noopener"
                               class="btn-whatsapp w-full flex items-center justify-center gap-2 cursor-pointer">
                                <i data-lucide="send" class="w-4 h-4"></i>
                                Kirim Pesan ke WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-surface dark:bg-[var(--surface)] transition-colors duration-300">
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
                <div class="bg-[var(--surface)] p-6 rounded-xl shadow-sm-aj hover:shadow-md-aj transition-all duration-300 text-center border border-[var(--border)]"
                    data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="{{ $item['icon'] }}" class="w-7 h-7 text-primary"></i>
                    </div>
                    <h3 class="font-semibold text-[var(--text)] mb-2 transition-colors duration-300">{{ $item['title'] }}</h3>
                    <p class="text-sm text-[var(--text-secondary)] leading-relaxed transition-colors duration-300">{{ $item['desc'] }}</p>
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
                <div class="bg-[var(--surface)] border border-[var(--border)] rounded-xl overflow-hidden" data-aos="fade-up">
                    <button @click="faqOpen === {{ $index }} ? faqOpen = null : faqOpen = {{ $index }}"
                        class="w-full flex items-center justify-between p-5 text-left">
                        <span class="font-medium text-[var(--text)] text-sm pr-4">{{ $faq['q'] }}</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 text-[var(--text-muted)] shrink-0 transition-transform duration-300"
                            :class="faqOpen === {{ $index }} ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="faqOpen === {{ $index }}" x-cloak x-collapse class="px-5 pb-5">
                        <p class="text-sm text-[var(--text-secondary)] leading-relaxed">{{ $faq['a'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('partials.cta')
@endsection