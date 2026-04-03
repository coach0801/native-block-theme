<?php
/**
 * Title: Boundless Homepage
 * Slug: boundless-native-theme/homepage
 * Categories: boundless
 * Description: Homepage with sliding showcase, hero, stats, benefits, ingredients tabs, reviews, blog, CTA, checkout.
 */
?>

<!-- wp:html -->
<!-- SLIDING PRODUCT SHOWCASE — interactive carousel requires custom JS -->
<section class="bl-showcase-slider">
  <div class="bl-wrap">
    <div class="bl-showcase-header">
      <div class="bl-eyebrow">Our Products</div>
      <h2 class="bl-section-title">The BOUNDLESS Range</h2>
    </div>
    <div class="bl-showcase-track-wrap">
      <button class="bl-showcase-arrow bl-showcase-prev" aria-label="Previous product" onclick="blSliderPrev()">&#8249;</button>
      <div class="bl-showcase-track" id="bl-showcase-track">
        <div class="bl-showcase-card bl-showcase-active">
          <div class="bl-showcase-visual bl-showcase-visual--original"><div class="bl-showcase-bottle-icon">&#127807;</div></div>
          <div class="bl-showcase-info">
            <span class="bl-showcase-badge">BESTSELLER</span>
            <h3 class="bl-showcase-name">Original&#8482;</h3>
            <p class="bl-showcase-desc">No-Chew &amp; Boundary Deterrent Spray. Alcohol-free. Triple scent barrier.</p>
            <div class="bl-showcase-price">&pound;12.99 <span>250 ml</span></div>
            <a href="/original" class="bl-showcase-btn">View Product &rarr;</a>
          </div>
        </div>
        <div class="bl-showcase-card">
          <div class="bl-showcase-visual bl-showcase-visual--natural"><div class="bl-showcase-bottle-icon">&#127811;</div></div>
          <div class="bl-showcase-info">
            <span class="bl-showcase-badge bl-showcase-badge--natural">NATURAL</span>
            <h3 class="bl-showcase-name">Natural&#8482;</h3>
            <p class="bl-showcase-desc">Essential Oil Blend Formula. Plant-powered deterrent for sensitive environments.</p>
            <div class="bl-showcase-price">&pound;14.99 <span>250 ml</span></div>
            <a href="/natural" class="bl-showcase-btn">View Product &rarr;</a>
          </div>
        </div>
        <div class="bl-showcase-card">
          <div class="bl-showcase-visual bl-showcase-visual--hotspot"><div class="bl-showcase-bottle-icon">&#128167;</div></div>
          <div class="bl-showcase-info">
            <span class="bl-showcase-badge bl-showcase-badge--hotspot">2-IN-1</span>
            <h3 class="bl-showcase-name">2-in-1&#8482; Hot Spot</h3>
            <p class="bl-showcase-desc">Treat + Deter Dual Action. Soothes hot spots while setting boundaries.</p>
            <div class="bl-showcase-price">&pound;16.99 <span>250 ml</span></div>
            <a href="/2-in-1" class="bl-showcase-btn">View Product &rarr;</a>
          </div>
        </div>
        <div class="bl-showcase-card">
          <div class="bl-showcase-visual bl-showcase-visual--sensitive"><div class="bl-showcase-bottle-icon">&#127806;</div></div>
          <div class="bl-showcase-info">
            <span class="bl-showcase-badge bl-showcase-badge--sensitive">SENSITIVE</span>
            <h3 class="bl-showcase-name">Sensitive</h3>
            <p class="bl-showcase-desc">Fragrance-Free Dog Shampoo. Colloidal oatmeal &amp; Sodium PCA. Sulfate-free.</p>
            <div class="bl-showcase-price">$18.99 <span>16 fl oz</span></div>
            <a href="/sensitive" class="bl-showcase-btn">View Product &rarr;</a>
          </div>
        </div>
        <div class="bl-showcase-card">
          <div class="bl-showcase-visual bl-showcase-visual--itchrelief"><div class="bl-showcase-bottle-icon">&#129526;</div></div>
          <div class="bl-showcase-info">
            <span class="bl-showcase-badge bl-showcase-badge--itchrelief">ITCH RELIEF</span>
            <h3 class="bl-showcase-name">Itch Relief</h3>
            <p class="bl-showcase-desc">Salicylic Acid &amp; Niacinamide. Vet-grade actives. Tea tree-free.</p>
            <div class="bl-showcase-price">$23.99 <span>16 fl oz</span></div>
            <a href="/itch-relief" class="bl-showcase-btn">View Product &rarr;</a>
          </div>
        </div>
      </div>
      <button class="bl-showcase-arrow bl-showcase-next" aria-label="Next product" onclick="blSliderNext()">&#8250;</button>
    </div>
    <div class="bl-showcase-dots" id="bl-showcase-dots">
      <button class="bl-showcase-dot active" aria-label="Product 1"></button>
      <button class="bl-showcase-dot" aria-label="Product 2"></button>
      <button class="bl-showcase-dot" aria-label="Product 3"></button>
      <button class="bl-showcase-dot" aria-label="Product 4"></button>
      <button class="bl-showcase-dot" aria-label="Product 5"></button>
    </div>
  </div>
