<?php
/**
 * RED Starter Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RED_Starter_Theme
 */

if (!function_exists('red_starter_setup')):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
	function red_starter_setup() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		// Let WordPress manage the document title.
		add_theme_support('title-tag');

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'primary' => esc_html('Primary Menu'),
		));

		// Switch search form, comment form, and comments to output valid HTML5.
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

	}
endif; // red_starter_setup
add_action('after_setup_theme', 'red_starter_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function red_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters('red_starter_content_width', 640);
}
add_action('after_setup_theme', 'red_starter_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function red_starter_widgets_init() {
	register_sidebar(array(
		'name' => esc_html('Sidebar'),
		'id' => 'sidebar-1',
		'description' => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));

	register_sidebar(array(
		'name' => esc_html('Footer'),
		'id' => 'footer-1',
		'description' => '',
		'before_widget' => '<div class="footer-block-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}
add_action('widgets_init', 'red_starter_widgets_init');

/**
 * Filter the stylesheet_uri to output the minified CSS file.
 */
function red_starter_minified_css($stylesheet_uri, $stylesheet_dir_uri) {
	if (file_exists(get_template_directory() . '/build/css/style.min.css')) {
		$stylesheet_uri = $stylesheet_dir_uri . '/build/css/style.min.css';
	}

	return $stylesheet_uri;
}
add_filter('stylesheet_uri', 'red_starter_minified_css', 10, 2);

/**
 * Enqueue scripts and styles.
 */
function red_starter_scripts() {
	wp_enqueue_style('red-starter-style', get_stylesheet_uri());
	wp_enqueue_style('font-awesome-cdn', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css', array(), '5.7.2');

	wp_enqueue_script('red-starter-navigation', get_template_directory_uri() . '/build/js/navigation.min.js', array(), '20151215', true);
	wp_enqueue_script('red-starter-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20151215', true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'red_starter_scripts');

function create_post_type() {
	register_post_type('acme_product',
		array(
			'labels' => array(
				'name' => __('Shop Stuff'),
				'singular_name' => __('Shop Stuff'),
			),
			'public' => true,
			'has_archive' => true,
		)
	);
}
add_action('init', 'create_post_type');

function create_post_type2() {
	register_post_type('acme_magazines',
		array(
			'labels' => array(
				'name' => __('Inhabitent Journal'),
				'singular_name' => __('Inhabitent Journal'),
			),
			'public' => true,
			'has_archive' => true,
		)
	);
}
add_action('init', 'create_post_type2');

add_action('init', 'create_book_tax');

function create_book_tax() {
	register_taxonomy(
		'Do Stuff',
		'acme_product',
		array(
			'label' => __('Do Stuff'),
			'rewrite' => array('slug' => 'Do Stuff'),
			'hierarchical' => true,
		)
	);
}

add_action('init', 'create_book_tax2');

function create_book_tax2() {
	register_taxonomy(
		'Eat Stuff',
		'acme_product',
		array(
			'label' => __('Eat Stuff'),
			'rewrite' => array('slug' => 'Eat Stuff'),
			'hierarchical' => true,
		)
	);
}

/**
 * Register meta boxes.
 */
function hcf_register_meta_boxes() {
	add_meta_box('hcf-1', __('Logo:', 'hcf'), 'hcf_display_callback', 'page');
}
add_action('add_meta_boxes', 'hcf_register_meta_boxes');

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function hcf_display_callback($post) {
	echo "<p class=\"meta-options hcf_field\">
        <label for=\"hcf_author\">Author</label>
        <input id=\"hcf_author\" type=\"text\" name=\"hcf_author\" value=\"" . esc_attr(get_post_meta(get_the_ID(), 'hcf_author', true)) . "\"/></p>";
}

function hcf_save_meta_box($post_id) {
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if ($parent_id = wp_is_post_revision($post_id)) {
		$post_id = $parent_id;
	}
	$fields = [
		'hcf_author',
	];
	foreach ($fields as $field) {
		if (array_key_exists($field, $_POST)) {
			update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
		}
	}
}
add_action('save_post', 'hcf_save_meta_box');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
