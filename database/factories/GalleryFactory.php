<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    protected $model = Gallery::class;

    public function definition(): array
    {
        return [
            'judul' => $this->faker->words(3, true),
            'gambar' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800',
            'kategori' => $this->faker->randomElement(['Tambak', 'Panen', 'Penjemuran', 'Pengemasan', 'Gudang', 'Pengiriman']),
        ];
    }
}