<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function edit()
    {
        $product = Product::first();

        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'berat' => 'required|string|max:255',
            'spesifikasi' => 'nullable|array',
            'manfaat' => 'nullable|string',
            'keunggulan' => 'nullable|string',
            'penyimpanan' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
            'whatsapp' => 'required|string|max:255',
        ]);

        $validated['manfaat'] = array_filter(array_map('trim', explode("\n", $request->input('manfaat', ''))));
        $validated['keunggulan'] = array_filter(array_map('trim', explode("\n", $request->input('keunggulan', ''))));

        $product = Product::first();

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('admin.product.edit')->with('success', 'Produk berhasil diperbarui.');
    }
}