</section>

<!-- USP TICKER — animated scrolling strip -->
<div class="bl-usp-bar" aria-hidden="true">
  <div class="bl-usp-track">
    <span class="bl-usp-item"><span class="bl-usp-dot"></span>Alcohol-Free Formula</span>
    <span class="bl-usp-item"><span class="bl-usp-dot"></span>Triple Scent Barrier</span>
    <span class="bl-usp-item"><span class="bl-usp-dot"></span>Skin-Safe on Contact</span>
    <span class="bl-usp-item"><span class="bl-usp-dot"></span>Eco-Certified Preservative</span>
    <span class="bl-usp-item"><span class="bl-usp-dot"></span>pH Balanced 5.5&ndash;6.0</span>
    <span class="bl-usp-item"><span class="bl-usp-dot"></span>World&rsquo;s Bitterest Compound</span>
    <span class="bl-usp-item"><span class="bl-usp-dot"></span>Vet &amp; Trainer Recommended</span>
    <span class="bl-usp-item"><span class="bl-usp-dot"></span>Alcohol-Free Formula</span>
    <span class="bl-usp-item"><span class="bl-usp-dot"></span>Triple Scent Barrier</span>
    <span class="bl-usp-item"><span class="bl-usp-dot"></span>Skin-Safe on Contact</span>
    <span class="bl-usp-item"><span class="bl-usp-dot"></span>Eco-Certified Preservative</span>
    <span class="bl-usp-item"><span class="bl-usp-dot"></span>pH Balanced 5.5&ndash;6.0</span>
    <span class="bl-usp-item"><span class="bl-usp-dot"></span>World&rsquo;s Bitterest Compound</span>
    <span class="bl-usp-item"><span class="bl-usp-dot"></span>Vet &amp; Trainer Recommended</span>
  </div>
</div>

