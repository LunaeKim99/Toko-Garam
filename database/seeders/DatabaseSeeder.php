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
            'tentang' => 'Garam Nusantara adalah usaha produksi garam laut yang '
                . 'berlokasi di Jepara, Jawa Tengah. Kami memproduksi garam '
                . 'secara langsung dari tambak garam milik sendiri dengan '
                . 'memanfaatkan proses penguapan air laut secara alami.'
                . "\n\nFokus utama kami adalah menghasilkan garam yang bersih, "
                . 'berkualitas, higienis, dan siap memenuhi kebutuhan rumah '
                . 'tangga maupun usaha kuliner. Dengan pengalaman dalam proses '
                . 'produksi garam tradisional, kami menjaga kualitas mulai '
                . 'dari tambak, proses panen, hingga pengemasan.',
            'visi' => 'Menjadi produsen garam laut Jepara yang terpercaya '
                . 'dan dikenal karena kualitas produk, proses produksi yang '
                . 'higienis, dan komitmen terhadap kepuasan pelanggan.',
            'misi' => "1. Menghasilkan garam laut berkualitas tinggi\n"
                . "2. Menjaga kebersihan proses produksi\n"
                . "3. Mendukung petani garam lokal\n"
                . "4. Menyediakan produk yang konsisten dan terpercaya",
            'alamat' => 'Jepara, Jawa Tengah',
            'telepon' => '+62 812-3456-7890',
            'email' => 'info@garamnusantara.co.id',
            'logo' => null,
            'maps_lat' => -6.666499428336486,
            'maps_lng' => 110.64402441302167,
        ]);

        Product::create([
            'nama' => 'Garam Laut Jepara Premium',
            'deskripsi' => 'Garam Laut Jepara Premium merupakan garam laut '
                . 'alami yang diproduksi dari tambak garam di wilayah pesisir '
                . 'Jepara. Dipanen secara tradisional, kemudian disortir '
                . 'dan dikemas secara higienis untuk menjaga kualitas dan '
                . 'kebersihan produk.',
            'berat' => '500 gram / 1 kg',
            'spesifikasi' => [
                'Jenis' => 'Garam Laut',
                'Asal' => 'Jepara, Jawa Tengah',
                'Berat' => '500 gram / 1 kg',
                'Kemasan' => 'Standing pouch',
                'Penyimpanan' => 'Tempat kering dan tertutup',
            ],
            'manfaat' => [
                'Cocok untuk kebutuhan rumah tangga',
                'Cocok untuk usaha kuliner dan makanan',
                'Kualitas terjaga dan higienis',
                'Kaya mineral alami dari laut Jepara',
            ],
            'keunggulan' => [
                'Diproduksi langsung dari tambak Jepara',
                'Warna putih alami',
                'Kualitas terjaga',
                'Higienis',
                'Cocok untuk kebutuhan rumah tangga, kuliner, dan usaha makanan',
            ],
            'penyimpanan' => 'Simpan di tempat kering dan tertutup. Hindari '
                . 'paparan sinar matahari langsung dan kelembaban untuk '
                . 'menjaga kualitas garam.',
            'gambar' => 'https://images.pexels.com/photos/27098281/pexels-photo-27098281.jpeg',
            'whatsapp' => '6281234567890',
        ]);

        $galleries = [
            [
                'judul' => 'Tambak Garam Jepara',
                'gambar' => 'https://images.pexels.com/photos/3344508/pexels-photo-3344508.jpeg',
                'kategori' => 'Tambak Garam',
            ],
            [
                'judul' => 'Pemandangan Tambak dari Udara',
                'gambar' => 'https://images.pexels.com/photos/5173683/pexels-photo-5173683.jpeg',
                'kategori' => 'Tambak Garam',
            ],
            [
                'judul' => 'Petak-Petak Tambak Garam',
                'gambar' => 'https://images.pexels.com/photos/33326478/pexels-photo-33326478.jpeg',
                'kategori' => 'Tambak Garam',
            ],
            [
                'judul' => 'Petani Memanen Garam',
                'gambar' => 'https://images.pexels.com/photos/27098270/pexels-photo-27098270.jpeg',
                'kategori' => 'Proses Produksi',
            ],
            [
                'judul' => 'Pengangkutan Garam',
                'gambar' => 'https://images.pexels.com/photos/27203325/pexels-photo-27203325.jpeg',
                'kategori' => 'Proses Produksi',
            ],
            [
                'judul' => 'Proses Penyebaran Garam',
                'gambar' => 'https://images.pexels.com/photos/6871974/pexels-photo-6871974.jpeg',
                'kategori' => 'Proses Produksi',
            ],
            [
                'judul' => 'Kristal Garam Putih',
                'gambar' => 'https://cdn.pixabay.com/photo/2015/10/22/11/31/salt-1001054_1280.jpg',
                'kategori' => 'Produk',
            ],
            [
                'judul' => 'Garam Laut Premium',
                'gambar' => 'https://cdn.pixabay.com/photo/2019/08/18/15/59/salt-4414383_1280.jpg',
                'kategori' => 'Produk',
            ],
            [
                'judul' => 'Garam dalam Karung',
                'gambar' => 'https://images.pexels.com/photos/27098281/pexels-photo-27098281.jpeg',
                'kategori' => 'Produk',
            ],
            [
                'judul' => 'Petani Garam di Tambak',
                'gambar' => 'https://images.pexels.com/photos/6871982/pexels-photo-6871982.jpeg',
                'kategori' => 'Aktivitas',
            ],
            [
                'judul' => 'Panen Tradisional Garam',
                'gambar' => 'https://images.pexels.com/photos/33326470/pexels-photo-33326470.jpeg',
                'kategori' => 'Aktivitas',
            ],
            [
                'judul' => 'Alat Panen Garam',
                'gambar' => 'https://images.pexels.com/photos/2163850/pexels-photo-2163850.jpeg',
                'kategori' => 'Aktivitas',
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
