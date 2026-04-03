<?php
/**
 * Title: Boundless Subcategory Page
 * Slug: boundless-native-theme/subcategory-page
 * Categories: boundless
 * Description: Subcategory listing page showing product sub-collections.
 */
?>

<!-- wp:html -->
<section class="bl-hero bl-hero--subcat">
  <div class="bl-wrap">
    <div class="bl-breadcrumb">BOUNDLESS &middot; Products &middot; Categories</div>
    <h1 class="bl-hero-title">Product Collections</h1>
    <p class="bl-hero-desc">Browse our product range by category. Each collection addresses a specific need.</p>
  </div>
</section>
<!-- /wp:html -->

<!-- wp:group {"className":"bl-subcat-page-section"} -->
<div class="wp-block-group bl-subcat-page-section">
  <!-- wp:group {"className":"bl-section-header bl-center"} -->
  <div class="wp-block-group bl-section-header bl-center">
    <!-- wp:paragraph {"className":"bl-eyebrow"} --><p class="bl-eyebrow">Browse by Category</p><!-- /wp:paragraph -->
    <!-- wp:heading {"className":"bl-section-title"} --><h2 class="wp-block-heading bl-section-title">Our Product Lines</h2><!-- /wp:heading -->
  </div>
  <!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:html -->
<!-- Product collection cards — custom layout with gradient visuals -->
<div class="bl-subcat-page-section bl-section--flush">
  <div class="bl-subcat-showcase">
    <div class="bl-subcat-feature-card">
      <div class="bl-subcat-feature-visual bl-subcat-visual--original"><div class="bl-subcat-feature-icon">🌿</div></div>
      <div class="bl-subcat-feature-info">
        <h3 class="bl-subcat-feature-name">Original&#8482; Range</h3>
        <p class="bl-subcat-feature-desc">Our flagship no-chew &amp; boundary deterrent sprays. Alcohol-free formulation with triple scent barrier.</p>
        <div class="bl-subcat-feature-tags"><span class="bl-cart-tag">Alcohol-Free</span><span class="bl-cart-tag">Skin-Safe</span><span class="bl-cart-tag">pH Balanced</span></div>
        <a href="/original" class="bl-subcat-feature-btn">View Collection &rarr;</a>
      </div>
    </div>
    <div class="bl-subcat-feature-card">
      <div class="bl-subcat-feature-visual bl-subcat-visual--natural"><div class="bl-subcat-feature-icon">🍃</div></div>
      <div class="bl-subcat-feature-info">
        <h3 class="bl-subcat-feature-name">Natural&#8482; Range</h3>
        <p class="bl-subcat-feature-desc">Essential oil blend formula. Plant-powered deterrent for sensitive environments.</p>
        <div class="bl-subcat-feature-tags"><span class="bl-cart-tag">Plant-Based</span><span class="bl-cart-tag">Eco-Friendly</span><span class="bl-cart-tag">Sensitive</span></div>
        <a href="/natural" class="bl-subcat-feature-btn">View Collection &rarr;</a>
      </div>
    </div>
    <div class="bl-subcat-feature-card">
      <div class="bl-subcat-feature-visual bl-subcat-visual--hotspot"><div class="bl-subcat-feature-icon">💧</div></div>
      <div class="bl-subcat-feature-info">
        <h3 class="bl-subcat-feature-name">2-in-1&#8482; Hot Spot Range</h3>
        <p class="bl-subcat-feature-desc">Dual-action formula that treats hot spots while setting boundaries.</p>
        <div class="bl-subcat-feature-tags"><span class="bl-cart-tag">Dual-Action</span><span class="bl-cart-tag">Soothing</span><span class="bl-cart-tag">Treatment</span></div>
        <a href="/2-in-1" class="bl-subcat-feature-btn">View Collection &rarr;</a>
      </div>
    </div>
    <div class="bl-subcat-feature-card">
      <div class="bl-subcat-feature-visual bl-subcat-visual--sensitive"><div class="bl-subcat-feature-icon">🌾</div></div>
      <div class="bl-subcat-feature-info">
        <h3 class="bl-subcat-feature-name">Sensitive</h3>
        <p class="bl-subcat-feature-desc">Fragrance-free dog shampoo with colloidal oatmeal and Sodium PCA. Sulfate-free.</p>
        <div class="bl-subcat-feature-tags"><span class="bl-cart-tag">Fragrance-Free</span><span class="bl-cart-tag">Sulfate-Free</span><span class="bl-cart-tag">Oatmeal</span></div>
        <a href="/sensitive" class="bl-subcat-feature-btn">View Product &rarr;</a>
      </div>
    </div>
    <div class="bl-subcat-feature-card">
      <div class="bl-subcat-feature-visual bl-subcat-visual--itchrelief"><div class="bl-subcat-feature-icon">🧴</div></div>
      <div class="bl-subcat-feature-info">
        <h3 class="bl-subcat-feature-name">Itch Relief</h3>
        <p class="bl-subcat-feature-desc">Salicylic acid &amp; niacinamide shampoo. Vet-grade actives. Tea tree-free.</p>
        <div class="bl-subcat-feature-tags"><span class="bl-cart-tag">Vet-Grade</span><span class="bl-cart-tag">Itch Relief</span><span class="bl-cart-tag">Tea Tree-Free</span></div>
        <a href="/itch-relief" class="bl-subcat-feature-btn">View Product &rarr;</a>
      </div>
    </div>
  </div>
</div>
<!-- /wp:html -->

<!-- Dynamic subcategories from WordPress taxonomy -->
<!-- wp:boundless/subcategory-list {"heading":"All Subcategories"} /-->

<!-- wp:html -->
<section class="bl-cta-section">
  <h2 class="bl-cta-title">Not sure which product is right?</h2>
  <p class="bl-cta-sub">All BOUNDLESS products are alcohol-free, skin-safe, and designed to set firm boundaries.</p>
  <div class="bl-cta-purchase"><a href="/collections" class="bl-cta-btn">View All Products</a></div>
</section>
<!-- /wp:html -->
