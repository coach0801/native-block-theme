<?php
/**
 * Title: Dental Collection
 * Slug: boundless-native-theme/dental-collection
 * Categories: boundless
 * Description: Professional-grade dental care collection — 6 formulas for dogs and cats.
 */

$dental_products = array(
	array(
		'name'        => 'Clean Essentials&#8482;',
		'icon'        => '&#129529;',
		'tagline'     => 'Fresh breath starts with clean science.',
		'price'       => '$12.99',
		'size'        => '60 mL',
		'rating'      => '4.7',
		'reviews'     => '89',
		'badge'       => 'ORIGINAL',
		'gradient'    => 'linear-gradient(135deg, #E8F5ED 0%, #B5D8C0 100%)',
		'accent'      => '#3A6B4A',
		'chips'       => array( 'Zinc Gluconate', 'Sodium Hex', 'Aloe' ),
		'chip_bg'     => '#EDF5ED',
		'chip_color'  => '#2E5A3A',
		'chip_border' => '#B5D8C0',
		'type'        => 'Oral Spray',
		'pet_icon'    => '&#128054;&#128049;',
	),
	array(
		'name'        => 'Enzyme Defense&#8482;',
		'icon'        => '&#129516;',
		'tagline'     => "Biofilm doesn't stand a chance.",
		'price'       => '$16.99',
		'size'        => '60 mL',
		'rating'      => '4.8',
		'reviews'     => '67',
		'badge'       => 'ENZYME',
		'gradient'    => 'linear-gradient(135deg, #E0F0FF 0%, #88BBDD 100%)',
		'accent'      => '#2E6B8A',
		'chips'       => array( 'Glucose Oxidase', 'Lactoferrin', 'Lysozyme' ),
		'chip_bg'     => '#E8F4FB',
		'chip_color'  => '#1A5C7A',
		'chip_border' => '#88BBDD',
		'type'        => 'Oral Spray',
		'pet_icon'    => '&#128054;&#128049;',
	),
	array(
		'name'        => 'Pro Defense&#8482;',
		'icon'        => '&#128142;',
		'tagline'     => 'Four mechanisms. One spray. Zero compromise.',
		'price'       => '$15.99',
		'size'        => '60 mL',
		'rating'      => '4.9',
		'reviews'     => '142',
		'badge'       => 'PRO',
		'gradient'    => 'linear-gradient(135deg, #F0EAF8 0%, #B39DDB 100%)',
		'accent'      => '#6B42A8',
		'chips'       => array( 'CPC', 'Zinc PCA', 'Sodium Hex' ),
		'chip_bg'     => '#F3EEFA',
		'chip_color'  => '#5E35B1',
		'chip_border' => '#B39DDB',
		'type'        => 'Oral Spray',
		'pet_icon'    => '&#128054;&#128049;',
	),
	array(
		'name'        => 'Nature Shield&#8482;',
		'icon'        => '&#127807;',
		'tagline'     => 'Nature-powered. Science-proven.',
		'price'       => '$17.99',
		'size'        => '60 mL',
		'rating'      => '4.9',
		'reviews'     => '203',
		'badge'       => 'NATURAL &#9733;',
		'gradient'    => 'linear-gradient(135deg, #FFF8E1 0%, #FFD54F 100%)',
		'accent'      => '#C8962A',
		'chips'       => array( 'Nisin', 'Green Tea', 'Pomegranate' ),
		'chip_bg'     => '#FFFBE6',
		'chip_color'  => '#8A6A00',
		'chip_border' => '#FFD54F',
		'type'        => 'Oral Spray',
		'pet_icon'    => '&#128054;&#128049;',
	),
	array(
		'name'        => 'Fresh Guard&#8482;',
		'icon'        => '&#128167;',
		'tagline'     => 'Fresher breath. Just add to water.',
		'price'       => '$24.99',
		'size'        => '473 mL (16 fl oz)',
		'rating'      => '4.8',
		'reviews'     => '237',
		'badge'       => 'FOR DOGS',
		'gradient'    => 'linear-gradient(135deg, #E8F5ED 0%, #4CAF50 100%)',
		'accent'      => '#2E7D32',
		'chips'       => array( 'Zinc Gluconate', 'SHMP', 'Chlorophyllin' ),
		'chip_bg'     => '#EDF5ED',
		'chip_color'  => '#1B5E20',
		'chip_border' => '#81C784',
		'type'        => 'Water Additive',
		'pet_icon'    => '&#128054;',
	),
	array(
		'name'        => 'Gentle Guard&#8482;',
		'icon'        => '&#128049;',
		'tagline'     => 'Gentle on felines. Relentless on plaque.',
		'price'       => '$24.99',
		'size'        => '473 mL (16 fl oz)',
		'rating'      => '4.7',
		'reviews'     => '189',
		'badge'       => 'FOR CATS',
		'gradient'    => 'linear-gradient(135deg, #FFF3E0 0%, #FFB74D 100%)',
		'accent'      => '#E65100',
		'chips'       => array( 'Taurine-Safe', 'Enzyme Blend', 'Cat pH' ),
		'chip_bg'     => '#FFF8E1',
		'chip_color'  => '#BF360C',
		'chip_border' => '#FFB74D',
		'type'        => 'Water Additive',
		'pet_icon'    => '&#128049;',
	),
);
?>