<!-- HERO — custom interactive section (bottle visual, qty controls, cart button) -->
<section class="bl-hero">
  <div class="bl-wrap">
    <div class="bl-breadcrumb">BOUNDLESS &middot; Dog Deterrent Spray &middot; Alcohol-Free Formulation</div>
    <div class="bl-hero-grid">
      <div class="bl-hero-content">
        <div class="bl-hero-badge"><div class="bl-badge-dot"></div><span>Alcohol-Free &middot; Skin-Safe Formula</span></div>
        <div class="bl-hero-brand">BOUNDLESS</div>
        <h1 class="bl-hero-title">Original&#8482;</h1>
        <div class="bl-hero-subtitle">No-Chew &amp; Boundary Deterrent Spray &middot; 250 ml</div>
        <p class="bl-hero-tagline">Firm boundaries. Gentle formula. No compromise.</p>
        <div class="bl-stars-row">
          <span class="bl-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
          <span class="bl-review-count">4.8 &middot; 92 reviews</span>
        </div>
        <p class="bl-hero-desc">The alcohol-free dog deterrent spray that protects your home without worrying about your dog. Denatonium benzoate &mdash; the world&rsquo;s most bitter compound &mdash; pairs with a triple essential oil scent barrier and skin-safe actives. One spray. Lasting results.</p>
        <div class="bl-purchase-row">
          <div class="bl-price-block"><span class="bl-price">&pound;12.99</span><span class="bl-price-size">250 ml</span></div>
          <div class="bl-buy-controls">
            <div class="bl-qty-control">
              <button class="bl-qty-btn" aria-label="Decrease quantity" onclick="blChangeQty(-1)">&minus;</button>
              <span class="bl-qty-val" id="bl-qty-display">1</span>
              <button class="bl-qty-btn" aria-label="Increase quantity" onclick="blChangeQty(1)">+</button>
            </div>
            <button class="bl-add-btn" id="bl-add-btn" data-product="original" onclick="blAddToCart()">Add to Cart</button>
          </div>
        </div>
        <div class="bl-trust-row">
          <span>&#10003; Free shipping &pound;35+</span>
          <span>&#10003; 30-day guarantee</span>
          <span>&#10003; Alcohol-Free</span>
          <span>&#10003; Skin-Safe Formula</span>
        </div>
      </div>
      <div class="bl-bottle-wrap">
        <div class="bl-bottle-outer">
          <div class="bl-bottle">
            <div class="bl-spray-head"></div>
            <div class="bl-spray-nozzle"></div>
            <div class="bl-spray-trigger"></div>
            <div class="bl-bottle-brand">BOUNDLESS</div>
            <div class="bl-bottle-name">Original&#8482;</div>
            <div class="bl-bottle-line"></div>
            <div class="bl-bottle-type">No-Chew Deterrent Spray</div>
            <div class="bl-bottle-ings">
              <div class="bl-bottle-ing"><span>Denatonium Benzoate</span><span>0.015%</span></div>
              <div class="bl-bottle-ing"><span>Citronella Oil</span><span>0.30%</span></div>
              <div class="bl-bottle-ing"><span>Peppermint Oil</span><span>0.30%</span></div>
              <div class="bl-bottle-ing"><span>Allantoin</span><span>0.20%</span></div>
            </div>
            <div class="bl-bottle-size">250 ml &middot; pH 5.5&ndash;6.0</div>
          </div>
          <div class="bl-bottle-badge">SKIN SAFE</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- STATS BAR -->
<div class="bl-stats-bar">
  <div class="bl-wrap bl-stats-inner">
    <div class="bl-stat"><div class="bl-stat-val">0.015%</div><div class="bl-stat-label">Denatonium Benzoate</div></div>
    <div class="bl-stat"><div class="bl-stat-val">pH 5.5&ndash;6.0</div><div class="bl-stat-label">Skin Balanced</div></div>
    <div class="bl-stat"><div class="bl-stat-val">0%</div><div class="bl-stat-label">Alcohol</div></div>
    <div class="bl-stat"><div class="bl-stat-val">Triple</div><div class="bl-stat-label">Scent Barrier</div></div>
    <div class="bl-stat"><div class="bl-stat-val">&#9733; 4.8</div><div class="bl-stat-label">92 Reviews</div></div>
  </div>
</div>
<!-- /wp:html -->

