<?php
/**
 * Boundless Native Theme functions.
 *
 * @package BoundlessNativeTheme
 */

if (! defined('ABSPATH')) {
	exit;
}

require_once get_template_directory() . '/inc/render-blocks.php';

/**
 * Setup theme supports.
 */
function boundless_theme_setup() {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('wp-block-styles');
	add_theme_support('responsive-embeds');
	add_theme_support('align-wide');
	add_theme_support('editor-styles');
	add_editor_style('assets/css/theme.css');
	add_theme_support('html5', array('style', 'script', 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

	register_nav_menus(
		array(
			'primary' => __('Primary Menu', 'boundless-native-theme'),
		)
	);
}
add_action('after_setup_theme', 'boundless_theme_setup');

/**
 * Viewport meta for safe-area insets on notched devices (used with env(safe-area-inset-*)).
 *
 * @since 6.5.0 WordPress emits viewport via this filter.
 */
function boundless_viewport_meta_tag($meta) {
	return '<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />';
}
add_filter('wp_viewport_meta_tag', 'boundless_viewport_meta_tag');

/**
 * Enqueue front-end assets.
 */
function boundless_enqueue_assets() {
	wp_enqueue_style(
		'boundless-google-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Jost:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'boundless-theme-style',
		get_template_directory_uri() . '/assets/css/theme.css',
		array('boundless-google-fonts'),
		wp_get_theme()->get('Version')
	);

	wp_enqueue_script(
		'boundless-theme-script',
		get_template_directory_uri() . '/assets/js/theme.js',
		array(),
		wp_get_theme()->get('Version'),
		true
	);
}
add_action('wp_enqueue_scripts', 'boundless_enqueue_assets');

/**
 * Enqueue editor scripts for custom Gutenberg blocks.
 */
function boundless_enqueue_block_editor_assets() {
	wp_enqueue_script(
		'boundless-editor-blocks',
		get_template_directory_uri() . '/assets/js/blocks.js',
		array('wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-i18n', 'wp-plugins', 'wp-edit-post', 'wp-data'),
		wp_get_theme()->get('Version'),
		true
	);
}
add_action('enqueue_block_editor_assets', 'boundless_enqueue_block_editor_assets');

/**
 * Register dynamic custom blocks.
 */
function boundless_register_blocks() {
	register_block_type(
		'boundless/affiliate-checkout',
		array(
			'api_version'      => 2,
			'render_callback'  => 'boundless_render_affiliate_checkout',
			'attributes'       => array(
				'title'       => array('type' => 'string', 'default' => 'Checkout Options'),
				'description' => array('type' => 'string', 'default' => 'Choose your preferred store to purchase.'),
				'amazonUrl'   => array('type' => 'string', 'default' => '#'),
				'walmartUrl'  => array('type' => 'string', 'default' => '#'),
				'shopUrl'     => array('type' => 'string', 'default' => '#'),
				'shopLabel'   => array('type' => 'string', 'default' => 'Official Shop'),
				'sectionId'   => array('type' => 'string', 'default' => ''),
			),
		)
	);

	register_block_type(
		'boundless/product-highlights',
		array(
			'api_version'      => 2,
			'render_callback'  => 'boundless_render_product_highlights',
			'attributes'       => array(
				'title' => array('type' => 'string', 'default' => 'Product Highlights'),
				'items' => array(
					'type'    => 'array',
					'default' => array(
						'Alcohol-Free Formula',
						'Skin-Safe on Contact',
						'Triple Scent Barrier',
						'pH Balanced 5.5-6.0',
					),
				),
			),
		)
	);

	register_block_type(
		'boundless/subcategory-list',
		array(
			'api_version'      => 2,
			'render_callback'  => 'boundless_render_subcategory_list',
			'attributes'       => array(
				'heading' => array('type' => 'string', 'default' => 'Subcategories'),
			),
		)
	);
}
add_action('init', 'boundless_register_blocks');

/**
 * Register per-page theme colour meta box.
 *
 * Allows the admin to choose a colour scheme for each page from the
 * editor sidebar. The selected scheme is output as a body class so
 * CSS variables can change per page (requirement: "Background theme
 * can be changed per page").
 */
function boundless_register_color_meta() {
	register_post_meta('page', 'boundless_color_scheme', array(
		'show_in_rest'  => true,
		'single'        => true,
		'type'          => 'string',
		'default'       => 'default',
		'auth_callback' => function () {
			return current_user_can('edit_posts');
		},
	));
}
add_action('init', 'boundless_register_color_meta');

/**
 * Add the colour-scheme body class to the front-end.
 *
 * @param array $classes Existing body classes.
 * @return array
 */
function boundless_body_color_class($classes) {
	if (is_singular('page')) {
		$scheme = get_post_meta(get_the_ID(), 'boundless_color_scheme', true);
		if ($scheme && 'default' !== $scheme) {
			$classes[] = 'bl-scheme-' . sanitize_html_class($scheme);
		}
	}
	return $classes;
}
add_filter('body_class', 'boundless_body_color_class');

/**
 * Handle contact form submission (native PHP, no plugin required).
 *
 * Processes the POST data from the contact page form, sends an email
 * via wp_mail(), and redirects back with a status query parameter.
 */
function boundless_handle_contact_form() {
	if (
		! isset($_POST['boundless_contact_nonce']) ||
		! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['boundless_contact_nonce'])), 'boundless_contact_submit')
	) {
		return;
	}

	$name    = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
	$email   = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
	$subject = isset($_POST['subject']) ? sanitize_text_field(wp_unslash($_POST['subject'])) : 'General Enquiry';
	$message = isset($_POST['message']) ? sanitize_textarea_field(wp_unslash($_POST['message'])) : '';

	if (empty($name) || empty($email) || empty($message)) {
		wp_safe_redirect(add_query_arg('contact', 'error', wp_get_referer()));
		exit;
	}

	$to      = get_option('admin_email');
	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'Reply-To: ' . $name . ' <' . $email . '>',
	);
	$body    = sprintf(
		"Name: %s\nEmail: %s\nSubject: %s\n\nMessage:\n%s",
		$name,
		$email,
		$subject,
		$message
	);

	$sent = wp_mail($to, '[BOUNDLESS Contact] ' . $subject, $body, $headers);

	$status = $sent ? 'success' : 'error';
	wp_safe_redirect(add_query_arg('contact', $status, wp_get_referer()));
	exit;
}
add_action('admin_post_nopriv_boundless_contact', 'boundless_handle_contact_form');
add_action('admin_post_boundless_contact', 'boundless_handle_contact_form');

