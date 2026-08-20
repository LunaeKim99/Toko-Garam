<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();

        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|max:2048',
            'kategori' => 'required|string|max:255',
        ]);

        $validated['gambar'] = $request->file('gambar')->store('galleries', 'public');

        Gallery::create($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|max:2048',
            'kategori' => 'required|string|max:255',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('galleries', 'public');
        }

        $gallery->update($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Galeri berhasil dihapus.');
    }
}
