@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-2xl font-bold text-dark mb-8">Dashboard Admin</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <a href="{{ route('admin.company-profile.edit') }}" class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-all duration-300">
        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-4">
            <i data-lucide="building" class="w-6 h-6 text-primary"></i>
        </div>
        <h3 class="font-semibold text-dark mb-1">Profil Perusahaan</h3>
        <p class="text-sm text-gray-500">Edit informasi perusahaan, visi, misi</p>
    </a>

    <a href="{{ route('admin.product.edit') }}" class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-all duration-300">
        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-4">
            <i data-lucide="package" class="w-6 h-6 text-primary"></i>
        </div>
        <h3 class="font-semibold text-dark mb-1">Produk</h3>
        <p class="text-sm text-gray-500">Edit detail produk, spesifikasi, manfaat</p>
    </a>

    <a href="{{ route('admin.galeri.index') }}" class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-all duration-300">
        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-4">
            <i data-lucide="image" class="w-6 h-6 text-primary"></i>
        </div>
        <h3 class="font-semibold text-dark mb-1">Galeri</h3>
        <p class="text-sm text-gray-500">Kelola foto galeri tambak dan produksi</p>
    </a>
</div>
@endsection