<?php
/**
 * Title: Boundless Product Details
 * Slug: boundless-native-theme/product-details
 * Categories: boundless
 * Description: Product details page. Dynamically shows correct product based on page slug.
 */

/* ── Load product data (core + collection products) ── */
$bl_products = include get_template_directory() . '/inc/product-data.php';
$bl_collection = include get_template_directory() . '/inc/collection-product-data.php';
if (is_array($bl_collection)) {
	$bl_products = array_merge($bl_products, $bl_collection);
}

/* Detect which product to show from the current page slug */
$bl_slug = '';
if (function_exists('get_post_field') && get_the_ID()) {
	$bl_slug = get_post_field('post_name', get_the_ID());
}
if (! isset($bl_products[ $bl_slug ])) {
	$bl_slug = 'original';
}
$p = $bl_products[ $bl_slug ];

/* Helper: output text that may contain HTML entities like &trade; &ndash; */
function bl_text($s) { echo wp_kses_post($s); }
?>

<!-- wp:html -->
<!-- PRODUCT HERO -->
<section class="bl-hero bl-hero--product">
  <div class="bl-wrap">
    <div class="bl-breadcrumb">BOUNDLESS &middot; Products &middot; <?php bl_text($p['name']); ?></div>
    <div class="bl-product-hero-grid">
      <div class="bl-hero-content">
        <div class="bl-hero-badge"><div class="bl-badge-dot"></div><span><?php bl_text($p['badge']); ?></span></div>
        <div class="bl-hero-brand">BOUNDLESS</div>
        <h1 class="bl-hero-title"><?php bl_text($p['name']); ?></h1>
        <div class="bl-hero-subtitle"><?php bl_text($p['subtitle']); ?></div>
        <p class="bl-hero-tagline"><?php bl_text($p['tagline']); ?></p>
        <div class="bl-stars-row"><span class="bl-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span><span class="bl-review-count"><?php echo esc_html($p['rating']); ?> &middot; <?php echo esc_html($p['reviews']); ?> reviews</span></div>
        <p class="bl-hero-desc"><?php bl_text($p['desc']); ?></p>
        <div class="bl-purchase-row">
          <div class="bl-price-block"><span class="bl-price"><?php echo $p['currency']; ?><?php echo esc_html($p['price']); ?></span><span class="bl-price-size"><?php echo esc_html($p['size']); ?></span></div>
          <div class="bl-buy-controls">
            <div class="bl-qty-control"><button class="bl-qty-btn" onclick="blChangeQty(-1)">&minus;</button><span class="bl-qty-val" id="bl-qty-display">1</span><button class="bl-qty-btn" onclick="blChangeQty(1)">+</button></div>
            <button class="bl-add-btn" id="bl-add-btn" data-product="<?php echo esc_attr($p['id']); ?>" onclick="blAddToCart()">Add to Cart</button>
          </div>
        </div>
        <div class="bl-trust-row">
          <?php foreach ($p['trust'] as $t) : ?><span>&#10003; <?php bl_text($t); ?></span><?php endforeach; ?>
        </div>
      </div>
      <div class="bl-bottle-wrap">
        <?php if (! empty($p['image'])) : ?>
        <div class="bl-product-image">
          <img src="<?php echo esc_url($p['image']); ?>" alt="<?php echo esc_attr($p['name']); ?>" />
          <div class="bl-bottle-badge"><?php bl_text($p['bottle_badge']); ?></div>
        </div>
        <?php else : ?>
        <div class="bl-bottle-outer">
          <div class="bl-bottle">
            <div class="bl-spray-head"></div><div class="bl-spray-nozzle"></div><div class="bl-spray-trigger"></div>
            <div class="bl-bottle-brand">BOUNDLESS</div>
            <div class="bl-bottle-name"><?php bl_text($p['name']); ?></div>
            <div class="bl-bottle-line"></div>
            <div class="bl-bottle-type"><?php bl_text($p['type']); ?></div>
            <div class="bl-bottle-ings">
              <?php foreach ($p['bottle_ings'] as $bi) : ?>
              <div class="bl-bottle-ing"><span><?php echo esc_html($bi[0]); ?></span><span><?php echo esc_html($bi[1]); ?></span></div>
              <?php endforeach; ?>
            </div>
            <div class="bl-bottle-size"><?php echo esc_html($p['size']); ?></div>
          </div>
          <div class="bl-bottle-badge"><?php bl_text($p['bottle_badge']); ?></div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<!-- STATS BAR -->
