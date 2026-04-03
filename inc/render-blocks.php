<?php
/**
 * Dynamic render callbacks for Boundless custom blocks.
 *
 * @package BoundlessNativeTheme
 */

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Render affiliate checkout links block.
 *
 * @param array $attributes Block attributes.
 * @return string
 */
function boundless_render_affiliate_checkout($attributes) {
	$title       = isset($attributes['title']) ? sanitize_text_field($attributes['title']) : '';
	$description = isset($attributes['description']) ? sanitize_text_field($attributes['description']) : '';
	$amazon_url  = isset($attributes['amazonUrl']) ? esc_url($attributes['amazonUrl']) : '#';
	$walmart_url = isset($attributes['walmartUrl']) ? esc_url($attributes['walmartUrl']) : '#';
	$shop_url    = isset($attributes['shopUrl']) ? esc_url($attributes['shopUrl']) : '#';
	$shop_label  = isset($attributes['shopLabel']) ? sanitize_text_field($attributes['shopLabel']) : __('Official Shop', 'boundless-native-theme');
	$section_id  = isset($attributes['sectionId']) ? sanitize_html_class($attributes['sectionId']) : '';
	$id_attr     = ! empty($section_id) ? ' id="' . esc_attr($section_id) . '"' : '';

	ob_start();
	?>
	<section class="boundless-affiliate-checkout"<?php echo $id_attr; ?>>
		<div class="boundless-section-inner">
			<?php if (!empty($title)): ?>
			<h2><?php echo esc_html($title); ?></h2>
			<?php endif; ?>
			<?php if (!empty($description)): ?>
			<p><?php echo esc_html($description); ?></p>
			<?php endif; ?>
			<div class="boundless-affiliate-buttons">
				<?php if (!empty($amazon_url) && '#' !== $amazon_url): ?>
				<a href="<?php echo $amazon_url; ?>" target="_blank" rel="noopener sponsored" class="bl-affiliate-amazon">🛒 Buy on Amazon</a>
				<?php endif; ?>
				<a href="<?php echo $shop_url; ?>" rel="noopener sponsored">🌿 <?php echo esc_html($shop_label); ?></a>
				<?php if (!empty($walmart_url) && '#' !== $walmart_url): ?>
				<a href="<?php echo $walmart_url; ?>" target="_blank" rel="noopener sponsored">🏪 Other Retailer</a>
				<?php endif; ?>
				<?php
				$checkout_page = get_page_by_path('checkout');
				$checkout_url  = $checkout_page ? get_permalink($checkout_page) : home_url('/checkout/');
				?>
				<a href="<?php echo esc_url($checkout_url); ?>">💳 View All Options</a>
			</div>
		</div>
	</section>
	<?php
	return ob_get_clean();
}

/**
 * Render subcategory cards for the current category archive or page.
 *
 * On a category archive, displays direct child categories as styled cards.
 * On a page template, accepts a ?cat= query parameter.
 * Renders nothing if no parent category can be determined or if there are no children.
 *
 * @param array $attributes Block attributes.
 * @return string
 */
function boundless_render_subcategory_list($attributes) {
	$heading = isset($attributes['heading']) ? sanitize_text_field($attributes['heading']) : '';

	$parent_id = 0;
	if (is_category()) {
		$parent_id = get_queried_object_id();
	}
	if (! $parent_id && isset($_GET['cat'])) {
		$parent_id = absint($_GET['cat']);
	}
	if (! $parent_id) {
		return '';
	}

	$children = get_categories(array(
		'parent'     => $parent_id,
		'orderby'    => 'name',
		'order'      => 'ASC',
		'hide_empty' => false,
	));

	if (empty($children)) {
		return '';
	}

	ob_start();
	?>
	<div class="bl-subcategories">
		<?php if (! empty($heading)) : ?>
			<h2 class="bl-subcat-title"><?php echo esc_html($heading); ?></h2>
		<?php endif; ?>
		<div class="bl-subcat-grid">
			<?php foreach ($children as $child) : ?>
				<div class="bl-subcat-card">
					<a href="<?php echo esc_url(get_category_link($child->term_id)); ?>">
						<?php echo esc_html($child->name); ?>
					</a>
					<?php if ($child->count > 0) : ?>
						<div class="bl-subcat-count"><?php echo esc_html($child->count); ?> <?php echo esc_html(_n('post', 'posts', $child->count, 'boundless-native-theme')); ?></div>
					<?php endif; ?>
					<?php if (! empty($child->description)) : ?>
						<p class="bl-subcat-desc"><?php echo esc_html($child->description); ?></p>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
	return ob_get_clean();
}

/**
 * Render product highlights badges.
 *
 * @param array $attributes Block attributes.
 * @return string
 */
function boundless_render_product_highlights($attributes) {
	$title = isset($attributes['title']) ? sanitize_text_field($attributes['title']) : __('Product Highlights', 'boundless-native-theme');
	$items = isset($attributes['items']) && is_array($attributes['items']) ? $attributes['items'] : array();

	ob_start();
	?>
	<section class="boundless-product-highlights">
		<div class="boundless-section-inner">
			<h3><?php echo esc_html($title); ?></h3>
			<div class="boundless-highlight-list">
				<?php foreach ($items as $item) : ?>
					<?php $label = sanitize_text_field($item); ?>
					<?php if (! empty($label)) : ?>
						<span class="boundless-highlight-pill"><?php echo esc_html($label); ?></span>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php
	return ob_get_clean();
}
