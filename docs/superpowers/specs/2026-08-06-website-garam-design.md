# Design Spec: Website Company Profile Garam

**Date:** 2026-08-06  
**Status:** Approved (pending user review)  
**Stack:** Laravel 13 + Blade + PHP 8.5 + Tailwind CSS v4 + MySQL  
**Phase:** Frontend-first (static/dummy data, no backend yet)

---

## 1. Overview

Modern company profile website for a salt (garam) sales company. Frontend-first approach using static/dummy data hardcoded in controller. Backend (database, models, admin dashboard) deferred to later phase.

### Target Audience
- Potential B2B buyers (distributors, wholesalers, food manufacturers)
- General consumers looking for quality salt products

### Design Principles
- Modern, clean, minimalist, professional
- Responsive (desktop, tablet, mobile)
- Generous whitespace
- Smooth scroll animations (AOS)
- SEO-friendly semantic HTML
- Reusable Blade layouts and components

---

## 2. Tech Stack & Dependencies

### Already Installed
- Laravel 13 (with Breeze scaffolding — auth views will be removed)
- Tailwind CSS v4 (via `@tailwindcss/vite`)
- Alpine.js 3
- Vite 8

### To Add (via CDN, no npm install needed)
- **AOS** (Animate On Scroll) — CDN in `<head>`
- **Swiper.js** — CDN for hero slider, product carousel, testimonials
- **Lucide Icons** — CDN for all icons
- **Google Fonts: Sora + Inter** — `@import` in CSS

### To Remove
- `welcome.blade.php`, `dashboard.blade.php`
- `resources/views/auth/` (Breeze auth views)
- `resources/views/profile/` (Breeze profile views)
- `routes/auth.php` (auth routes)

### Tailwind v4 Migration
- Replace `@tailwind base/components/utilities` → `@import "tailwindcss"`
- Move config from `tailwind.config.js` (v3 format) → `@theme` block in `app.css`
- Replace Figtree → Sora (headings) + Inter (body)

---

## 3. Color System (Tailwind v4 `@theme`)

| Token | Hex | Usage |
|-------|-----|-------|
| `--color-primary` | `#0284C7` | Biru Laut — buttons, links, accents, gradients |
| `--color-dark` | `#0F172A` | Biru Tua — headings, footer bg, dark sections |
| `--color-light` | `#F8FAFC` | Abu-abu Muda — section backgrounds, subtle areas |
| `--color-white` | `#FFFFFF` | Card backgrounds, default page bg |

Custom utilities: `bg-primary`, `text-primary`, `bg-dark`, `text-dark`, `bg-light`.

### Font System

| Token | Font | Usage |
|-------|------|-------|
| `--font-heading` | Sora | H1, H2, H3, hero title, section titles, card titles |
| `--font-sans` | Inter | Body text, paragraphs, buttons, nav links, form labels, all non-heading text |

Tailwind v4 setup:
- `@theme { --font-sans: 'Inter', sans-serif; --font-heading: 'Sora', sans-serif; }`
- Base `body` uses `font-sans` (Inter).
- Headings (`h1`-`h6`) use `font-heading` (Sora) via `@layer base`.
- Convenience utility: `.font-heading { font-family: var(--font-heading); }`.

---

## 4. Directory Structure

```
resources/views/
├── layouts/
│   └── app.blade.php              # Master layout: <head>, navbar, footer, scripts
├── components/
│   ├── navbar.blade.php           # Logo + nav links + CTA button
│   ├── footer.blade.php           # 4-column footer + copyright bar
│   ├── product-card.blade.php     # Reusable boxed product card
│   ├── article-card.blade.php     # Reusable article card
│   └── section-heading.blade.php  # Reusable section title + subtitle
├── partials/                       # Home page reusable sections
│   ├── hero.blade.php
│   ├── features.blade.php
│   ├── about-preview.blade.php
│   ├── featured-products.blade.php
│   ├── process.blade.php
│   ├── testimonials.blade.php
│   └── cta.blade.php
└── pages/
    ├── home.blade.php
    ├── about.blade.php
    ├── products.blade.php
    ├── product-detail.blade.php
    ├── articles.blade.php
    └── contact.blade.php
```

---

## 5. Routes

```
GET /                    → PageController@home
GET /tentang             → PageController@about
GET /produk              → PageController@products
GET /produk/{slug}       → PageController@productDetail
GET /artikel             → PageController@articles
GET /kontak              → PageController@contact
```

Single `PageController` with one method per page. All dummy data hardcoded as arrays in controller methods or passed from config. When backend is added later, split into domain controllers with models/migrations.

