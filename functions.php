<?php
// Enqueue styles and scripts
function my_theme_enqueue_scripts() {
    // Enqueue styles
    wp_enqueue_style('my-theme-style', get_stylesheet_uri());

    // Enqueue scripts
    wp_enqueue_script('my-theme-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');

// Add theme support for featured images
function my_theme_setup() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'my_theme_setup');

// Custom Excerpt length
function my_theme_custom_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'my_theme_custom_excerpt_length');

// Custom Excerpt "Read More" text
function my_theme_excerpt_more($more) {
    return '... <a href="' . get_permalink() . '">Continue reading</a>';
}
add_filter('excerpt_more', 'my_theme_excerpt_more');

// Register navigation menus
function my_theme_register_menus() {
    register_nav_menus(array(
        'primary-menu' => 'Primary Menu',
        'footer-menu' => 'Footer Menu',
    ));
}
add_action('init', 'my_theme_register_menus');

// Custom logo support
function my_theme_custom_logo() {
    $defaults = array(
        'height' => 100,
        'width' => 100,
        'flex-height' => true,
        'flex-width' => true,
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'my_theme_custom_logo');

// Custom post type
function my_theme_custom_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Products',
            'singular_name' => 'Product',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
    );
    register_post_type('product', $args);
}
add_action('init', 'my_theme_custom_post_type');

// Widget area
function my_theme_widget_area() {
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar-1',
        'description' => 'Widgets for the sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'my_theme_widget_area');

function custom_search_form($form) {
    // Modify the search form HTML markup
    // Replace or add HTML elements as needed
    $form = '<form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">
                <label>
                    <span class="screen-reader-text form-label">' . __('', 'textdomain') . '</span>
                    <input type="search" class="search-field form-control" placeholder="' . __('Search...', 'textdomain') . '" value="' . get_search_query() . '" name="s" />
                </label>
                <button type="submit" class="btn btn-dark btn-sm">' . __('Search', 'textdomain') . '</button>
            </form>';

    return $form;
}
add_filter('get_search_form', 'custom_search_form');

function custom_thumbnail_size() {
    add_image_size( 'custom-thumbnail', 500, 300, true );
}
add_action( 'after_setup_theme', 'custom_thumbnail_size' );

function custom_archive_query($query) {
    if (is_admin() || ! $query->is_main_query()) {
        return;
    }

    if ($query->is_archive() && $query->is_paged()) {
        $query->set('posts_per_page', 5);
    }
}
add_action('pre_get_posts', 'custom_archive_query');

function add_img_fluid_class($content) {
    $dom = new DOMDocument();
    libxml_use_internal_errors(true); // Disable libxml errors and warnings
    $dom->loadHTML($content);
    libxml_clear_errors();

    $images = $dom->getElementsByTagName('img');
    foreach ($images as $image) {
        $class = $image->getAttribute('class');
        $class .= ' img-fluid';
        $image->setAttribute('class', $class);
    }

    $newContent = $dom->saveHTML();
    return $newContent;
}