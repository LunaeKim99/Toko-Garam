<section class="section-padding">
    <div class="container-custom">
        <x-section-heading title="Produk Unggulan" subtitle="Pilihan Terbaik" />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $featured = [
                    ['slug' => 'garam-halus-premium', 'name' => 'Garam Halus Premium', 'category' => 'Garam Halus', 'weight' => '1 kg', 'description' => 'Garam halus berukuran seragam untuk kebutuhan dapur dan industri makanan.', 'image' => 'https://images.unsplash.com/photo-1518110925495-5fe2eb8e0a05?w=600'],
                    ['slug' => 'garam-kasar-industri', 'name' => 'Garam Kasar Industri', 'category' => 'Garam Kasar', 'weight' => '25 kg', 'description' => 'Garam kasar untuk proses pengolahan industri, konstruksi, dan pertambakan.', 'image' => 'https://images.unsplash.com/photo-1471943311424-646960669fbc?w=600'],
                    ['slug' => 'garam-krosok-murni', 'name' => 'Garam Krosok Murni', 'category' => 'Garam Krosok', 'weight' => '5 kg', 'description' => 'Garam krosok asli tambak untuk keperluan pengasinan dan konsumsi.', 'image' => 'https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=600'],
                ];
            @endphp

            @foreach($featured as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('products') }}" class="btn-primary">
                Lihat Semua Produk
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>
    </div>
</section>