---

## 6. Global Components

### Navbar (`components/navbar.blade.php`)
- **Transparency:** Transparent over hero section, solid white with shadow on scroll. Toggle via Alpine `x-data` with scroll listener (`window.scrollY > 50`).
- **Left:** Company logo (text or image placeholder).
- **Center/Right:** Nav links — Home, Tentang Kami, Produk, Artikel, Kontak.
- **Right end:** "Hubungi Kami" CTA button (rounded-xl, bg-primary, white text).
- **Active link:** Highlighted via `request()->routeIs('route.name')`.
- **Mobile:** Hamburger icon → slide-down menu (Alpine `x-show` + transition).
  - Menu items stacked, full-width, with CTA button at bottom.

### Footer (`components/footer.blade.php`)
- **4-column layout** (stacks to single column on mobile):
  1. Logo + company short description + social media icons
  2. Quick Links — Home, Tentang, Produk, Artikel, Kontak
  3. Contact info — address, phone, WhatsApp, email
  4. Operational hours / certification note
- **Bottom bar:** Copyright text + "Designed by" line.
- Background: `bg-dark` (Biru Tua). Text: white/gray.

### Section Heading (`components/section-heading.blade.php`)
- Reusable Blade component: `@section`-driven title + subtitle.
- Centered text, small uppercase label (primary color), large heading (dark), subtitle (gray).
- AOS `data-aos="fade-up"` on wrapper.

### Product Card (`components/product-card.blade.php`)
- Boxed card: `rounded-xl`, subtle shadow, hover lift (`hover:-translate-y-1 hover:shadow-lg`).
- Image top (16:9 or square), `rounded-t-xl`, `object-cover`.
- Content padding: category badge (small pill), product name (font-semibold), weight badge, short description (2-line clamp), "Lihat Detail" link with arrow icon.
- Entire card clickable → links to `/produk/{slug}`.
- Props via Blade component parameters: `$product` array (slug, name, weight, category, description, image).

### Article Card (`components/article-card.blade.php`)
- Horizontal or vertical card depending on context.
- Thumbnail image, category badge, title, excerpt (2-line clamp), date with calendar icon.
- "Baca Selengkapnya" link with arrow.

---

## 7. Page Designs

### 7.1 Home (`pages/home.blade.php`)

Assembled from partials. Each section separated by generous vertical padding (`py-20` or `py-24`).

**Hero (`partials/hero.blade.php`)**
- Full-screen (`min-h-screen`) background: Swiper slider with 3 slides, each Unsplash salt farm image.
- Dark gradient overlay (`from-dark/80 to-primary/40`).
- Centered content: company name (large, Poppins bold, white), tagline (text-xl, gray-200), two CTA buttons — "Lihat Produk" (solid primary) + "Hubungi Kami" (outline white).
- Swiper config: autoplay, fade transition, pagination dots, loop.
- Scroll-down indicator at bottom (animated bounce icon).

**Keunggulan (`partials/features.blade.php`)**
- Section heading: "Mengapa Memilih Kami" / "Keunggulan produk garam kami".
- 4 cards in responsive grid: 1 col mobile → 2 cols tablet → 4 cols desktop.
- Each card: Lucide icon in primary circle, title, short text.
  1. Produk Berkualitas — icon: `badge-check`
  2. Higienis — icon: `shield-check`
  3. Distribusi Cepat — icon: `truck`
  4. Harga Kompetitif — icon: `tag`
- Cards: `bg-white rounded-xl shadow-sm hover:shadow-md transition-all`.
- AOS: `data-aos="fade-up"` with staggered delay per card (`data-aos-delay="100"` etc).

**About Preview (`partials/about-preview.blade.php`)**
- Two-column: image left (rounded-xl shadow), text right.
- Section label "Tentang Kami", heading, 2-3 paragraphs, key stats (years experience, products, clients), "Selengkapnya" button linking to `/tentang`.
- AOS: image `fade-right`, text `fade-left`.

**Featured Products (`partials/featured-products.blade.php`)**
- Section heading: "Produk Unggulan" / "Pilihan garam berkualitas terbaik kami".
- Grid of 3 product cards (from `product-card` component).
- "Lihat Semua Produk" button below, centered, links to `/produk`.
- AOS: staggered fade-up.

**Proses Produksi (`partials/process.blade.php`)**
- Section heading: "Proses Produksi" / "Dari tambak hingga ke meja Anda".
- Vertical timeline with 4 steps:
  1. Penguapan Air Laut — tambak garam
  2. Kristalisasi Garam — pemisahan kristal
  3. Pengolahan & Pencucian — higienis
  4. Pengemasan & Distribusi — siap kirim
