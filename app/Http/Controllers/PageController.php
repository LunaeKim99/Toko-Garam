<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        $company = [
            'founded' => 2010,
            'description' => 'Garam Nusantara didirikan pada tahun 2010 di Jakarta Utara dengan visi menjadi distributor garam terpercaya di Indonesia. Berawal dari tambak garam tradisional, kami berkembang menjadi perusahaan modern dengan jaringan distribusi ke seluruh Indonesia.',
            'history' => 'Perjalanan kami dimulai dari sebuah tambak kecil di pesisir utara Jakarta. Dengan kegigihan dan komitmen terhadap kualitas, kami berhasil memperluas pasar hingga ke pulau-pulau besar di Indonesia. Pada tahun 2015, kami membangun pabrik pengolahan garam bersertifikat ISO. Hingga kini, kami melayani lebih dari 1000 klien dari berbagai sektor industri.',
            'vision' => 'Menjadi perusahaan garam terdepan di Indonesia yang terkenal akan kualitas, inovasi, dan keberlanjutan.',
            'mission' => [
                'Menyediakan produk garam berkualitas tinggi yang memenuhi standar nasional dan internasional.',
                'Mengembangkan teknologi pengolahan garam yang ramah lingkungan.',
                'Membangun jaringan distribusi yang efisien ke seluruh Indonesia.',
                'Memberdayakan petak garam lokal melalui program kemitraan.',
            ],
            'values' => [
                ['icon' => 'shield-check', 'title' => 'Integritas', 'desc' => 'Kejujuran dalam setiap aspek bisnis.'],
                ['icon' => 'gem', 'title' => 'Kualitas', 'desc' => 'Standar tertanam dalam setiap produk.'],
                ['icon' => 'lightbulb', 'title' => 'Inovasi', 'desc' => 'Terus berkembang mengikuti perkembangan zaman.'],
                ['icon' => 'leaf', 'title' => 'Keberlanjutan', 'desc' => 'Produksi ramah lingkungan untuk masa depan.'],
                ['icon' => 'users', 'title' => 'Pelanggan', 'desc' => 'Kepuasan pelanggan adalah prioritas utama.'],
                ['icon' => 'award', 'title' => 'Profesionalisme', 'desc' => 'Standar kerja tinggi dalam setiap proses.'],
            ],
            'timeline' => [
                ['year' => '2010', 'event' => 'Pendirian perusahaan dan awal operasi tambak garam.'],
                ['year' => '2012', 'event' => 'Ekspansi ke pasar Jawa dan Sumatera.'],
                ['year' => '2015', 'event' => 'Pembangunan pabrik pengolahan bersertifikat ISO.'],
                ['year' => '2018', 'event' => 'Peluncuran lini produk garam premium.'],
                ['year' => '2020', 'event' => 'Jaringan distribusi mencakup seluruh Indonesia.'],
                ['year' => '2023', 'event' => 'Meraih penghargaan Usaha Garam Nasional.'],
            ],
            'gallery' => [
                'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=600',
                'https://images.unsplash.com/photo-1560493676-04071c5f467b?w=600',
                'https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=600',
                'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=600',
                'https://images.unsplash.com/photo-1471943311424-646960669fbc?w=600',
                'https://images.unsplash.com/photo-1518110925495-5fe2eb8e0a05?w=600',
            ],
        ];

        return view('pages.about', compact('company'));
    }

    public function products()
    {
        $products = [
            ['slug' => 'garam-halus-premium-1kg', 'name' => 'Garam Halus Premium 1kg', 'category' => 'Garam Halus', 'weight' => '1 kg', 'description' => 'Garam halus berukuran seragam untuk kebutuhan dapur dan industri makanan.', 'image' => 'https://images.unsplash.com/photo-1518110925495-5fe2eb8e0a05?w=600'],
            ['slug' => 'garam-halus-premium-5kg', 'name' => 'Garam Halus Premium 5kg', 'category' => 'Garam Halus', 'weight' => '5 kg', 'description' => 'Kemasan ekonomis untuk usaha kuliner dan industri skala menengah.', 'image' => 'https://images.unsplash.com/photo-1518110925495-5fe2eb8e0a05?w=600'],
            ['slug' => 'garam-kasar-industri-25kg', 'name' => 'Garam Kasar Industri 25kg', 'category' => 'Garam Kasar', 'weight' => '25 kg', 'description' => 'Garam kasar untuk proses pengolahan industri, konstruksi, dan pertambakan.', 'image' => 'https://images.unsplash.com/photo-1471943311424-646960669fbc?w=600'],
            ['slug' => 'garam-krosok-murni-5kg', 'name' => 'Garam Krosok Murni 5kg', 'category' => 'Garam Krosok', 'weight' => '5 kg', 'description' => 'Garam krosok asli tambak untuk keperluan pengasinan dan konsumsi.', 'image' => 'https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=600'],
            ['slug' => 'garam-industri-50kg', 'name' => 'Garam Industri 50kg', 'category' => 'Garam Industri', 'weight' => '50 kg', 'description' => 'Garam bersih untuk kebutuhan industri kimia dan farmasi.', 'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=600'],
            ['slug' => 'garam-meja-500g', 'name' => 'Garam Meja 500g', 'category' => 'Garam Halus', 'weight' => '500 g', 'description' => 'Garam meja beriodium untuk konsumsi rumah tangga.', 'image' => 'https://images.unsplash.com/photo-1560493676-04071c5f467b?w=600'],
        ];

        $categories = ['Semua', 'Garam Halus', 'Garam Kasar', 'Garam Krosok', 'Garam Industri'];

        return view('pages.products', compact('products', 'categories'));
    }

    public function productDetail(string $slug)
    {
        $product = [
            'slug' => $slug,
            'name' => 'Garam Halus Premium 1kg',
            'category' => 'Garam Halus',
            'weight' => '1 kg',
            'description' => 'Garam halus premium diproses dari air laut murni menggunakan teknologi modern. Ukuran kristal seragam, cocok untuk kebutuhan dapur rumah tangga maupun industri makanan. Bebas bahan pengawet dan pewarna buatan.',
            'specifications' => [
                'Jenis' => 'Garam Halus',
                'Kemasan' => 'Plastik kedap udara',
                'Berat Bersih' => '1 kg',
                'Sertifikasi' => 'ISO 22000, Halal MUI',
                'Umur Simpan' => '24 bulan',
            ],
            'benefits' => [
                'Tinggi mineral alami (natrium, kalsium, magnesium)',
                'Tanpa bahan pengawet',
                'Cocok untuk semua jenis masakan',
                'Kristal halus, mudah larut',
                'Kemasan kedap udara menjaga kesegaran',
            ],
            'gallery' => [
                'https://images.unsplash.com/photo-1518110925495-5fe2eb8e0a05?w=800',
                'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=800',
                'https://images.unsplash.com/photo-1471943311424-646960669fbc?w=800',
            ],
            'related' => [
                ['slug' => 'garam-halus-premium-5kg', 'name' => 'Garam Halus Premium 5kg', 'category' => 'Garam Halus', 'weight' => '5 kg', 'description' => 'Kemasan ekonomis untuk usaha kuliner.', 'image' => 'https://images.unsplash.com/photo-1518110925495-5fe2eb8e0a05?w=600'],
                ['slug' => 'garam-krosok-murni-5kg', 'name' => 'Garam Krosok Murni 5kg', 'category' => 'Garam Krosok', 'weight' => '5 kg', 'description' => 'Garam krosok asli tambak.', 'image' => 'https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=600'],
                ['slug' => 'garam-meja-500g', 'name' => 'Garam Meja 500g', 'category' => 'Garam Halus', 'weight' => '500 g', 'description' => 'Garam meja beriodium.', 'image' => 'https://images.unsplash.com/photo-1560493676-04071c5f467b?w=600'],
            ],
        ];

        return view('pages.product-detail', compact('product', 'slug'));
    }

    public function articles()
    {
        $articles = [
            ['slug' => 'manfaat-garam-konsumsi', 'title' => 'Manfaat Garam untuk Kesehatan Tubuh', 'excerpt' => 'Garam mengandung mineral penting yang dibutuhkan tubuh. Ketahui manfaat dan cara mengonsumsi garam yang benar.', 'category' => 'Kesehatan', 'date' => '15 Juli 2026', 'image' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=600'],
            ['slug' => 'cara-memilih-garam-masak', 'title' => 'Tips Memilih Garam untuk Masakan', 'excerpt' => 'Tidak semua garam cocok untuk semua masakan. Pelajari perbedaan jenis garam dan kapan menggunakannya.', 'category' => 'Tips', 'date' => '10 Juli 2026', 'image' => 'https://images.unsplash.com/photo-1560493676-04071c5f467b?w=600'],
            ['slug' => 'proses-pembuatan-garam-tradisional', 'title' => 'Proses Pembuatan Garam Tradisional', 'excerpt' => 'Mengenal proses pengolahan garam dari tambak tradisional hingga menjadi garam siap pakai.', 'category' => 'Edukasi', 'date' => '5 Juli 2026', 'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=600'],
            ['slug' => 'garam-industri-penggunaan', 'title' => 'Penggunaan Garam dalam Industri', 'excerpt' => 'Garam tidak hanya untuk konsumsi. Industri kimia, farmasi, dan tekstil sangat bergantung pada garam.', 'category' => 'Industri', 'date' => '1 Juli 2026', 'image' => 'https://images.unsplash.com/photo-1471943311424-646960669fbc?w=600'],
            ['slug' => 'standar-kualitas-garam', 'title' => 'Standar Kualitas Garam di Indonesia', 'excerpt' => 'Peraturan dan standar mutu garam yang berlaku di Indonesia, termasuk SNI untuk garam konsumsi.', 'category' => 'Regulasi', 'date' => '25 Juni 2026', 'image' => 'https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=600'],
            ['slug' => 'garam-himalaya-vs-lokal', 'title' => 'Garam Himalaya vs Garam Lokal', 'excerpt' => 'Perbandingan garam Himalaya yang populer dengan garam lokal Indonesia dari segi kandungan mineral dan harga.', 'category' => 'Edukasi', 'date' => '20 Juni 2026', 'image' => 'https://images.unsplash.com/photo-1518110925495-5fe2eb8e0a05?w=600'],
        ];

        return view('pages.articles', compact('articles'));
    }

    public function contact()
    {
        $contactInfo = [
            'address' => 'Jl. Raya Pantai No. 123, Kel. Muara Baru, Kec. Penjaringan, Jakarta Utara 14470',
            'phone' => '+62 21 1234 5678',
            'whatsapp' => '+62 812 3456 7890',
            'email' => 'info@garamnusantara.co.id',
            'hours' => [
                'Senin - Jumat' => '08:00 - 17:00',
                'Sabtu' => '08:00 - 13:00',
                'Minggu' => 'Libur',
            ],
            'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.7!2d106.8!3d-6.1!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMDYnMDAuMCJTIDEwNsKwNDgnMDAuMCJF!5e0!3m2!1sid!2sid!4v1234567890',
        ];

        return view('pages.contact', compact('contactInfo'));
    }
}