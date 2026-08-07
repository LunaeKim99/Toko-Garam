<p align="center">
  <img src="https://img.shields.io/badge/Laravel-13-FF2D20?logo=laravel&logoColor=white" alt="Laravel 13">
  <img src="https://img.shields.io/badge/Tailwind_CSS-v4-06B6D4?logo=tailwindcss&logoColor=white" alt="Tailwind CSS v4">
  <img src="https://img.shields.io/badge/Alpine.js-v3-8BC0D0?logo=alpine.js&logoColor=white" alt="Alpine.js 3">
  <img src="https://img.shields.io/badge/PHP-8.5-777BB4?logo=php&logoColor=white" alt="PHP 8.5">
  <img src="https://img.shields.io/badge/Vite-8-646CFF?logo=vite&logoColor=white" alt="Vite 8">
  <img src="https://img.shields.io/badge/SQLite-3-003B57?logo=sqlite&logoColor=white" alt="SQLite">
  <img src="https://img.shields.io/badge/Breeze-auth-FF2D20" alt="Breeze auth">
</p>

# AlfaJaya Garam — Company Profile Website

Website profil perusahaan **AlfaJaya Garam**, produsen garam premium langsung dari tambak di Jepara, Jawa Tengah. Dibangun dengan **Laravel 13 + Blade + Tailwind CSS v4 + Alpine.js**, mobile-first. Konten bersifat **database-driven** (SQLite default, dapat diganti MySQL/Postgres) dengan **admin panel** berbasis Breeze untuk mengelola profil perusahaan, produk, dan galeri.

## Fitur

- **5 halaman publik**: Beranda, Tentang Kami, Produk, Galeri, Kontak
- **Konten database-driven** via Eloquent (`CompanyProfile`, `Product`, `Gallery`) dengan null-safe guards
- **Admin panel** berbasis Breeze (auth + CRUD):
  - Edit profil perusahaan (`/admin/profil/edit`)
  - Edit produk (`/admin/produk/edit`)
  - Kelola galeri — create/read/update/delete (`/admin/galeri`)
- **Galeri** dengan filter kategori + lightbox (Alpine `x-collapse`)
- **FAQ accordion** pada halaman produk (Alpine `x-collapse`)
- **Tombol WhatsApp** langsung ke pemesanan
- **Animasi scroll** dengan AOS (otomatis nonaktif di mobile ≤768px)
- **Slider testimoni** dengan Swiper.js
- **Dark mode** dengan global Alpine theme store (class-based, persist di localStorage)
- **Google Maps** embed dengan koordinat configurable (`maps_lat`, `maps_lng`)
- **Ikon** Lucide
- **SEO-ready**: title, meta description, dan Open Graph per halaman
- **Responsive mobile-first** (375px s/d 1920px)
- **Tema warna & font terpusat** di satu file CSS (Tailwind `@theme` + AJ brand color system)
- **Test suite** (34 tests) — publik + admin + Breeze auth
- **Deployment**: Dockerfile + Nixpacks untuk Railway/Render

## Halaman Publik

| Halaman | Route | Keterangan |
|---|---|---|
| Beranda | `/` | Hero, keunggulan, preview tentang, produk unggulan, proses produksi, testimoni, CTA |
| Tentang Kami | `/tentang` | Profil, sejarah, visi-misi, nilai, timeline, galeri |
| Produk | `/produk` | Katalog produk: spesifikasi, manfaat, keunggulan, FAQ, tombol WhatsApp |
| Galeri | `/galeri` | Grid galeri + filter kategori + lightbox |
| Kontak | `/kontak` | Info kontak, form pesan, Google Maps |

## Admin Panel

Semua route admin berada di prefix `/admin` dengan middleware `auth`.

| Halaman | Route | Keterangan |
|---|---|---|
| Dashboard | `/admin/dashboard` | Ringkasan 3 kartu (profil, produk, galeri) |
| Edit Profil | `/admin/profil/edit` | Form edit profil perusahaan (termasuk koordinat maps) |
| Edit Produk | `/admin/produk/edit` | Form edit produk |
| Galeri | `/admin/galeri` | Resource CRUD galeri (index, create, edit, delete) |

Login admin: `/login`. Breeze juga menyediakan `/dashboard` dan `/profile` untuk scaffold standar.

## Tech Stack

- **Laravel 13** (PHP 8.5) — framework backend, routing, Blade templating, Eloquent
- **Breeze** — autentikasi (login, register, password reset, verification, profile)
- **SQLite** — database default (dapat diganti MySQL/Postgres via `.env`)
- **Tailwind CSS v4** — utility-first CSS, konfigurasi tema via `@theme` di CSS + AJ brand color system
- **Alpine.js 3** — interaktivitas ringan (galeri, FAQ accordion, navbar scroll, collapse, dark mode store)
- **Vite 8** — bundler asset (CSS + JS)
- **AOS** — animasi scroll (CDN)
- **Swiper 11** — slider testimoni (CDN)
- **Lucide** — ikon (CDN)
- **Fonts**: Sora (heading) + Inter (body) via Google Fonts

