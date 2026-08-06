<?php

namespace Database\Seeders;

use App\Models\CompanyProfile;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::create([
            'name' => 'Admin Garam',
            'email' => 'admin@garamnusantara.co.id',
            'password' => Hash::make('password'),
        ]);

        CompanyProfile::create([
            'nama_perusahaan' => 'Garam Nusantara Jepara',
            'tentang' => "Garam Nusantara adalah produsen garam lokal yang berpusat di Jepara, Jawa Tengah. Didirikan pada tahun 2010, kami bermula dari tambak garam tradisional di pesisir utara Jepara. Dengan kegigihan dan komitmen terhadap kualitas, kami berkembang menjadi produsen garam premium yang melayani kebutuhan konsumen dan industri di seluruh Indonesia.\n\nSetiap butir garam yang kami produksi berasal dari air laut Jepara yang jernih, dipanen langsung dari tambak kami sendiri tanpa perantara. Proses produksi menggabungkan teknik tradisional turun-temurun dengan standar higienis modern, menghasilkan garam berkualitas tinggi yang kaya mineral alami.",
            'visi' => 'Menjadi produsen garam lokal terdepan di Indonesia yang dikenal akan kualitas, keaslian, dan keberlanjutan.',
            'misi' => "1. Memproduksi garam berkualitas tinggi langsung dari tambak sendiri di Jepara\n2. Menerapkan proses produksi higienis sesuai standar nasional\n3. Memberdayakan petani garam lokal Jepara melalui kemitraan\n4. Menjaga kelestarian lingkungan tambak dan pesisir\n5. Menyediakan garam premium dengan harga yang terjangkau",
            'alamat' => 'Jl. Raya Tanggul Tepi Laut No. 45, Desa Balong, Kec. Bangsri, Jepara 59453, Jawa Tengah',
            'telepon' => '+62 812-3456-7890',
            'email' => 'info@garamnusantara.co.id',
            'logo' => null,
            'maps_lat' => -6.666499428336486,
            'maps_lng' => 110.64402441302167,
        ]);

        Product::create([
            'nama' => 'Garam Meja Jepara Premium',
            'deskripsi' => 'Garam meja premium yang diproduksi langsung dari tambak garam kami di Jepara. Diproses menggunakan teknik penjemuran alami di bawah sinar matahari pesisir utara Jepara, menghasilkan garam dengan tekstur kristal yang halus dan rasa yang kaya mineral. Tanpa bahan pengawet, tanpa pemutih, murni dari laut Jepara. Cocok untuk semua jenis masakan, pengawetan makanan, dan kebutuhan rumah tangga.',
            'berat' => '1 kg',
            'spesifikasi' => [
                'Jenis' => 'Garam Meja Premium',
                'Kemasan' => 'Plastik kedap udara',
                'Berat Bersih' => '1 kg',
                'Warna' => 'Putih keabu-abuan alami',
                'Ukuran Kristal' => 'Halus dan seragam',
                'Sertifikasi' => 'Halal MUI, Memenuhi Standar SNI',
                'Umur Simpan' => '24 bulan',
                'Asal' => 'Tambak Jepara, Jawa Tengah',
            ],
            'manfaat' => [
                'Kaya mineral alami (natrium, kalsium, magnesium, kalium)',
                'Tanpa bahan pengawet dan pewarna buatan',
                'Cocok untuk semua jenis masakan Indonesia',
                'Kristal halus, mudah larut sempurna',
                'Kemasan kedap udara menjaga kesegaran dan kelezatan',
                'Proses penjemuran alami menjaga kandungan mineral',
                'Aman untuk konsumsi seluruh keluarga',
            ],
            'keunggulan' => [
                'Diproduksi langsung dari tambak sendiri di Jepara',
                'Penjemuran alami 100% di bawah sinar matahari pesisir',
                'Proses produksi higienis dengan pengawasan ketat',
                'Rasa gurih alami khas garam laut Jepara',
                'Tanpa pemutih klorin yang berbahaya',
                'Kandungan mineral lebih tinggi dari garam industri',
            ],
            'penyimpanan' => 'Simpan di tempat kering dan sejuk, hindari paparan sinar matahari langsung. Setelah kemasan dibuka, segera tutup rapat dan gunakan dalam waktu 6 bulan untuk menjaga kualitas terbaik. Jangan letakkan di dekat kompor atau sumber panas.',
            'gambar' => null,
            'whatsapp' => '6281234567890',
        ]);

        $galleries = [
            ['judul' => 'Tambak Garam Jepara', 'gambar' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800', 'kategori' => 'Tambak'],
            ['judul' => 'Pemandangan Tambak dari Udara', 'gambar' => 'https://images.unsplash.com/photo-1560493676-04071c5f467b?w=800', 'kategori' => 'Tambak'],
            ['judul' => 'Proses Penjemuran Garam', 'gambar' => 'https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=800', 'kategori' => 'Penjemuran'],
            ['judul' => 'Kristal Garam di Tambak', 'gambar' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=800', 'kategori' => 'Penjemuran'],
            ['judul' => 'Pemanenan Garam', 'gambar' => 'https://images.unsplash.com/photo-1471943311424-646960669fbc?w=800', 'kategori' => 'Panen'],
            ['judul' => 'Petani Garam Jepara', 'gambar' => 'https://images.unsplash.com/photo-1518110925495-5fe2eb8e0a05?w=800', 'kategori' => 'Panen'],
            ['judul' => 'Pengemasan Produk', 'gambar' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800', 'kategori' => 'Pengemasan'],
            ['judul' => 'Proses Sortir Kualitas', 'gambar' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=800', 'kategori' => 'Pengemasan'],
            ['judul' => 'Gudang Penyimpanan', 'gambar' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=800', 'kategori' => 'Gudang'],
            ['judul' => 'Stok Garam Siap Kirim', 'gambar' => 'https://images.unsplash.com/photo-1553413077-190dd305871c?w=800', 'kategori' => 'Gudang'],
            ['judul' => 'Pengiriman ke Distributor', 'gambar' => 'https://images.unsplash.com/photo-1580674285054-bed31e145f59?w=800', 'kategori' => 'Pengiriman'],
            ['judul' => 'Truk Pengiriman Garam', 'gambar' => 'https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?w=800', 'kategori' => 'Pengiriman'],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
