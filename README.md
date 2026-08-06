<p align="center">
  <img src="https://img.shields.io/badge/Laravel-13-FF2D20?logo=laravel&logoColor=white" alt="Laravel 13">
  <img src="https://img.shields.io/badge/Tailwind_CSS-v4-06B6D4?logo=tailwindcss&logoColor=white" alt="Tailwind CSS v4">
  <img src="https://img.shields.io/badge/Alpine.js-v3-8BC0D0?logo=alpine.js&logoColor=white" alt="Alpine.js 3">
  <img src="https://img.shields.io/badge/PHP-8.5-777BB4?logo=php&logoColor=white" alt="PHP 8.5">
  <img src="https://img.shields.io/badge/Vite-8-646CFF?logo=vite&logoColor=white" alt="Vite 8">
</p>

# Garam Nusantara — Company Profile Website

Website profil perusahaan **Garam Nusantara**, perusahaan distributor garam berkualitas untuk kebutuhan industri maupun konsumen. Dibangun dengan **Laravel 13 + Blade + Tailwind CSS v4**, mobile-first, tanpa backend/database (data statis di controller) sehingga siap dipakai langsung atau dihubungkan ke data nyata.

## Fitur

- **6 halaman lengkap**: Beranda, Tentang Kami, Produk, Detail Produk, Artikel, Kontak
- **Filter produk interaktif** (pencarian + filter kategori) dengan Alpine.js
- **Galeri produk** dengan thumbnail yang bisa diklik
- **Tombol WhatsApp** langsung ke pemesanan
- **Animasi scroll** dengan AOS (otomatis nonaktif di mobile ≤768px)
- **Slider** dengan Swiper.js (testimoni di beranda)
- **Ikon** dengan Lucide Icons
- **SEO-ready**: title, meta description, dan Open Graph per halaman
- **Responsive mobile-first** (375px s/d 1920px)
- **Tema warna & font terpusat** di satu file CSS (Tailwind `@theme`)

## Halaman

| Halaman | Route | Keterangan |
|---|---|---|
| Beranda | `/` | Hero, fitur unggulan, preview tentang, produk unggulan, proses produksi, testimoni, CTA |
| Tentang Kami | `/tentang` | Profil, sejarah, visi-misi, nilai perusahaan, timeline, galeri |
| Produk | `/produk` | Grid produk + pencarian & filter kategori |
| Detail Produk | `/produk/{slug}` | Galeri, spesifikasi, manfaat, tombol WhatsApp, produk terkait |
| Artikel | `/artikel` | Artikel unggulan + grid artikel |
| Kontak | `/kontak` | Info kontak, form pesan, Google Maps |

## Tech Stack

- **Laravel 13** (PHP 8.5) — framework backend, routing, Blade templating
- **Tailwind CSS v4** — utility-first CSS, konfigurasi tema via `@theme` di CSS
- **Alpine.js 3** — interaktivitas ringan (filter produk, galeri, navbar scroll)
- **Vite 8** — bundler asset (CSS + JS)
- **AOS** — animasi scroll (CDN)
- **Swiper 11** — slider (CDN)
- **Lucide** — ikon (CDN)
- **Fonts**: Sora (heading) + Inter (body) via Google Fonts

## Persyaratan

- PHP ≥ 8.2
- Composer 2
- Node.js ≥ 20 + npm
- (Opsional) Laragon / XAMPP untuk lingkungan lokal

## Instalasi

```bash
# 1. Clone repository
git clone <url-repo> website-garam
cd website-garam

# 2. Install dependency PHP
composer install

# 3. Install dependency frontend
npm install

# 4. Salin file environment
cp .env.example .env

# 5. Generate app key
php artisan key:generate
```

> Catatan: project ini **tidak memerlukan database** — semua data konten berupa data statis (dummy) di `app/Http/Controllers/PageController.php`.

## Menjalankan

```bash
# Mode pengembangan (dengan hot reload Vite)
npm run dev

# Di terminal lain — jalankan server Laravel
php artisan serve
```

Buka **http://127.0.0.1:8000** di browser.

## Build Production

```bash
npm run build
```

Hasil build akan berada di folder `public/build/`.

## Struktur Proyek

```
app/
└── Http/
    └── Controllers/
        └── PageController.php   # Semua data halaman (statis/dummy)

resources/
├── css/
│   └── app.css                  # Tema Tailwind v4: warna, font, komponen, utilitas
├── js/
│   └── app.js                   # Entry Alpine.js
└── views/
    ├── layouts/
    │   └── app.blade.php        # Layout master (head, navbar, footer, init library)
    ├── components/
    │   ├── navbar.blade.php     # Navbar sticky + transparan→putih saat scroll
    │   ├── footer.blade.php
    │   ├── product-card.blade.php
    │   ├── article-card.blade.php
    │   └── section-heading.blade.php
    ├── partials/                # Bagian-bagian halaman beranda (hero, fitur, dll.)
    └── pages/                   # 6 halaman utama

routes/
└── web.php                     # 6 route bernama (home, about, products, ...)
```

## Kustomisasi Tema

Semua token desain terpusat di `resources/css/app.css` (blok `@theme`):

```css
@theme {
    --color-primary: #0284C7;      /* Warna utama */
    --color-primary-dark: #0369A1;
    --color-dark: #0F172A;         /* Warna teks/bg gelap */
    --color-light: #F8FAFC;        /* Warna latar terang */
    --font-sans: 'Inter', sans-serif;
    --font-heading: 'Sora', sans-serif;
}
```

Ubah nilai di atas untuk mengganti warna & font seluruh situs secara konsisten.

## Mengganti Data

Semua data produk, artikel, kontak, dan profil perusahaan berupa array PHP di `app/Http/Controllers/PageController.php`. Untuk memakai data nyata, ganti data pada masing-masing method:

- `home()` — data statistik & konten beranda
- `about()` — profil perusahaan
- `products()` — daftar produk + kategori
- `productDetail()` — detail produk
- `articles()` — daftar artikel
- `contact()` — info kontak & jam operasional

## Lisensi

MIT — silakan digunakan dan dimodifikasi secara bebas.