<div class="bl-stats-bar">
  <div class="bl-wrap bl-stats-inner">
    <?php foreach ($p['stats'] as $st) : ?>
    <div class="bl-stat"><div class="bl-stat-val"><?php bl_text($st[0]); ?></div><div class="bl-stat-label"><?php bl_text($st[1]); ?></div></div>
    <?php endforeach; ?>
    <div class="bl-stat"><div class="bl-stat-val">&#9733; <?php echo esc_html($p['rating']); ?></div><div class="bl-stat-label"><?php echo esc_html($p['reviews']); ?> Reviews</div></div>
  </div>
</div>
<!-- /wp:html -->

<!-- BENEFITS -->
<!-- wp:html -->
<section class="bl-section" id="bl-section-description">
  <div class="bl-wrap">
    <div class="bl-section-header bl-center">
      <div class="bl-eyebrow">Why It Works</div>
      <h2 class="bl-section-title"><?php bl_text($p['benefits_title']); ?></h2>
    </div>
    <div class="bl-benefits-grid">
      <?php foreach ($p['benefits'] as $b) : ?>
      <div class="bl-benefit-card">
        <div class="bl-benefit-icon"><?php echo $b[0]; ?></div>
        <div>
          <div class="bl-benefit-title"><?php bl_text($b[1]); ?></div>
          <p class="bl-benefit-desc"><?php bl_text($b[2]); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /wp:html -->

<!-- TABS — ingredients / how to use / for which dogs -->
<!-- wp:html -->
<section class="bl-section">
  <div class="bl-wrap">
    <div class="bl-tab-bar" id="bl-product-tabs" role="tablist" aria-label="Product details">
      <button class="bl-tab-btn active" role="tab" aria-selected="true" data-bl-tab="bl-panel-prod-ingredients">Ingredients</button>
      <button class="bl-tab-btn" role="tab" aria-selected="false" data-bl-tab="bl-panel-prod-how">How to Use</button>
      <button class="bl-tab-btn" role="tab" aria-selected="false" data-bl-tab="bl-panel-prod-dogs">For Which Dogs</button>
    </div>

    <!-- INGREDIENTS TAB -->
    <div id="bl-panel-prod-ingredients" class="bl-tab-panel active" role="tabpanel">
      <div class="bl-ing-grid">
        <?php foreach ($p['ingredients'] as $ing) :
          $is_hero = ! empty($ing[4]);
          $tag     = isset($ing[5]) ? $ing[5] : '';
        ?>
        <div class="bl-ing-card<?php echo $is_hero ? ' bl-ing-hero' : ''; ?>">
          <?php if ($tag) : ?><div class="bl-ing-hero-tag"><?php echo esc_html($tag); ?></div><?php endif; ?>
          <div class="bl-ing-icon"><?php echo $ing[0]; ?></div>
          <div class="bl-ing-header">
            <span class="bl-ing-name<?php echo $is_hero ? ' bl-ing-name-hero' : ''; ?>"><?php bl_text($ing[1]); ?></span>
            <span class="bl-ing-pct<?php echo $is_hero ? ' bl-ing-pct-hero' : ''; ?>"><?php echo esc_html($ing[2]); ?></span>
          </div>
          <p class="bl-ing-desc<?php echo $is_hero ? ' bl-ing-desc-hero' : ''; ?>"><?php bl_text($ing[3]); ?></p>
        </div>
        <?php endforeach; ?>
      </div>
      <?php if (! empty($p['inci'])) : ?>
      <div class="bl-inci-box">
        <div class="bl-inci-label">Full INCI Declaration</div>
        <p class="bl-inci-text"><?php bl_text($p['inci']); ?></p>
      </div>
      <?php endif; ?>
    </div>

    <!-- HOW TO USE TAB -->
    <div id="bl-panel-prod-how" class="bl-tab-panel" role="tabpanel" hidden>
      <div class="bl-steps-grid">
        <?php foreach ($p['steps'] as $i => $step) : ?>
        <div class="bl-step-wrap">
          <?php if ($i < count($p['steps']) - 1) : ?><div class="bl-step-connector"></div><?php endif; ?>
          <div class="bl-step-card">
            <div class="bl-step-num"><?php echo esc_html($step[0]); ?></div>
            <div class="bl-step-title"><?php bl_text($step[1]); ?></div>
            <p class="bl-step-desc"><?php bl_text($step[2]); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="bl-pro-tip">
        <div class="bl-pro-tip-icon"><?php echo $p['pro_tip'][0]; ?></div>
        <p><strong>Pro tip:</strong> <?php bl_text($p['pro_tip'][1]); ?></p>
      </div>
    </div>

    <!-- FOR WHICH DOGS TAB -->
    <div id="bl-panel-prod-dogs" class="bl-tab-panel" role="tabpanel" hidden>
      <div class="bl-dogs-grid">
        <div>
          <h3 class="bl-dogs-title">Ideal for:</h3>
          <div class="bl-dogs-list">
            <?php foreach ($p['dogs'] as $d) : ?>
            <div class="bl-dog-item"><div class="bl-dog-dot"></div><span><?php bl_text($d); ?></span></div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="bl-dog-cta-box">
          <div class="bl-dog-cta-title"><?php bl_text($p['dog_cta_title']); ?></div>
          <p class="bl-dog-cta-desc"><?php bl_text($p['dog_cta_desc']); ?></p>
          <div class="bl-dog-tags">
            <?php foreach ($p['dog_cta_tags'] as $tag) : ?><span class="bl-dog-tag"><?php bl_text($tag); ?></span><?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->