<!-- BENEFITS — native WordPress blocks for visual editing -->
<!-- wp:group {"className":"bl-section"} -->
<div class="wp-block-group bl-section">
  <!-- wp:group {"className":"bl-section-header bl-center"} -->
  <div class="wp-block-group bl-section-header bl-center">
    <!-- wp:paragraph {"className":"bl-eyebrow"} -->
    <p class="bl-eyebrow">Why It Works</p>
    <!-- /wp:paragraph -->
    <!-- wp:heading {"className":"bl-section-title"} -->
    <h2 class="wp-block-heading bl-section-title">Science-backed deterrence, naturally safe</h2>
    <!-- /wp:heading -->
  </div>
  <!-- /wp:group -->
  <!-- wp:columns {"className":"bl-benefits-grid"} -->
  <div class="wp-block-columns bl-benefits-grid">
    <!-- wp:column {"className":"bl-benefit-card"} -->
    <div class="wp-block-column bl-benefit-card">
      <!-- wp:paragraph {"className":"bl-benefit-icon"} -->
      <p class="bl-benefit-icon">😝</p>
      <!-- /wp:paragraph -->
      <!-- wp:heading {"level":3,"className":"bl-benefit-title"} -->
      <h3 class="wp-block-heading bl-benefit-title">World's Most Bitter Compound</h3>
      <!-- /wp:heading -->
      <!-- wp:paragraph {"className":"bl-benefit-desc"} -->
      <p class="bl-benefit-desc">Denatonium benzoate at 0.015% — calibrated precisely so one lick is the last lick. Used by vets and trainers worldwide. Fast-acting and long-lasting on any surface.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->
    <!-- wp:column {"className":"bl-benefit-card"} -->
    <div class="wp-block-column bl-benefit-card">
      <!-- wp:paragraph {"className":"bl-benefit-icon"} -->
      <p class="bl-benefit-icon">🌿</p>
      <!-- /wp:paragraph -->
      <!-- wp:heading {"level":3,"className":"bl-benefit-title"} -->
      <h3 class="wp-block-heading bl-benefit-title">Triple Essential Oil Scent Barrier</h3>
      <!-- /wp:heading -->
      <!-- wp:paragraph {"className":"bl-benefit-desc"} -->
      <p class="bl-benefit-desc">Citronella, lemongrass and peppermint oils create a layered olfactory boundary dogs instinctively avoid. Multiple scents prevent habituation — unlike single-note competitors.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->
    <!-- wp:column {"className":"bl-benefit-card"} -->
    <div class="wp-block-column bl-benefit-card">
      <!-- wp:paragraph {"className":"bl-benefit-icon"} -->
      <p class="bl-benefit-icon">💧</p>
      <!-- /wp:paragraph -->
      <!-- wp:heading {"level":3,"className":"bl-benefit-title"} -->
      <h3 class="wp-block-heading bl-benefit-title">Alcohol-Free — Genuinely Skin-Safe</h3>
      <!-- /wp:heading -->
      <!-- wp:paragraph {"className":"bl-benefit-desc"} -->
      <p class="bl-benefit-desc">Unlike most deterrent sprays, BOUNDLESS Original contains zero alcohol. Glycerin and allantoin ensure the formula is safe even if overspray contacts your dog's skin or coat.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->
    <!-- wp:column {"className":"bl-benefit-card"} -->
    <div class="wp-block-column bl-benefit-card">
      <!-- wp:paragraph {"className":"bl-benefit-icon"} -->
      <p class="bl-benefit-icon">🌱</p>
      <!-- /wp:paragraph -->
      <!-- wp:heading {"level":3,"className":"bl-benefit-title"} -->
      <h3 class="wp-block-heading bl-benefit-title">Eco-Certified &amp; pH Balanced</h3>
      <!-- /wp:heading -->
      <!-- wp:paragraph {"className":"bl-benefit-desc"} -->
      <p class="bl-benefit-desc">Eco-certified preservative blend, Disodium EDTA for enhanced stability, and a carefully controlled pH of 5.5–6.0. No parabens, no sulphates, no compromise on safety.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:html -->
