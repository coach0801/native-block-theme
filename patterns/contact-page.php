<?php
/**
 * Title: Boundless Contact Page
 * Slug: boundless-native-theme/contact-page
 * Categories: boundless
 * Description: Contact page with working form (wp_mail), company info, and support details.
 */
?>

<!-- wp:html -->
<section class="bl-hero bl-hero--contact">
  <div class="bl-wrap">
    <div class="bl-breadcrumb">BOUNDLESS &middot; Contact</div>
    <h1 class="bl-hero-title">Get in Touch</h1>
    <p class="bl-hero-desc">Have a question about BOUNDLESS, need help with an order, or want to become a stockist? We&rsquo;d love to hear from you.</p>
  </div>
</section>
<!-- /wp:html -->

<!-- wp:group {"className":"bl-contact-section"} -->
<div class="wp-block-group bl-contact-section">
  <!-- wp:columns {"className":"bl-contact-grid"} -->
  <div class="wp-block-columns bl-contact-grid">

    <!-- wp:column {"className":"bl-contact-form-wrap"} -->
    <div class="wp-block-column bl-contact-form-wrap">
      <!-- wp:heading {"className":"bl-contact-heading"} -->
      <h2 class="wp-block-heading bl-contact-heading">Send Us a Message</h2>
      <!-- /wp:heading -->

      <!-- wp:html -->
      <?php if (isset($_GET['contact']) && 'success' === $_GET['contact']) : ?>
        <div class="bl-form-notice bl-form-success">Thank you! Your message has been sent. We'll get back to you within 24–48 hours.</div>
      <?php elseif (isset($_GET['contact']) && 'error' === $_GET['contact']) : ?>
        <div class="bl-form-notice bl-form-error">Something went wrong. Please try again or email us directly.</div>
      <?php endif; ?>
      <form class="bl-contact-form" id="bl-contact-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
        <input type="hidden" name="action" value="boundless_contact" />
        <?php wp_nonce_field('boundless_contact_submit', 'boundless_contact_nonce'); ?>
        <div class="bl-form-row">
          <div class="bl-form-group"><label class="bl-form-label" for="bl-name">Full Name</label><input class="bl-form-input" type="text" id="bl-name" name="name" required placeholder="Your name" /></div>
          <div class="bl-form-group"><label class="bl-form-label" for="bl-email">Email Address</label><input class="bl-form-input" type="email" id="bl-email" name="email" required placeholder="you@example.com" /></div>
        </div>
        <div class="bl-form-group"><label class="bl-form-label" for="bl-subject">Subject</label>
          <select class="bl-form-input" id="bl-subject" name="subject" required><option value="" disabled selected>Choose a topic&hellip;</option><option value="Order Enquiry">Order Enquiry</option><option value="Product Question">Product Question</option><option value="Become a Stockist">Become a Stockist</option><option value="Press &amp; Media">Press &amp; Media</option><option value="Other">Other</option></select>
        </div>
        <div class="bl-form-group"><label class="bl-form-label" for="bl-message">Message</label><textarea class="bl-form-input bl-form-textarea" id="bl-message" name="message" rows="6" required placeholder="How can we help?"></textarea></div>
        <button type="submit" class="bl-form-submit">Send Message</button>
      </form>
      <!-- /wp:html -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"className":"bl-contact-info"} -->
    <div class="wp-block-column bl-contact-info">
      <!-- wp:group {"className":"bl-contact-card"} -->
      <div class="wp-block-group bl-contact-card">
        <!-- wp:paragraph --><p>📧</p><!-- /wp:paragraph -->
        <!-- wp:heading {"level":3,"className":"bl-contact-card-title"} --><h3 class="wp-block-heading bl-contact-card-title">Email</h3><!-- /wp:heading -->
        <!-- wp:paragraph {"className":"bl-contact-card-text"} --><p class="bl-contact-card-text">hello@boundless.co.uk</p><!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->
      <!-- wp:group {"className":"bl-contact-card"} -->
      <div class="wp-block-group bl-contact-card">
        <!-- wp:paragraph --><p>📍</p><!-- /wp:paragraph -->
        <!-- wp:heading {"level":3,"className":"bl-contact-card-title"} --><h3 class="wp-block-heading bl-contact-card-title">Location</h3><!-- /wp:heading -->
        <!-- wp:paragraph {"className":"bl-contact-card-text"} --><p class="bl-contact-card-text">United Kingdom<br>R&amp;D Prototype Stage</p><!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->
      <!-- wp:group {"className":"bl-contact-card"} -->
      <div class="wp-block-group bl-contact-card">
        <!-- wp:paragraph --><p>⏰</p><!-- /wp:paragraph -->
        <!-- wp:heading {"level":3,"className":"bl-contact-card-title"} --><h3 class="wp-block-heading bl-contact-card-title">Response Time</h3><!-- /wp:heading -->
        <!-- wp:paragraph {"className":"bl-contact-card-text"} --><p class="bl-contact-card-text">We aim to reply within 24–48 hours on business days.</p><!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->
      <!-- wp:group {"className":"bl-contact-card"} -->
      <div class="wp-block-group bl-contact-card">
        <!-- wp:paragraph --><p>🛒</p><!-- /wp:paragraph -->
        <!-- wp:heading {"level":3,"className":"bl-contact-card-title"} --><h3 class="wp-block-heading bl-contact-card-title">Order Support</h3><!-- /wp:heading -->
        <!-- wp:paragraph {"className":"bl-contact-card-text"} --><p class="bl-contact-card-text">Orders are handled by our retail partners. For order issues, contact Amazon or your retailer directly.</p><!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:column -->

  </div>
  <!-- /wp:columns -->
</div>
<!-- /wp:group -->
