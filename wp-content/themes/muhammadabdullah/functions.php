<?php
// Enqueue styles and scripts
function custom_theme_enqueue_styles() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
    // wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'custom_theme_enqueue_styles');

// Theme support for title tag, post thumbnails, and custom logo
function custom_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'custom_theme_setup');

// Register navigation menus
function custom_theme_menus() {
    register_nav_menus(array(
        'primary_menu' => __('Primary Menu', 'custom_theme')
    ));
}
add_action('init', 'custom_theme_menus');

// Bootstrap CDN
function enqueue_bootstrap() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');

    // Enqueue Bootstrap Bundle with Popper for JavaScript
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'enqueue_bootstrap');

// Ensure the WordPress admin bar is always shown
add_filter('show_admin_bar', '__return_true');

// Function to set custom excerpt length
function custom_excerpt_length($length) {
    return 20 ;
}
add_filter('excerpt_length', 'custom_excerpt_length');

// Register Rest Api endpoint
add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/projects', array(
        'methods' => 'GET',
        'callback' => 'get_custom_projects',
        'permission_callback' => '__return_true' // Allows public access
    ));
});

function sanitize_acf_date($date) {
    $date_obj = DateTime::createFromFormat('d/m/Y', $date);
    return $date_obj ? $date_obj->format('d/m/Y') : '';
}

function get_custom_projects() {
    // Query the projects post type
    $projects = get_posts(array(
        'post_type' => 'project',
        'posts_per_page' => -1,
    ));

    $project_data = array();

    foreach ($projects as $project) {
        $project_data[] = array(
            'title' => sanitize_text_field(esc_html(get_the_title($project->ID))),
            'url' => esc_url(get_field('project_url', $project->ID)),
            'start_date' => sanitize_acf_date(get_field('project_start_date', $project->ID)),
            'end_date' => sanitize_acf_date(get_field('project_end_date', $project->ID)),
        );
    }

    return rest_ensure_response($project_data);
}



  ?>