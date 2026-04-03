# Boundless Native Theme — User Guide

Everything you need to manage this theme independently, without developer help.

---

## 1. Theme file structure

```
boundless-native-theme/
├── style.css                  ← Theme identity (name, version). Do not delete.
├── functions.php              ← Loads CSS/JS, registers blocks. Rarely needs editing.
├── theme.json                 ← Global colours, fonts, layout, custom template registry.
│
├── parts/
│   ├── header.html            ← ★ EDIT THIS to change nav links / product switcher
│   └── footer.html            ← ★ EDIT THIS to change footer links
│
├── templates/
│   ├── front-page.html        ← Homepage (sliding showcase + product template)
│   ├── page-product.html      ← Product Details page
│   ├── page-ingredient.html   ← Ingredient page
│   ├── page-contact.html      ← Contact page
│   ├── page-cart.html         ← Cart page (with checkout links)
│   ├── page-checkout.html     ← Checkout page (external store redirect)
│   ├── page-subcategory.html  ← Subcategory page (product collections)
│   ├── page-light.html        ← Light landing page (alternative colour scheme)
│   ├── category.html          ← Category archive (with dynamic subcategory cards)
│   ├── archive.html           ← Generic archive listing
│   ├── index.html             ← Blog page (post listing)
│   ├── single.html            ← Single blog post
│   ├── page.html              ← Generic WordPress page
│   └── 404.html               ← 404 error page
│
├── patterns/
│   ├── homepage.php           ← ★ Homepage content (slider, hero, benefits, tabs, reviews)
│   ├── product-details.php    ← ★ Product details content (hero, tabs, reviews, CTA)
│   ├── ingredient-page.php    ← ★ Ingredient page content (formulation, safety)
│   ├── contact-page.php       ← ★ Contact form + info cards
│   ├── cart-page.php          ← ★ Cart items + checkout option links
│   ├── checkout-page.php      ← ★ External store checkout cards + pricing
│   ├── subcategory-page.php   ← ★ Product collection cards + dynamic subcategories
│   └── light-landing.php      ← Light landing page content
│
├── inc/
│   └── render-blocks.php      ← Server-side rendering for all custom blocks
│
└── assets/
    ├── css/theme.css          ← All styling (2000+ lines, fully responsive)
    └── js/
        ├── blocks.js          ← React-based Gutenberg block editor UI
        └── theme.js           ← Frontend: slider, tabs, qty control, cart, nav
```

---

## 2. Required page templates (8 total)

These are the core templates required by the project. Each one is assignable
to any WordPress page via the Template selector in the page editor.

| # | Template | File | Pattern | Purpose |
|---|---|---|---|---|
| 1 | **Homepage** | `front-page.html` | `homepage.php` | Sliding product showcase, hero, stats, benefits, ingredient tabs, reviews, blog posts, CTA, Amazon checkout |
| 2 | **Category Page** | `category.html` | Dynamic block | Category header, auto-generated subcategory cards, post grid with images, pagination |
| 3 | **Subcategory Page** | `page-subcategory.html` | `subcategory-page.php` | Product collection feature cards (Original/Natural/2-in-1), dynamic subcategory listing, CTA |
| 4 | **Product Details** | `page-product.html` | `product-details.php` | Product hero with bottle, stats, tabbed content (Description/Posters/Ingredients/How-to-Use), reviews, affiliate checkout |
| 5 | **Ingredient Page** | `page-ingredient.html` | `ingredient-page.php` | Active ingredients (hero cards), supporting ingredients, safety & compliance checklist, CTA |
| 6 | **Blog Page** | `index.html` | Inline | Blog header, 3-column post grid with featured images and excerpts, pagination |
| 7 | **Contact Page** | `page-contact.html` | `contact-page.php` | Contact form (name/email/subject/message), info sidebar (email, location, response time) |
| 8 | **Cart Page** | `page-cart.html` | `cart-page.php` | Cart items with qty controls, order summary, checkout links (Amazon, Official Shop, Other Retailers) |

---

## 3. How to set up each page

### Automatic Setup (recommended)

**All pages are created automatically when the theme is activated.**

The theme creates 17 pages with correct templates and sets the static homepage
and blog page. No manual page creation is needed. Just activate the theme and
the site works immediately.

Pages auto-created:
- Home (Homepage template, set as front page)
- Original™, Natural™, 2-in-1™ Hot Spot (Product Details template)
- Ingredients (Ingredient template)
- Contact (Contact template)
- Cart (Cart template)
- Checkout (Checkout template)
- Product Collections (Subcategory template)
- Our Story, Stockists, FAQ, Shipping & Returns, Our Philosophy, Safety Data Sheet (generic pages)
- Blog (set as posts page)
- Light Landing (Light Landing template)

If any page is accidentally deleted, it will be re-created automatically
within 24 hours (or immediately on theme re-activation).

