<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'berat',
        'spesifikasi',
        'manfaat',
        'keunggulan',
        'penyimpanan',
        'gambar',
        'whatsapp',
    ];

    protected $casts = [
        'spesifikasi' => 'array',
        'manfaat' => 'array',
        'keunggulan' => 'array',
    ];
}
