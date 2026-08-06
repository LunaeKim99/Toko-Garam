# Website Garam — Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Build a modern, responsive company profile website frontend for a salt sales company.

**Architecture:** Single `PageController` with static dummy data, Blade layouts (`layouts/app.blade.php`), reusable Blade components (`x-product-card`, `x-article-card`, `x-section-heading`), partials for Home sections. All styling via Tailwind CSS v4 + Lucide Icons + AOS + Swiper.js via CDN. Alpine.js for interactivity.

**Tech Stack:** Laravel 13, Blade, PHP 8.5, Tailwind CSS v4, Alpine.js 3, AOS (CDN), Swiper.js (CDN), Lucide Icons (CDN), Google Fonts Sora + Inter (CDN), Vite 8.

## Global Constraints

- Tailwind CSS v4 with `@import "tailwindcss"` syntax + `@theme` in `app.css` (NOT v3 `@tailwind` directives)
- Color tokens: primary `#0284C7`, dark `#0F172A`, light `#F8FAFC`
- Font: Sora (headings) + Inter (body) via Google Fonts `@import`
- Mobile-first responsive: base = mobile, `sm:`/`md:`/`lg:`/`xl:`/`2xl:` for larger
- Minimum touch target: 44x44px
- AOS disabled on mobile (`max-width: 768px`)
- No Bootstrap. No jQuery. No Tailwind v3 config file.
- Dummy data hardcoded in `PageController`, passed via `compact()` or `view()->with()`
- Semantic HTML5: `<header>`, `<nav>`, `<main>`, `<section>`, `<article>`, `<footer>`
- Company name placeholder: "Garam Nusantara"
- Images: Unsplash placeholder URLs
- No admin dashboard, no auth routes, no database

---

## File Map

| File | Responsibility |
|------|----------------|
| `resources/css/app.css` | Tailwind v4 imports + `@theme` color/font config + global styles |
| `resources/js/app.js` | Alpine.js init only. AOS + Swiper loaded via CDN in layout. |
| `routes/web.php` | 6 routes: home, about, products, product-detail, articles, contact |
| `app/Http/Controllers/PageController.php` | 6 methods, each returning a Blade view with dummy data |
| `resources/views/layouts/app.blade.php` | Master layout: `<!DOCTYPE>`, `<head>` (meta, CSS, fonts, AOS/Swiper CDN), navbar slot, `@yield('content')`, footer, JS CDN scripts, `app.js` |
| `resources/views/components/navbar.blade.php` | Logo + nav links + CTA. Alpine scroll listener. Mobile hamburger. |
| `resources/views/components/footer.blade.php` | 4-column footer + copyright bar. `bg-dark`. |
| `resources/views/components/section-heading.blade.php` | Reusable section title + subtitle + AOS fade-up |
| `resources/views/components/product-card.blade.php` | Boxed card: image + badge + name + weight + desc + link. Props: `$product` |
| `resources/views/components/article-card.blade.php` | Card: thumbnail + badge + title + excerpt + date + link. Props: `$article` |
| `resources/views/partials/hero.blade.php` | Swiper hero slider, gradient overlay, title, tagline, 2 CTAs |
| `resources/views/partials/features.blade.php` | 4 keunggulan cards with Lucide icons |
| `resources/views/partials/about-preview.blade.php` | Image + text two-column, stats, "Selengkapnya" button |
| `resources/views/partials/featured-products.blade.php` | Grid of 3 product cards + "Lihat Semua" button |
| `resources/views/partials/process.blade.php` | 4-step vertical timeline |
| `resources/views/partials/testimonials.blade.php` | Swiper testimonials slider |
| `resources/views/partials/cta.blade.php` | Gradient CTA banner |
| `resources/views/pages/home.blade.php` | Assembles all 7 partials, extends layout |
| `resources/views/pages/about.blade.php` | Banner + profil + sejarah + visi-misi + nilai + timeline + gallery |
| `resources/views/pages/products.blade.php` | Banner + toolbar (search/filter) + product grid |
| `resources/views/pages/product-detail.blade.php` | Breadcrumb + gallery + info + description + related |
| `resources/views/pages/articles.blade.php` | Banner + featured article + article grid |
| `resources/views/pages/contact.blade.php` | Banner + info cards + form + Google Maps + social |

### Files to Remove

| File/Directory | Reason |
|---------------|--------|
| `resources/views/welcome.blade.php` | Replaced by home |
| `resources/views/dashboard.blade.php` | Not needed (no admin) |
| `resources/views/auth/` (entire dir) | Not needed (no auth) |
| `resources/views/profile/` (entire dir) | Not needed (no auth) |
| `resources/views/components/` (existing Breeze components) | Replaced by our components |
| `resources/views/layouts/app.blade.php` (existing) | Replaced by new master layout |
| `resources/views/layouts/guest.blade.php` | Not needed |
| `resources/views/layouts/navigation.blade.php` | Not needed |
| `app/Http/Controllers/Auth/` (entire dir) | Not needed |
| `app/Http/Controllers/ProfileController.php` | Not needed |
| `routes/auth.php` | Not needed |
| `tailwind.config.js` | v4 uses CSS `@theme`, not JS config |
| `postcss.config.js` | Not needed with v4 `@tailwindcss/vite` |

---

## Tasks

### Task 1: Cleanup Project — Remove Breeze Scaffolding

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

**Steps:**

- [ ] **Step 1: Delete Breeze views, auth controllers, auth routes**

```bash
# Windows PowerShell
Remove-Item -Recurse -Force "resources\views\welcome.blade.php"
Remove-Item -Recurse -Force "resources\views\dashboard.blade.php"
Remove-Item -Recurse -Force "resources\views\auth"
Remove-Item -Recurse -Force "resources\views\profile"
Remove-Item -Recurse -Force "resources\views\layouts\guest.blade.php"
Remove-Item -Recurse -Force "resources\views\layouts\navigation.blade.php"
Remove-Item -Recurse -Force "resources\views\components" -ErrorAction SilentlyContinue
Remove-Item -Recurse -Force "app\Http\Controllers\Auth"
Remove-Item -Force "app\Http\Controllers\ProfileController.php"
Remove-Item -Force "routes\auth.php"
Remove-Item -Force "tailwind.config.js"
Remove-Item -Force "postcss.config.js"
```

Workdir: `C:\laragon\www\website-garam`

- [ ] **Step 2: Create empty directory structure**

```powershell
New-Item -ItemType Directory -Path "resources\views\pages" -Force
New-Item -ItemType Directory -Path "resources\views\partials" -Force
New-Item -ItemType Directory -Path "resources\views\components" -Force
New-Item -ItemType Directory -Path "resources\views\layouts" -Force
```

Workdir: `C:\laragon\www\website-garam`

- [ ] **Step 3: Rewrite routes/web.php**

```php
<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/tentang', [PageController::class, 'about'])->name('about');
Route::get('/produk', [PageController::class, 'products'])->name('products');
Route::get('/produk/{slug}', [PageController::class, 'productDetail'])->name('product-detail');
Route::get('/artikel', [PageController::class, 'articles'])->name('articles');
Route::get('/kontak', [PageController::class, 'contact'])->name('contact');
```

File: `routes/web.php`

- [ ] **Step 4: Create PageController skeleton**

```php
<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function products()
    {
        return view('pages.products');
    }

    public function productDetail(string $slug)
    {
        return view('pages.product-detail', compact('slug'));
    }

    public function articles()
    {
        return view('pages.articles');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
```

File: `app/Http/Controllers/PageController.php`

- [ ] **Step 5: Verify — artisan routes list**

```bash
php artisan route:list
```

Workdir: `C:\laragon\www\website-garam`

Expected: 6 GET routes registered, no auth routes.

---

### Task 2: Tailwind CSS v4 + Global Styles + JS Setup

**Files:**
- Rewrite: `resources/css/app.css`
- Rewrite: `resources/js/app.js`

**Interfaces:**
- Produces: `app.css` with `@import "tailwindcss"` + `@theme` + Google Fonts + AOS init CSS
- Produces: `app.js` with Alpine init + AOS init + Swiper registration

**Steps:**

- [ ] **Step 1: Rewrite resources/css/app.css**