- Each step: number badge, icon, title, description. Connected by vertical line.
- Alternating layout on desktop (zigzag left/right), stacked on mobile.
- AOS: each step animates independently.

**Testimoni (`partials/testimonials.blade.php`)**
- Section heading: "Testimoni" / "Apa kata pelanggan kami".
- Swiper slider with 3 testimonial cards visible (1 on mobile).
- Each card: quote icon, testimonial text, 5-star rating, avatar, name, company/role.
- Swiper config: autoplay, slidesPerView responsive, pagination dots.
- Background: `bg-light` or subtle gradient.

**CTA (`partials/cta.blade.php`)**
- Full-width banner: gradient `bg-gradient-to-r from-primary to-dark`.
- Centered content: heading "Siap memesan garam berkualitas?", subtitle, "Hubungi Kami" button (white bg, primary text).
- AOS: `zoom-in`.

### 7.2 Tentang Kami (`pages/about.blade.php`)

**Page Banner**
- Full-width banner with bg image (salt farm), dark overlay, "Tentang Kami" title, breadcrumb (Home > Tentang Kami).
- Height: `py-24` or `h-[40vh]`.

**Profil Perusahaan**
- Two-column: image left, text right (or alternate).
- Company description, 3-4 paragraphs.

**Sejarah**
- Full-width text section with AOS. 2-3 paragraphs about company history.

**Visi & Misi**
- Two-column card layout:
  - Left card (highlighted, primary bg): **Visi** — one paragraph.
  - Right card (white, bordered): **Misi** — numbered list (4-5 items).
- AOS: `fade-up`.

**Nilai Perusahaan**
- Grid of 4-6 value cards: icon + title + short description.
- Values: Integritas, Kualitas, Inovasi, Keberlanjutan, Pelanggan, Profesionalisme.
- AOS: staggered.

**Timeline Perjalanan**
- Vertical timeline with 6-8 milestones (year + event).
- Alternating left/right on desktop, single column on mobile.
- AOS: each milestone animates.

**Foto Perusahaan**
- Responsive grid gallery (3 cols desktop, 2 tablet, 1-2 mobile).
- 6-8 Unsplash images of salt production/facilities.
- Lightbox: Alpine modal with prev/next.

### 7.3 Produk (`pages/products.blade.php`)

**Page Banner**
- Same as About banner style. Title "Produk Kami", breadcrumb.

**Toolbar**
- Search input (Alpine reactive `x-model`), category filter dropdown (Alpine).
- Result count text.

**Product Grid**
- Boxed cards in responsive grid: 1 col mobile → 2 cols tablet → 3 cols desktop → 4 cols large desktop.
- Each card: `rounded-xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all`.
- Content: image (object-cover, h-48), body padding (category badge, name, weight badge, 2-line desc, "Lihat Detail" link).
- Entire card clickable → `<a href="/produk/{slug}">`.
- AOS: staggered fade-up.

**Category Filter (Alpine.js)**
- Categories: Semua, Garam Halus, Garam Kasar, Garam Krosok, Garam Industri.
- Filter reacts to selection + search input, shows/hides cards via `x-show`.

### 7.4 Detail Produk (`pages/product-detail.blade.php`)

**Breadcrumb**
- Home > Produk > {Product Name}. Small, muted.

**Main Layout**
- Two-column:
  - **Left (60%):** Image gallery — Swiper main image (large, rounded-xl) + thumbnail strip below. 3-5 images per product.
  - **Right (40%):** Product info — name (text-3xl bold), category badge, weight badge, price placeholder, short description, "Hubungi via WhatsApp" button (green, WhatsApp icon, opens `wa.me` link with prefilled message), secondary "Hubungi Kami" button.

**Description Section**
- Full-width below gallery+info.
- Tabbed or stacked: Deskripsi, Spesifikasi (table), Manfaat (bullet list with icons).

**Related Products**
- "Produk Terkait" heading.
- Grid of 3-4 product cards.
- AOS: fade-up.

### 7.5 Artikel (`pages/articles.blade.php`)

**Page Banner**
- Title "Artikel & Edukasi", breadcrumb.

**Featured Article**
- First article as large horizontal card: large thumbnail left, content right (category badge, title, excerpt, date, "Baca Selengkapnya" button).
- Highlighted with primary border or shadow.

**Article Grid**
- Responsive grid: 1 col mobile → 2 cols tablet → 3 cols desktop.
- Each card: thumbnail (16:9), category badge, title, 2-line excerpt, date with icon, "Baca Selengkapnya" link.
- AOS: staggered fade-up.

