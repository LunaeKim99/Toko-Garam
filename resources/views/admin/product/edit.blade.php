@extends('admin.layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="flex items-center justify-between mb-8">
    <h1 class="text-2xl font-bold text-dark">Edit Produk</h1>
    <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-500 hover:text-primary">← Kembali</a>
</div>

<form action="{{ route('admin.product.update') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 lg:p-8 rounded-xl shadow-sm border border-gray-200 max-w-3xl">
    @csrf
    @method('PUT')

    <div class="space-y-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-dark mb-1.5">Nama Produk</label>
                <input type="text" name="nama" value="{{ old('nama', $product->nama) }}" required
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm">
                @error('nama') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-dark mb-1.5">Berat</label>
                <input type="text" name="berat" value="{{ old('berat', $product->berat) }}" required placeholder="contoh: 1 kg"
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm">
                @error('berat') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-dark mb-1.5">Deskripsi</label>
            <textarea name="deskripsi" rows="4" required
                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm resize-none">{{ old('deskripsi', $product->deskripsi) }}</textarea>
            @error('deskripsi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-dark mb-1.5">Keunggulan (satu baris per item)</label>
            <textarea name="keunggulan" rows="4"
                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm resize-none">{{ old('keunggulan', is_array($product->keunggulan) ? implode("\n", $product->keunggulan) : '') }}</textarea>
            <p class="text-xs text-gray-400 mt-1">Pisahkan setiap keunggulan dengan enter (satu baris per item)</p>
            @error('keunggulan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-dark mb-1.5">Manfaat (satu baris per item)</label>
            <textarea name="manfaat" rows="4"
                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm resize-none">{{ old('manfaat', is_array($product->manfaat) ? implode("\n", $product->manfaat) : '') }}</textarea>
            <p class="text-xs text-gray-400 mt-1">Pisahkan setiap manfaat dengan enter (satu baris per item)</p>
            @error('manfaat') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-dark mb-1.5">Cara Penyimpanan</label>
            <textarea name="penyimpanan" rows="3" required
                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm resize-none">{{ old('penyimpanan', $product->penyimpanan) }}</textarea>
            @error('penyimpanan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-dark mb-1.5">Nomor WhatsApp (tanpa +)</label>
            <input type="text" name="whatsapp" value="{{ old('whatsapp', $product->whatsapp) }}" required placeholder="contoh: 6281234567890"
                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm">
            @error('whatsapp') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-dark mb-1.5">Gambar Produk (opsional)</label>
            <input type="file" name="gambar" accept="image/*"
                class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-primary/10 file:text-primary file:font-medium file:text-sm">
            @error('gambar') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="mt-6">
        <button type="submit" class="btn-primary">Simpan Perubahan</button>
    </div>
</form>
@endsection