```css
@import "tailwindcss";
@import url('https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

@theme {
    --color-primary: #0284C7;
    --color-primary-light: #38BDF8;
    --color-primary-dark: #0369A1;
    --color-dark: #0F172A;
    --color-dark-light: #1E293B;
    --color-light: #F8FAFC;
    --color-light-gray: #E2E8F0;
    --font-sans: 'Inter', sans-serif;
    --font-heading: 'Sora', sans-serif;
}

@layer base {
    html {
        scroll-behavior: smooth;
    }

    body {
        font-family: var(--font-sans);
        @apply text-dark bg-white antialiased;
        overflow-x: hidden;
    }

    h1, h2, h3, h4, h5, h6 {
        font-family: var(--font-heading);
    }

    img {
        @apply max-w-full h-auto;
    }
}

@layer components {
    .font-heading {
        font-family: var(--font-heading);
    }

    .section-padding {
        @apply py-12 sm:py-16 lg:py-24;
    }

    .container-custom {
        @apply container mx-auto px-4 sm:px-6 lg:px-8;
    }

    .btn-primary {
        @apply inline-flex items-center justify-center gap-2 px-6 py-3 bg-primary text-white font-medium rounded-xl hover:bg-primary-dark transition-all duration-300;
    }

    .btn-outline {
        @apply inline-flex items-center justify-center gap-2 px-6 py-3 border-2 border-white text-white font-medium rounded-xl hover:bg-white hover:text-dark transition-all duration-300;
    }

    .btn-whatsapp {
        @apply inline-flex items-center justify-center gap-2 px-6 py-3 bg-green-500 text-white font-medium rounded-xl hover:bg-green-600 transition-all duration-300;
    }
}

/* AOS disable on mobile */
@media (max-width: 768px) {
    [data-aos] {
        opacity: 1 !important;
        transform: none !important;
        transition: none !important;
    }
}

/* Swiper customization */
.swiper-pagination-bullet-active {
    @apply !bg-primary;
}

.swiper-button-next,
.swiper-button-prev {
    @apply !text-white;
}

/* Fade-in on page load */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

main {
    animation: fadeIn 0.5s ease-out;
}
```

File: `resources/css/app.css`

- [ ] **Step 2: Rewrite resources/js/app.js**

```js
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();
```

File: `resources/js/app.js`

Note: AOS and Swiper are loaded via CDN in `layouts/app.blade.php` (Task 3). Do NOT npm-install them. AOS.init() is called in the layout's inline script. Swiper is initialized per-component via `@push('scripts')` blocks.

- [ ] **Step 3: Verify — npm run build**

```bash
npm run build
```

Workdir: `C:\laragon\www\website-garam`

Expected: Vite build succeeds, no errors.

---

### Task 3: Master Layout (app.blade.php)

**Files:**
- Create: `resources/views/layouts/app.blade.php`

**Interfaces:**
- Consumes: Alpine.js, AOS, Swiper CSS/JS (CDN), Lucide Icons (CDN), Google Fonts
- Produces: `@yield('content')` slot for page views, `@yield('meta_title')` etc for SEO, `@yield('styles')` / `@yield('scripts')` for per-page additions
- Includes: `x-navbar` and `x-footer` components

**Steps:**

- [ ] **Step 1: Create layouts/app.blade.php**

```blade
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('meta_title', 'Garam Nusantara — Solusi Garam Berkualitas')</title>
    <meta name="description" content="@yield('meta_description', 'Garam Nusantara menyediakan produk garam berkualitas tinggi untuk kebutuhan industri dan konsumen.')">

    {{-- Open Graph --}}
    <meta property="og:title" content="@yield('meta_title', 'Garam Nusantara')">
    <meta property="og:description" content="@yield('meta_description', 'Garam berkualitas tinggi.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    {{-- AOS CSS + JS --}}
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    {{-- Swiper CSS + JS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- Vite CSS + JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('styles')
</head>
<body class="font-sans text-dark bg-white antialiased">
    <x-navbar />

    <main>
        @yield('content')
    </main>

    <x-footer />

    {{-- Lucide Icons Init --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();
        });
    </script>

    @yield('scripts')

    {{-- AOS Init --}}
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 50,
        });
    </script>
</body>
</html>
```

File: `resources/views/layouts/app.blade.php`

- [ ] **Step 2: Create minimal placeholder views to test layout loads**

Create `resources/views/pages/home.blade.php`:
```blade
@extends('layouts.app')
@section('content')
<section class="section-padding container-custom">
    <h1>Home Page — Coming Soon</h1>
</section>
@endsection
```

Do the same for `about.blade.php`, `products.blade.php`, `product-detail.blade.php`, `articles.blade.php`, `contact.blade.php` (same pattern, different title).

- [ ] **Step 3: Verify — artisan serve + browser check**

```bash
php artisan serve
```

Workdir: `C:\laragon\www\website-garam`

Visit `http://127.0.0.1:8000`. Page should load with "Home Page — Coming Soon" and no errors in browser console.

---

### Task 4: Navbar Component

**Files:**
- Create: `resources/views/components/navbar.blade.php`

**Interfaces:**
- Consumes: `request()->routeIs()` for active link detection
- Produces: Sticky/translucent navbar with mobile menu (Alpine.js)
- Used by: `layouts/app.blade.php`

**Steps:**

- [ ] **Step 1: Create components/navbar.blade.php**

```blade
<header x-data="{ scrolled: false, mobileOpen: false }"
    @scroll.window="scrolled = (window.scrollY > 50)"
    :class="scrolled ? 'bg-white/95 backdrop-blur-md shadow-sm' : 'bg-transparent'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">

    <div class="container-custom">
        <nav class="flex items-center justify-between h-16 lg:h-20">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-sm">GN</span>
                </div>
                <span class="text-lg font-bold"
                    :class="scrolled ? 'text-dark' : 'text-white'">
                    Garam Nusantara
                </span>
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden lg:flex items-center gap-8">
                @php
                    $navLinks = [
                        ['route' => 'home', 'label' => 'Home', 'url' => route('home')],
                        ['route' => 'about', 'label' => 'Tentang Kami', 'url' => route('about')],
                        ['route' => 'products', 'label' => 'Produk', 'url' => route('products')],
                        ['route' => 'articles', 'label' => 'Artikel', 'url' => route('articles')],
                        ['route' => 'contact', 'label' => 'Kontak', 'url' => route('contact')],
                    ];
                @endphp

                @foreach($navLinks as $link)
                    <a href="{{ $link['url'] }}"
                        class="text-sm font-medium transition-colors duration-300
                            {{ request()->routeIs($link['route']) ? 'text-primary' : (scrolled ? 'text-dark hover:text-primary' : 'text-white/90 hover:text-white') }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach

                <a href="{{ route('contact') }}" class="btn-primary text-sm !py-2 !px-5">
                    Hubungi Kami
                </a>
            </div>

            {{-- Mobile Hamburger --}}
            <button @click="mobileOpen = !mobileOpen"
                class="lg:hidden p-2 rounded-lg"
                :class="scrolled ? 'text-dark' : 'text-white'">
                <svg x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="mobileOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </nav>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="mobileOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        @click.away="mobileOpen = false"
        class="lg:hidden bg-white shadow-lg border-t border-light-gray">

        <div class="container-custom py-4 space-y-1">
            @foreach($navLinks as $link)
                <a href="{{ $link['url'] }}"
                    @click="mobileOpen = false"
                    class="block px-4 py-3 rounded-lg text-sm font-medium transition-colors
                        {{ request()->routeIs($link['route']) ? 'bg-primary/10 text-primary' : 'text-dark hover:bg-light' }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
            <a href="{{ route('contact') }}" @click="mobileOpen = false"
                class="block btn-primary text-center mt-3">
                Hubungi Kami
            </a>
        </div>
    </div>
</header>
```

File: `resources/views/components/navbar.blade.php`

- [ ] **Step 2: Verify — page loads with navbar, scroll changes color, mobile menu works**

Visit homepage. Navbar should be transparent on top, turn solid white on scroll. Mobile hamburger menu opens/closes.

---

### Task 5: Footer Component

**Files:**
- Create: `resources/views/components/footer.blade.php`

**Interfaces:**
- Consumes: route URLs from `routes/web.php`
- Produces: 4-column footer + copyright bar
- Used by: `layouts/app.blade.php`

**Steps:**

- [ ] **Step 1: Create components/footer.blade.php**

