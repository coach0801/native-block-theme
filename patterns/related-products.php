<?php
/**
 * Title: Related Products
 * Slug: boundless-native-theme/related-products
 * Categories: boundless
 * Description: Grid of product cards linking to all product pages. Used at the bottom of various pages.
 */

$bl_all_products = array(
	'original'    => array('name' => 'Original™',    'type' => 'No-Chew Deterrent Spray',    'price' => '£12.99', 'icon' => '&#127807;', 'id' => 'original'),
	'natural'     => array('name' => 'Natural™',     'type' => 'Essential Oil Deterrent',     'price' => '£14.99', 'icon' => '&#127811;', 'id' => 'natural'),
	'2-in-1'      => array('name' => '2-in-1™',      'type' => 'Hot Spot Treatment',          'price' => '£16.99', 'icon' => '&#128167;', 'id' => 'hotspot'),
	'sensitive'   => array('name' => 'Sensitive',     'type' => 'Sensitive Dog Shampoo',       'price' => '$18.99', 'icon' => '&#127806;', 'id' => 'sensitive'),
	'itch-relief' => array('name' => 'Itch Relief',   'type' => 'Itch Relief Dog Shampoo',    'price' => '$23.99', 'icon' => '&#129526;', 'id' => 'itchrelief'),
);
?>

<!-- wp:html -->
<section class="bl-related-products">
  <div class="bl-wrap">
    <div class="bl-eyebrow bl-center">Our Products</div>
    <h2 class="bl-section-title bl-center">Browse Our Range</h2>
    <div class="bl-related-grid">
      <?php foreach ($bl_all_products as $slug => $rp) : ?>
      <a href="/<?php echo esc_attr($slug); ?>" class="bl-related-card">
        <div class="bl-related-visual bl-showcase-visual--<?php echo esc_attr($rp['id']); ?>">
          <span class="bl-related-icon"><?php echo $rp['icon']; ?></span>
        </div>
        <div class="bl-related-info">
          <h3 class="bl-related-name"><?php echo esc_html($rp['name']); ?></h3>
          <p class="bl-related-type"><?php echo esc_html($rp['type']); ?></p>
          <div class="bl-related-price"><?php echo $rp['price']; ?></div>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /wp:html -->
