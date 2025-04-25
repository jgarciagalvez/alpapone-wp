<?php
/**
 * ASAP Child Theme Functions
 * 
 * @package ASAP Child
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Enqueue parent and child theme styles
 */
function asap_child_enqueue_styles() {
    // Parent theme stylesheet
    wp_enqueue_style('asap-style', 
        get_template_directory_uri() . '/style.css',
        array(),
        wp_get_theme()->get('Version')
    );

    // Child theme stylesheet
    wp_enqueue_style('asap-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('asap-style'),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'asap_child_enqueue_styles');

/**
 * Add theme support for various WordPress features
 */
function asap_child_theme_setup() {
    // Add support for title tag
    add_theme_support('title-tag');
    
    // Add support for post thumbnails
    add_theme_support('post-thumbnails');
    
    // Add support for HTML5 features
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'asap_child_theme_setup');

?>