```blade
<footer class="bg-dark text-white">
    <div class="container-custom section-padding">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">

            {{-- Column 1: Brand --}}
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-sm">GN</span>
                    </div>
                    <span class="text-lg font-bold">Garam Nusantara</span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed mb-4">
                    Penyedia produk garam berkualitas tinggi untuk kebutuhan industri dan konsumen di seluruh Indonesia.
                </p>
                <div class="flex gap-3">
                    @foreach(['facebook', 'instagram', 'twitter'] as $social)
                        <a href="#" class="w-9 h-9 rounded-lg bg-white/10 flex items-center justify-center hover:bg-primary transition-colors duration-300">
                            <i data-lucide="{{ $social }}" class="w-4 h-4"></i>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Column 2: Quick Links --}}
            <div>
                <h3 class="font-semibold mb-4">Menu Cepat</h3>
                <ul class="space-y-2">
                    @foreach([
                        ['url' => route('home'), 'label' => 'Home'],
                        ['url' => route('about'), 'label' => 'Tentang Kami'],
                        ['url' => route('products'), 'label' => 'Produk'],
                        ['url' => route('articles'), 'label' => 'Artikel'],
                        ['url' => route('contact'), 'label' => 'Kontak'],
                    ] as $link)
                        <li>
                            <a href="{{ $link['url'] }}" class="text-gray-400 text-sm hover:text-primary transition-colors duration-300">
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Column 3: Contact --}}
            <div>
                <h3 class="font-semibold mb-4">Kontak</h3>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li class="flex items-start gap-3">
                        <i data-lucide="map-pin" class="w-4 h-4 mt-0.5 text-primary flex-shrink-0"></i>
                        <span>Jl. Raya Pantai No. 123, Jakarta Utara</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i data-lucide="phone" class="w-4 h-4 mt-0.5 text-primary flex-shrink-0"></i>
                        <span>+62 21 1234 5678</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i data-lucide="mail" class="w-4 h-4 mt-0.5 text-primary flex-shrink-0"></i>
                        <span>info@garamnusantara.co.id</span>
                    </li>
                </ul>
            </div>

            {{-- Column 4: Hours --}}
            <div>
                <h3 class="font-semibold mb-4">Jam Operasional</h3>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li class="flex justify-between">
                        <span>Senin - Jumat</span>
                        <span>08:00 - 17:00</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Sabtu</span>
                        <span>08:00 - 13:00</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Minggu</span>
                        <span class="text-red-400">Libur</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    {{-- Copyright --}}
    <div class="border-t border-white/10">
        <div class="container-custom py-4 flex flex-col sm:flex-row justify-between items-center gap-2 text-sm text-gray-500">
            <span>&copy; {{ date('Y') }} Garam Nusantara. All rights reserved.</span>
            <span>Designed with <i data-lucide="heart" class="w-3 h-3 inline text-red-400"></i></span>
        </div>
    </div>
</footer>
```

File: `resources/views/components/footer.blade.php`

- [ ] **Step 2: Verify — footer renders at bottom of any page**

Visit any page. Footer should appear at bottom with 4-column layout on desktop, stacked on mobile.

---

### Task 6: Reusable Blade Components (Section Heading + Product Card + Article Card)

**Files:**
- Create: `resources/views/components/section-heading.blade.php`
- Create: `resources/views/components/product-card.blade.php`
- Create: `resources/views/components/article-card.blade.php`

**Interfaces:**
- `x-section-heading`: Props `$title` (string), `$subtitle` (string, optional)
- `x-product-card`: Props `$product` (array: slug, name, category, weight, description, image)
- `x-article-card`: Props `$article` (array: slug, title, excerpt, category, date, image)

**Steps:**

- [ ] **Step 1: Create components/section-heading.blade.php**

```blade
@props(['title', 'subtitle' => ''])

<div class="text-center mb-12 lg:mb-16" data-aos="fade-up">
    <p class="text-primary font-medium text-sm uppercase tracking-wider mb-2">{{ $subtitle }}</p>
    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-dark">{{ $title }}</h2>
</div>
```

File: `resources/views/components/section-heading.blade.php`

- [ ] **Step 2: Create components/product-card.blade.php**

```blade
@props(['product'])

<a href="{{ route('product-detail', $product['slug']) }}"
    class="group block bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1 overflow-hidden"
    data-aos="fade-up">

    <div class="overflow-hidden">
        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}"
            class="w-full h-48 sm:h-56 object-cover group-hover:scale-105 transition-transform duration-500">
    </div>

    <div class="p-5">
        <span class="inline-block px-2.5 py-1 bg-primary/10 text-primary text-xs font-medium rounded-lg mb-2">
            {{ $product['category'] }}
        </span>

        <h3 class="font-semibold text-dark group-hover:text-primary transition-colors duration-300 mb-1">
            {{ $product['name'] }}
        </h3>

        <span class="inline-block text-xs text-gray-500 mb-2">{{ $product['weight'] }}</span>

        <p class="text-sm text-gray-500 line-clamp-2 mb-3">{{ $product['description'] }}</p>

        <span class="inline-flex items-center gap-1 text-sm font-medium text-primary">
            Lihat Detail
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </span>
    </div>
</a>
```

File: `resources/views/components/product-card.blade.php`

- [ ] **Step 3: Create components/article-card.blade.php**

```blade
@props(['article'])

<a href="#"
    class="group block bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1 overflow-hidden"
    data-aos="fade-up">

    <div class="overflow-hidden">
        <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}"
            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
    </div>

    <div class="p-5">
        <span class="inline-block px-2.5 py-1 bg-primary/10 text-primary text-xs font-medium rounded-lg mb-2">
            {{ $article['category'] }}
        </span>

        <h3 class="font-semibold text-dark group-hover:text-primary transition-colors duration-300 mb-2 line-clamp-2">
            {{ $article['title'] }}
        </h3>

        <p class="text-sm text-gray-500 line-clamp-2 mb-3">{{ $article['excerpt'] }}</p>

        <div class="flex items-center gap-2 text-xs text-gray-400">
            <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
            <span>{{ $article['date'] }}</span>
        </div>
    </div>
</a>
```

File: `resources/views/components/article-card.blade.php`

- [ ] **Step 4: Verify — components render in any Blade view**

Temporarily add to home.blade.php:
```blade
@section('content')
<section class="section-padding container-custom">
    <x-section-heading title="Test Heading" subtitle="Test" />
    <x-product-card :product="['slug'=>'test','name'=>'Test Product','category'=>'Garam Halus','weight'=>'1kg','description'=>'Test description','image'=>'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=600']" />
    <x-article-card :article="['slug'=>'test','title'=>'Test Article','excerpt'=>'Test excerpt','category'=>'Tips','date'=>'2026-01-01','image'=>'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=600']" />
</section>
@endsection
```

Visit homepage. All three components should render correctly.

---

### Task 7: Home Hero Section

**Files:**
- Create: `resources/views/partials/hero.blade.php`

**Interfaces:**
- Produces: Full-screen Swiper hero with gradient overlay, title, tagline, CTAs

**Steps:**

- [ ] **Step 1: Create partials/hero.blade.php**

```blade
<section class="relative min-h-screen flex items-center overflow-hidden">
    {{-- Swiper Background --}}
    <div class="swiper hero-swiper absolute inset-0 z-0">
        <div class="swiper-wrapper">
            @foreach([
                'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1920',
                'https://images.unsplash.com/photo-1560493676-04071c5f467b?w=1920',
                'https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=1920',
            ] as $img)
                <div class="swiper-slide">
                    <img src="{{ $img }}" alt="Tambak Garam" class="w-full h-full object-cover">
                </div>
            @endforeach
        </div>
    </div>

    {{-- Gradient Overlay --}}
    <div class="absolute inset-0 z-10 bg-gradient-to-r from-dark/80 via-dark/60 to-primary/40"></div>

    {{-- Content --}}
    <div class="relative z-20 container-custom py-20">
        <div class="max-w-2xl">
            <h1 class="text-3xl sm:text-5xl lg:text-7xl font-bold text-white leading-tight mb-4 sm:mb-6"
                data-aos="fade-up">
                Solusi Garam<br>
                <span class="text-primary-light">Berkualitas Terbaik</span>
            </h1>
            <p class="text-lg sm:text-xl text-gray-200 mb-6 sm:mb-8 max-w-lg"
                data-aos="fade-up" data-aos-delay="100">
                Menyediakan garam murni untuk kebutuhan industri dan konsumen dengan standar kualitas tertinggi.
            </p>
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4"
                data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('products') }}" class="btn-primary">
                    Lihat Produk
                </a>
                <a href="{{ route('contact') }}" class="btn-outline">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>

    {{-- Scroll Down Indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 animate-bounce">
        <a href="#features" class="text-white/70 hover:text-white transition-colors">
            <i data-lucide="chevrons-down" class="w-6 h-6"></i>
        </a>
    </div>
</section>

@push('scripts')
<script>
    new Swiper('.hero-swiper', {
        loop: true,
        effect: 'fade',
        fadeEffect: { crossFade: true },
        autoplay: { delay: 5000, disableOnInteraction: false },
        speed: 1000,
    });
</script>
@endpush
```

File: `resources/views/partials/hero.blade.php`

- [ ] **Step 2: Verify — hero loads with slider, CTAs, scroll indicator**

Visit homepage. Hero should be full-screen, slider auto-plays, buttons work.

---

### Task 8: Home Features + About Preview Sections

**Files:**
- Create: `resources/views/partials/features.blade.php`
- Create: `resources/views/partials/about-preview.blade.php`

**Steps:**

