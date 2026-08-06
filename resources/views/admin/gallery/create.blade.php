@extends('admin.layouts.app')

@section('title', 'Tambah Galeri')

@section('content')
<div class="flex items-center justify-between mb-8">
    <h1 class="text-2xl font-bold text-[var(--text)]">Tambah Foto Galeri</h1>
    <a href="{{ route('admin.galeri.index') }}" class="text-sm text-[var(--text-secondary)] hover:text-[var(--text)]">← Kembali</a>
</div>

<form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="bg-[var(--surface)] p-6 lg:p-8 rounded-xl shadow-sm border border-[var(--border)] max-w-xl">
    @csrf

    <div class="space-y-5">
        <div>
            <label class="block text-sm font-medium text-[var(--text)] mb-1.5">Judul</label>
            <input type="text" name="judul" value="{{ old('judul') }}" required
                class="w-full px-4 py-3 border border-[var(--border)] rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm">
            @error('judul') <p class="text-[var(--danger)] text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-[var(--text)] mb-1.5">Kategori</label>
            <select name="kategori" required
                class="w-full px-4 py-3 border border-[var(--border)] rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm">
                <option value="">Pilih kategori</option>
                @foreach(['Tambak', 'Panen', 'Penjemuran', 'Pengemasan', 'Gudang', 'Pengiriman'] as $cat)
                    <option value="{{ $cat }}" {{ old('kategori') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
            @error('kategori') <p class="text-[var(--danger)] text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-[var(--text)] mb-1.5">Gambar</label>
            <input type="file" name="gambar" accept="image/*" required
                class="w-full px-4 py-3 border border-[var(--border)] rounded-xl text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[var(--primary-soft)] file:text-[var(--primary)] file:font-medium file:text-sm">
            @error('gambar') <p class="text-[var(--danger)] text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="mt-6">
        <button type="submit" class="btn-primary">Simpan</button>
    </div>
</form>
@endsection