<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'nama' => 'Garam Meja Premium',
            'deskripsi' => $this->faker->paragraph(3),
            'berat' => '1 kg',
            'spesifikasi' => ['Jenis' => 'Garam Meja', 'Kemasan' => 'Plastik'],
            'manfaat' => ['Kaya mineral', 'Tanpa pengawet'],
            'keunggulan' => ['Dari tambak sendiri', 'Higienis'],
            'penyimpanan' => $this->faker->sentence(),
            'gambar' => null,
            'whatsapp' => '6281234567890',
        ];
    }
}
