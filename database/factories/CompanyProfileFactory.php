<?php

namespace Database\Factories;

use App\Models\CompanyProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyProfileFactory extends Factory
{
    protected $model = CompanyProfile::class;

    public function definition(): array
    {
        return [
            'nama_perusahaan' => $this->faker->company(),
            'tentang' => $this->faker->paragraph(3),
            'visi' => $this->faker->sentence(),
            'misi' => $this->faker->paragraph(2),
            'alamat' => $this->faker->address(),
            'telepon' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'logo' => null,
        ];
    }
}