### Manual Page Creation (if needed)

To create additional pages manually:

### Cart Page

1. WP Admin → **Pages → Add New**.
2. Title: "Cart".
3. Set the **slug** to `cart`.
4. In the right panel → **Template** → choose **Cart Page**.
5. Publish.

### Checkout Page

1. WP Admin → **Pages → Add New**.
2. Title: "Checkout".
3. Set the **slug** to `checkout`.
4. In the right panel → **Template** → choose **Checkout Page**.
5. Publish.

### Subcategory Page

1. WP Admin → **Pages → Add New**.
2. Title: "Product Collections" (or any title).
3. In the right panel → **Template** → choose **Subcategory Page**.
4. Publish.

### Blog Page

The blog page works automatically — it is the `index.html` template and
shows wherever WordPress displays the post listing. If using a static
homepage, go to **Settings → Reading** and set **Posts page** to a page
of your choice.

### Category / Archive Pages

Category pages are generated automatically by WordPress when visitors
browse a post category. The `category.html` template shows a header,
any subcategory cards (auto-detected), and a post grid.

---

## 4. How to edit navigation menu items

The navigation is hardcoded in `parts/header.html` — it does **not** use the
WordPress Menus screen.

### Product switcher (pill tabs)

Find the `<div class="bl-nav-switcher">` section at the top of the header.
Each `<a><button>` pair is one switcher tab. Change `href` and button text.
Use class `active-original`, `active-natural`, or `active-hotspot` for the
active tab colour.

### Navigation links

Find the `<ul class="bl-nav-list">` section. Copy/paste `<li>` blocks to
add or remove links. See the file comments for dropdown examples.

---

## 5. How to change affiliate / product URLs

Open `patterns/homepage.php` and `patterns/product-details.php`, find:

```
amazonUrl="https://amazon.co.uk"
```

Replace with your real Amazon affiliate URL. Also search for any
`amazon.co.uk`, `walmart.com`, or `#` placeholder URLs in all pattern files.

The cart page (`patterns/cart-page.php`) and checkout page
(`patterns/checkout-page.php`) also contain affiliate links to update.

---

## 6. How to change colours or fonts

Open `theme.json` and find the `"palette"` array to change theme colours.

For CSS overrides, edit `assets/css/theme.css`. Design tokens are at the top:

```css
:root {
    --bl-green:      #0F3D24;
    --bl-green-mid:  #1A5C38;
    --bl-gold:       #C9A227;
    --bl-bg:         #F2F7F4;
}
```

The theme uses four font families (loaded from Google Fonts):
- **Jost** — body text (dark theme)
- **Cormorant Garamond** — headings (dark theme)
- **Playfair Display** — headings (light landing page)
- **DM Sans** — body text (light landing page)

---

## 7. Custom Gutenberg blocks

The theme registers 3 custom blocks usable in the WordPress editor:

| Block | Editor Category | Purpose |
|---|---|---|
| **Affiliate Checkout** | Widgets | Configurable checkout buttons with Amazon/Shop/Retailer URLs |
| **Product Highlights** | Widgets | Editable pill-badge list of product features |
| **Subcategory List** | Widgets | Auto-renders child categories for the current page/category |

All blocks have React-based editor interfaces (Inspector panel + visual preview)
and PHP server-side rendering for the frontend.

---

## 8. Responsive breakpoints

| Breakpoint | Target |
|---|---|
| > 900px | Desktop |
| ≤ 900px | Tablet (hamburger nav, single-column grids) |
| ≤ 768px | Tablet portrait (ingredient/poster grids adapt) |
| ≤ 599px | Phone (all grids single-column, stacked layouts) |
| ≤ 399px | Small phone (reduced gutters) |

---

## 9. After any file change — clear cache

If you use a caching plugin (WP Super Cache, W3 Total Cache, LiteSpeed, etc.):
1. Go to its settings page in WP Admin.
2. Click **Empty / Purge / Flush All Caches**.

If you updated CSS/JS files, also increment the version number in `style.css`:
`Version: 1.3.0` → `Version: 1.4.0`

---

## 10. Quick troubleshooting

| Symptom | Fix |
|---|---|
| Nav changes not showing | Upload the edited `header.html`, then clear browser cache (Ctrl+Shift+R) |
| CSS changes not showing | Increment `Version` in `style.css`, clear server cache |
| Homepage shows wrong content | Check Settings → Reading → static front page is set correctly |
| Template not selectable in editor | Make sure the template name in `theme.json` → `customTemplates` matches the filename |
| Dropdown not working | Make sure JavaScript is not blocked; check browser console for errors |
| Site Editor overwrote your file | Go to Editor → Template Parts → Header → Reset to theme default |
| Subcategories not showing | Make sure WordPress categories have child categories created |
| Cart page not at /cart | Set the page slug to `cart` in the page editor |
