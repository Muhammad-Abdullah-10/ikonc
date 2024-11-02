<?php
/*
Plugin Name: Custom Post Type - Projects
*/

// Function to register the "Project" custom post type
function register_projects() {
    $labels = array(
        'name'               => __('Projects', 'textdomain'),
        'singular_name'      => __('Project', 'textdomain'),
        'menu_name'          => __('Projects', 'textdomain'),
        'name_admin_bar'     => __('Project', 'textdomain'),
        'add_new'            => __('Add New Project', 'textdomain'),
        'add_new_item'       => __('Add New Project', 'textdomain'),
        'new_item'           => __('New Project', 'textdomain'),
        'edit_item'          => __('Edit Project', 'textdomain'),
        'view_item'          => __('View Project', 'textdomain'),
        'all_items'          => __('All Projects', 'textdomain'),
        'search_items'       => __('Search Projects', 'textdomain'),
        'not_found'          => __('No projects found.', 'textdomain'),
        'not_found_in_trash' => __('No projects found in Trash.', 'textdomain')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite'            => array('slug' => 'projects')
    );

    register_post_type('project', $args);
}

// Hook into the 'init' action
add_action('init', 'register_projects');
?>