- [ ] **Step 1: Create partials/features.blade.php**

```blade
<section id="features" class="section-padding bg-light">
    <div class="container-custom">
        <x-section-heading title="Mengapa Memilih Kami" subtitle="Keunggulan" />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $features = [
                    ['icon' => 'badge-check', 'title' => 'Produk Berkualitas', 'desc' => 'Garam diproses dengan standar ISO untuk menjamin mutu terbaik.'],
                    ['icon' => 'shield-check', 'title' => 'Higienis', 'desc' => 'Diproses di fasilitas bersertifikat dengan kontrol kualitas ketat.'],
                    ['icon' => 'truck', 'title' => 'Distribusi Cepat', 'desc' => 'Jaringan distribusi luas ke seluruh wilayah Indonesia.'],
                    ['icon' => 'tag', 'title' => 'Harga Kompetitif', 'desc' => 'Harga terjangkau tanpa mengorbankan kualitas produk.'],
                ];
            @endphp

            @foreach($features as $index => $feature)
                <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 text-center"
                    data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="{{ $feature['icon'] }}" class="w-7 h-7 text-primary"></i>
                    </div>
                    <h3 class="font-semibold text-dark mb-2">{{ $feature['title'] }}</h3>
                    <p class="text-sm text-gray-500">{{ $feature['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
```

File: `resources/views/partials/features.blade.php`

- [ ] **Step 2: Create partials/about-preview.blade.php**

```blade
<section class="section-padding">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
            {{-- Image --}}
            <div data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=800"
                    alt="Tentang Garam Nusantara" class="rounded-xl shadow-lg w-full h-80 object-cover">
            </div>

            {{-- Text --}}
            <div data-aos="fade-left">
                <p class="text-primary font-medium text-sm uppercase tracking-wider mb-2">Tentang Kami</p>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-dark mb-4">
                    Pengalaman Bertahun-tahun dalam Garam Berkualitas
                </h2>
                <p class="text-gray-500 leading-relaxed mb-4">
                    Garam Nusantara telah berdiri sejak 2010 dan menjadi salah satu distributor garam terpercaya di Indonesia. Kami berkomitmen menyediakan produk garam terbaik untuk industri makanan, farmasi, hingga konsumen rumah tangga.
                </p>
                <p class="text-gray-500 leading-relaxed mb-6">
                    Dengan jaringan distribusi yang luas dan standar kualitas internasional, kami siap memenuhi kebutuhan garam Anda.
                </p>

                {{-- Stats --}}
                <div class="grid grid-cols-3 gap-4 mb-6">
                    @foreach([
                        ['number' => '15+', 'label' => 'Tahun Pengalaman'],
                        ['number' => '50+', 'label' => 'Produk Garam'],
                        ['number' => '1000+', 'label' => 'Klien Puas'],
                    ] as $stat)
                        <div>
                            <div class="text-2xl sm:text-3xl font-bold text-primary">{{ $stat['number'] }}</div>
                            <div class="text-xs text-gray-400">{{ $stat['label'] }}</div>
                        </div>
                    @endforeach
                </div>

                <a href="{{ route('about') }}" class="btn-primary">
                    Selengkapnya
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
        </div>
    </div>
</section>
```

File: `resources/views/partials/about-preview.blade.php`

- [ ] **Step 3: Verify — both sections render with AOS animations**

Scroll down homepage. Features should appear as 4 cards. About preview should show image + text side by side.

---

### Task 9: Home Featured Products + Process + Testimonials + CTA

**Files:**
- Create: `resources/views/partials/featured-products.blade.php`
- Create: `resources/views/partials/process.blade.php`
- Create: `resources/views/partials/testimonials.blade.php`
- Create: `resources/views/partials/cta.blade.php`

**Steps:**

- [ ] **Step 1: Create partials/featured-products.blade.php**

```blade
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
```

File: `resources/views/partials/featured-products.blade.php`

- [ ] **Step 2: Create partials/process.blade.php**

```blade
<section class="section-padding bg-light">
    <div class="container-custom">
        <x-section-heading title="Proses Produksi" subtitle="Dari Tambak ke Meja Anda" />

        <div class="relative max-w-3xl mx-auto">
            {{-- Vertical Line --}}
            <div class="hidden sm:block absolute left-8 lg:left-1/2 top-0 bottom-0 w-0.5 bg-primary/20 -translate-x-1/2"></div>

            @php
                $steps = [
                    ['number' => '01', 'icon' => 'droplets', 'title' => 'Penguapan Air Laut', 'desc' => 'Air laut dipompa ke tambak dan dipanaskan matahari hingga mengkristal.'],
                    ['number' => '02', 'icon' => 'gem', 'title' => 'Kristalisasi Garam', 'desc' => 'Kristal garam terbentuk dan dipisahkan dari larutan sisa.'],
                    ['number' => '03', 'icon' => 'sparkles', 'title' => 'Pengolahan & Pencucian', 'desc' => 'Garam dicuci dan difermentasi untuk menghilangkan kotoran.'],
                    ['number' => '04', 'icon' => 'package', 'title' => 'Pengemasan & Distribusi', 'desc' => 'Garam dikemas sesuai standar dan siap didistribusikan ke seluruh Indonesia.'],
                ];
            @endphp

            @foreach($steps as $index => $step)
                <div class="relative flex items-start gap-6 sm:gap-8 mb-10 last:mb-0"
                    data-aos="fade-up" data-aos-delay="{{ $index * 150 }}">

                    {{-- Number Badge --}}
                    <div class="relative z-10 flex-shrink-0 w-16 h-16 bg-primary rounded-xl flex items-center justify-center shadow-lg shadow-primary/20">
                        <span class="text-white font-bold text-lg">{{ $step['number'] }}</span>
                    </div>

                    {{-- Content --}}
                    <div class="bg-white p-5 rounded-xl shadow-sm flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <i data-lucide="{{ $step['icon'] }}" class="w-5 h-5 text-primary"></i>
                            <h3 class="font-semibold text-dark">{{ $step['title'] }}</h3>
                        </div>
                        <p class="text-sm text-gray-500">{{ $step['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
```

File: `resources/views/partials/process.blade.php`

- [ ] **Step 3: Create partials/testimonials.blade.php**

```blade
<section class="section-padding">
    <div class="container-custom">
        <x-section-heading title="Testimoni" subtitle="Apa Kata Pelanggan Kami" />

        <div class="swiper testimonial-swiper">
            <div class="swiper-wrapper pb-12">
                @php
                    $testimonials = [
                        ['name' => 'Budi Santoso', 'role' => 'PT. Makanan Sehat', 'text' => 'Kualitas garam dari Garam Nusantara sangat konsisten. Kami sudah bekerja sama selama 5 tahun dan tidak pernah kecewa.', 'rating' => 5],
                        ['name' => 'Siti Rahayu', 'role' => 'Restoran Padang Jaya', 'text' => 'Pengiriman selalu tepat waktu dan kualitas garamnya terbaik. Sangat direkomendasikan untuk bisnis kuliner.', 'rating' => 5],
                        ['name' => 'Ahmad Fauzi', 'role' => 'Distributor Garam Jatim', 'text' => 'Harga kompetitif dengan kualitas premium. Klien kami juga puas dengan produk dari Garam Nusantara.', 'rating' => 5],
                    ];
                @endphp

                @foreach($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="bg-white p-6 rounded-xl shadow-sm border border-light-gray h-full">
                            <i data-lucide="quote" class="w-8 h-8 text-primary/20 mb-3"></i>
                            <p class="text-gray-600 text-sm leading-relaxed mb-4">"{{ $testimonial['text'] }}"</p>
                            <div class="flex gap-0.5 mb-3">
                                @for($i = 0; $i < $testimonial['rating']; $i++)
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                                @endfor
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                    <span class="text-primary font-semibold text-sm">{{ substr($testimonial['name'], 0, 1) }}</span>
                                </div>
                                <div>
                                    <div class="font-medium text-dark text-sm">{{ $testimonial['name'] }}</div>
                                    <div class="text-xs text-gray-400">{{ $testimonial['role'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination !bottom-0"></div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    new Swiper('.testimonial-swiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: { el: '.swiper-pagination', clickable: true },
        autoplay: { delay: 4000, disableOnInteraction: false },
        breakpoints: {
            640: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
    });
</script>
@endpush
```

File: `resources/views/partials/testimonials.blade.php`

- [ ] **Step 4: Create partials/cta.blade.php**

