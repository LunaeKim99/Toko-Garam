# Task 1: Cleanup Project — Remove Breeze Scaffolding

**Files:**
- Delete: `resources/views/welcome.blade.php`
- Delete: `resources/views/dashboard.blade.php`
- Delete: `resources/views/auth/` (entire directory)
- Delete: `resources/views/profile/` (entire directory)
- Delete: `resources/views/layouts/guest.blade.php`
- Delete: `resources/views/layouts/navigation.blade.php`
- Delete: `resources/views/components/` (all existing Breeze components)
- Delete: `app/Http/Controllers/Auth/` (entire directory)
- Delete: `app/Http/Controllers/ProfileController.php`
- Delete: `routes/auth.php`
- Delete: `tailwind.config.js`
- Delete: `postcss.config.js`
- Modify: `routes/web.php`
- Create: `app/Http/Controllers/PageController.php`

## Steps:

1. Delete all Breeze views, auth controllers, auth routes, tailwind.config.js, postcss.config.js
2. Create empty directory structure: `resources/views/pages/`, `resources/views/partials/`, `resources/views/components/`, `resources/views/layouts/` (already exists)
3. Rewrite `routes/web.php` with 6 routes:
   - GET / → PageController@home (name: home)
   - GET /tentang → PageController@about (name: about)
   - GET /produk → PageController@products (name: products)
   - GET /produk/{slug} → PageController@productDetail (name: product-detail)
   - GET /artikel → PageController@articles (name: articles)
   - GET /kontak → PageController@contact (name: contact)
4. Create `app/Http/Controllers/PageController.php` with 6 skeleton methods, each returning a Blade view

## Verification:
Run: `php artisan route:list`
Expected: 6 GET routes registered, no auth routes.