<!-- TABS — interactive JS-driven tab switching requires custom markup -->
<section class="bl-section">
  <div class="bl-tab-bar" id="bl-tabs" role="tablist" aria-label="Product details">
    <button class="bl-tab-btn active" role="tab" aria-selected="true" data-bl-tab="bl-panel-ingredients">Ingredients</button>
    <button class="bl-tab-btn" role="tab" aria-selected="false" data-bl-tab="bl-panel-how">How to Use</button>
    <button class="bl-tab-btn" role="tab" aria-selected="false" data-bl-tab="bl-panel-dogs">For Which Dogs</button>
  </div>

  <div id="bl-panel-ingredients" class="bl-tab-panel active" role="tabpanel">
    <div class="bl-ing-grid">
      <div class="bl-ing-card bl-ing-hero"><div class="bl-ing-hero-tag">HERO</div><div class="bl-ing-icon">😝</div><div class="bl-ing-header"><span class="bl-ing-name bl-ing-name-hero">Denatonium Benzoate</span><span class="bl-ing-pct bl-ing-pct-hero">0.015%</span></div><p class="bl-ing-desc bl-ing-desc-hero">The world's most bitter compound. One lick creates an immediate, powerful aversion. Taste-deterrent technology proven in veterinary and training applications worldwide.</p></div>
      <div class="bl-ing-card bl-ing-hero"><div class="bl-ing-hero-tag">HERO</div><div class="bl-ing-icon">🍋</div><div class="bl-ing-header"><span class="bl-ing-name bl-ing-name-hero">Citronella + Lemongrass</span><span class="bl-ing-pct bl-ing-pct-hero">0.60%</span></div><p class="bl-ing-desc bl-ing-desc-hero">Dual citrus essential oils provide the first two layers of the scent barrier. Combined, they create an avoidance trigger dogs instinctively respond to — without habituation.</p></div>
      <div class="bl-ing-card bl-ing-hero"><div class="bl-ing-hero-tag">HERO</div><div class="bl-ing-icon">🌱</div><div class="bl-ing-header"><span class="bl-ing-name bl-ing-name-hero">Peppermint + Menthol</span><span class="bl-ing-pct bl-ing-pct-hero">0.40%</span></div><p class="bl-ing-desc bl-ing-desc-hero">The third scent layer. Cooling mint completes the triple barrier and adds repellent synergy. Pre-dissolved in propylene glycol for crystal-free stability.</p></div>
      <div class="bl-ing-card"><div class="bl-ing-icon">🌿</div><div class="bl-ing-header"><span class="bl-ing-name">Allantoin</span><span class="bl-ing-pct">0.20%</span></div><p class="bl-ing-desc">Skin-soothing active that calms any irritation if overspray contacts your dog. The same ingredient used in premium wound-care and pet skincare products.</p></div>
      <div class="bl-ing-card"><div class="bl-ing-icon">💧</div><div class="bl-ing-header"><span class="bl-ing-name">Glycerin + Propylene Glycol</span><span class="bl-ing-pct">5.00%</span></div><p class="bl-ing-desc">Humectant duo that provides skin conditioning, keeps the formula stable, and aids penetration of active ingredients into porous surfaces.</p></div>
      <div class="bl-ing-card"><div class="bl-ing-icon">🍎</div><div class="bl-ing-header"><span class="bl-ing-name">Apple Fruit Extract</span><span class="bl-ing-pct">1.00%</span></div><p class="bl-ing-desc">Standardised, preserved botanical extract providing antioxidant activity and a subtle cosmetic elegance — the pleasant top-note on spray application.</p></div>
    </div>
  </div>

  <div id="bl-panel-how" class="bl-tab-panel" role="tabpanel" hidden>
    <div class="bl-steps-grid">
      <div class="bl-step-wrap"><div class="bl-step-connector"></div><div class="bl-step-card"><div class="bl-step-num">01</div><div class="bl-step-title">Shake &amp; aim</div><p class="bl-step-desc">Hold bottle 20 cm from the target surface. Shake gently before first use of each session.</p></div></div>
      <div class="bl-step-wrap"><div class="bl-step-connector"></div><div class="bl-step-card"><div class="bl-step-num">02</div><div class="bl-step-title">Spray 2&ndash;3 times</div><p class="bl-step-desc">Apply 2&ndash;3 sprays evenly across the surface. Works on wood, fabric, leather, carpet, plastic and metal.</p></div></div>
      <div class="bl-step-wrap"><div class="bl-step-connector"></div><div class="bl-step-card"><div class="bl-step-num">03</div><div class="bl-step-title">Allow 60 seconds</div><p class="bl-step-desc">Let the surface dry fully. The scent barrier activates immediately. The bitterant bonds to the surface for lasting taste deterrence.</p></div></div>
      <div class="bl-step-wrap"><div class="bl-step-card"><div class="bl-step-num">04</div><div class="bl-step-title">Reapply weekly</div><p class="bl-step-desc">Reapply every 1&ndash;2 weeks or after cleaning. Combine with positive reinforcement training for fastest, most permanent results.</p></div></div>
    </div>
    <div class="bl-pro-tip"><div class="bl-pro-tip-icon">🌿</div><p><strong>Pro tip:</strong> For persistent chewers, apply to a small test area first and observe your dog&rsquo;s reaction after 5 minutes. Most dogs will investigate, sniff, attempt to taste, and then immediately retreat.</p></div>
  </div>

  <div id="bl-panel-dogs" class="bl-tab-panel" role="tabpanel" hidden>
    <div class="bl-dogs-grid">
      <div>
        <h3 class="bl-dogs-title">Ideal for:</h3>
        <div class="bl-dogs-list">
          <div class="bl-dog-item"><div class="bl-dog-dot"></div><span>Persistent chewers and destructive dogs</span></div>
          <div class="bl-dog-item"><div class="bl-dog-dot"></div><span>Puppies learning household boundaries</span></div>
          <div class="bl-dog-item"><div class="bl-dog-dot"></div><span>Dogs that target furniture, cables or shoes</span></div>
          <div class="bl-dog-item"><div class="bl-dog-dot"></div><span>All breeds and coat types</span></div>
          <div class="bl-dog-item"><div class="bl-dog-dot"></div><span>Multi-dog households</span></div>
          <div class="bl-dog-item"><div class="bl-dog-dot"></div><span>Rescue dogs needing boundary training</span></div>
        </div>
      </div>
      <div class="bl-dog-cta-box">
        <div class="bl-dog-cta-title">Not sure if it&rsquo;s right for your dog?</div>
        <p class="bl-dog-cta-desc">If your dog chews furniture, targets cables, or ignores boundaries &mdash; BOUNDLESS Original was built for them. Alcohol-free so you never have to worry about overspray. Effective on 20+ surface types. Works from day one.</p>
        <div class="bl-dog-tags"><span class="bl-dog-tag">Alcohol-Free</span><span class="bl-dog-tag">pH-Balanced</span><span class="bl-dog-tag">All Breeds</span><span class="bl-dog-tag">Trainer Recommended</span></div>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->

