<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Gallery;
use App\Models\Product;

class PageController extends Controller
{
    public function home()
    {
        $company = CompanyProfile::first();
        $product = Product::first();
        $productVariants = $this->getProductVariants($product);

        return view('pages.home', compact('company', 'product', 'productVariants'));
    }

    public function about()
    {
        $company = CompanyProfile::first();
        $galleries = Gallery::all();

        return view('pages.about', compact('company', 'galleries'));
    }

    public function product()
    {
        $product = Product::first();
        $productVariants = $this->getProductVariants($product);

        return view('pages.product', compact('product', 'productVariants'));
    }

    private function getProductVariants($product)
    {
        if (!$product) {
            return [];
        }

        return [
            [
                'id' => '200g',
                'nama' => 'Garam 200 Gram',
                'berat' => '200 g',
                'deskripsi' => 'Kemasan praktis untuk kebutuhan harian keluarga. Cocok untuk memasak sehari-hari dan konsumsi pribadi.',
                'icon' => 'package',
            ],
            [
                'id' => '500g',
                'nama' => 'Garam 500 Gram',
                'berat' => '500 g',
                'deskripsi' => 'Ukuran ideal untuk keluarga sedang hingga besar. Hemat dan efisien untuk pengambilan rutin.',
                'icon' => 'package-2',
            ],
            [
                'id' => '1kg',
                'nama' => 'Garam 1 Kilogram',
                'berat' => '1 kg',
                'deskripsi' => 'Kemasan ekonomis untuk kebutuhan rumah tangga intensif dan usaha kuliner skala kecil.',
                'icon' => 'package-plus',
            ],
            [
                'id' => '50kg',
                'nama' => 'Garam 50 Kilogram (1 Karung)',
                'berat' => '50 kg',
                'deskripsi' => 'Kemasan industri untuk distributor, pabrik, dan pembelian grosir volume besar.',
                'icon' => 'truck',
            ],
        ];
    }

    public function gallery()
    {
        $galleries = Gallery::all();
        $categories = Gallery::distinct()->pluck('kategori')->toArray();

        return view('pages.gallery', compact('galleries', 'categories'));
    }

    public function contact()
    {
        $company = CompanyProfile::first();
        $product = Product::first();

        return view('pages.contact', compact('company', 'product'));
    }
}