<!-- wp:html -->
<style>
/* ── DENTAL COLLECTION — GRID OVERRIDE ─────────────────────────────────── */
.bl-dental-grid {
  grid-template-columns: repeat(4, 1fr);
}

@media (max-width: 900px) {
  .bl-dental-grid { grid-template-columns: repeat(3, 1fr); }
}
@media (max-width: 600px) {
  .bl-dental-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 400px) {
  .bl-dental-grid { grid-template-columns: 1fr; }
}

/* ── DENTAL PRODUCT TYPE LABEL ─────────────────────────────────────────── */
.bl-product-card-type {
  font-size: 10px; font-weight: 500; letter-spacing: 0.10em;
  text-transform: uppercase; color: var(--bl-muted);
  margin-bottom: 6px;
}

/* ── DENTAL RATING ─────────────────────────────────────────────────────── */
.bl-product-card-rating {
  font-size: 12px; color: var(--bl-muted); font-weight: 400;
  margin-bottom: 14px;
  display: flex; align-items: center; gap: 4px;
}

.bl-product-card-rating-star {
  color: #F5A623;
}
</style>

<!-- HERO -->
<section class="bl-collection-hero">
  <nav class="bl-collection-breadcrumb" aria-label="Breadcrumb">
    <a href="/">Home</a> &nbsp;/&nbsp; <a href="/shop">RedyPet</a> &nbsp;/&nbsp; Dental
  </nav>
  <div class="bl-collection-brand-tag"><span>&#129441;</span> Dogs &amp; Cats &middot; Oral Care</div>
  <h1>Dental<br><em>Care</em></h1>
  <p class="bl-collection-hero-sub">Professional-grade oral care for dogs and cats. Fresh breath, clean teeth, healthier gums &mdash; no brushing required.</p>
  <div class="bl-collection-pills">
    <span class="bl-collection-pill">No Xylitol</span>
    <span class="bl-collection-pill">No Alcohol</span>
    <span class="bl-collection-pill">Vet-Friendly</span>
    <span class="bl-collection-pill">Made in USA</span>
  </div>
</section>

<!-- HIGHLIGHT STRIP -->
<div class="bl-collection-highlight">
  <div class="bl-collection-highlight-item">&#129463; Professional Grade</div>
  <div class="bl-collection-highlight-dot"></div>
  <div class="bl-collection-highlight-item">&#10024; Tartar Control</div>
  <div class="bl-collection-highlight-dot"></div>
  <div class="bl-collection-highlight-item">&#128167; No Alcohol</div>
  <div class="bl-collection-highlight-dot"></div>
  <div class="bl-collection-highlight-item">&#128054;&#128049; Dogs &amp; Cats</div>
</div>

<!-- SECTION LABEL -->
<div class="bl-collection-label">
  <h2>All Products &mdash; 6 Formulas</h2>
</div>

<!-- PRODUCT GRID -->
<div class="bl-collection-grid bl-dental-grid">
  <?php foreach ( $dental_products as $d ) : ?>
  <div class="bl-product-card"
       style="--band-gradient:<?php echo $d['gradient']; ?>">

    <!-- Band -->
    <div class="bl-product-card-band">
      <span class="bl-product-card-sku"><?php echo $d['badge']; ?></span>
      <span class="bl-product-card-dog"><?php echo $d['pet_icon']; ?></span>
      <span class="bl-product-card-icon"><?php echo $d['icon']; ?></span>
    </div>

    <!-- Body -->
    <div class="bl-product-card-body">
      <div class="bl-product-card-type"><?php echo esc_html( $d['type'] ); ?></div>
      <div class="bl-product-card-name"><?php echo $d['name']; ?></div>
      <div class="bl-product-card-tagline"><?php echo esc_html( $d['tagline'] ); ?></div>

      <div class="bl-product-card-rating">
        <span class="bl-product-card-rating-star">&#9733;</span>
        <?php echo esc_html( $d['rating'] ); ?> (<?php echo esc_html( $d['reviews'] ); ?> reviews)
      </div>

      <div class="bl-product-card-notes">
        <?php foreach ( $d['chips'] as $chip ) : ?>
        <span class="bl-product-card-chip"
              style="background:<?php echo esc_attr( $d['chip_bg'] ); ?>;color:<?php echo esc_attr( $d['chip_color'] ); ?>;border-color:<?php echo esc_attr( $d['chip_border'] ); ?>"><?php echo esc_html( $chip ); ?></span>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Divider -->
    <div class="bl-product-card-divider"></div>

    <!-- Footer -->
    <div class="bl-product-card-footer">
      <div>
        <div class="bl-product-card-price-label">Price</div>
        <div class="bl-product-card-price"><?php echo esc_html( $d['price'] ); ?></div>
        <div class="bl-product-card-price-sub"><?php echo esc_html( $d['size'] ); ?> &middot; Free shipping $50+</div>
      </div>
      <button class="bl-product-card-btn" style="background:<?php echo esc_attr( $d['accent'] ); ?>">
        Add to Cart
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </button>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<!-- /wp:html -->