```blade
<section class="section-padding bg-gradient-to-r from-primary to-dark">
    <div class="container-custom text-center" data-aos="zoom-in">
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white mb-4">
            Siap Memesan Garam Berkualitas?
        </h2>
        <p class="text-white/80 text-lg max-w-xl mx-auto mb-8">
            Hubungi kami sekarang untuk pemesanan dan konsultasi kebutuhan garam Anda.
        </p>
        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white text-primary font-semibold rounded-xl hover:bg-light transition-all duration-300">
            Hubungi Kami
            <i data-lucide="arrow-right" class="w-5 h-5"></i>
        </a>
    </div>
</section>
```

File: `resources/views/partials/cta.blade.php`

- [ ] **Step 5: Verify — all 4 sections render correctly**

Scroll through homepage. Featured products show 3 cards. Process shows 4-step timeline. Testimonials show 3-card slider. CTA shows gradient banner.

---

### Task 10: Assemble Home Page

**Files:**
- Rewrite: `resources/views/pages/home.blade.php`

**Steps:**

- [ ] **Step 1: Rewrite pages/home.blade.php**

```blade
@extends('layouts.app')

@section('meta_title', 'Beranda — Garam Nusantara')
@section('meta_description', 'Garam Nusantara menyediakan produk garam berkualitas tinggi untuk kebutuhan industri dan konsumen.')

@section('content')
    @include('partials.hero')
    @include('partials.features')
    @include('partials.about-preview')
    @include('partials.featured-products')
    @include('partials.process')
    @include('partials.testimonials')
    @include('partials.cta')
@endsection
```

File: `resources/views/pages/home.blade.php`

- [ ] **Step 2: Verify — full homepage renders end-to-end**

Visit `http://127.0.0.1:8000`. All 7 sections should render in order: Hero → Features → About → Products → Process → Testimonials → CTA. Navbar scroll works, footer appears, AOS animations trigger, sliders auto-play.

---

### Task 11: About Page

**Files:**
- Create: `resources/views/pages/about.blade.php`
- Modify: `app/Http/Controllers/PageController.php` (add dummy data)

**Steps:**

- [ ] **Step 1: Add dummy data to PageController::about()**

```php
public function about()
{
    $company = [
        'founded' => 2010,
        'description' => 'Garam Nusantara didirikan pada tahun 2010 di Jakarta Utara dengan visi menjadi distributor garam terpercaya di Indonesia. Berawal dari tambak garam tradisional, kami berkembang menjadi perusahaan modern dengan jaringan distribusi ke seluruh Indonesia.',
        'history' => 'Perjalanan kami dimulai dari sebuah tambak kecil di pesisir utara Jakarta. Dengan kegigihan dan komitmen terhadap kualitas, kami berhasil memperluas pasar hingga ke pulau-pulau besar di Indonesia. Pada tahun 2015, kami membangun pabrik pengolahan garam bersertifikat ISO. Hingga kini, kami melayani lebih dari 1000 klien dari berbagai sektor industri.',
        'vision' => 'Menjadi perusahaan garam terdepan di Indonesia yang terkenal akan kualitas, inovasi, dan keberlanjutan.',
        'mission' => [
            'Menyediakan produk garam berkualitas tinggi yang memenuhi standar nasional dan internasional.',
            'Mengembangkan teknologi pengolahan garam yang ramah lingkungan.',
            'Membangun jaringan distribusi yang efisien ke seluruh Indonesia.',
            'Memberdayakan petak garam lokal melalui program kemitraan.',
        ],
        'values' => [
            ['icon' => 'shield-check', 'title' => 'Integritas', 'desc' => 'Kejujuran dalam setiap aspek bisnis.'],
            ['icon' => 'gem', 'title' => 'Kualitas', 'desc' => 'Standar tertanam dalam setiap produk.'],
            ['icon' => 'lightbulb', 'title' => 'Inovasi', 'desc' => 'Terus berkembang mengikuti perkembangan zaman.'],
            ['icon' => 'leaf', 'title' => 'Keberlanjutan', 'desc' => 'Produksi ramah lingkungan untuk masa depan.'],
            ['icon' => 'users', 'title' => 'Pelanggan', 'desc' => 'Kepuasan pelanggan adalah prioritas utama.'],
            ['icon' => 'award', 'title' => 'Profesionalisme', 'desc' => 'Standar kerja tinggi dalam setiap proses.'],
        ],
        'timeline' => [
            ['year' => '2010', 'event' => 'Pendirian perusahaan dan awal operasi tambak garam.'],
            ['year' => '2012', 'event' => 'Ekspansi ke pasar Jawa dan Sumatera.'],
            ['year' => '2015', 'event' => 'Pembangunan pabrik pengolahan bersertifikat ISO.'],
            ['year' => '2018', 'event' => 'Peluncuran lini produk garam premium.'],
            ['year' => '2020', 'event' => 'Jaringan distribusi mencakup seluruh Indonesia.'],
            ['year' => '2023', 'event' => 'Meraih penghargaan Usaha Garam Nasional.'],
        ],
        'gallery' => [
            'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=600',
            'https://images.unsplash.com/photo-1560493676-04071c5f467b?w=600',
            'https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=600',
            'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=600',
            'https://images.unsplash.com/photo-1471943311424-646960669fbc?w=600',
            'https://images.unsplash.com/photo-1518110925495-5fe2eb8e0a05?w=600',
        ],
    ];

    return view('pages.about', compact('company'));
}
```

File: `app/Http/Controllers/PageController.php`

- [ ] **Step 2: Create pages/about.blade.php**

```blade
@extends('layouts.app')

@section('meta_title', 'Tentang Kami — Garam Nusantara')
@section('meta_description', 'Kenali lebih dekat Garam Nusantara, perusahaan garam terpercaya sejak 2010.')

@section('content')
{{-- Banner --}}
<section class="relative py-24 bg-gradient-to-br from-dark to-primary/80 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1920" class="w-full h-full object-cover" alt="">
    </div>
    <div class="relative container-custom text-center">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-3">Tentang Kami</h1>
        <div class="flex items-center justify-center gap-2 text-sm text-white/70">
            <a href="{{ route('home') }}" class="hover:text-white">Home</a>
            <span>/</span>
            <span>Tentang Kami</span>
        </div>
    </div>
</section>

{{-- Profil --}}
<section class="section-padding">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
            <div data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=800" alt="Profil Perusahaan" class="rounded-xl shadow-lg w-full h-80 object-cover">
            </div>
            <div data-aos="fade-left">
                <p class="text-primary font-medium text-sm uppercase tracking-wider mb-2">Profil Perusahaan</p>
                <h2 class="text-2xl sm:text-3xl font-bold text-dark mb-4">Garam Nusantara</h2>
                <p class="text-gray-500 leading-relaxed mb-4">{{ $company['description'] }}</p>
            </div>
        </div>
    </div>
</section>

{{-- Sejarah --}}
<section class="section-padding bg-light">
    <div class="container-custom max-w-3xl text-center" data-aos="fade-up">
        <p class="text-primary font-medium text-sm uppercase tracking-wider mb-2">Sejarah</p>
        <h2 class="text-2xl sm:text-3xl font-bold text-dark mb-6">Perjalanan Kami</h2>
        <p class="text-gray-500 leading-relaxed">{{ $company['history'] }}</p>
    </div>
</section>

{{-- Visi Misi --}}
<section class="section-padding">
    <div class="container-custom">
        <x-section-heading title="Visi & Misi" />
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
            <div class="bg-primary rounded-xl p-8 text-white" data-aos="fade-right">
                <h3 class="text-xl font-bold mb-4">Visi</h3>
                <p class="text-white/90 leading-relaxed">{{ $company['vision'] }}</p>
            </div>
            <div class="bg-white border border-light-gray rounded-xl p-8" data-aos="fade-left">
                <h3 class="text-xl font-bold text-dark mb-4">Misi</h3>
                <ol class="space-y-3">
                    @foreach($company['mission'] as $index => $item)
                        <li class="flex items-start gap-3 text-sm text-gray-600">
                            <span class="flex-shrink-0 w-6 h-6 bg-primary/10 text-primary rounded-full flex items-center justify-center text-xs font-bold">{{ $index + 1 }}</span>
                            {{ $item }}
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</section>

{{-- Nilai --}}
<section class="section-padding bg-light">
    <div class="container-custom">
        <x-section-heading title="Nilai Perusahaan" subtitle="Prinsip yang kami pegang" />
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">
            @foreach($company['values'] as $index => $value)
                <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 text-center"
                    data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <i data-lucide="{{ $value['icon'] }}" class="w-6 h-6 text-primary"></i>
                    </div>
                    <h3 class="font-semibold text-dark mb-1">{{ $value['title'] }}</h3>
                    <p class="text-sm text-gray-500">{{ $value['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Timeline --}}
<section class="section-padding">
    <div class="container-custom">
        <x-section-heading title="Timeline Perjalanan" subtitle="Milestone penting kami" />
        <div class="relative max-w-3xl mx-auto">
            <div class="hidden sm:block absolute left-8 lg:left-1/2 top-0 bottom-0 w-0.5 bg-primary/20 -translate-x-1/2"></div>
            @foreach($company['timeline'] as $index => $item)
                <div class="relative flex items-start gap-6 sm:gap-8 mb-8 last:mb-0"
                    data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="relative z-10 flex-shrink-0 w-16 h-16 bg-primary rounded-xl flex items-center justify-center shadow-lg shadow-primary/20">
                        <span class="text-white font-bold text-sm">{{ $item['year'] }}</span>
                    </div>
                    <div class="bg-white p-5 rounded-xl shadow-sm flex-1 border border-light-gray">
                        <p class="text-gray-600 text-sm">{{ $item['event'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Gallery --}}
<section class="section-padding bg-light">
    <div class="container-custom">
        <x-section-heading title="Galeri Perusahaan" subtitle="Lihat aktivitas kami" />
        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4">
            @foreach($company['gallery'] as $img)
                <div class="overflow-hidden rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-300 group"
                    data-aos="fade-up">
                    <img src="{{ $img }}" alt="Galeri Perusahaan"
                        class="w-full h-40 sm:h-56 object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('partials.cta')
@endsection
```

