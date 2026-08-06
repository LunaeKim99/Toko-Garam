@extends('admin.layouts.app')

@section('title', 'Edit Profil Perusahaan')

@section('content')
<div class="flex items-center justify-between mb-8">
    <h1 class="text-2xl font-bold text-dark">Edit Profil Perusahaan</h1>
    <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-500 hover:text-primary dark:text-slate-400">← Kembali</a>
</div>

<form action="{{ route('admin.company-profile.update') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 lg:p-8 rounded-xl shadow-sm border border-gray-200 dark:bg-slate-800 dark:border-slate-700 max-w-3xl">
    @csrf
    @method('PUT')

    <div class="space-y-5">
        <div>
            <label class="block text-sm font-medium text-dark dark:text-slate-100 mb-1.5">Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" value="{{ old('nama_perusahaan', $company?->nama_perusahaan) }}" required
                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm dark:border-slate-600 dark:bg-slate-700 dark:text-slate-100">
            @error('nama_perusahaan') <p class="text-red-500 text-xs mt-1 dark:text-red-400">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-dark dark:text-slate-100 mb-1.5">Tentang Perusahaan</label>
            <textarea name="tentang" rows="5" required
                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm dark:border-slate-600 dark:bg-slate-700 dark:text-slate-100 resize-none">{{ old('tentang', $company?->tentang) }}</textarea>
            @error('tentang') <p class="text-red-500 text-xs mt-1 dark:text-red-400">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-dark dark:text-slate-100 mb-1.5">Visi</label>
            <textarea name="visi" rows="3" required
                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm dark:border-slate-600 dark:bg-slate-700 dark:text-slate-100 resize-none">{{ old('visi', $company?->visi) }}</textarea>
            @error('visi') <p class="text-red-500 text-xs mt-1 dark:text-red-400">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-dark dark:text-slate-100 mb-1.5">Misi (satu baris per misi)</label>
            <textarea name="misi" rows="5" required
                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm dark:border-slate-600 dark:bg-slate-700 dark:text-slate-100 resize-none">{{ old('misi', $company?->misi) }}</textarea>
            @error('misi') <p class="text-red-500 text-xs mt-1 dark:text-red-400">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-dark dark:text-slate-100 mb-1.5">Alamat</label>
            <textarea name="alamat" rows="2" required
                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm dark:border-slate-600 dark:bg-slate-700 dark:text-slate-100 resize-none">{{ old('alamat', $company?->alamat) }}</textarea>
            @error('alamat') <p class="text-red-500 text-xs mt-1 dark:text-red-400">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-dark dark:text-slate-100 mb-1.5">Telepon</label>
                <input type="text" name="telepon" value="{{ old('telepon', $company?->telepon) }}" required
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm dark:border-slate-600 dark:bg-slate-700 dark:text-slate-100">
                @error('telepon') <p class="text-red-500 text-xs mt-1 dark:text-red-400">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-dark dark:text-slate-100 mb-1.5">Email</label>
                <input type="email" name="email" value="{{ old('email', $company?->email) }}" required
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm dark:border-slate-600 dark:bg-slate-700 dark:text-slate-100">
                @error('email') <p class="text-red-500 text-xs mt-1 dark:text-red-400">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-dark dark:text-slate-100 mb-1.5">Logo (opsional)</label>
            <input type="file" name="logo" accept="image/*"
                class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-primary/10 file:text-primary file:font-medium file:text-sm dark:border-slate-600 dark:bg-slate-700 dark:text-slate-100 dark:file:text-primary-light">
            @error('logo') <p class="text-red-500 text-xs mt-1 dark:text-red-400">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-dark dark:text-slate-100 mb-1.5">Google Maps Latitude</label>
                <input type="text" step="any" name="maps_lat" value="{{ old('maps_lat', $company?->maps_lat) }}"
                    placeholder="contoh: -6.666499428336486"
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm dark:border-slate-600 dark:bg-slate-700 dark:text-slate-100">
                @error('maps_lat') <p class="text-red-500 text-xs mt-1 dark:text-red-400">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-dark dark:text-slate-100 mb-1.5">Google Maps Longitude</label>
                <input type="text" step="any" name="maps_lng" value="{{ old('maps_lng', $company?->maps_lng) }}"
                    placeholder="contoh: 110.64402441302167"
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm dark:border-slate-600 dark:bg-slate-700 dark:text-slate-100">
                @error('maps_lng') <p class="text-red-500 text-xs mt-1 dark:text-red-400">{{ $message }}</p> @enderror
            </div>
        </div>
    </div>

    <div class="mt-6">
        <button type="submit" class="btn-primary">Simpan Perubahan</button>
    </div>
</form>
@endsection