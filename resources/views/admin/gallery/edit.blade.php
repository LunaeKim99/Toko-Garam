@extends('admin.layouts.app')

@section('title', 'Edit Galeri')

@section('content')
<div class="flex items-center justify-between mb-8">
    <h1 class="text-2xl font-bold text-dark">Edit Galeri</h1>
    <a href="{{ route('admin.galeri.index') }}" class="text-sm text-gray-500 hover:text-primary">← Kembali</a>
</div>

<form action="{{ route('admin.galeri.update', $gallery) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 lg:p-8 rounded-xl shadow-sm border border-gray-200 max-w-xl">
    @csrf
    @method('PUT')

    <div class="space-y-5">
        <div>
            <label class="block text-sm font-medium text-dark mb-1.5">Judul</label>
            <input type="text" name="judul" value="{{ old('judul', $gallery->judul) }}" required
                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm">
            @error('judul') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-dark mb-1.5">Kategori</label>
            <select name="kategori" required
                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm">
                @foreach(['Tambak', 'Panen', 'Penjemuran', 'Pengemasan', 'Gudang', 'Pengiriman'] as $cat)
                    <option value="{{ $cat }}" {{ old('kategori', $gallery->kategori) === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
            @error('kategori') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-dark mb-1.5">Gambar (opsional, kosongkan jika tidak diubah)</label>
            @if($gallery->gambar)
                <img src="{{ $gallery->gambar }}" alt="" class="w-32 h-32 object-cover rounded-lg mb-3">
            @endif
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