<!-- Product Highlights — custom Gutenberg block with editable attributes -->
<!-- wp:boundless/product-highlights {"title":"Product Highlights","items":["Denatonium Benzoate 0.015%","pH 5.5-6.0","0% Alcohol","Triple Scent Barrier","Skin-Safe Formula","Eco-Certified"]} /-->

<!-- REVIEWS — native WordPress blocks -->
<!-- wp:group {"className":"bl-section"} -->
<div class="wp-block-group bl-section">
  <!-- wp:group {"className":"bl-section-header bl-center"} -->
  <div class="wp-block-group bl-section-header bl-center">
    <!-- wp:paragraph {"className":"bl-eyebrow"} -->
    <p class="bl-eyebrow">Customer Stories</p>
    <!-- /wp:paragraph -->
    <!-- wp:heading {"className":"bl-section-title"} -->
    <h2 class="wp-block-heading bl-section-title">Dogs stopped. Owners relieved.</h2>
    <!-- /wp:heading -->
  </div>
  <!-- /wp:group -->
  <!-- wp:columns {"className":"bl-reviews-grid"} -->
  <div class="wp-block-columns bl-reviews-grid">
    <!-- wp:column {"className":"bl-review-card"} -->
    <div class="wp-block-column bl-review-card">
      <!-- wp:paragraph {"className":"bl-review-stars"} -->
      <p class="bl-review-stars">★★★★★</p>
      <!-- /wp:paragraph -->
      <!-- wp:paragraph {"className":"bl-review-text"} -->
      <p class="bl-review-text">"Finally a spray I don't worry about. Milo is a Lab — he gets into everything. BOUNDLESS works and I'm not panicking when he licks the sofa leg. The alcohol-free thing is a game changer."</p>
      <!-- /wp:paragraph -->
      <!-- wp:group {"className":"bl-review-footer","layout":{"type":"flex","justifyContent":"space-between"}} -->
      <div class="wp-block-group bl-review-footer">
        <!-- wp:paragraph {"className":"bl-review-name"} -->
        <p class="bl-review-name">Sarah R.</p>
        <!-- /wp:paragraph -->
        <!-- wp:paragraph {"className":"bl-review-breed"} -->
        <p class="bl-review-breed">Labrador Retriever</p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:column -->
    <!-- wp:column {"className":"bl-review-card"} -->
    <div class="wp-block-column bl-review-card">
      <!-- wp:paragraph {"className":"bl-review-stars"} -->
      <p class="bl-review-stars">★★★★★</p>
      <!-- /wp:paragraph -->
      <!-- wp:paragraph {"className":"bl-review-text"} -->
      <p class="bl-review-text">"Three dogs, one product. All three avoid the kitchen counter now. The mint smell is actually pleasant for us humans too. Genuinely the first deterrent spray that has actually worked long-term."</p>
      <!-- /wp:paragraph -->
      <!-- wp:group {"className":"bl-review-footer","layout":{"type":"flex","justifyContent":"space-between"}} -->
      <div class="wp-block-group bl-review-footer">
        <!-- wp:paragraph {"className":"bl-review-name"} -->
        <p class="bl-review-name">James M.</p>
        <!-- /wp:paragraph -->
        <!-- wp:paragraph {"className":"bl-review-breed"} -->
        <p class="bl-review-breed">Multi-dog household</p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:column -->
    <!-- wp:column {"className":"bl-review-card"} -->
    <div class="wp-block-column bl-review-card">
      <!-- wp:paragraph {"className":"bl-review-stars"} -->
      <p class="bl-review-stars">★★★★★</p>
      <!-- /wp:paragraph -->
      <!-- wp:paragraph {"className":"bl-review-text"} -->
      <p class="bl-review-text">"My rescue was a compulsive cable chewer. Two weeks of BOUNDLESS Original and zero incidents. I was told by my vet to try a bitterant spray and this one is the best formulated I've found."</p>
      <!-- /wp:paragraph -->
      <!-- wp:group {"className":"bl-review-footer","layout":{"type":"flex","justifyContent":"space-between"}} -->
      <div class="wp-block-group bl-review-footer">
        <!-- wp:paragraph {"className":"bl-review-name"} -->
        <p class="bl-review-name">Priya T.</p>
        <!-- /wp:paragraph -->
        <!-- wp:paragraph {"className":"bl-review-breed"} -->
        <p class="bl-review-breed">Rescue Mixed Breed</p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- LATEST POSTS — uses native WordPress query block -->
