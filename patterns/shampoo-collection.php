<?php
/**
 * Title: Shampoo Collection
 * Slug: boundless-native-theme/shampoo-collection
 * Categories: boundless
 * Description: Dog Shampoo collection — 2 formulas.
 */

$shampoos = array(
	array(
		'name'        => 'Sensitive',
		'icon'        => "\xF0\x9F\x8C\xBE",
		'badge'       => 'SENSITIVE',
		'tagline'     => 'Pure. Nothing Extra.',
		'desc'        => 'Fragrance-free, sulfate-free formula with colloidal oatmeal and Sodium PCA.',
		'price'       => '$18.99',
		'size'        => '16 fl oz',
		'rating'      => '4.9',
		'reviews'     => '186',
		'gradient'    => 'linear-gradient(135deg, #E8F5ED 0%, #4A6741 100%)',
		'accent'      => '#2E5A3A',
		'chips'       => array( 'Colloidal Oatmeal', 'Sodium PCA', 'Fragrance-Free' ),
		'chip_bg'     => '#EDF5ED',
		'chip_color'  => '#1E3320',
		'chip_border' => '#B5D8C0',
	),
	array(
		'name'        => 'Itch Relief',
		'icon'        => "\xF0\x9F\xA7\xAA",
		'badge'       => 'ITCH RELIEF',
		'tagline'     => 'Relief, Rooted in Nature.',
		'desc'        => 'Salicylic acid and niacinamide with 4 named botanicals. Tea tree-free.',
		'price'       => '$23.99',
		'size'        => '16 fl oz',
		'rating'      => '4.8',
		'reviews'     => '243',
		'gradient'    => 'linear-gradient(135deg, #E0F0FF 0%, #2C5F6A 100%)',
		'accent'      => '#1A4A55',
		'chips'       => array( 'Salicylic Acid', 'Niacinamide', 'Tea Tree-Free' ),
		'chip_bg'     => '#E8F4FB',
		'chip_color'  => '#122D35',
		'chip_border' => '#88BEC8',
	),
);
?>

<!-- wp:html -->

<!-- HERO -->
<section class="bl-collection-hero">
  <nav class="bl-collection-breadcrumb" aria-label="Breadcrumb">
    <a href="/">RedyPet</a> &nbsp;/&nbsp; <a href="/grooming">Grooming</a> &nbsp;/&nbsp; Shampoo
  </nav>
  <div class="bl-collection-brand-tag"><span>&#128054;</span> Dog Use Only &middot; Rinse-Off Formula</div>
  <h1>Dog<br><em>Shampoo</em></h1>
  <p class="bl-collection-hero-sub">Clean-label, pH-balanced formulas built around actives that actually work. Colloidal oatmeal, salicylic acid, niacinamide &mdash; vet-trusted ingredients, transparent INCI.</p>
  <div class="bl-collection-pills">
    <span class="bl-collection-pill">Sulfate-Free</span>
    <span class="bl-collection-pill">pH Balanced</span>
    <span class="bl-collection-pill">No Parabens</span>
    <span class="bl-collection-pill">Vet-Trusted</span>
  </div>
</section>

<!-- HIGHLIGHT STRIP -->
<div class="bl-collection-highlight">
  <div class="bl-collection-highlight-item">&#127806; Colloidal Oatmeal</div>
  <div class="bl-collection-highlight-dot"></div>
  <div class="bl-collection-highlight-item">&#10024; Skin-Identical Sodium PCA</div>
  <div class="bl-collection-highlight-dot"></div>
  <div class="bl-collection-highlight-item">&#128167; Sulfate-Free</div>
  <div class="bl-collection-highlight-dot"></div>
  <div class="bl-collection-highlight-item">&#128054; All Breeds</div>
</div>

<!-- SECTION LABEL -->
<div class="bl-collection-label">
  <h2>All Formulas &mdash; 2 Products</h2>
</div>

<!-- PRODUCT GRID -->
<div class="bl-shampoo-grid">
  <?php foreach ( $shampoos as $s ) : ?>
  <div class="bl-product-card"
       style="--band-gradient:<?php echo esc_attr( $s['gradient'] ); ?>">

    <!-- Band -->
    <div class="bl-product-card-band">
      <span class="bl-product-card-badge" style="color:<?php echo esc_attr( $s['accent'] ); ?>"><?php echo esc_html( $s['badge'] ); ?></span>
      <span class="bl-product-card-dog">&#128054;</span>
      <span class="bl-product-card-icon"><?php echo $s['icon']; ?></span>
    </div>

    <!-- Body -->
    <div class="bl-product-card-body">
      <div class="bl-product-card-name"><?php echo esc_html( $s['name'] ); ?></div>
      <div class="bl-product-card-tagline"><?php echo esc_html( $s['tagline'] ); ?></div>

      <div class="bl-product-card-rating">
        <span>&#9733;</span>
        <strong><?php echo esc_html( $s['rating'] ); ?></strong>
        <span>(<?php echo esc_html( $s['reviews'] ); ?> reviews)</span>
      </div>

      <div class="bl-product-card-notes">
        <?php foreach ( $s['chips'] as $chip ) : ?>
        <span class="bl-product-card-chip"
              style="background:<?php echo esc_attr( $s['chip_bg'] ); ?>;color:<?php echo esc_attr( $s['chip_color'] ); ?>;border-color:<?php echo esc_attr( $s['chip_border'] ); ?>"><?php echo esc_html( $chip ); ?></span>
        <?php endforeach; ?>
      </div>

      <p class="bl-product-card-desc"><?php echo esc_html( $s['desc'] ); ?></p>
    </div>

    <!-- Divider -->
    <div class="bl-product-card-divider"></div>

    <!-- Footer -->
    <div class="bl-product-card-footer">
      <div>
        <div class="bl-product-card-price-label">Price</div>
        <div class="bl-product-card-price"><?php echo esc_html( $s['price'] ); ?></div>
        <div class="bl-product-card-price-sub"><?php echo esc_html( $s['size'] ); ?> &middot; Free shipping $50+</div>
      </div>
      <button class="bl-product-card-btn" style="background:<?php echo esc_attr( $s['accent'] ); ?>">
        Add to Cart
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </button>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<!-- /wp:html -->