File: `resources/views/pages/about.blade.php`

- [ ] **Step 3: Verify — about page renders with all sections**

Visit `/tentang`. Banner, profil, sejarah, visi-misi, nilai, timeline, gallery should all render.

---

### Task 12: Products Page + Product Detail Page

**Files:**
- Modify: `app/Http/Controllers/PageController.php` (add dummy products data)

**Steps:**

- [ ] **Step 1: Add dummy data to PageController::products() and productDetail()**

```php
public function products()
{
    $products = [
        ['slug' => 'garam-halus-premium-1kg', 'name' => 'Garam Halus Premium 1kg', 'category' => 'Garam Halus', 'weight' => '1 kg', 'description' => 'Garam halus berukuran seragam untuk kebutuhan dapur dan industri makanan.', 'image' => 'https://images.unsplash.com/photo-1518110925495-5fe2eb8e0a05?w=600'],
        ['slug' => 'garam-halus-premium-5kg', 'name' => 'Garam Halus Premium 5kg', 'category' => 'Garam Halus', 'weight' => '5 kg', 'description' => 'Kemasan ekonomis untuk usaha kuliner dan industri skala menengah.', 'image' => 'https://images.unsplash.com/photo-1518110925495-5fe2eb8e0a05?w=600'],
        ['slug' => 'garam-kasar-industri-25kg', 'name' => 'Garam Kasar Industri 25kg', 'category' => 'Garam Kasar', 'weight' => '25 kg', 'description' => 'Garam kasar untuk proses pengolahan industri, konstruksi, dan pertambakan.', 'image' => 'https://images.unsplash.com/photo-1471943311424-646960669fbc?w=600'],
        ['slug' => 'garam-krosok-murni-5kg', 'name' => 'Garam Krosok Murni 5kg', 'category' => 'Garam Krosok', 'weight' => '5 kg', 'description' => 'Garam krosok asli tambak untuk keperluan pengasinan dan konsumsi.', 'image' => 'https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=600'],
        ['slug' => 'garam-industri-50kg', 'name' => 'Garam Industri 50kg', 'category' => 'Garam Industri', 'weight' => '50 kg', 'description' => 'Garam bersih untuk kebutuhan industri kimia dan farmasi.', 'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=600'],
        ['slug' => 'garam-meja-500g', 'name' => 'Garam Meja 500g', 'category' => 'Garam Halus', 'weight' => '500 g', 'description' => 'Garam meja beriodium untuk konsumsi rumah tangga.', 'image' => 'https://images.unsplash.com/photo-1560493676-04071c5f467b?w=600'],
    ];

    $categories = ['Semua', 'Garam Halus', 'Garam Kasar', 'Garam Krosok', 'Garam Industri'];

    return view('pages.products', compact('products', 'categories'));
}

public function productDetail(string $slug)
{
    $product = [
        'slug' => $slug,
        'name' => 'Garam Halus Premium 1kg',
        'category' => 'Garam Halus',
        'weight' => '1 kg',
        'description' => 'Garam halus premium diproses dari air laut murni menggunakan teknologi modern. Ukuran kristal seragam, cocok untuk kebutuhan dapur rumah tangga maupun industri makanan. Beapat bahan pengawet dan pewarna buatan.',
        'specifications' => [
            'Jenis' => 'Garam Halus',
            'Kemasan' => 'Plastik kedap udara',
            'Berat Bersih' => '1 kg',
            'Sertifikasi' => 'ISO 22000, Halal MUI',
            'Umur Simpan' => '24 bulan',
        ],
        'benefits' => [
            'Tinggi mineral alami (natrium, kalsium, magnesium)',
            'Tanpa bahan pengawet',
            'Cocok untuk semua jenis masakan',
            'Kristal halus, mudah larut',
            'Kemasan kedap udara menjaga kesegaran',
        ],
        'gallery' => [
            'https://images.unsplash.com/photo-1518110925495-5fe2eb8e0a05?w=800',
            'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=800',
            'https://images.unsplash.com/photo-1471943311424-646960669fbc?w=800',
        ],
        'related' => [
            ['slug' => 'garam-halus-premium-5kg', 'name' => 'Garam Halus Premium 5kg', 'category' => 'Garam Halus', 'weight' => '5 kg', 'description' => 'Kemasan ekonomis untuk usaha kuliner.', 'image' => 'https://images.unsplash.com/photo-1518110925495-5fe2eb8e0a05?w=600'],
            ['slug' => 'garam-krosok-murni-5kg', 'name' => 'Garam Krosok Murni 5kg', 'category' => 'Garam Krosok', 'weight' => '5 kg', 'description' => 'Garam krosok asli tambak.', 'image' => 'https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=600'],
            ['slug' => 'garam-meja-500g', 'name' => 'Garam Meja 500g', 'category' => 'Garam Halus', 'weight' => '500 g', 'description' => 'Garam meja beriodium.', 'image' => 'https://images.unsplash.com/photo-1560493676-04071c5f467b?w=600'],
        ],
    ];

    return view('pages.product-detail', compact('product', 'slug'));
}
```

File: `app/Http/Controllers/PageController.php`

- [ ] **Step 2: Create pages/products.blade.php**

```blade
@extends('layouts.app')

@section('meta_title', 'Produk — Garam Nusantara')
@section('meta_description', 'Daftar produk garam berkualitas dari Garam Nusantara.')

@section('content')
<section class="relative py-24 bg-gradient-to-br from-dark to-primary/80">
    <div class="relative container-custom text-center">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-3">Produk Kami</h1>
        <div class="flex items-center justify-center gap-2 text-sm text-white/70">
            <a href="{{ route('home') }}" class="hover:text-white">Home</a>
            <span>/</span>
            <span>Produk</span>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container-custom" x-data="productFilter()">
        {{-- Toolbar --}}
        <div class="flex flex-col sm:flex-row gap-4 mb-8" data-aos="fade-up">
            <div class="flex-1">
                <input type="text" x-model="search" placeholder="Cari produk..."
                    class="w-full px-4 py-3 border border-light-gray rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none">
            </div>
            <div class="relative">
                <select x-model="selectedCategory"
                    class="appearance-none w-full sm:w-48 px-4 py-3 border border-light-gray rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none bg-white pr-10 cursor-pointer">
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}">{{ $cat }}</option>
                    @endforeach
                </select>
                <i data-lucide="chevron-down" class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"></i>
            </div>
        </div>

        <p class="text-sm text-gray-400 mb-6" x-text="filtered.length + ' produk ditemukan'"></p>

        {{-- Product Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-6">
            <template x-for="product in filtered" :key="product.slug">
                <a :href="'/produk/' + product.slug"
                    class="group block bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                    <div class="overflow-hidden">
                        <img :src="product.image" :alt="product.name"
                            class="w-full h-48 sm:h-56 object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5">
                        <span class="inline-block px-2.5 py-1 bg-primary/10 text-primary text-xs font-medium rounded-lg mb-2"
                            x-text="product.category"></span>
                        <h3 class="font-semibold text-dark group-hover:text-primary transition-colors duration-300 mb-1"
                            x-text="product.name"></h3>
                        <span class="inline-block text-xs text-gray-500 mb-2" x-text="product.weight"></span>
                        <p class="text-sm text-gray-500 line-clamp-2 mb-3" x-text="product.description"></p>
                        <span class="inline-flex items-center gap-1 text-sm font-medium text-primary">
                            Lihat Detail
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </span>
                    </div>
                </a>
            </template>
        </div>

        {{-- Empty State --}}
        <div x-show="filtered.length === 0" class="text-center py-16">
            <i data-lucide="search-x" class="w-12 h-12 text-gray-300 mx-auto mb-4"></i>
            <p class="text-gray-400">Produk tidak ditemukan.</p>
        </div>
    </div>
</section>

@include('partials.cta')
@endsection

@push('scripts')
<script>
    function productFilter() {
        return {
            search: '',
            selectedCategory: 'Semua',
            products: @json($products),
            get filtered() {
                return this.products.filter(p => {
                    const matchCategory = this.selectedCategory === 'Semua' || p.category === this.selectedCategory;
                    const matchSearch = p.name.toLowerCase().includes(this.search.toLowerCase()) ||
                                        p.description.toLowerCase().includes(this.search.toLowerCase());
                    return matchCategory && matchSearch;
                });
            }
        }
    }
</script>
@endpush
```

