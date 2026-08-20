@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('subtitle', 'Kelola website Garam Nusantara Jepara')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-[var(--text)] mb-2">Dashboard Admin</h1>
    <p class="text-[var(--text-secondary)]">Kelola website {{ config('app.name', 'AJ Brand') }} — produk, profil, dan galeri.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-[var(--surface)] p-6 rounded-xl shadow-sm-aj border border-[var(--border)]">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center">
                <i data-lucide="package" class="w-6 h-6 text-primary"></i>
            </div>
            <span class="text-xs font-medium text-[var(--text-muted)] bg-[var(--primary-soft)] px-2 py-1 rounded-lg">Produk</span>
        </div>
        @if($product)
            <h3 class="font-semibold text-[var(--text)] mb-1">{{ $product->nama }}</h3>
            <p class="text-sm text-[var(--text-secondary)] mb-1">Berat: {{ $product->berat }}</p>
            <p class="text-sm text-[var(--text-secondary)]">Status: <span class="text-[var(--success)] font-medium">Aktif</span></p>
        @else
            <p class="text-sm text-[var(--text-muted)]">Belum ada produk.</p>
        @endif
        <a href="{{ route('admin.product.edit') }}"
           class="mt-4 inline-flex items-center justify-center gap-2 w-full btn-primary text-sm">
           Edit Produk
        </a>
    </div>

    <div class="bg-[var(--surface)] p-6 rounded-xl shadow-sm-aj border border-[var(--border)]">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center">
                <i data-lucide="building" class="w-6 h-6 text-primary"></i>
            </div>
            <span class="text-xs font-medium text-[var(--text-muted)] bg-[var(--primary-soft)] px-2 py-1 rounded-lg">Perusahaan</span>
        </div>
        @if($company)
            <h3 class="font-semibold text-[var(--text)] mb-1">{{ $company->nama_perusahaan }}</h3>
            <p class="text-sm text-[var(--text-secondary)] mb-1 line-clamp-1">{{ $company->alamat }}</p>
            <p class="text-sm text-[var(--text-secondary)]">{{ $company->telepon }}</p>
        @else
            <p class="text-sm text-[var(--text-muted)]">Belum ada profil perusahaan.</p>
        @endif
        <a href="{{ route('admin.company-profile.edit') }}"
           class="mt-4 inline-flex items-center justify-center gap-2 w-full btn-primary text-sm">
           Edit Profil
        </a>
    </div>

    <div class="bg-[var(--surface)] p-6 rounded-xl shadow-sm-aj border border-[var(--border)]">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center">
                <i data-lucide="image" class="w-6 h-6 text-primary"></i>
            </div>
            <span class="text-xs font-medium text-[var(--text-muted)] bg-[var(--primary-soft)] px-2 py-1 rounded-lg">Galeri</span>
        </div>
        <h3 class="font-semibold text-[var(--text)] mb-1">{{ number_format($galleryCount) }} Foto</h3>
        @if($galleryCategories)
            <p class="text-sm text-[var(--text-secondary)] mb-1">Kategori: {{ $galleryCategories }}</p>
        @else
            <p class="text-sm text-[var(--text-muted)] mb-1">Belum ada kategori.</p>
        @endif
        <a href="{{ route('admin.galeri.index') }}"
           class="mt-4 inline-flex items-center justify-center gap-2 w-full btn-primary text-sm">
           Kelola Galeri
        </a>
    </div>
</div>

<div class="bg-[var(--surface)] p-6 rounded-xl shadow-sm-aj border border-[var(--border)] mb-10">
    <h2 class="text-lg font-semibold text-[var(--text)] mb-4">Informasi Website</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-3">
        <div class="flex items-center gap-3">
            <i data-lucide="database" class="w-4 h-4 text-[var(--text-muted)]"></i>
            <span class="text-sm text-[var(--text-secondary)]">Database</span>
            <span class="text-sm font-medium text-[var(--text)]">SQLite</span>
        </div>
        <div class="flex items-center gap-3">
            <i data-lucide="map-pin" class="w-4 h-4 text-[var(--text-muted)]"></i>
            <span class="text-sm text-[var(--text-secondary)]">Lokasi</span>
            <span class="text-sm font-medium text-[var(--text)]">Jepara, Jawa Tengah</span>
        </div>
        <div class="flex items-center gap-3">
            <i data-lucide="shopping-basket" class="w-4 h-4 text-[var(--text-muted)]"></i>
            <span class="text-sm text-[var(--text-secondary)]">Produk</span>
            <span class="text-sm font-medium text-[var(--text)]">1 Produk Utama</span>
        </div>
        <div class="flex items-center gap-3">
            <i data-lucide="globe" class="w-4 h-4 text-[var(--text-muted)]"></i>
            <span class="text-sm text-[var(--text-secondary)]">Website</span>
            <span class="text-sm font-medium text-[var(--text)]">Company Profile</span>
        </div>
    </div>
</div>

<div class="bg-[var(--surface)] p-6 rounded-xl shadow-sm-aj border border-[var(--border)]">
    <h2 class="text-lg font-semibold text-[var(--text)] mb-4">Aktivitas Terakhir</h2>
    @if(empty($activities))
        <p class="text-sm text-[var(--text-muted)]">Belum ada aktivitas.</p>
    @else
        @foreach($activities as $activity)
            <div class="flex items-center gap-4 py-3 border-b border-[var(--border)] last:border-0 last:pb-0">
                <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                    <i data-lucide="{{ $activity['icon'] }}" class="w-4 h-4 text-primary"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-[var(--text)]">{{ $activity['label'] }}</p>
                </div>
                <div class="text-xs text-[var(--text-secondary)] flex-shrink-0">{{ $activity['time'] }}</div>
            </div>
        @endforeach
    @endif
</div>
@endsection