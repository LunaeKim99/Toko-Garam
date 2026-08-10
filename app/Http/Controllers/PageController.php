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

        $dir = public_path('images/producs');
        $variants = [
            [
                'id' => '200g',
                'nama' => 'Garam 200 Gram',
                'berat' => '200 g',
                'deskripsi' => 'Kemasan praktis untuk kebutuhan harian keluarga. Cocok untuk memasak sehari-hari dan konsumsi pribadi.',
                'detail' => 'Garam 200 Gram adalah kemasan terkecil yang ideal untuk keluarga kecil hingga menengah. Dikemas dalam botol/bungkus kedap udara yang memudahkan penyimpanan dan penggunaan sehari-hari. Kristal garam halus dan konsisten, cepat larut saat dimasak, menghasilkan rasa gurih alami tanpa perlu tambahan penyedap buatan. Cocok untuk memasak nasi, sup, tumisan, saus, dan berbagai kebutuhan dapur harian. Proses produksi tradisional menjamin kandungan mineral alami seperti magnesium, kalsium, dan kalium yang baik untuk tubuh.',
                'message' => 'Halo, saya ingin memesan Garam 200 Gram. Mohon informasi harga dan ketersediaannya.',
                'icon' => 'package',
            ],
            [
                'id' => '500g',
                'nama' => 'Garam 500 Gram',
                'berat' => '500 g',
                'deskripsi' => 'Ukuran ideal untuk keluarga sedang hingga besar. Hemat dan efisien untuk pengambilan rutin.',
                'detail' => 'Garam 500 Gram adalah ukuran paling populer untuk keluarga Indonesia. Kapasitas yang pas untuk 2-4 minggu penggunaan rutin keluarga 4-5 orang. Kemasan plastik standar berat dengan tutup rapat menjaga kesegaran dan mencegah garam menyerap kelembaban. Kristal garam premium dari air laut Jepara diproses tanpa bahan pengawet, pewarna, atau penganti kimia. Rasa asin alami yang seimbang memperkaya cita rasa masakan tradisional hingga modern. Harga per gram lebih hemat dibanding kemasan kecil.',
                'message' => 'Halo, saya ingin memesan Garam 500 Gram. Mohon informasi harga dan ketersediaannya.',
                'icon' => 'package-2',
            ],
            [
                'id' => '1kg',
                'nama' => 'Garam 1 Kilogram',
                'berat' => '1 kg',
                'deskripsi' => 'Kemasan ekonomis untuk kebutuhan rumah tangga intensif dan usaha kuliner skala kecil.',
                'detail' => 'Garam 1 Kilogram dirancang untuk rumah tangga besar, kos-kosan, maupun usaha kuliner skala kecil (warung makan, catering rumahan, bakso, mie ayam). Kemasan plastik tebal dengan seal kemasan pabrik menjamin kebersihan hingga ke tangan pembeli. Kandungan NaCl tinggi (>99%) dengan mineral alami utuh membuat garam ini efisien — hanya butuh sedikit untuk memberikan rasa asin pas. Cocok juga untuk pengawetan makanan tradisional (asin ikan, dendeng, jeruk). Pilihan hemat untuk volume menengah.',
                'message' => 'Halo, saya ingin memesan Garam 1 Kilogram. Mohon informasi harga dan ketersediaannya.',
                'icon' => 'package-plus',
            ],
            [
                'id' => '50kg',
                'nama' => 'Garam 50 Kilogram (1 Karung)',
                'berat' => '50 kg',
                'deskripsi' => 'Kemasan industri untuk distributor, pabrik, dan pembelian grosir volume besar.',
                'detail' => 'Garam 50 Kilogram (1 Karung) adalah standar industri untuk distributor, pabrik makanan, industri pengolahan ikan/ternak, dan grosir besar. Karung polipropilene woven yang kuat, tahan robek, dan dilapis dalam plastik PE untuk proteksi ganda terhadap kelembaban dan kontaminan. Setiap karung dikemas dengan standar pabrik: berat bersih 50kg, label identitas produk, nomor batch untuk traceability. Harga grosir khusus tersedia untuk partai ≥50 karung. Pengiriman bisa diantar ke gudang/pabrik di seluruh Jawa (surat jalan resmi). Cocok untuk industri: pakan ternak, pengolahan ikan asin, saus, bumbu instan, dll.',
                'message' => 'Halo, saya ingin memesan Garam 50 Kilogram (1 Karung) untuk kebutuhan industri/grosir. Mohon informasi harga grosir, minimum order, dan jadwal pengiriman.',
                'icon' => 'truck',
            ],
        ];

        foreach ($variants as &$v) {
            $slug = $v['id'];
            $imgs = [];

            $base = $dir . "/garam-{$slug}.png";
            if (file_exists($base)) {
                $imgs[] = asset("images/producs/garam-{$slug}.png");
            }

            for ($n = 1; $n <= 9; $n++) {
                $extra = $dir . "/garam-{$slug}-{$n}.png";
                if (file_exists($extra)) {
                    $imgs[] = asset("images/producs/garam-{$slug}-{$n}.png");
                }
            }

            $v['images'] = $imgs;
            $v['image'] = $imgs[0] ?? null;
        }
        unset($v);

        return $variants;
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