File: `resources/views/pages/products.blade.php`

- [ ] **Step 3: Create pages/product-detail.blade.php**

```blade
@extends('layouts.app')

@section('meta_title', $product['name'] . ' — Garam Nusantara')
@section('meta_description', $product['description'])

@section('content')
<section class="pt-24 pb-8">
    <div class="container-custom">
        <div class="flex items-center gap-2 text-sm text-gray-400 mb-6">
            <a href="{{ route('home') }}" class="hover:text-primary">Home</a>
            <span>/</span>
            <a href="{{ route('products') }}" class="hover:text-primary">Produk</a>
            <span>/</span>
            <span class="text-dark">{{ $product['name'] }}</span>
        </div>
    </div>
</section>

<section class="section-padding pt-0">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            {{-- Gallery --}}
            <div data-aos="fade-right" x-data="{ activeImage: 0, images: @json($product['gallery']) }">
                <div class="overflow-hidden rounded-xl mb-3">
                    <img :src="images[activeImage]" :alt="{{ json_encode($product['name']) }}"
                        class="w-full h-80 sm:h-96 object-cover">
                </div>
                <div class="flex gap-2">
                    <template x-for="(img, index) in images" :key="index">
                        <button @click="activeImage = index"
                            class="flex-shrink-0 w-20 h-20 rounded-lg overflow-hidden border-2 transition-all"
                            :class="activeImage === index ? 'border-primary' : 'border-transparent opacity-70 hover:opacity-100'">
                            <img :src="img" alt="" class="w-full h-full object-cover">
                        </button>
                    </template>
                </div>
            </div>

            {{-- Info --}}
            <div data-aos="fade-left">
                <span class="inline-block px-3 py-1 bg-primary/10 text-primary text-sm font-medium rounded-lg mb-3">
                    {{ $product['category'] }}
                </span>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-dark mb-2">{{ $product['name'] }}</h1>
                <span class="inline-block text-gray-400 text-sm mb-4">{{ $product['weight'] }}</span>
                <p class="text-gray-500 leading-relaxed mb-6">{{ $product['description'] }}</p>

                <div class="flex flex-col sm:flex-row gap-3 mb-8">
                    <a href="https://wa.me/6281234567890?text=Halo, saya ingin memesan {{ $product['name'] }}" target="_blank" class="btn-whatsapp">
                        <svg viewBox="0 0 24 24" class="w-5 h-5 fill-current"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Hubungi via WhatsApp
                    </a>
                    <a href="{{ route('contact') }}" class="btn-primary">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>

        {{-- Specs & Benefits --}}
        <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-8" data-aos="fade-up">
            {{-- Specs --}}
            <div class="bg-light rounded-xl p-6">
                <h3 class="font-semibold text-dark mb-4 flex items-center gap-2">
                    <i data-lucide="clipboard-list" class="w-5 h-5 text-primary"></i>
                    Spesifikasi
                </h3>
                <table class="w-full text-sm">
                    <tbody>
                        @foreach($product['specifications'] as $key => $value)
                            <tr class="border-b border-light-gray last:border-0">
                                <td class="py-2 text-gray-500">{{ $key }}</td>
                                <td class="py-2 text-dark font-medium text-right">{{ $value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Benefits --}}
            <div class="bg-light rounded-xl p-6">
                <h3 class="font-semibold text-dark mb-4 flex items-center gap-2">
                    <i data-lucide="check-circle" class="w-5 h-5 text-primary"></i>
                    Manfaat
                </h3>
                <ul class="space-y-2">
                    @foreach($product['benefits'] as $benefit)
                        <li class="flex items-start gap-2 text-sm text-gray-600">
                            <i data-lucide="check" class="w-4 h-4 text-primary mt-0.5 flex-shrink-0"></i>
                            {{ $benefit }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- Related Products --}}
        <div class="mt-16">
            <x-section-heading title="Produk Terkait" />
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($product['related'] as $related)
                    <x-product-card :product="$related" />
                @endforeach
            </div>
        </div>
    </div>
</section>

@include('partials.cta')
@endsection
```

File: `resources/views/pages/product-detail.blade.php`

- [ ] **Step 4: Verify — products list with filter works, detail page loads**

Visit `/produk`. Search and category filter should work interactively. Click a product card → loads detail page with gallery, specs, WhatsApp button, related products.

---

### Task 13: Articles Page

**Files:**
- Modify: `app/Http/Controllers/PageController.php` (add dummy articles data)

**Steps:**

- [ ] **Step 1: Add dummy data to PageController::articles()**

```php
public function articles()
{
    $articles = [
        ['slug' => 'manfaat-garam-konsumsi', 'title' => 'Manfaat Garam untuk Kesehatan Tubuh', 'excerpt' => 'Garam mengandung mineral penting yang dibutuhkan tubuh. Ketahui manfaat dan cara mengonsumsi garam yang benar.', 'category' => 'Kesehatan', 'date' => '15 Juli 2026', 'image' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=600'],
        ['slug' => 'cara-memilih-garam-masak', 'title' => 'Tips Memilih Garam untuk Masakan', 'excerpt' => 'Tidak semua garam cocok untuk semua masakan. Pelajari perbedaan jenis garam dan kapan menggunakannya.', 'category' => 'Tips', 'date' => '10 Juli 2026', 'image' => 'https://images.unsplash.com/photo-1560493676-04071c5f467b?w=600'],
        ['slug' => 'proses-pembuatan-garam-tradisional', 'title' => 'Proses Pembuatan Garam Tradisional', 'excerpt' => 'Mengenal proses pengolahan garam dari tambak tradisional hingga menjadi garam siap pakai.', 'category' => 'Edukasi', 'date' => '5 Juli 2026', 'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=600'],
        ['slug' => 'garam-industri-penggunaan', 'title' => 'Penggunaan Garam dalam Industri', 'excerpt' => 'Garam tidak hanya untuk konsumsi. Industri kimia, farmasi, dan tekstil sangat bergantung pada garam.', 'category' => 'Industri', 'date' => '1 Juli 2026', 'image' => 'https://images.unsplash.com/photo-1471943311424-646960669fbc?w=600'],
        ['slug' => 'standar-kualitas-garam', 'title' => 'Standar Kualitas Garam di Indonesia', 'excerpt' => 'Peraturan dan standar mutu garam yang berlaku di Indonesia, termasuk SNI untuk garam konsumsi.', 'category' => 'Regulasi', 'date' => '25 Juni 2026', 'image' => 'https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=600'],
        ['slug' => 'garam-himalaya-vs-lokal', 'title' => 'Garam Himalaya vs Garam Lokal', 'excerpt' => 'Perbandingan garam Himalaya yang populer dengan garam lokal Indonesia dari segi kandungan mineral dan harga.', 'category' => 'Edukasi', 'date' => '20 Juni 2026', 'image' => 'https://images.unsplash.com/photo-1518110925495-5fe2eb8e0a05?w=600'],
    ];

    return view('pages.articles', compact('articles'));
}
```

File: `app/Http/Controllers/PageController.php`

- [ ] **Step 2: Create pages/articles.blade.php**