/**
 * Auto-create all required pages on theme activation.
 *
 * The theme links to specific page slugs from the nav, footer, and patterns.
 * This function ensures every page exists with the correct template assigned
 * so the site works out of the box without manual page creation.
 *
 * Safe to run multiple times — skips pages that already exist.
 */
function boundless_create_pages_on_activation() {
	$pages = array(
		array(
			'title'    => 'Home',
			'slug'     => 'home',
			'template' => 'front-page',
		),
		array(
			'title'    => 'Original™',
			'slug'     => 'original',
			'template' => 'page-product',
		),
		array(
			'title'    => 'Natural™',
			'slug'     => 'natural',
			'template' => 'page-product',
		),
		array(
			'title'    => '2-in-1™ Hot Spot',
			'slug'     => '2-in-1',
			'template' => 'page-product',
		),
		array(
			'title'    => 'Sensitive',
			'slug'     => 'sensitive',
			'template' => 'page-product',
		),
		array(
			'title'    => 'Itch Relief',
			'slug'     => 'itch-relief',
			'template' => 'page-product',
		),
		array(
			'title'    => 'Ingredients',
			'slug'     => 'ingredients',
			'template' => 'page-ingredient',
		),
		array(
			'title'    => 'Contact',
			'slug'     => 'contact',
			'template' => 'page-contact',
		),
		array(
			'title'    => 'Cart',
			'slug'     => 'cart',
			'template' => 'page-cart',
		),
		array(
			'title'    => 'Checkout',
			'slug'     => 'checkout',
			'template' => 'page-checkout',
		),
		array(
			'title'    => 'Product Collections',
			'slug'     => 'collections',
			'template' => 'page-subcategory',
		),
		array(
			'title'    => 'Our Story',
			'slug'     => 'about',
			'template' => '',
		),
		array(
			'title'    => 'Stockists',
			'slug'     => 'stockists',
			'template' => '',
		),
		array(
			'title'    => 'FAQ',
			'slug'     => 'faq',
			'template' => '',
		),
		array(
			'title'    => 'Shipping & Returns',
			'slug'     => 'shipping',
			'template' => '',
		),
		array(
			'title'    => 'Our Philosophy',
			'slug'     => 'philosophy',
			'template' => '',
		),
		array(
			'title'    => 'Safety Data Sheet',
			'slug'     => 'safety',
			'template' => '',
		),
		array(
			'title'    => 'Blog',
			'slug'     => 'blog',
			'template' => '',
		),
		array(
			'title'    => 'Light Landing',
			'slug'     => 'light',
			'template' => 'page-light',
		),
		/* Top category landing pages */
		array('title' => 'Grooming',                     'slug' => 'grooming',               'template' => 'page-top-category'),
		array('title' => 'Behavior',                     'slug' => 'behavior',               'template' => 'page-top-category'),
		array('title' => 'Flea & Tick Spray',            'slug' => 'flea-tick',              'template' => 'page-top-category'),
		array('title' => 'Dental',                       'slug' => 'dental',                 'template' => 'page-top-category'),
		/* Grooming subcategory pages */
		array('title' => 'Shampoo',                     'slug' => 'shampoo',                'template' => 'page-subcategory'),
		array('title' => 'Conditioner',                  'slug' => 'conditioner',            'template' => 'page-subcategory'),
		array('title' => 'Detangler Spray',              'slug' => 'detangler-spray',        'template' => 'page-subcategory'),
		array('title' => 'Deodorant & Cologne Spray',    'slug' => 'deodorant-cologne-spray','template' => 'page-collection'),
		array('title' => 'Waterless Shampoo',            'slug' => 'waterless-shampoo',      'template' => 'page-subcategory'),
		/* Behavior subcategory pages */
		array('title' => 'Training Aid for Dogs',        'slug' => 'training-aid-dogs',      'template' => 'page-subcategory'),
		array('title' => 'Training Aids For Cats',       'slug' => 'training-aids-cats',      'template' => 'page-subcategory'),
		/* Flea & Tick subcategory pages */
		array('title' => 'Flea & Tick Spray For Home',   'slug' => 'flea-tick-home',         'template' => 'page-subcategory'),
		array('title' => 'Flea & Tick Garden and Yard Spray', 'slug' => 'flea-tick-garden',  'template' => 'page-subcategory'),
		/* Dental subcategory pages */
		array('title' => 'Breath Spray',                 'slug' => 'breath-spray',           'template' => 'page-subcategory'),
		array('title' => 'Water Additive',               'slug' => 'water-additive',         'template' => 'page-subcategory'),
		/* Other pages */
		array('title' => 'Affiliate',                    'slug' => 'affiliate',              'template' => ''),
	);

	$home_page_id = 0;
	$blog_page_id = 0;

	foreach ($pages as $page_data) {
		$existing = get_page_by_path($page_data['slug']);
		if ($existing) {
			/* Page already exists — just ensure template is set */
			if (! empty($page_data['template']) && get_page_template_slug($existing->ID) !== $page_data['template']) {
				update_post_meta($existing->ID, '_wp_page_template', $page_data['template']);
			}
			if ('home' === $page_data['slug']) {
				$home_page_id = $existing->ID;
			}
			if ('blog' === $page_data['slug']) {
				$blog_page_id = $existing->ID;
			}
			continue;
		}

		$new_page_id = wp_insert_post(array(
			'post_title'   => $page_data['title'],
			'post_name'    => $page_data['slug'],
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => '',
		));

		if (! is_wp_error($new_page_id)) {
			if (! empty($page_data['template'])) {
				update_post_meta($new_page_id, '_wp_page_template', $page_data['template']);
			}
			if ('home' === $page_data['slug']) {
				$home_page_id = $new_page_id;
			}
			if ('blog' === $page_data['slug']) {
				$blog_page_id = $new_page_id;
			}
		}
	}

	/* Set static front page and posts page */
	if ($home_page_id) {
		update_option('show_on_front', 'page');
		update_option('page_on_front', $home_page_id);
	}
	if ($blog_page_id) {
		update_option('page_for_posts', $blog_page_id);
	}

	/* Set pretty permalinks if not already set (needed for /slug URLs) */
	if (! get_option('permalink_structure')) {
		update_option('permalink_structure', '/%postname%/');
		flush_rewrite_rules();
	}
}
add_action('after_switch_theme', 'boundless_create_pages_on_activation');

/**
 * Also run page creation on admin_init if pages are missing.
 * This handles the case where theme was already active but pages were deleted.
 */
function boundless_ensure_pages_exist() {
	if (! is_admin()) {
		return;
	}
	/* Only check once per hour to avoid performance issues */
	$last_check = get_option('boundless_pages_checked', 0);
	if (time() - $last_check < HOUR_IN_SECONDS) {
		return;
	}
	update_option('boundless_pages_checked', time());

	/* Check if the critical pages exist */
	$required_slugs = array('home', 'cart', 'checkout', 'contact', 'ingredients', 'sensitive', 'itch-relief', 'shampoo', 'affiliate');
	$missing = false;
	foreach ($required_slugs as $slug) {
		if (! get_page_by_path($slug)) {
			$missing = true;
			break;
		}
	}
	if ($missing) {
		boundless_create_pages_on_activation();
	}
}
add_action('admin_init', 'boundless_ensure_pages_exist');

/**
 * Register block pattern category.
 */
function boundless_register_pattern_category() {
	if (function_exists('register_block_pattern_category')) {
		register_block_pattern_category(
			'boundless',
			array('label' => __('Boundless Sections', 'boundless-native-theme'))
		);
	}
}
add_action('init', 'boundless_register_pattern_category');