## Persyaratan

- PHP ≥ 8.2
- Composer 2
- Node.js ≥ 20 + npm
- Ekstensi PHP: `pdo_sqlite` (untuk SQLite default), `gd`/`imagick` (opsional, untuk upload gambar)
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

# 6. Konfigurasi database (default: SQLite)
#    Pastikan .env: DB_CONNECTION=sqlite
#    Buat file database kosong:
touch database/database.sqlite

# 7. Jalankan migrasi + seeder
php artisan migrate --seed

# 8. Buat symlink storage (untuk upload gambar galeri)
php artisan storage:link

# 9. Build asset
npm run build
```

Seeder membuat akun admin default:
- **Email**: `admin@garamnusantara.co.id`
- **Password**: `password`

> Ganti kredensial ini setelah instalasi pertama melalui `/profile`.

## Menjalankan

```bash
# Mode pengembangan (dengan hot reload Vite)
npm run dev

# Di terminal lain — jalankan server Laravel
php artisan serve
```

Buka **http://127.0.0.1:8000** untuk situs publik, atau **http://127.0.0.1:8000/login** untuk login admin.

## Test

```bash
# Seluruh suite (34 tests, menggunakan SQLite in-memory via RefreshDatabase)
php artisan test

# Hanya test halaman publik
php artisan test --filter=PublicPagesTest

# Hanya test admin panel
php artisan test --filter=AdminPanelTest
```

## Build Production

```bash
npm run build
```

Hasil build berada di folder `public/build/`.

## Struktur Proyek

```
app/
├── Http/
│   └── Controllers/
│       ├── PageController.php          # Halaman publik (DB-driven)
│       ├── ProfileController.php        # Scaffold Breeze (profil user)
│       └── Admin/
│           ├── DashboardController.php
│           ├── CompanyProfileController.php
│           ├── ProductController.php
│           └── GalleryController.php
└── Models/
    ├── CompanyProfile.php
    ├── Product.php
    ├── Gallery.php
    └── User.php

database/
├── database.sqlite                      # DB default (SQLite)
├── factories/                           # 4 factories (untuk test)
├── migrations/                          # users, company_profiles, products, galleries, maps fields
└── seeders/                              # Seeder data dummy (admin + konten)

resources/
├── css/
│   └── app.css                          # Tema Tailwind v4: @theme, komponen, x-cloak, dark mode
├── js/
│   └── app.js                           # Entry Alpine.js core + theme store
└── views/
    ├── layouts/
    │   └── app.blade.php                # Layout master + Alpine collapse plugin CDN
    ├── components/                       # navbar, footer, section-heading, partials beranda
    ├── pages/                            # 5 halaman publik
    └── admin/                            # Dashboard, profil, produk, galeri (CRUD views)

routes/
├── web.php                              # Route publik + admin group + Breeze profile
└── auth.php                             # Route autentikasi Breeze

tests/Feature/
├── PublicPagesTest.php                  # 5 tests halaman publik
├── AdminPanelTest.php                   # 5 tests admin
└── Auth/                                # Tests Breeze (auth, register, password, dll.)
```

## Kustomisasi Tema

Semua token desain terpusat di `resources/css/app.css` (blok CSS variables + `@theme`):

```css
/* Brand colors (customize these) */
--primary: #0284C7;
--primary-light: #0EA5E9;
--primary-dark: #0369A1;
--accent: #F59E0B;

/* Text & background */
--text: #0F172A;
--text-secondary: #475569;
--background: #FFFFFF;
```

Ubah nilai di atas untuk mengganti warna & font seluruh situs secara konsisten. Font: Sora (heading) + Inter (body) via Google Fonts.

## Mengelola Konten

Konten dikelola melalui **admin panel** — tidak perlu edit kode:

1. Login di `/login` (admin@garamnusantara.co.id / password)
2. **Profil perusahaan** → `/admin/profil/edit` → ubah nama, deskripsi, alamat, kontak, logo, koordinat Google Maps
3. **Produk** → `/admin/produk/edit` → ubah nama produk, spesifikasi, manfaat, keunggulan, WhatsApp
4. **Galeri** → `/admin/galeri` → tambah/edit/hapus foto galeri + kategori

Upload gambar galeri disimpan di `storage/app/public/`, diakses via symlink `public/storage`.

## Deployment

Docker dan Nixpacks sudah dikonfigurasi untuk hosting (Railway, Render, dll.):

- **`Dockerfile`** — build image PHP 8.4 + Node.js
- **`nixpacks.toml`** — konfigurasi build untuk Nixpacks
- **DB**: default SQLite di `/data/database.sqlite` (persist volume di production)

## Lisensi

MIT — silakan digunakan dan dimodifikasi secara bebas.