*Note: Article detail page intentionally excluded. Card "Baca Selengkapnya" links to `#` (no-op) for now. Backend detail page deferred to future phase.*

### 7.6 Kontak (`pages/contact.blade.php`)

**Page Banner**
- Title "Hubungi Kami", breadcrumb.

**Contact Section — Two Column**
- **Left column (40%):** Contact info cards with icons:
  - Alamat (map-pin icon)
  - Telepon (phone icon)
  - WhatsApp (WhatsApp icon, green accent)
  - Email (mail icon)
  - Jam Operasional (clock icon) — Senin-Jumat 08:00-17:00, Sabtu 08:00-13:00
- **Right column (60%):** Contact form:
  - Fields: Nama, Email, Subjek, Pesan (textarea).
  - Submit button: "Kirim Pesan" (bg-primary, rounded-xl).
  - Form styled but no backend handler yet (can point to a route that just flash success).
  - Alpine validation feedback (optional, simple required check).

**Google Maps**
- Full-width iframe embed below two-column section.
- Rounded-xl, shadow.

**Social Media Links**
- Icons in contact info column or separate row: Facebook, Instagram, Twitter/X, LinkedIn, WhatsApp.

---

## 8. Responsive Design Strategy

**Mobile-first approach** — all base styles target mobile, `sm:`/`md:`/`lg:`/`xl:` breakpoints add enhancements for larger screens.

### Breakpoints (Tailwind defaults)
| Prefix | Min width | Target |
|--------|-----------|--------|
| (none) | 0px | Mobile (portrait phone) |
| `sm:` | 640px | Large phone / small tablet (landscape) |
| `md:` | 768px | Tablet (portrait) |
| `lg:` | 1024px | Desktop / large tablet (landscape) |
| `xl:` | 1280px | Large desktop |
| `2xl:` | 1536px | Extra large screens |

### Per-Element Responsive Rules

**Container / Max-width**
- `container mx-auto px-4 sm:px-6 lg:px-8` on all section wrappers.
- Max content width: `max-w-7xl mx-auto`.

**Navbar**
- Mobile (< 768px): hamburger → Alpine slide-down menu, full-width, stacked links.
- Tablet+ (>= 768px): horizontal nav links inline, hamburger hidden.
- Logo shrinks on mobile (text-lg → text-xl).

**Hero**
- Text scales: `text-3xl` mobile → `text-5xl md:text-6xl lg:text-7xl` desktop.
- Button stack: `flex-col` mobile → `flex-row` desktop.
- `min-h-screen` on all, padding `py-20` mobile → `py-32` desktop.

**Grids**
- Features: `grid-cols-1 sm:grid-cols-2 lg:grid-cols-4`.
- Products: `grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4`.
- Articles: `grid-cols-1 md:grid-cols-2 lg:grid-cols-3`.
- Gallery (About): `grid-cols-2 md:grid-cols-3 lg:grid-cols-4`.
- Values (About): `grid-cols-1 sm:grid-cols-2 lg:grid-cols-3`.

**Two-column sections** (About Preview, Product Detail, Contact, Visi-Misi)
- Mobile: single column, stacked vertically (`grid-cols-1`).
- Desktop (>= 768px): `grid-cols-2` or `md:grid-cols-5` with `col-span-3`/`col-span-2` split.

**Typography**
- Headings: `text-2xl sm:text-3xl lg:text-4xl` — scale with viewport.
- Body text: `text-sm sm:text-base` — readable on small screens.
- Section padding: `py-12 sm:py-16 lg:py-24` — more breathing room on desktop.

**Cards**
- Mobile: full width (`w-full`), `rounded-xl`, `mb-4`.
- Desktop: auto width in grid, `gap-6` between cards.
- Image height: `h-40 sm:h-48 lg:h-56` — grows with screen.

**Swiper Responsive Config**
- Hero: always 1 slide, `effect: 'fade'`.
- Products: `slidesPerView: 1` mobile → `2` tablet → `3` desktop.
- Testimonials: `slidesPerView: 1` mobile → `2` tablet → `3` desktop.

**Footer**
- Mobile: single column stacked.
- Desktop (>= 768px): `grid-cols-4` four-column layout.

**Buttons**
- Mobile: full-width (`w-full`) inside mobile menu, `px-6 py-3`.
- Desktop: auto-width, `px-6 py-2.5`.
- Minimum touch target: 44x44px (accessibility).

**Images**
- All `w-full h-auto object-cover` by default.
- Avoid fixed pixel heights on mobile.

