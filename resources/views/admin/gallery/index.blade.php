@extends('admin.layouts.app')

@section('title', 'Galeri')

@section('content')
<div class="flex items-center justify-between mb-8">
    <h1 class="text-2xl font-bold text-[var(--text)]">Galeri</h1>
    <a href="{{ route('admin.galeri.create') }}" class="btn-primary text-sm">
        <i data-lucide="plus" class="w-4 h-4"></i>
        Tambah Foto
    </a>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
    @forelse($galleries as $gallery)
        <div class="bg-[var(--surface)] rounded-xl shadow-sm border border-[var(--border)] overflow-hidden">
            <img src="{{ $gallery->gambar }}" alt="{{ $gallery->judul }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <span class="text-xs font-medium text-primary bg-[var(--primary-soft)] px-2 py-1 rounded-lg">{{ $gallery->kategori }}</span>
                <h3 class="font-semibold text-[var(--text)] text-sm mt-2">{{ $gallery->judul }}</h3>
                <div class="flex gap-2 mt-3">
                    <a href="{{ route('admin.galeri.edit', $gallery) }}" class="text-xs text-primary hover:underline">Edit</a>
                    <form action="{{ route('admin.galeri.destroy', $gallery) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xs text-[var(--danger)] hover:underline">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-12 text-[var(--text-muted)]">
            Belum ada foto di galeri.
        </div>
    @endforelse
</div>
@endsection