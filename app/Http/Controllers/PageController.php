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
        return view('pages.products');
    }

    public function productDetail(string $slug)
    {
        return view('pages.product-detail', compact('slug'));
    }

    public function articles()
    {
        return view('pages.articles');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}