<!-- wp:group {"className":"bl-section","style":{"spacing":{"padding":{"bottom":"0px"}}}} -->
<div class="wp-block-group bl-section">
  <!-- wp:group {"className":"bl-section-header bl-center"} -->
  <div class="wp-block-group bl-section-header bl-center">
    <!-- wp:paragraph {"className":"bl-eyebrow"} -->
    <p class="bl-eyebrow">The Bark Blog</p>
    <!-- /wp:paragraph -->
    <!-- wp:heading {"className":"bl-section-title"} -->
    <h2 class="wp-block-heading bl-section-title">Tips &amp; guides for dog owners</h2>
    <!-- /wp:heading -->
  </div>
  <!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:query {"queryId":11,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date"},"className":"bl-posts-query"} -->
<div class="wp-block-query bl-posts-query">
  <!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
  <!-- wp:group {"className":"bl-post-card"} -->
  <div class="wp-block-group bl-post-card">
    <!-- wp:post-title {"isLink":true,"level":4} /-->
    <!-- wp:post-excerpt {"moreText":"Read more →","excerptLength":20} /-->
  </div>
  <!-- /wp:group -->
  <!-- /wp:post-template -->
</div>
<!-- /wp:query -->

<!-- wp:html -->
<!-- CTA — dark background section -->
<section class="bl-cta-section">
  <h2 class="bl-cta-title">Firm boundaries. Gentle formula.</h2>
  <p class="bl-cta-sub">The alcohol-free deterrent spray your dog will never get past.</p>
  <div class="bl-cta-purchase">
    <span class="bl-cta-price">&pound;12.99</span>
    <a href="#affiliate-checkout" class="bl-cta-btn">Shop Now</a>
  </div>
  <p class="bl-cta-note">Free shipping on orders over &pound;35 &middot; 30-day satisfaction guarantee &middot; Alcohol-Free &middot; pH Balanced</p>
</section>

<!-- AMAZON CHECKOUT — interactive with affiliate links -->
<section class="bl-amazon-section" id="affiliate-checkout">
  <div class="bl-wrap bl-center">
    <div class="bl-eyebrow bl-amazon-eyebrow">Shop Now</div>
    <h2 class="bl-section-title bl-amazon-title">Ready to set<br><strong>firm boundaries?</strong></h2>
    <p class="bl-amazon-sub">Available on Amazon with Prime delivery. Subscribe &amp; Save 10% for ongoing protection. 100% satisfaction guarantee.</p>
    <a href="https://amazon.co.uk" target="_blank" rel="noopener sponsored" class="bl-amazon-btn">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M.045 18.02c.072-.116.187-.124.348-.022 3.636 2.11 7.594 3.166 11.87 3.166 2.852 0 5.668-.533 8.447-1.595l.315-.14c.138-.06.234-.1.293-.12.187-.06.323.02.408.24.084.22.024.394-.18.523-1.17.646-2.447 1.15-3.83 1.516a20.82 20.82 0 01-5.31.676 21.4 21.4 0 01-4.96-.57 21.2 21.2 0 01-4.334-1.636c-.185-.102-.267-.248-.248-.44.02-.19.084-.32.18-.397z"/></svg>
      Buy on Amazon
    </a>
    <a href="/checkout" class="bl-shop-btn">Official Shop &rarr;</a>
    <div class="bl-price-tiers">
      <div class="bl-price-tier"><div class="bl-pt-size">250 ml</div><div class="bl-pt-price">&pound;12.99</div></div>
      <div class="bl-price-tier"><div class="bl-pt-size">500 ml</div><div class="bl-pt-price">&pound;21.99</div></div>
      <div class="bl-price-tier bl-price-tier-best"><div class="bl-pt-best">BEST VALUE</div><div class="bl-pt-size">Twin Pack</div><div class="bl-pt-price">&pound;23.99</div></div>
    </div>
  </div>
</section>
<!-- /wp:html -->

<!-- Affiliate checkout — custom Gutenberg block with editable attributes -->
<!-- wp:boundless/affiliate-checkout {"title":"Checkout Options","description":"This website does not process payment or shipping. Select your preferred checkout option below.","amazonUrl":"https://amazon.co.uk","walmartUrl":"https://walmart.com","shopUrl":"#","shopLabel":"Official Shop","sectionId":"affiliate-checkout-block"} /-->
