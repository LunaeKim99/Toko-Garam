# TODO — Garam Nusantara

## Immediate (PR merge)

- [ ] Review + merge PR #1 (feature/company-profile → master)
- [ ] Deploy ke production / staging
- [ ] Ganti kredensial admin default (`admin@garamnusantara.co.id / password`) setelah deploy

## Production Hardening

- [ ] Set `APP_ENV=production` + `APP_DEBUG=false` di `.env` server
- [ ] Ganti DB_CONNECTION ke MySQL/Postgres (SQLite cocok untuk dev/test, bukan production high-traffic)
- [ ] Pastikan `php artisan storage:link` ada di server (atau gunakan cloud storage S3/R2)
- [ ] Konfigurasi `MAIL_MAILER` (Breeze memerlukan email untuk password reset)
- [ ] Tambahkan rate limiting / captcha pada form kontak
- [ ] Jalankan `php artisan config:cache && php artisan route:cache && php artisan view:cache` di production
- [ ] Setup queue worker untuk Breeze email verification (jika `APP_MAIL_ENABLED=true`)

## Content / Design

- [ ] Ganti placeholder images (Unsplash) dengan foto produk/galeri nyata
- [ ] Review + update teks konten: deskripsi perusahaan, manfaat, visi-misi (sekarang pakai dummy)
- [ ] Tambah page 404 kustom (`resources/views/errors/404.blade.php`)
- [ ] Tambahkan structured data (JSON-LD) untuk SEO lokal (alamat Jepara)
- [ ] Integrasi Google Analytics / Plausible
- [ ] Tambahkan OG image + favicon (assets/og.png, assets/favicon.png)

## Future Enhancements

- [ ] Multi-produk (opsional — jika ingin katalog beberapa jenis garam)
- [ ] Form kontak → kirim email via Laravel Mail (sekarang hanya placeholder)
- [ ] Multi-language (Indonesia + English)
- [ ] Halaman berita/artikel (jika diperlukan)
- [ ] PWA support (service worker, manifest)
- [ ] Sitemap.xml + robots.txt dinamis

## Technical Debt / Nice-to-Have

- [ ] Tambah test untuk admin CRUD actions (create/update/delete galeri)
- [ ] Tambah test untuk profil update (ProfileTest — profile routes sudah di-restoration di Task 6)
- [ ] Evaluasi: apakah orphaned Breeze views (`resources/views/profile/`) perlu di-custom untuk branding
- [ ] Pertimbangkan Laravel Livewire untuk form kontak (real-time validation)
