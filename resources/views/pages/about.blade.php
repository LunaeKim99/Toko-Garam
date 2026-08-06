@extends('layouts.app')

@section('meta_title', 'Tentang Kami — Garam Nusantara Jepara')
@section('meta_description', 'Kenali lebih dekat Garam Nusantara, produsen garam premium dari Jepara.')

@section('content')
<section class="relative py-24 bg-gradient-to-br from-dark to-primary/80 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1920" class="w-full h-full object-cover" alt="">
    </div>
    <div class="relative container-custom text-center">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-3">Tentang Kami</h1>
        <div class="flex items-center justify-center gap-2 text-sm text-white/70">
            <a href="{{ route('home') }}" class="hover:text-white">Home</a>
            <span>/</span>
            <span>Tentang Kami</span>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
            <div data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800" alt="Tambak Garam Jepara" class="rounded-xl shadow-lg w-full h-80 object-cover">
            </div>
            <div data-aos="fade-left">
                <p class="text-primary font-medium text-sm uppercase tracking-wider mb-2">Profil Perusahaan</p>
                <h2 class="text-2xl sm:text-3xl font-bold text-dark mb-4">{{ $company->nama_perusahaan }}</h2>
                <p class="text-gray-500 leading-relaxed mb-4">{{ $company->tentang }}</p>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-light">
    <div class="container-custom">
        <x-section-heading title="Visi & Misi" />
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
            <div class="bg-primary rounded-xl p-8 text-white" data-aos="fade-right">
                <h3 class="text-xl font-bold mb-4">Visi</h3>
                <p class="text-white/90 leading-relaxed">{{ $company->visi }}</p>
            </div>
            <div class="bg-white border border-light-gray rounded-xl p-8" data-aos="fade-left">
                <h3 class="text-xl font-bold text-dark mb-4">Misi</h3>
                <div class="space-y-3 text-sm text-gray-600">
                    @foreach(explode("\n", $company->misi) as $index => $item)
                        @if(trim($item))
                            <div class="flex items-start gap-3">
                                <span class="flex-shrink-0 w-6 h-6 bg-primary/10 text-primary rounded-full flex items-center justify-center text-xs font-bold">{{ $index + 1 }}</span>
                                {{ ltrim($item, '0123456789. ') }}
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container-custom max-w-3xl text-center" data-aos="fade-up">
        <p class="text-primary font-medium text-sm uppercase tracking-wider mb-2">Sejarah</p>
        <h2 class="text-2xl sm:text-3xl font-bold text-dark mb-6">Perjalanan Kami</h2>
        <p class="text-gray-500 leading-relaxed">{{ $company->tentang }}</p>
    </div>
</section>

<section class="section-padding bg-light">
    <div class="container-custom">
        <x-section-heading title="Nilai Perusahaan" subtitle="Prinsip yang kami pegang" />
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">
            @php
                $values = [
                    ['icon' => 'shield-check', 'title' => 'Integritas', 'desc' => 'Kejujuran dalam setiap aspek bisnis.'],
                    ['icon' => 'gem', 'title' => 'Kualitas', 'desc' => 'Standar tertanam dalam setiap produk.'],
                    ['icon' => 'leaf', 'title' => 'Keberlanjutan', 'desc' => 'Produksi ramah lingkungan untuk masa depan.'],
                    ['icon' => 'users', 'title' => 'Kemitraan', 'desc' => 'Memberdayakan petani garam lokal Jepara.'],
                    ['icon' => 'heart', 'title' => 'Pelanggan', 'desc' => 'Kepuasan pelanggan adalah prioritas utama.'],
                    ['icon' => 'award', 'title' => 'Profesionalisme', 'desc' => 'Standar kerja tinggi dalam setiap proses.'],
                ];
            @endphp
            @foreach($values as $index => $value)
                <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 text-center"
                    data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <i data-lucide="{{ $value['icon'] }}" class="w-6 h-6 text-primary"></i>
                    </div>
                    <h3 class="font-semibold text-dark mb-1">{{ $value['title'] }}</h3>
                    <p class="text-sm text-gray-500">{{ $value['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container-custom">
        <x-section-heading title="Timeline Perjalanan" subtitle="Milestone penting kami" />
        <div class="relative max-w-3xl mx-auto">
            <div class="hidden sm:block absolute left-8 lg:left-1/2 top-0 bottom-0 w-0.5 bg-primary/20 -translate-x-1/2"></div>
            @php
                $timeline = [
                    ['year' => '2010', 'event' => 'Pendirian usaha garam di Jepara dengan tambak tradisional.'],
                    ['year' => '2013', 'event' => 'Ekspansi tambak dan peningkatan kapasitas produksi.'],
                    ['year' => '2016', 'event' => 'Penerapan standar higienis modern dalam proses produksi.'],
                    ['year' => '2019', 'event' => 'Peluncuran produk garam premium kemasan modern.'],
                    ['year' => '2022', 'event' => 'Mencapai distribusi ke seluruh Pulau Jawa.'],
                    ['year' => '2025', 'event' => 'Pengembangan kanal penjualan online via WhatsApp.'],
                ];
            @endphp
            @foreach($timeline as $index => $item)
                <div class="relative flex items-start gap-6 sm:gap-8 mb-8 last:mb-0"
                    data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="relative z-10 flex-shrink-0 w-16 h-16 bg-primary rounded-xl flex items-center justify-center shadow-lg shadow-primary/20">
                        <span class="text-white font-bold text-sm">{{ $item['year'] }}</span>
                    </div>
                    <div class="bg-white p-5 rounded-xl shadow-sm flex-1 border border-light-gray">
                        <p class="text-gray-600 text-sm">{{ $item['event'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section-padding bg-light">
    <div class="container-custom">
        <x-section-heading title="Galeri Tambak" subtitle="Dokumentasi aktivitas kami" />
        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4">
            @foreach($galleries->take(6) as $gallery)
                <div class="overflow-hidden rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-300 group" data-aos="fade-up">
                    <img src="{{ $gallery->gambar }}" alt="{{ $gallery->judul }}"
                        class="w-full h-40 sm:h-56 object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('gallery') }}" class="btn-primary">
                Lihat Semua Galeri
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>
    </div>
</section>

@include('partials.cta')
@endsection