```blade
@extends('layouts.app')

@section('meta_title', 'Artikel & Edukasi — Garam Nusantara')
@section('meta_description', 'Artikel edukasi seputar garam, kesehatan, industri, dan tips memilih garam berkualitas.')

@section('content')
<section class="relative py-24 bg-gradient-to-br from-dark to-primary/80">
    <div class="relative container-custom text-center">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-3">Artikel & Edukasi</h1>
        <div class="flex items-center justify-center gap-2 text-sm text-white/70">
            <a href="{{ route('home') }}" class="hover:text-white">Home</a>
            <span>/</span>
            <span>Artikel</span>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container-custom">
        {{-- Featured Article --}}
        @if(isset($articles[0]))
            <a href="#" class="group block bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden mb-10"
                data-aos="fade-up">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="overflow-hidden">
                        <img src="{{ $articles[0]['image'] }}" alt="{{ $articles[0]['title'] }}"
                            class="w-full h-64 md:h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6 lg:p-8 flex flex-col justify-center">
                        <span class="inline-block w-fit px-3 py-1 bg-primary/10 text-primary text-xs font-medium rounded-lg mb-3">
                            {{ $articles[0]['category'] }}
                        </span>
                        <h2 class="text-xl sm:text-2xl font-bold text-dark group-hover:text-primary transition-colors mb-3">
                            {{ $articles[0]['title'] }}
                        </h2>
                        <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ $articles[0]['excerpt'] }}</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2 text-xs text-gray-400">
                                <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                                <span>{{ $articles[0]['date'] }}</span>
                            </div>
                            <span class="inline-flex items-center gap-1 text-sm font-medium text-primary">
                                Baca Selengkapnya
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        @endif

        {{-- Article Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach(array_slice($articles, 1) as $article)
                <x-article-card :article="$article" />
            @endforeach
        </div>
    </div>
</section>

@include('partials.cta')
@endsection
```

File: `resources/views/pages/articles.blade.php`

- [ ] **Step 3: Verify — articles page renders with featured article and grid**

Visit `/artikel`. Featured article shows large horizontal card. Remaining articles show in grid.

---

### Task 14: Contact Page

**Files:**
- Modify: `app/Http/Controllers/PageController.php` (add contact data)

**Steps:**

- [ ] **Step 1: Add dummy data to PageController::contact()**

```php
public function contact()
{
    $contactInfo = [
        'address' => 'Jl. Raya Pantai No. 123, Kel. Muara Baru, Kec. Penjaringan, Jakarta Utara 14470',
        'phone' => '+62 21 1234 5678',
        'whatsapp' => '+62 812 3456 7890',
        'email' => 'info@garamnusantara.co.id',
        'hours' => [
            'Senin - Jumat' => '08:00 - 17:00',
            'Sabtu' => '08:00 - 13:00',
            'Minggu' => 'Libur',
        ],
        'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.7!2d106.8!3d-6.1!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMDYnMDAuMCJTIDEwNsKwNDgnMDAuMCJF!5e0!3m2!1sid!2sid!4v1234567890',
    ];

    return view('pages.contact', compact('contactInfo'));
}
```

File: `app/Http/Controllers/PageController.php`

- [ ] **Step 2: Create pages/contact.blade.php**

```blade
@extends('layouts.app')

@section('meta_title', 'Kontak — Garam Nusantara')
@section('meta_description', 'Hubungi Garam Nusantara untuk pemesanan dan informasi produk garam.')

@section('content')
<section class="relative py-24 bg-gradient-to-br from-dark to-primary/80">
    <div class="relative container-custom text-center">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-3">Hubungi Kami</h1>
        <div class="flex items-center justify-center gap-2 text-sm text-white/70">
            <a href="{{ route('home') }}" class="hover:text-white">Home</a>
            <span>/</span>
            <span>Kontak</span>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-12">

            {{-- Contact Info --}}
            <div class="lg:col-span-2 space-y-6" data-aos="fade-right">
                {{-- Address --}}
                <div class="bg-white p-5 rounded-xl shadow-sm border border-light-gray">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i data-lucide="map-pin" class="w-5 h-5 text-primary"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-dark text-sm mb-1">Alamat</h3>
                            <p class="text-gray-500 text-sm">{{ $contactInfo['address'] }}</p>
                        </div>
                    </div>
                </div>

                {{-- Phone --}}
                <div class="bg-white p-5 rounded-xl shadow-sm border border-light-gray">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i data-lucide="phone" class="w-5 h-5 text-primary"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-dark text-sm mb-1">Telepon</h3>
                            <p class="text-gray-500 text-sm">{{ $contactInfo['phone'] }}</p>
                        </div>
                    </div>
                </div>

                {{-- WhatsApp --}}
                <div class="bg-white p-5 rounded-xl shadow-sm border border-light-gray">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg viewBox="0 0 24 24" class="w-5 h-5 fill-green-500"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-dark text-sm mb-1">WhatsApp</h3>
                            <a href="https://wa.me/6281234567890" target="_blank" class="text-green-500 text-sm hover:underline">
                                {{ $contactInfo['whatsapp'] }}
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Email --}}
                <div class="bg-white p-5 rounded-xl shadow-sm border border-light-gray">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i data-lucide="mail" class="w-5 h-5 text-primary"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-dark text-sm mb-1">Email</h3>
                            <p class="text-gray-500 text-sm">{{ $contactInfo['email'] }}</p>
                        </div>
                    </div>
                </div>

                {{-- Hours --}}
                <div class="bg-white p-5 rounded-xl shadow-sm border border-light-gray">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i data-lucide="clock" class="w-5 h-5 text-primary"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-dark text-sm mb-2">Jam Operasional</h3>
                            <div class="space-y-1">
                                @foreach($contactInfo['hours'] as $day => $hour)
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-500">{{ $day }}</span>
                                        <span class="text-dark font-medium {{ $hour === 'Libur' ? 'text-red-500' : '' }}">{{ $hour }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Social --}}
                <div class="flex gap-3">
                    @foreach(['facebook', 'instagram', 'twitter'] as $social)
                        <a href="#" class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center hover:bg-primary hover:text-white text-primary transition-all duration-300">
                            <i data-lucide="{{ $social }}" class="w-5 h-5"></i>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="lg:col-span-3" data-aos="fade-left">
                <div class="bg-white p-6 lg:p-8 rounded-xl shadow-sm border border-light-gray">
                    <h2 class="text-xl font-bold text-dark mb-6">Kirim Pesan</h2>
                    <form action="#" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium text-dark mb-1.5">Nama</label>
                                <input type="text" name="name" required
                                    class="w-full px-4 py-3 border border-light-gray rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-dark mb-1.5">Email</label>
                                <input type="email" name="email" required
                                    class="w-full px-4 py-3 border border-light-gray rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-dark mb-1.5">Subjek</label>
                            <input type="text" name="subject" required
                                class="w-full px-4 py-3 border border-light-gray rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-dark mb-1.5">Pesan</label>
                            <textarea name="message" rows="5" required
                                class="w-full px-4 py-3 border border-light-gray rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm resize-none"></textarea>
                        </div>
                        <button type="submit" class="btn-primary w-full sm:w-auto">
                            Kirim Pesan
                            <i data-lucide="send" class="w-4 h-4"></i>
                        </button>
                    </form>
                </div>
            </div>

        </div>

        {{-- Google Maps --}}
        <div class="mt-12 rounded-xl overflow-hidden shadow-sm" data-aos="fade-up">
            <iframe
                src="{{ $contactInfo['map_embed'] }}"
                width="100%"
                height="400"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>
@endsection
```

File: `resources/views/pages/contact.blade.php`

- [ ] **Step 3: Verify — contact page renders with info cards, form, map**

Visit `/kontak`. Contact info on left, form on right, Google Maps below. Social icons render.

---

### Task 15: Final Verification & Build

**Steps:**

- [ ] **Step 1: Run Vite build to ensure no errors**

```bash
npm run build
```

Workdir: `C:\laragon\www\website-garam`

Expected: Build succeeds.

- [ ] **Step 2: Run artisan serve and visit all pages**

```bash
php artisan serve
```

Visit each URL and verify:
- `/` — Home: hero, features, about, products, process, testimonials, CTA, footer
- `/tentang` — About: banner, profil, sejarah, visi-misi, nilai, timeline, gallery, CTA
- `/produk` — Products: banner, search/filter, grid, CTA
- `/produk/garam-halus-premium-1kg` — Detail: breadcrumb, gallery, info, specs, benefits, WhatsApp, related, CTA
- `/artikel` — Articles: banner, featured, grid, CTA
- `/kontak` — Contact: banner, info cards, form, social, map

- [ ] **Step 3: Verify responsive design**

Check each page at:
- 375px width (iPhone SE)
- 768px width (iPad)
- 1280px width (desktop)
- 1920px width (large desktop)

Verify: no horizontal overflow, text readable, images scale, grids collapse correctly, navbar mobile menu works, footer stacks on mobile.

- [ ] **Step 4: Check browser console for errors**

Open DevTools console. No JS errors (AOS, Swiper, Alpine should all initialize without errors).

- [ ] **Step 5: Commit all changes**

```bash
git add -A
git commit -m "feat: complete frontend company profile website

- Laravel 13 + Blade + Tailwind CSS v4
- 6 pages: Home, About, Products, Product Detail, Articles, Contact
- Reusable components: navbar, footer, product-card, article-card, section-heading
- AOS animations, Swiper.js sliders, Alpine.js interactivity
- Responsive design (mobile-first)
- SEO meta tags"
```