<!-- REVIEWS -->
<!-- wp:html -->
<section class="bl-section">
  <div class="bl-wrap">
    <div class="bl-section-header bl-center">
      <div class="bl-eyebrow">Customer Stories</div>
      <h2 class="bl-section-title"><?php bl_text($p['reviews_title']); ?></h2>
    </div>
    <div class="bl-reviews-grid">
      <?php foreach ($p['review_list'] as $rv) : ?>
      <div class="bl-review-card">
        <div class="bl-review-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p class="bl-review-text">&ldquo;<?php bl_text($rv[2]); ?>&rdquo;</p>
        <div class="bl-review-footer">
          <span class="bl-review-name"><?php echo esc_html($rv[0]); ?></span>
          <span class="bl-review-breed"><?php echo esc_html($rv[1]); ?></span>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /wp:html -->

<!-- CTA -->
<!-- wp:html -->
<section class="bl-cta-section">
  <h2 class="bl-cta-title"><?php bl_text($p['cta_title']); ?></h2>
  <p class="bl-cta-sub"><?php bl_text($p['cta_sub']); ?></p>
  <div class="bl-cta-purchase"><span class="bl-cta-price"><?php echo $p['currency']; ?><?php echo esc_html($p['price']); ?></span><a href="#affiliate-checkout" class="bl-cta-btn">Shop Now</a></div>
</section>
<!-- /wp:html -->

<!-- wp:boundless/affiliate-checkout {"title":"Checkout Options","description":"This website does not process payment or shipping. Select your preferred checkout option below.","amazonUrl":"https://amazon.co.uk","walmartUrl":"https://walmart.com","shopUrl":"#","shopLabel":"Official Shop","sectionId":"affiliate-checkout"} /-->

<!-- RELATED PRODUCTS -->
<!-- wp:html -->
<section class="bl-related-products">
  <div class="bl-wrap">
    <div class="bl-eyebrow bl-center">More Products</div>
    <h2 class="bl-section-title bl-center">You might also like</h2>
    <div class="bl-related-grid">
      <?php
      $bl_icons = array('original' => '&#127807;', 'natural' => '&#127811;', 'hotspot' => '&#128167;', 'sensitive' => '&#127806;', 'itchrelief' => '&#129526;');
      foreach ($bl_products as $rslug => $rp) :
        if ($rslug === $bl_slug) continue;
      ?>
      <a href="/<?php echo esc_attr($rslug); ?>" class="bl-related-card">
        <div class="bl-related-visual bl-showcase-visual--<?php echo esc_attr($rp['id']); ?>">
          <span class="bl-related-icon"><?php echo isset($bl_icons[$rp['id']]) ? $bl_icons[$rp['id']] : '&#127807;'; ?></span>
        </div>
        <div class="bl-related-info">
          <h3 class="bl-related-name"><?php bl_text($rp['name']); ?></h3>
          <p class="bl-related-type"><?php echo esc_html($rp['type']); ?></p>
          <div class="bl-related-price"><?php echo $rp['currency']; ?><?php echo esc_html($rp['price']); ?></div>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /wp:html -->