### Touch & Mobile UX
- Tap targets minimum 44x44px (WCAG accessibility).
- `touch-action: manipulation` on buttons to remove 300ms tap delay.
- No hover-dependent interactions on mobile — hover effects are progressive enhancement.
- Mobile menu closes on link click.
- Smooth scroll for anchor links.
- Prevent horizontal overflow: `overflow-x-hidden` on `body`.

---

## 9. Animation Strategy

| Library | Usage |
|---------|-------|
| AOS | Scroll-triggered fade-up, fade-left, fade-right, zoom-in on all sections. Staggered via `data-aos-delay`. Disable on mobile (`@media (max-width: 768px)` → disable AOS for performance). |
| Swiper.js | Hero slider (fade, autoplay), product carousel (responsive slides), testimonials (responsive slides), product gallery thumbnails. |
| Alpine.js | Mobile menu toggle, navbar scroll transparency, product category filter, gallery lightbox, form interactions. |
| Tailwind transitions | Hover effects on cards, buttons, links (`transition-all duration-300`). |

Page load: subtle fade-in via CSS animation on `<main>` container.

---

## 10. SEO Strategy

- **Master layout `<head>`** includes dynamic `@yield('meta_title')`, `@yield('meta_description')`, `@yield('meta_keywords')`.
- **Open Graph tags:** `og:title`, `og:description`, `og:image`, `og:url`, `og:type`.
- **Canonical URL** per page.
- **Semantic HTML5:** `<header>`, `<nav>`, `<main>`, `<section>`, `<article>`, `<footer>`.
- **Alt text** on all images.
- **Title format:** `{Page Name} — {Company Name}`.
- Company name placeholder: "Garam Nusantara" (changeable later).

---

## 11. Dummy Data Source

All dummy data hardcoded as PHP arrays in `PageController` methods. Example structure:

```php
// PageController::products()
$products = [
    [
        'slug' => 'garam-halus-1kg',
        'name' => 'Garam Halus Premium 1kg',
        'category' => 'Garam Halus',
        'weight' => '1kg',
        'description' => 'Garam halus berkualitas tinggi...',
        'image' => 'https://images.unsplash.com/...',
        'gallery' => [...],
        'specifications' => [...],
        'benefits' => [...],
    ],
    // ...
];
```

Data passed to views via `view('pages.products', compact('products'))`.

---

## 12. File Checklist

### To Create
- [ ] `app/Http/Controllers/PageController.php`
- [ ] `resources/css/app.css` (rewrite for Tailwind v4)
- [ ] `resources/js/app.js` (add AOS init, Swiper init)
- [ ] `resources/views/layouts/app.blade.php`
- [ ] `resources/views/components/navbar.blade.php`
- [ ] `resources/views/components/footer.blade.php`
- [ ] `resources/views/components/product-card.blade.php`
- [ ] `resources/views/components/article-card.blade.php`
- [ ] `resources/views/components/section-heading.blade.php`
- [ ] `resources/views/partials/hero.blade.php`
- [ ] `resources/views/partials/features.blade.php`
- [ ] `resources/views/partials/about-preview.blade.php`
- [ ] `resources/views/partials/featured-products.blade.php`
- [ ] `resources/views/partials/process.blade.php`
- [ ] `resources/views/partials/testimonials.blade.php`
- [ ] `resources/views/partials/cta.blade.php`
- [ ] `resources/views/pages/home.blade.php`
- [ ] `resources/views/pages/about.blade.php`
- [ ] `resources/views/pages/products.blade.php`
- [ ] `resources/views/pages/product-detail.blade.php`
- [ ] `resources/views/pages/articles.blade.php`
- [ ] `resources/views/pages/contact.blade.php`
- [ ] `routes/web.php` (rewrite)

### To Modify
- [ ] `vite.config.js` (no change needed, already correct)
- [ ] `tailwind.config.js` (simplify or remove — v4 uses CSS `@theme`)

### To Remove
- [ ] `resources/views/welcome.blade.php`
- [ ] `resources/views/dashboard.blade.php`
- [ ] `resources/views/auth/` directory
- [ ] `resources/views/profile/` directory
- [ ] `routes/auth.php`
- [ ] Auth-related routes in `web.php`

---

## 13. Future Phase (Out of Scope)

- Database migrations, models (Product, Article, Gallery)
- Admin dashboard (CRUD for products, articles, gallery)
- Contact form backend (email sending, storage)
- Article detail pages
- Full gallery page (separate from About)
- Search backend (full-text)
- File upload for product/article images
- User authentication (restore or keep Breeze as needed)