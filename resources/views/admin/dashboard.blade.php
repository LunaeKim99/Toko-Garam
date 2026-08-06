@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('subtitle', 'Kelola website Garam Nusantara')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-dark mb-2">Dashboard Admin</h1>
    <p class="text-gray-500">Kelola website Garam Nusantara — produk, profil, dan galeri.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center">
                <i data-lucide="package" class="w-6 h-6 text-primary"></i>
            </div>
            <span class="text-xs font-medium text-gray-500 bg-gray-100 px-2 py-1 rounded-lg">Produk</span>
        </div>
        @if($product)
            <h3 class="font-semibold text-dark mb-1">{{ $product->nama }}</h3>
            <p class="text-sm text-gray-500 mb-1">Berat: {{ $product->berat }}</p>
            <p class="text-sm text-gray-500">Status: <span class="text-green-600 font-medium">Aktif</span></p>
        @else
            <p class="text-sm text-gray-400">Belum ada produk.</p>
        @endif
        <a href="{{ route('admin.product.edit') }}"
           class="mt-4 inline-flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-primary text-white text-sm font-medium rounded-xl hover:bg-primary-dark transition-all">
            Edit Produk
        </a>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center">
                <i data-lucide="building" class="w-6 h-6 text-primary"></i>
            </div>
            <span class="text-xs font-medium text-gray-500 bg-gray-100 px-2 py-1 rounded-lg">Perusahaan</span>
        </div>
        @if($company)
            <h3 class="font-semibold text-dark mb-1">{{ $company->nama_perusahaan }}</h3>
            <p class="text-sm text-gray-500 mb-1 line-clamp-1">{{ $company->alamat }}</p>
            <p class="text-sm text-gray-500">{{ $company->telepon }}</p>
        @else
            <p class="text-sm text-gray-400">Belum ada profil perusahaan.</p>
        @endif
        <a href="{{ route('admin.company-profile.edit') }}"
           class="mt-4 inline-flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-primary text-white text-sm font-medium rounded-xl hover:bg-primary-dark transition-all">
            Edit Profil
        </a>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center">
                <i data-lucide="image" class="w-6 h-6 text-primary"></i>
            </div>
            <span class="text-xs font-medium text-gray-500 bg-gray-100 px-2 py-1 rounded-lg">Galeri</span>
        </div>
        <h3 class="font-semibold text-dark mb-1">{{ number_format($galleryCount) }} Foto</h3>
        @if($galleryCategories)
            <p class="text-sm text-gray-500 mb-1">Kategori: {{ $galleryCategories }}</p>
        @else
            <p class="text-sm text-gray-400 mb-1">Belum ada kategori.</p>
        @endif
        <a href="{{ route('admin.galeri.index') }}"
           class="mt-4 inline-flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-primary text-white text-sm font-medium rounded-xl hover:bg-primary-dark transition-all">
            Kelola Galeri
        </a>
    </div>
</div>

<div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 mb-10">
    <h2 class="text-lg font-semibold text-dark mb-4">Informasi Website</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-3">
        <div class="flex items-center gap-3">
            <i data-lucide="database" class="w-4 h-4 text-gray-400"></i>
            <span class="text-sm text-gray-500">Database</span>
            <span class="text-sm font-medium text-dark">SQLite</span>
        </div>
        <div class="flex items-center gap-3">
            <i data-lucide="map-pin" class="w-4 h-4 text-gray-400"></i>
            <span class="text-sm text-gray-500">Lokasi</span>
            <span class="text-sm font-medium text-dark">Jepara, Jawa Tengah</span>
        </div>
        <div class="flex items-center gap-3">
            <i data-lucide="shopping-basket" class="w-4 h-4 text-gray-400"></i>
            <span class="text-sm text-gray-500">Produk</span>
            <span class="text-sm font-medium text-dark">1 Produk Utama</span>
        </div>
        <div class="flex items-center gap-3">
            <i data-lucide="globe" class="w-4 h-4 text-gray-400"></i>
            <span class="text-sm text-gray-500">Website</span>
            <span class="text-sm font-medium text-dark">Company Profile</span>
        </div>
    </div>
</div>

<div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
    <h2 class="text-lg font-semibold text-dark mb-4">Aktivitas Terakhir</h2>
    @if(empty($activities))
        <p class="text-sm text-gray-400">Belum ada aktivitas.</p>
    @else
        @foreach($activities as $activity)
            <div class="flex items-center gap-4 py-3 border-b border-gray-100 last:border-0 last:pb-0">
                <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                    <i data-lucide="{{ $activity['icon'] }}" class="w-4 h-4 text-primary"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-dark">{{ $activity['label'] }}</p>
                </div>
                <div class="text-xs text-gray-500 flex-shrink-0">{{ $activity['time'] }}</div>
            </div>
        @endforeach
    @endif
</div>
@endsection