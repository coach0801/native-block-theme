<?php
/**
 * Title: Top Category
 * Slug: boundless-native-theme/top-category
 * Categories: boundless
 * Description: Top-level category page with subcategory thumbnail cards and product listing grid.
 */

/* ── Category data keyed by page slug ── */
$bl_categories = array(
	'grooming' => array(
		'title' => 'Grooming',
		'desc'  => 'Premium grooming products formulated with clean ingredients. Gentle on your pet\'s skin and coat — effective on every need.',
		'subs'  => array(
			array('name' => 'Shampoo',              'slug' => '/shampoo',               'icon' => '🧴', 'gradient' => 'linear-gradient(135deg,#E8F5ED,#B5D8C0)'),
			array('name' => 'Conditioner',           'slug' => '/conditioner',            'icon' => '💧', 'gradient' => 'linear-gradient(135deg,#E0F0FF,#A8D4F5)'),
			array('name' => 'Detangler Spray',       'slug' => '/detangler-spray',        'icon' => '✨', 'gradient' => 'linear-gradient(135deg,#FFF8E1,#FFE082)'),
			array('name' => 'Cologne Spray',         'slug' => '/deodorant-cologne-spray', 'icon' => '🌸', 'gradient' => 'linear-gradient(135deg,#FDDDE6,#F8B4CC)'),
			array('name' => 'Waterless Shampoo',     'slug' => '/waterless-shampoo',      'icon' => '🍃', 'gradient' => 'linear-gradient(135deg,#E8F5ED,#C8E4D0)'),
		),
	),
	'behavior' => array(
		'title' => 'Behavior',
		'desc'  => 'Training aids and behavior products designed to set boundaries safely and effectively — for dogs and cats.',
		'subs'  => array(
			array('name' => 'Training Aid for Dogs', 'slug' => '/training-aid-dogs',  'icon' => '🐕', 'gradient' => 'linear-gradient(135deg,#E8F5ED,#B5D8C0)'),
			array('name' => 'Training Aids For Cats','slug' => '/training-aids-cats',  'icon' => '🐈', 'gradient' => 'linear-gradient(135deg,#FFF0E6,#FFCBA4)'),
		),
	),
	'flea-tick' => array(
		'title' => 'Flea &amp; Tick Spray',
		'desc'  => 'Protect your home, yard, and pets from fleas and ticks with our natural, effective spray formulations.',
		'subs'  => array(
			array('name' => 'Spray For Home',            'slug' => '/flea-tick-home',   'icon' => '🏠', 'gradient' => 'linear-gradient(135deg,#E8F5ED,#B5D8C0)'),
			array('name' => 'Garden &amp; Yard Spray',   'slug' => '/flea-tick-garden', 'icon' => '🌿', 'gradient' => 'linear-gradient(135deg,#CDFAD5,#90EE90)'),
		),
	),
	'dental' => array(
		'title' => 'Dental',
		'desc'  => 'Dental care products for fresher breath and healthier teeth — easy to use, no brushing required.',
		'subs'  => array(
			array('name' => 'Breath Spray',     'slug' => '/breath-spray',    'icon' => '💨', 'gradient' => 'linear-gradient(135deg,#E0F0FF,#A8D4F5)'),
			array('name' => 'Water Additive',   'slug' => '/water-additive',  'icon' => '💧', 'gradient' => 'linear-gradient(135deg,#E8F5ED,#B5D8C0)'),
		),
	),
);

/* Detect category from page slug */
$bl_cat_slug = '';
if (function_exists('get_post_field') && get_the_ID()) {
	$bl_cat_slug = get_post_field('post_name', get_the_ID());
}
if (! isset($bl_categories[$bl_cat_slug])) {
	$bl_cat_slug = 'grooming';
}
$cat = $bl_categories[$bl_cat_slug];
?>

<!-- wp:html -->
<section class="bl-topcat-hero">
  <div class="bl-wrap">
    <div class="bl-topcat-breadcrumb">Home &nbsp;/&nbsp; <?php echo wp_kses_post($cat['title']); ?></div>
    <h1 class="bl-topcat-title"><?php echo wp_kses_post($cat['title']); ?></h1>
    <p class="bl-topcat-desc"><?php echo wp_kses_post($cat['desc']); ?></p>
  </div>
</section>

<!-- Subcategory thumbnail cards row -->
<section class="bl-topcat-subs">
  <div class="bl-wrap">
    <div class="bl-topcat-subs-row">
      <?php foreach ($cat['subs'] as $sub) : ?>
      <a href="<?php echo esc_attr($sub['slug']); ?>" class="bl-topcat-sub-card">
        <div class="bl-topcat-sub-img" style="background: <?php echo esc_attr($sub['gradient']); ?>;">
          <span class="bl-topcat-sub-icon"><?php echo $sub['icon']; ?></span>
        </div>
        <div class="bl-topcat-sub-name"><?php echo wp_kses_post($sub['name']); ?></div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /wp:html -->

<!-- wp:pattern {"slug":"boundless-native-theme/related-products"} /-->

<style>
/* ── TOP CATEGORY PAGE ── */
.bl-topcat-hero {
  padding: clamp(36px,6vw,56px) 0 clamp(24px,4vw,36px);
  border-bottom: 1px solid rgba(46,125,79,0.12);
}
.bl-topcat-breadcrumb {
  font-size: 11px; color: #6B7280; letter-spacing: 0.12em;
  text-transform: uppercase; margin-bottom: 16px;
}
.bl-topcat-title {
  font-family: "Cormorant Garamond", serif;
  font-size: clamp(2rem,5vw,3rem); font-weight: 700;
  font-style: italic; color: #1A5C38;
  margin-bottom: 10px;
}
.bl-topcat-desc {
  font-size: 14px; line-height: 1.7; color: #555;
  max-width: 600px;
}

/* Subcategory cards row */
.bl-topcat-subs {
  padding: clamp(28px,5vw,48px) 0;
}
.bl-topcat-subs-row {
  display: flex; gap: 20px; overflow-x: auto;
  -webkit-overflow-scrolling: touch;
  padding-bottom: 8px;
}
.bl-topcat-sub-card {
  flex: 0 0 auto; width: clamp(140px,18vw,180px);
  text-decoration: none; color: inherit;
  transition: transform 0.2s;
}
.bl-topcat-sub-card:hover { transform: translateY(-4px); }
.bl-topcat-sub-img {
  width: 100%; aspect-ratio: 1;
  border-radius: 16px;
  display: flex; align-items: center; justify-content: center;
  margin-bottom: 10px;
}
.bl-topcat-sub-icon { font-size: 3rem; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.1)); }
.bl-topcat-sub-name {
  font-size: 13px; font-weight: 600; text-align: center; color: #1C1C1C;
}

@media (max-width: 599px) {
  .bl-topcat-sub-card { width: 120px; }
  .bl-topcat-sub-icon { font-size: 2.5rem; }
}
</style>
