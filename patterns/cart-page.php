<?php
/**
 * Title: Boundless Cart Page
 * Slug: boundless-native-theme/cart-page
 * Categories: boundless
 * Description: Shopping cart page with product summary, quantity controls, and multiple payment/checkout option links.
 */
?>

<!-- wp:html -->
<section class="bl-hero bl-hero--cart">
  <div class="bl-wrap">
    <div class="bl-breadcrumb">BOUNDLESS &middot; Cart</div>
    <h1 class="bl-hero-title">Your Cart</h1>
  </div>
</section>
<!-- /wp:html -->

<!-- wp:html -->
<!-- CART — interactive JS-driven (localStorage cart, qty controls, dynamic totals) -->
<div class="bl-cart-section">
  <div class="bl-cart-grid">
    <div class="bl-cart-items">
      <!-- Static placeholder — JS replaces this with real cart contents from localStorage -->
      <div class="bl-cart-item" id="bl-cart-item-original">
        <div class="bl-cart-item-visual">🌿</div>
        <div class="bl-cart-item-info">
          <div class="bl-cart-item-name">BOUNDLESS Original&#8482;</div>
          <div class="bl-cart-item-sub">No-Chew &amp; Boundary Deterrent Spray &middot; 250 ml</div>
          <div class="bl-cart-item-tags"><span class="bl-cart-tag">Alcohol-Free</span><span class="bl-cart-tag">Skin-Safe</span><span class="bl-cart-tag">pH Balanced</span></div>
        </div>
        <div class="bl-cart-item-controls">
          <div class="bl-cart-qty">
            <button class="bl-qty-btn" onclick="blCartQty('original', -1)">&minus;</button>
            <span class="bl-qty-val" id="bl-cart-qty-original">1</span>
            <button class="bl-qty-btn" onclick="blCartQty('original', 1)">+</button>
          </div>
          <div class="bl-cart-item-price" id="bl-cart-price-original">&pound;12.99</div>
          <button class="bl-cart-remove" onclick="blCartRemove('original')">&times; Remove</button>
        </div>
      </div>
      <div class="bl-cart-empty" id="bl-cart-empty">
        <div class="bl-cart-empty-icon">🛒</div>
        <h3 class="bl-cart-empty-title">Your cart is empty</h3>
        <p class="bl-cart-empty-desc">Browse our products and add items to your cart.</p>
        <a href="/original" class="bl-cta-btn">Shop Products</a>
      </div>
    </div>
    <div class="bl-cart-summary">
      <h2 class="bl-cart-summary-title">Order Summary</h2>
      <div class="bl-cart-summary-row"><span>Subtotal</span><span id="bl-cart-subtotal">&pound;12.99</span></div>
      <div class="bl-cart-summary-row"><span>Shipping</span><span id="bl-cart-shipping">Calculated at checkout</span></div>
      <div class="bl-cart-summary-row bl-cart-total-row"><span>Total</span><span id="bl-cart-total">&pound;12.99</span></div>
      <div class="bl-cart-free-shipping">&#10003; Free shipping on orders over &pound;35</div>
      <h3 class="bl-cart-checkout-heading">Choose Where to Checkout</h3>
      <p class="bl-cart-checkout-note">This site does not process payment directly. Select your preferred store.</p>
      <div class="bl-cart-checkout-options">
        <a href="https://amazon.co.uk" target="_blank" rel="noopener sponsored" class="bl-cart-checkout-btn bl-cart-btn-amazon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M.045 18.02c.072-.116.187-.124.348-.022 3.636 2.11 7.594 3.166 11.87 3.166 2.852 0 5.668-.533 8.447-1.595l.315-.14c.138-.06.234-.1.293-.12.187-.06.323.02.408.24.084.22.024.394-.18.523-1.17.646-2.447 1.15-3.83 1.516a20.82 20.82 0 01-5.31.676 21.4 21.4 0 01-4.96-.57 21.2 21.2 0 01-4.334-1.636c-.185-.102-.267-.248-.248-.44.02-.19.084-.32.18-.397z"/></svg>
          Buy on Amazon
        </a>
        <a href="/checkout" class="bl-cart-checkout-btn bl-cart-btn-shop">🌿 Official Shop</a>
        <a href="/stockists" class="bl-cart-checkout-btn bl-cart-btn-other">🏪 Other Retailers</a>
      </div>
      <div class="bl-cart-guarantee">
        <span>🛡️ 30-day satisfaction guarantee</span>
        <span>📦 Free shipping on &pound;35+</span>
        <span>♻️ Subscribe &amp; Save 10%</span>
      </div>
    </div>
  </div>
</div>
<!-- /wp:html -->
