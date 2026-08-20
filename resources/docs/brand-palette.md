# PT Alfa Jaya Bersama — Website Color Palette

Palet warna ini diambil dari identitas visual logo **AJ**, kemasan produk garam, dan elemen grafis pada brand PT Alfa Jaya Bersama. Fokus utama adalah nuansa **biru yang bersih, premium, higienis, dan modern**.

---

# Light mode palette

## Brand colors

| Token              | Hex       | Penggunaan                     |
| ------------------ | --------- | ------------------------------ |
| Primary            | `#4177B6` | Tombol utama, link, icon utama |
| Primary Light      | `#B9D6F2` | Hero background, highlight     |
| Primary Very Light | `#EEF4FB` | Section background lembut      |
| Accent             | `#8DB1E3` | Hover, badge, ilustrasi        |
| Accent Soft        | `#DCEAF8` | Card highlight                 |

## Background & surface

| Token             | Hex       |
| ----------------- | --------- |
| Background        | `#FFFFFF` |
| Surface / Card    | `#F3F8FD` |
| Surface Secondary | `#EAF2FA` |

## Typography

| Token          | Hex       |
| -------------- | --------- |
| Text Primary   | `#1F2A44` |
| Text Secondary | `#475569` |
| Text Muted     | `#64748B` |

## Border

| Token         | Hex       |
| ------------- | --------- |
| Border        | `#D6E1F0` |
| Border Strong | `#B9C9DE` |

## Semantic colors

| Token   | Hex       |
| ------- | --------- |
| Success | `#16A34A` |
| Warning | `#F59E0B` |
| Danger  | `#DC2626` |
| Info    | `#0EA5E9` |

---

# Dark mode palette

## Brand colors

| Token         | Hex       | Penggunaan    |
| ------------- | --------- | ------------- |
| Primary       | `#5A8FD6` | Tombol utama  |
| Primary Light | `#90B7E8` | Hover, active |
| Primary Dark  | `#35639C` | State aktif   |
| Accent        | `#739ED6` | Badge, icon   |

## Background & surface

| Token            | Hex       |
| ---------------- | --------- |
| Background       | `#0F172A` |
| Surface          | `#1A2338` |
| Surface Elevated | `#22304A` |
| Surface Hover    | `#2A3B5C` |

## Typography

| Token          | Hex       |
| -------------- | --------- |
| Text Primary   | `#E2E8F0` |
| Text Secondary | `#CBD5E1` |
| Text Muted     | `#94A3B8` |

## Border

| Token         | Hex       |
| ------------- | --------- |
| Border        | `#28324A` |
| Border Strong | `#3B4A67` |

## Semantic colors

| Token   | Hex       |
| ------- | --------- |
| Success | `#22C55E` |
| Warning | `#FBBF24` |
| Danger  | `#EF4444` |
| Info    | `#38BDF8` |

---

# CSS variables

```css
:root {
  --primary: #4177B6;
  --primary-light: #B9D6F2;
  --primary-soft: #EEF4FB;
  --accent: #8DB1E3;

  --background: #FFFFFF;
  --surface: #F3F8FD;

  --text: #1F2A44;
  --text-secondary: #475569;
  --border: #D6E1F0;
}

.dark {
  --primary: #5A8FD6;
  --primary-light: #90B7E8;
  --primary-soft: #22304A;
  --accent: #739ED6;

  --background: #0F172A;
  --surface: #1A2338;

  --text: #E2E8F0;
  --text-secondary: #CBD5E1;
  --border: #28324A;
}
```

---

# Tailwind recommendation

## Light mode

* `bg-primary` → `#4177B6`
* `bg-primary-light` → `#B9D6F2`
* `bg-primary-soft` → `#EEF4FB`
* `text-primary` → `#1F2A44`
* `border-primary-soft` → `#D6E1F0`

## Dark mode

* `dark:bg-slate-950` → `#0F172A`
* `dark:bg-slate-900` → `#1A2338`
* `dark:text-slate-100` → `#E2E8F0`
* `dark:text-slate-300` → `#CBD5E1`
* `dark:border-slate-700` → `#28324A`

---

# Gradients

## Hero light

```css
background: linear-gradient(135deg, #EEF4FB 0%, #B9D6F2 100%);
```

## Hero dark

```css
background: linear-gradient(135deg, #0F172A 0%, #1A2338 100%);
```

## Primary button

```css
background: linear-gradient(135deg, #4177B6 0%, #5A8FD6 100%);
```

Palet ini akan membuat website terlihat **bersih, premium, higienis, dan konsisten dengan identitas visual kemasan serta logo AJ**.
